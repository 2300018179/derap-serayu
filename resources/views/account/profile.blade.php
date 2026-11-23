<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil {{ $profile['roleLabel'] }} | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @include('editor.partials.shell-styles')

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: #123d5b;
            background: #f0f9fd;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        .profile-content {
            max-width: 1540px;
            min-width: 0;
        }

        .pf-hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 190px;
            padding: 27px 30px;
            overflow: hidden;
            border-radius: 14px;
            color: #fff;
            background:
                linear-gradient(90deg, rgba(3, 54, 78, .95), rgba(0, 120, 150, .75)),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center / cover;
        }

        .pf-hero > * {
            min-width: 0;
        }

        .pf-hero h1 {
            margin: 0 0 10px;
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            line-height: 1.2;
        }

        .pf-hero h1 span {
            color: #7be3f5;
            overflow-wrap: anywhere;
        }

        .pf-hero p {
            max-width: 560px;
            margin: 0;
            color: #d6eef7;
            font-size: 14px;
            line-height: 1.7;
        }

        .pf-eyebrow {
            display: inline-block;
            margin-bottom: 12px;
            color: #7be3f5;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
        }

        .pf-hero-icon {
            display: grid;
            flex: 0 0 92px;
            width: 92px;
            height: 92px;
            place-items: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, .14);
            font-size: 38px;
        }

        .pf-layout {
            display: grid;
            grid-template-columns: 320px minmax(0, 1fr);
            align-items: start;
            gap: 18px;
            margin-top: 18px;
            min-width: 0;
        }

        .pf-layout > * {
            min-width: 0;
        }

        .pf-card {
            background: #fff;
            border: 1px solid #d9effb;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(31, 104, 152, .05);
        }

        .pf-summary {
            padding: 28px 22px;
            text-align: center;
        }

        .pf-avatar {
            display: grid;
            width: 92px;
            height: 92px;
            place-items: center;
            margin: 0 auto 14px;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(145deg, #23d9bb, #00a5a5);
            font-size: 38px;
            font-weight: 800;
        }

        .pf-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 12px;
            border-radius: 999px;
            color: #0a8f7c;
            background: #e4f8f3;
            font-size: 11px;
            font-weight: 800;
        }

        .pf-summary h2 {
            margin: 12px 0 4px;
            font-size: 20px;
            overflow-wrap: anywhere;
        }

        .pf-username {
            margin: 0;
            color: #7091ac;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .pf-caption {
            margin: 16px 0 20px;
            padding-top: 16px;
            border-top: 1px solid #d9effb;
            color: #7091ac;
            font-size: 13px;
            line-height: 1.6;
        }

        .pf-actions {
            display: grid;
            gap: 10px;
        }

        .pf-actions form {
            margin: 0;
        }

        .pf-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            min-height: 42px;
            padding: 9px 12px;
            border: 1px solid transparent;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .2s, box-shadow .2s;
        }

        .pf-button:hover {
            transform: translateY(-1px);
        }

        .pf-button-primary {
            color: #fff;
            background: #063b56;
        }

        .pf-button-secondary {
            color: #c0364a;
            background: #fff1f2;
            border-color: #ffd5da;
        }

        .pf-info {
            padding: 24px 26px;
        }

        .pf-info-title {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px;
        }

        .pf-info-title h2 {
            margin: 0;
            font-size: 18px;
        }

        .pf-info-title span {
            color: #7091ac;
            font-size: 12px;
            text-align: right;
        }

        .pf-detail {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #eaf4fa;
        }

        .pf-detail:last-child {
            border-bottom: 0;
        }

        .pf-label {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #7091ac;
            font-size: 13px;
            font-weight: 700;
        }

        .pf-label i {
            width: 18px;
            color: #009fbe;
            text-align: center;
        }

        .pf-value {
            font-size: 14px;
            font-weight: 700;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .pf-note {
            display: flex;
            gap: 14px;
            margin-top: 18px;
            padding: 18px 22px;
            border: 1px solid #d9effb;
            border-radius: 14px;
            background: #e8f6fc;
        }

        .pf-note > i {
            margin-top: 3px;
            color: #009fbe;
            font-size: 20px;
        }

        .pf-note strong {
            display: block;
            margin-bottom: 4px;
            font-size: 14px;
        }

        .pf-note p {
            margin: 0;
            color: #7091ac;
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 900px) {
            .pf-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .profile-content {
                padding: 20px 14px 30px;
            }

            .pf-hero {
                min-height: 170px;
                padding: 22px 20px;
            }

            .pf-hero h1 {
                font-size: 26px;
            }

            .pf-hero p {
                font-size: 12px;
            }

            .pf-hero-icon {
                display: none;
            }

            .pf-info {
                padding: 20px 18px;
            }

            .pf-detail {
                align-items: flex-start;
                flex-direction: column;
                gap: 6px;
            }

            .pf-value {
                text-align: left;
            }
        }
    </style>
</head>
<body>
<div class="layout">
    @if(in_array($accountUser->role, ['admin', 'editor'], true))
        @include('editor.partials.sidebar')
    @else
        <aside class="sidebar" id="sidebar">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-logo-wrapper">
                    <img src="{{ $siteLogoUrl }}" alt="{{ $siteSettings['site_name'] }}" class="brand-logo">
                </span>
            </a>

            <div class="sidebar-label">Menu Pembaca</div>
            <nav class="nav-menu">
                <a href="{{ route('pembaca.profile') }}" class="nav-link active">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil Saya</span>
                </a>
                <a href="{{ route('pembaca.saved.index') }}" class="nav-link">
                    <i class="fa-regular fa-bookmark"></i>
                    <span>Artikel Tersimpan</span>
                </a>
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fa-solid fa-globe"></i>
                    <span>Lihat Website</span>
                </a>
            </nav>

            <div class="sidebar-bottom">
                <div class="editor-info">
                    <strong>{{ $accountUser->name }}</strong>
                    <span><i class="fa-solid fa-circle-check"></i> {{ $profile['roleLabel'] }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        &nbsp; Keluar dari akun
                    </button>
                </form>
            </div>
        </aside>

        <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>
    @endif

    <main class="main">
        @if(in_array($accountUser->role, ['admin', 'editor'], true))
            @include('editor.partials.topbar', ['pageTitle' => 'Profil Saya'])
        @else
            <header class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menuToggle" type="button" aria-label="Buka menu" aria-expanded="false" onclick="toggleSidebar()">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="breadcrumb"><strong>{{ $profile['roleLabel'] }}</strong> / Profil Saya</div>
                </div>
                <div class="topbar-right">
                    <div class="account-name">
                        <strong>{{ $accountUser->name }}</strong>
                        <span>{{ $profile['roleLabel'] }}</span>
                    </div>
                </div>
            </header>
        @endif

        <div class="content profile-content">
            <section class="pf-hero">
                <div>
                    <span class="pf-eyebrow">{{ $profile['eyebrow'] }}</span>
                    <h1>Selamat datang,<br><span>{{ $accountUser->name }}.</span></h1>
                    <p>{{ $profile['welcomeText'] }}</p>
                </div>
                <div class="pf-hero-icon" aria-hidden="true">
                    <i class="fa-solid {{ $profile['heroIcon'] }}"></i>
                </div>
            </section>

            <section class="pf-layout" id="informasi-profil">
                <aside class="pf-card pf-summary">
                    <div class="pf-avatar">{{ mb_strtoupper(mb_substr($accountUser->name ?? 'P', 0, 1)) }}</div>
                    <span class="pf-badge">
                        <i class="fa-solid {{ $profile['badgeIcon'] }}"></i>
                        Akun {{ $profile['roleLabel'] }}
                    </span>
                    <h2>{{ $accountUser->name }}</h2>
                    <p class="pf-username">
                        {{ $accountUser->username ? '@'.$accountUser->username : 'Username belum diatur' }}
                    </p>
                    <p class="pf-caption">{{ $profile['summaryCaption'] }}</p>
                    <div class="pf-actions">
                        <a href="{{ $profile['primaryUrl'] }}" class="pf-button pf-button-primary">
                            <i class="{{ $profile['primaryIcon'] }}"></i>
                            {{ $profile['primaryLabel'] }}
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="pf-button pf-button-secondary">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Keluar dari Akun
                            </button>
                        </form>
                    </div>
                </aside>

                <div>
                    <section class="pf-card pf-info">
                        <div class="pf-info-title">
                            <h2>Informasi Akun</h2>
                            <span>Detail profil {{ strtolower($profile['roleLabel']) }}</span>
                        </div>
                        <div class="pf-detail">
                            <span class="pf-label"><i class="fa-regular fa-user"></i> Nama Lengkap</span>
                            <span class="pf-value">{{ $accountUser->name }}</span>
                        </div>
                        <div class="pf-detail">
                            <span class="pf-label"><i class="fa-solid fa-at"></i> Username</span>
                            <span class="pf-value">{{ $accountUser->username ?: 'Belum diatur' }}</span>
                        </div>
                        <div class="pf-detail">
                            <span class="pf-label"><i class="fa-regular fa-envelope"></i> Alamat Email</span>
                            <span class="pf-value">{{ $accountUser->email }}</span>
                        </div>
                        <div class="pf-detail">
                            <span class="pf-label"><i class="{{ $profile['statIcon'] }}"></i> {{ $profile['statLabel'] }}</span>
                            <span class="pf-value">{{ $profile['statValue'] }}</span>
                        </div>
                    </section>

                    <div class="pf-note">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <strong>Informasi akun kamu</strong>
                            <p>Informasi ini ditampilkan untuk membantu kamu mengenali akun yang sedang digunakan. Jaga kerahasiaan akses akunmu.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

<script>
    @if($accountUser->role === 'reader')
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const menuToggle = document.getElementById('menuToggle');
        const isOpen = sidebar.classList.toggle('show');

        overlay.classList.toggle('show', isOpen);
        menuToggle.setAttribute('aria-expanded', String(isOpen));
    }

    document.querySelectorAll('.sidebar .nav-link').forEach((link) => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 950) {
                document.getElementById('sidebar').classList.remove('show');
                document.getElementById('sidebarOverlay').classList.remove('show');
                document.getElementById('menuToggle').setAttribute('aria-expanded', 'false');
            }
        });
    });
    @endif
</script>
</body>
</html>
