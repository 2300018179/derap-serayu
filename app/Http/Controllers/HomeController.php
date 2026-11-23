<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLike;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $latestQuery = fn () => Article::where('status', 'published')->withCount(['likes', 'comments']);

        $publishedArticles = $latestQuery()
            ->orderByRaw('COALESCE(published_at, created_at) DESC')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $trendingCandidates = Article::where('status', 'published')
            ->withCount(['likes', 'comments'])
            ->withCount(['likes as recent_likes_count' => fn (Builder $query) => $query->where('created_at', '>=', now()->subDays(7))])
            ->orderByDesc('recent_likes_count')
            ->orderByDesc('views')
            ->latest('published_at')
            ->take(5)
            ->get();

        $featuredArticle = $trendingCandidates->isEmpty()
            ? null
            : $trendingCandidates->values()->get(now()->dayOfYear % $trendingCandidates->count());

        $popularArticles = Article::where('status', 'published')
            ->withCount(['likes', 'comments'])
            ->orderByDesc('likes_count')
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $randomArticles = $latestQuery()
            ->inRandomOrder()
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
        $shownIds = $publishedArticles->pluck('id')
            ->merge($popularArticles->pluck('id'))
            ->merge($randomArticles->pluck('id'))
            ->unique();
        $likedArticleIds = $user
            ? ArticleLike::where('user_id', $user->id)->whereIn('article_id', $shownIds)->pluck('article_id')->all()
            : [];

        if ($user && in_array($user->role, ['reader', 'admin'], true)) {
            $savedArticleIds = $user->savedArticles()->pluck('articles.id')->all();
            $savedArticleCount = count($savedArticleIds);
        }

        return view('home', [
            'featuredArticle' => $featuredArticle,
            'popularArticles' => $popularArticles,
            'randomArticles' => $randomArticles,
            'publishedArticles' => $publishedArticles,
            'categories' => $categoryStats,
            'trendingCategories' => $categoryStats->take(5),
            'publishedArticleCount' => Article::where('status', 'published')->count(),
            'publishedCategoryCount' => Article::where('status', 'published')->distinct()->count('category'),
            'readerCount' => User::where('role', 'reader')->count(),
            'savedArticleIds' => $savedArticleIds,
            'likedArticleIds' => $likedArticleIds,
            'savedArticleCount' => $savedArticleCount,
        ]);
    }
}
