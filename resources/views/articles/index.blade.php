<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $category !== '' ? $category : ($searchTerm !== '' ? 'Hasil Pencarian' : 'Berita Terbaru') }} | Derap Serayu</title>
    <meta name="description" content="Jelajahi berita dan cerita terbaru dari Banjarnegara di Derap Serayu.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            color-scheme: light;
            --ink: #073f5e;
            --ink-soft: #476d86;
            --teal: #063f60;
            --cyan: #08add5;
            --cyan-soft: #e8f8fc;
            --line: rgba(255, 255, 255, .78);
        }

        * { box-sizing: border-box; }
        html { min-height: 100%; scroll-behavior: smooth; }
        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font: 15px/1.6 "DM Sans", sans-serif;
            background:
                linear-gradient(180deg, rgba(220, 246, 251, .86), rgba(239, 249, 252, .94) 36%, #f5fbfd 100%),
                url("{{ asset('images/bg-sikunir-home.jpg') }}")
        }

        a { color: inherit; }
        .topbar { height: 38px; background: #063f60; color: #fff; }
        .topbar-inner {
            width: min(1300px, calc(100% - 40px));
            height: 100%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 10px;
            font-weight: 600;
        }
        .topbar-left,
        .topbar-right { display: flex; align-items: center; gap: 17px; }
        .topbar-item { display: flex; align-items: center; gap: 6px; white-space: nowrap; }
        .topbar-item i { color: #72e3fa; }
        .topbar-weather-icon { font-size: 12px; }
        .topbar-divider { width: 1px; height: 13px; background: rgba(255, 255, 255, .25); }
        .topbar-right a { color: #fff; text-decoration: none; opacity: .88; transition: .2s; }
        .topbar-right a:hover { color: #72e3fa; }

        .main-header {
    padding-top: 10px;

    position: relative;

    z-index: 20;
}

.header-card {
    width: min(1300px, calc(100% - 40px));

    min-height: 76px;

    margin: auto;

    padding: 8px 16px;

    border-radius: 24px;

    background:
        rgba(255,255,255,.88);

    border:
        1px solid
        rgba(255,255,255,.95);

    box-shadow:
        0 15px 40px rgba(7,63,94,.10);

    backdrop-filter: blur(18px);

    display: flex;

    align-items: center;

    gap: 25px;

    position: relative;
}


/* =========================================================
   LOGO
========================================================= */

.logo-area {
    display: flex;

    align-items: center;

    gap: 12px;

    flex-shrink: 0;

    text-decoration: none;
}

.logo-area img {
    width: 180px;

    height: auto;

    display: block;
}

.logo-fallback {
    display: none;

    align-items: center;

    gap: 0;

    font-family:
        "Playfair Display",
        serif;

    font-size: 25px;

    font-weight: 800;

    color: #073f5e;
}

.logo-fallback span {
    color: #08add5;
}


/* =========================================================
   NAVIGATION
========================================================= */

.main-nav {
    flex: 1;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 3px;
}

.main-nav a {
    padding:
        11px 13px;

    border-radius: 25px;

    color: #073f5e;

    font-size: 11px;

    font-weight: 700;

    text-decoration: none;

    white-space: nowrap;

    transition: .25s ease;
}

.main-nav a:hover {
    background: #e8f8fc;

    color: #08add5;
}

.nav-dropdown {
    position: relative;
}

.nav-dropdown summary {
    padding: 11px 13px;

    border-radius: 25px;

    color: #073f5e;

    cursor: pointer;

    font-size: 11px;

    font-weight: 700;

    list-style: none;

    white-space: nowrap;

    transition: .25s ease;
}

.nav-dropdown summary::-webkit-details-marker {
    display: none;
}

.nav-dropdown summary:hover,
.nav-dropdown[open] summary {
    background: #e8f8fc;

    color: #08add5;
}

.nav-dropdown-icon {
    margin-right: 6px;

    color: #08add5;
}

.nav-dropdown-chevron {
    margin-left: 4px;

    font-size: 9px;
}

.nav-dropdown-menu {
    position: absolute;

    top: calc(100% + 8px);
    left: 0;

    z-index: 10;

    display: grid;

    min-width: 190px;

    padding: 8px;

    border: 1px solid #e3f0f5;
    border-radius: 14px;

    background: white;

    box-shadow: 0 15px 40px rgba(7, 63, 94, .16);
}

.nav-dropdown .nav-dropdown-menu a {
    padding: 10px 12px;

    border-radius: 9px;
}

.nav-dropdown .nav-dropdown-menu a:hover {
    background: #e8f8fc;
}

.main-nav a.active {
    background: #08add5;

    color: white;

    box-shadow:
        0 8px 20px
        rgba(8,173,213,.25);
}


/* =========================================================
   SEARCH
========================================================= */

.search-box {
    width: 230px;

    height: 40px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    gap: 9px;

    padding:
        0 12px;

    border-radius: 22px;

    background: #f0f7fa;

    color: #8ba2af;
}

.search-area {
    width: 230px;

    flex-shrink: 0;
}

.account-actions {
    position: relative;

    display: flex;

    align-items: center;

    gap: 8px;

    flex-shrink: 0;
}

.account-actions a,
.account-menu summary {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    min-height: 40px;

    padding: 0 13px;

    border: 1px solid #dcecf2;
    border-radius: 22px;

    background: #fff;

    color: #073f5e;

    cursor: pointer;

    font-size: 11px;

    font-weight: 700;

    list-style: none;

    text-decoration: none;

    white-space: nowrap;
}

.account-actions a:hover,
.account-menu summary:hover,
.account-menu[open] summary {
    border-color: #08add5;

    color: #08add5;
}

.account-actions .account-register {
    border-color: #08add5;

    background: #08add5;

    color: #fff;
}

.account-actions .account-register:hover {
    background: #078fb0;

    color: #fff;
}

.account-menu {
    position: relative;
}

.account-menu summary::-webkit-details-marker {
    display: none;
}

.account-menu summary > i:first-child {
    font-size: 14px;
}

.account-menu summary span {
    max-width: 120px;

    overflow: hidden;

    text-overflow: ellipsis;
}

.account-menu .account-dropdown {
    position: absolute;

    top: calc(100% + 8px);
    right: 0;

    z-index: 30;

    display: grid;

    min-width: 210px;

    padding: 8px;

    border: 1px solid #e3f0f5;
    border-radius: 14px;

    background: #fff;

    box-shadow: 0 15px 40px rgba(7, 63, 94, .16);
}

.account-menu .account-dropdown a,
.account-menu .account-dropdown button {
    justify-content: flex-start;

    width: 100%;

    min-height: 40px;

    border: 0;
    border-radius: 9px;

    background: transparent;

    text-align: left;
}

.account-menu .account-dropdown a:hover,
.account-menu .account-dropdown button:hover {
    background: #e8f8fc;
}

.account-menu .account-dropdown form {
    margin: 0;
}

.account-menu .account-dropdown button {
    cursor: pointer;

    font: inherit;
}

.account-dropdown-name {
    padding: 9px 12px 11px;

    overflow: hidden;

    color: #64849b;

    font-size: 11px;

    text-overflow: ellipsis;
}


.search-box i {
    color: #7895a4;

    font-size: 13px;
}

.search-box input {
    width: 100%;

    border: 0;

    outline: 0;

    background: transparent;

    font-family: inherit;

    font-size: 10px;

    color: #073f5e;
}

.search-box input::placeholder {
    color: #9bb0bb;
}

.search-box button {
    padding: 0;

    border: 0;

    background: transparent;

    color: #7895a4;

    cursor: pointer;
}

.search-box button:hover {
    color: #08add5;
}


/* =========================================================
   MENU BUTTON
========================================================= */

.menu-button {
    width: 46px;
    height: 46px;

    flex-shrink: 0;

    border: 0;

    border-radius: 50%;

    background: #063f60;

    color: white;

    cursor: pointer;

    font-size: 17px;

    transition: .25s ease;

    display: none;
}

.menu-button:hover {
    background: #08add5;

    transform: rotate(5deg);
}

        .site-header { position: relative; z-index: 2; padding: 12px 0 0; }
        .header-card {
            width: min(1300px, calc(100% - 40px));
            min-height: 76px;
            margin: auto;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            border: 1px solid var(--line);
            border-radius: 22px;
            background: rgba(255, 255, 255, .9);
            box-shadow: 0 15px 40px rgba(7, 63, 94, .1);
            backdrop-filter: blur(16px);
        }
        .brand { flex: 0 0 auto; display: inline-flex; align-items: center; text-decoration: none; }
        .brand img { display: block; width: 168px; max-height: 54px; object-fit: contain; }
        .brand-name { display: none; font: 800 23px "Playfair Display", serif; color: var(--ink); }
        .brand-name span { color: var(--cyan); }
        .main-nav { display: flex; align-items: center; justify-content: center; gap: 3px; }
        .main-nav > a,
        .nav-dropdown summary {
            padding: 10px 13px;
            border-radius: 22px;
            color: var(--ink);
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: background .2s, color .2s;
        }
        .main-nav > a:hover,
        .main-nav > a.active,
        .nav-dropdown summary:hover,
        .nav-dropdown[open] summary { background: var(--cyan-soft); color: #0789a9; }
        .nav-dropdown { position: relative; }
        .nav-dropdown summary { cursor: pointer; list-style: none; }
        .nav-dropdown summary::-webkit-details-marker { display: none; }
        .nav-dropdown summary i { margin-left: 5px; color: var(--cyan); font-size: 10px; }
        .nav-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            z-index: 5;
            min-width: 190px;
            padding: 8px;
            border: 1px solid #dceef4;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 14px 32px rgba(7, 63, 94, .14);
        }
        .nav-dropdown-menu a {
            display: block;
            padding: 9px 11px;
            border-radius: 9px;
            color: var(--ink);
            font-size: 13px;
            text-decoration: none;
        }
        .nav-dropdown-menu a:hover { background: var(--cyan-soft); color: #0789a9; }
        .account-actions { display: flex; align-items: center; gap: 8px; }
        .account-actions a,
        .account-actions button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 38px;
            padding: 0 13px;
            border: 1px solid #d8edf4;
            border-radius: 22px;
            background: #fff;
            color: var(--ink);
            font: 700 12px "DM Sans", sans-serif;
            text-decoration: none;
            cursor: pointer;
        }
        .account-actions a:hover,
        .account-actions button:hover { border-color: var(--cyan); color: #0789a9; }
        .account-actions .register-link { border-color: var(--cyan); background: var(--cyan); color: #fff; }
        .account-actions .register-link:hover { background: #078eae; color: #fff; }
        .account-actions form { margin: 0; }
        .account-actions .account-email { display: none; }

        main { width: min(1240px, calc(100% - 40px)); margin: 36px auto 76px; }
        .hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 250px;
            padding: clamp(30px, 5vw, 58px);
            display: flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 28px;
            color: #fff;
            background:
                linear-gradient(105deg, rgba(3, 48, 73, .92), rgba(4, 111, 143, .72) 58%, rgba(8, 173, 213, .48)),
                url("{{ asset('images/bg-banjarnegara.jpg') }}") center 48% / cover no-repeat;
            box-shadow: 0 24px 56px rgba(7, 63, 94, .16);
        }
        .hero::after {
            position: absolute;
            z-index: -1;
            right: -75px;
            bottom: -170px;
            width: 390px;
            height: 390px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 50%;
            box-shadow: 0 0 0 34px rgba(255, 255, 255, .06), 0 0 0 68px rgba(255, 255, 255, .04);
            content: "";
        }
        .hero-content { max-width: 700px; }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0 0 13px;
            color: #a5efff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .14em;
            text-transform: uppercase;
        }
        .hero h1 { margin: 0; font: 700 clamp(34px, 5vw, 54px)/1.13 "Playfair Display", serif; }
        .hero-description { max-width: 560px; margin: 13px 0 0; color: rgba(255, 255, 255, .85); font-size: 15px; }

        .search-panel {
            position: relative;
            z-index: 1;
            width: min(900px, calc(100% - 36px));
            margin: 18px auto 0;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, .92);
            border-radius: 18px;
            background: rgba(255, 255, 255, .96);
            box-shadow: 0 16px 42px rgba(7, 63, 94, .14);
            backdrop-filter: blur(14px);
        }
        .search-label { display: block; margin: 0 0 10px 2px; color: var(--ink); font-size: 13px; font-weight: 800; }
        .search { display: flex; gap: 10px; }
        .search-field {
            flex: 1;
            min-width: 0;
            min-height: 50px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 15px;
            border: 1px solid #cfe6f0;
            border-radius: 12px;
            background: #f9fdff;
            transition: border-color .2s, box-shadow .2s;
        }
        .search-field:focus-within { border-color: var(--cyan); box-shadow: 0 0 0 4px rgba(8, 173, 213, .12); }
        .search-field i { color: #148aa8; }
        .search-field input { width: 100%; min-width: 0; border: 0; outline: 0; background: transparent; color: var(--ink); font: 14px "DM Sans", sans-serif; }
        .search-field input::placeholder { color: #829bad; }
        .search button {
            min-width: 112px;
            padding: 0 19px;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(135deg, #08add5, #078bab);
            color: #fff;
            font: 800 13px "DM Sans", sans-serif;
            box-shadow: 0 8px 18px rgba(8, 173, 213, .22);
            cursor: pointer;
            transition: transform .2s, box-shadow .2s;
        }
        .search button:hover { transform: translateY(-1px); box-shadow: 0 11px 22px rgba(8, 173, 213, .3); }
        .search button i { margin-right: 7px; }
        .search-error { margin: 11px 2px 0; color: #b42318; font-size: 13px; font-weight: 600; }
        .search-area {
            width: 230px;

            flex-shrink: 0;
        }
        .search-box i {
            color: #7895a4;

            font-size: 13px;
        }

        .search-box input {
            width: 100%;

            border: 0;

            outline: 0;

            background: transparent;

            font-family: inherit;

            font-size: 10px;

            color: #073f5e;
        }

        .search-box input::placeholder {
            color: #9bb0bb;
        }

        .search-box button {
            padding: 0;

            border: 0;

            background: transparent;

            color: #7895a4;

            cursor: pointer;
        }

        .search-box button:hover {
            color: #08add5;
        }
        .search-box {
            width: 230px;

            height: 40px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            gap: 9px;

            padding:
                0 12px;

            border-radius: 22px;

            background: #f0f7fa;

            color: #8ba2af;
        }

        .search-area {
            width: 230px;

            flex-shrink: 0;
        }
        .content-section { margin-top: 36px; }
        .section-heading { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 18px; }
        .section-heading h2 { margin: 0; font: 700 clamp(23px, 3vw, 30px)/1.25 "Playfair Display", serif; }
        .section-kicker { margin: 0 0 4px; color: #0789a9; font-size: 10px; font-weight: 800; letter-spacing: .15em; text-transform: uppercase; }
        .section-count { color: #66879c; font-size: 12px; }
        .result-bar { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin: 0 0 18px; }
        .result-tags { display: flex; flex-wrap: wrap; gap: 8px; }
        .result-tag { display: inline-flex; align-items: center; gap: 7px; padding: 7px 11px; border: 1px solid #cfeaf2; border-radius: 30px; background: rgba(255, 255, 255, .78); color: #52758a; font-size: 12px; }
        .result-tag strong { color: var(--ink); }
        .clear-link { color: #0789a9; font-size: 12px; font-weight: 700; text-decoration: none; white-space: nowrap; }
        .clear-link:hover { text-decoration: underline; }
        .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 22px; }
        .card {
            min-width: 0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(201, 230, 240, .92);
            border-radius: 19px;
            background: rgba(255, 255, 255, .95);
            color: inherit;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(7, 63, 94, .07);
            transition: transform .22s, box-shadow .22s, border-color .22s;
        }
        .card:hover { transform: translateY(-4px); border-color: #9bddec; box-shadow: 0 17px 36px rgba(7, 63, 94, .13); }
        .card-image { position: relative; overflow: hidden; aspect-ratio: 16 / 9; background: #d8edf4; }
        .card-image img { display: block; width: 100%; height: 100%; object-fit: cover; transition: transform .35s; }
        .card:hover .card-image img { transform: scale(1.04); }
        .category {
            position: absolute;
            left: 14px;
            bottom: 14px;
            padding: 6px 10px;
            border: 1px solid rgba(255, 255, 255, .42);
            border-radius: 30px;
            background: rgba(5, 62, 88, .82);
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
            backdrop-filter: blur(8px);
        }
        .card-body { flex: 1; padding: 17px 18px 16px; display: flex; flex-direction: column; }
        .card h3 { margin: 0; font: 700 20px/1.35 "Playfair Display", serif; }
        .summary { display: -webkit-box; overflow: hidden; margin: 10px 0 16px; color: #64849b; font-size: 13px; line-height: 1.65; -webkit-box-orient: vertical; -webkit-line-clamp: 3; }
        .meta { display: flex; flex-wrap: wrap; align-items: center; gap: 7px; margin-top: auto; color: #7895a8; font-size: 11px; }
        .meta i { color: #08a4c7; }
        .meta-dot { color: #b5cad5; }

        .empty {
            padding: clamp(32px, 6vw, 58px) 20px;
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 22px;
            background: rgba(255, 255, 255, .88);
            text-align: center;
            box-shadow: 0 12px 32px rgba(7, 63, 94, .07);
        }
        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 17px;
            display: grid;
            place-items: center;
            border: 1px solid #c8edf5;
            border-radius: 20px;
            background: linear-gradient(145deg, #e9faff, #f8fdff);
            color: #0798ba;
            font-size: 25px;
        }
        .empty h3 { margin: 0; font: 700 24px "Playfair Display", serif; }
        .empty p { max-width: 510px; margin: 9px auto 19px; color: #6a899e; font-size: 14px; }
        .empty-actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
        .empty-actions a { display: inline-flex; align-items: center; gap: 8px; min-height: 42px; padding: 0 16px; border: 1px solid #cde8f0; border-radius: 30px; background: #fff; color: #087f9d; font-size: 12px; font-weight: 800; text-decoration: none; }
        .empty-actions a.primary { border-color: var(--cyan); background: var(--cyan); color: #fff; }
        .empty-actions a:hover { box-shadow: 0 7px 18px rgba(8, 173, 213, .17); }

        .pagination-wrap { margin-top: 26px; }
        .pagination-wrap nav { display: flex; align-items: center; justify-content: space-between; gap: 14px; }
        .pagination-wrap nav > div:first-child { color: #64849b; font-size: 12px; }
        .pagination-wrap nav > div:last-child > span,
        .pagination-wrap nav > div:last-child > a,
        .pagination-wrap nav a,
        .pagination-wrap nav span[aria-current] {
            min-width: 38px;
            min-height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 11px;
            border: 1px solid #d4eaf1;
            border-radius: 10px;
            background: rgba(255, 255, 255, .92);
            color: #52758a;
            font-size: 12px;
            text-decoration: none;
        }
        .pagination-wrap nav a:hover,
        .pagination-wrap nav span[aria-current] { border-color: var(--cyan); background: var(--cyan); color: #fff; }
        .pagination-wrap svg { width: 16px; height: 16px; }

        .footer {
            position: relative;
            overflow: hidden;
            margin-top: 55px;
            background: #03384f;
            color: #fff;
        }
        .footer-background,
        .footer-overlay { position: absolute; inset: 0; pointer-events: none; }
        .footer-background {
            background: url("{{ asset('images/bg-dieng-home.jpg') }}") center bottom / cover no-repeat;
            opacity: .45;
            transform: scale(1.05);
        }
        .footer-overlay { background: linear-gradient(180deg, rgba(3, 48, 68, .95), rgba(2, 35, 49, .98)); }
        .footer-container { position: relative; z-index: 1; width: min(1300px, calc(100% - 40px)); margin: auto; padding: 60px 0 20px; }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr .8fr .8fr .8fr 1.4fr;
            gap: 45px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, .12);
        }
        .footer-logo img { display: block; width: 180px; height: auto; padding: 0; background: transparent; }
        .footer-description { max-width: 300px; margin: 15px 0 0; color: rgba(255, 255, 255, .57); font-size: 10px; line-height: 1.8; }
        .footer-social { display: flex; gap: 8px; margin-top: 18px; }
        .footer-social a {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, .09);
            color: #fff;
            text-decoration: none;
            transition: .2s;
        }
        .footer-social a:hover { transform: translateY(-3px); background: #08add5; }
        .footer-column h4 { margin: 0 0 17px; font: 16px "Playfair Display", serif; }
        .footer-column a { display: block; width: fit-content; margin-bottom: 10px; color: rgba(255, 255, 255, .65); font-size: 11px; text-decoration: none; transition: .2s; }
        .footer-column a:hover { transform: translateX(3px); color: #72e3fa; }
        .footer-newsletter-label { color: #72e3fa; font-size: 9px; font-weight: 800; letter-spacing: 1.5px; }
        .footer-newsletter h3 { max-width: 280px; margin: 8px 0 0; font: 700 22px/1.25 "Playfair Display", serif; }
        .footer-newsletter h3 span { color: #08add5; }
        .footer-newsletter > p { max-width: 270px; margin: 10px 0 15px; color: rgba(255, 255, 255, .65); font-size: 11px; line-height: 1.6; }
        .newsletter-form {
            display: flex;
            max-width: 290px;
            padding: 4px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 12px;
            background: rgba(255, 255, 255, .08);
        }
        .newsletter-form input { width: 100%; min-width: 0; padding: 9px 10px; border: 0; outline: 0; background: transparent; color: #fff; font: 12px "DM Sans", sans-serif; }
        .newsletter-form input::placeholder { color: rgba(255, 255, 255, .58); }
        .newsletter-form button { width: 35px; height: 35px; flex-shrink: 0; border: 0; border-radius: 9px; background: #08add5; color: #fff; cursor: pointer; }
        .newsletter-feedback { margin: 10px 0 0; color: #a5efff; font-size: 11px; }
        .newsletter-feedback.error { color: #ffb4ab; }
        .footer-quote { padding: 35px 15px; text-align: center; }
        .footer-quote-mark { color: #08add5; font: 43px/25px "Playfair Display", serif; }
        .footer-quote p { max-width: 650px; margin: 5px auto 9px; font: italic 21px/1.5 "Playfair Display", serif; }
        .footer-quote small { color: rgba(255, 255, 255, .35); font-size: 7px; font-weight: 800; letter-spacing: 2px; }
        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, .12);
            color: rgba(255, 255, 255, .62);
            font-size: 10px;
        }
        .footer-bottom-links { display: flex; flex-wrap: wrap; gap: 17px; }
        .footer-bottom-links a { color: rgba(255, 255, 255, .68); text-decoration: none; }
        .footer-bottom-links a:hover { color: #72e3fa; }
        .footer-made strong { color: #72e3fa; }
        .footer-made i { margin-left: 4px; color: #08add5; }

        @media (max-width: 980px) {
            .topbar-right { display: none; }
            .header-card { flex-wrap: wrap; gap: 8px 16px; padding: 12px 16px; }
            .brand img { width: 145px; }
            .main-nav { order: 3; width: 100%; justify-content: flex-start; flex-wrap: wrap; }
            .account-actions { margin-left: auto; }
            .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .footer-grid { grid-template-columns: 1.5fr 1fr 1fr 1fr; }
            .footer-newsletter { grid-column: 1 / -1; }
        }
        @media (max-width: 600px) {
            .topbar-inner, .header-card, main, .footer-container { width: calc(100% - 24px); }
            .topbar-left { gap: 8px; }
            .topbar-item { font-size: 8px; }
            .topbar-item:last-child, .topbar-divider { display: none; }
            .site-header { padding-top: 8px; }
            .header-card { border-radius: 17px; }
            .brand img { width: 132px; }
            .account-actions { gap: 5px; }
            .account-actions a, .account-actions button { min-height: 34px; padding: 0 10px; font-size: 11px; }
            .account-actions .register-link { display: none; }
            .main-nav { gap: 0; overflow: visible; flex-wrap: wrap; }
            .main-nav > a, .nav-dropdown summary { padding: 9px 11px; font-size: 11px; }
            .nav-dropdown-menu { left: auto; right: 0; }
            main { margin-top: 20px; margin-bottom: 48px; }
            .hero { min-height: 220px; padding: 28px 22px 44px; border-radius: 22px; }
            .hero h1 { font-size: clamp(32px, 10vw, 43px); }
            .hero-description { font-size: 13px; }
            .search-panel { width: calc(100% - 22px); margin-top: 14px; padding: 15px; border-radius: 15px; }
            .search { gap: 8px; }
            .search-field { min-height: 46px; padding: 0 11px; }
            .search-field input { font-size: 12px; }
            .search button { min-width: 48px; padding: 0 13px; font-size: 0; }
            .search button i { margin: 0; font-size: 14px; }
            .content-section { margin-top: 29px; }
            .section-heading { align-items: start; flex-direction: column; gap: 4px; }
            .result-bar { align-items: start; flex-direction: column; }
            .grid { grid-template-columns: 1fr; gap: 15px; }
            .card { display: grid; grid-template-columns: 120px minmax(0, 1fr); }
            .card-image { aspect-ratio: auto; min-height: 145px; }
            .category { left: 8px; bottom: 8px; padding: 5px 7px; font-size: 8px; }
            .card-body { padding: 13px; }
            .card h3 { font-size: 16px; }
            .summary { margin: 7px 0 11px; font-size: 12px; -webkit-line-clamp: 2; }
            .meta { font-size: 10px; }
            .empty { padding: 34px 16px; border-radius: 18px; }
            .empty h3 { font-size: 21px; }
            .pagination-wrap nav { align-items: flex-start; flex-direction: column; }
            .pagination-wrap nav > div:last-child { max-width: 100%; overflow-x: auto; }
            .footer-container { padding: 46px 0 20px; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 30px; }
            .footer-brand, .footer-newsletter { grid-column: 1 / -1; }
            .footer-bottom { align-items: center; flex-direction: column; text-align: center; }
            .footer-bottom-links { justify-content: center; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
</head>
<body>
    <div class="topbar">
        <div class="topbar-inner">
            <div class="topbar-left">
                <div class="topbar-item">
                    <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                    Banjarnegara
                </div>
                <div class="topbar-item">
                    <span id="topWeatherIcon" class="topbar-weather-icon" aria-hidden="true">🌤️</span>
                    <span id="topTemperature">--°C</span>
                </div>
                <div class="topbar-divider" aria-hidden="true"></div>
                <div class="topbar-item">
                    <i class="fa-regular fa-calendar" aria-hidden="true"></i>
                    {{ now()->locale('id')->translatedFormat('l, j F Y') }}
                </div>
            </div>
            <div class="topbar-right" aria-label="Tautan layanan dan media sosial">
                <a href="https://ppid.banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">
                    <i class="fa-regular fa-newspaper" aria-hidden="true"></i> PPID
                </a>
                <a href="https://www.instagram.com/mpp.banjarnegara/" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-headset" aria-hidden="true"></i> Layanan Publik
                </a>
                <a href="https://banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-phone" aria-hidden="true"></i> Kontak
                </a>
                <a href="https://www.instagram.com/kabupatenbanjarnegara/" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pemerintah Kabupaten Banjarnegara" title="Instagram">
                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/" target="_blank" rel="noopener noreferrer" aria-label="Facebook Pemerintah Kabupaten Banjarnegara" title="Facebook">
                    <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://www.youtube.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="YouTube Pemerintah Kabupaten Banjarnegara" title="YouTube">
                    <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="https://x.com/pemkab_bna" target="_blank" rel="noopener noreferrer" aria-label="X Pemerintah Kabupaten Banjarnegara" title="X">
                    <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                </a>
                <a href="https://www.tiktok.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="TikTok Pemerintah Kabupaten Banjarnegara" title="TikTok">
                    <i class="fa-brands fa-tiktok" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>

    <header class="main-header">

    <div class="header-card">


        {{-- Logo --}}

        <a
            href="{{ url('/') }}"
            class="logo-area"
        >

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Derap Serayu"
                onerror="
                    this.style.display='none';
                    this.nextElementSibling.style.display='flex';
                "
            >

            <div class="logo-fallback">
                Derap<span>Serayu</span>
            </div>

        </a>


        {{-- Navigation --}}

        <nav class="main-nav" id="mainNavigation">

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ route('articles.index') }}" class="active">
                Berita
            </a>

            <a href="{{ route('about') }}">
                Tentang Kami
            </a>

            <details class="nav-dropdown">
                <summary>
                    <i class="fa-solid fa-water nav-dropdown-icon" aria-hidden="true"></i>
                    Jelajahi
                    <i class="fa-solid fa-chevron-down nav-dropdown-chevron" aria-hidden="true"></i>
                </summary>

                <div class="nav-dropdown-menu">
                    <a href="{{ route('cerita') }}">Cerita & Budaya</a>
                    <a href="{{ route('opini') }}">Opini</a>
                    <a href="{{ route('sosok') }}">Sosok</a>
                    <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                    <a href="{{ route('potensi') }}">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>
            </details>

        </nav>


        {{-- Search --}}

        <div class="search-area">
            <form
                action="{{ route('articles.index') }}"
                method="GET"
                class="search-box"
                role="search"
                aria-label="Cari artikel"
            >
                <button type="submit" aria-label="Cari">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                </button>

                <input
                    type="search"
                    name="q"
                    value="{{ old('q', request('q')) }}"
                    placeholder="Cari berita, topik, atau kata kunci..."
                    aria-label="Cari berita, topik, atau kata kunci"
                    maxlength="100"
                >
            </form>

            @error('q')
                <p class="search-error" role="alert">{{ $message }}</p>
            @enderror
        </div>

        {{-- Akun --}}

        <div class="account-actions">
            @auth
                <details class="account-menu">
                    <summary aria-label="Menu akun {{ auth()->user()->name }}" title="Menu akun">
                        <i class="fa-solid fa-user" aria-hidden="true"></i>
                        <span>{{ auth()->user()->name }}</span>
                        <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
                    </summary>

                    <div class="account-dropdown">
                        <div class="account-dropdown-name">
                            {{ auth()->user()->email }}
                        </div>

                        @if (auth()->user()->role === 'reader')
                            <a href="{{ route('pembaca.profile') }}">
                                <i class="fa-regular fa-user" aria-hidden="true"></i>
                                Profil
                            </a>
                            <a href="{{ route('pembaca.saved.index') }}">
                                <i class="fa-regular fa-bookmark" aria-hidden="true"></i>
                                Artikel Tersimpan
                            </a>
                        @elseif (auth()->user()->role === 'writer')
                            <a href="{{ route('penulis.dashboard') }}">
                                <i class="fa-solid fa-pen-nib" aria-hidden="true"></i>
                                Dasbor Penulis
                            </a>
                        @elseif (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                                Dasbor Admin
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                </details>
            @else
                <a href="{{ route('login') }}" aria-label="Masuk">
                    <i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i>
                    <span>Masuk</span>
                </a>
                <a class="account-register" href="{{ route('register') }}">
                    Daftar
                </a>
            @endauth
        </div>


        {{-- Menu --}}

        <button
            class="menu-button"
            type="button"
            aria-label="Buka menu navigasi"
            aria-expanded="false"
            aria-controls="mainNavigation"
        >
            <i class="fa-solid fa-bars"></i>
        </button>

    </div>

</header>

    <main>
        <section class="hero" aria-labelledby="page-title">
            <div class="hero-content">
                <p class="eyebrow"><i class="fa-solid fa-water" aria-hidden="true"></i> Kabar dari Serayu</p>
                <h1 id="page-title">{{ $category !== '' ? $category : ($searchTerm !== '' ? 'Hasil Pencarian' : 'Artikel Terbit') }}</h1>
                <p class="hero-description">Temukan kabar, gagasan, dan cerita terbaru yang dekat dengan kehidupan warga Banjarnegara.</p>
            </div>
        </section>

        <section class="content-section" aria-labelledby="articles-heading">
            <div class="section-heading">
                <div>
                    <p class="section-kicker">Derap Serayu</p>
                    <h2 id="articles-heading">{{ $searchTerm !== '' || $category !== '' ? 'Jelajahi Hasil' : 'Berita Pilihan untuk Anda' }}</h2>
                </div>
                @if ($articles->isNotEmpty())
                    <span class="section-count">{{ $articles->total() }} artikel tersedia</span>
                @endif
            </div>

            @if ($category !== '' || $searchTerm !== '')
                <div class="result-bar">
                    <div class="result-tags">
                        @if ($category !== '')
                            <span class="result-tag"><i class="fa-solid fa-tag" aria-hidden="true"></i> Kategori: <strong>{{ $category }}</strong></span>
                        @endif
                        @if ($searchTerm !== '')
                            <span class="result-tag"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Hasil pencarian untuk: <strong>{{ $searchTerm }}</strong></span>
                        @endif
                    </div>
                    <a class="clear-link" href="{{ route('articles.index') }}"><i class="fa-solid fa-xmark" aria-hidden="true"></i> Hapus filter</a>
                </div>
            @endif

            @if ($articles->isEmpty())
                <div class="empty">
                    <div class="empty-icon"><i class="fa-regular fa-newspaper" aria-hidden="true"></i></div>
                    <h3>{{ $searchTerm !== '' || $category !== '' ? 'Belum menemukan berita yang cocok' : 'Berita baru sedang disiapkan' }}</h3>
                    <p>{{ $searchTerm !== '' || $category !== '' ? 'Tidak ada artikel yang cocok dengan pencarian atau kategori yang dipilih. Coba kata kunci lain atau hapus filter untuk melihat artikel yang tersedia.' : 'Saat ini belum ada artikel yang diterbitkan. Silakan kembali lagi untuk membaca kabar terbaru dari Banjarnegara.' }}</p>
                    <div class="empty-actions">
                        @if ($searchTerm !== '' || $category !== '')
                            <a class="primary" href="{{ route('articles.index') }}"><i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Lihat semua berita</a>
                        @endif
                        <a href="{{ route('home') }}"><i class="fa-solid fa-house" aria-hidden="true"></i> Kembali ke beranda</a>
                    </div>
                </div>
            @else
                <div class="grid">
                    @foreach ($articles as $article)
                        <a class="card" href="{{ route('articles.show', $article->slug) }}">
                            <div class="card-image">
                                <img
                                    src="{{ $article->cover_image_path ? asset('storage/'.$article->cover_image_path) : asset('images/bg-dieng-home.jpg') }}"
                                    alt="{{ $article->caption ?: $article->title }}"
                                    loading="lazy"
                                >
                                <span class="category">{{ $article->category }}</span>
                            </div>
                            <div class="card-body">
                                <h3>{{ $article->title }}</h3>
                                <p class="summary">{{ $article->summary }}</p>
                                <div class="meta">
                                    <span><i class="fa-regular fa-user" aria-hidden="true"></i> {{ $article->author_name }}</span>
                                    <span class="meta-dot" aria-hidden="true">•</span>
                                    <span><i class="fa-regular fa-calendar" aria-hidden="true"></i> {{ $article->published_at?->format('d M Y') }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="pagination-wrap">{{ $articles->links() }}</div>
            @endif
        </section>
    </main>

    <footer class="footer">
        <div class="footer-background" aria-hidden="true"></div>
        <div class="footer-overlay" aria-hidden="true"></div>
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="footer-logo" aria-label="Derap Serayu, beranda">
                        <img src="{{ asset('images/logo.png') }}" alt="Derap Serayu">
                    </a>
                    <p class="footer-description">
                        Media informasi dan cerita Banjarnegara yang menghadirkan berita, budaya,
                        wisata, potensi, serta kisah dari masyarakat.
                    </p>
                    <div class="footer-social" aria-label="Media sosial Derap Serayu">
                        <a href="https://www.instagram.com/kabupatenbanjarnegara/" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pemerintah Kabupaten Banjarnegara" title="Instagram">
                            <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/" target="_blank" rel="noopener noreferrer" aria-label="Facebook Pemerintah Kabupaten Banjarnegara" title="Facebook">
                            <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.youtube.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="YouTube Pemerintah Kabupaten Banjarnegara" title="YouTube">
                            <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.tiktok.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="TikTok Pemerintah Kabupaten Banjarnegara" title="TikTok">
                            <i class="fa-brands fa-tiktok" aria-hidden="true"></i>
                        </a>
                        <a href="https://x.com/pemkab_bna" target="_blank" rel="noopener noreferrer" aria-label="X Pemerintah Kabupaten Banjarnegara" title="X">
                            <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-column">
                    <h4>Jelajahi</h4>
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('about') }}">Tentang Kami</a>
                    <a href="{{ route('articles.index') }}">Berita</a>
                </div>

                <div class="footer-column">
                    <h4>Informasi</h4>
                    <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                    <a href="{{ route('opini') }}">Opini</a>
                    <a href="{{ route('sosok') }}">Sosok</a>
                    <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                    <a href="{{ route('potensi') }}">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>

                <div class="footer-column">
                    <h4>Layanan</h4>
                    <a href="https://ppid.banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">PPID</a>
                    <a href="https://www.instagram.com/mpp.banjarnegara/" target="_blank" rel="noopener noreferrer">Layanan Publik</a>
                    <a href="https://banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">Kontak</a>
                    <a href="{{ route('login') }}">Masuk</a>
                    <a href="{{ route('register.pembaca') }}">Daftar</a>
                </div>

                <div class="footer-newsletter">
                    <span class="footer-newsletter-label">TETAP TERHUBUNG</span>
                    <h3>Cerita Banjarnegara, <span>langsung ke kamu.</span></h3>
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
                <p>Dari gunung hingga lembah, setiap sudut Banjarnegara punya cerita.</p>
                <small>DERAP SERAYU — BANJARNEGARA</small>
            </div>

            <div class="footer-bottom">
                <div>© {{ date('Y') }} Derap Serayu. Semua hak dilindungi.</div>
                <div class="footer-bottom-links">
                    <a href="{{ route('information.privacy') }}">Kebijakan Privasi</a>
                    <a href="{{ route('information.terms') }}">Syarat &amp; Ketentuan</a>
                    <a href="{{ route('information.editorial') }}">Pedoman Media Siber</a>
                </div>
                <div class="footer-made">
                    Dibuat untuk <strong>Banjarnegara</strong>
                    <i class="fa-solid fa-heart" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </footer>
    <script>
        async function updateTopbarWeather() {
            const weatherIcon = document.getElementById("topWeatherIcon");
            const temperature = document.getElementById("topTemperature");
            const url = "https://api.open-meteo.com/v1/forecast?latitude=-7.2096&longitude=109.9156&current=temperature_2m,weather_code&timezone=Asia%2FJakarta";
            const weatherIcons = new Map([
                [0, "☀️"], [1, "🌤️"], [2, "⛅"], [3, "☁️"],
                [45, "🌫️"], [48, "🌫️"], [51, "🌦️"], [53, "🌦️"],
                [55, "🌧️"], [56, "🌧️"], [57, "🌧️"], [61, "🌧️"],
                [63, "🌧️"], [65, "🌧️"], [66, "🌧️"], [67, "🌧️"],
                [71, "🌨️"], [73, "🌨️"], [75, "❄️"], [77, "🌨️"],
                [80, "🌦️"], [81, "🌧️"], [82, "⛈️"], [85, "🌨️"],
                [86, "🌨️"], [95, "⛈️"], [96, "⛈️"], [99, "⛈️"],
            ]);

            try {
                const response = await fetch(url);

                if (!response.ok) {
                    throw new Error("Weather request failed");
                }

                const data = await response.json();
                const current = data.current;

                if (!current || !Number.isFinite(current.temperature_2m) || !Number.isFinite(current.weather_code)) {
                    throw new Error("Weather response is incomplete");
                }

                weatherIcon.textContent = weatherIcons.get(current.weather_code) || "🌤️";
                temperature.textContent = `${Math.round(current.temperature_2m)}°C`;
            } catch (error) {
                console.error("Unable to load topbar weather", error);
                weatherIcon.textContent = "❔";
                temperature.textContent = "--°C";
            }
        }

        updateTopbarWeather();
    </script>
</body>
</html>
