<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminArtikelController extends Controller
{
    public function dashboard(): View
    {
        $totalArtikel = Article::count();
        $menungguTinjauan = Article::where('status', 'review')->count();
        $totalTerbit = Article::where('status', 'published')->count();
        $perluRevisi = Article::where('status', 'rejected')->count();
        $totalPenulis = User::where('role', 'writer')->count();
        $artikelTerbaru = Article::latest()
            ->take(8)
            ->get();
        $antreanTinjauan = Article::where('status', 'review')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalArtikel',
            'menungguTinjauan',
            'totalTerbit',
            'perluRevisi',
            'totalPenulis',
            'artikelTerbaru',
            'antreanTinjauan'
        ));
    }

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'status' => ['nullable', Rule::in(['draft', 'review', 'rejected', 'published'])],
        ]);
        $status = $validated['status'] ?? '';
        $articles = Article::with('user')
            ->when($status !== '', fn ($query) => $query->where('status', $status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.articles', compact('articles', 'status'));
    }

    public function publish(Article $article): RedirectResponse
    {
        abort_unless($article->status === 'review', 404);

        $article->update([
            'status' => 'published',
            'published_at' => now(),
            'review_note' => null,
        ]);

        return back()->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function reject(Request $request, Article $article): RedirectResponse
    {
        abort_unless($article->status === 'review', 404);

        $validated = $request->validate([
            'review_note' => ['required', 'string', 'max:2000'],
        ]);

        $article->update([
            'status' => 'rejected',
            'review_note' => $validated['review_note'],
        ]);

        return back()->with('success', 'Artikel dikembalikan kepada penulis dengan catatan revisi.');
    }

    public function downloadDocument(Article $article)
    {
        abort_unless($article->document_path && Storage::exists($article->document_path), 404);

        return Storage::download(
            $article->document_path,
            $article->document_name ?: basename($article->document_path)
        );
    }
}
