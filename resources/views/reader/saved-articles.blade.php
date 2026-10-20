<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Artikel Tersimpan | Derap Serayu</title>
    <meta name="description" content="Kumpulan artikel pilihan yang kamu simpan di Derap Serayu.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --forest: #174c3d;
            --forest-dark: #10382e;
            --green: #38785a;
            --mint: #e4f1e7;
            --gold: #d9b76c;
            --text: #243d32;
            --muted: #788b7f;
            --white: #ffffff;
            --page: #f5f7ef;
            --border: #e3e9dc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
            background:#eaf8fc;
            color: var(--text);
            font-family: "DM Sans", sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
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

        /* PAGE */

        .page-container {
            width: min(1200px, calc(100% - 48px));
            margin: auto;
            padding: 44px 0 65px;
        }

        .breadcrumb {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 9px;
            margin-bottom: 26px;
            color: var(--muted);
            font-size: 11px;
        }

        .breadcrumb a {
            transition: color .2s;
        }

        .breadcrumb a:hover {
            color: var(--green);
        }

        .breadcrumb i {
            color: #aab7a7;
            font-size: 9px;
        }

        /* PAGE INTRO */

        .page-intro {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            overflow: hidden;

            min-height: 230px;
            margin-bottom: 30px;
            padding: 36px 45px;

            border-radius: 25px;
            background:
                linear-gradient(
                    100deg,
                    rgba(5, 53, 75, .96),
                    rgba(8, 82, 111, .84) 58%,
                    rgba(8, 101, 129, .47)
                ),
                url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1800&q=85')
                center 47% / cover no-repeat;

            box-shadow: 0 18px 45px rgba(22, 98, 127, .14);
            color: white;
        }

        .page-intro::before {
            content: "";
            position: absolute;
            z-index: -1;
            top: -115px;
            right: 2%;
            width: 320px;
            height: 320px;
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 50%;
            box-shadow:
                0 0 0 28px rgba(255,255,255,.035),
                0 0 0 60px rgba(255,255,255,.025);
        }

        .page-intro::after {
            content: "";
            position: absolute;
            z-index: -1;
            right: 15%;
            bottom: -105px;
            width: 210px;
            height: 210px;
            border-radius: 50%;
            background: rgba(217,183,108,.10);
            filter: blur(2px);
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

        .eyebrow i {
            color: #8ceafa;
        }

        h1 {
            margin-bottom: 13px;
            color: white;
            font-family: "Playfair Display", serif;
            font-size: clamp(34px, 4vw, 48px);
            font-weight: 700;
            line-height: 1.13;
            letter-spacing: -.8px;
        }

        h1 span {
            color: #8ceafa;
            font-style: italic;
        }

        .intro-description {
            max-width: 600px;
            color: rgba(255,255,255,.79);
            font-size: 13px;
            line-height: 1.9;
        }

        .intro-icon {
            flex-shrink: 0;
            width: 105px;
            height: 105px;
            display: grid;
            place-items: center;
            margin-right: 22px;
            border: 1px solid rgba(255,255,255,.23);
            border-radius: 30px;
            background: rgba(255,255,255,.09);
            color: #8ceafa;
            font-size: 42px;
            transform: rotate(5deg);
            backdrop-filter: blur(8px);
        }

        /* STATUS MESSAGE */

        .status-message {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #cfe4cd;
            border-radius: 13px;
            background: #eff8eb;
            color: #2d6944;
            font-size: 13px;
            line-height: 1.7;
        }

        .status-message i {
            margin-top: 3px;
        }

        /* SECTION HEADING */

        .collection-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 21px;
        }

        .section-kicker {
            margin-bottom: 6px;
            color: var(--green);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.8px;
            text-transform: uppercase;
        }

        .collection-heading h2 {
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: clamp(23px, 3vw, 31px);
            line-height: 1.3;
        }

        .collection-count {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 30px;
            background: rgba(255,255,255,.75);
            color: #55705d;
            font-size: 11px;
            font-weight: 700;
        }

        .collection-count i {
            color: var(--green);
        }

        /* ARTICLE GRID */

        .grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .card {
            min-width: 0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(221,231,216,.95);
            border-radius: 19px;
            background: white;
            box-shadow: 0 7px 24px rgba(34,65,44,.045);
            transition: transform .28s ease, box-shadow .28s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 17px 36px rgba(34,65,44,.11);
        }

        .card-link {
            display: flex;
            flex: 1;
            flex-direction: column;
            min-width: 0;
            color: inherit;
            text-decoration: none;
        }

        .card-image-wrap {
            position: relative;
            height: 225px;
            overflow: hidden;
            background: #e2eadc;
        }

        .card-image-wrap::after {
            content: "";
            position: absolute;
            inset: 45% 0 0;
            pointer-events: none;
            background: linear-gradient(180deg, transparent, rgba(17,45,31,.15));
        }

        .card img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            transition: transform .55s ease;
        }

        .card:hover img {
            transform: scale(1.055);
        }

        .image-label {
            position: absolute;
            z-index: 2;
            top: 13px;
            left: 13px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            max-width: calc(100% - 26px);
            padding: 8px 11px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.5);
            border-radius: 30px;
            background: rgba(255,255,255,.92);
            color: var(--forest);
            font-size: 10px;
            font-weight: 800;
            text-overflow: ellipsis;
            white-space: nowrap;
            backdrop-filter: blur(8px);
        }

        .image-label i {
            color: var(--green);
        }

        .body {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 19px 19px 15px;
        }

        .category {
            margin-bottom: 9px;
            color: var(--green);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .card h3 {
            display: -webkit-box;
            overflow: hidden;
            margin-bottom: 10px;
            color: #234b38;
            font-family: "Playfair Display", serif;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.4;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .summary {
            display: -webkit-box;
            overflow: hidden;
            margin-bottom: 17px;
            color: #738579;
            font-size: 12px;
            line-height: 1.85;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px 13px;
            margin-top: auto;
            padding-top: 13px;
            border-top: 1px solid #edf0e9;
            color: #89988b;
            font-size: 10px;
        }

        .article-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .article-meta i {
            color: #8aa28a;
        }

        /* CARD FOOTER */

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 0 19px 18px;
        }

        .read-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--green);
            font-size: 11px;
            font-weight: 800;
        }

        .read-link i {
            transition: transform .2s ease;
        }

        .card:hover .read-link i {
            transform: translateX(3px);
        }

        .remove-form {
            margin: 0;
        }

        .remove {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 11px;
            border: 1px solid #eadbd4;
            border-radius: 10px;
            background: #fffaf7;
            color: #9b5e4b;
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .remove:hover {
            border-color: #d9b3a6;
            background: #fbece6;
            color: #854431;
        }

        /* EMPTY STATE */

        .empty {
            position: relative;
            overflow: hidden;
            padding: 65px 24px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: rgba(255,255,255,.82);
            text-align: center;
            box-shadow: 0 10px 30px rgba(34,65,44,.04);
        }

        .empty-icon {
            width: 83px;
            height: 83px;
            display: grid;
            place-items: center;
            margin: 0 auto 20px;
            border: 1px solid #dce9d8;
            border-radius: 27px;
            background: #edf5e8;
            color: var(--green);
            font-size: 31px;
            transform: rotate(-4deg);
        }

        .empty h2 {
            margin-bottom: 10px;
            color: var(--forest);
            font-family: "Playfair Display", serif;
            font-size: 27px;
        }

        .empty p {
            max-width: 490px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.9;
        }

        .empty-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 11px;
            margin-top: 23px;
        }

        .empty-actions a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 43px;
            padding: 0 18px;
            border: 1px solid var(--border);
            border-radius: 30px;
            background: white;
            color: var(--forest);
            font-size: 12px;
            font-weight: 700;
            transition: .2s ease;
        }

        .empty-actions a.primary {
            border-color: var(--forest);
            background: var(--forest);
            color: white;
        }

        .empty-actions a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(34,65,44,.09);
        }

        /* PAGINATION */

        .pagination-wrap {
            display: flex;
            justify-content: center;
            margin-top: 32px;
        }

        .pagination-wrap nav {
            display: flex;
            justify-content: center;
            max-width: 100%;
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
            min-width: 38px;
            min-height: 38px;
            padding: 8px 12px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: var(--forest);
            font-size: 12px;
        }

        .pagination-wrap span[aria-current] span {
            border-color: var(--forest);
            background: var(--forest);
            color: white;
        }

        /* BOTTOM NAVIGATION */

        .bottom-navigation {
            display: flex;
            justify-content: center;
            margin-top: 38px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 12px 17px;
            border: 1px solid #dce6d8;
            border-radius: 30px;
            background: rgba(255,255,255,.75);
            color: var(--forest);
            font-size: 12px;
            font-weight: 700;
            transition: .2s ease;
        }

        .back-link:hover {
            border-color: #b9ceb4;
            background: white;
            transform: translateX(-2px);
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

        @media (max-width: 1000px) {
            .grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .card-image-wrap {
                height: 230px;
            }

            .intro-icon {
                margin-right: 0;
            }
        }

        @media (max-width: 650px) {
            .site-header {
                padding: 10px 0;
            }

            .header-inner,
            .page-container {
                width: calc(100% - 28px);
            }

            .header-inner {
                gap: 10px;
            }

            .brand {
                gap: 8px;
                font-size: 19px;
            }

            .brand-mark {
                width: 35px;
                height: 35px;
                border-radius: 11px;
                font-size: 21px;
            }

            .header-link {
                min-height: 37px;
                padding: 0 11px;
                font-size: 10px;
            }

            .header-link span {
                display: none;
            }

            .page-container {
                padding-top: 25px;
                padding-bottom: 45px;
            }

            .breadcrumb {
                margin-bottom: 19px;
            }

            .page-intro {
                min-height: 0;
                margin-bottom: 27px;
                padding: 29px 23px;
                border-radius: 20px;
            }

            .intro-icon {
                display: none;
            }

            h1 {
                font-size: clamp(32px, 9vw, 42px);
            }

            .intro-description {
                font-size: 12px;
                line-height: 1.8;
            }

            .collection-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 12px;
            }

            .collection-heading h2 {
                font-size: 25px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 17px;
            }

            .card-image-wrap {
                height: 235px;
            }

            .body {
                padding: 17px 17px 14px;
            }

            .card h3 {
                font-size: 20px;
            }

            .card-footer {
                padding: 0 17px 17px;
            }

            .empty {
                padding: 48px 20px;
            }

            .empty h2 {
                font-size: 24px;
            }

            .footer-inner {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .footer-copy {
                text-align: left;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
                animation-duration: .01ms !important;
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

    {{-- HEADER --}}
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

    <main class="page-container">
        {{-- INTRO --}}
        <section class="page-intro">
            <div class="intro-content">
                <div class="eyebrow">
                    <i class="fa-solid fa-bookmark"></i>
                    Ruang Bacaan Pribadi
                </div>

                <h1>Artikel <span>Tersimpan</span></h1>

                <p class="intro-description">
                    Simpan cerita yang menarik perhatianmu, temukan kembali bacaan favorit,
                    dan lanjutkan menjelajahi kisah alam, budaya, serta kehidupan masyarakat
                    Banjarnegara kapan saja.
                </p>
            </div>

            <div class="intro-icon" aria-hidden="true">
                <i class="fa-solid fa-book-open-reader"></i>
            </div>
        </section>

        {{-- STATUS --}}
        @if (session('savedArticleStatus'))
            <div class="status-message" role="status">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('savedArticleStatus') }}</span>
            </div>
        @endif

        {{-- COLLECTION --}}
        <section aria-label="Koleksi artikel tersimpan">
            @if ($articles->isEmpty())
                <div class="empty">
                    <div class="empty-icon">
                        <i class="fa-regular fa-bookmark"></i>
                    </div>

                    <h2>Belum Ada Bacaan Tersimpan</h2>

                    <p>
                        Artikel yang kamu simpan akan muncul di sini.
                        Jelajahi koleksi Derap Serayu dan simpan tulisan yang ingin kamu baca kembali.
                    </p>

                    <div class="empty-actions">
                        <a class="primary" href="{{ route('articles.index') }}">
                            <i class="fa-solid fa-compass"></i>
                            Jelajahi Artikel
                        </a>

                        <a href="{{ route('pembaca.profile') }}">
                            <i class="fa-regular fa-user"></i>
                            Kembali ke Profil
                        </a>
                    </div>
                </div>
            @else
                <div class="collection-heading">
                    <div>
                        <p class="section-kicker">Koleksi Pilihanmu</p>
                        <h2>Bacaan yang Kamu Simpan</h2>
                    </div>

                    <div class="collection-count">
                        <i class="fa-solid fa-bookmark"></i>
                        {{ $articles->total() }} artikel tersimpan
                    </div>
                </div>

                <div class="grid">
                    @foreach ($articles as $article)
                        @php
                            $categoryName = is_string($article->category)
                                ? $article->category
                                : ($article->category->name ?? $article->category_name ?? 'Artikel');

                            $coverImage = $article->cover_image_path
                                ? \Illuminate\Support\Facades\Storage::disk('public')->url($article->cover_image_path)
                                : asset('images/bg-dieng-home.jpg');

                            $articleDate = $article->published_at ?? $article->created_at;

                            $summary = $article->summary
                                ?: \Illuminate\Support\Str::limit(strip_tags($article->content ?? ''), 150);
                        @endphp

                        <article class="card">
                            <a class="card-link" href="{{ route('articles.show', $article->slug) }}">
                                <div class="card-image-wrap">
                                    <img
                                        src="{{ $coverImage }}"
                                        alt="{{ $article->caption ?: $article->title }}"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.src='{{ asset('images/bg-dieng-home.jpg') }}';"
                                    >

                                    <span class="image-label">
                                        <i class="fa-solid fa-leaf"></i>
                                        {{ $categoryName }}
                                    </span>
                                </div>

                                <div class="body">
                                    <p class="category">{{ $categoryName }}</p>

                                    <h3>{{ $article->title }}</h3>

                                    <p class="summary">
                                        {{ $summary }}
                                    </p>

                                    <div class="article-meta">
                                        <span>
                                            <i class="fa-regular fa-user"></i>
                                            {{ $article->author_name ?: 'Tim Derap Serayu' }}
                                        </span>

                                        <span>
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $articleDate?->translatedFormat('d M Y') ?? 'Artikel' }}
                                        </span>
                                    </div>
                                </div>
                            </a>

                            <div class="card-footer">
                                <a class="read-link" href="{{ route('articles.show', $article->slug) }}">
                                    Baca artikel
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <form
                                    class="remove-form"
                                    action="{{ route('pembaca.saved.destroy', $article->slug) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus artikel ini dari daftar tersimpan?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button class="remove" type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if (method_exists($articles, 'links'))
                    <div class="pagination-wrap">
                        {{ $articles->links() }}
                    </div>
                @endif
            @endif
        </section>
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

</body>
</html>