<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EditorDashboardController extends Controller
{
    public function dashboard(Request $request): View|RedirectResponse
    {
        if ($request->user()->role === 'admin') {
            return redirect()->route('editor.articles.index');
        }

        $totalArtikel = Article::query()->count();
        $menungguTinjauan = $this->reviewQueue($request)->count();
        $totalTerbit = Article::query()->where('status', 'published')->count();
        $perluRevisi = Article::query()->where('status', 'rejected')->count();
        $antreanTinjauan = $this->reviewQueue($request)
            ->with('user')
            ->latest()
            ->take(5)
            ->get();
        $artikelTerbaru = Article::query()
            ->with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('editor.dashboard', compact(
            'totalArtikel',
            'menungguTinjauan',
            'totalTerbit',
            'perluRevisi',
            'antreanTinjauan',
            'artikelTerbaru'
        ));
    }

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'status' => [
                'nullable',
                Rule::in([
                    'draft',
                    'review',
                    'rejected',
                    'published',
                ]),
            ],
        ]);

        $search = trim($validated['search'] ?? '');

        // Mengambil seluruh artikel, termasuk artikel milik Penulis lain.
        $articles = DB::table('articles')
            ->leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->select(
                'articles.*',
                DB::raw("
                    COALESCE(
                        NULLIF(articles.author_name, ''),
                        users.name,
                        'Penulis tidak diketahui'
                    ) AS display_author
                ")
            )
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('articles.title', 'like', "%{$search}%")
                        ->orWhere('articles.summary', 'like', "%{$search}%")
                        ->orWhere('articles.category', 'like', "%{$search}%")
                        ->orWhere('articles.author_name', 'like', "%{$search}%")
                        ->orWhere('users.name', 'like', "%{$search}%");
                });
            })
            ->when(
                $validated['status'] ?? null,
                function ($query, $status) {
                    $query->where('articles.status', $status);
                }
            )
            ->orderByDesc('articles.updated_at')
            ->paginate(10)
            ->withQueryString();

        // Statistik seluruh artikel.
        $totalArtikel = DB::table('articles')->count();

        $totalDraft = DB::table('articles')
            ->where('status', 'draft')
            ->count();

        $totalReview = DB::table('articles')
            ->where('status', 'review')
            ->count();

        $totalRevisi = DB::table('articles')
            ->where('status', 'rejected')
            ->count();

        $totalTerbit = DB::table('articles')
            ->where('status', 'published')
            ->count();

        return view('editor.articles.index', compact(
            'articles',
            'search',
            'validated',
            'totalArtikel',
            'totalDraft',
            'totalReview',
            'totalRevisi',
            'totalTerbit'
        ));
    }

    public function reviewIndex(Request $request): View
    {
        $search = trim($request->input('search', ''));

        $articles = $this->reviewQueue($request)
            ->with('user')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('summary', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('author_name', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalReview = $this->reviewQueue($request)->count();

        return view('editor.articles.review', compact(
            'articles',
            'search',
            'totalReview'
        ));
    }

    public function publish(Request $request, Article $article): RedirectResponse
    {
        abort_if(
            $request->user()->role === 'editor' && $article->user_id === $request->user()->id,
            403
        );

        if ($article->status !== 'review') {
            return back()->with('error', 'Artikel ini tidak sedang menunggu tinjauan.');
        }

        $article->update([
            'status' => 'published',
            'published_at' => now(),
            'review_note' => null,
        ]);

        return back()->with('success', 'Artikel berhasil disetujui dan diterbitkan.');
    }

    public function requestRevision(Request $request, Article $article): RedirectResponse
    {
        abort_if(
            $request->user()->role === 'editor' && $article->user_id === $request->user()->id,
            403
        );

        $validated = $request->validate([
            'review_note' => ['required', 'string', 'max:2000'],
        ], [
            'review_note.required' => 'Catatan revisi wajib diisi.',
            'review_note.max' => 'Catatan revisi maksimal 2000 karakter.',
        ]);

        if ($article->status !== 'review') {
            return back()->with('error', 'Artikel ini tidak sedang menunggu tinjauan.');
        }

        $article->update([
            'status' => 'rejected',
            'review_note' => $validated['review_note'],
        ]);

        return back()->with('success', 'Artikel dikembalikan kepada Penulis untuk direvisi.');
    }

    /**
     * @return Builder<Article>
     */
    private function reviewQueue(Request $request): Builder
    {
        return Article::query()
            ->where('status', 'review')
            ->when(
                $request->user()->role === 'editor',
                fn ($query) => $query->where('user_id', '!=', $request->user()->id)
            );
    }
}
