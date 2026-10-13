<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class OpiniController extends Controller
{
    public function index(): View
    {
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
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(8);

        return view('opini', compact('featuredOpinion', 'popularOpinions', 'opinions'));
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
