<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLike;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PublicArtikelController extends Controller
{
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:100'],
            'kecamatan' => ['nullable', 'string', Rule::in(config('kecamatan'))],
        ], [
            'q.max' => 'Kata pencarian maksimal 100 karakter.',
            'category.max' => 'Kategori maksimal 100 karakter.',
            'kecamatan.in' => 'Kecamatan tidak valid.',
        ]);
        $searchTerm = trim($validated['q'] ?? '');
        $category = trim($validated['category'] ?? '');
        $kecamatan = trim($validated['kecamatan'] ?? '');

        $articles = Article::where('status', 'published')
            ->withCount(['likes', 'comments'])
            ->when($category !== '', fn (Builder $query) => $query->where('category', $category))
            ->when($kecamatan !== '', fn (Builder $query) => $query->where('kecamatan', $kecamatan))
            ->when($searchTerm !== '', fn (Builder $query) => $query->search($searchTerm))
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();

        $likedArticleIds = auth()->check()
            ? ArticleLike::where('user_id', auth()->id())
                ->whereIn('article_id', $articles->pluck('id'))
                ->pluck('article_id')
                ->all()
            : [];

        $savedArticleIds = in_array(auth()->user()?->role, ['reader', 'admin'], true)
            ? auth()->user()->savedArticles()
                ->whereIn('articles.id', $articles->pluck('id'))
                ->pluck('articles.id')
                ->all()
            : [];

        return view('articles.index', compact('articles', 'searchTerm', 'category', 'kecamatan', 'likedArticleIds', 'savedArticleIds'));
    }

    public function show(Article $article): View
    {
        abort_unless($article->status === 'published', 404);
        $article->increment('views');
        $isSaved = in_array(auth()->user()?->role, ['reader', 'admin'], true)
            && auth()->user()->savedArticles()->whereKey($article->getKey())->exists();

        $likesCount = $article->likes()->count();
        $comments = $article->comments()->with('user:id,name')->latest()->get();
        $isLiked = auth()->check()
            && $article->likes()->where('user_id', auth()->id())->exists();

        return view('articles.show', compact('article', 'isSaved', 'likesCount', 'isLiked', 'comments'));
    }

    public function downloadDocument(Article $article)
    {
        abort_unless(
            $article->status === 'published'
                && $article->document_path
                && Storage::exists($article->document_path),
            404
        );

        return Storage::download(
            $article->document_path,
            $article->document_name ?: basename($article->document_path)
        );
    }
}
