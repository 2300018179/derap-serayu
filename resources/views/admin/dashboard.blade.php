<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | Derap Serayu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        *{box-sizing:border-box}
        body{margin:0;background:#f0f9fd;color:#12456e;font:14px 'DM Sans',sans-serif}
        a{color:inherit;text-decoration:none}
        .shell{min-height:100vh}
        .sidebar{position:fixed;inset:0 auto 0 0;width:245px;padding:24px 16px;background:linear-gradient(180deg,#073d58,#062f49);color:#e8f6fc;display:flex;flex-direction:column}
        .brand{padding:5px 12px 25px;border-bottom:1px solid #ffffff25;font:800 19px Georgia,serif}
        .brand span{color:#37d3e8}
        .nav{display:grid;gap:8px;margin-top:24px}
        .nav a{display:flex;align-items:center;gap:12px;padding:13px 14px;border-radius:11px;color:#d5edf8;font-weight:700}
        .nav a.active,.nav a:hover{background:#0798c5;color:white}
        .sidebar-bottom{margin-top:auto;padding-top:18px;border-top:1px solid #ffffff25}
        .sidebar-bottom form{margin:0}
        .logout{width:100%;padding:11px 14px;border:0;border-radius:9px;background:transparent;color:#ffe1e6;text-align:left;font:700 13px 'DM Sans',sans-serif;cursor:pointer}
        .logout:hover{background:#ffffff16}
        .main{max-width:1500px;margin-left:245px;padding:34px clamp(20px,4vw,58px) 50px}
        .topbar{display:flex;justify-content:space-between;align-items:center;gap:15px;margin-bottom:30px}
        .eyebrow{margin:0 0 8px;color:#008aa8;font-size:11px;font-weight:800;letter-spacing:1.4px}
        h1{margin:0;color:#073f5e;font:700 clamp(28px,3vw,36px)/1.2 'Playfair Display',serif}
        .intro{margin:9px 0 0;color:#7091ac}
        .admin-badge{padding:9px 13px;border:1px solid #d9effb;border-radius:999px;background:white;color:#276183;font-size:12px;font-weight:700}
        .stats{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:14px;margin-bottom:22px}
        .stat,.panel{border:1px solid #d9effb;border-radius:15px;background:#fff;box-shadow:0 5px 15px #2473a30b}
        .stat{display:flex;align-items:center;gap:13px;padding:18px}
        .stat-icon{width:42px;height:42px;display:grid;place-items:center;flex:0 0 auto;border-radius:13px;background:#e3f7fb;color:#008aa8;font-size:17px}
        .stat:nth-child(2) .stat-icon{background:#fff3d1;color:#a87300}
        .stat:nth-child(3) .stat-icon{background:#ddf7ed;color:#08795d}
        .stat:nth-child(4) .stat-icon{background:#fff1f2;color:#a33e50}
        .stat:nth-child(5) .stat-icon{background:#f2edff;color:#7143c4}
        .stat-label{color:#7091ac;font-size:11px;font-weight:700}
        .stat-value{margin-top:4px;color:#073f5e;font-size:24px;font-weight:800;line-height:1}
        .content-grid{display:grid;grid-template-columns:minmax(0,1.5fr) minmax(300px,.9fr);gap:18px}
        .panel{padding:21px;min-width:0}
        .panel-heading{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px}
        .panel-heading h2{margin:0;color:#12456e;font-size:16px}
        .panel-heading p{margin:5px 0 0;color:#7091ac;font-size:12px}
        .text-link{color:#008aa8;font-size:12px;font-weight:800}
        .queue{display:grid;gap:10px}
        .queue-item{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:13px;border:1px solid #e5f1f7;border-radius:11px;background:#fbfdfe}
        .queue-title{font-weight:800;overflow-wrap:anywhere}
        .queue-meta{margin-top:5px;color:#7091ac;font-size:11px}
        .pill{display:inline-block;flex:0 0 auto;padding:5px 9px;border-radius:99px;background:#fff3d1;color:#896000;font-size:10px;font-weight:800}
        .empty{padding:27px 14px;border:1px dashed #cde5f7;border-radius:11px;color:#7091ac;text-align:center}
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse;text-align:left}
        th,td{padding:12px 10px;border-bottom:1px solid #e5f1f7;vertical-align:top}
        th{color:#7091ac;font-size:10px;letter-spacing:.7px;text-transform:uppercase}
        td{font-size:12px}
        .article-title{font-weight:800}
        .author{display:block;margin-top:4px;color:#7091ac;font-size:11px}
        .status{display:inline-block;padding:5px 8px;border-radius:99px;background:#edf3f7;color:#547084;font-size:10px;font-weight:800;white-space:nowrap}
        .status.review{background:#fff3d1;color:#896000}
        .status.published{background:#ddf7ed;color:#08795d}
        .status.rejected{background:#fff1f2;color:#a33e50}
        .status.draft{background:#edf3f7;color:#547084}
        .notice{margin-bottom:18px;padding:12px 15px;border:1px solid #bdebd9;border-radius:10px;background:#eaf9f4;color:#176b56}
        .sidebar-profile{margin-bottom:14px;padding:11px 12px;border:1px solid #ffffff25;border-radius:11px;color:#fff;font-size:12px;font-weight:700;overflow-wrap:anywhere}
        .sidebar-profile small{display:block;margin-top:4px;color:#b5d9e9;font-weight:500}
        @media(max-width:1150px){.stats{grid-template-columns:repeat(3,minmax(0,1fr))}.content-grid{grid-template-columns:1fr}}
        @media(max-width:700px){.sidebar{position:static;width:auto;padding:14px 16px}.brand{padding:3px 6px 14px}.nav{grid-template-columns:repeat(2,minmax(0,1fr));margin-top:12px}.nav a{padding:11px;font-size:12px}.sidebar-bottom{padding-top:10px}.sidebar-profile{display:none}.main{margin:0;padding:24px 15px 36px}.topbar{align-items:flex-start;margin-bottom:22px}.stats{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.stat{padding:13px;gap:9px}.stat-icon{width:36px;height:36px}.stat-value{font-size:21px}.panel{padding:16px}.admin-badge{font-size:10px}}
    </style>
</head>
<body>
<div class="shell">
    <aside class="sidebar">
        <a class="brand" href="{{ route('admin.dashboard') }}">Derap<span>Serayu</span></a>
        <nav class="nav" aria-label="Navigasi admin">
            <a class="active" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
            <a href="{{ route('admin.articles.index') }}"><i class="fa-regular fa-file-lines"></i> Review Artikel</a>
            <a href="{{ route('home') }}" target="_blank" rel="noopener"><i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Website</a>
        </nav>
        <div class="sidebar-bottom">
            <div class="sidebar-profile">{{ auth()->user()->name }}<small>Administrator</small></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout" type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</button>
            </form>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <p class="eyebrow">PANEL EDITORIAL</p>
                <h1>Dashboard Admin</h1>
                <p class="intro">Pantau artikel dan tindak lanjuti kiriman penulis.</p>
            </div>
            <span class="admin-badge"><i class="fa-solid fa-shield-halved"></i> Administrator</span>
        </header>

        @if(session('success'))
            <div class="notice" role="status">{{ session('success') }}</div>
        @endif

        <section class="stats" aria-label="Ringkasan artikel">
            <article class="stat"><div class="stat-icon"><i class="fa-regular fa-file-lines"></i></div><div><div class="stat-label">Total Artikel</div><div class="stat-value">{{ number_format($totalArtikel, 0, ',', '.') }}</div></div></article>
            <article class="stat"><div class="stat-icon"><i class="fa-regular fa-clock"></i></div><div><div class="stat-label">Menunggu Tinjauan</div><div class="stat-value">{{ number_format($menungguTinjauan, 0, ',', '.') }}</div></div></article>
            <article class="stat"><div class="stat-icon"><i class="fa-regular fa-circle-check"></i></div><div><div class="stat-label">Sudah Terbit</div><div class="stat-value">{{ number_format($totalTerbit, 0, ',', '.') }}</div></div></article>
            <article class="stat"><div class="stat-icon"><i class="fa-solid fa-pen-to-square"></i></div><div><div class="stat-label">Perlu Revisi</div><div class="stat-value">{{ number_format($perluRevisi, 0, ',', '.') }}</div></div></article>
            <article class="stat"><div class="stat-icon"><i class="fa-solid fa-users"></i></div><div><div class="stat-label">Penulis Terdaftar</div><div class="stat-value">{{ number_format($totalPenulis, 0, ',', '.') }}</div></div></article>
        </section>

        <section class="content-grid">
            <article class="panel">
                <div class="panel-heading">
                    <div><h2>Antrean Tinjauan</h2><p>Artikel yang membutuhkan keputusan redaksi.</p></div>
                    <a class="text-link" href="{{ route('admin.articles.index', ['status' => 'review']) }}">Buka semua <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="queue">
                    @forelse($antreanTinjauan as $article)
                        <a class="queue-item" href="{{ route('admin.articles.index', ['status' => 'review']) }}">
                            <div><div class="queue-title">{{ $article->title }}</div><div class="queue-meta">{{ $article->author_name }} · {{ $article->created_at->format('d M Y') }}</div></div>
                            <span class="pill">Menunggu</span>
                        </a>
                    @empty
                        <div class="empty">Tidak ada artikel yang menunggu tinjauan.</div>
                    @endforelse
                </div>
            </article>

            <article class="panel">
                <div class="panel-heading">
                    <div><h2>Artikel Terbaru</h2><p>Kiriman terakhir dari penulis.</p></div>
                    <a class="text-link" href="{{ route('admin.articles.index') }}">Lihat daftar</a>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead><tr><th>Artikel</th><th>Status</th></tr></thead>
                        <tbody>
                        @forelse($artikelTerbaru as $article)
                            <tr>
                                <td><span class="article-title">{{ $article->title }}</span><span class="author">{{ $article->author_name }} · {{ $article->created_at->format('d M Y') }}</span></td>
                                <td><span class="status {{ $article->status }}">{{ match($article->status) { 'review' => 'Ditinjau', 'published' => 'Terbit', 'rejected' => 'Revisi', default => 'Draft' } }}</span></td>
                            </tr>
                        @empty
                            <tr><td colspan="2"><div class="empty">Belum ada artikel masuk.</div></td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </article>
        </section>
    </main>
</div>
</body>
</html>
