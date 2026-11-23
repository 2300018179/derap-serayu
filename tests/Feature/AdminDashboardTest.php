<?php

namespace Tests\Feature;

use App\Models\ArticleComment;
use App\Models\ArticleLike;
use App\Models\NewsletterSubscription;
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

    public function test_admin_login_redirects_to_the_unified_admin_dashboard(): void
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

    public function test_editor_login_redirects_to_the_editor_dashboard(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);

        $this->post(route('login.store'), [
            'login' => $editor->email,
            'password' => 'password',
        ])->assertRedirect(route('editor.dashboard'));

        $this->get(route('editor.dashboard'))
            ->assertOk()
            ->assertViewIs('editor.dashboard');
    }

    public function test_admin_dashboard_shows_administration_metrics_and_editorial_activity(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $writer = User::factory()->create(['role' => 'writer']);
        User::factory()->create(['role' => 'reader', 'is_active' => false]);

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
            ->assertViewIs('admin.dashboard')
            ->assertViewHas('totalArtikel', 3)
            ->assertViewHas('menungguTinjauan', 1)
            ->assertViewHas('totalTerbit', 1)
            ->assertViewHas('perluRevisi', 1)
            ->assertViewHas('totalPengguna', 3)
            ->assertViewHas('penggunaAktif', 2)
            ->assertViewHas('totalPenulis', 1)
            ->assertViewHas('antreanTinjauan', fn ($articles) => $articles->count() === 1)
            ->assertViewHas('artikelTerbaru', fn ($articles) => $articles->count() === 3)
            ->assertSee('<nav class="nav-menu">', false)
            ->assertSee('class="footer admin-workspace-footer"', false)
            ->assertSee('.admin-workspace-footer', false)
            ->assertSee('background: transparent !important;', false)
            ->assertSee('Menu Editorial')
            ->assertSee(route('editor.articles.create'), false)
            ->assertSee(route('editor.articles.index'), false)
            ->assertSee(route('editor.articles.review'), false)
            ->assertSee(route('editor.profile'), false)
            ->assertSee('editor-info')
            ->assertDontSee('Administrasi dan Redaksi')
            ->assertSee('Dashboard Admin')
            ->assertSee('Kelola Pengguna')
            ->assertSee(route('admin.settings.edit'))
            ->assertSee('Pengaturan Website')
            ->assertSee('Artikel menunggu')
            ->assertSee('Artikel terbit')
            ->assertSee('Artikel revisi');
    }

    public function test_admin_workspace_pages_share_the_header_without_top_right_account_controls(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $routes = [
            'admin.dashboard',
            'admin.users.index',
            'admin.users.create',
            'admin.settings.edit',
            'editor.articles.create',
            'editor.articles.index',
            'admin.articles.index',
            'admin.profile',
        ];

        foreach ($routes as $routeName) {
            $this->actingAs($admin)
                ->get(route($routeName))
                ->assertOk()
                ->assertSee('<header class="topbar">', false)
                ->assertSee('class="date-info"', false)
                ->assertSee('<nav class="nav-menu">', false)
                ->assertSee('Dashboard Admin')
                ->assertDontSee('id="dashboardSearch"', false)
                ->assertDontSee('id="adminAccountButton"', false)
                ->assertDontSee('id="adminAccountDropdown"', false);
        }
    }

    public function test_admin_dashboard_summarizes_website_content_and_engagement(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer']);
        $reader = User::factory()->create(['role' => 'reader']);

        $firstPublishedArticle = $writer->articles()->create([
            'title' => 'Cerita dari Batur',
            'slug' => 'cerita-dari-batur',
            'summary' => 'Cerita pertama.',
            'category' => 'Berita',
            'kecamatan' => 'Batur',
            'status' => 'published',
            'author_name' => $writer->name,
            'views' => 15,
        ]);
        $writer->articles()->create([
            'title' => 'Budaya Batur',
            'slug' => 'budaya-batur',
            'summary' => 'Cerita kedua.',
            'category' => 'Budaya',
            'kecamatan' => 'Batur',
            'status' => 'published',
            'author_name' => $writer->name,
            'views' => 7,
        ]);
        $writer->articles()->create([
            'title' => 'Naskah Wanadadi',
            'slug' => 'naskah-wanadadi',
            'summary' => 'Masih menunggu tinjauan.',
            'category' => 'Berita',
            'kecamatan' => 'Wanadadi',
            'status' => 'review',
            'author_name' => $writer->name,
            'views' => 4,
        ]);

        ArticleComment::create([
            'article_id' => $firstPublishedArticle->id,
            'user_id' => $reader->id,
            'content' => 'Cerita yang menarik.',
        ]);
        ArticleLike::create([
            'article_id' => $firstPublishedArticle->id,
            'user_id' => $reader->id,
        ]);
        $reader->savedArticles()->attach($firstPublishedArticle->id);
        NewsletterSubscription::create(['email' => 'pembaca@example.test']);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertViewHas('totalPengguna', 4)
            ->assertViewHas('totalAdmin', 1)
            ->assertViewHas('totalEditor', 1)
            ->assertViewHas('totalPenulis', 1)
            ->assertViewHas('totalPembaca', 1)
            ->assertViewHas('jumlahKecamatan', count(config('kecamatan')))
            ->assertViewHas('kecamatanDenganArtikel', 1)
            ->assertViewHas(
                'kecamatanTeratas',
                fn ($districts) => $districts->contains(
                    fn (array $district) => $district['nama'] === 'Batur'
                        && $district['jumlahArtikel'] === 2
                )
            )
            ->assertViewHas(
                'kecamatanBelumTerjangkau',
                fn ($districts) => $districts->count() === 5
                    && $districts->contains(fn (array $district) => $district['nama'] === 'Banjarnegara')
                    && ! $districts->contains(fn (array $district) => $district['nama'] === 'Batur')
            )
            ->assertViewHas('totalTayangan', 26)
            ->assertViewHas('totalKategori', 2)
            ->assertViewHas('totalKomentar', 1)
            ->assertViewHas('totalSuka', 1)
            ->assertViewHas('totalArtikelTersimpan', 1)
            ->assertViewHas('totalPelangganNewsletter', 1)
            ->assertSee('Ringkasan Website')
            ->assertSee('Total Kecamatan')
            ->assertSee('Kecamatan dengan Artikel')
            ->assertSee('Total Tayangan')
            ->assertSee('Pelanggan Newsletter')
            ->assertSee('Sebaran Artikel per Kecamatan')
            ->assertSee('Artikel terbit terbanyak')
            ->assertSee('Belum memiliki artikel terbit')
            ->assertSee('Batur')
            ->assertSee('2 artikel')
            ->assertDontSee('Panduan Editorial');
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
            ->assertSee('Menunggu tinjauan')
            ->assertSee('class="footer admin-workspace-footer"', false)
            ->assertSee('.admin-workspace-footer', false)
            ->assertSee('background: transparent !important;', false);
    }

    public function test_admin_search_and_status_counts_cover_all_pages(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $writer = User::factory()->create(['role' => 'writer']);

        foreach (['Banjir Dieng' => 'review', 'Kuliner Serayu' => 'review', 'Draf Satu' => 'draft', 'Draf Dua' => 'draft'] as $title => $status) {
            $writer->articles()->create([
                'title' => $title,
                'slug' => str($title)->slug()->toString(),
                'summary' => 'Ringkasan.',
                'category' => 'Berita',
                'status' => $status,
                'author_name' => $writer->name,
            ]);
        }

        $this->actingAs($admin)
            ->get(route('admin.articles.index', ['status' => 'review', 'search' => 'Dieng']))
            ->assertOk()
            ->assertSee('Banjir Dieng')
            ->assertDontSee('Kuliner Serayu')
            ->assertViewHas('jumlahDraft', 2)
            ->assertViewHas('jumlahReview', 2);
    }

    public function test_admin_dashboard_shows_the_revision_count(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $writer = User::factory()->create(['role' => 'writer']);
        $writer->articles()->createMany(array_map(fn (int $i): array => [
            'title' => "Revisi {$i}",
            'slug' => "revisi-{$i}",
            'summary' => 'Ringkasan.',
            'category' => 'Berita',
            'status' => 'rejected',
            'author_name' => $writer->name,
        ], [1, 2, 3]));

        $this->actingAs($admin)
            ->get(route('editor.articles.index'))
            ->assertOk()
            ->assertViewHas('totalRevisi', 3)
            ->assertSee('3')
            ->assertSee('Perlu Revisi');
    }
}
