
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Semua Artikel | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f0f9fd;
            color: #183b50;
        }

        .hero-icon {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 65px;
            opacity: .2;
        }

        .statistics {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 19px;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(18,69,110,.05);
            border: 1px solid #e8f1f5;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            margin-bottom: 13px;
        }

        .stat-card h3 {
            font-size: 24px;
            color: #12456e;
            margin-bottom: 4px;
        }

        .stat-card p {
            font-size: 11px;
            color: #8198a5;
            font-weight: 600;
        }

        .blue {
            background: #e2f4fb;
            color: #078bb4;
        }

        .yellow {
            background: #fff4d9;
            color: #c38a18;
        }

        .red {
            background: #ffe9e7;
            color: #db6558;
        }

        .green {
            background: #e2f8eb;
            color: #21975a;
        }

        .purple {
            background: #f0eaff;
            color: #8664c9;
        }

        .content-card {
            background: white;
            border-radius: 17px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(18,69,110,.05);
            border: 1px solid #e8f1f5;
        }

        .card-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .card-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #12456e;
        }

        .article-count {
            font-size: 12px;
            color: #078bb4;
            font-weight: 700;
            background: #e6f8fc;
            padding: 8px 13px;
            border-radius: 20px;
        }

        .filters {
            display: grid;
            grid-template-columns: 1.5fr 1fr auto;
            gap: 12px;
            align-items: end;
            margin-bottom: 22px;
        }

        .filter-field label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
            color: #45687b;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #91aab7;
        }

        .filter-field input,
        .filter-field select {
            width: 100%;
            height: 43px;
            border: 1px solid #dceaf0;
            border-radius: 9px;
            padding: 0 12px;
            background: #fbfdfe;
            color: #294d60;
            outline: none;
            font: inherit;
            font-size: 12px;
        }

        .filter-field input {
            padding-left: 37px;
        }

        .filter-field input:focus,
        .filter-field select:focus {
            border-color: #08add5;
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        .button {
            height: 43px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 0 17px;
            border: 0;
            border-radius: 9px;
            background: #087fa8;
            color: white;
            text-decoration: none;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .button:hover {
            background: #063f60;
        }

        .button.secondary {
            background: #edf4f7;
            color: #45687b;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            background: #f2f8fb;
            color: #56788a;
            padding: 14px 12px;
            text-align: left;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #edf2f5;
            font-size: 12px;
            color: #587382;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f8fcfd;
        }

        .article-title {
            font-size: 13px;
            color: #12456e;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .article-author {
            font-size: 11px;
            color: #91a4ae;
        }

        .category {
            display: inline-block;
            padding: 6px 10px;
            background: #edf7fa;
            border-radius: 20px;
            color: #247c9c;
            font-size: 10px;
            font-weight: 700;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status.draft {
            background: #edf1f4;
            color: #687c89;
        }

        .status.review {
            background: #fff4d9;
            color: #b78319;
        }

        .status.rejected {
            background: #ffe9e7;
            color: #d15d50;
        }

        .status.published {
            background: #e2f8eb;
            color: #218e56;
        }

        .action-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            border-radius: 8px;
            text-decoration: none;
            background: #e8f6fb;
            color: #087fa8;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .action-link:hover {
            background: #d6f0f8;
        }

        .row-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .delete-button {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 11px;
            border: 0;
            border-radius: 8px;
            background: #ffe9e7;
            color: #c44e43;
            font: inherit;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            padding: 55px 15px;
            color: #8ba1ad;
        }

        .empty i {
            font-size: 42px;
            color: #b8dce8;
            margin-bottom: 15px;
        }

        .empty h3 {
            color: #45687b;
            font-size: 17px;
            margin-bottom: 7px;
        }

        .empty p {
            font-size: 12px;
        }

        .pagination {
            margin-top: 22px;
        }

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-size: 13px;
            background: #e3f8eb;
            color: #217c4e;
        }

        @media(max-width: 1100px) {
            .statistics {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media(max-width: 800px) {
            .filters {
                grid-template-columns: 1fr;
            }

            .statistics {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media(max-width: 480px) {
            .statistics {
                grid-template-columns: 1fr 1fr;
            }

            .card-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
    @include('editor.partials.shell-styles')
</head>

<body>

    @include('editor.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="main">

        @include('editor.partials.topbar', ['pageTitle' => 'Semua Artikel'])

        <div class="content">

        <section class="hero">

            <div class="hero-content">
                <div class="hero-tag">
                    <i class="fa-solid fa-leaf"></i>
                    DERAP SERAYU EDITORIAL
                </div>

                <h1>Semua Artikel</h1>
                <p>
                    Kelola tulisan editor dan artikel para penulis dalam satu ruang kerja.
                    Periksa status, sunting naskah, dan pastikan setiap cerita siap dibaca.
                </p>
            </div>

        </section>


        {{-- FLASH MESSAGE --}}
        @if(session('success'))
            <div class="alert">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif


        {{-- STATISTIK --}}
        <section class="statistics">

            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fa-solid fa-file-lines"></i>
                </div>

                <h3>{{ number_format($totalArtikel) }}</h3>
                <p>Total Artikel</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon purple">
                    <i class="fa-solid fa-file-pen"></i>
                </div>

                <h3>{{ number_format($totalDraft) }}</h3>
                <p>Draft</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon yellow">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <h3>{{ number_format($totalReview) }}</h3>
                <p>Menunggu Tinjauan</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon red">
                    <i class="fa-solid fa-rotate-left"></i>
                </div>

                <h3>{{ number_format($totalRevisi) }}</h3>
                <p>Perlu Revisi</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <h3>{{ number_format($totalTerbit) }}</h3>
                <p>Artikel Terbit</p>
            </div>

        </section>


        {{-- DAFTAR ARTIKEL --}}
        <section class="content-card">

            <div class="card-heading">

                <div>
                    <h2>Daftar Seluruh Artikel</h2>
                </div>

                <div class="row-actions">
                    <a href="{{ route('editor.articles.create') }}" class="button">
                        <i class="fa-solid fa-plus"></i>
                        Tulis Artikel
                    </a>
                    <span class="article-count">
                        {{ $articles->total() }} Artikel
                    </span>
                </div>

            </div>


            {{-- FILTER --}}
            <form class="filters"
                  method="GET"
                  action="{{ route('editor.articles.index') }}">

                <div class="filter-field">

                    <label for="search">Cari Artikel</label>

                    <div class="input-wrap">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="search"
                            id="search"
                            name="search"
                            value="{{ $search }}"
                            maxlength="100"
                            placeholder="Judul, nama penulis, ringkasan...">

                    </div>

                </div>


                <div class="filter-field">

                    <label for="status">Status Artikel</label>

                    <select id="status" name="status">

                        <option value="">Semua Status</option>

                        <option value="draft"
                            @selected(($validated['status'] ?? '') === 'draft')>
                            Draft
                        </option>

                        <option value="review"
                            @selected(($validated['status'] ?? '') === 'review')>
                            Menunggu Tinjauan
                        </option>

                        <option value="rejected"
                            @selected(($validated['status'] ?? '') === 'rejected')>
                            Perlu Revisi
                        </option>

                        <option value="published"
                            @selected(($validated['status'] ?? '') === 'published')>
                            Terbit
                        </option>

                    </select>

                </div>


                <div class="filter-actions">

                    <button type="submit" class="button">
                        <i class="fa-solid fa-filter"></i>
                        Terapkan
                    </button>

                    @if($search || !empty($validated['status']))

                        <a href="{{ route('editor.articles.index') }}"
                           class="button secondary">
                            Reset
                        </a>

                    @endif

                </div>

            </form>


            {{-- TABEL ARTIKEL --}}
            @if($articles->isEmpty())

                <div class="empty">

                    <i class="fa-regular fa-folder-open"></i>

                    <h3>Artikel Tidak Ditemukan</h3>

                    <p>
                        Belum ada artikel yang sesuai dengan pencarian
                        atau filter yang kamu pilih.
                    </p>

                </div>

            @else

                <div class="table-wrap">

                    <table>

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul Artikel</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Diperbarui</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($articles as $index => $article)

                                <tr>

                                    <td>
                                        {{ $articles->firstItem() + $index }}
                                    </td>

                                    <td>
                                        <div class="article-title">
                                            {{ $article->title }}
                                        </div>

                                        @if($article->review_note)
                                            <div class="article-author">
                                                Catatan: {{ $article->review_note }}
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="article-author">
                                            <i class="fa-regular fa-user"></i>
                                            {{ $article->display_author }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="category">
                                            {{ $article->category }}
                                        </span>
                                    </td>

                                    <td>

                                        @switch($article->status)

                                            @case('draft')
                                                <span class="status draft">
                                                    <i class="fa-regular fa-file-lines"></i>
                                                    Draft
                                                </span>
                                                @break

                                            @case('review')
                                                <span class="status review">
                                                    <i class="fa-regular fa-clock"></i>
                                                    Menunggu Tinjauan
                                                </span>
                                                @break

                                            @case('rejected')
                                                <span class="status rejected">
                                                    <i class="fa-solid fa-rotate-left"></i>
                                                    Perlu Revisi
                                                </span>
                                                @break

                                            @case('published')
                                                <span class="status published">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    Terbit
                                                </span>
                                                @break

                                            @default
                                                <span class="status draft">
                                                    {{ $article->status }}
                                                </span>

                                        @endswitch

                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($article->updated_at)->format('d M Y') }}
                                    </td>

                                    <td>

                                        <div class="row-actions">
                                            @if($article->status === 'published')
                                            <a href="{{ route('articles.show', $article->slug) }}"
                                               class="action-link"
                                               target="_blank" rel="noopener">
                                                <i class="fa-regular fa-eye"></i>
                                                Lihat
                                            </a>
                                            @endif
                                            <a href="{{ route('editor.articles.edit', $article->id) }}"
                                               class="action-link">
                                                <i class="fa-solid fa-pen"></i>
                                                Ubah
                                            </a>
                                            <form method="POST"
                                                  action="{{ route('editor.articles.destroy', $article->id) }}"
                                                  onsubmit="return confirm('Hapus artikel ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}
                <div class="pagination">
                    {{ $articles->links() }}
                </div>

            @endif

        </section>

        </div>

    </main>

</body>
</html>
