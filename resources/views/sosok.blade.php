<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Sosok | Derap Serayu</title>

    {{-- GOOGLE FONT --}}
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700;800&display=swap"
          rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {

            font-family: "DM Sans", sans-serif;

            color: #073f5e;

            position: relative;

            isolation: isolate;

            background:
                linear-gradient(
                    180deg,
                    rgba(222,248,255,.94),
                    rgba(244,252,254,.98)
                );

            min-height: 100vh;

            overflow-x: hidden;
        }

        body::before {

            content: "";

            position: absolute;

            inset: 0 0 auto;

            height: max(100vh, 850px);

            background:
                linear-gradient(
                    180deg,
                    rgba(225,248,254,.08),
                    rgba(231,248,253,.28) 48%,
                    rgba(244,251,253,.94) 100%
                ),
                url("{{ asset('images/gunung.jpg') }}");

            background-size: cover;

            background-position: center top;

            z-index: -1;

            pointer-events: none;
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }


        /* =====================================================
           TOP BAR
        ===================================================== */

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

            opacity: .95;
        }

        .topbar-item i {

            color: #63d9f5;

            font-size: 11px;
        }

        .topbar-divider {

            width: 1px;

            height: 15px;

            background: rgba(255,255,255,.25);
        }

        .topbar-right a {

            color: white;

            transition: .2s;
        }

        .topbar-right a:hover {

            color: #5bdcf6;
        }

        .social-top {

            display: flex;

            gap: 13px;

            align-items: center;
        }


        /* =====================================================
           HEADER / NAVBAR
        ===================================================== */

        .main-header {

            position: absolute;

            top: 48px;

            left: 6.5%;

            right: 6.5%;

            z-index: 90;

            height: 74px;

            background: rgba(255,255,255,.93);

            backdrop-filter: blur(18px);

            -webkit-backdrop-filter: blur(18px);

            border-radius: 22px;

            display: flex;

            align-items: center;

            padding: 0 16px 0 22px;

            box-shadow:
                0 12px 35px rgba(0,71,100,.10);

            border: 1px solid rgba(255,255,255,.8);
        }


        /* LOGO */

        .logo-area {

            display: flex;

            align-items: center;

            gap: 9px;

            min-width: 235px;
        }

        .logo-area img {

            width: 56px;

            height: 56px;

            object-fit: contain;
        }

        .logo-text {

            font-family: "Playfair Display", serif;

            font-weight: 800;

            font-size: 25px;

            line-height: 1;

            color: #073f5e;
        }

        .logo-text span {

            color: #08afd7;
        }

        .logo-subtitle {

            margin-top: 4px;

            font-size: 8px;

            color: #6a94a4;

            letter-spacing: .2px;
        }


        /* NAV */

        .navbar {

            flex: 1;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 4px;
        }

        .navbar a {

            color: #073f5e;

            font-size: 10px;

            font-weight: 600;

            padding: 12px 14px;

            border-radius: 30px;

            white-space: nowrap;

            transition: .25s;
        }

        .navbar a:hover {

            color: #08afd7;

            background: #effaff;
        }

        .navbar a.active {

            color: white;

            background: #0ab3dc;

            box-shadow:
                0 8px 18px rgba(8,179,220,.25);
        }


        /* SEARCH */

        .header-actions {

            display: flex;

            align-items: center;

            gap: 12px;
        }

        .search-box {

            width: 250px;

            height: 40px;

            background: #f0f9fc;

            border-radius: 22px;

            display: flex;

            align-items: center;

            padding: 0 13px;

            color: #8aa7b3;
        }

        .search-box i {

            font-size: 13px;

            margin-right: 9px;

            color: #6d9baa;
        }

        .search-box input {

            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            color: #073f5e;

            font-size: 9px;
        }

        .search-box input::placeholder {

            color: #91aab4;
        }


        /* MENU */

        .menu-button {

            width: 46px;

            height: 46px;

            border-radius: 50%;

            border: none;

            background: #073f5e;

            color: white;

            cursor: pointer;

            font-size: 17px;

            display: flex;

            align-items: center;

            justify-content: center;

            transition: .25s;
        }

        .menu-button:hover {

            background: #08afd7;

            transform: rotate(5deg);
        }


        /* =====================================================
           HERO
        ===================================================== */

        .sosok-hero {

            min-height: 515px;

            position: relative;

            padding:

                140px

                6.5%

                42px;

            overflow: hidden;

            background: transparent;

        }


        /* background decorative */

        .sosok-hero::before {

            content: "";

            position: absolute;

            width: 460px;

            height: 460px;

            border-radius: 50%;

            border: 1px solid rgba(8,175,215,.20);

            left: -230px;

            top: 170px;
        }

        .sosok-hero::after {

            content: "";

            position: absolute;

            width: 550px;

            height: 550px;

            border-radius: 50%;

            border: 1px solid rgba(8,175,215,.18);

            right: -290px;

            top: 65px;
        }


        .hero-container {

            position: relative;

            z-index: 2;

            max-width: 1330px;

            margin: auto;
        }


        /* HERO INTRO */

        .hero-intro {

            max-width: 570px;

            margin-bottom: 22px;
        }

        .hero-title {

            display: flex;

            align-items: center;

            gap: 17px;

            font-family: "Playfair Display", serif;

            color: #073f5e;

            font-size: 52px;

            line-height: 1;

            font-weight: 700;

            margin-bottom: 12px;
        }

        .hero-title i {

            font-size: 36px;

            color: #08afd7;
        }

        .hero-description {

            font-family: "Playfair Display", serif;

            color: #fff;

            text-shadow: 0 1px 5px rgba(2,44,69,.82);

            font-size: 17px;

            line-height: 1.55;

            max-width: 530px;
        }

        .hero-line {

            width: 52px;

            height: 3px;

            background: #08afd7;

            margin-top: 13px;
        }


        /* =====================================================
           HERO CONTENT GRID
        ===================================================== */

        .hero-grid {

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                320px;

            gap: 20px;

            align-items: stretch;
        }


        /* =====================================================
           FEATURED SOSOK
        ===================================================== */

        .featured-sosok {

            min-height: 210px;

            background: rgba(255,255,255,.91);

            border-radius: 17px;

            padding: 13px;

            display: grid;

            grid-template-columns: 42% 58%;

            box-shadow:
                0 10px 30px rgba(0,81,108,.08);

            border: 1px solid rgba(255,255,255,.9);
        }

        .featured-sosok-empty {

            grid-template-columns: 1fr;
        }

        .featured-empty {

            padding: 28px;
        }

        .featured-sosok-empty {

            grid-template-columns: 1fr;
        }

        .featured-empty {

            padding: 28px;
        }

        .featured-image {

            position: relative;

            min-height: 185px;

            border-radius: 12px;

            overflow: hidden;
        }

        .featured-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            display: block;
        }

        .image-overlay {

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    180deg,
                    transparent 55%,
                    rgba(0,35,50,.40)
                );
        }

        .category-label {

            position: absolute;

            top: 12px;

            left: 12px;

            background: #09b4dd;

            color: white;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 8px;

            font-weight: 800;

            letter-spacing: .5px;
        }


        .featured-content {

            padding: 15px 24px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .article-meta {

            display: flex;

            align-items: center;

            gap: 8px;

            color: #7899a6;

            font-size: 8px;

            margin-bottom: 10px;
        }

        .author-mini {

            width: 25px;

            height: 25px;

            border-radius: 50%;

            background: #d8f2f8;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #08afd7;
        }

        .featured-content h2 {

            font-family: "Playfair Display", serif;

            color: #074766;

            font-size: 27px;

            line-height: 1.12;

            max-width: 440px;

            margin-bottom: 10px;
        }

        .featured-content h2 span {

            color: #08afd7;
        }

        .featured-content p {

            color: #638a99;

            font-size: 11px;

            line-height: 1.55;

            max-width: 470px;

            margin-bottom: 13px;
        }


        /* BUTTON */

        .read-button {

            display: inline-flex;

            align-items: center;

            gap: 12px;

            width: fit-content;

            padding: 11px 17px;

            border-radius: 24px;

            background: #0ab3dc;

            color: white;

            font-size: 9px;

            font-weight: 700;

            transition: .25s;
        }

        .read-button:hover {

            background: #073f5e;

            transform: translateY(-2px);
        }

        .read-button i {

            font-size: 9px;
        }


        /* =====================================================
           POPULAR
        ===================================================== */

        .popular-card {

            background: rgba(255,255,255,.93);

            border-radius: 17px;

            padding: 17px;

            box-shadow:
                0 10px 30px rgba(0,81,108,.08);

            border: 1px solid rgba(255,255,255,.9);
        }

        .section-title-small {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 11px;
        }

        .section-title-small h3 {

            font-family: "Playfair Display", serif;

            font-size: 18px;

            color: #073f5e;
        }

        .section-title-small h3 i {

            color: #ff6d43;

            margin-right: 6px;

            font-size: 15px;
        }

        .see-all {

            color: #08afd7;

            font-size: 8px;

            font-weight: 700;
        }


        .popular-item {

            display: grid;

            grid-template-columns: 27px 63px 1fr;

            gap: 8px;

            align-items: center;

            padding: 8px 0;

            border-bottom: 1px solid #e5f0f3;

            color: inherit;
        }

        .popular-item:last-child {

            border-bottom: none;
        }

        .popular-number {

            width: 23px;

            height: 23px;

            border-radius: 50%;

            background: #0a94c0;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 9px;

            font-weight: 700;
        }

        .popular-image {

            width: 63px;

            height: 49px;

            border-radius: 9px;

            overflow: hidden;
        }

        .popular-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;
        }

        .popular-info h4,
        .popular-info strong {

            color: #075072;

            font-size: 9px;

            line-height: 1.35;

            font-weight: 700;

            margin-bottom: 4px;
        }

        .popular-info strong {

            display: block;
        }

        .popular-info p,
        .popular-info > span {

            color: #8ba3ad;

            font-size: 7px;
        }

        .popular-empty {

            color: #8ba3ad;

            font-size: 9px;

            line-height: 1.5;
        }


        /* =====================================================
           TOKOH PILIHAN
        ===================================================== */

        .people-section {

            max-width: 1330px;

            margin: 0 auto;

            padding: 0 6.5% 30px;
        }

        .people-section-title {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 12px;
        }

        .people-heading {

            display: flex;

            align-items: center;

            gap: 11px;
        }

        .people-heading h2 {

            font-family: "Playfair Display", serif;

            font-size: 21px;

            color: #073f5e;
        }

        .people-heading i {

            color: #0b8eb7;

            font-size: 16px;
        }

        .heading-line {

            width: 52px;

            height: 2px;

            background: #08afd7;
        }

        .people-see-all {

            color: #08afd7;

            font-size: 8px;

            font-weight: 700;
        }


        .people-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;
        }

        .people-empty {

            grid-column: 1 / -1;

            padding: 22px;

            border-radius: 13px;

            background: rgba(255,255,255,.88);

            color: #638a99;

            font-size: 13px;

            text-align: center;
        }

        .people-pagination {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 16px;

            margin-top: 22px;

            color: #638a99;

            font-size: 12px;
        }

        .people-pagination a,
        .people-pagination span[aria-disabled="true"] {

            padding: 8px 13px;

            border-radius: 20px;

            background: rgba(255,255,255,.9);

            color: #087fa3;
        }

        .people-pagination span[aria-disabled="true"] {

            color: #8aa5ae;
        }


        /* =====================================================
           PERSON CARD
        ===================================================== */

        .person-card {

            background: white;

            border-radius: 13px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(0,72,100,.08);

            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }

        .person-card:hover {

            transform: translateY(-6px);

            box-shadow:
                0 18px 35px rgba(0,72,100,.13);
        }

        .person-image {

            display: block;

            height: 145px;

            position: relative;

            overflow: hidden;
        }

        .person-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            transition: transform .5s ease;
        }

        .person-card:hover .person-image img {

            transform: scale(1.05);
        }

        .person-category {

            position: absolute;

            left: 10px;

            top: 10px;

            padding: 5px 9px;

            border-radius: 15px;

            background: #08afd7;

            color: white;

            font-size: 7px;

            font-weight: 800;

            letter-spacing: .4px;
        }

        .person-content {

            padding: 12px 14px 13px;
        }

        .person-content h3 {

            font-family: "Playfair Display", serif;

            color: #073f5e;

            font-size: 14px;

            line-height: 1.25;

            min-height: 35px;

            margin-bottom: 7px;
        }

        .person-content h3 a {

            color: inherit;
        }

        .person-name {

            color: #7293a0;

            font-size: 8px;

            margin-bottom: 9px;
        }

        .person-meta {

            display: flex;

            align-items: center;

            gap: 12px;

            color: #8aa5ae;

            font-size: 7px;
        }

        .person-meta i {

            color: #09a9d2;

            margin-right: 3px;
        }


        /* =====================================================
           CTA
        ===================================================== */

        .discover-section {

            max-width: 1330px;

            margin: 0 auto;

            padding: 0 6.5% 42px;
        }

        .discover-card {

            min-height: 75px;

            border-radius: 15px;

            overflow: hidden;

            position: relative;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 18px 18px 18px 280px;

            background:

                linear-gradient(
                    90deg,
                    rgba(0,48,68,.92),
                    rgba(3,89,116,.86)
                ),

                url("{{ asset('images/bupati.png') }}");

            background-size: cover;

            background-position: center;
        }

        .discover-card::before {

            content: "";

            position: absolute;

            left: 0;

            top: 0;

            bottom: 0;

            width: 270px;

            background:

                linear-gradient(
                    90deg,
                    rgba(0,49,69,.95),
                    transparent
                );
        }

        .discover-text {

            position: relative;

            z-index: 2;
        }

        .discover-text h2 {

            color: white;

            font-family: "Playfair Display", serif;

            font-style: italic;

            font-size: 18px;

            margin-bottom: 3px;
        }

        .discover-text p {

            color: #b5d8e1;

            font-size: 8px;
        }

        .discover-button {

            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            gap: 10px;

            background: #08b4dc;

            color: white;

            padding: 11px 17px;

            border-radius: 24px;

            font-size: 8px;

            font-weight: 700;

            white-space: nowrap;

            transition: .25s;
        }

        .discover-button:hover {

            background: white;

            color: #073f5e;
        }


        /* =====================================================
           FOOTER
           SAMA DENGAN BERANDA & CERITA BUDAYA
        ===================================================== */

        .home-footer {

            position: relative;

            background:

                linear-gradient(
                    180deg,
                    rgba(2,51,73,.97),
                    rgba(1,42,61,.99)
                ),

                url("{{ asset('images/bg-dieng-register.jpg') }}");

            background-size: cover;

            background-position: center;

            color: white;

            overflow: hidden;
        }

        .home-footer::before {

            content: "";

            position: absolute;

            width: 600px;

            height: 600px;

            left: -300px;

            bottom: -400px;

            border-radius: 50%;

            border: 1px solid rgba(80,218,245,.08);
        }

        .home-footer::after {

            content: "";

            position: absolute;

            width: 450px;

            height: 450px;

            right: -250px;

            top: -250px;

            border-radius: 50%;

            border: 1px solid rgba(80,218,245,.08);
        }

        .home-footer-inner {

            width: min(1330px, calc(100% - 40px));

            margin: auto;

            position: relative;

            z-index: 2;

            padding: 52px 0 18px;
        }

        .home-footer-grid {

            display: grid;

            grid-template-columns:
                1.35fr
                .8fr
                .8fr
                .8fr
                1.25fr;

            gap: 42px;

            padding-bottom: 35px;
        }

        .footer-brand {

            display: flex;

            align-items: center;

            gap: 10px;
        }

        .footer-logo-box {

            width: 50px;

            height: 50px;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            border-radius: 11px;

            background: rgba(255,255,255,.06);

            border: 1px solid rgba(255,255,255,.12);
        }

        .footer-logo-box img {

            width: 46px;

            height: 46px;

            object-fit: contain;
        }

        .footer-brand-name {

            font-family: "Playfair Display", serif;

            font-size: 22px;

            line-height: 1;

            font-weight: 700;
        }

        .footer-brand-name span {

            color: #10bce4;
        }

        .footer-brand-subtitle {

            margin-top: 4px;

            font-size: 7px;

            color: #8bb4c1;
        }

        .footer-description {

            max-width: 280px;

            margin-top: 14px;

            color: #a7c7d1;

            font-size: 9px;

            line-height: 1.7;
        }

        .footer-social {

            display: flex;

            gap: 8px;

            margin-top: 16px;
        }

        .footer-social a {

            width: 32px;

            height: 32px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            color: white;

            background: rgba(255,255,255,.10);

            border: 1px solid rgba(255,255,255,.08);

            font-size: 12px;

            transition: .25s;
        }

        .footer-social a:hover {

            background: #08afd7;

            transform: translateY(-3px);
        }

        .footer-link-column h3 {

            font-family: "Playfair Display", serif;

            font-size: 16px;

            margin-bottom: 15px;
        }

        .footer-link-column a {

            display: block;

            color: #9dbdc7;

            font-size: 9px;

            margin-bottom: 10px;

            transition: .2s;
        }

        .footer-link-column a:hover {

            color: #55d9f4;

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

        .footer-quote-section {

            padding: 28px 20px 32px;

            border-top: 1px solid rgba(255,255,255,.10);

            border-bottom: 1px solid rgba(255,255,255,.10);

            text-align: center;
        }

        .footer-quote-mark {

            color: #0bb8df;

            font-family: Georgia, serif;

            font-size: 43px;

            line-height: .5;
        }

        .footer-quote {

            font-family: "Playfair Display", serif;

            font-style: italic;

            font-size: 20px;

            line-height: 1.4;

            margin-top: 8px;
        }

        .footer-quote-author {

            margin-top: 12px;

            color: #638b98;

            font-size: 7px;

            font-weight: 800;

            letter-spacing: 3px;
        }

        .footer-bottom {

            display: grid;

            grid-template-columns: 1fr auto 1fr;

            align-items: center;

            gap: 20px;

            min-height: 52px;
        }

        .footer-copyright,
        .footer-policy a,
        .footer-made {

            color: #698f9b;

            font-size: 7px;
        }

        .footer-policy {

            display: flex;

            gap: 20px;
        }

        .footer-policy a:hover {

            color: #53d7f2;
        }

        .footer-made {

            text-align: right;
        }

        .footer-made strong {

            color: #10b9df;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width:1200px) {

            .navbar a {

                padding: 10px 8px;

                font-size: 9px;
            }

            .logo-area {

                min-width: 205px;
            }

            .search-box {

                width: 190px;
            }

            .home-footer-grid {

                grid-template-columns:
                    1.2fr
                    1fr
                    1fr;
            }

            .footer-newsletter {

                grid-column: span 2;

                padding-left: 0;
            }
        }


        @media(max-width:950px) {

            .topbar {

                padding: 0 20px;
            }

            .topbar-right {

                display: none;
            }

            .main-header {

                left: 20px;

                right: 20px;
            }

            .navbar {

                display: none;
            }

            .logo-area {

                flex: 1;
            }

            .sosok-hero {

                padding-left: 20px;

                padding-right: 20px;
            }

            .hero-grid {

                grid-template-columns: 1fr;
            }

            .popular-card {

                display: none;
            }

            .people-section,
            .discover-section {

                padding-left: 20px;

                padding-right: 20px;
            }

            .people-grid {

                grid-template-columns: repeat(2,1fr);
            }
        }


        @media(max-width:650px) {

            .topbar {

                height: 32px;

                font-size: 8px;
            }

            .topbar-left {

                gap: 10px;
            }

            .main-header {

                top: 43px;

                height: 66px;

                border-radius: 17px;

                padding: 0 10px;
            }

            .logo-area {

                min-width: 0;
            }

            .logo-area img {

                width: 45px;

                height: 45px;
            }

            .logo-text {

                font-size: 19px;
            }

            .logo-subtitle {

                font-size: 6px;
            }

            .search-box {

                display: none;
            }

            .menu-button {

                width: 40px;

                height: 40px;
            }

            .sosok-hero {

                padding-top: 125px;

                min-height: auto;

                padding-bottom: 30px;
            }

            .hero-title {

                font-size: 39px;
            }

            .hero-description {

                font-size: 14px;
            }

            .featured-sosok {

                grid-template-columns: 1fr;
            }

            .featured-image {

                height: 210px;
            }

            .featured-content {

                padding: 18px 7px 10px;
            }

            .featured-content h2 {

                font-size: 23px;
            }

            .people-grid {

                grid-template-columns: 1fr;
            }

            .discover-card {

                padding: 20px;

                flex-direction: column;

                align-items: flex-start;

                gap: 14px;
            }

            .discover-card::before {

                width: 100%;
            }

            .discover-text h2 {

                font-size: 16px;
            }

            .home-footer-grid {

                grid-template-columns: 1fr 1fr;

                gap: 28px;
            }

            .footer-brand-column {

                grid-column: span 2;
            }

            .footer-newsletter {

                grid-column: span 2;
            }

            .footer-bottom {

                grid-template-columns: 1fr;

                text-align: center;

                padding: 15px 0;

                gap: 10px;
            }

            .footer-policy {

                justify-content: center;

                flex-wrap: wrap;
            }

            .footer-made {

                text-align: center;
            }
        }


        @media(max-width:430px) {

            .home-footer-grid {

                grid-template-columns: 1fr;
            }

            .footer-brand-column,
            .footer-newsletter {

                grid-column: auto;
            }

            .hero-title {

                font-size: 34px;
            }
        }

        .sosok-topbar {
            position: relative;
            z-index: 20;
            min-height: 38px;
            background: #063f60;
            color: #fff;
        }

        .sosok-topbar-inner {
            width: min(1300px, calc(100% - 40px));
            min-height: 38px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: 10px;
            font-weight: 600;
        }

        .sosok-topbar-left,
        .sosok-topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .sosok-topbar-item {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .sosok-topbar-item i,
        .sosok-topbar-weather-icon {
            color: #72e3fa;
        }

        .sosok-topbar-divider {
            width: 1px;
            height: 13px;
            background: rgba(255, 255, 255, .25);
        }

        .sosok-topbar-right a {
            color: #fff;
            text-decoration: none;
            opacity: .9;
            transition: color .2s;
        }

        .sosok-topbar-right a:hover {
            color: #72e3fa;
        }

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
            box-shadow: 0 15px 40px rgba(7, 63, 94, .1);
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
            color: #073f5e;
            font: 800 23px "Playfair Display", serif;
        }

        .sosok-brand-fallback span {
            color: #08add5;
        }

        .sosok-main-nav {
            display: flex;
            flex: 1 1 auto;
            min-width: 0;
            align-items: center;
            justify-content: center;
            gap: 2px;
        }

        .sosok-main-nav > a,
        .sosok-nav-dropdown summary {
            padding: 10px 11px;
            border-radius: 22px;
            color: #073f5e;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .sosok-main-nav > a:hover,
        .sosok-nav-dropdown summary:hover,
        .sosok-nav-dropdown[open] summary {
            background: #e8f8fc;
            color: #0789a9;
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
            color: #08add5;
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
            color: #073f5e;
            font-size: 12px;
            text-decoration: none;
        }

        .sosok-nav-dropdown-menu a:hover,
        .sosok-nav-dropdown-menu a.active {
            background: #e8f8fc;
            color: #0789a9;
        }

        .sosok-search {
            display: flex;
            flex: 0 1 230px;
            align-items: center;
            gap: 8px;
            min-width: 150px;
            height: 40px;
            padding: 0 5px 0 12px;
            border: 1px solid #d8edf4;
            border-radius: 24px;
            background: #f8fcfd;
            color: #08add5;
        }

        .sosok-search input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: #073f5e;
            font: 11px "DM Sans", sans-serif;
        }

        .sosok-search button {
            min-height: 30px;
            padding: 0 11px;
            border: 0;
            border-radius: 18px;
            background: #08add5;
            color: #fff;
            font: 700 10px "DM Sans", sans-serif;
            cursor: pointer;
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
            border: 1px solid #d8edf4;
            border-radius: 22px;
            background: #fff;
            color: #073f5e;
            font: 700 11px "DM Sans", sans-serif;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
        }

        .sosok-account-actions a:hover,
        .sosok-account-actions button:hover {
            border-color: #08add5;
            color: #0789a9;
        }

        .sosok-account-actions .sosok-register-link {
            border-color: #08add5;
            background: #08add5;
            color: #fff;
        }

        .sosok-account-actions .sosok-register-link:hover {
            background: #078eae;
            color: #fff;
        }

        .sosok-account-actions form {
            margin: 0;
        }

        .sosok-main-nav > a[aria-current="page"] {
            background: #e8f8fc;
            color: #0789a9;
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

        .home-footer .footer-brand {
            display: block;
            width: fit-content;
        }

        .home-footer .footer-logo-box {
            width: auto;
            height: auto;
            overflow: visible;
            border: 0;
            border-radius: 0;
            background: transparent;
        }

        .home-footer .footer-logo-box img {
            display: block;
            width: 180px;
            height: auto;
            object-fit: contain;
        }

        .newsletter-feedback {
            margin-top: 9px;
            color: #a6e7f5;
            font-size: 10px;
            line-height: 1.5;
        }

        .sosok-hero {
            padding-top: 54px;
        }

        @media(max-width:1150px) {
            .sosok-topbar-right {
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

        @media(max-width:650px) {
            .sosok-topbar-inner {
                width: calc(100% - 20px);
                justify-content: center;
                padding: 7px 0;
            }

            .sosok-topbar-left {
                gap: 9px;
                font-size: 8px;
            }

            .sosok-topbar-left .sosok-topbar-item:last-child {
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

            .sosok-hero {
                padding-top: 32px;
            }
        }

    </style>

</head>


<body>


{{-- =========================================================
     TOP BAR
========================================================= --}}

<div class="sosok-topbar">
    <div class="sosok-topbar-inner">
        <div class="sosok-topbar-left">
            <div class="sosok-topbar-item"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Banjarnegara</div>
            <div class="sosok-topbar-item">
                <span id="sosokWeatherIcon" class="sosok-topbar-weather-icon" aria-hidden="true">🌤️</span>
                <span id="sosokTemperature">--°C</span>
            </div>
            <div class="sosok-topbar-divider" aria-hidden="true"></div>
            <div class="sosok-topbar-item"><i class="fa-regular fa-calendar" aria-hidden="true"></i> {{ now()->locale('id')->translatedFormat('l, j F Y') }}</div>
        </div>

        <div class="sosok-topbar-right" aria-label="Tautan layanan dan media sosial">
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
                    <a class="active" href="{{ route('sosok') }}" aria-current="page">Sosok</a>
                    <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                    <a href="{{ route('potensi') }}">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>
            </details>
        </nav>

        <form class="sosok-search" action="{{ route('articles.index') }}" method="GET" role="search">
            <label class="sosok-visually-hidden" for="sosok-search">Cari berita dan sosok</label>
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            <input id="sosok-search" type="search" name="q" value="{{ request('q') }}" placeholder="Cari berita atau sosok..." maxlength="100">
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
     HERO SOSOK
========================================================= --}}

<section class="sosok-hero">

    <div class="hero-container">


        {{-- INTRO --}}

        <div class="hero-intro">

            <h1 class="hero-title">

                <i class="fa-solid fa-users"></i>

                Sosok

            </h1>

            <p class="hero-description">

                Mengenal lebih dekat para tokoh, inspirator,
                dan pahlawan dari Banjarnegara yang memberi
                dampak bagi masyarakat.

            </p>

            <div class="hero-line"></div>

        </div>



        {{-- HERO GRID --}}

        <div class="hero-grid">


            {{-- FEATURED --}}

            <article class="featured-sosok {{ $featuredSosok ? '' : 'featured-sosok-empty' }}">
                @if ($featuredSosok)
                    <div class="featured-image">
                        <img
                            src="{{ $featuredSosok->cover_image_path ? asset('storage/'.$featuredSosok->cover_image_path) : asset('images/bupati.png') }}"
                            alt="{{ $featuredSosok->caption ?: $featuredSosok->title }}"
                        >
                        <div class="image-overlay"></div>
                        <span class="category-label">TOKOH PILIHAN</span>
                    </div>

                    <div class="featured-content">
                        <div class="article-meta">
                            <span class="author-mini"><i class="fa-solid fa-user" aria-hidden="true"></i></span>
                            <span>{{ $featuredSosok->author_name ?: 'Redaksi Derap Serayu' }}</span>
                            @if ($featuredSosok->published_at)
                                <span aria-hidden="true">•</span>
                                <time datetime="{{ $featuredSosok->published_at->toDateString() }}">{{ $featuredSosok->published_at->translatedFormat('j M Y') }}</time>
                            @endif
                            <span aria-hidden="true">•</span>
                            <span><i class="fa-regular fa-eye" aria-hidden="true"></i> {{ number_format($featuredSosok->views) }}</span>
                        </div>

                        <h2>{{ $featuredSosok->title }}</h2>
                        <p>{{ $featuredSosok->summary }}</p>
                        <a href="{{ route('articles.show', $featuredSosok->slug) }}" class="read-button">
                            Baca kisah lengkap
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                @else
                    <div class="featured-content featured-empty">
                        <h2>Belum ada tokoh unggulan</h2>
                        <p>Artikel Sosok yang sudah diterbitkan akan tampil di bagian ini.</p>
                        <a href="{{ route('articles.index', ['category' => 'Sosok']) }}" class="read-button">
                            Jelajahi semua Sosok
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                @endif
            </article>



            {{-- POPULAR --}}

            <aside class="popular-card">

                <div class="section-title-small">

                    <h3>

                        <i class="fa-solid fa-fire"></i>

                        Sosok Populer

                    </h3>

                    <a href="{{ route('articles.index', ['category' => 'Sosok']) }}" class="see-all">
                        Lihat Semua →
                    </a>

                </div>



                @forelse ($popularSosok as $sosok)
                    <a href="{{ route('articles.show', $sosok->slug) }}" class="popular-item">
                        <span class="popular-number">{{ $loop->iteration }}</span>
                        <span class="popular-image">
                            <img
                                src="{{ $sosok->cover_image_path ? asset('storage/'.$sosok->cover_image_path) : asset('images/bupati.png') }}"
                                alt="{{ $sosok->caption ?: $sosok->title }}"
                            >
                        </span>
                        <span class="popular-info">
                            <strong>{{ $sosok->title }}</strong>
                            <span><i class="fa-regular fa-eye" aria-hidden="true"></i> {{ number_format($sosok->views) }} dibaca</span>
                        </span>
                    </a>
                @empty
                    <p class="popular-empty">Belum ada sosok populer yang diterbitkan.</p>
                @endforelse

            </aside>

        </div>

    </div>

</section>



{{-- =========================================================
     TOKOH PILIHAN
========================================================= --}}

<section class="people-section">

    <div class="people-section-title">

        <div class="people-heading">

            <i class="fa-solid fa-id-badge"></i>

            <h2>
                Tokoh Pilihan
            </h2>

            <div class="heading-line"></div>

        </div>


        <a href="{{ route('articles.index', ['category' => 'Sosok']) }}" class="people-see-all">
            Lihat Semua →
        </a>

    </div>



    <div class="people-grid">
        @forelse ($sosokArticles as $sosok)
            <article class="person-card">
                <a class="person-image" href="{{ route('articles.show', $sosok->slug) }}" aria-label="Baca {{ $sosok->title }}">
                    <img
                        src="{{ $sosok->cover_image_path ? asset('storage/'.$sosok->cover_image_path) : asset('images/bupati.png') }}"
                        alt="{{ $sosok->caption ?: $sosok->title }}"
                    >
                    <span class="person-category">{{ $sosok->category }}</span>
                </a>

                <div class="person-content">
                    <h3><a href="{{ route('articles.show', $sosok->slug) }}">{{ $sosok->title }}</a></h3>
                    <div class="person-name">{{ $sosok->author_name ?: 'Redaksi Derap Serayu' }}</div>
                    <div class="person-meta">
                        <span><i class="fa-regular fa-eye" aria-hidden="true"></i> {{ number_format($sosok->views) }}</span>
                        @if ($sosok->published_at)
                            <time datetime="{{ $sosok->published_at->toDateString() }}"><i class="fa-regular fa-clock" aria-hidden="true"></i> {{ $sosok->published_at->translatedFormat('j M Y') }}</time>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <p class="people-empty">Belum ada artikel Sosok yang diterbitkan. Kisah tokoh akan tampil di sini setelah redaksi memublikasikannya.</p>
        @endforelse
    </div>

    @if ($sosokArticles->hasPages())
        <nav class="people-pagination" aria-label="Navigasi halaman Sosok">
            @if ($sosokArticles->onFirstPage())
                <span aria-disabled="true">Sebelumnya</span>
            @else
                <a href="{{ $sosokArticles->previousPageUrl() }}">Sebelumnya</a>
            @endif

            <span>Halaman {{ $sosokArticles->currentPage() }} dari {{ $sosokArticles->lastPage() }}</span>

            @if ($sosokArticles->hasMorePages())
                <a href="{{ $sosokArticles->nextPageUrl() }}">Berikutnya</a>
            @else
                <span aria-disabled="true">Berikutnya</span>
            @endif
        </nav>
    @endif

</section>



{{-- =========================================================
     DISCOVER CTA
========================================================= --}}

<section class="discover-section">

    <div class="discover-card">

        <div class="discover-text">

            <h2>
                Ingin mengenal lebih banyak sosok inspiratif lainnya?
            </h2>

            <p>
                Temukan kisah lengkap para tokoh dan pejuang
                Banjarnegara di halaman berikutnya.
            </p>

        </div>


        <a href="{{ route('articles.index', ['category' => 'Sosok']) }}" class="discover-button">

            Jelajahi Semua Sosok

            <i class="fa-solid fa-arrow-right"></i>

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

                <a href="{{ route('articles.index') }}">
                    Berita
                </a>

                <a href="{{ route('cerita') }}">
                    Cerita & Budaya
                </a>

                <a href="{{ route('sosok') }}" aria-current="page">
                    Sosok
                </a>

                <a href="{{ route('opini') }}">
                    Opini
                </a>

                <a href="{{ route('sudut-kota') }}">
                    Sudut Kota
                </a>

            </div>



            {{-- INFORMASI --}}

            <div class="footer-link-column">

                <h3>
                    Informasi
                </h3>

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

<script>
    async function updateSosokTopbarWeather() {
        const weatherIcon = document.getElementById("sosokWeatherIcon");
        const temperature = document.getElementById("sosokTemperature");
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
            console.error("Unable to load Sosok topbar weather.", error);
            weatherIcon.textContent = "❔";
            temperature.textContent = "Cuaca tidak tersedia";
        }
    }

    updateSosokTopbarWeather();
</script>

</body>
</html>