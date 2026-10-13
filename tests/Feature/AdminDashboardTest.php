<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_admin_dashboard(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_writer_cannot_access_admin_dashboard(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);

        $this->actingAs($writer)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_login_redirects_to_the_admin_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'username' => 'editoradmin',
            'password' => 'AdminPassword123!',
        ]);

        $this->post(route('login.store'), [
            'login' => $admin->username,
            'password' => 'AdminPassword123!',
        ])->assertRedirect(route('admin.dashboard'));
    }

    public function test_admin_dashboard_shows_article_totals_and_recent_review_queue(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $writer = User::factory()->create(['role' => 'writer']);

        $writer->articles()->create([
            'title' => 'Artikel menunggu',
            'slug' => 'artikel-menunggu',
            'summary' => 'Menunggu pemeriksaan.',
            'category' => 'Berita',
            'status' => 'review',
            'author_name' => $writer->name,
        ]);
        $writer->articles()->create([
            'title' => 'Artikel terbit',
            'slug' => 'artikel-terbit',
            'summary' => 'Sudah diterbitkan.',
            'category' => 'Berita',
            'status' => 'published',
            'author_name' => $writer->name,
        ]);
        $writer->articles()->create([
            'title' => 'Artikel revisi',
            'slug' => 'artikel-revisi',
            'summary' => 'Perlu perbaikan.',
            'category' => 'Berita',
            'status' => 'rejected',
            'author_name' => $writer->name,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertViewHas('totalArtikel', 3)
            ->assertViewHas('menungguTinjauan', 1)
            ->assertViewHas('totalTerbit', 1)
            ->assertViewHas('perluRevisi', 1)
            ->assertViewHas('totalPenulis', 1)
            ->assertSee('Dashboard Admin')
            ->assertSee('Menunggu Tinjauan')
            ->assertSee('Penulis Terdaftar')
            ->assertSee('Artikel menunggu')
            ->assertSee('Artikel terbit')
            ->assertSee('Artikel revisi')
            ->assertSee(route('admin.articles.index', ['status' => 'review']));
    }

    public function test_admin_can_filter_the_review_list_by_status(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $writer = User::factory()->create(['role' => 'writer']);
        $writer->articles()->create([
            'title' => 'Naskah untuk direview',
            'slug' => 'naskah-untuk-direview',
            'summary' => 'Sedang menunggu tinjauan.',
            'category' => 'Berita',
            'status' => 'review',
            'author_name' => $writer->name,
        ]);
        $writer->articles()->create([
            'title' => 'Draft yang belum dikirim',
            'slug' => 'draft-yang-belum-dikirim',
            'summary' => 'Masih berupa draft.',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
        ]);

        $this->actingAs($admin)
            ->get(route('admin.articles.index', ['status' => 'review']))
            ->assertOk()
            ->assertSee('Naskah untuk direview')
            ->assertDontSee('Draft yang belum dikirim')
            ->assertSee('Menunggu tinjauan');
    }
}
