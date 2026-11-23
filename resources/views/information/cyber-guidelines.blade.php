<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedoman Media Siber | {{ $siteSettings['site_name'] }}</title>
    <meta name="description" content="Pedoman media siber Derap Serayu tentang akurasi informasi, verifikasi, koreksi berita, hak jawab, dan pengelolaan konten.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --navy: #063f60;
            --blue: #17618a;
            --cyan: #08add5;
            --green: #278b70;
            --mint: #a8f0cc;
            --background: #f0f9fd;
            --text: #244b63;
            --muted: #68879b;
            --border: #d8eaf3;
            --white: #ffffff;
            --shadow: 0 14px 35px rgba(6, 63, 96, .08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 110px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.8;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* HEADER */
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

        /* HERO */
        .hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            padding: 64px 24px 90px;
            background:
                linear-gradient(
                    115deg,
                    rgba(5, 48, 66, .86), rgba(9, 78, 96, .72), rgba(26, 103, 98, .62)
                ),
                url('/images/bg-dieng-home.jpg') center 18% / cover no-repeat,
                linear-gradient(135deg, #063f60, #4e9d8b);
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero::before {
            width: 350px;
            height: 350px;
            top: -190px;
            right: 5%;
            background: rgba(168, 240, 204, .13);
        }

        .hero::after {
            width: 270px;
            height: 270px;
            bottom: -180px;
            left: 5%;
            background: rgba(8, 173, 213, .17);
        }

        .hero-content {
            max-width: 900px;
            margin: auto;
            text-align: center;
            color: white;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 22px;
            padding: 8px 16px;
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 30px;
            background: rgba(255,255,255,.10);
            color: #c7f6df;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero h1 {
            margin-bottom: 17px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(38px, 5vw, 62px);
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .hero h1 span {
            color: var(--mint);
        }

        .hero-description {
            max-width: 730px;
            margin: auto;
            color: rgba(255,255,255,.9);
            font-size: 15px;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 27px;
            color: rgba(255,255,255,.78);
            font-size: 12px;
        }

        .breadcrumb a:hover {
            color: white;
        }

        /* MAIN CONTENT */
        .content-wrapper {
            max-width: 1120px;
            margin: auto;
            padding: 36px 24px 85px;
        }

        .intro-card {
            margin-bottom: 34px;
            padding: 32px 35px;
            border: 1px solid rgba(255,255,255,.9);
            border-radius: 23px;
            background: rgba(255,255,255,.97);
            box-shadow: var(--shadow);
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 11px;
            color: var(--green);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .intro-card h2,
        .section-title {
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .intro-card h2 {
            margin-bottom: 10px;
            font-size: 27px;
            line-height: 1.45;
        }

        .intro-card p {
            color: var(--muted);
            font-size: 14px;
        }

        .section-heading {
            margin: 35px 0 18px;
        }

        .section-title {
            font-size: 27px;
            line-height: 1.4;
        }

        .section-subtitle {
            margin-top: 7px;
            color: var(--muted);
            font-size: 14px;
        }

        /* TABLE OF CONTENTS */
        .contents {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .contents a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 30px;
            background: white;
            color: var(--blue);
            font-size: 12px;
            font-weight: 700;
            transition: .2s ease;
        }

        .contents a:hover {
            border-color: var(--green);
            background: #e6f7ee;
            color: #176c60;
            transform: translateY(-2px);
        }

        /* GUIDELINE CARDS */
        .guidelines-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .guideline-card {
            position: relative;
            overflow: hidden;
            padding: 28px;
            border: 1px solid var(--border);
            border-radius: 21px;
            background: white;
            box-shadow: 0 8px 25px rgba(6,63,96,.045);
            scroll-margin-top: 105px;
            transition: transform .25s, box-shadow .25s;
        }

        .guideline-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
        }

        .guideline-card::after {
            content: "";
            position: absolute;
            right: -42px;
            bottom: -45px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(119,184,154,.12);
            pointer-events: none;
        }

        .card-heading {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
        }

        .card-icon {
            flex: 0 0 49px;
            width: 49px;
            height: 49px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: linear-gradient(135deg, #e1f8ed, #e4f5fb);
            color: #167a72;
            font-size: 19px;
        }

        .card-number {
            margin-bottom: 3px;
            color: #27937b;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .guideline-card h3 {
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            line-height: 1.45;
        }

        .guideline-card p {
            color: #617f92;
            font-size: 13px;
            line-height: 1.95;
        }

        .guideline-card ul {
            display: grid;
            gap: 9px;
            margin: 13px 0 0;
            padding-left: 21px;
            color: #617f92;
            font-size: 13px;
            line-height: 1.85;
        }

        .guideline-card li::marker {
            color: var(--green);
        }

        .guideline-card.full {
            grid-column: 1 / -1;
        }

        .official-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
            color: #0789ad;
            font-size: 13px;
            font-weight: 800;
        }

        .official-link:hover {
            color: var(--navy);
            text-decoration: underline;
        }

        /* REMINDER */
        .reminder {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-top: 28px;
            padding: 22px 24px;
            border: 1px solid #cde9dd;
            border-radius: 17px;
            background: #eaf8f1;
            color: #356c5a;
            font-size: 13px;
        }

        .reminder i {
            margin-top: 5px;
            color: #25886c;
            font-size: 18px;
        }

        /* FOOTER */
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

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .header-inner {
                flex-wrap: wrap;
            }

            .header-nav {
                width: 100%;
                gap: 18px;
                overflow-x: auto;
                padding-bottom: 5px;
            }

            .footer-inner {
                grid-template-columns: 1fr 1fr;
                gap: 32px;
            }

            .footer-about {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 600px) {
            .header-inner {
                padding: 12px 18px;
            }

            .brand {
                font-size: 19px;
            }

            .header-nav {
                gap: 17px;
            }

            .hero {
                padding: 58px 20px 65px;
            }

            .hero h1 {
                letter-spacing: -.5px;
            }

            .hero-description {
                font-size: 13px;
            }

            .content-wrapper {
                padding: 24px 16px 60px;
            }

            .intro-card,
            .guideline-card {
                padding: 23px;
            }

            .intro-card h2,
            .section-title {
                font-size: 23px;
            }

            .guidelines-grid {
                grid-template-columns: 1fr;
            }

            .guideline-card.full {
                grid-column: auto;
            }

            .contents {
                gap: 8px;
            }

            .contents a {
                padding: 9px 12px;
                font-size: 11px;
            }

            .footer-inner {
                grid-template-columns: 1fr;
                gap: 27px;
            }

            .footer-about {
                grid-column: auto;
            }

            .footer-bottom {
                flex-direction: column;
            }
        }

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
    </style>
@include('partials.info-footer-styles')
@include('partials.site-theme-styles')

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
                    href="{{ $siteSettings['instagram_url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Instagram Pemerintah Kabupaten Banjarnegara"
                    title="Instagram"
                >
                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                </a>

                <a
                    href="{{ $siteSettings['facebook_url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Facebook Pemerintah Kabupaten Banjarnegara"
                    title="Facebook"
                >
                    <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                </a>

                <a
                    href="{{ $siteSettings['youtube_url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="YouTube Pemerintah Kabupaten Banjarnegara"
                    title="YouTube"
                >
                    <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                </a>

                <a
                    href="{{ $siteSettings['x_url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="X Pemerintah Kabupaten Banjarnegara"
                    title="X"
                >
                    <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                </a>

                <a
                    href="{{ $siteSettings['tiktok_url'] }}"
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

    {{-- HEADER --}}
    <header class="main-header">

        <div class="header-card">


            {{-- Logo --}}

            <a
                href="{{ url('/') }}"
                class="logo-area"
            >

                <img
                    src="{{ $siteLogoUrl }}"
                    alt="{{ $siteSettings['site_name'] }}"
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

                <a href="{{ route('home') }}" class="active">
                    Beranda
                </a>

                <a href="{{ route('articles.index') }}">
                    Berita
                </a>

                <a href="{{ route('about') }}">
                    Tentang Kami
                </a>

                <a href="{{ route('galeri') }}">
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
                            @elseif (auth()->user()->role === 'editor')
                                @include('partials.editor-account-menu')
                            @elseif (auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                                    Dasbor Admin
                                </a>
                                @include('partials.admin-reader-links')
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

    {{-- HERO --}}
    <section class="hero">
        <div class="hero-content">
            <div class="eyebrow">
                <i class="fa-solid fa-leaf"></i>
                Informasi Pembaca
            </div>

            <h1>Pedoman Media <span>Siber</span></h1>

            <p class="hero-description">
                Prinsip penyajian informasi, akurasi berita, koreksi,
                dan tanggung jawab editorial untuk menjaga kepercayaan
                pembaca Derap Serayu.
            </p>

            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <i class="fa-solid fa-chevron-right"></i>
                <span>Pedoman Media Siber</span>
            </div>
        </div>
    </section>

    {{-- KONTEN UTAMA --}}
    <main class="content-wrapper">

        <section class="intro-card">
            <div class="section-label">
                <i class="fa-solid fa-shield-halved"></i>
                Integritas dan Tanggung Jawab
            </div>

            <h2>Informasi yang akurat, ruang publik yang bertanggung jawab.</h2>

            <p>
                Pedoman ini menjadi panduan umum untuk penyajian informasi
                dan penanganan koreksi di Derap Serayu. Setiap informasi
                perlu disampaikan dengan memperhatikan akurasi, konteks,
                sumber yang jelas, serta penghormatan terhadap hak pembaca
                dan pihak yang diberitakan.
            </p>
        </section>

        <div class="section-heading">
            <h2 class="section-title">Prinsip pemberitaan</h2>
            <p class="section-subtitle">
                Kenali prinsip dasar dalam membaca dan menyampaikan informasi.
            </p>
        </div>

        {{-- DAFTAR ISI --}}
        <nav class="contents" aria-label="Daftar isi pedoman media siber">
            <a href="#akurasi"><i class="fa-solid fa-check-double"></i> Akurasi</a>
            <a href="#verifikasi"><i class="fa-solid fa-magnifying-glass"></i> Verifikasi</a>
            <a href="#koreksi"><i class="fa-solid fa-pen-to-square"></i> Koreksi</a>
            <a href="#hak-jawab"><i class="fa-solid fa-comments"></i> Hak Jawab</a>
            <a href="#konten"><i class="fa-solid fa-file-lines"></i> Konten</a>
            <a href="#kontak"><i class="fa-solid fa-envelope"></i> Kontak</a>
        </nav>

        <div class="guidelines-grid">

            {{-- AKURASI --}}
            <article class="guideline-card" id="akurasi">
                <div class="card-heading">
                    <div class="card-icon">
                        <i class="fa-solid fa-check-double"></i>
                    </div>
                    <div>
                        <div class="card-number">Prinsip 01</div>
                        <h3>Akurasi Informasi</h3>
                    </div>
                </div>

                <p>
                    Informasi disajikan dengan mengutamakan kejelasan sumber,
                    konteks, dan ketepatan isi. Pembaca dapat menyampaikan
                    koreksi apabila menemukan kekeliruan pada informasi
                    yang diterbitkan.
                </p>
            </article>

            {{-- VERIFIKASI --}}
            <article class="guideline-card" id="verifikasi">
                <div class="card-heading">
                    <div class="card-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div>
                        <div class="card-number">Prinsip 02</div>
                        <h3>Verifikasi dan Sumber</h3>
                    </div>
                </div>

                <p>
                    Informasi perlu diperiksa berdasarkan sumber yang relevan
                    dan dapat dipertanggungjawabkan. Konteks berita harus
                    diperhatikan agar pembaca memperoleh pemahaman yang utuh.
                </p>
            </article>

            {{-- KOREKSI --}}
            <article class="guideline-card" id="koreksi">
                <div class="card-heading">
                    <div class="card-icon">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                    <div>
                        <div class="card-number">Prinsip 03</div>
                        <h3>Koreksi dan Klarifikasi</h3>
                    </div>
                </div>

                <p>
                    Permintaan koreksi atau klarifikasi dapat disampaikan
                    kepada pengelola melalui kanal kontak yang tersedia.
                    Informasi yang perlu diperbaiki akan ditinjau berdasarkan
                    materi dan bukti pendukung yang diberikan.
                </p>
            </article>

            {{-- HAK JAWAB --}}
            <article class="guideline-card" id="hak-jawab">
                <div class="card-heading">
                    <div class="card-icon">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div>
                        <div class="card-number">Prinsip 04</div>
                        <h3>Hak Jawab dan Keberimbangan</h3>
                    </div>
                </div>

                <p>
                    Pihak yang merasa dirugikan oleh informasi dapat
                    menyampaikan penjelasan atau tanggapan kepada pengelola
                    untuk ditinjau sesuai konteks, bukti, dan ketentuan
                    yang berlaku.
                </p>
            </article>

            {{-- KONTEN --}}
            <article class="guideline-card" id="konten">
                <div class="card-heading">
                    <div class="card-icon">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <div>
                        <div class="card-number">Prinsip 05</div>
                        <h3>Konten dan Tanggung Jawab</h3>
                    </div>
                </div>

                <p>
                    Artikel, foto, dan materi yang dipublikasikan perlu
                    menghormati privasi, hak cipta, serta hak pihak lain.
                    Penggunaan kembali karya harus memperhatikan sumber
                    dan izin yang diperlukan.
                </p>
            </article>

            {{-- PERUBAHAN --}}
            <article class="guideline-card" id="perubahan">
                <div class="card-heading">
                    <div class="card-icon">
                        <i class="fa-solid fa-arrows-rotate"></i>
                    </div>
                    <div>
                        <div class="card-number">Prinsip 06</div>
                        <h3>Pembaruan Informasi</h3>
                    </div>
                </div>

                <p>
                    Informasi dapat diperbarui apabila terdapat data baru,
                    koreksi, atau klarifikasi yang relevan. Perubahan
                    hendaknya dilakukan dengan tetap memperhatikan konteks
                    dan kejelasan informasi bagi pembaca.
                </p>
            </article>

            {{-- KONTAK --}}
            <article class="guideline-card full" id="kontak">
                <div class="card-heading">
                    <div class="card-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <div class="card-number">Hubungi Pengelola</div>
                        <h3>Penyampaian Koreksi dan Klarifikasi</h3>
                    </div>
                </div>

                <p>
                    Jika menemukan informasi yang diduga tidak akurat,
                    pembaca dapat menghubungi pengelola melalui kanal
                    komunikasi resmi yang tersedia. Sertakan judul artikel,
                    bagian yang perlu ditinjau, dan sumber pendukung agar
                    permintaan lebih mudah diperiksa.
                </p>

                <a
                    class="official-link"
                    href="https://banjarnegarakab.go.id/"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Kunjungi situs resmi Pemerintah Kabupaten Banjarnegara
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </article>

        </div>

        <aside class="reminder">
            <i class="fa-solid fa-circle-info"></i>
            <p>
                <strong>Catatan:</strong> Halaman ini merupakan draf pedoman
                umum untuk Derap Serayu. Sesuaikan dengan proses editorial
                yang benar-benar diterapkan oleh pengelola. Apabila situs
                menerbitkan berita jurnalistik, tinjau dan lengkapi pedoman
                berdasarkan ketentuan media siber dan peraturan yang berlaku
                sebelum dipublikasikan.
            </p>
        </aside>

    </main>

    {{-- FOOTER --}}
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
                        src="{{ $siteLogoUrl }}"
                        alt="{{ $siteSettings['site_name'] }}"
                        onerror="
                            this.style.display='none';
                            this.nextElementSibling.style.display='flex';
                        "
                    >

                    </a>


                    <p class="footer-description">{{ $siteSettings['footer_description'] }}</p>
@if($siteSettings['contact_email'] || $siteSettings['contact_phone'])
    <p class="footer-description">
        @if($siteSettings['contact_email'])
            <a href="mailto:{{ $siteSettings['contact_email'] }}">{{ $siteSettings['contact_email'] }}</a>
        @endif
        @if($siteSettings['contact_phone'])
            <br>{{ $siteSettings['contact_phone'] }}
        @endif
    </p>
@endif


                    <div class="footer-social">

                        <a
                            href="{{ $siteSettings['instagram_url'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram Pemerintah Kabupaten Banjarnegara"
                            title="Instagram"
                        >
                            <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                        </a>

                        <a
                            href="{{ $siteSettings['facebook_url'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook Pemerintah Kabupaten Banjarnegara"
                            title="Facebook"
                        >
                            <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                        </a>

                        <a
                            href="{{ $siteSettings['youtube_url'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="YouTube Pemerintah Kabupaten Banjarnegara"
                            title="YouTube"
                        >
                            <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                        </a>

                        <a
                            href="{{ $siteSettings['tiktok_url'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="TikTok Pemerintah Kabupaten Banjarnegara"
                            title="TikTok"
                        >
                            <i class="fa-brands fa-tiktok" aria-hidden="true"></i>
                        </a>

                        <a
                            href="{{ $siteSettings['x_url'] }}"
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

                    {{ $siteSettings['footer_quote'] }}

                </p>

                <small>
                    {{ mb_strtoupper($siteSettings['site_name']) }} — BANJARNEGARA
                </small>

            </div>



            {{-- BOTTOM --}}

            <div class="footer-bottom">

                <div>

                    © {{ date('Y') }}
                    {{ $siteSettings['site_name'] }}.
                    {{ $siteSettings['footer_copyright'] }}

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

@include('partials.search-script')
@include('partials.info-origin-script')
</body>
</html>
