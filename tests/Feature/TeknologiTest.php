<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeknologiTest extends TestCase
{
    use RefreshDatabase;

    public function test_teknologi_page_loads_successfully_and_displays_published_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $featured = $this->createTeknologiArticle($author, [
            'title' => 'Inovasi Digital Anak Muda Banjarnegara',
            'slug' => 'inovasi-digital-anak-muda-banjarnegara',
            'summary' => 'Kreativitas generasi muda dalam pemanfaatan teknologi informasi.',
            'views' => 750,
            'tags' => ['Inovasi', 'Kreativitas Pemuda'],
            'published_at' => now()->subDay(),
        ]);

        $popular = $this->createTeknologiArticle($author, [
            'title' => 'Adopsi QRIS dan Pembayaran Digital UMKM',
            'slug' => 'adopsi-qris-pembayaran-digital-umkm',
            'summary' => 'Pedagang pasar dan UMKM mulai bertransaksi non-tunai.',
            'views' => 580,
            'tags' => ['UMKM Digital', 'Transformasi Digital'],
            'published_at' => now()->subDays(2),
        ]);

        $iotArticle = $this->createTeknologiArticle($author, [
            'title' => 'Penerapan Sensor IoT Pertanian Dieng',
            'slug' => 'penerapan-sensor-iot-pertanian-dieng',
            'summary' => 'Teknologi pintar untuk mendeteksi embun upas.',
            'views' => 310,
            'tags' => ['AI & IoT', 'Inovasi'],
            'published_at' => now()->subDays(3),
        ]);

        $draft = $this->createTeknologiArticle($author, [
            'title' => 'Artikel Teknologi Rahasia Belum Terbit',
            'slug' => 'artikel-teknologi-rahasia-belum-terbit',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $response = $this->get(route('teknologi'));

        $response->assertOk()
            ->assertViewIs('teknologi')
            ->assertSee($featured->title)
            ->assertSee(route('articles.show', $featured->slug), false)
            ->assertSee($popular->title)
            ->assertSee(route('articles.show', $popular->slug), false)
            ->assertSee($iotArticle->title)
            ->assertSee(route('articles.show', $iotArticle->slug), false)
            ->assertDontSee($draft->title)
            ->assertDontSee('href="#"', false);
    }

    public function test_teknologi_can_filter_articles_by_topik(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $digitalArticle = $this->createTeknologiArticle($author, [
            'title' => 'Sistem Informasi Desa Terpadu',
            'slug' => 'sistem-informasi-desa-terpadu',
            'summary' => 'Layanan administrasi kependudukan serba cepat.',
            'tags' => ['Transformasi Digital'],
        ]);

        $aiArticle = $this->createTeknologiArticle($author, [
            'title' => 'Kecerdasan Buatan Deteksi Penyakit Tanaman',
            'slug' => 'kecerdasan-buatan-deteksi-penyakit-tanaman',
            'summary' => 'Inovasi AI untuk mendeteksi hama daun secara instan.',
            'tags' => ['AI & IoT'],
        ]);

        $response = $this->get(route('teknologi', ['topik' => 'Transformasi Digital']));

        $response->assertOk()
            ->assertSee('Topik: Transformasi Digital')
            ->assertViewHas('articles', function ($articles) use ($digitalArticle, $aiArticle): bool {
                return $articles->contains($digitalArticle)
                    && ! $articles->contains($aiArticle);
            });
    }

    public function test_teknologi_can_search_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);

        $matchArticle = $this->createTeknologiArticle($author, [
            'title' => 'Pelatihan Coding dan Robotika Pelajar',
            'slug' => 'pelatihan-coding-robotika-pelajar',
            'summary' => 'Mempersiapkan talenta teknologi sejak usia sekolah.',
            'tags' => ['Kreativitas Pemuda'],
        ]);

        $otherArticle = $this->createTeknologiArticle($author, [
            'title' => 'Perluasan Kabel Fiber Optik Menuju Desa Wisata',
            'slug' => 'perluasan-kabel-fiber-optik-desa-wisata',
            'summary' => 'Konektivitas internet cepat menjangkau pelosok bukit.',
            'tags' => ['Transformasi Digital'],
        ]);

        $response = $this->get(route('teknologi', ['q' => 'Robotika']));

        $response->assertOk()
            ->assertSee('Pencarian: &ldquo;Robotika&rdquo;', false)
            ->assertViewHas('articles', function ($articles) use ($matchArticle, $otherArticle): bool {
                return $articles->contains($matchArticle)
                    && ! $articles->contains($otherArticle);
            });
    }

    public function test_teknologi_shows_empty_state_when_no_articles_exist(): void
    {
        $response = $this->get(route('teknologi'));

        $response->assertOk()
            ->assertSee('Belum Ada Teknologi Unggulan')
            ->assertSee('Belum ada artikel populer yang diterbitkan.')
            ->assertSee('Belum Ada Artikel Ditemukan');
    }

    private function createTeknologiArticle(User $author, array $attributes = []): Article
    {
        static $counter = 1;

        return Article::create(array_merge([
            'user_id' => $author->id,
            'title' => 'Artikel Teknologi '.$counter,
            'slug' => 'artikel-teknologi-'.$counter++,
            'summary' => 'Ringkasan cerita inovasi dan teknologi Banjarnegara.',
            'category' => 'Teknologi',
            'status' => 'published',
            'author_name' => $author->name,
            'tags' => ['Inovasi'],
            'caption' => 'Keterangan foto artikel teknologi',
            'photo_credit' => 'Redaksi',
            'content' => '<p>Konten artikel perkembangan teknologi Banjarnegara.</p>',
            'views' => 120,
            'published_at' => now(),
        ], $attributes));
    }
}
