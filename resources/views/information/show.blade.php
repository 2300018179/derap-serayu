<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page['title'] }} | Derap Serayu</title>
    <meta name="description" content="{{ $page['intro'] }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f0f9fd;color:#12456e;font:15px/1.7 'DM Sans',sans-serif}
        header{padding:18px max(24px,calc((100% - 900px)/2));background:#063b56;color:white}header a{color:white;text-decoration:none;font-weight:800}
        main{max-width:900px;margin:42px auto;padding:0 22px}h1{font:700 clamp(30px,5vw,42px)/1.2 'Playfair Display',serif}
        .intro{color:#64849b;font-size:17px}.section{margin-top:20px;padding:22px;border:1px solid #d9effb;border-radius:14px;background:white}
        h2{margin:0 0 8px;font:700 20px 'Playfair Display',serif}.section p{margin:0;color:#496c81}
        .section a,.back{color:#078fb0;font-weight:700}.back{display:inline-block;margin-top:24px;text-decoration:none}
    </style>
</head>
<body>
<header><a href="{{ route('home') }}">Derap Serayu</a></header>
<main>
    <p class="intro">Informasi pembaca</p>
    <h1>{{ $page['title'] }}</h1>
    <p class="intro">{{ $page['intro'] }}</p>
    @foreach ($page['sections'] as $section)
        <section class="section">
            <h2>{{ $section['heading'] }}</h2>
            <p>{{ $section['body'] }}</p>
            @isset($section['url'])
                <p><a href="{{ $section['url'] }}" target="_blank" rel="noopener noreferrer">{{ $section['link_text'] }}</a></p>
            @endisset
        </section>
    @endforeach
    <a class="back" href="{{ route('home') }}">← Kembali ke beranda</a>
</main>
</body>
</html>
