<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel Tersimpan | Derap Serayu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f0f9fd;color:#12456e;font:15px 'DM Sans',sans-serif}
        header{padding:18px max(24px,calc((100% - 1100px)/2));background:#063b56;color:white}header a{color:white;text-decoration:none;font-weight:800}
        main{max-width:1100px;margin:36px auto;padding:0 22px}h1{font:700 36px 'Playfair Display',serif}.intro{color:#64849b}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;margin-top:24px}
        .card{overflow:hidden;border:1px solid #d9effb;border-radius:15px;background:#fff;color:inherit;box-shadow:0 5px 15px #2473a30b}
        .card-link{display:block;color:inherit;text-decoration:none}.card img{width:100%;height:190px;object-fit:cover}
        .body{padding:17px}.category{color:#008aa8;font-size:11px;font-weight:800;text-transform:uppercase}
        h2{font:700 21px/1.3 'Playfair Display',serif}.summary{color:#64849b;line-height:1.6}.meta{color:#7091ac;font-size:12px}
        .remove{margin:0 17px 17px;padding:9px 12px;border:1px solid #d9effb;border-radius:9px;background:#fff;color:#12456e;font:600 13px 'DM Sans',sans-serif;cursor:pointer}
        .remove:hover{border-color:#08add5;color:#078fb0}.empty{padding:55px;text-align:center;border:1px solid #d9effb;border-radius:15px;background:white;color:#7091ac}
        .back-link{display:inline-block;margin-top:24px;color:#078fb0;text-decoration:none;font-weight:700}
    </style>
</head>
<body>
<header><a href="{{ route('home') }}">Derap Serayu</a></header>
<main>
    <p class="intro">Koleksi bacaan pilihanmu</p>
    <h1>Artikel Tersimpan</h1>
    @if (session('savedArticleStatus'))
        <p role="status">{{ session('savedArticleStatus') }}</p>
    @endif
    @if ($articles->isEmpty())
        <div class="empty">
            Belum ada artikel tersimpan. Jelajahi berita dan simpan artikel yang ingin dibaca lagi.
            <p><a href="{{ route('articles.index') }}">Jelajahi artikel</a></p>
        </div>
    @else
        <section class="grid" aria-label="Daftar artikel tersimpan">
            @foreach ($articles as $article)
                <article class="card">
                    <a class="card-link" href="{{ route('articles.show', $article->slug) }}">
                        <img src="{{ $article->cover_image_path ? asset('storage/'.$article->cover_image_path) : asset('images/bg-dieng-home.jpg') }}" alt="{{ $article->caption ?: $article->title }}">
                        <div class="body">
                            <div class="category">{{ $article->category }}</div>
                            <h2>{{ $article->title }}</h2>
                            <p class="summary">{{ $article->summary }}</p>
                            <p class="meta">{{ $article->author_name }} · {{ $article->published_at?->format('d M Y') }}</p>
                        </div>
                    </a>
                    <form action="{{ route('pembaca.saved.destroy', $article->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="remove" type="submit">Hapus dari tersimpan</button>
                    </form>
                </article>
            @endforeach
        </section>
        <div style="margin-top:20px">{{ $articles->links() }}</div>
    @endif
    <a class="back-link" href="{{ route('pembaca.profile') }}">← Kembali ke profil</a>
</main>
</body>
</html>
