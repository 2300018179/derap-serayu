<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleLike;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleInteractionController extends Controller
{
    private function ensureReaderOrAdmin(Request $request): void
    {
        abort_unless(
            $request->user()
                && in_array($request->user()->role, ['reader', 'admin'], true),
            403,
            'Fitur ini hanya tersedia untuk akun pembaca dan administrator.'
        );
    }

    public function toggleLike(
        Request $request,
        Article $article
    ): RedirectResponse {
        $this->ensureReaderOrAdmin($request);

        $like = ArticleLike::where('article_id', $article->id)
            ->where('user_id', $request->user()->id)
            ->first();

        if ($like) {
            $like->delete();

            $message = 'Suka pada artikel berhasil dibatalkan.';
        } else {
            ArticleLike::create([
                'article_id' => $article->id,
                'user_id' => $request->user()->id,
            ]);

            $message = 'Kamu menyukai artikel ini.';
        }

        if ($request->boolean('from_list')) {
            return back();
        }

        return back()
            ->with('likeStatus', $message)
            ->withFragment('aksi-artikel');
    }

    public function storeComment(
        Request $request,
        Article $article
    ): RedirectResponse {
        $this->ensureReaderOrAdmin($request);

        $validated = $request->validate([
            'content' => ['required', 'string', 'min:2', 'max:2000'],
        ], [
            'content.required' => 'Komentar tidak boleh kosong.',
            'content.min' => 'Komentar minimal 2 karakter.',
            'content.max' => 'Komentar maksimal 2.000 karakter.',
        ]);

        ArticleComment::create([
            'article_id' => $article->id,
            'user_id' => $request->user()->id,
            'content' => $validated['content'],
        ]);

        return back()
            ->with('commentStatus', 'Komentar berhasil dikirim.')
            ->withFragment('komentar');
    }
}
