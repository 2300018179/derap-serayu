<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teknologi | Derap Serayu</title>

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
                    rgba(239, 249, 252, .92) 45%,
                    #f5fbfd 100%
                ),
                url("{{ asset('images/teknologi.jpg') }}");
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
        .teknologi-hero {
            position: relative;
            padding: 40px 6.5% 30px;
            background: transparent;
        }

        .teknologi-container {
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
            color: #063f5e;
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

        .teknologi-grid {
            display: grid;
            grid-template-columns: 1.25fr 0.95fr;
            gap: 32px;
            align-items: stretch;
        }

        /* FEATURED CARD */
        .featured-card {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            display: flex;
            flex-direction: column;
            transition: transform .25s, box-shadow .25s;
        }

        .featured-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .featured-img-wrap {
            position: relative;
            height: 330px;
            overflow: hidden;
            background: #d8edf4;
        }

        .featured-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s cubic-bezier(.25,1,.5,1);
        }

        .featured-card:hover .featured-img {
            transform: scale(1.05);
        }

        .featured-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--navy);
            color: #fff;
            font-size: 11px;
            font-weight: 800;
            padding: 6px 14px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
            letter-spacing: .5px;
            box-shadow: 0 4px 12px rgba(0,0,0,.2);
        }

        .featured-badge i {
            color: #facc15;
        }

        .featured-body {
            padding: 28px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .featured-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .featured-meta span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .featured-title {
            font-family: "Playfair Display", serif;
            font-size: 26px;
            font-weight: 700;
            line-height: 1.35;
            color: var(--navy);
            margin-bottom: 12px;
            transition: color .2s;
        }

        .featured-card:hover .featured-title {
            color: var(--cyan);
        }

        .featured-snippet {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 24px;
            flex-grow: 1;
        }

        .featured-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid var(--border-light);
            padding-top: 18px;
            margin-top: auto;
        }

        .featured-author {
            font-size: 12px;
            font-weight: 700;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .author-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--cyan);
        }

        .read-btn {
            background: var(--cyan-soft);
            color: var(--cyan-dark);
            padding: 9px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all .2s;
        }

        .featured-card:hover .read-btn {
            background: var(--cyan);
            color: #fff;
        }

        /* POPULAR COLUMN */
        .popular-column {
            background: #fff;
            border-radius: 24px;
            padding: 28px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
        }

        .popular-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            padding-bottom: 16px;
            border-bottom: 2px solid var(--cyan-soft);
        }

        .popular-title {
            font-family: "Playfair Display", serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .popular-title i {
            color: #f97316;
        }

        .popular-badge {
            background: var(--cyan-soft);
            color: var(--cyan-dark);
            font-size: 10px;
            font-weight: 800;
            padding: 4px 10px;
            border-radius: 12px;
            letter-spacing: .5px;
        }

        .popular-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            flex-grow: 1;
        }

        .popular-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px;
            border-radius: 16px;
            text-decoration: none;
            transition: background .2s, transform .2s;
            border: 1px solid transparent;
        }

        .popular-item:hover {
            background: var(--cyan-bg);
            border-color: var(--border-light);
            transform: translateX(4px);
        }

        .popular-number {
            font-family: "Playfair Display", serif;
            font-size: 22px;
            font-weight: 800;
            color: #9fb9c9;
            width: 26px;
            flex-shrink: 0;
            line-height: 1;
            margin-top: 4px;
        }

        .popular-item:hover .popular-number {
            color: var(--cyan);
        }

        .popular-img-wrap {
            width: 76px;
            height: 76px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
            background: #e2f2f7;
        }

        .popular-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s;
        }

        .popular-item:hover .popular-img {
            transform: scale(1.08);
        }

        .popular-info {
            flex-grow: 1;
            min-width: 0;
        }

        .popular-tag {
            font-size: 10px;
            font-weight: 800;
            color: var(--cyan-dark);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
            display: inline-block;
        }

        .popular-item-title {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--navy);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 6px;
            transition: color .2s;
        }

        .popular-item:hover .popular-item-title {
            color: var(--cyan);
        }

        .popular-meta {
            font-size: 11px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* =========================================================
           TOPICS / CATEGORIES SECTION
        ========================================================= */
        .topics-section {
            padding: 30px 6.5% 20px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .section-header-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
            flex-wrap: wrap;
        }

        .section-heading-group small {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            color: var(--cyan);
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-heading-group h3 {
            font-family: "Playfair Display", serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--navy);
            margin-top: 4px;
        }

        .filter-reset-link {
            font-size: 12px;
            font-weight: 700;
            color: #dc2626;
            background: #fee2e2;
            padding: 6px 14px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: background .2s;
        }

        .filter-reset-link:hover {
            background: #fecaca;
        }

        .topics-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
        }

        .topic-card {
            background: #fff;
            border: 1px solid var(--border-light);
            border-radius: 18px;
            padding: 20px 16px;
            text-decoration: none;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all .25s ease;
            position: relative;
            overflow: hidden;
        }

        .topic-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--cyan);
        }

        .topic-card.active {
            background: linear-gradient(135deg, #074567 0%, #032b42 100%);
            border-color: #074567;
            box-shadow: 0 10px 24px rgba(7, 69, 103, 0.25);
        }

        .topic-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: var(--cyan-soft);
            color: var(--cyan-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 12px;
            transition: transform .25s;
        }

        .topic-card:hover .topic-icon-wrap {
            transform: scale(1.1);
        }

        .topic-card.active .topic-icon-wrap {
            background: rgba(255, 255, 255, 0.15);
            color: var(--cyan-light);
        }

        .topic-card-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .topic-card.active .topic-card-name {
            color: #fff;
        }

        .topic-card-desc {
            font-size: 11px;
            color: var(--muted);
            line-height: 1.4;
            display: none;
        }

        .topic-card-count {
            margin-top: 8px;
            font-size: 10px;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 12px;
            background: var(--cyan-bg);
            color: var(--cyan-dark);
        }

        .topic-card.active .topic-card-count {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        /* =========================================================
           EXPLORE ARTICLES SECTION
        ========================================================= */
        .explore-section {
            padding: 30px 6.5% 50px;
            max-width: 1300px;
            margin: 0 auto;
        }

        .explore-layout {
            display: grid;
            grid-template-columns: 1fr 310px;
            gap: 32px;
            align-items: start;
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .article-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            transition: transform .25s, box-shadow .25s;
        }

        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
        }

        .article-card-thumb {
            position: relative;
            height: 190px;
            overflow: hidden;
            background: #e2f2f7;
        }

        .article-card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s;
        }

        .article-card:hover .article-card-thumb img {
            transform: scale(1.06);
        }

        .article-tag-badge {
            position: absolute;
            bottom: 12px;
            left: 12px;
            background: rgba(7, 63, 94, 0.88);
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            padding: 4px 10px;
            border-radius: 12px;
            backdrop-filter: blur(4px);
        }

        .article-card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .article-card-meta {
            font-size: 11px;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .article-card-title {
            font-family: "Playfair Display", serif;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--navy);
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color .2s;
        }

        .article-card:hover .article-card-title {
            color: var(--cyan);
        }

        .article-card-desc {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.55;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 16px;
            flex-grow: 1;
        }

        .article-card-footer {
            border-top: 1px solid var(--border-light);
            padding-top: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
            margin-top: auto;
        }

        .author-name-text {
            font-weight: 700;
            color: var(--navy);
            max-width: 130px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card-more-link {
            color: var(--cyan-dark);
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: color .2s;
        }

        .article-card:hover .card-more-link {
            color: var(--cyan);
        }

        /* PAGINATION */
        .pagination-wrap {
            margin-top: 36px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .pagination-wrap nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            width: 100%;
        }

        .pagination-wrap nav > div:first-child {
            display: none !important;
        }

        .pagination-wrap nav > div:last-child {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            width: 100%;
        }

        .pagination-wrap p {
            font-size: 12px;
            color: var(--muted);
            margin: 0;
            text-align: center;
        }

        .pagination-wrap span.relative.z-0,
        .pagination-wrap span.inline-flex {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: none;
            background: transparent;
        }

        .pagination-wrap a,
        .pagination-wrap span[aria-current="page"] > span,
        .pagination-wrap span[aria-disabled="true"] > span {
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

        .pagination-wrap a:hover {
            border-color: var(--cyan);
            color: var(--cyan-dark);
            background: var(--cyan-soft);
        }

        .pagination-wrap span[aria-current="page"] {
            display: inline-flex;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .pagination-wrap span[aria-current="page"] > span {
            background: var(--cyan);
            border-color: var(--cyan);
            color: #fff;
        }

        .pagination-wrap span[aria-disabled="true"] {
            display: inline-flex;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
        }

        .pagination-wrap span[aria-disabled="true"] > span {
            opacity: 0.5;
            background: #f7fbfc;
            cursor: not-allowed;
            color: var(--muted);
        }

        .pagination-wrap svg {
            width: 14px;
            height: 14px;
            display: inline-block;
        }

        /* EMPTY STATE */
        .empty-state {
            grid-column: 1 / -1;
            background: #fff;
            border: 1px solid var(--border-light);
            border-radius: 20px;
            padding: 48px 24px;
            text-align: center;
            box-shadow: var(--shadow-sm);
        }

        .empty-icon {
            font-size: 42px;
            color: var(--cyan);
            margin-bottom: 16px;
        }

        .empty-state h4 {
            font-family: "Playfair Display", serif;
            font-size: 20px;
            color: var(--navy);
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 13px;
            color: var(--muted);
            max-width: 420px;
            margin: 0 auto 20px;
        }

        /* SIDEBAR WIDGETS */
        .explore-sidebar {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .side-widget {
            background: #fff;
            border: 1px solid var(--border-light);
            border-radius: 22px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
        }

        .widget-title {
            font-family: "Playfair Display", serif;
            font-size: 17px;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .widget-title i {
            color: var(--cyan);
            font-size: 15px;
        }

        .tech-tags-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .tech-tag-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 12px;
            border-radius: 12px;
            background: var(--cyan-bg);
            color: var(--navy);
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s, color .2s, transform .2s;
        }

        .tech-tag-item:hover {
            background: var(--cyan-soft);
            color: var(--cyan-dark);
            transform: translateX(3px);
        }

        .tech-tag-action {
            font-size: 11px;
            color: var(--muted);
            transition: color .2s;
        }

        .tech-tag-item:hover .tech-tag-action {
            color: var(--cyan-dark);
        }

        /* =========================================================
           STATISTIK TEKNOLOGI SECTION
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
            color: #c5e6f3;
            font-size: 14px;
            line-height: 1.6;
        }

        .discover-btn {
            background: var(--cyan);
            color: #fff;
            padding: 13px 26px;
            border-radius: 24px;
            font-size: 13px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(8, 173, 213, 0.35);
            transition: all .2s;
            white-space: nowrap;
            z-index: 1;
        }

        .discover-btn:hover {
            background: var(--cyan-light);
            color: var(--navy-dark);
            transform: translateY(-2px);
        }

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
            max-width: 650px;
            font-family: "Playfair Display", serif;
            font-size: 21px;
            font-style: italic;
            color: #e0f2f7;
            line-height: 1.5;
            margin: 5px auto 9px;
        }

        .footer-quote-author {
            font-size: 7px;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, .35);
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
            .teknologi-grid {
                gap: 20px;
            }

            .topics-grid {
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
                padding: 12px 16px;
                border-radius: 20px;
            }

            .sosok-brand img {
                width: 150px;
            }

            .sosok-main-nav {
                grid-column: 1 / -1;
                grid-row: 2;
                justify-content: flex-start;
                flex-wrap: wrap;
                width: 100%;
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

        @media (max-width: 992px) {
            .teknologi-grid {
                grid-template-columns: 1fr;
            }

            .explore-layout {
                grid-template-columns: 1fr;
            }

            .stats-inner {
                grid-template-columns: 1fr 1fr;
            }

            .home-footer-grid {
                grid-template-columns: 1fr 1fr;
            }

            .footer-newsletter {
                grid-column: span 2;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 30px;
            }

            .topics-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .article-grid {
                grid-template-columns: 1fr;
            }

            .discover-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 30px;
            }

            .home-footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-newsletter {
                grid-column: span 1;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                display: none;
            }

            .featured-img-wrap {
                height: 220px;
            }

            .stats-inner {
                grid-template-columns: 1fr;
                padding: 24px;
            }

            .sosok-search {
                display: none;
            }
        }
    </style>
</head>

<body>

    {{-- TOPBAR DENGAN CUACA LIVE DARI OPEN-METEO --}}
    <div class="topbar">
        <div class="topbar-left">
            <div class="topbar-item">
                <i class="fa-solid fa-location-dot"></i>
                <span>Banjarnegara</span>
            </div>
            <div class="topbar-item" id="weatherWidget">
                <span id="weatherIcon">🌤️</span>
                <span id="weatherTemp">--°C</span>
            </div>
            <div class="topbar-divider"></div>
            <div class="topbar-item">
                <i class="fa-regular fa-calendar"></i>
                <span id="currentDate">{{ now()->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </div>

        <div class="topbar-right">
            <a href="{{ route('information.privacy') }}"><i class="fa-solid fa-shield-halved"></i> PPID</a>
            <a href="{{ route('information.terms') }}"><i class="fa-solid fa-headset"></i> Layanan</a>
            <a href="tel:+6281234567890"><i class="fa-solid fa-phone"></i> Kontak</a>
            <div class="topbar-divider"></div>
            <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://youtube.com" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://twitter.com" target="_blank" rel="noopener" aria-label="X Twitter"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://tiktok.com" target="_blank" rel="noopener" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
        </div>
    </div>

    {{-- SITE HEADER DENGAN SEARCH & USER AUTH STATE --}}
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
                        <a href="{{ route('potensi') }}">Potensi</a>
                        <a class="active" href="{{ route('teknologi') }}" aria-current="page">Teknologi</a>
                        <a href="{{ route('humor') }}">Humor</a>
                    </div>
                </details>
            </nav>

            <form class="sosok-search" action="{{ route('teknologi') }}" method="GET" role="search">
                <label class="sosok-visually-hidden" for="teknologi-search">Cari cerita teknologi</label>
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                <input id="teknologi-search" type="search" name="q" value="{{ request('q') }}" placeholder="Cari cerita teknologi..." maxlength="100">
                @if(request('area'))
                    <input type="hidden" name="area" value="{{ request('area') }}">
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

    {{-- HERO SECTION: FEATURED & POPULAR --}}
    <main class="teknologi-hero">
        <div class="teknologi-container">
            <div class="hero-intro">
                <h1 class="hero-title">
                    <i class="fa-solid fa-microchip"></i>
                    Inovasi & Teknologi
                </h1>
                <p class="hero-description">
                    Merekam transformasi digital, inovasi pertanian pintar, kreativitas pemuda, dan pemanfaatan teknologi untuk kemajuan masyarakat Banjarnegara.
                </p>
                <div class="hero-line"></div>
            </div>

            <div class="teknologi-grid">
                {{-- ARTIKEL UNGGULAN (FEATURED) --}}
                @if($featuredArticle)
                    <article class="featured-card">
                        <div class="featured-img-wrap">
                            <img class="featured-img"
                                 src="{{ $featuredArticle->cover_image_url ?? asset('images/teknologi.jpg') }}"
                                 alt="{{ $featuredArticle->title }}"
                                 onerror="this.src='{{ asset('images/teknologi.jpg') }}'">
                            <span class="featured-badge">
                                <i class="fa-solid fa-star"></i> PILIHAN REDAKSI
                            </span>
                        </div>
                        <div class="featured-body">
                            <div class="featured-meta">
                                <span><i class="fa-regular fa-calendar"></i> {{ $featuredArticle->published_at?->locale('id')->isoFormat('D MMMM Y') ?? 'Baru saja' }}</span>
                                <span><i class="fa-regular fa-eye"></i> {{ number_format($featuredArticle->views) }} views</span>
                                <span><i class="fa-solid fa-tag"></i> {{ is_array($featuredArticle->tags) && count($featuredArticle->tags) > 0 ? $featuredArticle->tags[0] : 'Inovasi' }}</span>
                            </div>
                            <h2 class="featured-title">
                                <a href="{{ route('articles.show', $featuredArticle->slug) }}">
                                    {{ $featuredArticle->title }}
                                </a>
                            </h2>
                            <p class="featured-snippet">
                                {{ $featuredArticle->summary ?? \Illuminate\Support\Str::limit(strip_tags($featuredArticle->content), 180) }}
                            </p>
                            <div class="featured-footer">
                                <div class="featured-author">
                                    <span class="author-dot"></span>
                                    <span>{{ $featuredArticle->author_name ?? $featuredArticle->user?->name ?? 'Redaksi' }}</span>
                                </div>
                                <a href="{{ route('articles.show', $featuredArticle->slug) }}" class="read-btn">
                                    Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @else
                    <div class="featured-card empty-state">
                        <div class="empty-icon"><i class="fa-solid fa-microchip"></i></div>
                        <h4>Belum Ada Teknologi Unggulan</h4>
                        <p>Artikel inovasi dan teknologi pilihan redaksi akan segera hadir di sini.</p>
                    </div>
                @endif

                {{-- ARTIKEL POPULER SIDEBAR --}}
                <div class="popular-column">
                    <div class="popular-header">
                        <div class="popular-title">
                            <i class="fa-solid fa-fire"></i>
                            Teknologi Populer
                        </div>
                        <span class="popular-badge">TRENDING</span>
                    </div>

                    <div class="popular-list">
                        @forelse($popularArticles as $index => $popular)
                            <a href="{{ route('articles.show', $popular->slug) }}" class="popular-item">
                                <span class="popular-number">0{{ $index + 1 }}</span>
                                <div class="popular-img-wrap">
                                    <img class="popular-img"
                                         src="{{ $popular->cover_image_url ?? asset('images/inovasi.jpg') }}"
                                         alt="{{ $popular->title }}"
                                         onerror="this.src='{{ asset('images/inovasi.jpg') }}'">
                                </div>
                                <div class="popular-info">
                                    <span class="popular-tag">
                                        {{ is_array($popular->tags) && count($popular->tags) > 0 ? $popular->tags[0] : 'Teknologi' }}
                                    </span>
                                    <h4 class="popular-item-title">{{ $popular->title }}</h4>
                                    <div class="popular-meta">
                                        <span><i class="fa-regular fa-eye"></i> {{ number_format($popular->views) }}</span>
                                        <span>&bull;</span>
                                        <span>{{ $popular->published_at?->diffForHumans() ?? 'Baru saja' }}</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="empty-state" style="padding: 24px;">
                                <p>Belum ada artikel populer yang diterbitkan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- TOPIK / KATEGORI FILTER DENGAN COUNT DARI DB --}}
    <section class="topics-section" id="topik-teknologi">
        <div class="section-header-row">
            <div class="section-heading-group">
                <small><i class="fa-solid fa-layer-group"></i> PILIH TOPIK TEKNOLOGI</small>
                <h3>Fokus Transformasi Digital</h3>
            </div>

            @if($activeTopik || $searchTerm)
                <a href="{{ route('teknologi') }}" class="filter-reset-link">
                    <i class="fa-solid fa-xmark"></i> Reset Filter
                </a>
            @endif
        </div>

        <div class="topics-grid">
            @foreach($topics as $topic)
                @php($isActive = $activeTopik === $topic['name'])
                <a href="{{ $isActive ? route('teknologi') : route('teknologi', ['topik' => $topic['name']]) }}#daftar-teknologi"
                   class="topic-card {{ $isActive ? 'active' : '' }}">
                    <div class="topic-icon-wrap">
                        <i class="{{ $topic['icon'] }}"></i>
                    </div>
                    <div class="topic-card-name">{{ $topic['name'] }}</div>
                    <span class="topic-card-count">{{ $topic['count'] }} Artikel</span>
                </a>
            @endforeach
        </div>
    </section>

    {{-- DAFTAR ARTIKEL TEKNOLOGI LENGKAP & PAGINASI --}}
    <section class="explore-section" id="daftar-teknologi">
        <div class="section-header-row" style="margin-bottom: 28px;">
            <div class="section-heading-group">
                <small><i class="fa-regular fa-newspaper"></i> ARTIKEL TEKNOLOGI TERKINI</small>
                <h3>
                    @if($activeTopik)
                        Topik: {{ $activeTopik }}
                    @elseif($searchTerm)
                        Pencarian: &ldquo;{{ $searchTerm }}&rdquo;
                    @else
                        Jelajahi Berita & Inovasi
                    @endif
                </h3>
            </div>
        </div>

        <div class="explore-layout">
            <div class="article-col">
                <div class="article-grid">
                    @forelse($articles as $article)
                        <article class="article-card">
                            <div class="article-card-thumb">
                                <img src="{{ $article->cover_image_url ?? asset('images/teknologi.jpg') }}"
                                     alt="{{ $article->title }}"
                                     onerror="this.src='{{ asset('images/teknologi.jpg') }}'">
                                <span class="article-tag-badge">
                                    {{ is_array($article->tags) && count($article->tags) > 0 ? $article->tags[0] : 'Inovasi' }}
                                </span>
                            </div>
                            <div class="article-card-body">
                                <div class="article-card-meta">
                                    <span><i class="fa-regular fa-calendar"></i> {{ $article->published_at?->locale('id')->isoFormat('D MMM Y') ?? 'Baru saja' }}</span>
                                    <span>&bull;</span>
                                    <span><i class="fa-regular fa-eye"></i> {{ number_format($article->views) }}</span>
                                </div>
                                <h3 class="article-card-title">
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="article-card-desc">
                                    {{ $article->summary ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
                                </p>
                                <div class="article-card-footer">
                                    <span class="author-name-text">
                                        <i class="fa-solid fa-user-pen"></i> {{ $article->author_name ?? $article->user?->name ?? 'Redaksi' }}
                                    </span>
                                    <a href="{{ route('articles.show', $article->slug) }}" class="card-more-link">
                                        Baca <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="empty-state">
                            <div class="empty-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                            <h4>Belum Ada Artikel Ditemukan</h4>
                            <p>
                                @if($activeTopik || $searchTerm)
                                    Tidak ada artikel teknologi dengan kriteria yang dipilih. Coba reset filter atau gunakan kata kunci pencarian lain.
                                @else
                                    Artikel teknologi terbaru akan segera hadir di rubrik ini.
                                @endif
                            </p>
                            @if($activeTopik || $searchTerm)
                                <a href="{{ route('teknologi') }}" class="read-btn" style="display:inline-flex; margin-top:12px;">
                                    Tampilkan Semua Artikel
                                </a>
                            @endif
                        </div>
                    @endforelse
                </div>

                {{-- PAGINATION --}}
                @if($articles->hasPages())
                    <div class="pagination-wrap">
                        {{ $articles->links() }}
                    </div>
                @endif
            </div>

            {{-- SIDEBAR TRENDING & WIDGET --}}
            <aside class="explore-sidebar">
                <div class="side-widget">
                    <h4 class="widget-title">
                        <i class="fa-solid fa-hashtag"></i>
                        Topik &amp; Tag Populer
                    </h4>
                    <div class="tech-tags-list">
                        @foreach($trendingTags as $trend)
                            <a href="{{ route('teknologi', ['q' => $trend['query']]) }}#daftar-teknologi" class="tech-tag-item">
                                <span>{{ $trend['tag'] }}</span>
                                <span class="tech-tag-action"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="side-widget" style="background: linear-gradient(135deg, #074567 0%, #032b42 100%); color: #fff;">
                    <h4 class="widget-title" style="color: #fff;">
                        <i class="fa-solid fa-lightbulb" style="color: var(--cyan-light);"></i>
                        Punya Inovasi Teknologi?
                    </h4>
                    <p style="font-size: 12px; color: #c5e6f3; line-height: 1.6; margin-bottom: 16px;">
                        Kirimkan liputan inovasi startup, karya pemuda, atau pemanfaatan teknologi di sekitarmu untuk kami publikasikan di Derap Serayu.
                    </p>
                    <a href="{{ route('penulis.dashboard') }}" class="discover-btn" style="padding: 9px 18px; font-size: 12px; width: 100%; justify-content: center;">
                        <i class="fa-solid fa-pen-nib"></i> Tulis Cerita Inovasi
                    </a>
                </div>
            </aside>
        </div>
    </section>

    {{-- STATISTIK TEKNOLOGI & DIGITAL --}}
    <section class="stats-section">
        <div class="stats-inner">
            <div class="stats-intro">
                <small>INDIKATOR PERKEMBANGAN</small>
                <h3>Digitalisasi Banjarnegara</h3>
                <p>Data transformasi digital dan penerapan teknologi pintar di berbagai sektor masyarakat.</p>
            </div>
            <div class="stat-box">
                <div class="stat-number">278+</div>
                <div class="stat-label">Desa Terkoneksi</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">45K+</div>
                <div class="stat-label">Merchant QRIS</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">100%</div>
                <div class="stat-label">Kecamatan Online</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">15+</div>
                <div class="stat-label">Komunitas Digital</div>
            </div>
        </div>
    </section>

    {{-- DISCOVER BANJARNEGARA BANNER --}}
    <section class="discover-section">
        <div class="discover-card">
            <div class="discover-content">
                <div class="discover-label">ERA DIGITAL BANJARNEGARA</div>
                <h2>Kolaborasi Nyata Menuju <span>Masyarakat Cerdas</span></h2>
                <p>Mari dukung talenta muda, pemanfaatan riset teknologi tepat guna, dan peningkatan literasi digital demi masa depan daerah yang semakin maju.</p>
            </div>
            <a href="{{ route('articles.index') }}" class="discover-btn">
                Eksplorasi Semua Berita <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </section>

    {{-- FOOTER TERPADU DENGAN NEWSLETTER & POLICY --}}
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

                    Media informasi dan cerita Banjarnegara
                    yang menghadirkan berita, budaya, wisata,
                    potensi, serta kisah dari masyarakat.

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

                <h3>
                    Jelajahi
                </h3>

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

                <h3>
                    Informasi
                </h3>

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

                <h3>
                    Layanan
                </h3>

                <a href="https://ppid.banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">
                    PPID
                </a>

                <a href="https://www.instagram.com/mpp.banjarnegara/" target="_blank" rel="noopener noreferrer">
                    Layanan Publik
                </a>

                <a href="https://banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">
                    Kontak
                </a>

                <a href="{{ route('login') }}">
                    Masuk
                </a>

                <a href="{{ route('register.pembaca') }}">
                    Daftar
                </a>

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

            <div class="footer-quote-mark">
                “
            </div>

            <div class="footer-quote">

                Dari gunung hingga lembah,
                setiap sudut Banjarnegara punya cerita.

            </div>

            <div class="footer-quote-author">

                DERAP SERAYU — BANJARNEGARA

            </div>

        </div>



        {{-- BOTTOM --}}

        <div class="footer-bottom">

            <div class="footer-copyright">

                © {{ now()->year }} Derap Serayu.
                Semua hak dilindungi.

            </div>


            <div class="footer-policy">

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
                <strong>Banjarnegara</strong>
                ♥️

            </div>

        </div>

    </div>

</footer>

    {{-- LIVE WEATHER SCRIPT DARI OPEN-METEO --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tempElement = document.getElementById('weatherTemp');
            const iconElement = document.getElementById('weatherIcon');

            if (!tempElement || !iconElement) return;

            // Koordinat Banjarnegara: Latitude -7.3987, Longitude 109.6976
            const url = 'https://api.open-meteo.com/v1/forecast?latitude=-7.3987&longitude=109.6976&current=temperature_2m,weather_code&timezone=Asia%2FJakarta';

            fetch(url)
                .then(res => res.json())
                .then(data => {
                    if (data && data.current) {
                        const temp = Math.round(data.current.temperature_2m);
                        const code = data.current.weather_code;

                        tempElement.textContent = `${temp}°C`;

                        // Peta kode cuaca WMO
                        if (code === 0) iconElement.textContent = '☀️';
                        else if (code >= 1 && code <= 3) iconElement.textContent = '⛅';
                        else if (code >= 45 && code <= 48) iconElement.textContent = '🌫️';
                        else if (code >= 51 && code <= 67) iconElement.textContent = '🌧️';
                        else if (code >= 71 && code <= 77) iconElement.textContent = '❄️';
                        else if (code >= 80 && code <= 82) iconElement.textContent = '🌦️';
                        else if (code >= 95 && code <= 99) iconElement.textContent = '⛈️';
                        else iconElement.textContent = '🌤️';
                    }
                })
                .catch(() => {
                    tempElement.textContent = '24°C';
                    iconElement.textContent = '🌤️';
                });
        });
    </script>
</body>

</html>
