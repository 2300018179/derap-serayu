<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_google_login_redirects_with_a_session_bound_state(): void
    {
        $this->configureGoogle();

        $this->get(route('login'))
            ->assertOk()
            ->assertSee(route('google.redirect'), false)
            ->assertSee('Masuk dengan Google');

        $response = $this->get(route('google.redirect'));
        $response->assertRedirect();

        parse_str((string) parse_url($response->headers->get('Location'), PHP_URL_QUERY), $query);

        $this->assertSame('google-client-id', $query['client_id']);
        $this->assertSame(route('google.callback'), $query['redirect_uri']);
        $this->assertSame('openid email profile', $query['scope']);
        $this->assertSame(session('google_oauth_state'), $query['state']);
    }

    public function test_google_callback_creates_a_reader_for_a_verified_new_account(): void
    {
        $this->configureGoogle();
        $this->fakeGoogleProfile([
            'sub' => 'google-reader-123',
            'email' => 'reader@example.com',
            'email_verified' => true,
            'name' => 'Google Reader',
        ]);

        $this->withSession(['google_oauth_state' => 'valid-oauth-state'])
            ->get(route('google.callback', [
                'state' => 'valid-oauth-state',
                'code' => 'authorization-code',
            ]))
            ->assertRedirect(route('home'));

        $user = User::query()->where('email', 'reader@example.com')->firstOrFail();

        $this->assertSame('reader', $user->role);
        $this->assertSame('google-reader-123', $user->google_id);
        $this->assertSame('Google Reader', $user->name);
        $this->assertNotNull($user->email_verified_at);
        $this->assertAuthenticatedAs($user);

        Http::assertSent(fn ($request): bool => $request->url() === 'https://oauth2.googleapis.com/token'
            && $request['code'] === 'authorization-code'
            && $request['client_id'] === 'google-client-id');
    }

    public function test_google_callback_links_an_existing_account_without_changing_its_role(): void
    {
        $this->configureGoogle();
        $admin = User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@example.com',
        ]);
        $this->fakeGoogleProfile([
            'sub' => 'google-admin-123',
            'email' => 'ADMIN@example.com',
            'email_verified' => true,
            'name' => 'Google Admin',
        ]);

        $this->withSession(['google_oauth_state' => 'valid-oauth-state'])
            ->get(route('google.callback', [
                'state' => 'valid-oauth-state',
                'code' => 'authorization-code',
            ]))
            ->assertRedirect(route('admin.dashboard'));

        $this->assertSame('admin', $admin->fresh()->role);
        $this->assertSame('google-admin-123', $admin->fresh()->google_id);
        $this->assertAuthenticatedAs($admin);
        $this->assertDatabaseCount('users', 1);
    }

    public function test_google_callback_rejects_an_unverified_email(): void
    {
        $this->configureGoogle();
        $this->fakeGoogleProfile([
            'sub' => 'google-unverified-123',
            'email' => 'unverified@example.com',
            'email_verified' => false,
            'name' => 'Unverified User',
        ]);

        $this->withSession(['google_oauth_state' => 'valid-oauth-state'])
            ->get(route('google.callback', [
                'state' => 'valid-oauth-state',
                'code' => 'authorization-code',
            ]))
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('google');

        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_google_callback_rejects_a_mismatched_oauth_state_before_contacting_google(): void
    {
        Http::preventStrayRequests();

        $this->withSession(['google_oauth_state' => 'expected-state'])
            ->get(route('google.callback', [
                'state' => 'unexpected-state',
                'code' => 'authorization-code',
            ]))
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('google');

        $this->assertGuest();
    }

    public function test_google_callback_does_not_authenticate_a_deactivated_account(): void
    {
        $this->configureGoogle();
        User::factory()->create([
            'role' => 'reader',
            'email' => 'inactive@example.com',
            'is_active' => false,
        ]);
        $this->fakeGoogleProfile([
            'sub' => 'google-inactive-123',
            'email' => 'inactive@example.com',
            'email_verified' => true,
            'name' => 'Inactive Reader',
        ]);

        $this->withSession(['google_oauth_state' => 'valid-oauth-state'])
            ->get(route('google.callback', [
                'state' => 'valid-oauth-state',
                'code' => 'authorization-code',
            ]))
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('google');

        $this->assertGuest();
    }

    public function test_password_reset_notification_is_sent_only_to_the_requested_account(): void
    {
        config(['mail.default' => 'smtp']);
        $target = User::factory()->create(['email' => 'target@example.com']);
        $other = User::factory()->create(['email' => 'other@example.com']);
        Notification::fake();

        $this->from(route('password.request'))
            ->post(route('password.email'), ['email' => $target->email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHas('status', 'Tautan pengaturan ulang telah dikirim ke alamat email akun.');

        Notification::assertSentTo($target, ResetPassword::class);
        Notification::assertNotSentTo($other, ResetPassword::class);
    }

    public function test_authenticated_user_can_request_a_password_reset_email(): void
    {
        config(['mail.default' => 'smtp']);
        $user = User::factory()->create();
        Notification::fake();

        $this->actingAs($user)
            ->from(route('password.request'))
            ->post(route('password.email'), ['email' => $user->email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHas('status', 'Tautan pengaturan ulang telah dikirim ke alamat email akun.');

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_authenticated_user_can_reset_password_from_a_valid_link(): void
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $this->actingAs($user)
            ->get(route('password.reset', ['token' => $token, 'email' => $user->email]))
            ->assertOk()
            ->assertViewIs('auth.reset-password');

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'NewPassword123!',
            'password_confirmation' => 'NewPassword123!',
        ])
            ->assertRedirect(route('login'))
            ->assertSessionHas('status', 'Kata sandi berhasil diubah. Silakan masuk.');

        $this->assertGuest();

        $this->post(route('login.store'), [
            'login' => $user->email,
            'password' => 'NewPassword123!',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_password_reset_does_not_report_success_when_the_mailer_only_logs_messages(): void
    {
        config(['mail.default' => 'log']);
        $user = User::factory()->create();
        Notification::fake();

        $this->from(route('password.request'))
            ->post(route('password.email'), ['email' => $user->email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHasErrors('email');

        Notification::assertNothingSent();
    }

    public function test_unregistered_password_reset_request_keeps_the_response_generic(): void
    {
        config(['mail.default' => 'smtp']);
        Notification::fake();

        $this->from(route('password.request'))
            ->post(route('password.email'), ['email' => 'unknown@example.com'])
            ->assertRedirect(route('password.request'))
            ->assertSessionHas(
                'status',
                'Jika alamat email terdaftar, tautan untuk mengatur ulang kata sandi akan segera dikirim.'
            );

        Notification::assertNothingSent();
    }

    private function configureGoogle(): void
    {
        config([
            'services.google.client_id' => 'google-client-id',
            'services.google.client_secret' => 'google-client-secret',
            'services.google.redirect' => route('google.callback'),
        ]);
    }

    /**
     * @param  array<string, mixed>  $profile
     */
    private function fakeGoogleProfile(array $profile): void
    {
        Http::preventStrayRequests();
        Http::fake([
            'https://oauth2.googleapis.com/token' => Http::response([
                'access_token' => 'google-access-token',
                'token_type' => 'Bearer',
            ]),
            'https://openidconnect.googleapis.com/v1/userinfo' => Http::response($profile),
        ]);
    }
}
