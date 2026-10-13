<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PotensiTest extends TestCase
{
    use RefreshDatabase;

    public function test_potensi_page_loads_successfully_and_displays_published_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $featured = $this->createPotensiArticle($author, [
            'title' => 'Pertanian Kentang Dieng Unggulan',
            'slug' => 'pertanian-kentang-dieng-unggulan',
            'summary' => 'Hasil bumi berkualitas dari pegunungan Banjarnegara.',
            'views' => 600,
            'tags' => ['Pertanian', 'Produk Lokal'],
            'published_at' => now()->subDay(),
        ]);

        $popular = $this->createPotensiArticle($author, [
            'title' => 'Dawet Ayu Minuman Legendaris',
            'slug' => 'dawet-ayu-minuman-legendaris',
            'summary' => 'Cita rasa otentik yang dikenal luas.',
            'views' => 450,
            'tags' => ['UMKM', 'Produk Lokal'],
            'published_at' => now()->subDays(2),
        ]);

        $kebun = $this->createPotensiArticle($author, [
            'title' => 'Perkebunan Teh Dataran Tinggi',
            'slug' => 'perkebunan-teh-dataran-tinggi',
            'summary' => 'Agrowisata kebun teh hijau menyejukkan.',
            'views' => 200,
            'tags' => ['Perkebunan'],
            'published_at' => now()->subDays(3),
        ]);

        $draft = $this->createPotensiArticle($author, [
            'title' => 'Potensi Rahasia Belum Terbit',
            'slug' => 'potensi-rahasia-belum-terbit',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $response = $this->get(route('potensi'));

        $response->assertOk()
            ->assertViewIs('potensi')
            ->assertSee($featured->title)
            ->assertSee(route('articles.show', $featured->slug), false)
            ->assertSee($popular->title)
            ->assertSee(route('articles.show', $popular->slug), false)
            ->assertSee($kebun->title)
            ->assertSee(route('articles.show', $kebun->slug), false)
            ->assertDontSee($draft->title)
            ->assertDontSee('href="#"', false);
    }

    public function test_potensi_can_filter_articles_by_sektor(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $pertanianArticle = $this->createPotensiArticle($author, [
            'title' => 'Inovasi Petani Kentang Organik',
            'slug' => 'inovasi-petani-kentang-organik',
            'summary' => 'Metode ramah lingkungan untuk pertanian Dieng.',
            'tags' => ['Pertanian'],
        ]);

        $wisataArticle = $this->createPotensiArticle($author, [
            'title' => 'Eksotisme Wisata Kawah Sikidang',
            'slug' => 'eksotisme-wisata-kawah-sikidang',
            'summary' => 'Pesona fenomena vulkanik menawan.',
            'tags' => ['Pariwisata'],
        ]);

        $response = $this->get(route('potensi', ['sektor' => 'Pertanian']));

        $response->assertOk()
            ->assertSee('Sektor: Pertanian')
            ->assertViewHas('articles', function ($articles) use ($pertanianArticle, $wisataArticle): bool {
                return $articles->contains($pertanianArticle)
                    && ! $articles->contains($wisataArticle);
            });
    }

    public function test_potensi_can_search_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $matchArticle = $this->createPotensiArticle($author, [
            'title' => 'Dawet Ayu Cendol Asli Pandan',
            'slug' => 'dawet-ayu-cendol-asli-pandan',
            'summary' => 'Rahasia kenikmatan minuman khas daerah.',
            'tags' => ['UMKM'],
        ]);

        $otherArticle = $this->createPotensiArticle($author, [
            'title' => 'Kain Batik Gumelem Klasik',
            'slug' => 'kain-batik-gumelem-klasik',
            'summary' => 'Wastra nusantara peninggalan leluhur.',
            'tags' => ['Ekonomi Kreatif'],
        ]);

        $response = $this->get(route('potensi', ['q' => 'Dawet']));

        $response->assertOk()
            ->assertSee('Pencarian: &ldquo;Dawet&rdquo;', false)
            ->assertViewHas('articles', function ($articles) use ($matchArticle, $otherArticle): bool {
                return $articles->contains($matchArticle)
                    && ! $articles->contains($otherArticle);
            });
    }

    public function test_potensi_shows_empty_state_when_no_articles_exist(): void
    {
        $response = $this->get(route('potensi'));

        $response->assertOk()
            ->assertSee('Belum Ada Potensi Unggulan')
            ->assertSee('Belum ada potensi populer yang diterbitkan.')
            ->assertSee('Belum Ada Artikel Ditemukan');
    }

    private function createPotensiArticle(User $author, array $attributes = []): Article
    {
        static $counter = 1;

        return Article::create(array_merge([
            'user_id' => $author->id,
            'title' => 'Artikel Potensi '.$counter,
            'slug' => 'artikel-potensi-'.$counter++,
            'summary' => 'Ringkasan cerita potensi Banjarnegara.',
            'category' => 'Potensi',
            'status' => 'published',
            'author_name' => $author->name,
            'tags' => ['Pertanian'],
            'caption' => 'Keterangan foto artikel potensi',
            'photo_credit' => 'Redaksi',
            'content' => '<p>Konten artikel potensi Banjarnegara.</p>',
            'views' => 75,
            'published_at' => now(),
        ], $attributes));
    }
}
