<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudut Kota | Derap Serayu</title>

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..700;1,9..40,400..700&family=Playfair+Display:ital,wght@0,500..800;1,500..800&display=swap" rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* =========================================================
           GLOBAL & VARIABLES
        ========================================================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #073f5e;
            --navy-dark: #052c42;
            --navy-deep: #022336;
            --cyan: #08add5;
            --cyan-dark: #0789a9;
            --cyan-light: #6ee7f7;
            --cyan-soft: #e8f8fc;
            --cyan-bg: #f2fbfe;
            --white: #ffffff;
            --muted: #648293;
            --border: #d8edf4;
            --border-light: #e6f3f7;
            --shadow-sm: 0 4px 14px rgba(7, 63, 94, 0.05);
            --shadow-md: 0 10px 30px rgba(7, 63, 94, 0.08);
            --shadow-lg: 0 16px 40px rgba(7, 63, 94, 0.12);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "DM Sans", sans-serif;
            color: var(--navy);
            background: linear-gradient(180deg, rgba(222, 248, 255, .95), rgba(246, 252, 254, .98));
            position: relative;
            isolation: isolate;
            overflow-x: hidden;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0 0 auto;
            height: max(100vh, 850px);
            background:
                linear-gradient(
                    180deg,
                    rgba(224, 248, 254, .82),
                    rgba(232, 249, 254, .90) 45%,
                    rgba(244, 251, 253, .98) 100%
                ),
                url("{{ asset('images/gunung.jpg') }}");
            background-size: cover;
            background-position: center top;
            z-index: -1;
            pointer-events: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font-family: inherit;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* =========================================================
           TOPBAR
        ========================================================= */
        .topbar {
            height: 36px;
            background: #064d6b;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6.5%;
            font-size: 10px;
            position: relative;
            z-index: 100;
        }

        .topbar-left,
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .topbar-item {
            display: flex;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .topbar-item i {
            color: var(--cyan-light);
        }

        .topbar-divider {
            width: 1px;
            height: 15px;
            background: rgba(255, 255, 255, .25);
        }

        .topbar-right a {
            color: white;
            transition: color .2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .topbar-right a:hover {
            color: var(--cyan-light);
        }

        /* =========================================================
           HEADER (SOSOK STYLE)
        ========================================================= */
        .sosok-site-header {
            position: relative;
            z-index: 20;
            padding: 12px 0 0;
        }

        .sosok-header-card {
            width: min(1300px, calc(100% - 40px));
            min-height: 76px;
            margin: auto;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            border: 1px solid rgba(255, 255, 255, .92);
            border-radius: 22px;
            background: rgba(255, 255, 255, .92);
            box-shadow: var(--shadow-md);
            backdrop-filter: blur(16px);
        }

        .sosok-brand {
            display: inline-flex;
            flex: 0 0 auto;
            align-items: center;
            text-decoration: none;
        }

        .sosok-brand img {
            display: block;
            width: 180px;
            max-height: 54px;
            object-fit: contain;
        }

        .sosok-brand-fallback {
            display: none;
            color: var(--navy);
            font: 800 23px "Playfair Display", serif;
        }

        .sosok-brand-fallback span {
            color: var(--cyan);
        }

        .sosok-main-nav {
            display: flex;
            flex: 1 1 auto;
            min-width: 0;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .sosok-main-nav > a,
        .sosok-nav-dropdown summary {
            padding: 10px 11px;
            border-radius: 22px;
            color: var(--navy);
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .sosok-main-nav > a:hover,
        .sosok-nav-dropdown summary:hover,
        .sosok-nav-dropdown[open] summary,
        .sosok-main-nav > a.active {
            background: var(--cyan-soft);
            color: var(--cyan-dark);
        }

        .sosok-nav-dropdown {
            position: relative;
        }

        .sosok-nav-dropdown summary {
            list-style: none;
        }

        .sosok-nav-dropdown summary::-webkit-details-marker {
            display: none;
        }

        .sosok-nav-dropdown summary i {
            margin-left: 4px;
            color: var(--cyan);
            font-size: 10px;
        }

        .sosok-nav-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            z-index: 30;
            min-width: 190px;
            padding: 8px;
            border: 1px solid #dceef4;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 14px 32px rgba(7, 63, 94, .14);
        }

        .sosok-nav-dropdown-menu a {
            display: block;
            padding: 9px 11px;
            border-radius: 9px;
            color: var(--navy);
            font-size: 12px;
            text-decoration: none;
            transition: background .15s, color .15s;
        }

        .sosok-nav-dropdown-menu a:hover,
        .sosok-nav-dropdown-menu a.active {
            background: var(--cyan-soft);
            color: var(--cyan-dark);
            font-weight: 700;
        }

        .sosok-search {
            display: flex;
            flex: 0 1 240px;
            align-items: center;
            gap: 8px;
            min-width: 150px;
            height: 40px;
            padding: 0 5px 0 12px;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: #f8fcfd;
            color: var(--cyan);
        }

        .sosok-search input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: var(--navy);
            font: 11px "DM Sans", sans-serif;
        }

        .sosok-search button {
            min-height: 30px;
            padding: 0 11px;
            border: 0;
            border-radius: 18px;
            background: var(--cyan);
            color: #fff;
            font: 700 10px "DM Sans", sans-serif;
            cursor: pointer;
            transition: background .2s;
        }

        .sosok-search button:hover {
            background: var(--cyan-dark);
        }

        .sosok-account-actions {
            display: flex;
            flex: 0 0 auto;
            align-items: center;
            gap: 6px;
        }

        .sosok-account-actions a,
        .sosok-account-actions button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-height: 36px;
            padding: 0 10px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: #fff;
            color: var(--navy);
            font: 700 11px "DM Sans", sans-serif;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: border-color .2s, color .2s, background .2s;
        }

        .sosok-account-actions a:hover,
        .sosok-account-actions button:hover {
            border-color: var(--cyan);
            color: var(--cyan-dark);
        }

        .sosok-account-actions .sosok-register-link {
            border-color: var(--cyan);
            background: var(--cyan);
            color: #fff;
        }

        .sosok-account-actions .sosok-register-link:hover {
            background: var(--cyan-dark);
            color: #fff;
        }

        .sosok-account-actions form {
            margin: 0;
        }

        .sosok-visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* =========================================================
           HERO SECTION
        ========================================================= */
        .sudut-hero {
            position: relative;
            padding: 40px 6.5% 30px;
            background: transparent;
        }

        .sudut-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .hero-intro {
            margin-bottom: 32px;
        }

        .hero-title {
            font-family: "Playfair Display", serif;
            font-size: 38px;
            font-weight: 800;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .hero-title i {
            color: var(--cyan);
            font-size: 32px;
        }

        .hero-description {
            color: var(--muted);
            font-size: 15px;
            max-width: 650px;
            line-height: 1.6;
        }

        .hero-line {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--cyan), transparent);
            margin-top: 14px;
            border-radius: 2px;
        }

        .sudut-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(0, 1fr);
            gap: 28px;
            align-items: stretch;
        }

        /* FEATURED CARD */
        .featured-city {
            background: #fff;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.9);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .featured-city:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .featured-image-wrapper {
            position: relative;
            width: 100%;
            height: 310px;
            overflow: hidden;
            background: #eaf3f6;
        }

        .featured-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .45s ease;
        }

        .featured-city:hover .featured-image-wrapper img {
            transform: scale(1.04);
        }

        .city-label {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(7, 63, 94, 0.88);
            backdrop-filter: blur(8px);
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .featured-content {
            padding: 26px 28px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .featured-content h2 {
            font-family: "Playfair Display", serif;
            font-size: 26px;
            font-weight: 700;
            line-height: 1.35;
            color: var(--navy);
            margin-bottom: 12px;
        }

        .featured-content h2 span {
            color: var(--cyan);
        }

        .featured-content p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .city-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 24px;
            margin-top: auto;
        }

        .city-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .city-meta span i {
            color: var(--cyan);
        }

        .read-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            background: var(--cyan);
            color: #fff;
            border-radius: 22px;
            font-weight: 700;
            font-size: 13px;
            align-self: flex-start;
            transition: background .2s, transform .2s;
        }

        .read-button:hover {
            background: var(--cyan-dark);
            transform: translateX(3px);
            color: #fff;
        }

        /* EMPTY FEATURED STATE */
        .featured-empty {
            padding: 48px 32px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .featured-empty i {
            font-size: 48px;
            color: var(--cyan);
            margin-bottom: 16px;
        }

        /* POPULAR CITY LIST */
        .city-list {
            background: #fff;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.9);
            box-shadow: var(--shadow-md);
            padding: 24px 22px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .city-list-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-light);
        }

        .city-list-title h3 {
            font-size: 17px;
            font-weight: 700;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .city-list-title h3 i {
            color: var(--cyan);
        }

        .see-all {
            font-size: 12px;
            font-weight: 700;
            color: var(--cyan);
            transition: color .2s;
        }

        .see-all:hover {
            color: var(--cyan-dark);
        }

        .city-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 10px;
            border-radius: 16px;
            transition: background .2s, transform .2s;
            text-decoration: none;
            color: inherit;
        }

        .city-item:hover {
            background: var(--cyan-soft);
            transform: translateX(4px);
        }

        .city-number {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #edf8fb;
            color: var(--cyan-dark);
            font-weight: 800;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .city-image {
            width: 68px;
            height: 68px;
            border-radius: 14px;
            overflow: hidden;
            flex-shrink: 0;
            background: #eaf3f6;
        }

        .city-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .city-info {
            flex: 1;
            min-width: 0;
        }

        .city-info h4 {
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.4;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .city-info span {
            font-size: 11px;
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .city-empty-state {
            padding: 30px 10px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }

        /* =========================================================
           AREA / KATEGORI SECTION
        ========================================================= */
        .area-section {
            padding: 36px 6.5%;
            max-width: 1300px;
            margin: 0 auto;
        }

        .area-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .area-heading {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .area-heading i {
            color: var(--cyan);
            font-size: 22px;
        }

        .area-heading h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
        }

        .heading-line {
            width: 40px;
            height: 3px;
            background: var(--cyan);
            border-radius: 2px;
        }

        .area-see {
            font-size: 12px;
            font-weight: 700;
            color: var(--cyan);
            transition: color .2s;
        }

        .area-see:hover {
            color: var(--cyan-dark);
        }

        .area-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
        }

        .area-card {
            background: #fff;
            border: 1px solid var(--border-light);
            border-radius: 20px;
            padding: 20px 18px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            box-shadow: var(--shadow-sm);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
            text-decoration: none;
            color: inherit;
            position: relative;
        }

        .area-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--cyan);
        }

        .area-card.active {
            background: linear-gradient(135deg, var(--cyan), var(--cyan-dark));
            color: #fff;
            border-color: var(--cyan-dark);
            box-shadow: 0 10px 24px rgba(8, 173, 213, .35);
        }

        .area-icon {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: var(--cyan-soft);
            color: var(--cyan);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 4px;
            transition: background .2s, color .2s;
        }

        .area-card.active .area-icon {
            background: rgba(255, 255, 255, 0.22);
            color: #fff;
        }

        .area-card h3 {
            font-size: 15px;
            font-weight: 700;
            color: inherit;
        }

        .area-card p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .area-card.active p {
            color: rgba(255, 255, 255, 0.9);
        }

        .area-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 6px;
            padding-top: 8px;
            border-top: 1px solid var(--border-light);
        }

        .area-card.active .area-bottom {
            border-top-color: rgba(255, 255, 255, 0.2);
        }

        .area-badge {
            font-size: 11px;
            font-weight: 700;
            color: var(--cyan-dark);
            background: var(--cyan-soft);
            padding: 3px 8px;
            border-radius: 12px;
        }

        .area-card.active .area-badge {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
        }

        .area-arrow {
            font-size: 14px;
            color: var(--cyan);
            font-weight: 800;
            transition: transform .2s;
        }

        .area-card:hover .area-arrow {
            transform: translateX(4px);
        }

        .area-card.active .area-arrow {
            color: #fff;
        }

        /* =========================================================
           ARTICLE SECTION (CERITA DARI SUDUT KOTA)
        ========================================================= */
        .article-section {
            padding: 30px 6.5% 50px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .article-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            gap: 32px;
            align-items: start;
        }

        .article-main {
            min-width: 0;
        }

        .article-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .article-heading-left {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .article-heading-left i {
            color: var(--cyan);
            font-size: 20px;
        }

        .article-heading-left h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
        }

        .filter-reset-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 14px;
            background: #fee;
            color: #d32f2f;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s;
        }

        .filter-reset-badge:hover {
            background: #fdd;
        }

        .article-see {
            font-size: 12px;
            font-weight: 700;
            color: var(--cyan);
            transition: color .2s;
        }

        .article-see:hover {
            color: var(--cyan-dark);
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .article-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
            text-decoration: none;
            color: inherit;
        }

        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--cyan);
        }

        .article-image {
            position: relative;
            width: 100%;
            height: 190px;
            overflow: hidden;
            background: #eaf3f6;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .article-card:hover .article-image img {
            transform: scale(1.05);
        }

        .article-tag {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(7, 63, 94, 0.85);
            backdrop-filter: blur(6px);
            color: #fff;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .article-content {
            padding: 18px 16px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .article-content h3 {
            font-size: 15px;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.4;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-content p {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.5;
            margin-bottom: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .article-meta {
            font-size: 11px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: auto;
            border-top: 1px solid var(--border-light);
            padding-top: 10px;
        }

        .article-meta i {
            color: var(--cyan);
        }

        /* EMPTY STATE */
        .article-empty {
            grid-column: 1 / -1;
            background: #fff;
            border-radius: 20px;
            padding: 48px 24px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
        }

        .article-empty i {
            font-size: 40px;
            color: var(--cyan);
            margin-bottom: 12px;
        }

        .article-empty h3 {
            font-size: 18px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 6px;
        }

        .article-empty p {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 20px;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
        }

        /* PAGINATION */
        .sudut-pagination {
            display: flex;
            justify-content: center;
            margin-top: 32px;
            width: 100%;
        }

        .sudut-pagination nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            width: 100%;
        }

        .sudut-pagination nav > div:first-child {
            display: none !important;
        }

        .sudut-pagination nav > div:last-child {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .sudut-pagination p {
            font-size: 12px;
            color: var(--muted);
            margin: 0;
            text-align: center;
        }

        .sudut-pagination span.relative.z-0,
        .sudut-pagination span.inline-flex {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: none;
            background: transparent;
        }

        .sudut-pagination a,
        .sudut-pagination span[aria-current="page"] > span,
        .sudut-pagination span[aria-disabled="true"] > span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--navy);
            text-decoration: none;
            transition: all .2s;
            line-height: 1;
            margin: 0;
        }

        .sudut-pagination a:hover {
            border-color: var(--cyan);
            color: var(--cyan-dark);
            background: var(--cyan-soft);
        }

        .sudut-pagination span[aria-current="page"] {
            display: inline-flex;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .sudut-pagination span[aria-current="page"] > span {
            background: var(--cyan);
            border-color: var(--cyan);
            color: #fff;
        }

        .sudut-pagination span[aria-disabled="true"] {
            display: inline-flex;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .sudut-pagination span[aria-disabled="true"] > span {
            opacity: 0.5;
            background: #f7fbfc;
            cursor: not-allowed;
            color: var(--muted);
        }

        .sudut-pagination svg {
            width: 14px;
            height: 14px;
            display: inline-block;
        }

        /* TRENDING SIDEBAR */
        .trending {
            background: #fff;
            border-radius: 24px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-sm);
            padding: 24px 20px;
            position: sticky;
            top: 24px;
        }

        .trending-title {
            display: flex;
            align-items: center;
            gap: 8px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 10px;
        }

        .trending-title i {
            color: #ff5722;
            font-size: 16px;
        }

        .trending-title h3 {
            font-size: 16px;
            font-weight: 700;
            color: var(--navy);
        }

        .trend-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 600;
            color: var(--navy);
            text-decoration: none;
            transition: background .2s, color .2s, transform .2s;
        }

        .trend-item:hover {
            background: var(--cyan-soft);
            color: var(--cyan-dark);
            transform: translateX(3px);
        }

        .trend-action {
            font-size: 11px;
            color: var(--muted);
            transition: color .2s;
        }

        .trend-item:hover .trend-action {
            color: var(--cyan-dark);
        }

        /* =========================================================
           DISCOVER CTA SECTION
        ========================================================= */
        .discover-section {
            padding: 30px 6.5% 60px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .discover-card {
            background: linear-gradient(135deg, #074a6f 0%, #042d45 100%);
            border-radius: 24px;
            padding: 42px 46px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 28px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }

        .discover-card::after {
            content: "";
            position: absolute;
            right: -60px;
            bottom: -60px;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(8, 173, 213, 0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .discover-content {
            max-width: 600px;
            z-index: 1;
        }

        .discover-label {
            color: var(--cyan-light);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .discover-card h2 {
            font-family: "Playfair Display", serif;
            font-size: 28px;
            color: #fff;
            line-height: 1.35;
            margin-bottom: 10px;
        }

        .discover-card h2 span {
            color: var(--cyan-light);
        }

        .discover-card p {
            color: #b5d5e2;
            font-size: 14px;
            line-height: 1.6;
        }

        .discover-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            background: var(--cyan);
            color: #fff;
            border-radius: 24px;
            font-weight: 700;
            font-size: 13px;
            white-space: nowrap;
            transition: background .2s, transform .2s;
            z-index: 1;
        }

        .discover-button:hover {
            background: var(--cyan-light);
            color: var(--navy-dark);
            transform: translateY(-2px);
        }

        /* =========================================================
           FOOTER
        ========================================================= */
        .home-footer {
            background: #03273d;
            color: #fff;
            padding: 60px 6.5% 30px;
            position: relative;
            z-index: 10;
        }

        .home-footer-inner {
            max-width: 1300px;
            margin: 0 auto;
        }

        .home-footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1fr 1.6fr;
            gap: 36px;
            margin-bottom: 48px;
        }

        .footer-brand {
            display: block;
            margin-bottom: 16px;
        }

        .footer-logo-box img {
            width: 180px;
            max-height: 54px;
            object-fit: contain;
        }

        .footer-description {
            font-size: 13px;
            color: #8daec0;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-social a {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 13px;
            transition: background .2s, color .2s;
        }

        .footer-social a:hover {
            background: var(--cyan);
            color: #fff;
        }

        .footer-link-column h3 {
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 18px;
            letter-spacing: .5px;
        }

        .footer-link-column a {
            display: block;
            font-size: 13px;
            color: #8daec0;
            margin-bottom: 10px;
            transition: color .2s, transform .2s;
        }

        .footer-link-column a:hover {
            color: var(--cyan-light);
            transform: translateX(3px);
        }

        .footer-newsletter {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 24px 20px;
        }

        .newsletter-label {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            color: var(--cyan-light);
            margin-bottom: 8px;
        }

        .footer-newsletter h2 {
            font-size: 16px;
            color: #fff;
            font-weight: 700;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .footer-newsletter h2 span {
            color: var(--cyan-light);
        }

        .footer-newsletter p {
            font-size: 12px;
            color: #8daec0;
            margin-bottom: 14px;
            line-height: 1.5;
        }

        .newsletter-form {
            display: flex;
            gap: 8px;
        }

        .newsletter-form input {
            flex: 1;
            min-width: 0;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 18px;
            padding: 0 14px;
            height: 38px;
            color: #fff;
            font-size: 12px;
            outline: 0;
        }

        .newsletter-form input::placeholder {
            color: #8daec0;
        }

        .newsletter-form button {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--cyan);
            border: 0;
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: background .2s;
            flex-shrink: 0;
        }

        .newsletter-form button:hover {
            background: var(--cyan-light);
            color: var(--navy-dark);
        }

        .newsletter-feedback {
            margin-top: 9px;
            color: #a6e7f5;
            font-size: 11px;
            line-height: 1.5;
        }

        /* QUOTE */
        .footer-quote-section {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 30px 0;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .footer-quote-mark {
            font-family: "Playfair Display", serif;
            font-size: 40px;
            color: var(--cyan);
            line-height: 1;
            margin-bottom: 4px;
        }

        .footer-quote {
            font-family: "Playfair Display", serif;
            font-size: 17px;
            font-style: italic;
            color: #e0f2f7;
            margin-bottom: 6px;
        }

        .footer-quote-author {
            font-size: 10px;
            letter-spacing: 2px;
            color: var(--cyan-light);
            font-weight: 700;
        }

        /* BOTTOM */
        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            color: #8daec0;
            flex-wrap: wrap;
            gap: 14px;
        }

        .footer-policy {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .footer-policy a {
            color: #8daec0;
            transition: color .2s;
        }

        .footer-policy a:hover {
            color: var(--cyan-light);
        }

        .footer-made strong {
            color: #fff;
        }

        /* =========================================================
           RESPONSIVE BREAKPOINTS
        ========================================================= */
        @media (max-width: 1200px) {
            .sudut-grid {
                gap: 20px;
            }

            .home-footer-grid {
                grid-template-columns: 1.2fr 1fr 1fr;
            }

            .footer-newsletter {
                grid-column: span 3;
            }

            .article-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 1150px) {
            .topbar-right {
                display: none;
            }

            .sosok-header-card {
                display: grid;
                grid-template-columns: minmax(0, 1fr) auto;
                gap: 8px 14px;
            }

            .sosok-brand img {
                width: 150px;
            }

            .sosok-main-nav {
                grid-column: 1 / -1;
                grid-row: 2;
                justify-content: flex-start;
                flex-wrap: wrap;
            }

            .sosok-search {
                grid-column: 1;
                grid-row: 3;
                width: 100%;
                max-width: none;
            }

            .sosok-account-actions {
                grid-column: 2;
                grid-row: 3;
                justify-content: flex-end;
            }
        }

        @media (max-width: 950px) {
            .topbar {
                padding: 0 20px;
            }

            .sudut-hero,
            .area-section,
            .article-section,
            .discover-section {
                padding-left: 20px;
                padding-right: 20px;
            }

            .sudut-grid {
                grid-template-columns: 1fr;
            }

            .area-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .article-layout {
                grid-template-columns: 1fr;
            }

            .trending {
                position: static;
                margin-top: 10px;
            }

            .discover-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 32px 28px;
            }

            .home-footer {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        @media (max-width: 650px) {
            .topbar {
                height: 32px;
                font-size: 8px;
            }

            .topbar-left {
                gap: 9px;
            }

            .topbar-left .topbar-item:last-child {
                display: none;
            }

            .sosok-header-card {
                width: calc(100% - 20px);
                padding: 9px;
                border-radius: 17px;
            }

            .sosok-brand img {
                width: 125px;
                max-height: 46px;
            }

            .sosok-main-nav {
                justify-content: flex-start;
                gap: 0;
            }

            .sosok-main-nav > a,
            .sosok-nav-dropdown summary {
                padding: 8px 9px;
                font-size: 10px;
            }

            .sosok-nav-dropdown-menu {
                right: 0;
                left: auto;
            }

            .sosok-search {
                min-width: 0;
                height: 38px;
            }

            .sosok-account-actions a,
            .sosok-account-actions button {
                min-height: 34px;
                padding: 0 8px;
                font-size: 10px;
            }

            .hero-title {
                font-size: 28px;
            }

            .hero-title i {
                font-size: 24px;
            }

            .hero-description {
                font-size: 13px;
            }

            .featured-image-wrapper {
                height: 220px;
            }

            .featured-content {
                padding: 20px 18px;
            }

            .featured-content h2 {
                font-size: 22px;
            }

            .area-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .area-card {
                padding: 16px 14px;
            }

            .article-grid {
                grid-template-columns: 1fr;
            }

            .home-footer-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .footer-newsletter {
                grid-column: auto;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }

            .footer-policy {
                justify-content: center;
            }
        }

        @media (max-width: 430px) {
            .hero-title {
                font-size: 24px;
            }

            .area-grid {
                grid-template-columns: 1fr;
            }

            .featured-content h2 {
                font-size: 20px;
            }

            .featured-content p {
                font-size: 13px;
            }

            .city-item {
                gap: 10px;
            }

            .city-image {
                width: 58px;
                height: 58px;
            }
        }
    </style>
</head>

<body>

{{-- =========================================================
     TOP BAR
========================================================= --}}
<div class="topbar">
    <div class="topbar-left">
        <div class="topbar-item"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Banjarnegara</div>
        <div class="topbar-item">
            <span id="WeatherIcon" class="topbar-weather-icon" aria-hidden="true">🌤️</span>
            <span id="Temperature">--°C</span>
        </div>
        <div class="topbar-divider" aria-hidden="true"></div>
        <div class="topbar-item"><i class="fa-regular fa-calendar" aria-hidden="true"></i> {{ now()->locale('id')->translatedFormat('l, j F Y') }}</div>
    </div>

    <div class="topbar-right" aria-label="Tautan layanan dan media sosial">
        <a href="https://ppid.banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer"><i class="fa-regular fa-newspaper" aria-hidden="true"></i> PPID</a>
        <a href="https://www.instagram.com/mpp.banjarnegara/" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-headset" aria-hidden="true"></i> Layanan Publik</a>
        <a href="https://banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-phone" aria-hidden="true"></i> Kontak</a>
        <a href="https://www.instagram.com/kabupatenbanjarnegara/" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pemerintah Kabupaten Banjarnegara" title="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
        <a href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/" target="_blank" rel="noopener noreferrer" aria-label="Facebook Pemerintah Kabupaten Banjarnegara" title="Facebook"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="YouTube Pemerintah Kabupaten Banjarnegara" title="YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
        <a href="https://x.com/pemkab_bna" target="_blank" rel="noopener noreferrer" aria-label="X Pemerintah Kabupaten Banjarnegara" title="X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
        <a href="https://www.tiktok.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="TikTok Pemerintah Kabupaten Banjarnegara" title="TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
    </div>
</div>

{{-- =========================================================
     HEADER
========================================================= --}}
<header class="sosok-site-header">
    <div class="sosok-header-card">
        <a class="sosok-brand" href="{{ route('home') }}" aria-label="Derap Serayu, beranda">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Derap Serayu"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';"
            >
            <span class="sosok-brand-fallback">Derap<span>Serayu</span></span>
        </a>

        <nav class="sosok-main-nav" aria-label="Navigasi utama">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('articles.index') }}">Berita</a>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <details class="sosok-nav-dropdown">
                <summary><i class="fa-solid fa-water" aria-hidden="true"></i> Jelajahi <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></summary>
                <div class="sosok-nav-dropdown-menu">
                    <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                    <a href="{{ route('opini') }}">Opini</a>
                    <a href="{{ route('sosok') }}">Sosok</a>
                    <a class="active" href="{{ route('sudut-kota') }}" aria-current="page">Sudut Kota</a>
                    <a href="{{ route('potensi') }}">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>
            </details>
        </nav>

        <form class="sosok-search" action="{{ route('sudut-kota') }}" method="GET" role="search">
            <label class="sosok-visually-hidden" for="sudut-search">Cari cerita sudut kota</label>
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            <input id="sudut-search" type="search" name="q" value="{{ request('q') }}" placeholder="Cari cerita sudut kota..." maxlength="100">
            @if(request('area'))
                <input type="hidden" name="area" value="{{ request('area') }}">
            @endif
            <button type="submit">Cari</button>
        </form>

        <div class="sosok-account-actions">
            @auth
                @if (auth()->user()->role === 'reader')
                    <a href="{{ route('pembaca.profile') }}"><i class="fa-regular fa-user" aria-hidden="true"></i><span>Akun</span></a>
                @elseif (auth()->user()->role === 'writer')
                    <a href="{{ route('penulis.dashboard') }}"><i class="fa-solid fa-pen-nib" aria-hidden="true"></i><span>Dasbor</span></a>
                @elseif (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge-high" aria-hidden="true"></i><span>Dasbor</span></a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" aria-label="Keluar"><i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i><span>Keluar</span></button>
                </form>
            @else
                <a href="{{ route('login') }}" aria-label="Masuk"><i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i><span>Masuk</span></a>
                <a class="sosok-register-link" href="{{ route('register.pembaca') }}">Daftar</a>
            @endauth
        </div>
    </div>
</header>

{{-- =========================================================
     HERO SECTION
========================================================= --}}
<section class="sudut-hero">
    <div class="sudut-container">
        <div class="hero-intro">
            <h1 class="hero-title">
                <i class="fa-solid fa-city" aria-hidden="true"></i>
                Sudut Kota
            </h1>
            <p class="hero-description">
                Melihat lebih dekat wajah Banjarnegara, dari hiruk-pikuk pusat kota hingga sudut-sudut kecil yang menyimpan cerita.
            </p>
            <div class="hero-line"></div>
        </div>

        <div class="sudut-grid">
            {{-- FEATURED ARTICLE --}}
            @if ($featuredArticle)
                @php
                    $featuredCover = $featuredArticle->cover_image_path
                        ? (str_starts_with($featuredArticle->cover_image_path, 'images/') ? asset($featuredArticle->cover_image_path) : asset('storage/' . $featuredArticle->cover_image_path))
                        : asset('images/bg-candiarjuna-home.jpg');
                @endphp
                <article class="featured-city">
                    <div class="featured-image-wrapper">
                        <img
                            src="{{ $featuredCover }}"
                            alt="{{ $featuredArticle->caption ?: $featuredArticle->title }}"
                            loading="lazy"
                        >
                        <span class="city-label">
                            {{ $featuredArticle->tags[0] ?? 'SUDUT KOTA' }}
                        </span>
                    </div>

                    <div class="featured-content">
                        <h2>{{ $featuredArticle->title }}</h2>
                        <p>{{ $featuredArticle->summary }}</p>

                        <div class="city-meta">
                            <span>
                                <i class="fa-regular fa-calendar" aria-hidden="true"></i>
                                {{ $featuredArticle->published_at ? $featuredArticle->published_at->translatedFormat('j F Y') : now()->translatedFormat('j F Y') }}
                            </span>
                            <span>
                                <i class="fa-regular fa-eye" aria-hidden="true"></i>
                                {{ number_format($featuredArticle->views) }} dilihat
                            </span>
                            <span>
                                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                                Banjarnegara
                            </span>
                        </div>

                        <a href="{{ route('articles.show', $featuredArticle->slug) }}" class="read-button">
                            Baca Selengkapnya
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            @else
                <article class="featured-city">
                    <div class="featured-content featured-empty">
                        <i class="fa-solid fa-newspaper" aria-hidden="true"></i>
                        <h2>Belum Ada Cerita Unggulan</h2>
                        <p>Cerita Sudut Kota yang diterbitkan akan otomatis tampil di bagian unggulan ini.</p>
                        <a href="{{ route('articles.index', ['category' => 'Sudut Kota']) }}" class="read-button">
                            Jelajahi Berita &amp; Cerita
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            @endif

            {{-- POPULAR / SUDUT PILIHAN --}}
            <aside class="city-list">
                <div class="city-list-title">
                    <h3>
                        <i class="fa-solid fa-fire" aria-hidden="true"></i>
                        Sudut Pilihan
                    </h3>
                    <a href="{{ route('articles.index', ['category' => 'Sudut Kota']) }}" class="see-all">
                        Lihat Semua &rarr;
                    </a>
                </div>

                @forelse ($popularArticles as $popular)
                    @php
                        $popularCover = $popular->cover_image_path
                            ? (str_starts_with($popular->cover_image_path, 'images/') ? asset($popular->cover_image_path) : asset('storage/' . $popular->cover_image_path))
                            : asset('images/alunalun.jpg');
                    @endphp
                    <a href="{{ route('articles.show', $popular->slug) }}" class="city-item">
                        <div class="city-number">
                            {{ $loop->iteration }}
                        </div>
                        <div class="city-image">
                            <img
                                src="{{ $popularCover }}"
                                alt="{{ $popular->caption ?: $popular->title }}"
                                loading="lazy"
                            >
                        </div>
                        <div class="city-info">
                            <h4>{{ $popular->title }}</h4>
                            <span>
                                <i class="fa-regular fa-eye" aria-hidden="true"></i>
                                {{ number_format($popular->views) }} views
                            </span>
                        </div>
                    </a>
                @empty
                    <p class="city-empty-state">Belum ada sudut pilihan yang diterbitkan.</p>
                @endforelse
            </aside>
        </div>
    </div>
</section>

{{-- =========================================================
     AREA / KATEGORI SECTION
========================================================= --}}
<section class="area-section">
    <div class="area-title">
        <div class="area-heading">
            <i class="fa-solid fa-map-location-dot" aria-hidden="true"></i>
            <h2>Jelajahi Sudut Kota</h2>
            <div class="heading-line"></div>
        </div>

        @if ($activeArea)
            <a href="{{ route('sudut-kota') }}#cerita-sudut-kota" class="area-see">
                Tampilkan Semua Area &rarr;
            </a>
        @else
            <a href="{{ route('articles.index', ['category' => 'Sudut Kota']) }}" class="area-see">
                Lihat di Indeks &rarr;
            </a>
        @endif
    </div>

    <div class="area-grid">
        @foreach ($areas as $areaItem)
            <a
                href="{{ route('sudut-kota', ['area' => $areaItem['name']]) }}#cerita-sudut-kota"
                class="area-card {{ $activeArea === $areaItem['name'] ? 'active' : '' }}"
            >
                <div class="area-icon">
                    <i class="{{ $areaItem['icon'] }}" aria-hidden="true"></i>
                </div>
                <h3>{{ $areaItem['name'] }}</h3>
                <p>{{ $areaItem['desc'] }}</p>
                <div class="area-bottom">
                    <span class="area-badge">{{ $areaItem['count'] }} artikel</span>
                    <span class="area-arrow">&rarr;</span>
                </div>
            </a>
        @endforeach
    </div>
</section>

{{-- =========================================================
     ARTIKEL SECTION (CERITA DARI SUDUT KOTA)
========================================================= --}}
<section id="cerita-sudut-kota" class="article-section">
    <div class="article-layout">
        <div class="article-main">
            <div class="article-heading">
                <div class="article-heading-left">
                    @if ($activeArea)
                        <i class="fa-solid fa-filter" aria-hidden="true"></i>
                        <h2>Cerita Area: {{ $activeArea }}</h2>
                        <a href="{{ route('sudut-kota') }}#cerita-sudut-kota" class="filter-reset-badge" title="Hapus filter area">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i> Hapus Filter
                        </a>
                    @elseif ($searchTerm)
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <h2>Pencarian: &ldquo;{{ $searchTerm }}&rdquo;</h2>
                        <a href="{{ route('sudut-kota') }}#cerita-sudut-kota" class="filter-reset-badge" title="Hapus pencarian">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i> Hapus Pencarian
                        </a>
                    @else
                        <i class="fa-regular fa-newspaper" aria-hidden="true"></i>
                        <h2>Cerita dari Sudut Kota</h2>
                    @endif
                </div>

                <a href="{{ route('articles.index', ['category' => 'Sudut Kota']) }}" class="article-see">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="article-grid">
                @forelse ($articles as $article)
                    @php
                        $articleCover = $article->cover_image_path
                            ? (str_starts_with($article->cover_image_path, 'images/') ? asset($article->cover_image_path) : asset('storage/' . $article->cover_image_path))
                            : asset('images/alunalun.jpg');
                    @endphp
                    <a href="{{ route('articles.show', $article->slug) }}" class="article-card">
                        <div class="article-image">
                            <img
                                src="{{ $articleCover }}"
                                alt="{{ $article->caption ?: $article->title }}"
                                loading="lazy"
                            >
                            <span class="article-tag">
                                {{ $article->tags[0] ?? 'KOTA' }}
                            </span>
                        </div>

                        <div class="article-content">
                            <h3>{{ $article->title }}</h3>
                            <p>{{ $article->summary }}</p>
                            <div class="article-meta">
                                <i class="fa-regular fa-clock" aria-hidden="true"></i>
                                <span>{{ $article->published_at ? $article->published_at->diffForHumans() : 'Baru saja' }}</span>
                                <span>&bull;</span>
                                <span>{{ number_format($article->views) }} views</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="article-empty">
                        <i class="fa-regular fa-folder-open" aria-hidden="true"></i>
                        <h3>Belum Ada Artikel Ditemukan</h3>
                        <p>
                            @if ($activeArea || $searchTerm)
                                Tidak ada cerita yang cocok dengan filter atau kata kunci yang dipilih. Coba reset filter untuk melihat cerita lainnya.
                            @else
                                Belum ada artikel Sudut Kota yang diterbitkan oleh redaksi.
                            @endif
                        </p>
                        @if ($activeArea || $searchTerm)
                            <a href="{{ route('sudut-kota') }}#cerita-sudut-kota" class="read-button">
                                Tampilkan Semua Cerita
                            </a>
                        @endif
                    </div>
                @endforelse
            </div>

            @if ($articles->hasPages())
                <div class="sudut-pagination">
                    {{ $articles->fragment('cerita-sudut-kota')->links() }}
                </div>
            @endif
        </div>

        {{-- TRENDING SIDEBAR --}}
        <aside class="trending">
            <div class="trending-title">
                <i class="fa-solid fa-fire" aria-hidden="true"></i>
                <h3>Trending Topik</h3>
            </div>

            @foreach ($trendingTags as $trend)
                <a
                    href="{{ route('sudut-kota', ['q' => $trend['query']]) }}#cerita-sudut-kota"
                    class="trend-item"
                >
                    <span>{{ $trend['tag'] }}</span>
                    <span class="trend-action"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></span>
                </a>
            @endforeach
        </aside>
    </div>
</section>

{{-- =========================================================
     DISCOVER CTA
========================================================= --}}
<section class="discover-section">
    <div class="discover-card">
        <div class="discover-content">
            <div class="discover-label">
                SUDUT KOTA BANJARNEGARA
            </div>
            <h2>
                Setiap sudut punya cerita,
                <span>setiap cerita punya makna.</span>
            </h2>
            <p>
                Temukan sisi lain Banjarnegara yang mungkin belum pernah kamu lihat melalui liputan, foto, dan cerita warga lokal.
            </p>
        </div>

        <a href="{{ route('articles.index', ['category' => 'Sudut Kota']) }}" class="discover-button">
            Jelajahi Semua Cerita
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</section>

{{-- =========================================================
     FOOTER
========================================================= --}}
<footer class="home-footer">
    <div class="home-footer-inner">
        <div class="home-footer-grid">
            {{-- BRAND --}}
            <div class="footer-brand-column">
                <a href="{{ route('home') }}" class="footer-brand" aria-label="Derap Serayu, beranda">
                    <div class="footer-logo-box">
                        <img src="{{ asset('images/logo.png') }}" alt="Derap Serayu">
                    </div>
                </a>

                <p class="footer-description">
                    Media informasi dan cerita Banjarnegara yang menghadirkan berita, budaya, wisata, potensi, serta kisah dari masyarakat.
                </p>

                <div class="footer-social">
                    <a href="https://www.instagram.com/kabupatenbanjarnegara/" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/" target="_blank" rel="noopener noreferrer" aria-label="Facebook Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="YouTube Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                    <a href="https://www.tiktok.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="TikTok Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                    <a href="https://x.com/pemkab_bna" target="_blank" rel="noopener noreferrer" aria-label="X Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                </div>
            </div>

            {{-- JELAJAHI --}}
            <div class="footer-link-column">
                <h3>Jelajahi</h3>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('articles.index') }}">Berita</a>
                <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                <a href="{{ route('sosok') }}">Sosok</a>
                <a href="{{ route('opini') }}">Opini</a>
                <a href="{{ route('sudut-kota') }}" aria-current="page">Sudut Kota</a>
            </div>

            {{-- INFORMASI --}}
            <div class="footer-link-column">
                <h3>Informasi</h3>
                <a href="{{ route('potensi') }}">Potensi</a>
                <a href="{{ route('teknologi') }}">Teknologi</a>
                <a href="{{ route('humor') }}">Humor</a>
                <a href="{{ route('about') }}">Tentang Kami</a>
            </div>

            {{-- LAYANAN --}}
            <div class="footer-link-column">
                <h3>Layanan</h3>
                <a href="https://ppid.banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">PPID</a>
                <a href="https://www.instagram.com/mpp.banjarnegara/" target="_blank" rel="noopener noreferrer">Layanan Publik</a>
                <a href="https://banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">Kontak</a>
                <a href="{{ route('login') }}">Masuk</a>
                <a href="{{ route('register.pembaca') }}">Daftar</a>
            </div>

            {{-- NEWSLETTER --}}
            <div class="footer-newsletter">
                <div class="newsletter-label">TETAP TERHUBUNG</div>
                <h2>Cerita Banjarnegara, <span>langsung ke kamu.</span></h2>
                <p>Dapatkan informasi dan cerita terbaru seputar Banjarnegara.</p>

                <form class="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email kamu"
                        aria-label="Alamat email untuk newsletter"
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
                    <p class="newsletter-feedback" role="alert">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- QUOTE --}}
        <div class="footer-quote-section">
            <div class="footer-quote-mark">&ldquo;</div>
            <div class="footer-quote">
                Dari gunung hingga lembah, setiap sudut Banjarnegara punya cerita.
            </div>
            <div class="footer-quote-author">
                DERAP SERAYU &mdash; BANJARNEGARA
            </div>
        </div>

        {{-- BOTTOM --}}
        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; {{ now()->year }} Derap Serayu. Semua hak dilindungi.
            </div>

            <div class="footer-policy">
                <a href="{{ route('information.privacy') }}">Kebijakan Privasi</a>
                <a href="{{ route('information.terms') }}">Syarat &amp; Ketentuan</a>
                <a href="{{ route('information.editorial') }}">Pedoman Media Siber</a>
            </div>

            <div class="footer-made">
                Dibuat untuk <strong>Banjarnegara</strong> &hearts;
            </div>
        </div>
    </div>
</footer>

{{-- =========================================================
     WEATHER SCRIPT
========================================================= --}}
<script>
    async function updateSudutKotaTopbarWeather() {
        const weatherIcon = document.getElementById("WeatherIcon");
        const temperature = document.getElementById("Temperature");
        if (!weatherIcon || !temperature) return;

        const url = "https://api.open-meteo.com/v1/forecast?latitude=-7.2096&longitude=109.9156&current=temperature_2m,weather_code&timezone=Asia%2FJakarta";
        const weatherIcons = new Map([
            [0, "☀️"], [1, "🌤️"], [2, "⛅"], [3, "☁️"],
            [45, "🌫️"], [48, "🌫️"], [51, "🌦️"], [53, "🌦️"],
            [55, "🌧️"], [61, "🌧️"], [63, "🌧️"], [65, "🌧️"],
            [71, "🌨️"], [73, "🌨️"], [75, "❄️"], [80, "🌦️"],
            [81, "🌧️"], [82, "⛈️"], [95, "⛈️"], [96, "⛈️"], [99, "⛈️"],
        ]);

        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Weather request failed with status ${response.status}`);
            }

            const payload = await response.json();
            const current = payload.current;

            if (!current || !Number.isFinite(current.temperature_2m) || !Number.isFinite(current.weather_code)) {
                throw new Error("Weather response did not contain valid current conditions.");
            }

            weatherIcon.textContent = weatherIcons.get(current.weather_code) || "🌤️";
            temperature.textContent = `${Math.round(current.temperature_2m)}°C`;
        } catch (error) {
            console.error("Unable to load Sudut Kota topbar weather.", error);
            weatherIcon.textContent = "❔";
            temperature.textContent = "Cuaca tidak tersedia";
        }
    }

    updateSudutKotaTopbarWeather();
</script>

</body>
</html>
