
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Editor | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #12456e;
            --primary-dark: #063f60;
            --cyan: #08add5;
            --light: #f0f9fd;
            --white: #ffffff;
            --text: #233b50;
            --muted: #7b91a3;
            --border: #e1edf3;
            --green: #16834c;
            --orange: #d97706;
            --red: #dc5555;
            --sidebar-width: 260px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--light);
            color: var(--text);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            width: var(--sidebar-width);
            height: 100vh;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 24px 17px;
            background:
                linear-gradient(
                    180deg,
                    rgba(6, 48, 75, .97),
                    rgba(9, 69, 93, .97)
                ),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center/cover;
            color: white;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            transition: .3s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            padding: 10px;
        }

        .brand-logo-wrapper {
            background: white;
            width: 190px;
            height: 76px;
            border-radius: 13px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px 15px;
        }

        .brand-logo {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .sidebar-label {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.6px;
            color: #91bdcf;
            margin: 12px 12px 13px;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            border-radius: 11px;
            color: #d5e9f1;
            font-size: 13px;
            font-weight: 500;
            transition: .25s;
        }

        .nav-link i {
            width: 19px;
            text-align: center;
            font-size: 15px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(8, 173, 213, .23);
            color: white;
        }

        .nav-link.active {
            border-left: 3px solid var(--cyan);
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .editor-info {
            padding: 15px;
            background: rgba(255,255,255,.09);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 13px;
            margin-bottom: 14px;
        }

        .editor-info strong {
            display: block;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .editor-info span {
            font-size: 11px;
            color: #a9cedb;
        }

        .logout-button {
            width: 100%;
            border: 0;
            background: rgba(255,255,255,.09);
            color: white;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            text-align: left;
            font-size: 13px;
        }

        .logout-button:hover {
            background: rgba(220,85,85,.25);
        }

        /* MAIN */

        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: .3s ease;
        }

        /* TOPBAR */

        .topbar {
            height: 78px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--border);
            padding: 0 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 500;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .menu-toggle {
            display: none;
            border: 0;
            background: transparent;
            color: var(--primary);
            font-size: 20px;
            cursor: pointer;
        }

        .breadcrumb {
            font-size: 12px;
            color: var(--muted);
        }

        .breadcrumb strong {
            color: var(--primary);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .date-info {
            font-size: 12px;
            color: var(--muted);
        }

        .account {
            display: flex;
            align-items: center;
            gap: 11px;
            padding-left: 20px;
            border-left: 1px solid var(--border);
        }

        .avatar {
            width: 39px;
            height: 39px;
            background: linear-gradient(135deg, var(--primary), var(--cyan));
            border-radius: 50%;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
            font-size: 14px;
        }

        .account-name strong {
            display: block;
            color: var(--primary);
            font-size: 12px;
        }

        .account-name span {
            color: var(--muted);
            font-size: 10px;
        }

        /* CONTENT */

        .content {
            padding: 32px 35px 45px;
            max-width: 1600px;
            margin: auto;
        }

        /* HERO */

        .hero {
            min-height: 205px;
            border-radius: 20px;
            padding: 32px 35px;
            position: relative;
            overflow: hidden;
            color: white;
            display: flex;
            align-items: center;
            background:
                linear-gradient(
                    100deg,
                    rgba(5, 48, 75, .96),
                    rgba(8, 105, 129, .79)
                ),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center 45%/cover;
            box-shadow: 0 10px 30px rgba(18,69,110,.12);
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 50%;
            right: 8%;
            top: -85px;
            box-shadow:
                0 0 0 25px rgba(255,255,255,.04),
                0 0 0 50px rgba(255,255,255,.03);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.4px;
            color: #b9f0fa;
            margin-bottom: 13px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            margin-bottom: 10px;
        }

        .hero p {
            color: #d3e9f1;
            font-size: 13px;
            line-height: 1.8;
            max-width: 550px;
        }

        /* SECTION */

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 30px 0 17px;
        }

        .section-heading h2 {
            color: var(--primary);
            font-family: 'Playfair Display', serif;
            font-size: 19px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        /* STATISTICS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
        }

        .stat-card {
            background: white;
            padding: 21px;
            border: 1px solid var(--border);
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(18,69,110,.035);
            transition: .25s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 9px 22px rgba(18,69,110,.09);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 13px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 19px;
        }

        .icon-blue {
            background: #e8f2ff;
            color: #2873c9;
        }

        .icon-orange {
            background: #fff3e4;
            color: #d88723;
        }

        .icon-green {
            background: #e6f7ed;
            color: #16834c;
        }

        .icon-red {
            background: #fff0ef;
            color: #dc5555;
        }

        .stat-text span {
            display: block;
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 5px;
        }

        .stat-text h3 {
            font-size: 23px;
            color: var(--primary);
            font-weight: 800;
        }

        /* DASHBOARD GRID */

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(270px, .85fr);
            gap: 20px;
            margin-top: 27px;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            min-width: 0;
            box-shadow: 0 4px 15px rgba(18,69,110,.035);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .panel-header h3 {
            font-size: 15px;
            color: var(--primary);
        }

        .panel-header p {
            font-size: 10px;
            color: var(--muted);
            margin-top: 5px;
        }

        .view-all {
            color: #078ead;
            font-size: 11px;
            font-weight: 700;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        /* ARTICLE TABLE */

        .table-wrapper {
            overflow-x: auto;
        }

        .article-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 530px;
        }

        .article-table th {
            background: #f5fafc;
            color: #8296a5;
            text-align: left;
            font-size: 10px;
            font-weight: 700;
            padding: 12px 10px;
            white-space: nowrap;
        }

        .article-table td {
            padding: 14px 10px;
            border-bottom: 1px solid #edf3f6;
            font-size: 11px;
            vertical-align: middle;
        }

        .article-table tr:last-child td {
            border-bottom: 0;
        }

        .article-title {
            font-size: 12px;
            font-weight: 700;
            color: var(--primary);
            max-width: 190px;
            line-height: 1.5;
        }

        .author-name {
            color: var(--muted);
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-pending {
            background: #fff3df;
            color: #ba790e;
        }

        .status-published {
            background: #e5f6ec;
            color: #16834c;
        }

        .status-revision {
            background: #fff0ef;
            color: #d64c4c;
        }

        .status-draft {
            background: #edf1f5;
            color: #647789;
        }

        .action-link {
            color: #078ead;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 35px 15px;
            color: var(--muted);
            font-size: 12px;
        }

        .empty-state i {
            display: block;
            font-size: 30px;
            color: #b5cbd8;
            margin-bottom: 12px;
        }

        /* QUICK ACTIONS */

        .quick-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .quick-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px;
            border: 1px solid var(--border);
            border-radius: 12px;
            transition: .2s;
        }

        .quick-item:hover {
            border-color: var(--cyan);
            background: #f5fbfd;
            transform: translateX(3px);
        }

        .quick-icon {
            width: 39px;
            height: 39px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            background: #e9f5fa;
            color: #087f9d;
            font-size: 15px;
        }

        .quick-text {
            flex: 1;
        }

        .quick-text strong {
            display: block;
            color: var(--primary);
            font-size: 11px;
            margin-bottom: 4px;
        }

        .quick-text span {
            font-size: 10px;
            color: var(--muted);
        }

        .quick-arrow {
            color: #9aafbd;
            font-size: 12px;
        }

        /* FOOTER */

        .footer {
            padding: 24px 0 0;
            margin-top: 30px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: var(--muted);
            font-size: 10px;
        }

        .footer strong {
            color: var(--primary);
        }

        /* MOBILE */

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(3,28,44,.45);
            z-index: 900;
        }

        @media(max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .topbar {
                padding: 0 17px;
                height: 68px;
            }

            .content {
                padding: 23px 17px 35px;
            }

            .date-info {
                display: none;
            }

            .account {
                padding-left: 12px;
                gap: 8px;
            }

            .account-name {
                display: none;
            }

            .hero {
                min-height: 190px;
                padding: 25px 22px;
            }

            .hero h1 {
                font-size: 24px;
            }

            .hero p {
                font-size: 11px;
            }

            .section-heading h2 {
                font-size: 17px;
            }

        }

        @media(max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 14px 11px;
                gap: 9px;
            }

            .stat-icon {
                width: 37px;
                height: 37px;
                font-size: 14px;
            }

            .stat-text span {
                font-size: 9px;
            }

            .stat-text h3 {
                font-size: 19px;
            }

            .panel {
                padding: 15px;
            }

            .footer {
                flex-direction: column;
                line-height: 1.7;
            }

            }
    </style>
    @include('editor.partials.shell-styles')
</head>

<body>

    @include('editor.partials.sidebar')

    <!-- MAIN -->
    <main class="main">

        @include('editor.partials.topbar', ['pageTitle' => 'Editor'])

        <!-- CONTENT -->
        <div class="content">

            <!-- HERO -->
            <section class="hero">

                <div class="hero-content">

                    <div class="hero-tag">
                        <i class="fa-solid fa-leaf"></i>
                        DERAP SERAYU EDITORIAL
                    </div>

                    <h1>Selamat Datang, {{ auth()->user()->name }}!</h1>

                    <p>
                        Selamat datang di ruang kerja editorial Derap Serayu.
                        Kelola, tinjau, dan sempurnakan artikel dari para penulis
                        untuk menghadirkan informasi yang berkualitas bagi
                        masyarakat Banjarnegara.
                    </p>

                </div>

            </section>

            <!-- STATISTICS -->
            <div class="section-heading">

                <div>
                    <h2>Ringkasan Editorial</h2>
                    <p>Pantau aktivitas pengelolaan artikel website.</p>
                </div>

            </div>

            <section class="stats-grid">

                <div class="stat-card">
                    <div class="stat-icon icon-blue">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>

                    <div class="stat-text">
                        <span>Total Artikel</span>
                        <h3>{{ number_format($totalArtikel ?? 0, 0, ',', '.') }}</h3>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-orange">
                        <i class="fa-solid fa-clock"></i>
                    </div>

                    <div class="stat-text">
                        <span>Menunggu Tinjauan</span>
                        <h3>{{ number_format($menungguTinjauan ?? 0, 0, ',', '.') }}</h3>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-green">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    <div class="stat-text">
                        <span>Artikel Terbit</span>
                        <h3>{{ number_format($totalTerbit ?? 0, 0, ',', '.') }}</h3>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon icon-red">
                        <i class="fa-solid fa-rotate-left"></i>
                    </div>

                    <div class="stat-text">
                        <span>Perlu Revisi</span>
                        <h3>{{ number_format($perluRevisi ?? 0, 0, ',', '.') }}</h3>
                    </div>
                </div>

            </section>

            <!-- ARTICLE AND QUICK ACTION -->
            <section class="dashboard-grid">

                <!-- ARTICLE REVIEW -->
                <div class="panel">

                    <div class="panel-header">

                        <div>
                            <h3>Artikel Menunggu Tinjauan</h3>
                            <p>Daftar artikel yang membutuhkan pemeriksaan Editor.</p>
                        </div>

                        <a href="{{ url('/editor/tinjauan') }}"
                           class="view-all">
                            Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                    <div class="table-wrapper">

                        <table class="article-table">

                            <thead>
                                <tr>
                                    <th>JUDUL ARTIKEL</th>
                                    <th>PENULIS</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse(($antreanTinjauan ?? collect()) as $artikel)

                                    <tr>

                                        <td>
                                            <div class="article-title">
                                                {{ $artikel->title }}
                                            </div>
                                        </td>

                                        <td>
                                            <span class="author-name">
                                                {{ $artikel->author_name
                                                    ?: ($artikel->user->name ?? 'Penulis') }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="status status-pending">
                                                Menunggu Tinjauan
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{ url('/editor/artikel/'.$artikel->id.'/edit') }}"
                                               class="action-link">
                                                Periksa
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4">
                                            <div class="empty-state">
                                                <i class="fa-regular fa-folder-open"></i>
                                                Belum ada artikel yang menunggu tinjauan.
                                            </div>
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- QUICK ACTION -->
                <div class="panel">

                    <div class="panel-header">
                        <div>
                            <h3>Akses Cepat</h3>
                            <p>Kelola pekerjaan editorial.</p>
                        </div>
                    </div>

                    <div class="quick-list">

                        <a href="{{ route('editor.articles.create') }}"
                           class="quick-item">

                            <div class="quick-icon">
                                <i class="fa-solid fa-file-pen"></i>
                            </div>

                            <div class="quick-text">
                                <strong>Tulis Artikel</strong>
                                <span>Mulai menulis artikel baru.</span>
                            </div>

                            <i class="fa-solid fa-chevron-right quick-arrow"></i>

                        </a>

                        <a href="{{ route('editor.articles.review') }}"
                           class="quick-item">

                            <div class="quick-icon">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>

                            <div class="quick-text">
                                <strong>Tinjau Artikel</strong>
                                <span>Periksa artikel dari penulis.</span>
                            </div>

                            <i class="fa-solid fa-chevron-right quick-arrow"></i>

                        </a>

                        <a href="{{ route('editor.articles.index') }}"
                           class="quick-item">

                            <div class="quick-icon">
                                <i class="fa-solid fa-file-pen"></i>
                            </div>

                            <div class="quick-text">
                                <strong>Semua Artikel</strong>
                                <span>Kelola artikel seluruh penulis.</span>
                            </div>

                            <i class="fa-solid fa-chevron-right quick-arrow"></i>

                        </a>

                        <a href="{{ route('editor.profile') }}"
                           class="quick-item">

                            <div class="quick-icon">
                                <i class="fa-solid fa-user-gear"></i>
                            </div>

                            <div class="quick-text">
                                <strong>Profil Saya</strong>
                                <span>Perbarui informasi akun.</span>
                            </div>

                            <i class="fa-solid fa-chevron-right quick-arrow"></i>

                        </a>

                    </div>

                </div>

            </section>

            <!-- RECENT ARTICLES -->
            <section class="panel" style="margin-top: 22px;">

                <div class="panel-header">

                    <div>
                        <h3>Artikel Terbaru</h3>
                        <p>Artikel yang terakhir masuk ke sistem.</p>
                    </div>

                    <a href="{{ route('editor.articles.index') }}"
                       class="view-all">
                        Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

                <div class="table-wrapper">

                    <table class="article-table">

                        <thead>
                            <tr>
                                <th>JUDUL ARTIKEL</th>
                                <th>PENULIS</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse(($artikelTerbaru ?? collect()) as $artikel)

                                <tr>

                                    <td>
                                        <div class="article-title">
                                            {{ $artikel->title }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="author-name">
                                            {{ $artikel->author_name
                                                ?: ($artikel->user->name ?? 'Penulis') }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $artikel->created_at
                                            ? $artikel->created_at->format('d/m/Y')
                                            : '-' }}
                                    </td>

                                    <td>

                                        @if($artikel->status === 'published')
                                            <span class="status status-published">
                                                Terbit
                                            </span>

                                        @elseif($artikel->status === 'revision')
                                            <span class="status status-revision">
                                                Perlu Revisi
                                            </span>

                                        @elseif($artikel->status === 'draft')
                                            <span class="status status-draft">
                                                Draf
                                            </span>

                                        @else
                                            <span class="status status-pending">
                                                Menunggu Tinjauan
                                            </span>
                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4">
                                        <div class="empty-state">
                                            <i class="fa-regular fa-newspaper"></i>
                                            Belum ada artikel terbaru.
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </section>

            <!-- FOOTER -->
            <footer class="footer">

                <span>
                    © {{ date('Y') }}
                    <strong>Derap Serayu.</strong>
                    Semua hak dilindungi.
                </span>

                <span>
                    Panel Editorial · Banjarnegara
                </span>

            </footer>

        </div>

    </main>

</body>
</html>
