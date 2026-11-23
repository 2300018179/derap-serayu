<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SosokController extends Controller
{
    public function index(Request $request): View
    {
        $searchTerm = trim($request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ])['q'] ?? '');

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
            ->search($searchTerm)
            ->latest('published_at')
            ->orderByDesc('id')
            ->withCount(['likes', 'comments'])
            ->paginate(8)
            ->withQueryString();

        return view('sosok', compact('featuredSosok', 'popularSosok', 'sosokArticles', 'searchTerm'));
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
