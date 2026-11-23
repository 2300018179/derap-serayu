<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CeritaController extends Controller
{
    public function index(Request $request): View
    {
        $searchTerm = trim($request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ])['q'] ?? '');

        $featuredStory = $this->publishedStories()
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->first();

        $popularStories = $this->publishedStories()
            ->orderByDesc('views')
            ->latest('published_at')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $stories = $this->publishedStories()
            ->search($searchTerm)
            ->latest('published_at')
            ->orderByDesc('id')
            ->withCount(['likes', 'comments'])
            ->paginate(8)
            ->withQueryString();

        return view('cerita', compact('featuredStory', 'popularStories', 'stories', 'searchTerm'));
    }

    private function publishedStories(): Builder
    {
        return Article::query()
            ->where('status', 'published')
            ->where('category', 'Cerita & Budaya');
    }
}
