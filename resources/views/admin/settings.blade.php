<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Website | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @include('editor.partials.shell-styles')

    <style>
        body {
            color: #123d5b;
            background: #f4fbfe;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
        }

        .settings-content {
            width: 100%;
            max-width: 1240px;
            min-width: 0;
            box-sizing: border-box;
        }

        .settings-content *,
        .settings-content *::before,
        .settings-content *::after {
            box-sizing: border-box;
        }

        .main,
        .settings-layout,
        .settings-rail,
        .settings-form-sections {
            min-width: 0;
        }

        .settings-heading {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
            padding: 28px 30px;
            overflow: hidden;
            color: #fff;
            background:
                radial-gradient(circle at 88% 12%, rgba(32, 217, 220, .28), transparent 16rem),
                linear-gradient(118deg, #123f5c, #087b98);
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 22px;
            box-shadow: 0 14px 34px rgba(18, 69, 110, .15);
        }

        .settings-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 8px;
            color: #a7f2f4;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .settings-heading h1 {
            margin: 0;
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: clamp(25px, 3vw, 32px);
            line-height: 1.2;
        }

        .settings-heading p {
            max-width: 620px;
            margin-top: 8px;
            color: rgba(235, 248, 251, .78);
            font-size: 13px;
            line-height: 1.65;
        }

        .settings-preview-link {
            display: inline-flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 10px 14px;
            color: #fff;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            transition: border-color .2s, background .2s, transform .2s;
        }

        .settings-preview-link:hover {
            background: rgba(255,255,255,.2);
            border-color: rgba(255,255,255,.55);
            transform: translateY(-1px);
        }

        .settings-layout {
            display: grid;
            grid-template-columns: minmax(245px, 300px) minmax(0, 1fr);
            align-items: start;
            gap: 20px;
        }

        .settings-rail {
            position: sticky;
            top: 96px;
            display: grid;
            gap: 14px;
            min-width: 0;
        }

        .settings-live-card,
        .settings-nav-card {
            overflow: hidden;
            background: #fff;
            border: 1px solid #e2edf2;
            border-radius: 18px;
            box-shadow: 0 6px 22px rgba(18, 69, 110, .045);
        }

        .settings-live-card {
            padding: 16px;
        }

        .settings-live-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 13px;
            color: #12456e;
            font-size: 12px;
            font-weight: 800;
        }

        .settings-live-heading span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .settings-live-heading i { color: #078ba9; }

        .settings-live-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #6c8493;
            font-size: 10px;
            font-weight: 700;
        }

        .settings-live-status::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #20b884;
        }

        .settings-live-status.changed { color: #a26512; }
        .settings-live-status.changed::before { background: #f0ad3d; }

        .site-live-preview {
            overflow: hidden;
            border: 1px solid #e2edf2;
            border-radius: 13px;
            background: #fff;
        }

        .site-live-background {
            position: relative;
            display: flex;
            align-items: flex-end;
            min-height: 74px;
            margin-top: 10px;
            padding: 10px;
            overflow: hidden;
            border: 1px solid #e2edf2;
            border-radius: 11px;
            background-color: var(--preview-background, #f4fbfe);
            background-position: center;
            background-size: cover;
        }

        .site-live-background span {
            position: relative;
            z-index: 1;
            padding: 5px 8px;
            border-radius: 7px;
            color: #35566a;
            background: rgba(255,255,255,.82);
            font-size: 9px;
            font-weight: 800;
        }

        .site-live-header {
            display: flex;
            align-items: center;
            gap: 8px;
            min-height: 45px;
            padding: 8px 10px;
            color: #fff;
            background: var(--preview-primary, #063f60);
        }

        .site-live-logo {
            width: 27px;
            height: 27px;
            display: grid;
            flex: 0 0 27px;
            place-items: center;
            overflow: hidden;
            border-radius: 8px;
            color: var(--preview-primary, #063f60);
            background: #fff;
            font-size: 11px;
            font-weight: 900;
        }

        .site-live-logo img {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #fff;
        }

        .site-live-logo img.visible { display: block; }

        .site-live-name {
            min-width: 0;
            font-size: 11px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .site-live-tagline {
            margin-top: 1px;
            color: rgba(255,255,255,.74);
            font-size: 9px;
            overflow-wrap: anywhere;
        }

        .site-live-nav {
            display: flex;
            gap: 12px;
            padding: 7px 10px;
            color: #557181;
            background: #f7fbfc;
            font-size: 8px;
            font-weight: 700;
        }

        .site-live-hero {
            position: relative;
            min-height: 122px;
            display: flex;
            align-items: flex-end;
            padding: 13px;
            overflow: hidden;
            color: #fff;
            background: #174e67;
        }

        .site-live-hero > img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .site-live-hero::after {
            position: absolute;
            inset: 0;
            content: "";
            background: linear-gradient(90deg, rgba(3,35,51,.88), rgba(3,48,68,.4));
        }

        .site-live-hero-copy {
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .site-live-eyebrow {
            color: #9af0ed;
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .site-live-title {
            display: -webkit-box;
            overflow: hidden;
            margin-top: 4px;
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            line-height: 1.15;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .site-live-description {
            display: -webkit-box;
            overflow: hidden;
            margin-top: 5px;
            color: rgba(255,255,255,.8);
            font-size: 8px;
            line-height: 1.45;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .site-live-footer {
            padding: 10px 11px;
            color: #5e7481;
            background: #f4f8fa;
            font-size: 8px;
            line-height: 1.5;
        }

        .site-live-contact {
            margin-top: 5px;
            color: #718898;
        }

        .site-live-quote {
            margin-top: 5px;
            color: #375d6d;
            font-style: italic;
        }

        .site-live-footer small {
            display: block;
            margin-top: 7px;
            color: #8396a1;
            font-size: 7px;
        }

        .site-live-socials {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-top: 7px;
        }

        .site-live-socials a {
            padding: 3px 6px;
            color: #fff;
            background: var(--preview-accent, #08add5);
            border-radius: 999px;
            font-size: 7px;
            font-weight: 800;
            text-decoration: none;
        }

        .site-live-colors {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-top: 9px;
            color: #718898;
            font-size: 9px;
            font-weight: 700;
        }

        .site-live-color {
            width: 17px;
            height: 17px;
            border: 2px solid #fff;
            border-radius: 50%;
            box-shadow: 0 0 0 1px #dce7ec;
        }

        .settings-nav-card {
            padding: 14px 10px;
        }

        .settings-nav-title {
            padding: 0 10px 8px;
            color: #8196a4;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .9px;
            text-transform: uppercase;
        }

        .settings-nav {
            display: grid;
            gap: 3px;
        }

        .settings-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            color: #61798b;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 700;
            transition: color .18s, background .18s;
        }

        .settings-nav a i {
            width: 16px;
            color: #078ba9;
            text-align: center;
        }

        .settings-nav a:hover,
        .settings-nav a.active {
            color: #087c99;
            background: #eaf8fa;
        }

        .settings-section {
            margin-bottom: 16px;
            padding: 24px 26px;
            background: #fff;
            border: 1px solid #e2edf2;
            border-radius: 18px;
            box-shadow: 0 6px 22px rgba(18, 69, 110, .045);
        }

        .settings-section-header {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            margin-bottom: 22px;
        }

        .settings-section-icon {
            display: grid;
            flex: 0 0 42px;
            width: 42px;
            height: 42px;
            place-items: center;
            color: #087f9d;
            background: #e8f8fb;
            border: 1px solid #d7f0f4;
            border-radius: 13px;
            font-size: 16px;
        }

        .settings-section-header h2 {
            margin: 1px 0 5px;
            color: #12456e;
            font-size: 15px;
            font-weight: 800;
        }

        .settings-section-header p {
            color: #8296a5;
            font-size: 11px;
            line-height: 1.55;
        }

        .settings-section:target {
            border-color: #8ed8e2;
            box-shadow: 0 0 0 3px rgba(8, 173, 213, .09), 0 8px 24px rgba(18, 69, 110, .06);
        }

        .settings-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px 20px;
        }

        .settings-field {
            display: grid;
            align-content: start;
            gap: 8px;
            min-width: 0;
        }

        .settings-field.full {
            grid-column: 1 / -1;
        }

        .settings-field label {
            color: #12456e;
            font-size: 12px;
            font-weight: 800;
        }

        .settings-field input:not([type="checkbox"]):not([type="color"]),
        .settings-field select,
        .settings-field textarea {
            width: 100%;
            min-height: 42px;
            padding: 11px 13px;
            color: #233b50;
            background: #fcfeff;
            border: 1px solid #d9e6ed;
            border-radius: 10px;
            font: inherit;
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .settings-field textarea {
            min-height: 96px;
            resize: vertical;
            line-height: 1.6;
        }

        .settings-field input:focus,
        .settings-field select:focus,
        .settings-field textarea:focus {
            outline: none;
            background: #fff;
            border-color: #08add5;
            box-shadow: 0 0 0 3px rgba(8, 173, 213, .13);
        }

        .settings-field input[type="file"] {
            min-height: 46px;
            padding: 6px;
            color: #60798b;
            font-size: 11px;
        }

        .settings-field input[type="file"]::file-selector-button {
            min-height: 32px;
            margin-right: 10px;
            padding: 0 11px;
            color: #126080;
            background: #eaf7fa;
            border: 0;
            border-radius: 7px;
            cursor: pointer;
            font: inherit;
            font-weight: 700;
        }

        .settings-field input[type="color"] {
            width: 100%;
            height: 46px;
            padding: 5px;
            background: #fcfeff;
            border: 1px solid #d9e6ed;
            border-radius: 10px;
            cursor: pointer;
        }

        .settings-help {
            color: #7b91a3;
            font-size: 11px;
            line-height: 1.55;
        }

        .settings-check {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 3px;
            color: #61798b;
            font-size: 12px;
            cursor: pointer;
        }

        .settings-check input {
            width: 16px;
            height: 16px;
            accent-color: #078ba9;
        }

        .settings-image-preview {
            display: none;
            align-items: center;
            gap: 11px;
            margin-top: 4px;
            padding: 10px;
            border: 1px solid #e2edf2;
            border-radius: 11px;
            background: #f8fbfc;
        }

        .settings-image-preview.visible { display: flex; }

        .settings-image-preview img {
            width: 74px;
            height: 58px;
            flex: 0 0 74px;
            object-fit: contain;
            border-radius: 7px;
            background: #fff;
        }

        .settings-image-preview[data-kind="banner"] img,
        .settings-image-preview[data-kind="background"] img { object-fit: cover; }

        .settings-image-copy {
            min-width: 0;
            color: #61798b;
            font-size: 10px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .settings-image-copy strong {
            display: block;
            margin-bottom: 2px;
            color: #12456e;
            font-size: 11px;
        }

        .settings-image-preview .settings-check { margin: 0; }

        .settings-color-field {
            display: grid;
            grid-template-columns: 62px minmax(0, 1fr);
            align-items: center;
            gap: 10px;
        }

        .settings-alert {
            margin-bottom: 18px;
            padding: 14px 16px;
            border: 1px solid transparent;
            border-radius: 12px;
            font-size: 13px;
        }

        .settings-alert.success {
            color: #17653d;
            background: #e8f7ef;
            border-color: #ccebd9;
        }

        .settings-alert.error {
            color: #a53333;
            background: #fff1f1;
            border-color: #f5d6d6;
        }

        .settings-errors {
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .settings-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            position: sticky;
            bottom: 12px;
            z-index: 20;
            margin-top: 20px;
            padding: 14px 17px;
            background: rgba(255, 255, 255, .96);
            border: 1px solid #e1edf3;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(18, 69, 110, .1);
            backdrop-filter: blur(12px);
        }

        .settings-actions-note {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #718898;
            font-size: 11px;
        }

        .settings-save {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 11px 17px;
            color: #fff;
            background: linear-gradient(110deg, #0da8c9, #078bb2);
            border: 0;
            border-radius: 11px;
            cursor: pointer;
            font: inherit;
            font-size: 12px;
            font-weight: 800;
            box-shadow: 0 5px 13px rgba(7, 139, 178, .2);
            transition: transform .2s, box-shadow .2s;
        }

        .settings-save:hover {
            transform: translateY(-1px);
            box-shadow: 0 7px 17px rgba(7, 139, 178, .27);
        }

        @media (max-width: 1024px) {
            .settings-layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .settings-rail {
                position: static;
                grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
            }

            .settings-nav-card {
                grid-row: 1;
            }
        }

        @media (max-width: 768px) {
            .settings-heading {
                align-items: flex-start;
                flex-direction: column;
                padding: 24px;
            }

            .settings-rail {
                position: static;
                grid-template-columns: minmax(0, .85fr) minmax(0, 1.15fr);
                align-items: start;
            }

            .settings-nav-card {
                grid-row: 1;
            }

            .settings-nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .settings-nav a {
                padding: 9px 7px;
                font-size: 10px;
            }

            .settings-grid {
                grid-template-columns: 1fr;
            }

            .settings-field.full {
                grid-column: auto;
            }

            .settings-section {
                padding: 20px;
            }

            .settings-actions {
                bottom: 8px;
                padding: 12px;
            }
        }

        @media (max-width: 480px) {
            .settings-heading {
                padding: 20px;
                border-radius: 17px;
            }

            .settings-section {
                padding: 17px;
            }

            .settings-rail {
                grid-template-columns: minmax(0, 1fr);
            }

            .settings-nav-card { grid-row: auto; }

            .settings-nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .settings-nav a {
                min-width: 0;
                overflow-wrap: anywhere;
            }

            .settings-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .settings-actions-note {
                justify-content: center;
                text-align: center;
            }

            .settings-save {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="layout">
    @include('editor.partials.sidebar')

    <main class="main">
        @include('editor.partials.topbar', ['pageTitle' => 'Pengaturan Website'])

        <div class="content settings-content">
            <div class="settings-heading">
                <div>
                    <span class="settings-eyebrow"><i class="fa-solid fa-sliders"></i> Administrasi situs</span>
                    <h1>Pengaturan Website</h1>
                    <p>Kelola identitas dan informasi yang ditampilkan kepada pengunjung. Simpan perubahan untuk menerapkannya ke website.</p>
                </div>
                <a class="settings-preview-link" href="{{ route('home') }}" target="_blank" rel="noopener">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    Lihat website
                </a>
            </div>

            @if(session('success'))
                <div class="settings-alert success" role="status">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="settings-alert error" role="alert">
                    <strong>Pengaturan belum tersimpan. Periksa kembali isian berikut:</strong>
                    <ul class="settings-errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="websiteSettingsForm" method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="settings-layout">
                    <aside class="settings-rail" aria-label="Navigasi dan pratinjau pengaturan">
                        <section class="settings-live-card">
                            <div class="settings-live-heading">
                                <span><i class="fa-solid fa-eye"></i> Pratinjau langsung</span>
                                <span class="settings-live-status" id="settingsLiveStatus" aria-live="polite">Tersimpan</span>
                            </div>
                            <div class="site-live-preview">
                                <header class="site-live-header">
                                    <span class="site-live-logo">
                                        <img id="liveLogo"
                                             src="{{ $settings['logo_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['logo_path']) : asset('images/logo.png') }}"
                                             alt=""
                                             class="{{ $settings['logo_path'] ? 'visible' : '' }}"
                                                     data-fallback="{{ asset('images/logo.png') }}"
                                                     data-stored-src="{{ $settings['logo_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['logo_path']) : '' }}">
                                        <span id="liveLogoFallback" @if($settings['logo_path']) hidden @endif>DS</span>
                                    </span>
                                    <span>
                                        <span class="site-live-name" id="liveSiteName">{{ old('site_name', $settings['site_name']) }}</span>
                                        <span class="site-live-tagline" id="liveTagline">{{ old('tagline', $settings['tagline']) }}</span>
                                    </span>
                                </header>
                                <div class="site-live-nav">
                                    <span>Beranda</span><span>Artikel</span><span>Galeri</span>
                                </div>
                                <div class="site-live-hero">
                                    <img id="liveBanner"
                                         src="{{ $settings['banner_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['banner_path']) : asset('images/bg-sikunir-home.jpg') }}"
                                         alt=""
                                         data-fallback="{{ asset('images/bg-sikunir-home.jpg') }}"
                                         data-stored-src="{{ $settings['banner_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['banner_path']) : '' }}">
                                    <div class="site-live-hero-copy">
                                        <div class="site-live-eyebrow" id="liveHomeEyebrow">{{ old('home_eyebrow', $settings['home_eyebrow']) }}</div>
                                        <div class="site-live-title" id="liveHomeHeading">{{ old('home_heading', $settings['home_heading']) }}</div>
                                        <div class="site-live-description" id="liveHomeDescription">{{ old('home_description', $settings['home_description']) }}</div>
                                    </div>
                                </div>
                                <footer class="site-live-footer">
                                    <div id="liveFooterDescription">{{ old('footer_description', $settings['footer_description']) }}</div>
                                    <div class="site-live-quote" id="liveFooterQuote">{{ old('footer_quote', $settings['footer_quote']) }}</div>
                                    <div id="liveContactPreview"></div>
                                    <div class="site-live-socials" id="liveSocialPreview"></div>
                                    <small id="liveFooterCopyright">{{ old('footer_copyright', $settings['footer_copyright']) }}</small>
                                </footer>
                            </div>
                            <div class="site-live-background" id="liveBackgroundPreview">
                                <span id="liveBackgroundLabel">Warna latar halaman</span>
                            </div>
                            <div class="site-live-colors">
                                <span class="site-live-color" id="livePrimaryColor"></span>
                                <span id="livePrimaryValue">{{ old('primary_color', $settings['primary_color']) }}</span>
                                <span class="site-live-color" id="liveAccentColor"></span>
                                <span id="liveAccentValue">{{ old('accent_color', $settings['accent_color']) }}</span>
                                <span class="site-live-color" id="liveBackgroundColor"></span>
                                <span id="liveBackgroundValue">{{ old('background_color', $settings['background_color']) }}</span>
                            </div>
                        </section>

                        <nav class="settings-nav-card" aria-label="Bagian pengaturan">
                            <div class="settings-nav-title">Bagian pengaturan</div>
                            <div class="settings-nav">
                                <a href="#identitySection"><i class="fa-solid fa-id-card"></i> Identitas</a>
                                <a href="#themeSection"><i class="fa-solid fa-palette"></i> Tema warna</a>
                                <a href="#authBgSection"><i class="fa-solid fa-image"></i> Latar halaman auth</a>
                                <a href="#homeSection"><i class="fa-solid fa-house"></i> Beranda</a>
                                <a href="#contactSection"><i class="fa-solid fa-share-nodes"></i> Kontak &amp; sosial</a>
                                <a href="#footerSection"><i class="fa-solid fa-window-maximize"></i> Footer</a>
                            </div>
                        </nav>
                    </aside>

                    <div class="settings-form-sections">
                <section class="settings-section" id="identitySection">
                    <header class="settings-section-header">
                        <span class="settings-section-icon"><i class="fa-solid fa-id-card"></i></span>
                        <div>
                            <h2>Identitas Website</h2>
                            <p>Nama yang dikenali pengunjung dan logo yang digunakan di area situs.</p>
                        </div>
                    </header>
                    <div class="settings-grid">
                        <div class="settings-field">
                            <label for="site_name">Nama website</label>
                            <input id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name']) }}" maxlength="80" required>
                        </div>
                        <div class="settings-field">
                            <label for="tagline">Tagline</label>
                            <input id="tagline" name="tagline" value="{{ old('tagline', $settings['tagline']) }}" maxlength="160" required>
                        </div>
                        <div class="settings-field">
                            <label for="logo">Logo</label>
                            <input id="logo" type="file" name="logo" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <span class="settings-help">Format JPG, PNG, atau WebP, maksimal 2 MB.</span>
                            <div class="settings-image-preview {{ $settings['logo_path'] ? 'visible' : '' }}" id="logoImagePreview">
                                <img id="logoImagePreviewSource"
                                     src="{{ $settings['logo_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['logo_path']) : '' }}"
                                     alt="Pratinjau logo"
                                     data-stored-src="{{ $settings['logo_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['logo_path']) : '' }}">
                                <span class="settings-image-copy">
                                    <strong id="logoImagePreviewTitle">{{ $settings['logo_path'] ? 'Logo saat ini' : 'Belum ada logo dipilih' }}</strong>
                                    <span id="logoImagePreviewName">Logo akan ditampilkan di header website.</span>
                                </span>
                            </div>
                            @if($settings['logo_path'])
                                <label class="settings-check" id="removeLogoLabel">
                                    <input type="checkbox" id="removeLogo" name="remove_logo" value="1">
                                    Hapus logo saat ini
                                </label>
                            @endif
                        </div>
                    </div>
                </section>

                <section class="settings-section" id="themeSection">
                    <header class="settings-section-header">
                        <span class="settings-section-icon"><i class="fa-solid fa-palette"></i></span>
                        <div>
                            <h2>Tema Warna</h2>
                            <p>Warna utama dan aksen diterapkan ke navigasi, tombol, judul, tautan, sorotan, dan elemen interaktif di seluruh website.</p>
                        </div>
                    </header>
                    <div class="settings-grid">
                        <div class="settings-field">
                            <label for="primary_color">Warna utama</label>
                            <div class="settings-color-field">
                                <input id="primary_color" type="color" name="primary_color" value="{{ old('primary_color', $settings['primary_color']) }}" required>
                                <input id="primary_color_text" type="text" value="{{ old('primary_color', $settings['primary_color']) }}" maxlength="7" pattern="#[0-9A-Fa-f]{6}" title="Masukkan kode hex, contoh #123ABC" required aria-label="Kode warna utama">
                            </div>
                        </div>
                        <div class="settings-field">
                            <label for="accent_color">Warna aksen</label>
                            <div class="settings-color-field">
                                <input id="accent_color" type="color" name="accent_color" value="{{ old('accent_color', $settings['accent_color']) }}" required>
                                <input id="accent_color_text" type="text" value="{{ old('accent_color', $settings['accent_color']) }}" maxlength="7" pattern="#[0-9A-Fa-f]{6}" title="Masukkan kode hex, contoh #123ABC" required aria-label="Kode warna aksen">
                            </div>
                        </div>
                        <div class="settings-field">
                            <label for="background_mode">Jenis latar halaman</label>
                            <select id="background_mode" name="background_mode" required>
                                <option value="color" @selected(old('background_mode', $settings['background_mode']) === 'color')>Warna solid</option>
                                <option value="image" @selected(old('background_mode', $settings['background_mode']) === 'image')>Gambar latar</option>
                            </select>
                            <span class="settings-help">Diterapkan sebagai latar halaman untuk pembaca, penulis, editor, dan admin.</span>
                        </div>
                        <div class="settings-field">
                            <label for="background_color">Warna latar / lapisan gambar</label>
                            <div class="settings-color-field">
                                <input id="background_color" type="color" name="background_color" value="{{ old('background_color', $settings['background_color']) }}" required>
                                <input id="background_color_text" type="text" value="{{ old('background_color', $settings['background_color']) }}" maxlength="7" pattern="#[0-9A-Fa-f]{6}" title="Masukkan kode hex, contoh #F4FBFE" required aria-label="Kode warna latar">
                            </div>
                            <span class="settings-help">Menjadi warna utama saat memilih latar solid dan lapisan lembut saat memakai gambar.</span>
                        </div>
                        <div class="settings-field full">
                            <label for="backgroundImage">Gambar latar</label>
                            <input id="backgroundImage" type="file" name="background_image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <span class="settings-help">Format JPG, PNG, atau WebP, maksimal 5 MB. Gambar digunakan saat jenis latar diatur ke Gambar.</span>
                            <div class="settings-image-preview {{ $settings['background_image_path'] ? 'visible' : '' }}" id="backgroundImagePreview" data-kind="background">
                                <img id="backgroundImagePreviewSource"
                                     src="{{ $settings['background_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['background_image_path']) : '' }}"
                                     alt="Pratinjau gambar latar"
                                     data-stored-src="{{ $settings['background_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['background_image_path']) : '' }}">
                                <span class="settings-image-copy">
                                    <strong id="backgroundImagePreviewTitle">{{ $settings['background_image_path'] ? 'Gambar latar saat ini' : 'Belum ada gambar dipilih' }}</strong>
                                    <span id="backgroundImagePreviewName">Gambar ini akan tampil di latar halaman.</span>
                                </span>
                            </div>
                            @if($settings['background_image_path'])
                                <label class="settings-check" id="removeBackgroundImageLabel">
                                    <input type="checkbox" id="removeBackgroundImage" name="remove_background_image" value="1">
                                    Hapus gambar latar tersimpan
                                </label>
                            @endif
                        </div>
                    </div>
                </section>

                <section class="settings-section" id="authBgSection">
                    <header class="settings-section-header">
                        <span class="settings-section-icon"><i class="fa-solid fa-image"></i></span>
                        <div>
                            <h2>Latar Halaman Autentikasi</h2>
                            <p>Pengaturan latar belakang tersendiri untuk halaman Masuk (Login), Pendaftaran (Register), dan Reset Password.</p>
                        </div>
                    </header>
                    <div class="settings-grid">
                        {{-- 1. Latar Halaman Login --}}
                        <div class="settings-field">
                            <label for="loginBgImage">Latar Halaman Masuk (Login)</label>
                            <input id="loginBgImage" type="file" name="login_bg_image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <span class="settings-help">Format JPG, PNG, atau WebP, maksimal 5 MB. Jika kosong, latar bawaan digunakan.</span>
                            <div class="settings-image-preview {{ $settings['login_bg_image_path'] ? 'visible' : '' }}" id="loginBgImagePreview">
                                <img id="loginBgImagePreviewSource"
                                     src="{{ $settings['login_bg_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['login_bg_image_path']) : '' }}"
                                     alt="Pratinjau latar login"
                                     data-stored-src="{{ $settings['login_bg_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['login_bg_image_path']) : '' }}">
                                <span class="settings-image-copy">
                                    <strong id="loginBgImagePreviewTitle">{{ $settings['login_bg_image_path'] ? 'Gambar latar login saat ini' : 'Belum ada gambar dipilih' }}</strong>
                                    <span id="loginBgImagePreviewName">Tampil di halaman login pengguna.</span>
                                </span>
                            </div>
                            @if($settings['login_bg_image_path'])
                                <label class="settings-check">
                                    <input type="checkbox" id="removeLoginBgImage" name="remove_login_bg_image" value="1">
                                    Hapus gambar latar login tersimpan (kembali ke bawaan)
                                </label>
                            @endif
                        </div>

                        {{-- 2. Latar Halaman Register --}}
                        <div class="settings-field">
                            <label for="registerBgImage">Latar Halaman Pendaftaran (Register)</label>
                            <input id="registerBgImage" type="file" name="register_bg_image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <span class="settings-help">Format JPG, PNG, atau WebP, maksimal 5 MB. Jika kosong, latar bawaan digunakan.</span>
                            <div class="settings-image-preview {{ $settings['register_bg_image_path'] ? 'visible' : '' }}" id="registerBgImagePreview">
                                <img id="registerBgImagePreviewSource"
                                     src="{{ $settings['register_bg_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['register_bg_image_path']) : '' }}"
                                     alt="Pratinjau latar registrasi"
                                     data-stored-src="{{ $settings['register_bg_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['register_bg_image_path']) : '' }}">
                                <span class="settings-image-copy">
                                    <strong id="registerBgImagePreviewTitle">{{ $settings['register_bg_image_path'] ? 'Gambar latar registrasi saat ini' : 'Belum ada gambar dipilih' }}</strong>
                                    <span id="registerBgImagePreviewName">Tampil di halaman registrasi pembaca & penulis.</span>
                                </span>
                            </div>
                            @if($settings['register_bg_image_path'])
                                <label class="settings-check">
                                    <input type="checkbox" id="removeRegisterBgImage" name="remove_register_bg_image" value="1">
                                    Hapus gambar latar registrasi tersimpan (kembali ke bawaan)
                                </label>
                            @endif
                        </div>

                        {{-- 3. Latar Halaman Reset Password --}}
                        <div class="settings-field">
                            <label for="resetPasswordBgImage">Latar Halaman Reset Password (Lupa & Atur Ulang Sandi)</label>
                            <input id="resetPasswordBgImage" type="file" name="reset_password_bg_image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <span class="settings-help">Format JPG, PNG, atau WebP, maksimal 5 MB. Jika kosong, latar bawaan digunakan.</span>
                            <div class="settings-image-preview {{ $settings['reset_password_bg_image_path'] ? 'visible' : '' }}" id="resetPasswordBgImagePreview">
                                <img id="resetPasswordBgImagePreviewSource"
                                     src="{{ $settings['reset_password_bg_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['reset_password_bg_image_path']) : '' }}"
                                     alt="Pratinjau latar reset password"
                                     data-stored-src="{{ $settings['reset_password_bg_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['reset_password_bg_image_path']) : '' }}">
                                <span class="settings-image-copy">
                                    <strong id="resetPasswordBgImagePreviewTitle">{{ $settings['reset_password_bg_image_path'] ? 'Gambar latar reset password saat ini' : 'Belum ada gambar dipilih' }}</strong>
                                    <span id="resetPasswordBgImagePreviewName">Tampil di halaman lupa sandi dan atur ulang kata sandi.</span>
                                </span>
                            </div>
                            @if($settings['reset_password_bg_image_path'])
                                <label class="settings-check">
                                    <input type="checkbox" id="removeResetPasswordBgImage" name="remove_reset_password_bg_image" value="1">
                                    Hapus gambar latar reset password tersimpan (kembali ke bawaan)
                                </label>
                            @endif
                        </div>
                    </div>
                </section>

                <section class="settings-section" id="homeSection">
                    <header class="settings-section-header">
                        <span class="settings-section-icon"><i class="fa-solid fa-house"></i></span>
                        <div>
                            <h2>Beranda</h2>
                            <p>Atur gambar dan teks banner yang tampil di bagian atas halaman utama.</p>
                        </div>
                    </header>
                    <div class="settings-grid">
                        <div class="settings-field">
                            <label for="banner">Gambar banner</label>
                            <input id="banner" type="file" name="banner" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <span class="settings-help">Format JPG, PNG, atau WebP, maksimal 5 MB.</span>
                            <div class="settings-image-preview {{ $settings['banner_path'] ? 'visible' : '' }}" id="bannerImagePreview" data-kind="banner">
                                <img id="bannerImagePreviewSource"
                                     src="{{ $settings['banner_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['banner_path']) : '' }}"
                                     alt="Pratinjau banner"
                                     data-stored-src="{{ $settings['banner_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($settings['banner_path']) : '' }}">
                                <span class="settings-image-copy">
                                    <strong id="bannerImagePreviewTitle">{{ $settings['banner_path'] ? 'Banner saat ini' : 'Belum ada banner dipilih' }}</strong>
                                    <span id="bannerImagePreviewName">Banner akan tampil di bagian atas beranda.</span>
                                </span>
                            </div>
                            @if($settings['banner_path'])
                                <label class="settings-check" id="removeBannerLabel">
                                    <input type="checkbox" id="removeBanner" name="remove_banner" value="1">
                                    Hapus banner saat ini
                                </label>
                            @endif
                        </div>
                        <div class="settings-field">
                            <label for="home_eyebrow">Teks kecil banner</label>
                            <input id="home_eyebrow" name="home_eyebrow" value="{{ old('home_eyebrow', $settings['home_eyebrow']) }}" maxlength="100" required>
                        </div>
                        <div class="settings-field full">
                            <label for="home_heading">Judul utama banner</label>
                            <input id="home_heading" name="home_heading" value="{{ old('home_heading', $settings['home_heading']) }}" maxlength="180" required>
                            <span class="settings-help">Ditampilkan sebagai judul utama saat belum ada artikel unggulan.</span>
                        </div>
                        <div class="settings-field full">
                            <label for="home_description">Deskripsi banner</label>
                            <textarea id="home_description" name="home_description" maxlength="500" required>{{ old('home_description', $settings['home_description']) }}</textarea>
                        </div>
                    </div>
                </section>

                <section class="settings-section" id="contactSection">
                    <header class="settings-section-header">
                        <span class="settings-section-icon"><i class="fa-solid fa-share-nodes"></i></span>
                        <div>
                            <h2>Kontak dan Media Sosial</h2>
                            <p>Informasi kontak serta tautan kanal resmi yang ditampilkan pada website.</p>
                        </div>
                    </header>
                    <div class="settings-grid">
                        <div class="settings-field">
                            <label for="contact_email">Email kontak</label>
                            <input id="contact_email" type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" maxlength="255">
                        </div>
                        <div class="settings-field">
                            <label for="contact_phone">Nomor telepon</label>
                            <input id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}" maxlength="40">
                        </div>
                        @foreach(['instagram_url' => 'Instagram', 'facebook_url' => 'Facebook', 'youtube_url' => 'YouTube', 'tiktok_url' => 'TikTok', 'x_url' => 'X'] as $field => $label)
                            <div class="settings-field">
                                <label for="{{ $field }}">{{ $label }}</label>
                                <input id="{{ $field }}" type="url" name="{{ $field }}" value="{{ old($field, $settings[$field]) }}" maxlength="255">
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="settings-section" id="footerSection">
                    <header class="settings-section-header">
                        <span class="settings-section-icon"><i class="fa-solid fa-window-maximize"></i></span>
                        <div>
                            <h2>Footer</h2>
                            <p>Deskripsi, kutipan, dan teks hak cipta di bagian bawah halaman.</p>
                        </div>
                    </header>
                    <div class="settings-grid">
                        <div class="settings-field full">
                            <label for="footer_description">Deskripsi website</label>
                            <textarea id="footer_description" name="footer_description" maxlength="500" required>{{ old('footer_description', $settings['footer_description']) }}</textarea>
                        </div>
                        <div class="settings-field full">
                            <label for="footer_quote">Kutipan footer</label>
                            <textarea id="footer_quote" name="footer_quote" maxlength="300" required>{{ old('footer_quote', $settings['footer_quote']) }}</textarea>
                        </div>
                        <div class="settings-field full">
                            <label for="footer_copyright">Teks hak cipta</label>
                            <input id="footer_copyright" name="footer_copyright" value="{{ old('footer_copyright', $settings['footer_copyright']) }}" maxlength="200" required>
                        </div>
                    </div>
                </section>
                    </div>
                </div>

                <div class="settings-actions">
                    <span class="settings-actions-note">
                        <i class="fa-solid fa-circle-info" id="settingsSaveIcon"></i>
                        <span id="settingsSaveMessage">Perubahan diterapkan setelah disimpan.</span>
                    </span>
                    <button class="settings-save" id="settingsSaveButton" type="submit">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
<script>
    const settingsForm = document.getElementById('websiteSettingsForm');
    const settingsLiveStatus = document.getElementById('settingsLiveStatus');
    const imagePreviewUrls = { logo: null, banner: null, background: null };
    const colorPreviewTargets = {
        primary_color: {
            cssProperty: '--preview-primary',
            colorElementId: 'livePrimaryColor',
            valueElementId: 'livePrimaryValue',
        },
        accent_color: {
            cssProperty: '--preview-accent',
            colorElementId: 'liveAccentColor',
            valueElementId: 'liveAccentValue',
        },
        background_color: {
            cssProperty: '--preview-background',
            colorElementId: 'liveBackgroundColor',
            valueElementId: 'liveBackgroundValue',
        },
    };
    const socialFields = [
        ['instagram_url', 'Instagram'],
        ['facebook_url', 'Facebook'],
        ['youtube_url', 'YouTube'],
        ['tiktok_url', 'TikTok'],
        ['x_url', 'X'],
    ];

    const setPreviewText = (elementId, value, fallback = '') => {
        document.getElementById(elementId).textContent = value.trim() || fallback;
    };

    const setColorPreview = (fieldName) => {
        const color = document.getElementById(fieldName).value;
        const target = colorPreviewTargets[fieldName];
        document.documentElement.style.setProperty(target.cssProperty, color);
        document.getElementById(fieldName + '_text').value = color;
        document.getElementById(target.colorElementId).style.backgroundColor = color;
        document.getElementById(target.valueElementId).textContent = color;
    };

    const updateBackgroundPreview = () => {
        const color = document.getElementById('background_color').value;
        const mode = document.getElementById('background_mode').value;
        const backgroundInput = document.getElementById('backgroundImage');
        const backgroundImage = document.getElementById('backgroundImagePreviewSource');
        const removeCheckbox = document.getElementById('removeBackgroundImage');
        const selectedFile = backgroundInput.files[0];
        const storedImage = backgroundImage.dataset.storedSrc;
        const imageSource = selectedFile
            ? imagePreviewUrls.background
            : (removeCheckbox?.checked ? '' : storedImage);
        const preview = document.getElementById('liveBackgroundPreview');
        const backgroundLabel = document.getElementById('liveBackgroundLabel');

        preview.style.backgroundColor = color;
        preview.style.backgroundImage = mode === 'image' && imageSource
            ? `linear-gradient(color-mix(in srgb, ${color} 70%, transparent), color-mix(in srgb, ${color} 70%, transparent)), url("${imageSource}")`
            : 'none';
        backgroundLabel.textContent = mode === 'image' && imageSource
            ? 'Gambar latar halaman'
            : 'Warna latar halaman';
    };

    const updateLivePreview = () => {
        setPreviewText('liveSiteName', document.getElementById('site_name').value, 'Nama website');
        setPreviewText('liveTagline', document.getElementById('tagline').value, 'Tagline website');
        setPreviewText('liveHomeEyebrow', document.getElementById('home_eyebrow').value, 'Cerita Hari Ini');
        setPreviewText('liveHomeHeading', document.getElementById('home_heading').value, 'Judul utama beranda');
        setPreviewText('liveHomeDescription', document.getElementById('home_description').value, 'Deskripsi beranda');
        setPreviewText('liveFooterDescription', document.getElementById('footer_description').value, 'Deskripsi footer');
        setPreviewText('liveFooterQuote', document.getElementById('footer_quote').value, 'Kutipan footer');
        setPreviewText('liveFooterCopyright', document.getElementById('footer_copyright').value, 'Teks hak cipta');

        const contactDetails = [
            document.getElementById('contact_email').value.trim(),
            document.getElementById('contact_phone').value.trim(),
        ].filter(Boolean);
        document.getElementById('liveContactPreview').textContent = contactDetails.join(' · ');

        const socialPreview = document.getElementById('liveSocialPreview');
        socialPreview.replaceChildren();
        socialFields.forEach(([fieldName, label]) => {
            const value = document.getElementById(fieldName).value.trim();
            if (!/^https?:\/\//i.test(value)) {
                return;
            }

            const link = document.createElement('a');
            link.href = value;
            link.target = '_blank';
            link.rel = 'noopener noreferrer';
            link.textContent = label;
            socialPreview.append(link);
        });

        setColorPreview('primary_color');
        setColorPreview('accent_color');
        setColorPreview('background_color');
        updateBackgroundPreview();
    };

    const setImagePreview = (fieldName) => {
        const input = document.getElementById(fieldName);
        const preview = document.getElementById(fieldName + 'ImagePreview');
        const image = document.getElementById(fieldName + 'ImagePreviewSource');
        const title = document.getElementById(fieldName + 'ImagePreviewTitle');
        const name = document.getElementById(fieldName + 'ImagePreviewName');
        const removeCheckbox = document.getElementById(fieldName === 'logo' ? 'removeLogo' : 'removeBanner');
        const liveImage = document.getElementById(fieldName === 'logo' ? 'liveLogo' : 'liveBanner');
        const logoFallback = document.getElementById('liveLogoFallback');
        const selectedFile = input.files[0];
        const storedImage = image.dataset.storedSrc;

        if (imagePreviewUrls[fieldName]) {
            URL.revokeObjectURL(imagePreviewUrls[fieldName]);
            imagePreviewUrls[fieldName] = null;
        }

        if (selectedFile) {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
            const maximumBytes = fieldName === 'logo' ? 2 * 1024 * 1024 : 5 * 1024 * 1024;
            if (!allowedTypes.includes(selectedFile.type) || selectedFile.size > maximumBytes) {
                alert(fieldName === 'logo'
                    ? 'Pilih logo JPG, PNG, atau WebP dengan ukuran maksimal 2 MB.'
                    : 'Pilih banner JPG, PNG, atau WebP dengan ukuran maksimal 5 MB.');
                input.value = '';
                setImagePreview(fieldName);
                return;
            }

            imagePreviewUrls[fieldName] = URL.createObjectURL(selectedFile);
            image.src = imagePreviewUrls[fieldName];
            title.textContent = 'Gambar baru dipilih';
            name.textContent = selectedFile.name;
            preview.classList.add('visible');
            if (removeCheckbox) {
                removeCheckbox.checked = false;
            }
            liveImage.src = imagePreviewUrls[fieldName];
            if (fieldName === 'logo') {
                liveImage.classList.add('visible');
                logoFallback.hidden = true;
            }
            return;
        }

        const shouldRemove = removeCheckbox?.checked ?? false;
        const showStoredImage = Boolean(storedImage) && !shouldRemove;
        preview.classList.toggle('visible', showStoredImage);

        if (showStoredImage) {
            image.src = storedImage;
            title.textContent = fieldName === 'logo' ? 'Logo saat ini' : 'Banner saat ini';
            name.textContent = fieldName === 'logo'
                ? 'Logo akan ditampilkan di header website.'
                : 'Banner akan tampil di bagian atas beranda.';
        }

        if (fieldName === 'logo') {
            liveImage.src = showStoredImage ? storedImage : liveImage.dataset.fallback;
            liveImage.classList.toggle('visible', showStoredImage);
            logoFallback.hidden = showStoredImage;
        } else {
            liveImage.src = showStoredImage ? storedImage : liveImage.dataset.fallback;
        }
    };

    ['site_name', 'tagline', 'home_eyebrow', 'home_heading', 'home_description',
        'footer_description', 'footer_quote', 'footer_copyright', 'contact_email',
        'contact_phone', ...socialFields.map(([name]) => name)]
        .forEach(fieldName => {
            document.getElementById(fieldName).addEventListener('input', updateLivePreview);
        });

    ['primary_color', 'accent_color'].forEach(fieldName => {
        const colorInput = document.getElementById(fieldName);
        const textInput = document.getElementById(fieldName + '_text');

        colorInput.addEventListener('input', () => {
            setColorPreview(fieldName);
        });
        textInput.addEventListener('input', () => {
            if (/^#[0-9a-f]{6}$/i.test(textInput.value)) {
                colorInput.value = textInput.value;
                setColorPreview(fieldName);
            }
        });
        textInput.addEventListener('blur', () => {
            if (!/^#[0-9a-f]{6}$/i.test(textInput.value)) {
                textInput.value = colorInput.value;
            }
        });
    });

    const backgroundColorInput = document.getElementById('background_color');
    const backgroundColorText = document.getElementById('background_color_text');
    backgroundColorInput.addEventListener('input', () => {
        setColorPreview('background_color');
        updateBackgroundPreview();
    });
    backgroundColorText.addEventListener('input', () => {
        if (/^#[0-9a-f]{6}$/i.test(backgroundColorText.value)) {
            backgroundColorInput.value = backgroundColorText.value;
            setColorPreview('background_color');
            updateBackgroundPreview();
        }
    });
    backgroundColorText.addEventListener('blur', () => {
        if (!/^#[0-9a-f]{6}$/i.test(backgroundColorText.value)) {
            backgroundColorText.value = backgroundColorInput.value;
        }
    });

    const backgroundImageInput = document.getElementById('backgroundImage');
    const backgroundImagePreview = document.getElementById('backgroundImagePreview');
    const backgroundImagePreviewSource = document.getElementById('backgroundImagePreviewSource');
    const backgroundImagePreviewTitle = document.getElementById('backgroundImagePreviewTitle');
    const backgroundImagePreviewName = document.getElementById('backgroundImagePreviewName');
    const removeBackgroundImage = document.getElementById('removeBackgroundImage');

    const updateBackgroundImagePreview = () => {
        const selectedFile = backgroundImageInput.files[0];
        const storedImage = backgroundImagePreviewSource.dataset.storedSrc;

        if (imagePreviewUrls.background) {
            URL.revokeObjectURL(imagePreviewUrls.background);
            imagePreviewUrls.background = null;
        }

        if (selectedFile) {
            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
            if (!allowedTypes.includes(selectedFile.type) || selectedFile.size > 5 * 1024 * 1024) {
                alert('Pilih gambar latar JPG, PNG, atau WebP dengan ukuran maksimal 5 MB.');
                backgroundImageInput.value = '';
                updateBackgroundImagePreview();
                return;
            }

            imagePreviewUrls.background = URL.createObjectURL(selectedFile);
            backgroundImagePreviewSource.src = imagePreviewUrls.background;
            backgroundImagePreviewTitle.textContent = 'Gambar latar baru dipilih';
            backgroundImagePreviewName.textContent = selectedFile.name;
            backgroundImagePreview.classList.add('visible');
            if (removeBackgroundImage) {
                removeBackgroundImage.checked = false;
            }
        } else {
            const showStoredImage = Boolean(storedImage) && !removeBackgroundImage?.checked;
            backgroundImagePreview.classList.toggle('visible', showStoredImage);

            if (showStoredImage) {
                backgroundImagePreviewSource.src = storedImage;
                backgroundImagePreviewTitle.textContent = 'Gambar latar saat ini';
                backgroundImagePreviewName.textContent = 'Gambar tampil saat jenis latar diatur ke Gambar.';
            }
        }

        updateBackgroundPreview();
    };

    backgroundImageInput.addEventListener('change', updateBackgroundImagePreview);
    removeBackgroundImage?.addEventListener('change', updateBackgroundImagePreview);
    document.getElementById('background_mode').addEventListener('change', updateBackgroundPreview);

    ['logo', 'banner'].forEach(fieldName => {
        document.getElementById(fieldName).addEventListener('change', () => setImagePreview(fieldName));
        document.getElementById(fieldName === 'logo' ? 'removeLogo' : 'removeBanner')
            ?.addEventListener('change', () => setImagePreview(fieldName));
    });

    settingsForm.addEventListener('input', () => {
        settingsLiveStatus.textContent = 'Belum disimpan';
        settingsLiveStatus.classList.add('changed');
    });
    settingsForm.addEventListener('change', () => {
        settingsLiveStatus.textContent = 'Belum disimpan';
        settingsLiveStatus.classList.add('changed');
    });
    settingsForm.addEventListener('submit', () => {
        document.getElementById('settingsSaveMessage').textContent = 'Menyimpan pengaturan...';
        document.getElementById('settingsSaveIcon').className = 'fa-solid fa-spinner fa-spin';
        const saveButton = document.getElementById('settingsSaveButton');
        saveButton.disabled = true;
        saveButton.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';
    });

    document.querySelectorAll('.settings-nav a').forEach(link => {
        link.addEventListener('click', () => {
            document.querySelectorAll('.settings-nav a').forEach(item => item.classList.remove('active'));
            link.classList.add('active');
        });
    });

    updateLivePreview();
    setImagePreview('logo');
    setImagePreview('banner');
    updateBackgroundImagePreview();

    // Auth background images preview (Login, Register, Reset Password)
    const initAuthBgPreview = (inputId, previewId, imgId, titleId, nameId, removeId, currentLabel, desc) => {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const img = document.getElementById(imgId);
        const title = document.getElementById(titleId);
        const name = document.getElementById(nameId);
        const removeCb = document.getElementById(removeId);
        let objectUrl = null;

        if (!input || !preview || !img) return;

        const updatePreview = () => {
            const file = input.files[0];
            const storedSrc = img.dataset.storedSrc;

            if (objectUrl) {
                URL.revokeObjectURL(objectUrl);
                objectUrl = null;
            }

            if (file) {
                const allowed = ['image/jpeg', 'image/png', 'image/webp'];
                if (!allowed.includes(file.type) || file.size > 5 * 1024 * 1024) {
                    alert('Pilih gambar JPG, PNG, atau WebP dengan ukuran maksimal 5 MB.');
                    input.value = '';
                    updatePreview();
                    return;
                }
                objectUrl = URL.createObjectURL(file);
                img.src = objectUrl;
                title.textContent = 'Gambar baru dipilih';
                name.textContent = file.name;
                preview.classList.add('visible');
                if (removeCb) removeCb.checked = false;
            } else {
                const show = Boolean(storedSrc) && !removeCb?.checked;
                preview.classList.toggle('visible', show);
                if (show) {
                    img.src = storedSrc;
                    title.textContent = currentLabel;
                    name.textContent = desc;
                }
            }
        };

        input.addEventListener('change', updatePreview);
        removeCb?.addEventListener('change', updatePreview);
        updatePreview();
    };

    initAuthBgPreview(
        'loginBgImage', 'loginBgImagePreview', 'loginBgImagePreviewSource',
        'loginBgImagePreviewTitle', 'loginBgImagePreviewName', 'removeLoginBgImage',
        'Gambar latar login saat ini', 'Tampil di halaman login pengguna.'
    );

    initAuthBgPreview(
        'registerBgImage', 'registerBgImagePreview', 'registerBgImagePreviewSource',
        'registerBgImagePreviewTitle', 'registerBgImagePreviewName', 'removeRegisterBgImage',
        'Gambar latar registrasi saat ini', 'Tampil di halaman registrasi pembaca & penulis.'
    );

    initAuthBgPreview(
        'resetPasswordBgImage', 'resetPasswordBgImagePreview', 'resetPasswordBgImagePreviewSource',
        'resetPasswordBgImagePreviewTitle', 'resetPasswordBgImagePreviewName', 'removeResetPasswordBgImage',
        'Gambar latar reset password saat ini', 'Tampil di halaman lupa sandi dan atur ulang kata sandi.'
    );
</script>
</body>
</html>
