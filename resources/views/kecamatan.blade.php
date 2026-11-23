<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>20 Kecamatan Banjarnegara | {{ $siteSettings['site_name'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: "Poppins", sans-serif; color: #073f5e; background: linear-gradient(180deg, #eefaff, #f7fcfe 40%, #fff); min-height: 100vh; }
        .wrap { width: min(1180px, 92%); margin: 0 auto; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin: 16px 0 28px; padding: 14px 20px; border-radius: 16px; }
        .topbar-actions { display: flex; align-items: center; justify-content: flex-end; gap: 8px; flex-wrap: wrap; }
        .brand { flex: 0 0 auto; font: 800 24px "Playfair Display", serif; color: #fff; text-decoration: none; }
        .brand span { color: #72e3fa; }
        .back { display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; border-radius: 25px; background: #08add5; color: #fff; font-size: 12px; font-weight: 700; text-decoration: none; box-shadow: 0 8px 20px rgba(8, 173, 213, .25); }
        .heading { display: flex; justify-content: space-between; align-items: center; gap: 20px; margin: 20px 0 24px; }
        .eyebrow { display: inline-flex; align-items: center; gap: 7px; color: #073f5e; font-size: 10px; font-weight: 800; letter-spacing: 1.2px; }
        h1 { margin-top: 8px; font: 700 clamp(26px, 3vw, 38px)/1.2 "Playfair Display", serif; }
        h1 span { color: #08add5; }
        .heading p { max-width: 620px; margin-top: 9px; color: #78909d; font-size: 13px; line-height: 1.8; }
        .total { display: flex; align-items: center; gap: 12px; flex-shrink: 0; padding: 14px 18px; border-radius: 18px; background: #fff; box-shadow: 0 10px 28px rgba(7, 63, 94, .07); }
        .total i { display: grid; place-items: center; width: 42px; height: 42px; border-radius: 13px; background: #e3f8fc; color: #08add5; font-size: 18px; }
        .total strong { display: block; font-size: 22px; }
        .total span { color: #78909d; font-size: 11px; }
        .grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; padding-bottom: 50px; }
        .card { position: relative; overflow: hidden; display: flex; flex-direction: column; min-height: 190px; padding: 18px; border: 1px solid #fff; border-radius: 20px; background: #fff; box-shadow: 0 10px 28px rgba(7, 63, 94, .06); color: inherit; text-decoration: none; transition: transform .25s, box-shadow .25s, border-color .25s; }
        .card:hover { transform: translateY(-5px); border-color: #a7e8f4; box-shadow: 0 17px 34px rgba(7, 63, 94, .12); }
        .top { display: flex; align-items: center; justify-content: space-between; }
        .num { color: #9ab5c1; font-size: 11px; font-weight: 800; letter-spacing: 1px; }
        .icon { display: grid; place-items: center; width: 40px; height: 40px; border-radius: 14px; background: linear-gradient(135deg, #08add5, #72cfcf); color: #fff; }
        .card h3 { margin-top: 15px; font: 700 17px/1.3 "Playfair Display", serif; }
        .card p { margin-top: 6px; color: #78909d; font-size: 11px; }
        .link { display: flex; align-items: center; justify-content: space-between; margin-top: auto; padding-top: 16px; color: #078fb0; font-size: 11px; font-weight: 800; }
        @media (max-width: 1050px) { .grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
        @media (max-width: 650px) {
            .topbar { flex-direction: column; align-items: stretch; gap: 12px; margin: 12px 0 24px; padding: 14px; }
            .topbar-actions { justify-content: flex-start; gap: 6px; }
            .heading { flex-direction: column; align-items: flex-start; }
            .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }
            .card { min-height: 170px; padding: 14px; }
        }
        @media (max-width: 360px) { .grid { grid-template-columns: 1fr; } }

        .district-admin-main {
            min-height: 100vh;
            margin-left: 260px;
            padding: 1px 28px 30px;
        }
        .admin-kecamatan-page {
            background: #f4fbfe;
            font-family: "DM Sans", sans-serif;
        }
        .district-admin-main .wrap { width: min(1180px, 100%); }
        .district-admin-main .topbar { display: none; }
        .district-mobile-bar { display: none; }

        .reader-district-sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            width: 260px;
            height: 100vh;
            padding: 24px 17px;
            overflow-y: auto;
            color: #fff;
            background: linear-gradient(180deg, var(--site-primary, #06304b), var(--site-primary-dark, #052b41));
            box-shadow: 5px 0 25px rgba(13, 70, 104, .12);
            transition: transform .25s ease;
        }
        .reader-district-brand {
            display: flex;
            align-items: center;
            gap: 11px;
            min-height: 72px;
            margin-bottom: 27px;
            padding: 9px;
            border-radius: 13px;
            color: #fff;
            text-decoration: none;
        }
        .reader-district-brand img {
            width: 48px;
            height: 48px;
            flex: 0 0 48px;
            padding: 4px;
            border-radius: 10px;
            background: #fff;
            object-fit: contain;
        }
        .reader-district-brand strong,
        .reader-district-brand small {
            display: block;
        }
        .reader-district-brand strong {
            font: 800 17px "Playfair Display", serif;
            overflow-wrap: anywhere;
        }
        .reader-district-brand small {
            margin-top: 3px;
            color: #c8e7f1;
            font-size: 9px;
        }
        .reader-district-label {
            margin: 0 12px 12px;
            color: #a9cedb;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }
        .reader-district-nav {
            display: grid;
            gap: 7px;
        }
        .reader-district-link {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 46px;
            padding: 0 14px;
            border-radius: 11px;
            color: #e0f1f7;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s, color .2s;
        }
        .reader-district-link i {
            width: 19px;
            text-align: center;
        }
        .reader-district-link:hover,
        .reader-district-link.active {
            color: #fff;
            background: var(--site-accent, #08add5);
        }
        .reader-district-account {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
            padding: 15px 4px 12px;
            border-top: 1px solid rgba(255,255,255,.16);
        }
        .reader-district-account > i {
            display: grid;
            width: 36px;
            height: 36px;
            flex: 0 0 36px;
            place-items: center;
            border-radius: 50%;
            background: rgba(255,255,255,.14);
        }
        .reader-district-account span {
            min-width: 0;
            flex: 1;
            overflow-wrap: anywhere;
        }
        .reader-district-account strong,
        .reader-district-account small {
            display: block;
        }
        .reader-district-account strong { font-size: 11px; }
        .reader-district-account small {
            margin-top: 3px;
            color: #b7d8e4;
            font-size: 9px;
        }
        .reader-district-logout {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            min-height: 42px;
            padding: 0 12px;
            border: 0;
            border-radius: 10px;
            color: #fff;
            background: rgba(255,255,255,.1);
            cursor: pointer;
            font: inherit;
            font-size: 11px;
            text-align: left;
        }
        .reader-district-logout:hover { background: rgba(220,85,85,.28); }
        .reader-district-main {
            min-height: 100vh;
            margin-left: 260px;
            padding: 1px 28px 30px;
        }
        .reader-district-main .wrap { width: min(1180px, 100%); }
        .reader-district-mobile-bar,
        .reader-district-overlay { display: none; }

        @media (max-width: 768px) {
            .district-admin-main { margin-left: 0; padding: 0 4% 24px; }
            .district-mobile-bar {
                position: sticky;
                top: 0;
                z-index: 80;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 14px;
                margin: 0 -4% 18px;
                padding: 12px 4%;
                background: #fff;
                box-shadow: 0 6px 20px rgba(7, 63, 94, .08);
            }
            .district-menu-toggle {
                display: grid;
                width: 42px;
                height: 42px;
                place-items: center;
                border: 0;
                border-radius: 12px;
                background: #073e59;
                color: #fff;
                font-size: 17px;
                cursor: pointer;
            }
            .district-mobile-brand {
                color: #073f5e;
                font: 800 20px "Playfair Display", serif;
                text-decoration: none;
            }
            .district-mobile-brand span { color: #08add5; }

            .reader-district-sidebar { transform: translateX(-100%); }
            .reader-district-sidebar.is-open { transform: translateX(0); }
            .reader-district-main { margin-left: 0; padding: 0 4% 24px; }
            .reader-district-main .heading { margin-top: 8px; }
            .reader-district-mobile-bar {
                position: sticky;
                top: 0;
                z-index: 80;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                margin: 0 -4% 18px;
                padding: 11px 4%;
                background: #fff;
                box-shadow: 0 6px 20px rgba(7, 63, 94, .08);
            }
            .reader-district-toggle {
                display: grid;
                width: 42px;
                height: 42px;
                flex: 0 0 42px;
                place-items: center;
                border: 0;
                border-radius: 12px;
                color: #fff;
                background: var(--site-primary, #073e59);
                cursor: pointer;
                font-size: 17px;
            }
            .reader-district-mobile-brand {
                color: var(--site-primary, #073f5e);
                font: 800 18px "Playfair Display", serif;
                text-decoration: none;
            }
            .reader-district-mobile-brand span { color: var(--site-accent, #08add5); }
            .reader-district-overlay.is-open {
                position: fixed;
                inset: 0;
                z-index: 900;
                display: block;
                background: rgba(3,28,44,.45);
            }
        }
        @media (max-width: 650px) {
            .district-admin-main .heading { margin-top: 8px; }
        }
    </style>
@include('partials.site-theme-styles')
@if (auth()->check() && auth()->user()->role === 'admin')
    @include('editor.partials.sidebar-styles')
@endif

</head>
    @php
        $isAdmin = auth()->check() && auth()->user()->role === 'admin';
        $isReader = auth()->check() && auth()->user()->role === 'reader';
    @endphp
<body class="{{ $isAdmin ? 'admin-kecamatan-page' : ($isReader ? 'reader-kecamatan-page' : '') }}">

    @if ($isAdmin)
        @include('editor.partials.sidebar')
        <main class="district-admin-main">
            <div class="district-mobile-bar">
                <button class="district-menu-toggle" type="button"
                        aria-label="Buka navigasi" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <a class="district-mobile-brand" href="{{ route('home') }}">Derap<span>Serayu</span></a>
            </div>
    @elseif ($isReader)
        <aside class="reader-district-sidebar" id="readerDistrictSidebar" aria-label="Navigasi pembaca">
            <a class="reader-district-brand" href="{{ route('home') }}">
                <img src="{{ $siteLogoUrl }}" alt="">
                <span>
                    <strong>{{ $siteSettings['site_name'] }}</strong>
                    <small>Media Informasi Banjarnegara</small>
                </span>
            </a>
            <div class="reader-district-label">Menu Pembaca</div>
            <nav class="reader-district-nav" aria-label="Navigasi pembaca">
                <a class="reader-district-link" href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i><span>Beranda</span>
                </a>
                <a class="reader-district-link active" href="{{ route('kecamatan.index') }}" aria-current="page">
                    <i class="fa-solid fa-map-location-dot"></i><span>Jelajahi Kecamatan</span>
                </a>
                <a class="reader-district-link" href="{{ route('articles.index') }}">
                    <i class="fa-regular fa-newspaper"></i><span>Berita</span>
                </a>
                <a class="reader-district-link" href="{{ route('pembaca.saved.index') }}">
                    <i class="fa-regular fa-bookmark"></i><span>Artikel Tersimpan</span>
                </a>
                <a class="reader-district-link" href="{{ route('pembaca.profile') }}">
                    <i class="fa-regular fa-user"></i><span>Profil Saya</span>
                </a>
            </nav>
            <div class="reader-district-account">
                <i class="fa-solid fa-user"></i>
                <span>
                    <strong>{{ auth()->user()->name }}</strong>
                    <small>Pembaca</small>
                </span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="reader-district-logout" type="submit">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar dari akun
                </button>
            </form>
        </aside>
        <div class="reader-district-overlay" id="readerDistrictOverlay"></div>
        <main class="reader-district-main">
            <div class="reader-district-mobile-bar">
                <button class="reader-district-toggle" id="readerDistrictToggle"
                        type="button" aria-label="Buka navigasi pembaca"
                        aria-controls="readerDistrictSidebar" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <a class="reader-district-mobile-brand" href="{{ route('home') }}">Derap<span>Serayu</span></a>
            </div>
    @endif

    <div class="wrap">
        @unless ($isAdmin || $isReader)
            <div class="topbar">
                <a class="brand" href="{{ route('home') }}">Derap<span>Serayu</span></a>
                <div class="topbar-actions">
                    @auth
                        @if (auth()->user()->role === 'reader')
                            <a class="back" href="{{ route('pembaca.profile') }}">Profil</a>
                            <a class="back" href="{{ route('pembaca.saved.index') }}">Artikel Tersimpan</a>
                        @elseif (auth()->user()->role === 'writer')
                            <a class="back" href="{{ route('penulis.dashboard') }}">Dasbor Penulis</a>
                            <a class="back" href="{{ route('penulis.profile') }}">Profil</a>
                        @elseif (auth()->user()->role === 'editor')
                            <a class="back" href="{{ route('editor.dashboard') }}">Dasbor Editor</a>
                            <a class="back" href="{{ route('editor.profile') }}">Profil</a>
                        @elseif (auth()->user()->role === 'admin')
                            <a class="back" href="{{ route('admin.dashboard') }}">Dasbor Admin</a>
                            <a class="back" href="{{ route('admin.profile') }}">Profil</a>
                            <a class="back" href="{{ route('pembaca.saved.index') }}">Artikel Tersimpan</a>
                        @endif
                    @endauth
                    <a class="back" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i> Beranda</a>
                </div>
            </div>
        @endunless

        <div class="heading">
            <div>
                <span class="eyebrow"><i class="fa-solid fa-compass"></i> CERITA DARI SETIAP WILAYAH</span>
                <h1>Jelajahi <span>{{ count($districts) }} Kecamatan</span> Banjarnegara</h1>
                <p>Pilih kecamatan untuk melihat artikel, budaya, potensi desa, dan kisah masyarakat setempat.</p>
            </div>
            <div class="total">
                <i class="fa-solid fa-map-location-dot"></i>
                <div>
                    <strong>{{ count($districts) }}</strong>
                    <span>Kecamatan</span>
                </div>
            </div>
        </div>

        <div class="grid">
            @foreach ($districts as $district)
                <a class="card" href="{{ route('articles.index', ['kecamatan' => $district]) }}" aria-label="Lihat artikel di Kecamatan {{ $district }}">
                    <div class="top">
                        <span class="num">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <span class="icon"><i class="fa-solid fa-mountain-sun"></i></span>
                    </div>
                    <h3>{{ $district }}</h3>
                    <p>{{ number_format($articleCounts[$district] ?? 0, 0, ',', '.') }} artikel terbit</p>
                    <span class="link">Lihat artikel <i class="fa-solid fa-arrow-right"></i></span>
                </a>
            @endforeach
        </div>
    </div>

    @if ($isAdmin || $isReader)
        </main>
    @endif
    @if ($isReader)
        <script>
            const readerDistrictSidebar = document.getElementById('readerDistrictSidebar');
            const readerDistrictToggle = document.getElementById('readerDistrictToggle');
            const readerDistrictOverlay = document.getElementById('readerDistrictOverlay');

            const setReaderDistrictSidebarOpen = (isOpen) => {
                readerDistrictSidebar.classList.toggle('is-open', isOpen);
                readerDistrictOverlay.classList.toggle('is-open', isOpen);
                readerDistrictToggle.setAttribute('aria-expanded', String(isOpen));
                readerDistrictToggle.setAttribute(
                    'aria-label',
                    isOpen ? 'Tutup navigasi pembaca' : 'Buka navigasi pembaca'
                );
            };

            readerDistrictToggle.addEventListener('click', () => {
                setReaderDistrictSidebarOpen(!readerDistrictSidebar.classList.contains('is-open'));
            });
            readerDistrictOverlay.addEventListener('click', () => setReaderDistrictSidebarOpen(false));
            readerDistrictSidebar.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        setReaderDistrictSidebarOpen(false);
                    }
                });
            });
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    setReaderDistrictSidebarOpen(false);
                }
            });
        </script>
    @endif
</body>
</html>
