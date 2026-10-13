<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReaderAccountController extends Controller
{
    public function profile(Request $request): View
    {
        $reader = $request->user();

        return view('reader.profile', [
            'reader' => $reader,
            'savedArticleCount' => $reader->savedArticles()->count(),
        ]);
    }

    public function savedArticles(Request $request): View
    {
        $articles = $request->user()
            ->savedArticles()
            ->where('status', 'published')
            ->orderByPivot('created_at', 'desc')
            ->paginate(12);

        return view('reader.saved-articles', compact('articles'));
    }

    public function storeSavedArticle(Request $request, Article $article): RedirectResponse
    {
        abort_unless($article->status === 'published', 404);

        $request->user()->savedArticles()->syncWithoutDetaching([$article->id]);

        return back()->with('savedArticleStatus', 'Artikel berhasil disimpan.');
    }

    public function destroySavedArticle(Request $request, Article $article): RedirectResponse
    {
        $request->user()->savedArticles()->detach($article->id);

        return back()->with('savedArticleStatus', 'Artikel dihapus dari daftar tersimpan.');
    }
}
