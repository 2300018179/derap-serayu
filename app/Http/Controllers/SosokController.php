<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class SosokController extends Controller
{
    public function index(): View
    {
        $featuredSosok = $this->publishedSosok()
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->first();

        $popularSosok = $this->publishedSosok()
            ->when($featuredSosok, fn (Builder $query) => $query->whereKeyNot($featuredSosok->getKey()))
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $sosokArticles = $this->publishedSosok()
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(8);

        return view('sosok', compact('featuredSosok', 'popularSosok', 'sosokArticles'));
    }

    private function publishedSosok(): Builder
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
            ->where('category', 'Sosok');
    }
}
