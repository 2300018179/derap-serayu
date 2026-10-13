<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }} | Derap Serayu</title>
    <meta name="description" content="{{ $article->summary }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f0f9fd;color:#173f5b;font:16px/1.8 'DM Sans',sans-serif}
        header{padding:18px max(24px,calc((100% - 1000px)/2));background:#063b56;color:#fff}header a{color:white;text-decoration:none;font-weight:700}
        main{max-width:850px;margin:40px auto;padding:0 22px}.category{color:#008aa8;font-size:12px;font-weight:800;text-transform:uppercase}
        h1{font:700 clamp(30px,5vw,48px)/1.2 'Playfair Display',serif;color:#073f5e}
        .summary{font-size:19px;color:#64849b}.meta{color:#7091ac;font-size:13px}
        img{width:100%;max-height:500px;object-fit:cover;border-radius:16px}
        .content{margin-top:28px;white-space:pre-line;overflow-wrap:anywhere}
        .caption{font-size:12px;color:#7091ac}.attachment{display:inline-flex;gap:9px;align-items:center;margin:18px 0;padding:11px 15px;border-radius:10px;background:#063b56;color:#fff;text-decoration:none;font-weight:700}
        .save-form{margin:18px 0}.save-button{display:inline-flex;gap:9px;align-items:center;padding:11px 15px;border:1px solid #08add5;border-radius:10px;background:#fff;color:#067f9c;font:700 14px 'DM Sans',sans-serif;cursor:pointer}.save-button:hover{background:#e8f8fc}.save-status{margin:12px 0;color:#067f55;font-weight:600}.save-hint{color:#64849b;font-size:14px}footer{margin-top:60px;padding:22px;text-align:center;color:#7091ac}
    </style>
</head>
<body>
<header><a href="{{ route('home') }}">Derap Serayu</a></header>
<main>
    <div class="category">{{ $article->category }}</div>
    <h1>{{ $article->title }}</h1>
    <p class="summary">{{ $article->summary }}</p>
    <p class="meta">Oleh {{ $article->author_name }} · {{ $article->published_at?->format('d M Y') }} · {{ number_format($article->views, 0, ',', '.') }} tayangan</p>
    @if (session('savedArticleStatus'))
        <p class="save-status" role="status">{{ session('savedArticleStatus') }}</p>
    @endif
    @auth
        @if (auth()->user()->role === 'reader')
            <form class="save-form" action="{{ $isSaved ? route('pembaca.saved.destroy', $article->slug) : route('pembaca.saved.store', $article->slug) }}" method="POST">
                @csrf
                @if ($isSaved)
                    @method('DELETE')
                @endif
                <button class="save-button" type="submit">
                    <i class="fa-{{ $isSaved ? 'solid' : 'regular' }} fa-bookmark" aria-hidden="true"></i>
                    {{ $isSaved ? 'Hapus dari artikel tersimpan' : 'Simpan artikel' }}
                </button>
            </form>
        @endif
    @else
        <p class="save-hint">
            Ingin menyimpan artikel ini?
            <a href="{{ route('login', ['article' => $article->slug]) }}">Masuk sebagai pembaca</a>
        </p>
    @endauth
    @if($article->cover_image_path)
        <img src="{{ asset('storage/'.$article->cover_image_path) }}" alt="{{ $article->caption ?: $article->title }}">
        @if($article->caption)<p class="caption">{{ $article->caption }}@if($article->photo_credit) · Foto: {{ $article->photo_credit }}@endif</p>@endif
    @endif
    @php
        $articleText = preg_replace(
            '/<\/(p|h[1-6]|li|blockquote|ul|ol)>/i',
            "\n\n",
            $article->content ?? ''
        );
    @endphp
    @if(trim(strip_tags($articleText)))
        <article class="content">{{ trim(strip_tags($articleText)) }}</article>
    @elseif($article->document_path)
        <p class="content">Naskah lengkap artikel ini tersedia sebagai lampiran untuk diunduh.</p>
    @endif
    @if($article->document_path)
        <a class="attachment" href="{{ route('articles.document', $article->slug) }}">
            <i class="fa-solid fa-download"></i>
            Unduh naskah ({{ $article->document_name ?: 'dokumen artikel' }})
        </a>
    @endif
    @if($article->tags)<p class="meta">Topik: {{ implode(', ', $article->tags) }}</p>@endif
</main>
<footer>© {{ date('Y') }} Derap Serayu · Media Informasi Banjarnegara</footer>
</body>
</html>
