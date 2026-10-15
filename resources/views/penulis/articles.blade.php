```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Artikel Saya | Derap Serayu</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --navy: #073b56;
            --navy-dark: #062f46;
            --cyan: #079fbd;
            --cyan-dark: #078ba8;
            --background: #eef9fd;
            --text: #123f60;
            --muted: #7796ad;
            --border: #d9edf8;
            --white: #ffffff;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--background);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        /* SIDEBAR */

        .sidebar {
            width: 270px;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            background: linear-gradient(
                180deg,
                #073d57 0%,
                #052f48 55%,
                #062c43 100%
            );
            color: white;
        }

        .brand {
            min-height: 83px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 17px 26px;
            border-bottom: 1px solid #ffffff18;
        }

        .brand-name {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -1px;
            color: white;
        }

        .brand-name span {
            color: #16c1d2;
        }

        .brand-caption {
            margin-top: 1px;
            font-size: 10px;
            color: #c5e4ee;
            font-weight: 600;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 23px 14px;
        }

        .menu-link {
            min-height: 51px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 0 17px;
            border-radius: 13px;
            color: #e1f0f7;
            font-size: 14px;
            font-weight: 700;
            transition: .2s ease;
        }

        .menu-link i {
            width: 23px;
            font-size: 18px;
            text-align: center;
        }

        .menu-link:hover,
        .menu-link.active {
            background: linear-gradient(110deg, #079ec2, #058db4);
            color: white;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 16px 14px 20px;
        }

        /* MAIN */

        .main {
            min-height: 100vh;
            margin-left: 270px;
        }

        /* TOP NAVBAR */

        .topbar {
            height: 80px;
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            gap: 22px;
            padding: 0 27px;
            background: rgba(255,255,255,.97);
            border-bottom: 1px solid #e0eff7;
        }

        .search-box {
            height: 43px;
            max-width: 560px;
            flex: 1;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 16px;
            border: 1px solid #cfe7f7;
            border-radius: 13px;
            color: #7196b0;
            background: white;
        }

        .search-box i {
            font-size: 16px;
        }

        .search-box input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: none;
            color: var(--text);
            background: transparent;
            font-size: 13px;
        }

        .topbar-weather {
            display: flex;
            align-items: center;
            gap: 11px;
            padding-left: 22px;
            border-left: 1px solid #e1edf4;
        }

        .weather-icon {
            color: #ffad19;
            font-size: 24px;
        }

        .weather-info strong {
            display: block;
            font-size: 12px;
        }

        .weather-info span {
            display: block;
            margin-top: 2px;
            color: var(--muted);
            font-size: 10px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 11px;
            padding-left: 20px;
            border-left: 1px solid #e1edf4;
        }

        .avatar {
            width: 41px;
            height: 41px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--navy);
            color: white;
            font-size: 16px;
            font-weight: 700;
        }

        .profile strong {
            display: block;
            max-width: 150px;
            overflow: hidden;
            color: var(--navy);
            font-size: 12px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .profile span {
            display: block;
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        /* PAGE CONTENT */

        .content {
            max-width: 1600px;
            margin: 0 auto;
            padding: 29px 27px 40px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 24px;
        }

        .eyebrow {
            margin: 0 0 7px;
            color: #7297b2;
            font-size: 12px;
            font-weight: 600;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: clamp(25px, 2.2vw, 32px);
            font-weight: 700;
        }

        .heading-description {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .heading-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            min-height: 43px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0 17px;
            border: 0;
            border-radius: 12px;
            background: var(--cyan);
            color: white;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s ease;
        }

        .button:hover {
            background: var(--cyan-dark);
            transform: translateY(-1px);
        }

        .button.secondary {
            background: #e2f3fa;
            color: #246083;
        }

        .button.secondary:hover {
            background: #d3edf7;
        }

        /* SUMMARY CARDS */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 23px;
        }

        .summary-card {
            min-height: 108px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 19px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 4px 15px #1c739008;
        }

        .summary-icon {
            width: 53px;
            height: 53px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #e6f7ff;
            color: #079de3;
            font-size: 21px;
        }

        .summary-icon.draft {
            background: #fff3dc;
            color: #f5a000;
        }

        .summary-icon.review {
            background: #e1faf3;
            color: #00ae8a;
        }

        .summary-card p {
            margin: 0 0 5px;
            color: #52738d;
            font-size: 12px;
            font-weight: 600;
        }

        .summary-card strong {
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 27px;
        }

        /* NOTIFICATIONS */

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 17px;
            padding: 14px 17px;
            border: 1px solid #ccefe3;
            border-radius: 12px;
            background: #eaf9f3;
            color: #176b56;
            font-size: 13px;
            line-height: 1.7;
        }

        .notice.error {
            border-color: #f4d6db;
            background: #fff1f3;
            color: #a33e50;
        }

        /* ARTICLE SECTION */

        .article-panel {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 5px 18px #1c73900a;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 21px 23px;
            border-bottom: 1px solid #e7f1f7;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .panel-title-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #e6f7ff;
            color: #079bd0;
            font-size: 16px;
        }

        .panel-title h2 {
            margin: 0;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 19px;
        }

        .panel-title p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .article-count {
            padding: 7px 11px;
            border-radius: 9px;
            background: #edf8fc;
            color: #28718e;
            font-size: 11px;
            font-weight: 700;
        }

        /* FILTER */

        .filters {
            display: grid;
            grid-template-columns: minmax(180px, 1fr) minmax(145px, 210px) auto;
            gap: 12px;
            align-items: end;
            padding: 20px 23px;
            border-bottom: 1px solid #e7f1f7;
            background: #fbfeff;
        }

        .filter-field label {
            display: block;
            margin-bottom: 8px;
            color: #52738d;
            font-size: 12px;
            font-weight: 700;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            top: 50%;
            left: 13px;
            color: #82a4bc;
            transform: translateY(-50%);
        }

        .filter-field input,
        .filter-field select {
            width: 100%;
            height: 43px;
            padding: 0 12px;
            border: 1px solid #d5e8f5;
            border-radius: 11px;
            outline: none;
            background: white;
            color: var(--text);
            font-size: 12px;
        }

        .filter-field input {
            padding-left: 37px;
        }

        .filter-field input:focus,
        .filter-field select:focus {
            border-color: #36b6d0;
            box-shadow: 0 0 0 3px #08a4c21a;
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        .filter-actions .button {
            min-height: 43px;
            padding: 0 15px;
            white-space: nowrap;
        }

        /* TABLE */

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #fbfdff;
        }

        th {
            padding: 15px 19px;
            border-bottom: 1px solid #e5f0f7;
            color: #7896ae;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .3px;
            white-space: nowrap;
        }

        td {
            padding: 17px 19px;
            border-bottom: 1px solid #eaf2f7;
            color: #214d6b;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .2s ease;
        }

        tbody tr:hover {
            background: #f6fcff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .article-title {
            min-width: 210px;
            max-width: 380px;
            color: #103e60;
            font-size: 12px;
            font-weight: 800;
            line-height: 1.7;
        }

        .review-note {
            margin-top: 6px;
            color: #b06c20;
            font-size: 11px;
            line-height: 1.6;
        }

        .category-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 8px;
            background: #edf7fc;
            color: #41738f;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 20px;
            background: #edf3f7;
            color: #526f85;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status.draft {
            background: #edf3f7;
            color: #45667e;
        }

        .status.review {
            background: #fff2d2;
            color: #966400;
        }

        .status.published {
            background: #dcf8ed;
            color: #08795d;
        }

        .status.rejected {
            background: #fff0f2;
            color: #b13c50;
        }

        .date-label {
            min-width: 125px;
            color: #67849a;
            font-size: 11px;
            line-height: 1.7;
            white-space: nowrap;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .actions form {
            margin: 0;
        }

        .action-button {
            min-height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 0 12px;
            border: 0;
            border-radius: 10px;
            background: #e4f4fb;
            color: #286286;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
            white-space: nowrap;
            transition: .2s ease;
        }

        .action-button:hover {
            background: #d3edf8;
        }

        .action-button.delete {
            background: transparent;
            color: #d34b5d;
        }

        .action-button.delete:hover {
            background: #fff0f2;
        }

        /* EMPTY STATE */

        .empty {
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            display: grid;
            place-items: center;
            margin: 0 auto 17px;
            border-radius: 50%;
            background: #e8f7fd;
            color: #079fc0;
            font-size: 27px;
        }

        .empty h3 {
            margin: 0 0 9px;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 20px;
        }

        .empty p {
            margin: 0 auto 20px;
            max-width: 390px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        /* PAGINATION */

        .pagination-wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 19px;
        }

        .pagination-info {
            color: var(--muted);
            font-size: 11px;
        }

        .pagination-wrap nav p {
            margin: 0;
        }

        .pagination-wrap nav > div {
            gap: 5px;
        }

        .pagination-wrap a,
        .pagination-wrap span {
            border-radius: 8px !important;
            font-size: 12px !important;
        }

        /* FOOTER */

        .footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 35px;
            padding-top: 18px;
            border-top: 1px solid #dcecf5;
            color: #819caf;
            font-size: 10px;
        }

        .footer strong {
            color: #52778e;
        }

        /* RESPONSIVE */

        @media (max-width: 1150px) {
            .sidebar {
                width: 225px;
            }

            .main {
                margin-left: 225px;
            }

            .content {
                padding-right: 19px;
                padding-left: 19px;
            }

            .topbar {
                padding: 0 19px;
            }

            .summary-grid {
                gap: 10px;
            }

            .summary-card {
                padding: 14px;
                gap: 10px;
            }

            .summary-icon {
                width: 43px;
                height: 43px;
                font-size: 18px;
            }

            .filters {
                grid-template-columns: minmax(150px, 1fr) minmax(125px, 170px);
            }

            .filter-actions {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                width: 70px;
            }

            .brand {
                align-items: center;
                padding: 15px 5px;
            }

            .brand-name {
                font-size: 0;
            }

            .brand-name::before {
                content: 'D';
                font-size: 29px;
            }

            .brand-name span,
            .brand-caption,
            .menu-link span {
                display: none;
            }

            .sidebar-menu {
                padding: 18px 9px;
            }

            .menu-link {
                justify-content: center;
                padding: 0;
            }

            .menu-link i {
                font-size: 19px;
            }

            .main {
                margin-left: 70px;
            }

            .topbar {
                height: 68px;
                gap: 12px;
                padding: 0 13px;
            }

            .topbar-weather {
                gap: 6px;
                padding-left: 10px;
            }

            .weather-icon {
                font-size: 19px;
            }

            .weather-info span,
            .profile .profile-info,
            .profile > i {
                display: none;
            }

            .profile {
                padding-left: 10px;
            }

            .avatar {
                width: 36px;
                height: 36px;
            }

            .content {
                padding: 23px 13px 30px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                min-height: 88px;
            }

            .filters {
                grid-template-columns: 1fr;
                padding: 17px;
            }

            .filter-actions {
                grid-column: auto;
            }

            .filter-actions .button {
                flex: 1;
            }

            .panel-header {
                padding: 17px;
            }

            .table-wrap table {
                min-width: 820px;
            }

            .footer {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 420px) {
            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .heading-actions {
                width: 100%;
            }

            .heading-actions .button {
                flex: 1;
            }

            .search-box {
                padding: 0 10px;
            }

            .topbar-weather {
                padding-left: 7px;
            }

            .weather-info strong {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <a href="{{ route('penulis.dashboard') }}" class="brand">
            <p class="brand-name">Derap<span>Serayu</span></p>
            <span class="brand-caption">Media Informasi Banjarnegara</span>
        </a>

        <nav class="sidebar-menu">
            <a href="{{ route('penulis.dashboard') }}" class="menu-link">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('penulis.artikel.create') }}" class="menu-link">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Tulis Artikel</span>
            </a>

            <a href="{{ route('penulis.articles.index') }}"
               class="menu-link active">
                <i class="fa-regular fa-file-lines"></i>
                <span>Artikel Saya</span>
            </a>

            <a href="{{ url('/') }}" target="_blank" class="menu-link">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>Lihat Website</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <a href="{{ route('logout') }}"
               class="menu-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                @csrf
            </form>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="main">

        {{-- TOPBAR --}}
        <header class="topbar">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text"
                       placeholder="Cari artikel, topik, atau kata kunci..."
                       aria-label="Pencarian artikel"
                       id="quickSearch">
            </div>

            <div class="topbar-weather">
                <i class="fa-solid fa-sun weather-icon"></i>
                <div class="weather-info">
                    <strong>24°C</strong>
                    <span>Banjarnegara</span>
                </div>
            </div>

            <div class="profile">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                </div>

                <div class="profile-info">
                    <strong>{{ auth()->user()->name ?? 'Penulis' }}</strong>
                    <span>Penulis</span>
                </div>

                <i class="fa-solid fa-chevron-down"
                   style="font-size:11px;color:#64869e"></i>
            </div>
        </header>

        <main class="content">

            {{-- PAGE HEADING --}}
            <section class="page-heading">
                <div>
                    <p class="eyebrow">RUANG KERJA PENULIS</p>
                    <h1>Artikel Saya</h1>
                    <p class="heading-description">
                        Kelola tulisan, pantau status, dan perbarui artikelmu
                        di Derap Serayu.
                    </p>
                </div>
            </section>

            {{-- FLASH MESSAGES --}}
            @if(session('success'))
                <div class="notice" role="status">
                    <i class="fa-solid fa-circle-check"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if($errors->any())
                <div class="notice error" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- SUMMARY --}}
            <section class="summary-grid">
                <div class="summary-card">
                    <div class="summary-icon">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>
                    <div>
                        <p>Total Artikel</p>
                        <strong>{{ $articles->total() }}</strong>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-icon review">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <p>Menunggu Tinjauan</p>
                        <strong>
                            {{ $articles->getCollection()->where('status', 'review')->count() }}
                        </strong>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-icon draft">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </div>
                    <div>
                        <p>Artikel Draft</p>
                        <strong>
                            {{ $articles->getCollection()->where('status', 'draft')->count() }}
                        </strong>
                    </div>
                </div>
            </section>

            {{-- ARTICLE LIST --}}
            <section class="article-panel">

                <div class="panel-header">
                    <div class="panel-title">
                        <div class="panel-title-icon">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                        <div>
                            <h2>Daftar Artikel</h2>
                            <p>Semua tulisan yang kamu buat</p>
                        </div>
                    </div>

                    <span class="article-count">
                        {{ $articles->total() }} artikel
                    </span>
                </div>

                {{-- FILTER FORM --}}
                <form class="filters"
                      method="GET"
                      action="{{ route('penulis.articles.index') }}">

                    <div class="filter-field">
                        <label for="search">Cari artikel</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input id="search"
                                   name="search"
                                   type="search"
                                   maxlength="100"
                                   value="{{ $search }}"
                                   placeholder="Judul, ringkasan, atau kategori">
                        </div>
                    </div>

                    <div class="filter-field">
                        <label for="status">Status artikel</label>
                        <select id="status" name="status">
                            <option value="">Semua status</option>

                            @foreach([
                                'draft' => 'Draft',
                                'review' => 'Ditinjau',
                                'rejected' => 'Perlu revisi',
                                'published' => 'Terbit'
                            ] as $value => $label)
                                <option value="{{ $value }}"
                                    @selected(($validated['status'] ?? '') === $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button class="button" type="submit">
                            <i class="fa-solid fa-filter"></i>
                            Terapkan
                        </button>

                        @if($search || !empty($validated['status']))
                            <a href="{{ route('penulis.articles.index') }}"
                               class="button secondary">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>

                {{-- TABLE --}}
                @if($articles->isEmpty())

                    <div class="empty">
                        <div class="empty-icon">
                            <i class="fa-regular fa-folder-open"></i>
                        </div>

                        <h3>Belum Ada Artikel</h3>

                        <p>
                            Kamu belum memiliki artikel yang sesuai dengan
                            pencarian ini. Mulai tulis cerita dan ide menarik
                            tentang Banjarnegara.
                        </p>

                        <a href="{{ route('penulis.artikel.create') }}"
                           class="button">
                            <i class="fa-solid fa-plus"></i>
                            Tulis Artikel Baru
                        </a>
                    </div>

                @else

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Judul Artikel</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Diperbarui</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <div class="article-title">
                                                {{ $article->title }}
                                            </div>

                                            @if($article->review_note)
                                                <div class="review-note">
                                                    <i class="fa-solid fa-comment-dots"></i>
                                                    Catatan: {{ $article->review_note }}
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="category-label">
                                                <i class="fa-regular fa-folder-open"></i>
                                                {{ $article->category }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="status {{ $article->status }}">
                                                @switch($article->status)
                                                    @case('review')
                                                        <i class="fa-solid fa-clock"></i>
                                                        Ditinjau
                                                        @break

                                                    @case('published')
                                                        <i class="fa-solid fa-circle-check"></i>
                                                        Terbit
                                                        @break

                                                    @case('rejected')
                                                        <i class="fa-solid fa-rotate-left"></i>
                                                        Perlu revisi
                                                        @break

                                                    @default
                                                        <i class="fa-regular fa-file-lines"></i>
                                                        Draft
                                                @endswitch
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-label">
                                                <i class="fa-regular fa-calendar"></i>
                                                {{ $article->updated_at->format('d M Y') }}
                                                <br>
                                                <i class="fa-regular fa-clock"></i>
                                                {{ $article->updated_at->format('H:i') }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="actions">
                                                @if($article->status === 'published')

                                                    <a class="action-button"
                                                       href="{{ route('articles.show', $article->slug) }}">
                                                        <i class="fa-regular fa-eye"></i>
                                                        Lihat
                                                    </a>

                                                @else

                                                    <a class="action-button"
                                                       href="{{ route('penulis.articles.edit', $article) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                        Edit
                                                    </a>

                                                    <form method="POST"
                                                          action="{{ route('penulis.articles.destroy', $article) }}"
                                                          onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="action-button delete"
                                                                type="submit">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                            Hapus
                                                        </button>
                                                    </form>

                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            </section>

            {{-- PAGINATION --}}
            <div class="pagination-wrap">
                <div class="pagination-info">
                    Menampilkan
                    {{ $articles->firstItem() ?? 0 }}–{{ $articles->lastItem() ?? 0 }}
                    dari {{ $articles->total() }} artikel
                </div>

                <div>
                    {{ $articles->withQueryString()->links() }}
                </div>
            </div>

            {{-- FOOTER --}}
            <footer class="footer">
                <div>
                    <strong>Derap Serayu</strong>
                    · Media Informasi Banjarnegara
                </div>

                <div>
                    Menulis cerita hari ini, menginspirasi esok hari.
                </div>
            </footer>

        </main>
    </div>

    <script>
        // Pencarian cepat pada daftar artikel yang sedang ditampilkan.
        // Untuk pencarian seluruh data, gunakan kolom pencarian di filter.
        document.getElementById('quickSearch')?.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();

                const searchInput = document.getElementById('search');
                searchInput.value = this.value;

                searchInput.closest('form').submit();
            }
        });
    </script>

</body>
</html>