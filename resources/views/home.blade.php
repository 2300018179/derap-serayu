<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Derap Serayu | Media Informasi Banjarnegara
    </title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


<style>

/* =========================================================
   RESET
========================================================= */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: "DM Sans", sans-serif;
    color: #073f5e;

    background:
        linear-gradient(
            180deg,
            rgba(220,246,251,.72) 0%,
            rgba(239,249,252,.92) 42%,
            #f5fbfd 100%
        ),
        url("{{ asset('images/bg-tambi.jpg') }}")
        center top / cover fixed no-repeat;

    overflow-x: hidden;
}


/* =========================================================
   GLOBAL BACKGROUND
========================================================= */

.page-background {
    position: fixed;
    inset: 0;

    z-index: -10;

    background:
        linear-gradient(180deg, rgba(220, 246, 251, .86), rgba(239, 249, 252, .94) 36%, #f5fbfd 100%),
        url("{{ asset('images/keindahan.jpg') }}")
        center top / cover no-repeat;

    pointer-events: none;
}

.page-background::after {
    content: "";

    position: absolute;
    inset: 0;

    background:
        radial-gradient(
            circle at 10% 15%,
            rgba(8,173,213,.13),
            transparent 24%
        ),
        radial-gradient(
            circle at 90% 20%,
            rgba(114,227,250,.12),
            transparent 25%
        );
}


/* =========================================================
   CONTAINER
========================================================= */

.container {
    width: min(1300px, calc(100% - 40px));

    margin: auto;
}


/* =========================================================
   TOP BAR
========================================================= */

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


/* =========================================================
   HEADER
========================================================= */

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


/* =========================================================
   HERO
========================================================= */

.hero {
    padding-top: 15px;
}

.hero-grid {
    display: grid;

    grid-template-columns:
        minmax(0, 2.25fr)
        minmax(260px, .8fr)
        minmax(200px, .7fr);

    gap: 10px;

    min-height: 365px;
}


/* =========================================================
   HERO MAIN
========================================================= */

.hero-main {
    position: relative;

    overflow: hidden;

    min-height: 365px;

    padding: 40px;

    border-radius: 27px;

    background:
        linear-gradient(
            90deg,
            rgba(3,43,64,.94),
            rgba(3,57,80,.62),
            rgba(3,57,80,.12)
        ),
        url("{{ asset('images/bg-sikunir-home.jpg') }}")
        center / cover no-repeat;

    color: white;

    display: flex;

    align-items: center;
}

.hero-main::after {
    content: "";

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            0deg,
            rgba(3,43,64,.62),
            transparent 60%
        );
}

.hero-content {
    position: relative;

    z-index: 2;

    max-width: 700px;
}

.hero-script {
    color: #72e3fa;

    font-family:
        "Playfair Display",
        serif;

    font-size: 19px;

    font-style: italic;

    margin-bottom: 9px;
}

.hero-title {
    max-width: 720px;

    font-family:
        "Playfair Display",
        serif;

    font-size: clamp(38px, 3.4vw, 54px);

    line-height: .99;

    color: white;

    margin-bottom: 18px;
}

.hero-title span {
    color: #08add5;
}

.hero-description {
    max-width: 620px;

    color:
        rgba(255,255,255,.83);

    font-size: 12px;

    line-height: 1.7;

    margin-bottom: 20px;
}


/* Hero Button */

.hero-button {
    display: inline-flex;

    align-items: center;

    gap: 15px;

    padding:
        13px 20px;

    border-radius: 30px;

    background: #08add5;

    color: white;

    text-decoration: none;

    font-size: 11px;

    font-weight: 800;

    box-shadow:
        0 10px 25px
        rgba(8,173,213,.30);

    transition: .25s ease;
}

.hero-button:hover {
    transform: translateY(-3px);

    background: #72e3fa;

    color: #073f5e;
}


/* Hero Meta */

.hero-meta {
    position: absolute;

    left: 40px;
    bottom: 22px;

    z-index: 3;

    display: flex;

    align-items: center;

    gap: 18px;

    font-size: 9px;

    color:
        rgba(255,255,255,.75);
}

.hero-meta span {
    display: flex;

    align-items: center;

    gap: 5px;
}

.hero-category {
    padding:
        5px 10px;

    border:
        1px solid
        rgba(255,255,255,.35);

    border-radius: 20px;
}


/* Hero Decoration */

.hero-decoration {
    position: absolute;

    right: 25px;

    bottom: 16px;

    z-index: 3;

    color: white;

    font-family:
        "Playfair Display",
        serif;

    font-size: 18px;

    font-style: italic;

    opacity: .9;
}

.hero-decoration span {
    display: block;

    color: #72e3fa;

    font-size: 11px;

    text-align: right;
}


/* =========================================================
   POPULAR
========================================================= */

.popular-card {
    overflow: hidden;

    border-radius: 27px;

    background:
        rgba(255,255,255,.90);

    border:
        1px solid
        rgba(255,255,255,.95);

    box-shadow:
        0 15px 35px
        rgba(7,63,94,.09);

    padding:
        20px 15px;
}

.section-mini-title {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 13px;
}

.section-mini-title h2 {
    font-family:
        "Playfair Display",
        serif;

    font-size: 19px;

    color: #073f5e;
}

.section-mini-title h2 i {
    color: #ff6b35;

    margin-right: 5px;
}

.section-mini-title a {
    color: #08add5;

    text-decoration: none;

    font-size: 8px;

    font-weight: 800;
}


/* Popular Item */

.popular-item {
    display: grid;

    grid-template-columns:
        25px 68px 1fr;

    align-items: center;

    gap: 8px;

    padding:
        9px 0;

    border-bottom:
        1px solid
        #e8f0f3;
}

.trending-item,
.trending-item:hover {
    color: inherit;

    text-decoration: none;
}

.popular-item:last-child {
    border-bottom: 0;
}

.popular-number {
    width: 23px;
    height: 23px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #08add5;

    color: white;

    font-size: 9px;

    font-weight: 800;
}

.popular-image {
    height: 52px;

    overflow: hidden;

    border-radius: 9px;

    background:
        url("{{ asset('images/bg-kebunteh.jpg') }}")
        center / cover;
}

.popular-content {
    min-width: 0;
}

.popular-tag {
    display: inline-block;

    padding:
        3px 6px;

    border-radius: 8px;

    background: #08add5;

    color: white;

    font-size: 6px;

    font-weight: 800;
}

.popular-content h3 {
    margin-top: 4px;

    color: #073f5e;

    font-size: 9px;

    line-height: 1.35;
}

.popular-content small {
    display: block;

    margin-top: 3px;

    color: #9aaeb8;

    font-size: 6px;
}


/* =========================================================
   EXPLORE CARD
========================================================= */

.explore-card {
    position: relative;

    overflow: hidden;

    min-height: 365px;

    border-radius: 27px;

    background:
        linear-gradient(
            180deg,
            rgba(3,50,72,.05),
            rgba(3,50,72,.94)
        ),
        url("{{ asset('images/bg-dieng-home.jpg') }}") /*Jelajahi Banjarnegara*/
        center / cover no-repeat;

    color: white;
}

.explore-content {
    position: absolute;

    inset:
        28px 20px auto;

    z-index: 2;
}

.explore-script {
    font-family:
        "Playfair Display",
        serif;

    font-size: 28px;

    font-style: italic;

    line-height: 1.05;
}

.explore-description {
    margin-top: 14px;

    max-width: 180px;

    color:
        rgba(255,255,255,.78);

    font-size: 10px;

    line-height: 1.6;
}


/* Play */

.play-button {
    width: 40px;
    height: 40px;

    margin-top: 20px;

    border-radius: 50%;

    border:
        1px solid
        rgba(255,255,255,.55);

    background:
        rgba(255,255,255,.12);

    color: white;

    display: flex;

    align-items: center;
    justify-content: center;

    cursor: pointer;
}

.newsletter-feedback {
    max-width: 270px;

    margin-top: 9px;

    color: #72e3fa;

    font-size: 9px;

    line-height: 1.5;
}

.newsletter-feedback.error {
    color: #ffb4a9;
}

.search-error {
    margin-top: 5px;

    color: #b42318;

    font-size: 10px;
}


/* Explore Stats */

.explore-stats {
    position: absolute;

    left: 0;
    right: 0;
    bottom: 0;

    z-index: 3;

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    padding:
        14px 10px;

    background:
        rgba(3,50,72,.55);

    backdrop-filter: blur(12px);

    border-top:
        1px solid
        rgba(255,255,255,.15);
}

.explore-stat {
    text-align: center;

    border-right:
        1px solid
        rgba(255,255,255,.12);
}

.explore-stat:last-child {
    border-right: 0;
}

.explore-stat i {
    display: block;

    color: #72e3fa;

    font-size: 11px;

    margin-bottom: 5px;
}

.explore-stat strong {
    display: block;

    color: white;

    font-size: 16px;
}

.explore-stat span {
    color:
        rgba(255,255,255,.62);

    font-size: 6px;
}


/* =========================================================
   CATEGORY
========================================================= */

.categories {
    padding-top: 10px;
}

.category-grid {
    display: grid;

    grid-template-columns:
        repeat(6, 1fr);

    gap: 9px;
}

.category-card {
    position: relative;

    overflow: hidden;

    min-height: 100px;

    padding: 14px;

    border-radius: 18px;

    background:
        rgba(255,255,255,.84);

    border:
        1px solid
        rgba(255,255,255,.95);

    box-shadow:
        0 10px 25px
        rgba(7,63,94,.06);

    transition: .25s ease;
}

.category-card:hover {
    transform: translateY(-4px);

    box-shadow:
        0 16px 30px
        rgba(7,63,94,.11);
}

.category-icon {
    width: 34px;
    height: 34px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: white;

    margin-bottom: 9px;
}

.category-card:nth-child(1) .category-icon {
    background: #1688d4;
}

.category-card:nth-child(2) .category-icon {
    background: #11ae7a;
}

.category-card:nth-child(3) .category-icon {
    background: #f6a623;
}

.category-card:nth-child(4) .category-icon {
    background: #7452d8;
}

.category-card:nth-child(5) .category-icon {
    background: #ee4f6d;
}

.category-card:nth-child(6) .category-icon {
    background: #08add5;
}

.category-card h3 {
    font-family:
        "Playfair Display",
        serif;

    font-size: 12px;

    color: #073f5e;
}

.category-card p {
    margin-top: 3px;

    color: #8ca1ac;

    font-size: 7px;

    line-height: 1.4;
}

.category-arrow {
    position: absolute;

    right: 11px;
    bottom: 11px;

    width: 25px;
    height: 25px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    color: #08add5;

    background: #edf9fc;

    font-size: 9px;
}


/* =========================================================
   CONTENT SECTION
========================================================= */

.content-section {
    padding-top: 20px;
}

.content-grid {
    display: grid;

    grid-template-columns:
        minmax(0, 2.4fr)
        minmax(240px, .8fr);

    gap: 12px;
}


/* =========================================================
   NEWS
========================================================= */

.news-card-wrapper {
    padding:
        20px 15px;

    border-radius: 23px;

    background:
        rgba(255,255,255,.88);

    border:
        1px solid
        rgba(255,255,255,.95);

    box-shadow:
        0 12px 30px
        rgba(7,63,94,.07);
}

.section-title {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 15px;
}

.section-title-left {
    display: flex;

    align-items: center;

    gap: 9px;
}

.section-title-icon {
    color: #08add5;

    font-size: 17px;
}

.section-title h2 {
    font-family:
        "Playfair Display",
        serif;

    font-size: 22px;

    color: #073f5e;
}

.section-title-line {
    width: 32px;

    height: 2px;

    background: #08add5;
}

.section-title > a {
    color: #08add5;

    font-size: 9px;

    font-weight: 800;

    text-decoration: none;
}


/* News Grid */

.news-grid {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 10px;
}

.empty-news {
    grid-column: 1 / -1;
    margin: 0;
    padding: 26px 16px;
    border: 1px solid #e9f2f5;
    border-radius: 16px;
    background: #f7fbfc;
    color: #7091ac;
    text-align: center;
}

.empty-news a {
    display: block;

    margin-top: 8px;

    color: #078fb0;

    font-weight: 700;
}

.news-card {
    overflow: hidden;

    border-radius: 16px;

    background: #f7fbfc;

    border:
        1px solid
        #e9f2f5;

    transition: .25s ease;
}

.news-card:hover {
    transform: translateY(-4px);

    box-shadow:
        0 12px 25px
        rgba(7,63,94,.10);
}

.news-image {
    height: 125px;

    position: relative;

    background:
        url("{{ asset('images/bg-berita.jpg') }}")
        center / cover no-repeat;
}

.news-image::after {
    content: "";

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            180deg,
            transparent 50%,
            rgba(3,48,68,.4)
        );
}

.news-category {
    position: absolute;

    z-index: 2;

    left: 10px;
    bottom: 10px;

    padding:
        5px 8px;

    border-radius: 8px;

    background: #08add5;

    color: white;

    font-size: 7px;

    font-weight: 800;
}

.news-content {
    padding: 12px;
}

.news-content h3 {
    font-family:
        "Playfair Display",
        serif;

    font-size: 14px;

    line-height: 1.35;

    color: #073f5e;
}

.news-content p {
    margin-top: 6px;

    color: #8196a2;

    font-size: 8px;

    line-height: 1.5;
}

.news-meta {
    display: flex;

    align-items: center;

    gap: 10px;

    margin-top: 9px;

    color: #a0b1ba;

    font-size: 7px;
}


/* =========================================================
   TRENDING
========================================================= */

.trending-card {
    padding:
        20px 17px;

    border-radius: 23px;

    background:
        rgba(255,255,255,.88);

    border:
        1px solid
        rgba(255,255,255,.95);

    box-shadow:
        0 12px 30px
        rgba(7,63,94,.07);
}

.trending-title {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 15px;
}

.trending-title i {
    color: #08add5;
}

.trending-title h2 {
    font-family:
        "Playfair Display",
        serif;

    font-size: 20px;
}

.trending-item {
    display: flex;

    justify-content: space-between;

    align-items: center;

    padding:
        11px 0;

    border-bottom:
        1px solid
        #e8f0f3;
}

.trending-item:last-child {
    border-bottom: 0;
}

.trending-hashtag {
    color: #08add5;

    font-size: 11px;

    font-weight: 800;
}

.trending-views {
    color: #9babb3;

    font-size: 7px;
}


/* =========================================================
   WEATHER
========================================================= */

.weather-section {
    padding-top: 25px;
}

.weather-heading {
    display: flex;

    align-items: flex-end;

    justify-content: space-between;

    gap: 20px;

    margin-bottom: 14px;
}

.weather-eyebrow {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    color: #08add5;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1.7px;
}

.weather-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #08add5;

    box-shadow:
        0 0 0 5px
        rgba(8,173,213,.10);
}

.weather-heading h2 {
    margin-top: 5px;

    font-family:
        "Playfair Display",
        serif;

    font-size: 30px;

    color: #073f5e;
}

.weather-heading h2 span {
    color: #08add5;
}

.weather-heading p {
    margin-top: 5px;

    color: #78909d;

    font-size: 10px;
}

.weather-location {
    display: flex;

    align-items: center;

    gap: 9px;

    padding:
        9px 13px;

    border-radius: 15px;

    background:
        rgba(255,255,255,.8);

    box-shadow:
        0 8px 25px
        rgba(7,63,94,.07);
}

.weather-location-icon {
    width: 34px;
    height: 34px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #08add5;

    color: white;
}

.weather-location strong {
    display: block;

    font-size: 9px;
}

.weather-location small {
    display: block;

    margin-top: 2px;

    color: #8da2ad;

    font-size: 7px;
}


/* Weather Main */

.weather-main {
    position: relative;

    overflow: hidden;

    min-height: 250px;

    display: grid;

    grid-template-columns:
        1.15fr
        .85fr;

    gap: 25px;

    padding: 30px;

    border-radius: 25px;

    color: white;

    background:
        linear-gradient(
            105deg,
            rgba(3,49,70,.97),
            rgba(5,82,108,.91)
        );

    box-shadow:
        0 18px 40px
        rgba(7,63,94,.15);
}

.weather-main::before {
    content: "";

    position: absolute;

    width: 380px;
    height: 380px;

    right: -180px;
    bottom: -210px;

    border:
        1px solid
        rgba(114,227,250,.18);

    border-radius: 50%;
}

.weather-main::after {
    content: "";

    position: absolute;

    width: 240px;
    height: 240px;

    right: -80px;
    bottom: -130px;

    border:
        1px solid
        rgba(114,227,250,.13);

    border-radius: 50%;
}


/* Weather current */

.weather-current {
    position: relative;

    z-index: 2;
}

.weather-status {
    display: flex;

    align-items: center;

    gap: 14px;
}

.weather-icon {
    width: 62px;
    height: 62px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 18px;

    background:
        rgba(255,255,255,.10);

    border:
        1px solid
        rgba(255,255,255,.12);

    font-size: 33px;
}

.weather-status small {
    display: block;

    color: #72e3fa;

    font-size: 8px;

    font-weight: 800;

    letter-spacing: 1.5px;
}

.weather-status h3 {
    margin-top: 4px;

    font-family:
        "Playfair Display",
        serif;

    font-size: 21px;

    color: white;
}

.temperature {
    display: flex;

    align-items: center;

    gap: 18px;

    margin-top: 20px;
}

.temperature-value {
    font-family:
        "Playfair Display",
        serif;

    font-size: 65px;

    line-height: 1;
}

.feels-like {
    padding-left: 18px;

    border-left:
        1px solid
        rgba(255,255,255,.20);

    color:
        rgba(255,255,255,.72);

    font-size: 9px;

    line-height: 1.7;
}

.feels-like strong {
    color: #72e3fa;
}

.weather-updated {
    display: flex;

    align-items: center;

    gap: 6px;

    margin-top: 18px;

    color:
        rgba(255,255,255,.55);

    font-size: 8px;
}


/* Weather stats */

.weather-stats {
    position: relative;

    z-index: 2;

    display: grid;

    grid-template-columns:
        1fr 1fr;

    gap: 10px;

    align-content: center;
}

.weather-stat {
    display: flex;

    align-items: center;

    gap: 9px;

    padding:
        14px;

    border-radius: 15px;

    background:
        rgba(255,255,255,.08);

    border:
        1px solid
        rgba(255,255,255,.10);

    backdrop-filter: blur(10px);
}

.weather-stat-icon {
    width: 34px;
    height: 34px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background:
        rgba(8,173,213,.20);

    color: #72e3fa;

    font-size: 12px;
}

.weather-stat span {
    display: block;

    color:
        rgba(255,255,255,.52);

    font-size: 7px;
}

.weather-stat strong {
    display: block;

    margin-top: 3px;

    color: white;

    font-size: 12px;
}


/* Forecast */

.forecast-card {
    margin-top: 10px;

    padding: 19px;

    border-radius: 21px;

    background:
        rgba(255,255,255,.86);

    box-shadow:
        0 10px 30px
        rgba(7,63,94,.06);
}

.forecast-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 13px;
}

.forecast-header span {
    color: #08add5;

    font-size: 8px;

    font-weight: 800;

    letter-spacing: 1.4px;
}

.forecast-header h3 {
    margin-top: 4px;

    font-family:
        "Playfair Display",
        serif;

    font-size: 17px;
}

.forecast-toggle {
    flex-shrink: 0;

    padding: 8px 11px;

    border: 1px solid #ccecf4;
    border-radius: 20px;

    background: #fff;

    color: #08add5;

    cursor: pointer;

    font-size: 8px;

    font-weight: 800;
}

.forecast-toggle:hover:not(:disabled) {
    border-color: #08add5;

    background: #e8f8fc;
}

.forecast-toggle:disabled {
    cursor: wait;

    opacity: .65;
}

.forecast-list {
    display: grid;

    grid-template-columns:
        repeat(6, 1fr);

    gap: 8px;
}

.forecast-list:not(.is-expanded) .forecast-item:nth-child(n+7) {
    display: none;
}

.forecast-list.is-expanded {
    grid-template-columns: repeat(6, 1fr);
}

.forecast-item {
    padding:
        13px 8px;

    text-align: center;

    border-radius: 14px;

    background: #f2f9fb;

    transition: .2s;
}

.forecast-item:hover {
    transform: translateY(-3px);
}

.forecast-item.active {
    background: #073f5e;

    color: white;
}

.forecast-time {
    display: block;

    color: #78909d;

    font-size: 7px;

    font-weight: 700;
}

.forecast-item.active .forecast-time {
    color:
        rgba(255,255,255,.60);
}

.forecast-weather-icon {
    display: block;

    margin: 8px 0;

    font-size: 23px;
}

.forecast-temp {
    display: block;

    color: #073f5e;

    font-size: 13px;

    font-weight: 800;
}

.forecast-item.active .forecast-temp {
    color: white;
}

.forecast-rain {
    display: block;

    margin-top: 3px;

    color: #08add5;

    font-size: 7px;
}


/* =========================================================
   EXPLORE BOTTOM
========================================================= */

.explore-section {
    padding:
        35px 0 0;
}

.explore-large {
    position: relative;

    overflow: hidden;

    min-height: 300px;

    border-radius: 28px;

    background:
        linear-gradient(
            90deg,
            rgba(3,47,68,.94),
            rgba(3,47,68,.53),
            rgba(3,47,68,.15)
        ),
        url("{{ asset('images/bg-tambi.jpg') }}") /*Jelajahi Banjarnegara bagian bawah*/
        center / cover no-repeat;

    color: white;

    display: flex;

    align-items: center;
}

.explore-large-content {
    position: relative;

    z-index: 3;

    padding: 40px;

    max-width: 600px;
}

.explore-large-label {
    color: #72e3fa;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1.7px;
}

.explore-large h2 {
    margin-top: 8px;

    font-family:
        "Playfair Display",
        serif;

    font-size: 39px;

    line-height: 1.05;
}

.explore-large h2 span {
    color: #08add5;
}

.explore-large p {
    margin-top: 10px;

    max-width: 510px;

    color:
        rgba(255,255,255,.75);

    font-size: 10px;

    line-height: 1.7;
}

.explore-button {
    display: inline-flex;

    align-items: center;

    gap: 9px;

    margin-top: 17px;

    padding:
        11px 17px;

    border-radius: 25px;

    background: #08add5;

    color: white;

    text-decoration: none;

    font-size: 9px;

    font-weight: 800;
}


/* Explore categories */

.explore-tags {
    position: absolute;

    right: 30px;

    bottom: 25px;

    z-index: 3;

    display: flex;

    gap: 9px;
}

.explore-tag {
    width: 55px;
    height: 55px;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-direction: column;

    border-radius: 50%;

    background:
        rgba(255,255,255,.12);

    border:
        1px solid
        rgba(255,255,255,.20);

    backdrop-filter: blur(8px);
}

.explore-tag i {
    color: #72e3fa;

    font-size: 12px;
}

.explore-tag span {
    margin-top: 3px;

    color: white;

    font-size: 6px;
}


/* =========================================================
   FOOTER
========================================================= */

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


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1200px) {

    .main-nav {
        gap: 0;
    }

    .main-nav a {
        padding:
            10px 8px;

        font-size: 9px;
    }

    .search-box {
        width: 170px;
    }

    .search-area {
        width: 170px;
    }

    .hero-grid {
        grid-template-columns:
            1fr .55fr;
    }

    .explore-card {
        display: none;
    }

    .category-grid {
        grid-template-columns:
            repeat(3, 1fr);
    }

    .footer-grid {
        grid-template-columns:
            1.5fr
            1fr
            1fr
            1fr;
    }

    .footer-newsletter {
        grid-column: 1 / -1;
    }
}


@media (max-width: 1050px) {

    .topbar-right {
        display: none;
    }

    .header-card {
        gap: 10px;
    }

    .logo-area img {
        width: 150px;
    }

    .main-nav {
        display: none;
    }

    .main-nav.is-open {
        position: absolute;

        top: calc(100% + 8px);
        right: 0;
        left: 0;

        z-index: 5;

        display: flex;

        flex-direction: column;

        align-items: stretch;

        padding: 10px;

        border: 1px solid #e3f0f5;
        border-radius: 16px;

        background: white;

        box-shadow: 0 15px 40px rgba(7, 63, 94, .16);
    }

    .main-nav.is-open a {
        padding: 12px 14px;

        font-size: 12px;
    }

    .main-nav.is-open .nav-dropdown {
        width: 100%;
    }

    .main-nav.is-open .nav-dropdown summary {
        padding: 12px 14px;

        border-radius: 10px;

        font-size: 12px;
    }

    .main-nav.is-open .nav-dropdown[open] .nav-dropdown-menu {
        position: static;

        min-width: 0;

        padding: 4px 0 4px 12px;

        border: 0;
        border-radius: 0;

        background: transparent;

        box-shadow: none;
    }

    .main-nav.is-open .nav-dropdown-menu a {
        padding: 10px 14px;
    }

    .menu-button {
        display: block;
    }

    .search-area {
        margin-left: auto;
    }

    .hero-grid {
        grid-template-columns: 1fr;
    }

    .popular-card {
        display: none;
    }

    .hero-main {
        min-height: 420px;
    }

    .content-grid {
        grid-template-columns: 1fr;
    }

    .weather-main {
        grid-template-columns: 1fr;
    }

    .weather-stats {
        grid-template-columns:
            repeat(4, 1fr);
    }

    .footer-grid {
        grid-template-columns:
            1fr 1fr;
    }
}


@media (max-width: 650px) {

    .container,
    .topbar-inner,
    .header-card,
    .footer-container {
        width: calc(100% - 24px);
    }

    .topbar-left {
        gap: 8px;
    }

    .topbar-item {
        font-size: 8px;
    }

    .topbar-item:nth-child(3),
    .topbar-divider {
        display: none;
    }

    .header-card {
        min-height: 64px;

        padding:
            6px 10px;

        border-radius: 18px;
    }

    .logo-area img {
        width: 125px;
    }

    .account-actions {
        gap: 5px;
    }

    .account-actions a,
    .account-menu summary {
        min-height: 38px;

        padding: 0 10px;

        font-size: 10px;
    }

    .account-actions .account-register {
        display: none;
    }

    .account-menu summary span {
        display: none;
    }

    .search-area {
        width: auto;

        min-width: 0;

        flex: 1;
    }

    .search-box {
        width: 100%;

        padding: 0 10px;
    }

    .search-box input {
        display: block;

        min-width: 0;
    }

    .menu-button {
        width: 40px;
        height: 40px;
    }

    .hero-main {
        min-height: 470px;

        padding: 27px;

        border-radius: 22px;
    }

    .hero-title {
        font-size: 36px;
    }

    .hero-meta {
        left: 27px;
        bottom: 20px;

        gap: 8px;

        flex-wrap: wrap;
    }

    .hero-decoration {
        display: none;
    }

    .category-grid {
        grid-template-columns:
            repeat(2, 1fr);
    }

    .news-grid {
        grid-template-columns: 1fr;
    }

    .news-image {
        height: 180px;
    }

    .weather-heading {
        align-items: flex-start;

        flex-direction: column;
    }

    .weather-main {
        padding: 22px;

        border-radius: 21px;
    }

    .weather-stats {
        grid-template-columns:
            1fr 1fr;
    }

    .temperature-value {
        font-size: 52px;
    }

    .forecast-list {
        grid-template-columns:
            repeat(3, 1fr);
    }

    .forecast-list:not(.is-expanded) .forecast-item:nth-child(n+4) {
        display: none;
    }

    .forecast-list.is-expanded {
        grid-template-columns: repeat(3, 1fr);
    }

    .explore-large {
        min-height: 360px;
    }

    .explore-large-content {
        padding: 28px;
    }

    .explore-large h2 {
        font-size: 32px;
    }

    .explore-tags {
        display: none;
    }

    .footer-grid {
        grid-template-columns: 1fr 1fr;

        gap: 30px;
    }

    .footer-brand,
    .footer-newsletter {
        grid-column: 1 / -1;
    }

    .footer-bottom {
        flex-direction: column;

        text-align: center;
    }

    .footer-bottom-links {
        justify-content: center;

        flex-wrap: wrap;
    }

}


@media (max-width: 420px) {

    .hero-title {
        font-size: 31px;
    }

    .category-grid {
        grid-template-columns: 1fr 1fr;
    }

    .category-card {
        min-height: 105px;
    }

    .weather-stats {
        grid-template-columns: 1fr;
    }

    .forecast-list {
        grid-template-columns:
            repeat(2, 1fr);
    }

    .forecast-list.is-expanded {
        grid-template-columns: repeat(2, 1fr);
    }

}


/* =========================================================
   ANIMATION
========================================================= */

@keyframes fadeUp {

    from {
        opacity: 0;

        transform:
            translateY(15px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }
}

.hero-main,
.popular-card,
.explore-card,
.category-card,
.news-card-wrapper,
.trending-card,
.weather-main,
.explore-large {
    animation:
        fadeUp .65s ease both;
}

</style>

</head>


<body>


{{-- =====================================================
     GLOBAL BACKGROUND
===================================================== --}}

<div class="page-background"></div>



{{-- =====================================================
     TOP BAR
===================================================== --}}

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



{{-- =====================================================
     HEADER
===================================================== --}}

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



{{-- =====================================================
     MAIN
===================================================== --}}

<main>


{{-- =====================================================
     HERO
===================================================== --}}

<section class="hero">

    <div class="container">

        <div class="hero-grid">


            {{-- HERO MAIN --}}

            <article class="hero-main">

                <div class="hero-content">

                    <div class="hero-script">
                        Cerita Hari Ini —
                    </div>

                    @if ($featuredArticle)
                        <h1 class="hero-title">
                            {{ $featuredArticle->title }}
                        </h1>

                        <p class="hero-description">
                            {{ $featuredArticle->summary }}
                        </p>

                        <a
                            href="{{ route('articles.show', $featuredArticle->slug) }}"
                            class="hero-button"
                        >
                            Baca Selengkapnya
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    @else
                        <h1 class="hero-title">
                            Pesona Alam Banjarnegara, Dari
                            <span>Dataran Tinggi Dieng</span>
                            hingga Lembah Serayu
                        </h1>

                        <p class="hero-description">
                            Banjarnegara bukan hanya tentang Dieng. Di balik sejuknya pegunungan,
                            tersimpan beragam cerita, budaya, dan potensi luar biasa yang layak untuk kamu jelajahi.
                        </p>

                        <a href="#berita" class="hero-button">
                            Baca Selengkapnya
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    @endif


                </div>


                <div class="hero-meta">

                    @if ($featuredArticle)
                        <span>
                            <i class="fa-regular fa-calendar"></i>
                            {{ $featuredArticle->published_at?->format('d M Y') }}
                        </span>

                        <span>
                            <i class="fa-regular fa-eye"></i>
                            {{ number_format($featuredArticle->views, 0, ',', '.') }}
                        </span>

                        <span class="hero-category">
                            {{ $featuredArticle->category }}
                        </span>
                    @endif

                </div>


                <div class="hero-decoration">

                    Dieng

                    <span>
                        Banjarnegara
                    </span>

                </div>

            </article>



            {{-- POPULAR --}}

            <aside class="popular-card">

                <div class="section-mini-title">

                    <h2>
                        <i class="fa-solid fa-fire"></i>
                        Artikel Populer
                    </h2>

                    <a href="{{ route('articles.index') }}">
                        Lihat Semua →
                    </a>

                </div>


                @forelse ($popularArticles as $index => $article)
                    <a
                        class="popular-item"
                        href="{{ route('articles.show', $article->slug) }}"
                        style="color:inherit;text-decoration:none"
                    >

                        <div class="popular-number">
                            {{ $index + 1 }}
                        </div>

                        <div
                            class="popular-image"
                            @if ($article->cover_image_path)
                                style="background-image:url('{{ asset('storage/'.$article->cover_image_path) }}');background-size:cover;background-position:center"
                            @endif
                        ></div>

                        <div class="popular-content">

                            <span class="popular-tag">
                                {{ strtoupper($article->category) }}
                            </span>

                            <h3>
                                {{ $article->title }}
                            </h3>

                            <small>
                                <i class="fa-regular fa-eye"></i>
                                {{ number_format($article->views, 0, ',', '.') }}
                                @if ($article->published_at)
                                    &nbsp; · &nbsp; {{ $article->published_at->diffForHumans() }}
                                @endif
                            </small>

                        </div>

                    </a>
                @empty
                    <p class="empty-news">Belum ada artikel populer.</p>
                @endforelse

            </aside>



            {{-- EXPLORE --}}

            <aside class="explore-card">

                <div class="explore-content">

                    <div class="explore-script">
                        Jelajahi<br>
                        Banjarnegara
                    </div>

                    <p class="explore-description">

                        Lebih dari sekadar destinasi,
                        ini tentang pengalaman.

                    </p>

                    <a
                        class="play-button"
                        href="#jelajah"
                        aria-label="Lihat destinasi dan cerita Banjarnegara"
                    >
                        <i class="fa-solid fa-compass"></i>
                    </a>

                </div>


                <div class="explore-stats">

                    <div class="explore-stat">
                        <i class="fa-regular fa-newspaper" aria-hidden="true"></i>
                        <strong data-stat="published-articles">{{ number_format($publishedArticleCount, 0, ',', '.') }}</strong>
                        <span>Artikel Terbit</span>
                    </div>

                    <div class="explore-stat">
                        <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
                        <strong data-stat="published-categories">{{ number_format($publishedCategoryCount, 0, ',', '.') }}</strong>
                        <span>Kategori</span>
                    </div>

                    <div class="explore-stat">
                        <i class="fa-solid fa-users" aria-hidden="true"></i>
                        <strong data-stat="readers">{{ number_format($readerCount, 0, ',', '.') }}</strong>
                        <span>Pembaca</span>
                    </div>

                </div>

            </aside>

        </div>

    </div>

</section>



{{-- =====================================================
     CATEGORY
===================================================== --}}

<section class="categories">

    <div class="container">

        <div class="category-grid">


            @forelse ($categories as $category)

                <a
                    href="{{ route('articles.index', ['category' => $category['title']]) }}"
                    class="category-card"
                    style="text-decoration:none;"
                >

                    <div class="category-icon">

                        <i
                            class="fa-solid
                            {{ $category['icon'] }}"
                        ></i>

                    </div>

                    <h3>
                        {{ $category['title'] }}
                    </h3>

                    <p>
                        {{ number_format($category['count'], 0, ',', '.') }} artikel
                    </p>

                    <div class="category-arrow">

                        <i class="fa-solid fa-arrow-right"></i>

                    </div>

                </a>

            @empty
                <div class="empty-news">
                    Kategori akan tampil setelah artikel pertama diterbitkan.
                    <a href="{{ route('articles.index') }}">Lihat semua artikel</a>
                </div>
            @endforelse

        </div>

    </div>

</section>



{{-- =====================================================
     BERITA TERBARU
===================================================== --}}

<section
    class="content-section"
    id="berita"
>

    <div class="container">

        <div class="content-grid">


            {{-- NEWS --}}

            <div class="news-card-wrapper">

                <div class="section-title">

                    <div class="section-title-left">

                        <i
                            class="section-title-icon
                            fa-regular
                            fa-newspaper"
                        ></i>

                        <h2>
                            Berita Terbaru
                        </h2>

                        <div class="section-title-line"></div>

                    </div>

                    <a href="{{ route('articles.index') }}">
                        Lihat Semua →
                    </a>

                </div>


                <div class="news-grid">


                    @php

                        $news = $publishedArticles->map(fn ($article) => [
                                'category' => strtoupper($article->category),
                                'title' => $article->title,
                                'description' => $article->summary,
                                'views' => number_format($article->views, 0, ',', '.'),
                                'image' => $article->cover_image_path
                                    ? asset('storage/'.$article->cover_image_path)
                                    : asset('images/bg-dieng-home.jpg'),
                                'date' => $article->published_at?->format('d M Y'),
                                'url' => route('articles.show', $article->slug),
                            ])->all();

                    @endphp


                    @foreach ($news as $item)

                        <a href="{{ $item['url'] }}" style="color:inherit;text-decoration:none">
                        <article class="news-card">

                            <div class="news-image" style="background-image:linear-gradient(180deg,transparent,rgba(3,48,68,.25)),url('{{ $item['image'] }}');background-size:cover;background-position:center">

                                <span class="news-category">
                                    {{ $item['category'] }}
                                </span>

                            </div>

                            <div class="news-content">

                                <h3>
                                    {{ $item['title'] }}
                                </h3>

                                <p>
                                    {{ $item['description'] }}
                                </p>

                                <div class="news-meta">

                                    <span>
                                        <i class="fa-regular fa-eye"></i>
                                        {{ $item['views'] }}
                                    </span>

                                    <span>{{ $item['date'] }}</span>

                                </div>

                            </div>

                        </article>
                        </a>

                    @endforeach

                    @if (empty($news))
                        <p class="empty-news">Belum ada artikel yang diterbitkan. Silakan kembali lagi nanti.</p>
                    @endif

                </div>

            </div>



            {{-- TRENDING --}}

            <aside class="trending-card">

                <div class="trending-title">

                    <i class="fa-solid fa-chart-line"></i>

                    <h2>Artikel Random</h2>
                </div>

                @forelse ($trendingCategories as $category)
                    <a
                        class="trending-item"
                        href="{{ route('articles.index', ['category' => $category['title']]) }}"
                    >
                        <span class="trending-hashtag">
                            {{ $category['title'] }}
                        </span>
                        <span class="trending-views">
                            {{ number_format($category['count'], 0, ',', '.') }} artikel →
                        </span>
                    </a>
                @empty
                    <p class="empty-news">Kategori populer akan tampil setelah artikel diterbitkan.</p>
                @endforelse

            </aside>

        </div>

    </div>

</section>



{{-- =====================================================
     CUACA DIENG
===================================================== --}}

<section
    class="weather-section"
    id="cuaca-dieng"
>

    <div class="container">


        <div class="weather-heading">

            <div>

                <span class="weather-eyebrow">

                    <span class="weather-dot"></span>

                    INFORMASI DIENG

                </span>

                <h2>
                    Cek Cuaca
                    <span>Dieng</span>
                </h2>

                <p>
                    Cek kondisi cuaca sebelum menjelajah
                    dataran tinggi Dieng.
                </p>

            </div>


            <div class="weather-location">

                <div class="weather-location-icon">

                    <i class="fa-solid fa-location-dot"></i>

                </div>

                <div>

                    <strong>
                        Dieng, Banjarnegara
                    </strong>

                    <small>
                        Jawa Tengah, Indonesia
                    </small>

                </div>

            </div>

        </div>



        {{-- MAIN WEATHER --}}

        <div class="weather-main">


            <div class="weather-current">

                <div class="weather-status">

                    <div
                        class="weather-icon"
                        id="weatherIcon"
                    >
                        ☀️
                    </div>

                    <div>

                        <small>
                            CUACA SAAT INI
                        </small>

                        <h3 id="weatherCondition">
                            Memuat cuaca...
                        </h3>

                    </div>

                </div>


                <div class="temperature">

                    <div
                        class="temperature-value"
                        id="temperature"
                    >
                        --°
                    </div>

                    <div class="feels-like">

                        Terasa seperti

                        <strong id="feelsLike">
                            --°
                        </strong>

                        <br>

                        Dieng, Banjarnegara

                    </div>

                </div>


                <div
                    class="weather-updated"
                    id="weatherUpdated"
                >

                    <i class="fa-regular fa-clock"></i>

                    Memuat data...

                </div>

            </div>



            {{-- WEATHER STATS --}}

            <div class="weather-stats">


                <div class="weather-stat">

                    <div class="weather-stat-icon">

                        <i class="fa-solid fa-droplet"></i>

                    </div>

                    <div>

                        <span>
                            Kelembapan
                        </span>

                        <strong id="humidity">
                            --%
                        </strong>

                    </div>

                </div>


                <div class="weather-stat">

                    <div class="weather-stat-icon">

                        <i class="fa-solid fa-wind"></i>

                    </div>

                    <div>

                        <span>
                            Kecepatan Angin
                        </span>

                        <strong id="windSpeed">
                            -- km/j
                        </strong>

                    </div>

                </div>


                <div class="weather-stat">

                    <div class="weather-stat-icon">

                        <i class="fa-solid fa-eye"></i>

                    </div>

                    <div>

                        <span>
                            Jarak Pandang
                        </span>

                        <strong id="visibility">
                            -- km
                        </strong>

                    </div>

                </div>


                <div class="weather-stat">

                    <div class="weather-stat-icon">

                        <i class="fa-solid fa-cloud-rain"></i>

                    </div>

                    <div>

                        <span>
                            Peluang Hujan
                        </span>

                        <strong id="rainChance">
                            --%
                        </strong>

                    </div>

                </div>


            </div>

        </div>



        {{-- FORECAST --}}

        <div class="forecast-card">

            <div class="forecast-header">

                <div>

                    <span>
                        PRAKIRAAN 24 JAM KE DEPAN
                    </span>

                    <h3>
                        Kondisi cuaca per jam
                    </h3>

                </div>

                <button
                    class="forecast-toggle"
                    id="forecastToggle"
                    type="button"
                    aria-controls="forecastList"
                    aria-expanded="false"
                    disabled
                >
                    Memuat prakiraan...
                </button>

            </div>


            <div
                class="forecast-list"
                id="forecastList"
            >

                <div style="
                    grid-column:1/-1;
                    text-align:center;
                    padding:20px;
                    color:#8aa0aa;
                    font-size:10px;
                ">

                    Memuat prakiraan cuaca...

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =====================================================
     EXPLORE BANJARNEGARA
===================================================== --}}

<section
    class="explore-section"
    id="jelajah"
>

    <div class="container">

        <div class="explore-large">

            <div class="explore-large-content">

                <span class="explore-large-label">
                    JELAJAH BANJARNEGARA
                </span>

                <h2>
                    Dari gunung hingga lembah,
                    <span>
                        semua punya cerita.
                    </span>
                </h2>

                <p>

                    Temukan destinasi, kuliner, budaya,
                    UMKM, dan berbagai cerita menarik
                    dari setiap sudut Banjarnegara.

                </p>

                <a
                    href="{{ route('potensi') }}"
                    class="explore-button"
                >

                    Jelajahi Sekarang

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>


            <div class="explore-tags">

                <div class="explore-tag">

                    <i class="fa-solid fa-mountain"></i>

                    <span>
                        Dieng
                    </span>

                </div>

                <div class="explore-tag">

                    <i class="fa-solid fa-utensils"></i>

                    <span>
                        Kuliner
                    </span>

                </div>

                <div class="explore-tag">

                    <i class="fa-solid fa-landmark"></i>

                    <span>
                        Budaya
                    </span>

                </div>

                <div class="explore-tag">

                    <i class="fa-solid fa-store"></i>

                    <span>
                        UMKM
                    </span>

                </div>

                <div class="explore-tag">

                    <i class="fa-solid fa-users"></i>

                    <span>
                        Anak Muda
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>



</main>



{{-- =====================================================
     FOOTER
===================================================== --}}

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



{{-- =====================================================
     JAVASCRIPT
===================================================== --}}

<script>

/* =========================================================
   WEATHER
========================================================= */

const latitude = -7.2096;
const longitude = 109.9156;


/* Weather information */

function getWeatherInfo(code) {

    const weather = {

        0: {
            text: "Cerah",
            icon: "☀️"
        },

        1: {
            text: "Cerah Berawan",
            icon: "🌤️"
        },

        2: {
            text: "Berawan Sebagian",
            icon: "⛅"
        },

        3: {
            text: "Berawan",
            icon: "☁️"
        },

        45: {
            text: "Berkabut",
            icon: "🌫️"
        },

        48: {
            text: "Kabut Tebal",
            icon: "🌫️"
        },

        51: {
            text: "Gerimis Ringan",
            icon: "🌦️"
        },

        53: {
            text: "Gerimis",
            icon: "🌦️"
        },

        55: {
            text: "Gerimis Lebat",
            icon: "🌧️"
        },

        56: {
            text: "Gerimis Beku Ringan",
            icon: "🌧️"
        },

        57: {
            text: "Gerimis Beku Lebat",
            icon: "🌧️"
        },

        61: {
            text: "Hujan Ringan",
            icon: "🌦️"
        },

        63: {
            text: "Hujan",
            icon: "🌧️"
        },

        65: {
            text: "Hujan Lebat",
            icon: "🌧️"
        },

        66: {
            text: "Hujan Beku Ringan",
            icon: "🌧️"
        },

        67: {
            text: "Hujan Beku Lebat",
            icon: "🌧️"
        },

        71: {
            text: "Salju Ringan",
            icon: "🌨️"
        },

        73: {
            text: "Salju",
            icon: "🌨️"
        },

        75: {
            text: "Salju Lebat",
            icon: "❄️"
        },

        77: {
            text: "Butiran Salju",
            icon: "🌨️"
        },

        80: {
            text: "Hujan Lokal",
            icon: "🌦️"
        },

        81: {
            text: "Hujan Lokal",
            icon: "🌧️"
        },

        82: {
            text: "Hujan Lebat",
            icon: "⛈️"
        },

        85: {
            text: "Hujan Salju Ringan",
            icon: "🌨️"
        },

        86: {
            text: "Hujan Salju Lebat",
            icon: "🌨️"
        },

        95: {
            text: "Badai Petir",
            icon: "⛈️"
        },

        96: {
            text: "Badai Petir",
            icon: "⛈️"
        },

        99: {
            text: "Badai Petir",
            icon: "⛈️"
        }

    };

    return weather[code] || {

        text: "Tidak diketahui",

        icon: "🌤️"

    };

}


/* Format hour */

function formatHour(dateString) {

    const date =
        new Date(dateString);

    return date.toLocaleTimeString(
        "id-ID",
        {
            hour: "2-digit",
            minute: "2-digit"
        }
    );

}


/* Load weather */

async function loadDiengWeather() {

    try {

        const url =
            "https://api.open-meteo.com/v1/forecast" +

            "?latitude=" +
            latitude +

            "&longitude=" +
            longitude +

            "&current=" +
            "temperature_2m," +
            "relative_humidity_2m," +
            "apparent_temperature," +
            "weather_code," +
            "wind_speed_10m," +
            "visibility" +

            "&hourly=" +
            "temperature_2m," +
            "precipitation_probability," +
            "weather_code" +

            "&timezone=Asia%2FJakarta" +

            "&forecast_days=2";


        const response =
            await fetch(url);


        if (!response.ok) {

            throw new Error(
                "Weather request failed"
            );

        }


        const data =
            await response.json();

        if (
            !data.current
            || !Array.isArray(data.hourly?.time)
            || data.hourly.time.length === 0
            || !Array.isArray(data.hourly.precipitation_probability)
            || !Array.isArray(data.hourly.temperature_2m)
            || !Array.isArray(data.hourly.weather_code)
            || data.hourly.precipitation_probability.length < data.hourly.time.length
            || data.hourly.temperature_2m.length < data.hourly.time.length
            || data.hourly.weather_code.length < data.hourly.time.length
            || !Number.isFinite(data.current.temperature_2m)
            || !Number.isFinite(data.current.apparent_temperature)
            || !Number.isFinite(data.current.relative_humidity_2m)
            || !Number.isFinite(data.current.wind_speed_10m)
        ) {
            throw new Error("Weather response is incomplete");
        }

        const current =
            data.current;


        const weatherInfo =
            getWeatherInfo(
                current.weather_code
            );

        const forecastIndex = data.hourly.time.findIndex(function (hour) {
            return hour >= current.time;
        });
        const startIndex = forecastIndex >= 0
            ? forecastIndex
            : data.hourly.time.length - 1;

        document
            .getElementById("topWeatherIcon")
            .textContent =
            weatherInfo.icon;

        document
            .getElementById("topWeatherIcon")
            .setAttribute("title", weatherInfo.text);


        /* Current */

        document
            .getElementById("weatherIcon")
            .textContent =
            weatherInfo.icon;


        document
            .getElementById("weatherCondition")
            .textContent =
            weatherInfo.text;


        document
            .getElementById("temperature")
            .textContent =
            Math.round(
                current.temperature_2m
            ) + "°";


        document
            .getElementById("feelsLike")
            .textContent =
            Math.round(
                current.apparent_temperature
            ) + "°";


        document
            .getElementById("humidity")
            .textContent =
            Math.round(
                current.relative_humidity_2m
            ) + "%";


        document
            .getElementById("windSpeed")
            .textContent =
            Math.round(
                current.wind_speed_10m
            ) + " km/j";


        document
            .getElementById("visibility")
            .textContent =
            current.visibility
                ? (
                    current.visibility / 1000
                ).toFixed(1) + " km"
                : "--";


        document
            .getElementById("rainChance")
            .textContent =
            data.hourly
                .precipitation_probability[startIndex]
            + "%";


        document
            .getElementById("weatherUpdated")
            .innerHTML =

            '<i class="fa-regular fa-clock"></i>' +

            " Diperbarui " +

            formatHour(
                current.time
            );


        /* Topbar temperature */

        document
            .getElementById("topTemperature")
            .textContent =
            Math.round(
                current.temperature_2m
            ) + "°C";


        /* Forecast */

        const forecastList =
            document.getElementById(
                "forecastList"
            );


        forecastList.innerHTML = "";


        for (
            let i = startIndex;
            i <
            Math.min(
                startIndex + 24,
                data.hourly.time.length
            );
            i++
        ) {

            const info =
                getWeatherInfo(
                    data.hourly
                        .weather_code[i]
                );


            const item =
                document.createElement(
                    "div"
                );


            item.className =
                "forecast-item" +
                (
                    i === startIndex
                        ? " active"
                        : ""
                );


            item.innerHTML = `

                <span class="forecast-time">

                    ${
                        formatHour(
                            data.hourly.time[i]
                        )
                    }

                </span>


                <span class="forecast-weather-icon">

                    ${info.icon}

                </span>


                <span class="forecast-temp">

                    ${
                        Math.round(
                            data.hourly
                                .temperature_2m[i]
                        )
                    }°

                </span>


                <span class="forecast-rain">

                    💧
                    ${
                        data.hourly
                            .precipitation_probability[i]
                    }%

                </span>

            `;


            forecastList.appendChild(
                item
            );

        }

        const forecastToggle =
            document.getElementById("forecastToggle");

        const hasAdditionalForecast =
            forecastList.children.length > 3;

        forecastToggle.hidden = !hasAdditionalForecast;
        forecastToggle.disabled = !hasAdditionalForecast;
        forecastToggle.textContent = "Lihat Detail 24 Jam";


    } catch (error) {

        console.error(
            "Weather error:",
            error
        );


        document
            .getElementById(
                "weatherCondition"
            )
            .textContent =
            "Data cuaca tidak tersedia";

        document
            .getElementById("topWeatherIcon")
            .textContent = "❔";

        document
            .getElementById("topWeatherIcon")
            .removeAttribute("title");

        document
            .getElementById("topTemperature")
            .textContent = "--°C";


        document
            .getElementById(
                "weatherUpdated"
            )
            .innerHTML =
            "Silakan coba beberapa saat lagi";


        document
            .getElementById(
                "forecastList"
            )
            .innerHTML = `

                <div style="
                    grid-column:1/-1;
                    text-align:center;
                    padding:20px;
                    color:#8aa0aa;
                    font-size:10px;
                ">

                    Data cuaca sedang tidak
                    dapat dimuat.

                </div>

            `;

        const forecastToggle =
            document.getElementById("forecastToggle");

        forecastToggle.textContent = "Prakiraan tidak tersedia";
        forecastToggle.disabled = true;
        forecastToggle.hidden = false;

    }

}


/* Run */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const menuButton =
            document.querySelector(".menu-button");

        const mainNavigation =
            document.getElementById("mainNavigation");

        const forecastToggle =
            document.getElementById("forecastToggle");

        forecastToggle.addEventListener("click", function () {
            const forecastList =
                document.getElementById("forecastList");
            const isExpanded =
                forecastList.classList.toggle("is-expanded");

            forecastToggle.setAttribute("aria-expanded", String(isExpanded));
            forecastToggle.textContent = isExpanded
                ? "Ringkas Prakiraan"
                : "Lihat Detail 24 Jam";

            if (isExpanded) {
                forecastList.scrollIntoView({
                    behavior: "smooth",
                    block: "nearest",
                });
            }
        });

        function closeNavigation() {
            mainNavigation.classList.remove("is-open");
            mainNavigation.querySelectorAll("details[open]").forEach(function (dropdown) {
                dropdown.open = false;
            });
            menuButton.setAttribute("aria-expanded", "false");
            menuButton.setAttribute("aria-label", "Buka menu navigasi");
        }

        menuButton.addEventListener("click", function () {
            const isOpen =
                mainNavigation.classList.toggle("is-open");

            menuButton.setAttribute("aria-expanded", String(isOpen));
            menuButton.setAttribute(
                "aria-label",
                isOpen ? "Tutup menu navigasi" : "Buka menu navigasi"
            );
        });

        mainNavigation.querySelectorAll("a").forEach(function (link) {
            link.addEventListener("click", closeNavigation);
        });

        document.addEventListener("click", function (event) {
            if (!mainNavigation.contains(event.target) && !menuButton.contains(event.target)) {
                closeNavigation();
            }
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                closeNavigation();
            }
        });

        loadDiengWeather();

    }
);

</script>


</body>

</html>