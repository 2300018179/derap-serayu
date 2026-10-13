<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PublicArtikelController extends Controller
{
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:100'],
        ], [
            'q.max' => 'Kata pencarian maksimal 100 karakter.',
            'category.max' => 'Kategori maksimal 100 karakter.',
        ]);
        $searchTerm = trim($validated['q'] ?? '');
        $category = trim($validated['category'] ?? '');

        $articles = Article::where('status', 'published')
            ->when($category !== '', fn (Builder $query) => $query->where('category', $category))
            ->when($searchTerm !== '', function (Builder $query) use ($searchTerm): void {
                $query->where(function (Builder $query) use ($searchTerm): void {
                    $query->where('title', 'like', "%{$searchTerm}%")
                        ->orWhere('summary', 'like', "%{$searchTerm}%")
                        ->orWhere('category', 'like', "%{$searchTerm}%")
                        ->orWhereJsonContains('tags', $searchTerm);
                });
            })
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();

        return view('articles.index', compact('articles', 'searchTerm', 'category'));
    }

    public function show(Article $article): View
    {
        abort_unless($article->status === 'published', 404);
        $article->increment('views');
        $isSaved = auth()->user()?->role === 'reader'
            && auth()->user()->savedArticles()->whereKey($article->getKey())->exists();

        return view('articles.show', compact('article', 'isSaved'));
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
