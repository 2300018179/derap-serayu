<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditorWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_editor_can_create_an_article_under_their_own_account(): void
    {
        $editor = User::factory()->create(['role' => 'editor', 'pen_name' => 'Editor Serayu']);

        $this->actingAs($editor)
            ->post(route('editor.articles.store'), $this->articleInput())
            ->assertRedirect(route('editor.articles.index'));

        $this->assertDatabaseHas('articles', [
            'user_id' => $editor->id,
            'title' => 'Artikel editor',
            'author_name' => 'Editor Serayu',
            'status' => 'review',
        ]);
    }

    public function test_editor_create_header_omits_notifications_and_uses_editor_workspace_routes(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $article = $this->createArticle($editor, [
            'title' => 'Artikel menunggu tinjauan editor',
            'slug' => 'artikel-menunggu-tinjauan-editor',
        ]);

        $this->actingAs($editor)
            ->get(route('editor.articles.create'))
            ->assertOk()
            ->assertSee('TULIS ARTIKEL')
            ->assertSee('name="document_method"', false)
            ->assertSee(route('editor.articles.store'), false)
            ->assertSee(route('editor.articles.review'), false)
            ->assertDontSee(route('penulis.dashboard'), false)
            ->assertDontSee(route('editor.articles.edit', $article), false)
            ->assertSee(route('editor.articles.index'), false)
            ->assertSee(route('editor.profile'), false)
            ->assertDontSee('id="notificationToggle"', false)
            ->assertSee('<nav class="nav-menu">', false)
            ->assertSeeInOrder([
                route('editor.articles.create'),
                'class="nav-link active"',
                '<span>Tulis Artikel</span>',
            ], false)
            ->assertDontSee('<nav class="side-nav">', false)
            ->assertSee('Editor Derap Serayu')
            ->assertDontSee('Akun Editor');
    }

    public function test_editor_can_return_to_the_editor_workspace_from_public_pages(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $this->createArticle($writer, [
            'status' => 'published',
            'published_at' => now(),
        ]);

        foreach ([
            route('home'),
            route('about'),
            route('galeri'),
            route('kecamatan.index'),
            route('information.privacy'),
            route('information.terms'),
            route('information.editorial'),
            route('cerita'),
            route('opini'),
            route('sosok'),
            route('sudut-kota'),
            route('potensi'),
            route('teknologi'),
            route('humor'),
            route('articles.index'),
            route('articles.show', $article->slug),
        ] as $url) {
            $this->actingAs($editor)
                ->get($url)
                ->assertOk()
                ->assertSee(route('editor.dashboard'), false)
                ->assertSee(route('editor.profile'), false);
        }
    }

    public function test_editor_can_view_and_update_another_authors_article_without_changing_its_author(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer', 'pen_name' => 'Penulis Asli']);
        $article = $this->createArticle($writer, ['status' => 'draft']);

        $this->actingAs($editor)
            ->get(route('editor.articles.edit', $article))
            ->assertOk()
            ->assertSee('Artikel milik penulis');

        $this->put(route('editor.articles.update', $article), $this->articleInput([
            'title' => 'Artikel sudah diperbarui',
            'status' => 'draft',
        ]))->assertRedirect(route('editor.articles.index'));

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'user_id' => $writer->id,
            'title' => 'Artikel sudah diperbarui',
            'author_name' => 'Penulis Asli',
            'status' => 'draft',
        ]);
    }

    public function test_editor_article_list_includes_other_authors_articles_and_crud_actions(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $this->createArticle($writer);

        $this->actingAs($editor)
            ->get(route('editor.articles.index'))
            ->assertOk()
            ->assertSee($article->title)
            ->assertSee(route('editor.articles.create'))
            ->assertSee(route('editor.articles.edit', $article))
            ->assertSee(route('editor.articles.destroy', $article));
    }

    public function test_editor_dashboard_shows_quick_link_to_write_article(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);

        $this->actingAs($editor)
            ->get(route('editor.dashboard'))
            ->assertOk()
            ->assertSee('Tulis Artikel')
            ->assertSee('<span>Tulis Artikel</span>', false)
            ->assertSee(route('editor.articles.create'));
    }

    public function test_editor_can_delete_another_authors_article(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $this->createArticle($writer);

        $this->actingAs($editor)
            ->delete(route('editor.articles.destroy', $article))
            ->assertRedirect(route('editor.articles.index'));

        $this->assertDatabaseMissing('articles', ['id' => $article->id]);
    }

    public function test_editor_can_update_a_published_article_without_unpublishing_it(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer', 'pen_name' => 'Penulis Asli']);
        $article = $this->createArticle($writer, [
            'status' => 'published',
            'published_at' => now()->subDay(),
        ]);

        $this->actingAs($editor)
            ->get(route('editor.articles.edit', $article))
            ->assertOk()
            ->assertSee('Tetap Terbit');

        $this->put(route('editor.articles.update', $article), $this->articleInput([
            'title' => 'Artikel terbit yang diperbarui',
            'status' => 'published',
        ]))->assertRedirect(route('editor.articles.index'));

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'user_id' => $writer->id,
            'author_name' => 'Penulis Asli',
            'status' => 'published',
        ]);
        $this->assertNotNull($article->fresh()->published_at);
    }

    public function test_editor_can_publish_another_authors_article_after_review(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $this->createArticle($writer, ['status' => 'review']);

        $this->actingAs($editor)
            ->patch(route('editor.articles.publish', $article->id))
            ->assertRedirect();

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'status' => 'published',
        ]);
        $this->assertNotNull($article->fresh()->published_at);
    }

    public function test_editor_can_request_revision_for_another_authors_article(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $this->createArticle($writer, ['status' => 'review']);

        $this->actingAs($editor)
            ->patch(route('editor.articles.revision', $article->id), [
                'review_note' => 'Mohon tambahkan sumber informasi.',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'status' => 'rejected',
            'review_note' => 'Mohon tambahkan sumber informasi.',
        ]);
    }

    public function test_editor_review_queue_excludes_their_own_articles(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $writer = User::factory()->create(['role' => 'writer']);
        $ownArticle = $this->createArticle($editor, [
            'title' => 'Tulisan editor sendiri',
            'slug' => 'tulisan-editor-sendiri',
        ]);
        $writerArticle = $this->createArticle($writer, [
            'title' => 'Tulisan penulis lain',
            'slug' => 'tulisan-penulis-lain',
        ]);

        $this->actingAs($editor)
            ->get(route('editor.articles.review'))
            ->assertOk()
            ->assertSee($writerArticle->title)
            ->assertDontSee($ownArticle->title)
            ->assertViewHas('totalReview', 1);
    }

    public function test_editor_cannot_approve_their_own_article(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);
        $article = $this->createArticle($editor, ['status' => 'review']);

        $this->actingAs($editor)
            ->patch(route('editor.articles.publish', $article->id))
            ->assertForbidden();

        $this->patch(route('editor.articles.revision', $article->id), [
            'review_note' => 'Artikel milik sendiri.',
        ])->assertForbidden();

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'status' => 'review',
        ]);
    }

    public function test_editor_cannot_access_the_admin_dashboard(): void
    {
        $editor = User::factory()->create(['role' => 'editor']);

        $this->actingAs($editor)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_can_access_all_role_workflows(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get(route('editor.dashboard'))
            ->assertRedirect(route('editor.articles.index'));

        $this->get(route('editor.articles.index'))
            ->assertOk()
            ->assertSee(route('editor.articles.index'))
            ->assertSee(route('admin.users.index'));

        $this->get(route('editor.articles.create'))
            ->assertOk();

        $this->get(route('penulis.artikel.create'))
            ->assertOk();

        $this->get(route('pembaca.profile'))
            ->assertOk()
            ->assertViewIs('account.profile');

        $this->get(route('pembaca.saved.index'))
            ->assertOk();

        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertViewIs('admin.dashboard');
    }

    public function test_writer_cannot_access_editorial_workflows(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);

        $this->actingAs($writer)
            ->get(route('editor.articles.index'))
            ->assertForbidden();
    }

    /**
     * @return array<string, mixed>
     */
    private function articleInput(array $overrides = []): array
    {
        return array_merge([
            'title' => 'Artikel editor',
            'summary' => 'Ringkasan artikel.',
            'category' => 'Berita',
            'kecamatan' => 'Batur',
            'status' => 'review',
            'document_method' => 'write',
            'content' => '<p>Isi artikel yang siap ditinjau.</p>',
        ], $overrides);
    }

    private function createArticle(User $author, array $overrides = []): Article
    {
        return $author->articles()->create(array_merge([
            'title' => 'Artikel milik penulis',
            'slug' => 'artikel-milik-penulis',
            'summary' => 'Ringkasan naskah penulis.',
            'category' => 'Berita',
            'kecamatan' => 'Batur',
            'status' => 'review',
            'author_name' => $author->pen_name ?: $author->name,
            'content' => '<p>Isi artikel penulis.</p>',
        ], $overrides));
    }
}
