<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\NewsletterSubscription;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeReaderExperienceTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_displays_published_articles_and_working_navigation_links(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $latestArticle = $this->createArticle($author, [
            'title' => 'Cerita Dieng Terbaru',
            'slug' => 'cerita-dieng-terbaru',
            'summary' => 'Kabar terbaru dari Dieng.',
            'published_at' => now(),
        ]);
        $popularArticle = $this->createArticle($author, [
            'title' => 'Artikel Paling Banyak Dibaca',
            'slug' => 'artikel-paling-banyak-dibaca',
            'views' => 250,
            'published_at' => now()->subDays(2),
        ]);
        $draftArticle = $this->createArticle($author, [
            'title' => 'Naskah yang Belum Terbit',
            'slug' => 'naskah-belum-terbit',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('Cerita Dieng Terbaru')
            ->assertSee(route('articles.show', $latestArticle->slug), false)
            ->assertSee('Artikel Paling Banyak Dibaca')
            ->assertSee(route('articles.show', $popularArticle->slug), false)
            ->assertSee(route('cerita'), false)
            ->assertSee(route('sosok'), false)
            ->assertSee(route('articles.index'), false)
            ->assertSee(route('login'), false)
            ->assertSee(route('register.pembaca'), false)
            ->assertSee('Masuk')
            ->assertSee('Daftar')
            ->assertSee('fa-water', false)
            ->assertSee('Humor')
            ->assertSee(route('humor'), false)
            ->assertDontSee($draftArticle->title)
            ->assertDontSee('href="#"', false);
    }

    public function test_humor_menu_opens_articles_matching_the_humor_category(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $humorArticle = $this->createArticle($author, [
            'title' => 'Humor Banjarnegara',
            'slug' => 'humor-banjarnegara',
            'category' => 'Humor',
        ]);
        $otherArticle = $this->createArticle($author, [
            'title' => 'Berita Banjarnegara',
            'slug' => 'berita-banjarnegara',
            'category' => 'Berita',
        ]);

        $response = $this->get(route('humor'));

        $response->assertOk()
            ->assertViewIs('humor')
            ->assertSee($humorArticle->title)
            ->assertDontSee($otherArticle->title);
    }

    public function test_homepage_categories_and_statistics_reflect_published_content_and_readers(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $this->createArticle($author, [
            'title' => 'Berita Pertama',
            'slug' => 'berita-pertama',
            'category' => 'Berita',
        ]);
        $this->createArticle($author, [
            'title' => 'Cerita Pertama',
            'slug' => 'cerita-pertama',
            'category' => 'Cerita',
        ]);
        $this->createArticle($author, [
            'title' => 'Draft Tersembunyi',
            'slug' => 'draft-tersembunyi',
            'category' => 'Draft',
            'status' => 'draft',
        ]);
        User::factory()->count(2)->create(['role' => 'reader']);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee(route('articles.index', ['category' => 'Berita']), false)
            ->assertSee(route('articles.index', ['category' => 'Cerita']), false)
            ->assertSee('Artikel Terbit')
            ->assertSee('Kategori')
            ->assertSee('Pembaca')
            ->assertSee('data-stat="published-articles">2</strong>', false)
            ->assertSee('data-stat="published-categories">2</strong>', false)
            ->assertSee('data-stat="readers">2</strong>', false)
            ->assertSee('1 artikel')
            ->assertDontSee('Draft Tersembunyi')
            ->assertDontSee('Pemerintahan');
    }

    public function test_homepage_shows_clear_empty_states_when_there_is_no_published_content(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('id="forecastToggle"', false)
            ->assertSee('aria-controls="forecastList"', false)
            ->assertSee('Lihat Detail 24 Jam')
            ->assertSee('startIndex + 24', false)
            ->assertSee('Belum ada artikel populer.')
            ->assertSee('Belum ada artikel yang diterbitkan.')
            ->assertSee('Kategori akan tampil setelah artikel pertama diterbitkan.')
            ->assertSee('Kategori populer akan tampil setelah artikel diterbitkan.')
            ->assertSee('data-stat="published-articles">0</strong>', false)
            ->assertSee('data-stat="published-categories">0</strong>', false);
    }

    public function test_article_search_only_returns_matching_published_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $matchingArticle = $this->createArticle($author, [
            'title' => 'Panduan Wisata Dieng',
            'slug' => 'panduan-wisata-dieng',
            'summary' => 'Pilihan perjalanan untuk pembaca.',
        ]);
        $otherArticle = $this->createArticle($author, [
            'title' => 'Cerita dari Kota',
            'slug' => 'cerita-dari-kota',
            'summary' => 'Cerita warga setempat.',
        ]);
        $taggedArticle = $this->createArticle($author, [
            'title' => 'Tradisi Ruwatan',
            'slug' => 'tradisi-ruwatan',
            'summary' => 'Kisah tradisi yang terus dijaga.',
            'tags' => ['Dieng'],
        ]);
        $draftArticle = $this->createArticle($author, [
            'title' => 'Draft Wisata Dieng',
            'slug' => 'draft-wisata-dieng',
            'status' => 'draft',
        ]);

        $response = $this->get(route('articles.index', ['q' => 'Dieng']));

        $response->assertOk()
            ->assertSee($matchingArticle->title)
            ->assertSee($taggedArticle->title)
            ->assertDontSee($otherArticle->title)
            ->assertDontSee($draftArticle->title)
            ->assertSee('Hasil pencarian untuk:');
    }

    public function test_category_filter_returns_only_articles_in_the_selected_category(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $matchingArticle = $this->createArticle($author, [
            'title' => 'Cerita tentang Banjarnegara',
            'slug' => 'cerita-tentang-banjarnegara',
            'category' => 'Cerita',
        ]);
        $otherCategoryArticle = $this->createArticle($author, [
            'title' => 'Cerita Berita Banjarnegara',
            'slug' => 'cerita-berita-banjarnegara',
            'category' => 'Berita',
        ]);

        $response = $this->get(route('articles.index', ['category' => 'Cerita']));

        $response->assertOk()
            ->assertSee($matchingArticle->title)
            ->assertDontSee($otherCategoryArticle->title)
            ->assertSee('Kategori:')
            ->assertSee('value="Cerita"', false);
    }

    public function test_category_filter_shows_a_relevant_empty_state_when_category_has_no_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $this->createArticle($author);

        $this->get(route('articles.index', ['category' => 'Humor']))
            ->assertOk()
            ->assertSee('Tidak ada artikel yang cocok dengan pencarian atau kategori yang dipilih.')
            ->assertDontSee('Belum ada artikel yang diterbitkan.');
    }

    public function test_footer_information_links_open_their_pages(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('information.privacy'), false)
            ->assertSee(route('information.terms'), false)
            ->assertSee(route('information.editorial'), false);

        $this->get(route('information.privacy'))
            ->assertOk()
            ->assertSee('Kebijakan Privasi')
            ->assertSee('Artikel tersimpan');

        $this->get(route('information.terms'))
            ->assertOk()
            ->assertSee('Syarat &amp; Ketentuan', false)
            ->assertSee('Akun pembaca bersifat opsional');

        $this->get(route('information.editorial'))
            ->assertOk()
            ->assertSee('Pedoman Media Siber')
            ->assertSee('Buka situs resmi Banjarnegara');
    }

    public function test_about_page_is_available_and_linked_from_reader_navigation(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('about'), false);

        $this->get(route('articles.index'))
            ->assertOk()
            ->assertSee(route('about'), false);

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Tentang Derap Serayu')
            ->assertSee('Banjarnegara')
            ->assertSee('Membaca berita tidak perlu akun')
            ->assertSee(route('articles.index'), false)
            ->assertSee('aria-current="page"', false);
    }

    public function test_cerita_page_uses_reader_navigation_links_and_search_routes(): void
    {
        $this->get(route('cerita'))
            ->assertOk()
            ->assertSee('name="q"', false)
            ->assertSee('action="'.route('articles.index').'"', false)
            ->assertSee(route('articles.index', ['q' => 'Tradisi']), false)
            ->assertSee(route('about'), false)
            ->assertSee(route('information.privacy'), false)
            ->assertSee(route('information.terms'), false)
            ->assertSee(route('information.editorial'), false)
            ->assertSee('action="'.route('newsletter.subscribe').'"', false)
            ->assertSee('name="_token"', false)
            ->assertSee('https://www.instagram.com/kabupatenbanjarnegara/', false)
            ->assertSee('https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/', false)
            ->assertSee('https://www.youtube.com/@pemkabbanjarnegara', false)
            ->assertSee('https://www.tiktok.com/@pemkabbanjarnegara', false)
            ->assertSee('https://x.com/pemkab_bna', false)
            ->assertDontSee('href="#"', false)
            ->assertDontSee('alert(', false);
    }

    public function test_cerita_page_renders_published_culture_articles_from_the_database(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $popularStory = $this->createArticle($author, [
            'title' => 'Tradisi Dieng yang Populer',
            'slug' => 'tradisi-dieng-populer',
            'category' => 'Cerita & Budaya',
            'views' => 250,
            'published_at' => now()->subDays(3),
        ]);
        $latestStory = $this->createArticle($author, [
            'title' => 'Kisah Budaya Terbaru',
            'slug' => 'kisah-budaya-terbaru',
            'category' => 'Cerita & Budaya',
            'views' => 2,
            'published_at' => now(),
        ]);
        $draftStory = $this->createArticle($author, [
            'title' => 'Draft Cerita Belum Terbit',
            'slug' => 'draft-cerita-belum-terbit',
            'category' => 'Cerita & Budaya',
            'status' => 'draft',
            'published_at' => null,
        ]);
        $unrelatedArticle = $this->createArticle($author, [
            'title' => 'Berita Bukan Cerita Budaya',
            'slug' => 'berita-bukan-cerita-budaya',
            'category' => 'Berita',
        ]);

        $response = $this->get(route('cerita'));

        $response->assertOk()
            ->assertSee($popularStory->title)
            ->assertSee(route('articles.show', $popularStory->slug), false)
            ->assertSee($latestStory->title)
            ->assertSee(route('articles.show', $latestStory->slug), false)
            ->assertDontSee($draftStory->title)
            ->assertDontSee($unrelatedArticle->title)
            ->assertDontSee('Ruwatan Desa: Tradisi yang Menyatukan Masyarakat');

        $response->assertViewHas('featuredStory', $popularStory)
            ->assertViewHas('popularStories', function ($stories) use ($popularStory, $latestStory): bool {
                return $stories->modelKeys() === [$popularStory->id, $latestStory->id];
            })
            ->assertViewHas('stories', function ($stories) use ($latestStory, $popularStory): bool {
                return $stories->getCollection()->modelKeys() === [$latestStory->id, $popularStory->id];
            });
    }

    public function test_cerita_page_shows_an_empty_state_when_no_published_culture_articles_exist(): void
    {
        $this->get(route('cerita'))
            ->assertOk()
            ->assertSee('Cerita & Budaya Terbaru')
            ->assertSee('0 artikel terbit')
            ->assertSee('Belum ada artikel Cerita & Budaya yang diterbitkan.')
            ->assertSee('Belum ada cerita populer yang diterbitkan.')
            ->assertDontSee('Ruwatan Desa: Tradisi yang Menyatukan Masyarakat');
    }

    public function test_opinion_page_uses_reader_navigation_search_and_working_footer_links(): void
    {
        $this->get(route('opini'))
            ->assertOk()
            ->assertSee('src="'.asset('images/logo.png').'"', false)
            ->assertSee('name="q"', false)
            ->assertSee('action="'.route('articles.index').'"', false)
            ->assertSee(route('home'), false)
            ->assertSee(route('about'), false)
            ->assertSee(route('cerita'), false)
            ->assertSee(route('register.penulis'), false)
            ->assertSee('Opini Terbaru')
            ->assertSee('0 artikel terbit')
            ->assertSee('Belum ada opini yang diterbitkan')
            ->assertSee(route('information.privacy'), false)
            ->assertSee(route('information.terms'), false)
            ->assertSee(route('information.editorial'), false)
            ->assertSee('action="'.route('newsletter.subscribe').'"', false)
            ->assertSee('name="_token"', false)
            ->assertSee('https://www.instagram.com/kabupatenbanjarnegara/', false)
            ->assertSee('https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/', false)
            ->assertSee('https://www.youtube.com/@pemkabbanjarnegara', false)
            ->assertSee('https://www.tiktok.com/@pemkabbanjarnegara', false)
            ->assertSee('https://x.com/pemkab_bna', false)
            ->assertDontSee('href="#"', false)
            ->assertDontSee('24°C')
            ->assertDontSee('Selasa, 6 Oktober 2026');
    }

    public function test_opinion_page_uses_published_opinion_articles_and_links_to_their_detail_pages(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $featuredOpinion = $this->createArticle($author, [
            'title' => 'Gagasan paling banyak dibaca',
            'slug' => 'gagasan-paling-banyak-dibaca',
            'category' => 'Opini',
            'views' => 250,
            'published_at' => now()->subDays(2),
        ]);
        $latestOpinion = $this->createArticle($author, [
            'title' => 'Opini terbaru Banjarnegara',
            'slug' => 'opini-terbaru-banjarnegara',
            'category' => 'Opini',
            'views' => 5,
            'published_at' => now(),
        ]);
        $draftOpinion = $this->createArticle($author, [
            'title' => 'Opini yang belum diterbitkan',
            'slug' => 'opini-belum-diterbitkan',
            'category' => 'Opini',
            'status' => 'draft',
            'published_at' => null,
        ]);
        $reviewOpinion = $this->createArticle($author, [
            'title' => 'Opini menunggu peninjauan',
            'slug' => 'opini-menunggu-peninjauan',
            'category' => 'Opini',
            'status' => 'review',
            'published_at' => null,
        ]);
        $unrelatedArticle = $this->createArticle($author, [
            'title' => 'Berita bukan opini',
            'slug' => 'berita-bukan-opini',
            'category' => 'Berita',
        ]);

        $response = $this->get(route('opini'));

        $response->assertOk()
            ->assertSee($featuredOpinion->title)
            ->assertSee($latestOpinion->title)
            ->assertSee($featuredOpinion->summary)
            ->assertSee(route('articles.show', $featuredOpinion->slug), false)
            ->assertSee(route('articles.show', $latestOpinion->slug), false)
            ->assertDontSee($draftOpinion->title)
            ->assertDontSee($reviewOpinion->title)
            ->assertDontSee($unrelatedArticle->title)
            ->assertDontSee('Membangun Banjarnegara dari Potensi Lokal');

        $response->assertViewHas('featuredOpinion', $featuredOpinion)
            ->assertViewHas('popularOpinions', function ($opinions) use ($latestOpinion): bool {
                return $opinions->modelKeys() === [$latestOpinion->id];
            })
            ->assertViewHas('opinions', function ($opinions) use ($latestOpinion, $featuredOpinion): bool {
                return $opinions->getCollection()->modelKeys() === [$latestOpinion->id, $featuredOpinion->id]
                    && $opinions->total() === 2;
            });
    }

    public function test_opinion_page_paginates_recent_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        for ($index = 1; $index <= 9; $index++) {
            $this->createArticle($author, [
                'title' => "Opini paginasi {$index}",
                'slug' => "opini-paginasi-{$index}",
                'category' => 'Opini',
                'published_at' => now()->subDays($index),
            ]);
        }

        $this->get(route('opini', ['page' => 2]))
            ->assertOk()
            ->assertSee('Opini paginasi 9')
            ->assertViewHas('opinions', function ($opinions): bool {
                return $opinions->total() === 9
                    && $opinions->currentPage() === 2
                    && $opinions->getCollection()->pluck('slug')->all() === ['opini-paginasi-9'];
            });
    }

    public function test_writer_can_open_the_opinion_submission_form_from_the_opinion_page(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);

        $this->actingAs($writer)
            ->get(route('opini'))
            ->assertOk()
            ->assertSee('Tulis Opini')
            ->assertSee(route('penulis.artikel.create'), false)
            ->assertDontSee(route('register.penulis'), false);
    }

    public function test_reader_sees_that_opinion_submissions_require_a_writer_account(): void
    {
        $reader = User::factory()->create(['role' => 'reader']);

        $this->actingAs($reader)
            ->get(route('opini'))
            ->assertOk()
            ->assertSee('Pengiriman opini tersedia untuk akun penulis.')
            ->assertDontSee('Tulis Opini');
    }

    public function test_sosok_page_uses_reader_navigation_search_and_working_footer_links(): void
    {
        $this->get(route('sosok'))
            ->assertOk()
            ->assertSee('src="'.asset('images/logo.png').'"', false)
            ->assertSee('name="q"', false)
            ->assertSee('action="'.route('articles.index').'"', false)
            ->assertSee(route('home'), false)
            ->assertSee(route('about'), false)
            ->assertSee(route('cerita'), false)
            ->assertSee(route('opini'), false)
            ->assertSee(route('articles.index', ['category' => 'Sosok']), false)
            ->assertSee(route('register.pembaca'), false)
            ->assertSee(route('information.privacy'), false)
            ->assertSee(route('information.terms'), false)
            ->assertSee(route('information.editorial'), false)
            ->assertSee('action="'.route('newsletter.subscribe').'"', false)
            ->assertSee('name="_token"', false)
            ->assertSee('https://www.instagram.com/kabupatenbanjarnegara/', false)
            ->assertSee('https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/', false)
            ->assertSee('https://www.youtube.com/@pemkabbanjarnegara', false)
            ->assertSee('https://www.tiktok.com/@pemkabbanjarnegara', false)
            ->assertSee('https://x.com/pemkab_bna', false)
            ->assertDontSee('href="#"', false)
            ->assertDontSee('24°C')
            ->assertDontSee('Selasa, 6 Oktober 2026');
    }

    public function test_sosok_page_displays_only_published_sosok_articles_and_links_to_details(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $featuredSosok = $this->createArticle($author, [
            'title' => 'Tokoh paling banyak dibaca',
            'slug' => 'tokoh-paling-banyak-dibaca',
            'category' => 'Sosok',
            'views' => 300,
            'published_at' => now()->subDays(3),
        ]);
        $latestSosok = $this->createArticle($author, [
            'title' => 'Kisah tokoh terbaru',
            'slug' => 'kisah-tokoh-terbaru',
            'category' => 'Sosok',
            'views' => 5,
            'published_at' => now(),
        ]);
        $otherSosok = $this->createArticle($author, [
            'title' => 'Tokoh populer lainnya',
            'slug' => 'tokoh-populer-lainnya',
            'category' => 'Sosok',
            'views' => 120,
            'published_at' => now()->subDay(),
        ]);
        $draftSosok = $this->createArticle($author, [
            'title' => 'Tokoh yang belum diterbitkan',
            'slug' => 'tokoh-belum-diterbitkan',
            'category' => 'Sosok',
            'status' => 'draft',
            'published_at' => null,
        ]);
        $reviewSosok = $this->createArticle($author, [
            'title' => 'Tokoh yang menunggu tinjauan',
            'slug' => 'tokoh-menunggu-tinjauan',
            'category' => 'Sosok',
            'status' => 'review',
            'published_at' => null,
        ]);
        $unrelatedArticle = $this->createArticle($author, [
            'title' => 'Artikel berita bukan sosok',
            'slug' => 'artikel-berita-bukan-sosok',
            'category' => 'Berita',
        ]);

        $response = $this->get(route('sosok'));

        $response->assertOk()
            ->assertSee($featuredSosok->title)
            ->assertSee($latestSosok->title)
            ->assertSee($otherSosok->title)
            ->assertSee(route('articles.show', $featuredSosok->slug), false)
            ->assertSee(route('articles.show', $latestSosok->slug), false)
            ->assertSee(route('articles.index', ['category' => 'Sosok']), false)
            ->assertDontSee($draftSosok->title)
            ->assertDontSee($reviewSosok->title)
            ->assertDontSee($unrelatedArticle->title)
            ->assertDontSee('Ki Seno,');

        $response->assertViewHas('featuredSosok', $featuredSosok)
            ->assertViewHas('popularSosok', function ($sosokArticles) use ($otherSosok, $latestSosok): bool {
                return $sosokArticles->modelKeys() === [$otherSosok->id, $latestSosok->id];
            })
            ->assertViewHas('sosokArticles', function ($sosokArticles) use ($latestSosok, $otherSosok, $featuredSosok): bool {
                return $sosokArticles->getCollection()->modelKeys() === [
                    $latestSosok->id,
                    $otherSosok->id,
                    $featuredSosok->id,
                ] && $sosokArticles->total() === 3;
            });

        $this->get(route('articles.show', $latestSosok->slug))
            ->assertOk()
            ->assertSee($latestSosok->title);
    }

    public function test_sosok_page_paginates_published_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        for ($index = 1; $index <= 9; $index++) {
            $this->createArticle($author, [
                'title' => "Tokoh paginasi {$index}",
                'slug' => "tokoh-paginasi-{$index}",
                'category' => 'Sosok',
                'published_at' => now()->subDays($index),
            ]);
        }

        $this->get(route('sosok', ['page' => 2]))
            ->assertOk()
            ->assertSee('Tokoh paginasi 9')
            ->assertSee('Halaman 2 dari 2')
            ->assertViewHas('sosokArticles', function ($sosokArticles): bool {
                return $sosokArticles->total() === 9
                    && $sosokArticles->currentPage() === 2
                    && $sosokArticles->getCollection()->pluck('slug')->all() === ['tokoh-paginasi-9'];
            });
    }

    public function test_sosok_page_shows_an_empty_state_without_published_sosok_articles(): void
    {
        $this->get(route('sosok'))
            ->assertOk()
            ->assertSee('Belum ada tokoh unggulan')
            ->assertSee('Belum ada sosok populer yang diterbitkan.')
            ->assertSee('Belum ada artikel Sosok yang diterbitkan.')
            ->assertSee(route('articles.index', ['category' => 'Sosok']), false)
            ->assertDontSee('Ki Seno,')
            ->assertDontSee('Siti Aminah,');
    }

    public function test_search_term_is_escaped_in_the_article_listing(): void
    {
        $response = $this->get(route('articles.index', [
            'q' => '<script>alert(1)</script>',
        ]));

        $response->assertOk()
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_invalid_search_length_returns_a_visible_validation_error(): void
    {
        $response = $this->from(route('home'))
            ->followingRedirects()
            ->get(route('articles.index', ['q' => str_repeat('a', 101)]));

        $response->assertOk()
            ->assertSee('Kata pencarian maksimal 100 karakter.');
    }

    public function test_newsletter_submission_saves_normalized_email_once(): void
    {
        $payload = ['email' => 'Pembaca@Example.com'];

        $this->from(route('home'))
            ->post(route('newsletter.subscribe'), $payload)
            ->assertRedirect(route('home'))
            ->assertSessionHas('newsletterStatus');

        $this->from(route('home'))
            ->post(route('newsletter.subscribe'), ['email' => 'pembaca@example.com'])
            ->assertRedirect(route('home'))
            ->assertSessionHas('newsletterStatus');

        $this->assertDatabaseHas('newsletter_subscriptions', [
            'email' => 'pembaca@example.com',
        ]);
        $this->assertDatabaseCount('newsletter_subscriptions', 1);

        $this->assertModelExists(NewsletterSubscription::firstOrFail());
    }

    public function test_newsletter_rejects_invalid_email_without_saving_a_subscription(): void
    {
        $response = $this->from(route('home'))
            ->post(route('newsletter.subscribe'), ['email' => 'bukan-email']);

        $response->assertRedirect(route('home'))
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('newsletter_subscriptions', 0);
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function createArticle(User $author, array $attributes = []): Article
    {
        return $author->articles()->create(array_merge([
            'title' => 'Judul artikel',
            'slug' => 'judul-artikel',
            'summary' => 'Ringkasan artikel untuk pembaca.',
            'category' => 'Berita',
            'status' => 'published',
            'author_name' => $author->name,
            'published_at' => now()->subDay(),
        ], $attributes));
    }
}
