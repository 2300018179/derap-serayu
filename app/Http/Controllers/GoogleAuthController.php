<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    private const AUTHORIZATION_ENDPOINT = 'https://accounts.google.com/o/oauth2/v2/auth';

    private const TOKEN_ENDPOINT = 'https://oauth2.googleapis.com/token';

    private const USERINFO_ENDPOINT = 'https://openidconnect.googleapis.com/v1/userinfo';

    public function redirect(Request $request): RedirectResponse
    {
        if (! $this->hasCredentials()) {
            return $this->loginError('Login Google belum dikonfigurasi oleh administrator.');
        }

        $state = Str::random(40);
        $request->session()->put('google_oauth_state', $state);

        $query = http_build_query([
            'client_id' => config('services.google.client_id'),
            'redirect_uri' => $this->redirectUri(),
            'response_type' => 'code',
            'scope' => 'openid email profile',
            'state' => $state,
            'prompt' => 'select_account',
        ], '', '&', PHP_QUERY_RFC3986);

        return redirect()->away(self::AUTHORIZATION_ENDPOINT.'?'.$query);
    }

    public function callback(Request $request): RedirectResponse
    {
        $expectedState = $request->session()->pull('google_oauth_state');
        $returnedState = $request->query('state');

        if (
            ! is_string($expectedState)
            || ! is_string($returnedState)
            || ! hash_equals($expectedState, $returnedState)
        ) {
            return $this->loginError('Sesi login Google kedaluwarsa. Silakan coba lagi.');
        }

        if ($request->filled('error')) {
            return $this->loginError('Login dengan Google dibatalkan atau gagal. Silakan coba lagi.');
        }

        $code = $request->query('code');

        if (! is_string($code) || $code === '' || ! $this->hasCredentials()) {
            return $this->loginError('Google tidak memberikan kode login yang valid. Silakan coba lagi.');
        }

        $tokenResponse = Http::asForm()
            ->acceptJson()
            ->connectTimeout(5)
            ->timeout(15)
            ->post(self::TOKEN_ENDPOINT, [
                'code' => $code,
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret'),
                'redirect_uri' => $this->redirectUri(),
                'grant_type' => 'authorization_code',
            ]);

        if (! $tokenResponse->successful()) {
            Log::warning('Google OAuth token exchange failed.', [
                'status' => $tokenResponse->status(),
            ]);

            return $this->loginError('Login dengan Google belum berhasil. Silakan coba lagi.');
        }

        $accessToken = $tokenResponse->json('access_token');

        if (! is_string($accessToken) || $accessToken === '') {
            Log::warning('Google OAuth token response did not contain an access token.');

            return $this->loginError('Google tidak mengirimkan token login yang valid.');
        }

        $profileResponse = Http::acceptJson()
            ->withToken($accessToken)
            ->connectTimeout(5)
            ->timeout(15)
            ->get(self::USERINFO_ENDPOINT);

        if (! $profileResponse->successful()) {
            Log::warning('Google OAuth user profile request failed.', [
                'status' => $profileResponse->status(),
            ]);

            return $this->loginError('Data akun Google tidak dapat diverifikasi. Silakan coba lagi.');
        }

        $profile = $profileResponse->json();
        $googleId = is_array($profile) ? ($profile['sub'] ?? null) : null;
        $email = is_array($profile) && is_string($profile['email'] ?? null)
            ? Str::lower(trim($profile['email']))
            : '';

        if (
            ! is_string($googleId)
            || $googleId === ''
            || filter_var($email, FILTER_VALIDATE_EMAIL) === false
            || ($profile['email_verified'] ?? false) !== true
        ) {
            return $this->loginError('Google tidak memberikan email terverifikasi untuk akun ini.');
        }

        $user = User::query()->where('google_id', $googleId)->first();

        if (! $user) {
            $user = User::query()
                ->whereRaw('LOWER(email) = ?', [$email])
                ->first();
        }

        if ($user && ! $user->is_active) {
            return $this->loginError('Akun ini sedang dinonaktifkan. Hubungi administrator.');
        }

        if (
            $user
            && $user->google_id !== null
            && ! hash_equals((string) $user->google_id, $googleId)
        ) {
            return $this->loginError('Email Google ini sudah terhubung ke akun lain.');
        }

        if ($user) {
            $user->forceFill([
                'google_id' => $googleId,
                'email_verified_at' => $user->email_verified_at ?? now(),
            ])->save();
        } else {
            $name = is_string($profile['name'] ?? null) && trim($profile['name']) !== ''
                ? trim($profile['name'])
                : Str::before($email, '@');

            $user = new User;
            $user->forceFill([
                'name' => $name,
                'email' => $email,
                'username' => $this->uniqueUsername(),
                'role' => 'reader',
                'password' => Str::random(64),
                'email_verified_at' => now(),
                'google_id' => $googleId,
                'is_active' => true,
            ])->save();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return match ($user->role) {
            'writer' => redirect()->intended(route('penulis.dashboard')),
            'editor' => redirect()->route('editor.dashboard'),
            'admin' => redirect()->intended(route('admin.dashboard')),
            default => redirect()->intended(route('home')),
        };
    }

    private function hasCredentials(): bool
    {
        return filled(config('services.google.client_id'))
            && filled(config('services.google.client_secret'));
    }

    private function redirectUri(): string
    {
        $redirectUri = config('services.google.redirect');

        return is_string($redirectUri) && $redirectUri !== ''
            ? $redirectUri
            : route('google.callback');
    }

    private function uniqueUsername(): string
    {
        do {
            $username = 'google_'.Str::lower(Str::random(20));
        } while (User::query()->where('username', $username)->exists());

        return $username;
    }

    private function loginError(string $message): RedirectResponse
    {
        return redirect()->route('login')->withErrors(['google' => $message]);
    }
}
