<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminSiteSettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_and_update_website_settings(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['role' => 'admin']);
        $payload = $this->validSettings();
        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/lT8AAAAASUVORK5CYII=');
        $payload['logo'] = UploadedFile::fake()->createWithContent('logo.png', $png);
        $payload['banner'] = UploadedFile::fake()->createWithContent('banner.png', $png);

        $this->actingAs($admin)
            ->get(route('admin.settings.edit'))
            ->assertOk()
            ->assertSee('Pengaturan Website')
            ->assertSee('Tema Warna')
            ->assertSee('Kontak dan Media Sosial');

        $this->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHas('success', 'Pengaturan website berhasil disimpan.');

        $settings = SiteSetting::query()->findOrFail(1)->settings;

        $this->assertSame('Portal Serayu', $settings['site_name']);
        $this->assertSame('#123456', $settings['primary_color']);
        $this->assertSame('#abcdef', $settings['accent_color']);
        $this->assertSame('info@example.com', $settings['contact_email']);
        $this->assertTrue(Storage::disk('public')->exists($settings['logo_path']));
        $this->assertTrue(Storage::disk('public')->exists($settings['banner_path']));

        $logoUrl = Storage::disk('public')->url($settings['logo_path']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Portal Serayu | Berita Banjarnegara')
            ->assertSee('Cerita Banjarnegara')
            ->assertSee('info@example.com')
            ->assertSee('#123456')
            ->assertSee('#abcdef');

        $this->get(route('cerita'))
            ->assertOk()
            ->assertSee($logoUrl)
            ->assertSee('info@example.com')
            ->assertSee('https://instagram.com/serayu', false)
            ->assertSee('Dari Serayu untuk Banjarnegara.')
            ->assertSee('Hak cipta dilindungi.')
            ->assertSee('#123456')
            ->assertSee('#abcdef');
    }

    public function test_guest_is_redirected_and_non_admin_is_forbidden_from_settings(): void
    {
        $this->get(route('admin.settings.edit'))
            ->assertRedirect(route('login'));

        $writer = User::factory()->create(['role' => 'writer']);

        $this->actingAs($writer)
            ->get(route('admin.settings.edit'))
            ->assertForbidden();

        $this->put(route('admin.settings.update'), $this->validSettings())
            ->assertForbidden();
    }

    public function test_invalid_theme_color_is_rejected_without_saving_settings(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $payload = $this->validSettings();
        $payload['primary_color'] = 'red; background:url(javascript:alert(1))';

        $this->actingAs($admin)
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('primary_color');

        $this->assertDatabaseCount('site_settings', 0);
    }

    public function test_social_links_reject_non_http_protocols(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $payload = $this->validSettings();
        $payload['instagram_url'] = 'javascript:alert(1)';

        $this->actingAs($admin)
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('instagram_url');

        $this->assertDatabaseCount('site_settings', 0);
    }

    public function test_uploaded_svg_is_rejected(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $payload = $this->validSettings();
        $payload['logo'] = UploadedFile::fake()->create('logo.svg', 1, 'image/svg+xml');

        $this->actingAs($admin)
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('logo');

        $this->assertDatabaseCount('site_settings', 0);
    }

    public function test_admin_can_upload_and_remove_the_global_background_image(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['role' => 'admin']);
        $payload = $this->validSettings();
        $payload['background_mode'] = 'image';
        $payload['background_color'] = '#e8f0f8';
        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/lT8AAAAASUVORK5CYII=');
        $payload['background_image'] = UploadedFile::fake()->createWithContent('background.png', $png);

        $this->actingAs($admin)
            ->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'));

        $settings = SiteSetting::query()->findOrFail(1)->settings;
        $storedImagePath = $settings['background_image_path'];

        $this->assertSame('image', $settings['background_mode']);
        $this->assertSame('#e8f0f8', $settings['background_color']);
        $this->assertTrue(Storage::disk('public')->exists($storedImagePath));

        $payload = $this->validSettings();
        $payload['background_mode'] = 'image';

        $this->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'));

        $this->assertSame(
            $storedImagePath,
            SiteSetting::query()->findOrFail(1)->settings['background_image_path']
        );
        $this->assertTrue(Storage::disk('public')->exists($storedImagePath));

        $payload = $this->validSettings();
        $payload['remove_background_image'] = '1';

        $this->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'));

        $this->assertNull(SiteSetting::query()->findOrFail(1)->settings['background_image_path']);
        $this->assertFalse(Storage::disk('public')->exists($storedImagePath));
    }

    public function test_image_background_requires_a_saved_or_uploaded_image(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $payload = $this->validSettings();
        $payload['background_mode'] = 'image';

        $this->actingAs($admin)
            ->from(route('admin.settings.edit'))
            ->put(route('admin.settings.update'), $payload)
            ->assertRedirect(route('admin.settings.edit'))
            ->assertSessionHasErrors('background_image');

        $this->assertSame(
            ['Pilih gambar latar terlebih dahulu.'],
            session('errors')->get('background_image')
        );
        $this->assertDatabaseCount('site_settings', 0);
    }

    public function test_global_background_theme_is_rendered_for_every_authenticated_role(): void
    {
        Storage::fake('public');
        $backgroundPath = 'site/background.jpg';
        Storage::disk('public')->put($backgroundPath, 'image');
        SiteSetting::query()->create([
            'settings' => array_replace(SiteSetting::DEFAULT_SETTINGS, [
                'background_mode' => 'image',
                'background_color' => '#e8f0f8',
                'background_image_path' => $backgroundPath,
            ]),
        ]);

        foreach ([
            ['admin', [
                'admin.dashboard',
                'admin.articles.index',
                'admin.users.index',
                'admin.users.create',
                'admin.settings.edit',
                'admin.profile',
            ]],
            ['editor', ['editor.dashboard']],
            ['writer', ['penulis.dashboard']],
            ['reader', ['pembaca.saved.index']],
        ] as [$role, $routes]) {
            $user = User::factory()->create(['role' => $role]);
            $this->actingAs($user);

            foreach ($routes as $route) {
                $this->get(route($route))
                    ->assertOk()
                    ->assertSee('--site-background: #e8f0f8', false)
                    ->assertSee(Storage::disk('public')->url($backgroundPath), false);
            }
        }
    }

    /**
     * @return array<string, string>
     */
    private function validSettings(): array
    {
        return [
            'site_name' => 'Portal Serayu',
            'tagline' => 'Berita Banjarnegara',
            'primary_color' => '#123456',
            'accent_color' => '#abcdef',
            'background_mode' => 'color',
            'background_color' => '#f4fbfe',
            'home_eyebrow' => 'Cerita Banjarnegara',
            'home_heading' => 'Kabar terbaru dari Serayu',
            'home_description' => 'Informasi dan cerita dari Banjarnegara.',
            'contact_email' => 'info@example.com',
            'contact_phone' => '+62286123456',
            'instagram_url' => 'https://instagram.com/serayu',
            'facebook_url' => 'https://facebook.com/serayu',
            'youtube_url' => 'https://youtube.com/@serayu',
            'tiktok_url' => 'https://tiktok.com/@serayu',
            'x_url' => 'https://x.com/serayu',
            'footer_description' => 'Cerita Banjarnegara',
            'footer_quote' => 'Dari Serayu untuk Banjarnegara.',
            'footer_copyright' => 'Hak cipta dilindungi.',
        ];
    }
}
