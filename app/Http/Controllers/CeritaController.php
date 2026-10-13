<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class CeritaController extends Controller
{
    public function index(): View
    {
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
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(8);

        return view('cerita', compact('featuredStory', 'popularStories', 'stories'));
    }

    private function publishedStories(): Builder
    {
        return Article::query()
            ->where('status', 'published')
            ->where('category', 'Cerita & Budaya');
    }
}
