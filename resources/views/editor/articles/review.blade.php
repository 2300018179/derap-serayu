
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tinjauan Artikel | {{ $siteSettings['site_name'] }}</title>

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

        .summary-card {
            display: flex;
            align-items: center;
            gap: 17px;
            padding: 22px;
            background: white;
            border: 1px solid #e8f1f5;
            border-radius: 14px;
            margin-bottom: 24px;
            box-shadow: 0 5px 18px rgba(18,69,110,.05);
        }

        .summary-icon {
            width: 50px;
            height: 50px;
            display: grid;
            place-items: center;
            background: #fff4d9;
            color: #c38a18;
            border-radius: 13px;
            font-size: 21px;
        }

        .summary-card h3 {
            font-size: 25px;
            color: #12456e;
        }

        .summary-card p {
            font-size: 12px;
            color: #8198a5;
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
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .card-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #12456e;
        }

        .count {
            padding: 8px 13px;
            border-radius: 20px;
            background: #fff4d9;
            color: #b78319;
            font-size: 11px;
            font-weight: 800;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
        }

        .search-wrap {
            position: relative;
            flex: 1;
        }

        .search-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #91aab7;
        }

        .search-wrap input {
            width: 100%;
            height: 44px;
            padding: 0 15px 0 40px;
            border: 1px solid #dceaf0;
            border-radius: 9px;
            outline: none;
            font: inherit;
            font-size: 12px;
        }

        .search-wrap input:focus {
            border-color: #08add5;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 16px;
            border: none;
            border-radius: 9px;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
        }

        .button-primary {
            background: #087fa8;
            color: white;
        }

        .button-primary:hover {
            background: #063f60;
        }

        .button-secondary {
            background: #edf4f7;
            color: #45687b;
        }

        .article-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .article-item {
            padding: 19px;
            border: 1px solid #e8f0f4;
            border-radius: 13px;
            transition: .2s;
        }

        .article-item:hover {
            border-color: #b8e5f0;
            box-shadow: 0 5px 15px rgba(18,69,110,.05);
        }

        .article-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 12px;
        }

        .article-title {
            font-size: 15px;
            font-weight: 800;
            color: #12456e;
            margin-bottom: 8px;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            font-size: 11px;
            color: #8299a5;
        }

        .article-meta i {
            margin-right: 5px;
            color: #08a4c7;
        }

        .review-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 20px;
            background: #fff4d9;
            color: #b78319;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .article-summary {
            font-size: 12px;
            color: #728b99;
            line-height: 1.7;
            margin: 12px 0;
        }

        .review-note {
            background: #f3f9fc;
            padding: 12px;
            border-radius: 9px;
            font-size: 11px;
            color: #587382;
            margin: 12px 0;
        }

        .review-note strong {
            display: block;
            color: #12456e;
            margin-bottom: 5px;
        }

        .article-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            padding-top: 14px;
            border-top: 1px solid #edf2f5;
        }

        .approve-button {
            background: #e2f8eb;
            color: #218e56;
        }

        .approve-button:hover {
            background: #c9f0d9;
        }

        .revision-button {
            background: #fff1e4;
            color: #bc712b;
        }

        .revision-button:hover {
            background: #ffe5cd;
        }

        .revision-form {
            display: none;
            width: 100%;
            margin-top: 12px;
        }

        .revision-form.show {
            display: block;
        }

        .revision-form textarea {
            width: 100%;
            min-height: 90px;
            padding: 12px;
            border: 1px solid #dceaf0;
            border-radius: 9px;
            outline: none;
            font: inherit;
            font-size: 12px;
            resize: vertical;
            margin-bottom: 10px;
        }

        .revision-form textarea:focus {
            border-color: #08add5;
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

        .alert {
            padding: 13px 16px;
            margin-bottom: 18px;
            border-radius: 10px;
            font-size: 13px;
        }

        .alert.success {
            background: #e3f8eb;
            color: #217c4e;
        }

        .alert.error {
            background: #ffe9e7;
            color: #c44e43;
        }

        .pagination {
            margin-top: 22px;
        }

        @media(max-width: 800px) {
            .article-top {
                flex-direction: column;
            }
        }

        @media(max-width: 480px) {
            .card-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-form {
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

        @include('editor.partials.topbar', ['pageTitle' => 'Tinjauan Artikel'])

        <div class="content">

        {{-- HERO --}}
        <section class="hero">

            <div class="hero-content">
                <div class="hero-tag">
                    <i class="fa-solid fa-leaf"></i>
                    DERAP SERAYU EDITORIAL
                </div>

                <h1>Tinjauan Artikel</h1>
                <p>
                    Periksa artikel dari penulis, lalu setujui untuk diterbitkan
                    atau kirim kembali dengan catatan revisi yang jelas.
                </p>
            </div>

        </section>


        {{-- NOTIFIKASI --}}
        @if(session('success'))
            <div class="alert success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif


        {{-- SUMMARY --}}
        <section class="summary-card">

            <div class="summary-icon">
                <i class="fa-solid fa-clock"></i>
            </div>

            <div>
                <h3>{{ number_format($totalReview) }}</h3>
                <p>Artikel sedang menunggu tinjauan Editor</p>
            </div>

        </section>


        {{-- DAFTAR ARTIKEL --}}
        <section class="content-card">

            <div class="card-heading">

                <h2>Artikel Menunggu Tinjauan</h2>

                <span class="count">
                    {{ $articles->total() }} Artikel
                </span>

            </div>


            {{-- SEARCH --}}
            <form method="GET"
                  action="{{ route('editor.articles.review') }}"
                  class="search-form">

                <div class="search-wrap">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="search"
                           name="search"
                           value="{{ $search }}"
                           maxlength="100"
                           placeholder="Cari judul atau nama Penulis...">

                </div>

                <button type="submit" class="button button-primary">
                    <i class="fa-solid fa-search"></i>
                    Cari
                </button>

                @if($search)
                    <a href="{{ route('editor.articles.review') }}"
                       class="button button-secondary">
                        Reset
                    </a>
                @endif

            </form>


            {{-- ARTICLE LIST --}}
            @if($articles->isEmpty())

                <div class="empty">

                    <i class="fa-regular fa-circle-check"></i>

                    <h3>Tidak Ada Artikel yang Menunggu Tinjauan</h3>

                    <p>
                        Semua artikel yang masuk sudah ditinjau
                        atau belum ada artikel baru dari Penulis.
                    </p>

                </div>

            @else

                <div class="article-list">

                    @foreach($articles as $article)

                        <article class="article-item">

                            <div class="article-top">

                                <div>

                                    <div class="article-title">
                                        {{ $article->title }}
                                    </div>

                                    <div class="article-meta">

                                        <span>
                                            <i class="fa-regular fa-user"></i>

                                            {{ $article->author_name ?: ($article->user->name ?? 'Penulis tidak diketahui') }}
                                        </span>

                                        <span>
                                            <i class="fa-regular fa-folder"></i>
                                            {{ $article->category }}
                                        </span>

                                        <span>
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $article->created_at->format('d M Y') }}
                                        </span>

                                    </div>

                                </div>

                                <span class="review-badge">
                                    <i class="fa-regular fa-clock"></i>
                                    Menunggu Tinjauan
                                </span>

                            </div>


                            @if($article->summary)
                                <p class="article-summary">
                                    {{ $article->summary }}
                                </p>
                            @endif


                            @if($article->review_note)
                                <div class="review-note">
                                    <strong>Catatan sebelumnya</strong>
                                    {{ $article->review_note }}
                                </div>
                            @endif


                            {{-- ACTIONS --}}
                            <div class="article-actions">

                                <button type="button"
                                        class="button button-primary"
                                        onclick="toggleRevision('revision-{{ $article->id }}')">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Minta Revisi
                                </button>

                                <form method="POST"
                                      action="{{ route('editor.articles.publish', $article->id) }}"
                                      onsubmit="return confirm('Apakah kamu yakin ingin menyetujui dan menerbitkan artikel ini?')">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="button approve-button">
                                        <i class="fa-solid fa-circle-check"></i>
                                        Setujui & Terbitkan
                                    </button>

                                </form>

                            </div>


                            {{-- REVISION FORM --}}
                            <form method="POST"
                                  action="{{ route('editor.articles.revision', $article->id) }}"
                                  class="revision-form"
                                  id="revision-{{ $article->id }}">

                                @csrf
                                @method('PATCH')

                                <label for="note-{{ $article->id }}"
                                       style="display:block; font-size:12px; font-weight:700; margin-bottom:8px;">
                                    Catatan Revisi untuk Penulis
                                </label>

                                <textarea
                                    id="note-{{ $article->id }}"
                                    name="review_note"
                                    maxlength="2000"
                                    required
                                    placeholder="Tuliskan bagian yang perlu diperbaiki oleh Penulis..."></textarea>

                                <button type="submit"
                                        class="button revision-button">
                                    <i class="fa-solid fa-paper-plane"></i>
                                    Kirim Permintaan Revisi
                                </button>

                            </form>

                        </article>

                    @endforeach

                </div>


                <div class="pagination">
                    {{ $articles->links() }}
                </div>

            @endif

        </section>

        </div>

    </main>


    <script>
        function toggleRevision(id) {
            const form = document.getElementById(id);

            if (form) {
                form.classList.toggle('show');

                if (form.classList.contains('show')) {
                    form.querySelector('textarea').focus();
                }
            }
        }
    </script>

</body>
</html>