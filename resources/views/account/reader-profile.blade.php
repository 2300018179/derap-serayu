<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Pembaca | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --forest: #073f5e;
            --forest-dark: #05354e;
            --green: #08add5;
            --text: #173c50;
            --muted: #718b99;
            --border: #dcecf2;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
            background: #eaf8fc;
            color: var(--text);
            font-family: "DM Sans", sans-serif;
            font-size: 13px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        .main-header {
            position: relative;
            z-index: 20;
            padding-top: 10px;
        }

        .header-card {
            position: relative;
            display: flex;
            align-items: center;
            gap: 20px;
            width: min(1300px, calc(100% - 40px));
            min-height: 76px;
            margin: auto;
            padding: 8px 16px;
            border: 1px solid rgba(255, 255, 255, .95);
            border-radius: 24px;
            background: rgba(255, 255, 255, .9);
            box-shadow: 0 15px 40px rgba(7, 63, 94, .1);
            backdrop-filter: blur(18px);
        }

        .logo-area {
            display: flex;
            flex-shrink: 0;
            align-items: center;
        }

        .logo-area img {
            display: block;
            width: 180px;
            max-width: 100%;
            height: auto;
        }

        .logo-fallback {
            display: none;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 22px;
            font-weight: 800;
        }

        .logo-fallback span {
            color: var(--green);
        }

        .main-nav {
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: center;
            gap: 3px;
        }

        .main-nav > a,
        .nav-dropdown summary {
            padding: 11px 12px;
            border-radius: 25px;
            color: var(--forest);
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            list-style: none;
            white-space: nowrap;
            transition: background .2s, color .2s;
        }

        .main-nav > a:hover,
        .nav-dropdown summary:hover,
        .nav-dropdown[open] summary {
            background: #e8f8fc;
            color: var(--green);
        }

        .nav-dropdown {
            position: relative;
        }

        .nav-dropdown summary::-webkit-details-marker {
            display: none;
        }

        .nav-dropdown-menu,
        .account-dropdown {
            position: absolute;
            z-index: 25;
            display: grid;
            min-width: 190px;
            padding: 8px;
            border: 1px solid #e3f0f5;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 15px 40px rgba(7, 63, 94, .16);
        }

        .nav-dropdown-menu {
            top: calc(100% + 8px);
            left: 0;
        }

        .nav-dropdown-menu a,
        .account-dropdown a,
        .account-dropdown button {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 10px 12px;
            border: 0;
            border-radius: 9px;
            background: transparent;
            color: var(--forest);
            cursor: pointer;
            font-size: 12px;
            text-align: left;
        }

        .nav-dropdown-menu a:hover,
        .account-dropdown a:hover,
        .account-dropdown button:hover {
            background: #e8f8fc;
        }

        .search-area {
            flex: 0 1 230px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            height: 40px;
            padding: 0 12px;
            border-radius: 22px;
            background: #f0f7fa;
            color: #8ba2af;
        }

        .search-box button {
            padding: 0;
            border: 0;
            background: transparent;
            color: var(--green);
            cursor: pointer;
        }

        .search-box input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: var(--forest);
            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #8ba2af;
        }

        .account-actions {
            position: relative;
            flex-shrink: 0;
        }

        .account-menu summary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-height: 40px;
            padding: 0 13px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: white;
            color: var(--forest);
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            list-style: none;
        }

        .account-menu summary::-webkit-details-marker {
            display: none;
        }

        .account-menu[open] summary,
        .account-menu summary:hover {
            border-color: var(--green);
            color: var(--green);
        }

        .account-dropdown {
            top: calc(100% + 8px);
            right: 0;
            min-width: 220px;
        }

        .account-dropdown-name {
            padding: 10px 12px;
            overflow-wrap: anywhere;
            border-bottom: 1px solid #edf3f6;
            color: var(--muted);
            font-size: 11px;
        }

        .account-dropdown form {
            margin: 0;
            border-top: 1px solid #edf3f6;
        }

        .menu-button {
            display: none;
            width: 40px;
            height: 40px;
            border: 1px solid var(--border);
            border-radius: 50%;
            background: white;
            color: var(--forest);
            cursor: pointer;
        }

        .page-container {
            width: min(1200px, calc(100% - 48px));
            margin: auto;
            padding: 36px 0 60px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 22px;
            color: var(--muted);
            font-size: 11px;
        }

        .breadcrumb a:hover {
            color: var(--green);
        }

        .page-intro {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            min-height: 220px;
            margin-bottom: 28px;
            padding: 36px 45px;
            overflow: hidden;
            border-radius: 25px;
            background:
                linear-gradient(100deg, rgba(5, 53, 75, .96), rgba(8, 82, 111, .84) 58%, rgba(8, 101, 129, .47)),
                url('{{ asset('images/bg-dieng-home.jpg') }}') center / cover no-repeat;
            box-shadow: 0 18px 45px rgba(22, 98, 127, .14);
            color: white;
        }

        .intro-content {
            max-width: 690px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 13px;
            color: #8ceafa;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-intro h1 {
            margin-bottom: 13px;
            color: white;
            font-family: "Playfair Display", serif;
            font-size: clamp(34px, 4vw, 48px);
            line-height: 1.13;
        }

        .page-intro h1 span {
            color: #8ceafa;
            font-style: italic;
        }

        .intro-description {
            max-width: 600px;
            color: rgba(255, 255, 255, .82);
            font-size: 13px;
            line-height: 1.9;
        }

        .intro-icon {
            display: grid;
            flex-shrink: 0;
            width: 100px;
            height: 100px;
            place-items: center;
            margin-right: 20px;
            border: 1px solid rgba(255, 255, 255, .23);
            border-radius: 30px;
            background: rgba(255, 255, 255, .09);
            color: #8ceafa;
            font-size: 40px;
            transform: rotate(5deg);
        }

        .profile-layout {
            display: grid;
            grid-template-columns: minmax(260px, 330px) minmax(0, 1fr);
            align-items: start;
            gap: 22px;
        }

        .profile-card {
            border: 1px solid rgba(220, 236, 242, .95);
            border-radius: 20px;
            background: white;
            box-shadow: 0 10px 30px rgba(7, 63, 94, .055);
        }

        .profile-summary {
            padding: 28px 24px;
            text-align: center;
        }

        .profile-avatar {
            display: grid;
            width: 88px;
            height: 88px;
            place-items: center;
            margin: 0 auto 15px;
            border: 5px solid #e8f8fc;
            border-radius: 50%;
            background: linear-gradient(145deg, #23d9bb, #08add5);
            color: white;
            font-size: 34px;
            font-weight: 800;
        }

        .profile-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #e8f8fc;
            color: var(--forest);
            font-size: 11px;
            font-weight: 800;
        }

        .profile-summary h2 {
            margin: 13px 0 4px;
            color: var(--forest);
            font-size: 20px;
            overflow-wrap: anywhere;
        }

        .profile-username {
            color: var(--muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .profile-caption {
            margin: 18px 0;
            padding-top: 16px;
            border-top: 1px solid #eaf2f5;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }

        .profile-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            width: 100%;
            min-height: 44px;
            padding: 10px 14px;
            border-radius: 13px;
            background: var(--site-accent, #08add5);
            color: white;
            font-size: 12px;
            font-weight: 800;
            transition: transform .2s, box-shadow .2s;
        }

        .profile-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 22px rgba(8, 173, 213, .24);
        }

        .profile-info {
            padding: 25px 28px;
        }

        .profile-info-title {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px;
        }

        .profile-info-title h2 {
            color: var(--forest);
            font-size: 18px;
        }

        .profile-info-title span {
            color: var(--muted);
            font-size: 11px;
            text-align: right;
        }

        .profile-detail {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 17px 0;
            border-bottom: 1px solid #edf3f6;
        }

        .profile-detail:last-child {
            border-bottom: 0;
        }

        .profile-label {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
        }

        .profile-label i {
            width: 18px;
            color: var(--green);
            text-align: center;
        }

        .profile-value {
            color: var(--forest);
            font-size: 13px;
            font-weight: 700;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .profile-note {
            display: flex;
            gap: 13px;
            margin-top: 18px;
            padding: 18px 21px;
            border: 1px solid #d8edf4;
            border-radius: 16px;
            background: rgba(255, 255, 255, .72);
            color: var(--forest);
        }

        .profile-note > i {
            margin-top: 2px;
            color: var(--green);
        }

        .profile-note strong {
            display: block;
            margin-bottom: 4px;
            font-size: 12px;
        }

        .profile-note p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .footer {
            position: relative;
            margin-top: 40px;
            overflow: hidden;
            background: var(--site-primary, #03384f);
            color: white;
        }

        .footer-background,
        .footer-overlay {
            position: absolute;
            inset: 0;
        }

        .footer-background {
            background: url('{{ asset('images/bg-dieng-home.jpg') }}') center bottom / cover no-repeat;
            opacity: .35;
        }

        .footer-overlay {
            background: linear-gradient(180deg, rgba(3, 48, 68, .94), rgba(2, 35, 49, .98));
        }

        .footer-container {
            position: relative;
            z-index: 1;
            width: min(1300px, calc(100% - 48px));
            margin: auto;
            padding: 52px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr .8fr 1fr .8fr 1.25fr;
            gap: 30px;
            padding-bottom: 34px;
            border-bottom: 1px solid rgba(255, 255, 255, .12);
        }

        .footer-logo {
            display: inline-flex;
            align-items: center;
        }

        .footer-logo img {
            display: block;
            width: 165px;
            max-width: 100%;
            height: auto;
        }

        .footer-logo-fallback {
            display: none;
            color: white;
            font-family: "Playfair Display", serif;
            font-size: 20px;
            font-weight: 800;
        }

        .footer-description {
            max-width: 300px;
            margin-top: 13px;
            color: rgba(255, 255, 255, .62);
            font-size: 10px;
            line-height: 1.8;
        }

        .footer-description a {
            color: inherit;
        }

        .footer-social {
            display: flex;
            gap: 8px;
            margin-top: 17px;
        }

        .footer-social a {
            display: grid;
            width: 34px;
            height: 34px;
            place-items: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
            color: white;
            transition: background .2s, transform .2s;
        }

        .footer-social a:hover {
            background: var(--site-accent, #08add5);
            transform: translateY(-2px);
        }

        .footer-column h2 {
            margin-bottom: 15px;
            font-family: "Playfair Display", serif;
            font-size: 16px;
        }

        .footer-column a {
            display: block;
            width: fit-content;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, .62);
            font-size: 10px;
            transition: color .2s, transform .2s;
        }

        .footer-column a:hover {
            color: #8ceafa;
            transform: translateX(3px);
        }

        .footer-newsletter-label {
            color: #8ceafa;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.4px;
        }

        .footer-newsletter h2 {
            max-width: 280px;
            margin-top: 8px;
            font-family: "Playfair Display", serif;
            font-size: 21px;
            line-height: 1.3;
        }

        .footer-newsletter h2 span {
            color: #8ceafa;
        }

        .footer-newsletter > p {
            max-width: 270px;
            margin: 10px 0 15px;
            color: rgba(255, 255, 255, .58);
            font-size: 10px;
            line-height: 1.7;
        }

        .newsletter-form {
            display: flex;
            max-width: 285px;
            padding: 4px;
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 12px;
            background: rgba(255, 255, 255, .08);
        }

        .newsletter-form input {
            width: 100%;
            min-width: 0;
            padding: 9px 10px;
            border: 0;
            outline: 0;
            background: transparent;
            color: white;
            font-family: inherit;
            font-size: 10px;
        }

        .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, .55);
        }

        .newsletter-form button {
            display: grid;
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            place-items: center;
            border: 0;
            border-radius: 9px;
            background: var(--site-accent, #08add5);
            color: white;
            cursor: pointer;
        }

        .newsletter-feedback {
            margin-top: 10px;
            color: #a8f0d0;
            font-size: 10px;
            line-height: 1.6;
        }

        .newsletter-feedback.error {
            color: #ffc2c2;
        }

        .footer-quote {
            padding: 30px 12px;
            text-align: center;
        }

        .footer-quote-mark {
            color: #8ceafa;
            font-family: "Playfair Display", serif;
            font-size: 42px;
            line-height: 1;
        }

        .footer-quote p {
            max-width: 650px;
            margin: 4px auto 9px;
            font-family: "Playfair Display", serif;
            font-size: clamp(17px, 2vw, 21px);
            font-style: italic;
            line-height: 1.5;
        }

        .footer-quote small {
            color: rgba(255, 255, 255, .48);
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 1.8px;
        }

        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, .1);
            color: rgba(255, 255, 255, .53);
            font-size: 9px;
        }

        .footer-bottom-links {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
        }

        .footer-bottom-links a {
            color: inherit;
        }

        .footer-bottom-links a:hover,
        .footer-made strong {
            color: #8ceafa;
        }

        .footer-made {
            white-space: nowrap;
        }

        .footer-made i {
            color: #8ceafa;
        }

        @media (max-width: 1050px) {
            .header-card {
                gap: 12px;
            }

            .logo-area img {
                width: 150px;
            }

            .main-nav > a,
            .nav-dropdown summary {
                padding-right: 9px;
                padding-left: 9px;
            }

            .search-area {
                flex-basis: 185px;
            }
        }

        @media (max-width: 850px) {
            .profile-layout {
                grid-template-columns: minmax(230px, 290px) minmax(0, 1fr);
                gap: 15px;
            }

            .search-area {
                display: none;
            }

            .main-nav > a,
            .nav-dropdown summary {
                font-size: 10px;
            }
        }

        @media (max-width: 700px) {
            .header-card {
                width: calc(100% - 28px);
                justify-content: space-between;
                min-height: 64px;
                padding: 8px 12px;
                border-radius: 19px;
            }

            .logo-area img {
                width: 145px;
            }

            .menu-button {
                display: block;
                order: 2;
            }

            .main-nav {
                position: absolute;
                top: calc(100% + 8px);
                right: 0;
                left: 0;
                display: none;
                align-items: stretch;
                flex-direction: column;
                padding: 10px;
                border: 1px solid var(--border);
                border-radius: 16px;
                background: white;
                box-shadow: 0 15px 35px rgba(7, 63, 94, .13);
            }

            .main-nav.is-open {
                display: flex;
            }

            .nav-dropdown-menu {
                position: static;
                margin-top: 4px;
                box-shadow: none;
            }

            .account-actions {
                margin-left: auto;
            }

            .account-menu summary {
                width: 40px;
                justify-content: center;
                padding: 0;
            }

            .account-menu summary span,
            .account-menu summary .fa-chevron-down {
                display: none;
            }

            .page-container {
                width: calc(100% - 28px);
                padding: 25px 0 42px;
            }

            .breadcrumb {
                margin-bottom: 18px;
            }

            .page-intro {
                min-height: 0;
                margin-bottom: 20px;
                padding: 28px 23px;
                border-radius: 20px;
            }

            .page-intro h1 {
                font-size: clamp(32px, 9vw, 42px);
            }

            .intro-description {
                font-size: 12px;
                line-height: 1.8;
            }

            .intro-icon {
                display: none;
            }

            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-summary {
                padding: 24px 20px;
            }

            .profile-info {
                padding: 21px 19px;
            }
        }

        @media (max-width: 450px) {
            .account-menu summary {
                width: 36px;
                min-height: 36px;
            }

            .menu-button {
                width: 36px;
                height: 36px;
            }

            .profile-info-title {
                align-items: flex-start;
                flex-direction: column;
                gap: 4px;
            }

            .profile-info-title span {
                text-align: left;
            }

            .profile-detail {
                align-items: flex-start;
                flex-direction: column;
                gap: 7px;
            }

            .profile-value {
                padding-left: 28px;
                text-align: left;
            }
        }

        @media (max-width: 1000px) {
            .footer-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 28px 22px;
            }

            .footer-brand,
            .footer-newsletter {
                grid-column: span 3;
            }
        }

        @media (max-width: 650px) {
            .footer-container {
                width: calc(100% - 32px);
                padding-top: 38px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 26px 18px;
            }

            .footer-brand,
            .footer-newsletter {
                grid-column: span 2;
            }

            .footer-bottom {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
                line-height: 1.6;
            }
        }

        @media (max-width: 380px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-brand,
            .footer-newsletter {
                grid-column: auto;
            }
        }
    </style>
    @include('partials.site-theme-styles')
</head>
<body>
    <header class="main-header">
        <div class="header-card">
            <a href="{{ route('home') }}" class="logo-area" aria-label="Beranda {{ $siteSettings['site_name'] }}">
                <img
                    src="{{ $siteLogoUrl }}"
                    alt="{{ $siteSettings['site_name'] }}"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >
                <span class="logo-fallback">Derap<span>Serayu</span></span>
            </a>

            <nav class="main-nav" id="mainNavigation" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('articles.index') }}">Berita</a>
                <a href="{{ route('about') }}">Tentang Kami</a>
                <a href="{{ route('galeri') }}">Galeri</a>
                <details class="nav-dropdown">
                    <summary>
                        <i class="fa-solid fa-water" aria-hidden="true"></i>
                        Jelajahi
                        <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </summary>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                        <a href="{{ route('opini') }}">Opini</a>
                        <a href="{{ route('sosok') }}">Sosok</a>
                        <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                        <a href="{{ route('potensi') }}">Potensi</a>
                        <a href="{{ route('teknologi') }}">Teknologi</a>
                        <a href="{{ route('humor') }}">Humor</a>
                    </div>
                </details>
            </nav>

            <div class="search-area">
                <form action="{{ route('articles.index') }}" method="GET" class="search-box" role="search">
                    <button type="submit" aria-label="Cari artikel">
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                    </button>
                    <input type="search" name="q" placeholder="Cari berita atau topik..." aria-label="Cari berita atau topik" maxlength="100">
                </form>
            </div>

            <div class="account-actions">
                <details class="account-menu">
                    <summary aria-label="Menu akun {{ $accountUser->name }}">
                        <i class="fa-solid fa-user" aria-hidden="true"></i>
                        <span>{{ $accountUser->name }}</span>
                        <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </summary>
                    <div class="account-dropdown">
                        <div class="account-dropdown-name">{{ $accountUser->email }}</div>
                        <a href="{{ route('pembaca.profile') }}">
                            <i class="fa-regular fa-user" aria-hidden="true"></i>
                            Profil Saya
                        </a>
                        <a href="{{ route('pembaca.saved.index') }}">
                            <i class="fa-regular fa-bookmark" aria-hidden="true"></i>
                            Artikel Tersimpan
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                </details>
            </div>

            <button
                class="menu-button"
                type="button"
                aria-label="Buka menu navigasi"
                aria-expanded="false"
                aria-controls="mainNavigation"
            >
                <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </button>
        </div>
    </header>

    <main class="page-container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
            <span>Profil Saya</span>
        </nav>

        <section class="page-intro">
            <div class="intro-content">
                <div class="eyebrow">
                    <i class="fa-regular fa-user" aria-hidden="true"></i>
                    {{ $profile['eyebrow'] }}
                </div>
                <h1>Profil <span>Pembaca</span></h1>
                <p class="intro-description">{{ $profile['welcomeText'] }}</p>
            </div>
            <div class="intro-icon" aria-hidden="true">
                <i class="fa-solid {{ $profile['heroIcon'] }}"></i>
            </div>
        </section>

        <section class="profile-layout" aria-label="Detail profil pembaca">
            <aside class="profile-card profile-summary">
                <div class="profile-avatar">{{ mb_strtoupper(mb_substr($accountUser->name ?? 'P', 0, 1)) }}</div>
                <span class="profile-badge">
                    <i class="fa-solid {{ $profile['badgeIcon'] }}" aria-hidden="true"></i>
                    Akun {{ $profile['roleLabel'] }}
                </span>
                <h2>{{ $accountUser->name }}</h2>
                <p class="profile-username">
                    {{ $accountUser->username ? '@'.$accountUser->username : 'Username belum diatur' }}
                </p>
                <p class="profile-caption">{{ $profile['summaryCaption'] }}</p>
                <a href="{{ $profile['primaryUrl'] }}" class="profile-button">
                    <i class="{{ $profile['primaryIcon'] }}" aria-hidden="true"></i>
                    {{ $profile['primaryLabel'] }}
                </a>
            </aside>

            <div>
                <section class="profile-card profile-info" id="informasi-profil">
                    <div class="profile-info-title">
                        <h2>Informasi Akun</h2>
                        <span>Detail profil pembaca</span>
                    </div>
                    <div class="profile-detail">
                        <span class="profile-label"><i class="fa-regular fa-user" aria-hidden="true"></i> Nama Lengkap</span>
                        <span class="profile-value">{{ $accountUser->name }}</span>
                    </div>
                    <div class="profile-detail">
                        <span class="profile-label"><i class="fa-solid fa-at" aria-hidden="true"></i> Username</span>
                        <span class="profile-value">{{ $accountUser->username ?: 'Belum diatur' }}</span>
                    </div>
                    <div class="profile-detail">
                        <span class="profile-label"><i class="fa-regular fa-envelope" aria-hidden="true"></i> Alamat Email</span>
                        <span class="profile-value">{{ $accountUser->email }}</span>
                    </div>
                    <div class="profile-detail">
                        <span class="profile-label"><i class="{{ $profile['statIcon'] }}" aria-hidden="true"></i> {{ $profile['statLabel'] }}</span>
                        <span class="profile-value">{{ $profile['statValue'] }}</span>
                    </div>
                </section>

                <div class="profile-note">
                    <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                    <div>
                        <strong>Informasi akun kamu</strong>
                        <p>Informasi ini membantu kamu mengenali akun yang sedang digunakan. Jaga kerahasiaan akses akunmu.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-background" aria-hidden="true"></div>
        <div class="footer-overlay" aria-hidden="true"></div>

        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="footer-logo">
                        <img
                            src="{{ $siteLogoUrl }}"
                            alt="{{ $siteSettings['site_name'] }}"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <span class="footer-logo-fallback">{{ $siteSettings['site_name'] }}</span>
                    </a>

                    <p class="footer-description">{{ $siteSettings['footer_description'] }}</p>
                    @if ($siteSettings['contact_email'] || $siteSettings['contact_phone'])
                        <p class="footer-description">
                            @if ($siteSettings['contact_email'])
                                <a href="mailto:{{ $siteSettings['contact_email'] }}">{{ $siteSettings['contact_email'] }}</a>
                            @endif
                            @if ($siteSettings['contact_phone'])
                                <br>{{ $siteSettings['contact_phone'] }}
                            @endif
                        </p>
                    @endif

                    <div class="footer-social" aria-label="Media sosial">
                        <a href="{{ $siteSettings['instagram_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $siteSettings['facebook_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $siteSettings['youtube_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $siteSettings['tiktok_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                            <i class="fa-brands fa-tiktok" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $siteSettings['x_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="X">
                            <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-column">
                    <h2>Jelajahi</h2>
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('about') }}">Tentang Kami</a>
                    <a href="{{ route('articles.index') }}">Berita</a>
                </div>

                <div class="footer-column">
                    <h2>Informasi</h2>
                    <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                    <a href="{{ route('opini') }}">Opini</a>
                    <a href="{{ route('sosok') }}">Sosok</a>
                    <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                    <a href="{{ route('potensi') }}">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>

                <div class="footer-column">
                    <h2>Layanan</h2>
                    <a href="https://ppid.banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">PPID</a>
                    <a href="https://www.instagram.com/mpp.banjarnegara/" target="_blank" rel="noopener noreferrer">Layanan Publik</a>
                    <a href="https://banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">Kontak</a>
                    <a href="{{ route('login') }}">Masuk</a>
                    <a href="{{ route('register') }}">Daftar</a>
                </div>

                <div class="footer-newsletter">
                    <span class="footer-newsletter-label">TETAP TERHUBUNG</span>
                    <h2>Cerita Banjarnegara, <span>langsung ke kamu.</span></h2>
                    <p>Dapatkan informasi dan cerita terbaru seputar Banjarnegara.</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                        @csrf
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email kamu"
                            aria-label="Alamat email untuk newsletter"
                            autocomplete="email"
                            maxlength="255"
                            required
                        >
                        <button type="submit" aria-label="Daftar newsletter">
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </form>

                    @if (session('newsletterStatus'))
                        <p class="newsletter-feedback" role="status">{{ session('newsletterStatus') }}</p>
                    @endif
                    @error('email')
                        <p class="newsletter-feedback error" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="footer-quote">
                <div class="footer-quote-mark" aria-hidden="true">“</div>
                <p>{{ $siteSettings['footer_quote'] }}</p>
                <small>{{ mb_strtoupper($siteSettings['site_name']) }} — BANJARNEGARA</small>
            </div>

            <div class="footer-bottom">
                <div>&copy; {{ date('Y') }} {{ $siteSettings['site_name'] }}. {{ $siteSettings['footer_copyright'] }}</div>
                <nav class="footer-bottom-links" aria-label="Informasi legal">
                    <a href="{{ route('information.privacy') }}">Kebijakan Privasi</a>
                    <a href="{{ route('information.terms') }}">Syarat &amp; Ketentuan</a>
                    <a href="{{ route('information.editorial') }}">Pedoman Media Siber</a>
                </nav>
                <div class="footer-made">Dibuat untuk <strong>Banjarnegara</strong> <i class="fa-solid fa-heart" aria-hidden="true"></i></div>
            </div>
        </div>
    </footer>

    <script>
        const menuButton = document.querySelector('.menu-button');
        const mainNavigation = document.getElementById('mainNavigation');

        menuButton.addEventListener('click', () => {
            const isOpen = mainNavigation.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
        });
    </script>
</body>
</html>
