<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeknologiController extends Controller
{
    /**
     * @var array<int, array{name: string, icon: string, desc: string, anchor: string}>
     */
    private const TOPICS = [
        [
            'name' => 'Transformasi Digital',
            'icon' => 'fa-solid fa-laptop-code',
            'desc' => 'Perkembangan sistem digital dan layanan publik pintar.',
            'anchor' => 'digital',
        ],
        [
            'name' => 'Inovasi',
            'icon' => 'fa-solid fa-lightbulb',
            'desc' => 'Ide baru, riset, dan rekayasa teknologi lokal.',
            'anchor' => 'inovasi',
        ],
        [
            'name' => 'AI & IoT',
            'icon' => 'fa-solid fa-robot',
            'desc' => 'Pemanfaatan kecerdasan buatan dan sensor terhubung.',
            'anchor' => 'ai-iot',
        ],
        [
            'name' => 'UMKM Digital',
            'icon' => 'fa-solid fa-store',
            'desc' => 'Adopsi e-commerce dan pembayaran non-tunai pelaku usaha.',
            'anchor' => 'umkm-digital',
        ],
        [
            'name' => 'Kreativitas Pemuda',
            'icon' => 'fa-solid fa-mobile-screen-button',
            'desc' => 'Karya kreator konten, programmer, dan startup muda.',
            'anchor' => 'pemuda',
        ],
        [
            'name' => 'Literasi Digital',
            'icon' => 'fa-solid fa-graduation-cap',
            'desc' => 'Edukasi keamanan siber dan pemanfaatan internet sehat.',
            'anchor' => 'literasi',
        ],
    ];

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'topik' => ['nullable', 'string', 'max:50'],
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        $activeTopik = trim($validated['topik'] ?? '');
        $searchTerm = trim($validated['q'] ?? '');

        $baseQuery = $this->publishedTeknologiQuery();

        // 1. Featured Article (most viewed or latest)
        $featuredArticle = (clone $baseQuery)
            ->when($activeTopik !== '', fn (Builder $q) => $this->filterByTopik($q, $activeTopik))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->first();

        if (! $featuredArticle && $activeTopik !== '') {
            $featuredArticle = (clone $baseQuery)
                ->orderByDesc('views')
                ->latest('published_at')
                ->orderByDesc('id')
                ->first();
        }

        // 2. Popular Articles (take 4 excluding featured)
        $popularArticles = (clone $baseQuery)
            ->when($featuredArticle, fn (Builder $q) => $q->whereKeyNot($featuredArticle->getKey()))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        // 3. Paginated Articles for exploring technology
        $articles = (clone $baseQuery)
            ->when($activeTopik !== '', fn (Builder $q) => $this->filterByTopik($q, $activeTopik))
            ->when($searchTerm !== '', fn (Builder $q) => $this->filterBySearch($q, $searchTerm))
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(6)
            ->withQueryString();

        // 4. Topics with counts
        $topics = array_map(function (array $topic) use ($baseQuery): array {
            $count = (clone $baseQuery)
                ->tap(fn (Builder $q) => $this->filterByTopik($q, $topic['name']))
                ->count();

            return array_merge($topic, ['count' => $count]);
        }, self::TOPICS);

        // 5. Trending tags in Teknologi
        $trendingTags = [
            ['tag' => '#SmartVillage', 'query' => 'Smart Village'],
            ['tag' => '#InovasiDieng', 'query' => 'Inovasi'],
            ['tag' => '#UMKMDigital', 'query' => 'UMKM Digital'],
            ['tag' => '#LiterasiDigital', 'query' => 'Literasi'],
            ['tag' => '#KaryaAnakMuda', 'query' => 'Anak Muda'],
            ['tag' => '#IoTPertanian', 'query' => 'IoT'],
        ];

        return view('teknologi', compact(
            'featuredArticle',
            'popularArticles',
            'articles',
            'topics',
            'activeTopik',
            'searchTerm',
            'trendingTags'
        ));
    }

    private function publishedTeknologiQuery(): Builder
    {
        return Article::query()
            ->with('user')
            ->where('category', 'Teknologi')
            ->where('status', 'published')
            ->whereNotNull('published_at');
    }

    private function filterByTopik(Builder $query, string $topik): Builder
    {
        return $query->where(function (Builder $sub) use ($topik) {
            $sub->whereJsonContains('tags', $topik)
                ->orWhere('title', 'like', '%'.$topik.'%')
                ->orWhere('summary', 'like', '%'.$topik.'%');
        });
    }

    private function filterBySearch(Builder $query, string $searchTerm): Builder
    {
        return $query->where(function (Builder $sub) use ($searchTerm) {
            $sub->where('title', 'like', '%'.$searchTerm.'%')
                ->orWhere('summary', 'like', '%'.$searchTerm.'%')
                ->orWhere('content', 'like', '%'.$searchTerm.'%')
                ->orWhereJsonContains('tags', $searchTerm);
        });
    }
}
