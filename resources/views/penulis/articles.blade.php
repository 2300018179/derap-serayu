<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel Saya | Derap Serayu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f0f9fd;color:#12456e;font:14px 'DM Sans',sans-serif}
        main{max-width:1100px;margin:45px auto;padding:0 22px}.head{display:flex;align-items:center;justify-content:space-between;gap:20px;margin-bottom:24px}
        h1{margin:0;font:700 30px 'Playfair Display',serif}.muted{color:#7091ac}
        .button{display:inline-flex;align-items:center;justify-content:center;padding:11px 16px;border:0;border-radius:10px;color:#fff;background:#009fbe;font-weight:700;text-decoration:none;cursor:pointer}
        .button.secondary{color:#276183;background:#e4f4fa}.card{overflow:hidden;border:1px solid #d9effb;border-radius:15px;background:#fff;box-shadow:0 5px 15px #2473a30b}
        table{width:100%;border-collapse:collapse}th,td{padding:15px 18px;text-align:left;border-bottom:1px solid #e5f1f7}th{font-size:11px;text-transform:uppercase;color:#7091ac}
        .status{display:inline-block;padding:5px 9px;border-radius:20px;background:#edf3f7;font-size:11px;font-weight:800}
        .status.published{color:#08795d;background:#ddf7ed}.status.review{color:#896000;background:#fff3d1}.status.rejected{color:#a33e50;background:#fff1f2}
        .actions{display:flex;gap:7px;align-items:center}.actions form{margin:0}.icon-button{border:0;background:transparent;color:#ae3b4e;cursor:pointer;font:inherit}
        .filters{display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-bottom:18px}.filters input,.filters select{min-height:42px;padding:9px 12px;border:1px solid #cde5f7;border-radius:9px;background:#fff;color:#12456e;font:inherit}.filters input{min-width:min(320px,100%)}
        .notice{margin:0 0 18px;padding:12px 15px;border-radius:10px;background:#eaf9f4;color:#176b56}
        .empty{padding:40px;text-align:center;color:#7091ac}
        @media(max-width:700px){main{margin:24px auto}.head{align-items:flex-start;flex-direction:column}.card{overflow-x:auto}table{min-width:700px}}
    </style>
</head>
<body>
<main>
    <header class="head">
        <div>
            <p class="muted">Ruang kerja penulis</p>
            <h1>Artikel Saya</h1>
        </div>
        <div class="actions">
            <a class="button secondary" href="{{ route('penulis.dashboard') }}">Dashboard</a>
            <a class="button" href="{{ route('penulis.artikel.create') }}">Tulis Artikel</a>
        </div>
    </header>
    @if(session('success'))<div class="notice" role="status">{{ session('success') }}</div>@endif
    @if($errors->any())
        <div class="notice" role="alert">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif
    <form class="filters" method="GET" action="{{ route('penulis.articles.index') }}">
        <label for="search">Cari artikel</label>
        <input id="search" name="search" type="search" maxlength="100" value="{{ $search }}"
               placeholder="Judul, ringkasan, atau kategori">
        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="">Semua status</option>
            @foreach(['draft' => 'Draft', 'review' => 'Ditinjau', 'rejected' => 'Perlu revisi', 'published' => 'Terbit'] as $value => $label)
                <option value="{{ $value }}" @selected(($validated['status'] ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <button class="button" type="submit">Terapkan</button>
        @if($search || !empty($validated['status']))
            <a class="button secondary" href="{{ route('penulis.articles.index') }}">Reset</a>
        @endif
    </form>
    <section class="card">
        @if($articles->isEmpty())
            <div class="empty">Kamu belum memiliki artikel. Mulai tulis artikel pertamamu.</div>
        @else
            <table>
                <thead><tr><th>Judul</th><th>Kategori</th><th>Status</th><th>Diperbarui</th><th>Aksi</th></tr></thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><strong>{{ $article->title }}</strong>
                            @if($article->review_note)<div class="muted">Catatan: {{ $article->review_note }}</div>@endif
                        </td>
                        <td>{{ $article->category }}</td>
                        <td><span class="status {{ $article->status }}">{{ match($article->status) { 'review' => 'Ditinjau', 'published' => 'Terbit', 'rejected' => 'Perlu revisi', default => 'Draft' } }}</span></td>
                        <td>{{ $article->updated_at->format('d M Y H:i') }}</td>
                        <td>
                            <div class="actions">
                                @if($article->status === 'published')
                                    <a class="button secondary" href="{{ route('articles.show', $article->slug) }}">Lihat</a>
                                @else
                                    <a class="button secondary" href="{{ route('penulis.articles.edit', $article) }}">Edit</a>
                                    <form method="POST" action="{{ route('penulis.articles.destroy', $article) }}" onsubmit="return confirm('Hapus artikel ini?')">
                                        @csrf @method('DELETE')
                                        <button class="icon-button" type="submit">Hapus</button>
                                    </form>
                                @endif
                            </div>
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
