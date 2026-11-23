<?php

namespace App\Http\Controllers;

use App\Mail\VerificationOtpMail;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password as PasswordBroker;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class AuthController extends Controller
{
    public function storeLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (! Auth::attempt([
            $field => $credentials['login'],
            'password' => $credentials['password'],
            'is_active' => true,
        ], $request->boolean('remember'))) {
            return back()
                ->withErrors(['login' => 'Email/username atau kata sandi tidak sesuai.'])
                ->onlyInput('login');
        }

        $request->session()->regenerate();

        return match ($request->user()->role) {
            'writer' => redirect()->intended(route('penulis.dashboard')),
            'editor' => redirect()->route('editor.dashboard'),
            'admin' => redirect()->intended(route('admin.dashboard')),
            default => redirect()->intended(route('home')),
        };
    }

    public function registerWriter(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nama_pena' => ['required', 'string', 'max:150'],
            'username' => ['required', 'alpha_dash', 'min:3', 'max:30', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'whatsapp' => ['required', 'string', 'max:30'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'terms' => ['accepted'],
        ]);

        $otp = (string) random_int(100000, 999999);

        $request->session()->put('pending_writer_registration', [
            'data' => [
                'name' => $validated['nama'],
                'pen_name' => $validated['nama_pena'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'whatsapp' => $validated['whatsapp'],
                'bio' => $validated['bio'] ?? null,
                'role' => 'writer',
                'password' => Hash::make($validated['password']),
            ],
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        $sent = $this->sendOtpMail($validated['email'], $validated['nama'], 'Penulis', $otp);

        $notice = $sent
            ? 'Kode verifikasi telah dikirimkan ke email Anda. Silakan periksa kotak masuk atau spam.'
            : "Kode verifikasi akun Anda: [ {$otp} ]. (Tampil di sini karena SMTP email asli belum terhubung).";

        return redirect()->route('register.penulis.verifikasi')
            ->with('info', $notice);
    }

    public function showWriterVerification(Request $request): View|RedirectResponse
    {
        $pending = $request->session()->get('pending_writer_registration');

        if (! $pending) {
            return redirect()->route('register.penulis')
                ->with('error', 'Sesi pendaftaran tidak ditemukan. Silakan lengkapi formulir pendaftaran.');
        }

        return view('auth.register-penulis-verifikasi', [
            'email' => $pending['data']['email'],
            'maskedEmail' => $this->maskEmail($pending['data']['email']),
        ]);
    }

    public function verifyWriterOtp(Request $request): RedirectResponse
    {
        $pending = $request->session()->get('pending_writer_registration');

        if (! $pending) {
            return redirect()->route('register.penulis')
                ->with('error', 'Sesi pendaftaran berakhir. Silakan daftar kembali.');
        }

        $inputOtp = trim((string) $request->input('otp'));

        if (! $inputOtp || $inputOtp !== (string) $pending['otp'] || now()->greaterThan($pending['expires_at'])) {
            return back()->withErrors(['otp' => 'Kode verifikasi tidak sesuai atau sudah kedaluwarsa.'])
                ->withInput();
        }

        $user = User::create(array_merge($pending['data'], [
            'email_verified_at' => now(),
            'is_active' => true,
        ]));

        $request->session()->forget('pending_writer_registration');

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('register.penulis.selesai')
            ->with('success', 'Akun penulis berhasil diverifikasi dan diaktifkan.');
    }

    public function resendWriterOtp(Request $request): RedirectResponse
    {
        $pending = $request->session()->get('pending_writer_registration');

        if (! $pending) {
            return redirect()->route('register.penulis')
                ->with('error', 'Sesi pendaftaran berakhir. Silakan daftar kembali.');
        }

        $otp = (string) random_int(100000, 999999);
        $pending['otp'] = $otp;
        $pending['expires_at'] = now()->addMinutes(10);
        $request->session()->put('pending_writer_registration', $pending);

        $sent = $this->sendOtpMail($pending['data']['email'], $pending['data']['name'], 'Penulis', $otp);

        $msg = $sent
            ? 'Kode verifikasi baru telah dikirimkan ke email Anda.'
            : "Kode verifikasi baru Anda: [ {$otp} ].";

        return back()->with('success', $msg);
    }

    public function registerReader(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_dash', 'min:3', 'max:30', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'terms' => ['accepted'],
        ]);

        $otp = (string) random_int(100000, 999999);

        $request->session()->put('pending_reader_registration', [
            'data' => [
                'name' => $validated['nama'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'role' => 'reader',
                'password' => Hash::make($validated['password']),
            ],
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        $sent = $this->sendOtpMail($validated['email'], $validated['nama'], 'Pembaca', $otp);

        $notice = $sent
            ? 'Kode verifikasi telah dikirimkan ke email Anda. Silakan periksa kotak masuk atau spam.'
            : "Kode verifikasi akun Anda: [ {$otp} ]. (Tampil di sini karena SMTP email asli belum terhubung).";

        return redirect()->route('register.pembaca.verifikasi')
            ->with('info', $notice);
    }

    public function showReaderVerification(Request $request): View|RedirectResponse
    {
        $pending = $request->session()->get('pending_reader_registration');

        if (! $pending) {
            return redirect()->route('register.pembaca')
                ->with('error', 'Sesi pendaftaran tidak ditemukan. Silakan lengkapi formulir pendaftaran.');
        }

        return view('auth.register-pembaca-verifikasi', [
            'email' => $pending['data']['email'],
            'maskedEmail' => $this->maskEmail($pending['data']['email']),
        ]);
    }

    public function verifyReaderOtp(Request $request): RedirectResponse
    {
        $pending = $request->session()->get('pending_reader_registration');

        if (! $pending) {
            return redirect()->route('register.pembaca')
                ->with('error', 'Sesi pendaftaran berakhir. Silakan daftar kembali.');
        }

        $inputOtp = trim((string) $request->input('otp'));

        if (! $inputOtp || $inputOtp !== (string) $pending['otp'] || now()->greaterThan($pending['expires_at'])) {
            return back()->withErrors(['otp' => 'Kode verifikasi tidak sesuai atau sudah kedaluwarsa.'])
                ->withInput();
        }

        $user = User::create(array_merge($pending['data'], [
            'email_verified_at' => now(),
            'is_active' => true,
        ]));

        $request->session()->forget('pending_reader_registration');

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('register.pembaca.selesai')
            ->with('success', 'Akun pembaca berhasil diverifikasi dan diaktifkan.');
    }

    public function resendReaderOtp(Request $request): RedirectResponse
    {
        $pending = $request->session()->get('pending_reader_registration');

        if (! $pending) {
            return redirect()->route('register.pembaca')
                ->with('error', 'Sesi pendaftaran berakhir. Silakan daftar kembali.');
        }

        $otp = (string) random_int(100000, 999999);
        $pending['otp'] = $otp;
        $pending['expires_at'] = now()->addMinutes(10);
        $request->session()->put('pending_reader_registration', $pending);

        $sent = $this->sendOtpMail($pending['data']['email'], $pending['data']['name'], 'Pembaca', $otp);

        $msg = $sent
            ? 'Kode verifikasi baru telah dikirimkan ke email Anda.'
            : "Kode verifikasi baru Anda: [ {$otp} ].";

        return back()->with('success', $msg);
    }

    private function maskEmail(string $email): string
    {
        $parts = explode('@', $email);
        $name = $parts[0] ?? '';
        $len = strlen($name);
        $visible = min(3, $len);
        $masked = substr($name, 0, $visible) . str_repeat('*', max(4, $len - $visible));

        return $masked . '@' . ($parts[1] ?? '');
    }

    private function sendOtpMail(string $email, string $name, string $role, string $otp): bool
    {
        try {
            Mail::to($email)->send(new VerificationOtpMail($otp, $name, $role));

            return true;
        } catch (\Throwable $e) {
            Log::error("Gagal mengirim email OTP ke {$email}: " . $e->getMessage() . " | KODE OTP ANDA: {$otp}");

            return false;
        }
    }

    public function sendPasswordResetLink(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        if (in_array(config('mail.default'), ['log', 'array'], true) && ! app()->environment('local')) {
            return back()
                ->withErrors([
                    'email' => 'Pengiriman email belum aktif. Administrator perlu mengatur layanan SMTP terlebih dahulu.',
                ])
                ->onlyInput('email');
        }

        try {
            $status = PasswordBroker::sendResetLink($validated);
        } catch (TransportExceptionInterface $exception) {
            Log::error('Password reset email delivery failed.', [
                'exception' => $exception::class,
            ]);

            if (app()->environment('local')) {
                $user = User::where('email', $validated['email'])->first();
                if ($user) {
                    $token = PasswordBroker::createToken($user);
                    $resetUrl = route('password.reset', ['token' => $token, 'email' => $user->email]);

                    return back()->with(
                        'status',
                        "SMTP belum terhubung. Mode Pengujian Lokal: Silakan <a href='{$resetUrl}' style='color:#08add5;font-weight:bold;text-decoration:underline;'>Klik di Sini untuk Mengatur Ulang Kata Sandi</a>"
                    );
                }
            }

            return back()
                ->withErrors([
                    'email' => 'Email reset tidak dapat dikirim saat ini. Periksa konfigurasi email lalu coba lagi.',
                ])
                ->onlyInput('email');
        }

        if ($status === PasswordBroker::RESET_THROTTLED) {
            return back()->with(
                'status',
                'Tautan reset baru saja diminta. Periksa email atau tunggu sebentar sebelum meminta tautan baru.'
            );
        }

        if ($status === PasswordBroker::RESET_LINK_SENT) {
            return back()->with(
                'status',
                'Tautan pengaturan ulang telah dikirim ke alamat email akun.'
            );
        }

        return back()->with(
            'status',
            'Jika alamat email terdaftar, tautan untuk mengatur ulang kata sandi akan segera dikirim.'
        );
    }

    public function showResetForm(Request $request, string $token): View
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $resetUserId = null;
        $status = PasswordBroker::reset(
            $validated,
            function (User $user, string $password) use (&$resetUserId): void {
                $resetUserId = $user->getAuthIdentifier();
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === PasswordBroker::PASSWORD_RESET) {
            if ($request->user()?->getAuthIdentifier() === $resetUserId) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            return redirect()->route('login')->with('status', 'Kata sandi berhasil diubah. Silakan masuk.');
        }

        return back()->withErrors([
            'email' => 'Tautan pengaturan ulang tidak valid atau sudah kedaluwarsa. Silakan minta tautan baru.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
