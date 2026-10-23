
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri Visual | Derap Serayu</title>
    <meta name="description" content="Jelajahi galeri foto alam, budaya, wisata, dan kehidupan masyarakat Banjarnegara di Derap Serayu.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        .topbar {
    height: 38px;

    background: #063f60;

    color: white;
}

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
.topbar-right {
    display: flex;

    align-items: center;

    gap: 17px;
}

.topbar-item {
    display: flex;

    align-items: center;

    gap: 6px;

    white-space: nowrap;
}

.topbar-item i {
    color: #72e3fa;
}

.topbar-weather-icon {
    font-size: 12px;
}

.topbar-divider {
    width: 1px;

    height: 13px;

    background: rgba(255,255,255,.25);
}

.topbar-right a {
    color: white;

    text-decoration: none;

    opacity: .88;

    transition: .2s;
}

.topbar-right a:hover {
    color: #72e3fa;
}

        :root {
            --navy: #063d52;
            --navy-deep: #032f42;
            --teal: #079fc0;
            --teal-light: #46d4e7;
            --green: #164c3d;
            --gold: #f4d28a;
            --text: #16465b;
            --muted: #64818f;
            --white: #ffffff;
            --page: #e9faff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
            overflow-x: hidden;
        }

        body {
            width: 100%;
            min-height: 100vh;
            overflow-x: hidden;
            font-family: "DM Sans", sans-serif;
            color: var(--text);
            background:
                radial-gradient(ellipse at 12% 25%, rgba(255,255,255,.95), transparent 38%),
                radial-gradient(ellipse at 88% 45%, rgba(135,226,244,.32), transparent 36%),
                linear-gradient(180deg, #dff8fc 0%, #f1fcff 45%, #dff7fd 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        img {
            display: block;
            max-width: 100%;
        }

        /* =========================
           HEADER
        ========================= */

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



        /* =========================
           HERO
        ========================= */

        .gallery-hero {
            position: relative;
            isolation: isolate;
            min-height: 320px;
            margin-top: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            border-radius: 28px;
            color: white;
            background-color: #124f5b;
            background-image:
                linear-gradient(90deg,
                    rgba(3, 54, 50, .94) 0%,
                    rgba(3, 69, 72, .76) 43%,
                    rgba(4, 64, 83, .30) 100%),
                url("{{ asset('images/bg-dieng-home.jpg') }}");
            background-position: center 48%;
            background-size: cover;
            box-shadow: 0 18px 42px rgba(13, 76, 90, .10);
        }

        .gallery-hero::before {
            content: "";
            position: absolute;
            z-index: -1;
            width: 330px;
            height: 330px;
            right: -65px;
            top: -115px;
            border: 1px solid rgba(255,255,255,.24);
            border-radius: 50%;
            box-shadow:
                0 0 0 28px rgba(255,255,255,.035),
                0 0 0 58px rgba(255,255,255,.035);
        }

        .hero-content {
            width: min(780px, 75%);
            padding: 48px clamp(28px, 6vw, 88px);
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #64e3f0;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .eyebrow::after {
            content: "";
            width: 40px;
            height: 1px;
            background: currentColor;
            opacity: .8;
        }

        .hero-content h1 {
            max-width: 690px;
            margin-bottom: 16px;
            color: white;
            font-family: "Playfair Display", serif;
            font-size: clamp(40px, 5vw, 68px);
            font-weight: 700;
            line-height: 1.04;
            letter-spacing: -1.5px;
        }

        .hero-content h1 span {
            color: var(--gold);
            font-style: italic;
        }

        .hero-description {
            max-width: 660px;
            color: #e8f8fa;
            font-size: 13px;
            line-height: 1.9;
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-top: 20px;
        }

        .hero-stat {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 11px 16px;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 30px;
            color: #e9fbff;
            background: rgba(0, 139, 165, .35);
            font-size: 11px;
            font-weight: 600;
            backdrop-filter: blur(8px);
        }

        .hero-stat i {
            color: #7be7f1;
            font-size: 14px;
        }

        .hero-quote {
            position: absolute;
            right: 6%;
            top: 50%;
            width: 185px;
            transform: translateY(-50%) rotate(-5deg);
            color: #f4fcff;
            font-family: "Playfair Display", serif;
            font-size: 18px;
            font-style: italic;
            line-height: 1.6;
            text-align: center;
            text-shadow: 0 2px 12px rgba(0,0,0,.2);
        }

        .hero-quote::after {
            content: "";
            display: block;
            width: 55px;
            height: 2px;
            margin: 12px auto 0;
            background: #57d8e9;
        }

        /* =========================
           GALLERY SECTION
        ========================= */

        .gallery-section {
            padding: 26px 0 0;
        }

        .section-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            margin-bottom: 24px;
        }

        .section-title-block {
            max-width: 650px;
        }

        .section-eyebrow {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 5px;
            color: #0789a9;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-eyebrow::after {
            content: "";
            width: 34px;
            height: 1px;
            background: #39b7d1;
        }

        .section-title-block h2 {
            color: #104b65;
            font-family: "Playfair Display", serif;
            font-size: clamp(28px, 3vw, 39px);
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -.7px;
        }

        .section-description {
            max-width: 470px;
            color: #4d788c;
            font-size: 12px;
            line-height: 1.8;
        }

        /* Filter */
        .gallery-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 24px;
        }

        .filter-list {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .filter-button {
            padding: 10px 17px;
            border: 1px solid #d8eaf0;
            border-radius: 30px;
            color: #35687c;
            background: rgba(255,255,255,.66);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .22s ease;
        }

        .filter-button:hover {
            border-color: #14a9c6;
            color: #087b97;
            transform: translateY(-1px);
        }

        .filter-button.active {
            border-color: #104d42;
            color: white;
            background: #104d42;
            box-shadow: 0 5px 14px rgba(16,77,66,.14);
        }

        .gallery-count {
            color: #648697;
            font-size: 11px;
            white-space: nowrap;
        }

        /* =========================
           PHOTO CARDS
        ========================= */

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .photo-card {
            position: relative;
            min-width: 0;
            height: 260px;
            overflow: hidden;
            border-radius: 15px;
            background: #c8e7ee;
            box-shadow: 0 7px 20px rgba(20, 78, 100, .08);
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .photo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(20, 78, 100, .16);
        }

        .photo-card[hidden] {
            display: none !important;
        }

        .photo-link {
            position: absolute;
            inset: 0;
            display: block;
        }

        .photo-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .6s ease;
        }

        .photo-card:hover .photo-image {
            transform: scale(1.07);
        }

        .photo-placeholder {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            color: #e9fbff;
            background: linear-gradient(145deg, #286b78, #073e53);
        }

        .photo-placeholder i {
            font-size: 38px;
            opacity: .75;
        }

        .photo-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 18px 17px;
            color: white;
            background: linear-gradient(
                180deg,
                rgba(0,0,0,0) 25%,
                rgba(0,32,43,.30) 48%,
                rgba(0,37,49,.94) 100%
            );
        }

        .photo-category {
            position: absolute;
            top: 15px;
            left: 15px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            max-width: calc(100% - 30px);
            padding: 8px 12px;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 30px;
            color: white;
            background: rgba(0, 112, 140, .78);
            font-size: 10px;
            font-weight: 700;
            backdrop-filter: blur(8px);
        }

        .photo-category i {
            font-size: 10px;
        }

        .photo-title {
            display: -webkit-box;
            overflow: hidden;
            margin-bottom: 9px;
            color: white;
            font-family: "Playfair Display", serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.35;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .photo-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            color: #c6edf4;
            font-size: 10px;
        }

        .photo-meta span {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .photo-arrow {
            position: absolute;
            right: 15px;
            bottom: 14px;
            width: 27px;
            height: 27px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: white;
            background: #087e98;
            transition: .25s ease;
        }

        .photo-card:hover .photo-arrow {
            background: #0db3d0;
            transform: translateX(3px);
        }

        .empty-state {
            grid-column: 1 / -1;
            padding: 60px 20px;
            border: 1px dashed #badfe9;
            border-radius: 20px;
            text-align: center;
            color: #5b8292;
            background: rgba(255,255,255,.6);
        }

        .empty-state i {
            display: block;
            margin-bottom: 15px;
            color: #43b7ce;
            font-size: 35px;
        }

        .empty-state h3 {
            margin-bottom: 8px;
            color: #174c60;
            font-family: "Playfair Display", serif;
            font-size: 23px;
        }

        .empty-state p {
            font-size: 13px;
        }

        /* Pagination */
        .pagination-wrap {
            display: flex;
            justify-content: center;
            margin-top: 35px;
        }

        .pagination-wrap nav {
            display: flex;
            justify-content: center;
        }

        .pagination-wrap nav > div:first-child {
            display: none;
        }

        .pagination-wrap nav > div:last-child > span,
        .pagination-wrap nav > div:last-child > a {
            margin: 0 3px;
        }

        .pagination-wrap a,
        .pagination-wrap span[aria-current] span,
        .pagination-wrap span[aria-disabled] span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            min-height: 36px;
            padding: 7px 12px;
            border: 1px solid #d8eaf0;
            border-radius: 10px;
            color: #24596c;
            background: rgba(255,255,255,.8);
            font-size: 12px;
        }

        .pagination-wrap span[aria-current] span {
            border-color: #0c7e97;
            color: white;
            background: #087e98;
        }

        .photo-card[hidden] {
            display: none !important;
        }

        .filter-button {
            cursor: pointer;
        }

        .filter-button:focus-visible {
            outline: 3px solid rgba(20, 169, 198, 0.45);
            outline-offset: 3px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            position: relative;

            overflow: hidden;

            margin-top: 55px;

            background: #03384f;

            color: white;
        }

        .footer-background {
            position: absolute;

            inset: 0;

            background:
                url("{{ asset('images/bg-dieng-home.jpg') }}")
                center bottom / cover no-repeat;

            opacity: .45;

            transform: scale(1.05);
        }

        .footer-overlay {
            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    180deg,
                    rgba(3,48,68,.95),
                    rgba(2,35,49,.98)
                );
        }

        .footer-container {
            position: relative;

            z-index: 2;

            width: min(1300px, calc(100% - 40px));

            margin: auto;

            padding:
                60px 0 20px;
        }

        .footer-grid {
            display: grid;

            grid-template-columns:
                1.6fr
                .8fr
                .8fr
                .8fr
                1.4fr;

            gap: 45px;

            padding-bottom: 40px;

            border-bottom:
                1px solid
                rgba(255,255,255,.12);
        }


        /* Footer Brand */

        .footer-logo img {
            width: 180px;

            height: auto;

            display: block;

            padding: 0;

            background: transparent;
        }

        .footer-description {
            max-width: 300px;

            margin-top: 15px;

            color:
                rgba(255,255,255,.57);

            font-size: 10px;

            line-height: 1.8;
        }

        .footer-social {
            display: flex;

            gap: 8px;

            margin-top: 18px;
        }

        .footer-social a,
        .footer-social span {
            width: 34px;
            height: 34px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            color: white;

            text-decoration: none;

            background:
                rgba(255,255,255,.09);

            transition: .2s;
        }

        .footer-social a:hover {
            background: #08add5;

            transform: translateY(-3px);
        }


        /* Footer columns */

        .footer-column h4 {
            margin-bottom: 17px;

            font-family:
                "Playfair Display",
                serif;

            font-size: 16px;
        }

        .footer-column a,
        .footer-column span {
            display: block;

            width: fit-content;

            margin-bottom: 10px;

            color:
                rgba(255,255,255,.53);

            text-decoration: none;

            font-size: 9px;

            transition: .2s;
        }

        .footer-column a:hover {
            color: #72e3fa;

            transform: translateX(3px);
        }


        /* Newsletter */

        .footer-newsletter-label {
            color: #72e3fa;

            font-size: 8px;

            font-weight: 800;

            letter-spacing: 1.5px;
        }

        .footer-newsletter h3 {
            max-width: 280px;

            margin-top: 8px;

            font-family:
                "Playfair Display",
                serif;

            font-size: 22px;

            line-height: 1.25;
        }

        .footer-newsletter h3 span {
            color: #08add5;
        }

        .footer-newsletter p {
            max-width: 270px;

            margin:
                10px 0 15px;

            color:
                rgba(255,255,255,.52);

            font-size: 9px;

            line-height: 1.6;
        }

        .newsletter-form {
            display: flex;

            max-width: 270px;

            padding: 4px;

            border-radius: 12px;

            background:
                rgba(255,255,255,.08);

            border:
                1px solid
                rgba(255,255,255,.12);
        }

        .newsletter-form input {
            width: 100%;

            border: 0;

            outline: 0;

            background: transparent;

            padding:
                9px 10px;

            color: white;

            font-family: inherit;

            font-size: 9px;
        }

        .newsletter-form input::placeholder {
            color:
                rgba(255,255,255,.38);
        }

        .newsletter-form button {
            width: 35px;
            height: 35px;

            flex-shrink: 0;

            border: 0;

            border-radius: 9px;

            background: #08add5;

            color: white;

            cursor: pointer;
        }


        /* Footer Quote */

        .footer-quote {
            text-align: center;

            padding:
                35px 15px;
        }

        .footer-quote-mark {
            color: #08add5;

            font-family:
                "Playfair Display",
                serif;

            font-size: 43px;

            line-height: 25px;
        }

        .footer-quote p {
            max-width: 650px;

            margin:
                5px auto 9px;

            font-family:
                "Playfair Display",
                serif;

            font-size: 21px;

            font-style: italic;

            line-height: 1.5;
        }

        .footer-quote small {
            color:
                rgba(255,255,255,.35);

            font-size: 7px;

            font-weight: 800;

            letter-spacing: 2px;
        }


        /* Footer Bottom */

        .footer-bottom {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding-top: 20px;

            border-top:
                1px solid
                rgba(255,255,255,.08);

            color:
                rgba(255,255,255,.37);

            font-size: 8px;
        }

        .footer-bottom-links {
            display: flex;

            gap: 17px;
        }

        .footer-bottom-links a,
        .footer-bottom-links span {
            color:
                rgba(255,255,255,.42);

            text-decoration: none;
        }

        .footer-bottom-links a:hover {
            color: #72e3fa;
        }

        .footer-made strong {
            color: #72e3fa;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1180px) {
            .header-inner {
                width: calc(100% - 36px);
                gap: 12px;
            }

            .main-nav a {
                padding: 12px 10px;
                font-size: 11px;
            }

            .header-search {
                width: 190px;
            }

            .gallery-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .hero-quote {
                right: 4%;
                width: 150px;
                font-size: 15px;
            }

            .hero-content {
                width: 80%;
            }
        }

        @media (max-width: 900px) {
            .header-inner {
                min-height: 72px;
            }

            .mobile-menu {
                display: grid;
                place-items: center;
                flex-shrink: 0;
            }

            .main-nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                display: none;
                flex-direction: column;
                align-items: stretch;
                padding: 15px 24px 20px;
                background: #063d52;
                box-shadow: 0 12px 18px rgba(0,0,0,.12);
            }

            .main-nav.open {
                display: flex;
            }

            .main-nav a {
                padding: 13px 15px;
            }

            .header-actions {
                margin-left: auto;
            }

            .header-search {
                width: 190px;
            }

            .account-link {
                padding: 11px;
            }

            .account-link .account-name,
            .account-link .fa-chevron-down {
                display: none;
            }

            .page-container {
                width: calc(100% - 32px);
            }

            .gallery-hero {
                min-height: 330px;
            }

            .hero-quote {
                display: none;
            }

            .hero-content {
                width: 100%;
                padding: 42px 35px;
            }

            .section-top {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .section-description {
                max-width: 650px;
            }

            .footer-inner {
                justify-content: center;
                text-align: center;
            }

            .footer-brand,
            .footer-links,
            .footer-socials {
                justify-content: center;
            }

            .footer-motto {
                padding-left: 0;
                border-left: 0;
                text-align: center;
            }
        }

        @media (max-width: 600px) {
            .header-inner {
                width: calc(100% - 24px);
                min-height: 66px;
                gap: 10px;
            }

            .brand-mark {
                width: 36px;
                height: 36px;
            }

            .brand-mark i {
                font-size: 17px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-caption {
                font-size: 7px;
            }

            .header-search {
                display: none;
            }

            .account-link {
                width: 38px;
                height: 38px;
                justify-content: center;
                padding: 0;
            }

            .page-container {
                width: calc(100% - 20px);
            }

            .gallery-page {
                padding-top: 3px;
                padding-bottom: 45px;
            }

            .gallery-hero {
                min-height: 355px;
                margin-top: 7px;
                border-radius: 20px;
                background-position: center;
            }

            .hero-content {
                padding: 34px 23px;
            }

            .eyebrow {
                font-size: 9px;
                letter-spacing: 1.8px;
            }

            .hero-content h1 {
                font-size: clamp(37px, 10vw, 49px);
                letter-spacing: -.8px;
            }

            .hero-description {
                font-size: 12px;
                line-height: 1.75;
            }

            .hero-stat {
                padding: 9px 11px;
                font-size: 10px;
            }

            .gallery-section {
                padding-top: 25px;
            }

            .section-title-block h2 {
                font-size: 29px;
            }

            .section-description {
                font-size: 12px;
            }

            .gallery-toolbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .filter-list {
                gap: 7px;
            }

            .filter-button {
                padding: 9px 12px;
                font-size: 10px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .photo-card {
                height: 220px;
                border-radius: 12px;
            }

            .photo-overlay {
                padding: 12px 10px;
            }

            .photo-category {
                top: 9px;
                left: 8px;
                max-width: calc(100% - 16px);
                padding: 6px 8px;
                font-size: 9px;
            }

            .photo-title {
                font-size: 13px;
                line-height: 1.35;
            }

            .photo-meta {
                gap: 7px;
                font-size: 9px;
            }

            .photo-arrow {
                display: none;
            }

            .footer-inner {
                width: calc(100% - 32px);
                gap: 20px;
                padding: 30px 0;
            }

            .footer-links {
                gap: 15px;
            }

            .footer-motto {
                font-size: 12px;
            }
        }

        @media (max-width: 370px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .photo-card {
                height: 245px;
            }

            .hero-stats {
                gap: 6px;
            }
        }

        
/* =========================================================
   PERBAIKAN LAYOUT GALERI DERAP SERAYU
   Tambahkan di bagian paling bawah CSS yang sudah ada
========================================================= */

/* Konten utama */
.gallery-page {
    width: 100%;
    padding: 0 0 55px;
}

.page-container {
    width: min(1300px, calc(100% - 40px));
    margin: 0 auto;
    min-width: 0;
}

/* Hero: tidak terlalu tinggi dan tidak mepet ke tepi */
.gallery-hero {
    width: 100%;
    min-height: 300px;
    margin: 12px auto 0;
    border-radius: 26px;
}

.hero-content {
    width: min(780px, 75%);
    padding: 38px clamp(28px, 5vw, 68px);
}

.hero-content h1 {
    margin-bottom: 12px;
    font-size: clamp(38px, 4.5vw, 60px);
    line-height: 1.12;
}

.hero-description {
    max-width: 620px;
    line-height: 1.8;
}

.hero-stats {
    margin-top: 16px;
}

/* Bagian judul galeri */
.gallery-section {
    padding-top: 34px;
}

.section-top {
    align-items: center;
    gap: 28px;
    margin-bottom: 22px;
}

.section-title-block {
    flex: 1 1 55%;
    min-width: 0;
}

.section-title-block h2 {
    line-height: 1.25;
    overflow-wrap: break-word;
}

.section-description {
    flex: 0 1 430px;
    margin: 0;
}

/* Filter kategori */
.gallery-toolbar {
    align-items: center;
    gap: 14px 20px;
    margin-bottom: 22px;
}

.filter-list {
    flex: 1 1 auto;
    min-width: 0;
    gap: 8px;
}

.filter-button {
    min-height: 38px;
    white-space: nowrap;
}

.gallery-count {
    flex-shrink: 0;
}

/* Kartu foto */
.gallery-grid {
    width: 100%;
    align-items: stretch;
    gap: 18px;
}

.photo-card {
    width: 100%;
    height: 260px;
    min-height: 0;
}

.photo-link {
    overflow: hidden;
    border-radius: inherit;
}

.photo-overlay {
    pointer-events: none;
}

.photo-category {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.photo-title {
    overflow-wrap: anywhere;
}

.photo-meta {
    padding-right: 24px;
}

/* Keadaan galeri kosong */
.empty-state {
    min-width: 0;
    width: 100%;
    box-sizing: border-box;
}

#filterEmpty {
    display: none;
}

/* Pagination */
.pagination-wrap {
    width: 100%;
    overflow-x: auto;
    padding: 2px 0 6px;
}

.pagination-wrap nav {
    max-width: 100%;
}

.pagination-wrap nav > div:last-child {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 5px;
}

/* Footer: pertahankan desain, rapikan proporsi kolom */
.footer-container {
    width: min(1300px, calc(100% - 40px));
}

.footer-grid {
    grid-template-columns:
        minmax(220px, 1.5fr)
        minmax(100px, .7fr)
        minmax(120px, .9fr)
        minmax(100px, .7fr)
        minmax(220px, 1.3fr);
    gap: 28px;
}

.footer-brand,
.footer-column,
.footer-newsletter {
    min-width: 0;
}

.footer-newsletter h3,
.footer-newsletter p {
    overflow-wrap: break-word;
}

.footer-bottom {
    flex-wrap: wrap;
}

/* =========================================================
   TABLET
========================================================= */
@media (max-width: 1100px) {
    .header-card {
        gap: 12px;
        padding: 10px 14px;
    }

    .logo-area img {
        width: 145px;
    }

    .main-nav {
        gap: 0;
    }

    .main-nav a,
    .nav-dropdown summary {
        padding: 10px 8px;
        font-size: 10px;
    }

    .search-area {
        width: 180px;
    }

    .search-box {
        width: 100%;
    }

    .account-actions a,
    .account-menu summary {
        padding: 0 10px;
        font-size: 10px;
    }

    .gallery-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .footer-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 30px;
    }

    .footer-brand {
        grid-column: span 1;
    }

    .footer-newsletter {
        grid-column: span 2;
    }
}

/* =========================================================
   TABLET KECIL / NAVIGASI MOBILE
========================================================= */
@media (max-width: 900px) {
    .header-card {
        width: calc(100% - 32px);
        min-height: 70px;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        border-radius: 20px;
    }

    .logo-area img {
        width: 145px;
    }

    .menu-button {
        display: inline-grid;
        place-items: center;
        width: 42px;
        height: 42px;
    }

    .main-nav {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        z-index: 50;
        display: none;
        align-items: stretch;
        flex-direction: column;
        padding: 12px;
        border: 1px solid #dcecf2;
        border-radius: 18px;
        background: rgba(255, 255, 255, .98);
        box-shadow: 0 15px 35px rgba(7, 63, 94, .15);
    }

    .main-nav.open {
        display: flex;
    }

    .main-nav > a,
    .nav-dropdown summary {
        display: block;
        width: 100%;
        padding: 12px 14px;
        border-radius: 12px;
        font-size: 12px;
    }

    .nav-dropdown-menu {
        position: static;
        min-width: 0;
        margin-top: 4px;
        box-shadow: none;
        background: #f5fbfd;
    }

    .search-area {
        display: none;
    }

    .account-actions {
        margin-left: auto;
    }

    .account-menu summary span {
        max-width: 100px;
    }

    .page-container {
        width: calc(100% - 32px);
    }

    .gallery-hero {
        min-height: 290px;
        border-radius: 22px;
    }

    .hero-content {
        width: 100%;
        max-width: 700px;
        padding: 35px 30px;
    }

    .hero-quote {
        display: none;
    }

    .section-top {
        align-items: flex-start;
        flex-direction: column;
        gap: 10px;
    }

    .section-description {
        max-width: 650px;
        flex-basis: auto;
    }

    .footer-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 28px;
    }

    .footer-newsletter {
        grid-column: auto;
    }

    .footer-bottom {
        align-items: flex-start;
        flex-direction: column;
        gap: 14px;
    }
}

/* =========================================================
   PONSEL
========================================================= */
@media (max-width: 600px) {
    .topbar {
        height: auto;
        min-height: 36px;
    }

    .topbar-inner {
        width: calc(100% - 24px);
        min-height: 36px;
        gap: 10px;
    }

    .topbar-left {
        gap: 10px;
        flex-wrap: wrap;
    }

    .topbar-right {
        display: none;
    }

    .topbar-item {
        font-size: 9px;
    }

    .main-header {
        padding-top: 8px;
    }

    .header-card {
        width: calc(100% - 24px);
        min-height: 64px;
        padding: 8px 12px;
        border-radius: 17px;
    }

    .logo-area img {
        width: 125px;
    }

    .account-actions a,
    .account-menu summary {
        min-height: 36px;
        padding: 0 10px;
    }

    .account-actions a span,
    .account-menu summary span,
    .account-menu summary > i:last-child {
        display: none;
    }

    .account-actions .account-register {
        display: none;
    }

    .menu-button {
        width: 38px;
        height: 38px;
    }

    .page-container {
        width: calc(100% - 24px);
    }

    .gallery-page {
        padding-bottom: 35px;
    }

    .gallery-hero {
        min-height: 0;
        margin-top: 10px;
        border-radius: 18px;
        background-position: center;
    }

    .hero-content {
        padding: 30px 22px;
    }

    .eyebrow {
        margin-bottom: 12px;
        font-size: 9px;
        letter-spacing: 1.6px;
    }

    .hero-content h1 {
        margin-bottom: 12px;
        font-size: clamp(35px, 9vw, 47px);
        line-height: 1.12;
        letter-spacing: -.7px;
    }

    .hero-description {
        font-size: 12px;
        line-height: 1.75;
    }

    .hero-stats {
        gap: 7px;
        margin-top: 15px;
    }

    .hero-stat {
        padding: 9px 11px;
        font-size: 10px;
    }

    .gallery-section {
        padding-top: 27px;
    }

    .section-top {
        margin-bottom: 18px;
    }

    .section-title-block h2 {
        font-size: clamp(25px, 7vw, 31px);
    }

    .section-description {
        font-size: 12px;
        line-height: 1.75;
    }

    .gallery-toolbar {
        align-items: flex-start;
        flex-direction: column;
        margin-bottom: 17px;
    }

    .filter-list {
        width: 100%;
        gap: 7px;
    }

    .filter-button {
        min-height: 35px;
        padding: 8px 12px;
        font-size: 10px;
    }

    .gallery-count {
        font-size: 10px;
    }

    .gallery-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
    }

    .photo-card {
        height: 215px;
        border-radius: 12px;
    }

    .photo-overlay {
        padding: 12px 10px;
    }

    .photo-category {
        top: 9px;
        left: 8px;
        max-width: calc(100% - 16px);
        padding: 6px 8px;
        font-size: 9px;
    }

    .photo-title {
        margin-bottom: 7px;
        font-size: 13px;
        line-height: 1.35;
    }

    .photo-meta {
        gap: 6px;
        padding-right: 0;
        font-size: 9px;
    }

    .photo-arrow {
        display: none;
    }

    .pagination-wrap {
        margin-top: 25px;
    }

    .footer {
        margin-top: 35px;
    }

    .footer-container {
        width: calc(100% - 32px);
        padding-top: 38px;
    }

    .footer-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 25px 18px;
        padding-bottom: 28px;
    }

    .footer-brand {
        grid-column: 1 / -1;
    }

    .footer-logo img {
        width: 155px;
    }

    .footer-description {
        max-width: 360px;
    }

    .footer-newsletter {
        grid-column: 1 / -1;
    }

    .footer-quote {
        padding: 28px 8px;
    }

    .footer-quote p {
        font-size: 17px;
    }

    .footer-bottom {
        font-size: 9px;
        overflow-wrap: anywhere;
    }

    .footer-bottom-links {
        flex-wrap: wrap;
        gap: 10px 15px;
    }
}

/* Ponsel sangat kecil */
@media (max-width: 370px) {
    .gallery-grid {
        grid-template-columns: 1fr;
    }

    .photo-card {
        height: 245px;
    }

    .hero-content {
        padding: 27px 18px;
    }

    .hero-content h1 {
        font-size: 35px;
    }

    .hero-stat {
        padding: 8px 9px;
        font-size: 9px;
    }
}

    </style>
</head>

<body>

<div class="topbar">

    <div class="topbar-inner">

        <div class="topbar-left">

            <div class="topbar-item">
                <i class="fa-solid fa-location-dot"></i>
                Banjarnegara
            </div>

            <div class="topbar-item">
                <span id="topWeatherIcon" class="topbar-weather-icon" aria-hidden="true">🌤️</span>
                <span id="topTemperature">
                    --°C
                </span>
            </div>

            <div class="topbar-divider"></div>

            <div class="topbar-item">

                <i class="fa-regular fa-calendar"></i>

                {{ now()->locale('id')->translatedFormat('l, j F Y') }}

            </div>

        </div>


        <div class="topbar-right">

            <a
                href="https://ppid.banjarnegarakab.go.id/"
                target="_blank"
                rel="noopener noreferrer"
            >
                <i class="fa-regular fa-newspaper"></i>
                PPID
            </a>

            <a
                href="https://www.instagram.com/mpp.banjarnegara/"
                target="_blank"
                rel="noopener noreferrer"
            >
                <i class="fa-solid fa-headset"></i>
                Layanan Publik
            </a>

            <a
                href="https://banjarnegarakab.go.id/"
                target="_blank"
                rel="noopener noreferrer"
            >
                <i class="fa-solid fa-phone"></i>
                Kontak
            </a>

            <a
                href="https://www.instagram.com/kabupatenbanjarnegara/"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Instagram Pemerintah Kabupaten Banjarnegara"
                title="Instagram"
            >
                <i class="fa-brands fa-instagram" aria-hidden="true"></i>
            </a>

            <a
                href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Facebook Pemerintah Kabupaten Banjarnegara"
                title="Facebook"
            >
                <i class="fa-brands fa-facebook" aria-hidden="true"></i>
            </a>

            <a
                href="https://www.youtube.com/@pemkabbanjarnegara"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="YouTube Pemerintah Kabupaten Banjarnegara"
                title="YouTube"
            >
                <i class="fa-brands fa-youtube" aria-hidden="true"></i>
            </a>

            <a
                href="https://x.com/pemkab_bna"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="X Pemerintah Kabupaten Banjarnegara"
                title="X"
            >
                <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
            </a>

            <a
                href="https://www.tiktok.com/@pemkabbanjarnegara"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="TikTok Pemerintah Kabupaten Banjarnegara"
                title="TikTok"
            >
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

            <a href="{{ route('articles.index') }}">
                Berita
            </a>

            <a href="{{ route('about') }}">
                Tentang Kami
            </a>

            <a href="{{ route('galeri') }}" class="active">
                Galeri
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

    {{-- ================= MAIN CONTENT ================= --}}
    <main class="gallery-page">
        <div class="page-container">

            {{-- HERO --}}
            <section class="gallery-hero">
                <div class="hero-content">
                    <div class="eyebrow">Galeri Derap Serayu</div>

                    <h1>
                        Jejak Visual<br>
                        <span>Banjarnegara</span>
                    </h1>

                    <p class="hero-description">
                        Koleksi foto yang merekam keindahan alam, budaya, kehidupan masyarakat,
                        dan cerita menarik dari setiap sudut Banjarnegara, diambil dari
                        artikel-artikel yang telah terbit.
                    </p>

                    <div class="hero-stats">
                        <span class="hero-stat">
                            <i class="fa-solid fa-camera"></i>
                            {{ $artikels->total() }} Foto
                        </span>

                        <span class="hero-stat">
                            <i class="fa-regular fa-newspaper"></i>
                            {{ $artikels->total() }} Artikel
                        </span>

                        <span class="hero-stat">
                            <i class="fa-solid fa-location-dot"></i>
                            Banjarnegara
                        </span>
                    </div>
                </div>

                <div class="hero-quote">
                    “Setiap gambar adalah cerita, setiap sudut adalah Banjarnegara.”
                </div>
            </section>

            {{-- GALERI --}}
            <section class="gallery-section" id="koleksi-galeri">

                <div class="section-top">
                    <div class="section-title-block">
                        <div class="section-eyebrow">Kumpulan Galeri</div>
                        <h2>Jelajahi Keindahan Banjarnegara</h2>
                    </div>
                </div>

                <div class="gallery-toolbar">
                    <div class="filter-list" aria-label="Filter kategori galeri">
                        <button class="filter-button active" type="button" data-filter="all">Semua</button>
                        <button class="filter-button" type="button" data-filter="budaya">Cerita &amp;Budaya</button>
                        <button class="filter-button" type="button" data-filter="opini">Opini</button>
                        <button class="filter-button" type="button" data-filter="sosok">Sosok</button>
                        <button class="filter-button" type="button" data-filter="sudut-kota">Sudut Kota</button>
                        <button class="filter-button" type="button" data-filter="potensi">Potensi</button>
                        <button class="filter-button" type="button" data-filter="teknologi">Teknologi</button>
                        <button class="filter-button" type="button" data-filter="humor">Humor</button>
                    </div>

                    <div class="gallery-count" id="galleryCount" aria-live="polite">
                        {{ $artikels->total() }} foto artikel
                    </div>
                </div>

                <div class="gallery-grid" id="galleryGrid">

                    @forelse ($artikels as $artikel)
                        @php
                            $kategoriArtikel = $artikel->category->name
                                ?? $artikel->category_name
                                ?? (is_string($artikel->category ?? null) ? $artikel->category : 'Cerita');

                            $kategoriLower = \Illuminate\Support\Str::lower(trim($kategoriArtikel));

                            if (
                                str_contains($kategoriLower, 'budaya') ||
                                str_contains($kategoriLower, 'cerita')
                            ) {
                                $kategoriFilter = 'budaya';
                                $kategoriIkon = 'fa-masks-theater';
                            } elseif (str_contains($kategoriLower, 'opini')) {
                                $kategoriFilter = 'opini';
                                $kategoriIkon = 'fa-comments';
                            } elseif (str_contains($kategoriLower, 'sosok')) {
                                $kategoriFilter = 'sosok';
                                $kategoriIkon = 'fa-user-group';
                            } elseif (
                                str_contains($kategoriLower, 'sudut kota') ||
                                str_contains($kategoriLower, 'sudut-kota') ||
                                str_contains($kategoriLower, 'sudut_kota') 
                            ) {
                                $kategoriFilter = 'sudut-kota';
                                $kategoriIkon = 'fa-city';
                            } elseif (
                                str_contains($kategoriLower, 'potensi') || 
                                str_contains($kategoriLower, 'ekonomi')
                            ) {
                                $kategoriFilter = 'potensi';
                                $kategoriIkon = 'fa-chart-line';
                            } elseif (str_contains($kategoriLower, 'teknologi')) {
                                $kategoriFilter = 'teknologi';
                                $kategoriIkon = 'fa-microchip';
                            } elseif (str_contains($kategoriLower, 'humor')) {
                                $kategoriFilter = 'humor';
                                $kategoriIkon = 'fa-face-laugh';
                            } else {
                                $kategoriFilter = 'lainnya';
                                $kategoriIkon = 'fa-images';
                            }

                            $tanggalArtikel = $artikel->published_at ?? $artikel->created_at;
                        @endphp

                        <article class="photo-card" data-category="{{ $kategoriFilter }}">
                            <a
                                class="photo-link"
                                href="{{ route('articles.show', $artikel->slug) }}"
                                aria-label="Baca artikel {{ $artikel->title }}"
                            >
                                @if ($artikel->cover_image_path)
                                    <img
                                        class="photo-image"
                                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($artikel->cover_image_path) }}"
                                        alt="{{ $artikel->title }}"
                                        loading="lazy"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
                                    >
                                    <div class="photo-placeholder" style="display:none">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                @else
                                    <div class="photo-placeholder">
                                        <i class="fa-regular fa-image"></i>
                                    </div>
                                @endif

                                <div class="photo-overlay">
                                    <span class="photo-category">
                                        <i class="fa-solid {{ $kategoriIkon }}"></i>
                                        {{ $kategoriArtikel }}
                                    </span>

                                    <h3 class="photo-title">{{ $artikel->title }}</h3>

                                    <div class="photo-meta">
                                        <span>
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $tanggalArtikel ? \Illuminate\Support\Carbon::parse($tanggalArtikel)->translatedFormat('d M Y') : 'Derap Serayu' }}
                                        </span>

                                        <span>
                                            <i class="fa-regular fa-eye"></i>
                                            Visual cerita
                                        </span>
                                    </div>

                                    <span class="photo-arrow">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </span>
                                </div>
                            </a>
                        </article>

                    @empty
                        <div class="empty-state" id="emptyState">
                            <i class="fa-regular fa-images"></i>
                            <h3>Galeri sedang disiapkan</h3>
                            <p>Foto akan tampil di sini setelah artikel dengan gambar sampul diterbitkan.</p>
                        </div>
                    @endforelse

                    <div class="empty-state" id="filterEmpty" style="display:none">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <h3>Belum ada foto di kategori ini</h3>
                        <p>Coba pilih kategori lainnya untuk melihat koleksi visual.</p>
                    </div>

                </div>

                @if (method_exists($artikels, 'links'))
                    <div class="pagination-wrap">
                        {{ $artikels->links() }}
                    </div>
                @endif

            </section>
        </div>
    </main>

    {{-- ================= FOOTER ================= --}}
    <footer class="footer">


    <div class="footer-background"></div>

    <div class="footer-overlay"></div>

    <div class="footer-container">


        {{-- FOOTER GRID --}}

        <div class="footer-grid">


            {{-- BRAND --}}

            <div class="footer-brand">

                <a
                    href="{{ url('/') }}"
                    class="footer-logo"
                >

                    <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Derap Serayu"
                    onerror="
                        this.style.display='none';
                        this.nextElementSibling.style.display='flex';
                    "
                >

                </a>


                <p class="footer-description">

                    Media informasi dan cerita Banjarnegara
                    yang menghadirkan berita, budaya,
                    wisata, potensi, serta kisah dari
                    masyarakat.

                </p>


                <div class="footer-social">

                    <a
                        href="https://www.instagram.com/kabupatenbanjarnegara/"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Instagram Pemerintah Kabupaten Banjarnegara"
                        title="Instagram"
                    >
                        <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                    </a>

                    <a
                        href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Facebook Pemerintah Kabupaten Banjarnegara"
                        title="Facebook"
                    >
                        <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a
                        href="https://www.youtube.com/@pemkabbanjarnegara"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="YouTube Pemerintah Kabupaten Banjarnegara"
                        title="YouTube"
                    >
                        <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                    </a>

                    <a
                        href="https://www.tiktok.com/@pemkabbanjarnegara"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="TikTok Pemerintah Kabupaten Banjarnegara"
                        title="TikTok"
                    >
                        <i class="fa-brands fa-tiktok" aria-hidden="true"></i>
                    </a>

                    <a
                        href="https://x.com/pemkab_bna"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="X Pemerintah Kabupaten Banjarnegara"
                        title="X"
                    >
                        <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                    </a>

                </div>

            </div>



            {{-- JELAJAHI --}}

            <div class="footer-column">

                <h4>
                    Jelajahi
                </h4>

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <a href="{{ route('about') }}">
                    Tentang Kami
                </a>

                <a href="{{ route('articles.index') }}">
                    Berita
                </a>

            </div>



            {{-- INFORMASI --}}

            <div class="footer-column">

                <h4>
                    Informasi
                </h4>

                <a href="{{ route('cerita') }}">
                    Cerita & Budaya
                </a>

                <a href="{{ route('opini') }}">
                    Opini
                </a>

                <a href="{{ route('sosok') }}">
                    Sosok
                </a>

                <a href="{{ route('sudut-kota') }}">
                    Sudut Kota
                </a>

                <a href="{{ route('potensi') }}">
                    Potensi
                </a>

                <a href="{{ route('teknologi') }}">
                    Teknologi
                </a>

                <a href="{{ route('humor') }}">
                    Humor
                </a>

            </div>



            {{-- LAYANAN --}}

            <div class="footer-column">

                <h4>
                    Layanan
                </h4>

                <a
                    href="https://ppid.banjarnegarakab.go.id/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    PPID
                </a>

                <a
                    href="https://www.instagram.com/mpp.banjarnegara/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Layanan Publik
                </a>

                <a
                    href="https://banjarnegarakab.go.id/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Kontak
                </a>

                <a href="{{ route('login') }}">
                    Masuk
                </a>

                <a href="{{ route('register') }}">
                    Daftar
                </a>

            </div>



            {{-- NEWSLETTER --}}

            <div class="footer-newsletter">

                <span class="footer-newsletter-label">
                    TETAP TERHUBUNG
                </span>

                <h3>

                    Cerita Banjarnegara,
                    <span>
                        langsung ke kamu.
                    </span>

                </h3>

                <p>

                    Dapatkan informasi dan cerita terbaru
                    seputar Banjarnegara.

                </p>


                <form
                    action="{{ route('newsletter.subscribe') }}"
                    method="POST"
                    class="newsletter-form"
                >

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

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </form>

                @if (session('newsletterStatus'))
                    <p class="newsletter-feedback" role="status">
                        {{ session('newsletterStatus') }}
                    </p>
                @endif

                @error('email')
                    <p class="newsletter-feedback error" role="alert">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>



        {{-- QUOTE --}}

        <div class="footer-quote">

            <div class="footer-quote-mark">
                “
            </div>

            <p>

                Dari gunung hingga lembah,
                setiap sudut Banjarnegara
                punya cerita.

            </p>

            <small>
                DERAP SERAYU — BANJARNEGARA
            </small>

        </div>



        {{-- BOTTOM --}}

        <div class="footer-bottom">

            <div>

                © {{ date('Y') }}
                Derap Serayu.
                Semua hak dilindungi.

            </div>


            <div class="footer-bottom-links">

                <a href="{{ route('information.privacy') }}">
                    Kebijakan Privasi
                </a>

                <a href="{{ route('information.terms') }}">
                    Syarat & Ketentuan
                </a>

                <a href="{{ route('information.editorial') }}">
                    Pedoman Media Siber
                </a>

            </div>


            <div class="footer-made">

                Dibuat untuk

                <strong>
                    Banjarnegara
                </strong>

                <i class="fa-solid fa-heart"></i>

            </div>

        </div>

    </div>

</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll(
            '.filter-button[data-filter]'
        );

        const photoCards = document.querySelectorAll(
            '.photo-card[data-category]'
        );

        const filterEmpty = document.getElementById('filterEmpty');
        const galleryCount = document.getElementById('galleryCount');
        const initialEmpty = document.getElementById('emptyState');

        function filterGallery(selectedCategory) {
            let visibleCount = 0;

            photoCards.forEach(function (card) {
                // Normalisasi agar tidak terpengaruh spasi atau kapital.
                const cardCategory = (
                    card.dataset.category || 'lainnya'
                ).trim().toLowerCase();

                const isVisible =
                    selectedCategory === 'all' ||
                    cardCategory === selectedCategory;

                card.hidden = !isVisible;

                if (isVisible) {
                    visibleCount++;
                }
            });

            // Tampilkan pesan jika kategori tidak memiliki foto.
            if (filterEmpty) {
                filterEmpty.style.display =
                    photoCards.length > 0 && visibleCount === 0
                        ? 'block'
                        : 'none';
            }

            // Sembunyikan pesan awal saat kartu foto tersedia.
            if (initialEmpty) {
                initialEmpty.style.display =
                    photoCards.length > 0 ? 'none' : 'block';
            }

            // Perbarui jumlah foto yang sedang ditampilkan.
            if (galleryCount) {
                galleryCount.textContent =
                    visibleCount + ' foto ditampilkan';
            }
        }

        filterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const selectedCategory = (
                    button.dataset.filter || 'all'
                ).trim().toLowerCase();

                // Perbarui tampilan tombol aktif.
                filterButtons.forEach(function (item) {
                    const isActive = item === button;

                    item.classList.toggle('active', isActive);
                    item.setAttribute(
                        'aria-pressed',
                        String(isActive)
                    );
                });

                filterGallery(selectedCategory);
            });

            button.setAttribute(
                'aria-pressed',
                String(button.classList.contains('active'))
            );
        });

        // Tampilkan semua foto ketika halaman pertama kali dibuka.
        filterGallery('all');

        
        function filterGallery(filter) {
            let visibleCount = 0;

            photoCards.forEach(function (card) {
                const category = (
                    card.dataset.category || 'lainnya'
                ).trim().toLowerCase();

                const shouldShow =
                    filter === 'all' || category === filter;

                card.hidden = !shouldShow;

                if (shouldShow) {
                    visibleCount++;
                }
            });

            if (filterEmpty) {
                filterEmpty.style.display =
                    photoCards.length > 0 && visibleCount === 0
                        ? 'block'
                        : 'none';
            }

            if (galleryCount) {
                galleryCount.textContent =
                    visibleCount + ' foto ditampilkan';
            }
        }
    });
</script>
</body>
</html>
