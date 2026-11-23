<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleSearchTest extends TestCase
{
    use RefreshDatabase;

    private function makeArticle(array $attributes): Article
    {
        $writer = User::factory()->create(['role' => 'writer']);

        return $writer->articles()->create($attributes + [
            'slug' => str()->slug($attributes['title']),
            'summary' => 'Ringkasan.',
            'category' => 'Berita',
            'status' => 'published',
            'author_name' => $writer->name,
            'published_at' => now(),
        ]);
    }

    public function test_search_matches_title_content_and_author(): void
    {
        $this->makeArticle(['title' => 'Festival Dieng Meriah', 'content' => 'Isi biasa']);
        $this->makeArticle(['title' => 'Kabar Lain', 'content' => 'Carica manis khas wonosobo']);
        $this->makeArticle(['title' => 'Berita Ketiga', 'author_name' => 'Siti Rahma']);

        $this->get(route('articles.index', ['q' => 'festival']))
            ->assertSee('Festival Dieng Meriah')
            ->assertDontSee('Kabar Lain');

        $this->get(route('articles.index', ['q' => 'carica']))
            ->assertSee('Kabar Lain')
            ->assertDontSee('Festival Dieng Meriah');

        $this->get(route('articles.index', ['q' => 'Rahma']))
            ->assertSee('Berita Ketiga')
            ->assertDontSee('Kabar Lain');
    }

    public function test_search_requires_every_keyword_and_ignores_unpublished(): void
    {
        $this->makeArticle(['title' => 'Wisata Dieng Terbaru']);
        $this->makeArticle(['title' => 'Wisata Pantai Draft', 'status' => 'draft']);

        $this->get(route('articles.index', ['q' => 'wisata dieng']))
            ->assertSee('Wisata Dieng Terbaru');

        $this->get(route('articles.index', ['q' => 'wisata pantai']))
            ->assertDontSee('Wisata Pantai Draft');
    }

    public function test_category_pages_use_the_shared_site_search_form(): void
    {
        $this->get(route('humor'))
            ->assertOk()
            ->assertSee('class="ds-search"', false)
            ->assertSee('action="'.route('humor').'"', false);
    }

    public function test_category_search_only_returns_articles_from_that_category(): void
    {
        $this->makeArticle(['title' => 'Tradisi Jaran Kepang', 'category' => 'Cerita & Budaya']);
        $this->makeArticle(['title' => 'Tradisi Opini Warga', 'category' => 'Opini']);

        $this->get(route('cerita', ['q' => 'Tradisi']))
            ->assertOk()
            ->assertSee('Jaran Kepang')
            ->assertDontSee('Opini Warga');

        $this->get(route('opini', ['q' => 'Tradisi']))
            ->assertOk()
            ->assertSee('Opini Warga')
            ->assertDontSee('Jaran Kepang');
    }
}
