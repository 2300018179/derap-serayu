<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potensi | Derap Serayu</title>

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
            height: max(100vh, 690px);
            background:
                linear-gradient(
                    180deg,
                    rgba(220, 246, 251, .72),
                    rgba(239, 249, 252, .92) 42%,
                ),
                url("{{ asset('images/atasawan.jpg') }}");
            background-size: cover;
            background-position: center top;
            z-index: 0;
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
           HEADER
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
        .potensi-hero {
            position: relative;
            padding: 40px 6.5% 30px;
            background: transparent;
        }

        .potensi-container {
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
            color:#063f5e;
            font-size: 14px;
            max-width: 560px;
            line-height: 1.6;
            margin-top: 12px;
        }

        .hero-line {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--cyan), transparent);
            margin-top: 14px;
            border-radius: 2px;
        }

        .potensi-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(0, 1fr);
            gap: 28px;
            align-items: stretch;
        }

        /* FEATURED CARD */
        .featured-card {
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

        .featured-card:hover {
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

        .featured-card:hover .featured-image-wrapper img {
            transform: scale(1.04);
        }

        .card-label {
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

        .card-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 24px;
            margin-top: auto;
        }

        .card-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .card-meta span i {
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

        /* POPULAR LIST */
        .popular-list {
            background: #fff;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.9);
            box-shadow: var(--shadow-md);
            padding: 24px 22px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .popular-list-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-light);
        }

        .popular-list-title h3 {
            font-size: 17px;
            font-weight: 700;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .popular-list-title h3 i {
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

        .popular-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 10px;
            border-radius: 16px;
            transition: background .2s, transform .2s;
            text-decoration: none;
            color: inherit;
        }

        .popular-item:hover {
            background: var(--cyan-soft);
            transform: translateX(4px);
        }

        .popular-number {
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

        .popular-image {
            width: 68px;
            height: 68px;
            border-radius: 14px;
            overflow: hidden;
            flex-shrink: 0;
            background: #eaf3f6;
        }

        .popular-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .popular-info {
            flex: 1;
            min-width: 0;
        }

        .popular-info h4 {
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

        .popular-info span {
            font-size: 11px;
            color: var(--muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .empty-state {
            padding: 30px 10px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }

        /* =========================================================
           SECTORS / KATEGORI SECTION
        ========================================================= */
        .sectors-section {
            padding: 36px 6.5%;
            max-width: 1300px;
            margin: 0 auto;
        }

        .sectors-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .sectors-heading {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sectors-heading i {
            color: var(--cyan);
            font-size: 22px;
        }

        .sectors-heading h2 {
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

        .sectors-see {
            font-size: 12px;
            font-weight: 700;
            color: var(--cyan);
            transition: color .2s;
        }

        .sectors-see:hover {
            color: var(--cyan-dark);
        }

        .sectors-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 16px;
        }

        .sector-card {
            background: #fff;
            border: 1px solid var(--border-light);
            border-radius: 20px;
            padding: 20px 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            box-shadow: var(--shadow-sm);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
            text-decoration: none;
            color: inherit;
            position: relative;
        }

        .sector-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--cyan);
        }

        .sector-card.active {
            background: linear-gradient(135deg, var(--cyan), var(--cyan-dark));
            color: #fff;
            border-color: var(--cyan-dark);
            box-shadow: 0 10px 24px rgba(8, 173, 213, .35);
        }

        .sector-icon {
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

        .sector-card.active .sector-icon {
            background: rgba(255, 255, 255, 0.22);
            color: #fff;
        }

        .sector-card h3 {
            font-size: 15px;
            font-weight: 700;
            color: inherit;
        }

        .sector-card p {
            font-size: 11px;
            color: var(--muted);
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .sector-card.active p {
            color: rgba(255, 255, 255, 0.9);
        }

        .sector-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 6px;
            padding-top: 8px;
            border-top: 1px solid var(--border-light);
        }

        .sector-card.active .sector-bottom {
            border-top-color: rgba(255, 255, 255, 0.2);
        }

        .sector-badge {
            font-size: 10px;
            font-weight: 700;
            color: var(--cyan-dark);
            background: var(--cyan-soft);
            padding: 3px 7px;
            border-radius: 12px;
        }

        .sector-card.active .sector-badge {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
        }

        .sector-arrow {
            font-size: 14px;
            color: var(--cyan);
            font-weight: 800;
            transition: transform .2s;
        }

        .sector-card:hover .sector-arrow {
            transform: translateX(4px);
        }

        .sector-card.active .sector-arrow {
            color: #fff;
        }

        /* =========================================================
           ARTICLE SECTION
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
        .potensi-pagination {
            display: flex;
            justify-content: center;
            margin-top: 32px;
            width: 100%;
        }

        .potensi-pagination nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            width: 100%;
        }

        .potensi-pagination nav > div:first-child {
            display: none !important;
        }

        .potensi-pagination nav > div:last-child {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .potensi-pagination p {
            font-size: 12px;
            color: var(--muted);
            margin: 0;
            text-align: center;
        }

        .potensi-pagination span.relative.z-0,
        .potensi-pagination span.inline-flex {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: none;
            background: transparent;
        }

        .potensi-pagination a,
        .potensi-pagination span[aria-current="page"] > span,
        .potensi-pagination span[aria-disabled="true"] > span {
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

        .potensi-pagination a:hover {
            border-color: var(--cyan);
            color: var(--cyan-dark);
            background: var(--cyan-soft);
        }

        .potensi-pagination span[aria-current="page"] {
            display: inline-flex;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .potensi-pagination span[aria-current="page"] > span {
            background: var(--cyan);
            border-color: var(--cyan);
            color: #fff;
        }

        .potensi-pagination span[aria-disabled="true"] {
            display: inline-flex;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .potensi-pagination span[aria-disabled="true"] > span {
            opacity: 0.5;
            background: #f7fbfc;
            cursor: not-allowed;
            color: var(--muted);
        }

        .potensi-pagination svg {
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
           STATISTIK POTENSI SECTION
        ========================================================= */
        .stats-section {
            padding: 20px 6.5% 40px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .stats-inner {
            background: #fff;
            border: 1px solid var(--border-light);
            border-radius: 24px;
            box-shadow: var(--shadow-sm);
            padding: 36px 40px;
            display: grid;
            grid-template-columns: 1.8fr 1fr 1fr 1fr 1fr;
            gap: 24px;
            align-items: center;
        }

        .stats-intro small {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: var(--cyan);
            text-transform: uppercase;
        }

        .stats-intro h3 {
            font-family: "Playfair Display", serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--navy);
            margin: 6px 0;
            line-height: 1.3;
        }

        .stats-intro p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
        }

        .stat-box {
            text-align: center;
            padding: 16px 12px;
            border-radius: 18px;
            background: var(--cyan-soft);
            transition: transform .2s;
        }

        .stat-box:hover {
            transform: translateY(-3px);
        }

        .stat-number {
            font-family: "Playfair Display", serif;
            font-size: 32px;
            font-weight: 800;
            color: var(--navy);
            line-height: 1;
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--cyan-dark);
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        /* =========================================================
           DISCOVER CTA SECTION
        ========================================================= */
        .discover-section {
            padding: 20px 6.5% 60px;
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
            font-size: 16px;
            color: #fff;
            margin-bottom: 17px;
            font-family: "Playfair Display", serif;
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

            padding-left: 5px;
        }

        .newsletter-label {

            color: #55d9f4;

            font-size: 7px;

            font-weight: 800;

            letter-spacing: 2px;

            margin-bottom: 9px;
        }

        .footer-newsletter h2 {

            font-family: "Playfair Display", serif;

            font-size: 22px;

            line-height: 1.25;

            max-width: 280px;
        }

        .footer-newsletter h2 span {

            color: #08b9df;
        }

        .footer-newsletter p {

            color: #a6c6cf;

            font-size: 8px;

            line-height: 1.6;

            margin-top: 8px;

            max-width: 260px;
        }

        .newsletter-form {

            height: 42px;

            max-width: 280px;

            margin-top: 13px;

            padding: 3px 3px 3px 12px;

            display: flex;

            align-items: center;

            border-radius: 12px;

            background: rgba(255,255,255,.08);

            border: 1px solid rgba(255,255,255,.12);
        }

        .newsletter-form input {

            flex: 1;

            min-width: 0;

            border: 0;

            outline: 0;

            background: transparent;

            color: white;

            font-size: 8px;
        }

        .newsletter-form input::placeholder {

            color: #7ea5b1;
        }

        .newsletter-form button {

            width: 35px;

            height: 35px;

            border: 0;

            border-radius: 9px;

            background: #08b5dc;

            color: white;

            cursor: pointer;
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
            font-size: 43px;
            color: #08add5;
            line-height: 25px;
        }

        .footer-quote {
            font-family: "Playfair Display", serif;
            font-size: 21px;
            font-style: italic;
            color: #e0f2f7;
            margin: 5px auto 9px;
            max-width: 650px;
            line-height: 1.5;
        }

        .footer-quote-author {
            font-size: 7px;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, 0.35);
            font-weight: 800;
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
            .potensi-grid {
                gap: 20px;
            }

            .sectors-grid {
                grid-template-columns: repeat(3, 1fr);
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

            .stats-inner {
                grid-template-columns: 1fr repeat(4, 1fr);
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

            .potensi-hero,
            .sectors-section,
            .article-section,
            .stats-section,
            .discover-section {
                padding-left: 20px;
                padding-right: 20px;
            }

            .potensi-grid {
                grid-template-columns: 1fr;
            }

            .article-layout {
                grid-template-columns: 1fr;
            }

            .trending {
                position: static;
                margin-top: 10px;
            }

            .stats-inner {
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }

            .stats-intro {
                grid-column: span 2;
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

            .sectors-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }

            .sector-card {
                padding: 16px 14px;
            }

            .article-grid {
                grid-template-columns: 1fr;
            }

            .stats-inner {
                grid-template-columns: 1fr;
                padding: 24px 20px;
            }

            .stats-intro {
                grid-column: auto;
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

            .sectors-grid {
                grid-template-columns: 1fr;
            }

            .featured-content h2 {
                font-size: 20px;
            }

            .featured-content p {
                font-size: 13px;
            }

            .popular-item {
                gap: 10px;
            }

            .popular-image {
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
            <a href="{{ route('galeri') }}">Galeri</a>
            <details class="sosok-nav-dropdown">
                <summary><i class="fa-solid fa-water" aria-hidden="true"></i> Jelajahi <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></summary>
                <div class="sosok-nav-dropdown-menu">
                    <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                    <a href="{{ route('opini') }}">Opini</a>
                    <a href="{{ route('sosok') }}">Sosok</a>
                    <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                    <a class="active" href="{{ route('potensi') }}" aria-current="page">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>
            </details>
        </nav>

        <form class="sosok-search" action="{{ route('potensi') }}" method="GET" role="search">
            <label class="sosok-visually-hidden" for="potensi-search">Cari artikel potensi</label>
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            <input id="potensi-search" type="search" name="q" value="{{ request('q') }}" placeholder="Cari potensi Banjarnegara..." maxlength="100">
            @if(request('sektor'))
                <input type="hidden" name="sektor" value="{{ request('sektor') }}">
            @endif
            <button type="submit">Cari</button>
        </form>

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

{{-- =========================================================
     HERO SECTION
========================================================= --}}
<section class="potensi-hero">
    <div class="potensi-container">
        <div class="hero-intro">
            <h1 class="hero-title">
                <i class="fa-solid fa-mountain-sun" aria-hidden="true"></i>
                Potensi Daerah
            </h1>
            <p class="hero-description">
                Dari tanah yang subur, kekayaan alam pegunungan, hingga kreativitas tanpa batas para perajin dan pelaku UMKM lokal Banjarnegara.
            </p>
            <div class="hero-line"></div>
        </div>

        <div class="potensi-grid">
            {{-- FEATURED ARTICLE --}}
            @if ($featuredArticle)
                @php
                    $featuredCover = $featuredArticle->cover_image_path
                        ? (str_starts_with($featuredArticle->cover_image_path, 'images/') ? asset($featuredArticle->cover_image_path) : asset('storage/' . $featuredArticle->cover_image_path))
                        : asset('images/kentang.jpg');
                @endphp
                <article class="featured-card">
                    <div class="featured-image-wrapper">
                        <img
                            src="{{ $featuredCover }}"
                            alt="{{ $featuredArticle->caption ?: $featuredArticle->title }}"
                            loading="lazy"
                        >
                        <span class="card-label">
                            {{ $featuredArticle->tags[0] ?? 'POTENSI UNGGULAN' }}
                        </span>
                    </div>

                    <div class="featured-content">
                        <h2>{{ $featuredArticle->title }}</h2>
                        <p>{{ $featuredArticle->summary }}</p>

                        <div class="card-meta">
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
                <article class="featured-card">
                    <div class="featured-content featured-empty">
                        <i class="fa-solid fa-seedling" aria-hidden="true"></i>
                        <h2>Belum Ada Potensi Unggulan</h2>
                        <p>Artikel Potensi yang diterbitkan oleh redaksi akan otomatis tampil di bagian unggulan ini.</p>
                        <a href="{{ route('articles.index', ['category' => 'Potensi']) }}" class="read-button">
                            Jelajahi Berita &amp; Artikel
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            @endif

            {{-- POPULAR POTENSI --}}
            <aside class="popular-list">
                <div class="popular-list-title">
                    <h3>
                        <i class="fa-solid fa-fire" aria-hidden="true"></i>
                        Potensi Populer
                    </h3>
                    <a href="{{ route('articles.index', ['category' => 'Potensi']) }}" class="see-all">
                        Lihat Semua &rarr;
                    </a>
                </div>

                @forelse ($popularArticles as $popular)
                    @php
                        $popularCover = $popular->cover_image_path
                            ? (str_starts_with($popular->cover_image_path, 'images/') ? asset($popular->cover_image_path) : asset('storage/' . $popular->cover_image_path))
                            : asset('images/dawet.jpg');
                    @endphp
                    <a href="{{ route('articles.show', $popular->slug) }}" class="popular-item">
                        <div class="popular-number">
                            {{ $loop->iteration }}
                        </div>
                        <div class="popular-image">
                            <img
                                src="{{ $popularCover }}"
                                alt="{{ $popular->caption ?: $popular->title }}"
                                loading="lazy"
                            >
                        </div>
                        <div class="popular-info">
                            <h4>{{ $popular->title }}</h4>
                            <span>
                                <i class="fa-regular fa-eye" aria-hidden="true"></i>
                                {{ number_format($popular->views) }} views
                            </span>
                        </div>
                    </a>
                @empty
                    <p class="empty-state">Belum ada potensi populer yang diterbitkan.</p>
                @endforelse
            </aside>
        </div>
    </div>
</section>

{{-- =========================================================
     SECTORS / KATEGORI SECTION
========================================================= --}}
<section class="sectors-section">
    <div class="sectors-title">
        <div class="sectors-heading">
            <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
            <h2>Sektor &amp; Komoditas Unggulan</h2>
            <div class="heading-line"></div>
        </div>

        @if ($activeSektor)
            <a href="{{ route('potensi') }}#cerita-potensi" class="sectors-see">
                Tampilkan Semua Sektor &rarr;
            </a>
        @else
            <a href="{{ route('articles.index', ['category' => 'Potensi']) }}" class="sectors-see">
                Lihat di Indeks &rarr;
            </a>
        @endif
    </div>

    <div class="sectors-grid">
        @foreach ($sectors as $sectorItem)
            <a
                href="{{ route('potensi', ['sektor' => $sectorItem['name']]) }}#cerita-potensi"
                class="sector-card {{ $activeSektor === $sectorItem['name'] ? 'active' : '' }}"
            >
                <div class="sector-icon">
                    <i class="{{ $sectorItem['icon'] }}" aria-hidden="true"></i>
                </div>
                <h3>{{ $sectorItem['name'] }}</h3>
                <p>{{ $sectorItem['desc'] }}</p>
                <div class="sector-bottom">
                    <span class="sector-badge">{{ $sectorItem['count'] }} artikel</span>
                    <span class="sector-arrow">&rarr;</span>
                </div>
            </a>
        @endforeach
    </div>
</section>

{{-- =========================================================
     ARTIKEL SECTION (EKSPLORASI POTENSI DAERAH)
========================================================= --}}
<section id="cerita-potensi" class="article-section">
    <div class="article-layout">
        <div class="article-main">
            <div class="article-heading">
                <div class="article-heading-left">
                    @if ($activeSektor)
                        <i class="fa-solid fa-filter" aria-hidden="true"></i>
                        <h2>Sektor: {{ $activeSektor }}</h2>
                        <a href="{{ route('potensi') }}#cerita-potensi" class="filter-reset-badge" title="Hapus filter sektor">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i> Hapus Filter
                        </a>
                    @elseif ($searchTerm)
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <h2>Pencarian: &ldquo;{{ $searchTerm }}&rdquo;</h2>
                        <a href="{{ route('potensi') }}#cerita-potensi" class="filter-reset-badge" title="Hapus pencarian">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i> Hapus Pencarian
                        </a>
                    @else
                        <i class="fa-regular fa-newspaper" aria-hidden="true"></i>
                        <h2>Eksplorasi Potensi Daerah</h2>
                    @endif
                </div>

                <a href="{{ route('articles.index', ['category' => 'Potensi']) }}" class="article-see">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="article-grid">
                @forelse ($articles as $article)
                    @php
                        $articleCover = $article->cover_image_path
                            ? (str_starts_with($article->cover_image_path, 'images/') ? asset($article->cover_image_path) : asset('storage/' . $article->cover_image_path))
                            : asset('images/kentang.jpg');
                    @endphp
                    <a href="{{ route('articles.show', $article->slug) }}" class="article-card">
                        <div class="article-image">
                            <img
                                src="{{ $articleCover }}"
                                alt="{{ $article->caption ?: $article->title }}"
                                loading="lazy"
                            >
                            <span class="article-tag">
                                {{ $article->tags[0] ?? 'POTENSI' }}
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
                            @if ($activeSektor || $searchTerm)
                                Tidak ada artikel potensi yang cocok dengan filter atau kata kunci yang dipilih. Coba reset filter untuk melihat potensi lainnya.
                            @else
                                Belum ada artikel Potensi yang diterbitkan oleh redaksi.
                            @endif
                        </p>
                        @if ($activeSektor || $searchTerm)
                            <a href="{{ route('potensi') }}#cerita-potensi" class="read-button">
                                Tampilkan Semua Potensi
                            </a>
                        @endif
                    </div>
                @endforelse
            </div>

            @if ($articles->hasPages())
                <div class="potensi-pagination">
                    {{ $articles->fragment('cerita-potensi')->links() }}
                </div>
            @endif
        </div>

        {{-- TRENDING SIDEBAR --}}
        <aside class="trending">
            <div class="trending-title">
                <i class="fa-solid fa-fire" aria-hidden="true"></i>
                <h3>Topik Populer</h3>
            </div>

            @foreach ($trendingTags as $trend)
                <a
                    href="{{ route('potensi', ['q' => $trend['query']]) }}#cerita-potensi"
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
     STATISTIK POTENSI SECTION
========================================================= --}}
<section class="stats-section">
    <div class="stats-inner">
        <div class="stats-intro">
            <small>SEKILAS BANJARNEGARA</small>
            <h3>Potensi yang Terus Bertumbuh</h3>
            <p>Kekayaan bentang alam dan etos kerja masyarakat bersatu padu membangun kemandirian ekonomi daerah.</p>
        </div>

        <div class="stat-box">
            <div class="stat-number">20</div>
            <div class="stat-label">Kecamatan</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">278</div>
            <div class="stat-label">Desa</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">14</div>
            <div class="stat-label">Kelurahan</div>
        </div>

        <div class="stat-box">
            <div class="stat-number">&infin;</div>
            <div class="stat-label">Peluang &amp; Potensi</div>
        </div>
    </div>
</section>

{{-- =========================================================
     DISCOVER CTA
========================================================= --}}
<section class="discover-section">
    <div class="discover-card">
        <div class="discover-content">
            <div class="discover-label">
                POTENSI BANJARNEGARA
            </div>
            <h2>
                Setiap jengkal tanah,
                <span>menyimpan masa depan.</span>
            </h2>
            <p>
                Dari pegunungan Dieng hingga lembah Serayu, temukan kisah inspiratif dari para pelaku usaha, petani, dan perajin yang terus berkarya.
            </p>
        </div>

        <a href="{{ route('articles.index', ['category' => 'Potensi']) }}" class="discover-button">
            Jelajahi Semua Potensi
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
            <div class="footer-link-column">
                <h3>Informasi</h3>
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

                <div class="newsletter-label">
                    TETAP TERHUBUNG
                </div>

                <h2>

                    Cerita Banjarnegara,
                    <span>langsung ke kamu.</span>

                </h2>

                <p>

                    Dapatkan informasi dan cerita terbaru
                    seputar Banjarnegara.

                </p>


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
                        <i class="fa-solid fa-arrow-right"></i>
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
    async function updatePotensiTopbarWeather() {
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
            console.error("Unable to load Potensi topbar weather.", error);
            weatherIcon.textContent = "❔";
            temperature.textContent = "Cuaca tidak tersedia";
        }
    }

    updatePotensiTopbarWeather();
</script>

</body>
</html>
