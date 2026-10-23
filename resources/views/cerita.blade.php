<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cerita & Budaya | Derap Serayu</title>

    {{-- =========================================================
        FONT
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700;800&display=swap"
          rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>

        /* =========================================================
           RESET
        ========================================================== */

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
            background: #eef9fc;
            color: #073d5a;
            overflow-x: hidden;
        }

        img {
            display: block;
            max-width: 100%;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input {
            font-family: inherit;
        }


        /* =========================================================
           VARIABLES
        ========================================================== */

        :root {
            --navy: #063f60;
            --navy-dark: #022c45;
            --cyan: #08add5;
            --cyan-dark: #0798bd;
            --cyan-light: #6de3fa;
            --cyan-soft: #e7f9fd;

            --white: #ffffff;
            --text: #073d5a;
            --muted: #718997;

            --border: #e3f0f4;

            --shadow:
                0 15px 45px rgba(3, 66, 93, .10);

            --shadow-hover:
                0 22px 50px rgba(3, 66, 93, .16);
        }


        /* =========================================================
           PAGE BACKGROUND
        ========================================================== */

        .page {
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            background:
                linear-gradient(
                    180deg,
                    #dff6fb 0%,
                    #eef9fc 32%,
                    #f7fcfd 100%
                );
        }


        /*
         * Elemen gambar besar di bagian atas.
         * Menggunakan gambar Dieng yang sudah kamu punya.
         */

        .page-bg {
            position: absolute;
            top: 0;
            left: 0;

            width: 100%;
            height: 690px;

            background:
                linear-gradient(
                    180deg,
                    rgba(220,246,251,.72) 0%,
                    rgba(239,249,252,.92) 42%,
                    #f5fbfd 100%
                ),
                url("{{ asset('images/bg-candiarjuna-home.jpg') }}");

            background-size: cover;
            background-position: center top;

            z-index: 0;
        }


        /* Dekorasi lingkaran */

        .decor-circle {
            position: absolute;
            border: 1px solid rgba(8, 173, 213, .16);
            border-radius: 50%;
            pointer-events: none;
        }

        .decor-circle.circle-1 {
            width: 300px;
            height: 300px;
            top: 170px;
            left: -160px;
        }

        .decor-circle.circle-2 {
            width: 400px;
            height: 400px;
            top: 300px;
            right: -230px;
        }

        .decor-circle.circle-3 {
            width: 150px;
            height: 150px;
            top: 1000px;
            left: -70px;
        }


        /* =========================================================
           TOP BAR
        ========================================================== */

        .topbar {
            height: 38px;
            background: rgba(3, 62, 89, .97);
            color: white;

            position: relative;
            z-index: 30;
        }

        .topbar-inner {
            width: min(1330px, calc(100% - 40px));
            height: 100%;
            margin: auto;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .top-left,
        .top-right {
            display: flex;
            align-items: center;
            gap: 19px;
        }

        .top-item {
            display: flex;
            align-items: center;
            gap: 7px;

            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .top-item i {
            color: #6ee4fb;
        }

        .top-social {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .top-social a {
            transition: .2s;
        }

        .top-social a:hover {
            color: var(--cyan-light);
        }


        /* =========================================================
           NAVBAR
        ========================================================== */

        .navbar-wrap {
            width: min(1330px, calc(100% - 40px));

            margin: 10px auto 0;

            position: relative;
            z-index: 30;
        }

        .navbar {
            min-height: 82px;

            padding: 12px 18px;

            border-radius: 27px;

            background: rgba(255, 255, 255, .91);

            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);

            border: 1px solid rgba(255, 255, 255, .95);

            box-shadow:
                0 15px 40px rgba(4, 67, 94, .12);

            display: flex;
            align-items: center;

            gap: 20px;
        }


        /* LOGO */

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;

            min-width: 255px;
        }

        .brand-logo {
            width: 66px;
            height: 54px;

            object-fit: contain;
        }

        .brand-name {
            font-family: "Playfair Display", serif;

            font-size: 28px;
            font-weight: 800;

            line-height: 1;

            color: #073d5a;
        }

        .brand-name span {
            color: var(--cyan);
        }

        .brand-subtitle {
            margin-top: 4px;

            font-size: 9px;
            color: #7592a1;
        }


        /* MENU */

        .nav-menu {
            flex: 1;

            display: flex;
            align-items: center;

            gap: 2px;
        }

        .nav-menu a {
            padding: 12px 13px;

            border-radius: 23px;

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;

            transition: .25s;
        }

        .nav-menu a:hover {
            color: var(--cyan);
            background: #effaff;
        }

        .nav-menu a.active {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    #08abd3,
                    #09c3eb
                );

            box-shadow:
                0 8px 20px rgba(8, 173, 213, .25);
        }


        /* SEARCH */

        .search-box {
            width: 245px;
            height: 43px;

            border-radius: 24px;

            background: #eef8fb;

            display: flex;
            align-items: center;

            gap: 9px;

            padding: 0 14px;

            color: #7b99a7;
        }

        .search-box input {
            border: 0;
            outline: 0;

            width: 100%;

            background: transparent;

            font-size: 11px;
        }

        .search-box i {
            color: #174f69;
        }


        /* MENU BUTTON */

        .menu-button {
            width: 49px;
            height: 49px;

            border: 0;
            border-radius: 50%;

            background: #063d5a;

            color: white;

            font-size: 17px;

            cursor: pointer;

            flex-shrink: 0;

            box-shadow:
                0 8px 20px rgba(2, 44, 69, .20);
        }


        /* =========================================================
           MAIN CONTAINER
        ========================================================== */

        .main-container {
            width: min(1330px, calc(100% - 40px));

            margin: 14px auto 0;

            position: relative;
            z-index: 5;
        }


        /* =========================================================
           HERO CERITA & BUDAYA
        ========================================================== */

        .hero-section {
            display: grid;

            grid-template-columns:
                minmax(0, 2.05fr)
                minmax(310px, .95fr);

            gap: 15px;
        }


        /* HERO BESAR */

        .hero-card {
            height: 430px;

            position: relative;

            border-radius: 25px;

            overflow: hidden;

            background:
                url("{{ asset('images/bg-rambutgimbal-cerita.jpg') }}");

            background-size: cover;
            background-position: center;

            box-shadow: var(--shadow);
        }

        .hero-card::before {
            content: "";

            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    90deg,
                    rgba(2, 40, 61, .92) 0%,
                    rgba(3, 54, 78, .68) 44%,
                    rgba(3, 54, 78, .15) 100%
                );
        }

        .hero-card::after {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            right: -130px;
            bottom: -170px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.25);
        }


        .hero-content {
            position: absolute;

            left: 44px;
            bottom: 40px;

            width: 65%;

            color: white;

            z-index: 2;
        }

        .hero-script {
            font-family: "Caveat", cursive;

            color: #71e6ff;

            font-size: 28px;

            margin-bottom: 2px;
        }

        .hero-title {
            font-family: "Playfair Display", serif;

            font-size: clamp(40px, 4vw, 57px);

            line-height: 1.03;

            font-weight: 700;
        }

        .hero-title span {
            color: #09c5ed;
        }

        .hero-description {
            max-width: 650px;

            margin-top: 14px;

            font-size: 13px;

            line-height: 1.65;

            color: rgba(255,255,255,.87);
        }

        .hero-featured-link {
            display: flex;
            width: fit-content;
            max-width: 100%;
            flex-direction: column;
            gap: 4px;
            margin-top: 15px;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.4;
        }

        .hero-featured-link span {
            color: #72e3fa;
            font-size: 8px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero-featured-link:hover {
            color: #72e3fa;
        }


        .hero-meta {
            display: flex;
            align-items: center;

            gap: 18px;

            margin-top: 18px;
        }

        .hero-meta-item {
            display: flex;
            align-items: center;

            gap: 6px;

            font-size: 10px;

            color: white;
        }

        .hero-meta-item i {
            color: #66e5ff;
        }


        .hero-button {
            display: inline-flex;
            align-items: center;

            gap: 10px;

            margin-top: 18px;

            padding: 12px 19px;

            border-radius: 25px;

            background: #08b9df;

            color: white;

            font-size: 11px;
            font-weight: 800;

            box-shadow:
                0 10px 25px rgba(0, 188, 226, .25);

            transition: .25s;
        }

        .hero-button:hover {
            transform: translateY(-2px);

            background: #08a9ce;
        }


        .hero-quote {
            position: absolute;

            right: 35px;
            top: 60px;

            width: 180px;

            color: white;

            font-family: "Caveat", cursive;

            font-size: 28px;

            line-height: 1.05;

            transform: rotate(-4deg);

            z-index: 2;
        }

        .hero-quote span {
            color: #69e4fc;
        }


        /* =========================================================
           POPULAR
        ========================================================== */

        .popular-card {
            height: 430px;

            background: rgba(255,255,255,.94);

            border-radius: 25px;

            padding: 20px;

            box-shadow: var(--shadow);

            overflow: hidden;
        }

        .popular-heading {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 8px;
        }

        .popular-title {
            font-family: "Playfair Display", serif;

            font-size: 19px;

            font-weight: 700;
        }

        .popular-title i {
            color: #ff7348;

            margin-right: 5px;
        }

        .popular-see {
            color: var(--cyan);

            font-size: 9px;

            font-weight: 800;
        }


        .popular-list {
            display: flex;

            flex-direction: column;
        }

        .popular-item {
            display: grid;

            grid-template-columns:
                25px
                76px
                1fr;

            gap: 9px;

            align-items: center;

            min-height: 87px;

            border-bottom: 1px solid #e5eef2;
        }

        .popular-item:last-child {
            border-bottom: 0;
        }

        .popular-number {
            width: 23px;
            height: 23px;

            border-radius: 50%;

            background: #0a93c0;

            color: white;

            display: grid;
            place-items: center;

            font-size: 9px;
            font-weight: 800;
        }

        .popular-item img {
            width: 76px;
            height: 58px;

            border-radius: 10px;

            object-fit: cover;
        }

        .popular-info {
            min-width: 0;
        }

        .popular-tag {
            display: inline-block;

            padding: 3px 7px;

            border-radius: 10px;

            background: #e4f9fd;

            color: #08a7cd;

            font-size: 7px;

            font-weight: 800;

            text-transform: uppercase;
        }

        .popular-info h3 {
            font-family: "Playfair Display", serif;

            font-size: 11px;

            line-height: 1.22;

            margin-top: 3px;

            color: #10435d;
        }

        .popular-item-title {
            display: block;
            margin-top: 3px;
            color: #10435d;
            font-family: "Playfair Display", serif;
            font-size: 11px;
            font-weight: 700;
            line-height: 1.22;
        }

        .popular-item-views {
            display: block;
            margin-top: 3px;
            color: #8ca0aa;
            font-size: 8px;
        }

        .popular-item {
            color: inherit;
            text-decoration: none;
        }

        .popular-info p {
            color: #8ca0aa;

            font-size: 8px;

            margin-top: 3px;
        }


        /* =========================================================
           CATEGORY BAR
        ========================================================== */

        .category-section {
            margin-top: 12px;
        }

        .category-grid {
            display: grid;

            grid-template-columns:
                repeat(6, 1fr);

            gap: 10px;
        }

        .category-card {
            min-height: 105px;

            padding: 15px;

            position: relative;

            overflow: hidden;

            background: rgba(255,255,255,.94);

            border-radius: 19px;

            border: 1px solid rgba(255,255,255,.9);

            box-shadow:
                0 10px 30px rgba(3,65,92,.07);

            transition: .25s;
        }

        .category-card:hover {
            transform: translateY(-4px);

            box-shadow:
                0 16px 30px rgba(3,65,92,.12);
        }

        .category-card::after {
            content: "";

            position: absolute;

            width: 90px;
            height: 90px;

            right: -35px;
            bottom: -45px;

            border-radius: 50%;

            background: #e9f9fd;
        }

        .category-icon {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            display: grid;
            place-items: center;

            color: white;

            background: #079fc7;

            margin-bottom: 8px;

            position: relative;
            z-index: 2;
        }

        .category-card:nth-child(2) .category-icon {
            background: #0bb286;
        }

        .category-card:nth-child(3) .category-icon {
            background: #f2a51d;
        }

        .category-card:nth-child(4) .category-icon {
            background: #7956dd;
        }

        .category-card:nth-child(5) .category-icon {
            background: #e74c71;
        }

        .category-card:nth-child(6) .category-icon {
            background: #10a9cf;
        }

        .category-card h3 {
            font-family: "Playfair Display", serif;

            font-size: 13px;

            position: relative;
            z-index: 2;
        }

        .category-card p {
            font-size: 8px;

            color: #8298a4;

            margin-top: 3px;

            position: relative;
            z-index: 2;
        }

        .category-arrow {
            position: absolute;

            right: 10px;
            bottom: 9px;

            width: 23px;
            height: 23px;

            border-radius: 50%;

            display: grid;
            place-items: center;

            background: white;

            color: var(--cyan);

            font-size: 9px;

            z-index: 3;
        }


        /* =========================================================
           SECTION HEADER
        ========================================================== */

        .section-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin: 23px 3px 12px;
        }

        .section-heading {
            display: flex;

            align-items: center;

            gap: 9px;
        }

        .section-heading i {
            color: var(--cyan);

            font-size: 17px;
        }

        .section-heading h2 {
            font-family: "Playfair Display", serif;

            font-size: 22px;

            color: var(--navy);
        }

        .section-line {
            width: 45px;
            height: 2px;

            background: var(--cyan);

            border-radius: 10px;
        }

        .section-link {
            color: var(--cyan);

            font-size: 10px;

            font-weight: 800;
        }


        /* =========================================================
           FEATURED STORIES
        ========================================================== */

        .stories-grid {
            display: grid;

            grid-template-columns:
                1.35fr
                .9fr
                .9fr;

            gap: 13px;
        }


        /* LARGE STORY */

        .featured-story {
            height: 315px;

            position: relative;

            border-radius: 22px;

            overflow: hidden;

            background:
                url("{{ asset('images/bg-pemotongan-cerita.jpg') }}");

            background-size: cover;
            background-position: center;
        }

        .featured-story::after {
            content: "";

            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    transparent 30%,
                    rgba(2,37,55,.94)
                );
        }

        .featured-story-content {
            position: absolute;

            z-index: 2;

            left: 22px;
            right: 22px;
            bottom: 21px;

            color: white;
        }

        .story-badge {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 14px;

            background: #08b5dc;

            color: white;

            font-size: 8px;

            font-weight: 800;

            text-transform: uppercase;
        }

        .featured-story h3 {
            font-family: "Playfair Display", serif;

            font-size: 25px;

            line-height: 1.12;

            margin-top: 8px;
        }

        .featured-story p {
            color: rgba(255,255,255,.82);

            font-size: 10px;

            line-height: 1.5;

            margin-top: 7px;

            max-width: 500px;
        }


        /* SMALL STORY */

        .small-story-card {
            background: white;

            border-radius: 22px;

            overflow: hidden;

            border: 1px solid var(--border);

            box-shadow:
                0 10px 30px rgba(3,65,92,.07);

            transition: .25s;
        }

        .small-story-card:hover {
            transform: translateY(-4px);

            box-shadow: var(--shadow-hover);
        }

        .small-story-image {
            width: 100%;
            height: 150px;

            overflow: hidden;
        }

        .small-story-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .4s;
        }

        .small-story-card:hover img {
            transform: scale(1.05);
        }

        .small-story-content {
            padding: 15px;
        }

        .small-story-content .story-category {
            color: var(--cyan);

            font-size: 8px;

            font-weight: 800;

            text-transform: uppercase;
        }

        .small-story-content h3 {
            font-family: "Playfair Display", serif;

            font-size: 15px;

            line-height: 1.25;

            display: block;
            margin-top: 5px;
            font-size: 8px;
            color: #8bb4c1;
        }

        .story-meta a,
        .article-footer a {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #0789a9;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
        }

        .story-meta a:hover,
        .article-footer a:hover {
            color: #063f60;
        }

        .small-story-content p {
            color: #78909c;

            font-size: 9px;

            line-height: 1.5;

            margin-top: 5px;
        }

        .story-meta {
            display: flex;

            justify-content: space-between;

            margin-top: 12px;

            color: #8aa0aa;

            font-size: 8px;
        }


        /* =========================================================
           ALL STORIES
        ========================================================== */

        .all-stories {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 13px;
        }

        .article-card {
            background: white;

            border-radius: 19px;

            overflow: hidden;

            border: 1px solid var(--border);

            box-shadow:
                0 9px 28px rgba(3,65,92,.06);

            transition: .25s;
        }

        .article-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 18px 35px rgba(3,65,92,.12);
        }

        .article-image {
            display: block;
            height: 145px;

            position: relative;

            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .4s;
        }

        .article-card:hover .article-image img {
            transform: scale(1.06);
        }

        .story-empty {
            grid-column: 1 / -1;
            padding: 28px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: rgba(255, 255, 255, .92);
            color: #638a99;
            font-size: 13px;
            line-height: 1.7;
            text-align: center;
        }

        .story-empty-compact {
            padding: 20px 12px;
            font-size: 10px;
        }

        .story-pagination {
            display: flex;
            justify-content: center;
            margin-top: 24px;
        }

        .article-tag {
            position: absolute;

            left: 10px;
            bottom: 10px;

            padding: 5px 9px;

            border-radius: 12px;

            background: #08b7df;

            color: white;

            font-size: 8px;

            font-weight: 800;
        }

        .article-body {
            padding: 14px;
        }

        .article-body h3 {
            font-family: "Playfair Display", serif;

            font-size: 14px;

            line-height: 1.3;
        }

        .article-body h3 a {
            color: inherit;
        }

        .article-body p {
            color: #78909c;

            font-size: 9px;

            line-height: 1.5;

            margin-top: 6px;
        }

        .article-footer {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: 12px;

            color: #8da0a9;

            font-size: 8px;
        }

        .article-arrow {
            width: 27px;
            height: 27px;

            border-radius: 50%;

            display: grid;
            place-items: center;

            background: #e9faff;

            color: var(--cyan);
        }


        /* =========================================================
           LOWER FEATURE
        ========================================================== */

        .lower-section {
            display: grid;

            grid-template-columns:
                1.5fr
                .8fr;

            gap: 14px;

            margin-top: 22px;
        }


        /* EXPLORE */

        .explore-card {
            min-height: 230px;

            border-radius: 23px;

            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    90deg,
                    rgba(2,43,65,.94),
                    rgba(2,43,65,.30)
                ),
                url("{{ asset('images/bg-pemotongan-cerita.jpg') }}");

            background-size: cover;
            background-position: center;
        }

        .explore-content {
            width: 65%;

            padding: 31px;

            color: white;

            position: relative;

            z-index: 2;
        }

        .explore-script {
            font-family: "Caveat", cursive;

            color: #6ce5fd;

            font-size: 27px;
        }

        .explore-content h2 {
            font-family: "Playfair Display", serif;

            font-size: 29px;

            line-height: 1.15;

            margin-top: 2px;
        }

        .explore-content p {
            color: rgba(255,255,255,.83);

            font-size: 10px;

            line-height: 1.6;

            margin-top: 8px;
        }

        .explore-btn {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 10px 16px;

            margin-top: 14px;

            border-radius: 20px;

            background: #08b9df;

            color: white;

            font-size: 10px;

            font-weight: 800;
        }


        /* QUOTE */

        .quote-card {
            min-height: 230px;

            border-radius: 23px;

            background:
                linear-gradient(
                    145deg,
                    #ffffff,
                    #e9faff
                );

            padding: 28px;

            position: relative;

            overflow: hidden;

            border: 1px solid white;
        }

        .quote-card::after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -70px;
            bottom: -90px;

            border-radius: 50%;

            border: 25px solid rgba(8,173,213,.07);
        }

        .quote-mark {
            font-family: Georgia, serif;

            font-size: 55px;

            color: var(--cyan);

            line-height: .5;
        }

        .quote-text {
            position: relative;

            z-index: 2;

            margin-top: 15px;

            font-family: "Playfair Display", serif;

            font-size: 21px;

            line-height: 1.35;

            color: var(--navy);
        }

        .quote-author {
            position: relative;

            z-index: 2;

            color: #78919f;

            font-size: 9px;

            margin-top: 13px;
        }


        /* =========================================================
   FOOTER BERANDA
   DIGUNAKAN JUGA UNTUK CERITA & BUDAYA
========================================================= */

.home-footer {

    position: relative;

    margin-top: 55px;

    background:
        linear-gradient(
            180deg,
            rgba(2, 51, 73, .97),
            rgba(1, 42, 61, .99)
        ),
        url("{{ asset('images/bg-dieng-register.jpg') }}");

    background-size: cover;
    background-position: center;

    color: white;

    overflow: hidden;
}


/* lapisan cahaya */

.home-footer::before {

    content: "";

    position: absolute;

    width: 600px;
    height: 600px;

    left: -300px;
    bottom: -400px;

    border-radius: 50%;

    border: 1px solid rgba(80, 218, 245, .08);

    pointer-events: none;
}


.home-footer::after {

    content: "";

    position: absolute;

    width: 450px;
    height: 450px;

    right: -250px;
    top: -250px;

    border-radius: 50%;

    border: 1px solid rgba(80, 218, 245, .08);

    pointer-events: none;
}


/* =========================================================
   FOOTER INNER
========================================================= */

.home-footer-inner {

    width: min(1330px, calc(100% - 40px));

    margin: auto;

    position: relative;

    z-index: 2;

    padding: 58px 0 20px;
}


/* =========================================================
   FOOTER GRID
========================================================= */

.home-footer-grid {

    display: grid;

    grid-template-columns:
        1.35fr
        .8fr
        .8fr
        .8fr
        1.25fr;

    gap: 45px;

    padding-bottom: 42px;
}


/* =========================================================
   BRAND
========================================================= */

.footer-brand {
    width: fit-content;
}

.footer-logo img {
    display: block;
    width: 180px;
    height: auto;
    padding: 0;
    background: transparent;
}

.footer-description {

    max-width: 300px;

    margin-top: 17px;

    color: #a7c7d1;

    font-size: 10px;

    line-height: 1.75;
}


/* =========================================================
   SOCIAL
========================================================= */

.footer-social {

    display: flex;

    align-items: center;

    gap: 9px;

    margin-top: 18px;
}


.footer-social a {

    width: 34px;
    height: 34px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: white;

    background: rgba(255,255,255,.10);

    border: 1px solid rgba(255,255,255,.08);

    font-size: 13px;

    transition: all .25s ease;
}


.footer-social a:hover {

    background: #08afd7;

    border-color: #08afd7;

    transform: translateY(-3px);
}


/* =========================================================
   FOOTER LINK COLUMN
========================================================= */

.footer-link-column h3 {

    font-family: "Playfair Display", serif;

    font-size: 16px;

    color: white;

    margin-bottom: 17px;
}


.footer-link-column a {

    display: block;

    color: #9dbdc7;

    font-size: 10px;

    margin-bottom: 12px;

    transition: all .2s ease;
}


.footer-link-column a:hover {

    color: #55d9f4;

    transform: translateX(4px);
}


/* =========================================================
   NEWSLETTER
========================================================= */

.footer-newsletter {

    padding-left: 10px;
}


.newsletter-label {

    font-size: 8px;

    font-weight: 800;

    letter-spacing: 2px;

    color: #55d9f4;

    margin-bottom: 10px;
}


.footer-newsletter h2 {

    font-family: "Playfair Display", serif;

    font-size: 24px;

    line-height: 1.25;

    color: white;

    max-width: 290px;
}


.footer-newsletter h2 span {

    color: #08b9df;
}


.footer-newsletter p {

    font-size: 9px;

    color: #a6c6cf;

    line-height: 1.6;

    margin-top: 10px;

    max-width: 280px;
}


/* =========================================================
   NEWSLETTER INPUT
========================================================= */

.newsletter-form {

    height: 44px;

    width: 100%;

    max-width: 290px;

    margin-top: 15px;

    padding: 4px 4px 4px 13px;

    display: flex;

    align-items: center;

    border-radius: 13px;

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

    font-size: 9px;
}


.newsletter-form input::placeholder {

    color: #7ea5b1;
}


.newsletter-form button {

    width: 36px;
    height: 36px;

    border: 0;

    border-radius: 10px;

    display: flex;

    align-items: center;
    justify-content: center;

    color: white;

    background: #08b5dc;

    cursor: pointer;

    transition: .25s;
}


.newsletter-form button:hover {

    background: #09c7ee;

    transform: translateX(2px);
}


/* =========================================================
   FOOTER QUOTE
========================================================= */

.footer-quote-section {

    padding:

        32px

        20px

        39px;

    border-top:

        1px solid

        rgba(255,255,255,.10);

    border-bottom:

        1px solid

        rgba(255,255,255,.10);

    text-align: center;
}


.footer-quote-mark {

    color: #0bb8df;

    font-family: Georgia, serif;

    font-size: 48px;

    line-height: .5;

    height: 25px;
}


.footer-quote {

    font-family: "Playfair Display", serif;

    font-style: italic;

    font-size: 23px;

    line-height: 1.4;

    color: white;

    margin-top: 10px;
}


.footer-quote-author {

    margin-top: 15px;

    color: #638b98;

    font-size: 7px;

    font-weight: 800;

    letter-spacing: 3px;
}


/* =========================================================
   FOOTER BOTTOM
========================================================= */

.footer-bottom {

    display: grid;

    grid-template-columns:
        1fr
        auto
        1fr;

    align-items: center;

    gap: 20px;

    min-height: 55px;
}


.footer-copyright {

    color: #698f9b;

    font-size: 8px;
}


.footer-policy {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 22px;
}


.footer-policy a {

    color: #6e95a0;

    font-size: 8px;

    transition: .2s;
}


.footer-policy a:hover {

    color: #53d7f2;
}


.footer-made {

    color: #6d939d;

    font-size: 8px;

    text-align: right;
}


.footer-made strong {

    color: #10b9df;
}


/* =========================================================
   RESPONSIVE FOOTER
========================================================= */

@media(max-width:1100px) {

    .home-footer-grid {

        grid-template-columns:
            1.2fr
            1fr
            1fr;

        gap: 35px;
    }

    .footer-newsletter {

        padding-left: 0;

        grid-column: span 2;
    }

}


@media(max-width:700px) {

    .home-footer-inner {

        width: calc(100% - 30px);

        padding-top: 42px;
    }


    .home-footer-grid {

        grid-template-columns: 1fr 1fr;

        gap: 30px;
    }


    .footer-brand-column {

        grid-column: span 2;
    }


    .footer-newsletter {

        grid-column: span 2;
    }


    .footer-quote {

        font-size: 19px;
    }


    .footer-bottom {

        grid-template-columns: 1fr;

        text-align: center;

        padding: 17px 0;

        gap: 12px;
    }


    .footer-policy {

        flex-wrap: wrap;

        gap: 10px 17px;
    }


    .footer-made {

        text-align: center;
    }

}


@media(max-width:480px) {

    .home-footer-grid {

        grid-template-columns: 1fr;
    }


    .footer-brand-column,
    .footer-newsletter {

        grid-column: auto;
    }


    .footer-newsletter h2 {

        font-size: 22px;
    }

}


        /* =========================================================
           RESPONSIVE 950px
        ========================================================== */

        @media(max-width:950px) {

            .top-right {
                display: none;
            }

            .navbar {
                flex-wrap: wrap;
            }

            .brand {
                flex: 1;
            }

            .nav-menu {
                order: 5;

                width: 100%;

                overflow-x: auto;

                padding-top: 4px;
            }

            .search-box {
                width: 200px;
            }

            .hero-section {
                grid-template-columns: 1fr;
            }

            .popular-card {
                height: auto;
            }

            .hero-quote {
                display: none;
            }

            .hero-content {
                width: 75%;
            }

            .lower-section {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }


        /* =========================================================
           RESPONSIVE 650px
        ========================================================== */

        @media(max-width:650px) {

            .topbar-inner {
                width: calc(100% - 20px);
            }

            .top-left {
                gap: 10px;
            }

            .top-item {
                font-size: 9px;
            }

            .top-left .top-item:nth-child(3) {
                display: none;
            }

            .navbar-wrap,
            .main-container {
                width: calc(100% - 20px);
            }

            .navbar {
                border-radius: 20px;
                padding: 10px;
            }

            .brand {
                min-width: 0;
            }

            .brand-logo {
                width: 50px;
                height: 45px;
            }

            .brand-name {
                font-size: 22px;
            }

            .brand-subtitle {
                font-size: 7px;
            }

            .search-box {
                display: none;
            }

            .menu-button {
                width: 43px;
                height: 43px;
            }

            .nav-menu a {
                font-size: 9px;
                padding: 9px 10px;
            }

            .hero-card {
                height: 490px;
            }

            .hero-content {
                left: 24px;
                bottom: 28px;

                width: calc(100% - 48px);
            }

            .hero-title {
                font-size: 37px;
            }

            .hero-description {
                font-size: 11px;
            }

            .hero-meta {
                gap: 9px;
            }

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stories-grid {
                grid-template-columns: 1fr;
            }

            .featured-story {
                grid-column: auto;
            }

            .all-stories {
                grid-template-columns: 1fr;
            }

            .explore-content {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;

                align-items: flex-start;

                gap: 14px;
            }
        }

        .topbar {
            height: auto;
            min-height: 38px;
            background: #063f60;
        }

        .topbar-inner {
            width: min(1300px, calc(100% - 40px));
            min-height: 38px;
            height: auto;
            gap: 12px;
            font-size: 10px;
        }

        .topbar-left,
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar-right a {
            color: #fff;
            text-decoration: none;
            transition: color .2s;
        }

        .topbar-right a:hover {
            color: #72e3fa;
        }

        .story-site-header {
            position: sticky;
            top: 10px;
            z-index: 20;
            width: min(1300px, calc(100% - 40px));
            margin: 12px auto 28px;
        }

        .story-header-card {
            display: grid;
            grid-template-columns: auto minmax(0, 1fr) minmax(190px, 250px) auto;
            align-items: center;
            gap: 16px;
            min-height: 76px;
            padding: 10px 16px;
            border: 1px solid rgba(8, 173, 213, .16);
            border-radius: 22px;
            background: rgba(255, 255, 255, .94);
            box-shadow: 0 15px 40px rgba(7, 63, 94, .1);
            backdrop-filter: blur(16px);
        }

        .story-brand {
            display: inline-flex;
            align-items: center;
            flex-shrink: 0;
            text-decoration: none;
            white-space: nowrap;
        }

        .story-brand img {
            display: block;
            width: 180px;
            height: auto;
        }

        .story-logo-fallback {
            display: none;
            align-items: center;
            color: #073f5e;
            font: 800 25px "Playfair Display", serif;
        }

        .story-logo-fallback span {
            color: #08add5;
        }

        .story-main-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2px;
            min-width: 0;
        }

        .story-main-nav > a,
        .story-nav-dropdown summary {
            padding: 10px 11px;
            border-radius: 22px;
            color: #063f60;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .story-main-nav > a:hover,
        .story-nav-dropdown summary:hover,
        .story-nav-dropdown.current summary,
        .story-nav-dropdown[open] summary {
            background: #e7f8fc;
            color: #0789a9;
        }

        .story-nav-dropdown {
            position: relative;
        }

        .story-nav-dropdown summary {
            list-style: none;
        }

        .story-nav-dropdown summary::-webkit-details-marker {
            display: none;
        }

        .story-nav-dropdown summary i {
            margin-left: 4px;
            color: #08add5;
            font-size: 10px;
        }

        .story-nav-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            z-index: 25;
            min-width: 190px;
            padding: 8px;
            border: 1px solid #dceef4;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 14px 32px rgba(7, 63, 94, .14);
        }

        .story-nav-dropdown-menu a {
            display: block;
            padding: 9px 11px;
            border-radius: 9px;
            color: #063f60;
            font-size: 12px;
            text-decoration: none;
        }

        .story-nav-dropdown-menu a:hover,
        .story-nav-dropdown-menu a.active {
            background: #e7f8fc;
            color: #0789a9;
        }

        .story-search {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0;
            height: 40px;
            padding: 0 5px 0 12px;
            border: 1px solid #d8edf4;
            border-radius: 24px;
            background: #f8fcfd;
            color: #08add5;
        }

        .story-search input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: #063f60;
            font: 11px "DM Sans", sans-serif;
        }

        .story-search button {
            min-height: 30px;
            padding: 0 11px;
            border: 0;
            border-radius: 18px;
            background: #08add5;
            color: #fff;
            font: 700 10px "DM Sans", sans-serif;
            cursor: pointer;
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

        .visually-hidden {
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

        .newsletter-feedback {
            max-width: 290px;
            margin-top: 9px;
            color: #a6e7f5;
            font-size: 10px;
            line-height: 1.5;
        }

        @media(max-width:1100px) {
            .topbar-right {
                display: none;
            }

            .story-header-card {
                grid-template-columns: 1fr auto;
                gap: 8px 14px;
            }

            .story-brand img {
                width: 150px;
            }

            .story-main-nav {
                grid-column: 1 / -1;
                grid-row: 2;
                justify-content: flex-start;
                flex-wrap: wrap;
            }

            .story-search {
                grid-column: 1;
                grid-row: 3;
            }

            .story-account-actions {
                grid-column: 2;
                grid-row: 3;
                justify-content: flex-end;
            }
        }

        @media(max-width:650px) {
            .topbar-inner {
                width: calc(100% - 20px);
                justify-content: center;
                padding: 7px 0;
            }

            .topbar-left {
                gap: 8px;
                font-size: 8px;
            }

            .topbar-left .topbar-item:last-child,
            .topbar-right {
                display: none;
            }

            .story-site-header {
                top: 6px;
                width: calc(100% - 20px);
                margin-top: 8px;
            }

            .story-header-card {
                grid-template-columns: minmax(0, 1fr) auto;
                gap: 8px;
                padding: 9px;
                border-radius: 17px;
            }

            .story-brand img {
                width: 125px;
            }

            .story-main-nav {
                grid-column: 1 / -1;
                grid-row: 2;
                gap: 0;
            }

            .story-main-nav > a,
            .story-nav-dropdown summary {
                padding: 8px 9px;
                font-size: 10px;
            }

            .story-nav-dropdown-menu {
                right: 0;
                left: auto;
            }

            .story-search {
                grid-column: 1 / -1;
                grid-row: 3;
                height: 38px;
            }

            .story-account-actions {
                grid-column: 2;
                grid-row: 1;
            }

            .story-account-actions a,
            .story-account-actions button {
                min-height: 34px;
                padding: 0 8px;
                font-size: 10px;
            }
        }

    </style>
</head>


<body>


<div class="page">

    {{-- BACKGROUND --}}
    <div class="page-bg"></div>

    <div class="decor-circle circle-1"></div>
    <div class="decor-circle circle-2"></div>
    <div class="decor-circle circle-3"></div>


    {{-- =========================================================
         TOP BAR
    ========================================================== --}}

    <div class="topbar">
        <div class="topbar-inner">
            <div class="topbar-left">
                <div class="topbar-item"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Banjarnegara</div>
                <div class="topbar-item">
                    <span id="topWeatherIcon" class="topbar-weather-icon" aria-hidden="true">🌤️</span>
                    <span id="topTemperature">--°C</span>
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
    </div>



    {{-- =========================================================
         NAVBAR
    ========================================================== --}}

    <header class="story-site-header">
        <div class="story-header-card">
            <a class="story-brand" href="{{ route('home') }}" aria-label="Derap Serayu, beranda">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Derap Serayu"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                >
                <span class="story-logo-fallback">Derap<span>Serayu</span></span>
            </a>

            <nav class="story-main-nav" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('articles.index') }}">Berita</a>
                <a href="{{ route('about') }}">Tentang Kami</a>
                <a href="{{ route('galeri') }}">Galeri</a>
                <details class="story-nav-dropdown current">
                    <summary><i class="fa-solid fa-water" aria-hidden="true"></i> Jelajahi <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></summary>
                    <div class="story-nav-dropdown-menu">
                        <a class="active" href="{{ route('cerita') }}" aria-current="page">Cerita &amp; Budaya</a>
                        <a href="{{ route('opini') }}">Opini</a>
                        <a href="{{ route('sosok') }}">Sosok</a>
                        <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                        <a href="{{ route('potensi') }}">Potensi</a>
                        <a href="{{ route('teknologi') }}">Teknologi</a>
                        <a href="{{ route('humor') }}">Humor</a>
                    </div>
                </details>
            </nav>

            <form class="story-search" action="{{ route('articles.index') }}" method="GET" role="search">
                <label class="visually-hidden" for="story-search">Cari berita dan cerita</label>
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                <input id="story-search" type="search" name="q" value="{{ request('q') }}" placeholder="Cari berita atau cerita..." maxlength="100">
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
         MAIN
    ========================================================== --}}

    <main class="main-container">


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="hero-section">


            {{-- HERO UTAMA --}}

            <div class="hero-card">

                <div class="hero-content">

                    <h1 class="hero-title">

                        Menjaga Warisan,
                        <br>

                        <span>Merawat Identitas</span>

                        <br>

                        Banjarnegara

                    </h1>

                    <p class="hero-description">

                        Dari tradisi yang masih hidup hingga
                        kisah masyarakat yang menginspirasi.
                        Temukan cerita, budaya dan kearifan lokal
                        yang menjadi identitas Banjarnegara.

                    </p>

                    @if ($featuredStory)
                        <a class="hero-featured-link" href="{{ route('articles.show', $featuredStory->slug) }}">
                            <span>Cerita paling banyak dibaca</span>
                            {{ $featuredStory->title }}
                        </a>
                    @endif

                    <a href="#cerita-terbaru" class="hero-button">

                        Jelajahi Cerita

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>


                    <div class="hero-meta">

                        <div class="hero-meta-item">
                            <i class="fa-solid fa-masks-theater"></i>
                            Tradisi
                        </div>

                        <div class="hero-meta-item">
                            <i class="fa-solid fa-palette"></i>
                            Seni & Budaya
                        </div>

                        <div class="hero-meta-item">
                            <i class="fa-solid fa-leaf"></i>
                            Kearifan Lokal
                        </div>

                    </div>

                </div>


                <div class="hero-quote">

                    “Budaya adalah
                    <br>

                    jembatan antara
                    <span>masa lalu</span>
                    <br>

                    dan masa depan.”

                </div>

            </div>



            {{-- ARTIKEL POPULER --}}

            <aside class="popular-card">

                <div class="popular-heading">

                    <div class="popular-title">

                        <i class="fa-solid fa-fire"></i>

                        Inspirasi Budaya

                    </div>

                    <a href="{{ route('articles.index', ['q' => 'budaya']) }}" class="popular-see">
                        Lihat Semua →
                    </a>

                </div>


                <div class="popular-list">
                    @forelse ($popularStories as $story)
                        <a class="popular-item" href="{{ route('articles.show', $story->slug) }}">
                            <span class="popular-number">{{ $loop->iteration }}</span>
                            <img
                                src="{{ $story->cover_image_path ? asset('storage/'.$story->cover_image_path) : asset('images/bg-pemotongan-cerita.jpg') }}"
                                alt="{{ $story->caption ?: $story->title }}"
                            >
                            <span class="popular-info">
                                <span class="popular-tag">{{ $story->category }}</span>
                                <span class="popular-item-title">{{ $story->title }}</span>
                                <span class="popular-item-views">{{ number_format($story->views) }} dibaca</span>
                            </span>
                        </a>
                    @empty
                        <p class="story-empty story-empty-compact">Belum ada cerita populer yang diterbitkan.</p>
                    @endforelse
                </div>

            </aside>

        </section>



        {{-- =====================================================
             KATEGORI
        ====================================================== --}}

        <section class="category-section">

            <div class="category-grid">


                <a href="{{ route('articles.index', ['q' => 'Tradisi']) }}" class="category-card">

                    <div class="category-icon">
                        <i class="fa-solid fa-drum"></i>
                    </div>

                    <h3>
                        Tradisi
                    </h3>

                    <p>
                        Adat dan upacara
                    </p>

                    <div class="category-arrow">
                        →
                    </div>

                </a>


                <a href="{{ route('articles.index', ['q' => 'Seni']) }}" class="category-card">

                    <div class="category-icon">
                        <i class="fa-solid fa-masks-theater"></i>
                    </div>

                    <h3>
                        Seni & Budaya
                    </h3>

                    <p>
                        Seni tradisional
                    </p>

                    <div class="category-arrow">
                        →
                    </div>

                </a>


                <a href="{{ route('articles.index', ['q' => 'Cerita rakyat']) }}" class="category-card">

                    <div class="category-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                    <h3>
                        Cerita Rakyat
                    </h3>

                    <p>
                        Kisah masyarakat
                    </p>

                    <div class="category-arrow">
                        →
                    </div>

                </a>


                <a href="{{ route('articles.index', ['q' => 'Kearifan lokal']) }}" class="category-card">

                    <div class="category-icon">
                        <i class="fa-solid fa-leaf"></i>
                    </div>

                    <h3>
                        Kearifan Lokal
                    </h3>

                    <p>
                        Nilai kehidupan
                    </p>

                    <div class="category-arrow">
                        →
                    </div>

                </a>


                <a href="{{ route('articles.index', ['q' => 'Sejarah']) }}" class="category-card">

                    <div class="category-icon">
                        <i class="fa-solid fa-landmark"></i>
                    </div>

                    <h3>
                        Sejarah
                    </h3>

                    <p>
                        Jejak masa lalu
                    </p>

                    <div class="category-arrow">
                        →
                    </div>

                </a>


                <a href="{{ route('articles.index', ['q' => 'Kuliner']) }}" class="category-card">

                    <div class="category-icon">
                        <i class="fa-solid fa-utensils"></i>
                    </div>

                    <h3>
                        Kuliner
                    </h3>

                    <p>
                        Rasa khas daerah
                    </p>

                    <div class="category-arrow">
                        →
                    </div>

                </a>


            </div>

        </section>



        {{-- =====================================================
             CERITA TERBARU
        ====================================================== --}}

        <section id="cerita-terbaru">

            <div class="section-header">

                <div class="section-heading">

                    <i class="fa-solid fa-book-open"></i>

                    <h2>
                        Cerita &amp; Budaya Terbaru
                    </h2>

                    <div class="section-line"></div>

                </div>

                <span class="section-link">{{ $stories->total() }} artikel terbit</span>
            </div>


            <div class="all-stories">
                @forelse ($stories as $story)
                    <article class="article-card">
                        <a class="article-image" href="{{ route('articles.show', $story->slug) }}" aria-label="Baca {{ $story->title }}">
                            <img
                                src="{{ $story->cover_image_path ? asset('storage/'.$story->cover_image_path) : asset('images/bg-pemotongan-cerita.jpg') }}"
                                alt="{{ $story->caption ?: $story->title }}"
                            >
                            <span class="article-tag">{{ $story->category }}</span>
                        </a>
                        <div class="article-body">
                            <h3><a href="{{ route('articles.show', $story->slug) }}">{{ $story->title }}</a></h3>
                            <p>{{ $story->summary }}</p>
                            <div class="article-footer">
                                <span>{{ $story->published_at?->translatedFormat('j F Y') }}</span>
                                <a href="{{ route('articles.show', $story->slug) }}">Baca cerita <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="story-empty">
                        Belum ada artikel Cerita &amp; Budaya yang diterbitkan. Artikel akan tampil di sini setelah redaksi memublikasikannya.
                    </div>
                @endforelse
            </div>

            @if ($stories->hasPages())
                <div class="story-pagination">{{ $stories->links() }}</div>
            @endif
        </section>



        {{-- =====================================================
             EXPLORE + QUOTE
        ====================================================== --}}

        <section class="lower-section">


            <div class="explore-card">

                <div class="explore-content">

                    <div class="explore-script">
                        Kenali Lebih Dekat
                    </div>

                    <h2>
                        Kebudayaan
                        Banjarnegara
                    </h2>

                    <p>
                        Dari tradisi, seni, sejarah hingga kuliner.
                        Setiap sudut Banjarnegara menyimpan cerita
                        yang layak untuk dikenal dan diwariskan.
                    </p>

                    <a href="{{ route('articles.index', ['q' => 'Banjarnegara']) }}" class="explore-btn">

                        Jelajahi Sekarang

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>



            <div class="quote-card">

                <div class="quote-mark">
                    “
                </div>

                <div class="quote-text">

                    Budaya bukan hanya
                    tentang masa lalu,
                    tetapi juga tentang
                    siapa kita hari ini.

                </div>

                <div class="quote-author">

                    — Cerita & Budaya Banjarnegara

                </div>

            </div>


        </section>


    </main>



    {{-- =========================================================
     FOOTER - SAMA DENGAN BERANDA
========================================================= --}}

<footer class="home-footer">

    <div class="home-footer-inner">

        {{-- =================================================
             FOOTER MAIN
        ================================================== --}}

        <div class="home-footer-grid">


            {{-- BRAND --}}
            <div class="footer-brand-column">

                <a href="{{ url('/') }}" class="footer-logo" aria-label="Derap Serayu, beranda">
                    <img src="{{ asset('images/logo.png') }}" alt="Derap Serayu">
                </a>


                <p class="footer-description">

                    Media informasi dan cerita Banjarnegara
                    yang menghadirkan berita, budaya, wisata,
                    potensi, serta kisah dari masyarakat.

                </p>


                {{-- SOCIAL MEDIA --}}

                <div class="footer-social">

                    <a href="https://www.instagram.com/kabupatenbanjarnegara/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="https://www.youtube.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="https://www.tiktok.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>

                    <a href="https://x.com/pemkab_bna" target="_blank" rel="noopener noreferrer" aria-label="X">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

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


                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                    @csrf

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        maxlength="255"
                        placeholder="Masukkan email kamu"
                        aria-label="Alamat email untuk berlangganan"
                    >

                    <button type="submit" aria-label="Berlangganan">

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



        {{-- =================================================
             FOOTER QUOTE
        ================================================== --}}

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



        {{-- =================================================
             FOOTER BOTTOM
        ================================================== --}}

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


</div>



{{-- =========================================================
     JAVASCRIPT
========================================================== --}}

<script>
    const headerCard = document.querySelector(".story-header-card");

    window.addEventListener("scroll", () => {
        if (headerCard) {
            headerCard.style.boxShadow = window.scrollY > 30
                ? "0 18px 45px rgba(3,65,93,.18)"
                : "0 15px 40px rgba(7,63,94,.1)";
        }
    }, { passive: true });

    async function updateTopbarWeather() {
        const weatherIcon = document.getElementById("topWeatherIcon");
        const temperature = document.getElementById("topTemperature");
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
            console.error("Unable to load Cerita & Budaya topbar weather.", error);
            weatherIcon.textContent = "❔";
            temperature.textContent = "Cuaca tidak tersedia";
        }
    }

    updateTopbarWeather();
</script>


</body>
</html>