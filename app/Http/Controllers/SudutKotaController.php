<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SudutKotaController extends Controller
{
    /**
     * @var array<int, array{name: string, icon: string, desc: string}>
     */
    private const AVAILABLE_AREAS = [
        [
            'name' => 'Pusat Kota',
            'icon' => 'fa-solid fa-city',
            'desc' => 'Aktivitas dan dinamika pusat Banjarnegara.',
        ],
        [
            'name' => 'Kuliner',
            'icon' => 'fa-solid fa-utensils',
            'desc' => 'Menjelajahi cita rasa khas Banjarnegara.',
        ],
        [
            'name' => 'Fotografi',
            'icon' => 'fa-solid fa-camera',
            'desc' => 'Sudut visual menarik yang memikat mata.',
        ],
        [
            'name' => 'Ruang Publik',
            'icon' => 'fa-solid fa-tree-city',
            'desc' => 'Tempat berkumpul dan beraktivitas warga.',
        ],
        [
            'name' => 'Komunitas',
            'icon' => 'fa-solid fa-people-group',
            'desc' => 'Kisah kreatif dan inspiratif komunitas lokal.',
        ],
    ];

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'area' => ['nullable', 'string', 'max:50'],
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        $activeArea = trim($validated['area'] ?? '');
        $searchTerm = trim($validated['q'] ?? '');

        $baseQuery = $this->publishedSudutKotaQuery();

        $featuredArticle = (clone $baseQuery)
            ->when($activeArea !== '', fn (Builder $q) => $this->filterByArea($q, $activeArea))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->first();

        // If no featured found for the specific active area, fallback to overall featured
        if (! $featuredArticle && $activeArea !== '') {
            $featuredArticle = (clone $baseQuery)
                ->orderByDesc('views')
                ->latest('published_at')
                ->orderByDesc('id')
                ->first();
        }

        $popularArticles = (clone $baseQuery)
            ->when($featuredArticle, fn (Builder $q) => $q->whereKeyNot($featuredArticle->getKey()))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $articles = (clone $baseQuery)
            ->when($activeArea !== '', fn (Builder $q) => $this->filterByArea($q, $activeArea))
            ->when($searchTerm !== '', fn (Builder $q) => $this->filterBySearch($q, $searchTerm))
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(6)
            ->withQueryString();

        $areas = array_map(function (array $area) use ($baseQuery): array {
            $count = (clone $baseQuery)
                ->tap(fn (Builder $q) => $this->filterByArea($q, $area['name']))
                ->count();

            return array_merge($area, ['count' => $count]);
        }, self::AVAILABLE_AREAS);

        $trendingTags = [
            ['tag' => '#Banjarnegara', 'query' => 'Banjarnegara'],
            ['tag' => '#AlunAlun', 'query' => 'Alun-Alun'],
            ['tag' => '#Serayu', 'query' => 'Serayu'],
            ['tag' => '#Kuliner', 'query' => 'Kuliner'],
            ['tag' => '#AnakMuda', 'query' => 'Anak Muda'],
            ['tag' => '#WisataLokal', 'query' => 'Wisata Lokal'],
        ];

        return view('sudut-kota', compact(
            'featuredArticle',
            'popularArticles',
            'articles',
            'areas',
            'activeArea',
            'searchTerm',
            'trendingTags'
        ));
    }

    private function publishedSudutKotaQuery(): Builder
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
            ->where('category', 'Sudut Kota');
    }

    private function filterByArea(Builder $query, string $area): void
    {
        $query->where(function (Builder $sub) use ($area): void {
            $sub->whereJsonContains('tags', $area)
                ->orWhere('title', 'like', "%{$area}%")
                ->orWhere('summary', 'like', "%{$area}%");
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
