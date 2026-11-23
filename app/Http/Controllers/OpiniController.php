<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OpiniController extends Controller
{
    public function index(Request $request): View
    {
        $searchTerm = trim($request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ])['q'] ?? '');

        $featuredOpinion = $this->publishedOpinions()
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->first();

        $popularOpinions = $this->publishedOpinions()
            ->when($featuredOpinion, fn (Builder $query) => $query->whereKeyNot($featuredOpinion->getKey()))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $opinions = $this->publishedOpinions()
            ->search($searchTerm)
            ->latest('published_at')
            ->orderByDesc('id')
            ->withCount(['likes', 'comments'])
            ->paginate(8)
            ->withQueryString();

        return view('opini', compact('featuredOpinion', 'popularOpinions', 'opinions', 'searchTerm'));
    }

    private function publishedOpinions(): Builder
    {
        return Article::query()
            ->select([
                'id',
                'slug',
                'title',
                'summary',
                'category',
                'author_name',
                'caption',
                'cover_image_path',
                'views',
                'published_at',
            ])
            ->where('status', 'published')
            ->where('category', 'Opini');
    }
}
