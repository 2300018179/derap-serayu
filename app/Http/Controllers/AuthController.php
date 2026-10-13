<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password as PasswordBroker;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function storeLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (! Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            return back()
                ->withErrors(['login' => 'Email/username atau kata sandi tidak sesuai.'])
                ->onlyInput('login');
        }

        $request->session()->regenerate();

        return match ($request->user()->role) {
            'writer' => redirect()->intended(route('penulis.dashboard')),
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

        $user = User::create([
            'name' => $validated['nama'],
            'pen_name' => $validated['nama_pena'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'whatsapp' => $validated['whatsapp'],
            'bio' => $validated['bio'] ?? null,
            'role' => 'writer',
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('penulis.dashboard')
            ->with('success', 'Akun penulis berhasil dibuat. Silakan mulai menulis.');
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

        $user = User::create([
            'name' => $validated['nama'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role' => 'reader',
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')
            ->with('success', 'Akun pembaca berhasil dibuat.');
    }

    public function sendPasswordResetLink(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        PasswordBroker::sendResetLink($validated);

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

        $status = PasswordBroker::reset(
            $validated,
            function (User $user, string $password): void {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === PasswordBroker::PASSWORD_RESET) {
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
