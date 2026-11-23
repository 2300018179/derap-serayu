<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_writer_and_admin_can_open_their_profile(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($writer)->get(route('penulis.profile'))
            ->assertOk()->assertSee($writer->email)
            ->assertSee('Artikel Saya')
            ->assertSee('Tulis Artikel');

        foreach (['penulis.dashboard', 'penulis.articles.index', 'penulis.artikel.create'] as $name) {
            $this->actingAs($writer)->get(route($name))
                ->assertOk()
                ->assertSee('account-profile-link', false)
                ->assertSee(route('penulis.profile'), false);
        }

        $this->actingAs($admin)->get(route('admin.profile'))
            ->assertOk()->assertSee($admin->email);
    }

    public function test_reader_cannot_open_writer_or_admin_profile(): void
    {
        $reader = User::factory()->create(['role' => 'reader']);

        $this->actingAs($reader)->get(route('penulis.profile'))->assertForbidden();
        $this->actingAs($reader)->get(route('admin.profile'))->assertForbidden();
    }

    public function test_reader_profile_uses_the_public_website_theme(): void
    {
        $reader = User::factory()->create(['role' => 'reader']);

        $this->actingAs($reader)->get(route('pembaca.profile'))
            ->assertOk()
            ->assertSee($reader->email)
            ->assertSee('Profil <span>Pembaca</span>', false)
            ->assertSee('Informasi Akun')
            ->assertSee('class="main-header"', false)
            ->assertSee('class="page-intro"', false)
            ->assertSee(route('pembaca.saved.index'), false)
            ->assertDontSee('id="sidebar"', false);
    }

    public function test_admin_and_editor_profiles_keep_the_account_workspace_layout(): void
    {
        $profiles = [
            ['role' => 'admin', 'route' => 'admin.profile', 'label' => 'Akun Administrator'],
            ['role' => 'editor', 'route' => 'editor.profile', 'label' => 'Akun Editor'],
        ];

        foreach ($profiles as $profile) {
            $user = User::factory()->create(['role' => $profile['role']]);

            $this->actingAs($user)->get(route($profile['route']))
                ->assertOk()
                ->assertSee($user->email)
                ->assertSee($profile['label'])
                ->assertSee('class="pf-hero"', false)
                ->assertSee('class="pf-layout"', false)
                ->assertSee('Informasi Akun')
                ->assertSeeInOrder([
                    'href="'.route('editor.articles.create').'"',
                    'Tulis Artikel',
                    'href="'.route('editor.articles.index').'"',
                    'Semua Artikel',
                    'href="'.route('editor.articles.review').'"',
                    'Tinjauan Artikel',
                ], false)
                ->assertSeeInOrder([
                    'href="'.route('editor.profile').'"',
                    'class="nav-link active"',
                    'Profil Saya',
                ], false)
                ->assertDontSee(route('pembaca.saved.index'), false);
        }
    }
}
