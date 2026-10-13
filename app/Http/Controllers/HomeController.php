<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $publishedArticles = Article::where('status', 'published')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $popularArticles = Article::where('status', 'published')
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $categoryStats = Article::query()
            ->where('status', 'published')
            ->select('category')
            ->selectRaw('COUNT(*) as articles_count')
            ->groupBy('category')
            ->orderByDesc('articles_count')
            ->orderBy('category')
            ->take(6)
            ->get()
            ->map(fn (Article $article): array => [
                'title' => $article->category,
                'count' => (int) $article->articles_count,
                'icon' => match (mb_strtolower($article->category)) {
                    'pemerintahan' => 'fa-landmark',
                    'berita' => 'fa-newspaper',
                    'cerita & budaya', 'budaya', 'cerita' => 'fa-wand-magic-sparkles',
                    'wisata', 'destinasi wisata', 'potensi' => 'fa-location-dot',
                    'pengumuman' => 'fa-bullhorn',
                    'agenda' => 'fa-calendar-days',
                    'opini' => 'fa-comment-dots',
                    'sosok' => 'fa-user',
                    'teknologi' => 'fa-microchip',
                    'humor' => 'fa-face-laugh',
                    default => 'fa-layer-group',
                },
            ]);

        $savedArticleIds = [];
        $savedArticleCount = 0;
        $user = auth()->user();

        if ($user && $user->role === 'reader') {
            $savedArticleIds = $user->savedArticles()->pluck('articles.id')->all();
            $savedArticleCount = count($savedArticleIds);
        }

        return view('home', [
            'featuredArticle' => $publishedArticles->first(),
            'popularArticles' => $popularArticles,
            'publishedArticles' => $publishedArticles,
            'categories' => $categoryStats,
            'trendingCategories' => $categoryStats->take(5),
            'publishedArticleCount' => Article::where('status', 'published')->count(),
            'publishedCategoryCount' => Article::where('status', 'published')->distinct()->count('category'),
            'readerCount' => User::where('role', 'reader')->count(),
            'savedArticleIds' => $savedArticleIds,
            'savedArticleCount' => $savedArticleCount,
        ]);
    }
}
