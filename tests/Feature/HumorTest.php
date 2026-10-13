<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HumorTest extends TestCase
{
    use RefreshDatabase;

    public function test_humor_page_loads_successfully_and_displays_published_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $featured = $this->createHumorArticle($author, [
            'title' => 'Ketika Es Dawet Ayu Dipesan Gulanya Dipisah',
            'slug' => 'ketika-es-dawet-ayu-dipesan-gulanya-dipisah',
            'summary' => 'Kelakar penjual dawet ayu di alun-alun.',
            'views' => 900,
            'tags' => ['Guyonan Lokal', 'Anekdot Warga'],
            'published_at' => now()->subDay(),
        ]);

        $popular = $this->createHumorArticle($author, [
            'title' => 'Debat Filosofis Mendoan Basah vs Krispi',
            'slug' => 'debat-filosofis-mendoan-basah-vs-krispi',
            'summary' => 'Perdebatan sengit warga di pos ronda.',
            'views' => 750,
            'tags' => ['Guyonan Lokal', 'Satir Ringan'],
            'published_at' => now()->subDays(2),
        ]);

        $anecdote = $this->createHumorArticle($author, [
            'title' => 'Sensasi Menggigil di Puncak Sikunir Dieng',
            'slug' => 'sensasi-menggigil-di-puncak-sikunir-dieng',
            'summary' => 'Niat berpose estetik malah jadi mirip lemper.',
            'views' => 420,
            'tags' => ['Anekdot Warga', 'Humor Keseharian'],
            'published_at' => now()->subDays(3),
        ]);

        $draft = $this->createHumorArticle($author, [
            'title' => 'Artikel Humor Rahasia Belum Terbit',
            'slug' => 'artikel-humor-rahasia-belum-terbit',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $response = $this->get(route('humor'));

        $response->assertOk()
            ->assertViewIs('humor')
            ->assertSee($featured->title)
            ->assertSee(route('articles.show', $featured->slug), false)
            ->assertSee($popular->title)
            ->assertSee(route('articles.show', $popular->slug), false)
            ->assertSee($anecdote->title)
            ->assertSee(route('articles.show', $anecdote->slug), false)
            ->assertDontSee($draft->title)
            ->assertDontSee('href="#"', false);
    }

    public function test_humor_can_filter_articles_by_kategori(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $guyonanArticle = $this->createHumorArticle($author, [
            'title' => 'Pelesetan Bahasa Banyumasan Nyeleneh',
            'slug' => 'pelesetan-bahasa-banyumasan-nyeleneh',
            'summary' => 'Kosakata unik yang bikin salah paham turis.',
            'tags' => ['Parodi & Plesetan', 'Guyonan Lokal'],
        ]);

        $satirArticle = $this->createHumorArticle($author, [
            'title' => 'Rapat Warga Lebih Lama Pilih Menu Makan',
            'slug' => 'rapat-warga-lebih-lama-pilih-menu-makan',
            'summary' => 'Agenda lima menit tapi debat menu berjam-jam.',
            'tags' => ['Satir Ringan'],
        ]);

        $response = $this->get(route('humor', ['kategori' => 'Parodi & Plesetan']));

        $response->assertOk()
            ->assertSee('Kategori: Parodi &amp; Plesetan', false)
            ->assertViewHas('articles', function ($articles) use ($guyonanArticle, $satirArticle): bool {
                return $articles->contains($guyonanArticle)
                    && ! $articles->contains($satirArticle);
            });
    }

    public function test_humor_can_search_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $matchArticle = $this->createHumorArticle($author, [
            'title' => 'Rafting Sungai Serayu Bikin Histeris',
            'slug' => 'rafting-sungai-serayu-bikin-histeris',
            'summary' => 'Kepanikan seru pemula saat perahu tersangkut arus.',
            'tags' => ['Cerita Jenaka'],
        ]);

        $otherArticle = $this->createHumorArticle($author, [
            'title' => 'Mitos Cukur Rambut Gimbal Minta Truk Molen',
            'slug' => 'mitos-cukur-rambut-gimbal-minta-truk-molen',
            'summary' => 'Permintaan nyentrik anak dieng yang bikin puyeng.',
            'tags' => ['Cerita Jenaka'],
        ]);

        $response = $this->get(route('humor', ['q' => 'Histeris']));

        $response->assertOk()
            ->assertSee('Pencarian: &ldquo;Histeris&rdquo;', false)
            ->assertViewHas('articles', function ($articles) use ($matchArticle, $otherArticle): bool {
                return $articles->contains($matchArticle)
                    && ! $articles->contains($otherArticle);
            });
    }

    public function test_humor_shows_empty_state_when_no_articles_exist(): void
    {
        $response = $this->get(route('humor'));

        $response->assertOk()
            ->assertSee('Belum Ada Humor Unggulan')
            ->assertSee('Belum ada artikel humor populer yang diterbitkan.')
            ->assertSee('Belum Ada Artikel Ditemukan');
    }

    public function test_humor_pagination_works_correctly(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        for ($i = 1; $i <= 8; $i++) {
            $this->createHumorArticle($author, [
                'title' => 'Cerita Humor Nomor '.$i,
                'slug' => 'cerita-humor-nomor-'.$i,
                'published_at' => now()->subHours($i),
            ]);
        }

        $response = $this->get(route('humor', ['page' => 2]));

        $response->assertOk()
            ->assertSee('Cerita Humor Nomor 7')
            ->assertSee('Cerita Humor Nomor 8');
    }

    private function createHumorArticle(User $author, array $attributes = []): Article
    {
        static $counter = 1;

        return Article::create(array_merge([
            'user_id' => $author->id,
            'title' => 'Artikel Humor '.$counter,
            'slug' => 'artikel-humor-'.$counter++,
            'summary' => 'Ringkasan cerita jenaka dan guyonan Banjarnegara.',
            'category' => 'Humor',
            'status' => 'published',
            'author_name' => $author->name,
            'tags' => ['Guyonan Lokal'],
            'caption' => 'Keterangan foto artikel humor',
            'photo_credit' => 'Redaksi',
            'content' => '<p>Konten artikel humor dan celoteh Banjarnegara.</p>',
            'views' => 100,
            'published_at' => now(),
        ], $attributes));
    }
}
