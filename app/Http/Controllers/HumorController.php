<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HumorController extends Controller
{
    /**
     * @var array<int, array{name: string, icon: string, desc: string, anchor: string}>
     */
    private const CATEGORIES = [
        [
            'name' => 'Guyonan Lokal',
            'icon' => 'fa-solid fa-face-laugh-squint',
            'desc' => 'Kelakar hangat seputar kebiasaan dan celetukan khas Banjarnegara.',
            'anchor' => 'guyonan-lokal',
        ],
        [
            'name' => 'Anekdot Warga',
            'icon' => 'fa-solid fa-comments',
            'desc' => 'Kisah lucu sehari-hari dari pos ronda, pasar, hingga sawah.',
            'anchor' => 'anekdot-warga',
        ],
        [
            'name' => 'Cerita Jenaka',
            'icon' => 'fa-solid fa-masks-theater',
            'desc' => 'Dongeng jenaka dan hikmah menggelitik penuh tawa segar.',
            'anchor' => 'cerita-jenaka',
        ],
        [
            'name' => 'Satir Ringan',
            'icon' => 'fa-solid fa-mug-hot',
            'desc' => 'Sindiran santai dan jenaka menyikapi tren dan fenomena sosial.',
            'anchor' => 'satir-ringan',
        ],
        [
            'name' => 'Parodi & Plesetan',
            'icon' => 'fa-solid fa-icons',
            'desc' => 'Pelesetan kata, istilah banyumasan, dan tebak-tebakan renyah.',
            'anchor' => 'parodi-plesetan',
        ],
        [
            'name' => 'Humor Keseharian',
            'icon' => 'fa-solid fa-umbrella-beach',
            'desc' => 'Momen tak terduga yang bikin tersenyum simpul saat menjalani rutinitas.',
            'anchor' => 'humor-keseharian',
        ],
    ];

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'kategori' => ['nullable', 'string', 'max:50'],
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        $activeKategori = trim($validated['kategori'] ?? '');
        $searchTerm = trim($validated['q'] ?? '');

        $baseQuery = $this->publishedHumorQuery();

        // 1. Featured Article (most viewed or latest)
        $featuredArticle = (clone $baseQuery)
            ->when($activeKategori !== '', fn (Builder $q) => $this->filterByKategori($q, $activeKategori))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->first();

        if (! $featuredArticle && $activeKategori !== '') {
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

        // 3. Paginated Articles for exploring humor
        $articles = (clone $baseQuery)
            ->when($activeKategori !== '', fn (Builder $q) => $this->filterByKategori($q, $activeKategori))
            ->when($searchTerm !== '', fn (Builder $q) => $this->filterBySearch($q, $searchTerm))
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(6)
            ->withQueryString();

        // 4. Categories with counts
        $categories = array_map(function (array $cat) use ($baseQuery): array {
            $count = (clone $baseQuery)
                ->tap(fn (Builder $q) => $this->filterByKategori($q, $cat['name']))
                ->count();

            return array_merge($cat, ['count' => $count]);
        }, self::CATEGORIES);

        // 5. Trending tags in Humor
        $trendingTags = [
            ['tag' => '#GuyonanBanyumasan', 'query' => 'Guyonan'],
            ['tag' => '#AnekdotPosRonda', 'query' => 'Pos Ronda'],
            ['tag' => '#DawetAyuNyentrik', 'query' => 'Dawet Ayu'],
            ['tag' => '#KetawaSehat', 'query' => 'Jenaka'],
            ['tag' => '#KisahLucuWarga', 'query' => 'Kisah Lucu'],
            ['tag' => '#SatirSantai', 'query' => 'Satir'],
        ];

        return view('humor', compact(
            'featuredArticle',
            'popularArticles',
            'articles',
            'categories',
            'activeKategori',
            'searchTerm',
            'trendingTags'
        ));
    }

    private function publishedHumorQuery(): Builder
    {
        return Article::query()
            ->where('status', 'published')
            ->where('category', 'Humor')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    private function filterByKategori(Builder $query, string $kategori): Builder
    {
        return $query->where(function (Builder $subQuery) use ($kategori): void {
            $subQuery->whereJsonContains('tags', $kategori)
                ->orWhere('tags', 'like', '%"'.$kategori.'"%')
                ->orWhere('title', 'like', '%'.$kategori.'%')
                ->orWhere('summary', 'like', '%'.$kategori.'%');
        });
    }

    private function filterBySearch(Builder $query, string $term): Builder
    {
        return $query->where(function (Builder $subQuery) use ($term): void {
            $subQuery->where('title', 'like', "%{$term}%")
                ->orWhere('summary', 'like', "%{$term}%")
                ->orWhere('content', 'like', "%{$term}%")
                ->orWhere('author_name', 'like', "%{$term}%")
                ->orWhere('tags', 'like', "%{$term}%");
        });
    }
}
