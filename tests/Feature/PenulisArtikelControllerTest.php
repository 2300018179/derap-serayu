<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PenulisArtikelControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_writer_dashboard(): void
    {
        $response = $this->get(route('penulis.dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_reader_cannot_access_writer_dashboard(): void
    {
        $reader = User::factory()->create(['role' => 'reader']);

        $this->actingAs($reader)
            ->get(route('penulis.dashboard'))
            ->assertForbidden();
    }

    public function test_writer_registration_creates_account_and_starts_session(): void
    {
        $response = $this->post(route('register.penulis.store'), [
            'nama' => 'Nadia Penulis',
            'nama_pena' => 'Nadia',
            'username' => 'nadia',
            'email' => 'nadia@example.com',
            'whatsapp' => '081234567890',
            'password' => 'StrongPass123!',
            'password_confirmation' => 'StrongPass123!',
            'terms' => '1',
        ]);

        $response->assertRedirect(route('penulis.dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'nadia@example.com',
            'username' => 'nadia',
            'role' => 'writer',
            'pen_name' => 'Nadia',
        ]);
    }

    public function test_create_form_includes_the_selected_document_method(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $response = $this->actingAs($writer)->get(route('penulis.artikel.create'));

        $response->assertOk();
        $response->assertSee('name="document_method"', false);
        $response->assertSee('id="documentMethodInput"', false);
        $response->assertSee('value="write"', false);
    }

    public function test_article_preview_javascript_is_not_rendered_as_page_text(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $response = $this->actingAs($writer)->get(route('penulis.artikel.create'));
        $document = new \DOMDocument;

        $previousErrorMode = libxml_use_internal_errors(true);
        $document->loadHTML($response->getContent());
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrorMode);

        $visibleTextNodes = (new \DOMXPath($document))
            ->query('//body//text()[not(ancestor::script)]');
        $visibleText = implode(' ', array_map(
            fn ($node) => $node->textContent,
            iterator_to_array($visibleTextNodes)
        ));

        $response->assertOk();
        $this->assertStringNotContainsString('previewDocument.body.append', $visibleText);
        $this->assertStringNotContainsString('submitButton.disabled = true', $visibleText);
    }

    public function test_uploading_an_article_document_stores_a_private_draft(): void
    {
        Storage::fake('local');
        $writer = User::factory()->create(['role' => 'writer', 'pen_name' => 'Nadia']);
        $document = UploadedFile::fake()->createWithContent(
            'naskah.pdf',
            "%PDF-1.4\nContoh naskah artikel"
        );

        $response = $this->actingAs($writer)->post(route('penulis.artikel.store'), [
            'title' => 'Judul artikel',
            'summary' => 'Ringkasan artikel',
            'category' => 'Berita',
            'status' => 'draft',
            'document_method' => 'upload',
            'document' => $document,
        ]);

        $article = Article::firstOrFail();
        $response->assertRedirect(route('penulis.articles.index'));
        $this->assertSame($writer->id, $article->user_id);
        $this->assertSame('Nadia', $article->author_name);
        $this->assertSame('draft', $article->status);
        $this->assertSame('naskah.pdf', $article->document_name);
        Storage::disk('local')->assertExists($article->document_path);
    }

    public function test_published_article_document_can_be_downloaded_by_the_public(): void
    {
        Storage::fake('local');
        $writer = User::factory()->create(['role' => 'writer']);
        $admin = User::factory()->create(['role' => 'admin']);
        $documentPath = UploadedFile::fake()->createWithContent(
            'naskah.pdf',
            "%PDF-1.4\nNaskah yang diterbitkan"
        )->store('naskah-artikel');
        $article = $writer->articles()->create([
            'title' => 'Artikel dengan lampiran',
            'slug' => 'artikel-dengan-lampiran',
            'summary' => 'Ringkasan.',
            'category' => 'Berita',
            'status' => 'review',
            'author_name' => $writer->name,
            'document_path' => $documentPath,
            'document_name' => 'naskah.pdf',
        ]);

        $this->actingAs($admin)
            ->post(route('admin.articles.publish', $article))
            ->assertRedirect();

        $this->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee('Naskah lengkap artikel ini tersedia')
            ->assertSee('Unduh naskah');

        $this->get(route('articles.document', $article->slug))
            ->assertDownload('naskah.pdf');
    }

    public function test_private_article_document_is_not_available_from_the_public_download_route(): void
    {
        Storage::fake('local');
        $writer = User::factory()->create(['role' => 'writer']);
        $documentPath = UploadedFile::fake()->createWithContent(
            'draft.pdf',
            "%PDF-1.4\nDokumen draft"
        )->store('naskah-artikel');
        $article = $writer->articles()->create([
            'title' => 'Draft dengan lampiran',
            'slug' => 'draft-dengan-lampiran',
            'summary' => 'Ringkasan.',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
            'document_path' => $documentPath,
            'document_name' => 'draft.pdf',
        ]);

        $this->get(route('articles.document', $article->slug))
            ->assertNotFound();
    }

    public function test_writer_can_download_their_private_article_document(): void
    {
        Storage::fake('local');
        $writer = User::factory()->create(['role' => 'writer']);
        $documentPath = UploadedFile::fake()->createWithContent(
            'draft.pdf',
            "%PDF-1.4\nDokumen draft"
        )->store('naskah-artikel');
        $article = $writer->articles()->create([
            'title' => 'Draft dengan lampiran',
            'slug' => 'draft-dengan-lampiran',
            'summary' => 'Ringkasan.',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
            'document_path' => $documentPath,
            'document_name' => 'draft.pdf',
        ]);

        $this->actingAs($writer)
            ->get(route('penulis.articles.document', $article))
            ->assertDownload('draft.pdf');
    }

    public function test_edit_form_shows_the_saved_document_and_cover_image(): void
    {
        Storage::fake('local');
        Storage::fake('public');
        $writer = User::factory()->create(['role' => 'writer']);
        $documentPath = 'naskah-artikel/naskah.pdf';
        $coverPath = 'sampul-artikel/sampul.png';
        Storage::disk('local')->put($documentPath, '%PDF-1.4');
        Storage::disk('public')->put($coverPath, 'cover image');
        $article = $writer->articles()->create([
            'title' => 'Artikel untuk diedit',
            'slug' => 'artikel-untuk-diedit',
            'summary' => 'Ringkasan.',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
            'document_path' => $documentPath,
            'document_name' => 'naskah.pdf',
            'cover_image_path' => $coverPath,
        ]);

        $this->actingAs($writer)
            ->get(route('penulis.articles.edit', $article))
            ->assertOk()
            ->assertSee('naskah.pdf')
            ->assertSee('existingCoverPreview', false)
            ->assertSee('sampul.png');
    }

    public function test_writer_cannot_edit_another_writers_article(): void
    {
        $owner = User::factory()->create(['role' => 'writer']);
        $otherWriter = User::factory()->create(['role' => 'writer']);
        $article = $owner->articles()->create([
            'title' => 'Artikel privat',
            'slug' => 'artikel-privat',
            'summary' => 'Ringkasan',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $owner->name,
        ]);

        $response = $this->actingAs($otherWriter)->get(route('penulis.articles.edit', $article));

        $response->assertNotFound();
    }

    public function test_writer_can_switch_an_uploaded_article_to_written_content(): void
    {
        Storage::fake('local');
        $writer = User::factory()->create(['role' => 'writer']);
        $documentPath = UploadedFile::fake()->createWithContent(
            'naskah.pdf',
            "%PDF-1.4\nNaskah lama"
        )->store('naskah-artikel');
        $article = $writer->articles()->create([
            'title' => 'Judul lama',
            'slug' => 'judul-lama',
            'summary' => 'Ringkasan lama',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
            'document_path' => $documentPath,
        ]);

        $this->actingAs($writer)
            ->put(route('penulis.articles.update', $article), [
                'title' => 'Judul baru',
                'summary' => 'Ringkasan baru',
                'category' => 'Berita',
                'status' => 'draft',
                'document_method' => 'write',
                'content' => '<p>Artikel ditulis langsung.</p>',
            ])
            ->assertRedirect(route('penulis.articles.index'));

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'document_path' => null,
            'content' => '<p>Artikel ditulis langsung.</p>',
        ]);
        Storage::disk('local')->assertMissing($documentPath);
    }

    public function test_writer_can_update_an_uploaded_article_without_reuploading_its_document(): void
    {
        Storage::fake('local');
        $writer = User::factory()->create(['role' => 'writer']);
        $documentPath = UploadedFile::fake()->createWithContent(
            'naskah.pdf',
            "%PDF-1.4\nNaskah tetap"
        )->store('naskah-artikel');
        $article = $writer->articles()->create([
            'title' => 'Judul lama',
            'slug' => 'judul-lama',
            'summary' => 'Ringkasan lama',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
            'document_path' => $documentPath,
        ]);

        $this->actingAs($writer)
            ->put(route('penulis.articles.update', $article), [
                'title' => 'Judul baru',
                'summary' => 'Ringkasan baru',
                'category' => 'Berita',
                'status' => 'draft',
                'document_method' => 'upload',
            ])
            ->assertRedirect(route('penulis.articles.index'));

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'document_path' => $documentPath,
        ]);
        Storage::disk('local')->assertExists($documentPath);
    }

    public function test_writer_can_remove_a_saved_document_and_cover_image(): void
    {
        Storage::fake('local');
        Storage::fake('public');
        $writer = User::factory()->create(['role' => 'writer']);
        $documentPath = UploadedFile::fake()->createWithContent(
            'naskah.pdf',
            "%PDF-1.4\nNaskah lama"
        )->store('naskah-artikel');
        $coverPath = 'sampul-artikel/cover.jpg';
        Storage::disk('public')->put($coverPath, 'cover image');
        $article = $writer->articles()->create([
            'title' => 'Judul lama',
            'slug' => 'judul-lama',
            'summary' => 'Ringkasan lama',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
            'document_path' => $documentPath,
            'document_name' => 'naskah.pdf',
            'cover_image_path' => $coverPath,
        ]);

        $this->actingAs($writer)
            ->put(route('penulis.articles.update', $article), [
                'title' => 'Judul baru',
                'summary' => 'Ringkasan baru',
                'category' => 'Berita',
                'status' => 'draft',
                'document_method' => 'write',
                'content' => '<p>Isi baru.</p>',
                'remove_document' => '1',
                'remove_cover_image' => '1',
            ])
            ->assertRedirect(route('penulis.articles.index'));

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'document_path' => null,
            'document_name' => null,
            'cover_image_path' => null,
        ]);
        Storage::disk('local')->assertMissing($documentPath);
        Storage::disk('public')->assertMissing($coverPath);
    }

    public function test_reviewed_article_can_be_published_and_seen_publicly(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $admin = User::factory()->create(['role' => 'admin']);
        $article = $writer->articles()->create([
            'title' => 'Cerita Banjarnegara',
            'slug' => 'cerita-banjarnegara',
            'summary' => 'Cerita daerah.',
            'category' => 'Cerita & Budaya',
            'status' => 'review',
            'author_name' => $writer->name,
            'content' => '<p>Isi cerita masyarakat.</p><script>alert("xss")</script>',
        ]);

        $response = $this->actingAs($admin)->post(route('admin.articles.publish', $article));

        $response->assertRedirect();
        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'status' => 'published',
        ]);

        $publicResponse = $this->get(route('articles.show', $article->slug));
        $publicResponse->assertOk();
        $publicResponse->assertSee('Isi cerita masyarakat.');
        $publicResponse->assertDontSee('<script>', false);
        $this->assertDatabaseHas('articles', ['id' => $article->id, 'views' => 1]);
    }

    public function test_writer_can_submit_an_article_for_review_and_admin_can_publish_it(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($writer)->post(route('penulis.artikel.store'), [
            'title' => 'Cerita dari Serayu',
            'summary' => 'Kisah masyarakat di tepi sungai.',
            'category' => 'Cerita & Budaya',
            'status' => 'review',
            'document_method' => 'write',
            'content' => '<p>Warga berbagi cerita tentang Serayu.</p>',
        ])->assertRedirect(route('penulis.articles.index'));

        $article = Article::firstOrFail();
        $this->assertSame('review', $article->status);

        $this->actingAs($admin)
            ->post(route('admin.articles.publish', $article))
            ->assertRedirect();

        $this->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee('Warga berbagi cerita tentang Serayu.');
    }

    public function test_admin_can_return_an_article_for_revision_with_a_note(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $admin = User::factory()->create(['role' => 'admin']);
        $article = $writer->articles()->create([
            'title' => 'Cerita Banjarnegara',
            'slug' => 'cerita-banjarnegara',
            'summary' => 'Cerita daerah.',
            'category' => 'Cerita & Budaya',
            'status' => 'review',
            'author_name' => $writer->name,
        ]);

        $this->actingAs($admin)
            ->post(route('admin.articles.reject', $article), [
                'review_note' => 'Mohon tambahkan sumber informasi.',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('articles', [
            'id' => $article->id,
            'status' => 'rejected',
            'review_note' => 'Mohon tambahkan sumber informasi.',
        ]);
    }

    public function test_unpublished_article_is_not_available_to_the_public(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $article = $writer->articles()->create([
            'title' => 'Draft Rahasia',
            'slug' => 'draft-rahasia',
            'summary' => 'Belum diterbitkan.',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
        ]);

        $response = $this->get(route('articles.show', $article->slug));

        $response->assertNotFound();
    }

    public function test_writer_article_list_searches_all_statuses_and_can_filter_by_status(): void
    {
        $writer = User::factory()->create(['role' => 'writer']);
        $otherWriter = User::factory()->create(['role' => 'writer']);
        $writer->articles()->create([
            'title' => 'Laporan Dieng',
            'slug' => 'laporan-dieng',
            'summary' => 'Kabar wisata terbaru.',
            'category' => 'Berita',
            'status' => 'rejected',
            'author_name' => $writer->name,
        ]);
        $writer->articles()->create([
            'title' => 'Laporan Dieng Lama',
            'slug' => 'laporan-dieng-lama',
            'summary' => 'Catatan terdahulu.',
            'category' => 'Berita',
            'status' => 'draft',
            'author_name' => $writer->name,
        ]);
        $otherWriter->articles()->create([
            'title' => 'Laporan Dieng Rahasia',
            'slug' => 'laporan-dieng-rahasia',
            'summary' => 'Artikel penulis lain.',
            'category' => 'Berita',
            'status' => 'rejected',
            'author_name' => $otherWriter->name,
        ]);

        $this->actingAs($writer)
            ->get(route('penulis.articles.index', ['search' => 'Dieng', 'status' => 'rejected']))
            ->assertOk()
            ->assertSee('Laporan Dieng')
            ->assertDontSee('Laporan Dieng Lama')
            ->assertDontSee('Laporan Dieng Rahasia')
            ->assertSee('name="search"', false)
            ->assertSee('value="Dieng"', false);
    }

    public function test_password_reset_link_is_sent_for_a_registered_email(): void
    {
        $writer = User::factory()->create();
        Notification::fake();

        $this->from(route('password.request'))
            ->post(route('password.email'), ['email' => $writer->email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHas('status');

        Notification::assertSentTo($writer, ResetPassword::class);
    }

    public function test_password_can_be_reset_with_a_valid_token(): void
    {
        $writer = User::factory()->create(['password' => 'OldPassword123!']);
        $token = Password::broker()->createToken($writer);

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $writer->email,
            'password' => 'NewPassword123!',
            'password_confirmation' => 'NewPassword123!',
        ])->assertRedirect(route('login'));

        $this->assertTrue(Hash::check('NewPassword123!', $writer->fresh()->password));
    }
}
