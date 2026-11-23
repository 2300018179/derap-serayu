<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleLikeTest extends TestCase
{
    use RefreshDatabase;

    private function publishedArticle(): Article
    {
        $writer = User::factory()->create(['role' => 'writer']);

        return $writer->articles()->create([
            'title' => 'Artikel Untuk Disukai',
            'slug' => 'artikel-untuk-disukai',
            'summary' => 'Ringkasan.',
            'category' => 'Berita',
            'status' => 'published',
            'author_name' => $writer->name,
            'published_at' => now(),
        ]);
    }

    public function test_article_list_shows_like_icon_to_guests_linking_to_login(): void
    {
        $article = $this->publishedArticle();

        $this->get(route('articles.index'))
            ->assertOk()
            ->assertSee('card-actions', false)
            ->assertSee(route('login', ['article' => $article->slug]), false);
    }

    public function test_guest_cannot_like_an_article(): void
    {
        $article = $this->publishedArticle();

        $this->post(route('articles.like', $article->slug))
            ->assertRedirect(route('login'));

        $this->assertDatabaseCount('article_likes', 0);
    }

    public function test_reader_can_toggle_like_from_the_list_and_count_updates(): void
    {
        $article = $this->publishedArticle();
        $reader = User::factory()->create(['role' => 'reader']);

        $this->actingAs($reader)
            ->from(route('articles.index'))
            ->post(route('articles.like', $article->slug), ['from_list' => 1])
            ->assertRedirect(route('articles.index'));

        $this->assertDatabaseHas('article_likes', [
            'article_id' => $article->id,
            'user_id' => $reader->id,
        ]);

        $this->actingAs($reader)
            ->get(route('articles.show', $article->slug))
            ->assertSee('Disukai · 1', false);

        $this->actingAs($reader)
            ->post(route('articles.like', $article->slug), ['from_list' => 1]);

        $this->assertDatabaseCount('article_likes', 0);
    }

    public function test_reader_can_comment_and_save_and_see_them_on_pages(): void
    {
        $article = $this->publishedArticle();
        $reader = User::factory()->create(['role' => 'reader']);

        $this->actingAs($reader)
            ->post(route('articles.comments.store', $article->slug), ['content' => 'Komentar uji coba'])
            ->assertRedirect();
        $this->actingAs($reader)
            ->post(route('pembaca.saved.store', $article->slug))
            ->assertRedirect();

        $this->actingAs($reader)
            ->get(route('articles.show', $article->slug))
            ->assertSee('Komentar uji coba')
            ->assertSee('Komentar Pembaca (1)', false);

        $this->actingAs($reader)
            ->get(route('articles.index'))
            ->assertSee('Tersimpan');
    }

    public function test_guest_cannot_comment_or_save(): void
    {
        $article = $this->publishedArticle();

        $this->post(route('articles.comments.store', $article->slug), ['content' => 'Halo'])
            ->assertRedirect(route('login'));
        $this->post(route('pembaca.saved.store', $article->slug))
            ->assertRedirect(route('login'));
    }

    public function test_homepage_cards_show_actions_and_reader_can_like_from_home(): void
    {
        $article = $this->publishedArticle();
        $reader = User::factory()->create(['role' => 'reader']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('card-actions', false)
            ->assertSee(route('login', ['article' => $article->slug]), false);

        $this->actingAs($reader)->post(route('articles.like', $article->slug), ['from_list' => 1]);

        $this->actingAs($reader)
            ->get(route('home'))
            ->assertOk()
            ->assertSee('aria-pressed="true"', false);
    }

    public function test_writer_cannot_like_an_article(): void
    {
        $article = $this->publishedArticle();
        $writer = User::factory()->create(['role' => 'writer']);

        $this->actingAs($writer)
            ->post(route('articles.like', $article->slug))
            ->assertForbidden();
    }

    public function test_admin_can_use_reader_article_interactions(): void
    {
        $article = $this->publishedArticle();
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee('Tulis komentarmu')
            ->assertSee(route('pembaca.saved.store', $article->slug), false);

        $this->post(route('articles.like', $article->slug))
            ->assertRedirect();

        $this->post(route('articles.comments.store', $article->slug), [
            'content' => 'Komentar administrator',
        ])->assertRedirect();

        $this->assertDatabaseHas('article_likes', [
            'article_id' => $article->id,
            'user_id' => $admin->id,
        ]);
        $this->assertDatabaseHas('article_comments', [
            'article_id' => $article->id,
            'user_id' => $admin->id,
            'content' => 'Komentar administrator',
        ]);
    }

    public function test_editor_cannot_like_an_article(): void
    {
        $article = $this->publishedArticle();
        $editor = User::factory()->create(['role' => 'editor']);

        $this->actingAs($editor)
            ->post(route('articles.like', $article->slug))
            ->assertForbidden();
    }
}
