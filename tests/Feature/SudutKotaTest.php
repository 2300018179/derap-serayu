<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SudutKotaTest extends TestCase
{
    use RefreshDatabase;

    public function test_sudut_kota_page_loads_successfully_and_displays_published_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $featured = $this->createSudutKotaArticle($author, [
            'title' => 'Wajah Banjarnegara Terkini',
            'slug' => 'wajah-banjarnegara-terkini',
            'summary' => 'Melihat sudut kota Banjarnegara dari dekat.',
            'views' => 500,
            'tags' => ['Pusat Kota', 'Ruang Publik'],
            'published_at' => now()->subDay(),
        ]);

        $popular = $this->createSudutKotaArticle($author, [
            'title' => 'Alun-Alun di Malam Hari',
            'slug' => 'alun-alun-malam-hari',
            'summary' => 'Ramainya pengunjung saat malam.',
            'views' => 300,
            'tags' => ['Pusat Kota'],
            'published_at' => now()->subDays(2),
        ]);

        $kuliner = $this->createSudutKotaArticle($author, [
            'title' => 'Mendoan Hangat Dekat Alun-Alun',
            'slug' => 'mendoan-hangat-dekat-alun-alun',
            'summary' => 'Kuliner malam khas yang wajib dicoba.',
            'views' => 200,
            'tags' => ['Kuliner'],
            'published_at' => now()->subDays(3),
        ]);

        $draft = $this->createSudutKotaArticle($author, [
            'title' => 'Artikel Rahasia Belum Terbit',
            'slug' => 'artikel-rahasia-belum-terbit',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $response = $this->get(route('sudut-kota'));

        $response->assertOk()
            ->assertViewIs('sudut-kota')
            ->assertSee($featured->title)
            ->assertSee(route('articles.show', $featured->slug), false)
            ->assertSee($popular->title)
            ->assertSee(route('articles.show', $popular->slug), false)
            ->assertSee($kuliner->title)
            ->assertSee(route('articles.show', $kuliner->slug), false)
            ->assertDontSee($draft->title)
            ->assertDontSee('href="#"', false);
    }

    public function test_sudut_kota_can_filter_articles_by_area(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $kulinerArticle = $this->createSudutKotaArticle($author, [
            'title' => 'Wisata Kuliner Dawet Ayu',
            'slug' => 'wisata-kuliner-dawet-ayu',
            'summary' => 'Dawet khas Banjarnegara di sudut kota.',
            'tags' => ['Kuliner'],
        ]);

        $kotaArticle = $this->createSudutKotaArticle($author, [
            'title' => 'Gedung Kuno Sudut Kota',
            'slug' => 'gedung-kuno-sudut-kota',
            'summary' => 'Bangunan bersejarah peninggalan masa lampau.',
            'tags' => ['Fotografi'],
        ]);

        $response = $this->get(route('sudut-kota', ['area' => 'Kuliner']));

        $response->assertOk()
            ->assertSee('Cerita Area: Kuliner')
            ->assertViewHas('articles', function ($articles) use ($kulinerArticle, $kotaArticle): bool {
                return $articles->contains($kulinerArticle)
                    && ! $articles->contains($kotaArticle);
            });
    }

    public function test_sudut_kota_can_search_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $matchArticle = $this->createSudutKotaArticle($author, [
            'title' => 'Keindahan Taman Kota Banjarnegara',
            'slug' => 'keindahan-taman-kota',
            'summary' => 'Ruang hijau di pusat kota.',
            'tags' => ['Ruang Publik'],
        ]);

        $otherArticle = $this->createSudutKotaArticle($author, [
            'title' => 'Kuliner Serabi Pinggir Jalan',
            'slug' => 'kuliner-serabi-pinggir-jalan',
            'summary' => 'Sarapan pagi warga.',
            'tags' => ['Kuliner'],
        ]);

        $response = $this->get(route('sudut-kota', ['q' => 'Taman']));

        $response->assertOk()
            ->assertSee('Pencarian: &ldquo;Taman&rdquo;', false)
            ->assertViewHas('articles', function ($articles) use ($matchArticle, $otherArticle): bool {
                return $articles->contains($matchArticle)
                    && ! $articles->contains($otherArticle);
            });
    }

    public function test_sudut_kota_shows_empty_state_when_no_articles_exist(): void
    {
        $response = $this->get(route('sudut-kota'));

        $response->assertOk()
            ->assertSee('Belum Ada Cerita Unggulan')
            ->assertSee('Belum ada sudut pilihan yang diterbitkan.')
            ->assertSee('Belum Ada Artikel Ditemukan');
    }

    private function createSudutKotaArticle(User $author, array $attributes = []): Article
    {
        static $counter = 1;

        return Article::create(array_merge([
            'user_id' => $author->id,
            'title' => 'Artikel Sudut Kota '.$counter,
            'slug' => 'artikel-sudut-kota-'.$counter++,
            'summary' => 'Ringkasan cerita sudut kota Banjarnegara.',
            'category' => 'Sudut Kota',
            'status' => 'published',
            'author_name' => $author->name,
            'tags' => ['Pusat Kota'],
            'caption' => 'Keterangan foto artikel',
            'photo_credit' => 'Redaksi',
            'content' => '<p>Konten artikel sudut kota.</p>',
            'views' => 50,
            'published_at' => now(),
        ], $attributes));
    }
}
