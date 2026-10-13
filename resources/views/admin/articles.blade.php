<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Review Artikel | Derap Serayu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f0f9fd;color:#12456e;font:14px 'DM Sans',sans-serif}
        main{max-width:1200px;margin:45px auto;padding:0 22px}.head{display:flex;justify-content:space-between;align-items:center;margin-bottom:24px}
        h1{margin:0;font:700 30px 'Playfair Display',serif}.muted{color:#7091ac}
        .card{overflow-x:auto;border:1px solid #d9effb;border-radius:15px;background:#fff}
        table{width:100%;border-collapse:collapse;min-width:950px}th,td{padding:14px 16px;text-align:left;vertical-align:top;border-bottom:1px solid #e5f1f7}
        th{font-size:11px;text-transform:uppercase;color:#7091ac}.button{padding:9px 12px;border:0;border-radius:9px;background:#009fbe;color:white;font-weight:700;cursor:pointer}
        .reject{background:#fff1f2;color:#a33e50}.actions{display:flex;gap:8px;align-items:center}.actions form{margin:0}
        textarea{width:220px;min-height:60px;margin-bottom:6px;padding:8px;border:1px solid #cde5f7;border-radius:8px;font:inherit}
        .notice{margin-bottom:16px;padding:12px 15px;border-radius:10px;background:#eaf9f4;color:#176b56}.empty{padding:40px;text-align:center;color:#7091ac}
        .status{font-weight:700}.status.published{color:#08795d}
        .head-actions{display:flex;align-items:center;gap:12px}.dashboard-link{padding:9px 13px;border-radius:9px;background:#e4f4fa;color:#276183;text-decoration:none;font-weight:700}
        @media(max-width:700px){.head{align-items:flex-start;gap:12px;flex-direction:column}.head-actions{width:100%;justify-content:space-between}}
        .filter{display:flex;align-items:center;gap:10px;margin-bottom:16px}.filter select{min-height:39px;padding:8px 10px;border:1px solid #cde5f7;border-radius:8px;background:#fff;color:#12456e;font:inherit}.filter .button{text-decoration:none}
    </style>
</head>
<body>
<main>
    <header class="head">
        <div><p class="muted">Panel editorial</p><h1>Review Artikel</h1></div>
        <div class="head-actions">
            <a class="dashboard-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="button reject" type="submit">Keluar</button></form>
        </div>
    </header>
    @if(session('success'))<div class="notice" role="status">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="notice" role="alert">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
    <form class="filter" method="GET" action="{{ route('admin.articles.index') }}">
        <label for="status">Filter status</label>
        <select id="status" name="status">
            <option value="">Semua artikel</option>
            @foreach(['review' => 'Menunggu tinjauan', 'draft' => 'Draft', 'rejected' => 'Perlu revisi', 'published' => 'Terbit'] as $value => $label)
                <option value="{{ $value }}" @selected($status === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <button class="button" type="submit">Terapkan</button>
        @if($status)<a class="button dashboard-link" href="{{ route('admin.articles.index') }}">Reset</a>@endif
    </form>
    <section class="card">
        @if($articles->isEmpty())
            <div class="empty">Belum ada artikel yang tersimpan.</div>
        @else
            <table>
                <thead><tr><th>Artikel</th><th>Penulis</th><th>Status</th><th>Dibuat</th><th>Tindakan</th></tr></thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><strong>{{ $article->title }}</strong><p>{{ $article->summary }}</p>
                            @if($article->document_path)<a href="{{ route('admin.articles.document', $article) }}">Unduh naskah</a>@endif
                        </td>
                        <td>{{ $article->author_name }}<br><span class="muted">{{ $article->user->email }}</span></td>
                        <td class="status {{ $article->status }}">{{ ucfirst($article->status) }}</td>
                        <td>{{ $article->created_at->format('d M Y H:i') }}</td>
                        <td>
                            @if($article->status === 'review')
                                <div class="actions">
                                    <form method="POST" action="{{ route('admin.articles.publish', $article) }}">@csrf<button class="button" type="submit">Terbitkan</button></form>
                                    <form method="POST" action="{{ route('admin.articles.reject', $article) }}">
                                        @csrf
                                        <textarea name="review_note" required placeholder="Catatan revisi untuk penulis">{{ old('review_note') }}</textarea>
                                        <button class="button reject" type="submit">Minta Revisi</button>
                                    </form>
                                </div>
                            @elseif($article->status === 'published')
                                <a href="{{ route('articles.show', $article->slug) }}">Lihat artikel</a>
                            @else
                                <span class="muted">Belum dikirim untuk ditinjau</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </section>
    <div style="margin-top:18px">{{ $articles->links() }}</div>
</main>
</body>
</html>
