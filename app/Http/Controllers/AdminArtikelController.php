<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArtikelController extends Controller
{
    public function index(Request $request)
    {
        $statusAktif = $request->query('status', 'review');

        $statusValid = ['review', 'published', 'rejected', 'draft'];

        if (! in_array($statusAktif, $statusValid, true)) {
            $statusAktif = 'review';
        }

        $query = Article::query()
            ->with('user:id,name,email')
            ->where('status', $statusAktif);

        $search = trim((string) $request->query('search', ''));

        if ($search !== '') {
            $query->where(function ($query) use ($search): void {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%")
                    ->orWhere('author_name', 'like', "%{$search}%");
            });
        }

        $articles = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Jumlah artikel untuk masing-masing kategori
        $jumlahReview = Article::where('status', 'review')->count();
        $jumlahPublished = Article::where('status', 'published')->count();
        $jumlahRevisi = Article::where('status', 'rejected')->count();
        $jumlahDraft = Article::where('status', 'draft')->count();

        return view('admin.articles', compact(
            'articles',
            'statusAktif',
            'jumlahReview',
            'jumlahPublished',
            'jumlahRevisi',
            'jumlahDraft'
        ));
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
