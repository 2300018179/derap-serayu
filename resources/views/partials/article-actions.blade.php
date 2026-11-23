@php
    $actionUser = auth()->user();
    $actionCanUseReaderFeatures = in_array($actionUser?->role, ['reader', 'admin'], true);

    if (! request()->attributes->has('articleCardState')) {
        request()->attributes->set('articleCardState', [
            'liked' => $actionUser
                ? \App\Models\ArticleLike::where('user_id', $actionUser->id)->pluck('article_id')->all()
                : [],
            'saved' => $actionCanUseReaderFeatures
                ? $actionUser->savedArticles()->pluck('articles.id')->all()
                : [],
        ]);
    }

    $actionState = request()->attributes->get('articleCardState');
    $actionLiked = in_array($article->id, $actionState['liked'], true);
    $actionSaved = in_array($article->id, $actionState['saved'], true);
    $actionLoginUrl = route('login', ['article' => $article->slug]);
    $actionLikes = array_key_exists('likes_count', $article->getAttributes()) ? $article->likes_count : $article->likes()->count();
    $actionComments = array_key_exists('comments_count', $article->getAttributes()) ? $article->comments_count : $article->comments()->count();
@endphp
<div class="card-actions">
    @if ($actionCanUseReaderFeatures)
        <form method="POST" action="{{ route('articles.like', $article->slug) }}">
            @csrf
            <input type="hidden" name="from_list" value="1">
            <button type="submit" class="act {{ $actionLiked ? 'on' : '' }}" aria-pressed="{{ $actionLiked ? 'true' : 'false' }}" title="{{ $actionLiked ? 'Batalkan suka' : 'Suka' }}">
                <i class="fa-{{ $actionLiked ? 'solid' : 'regular' }} fa-heart" aria-hidden="true"></i> {{ $actionLikes }}
            </button>
        </form>
        <a class="act" href="{{ route('articles.show', $article->slug) }}#komentar" title="Komentar">
            <i class="fa-regular fa-comment" aria-hidden="true"></i> {{ $actionComments }}
        </a>
    @elseif (auth()->check())
        <span class="act static" title="Jumlah suka"><i class="fa-regular fa-heart" aria-hidden="true"></i> {{ $actionLikes }}</span>
        <span class="act static" title="Jumlah komentar"><i class="fa-regular fa-comment" aria-hidden="true"></i> {{ $actionComments }}</span>
    @else
        <a class="act" href="{{ $actionLoginUrl }}" title="Masuk untuk menyukai"><i class="fa-regular fa-heart" aria-hidden="true"></i> {{ $actionLikes }}</a>
        <a class="act" href="{{ $actionLoginUrl }}" title="Masuk untuk berkomentar"><i class="fa-regular fa-comment" aria-hidden="true"></i> {{ $actionComments }}</a>
    @endif

    <button type="button" class="act" data-share-url="{{ route('articles.show', $article->slug) }}" data-share-title="{{ $article->title }}" title="Bagikan" aria-label="Bagikan artikel">
        <i class="fa-solid fa-share-nodes" aria-hidden="true"></i>
    </button>

    @if ($actionCanUseReaderFeatures)
        <form method="POST" class="act-save" action="{{ $actionSaved ? route('pembaca.saved.destroy', $article->slug) : route('pembaca.saved.store', $article->slug) }}">
            @csrf
            @if ($actionSaved)
                @method('DELETE')
            @endif
            <button type="submit" class="act {{ $actionSaved ? 'on' : '' }}" aria-pressed="{{ $actionSaved ? 'true' : 'false' }}" title="{{ $actionSaved ? 'Hapus dari tersimpan' : 'Simpan artikel' }}" aria-label="{{ $actionSaved ? 'Hapus dari tersimpan' : 'Simpan artikel' }}">
                <i class="fa-{{ $actionSaved ? 'solid' : 'regular' }} fa-bookmark" aria-hidden="true"></i>
            </button>
        </form>
    @elseif (! auth()->check())
        <a class="act act-save" href="{{ $actionLoginUrl }}" title="Masuk untuk menyimpan" aria-label="Masuk untuk menyimpan artikel"><i class="fa-regular fa-bookmark" aria-hidden="true"></i></a>
    @endif
</div>
@once
    <style>
        .card-actions { display: flex; align-items: center; gap: 2px; padding: 6px 10px; border-top: 1px solid #e3eef2; background: #fff; }
        .card-actions form { margin: 0; display: flex; }
        .card-actions .act-save { margin-left: auto; }
        .card-actions .act { display: inline-flex; align-items: center; gap: 4px; padding: 6px 8px; border: 0; border-radius: 999px; background: transparent; color: #4b6b7d; font-family: inherit; font-size: 12px; font-weight: 600; line-height: 1; text-decoration: none; cursor: pointer; }
        .card-actions .act:hover { background: #eaf7fb; color: #0b6f8a; }
        .card-actions .act.on, .card-actions .act.on i { color: #e0415b; }
        .card-actions .act-save .act.on, .card-actions .act-save .act.on i { color: #0b6f8a; }
        .card-actions .act.static { cursor: default; }
        .card-actions .act.static:hover { background: transparent; color: #4b6b7d; }
    </style>
    <script>
        document.addEventListener('click', async function (event) {
            const button = event.target.closest('[data-share-url]');
            if (!button) {
                return;
            }
            const data = { title: button.dataset.shareTitle, url: button.dataset.shareUrl };
            try {
                if (navigator.share) {
                    await navigator.share(data);
                } else if (navigator.clipboard && window.isSecureContext) {
                    await navigator.clipboard.writeText(data.url);
                    button.title = 'Tautan disalin';
                } else {
                    window.prompt('Salin tautan artikel:', data.url);
                }
            } catch (error) {
                // Pengguna membatalkan dialog berbagi.
            }
        });
    </script>
@endonce
