<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PotensiController extends Controller
{
    /**
     * @var array<int, array{name: string, icon: string, desc: string, anchor: string}>
     */
    private const SECTORS = [
        [
            'name' => 'Pertanian',
            'icon' => 'fa-solid fa-seedling',
            'desc' => 'Hasil bumi dan pertanian unggulan Banjarnegara.',
            'anchor' => 'pertanian',
        ],
        [
            'name' => 'Perkebunan',
            'icon' => 'fa-solid fa-leaf',
            'desc' => 'Potensi perkebunan dataran tinggi yang asri.',
            'anchor' => 'perkebunan',
        ],
        [
            'name' => 'UMKM',
            'icon' => 'fa-solid fa-store',
            'desc' => 'Produk lokal dan usaha tangguh masyarakat.',
            'anchor' => 'umkm',
        ],
        [
            'name' => 'Pariwisata',
            'icon' => 'fa-solid fa-mountain-sun',
            'desc' => 'Destinasi wisata dengan pesona alam memukau.',
            'anchor' => 'pariwisata',
        ],
        [
            'name' => 'Ekonomi Kreatif',
            'icon' => 'fa-solid fa-wand-magic-sparkles',
            'desc' => 'Kreativitas inovatif masyarakat Banjarnegara.',
            'anchor' => 'ekraf',
        ],
        [
            'name' => 'Produk Lokal',
            'icon' => 'fa-solid fa-box-open',
            'desc' => 'Karya, kerajinan, dan oleh-oleh khas daerah.',
            'anchor' => 'produk',
        ],
    ];

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'sektor' => ['nullable', 'string', 'max:50'],
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        $activeSektor = trim($validated['sektor'] ?? '');
        $searchTerm = trim($validated['q'] ?? '');

        $baseQuery = $this->publishedPotensiQuery();

        // 1. Featured Article
        $featuredArticle = (clone $baseQuery)
            ->when($activeSektor !== '', fn (Builder $q) => $this->filterBySektor($q, $activeSektor))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->first();

        if (! $featuredArticle && $activeSektor !== '') {
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

        // 3. Paginated Articles for exploring potentials
        $articles = (clone $baseQuery)
            ->when($activeSektor !== '', fn (Builder $q) => $this->filterBySektor($q, $activeSektor))
            ->when($searchTerm !== '', fn (Builder $q) => $this->filterBySearch($q, $searchTerm))
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(6)
            ->withQueryString();

        // 4. Sectors with counts
        $sectors = array_map(function (array $sector) use ($baseQuery): array {
            $count = (clone $baseQuery)
                ->tap(fn (Builder $q) => $this->filterBySektor($q, $sector['name']))
                ->count();

            return array_merge($sector, ['count' => $count]);
        }, self::SECTORS);

        // 5. Trending tags in Potensi
        $trendingTags = [
            ['tag' => '#PertanianDieng', 'query' => 'Pertanian'],
            ['tag' => '#DawetAyu', 'query' => 'Dawet'],
            ['tag' => '#KopiBanjarnegara', 'query' => 'Kopi'],
            ['tag' => '#WisataAlam', 'query' => 'Wisata'],
            ['tag' => '#UMKMBanjarnegara', 'query' => 'UMKM'],
            ['tag' => '#KeramikKlampok', 'query' => 'Keramik'],
        ];

        return view('potensi', compact(
            'featuredArticle',
            'popularArticles',
            'articles',
            'sectors',
            'activeSektor',
            'searchTerm',
            'trendingTags'
        ));
    }

    private function publishedPotensiQuery(): Builder
    {
        return Article::query()
            ->select([
                'id',
                'slug',
                'title',
                'summary',
                'category',
                'author_name',
                'tags',
                'caption',
                'cover_image_path',
                'views',
                'published_at',
            ])
            ->where('status', 'published')
            ->where('category', 'Potensi');
    }

    private function filterBySektor(Builder $query, string $sektor): void
    {
        $query->where(function (Builder $sub) use ($sektor): void {
            $sub->whereJsonContains('tags', $sektor)
                ->orWhere('title', 'like', "%{$sektor}%")
                ->orWhere('summary', 'like', "%{$sektor}%");
        });
    }

    private function filterBySearch(Builder $query, string $searchTerm): void
    {
        $query->where(function (Builder $sub) use ($searchTerm): void {
            $sub->where('title', 'like', "%{$searchTerm}%")
                ->orWhere('summary', 'like', "%{$searchTerm}%")
                ->orWhereJsonContains('tags', $searchTerm);
        });
    }
}
