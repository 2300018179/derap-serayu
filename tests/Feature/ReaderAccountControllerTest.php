<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReaderAccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_read_articles_and_is_invited_to_login_to_save_them(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $article = $this->createArticle($author);

        $this->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee(route('login', ['article' => $article->slug]), false)
            ->assertSee('Masuk sebagai pembaca');

        $this->get(route('pembaca.profile'))
            ->assertRedirect(route('login'));
    }

    public function test_reader_sees_account_menu_and_profile_information(): void
    {
        $reader = User::factory()->create([
            'name' => 'Pembaca Derap',
            'username' => 'pembacaderap',
            'email' => 'pembaca@example.com',
            'role' => 'reader',
        ]);

        $this->actingAs($reader)
            ->get(route('home'))
            ->assertOk()
            ->assertSee(route('pembaca.profile'), false)
            ->assertSee(route('pembaca.saved.index'), false)
            ->assertSee('Keluar');

        $this->get(route('pembaca.profile'))
            ->assertOk()
            ->assertSee($reader->name)
            ->assertSee($reader->username)
            ->assertSee($reader->email)
            ->assertSee('Artikel tersimpan');
    }

    public function test_reader_can_save_list_and_remove_published_articles(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $reader = User::factory()->create(['role' => 'reader']);
        $article = $this->createArticle($author);
        $draftArticle = $this->createArticle($author, [
            'title' => 'Artikel Draft',
            'slug' => 'artikel-draft',
            'status' => 'draft',
            'published_at' => null,
        ]);

        $this->actingAs($reader)
            ->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee('Simpan artikel');

        $this->actingAs($reader)
            ->post(route('pembaca.saved.store', $article->slug))
            ->assertRedirect();

        $this->post(route('pembaca.saved.store', $article->slug))
            ->assertRedirect();

        $this->assertDatabaseCount('saved_articles', 1);
        $this->assertDatabaseHas('saved_articles', [
            'user_id' => $reader->id,
            'article_id' => $article->id,
        ]);

        $this->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee('Hapus dari artikel tersimpan');

        $this->get(route('pembaca.saved.index'))
            ->assertOk()
            ->assertSee($article->title)
            ->assertDontSee($draftArticle->title);

        $this->post(route('pembaca.saved.store', $draftArticle->slug))
            ->assertNotFound();

        $this->delete(route('pembaca.saved.destroy', $article->slug))
            ->assertRedirect();

        $this->assertDatabaseMissing('saved_articles', [
            'user_id' => $reader->id,
            'article_id' => $article->id,
        ]);
    }

    public function test_non_readers_cannot_access_reader_account_or_save_articles(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $this->createArticle($writer);

        $this->actingAs($writer)
            ->get(route('pembaca.profile'))
            ->assertForbidden();

        $this->post(route('pembaca.saved.store', $article->slug))
            ->assertForbidden();

        $this->assertDatabaseCount('saved_articles', 0);
    }

    public function test_login_from_article_prompt_returns_reader_to_that_article(): void
    {
        $author = User::factory()->create(['role' => 'writer']);
        $reader = User::factory()->create([
            'role' => 'reader',
            'email' => 'pembaca@example.com',
        ]);
        $article = $this->createArticle($author);

        $this->get(route('login', ['article' => $article->slug]))
            ->assertOk();

        $this->post(route('login.store'), [
            'login' => $reader->email,
            'password' => 'password',
        ])->assertRedirect(route('articles.show', $article->slug));
    }

    /**
     * @param array<string, mixed> $attributes
     */
    private function createArticle(User $author, array $attributes = []): Article
    {
        return $author->articles()->create(array_merge([
            'title' => 'Cerita Serayu',
            'slug' => 'cerita-serayu',
            'summary' => 'Cerita pilihan dari Banjarnegara.',
            'category' => 'Cerita',
            'status' => 'published',
            'author_name' => $author->name,
            'published_at' => now(),
        ], $attributes));
    }
}
