<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class GaleriController extends Controller
{
    public function index(): View
    {
        $artikels = Article::query()
            ->where('status', 'published')
            ->whereNotNull('cover_image_path')
            ->latest('created_at')
            ->paginate(12);

        return view('galeri', compact('artikels'));
    }
}