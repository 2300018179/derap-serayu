@php
    $cardCover = $article->cover_image_path
        ? (str_starts_with($article->cover_image_path, 'images/') ? asset($article->cover_image_path) : asset('storage/'.$article->cover_image_path))
        : asset($cardFallbackImage ?? 'images/bg-dieng-home.jpg');
    $cardUrl = route('articles.show', $article->slug);
    $cardDate = $article->published_at ?? $article->created_at;
@endphp
<article class="ds-card">
    <a class="ds-card-image" href="{{ $cardUrl }}" tabindex="-1" aria-hidden="true">
        <img src="{{ $cardCover }}" alt="" loading="lazy">
        <span class="ds-card-category">{{ $article->category }}</span>
    </a>
    <div class="ds-card-body">
        <h3 class="ds-card-title"><a href="{{ $cardUrl }}">{{ $article->title }}</a></h3>
        <p class="ds-card-summary">{{ $article->summary }}</p>
        <div class="ds-card-meta">
            <span><i class="fa-regular fa-user" aria-hidden="true"></i> {{ $article->author_name ?: 'Redaksi' }}</span>
            <span><i class="fa-regular fa-calendar" aria-hidden="true"></i> {{ $cardDate?->translatedFormat('d M Y') }}</span>
            <span><i class="fa-regular fa-eye" aria-hidden="true"></i> {{ number_format($article->views ?? 0, 0, ',', '.') }}</span>
        </div>
    </div>
    @include('partials.article-actions')
</article>
@once
    <style>
        .ds-card { display: flex; flex-direction: column; min-width: 0; overflow: hidden; border: 1px solid #dcecf1; border-radius: 16px; background: #fff; box-shadow: 0 6px 18px rgba(7, 63, 94, .06); transition: transform .25s ease, box-shadow .25s ease; }
        .ds-card:hover { transform: translateY(-3px); box-shadow: 0 14px 28px rgba(7, 63, 94, .13); }
        .ds-card-image { position: relative; display: block; aspect-ratio: 16 / 9; overflow: hidden; background: #d8edf4; }
        .ds-card-image img { display: block; width: 100%; height: 100%; object-fit: cover; transition: transform .35s ease; }
        .ds-card:hover .ds-card-image img { transform: scale(1.04); }
        .ds-card-category { position: absolute; left: 10px; bottom: 10px; max-width: calc(100% - 20px); overflow: hidden; padding: 5px 10px; border-radius: 999px; background: #08a4c7; color: #fff; font-size: 10px; font-weight: 800; letter-spacing: .04em; text-overflow: ellipsis; text-transform: uppercase; white-space: nowrap; }
        .ds-card-body { flex: 1; display: flex; flex-direction: column; gap: 8px; padding: 14px 15px 12px; }
        .ds-card-title { margin: 0; font-family: "Playfair Display", serif; font-size: 16px; font-weight: 700; line-height: 1.35; }
        .ds-card-title a { display: -webkit-box; overflow: hidden; color: #073f5e; text-decoration: none; -webkit-box-orient: vertical; -webkit-line-clamp: 3; line-clamp: 3; }
        .ds-card-title a:hover { color: #0b6f8a; }
        .ds-card-summary { display: -webkit-box; margin: 0; overflow: hidden; color: #5f7d90; font-size: 12.5px; line-height: 1.6; text-align: justify; hyphens: auto; -webkit-box-orient: vertical; -webkit-line-clamp: 3; line-clamp: 3; }
        .ds-card-meta { display: flex; flex-wrap: wrap; gap: 4px 12px; margin-top: auto; padding-top: 4px; color: #7895a8; font-size: 11px; }
        .ds-card-meta i { margin-right: 3px; color: #08a4c7; }
    </style>
@endonce
