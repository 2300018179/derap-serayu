<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PenulisArtikelController extends Controller
{
    public function dashboard(Request $request): View
    {
        $user = $request->user();
        $writerArticles = $user->articles();

        $totalArtikel = (clone $writerArticles)->count();
        $totalDraft = (clone $writerArticles)
            ->where('status', 'draft')
            ->count();

        $totalTerbit = (clone $writerArticles)
            ->where('status', 'published')
            ->count();

        $totalPembaca = User::where('role', 'reader')->count();

        $totalTayangan = (clone $writerArticles)
            ->where('status', 'published')
            ->sum('views');

        // Total like hanya untuk artikel terbit milik penulis ini.
        $totalLike = DB::table('article_likes')
            ->join('articles', 'articles.id', '=', 'article_likes.article_id')
            ->where('articles.user_id', $user->id)
            ->where('articles.status', 'published')
            ->count();

        // Total komentar hanya untuk artikel terbit milik penulis ini.
        $totalKomentar = DB::table('article_comments')
            ->join('articles', 'articles.id', '=', 'article_comments.article_id')
            ->where('articles.user_id', $user->id)
            ->where('articles.status', 'published')
            ->count();

        $artikelTerbaru = (clone $writerArticles)
            ->latest()
            ->take(5)
            ->get();

        $artikelTeratas = (clone $writerArticles)
            ->where('status', 'published')
            ->orderByDesc('views')
            ->take(5)
            ->get();

        $artikelPerhatian = $this->attentionArticles($request);
        $notifikasiPenulis = $this->writerNotifications($request);

        return view('penulis.dashboard', compact(
            'totalArtikel',
            'totalDraft',
            'totalTerbit',
            'totalPembaca',
            'totalTayangan',
            'totalLike',
            'totalKomentar',
            'artikelTerbaru',
            'artikelTeratas',
            'artikelPerhatian',
            'notifikasiPenulis'
        ));
    }

    public function profile(Request $request): View
    {
        $writer = $request->user();

        return view('penulis.profile', [
            'writer' => $writer,
            'notifikasiPenulis' => $this->writerNotifications($request),
            'profile' => [
                'roleLabel' => 'Penulis',
                'eyebrow' => 'RUANG PERSONAL PENULIS',
                'welcomeText' => 'Semua tulisan, status kiriman, dan informasi akun kamu ada di satu tempat. Terus hadirkan cerita terbaik dari Banjarnegara.',
                'badgeIcon' => 'fa-pen-nib',
                'heroIcon' => 'fa-pen-nib',
                'summaryCaption' => 'Terus bagikan cerita, budaya, dan informasi dari tanah Serayu.',
                'statLabel' => 'Artikel Ditulis',
                'statIcon' => 'fa-regular fa-newspaper',
                'statValue' => $writer->articles()->count(),
                'primaryLabel' => 'Dasbor Penulis',
                'primaryIcon' => 'fa-solid fa-pen-nib',
                'primaryUrl' => route('penulis.dashboard'),
            ],
        ]);
    }

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'status' => [
                'nullable',
                Rule::in(['draft', 'review', 'rejected', 'published']),
            ],
        ]);

        $search = trim($validated['search'] ?? '');

        $articles = $request->user()->articles()
            ->select('articles.*')
            ->addSelect([
                'like_count' => DB::table('article_likes')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('article_likes.article_id', 'articles.id')
                    ->where('articles.status', 'published'),

                'comment_count' => DB::table('article_comments')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('article_comments.article_id', 'articles.id')
                    ->where('articles.status', 'published'),
            ])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%'.$search.'%')
                        ->orWhere('summary', 'like', '%'.$search.'%')
                        ->orWhere('category', 'like', '%'.$search.'%');
                });
            })
            ->when(
                $validated['status'] ?? null,
                fn ($query, $status) => $query->where('status', $status)
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('penulis.articles', [
            'articles' => $articles,
            'search' => $search,
            'validated' => $validated,
            'notifikasiPenulis' => $this->writerNotifications($request),
        ]);
    }

    public function create(Request $request): View
    {
        $routePrefix = $this->routePrefix($request);
        $notifikasiPenulis = $this->writerNotifications($request);

        return view('penulis.create', compact('notifikasiPenulis', 'routePrefix'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedArticle($request);
        $method = $validated['document_method'];
        unset($validated['document_method']);

        if ($method === 'write' && empty(trim(strip_tags($validated['content'] ?? '')))) {
            return back()->withErrors(['content' => 'Isi artikel wajib diisi.'])->withInput();
        }

        if ($method === 'upload' && ! $request->hasFile('document')) {
            return back()->withErrors(['document' => 'Silakan pilih dokumen artikel.'])->withInput();
        }

        $article = $request->user()->articles()->create([
            ...$this->articleAttributes($validated, $request),
            'slug' => $this->uniqueSlug($validated['title']),
            'document_path' => $method === 'upload'
                ? $request->file('document')?->store('naskah-artikel')
                : null,
            'document_name' => $method === 'upload'
                ? $this->documentName($request->file('document'))
                : null,
            'cover_image_path' => $request->file('cover_image')?->store('sampul-artikel', 'public'),
        ]);

        return redirect()->route($this->routePrefix($request).'.articles.index')
            ->with('success', $article->status === 'review'
                ? 'Artikel berhasil dikirim untuk ditinjau.'
                : 'Artikel berhasil disimpan sebagai draft.');
    }

    public function edit(Request $request, Article $article): View
    {
        $article = $this->articleForManagement($request, $article);

        abort_if($article->status === 'published' && ! $this->canManageAllArticles($request), 403);

        $routePrefix = $this->routePrefix($request);
        $notifikasiPenulis = $this->writerNotifications($request);

        return view('penulis.create', compact('article', 'notifikasiPenulis', 'routePrefix'));
    }

    public function downloadDocument(Request $request, Article $article)
    {
        $article = $this->articleForManagement($request, $article);

        abort_unless($article->document_path && Storage::exists($article->document_path), 404);

        return Storage::download(
            $article->document_path,
            $article->document_name ?: basename($article->document_path)
        );
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $article = $this->articleForManagement($request, $article);
        abort_if($article->status === 'published' && ! $this->canManageAllArticles($request), 403);

        $validated = $this->validatedArticle($request, $article);
        $method = $validated['document_method'];
        unset($validated['document_method']);

        if ($method === 'write' && empty(trim(strip_tags($validated['content'] ?? '')))) {
            return back()->withErrors(['content' => 'Isi artikel wajib diisi.'])->withInput();
        }

        if ($method === 'upload' && ! $request->hasFile('document')
            && (! $article->document_path || $request->boolean('remove_document'))) {
            return back()->withErrors(['document' => 'Silakan pilih dokumen artikel.'])->withInput();
        }

        $oldDocumentPath = $article->document_path;
        $oldDocumentName = $article->document_name;
        $oldImagePath = $article->cover_image_path;
        $uploadedDocument = $request->file('document');
        $removeDocument = $request->boolean('remove_document') && ! $uploadedDocument;
        $documentPath = $method === 'upload'
            ? ($uploadedDocument?->store('naskah-artikel') ?? $oldDocumentPath)
            : null;
        $imagePath = $request->file('cover_image')?->store('sampul-artikel', 'public') ?? $oldImagePath;
        $removeImage = $request->boolean('remove_cover_image') && ! $request->hasFile('cover_image');

        $articleAttributes = $this->articleAttributes($validated, $request);

        if ($this->canManageAllArticles($request)) {
            unset($articleAttributes['author_name']);
        }

        $article->update([
            ...$articleAttributes,
            'slug' => $validated['title'] === $article->title
                ? $article->slug
                : $this->uniqueSlug($validated['title']),
            'document_path' => $method === 'write' || $removeDocument ? null : $documentPath,
            'document_name' => $method === 'write' || $removeDocument
                ? null
                : ($uploadedDocument ? $this->documentName($uploadedDocument) : $oldDocumentName),
            'cover_image_path' => $removeImage ? null : $imagePath,
            'published_at' => $validated['status'] === 'published' ? $article->published_at : null,
            'review_note' => null,
        ]);

        if ($method === 'write' || $removeDocument || ($uploadedDocument && $oldDocumentPath !== $documentPath)) {
            if ($oldDocumentPath) {
                Storage::delete($oldDocumentPath);
            }
        }

        if (($removeImage || ($request->hasFile('cover_image') && $oldImagePath !== $imagePath)) && $oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        return redirect()->route($this->routePrefix($request).'.articles.index')
            ->with('success', $article->status === 'review'
                ? 'Perubahan artikel disimpan dan dikirim untuk ditinjau.'
                : 'Perubahan artikel berhasil disimpan.');
    }

    public function destroy(Request $request, Article $article): RedirectResponse
    {
        $article = $this->articleForManagement($request, $article);
        abort_if($article->status === 'published' && ! $this->canManageAllArticles($request), 403);

        $documentPath = $article->document_path;
        $imagePath = $article->cover_image_path;
        $article->delete();

        if ($documentPath) {
            Storage::delete($documentPath);
        }

        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        return redirect()->route($this->routePrefix($request).'.articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    /**
     * @return Collection<int, Article>
     */
    private function attentionArticles(Request $request): Collection
    {
        return $request->user()->articles()
            ->whereIn('status', ['review', 'rejected'])
            ->latest('updated_at')
            ->take(4)
            ->get();
    }

    /**
     * @return Collection<int, Article>
     */
    private function writerNotifications(Request $request): Collection
    {
        return $request->user()->articles()
            ->whereIn('status', ['review', 'rejected', 'published'])
            ->latest('updated_at')
            ->take(4)
            ->get();
    }

    private function validatedArticle(Request $request, ?Article $article = null): array
    {
        $allowedStatuses = ['draft', 'review'];

        if ($article?->status === 'published' && $this->canManageAllArticles($request)) {
            $allowedStatuses[] = 'published';
        }

        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'summary' => ['required', 'string', 'max:500'],
            'category' => [
                'required',
                Rule::in(['Berita', 'Cerita & Budaya', 'Opini', 'Sosok', 'Sudut Kota', 'Potensi', 'Teknologi', 'Humor']),
            ],
            'kecamatan' => [
                'required',
                Rule::in(config('kecamatan', [])),
            ],
            'status' => ['required', Rule::in($allowedStatuses)],
            'document_method' => ['required', Rule::in(['write', 'upload'])],
            'tags' => ['nullable', 'string', 'max:500'],
            'caption' => ['nullable', 'string', 'max:255'],
            'photo_credit' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'document' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'extensions:pdf,doc,docx', 'max:10240'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_document' => ['sometimes', 'boolean'],
            'remove_cover_image' => ['sometimes', 'boolean'],
        ]);
    }

    private function documentName(UploadedFile $file): string
    {
        $name = basename(str_replace('\\', '/', $file->getClientOriginalName()));
        $name = preg_replace('/[\x00-\x1F\x7F]/u', '', $name);

        return $name ?: basename($file->hashName());
    }

    private function articleAttributes(array $validated, Request $request): array
    {
        return [
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'category' => $validated['category'],
            'kecamatan' => $validated['kecamatan'],
            'status' => $validated['status'],
            'author_name' => $request->user()->pen_name ?: $request->user()->name,
            'tags' => isset($validated['tags'])
                ? array_values(array_filter(array_map('trim', explode(',', $validated['tags']))))
                : [],
            'caption' => $validated['caption'] ?? null,
            'photo_credit' => $validated['photo_credit'] ?? null,
            'content' => $validated['content'] ?? null,
        ];
    }

    private function uniqueSlug(string $title): string
    {
        return Str::slug($title).'-'.Str::lower(Str::random(8));
    }

    private function articleForManagement(Request $request, Article $article): Article
    {
        return $this->canManageAllArticles($request)
            ? Article::query()->findOrFail($article->id)
            : $request->user()->articles()->findOrFail($article->id);
    }

    private function canManageAllArticles(Request $request): bool
    {
        return in_array($request->user()->role, ['editor', 'admin'], true);
    }

    private function routePrefix(Request $request): string
    {
        return $request->routeIs('editor.*') ? 'editor' : 'penulis';
    }
}
