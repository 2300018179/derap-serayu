<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Opini — Derap Serayu</title>

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- FONT AWESOME --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


<style>

/* =========================================================
   GLOBAL
========================================================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.opini-page > .opini-topbar,
.opini-page > .opini-site-header {
    position: relative;
    z-index: 20;
}

.opini-page > .opini-content,
.opini-page > .home-footer {
    position: relative;
    z-index: 1;
}

html {
    scroll-behavior: smooth;
}

body {

    font-family: "DM Sans", sans-serif;

    color: #073f5e;

    background: #f5fbfd;

    min-height: 100vh;

    overflow-x: hidden;

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
   PAGE BACKGROUND
========================================================= */

.opini-page {

    position: relative;

    min-height: 100vh;

    overflow: visible;

    isolation: isolate;

    background:
        linear-gradient(
            180deg,
            #dff6fb 0%,
            #eef9fc 32%,
            #f7fcfd 100%
        );

}


/* background image */

.opini-page::before {

    content: "";

    position: absolute;

    inset: 0;

    background:

        linear-gradient(
            180deg,
            rgba(220,246,251,.72) 0%,
            rgba(239,249,252,.92) 42%,
            #f5fbfd 100%
        ),

        url("{{ asset('images/bg-candii.jpg') }}");

    background-size: cover;

    background-position: center top;

    z-index: 0;

    pointer-events: none;

}


/* decorative circle */

.opini-page::after {

    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    right: 24px;
    top: 120px;

    border-radius: 50%;

    border: 1px solid rgba(20,180,220,.22);

    z-index: 0;

    pointer-events: none;

}


/* =========================================================
   TOP BAR
========================================================= */

.top-bar {

    height: 34px;

    background: #063f5e;

    color: #d9f4fa;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 0 6.3%;

    position: relative;

    z-index: 20;

    font-size: 10px;

}


.top-left,
.top-right {

    display: flex;

    align-items: center;

    gap: 18px;

}


.top-item {

    display: flex;

    align-items: center;

    gap: 6px;

    white-space: nowrap;

}


.top-item i {

    color: #7ee4f8;

    font-size: 10px;

}


.top-right a {

    transition: .2s;

}


.top-right a:hover {

    color: #70def5;

}


/* =========================================================
   NAVBAR
========================================================= */

.main-header {

    position: relative;

    z-index: 20;

    padding: 13px 6.3% 0;

}


.nav-wrapper {

    min-height: 68px;

    border-radius: 17px;

    padding: 0 15px 0 20px;

    display: flex;

    align-items: center;

    gap: 22px;

    background: rgba(255,255,255,.91);

    backdrop-filter: blur(18px);

    -webkit-backdrop-filter: blur(18px);

    border: 1px solid rgba(255,255,255,.8);

    box-shadow:

        0 10px 35px rgba(16,87,111,.10);

}


/* LOGO */

.logo-area {

    display: flex;

    align-items: center;

    gap: 9px;

    min-width: 210px;

}


.logo-area img {

    width: 47px;

    height: 47px;

    object-fit: contain;

}


.logo-text {

    font-family: "Playfair Display", serif;

    font-size: 20px;

    font-weight: 800;

    color: #063f5e;

    line-height: 1;
}


.logo-text span {

    color: #0bb3d9;

}


.logo-subtitle {

    font-size: 7px;

    margin-top: 4px;

    color: #7799a6;

}


/* NAVIGATION */

.navigation {

    flex: 1;

    display: flex;

    justify-content: center;

    align-items: center;

    gap: 3px;

}


.navigation a {

    font-size: 9px;

    font-weight: 600;

    color: #14506c;

    padding: 10px 12px;

    border-radius: 22px;

    transition: .25s;

    white-space: nowrap;

}


.navigation a:hover {

    color: #06a9d2;

    background: #e9f9fd;

}


.navigation a.active {

    color: white;

    background: linear-gradient(
        135deg,
        #0ab2d8,
        #079ec8
    );

    box-shadow:

        0 5px 15px rgba(6,177,216,.25);

}


/* SEARCH */

.nav-actions {

    display: flex;

    align-items: center;

    gap: 10px;

}


.search-box {

    width: 210px;

    height: 37px;

    border-radius: 20px;

    background: #eef8fb;

    display: flex;

    align-items: center;

    padding: 0 13px;

    color: #8ba9b4;

}


.search-box input {

    width: 100%;

    border: 0;

    outline: 0;

    background: transparent;

    font-size: 9px;

    color: #164e68;

}


.search-box i {

    color: #075a79;

    font-size: 12px;

}


.menu-button {

    width: 39px;

    height: 39px;

    border: 0;

    border-radius: 50%;

    color: white;

    background: #063f5e;

    cursor: pointer;

    font-size: 13px;

}


/* =========================================================
   MAIN CONTENT
========================================================= */

.opini-content {

    width: min(1300px, calc(100% - 40px));

    margin: auto;

    position: relative;

    z-index: 5;

    padding: 37px 0 60px;

}


/* =========================================================
   PAGE INTRO
========================================================= */

.opini-heading {

    display: flex;

    justify-content: space-between;

    align-items: flex-end;

    margin-bottom: 22px;

}


.opini-title-area {

    max-width: 620px;

}


.opini-title {

    font-family: "Playfair Display", serif;

    font-size: clamp(45px, 5vw, 68px);

    line-height: .95;

    color: #063f5e;

    display: flex;

    align-items: center;

    gap: 16px;

}


.opini-title i {

    font-size: 43px;

    color: #0aabcF;

}


.opini-description {

    font-size: 14px;

    line-height: 1.6;

    color: #063f5e;

    max-width: 560px;

    margin-top: 12px;

}


.title-line {

    width: 55px;

    height: 3px;

    background: #0bb5dc;

    margin-top: 16px;

    border-radius: 5px;

}


/* =========================================================
   FEATURE SECTION
========================================================= */

.feature-layout {

    display: grid;

    grid-template-columns: 2.25fr .95fr;

    gap: 22px;

}


/* FEATURE CARD */

.feature-card {

    min-height: 275px;

    border-radius: 16px;

    overflow: hidden;

    background: rgba(255,255,255,.92);

    border: 1px solid rgba(255,255,255,.8);

    box-shadow:

        0 15px 40px rgba(18,82,105,.09);

    display: grid;

    grid-template-columns: 1fr 1.2fr;

}

.feature-card-empty {

    grid-template-columns: 1fr;
    min-height: 190px;

}


.feature-image {

    position: relative;

    overflow: hidden;

    min-height: 275px;

}


.feature-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: transform .5s ease;

}


.feature-card:hover .feature-image img {

    transform: scale(1.05);

}


.image-overlay {

    position: absolute;

    inset: 0;

    background:

        linear-gradient(
            180deg,
            transparent 45%,
            rgba(2,48,70,.30)
        );

}


.category-label {

    position: absolute;

    top: 15px;

    left: 15px;

    padding: 7px 13px;

    background: #08afd6;

    color: white;

    border-radius: 20px;

    font-size: 8px;

    font-weight: 800;

    letter-spacing: .7px;

}


.feature-info {

    padding: 28px 30px;

    display: flex;

    flex-direction: column;

    justify-content: center;

}


.author-info {

    display: flex;

    align-items: center;

    gap: 9px;

    color: #7393a0;

    font-size: 9px;

    margin-bottom: 10px;

}


.author-avatar {

    width: 28px;

    height: 28px;

    border-radius: 50%;

    overflow: hidden;

}


.author-avatar img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}


.feature-info h2 {

    font-family: "Playfair Display", serif;

    font-size: 28px;

    line-height: 1.17;

    color: #063f5e;

    margin-bottom: 10px;

}


.feature-info p {

    font-size: 11px;

    line-height: 1.7;

    color: #5d8493;

    max-width: 470px;

}


.read-button {

    width: fit-content;

    display: inline-flex;

    align-items: center;

    gap: 9px;

    margin-top: 17px;

    padding: 11px 17px;

    background: #08add5;

    color: white;

    border-radius: 22px;

    font-size: 9px;

    font-weight: 700;

    transition: .25s;

}


.read-button:hover {

    transform: translateY(-2px);

    box-shadow: 0 8px 20px rgba(8,173,213,.25);

}


/* =========================================================
   POPULAR
========================================================= */

.popular-card {

    background: rgba(255,255,255,.94);

    border-radius: 16px;

    padding: 21px;

    box-shadow:

        0 15px 40px rgba(18,82,105,.09);

    border: 1px solid rgba(255,255,255,.8);

}


.popular-heading {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 13px;

}


.popular-heading h3 {

    font-family: "Playfair Display", serif;

    color: #063f5e;

    font-size: 17px;

}


.popular-heading h3 i {

    color: #08afd5;

    margin-right: 5px;

}


.see-all {

    color: #08a9d0;

    font-size: 8px;

    font-weight: 700;

}


.popular-item {

    display: grid;

    grid-template-columns: 28px 70px 1fr;

    gap: 9px;

    align-items: center;

    padding: 9px 0;

    border-bottom: 1px solid #e7f1f4;

}


.popular-item:last-child {

    border-bottom: 0;

}


.popular-number {

    width: 24px;

    height: 24px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background: #09add5;

    color: white;

    font-weight: 800;

    font-size: 9px;

}


.popular-thumb {

    width: 70px;

    height: 53px;

    border-radius: 8px;

    overflow: hidden;

}


.popular-thumb img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}


.popular-info h4 {

    font-size: 9px;

    line-height: 1.4;

    color: #075071;

}


.popular-info p {

    font-size: 7px;

    color: #86a4ae;

    margin-top: 4px;

}

.popular-info-title {

    display: block;
    color: #075071;
    font-size: 9px;
    font-weight: 700;
    line-height: 1.4;

}

.popular-info > span:last-child {

    display: block;
    margin-top: 4px;
    color: #86a4ae;
    font-size: 7px;

}

.opinion-empty-state {

    grid-column: 1 / -1;
    display: flex;
    align-items: center;
    gap: 16px;
    min-height: 125px;
    padding: 24px;
    border: 1px dashed #b8dce7;
    border-radius: 14px;
    background: rgba(255, 255, 255, .72);
    color: #5d8493;
    font-size: 12px;
    line-height: 1.6;

}

.opinion-empty-state > i {

    display: grid;
    flex: 0 0 46px;
    width: 46px;
    height: 46px;
    place-items: center;
    border-radius: 50%;
    background: #e4f7fb;
    color: #08a9d0;
    font-size: 18px;

}

.opinion-empty-state strong {

    display: block;
    margin-bottom: 3px;
    color: #075071;
    font-size: 14px;

}

.popular-empty-state {

    padding: 20px 0 8px;
    color: #5d8493;
    font-size: 11px;
    line-height: 1.6;

}

.opinion-pagination {

    display: flex;
    justify-content: center;
    margin-top: 24px;

}


/* =========================================================
   RECENT OPINIONS
========================================================= */

.section-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-top: 33px;

    margin-bottom: 16px;

}


.section-title {

    display: flex;

    align-items: center;

    gap: 10px;

}


.section-title i {

    color: #08add5;

    font-size: 15px;

}


.section-title h2 {

    font-family: "Playfair Display", serif;

    font-size: 22px;

    color: #063f5e;

}


.section-title .small-line {

    width: 50px;

    height: 2px;

    background: #08add5;

    margin-left: 10px;

}


.section-see-all {

    color: #08a9d0;

    font-size: 9px;

    font-weight: 700;

}


/* =========================================================
   OPINION CARDS
========================================================= */

.opinion-grid {

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 15px;

}


.opinion-card {

    background: rgba(255,255,255,.94);

    border-radius: 13px;

    overflow: hidden;

    box-shadow:

        0 10px 30px rgba(20,85,106,.07);

    border: 1px solid rgba(255,255,255,.9);

    transition: .3s;

}


.opinion-card:hover {

    transform: translateY(-5px);

    box-shadow:

        0 17px 35px rgba(20,85,106,.12);

}


.opinion-card-image {

    display: block;
    height: 175px;

    position: relative;

    overflow: hidden;

}


.opinion-card-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: .4s;

}


.opinion-card:hover
.opinion-card-image img {

    transform: scale(1.05);

}


.card-category {

    position: absolute;

    left: 10px;

    top: 10px;

    padding: 6px 10px;

    background: #09add5;

    color: white;

    border-radius: 15px;

    font-size: 7px;

    font-weight: 800;

}


.opinion-card-body {

    padding: 15px;

}


.opinion-card-body h3 {

    font-family: "Playfair Display", serif;

    font-size: 15px;

    line-height: 1.35;

    color: #064665;

    min-height: 40px;

}

.opinion-card-body > p {

    display: -webkit-box;
    overflow: hidden;
    margin-top: 8px;
    color: #5d8493;
    font-size: 10px;
    line-height: 1.6;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;

}


.card-meta {

    display: flex;

    align-items: center;

    gap: 8px;

    margin-top: 12px;

    color: #8aa5af;

    font-size: 7px;

}


/* =========================================================
   OPINION CTA
========================================================= */

.opinion-cta {

    margin-top: 35px;

    min-height: 185px;

    border-radius: 18px;

    overflow: hidden;

    position: relative;

    display: flex;

    align-items: center;

    padding: 30px 40px;

    background:

        linear-gradient(
            90deg,
            rgba(3,62,87,.94),
            rgba(3,92,119,.82)
        ),

        url("{{ asset('images/bg-dieng-register.jpg') }}");

    background-size: cover;

    background-position: center;

    color: white;

}


.opinion-cta::before {

    content: "";

    position: absolute;

    width: 250px;

    height: 250px;

    border-radius: 50%;

    border: 1px solid rgba(255,255,255,.12);

    right: 100px;

    top: -130px;

}


.cta-content {

    position: relative;

    z-index: 2;

    max-width: 700px;

}


.cta-label {

    font-size: 8px;

    letter-spacing: 2px;

    color: #6de2f8;

    font-weight: 800;

}


.cta-content h2 {

    font-family: "Playfair Display", serif;

    font-size: 29px;

    margin-top: 7px;

}


.cta-content p {

    font-size: 10px;

    color: #c4e3eb;

    margin-top: 6px;

}

.cta-account-note {

    display: inline-block;
    margin-top: 16px;
    padding: 9px 13px;
    border: 1px solid rgba(255, 255, 255, .38);
    border-radius: 18px;
    color: #fff;
    font-size: 10px;

}


.cta-button {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    margin-top: 16px;

    padding: 10px 16px;

    background: white;

    color: #07506d;

    border-radius: 20px;

    font-size: 9px;

    font-weight: 700;

}


/* =========================================================
   FOOTER
   SAMA DENGAN BERANDA / CERITA & BUDAYA
========================================================= */

.home-footer {

    position: relative;

    margin-top: 0;

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

    padding: 58px 0 20px;

}


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


.footer-brand {

    display: flex;

    align-items: center;

    gap: 11px;

    width: fit-content;

}


.footer-logo-box {

    width: 54px;
    height: 54px;

    display: flex;

    align-items: center;

    justify-content: center;

    overflow: hidden;

    border-radius: 12px;

    background: rgba(255,255,255,.06);

    border: 1px solid rgba(255,255,255,.12);

}


.footer-logo-box img {

    width: 48px;
    height: 48px;

    object-fit: contain;

}


.footer-brand-name {

    font-family: "Playfair Display", serif;

    font-size: 23px;

    line-height: 1;

    font-weight: 700;

}


.footer-brand-name span {

    color: #10bce4;

}


.footer-brand-subtitle {

    margin-top: 5px;

    font-size: 8px;

    color: #8bb4c1;

}


.footer-description {

    max-width: 300px;

    margin-top: 17px;

    color: #a7c7d1;

    font-size: 10px;

    line-height: 1.75;

}


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

    transition: .25s;

}


.footer-social a:hover {

    background: #08afd7;

    border-color: #08afd7;

    transform: translateY(-3px);

}


.footer-link-column h3 {

    font-family: "Playfair Display", serif;

    font-size: 16px;
    
    margin-bottom: 17px;
    
}


.footer-link-column a {

    display: block;

    color: #9dbdc7;

    font-size: 10px;

    margin-bottom: 12px;

    transition: .2s;

}


.footer-link-column a:hover {

    color: #55d9f4;

    transform: translateX(4px);

}


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

}


.footer-newsletter h2 span {

    color: #08b9df;

}


.footer-newsletter p {

    font-size: 9px;

    color: #a6c6cf;

    line-height: 1.6;

    margin-top: 10px;

}


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

    color: white;

    background: #08b5dc;

    cursor: pointer;

}


.footer-quote-section {

    padding: 32px 20px 39px;

    border-top: 1px solid rgba(255,255,255,.10);

    border-bottom: 1px solid rgba(255,255,255,.10);

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

    margin-top: 10px;

}


.footer-quote-author {

    margin-top: 15px;

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
   RESPONSIVE
========================================================= */

@media(max-width:1150px) {

    .navigation a {

        padding: 9px 7px;

        font-size: 8px;

    }

    .logo-area {

        min-width: 170px;

    }

    .search-box {

        width: 150px;

    }

    .feature-layout {

        grid-template-columns: 1fr;

    }

    .opinion-grid {

        grid-template-columns: repeat(2,1fr);

    }

    .home-footer-grid {

        grid-template-columns:
            1.2fr 1fr 1fr;

    }

    .footer-newsletter {

        grid-column: span 2;

        padding-left: 0;

    }

}


@media(max-width:850px) {

    .top-right {

        display: none;

    }

    .top-left {

        gap: 12px;

    }

    .navigation {

        display: none;

    }

    .logo-area {

        flex: 1;

    }

    .feature-card {

        grid-template-columns: 1fr;

    }

    .feature-image {

        height: 240px;

    }

    .opini-heading {

        align-items: flex-start;

    }

}


@media(max-width:600px) {

    .top-bar {

        padding: 0 15px;

    }

    .main-header {

        padding: 10px 15px 0;

    }

    .nav-wrapper {

        padding: 0 10px;

    }

    .logo-area {

        min-width: 0;

    }

    .logo-area img {

        width: 40px;
        height: 40px;

    }

    .logo-text {

        font-size: 17px;

    }

    .search-box {

        display: none;

    }

    .opini-content {

        width: calc(100% - 30px);

        padding-top: 30px;

    }

    .opini-title {

        font-size: 45px;

    }

    .opini-description {

        font-size: 12px;

    }

    .feature-info {

        padding: 22px;

    }

    .feature-info h2 {

        font-size: 24px;

    }

    .opinion-grid {

        grid-template-columns: 1fr;

    }

    .opinion-cta {

        padding: 25px;

    }

    .cta-content h2 {

        font-size: 24px;

    }

    .home-footer-grid {

        grid-template-columns: 1fr 1fr;

        gap: 30px;

    }

    .footer-brand-column,
    .footer-newsletter {

        grid-column: span 2;

    }

    .footer-bottom {

        grid-template-columns: 1fr;

        text-align: center;

        padding: 18px 0;

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

    .footer-policy {

        flex-wrap: wrap;

        gap: 10px 16px;

    }

}

/* Header styling shared with the reader-facing home page. */
.opini-topbar {
    position: relative;
    z-index: 20;
    min-height: 38px;
    background: #063f60;
    color: #fff;
}

.opini-topbar-inner {
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

.opini-topbar-left,
.opini-topbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.opini-topbar-item {
    display: flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.opini-topbar-item i,
.opini-topbar-weather-icon {
    color: #72e3fa;
}

.opini-topbar-divider {
    width: 1px;
    height: 13px;
    background: rgba(255, 255, 255, .25);
}

.opini-topbar-right a {
    color: #fff;
    text-decoration: none;
    opacity: .9;
    transition: color .2s;
}

.opini-topbar-right a:hover {
    color: #72e3fa;
}

.opini-site-header {
    position: relative;
    z-index: 20;
    padding: 12px 0 0;
}

.opini-header-card {
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

.opini-brand {
    display: inline-flex;
    align-items: center;
    flex: 0 0 auto;
    text-decoration: none;
}

.opini-brand img {
    display: block;
    width: 180px;
    max-height: 54px;
    object-fit: contain;
}

.opini-brand-fallback {
    display: none;
    color: #073f5e;
    font: 800 23px "Playfair Display", serif;
}

.opini-brand-fallback span {
    color: #08add5;
}

.opini-main-nav {
    display: flex;
    flex: 1 1 auto;
    align-items: center;
    justify-content: center;
    gap: 2px;
    min-width: 0;
}

.opini-main-nav > a,
.opini-nav-dropdown summary {
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

.opini-main-nav > a:hover,
.opini-nav-dropdown summary:hover,
.opini-nav-dropdown[open] summary {
    background: #e8f8fc;
    color: #0789a9;
}

.opini-nav-dropdown {
    position: relative;
}

.opini-nav-dropdown summary {
    list-style: none;
}

.opini-nav-dropdown summary::-webkit-details-marker {
    display: none;
}

.opini-nav-dropdown summary i {
    margin-left: 4px;
    color: #08add5;
    font-size: 10px;
}

.opini-nav-dropdown-menu {
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

.opini-nav-dropdown-menu a {
    display: block;
    padding: 9px 11px;
    border-radius: 9px;
    color: #073f5e;
    font-size: 12px;
    text-decoration: none;
}

.opini-nav-dropdown-menu a:hover,
.opini-nav-dropdown-menu a.active {
    background: #e8f8fc;
    color: #0789a9;
}

.opini-search {
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

.opini-search input {
    width: 100%;
    min-width: 0;
    border: 0;
    outline: 0;
    background: transparent;
    color: #073f5e;
    font: 11px "DM Sans", sans-serif;
}

.opini-search button {
    min-height: 30px;
    padding: 0 11px;
    border: 0;
    border-radius: 18px;
    background: #08add5;
    color: #fff;
    font: 700 10px "DM Sans", sans-serif;
    cursor: pointer;
}

.opini-account-actions {
    display: flex;
    flex: 0 0 auto;
    align-items: center;
    gap: 6px;
}

.opini-account-actions a,
.opini-account-actions button {
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

.opini-account-actions a:hover,
.opini-account-actions button:hover {
    border-color: #08add5;
    color: #0789a9;
}

.opini-account-actions .opini-register-link {
    border-color: #08add5;
    background: #08add5;
    color: #fff;
}

.opini-account-actions .opini-register-link:hover {
    background: #078eae;
    color: #fff;
}

.opini-account-actions form {
    margin: 0;
}

.opini-main-nav > a[aria-current="page"] {
    background: #e8f8fc;
    color: #0789a9;
}

.opini-visually-hidden {
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
    margin-top: 9px;
    color: #a6e7f5;
    font-size: 10px;
    line-height: 1.5;
}

.home-footer .footer-brand {
    display: block;
    width: fit-content;
}

.home-footer .footer-brand img {
    display: block;
    width: 180px;
    height: auto;
    padding: 0;
    background: transparent;
}

.opinion-card-link {
    color: inherit;
    text-decoration: none;
}

.opinion-card-link:hover {
    color: #0789a9;
}

@media(max-width:1150px) {
    .opini-topbar-right {
        display: none;
    }
}

@media(max-width:1080px) {
    .opini-header-card {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 8px 14px;
    }

    .opini-brand img {
        width: 150px;
    }

    .opini-main-nav {
        grid-column: 1 / -1;
        grid-row: 2;
        justify-content: flex-start;
        flex-wrap: wrap;
    }

    .opini-search {
        grid-column: 1;
        grid-row: 3;
        width: 100%;
        max-width: none;
    }

    .opini-account-actions {
        grid-column: 2;
        grid-row: 3;
        justify-content: flex-end;
    }

}

@media(max-width:650px) {
    .opini-topbar-inner {
        width: calc(100% - 20px);
        justify-content: center;
        padding: 7px 0;
    }

    .opini-topbar-left {
        gap: 9px;
        font-size: 8px;
    }

    .opini-topbar-left .opini-topbar-item:last-child {
        display: none;
    }

    .opini-header-card {
        width: calc(100% - 20px);
        padding: 9px;
        border-radius: 17px;
    }

    .opini-brand img {
        width: 125px;
        max-height: 46px;
    }

    .opini-main-nav {
        justify-content: flex-start;
        gap: 0;
    }

    .opini-main-nav > a,
    .opini-nav-dropdown summary {
        padding: 8px 9px;
        font-size: 10px;
    }

    .opini-nav-dropdown-menu {
        right: 0;
        left: auto;
    }

    .opini-search {
        min-width: 0;
        height: 38px;
    }

    .opini-account-actions a,
    .opini-account-actions button {
        min-height: 34px;
        padding: 0 8px;
        font-size: 10px;
    }

    .opini-content {
        width: calc(100% - 30px);
        padding-top: 28px;
    }
}

</style>

</head>


<body>


<div class="opini-page">


{{-- =====================================================
     TOP BAR
====================================================== --}}

<div class="opini-topbar">
    <div class="opini-topbar-inner">
        <div class="opini-topbar-left">
            <div class="opini-topbar-item"><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Banjarnegara</div>
            <div class="opini-topbar-item">
                <span id="opiniWeatherIcon" class="opini-topbar-weather-icon" aria-hidden="true">🌤️</span>
                <span id="opiniTemperature">--°C</span>
            </div>
            <div class="opini-topbar-divider" aria-hidden="true"></div>
            <div class="opini-topbar-item"><i class="fa-regular fa-calendar" aria-hidden="true"></i> {{ now()->locale('id')->translatedFormat('l, j F Y') }}</div>
        </div>

        <div class="opini-topbar-right" aria-label="Tautan layanan dan media sosial">
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



{{-- =====================================================
     NAVBAR
====================================================== --}}

<header class="opini-site-header">
    <div class="opini-header-card">
        <a class="opini-brand" href="{{ route('home') }}" aria-label="Derap Serayu, beranda">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Derap Serayu"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-flex';"
            >
            <span class="opini-brand-fallback">Derap<span>Serayu</span></span>
        </a>

        <nav class="opini-main-nav" aria-label="Navigasi utama">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('articles.index') }}">Berita</a>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <details class="opini-nav-dropdown">
                <summary><i class="fa-solid fa-water" aria-hidden="true"></i> Jelajahi <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></summary>
                <div class="opini-nav-dropdown-menu">
                    <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                    <a class="active" href="{{ route('opini') }}" aria-current="page">Opini</a>
                    <a href="{{ route('sosok') }}">Sosok</a>
                    <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                    <a href="{{ route('potensi') }}">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>
            </details>
        </nav>

        <form class="opini-search" action="{{ route('articles.index') }}" method="GET" role="search">
            <label class="opini-visually-hidden" for="opini-search">Cari berita dan opini</label>
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            <input id="opini-search" type="search" name="q" value="{{ request('q') }}" placeholder="Cari berita atau opini..." maxlength="100">
            <button type="submit">Cari</button>
        </form>

        <div class="opini-account-actions">
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
                <a class="opini-register-link" href="{{ route('register.pembaca') }}">Daftar</a>
            @endauth
        </div>
    </div>
</header>



{{-- =====================================================
     MAIN
====================================================== --}}

<main class="opini-content">


    {{-- PAGE TITLE --}}

    <section class="opini-heading">

        <div class="opini-title-area">

            <h1 class="opini-title">

                <i class="fa-solid fa-water" aria-hidden="true"></i>

                Opini

            </h1>

            <p class="opini-description">

                Ruang bagi gagasan, sudut pandang, dan pemikiran
                untuk Banjarnegara yang lebih baik.

            </p>

            <div class="title-line"></div>

        </div>

    </section>



    {{-- =================================================
         FEATURE + POPULAR
    ================================================== --}}

    <section class="feature-layout">


        {{-- FEATURE ARTICLE --}}

        <article class="feature-card {{ $featuredOpinion ? '' : 'feature-card-empty' }}">
            @if ($featuredOpinion)
                <div class="feature-image">
                    <img
                        src="{{ $featuredOpinion->cover_image_path ? asset('storage/'.$featuredOpinion->cover_image_path) : asset('images/bg-kawah.jpg') }}"
                        alt="{{ $featuredOpinion->caption ?: $featuredOpinion->title }}"
                    >
                    <div class="image-overlay"></div>
                    <span class="category-label">OPINI</span>
                </div>

                <div class="feature-info">
                    <div class="author-info">
                        <i class="fa-solid fa-fire" aria-hidden="true"></i>
                        <span>Paling banyak dibaca</span>
                        <span aria-hidden="true">·</span>
                        <span>{{ $featuredOpinion->author_name }}</span>
                        @if ($featuredOpinion->published_at)
                            <span aria-hidden="true">·</span>
                            <time datetime="{{ $featuredOpinion->published_at->toDateString() }}">{{ $featuredOpinion->published_at->translatedFormat('d M Y') }}</time>
                        @endif
                    </div>
                    <h2>{{ $featuredOpinion->title }}</h2>
                    <p>{{ $featuredOpinion->summary }}</p>
                    <a href="{{ route('articles.show', $featuredOpinion->slug) }}" class="read-button">
                        Baca opini
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            @else
                <div class="feature-info">
                    <h2>Belum ada opini yang diterbitkan</h2>
                    <p>Opini akan muncul di sini setelah ditinjau dan diterbitkan oleh redaksi.</p>
                </div>
            @endif
        </article>



        {{-- POPULAR --}}

        <aside class="popular-card">

            <div class="popular-heading">

                <h3><i class="fa-regular fa-lightbulb" aria-hidden="true"></i> Opini Populer</h3>

                <a href="#opini-terbaru" class="see-all">Lihat Semua →</a>

            </div>

            @forelse ($popularOpinions as $opinion)
                <a class="popular-item opinion-card-link" href="{{ route('articles.show', $opinion->slug) }}">
                    <span class="popular-number">{{ $loop->iteration }}</span>
                    <span class="popular-thumb">
                        <img
                            src="{{ $opinion->cover_image_path ? asset('storage/'.$opinion->cover_image_path) : asset('images/bg-kawah.jpg') }}"
                            alt="{{ $opinion->caption ?: $opinion->title }}"
                        >
                    </span>
                    <span class="popular-info">
                        <span class="popular-info-title">{{ $opinion->title }}</span>
                        <span>{{ number_format($opinion->views) }} dibaca</span>
                    </span>
                </a>
            @empty
                <p class="popular-empty-state">Belum ada opini populer yang diterbitkan.</p>
            @endforelse

        </aside>

    </section>



    {{-- =================================================
         OPINI TERBARU
    ================================================== --}}

    <section id="opini-terbaru">
        <div class="section-header">
            <div class="section-title">
                <i class="fa-solid fa-pen-nib" aria-hidden="true"></i>
                <h2>Opini Terbaru</h2>
                <div class="small-line"></div>
            </div>
            <span class="section-see-all">{{ $opinions->total() }} artikel terbit</span>
        </div>

        <div class="opinion-grid">
            @forelse ($opinions as $opinion)
                <article class="opinion-card">
                    <a class="opinion-card-image" href="{{ route('articles.show', $opinion->slug) }}">
                        <img
                            src="{{ $opinion->cover_image_path ? asset('storage/'.$opinion->cover_image_path) : asset('images/bg-kawah.jpg') }}"
                            alt="{{ $opinion->caption ?: $opinion->title }}"
                        >
                        <span class="card-category">OPINI</span>
                    </a>
                    <div class="opinion-card-body">
                        <h3>
                            <a class="opinion-card-link" href="{{ route('articles.show', $opinion->slug) }}">
                                {{ $opinion->title }}
                            </a>
                        </h3>
                        <p>{{ $opinion->summary }}</p>
                        <div class="card-meta">
                            <span>{{ $opinion->author_name }}</span>
                            @if ($opinion->published_at)
                                <span aria-hidden="true">·</span>
                                <time datetime="{{ $opinion->published_at->toDateString() }}">{{ $opinion->published_at->translatedFormat('d M Y') }}</time>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="opinion-empty-state">
                    <i class="fa-regular fa-newspaper" aria-hidden="true"></i>
                    <div>
                        <strong>Belum ada opini yang diterbitkan</strong>
                        <span>Artikel Opini akan tampil di sini setelah ditinjau dan diterbitkan oleh redaksi.</span>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($opinions->hasPages())
            <div class="opinion-pagination">{{ $opinions->links() }}</div>
        @endif
    </section>



    {{-- =================================================
         CTA PENULIS
    ================================================== --}}

    <section class="opinion-cta">

        <div class="cta-content">

            <div class="cta-label">
                PUNYA GAGASAN?
            </div>

            <h2>
                Bagikan pendapatmu
                tentang Banjarnegara.
            </h2>

            <p>
                Jadilah bagian dari ruang diskusi dan
                berbagi gagasan untuk Banjarnegara.
            </p>

            @guest
                <a href="{{ route('register.penulis') }}" class="cta-button">
                    Daftar sebagai Penulis
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            @else
                @if (auth()->user()->role === 'writer')
                    <a href="{{ route('penulis.artikel.create') }}" class="cta-button">
                        Tulis Opini
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </a>
                @else
                    <p class="cta-account-note">Pengiriman opini tersedia untuk akun penulis.</p>
                @endif
            @endguest

        </div>

    </section>


</main>



{{-- =====================================================
     FOOTER
====================================================== --}}

<footer class="home-footer">

    <div class="home-footer-inner">


        <div class="home-footer-grid">


            {{-- BRAND --}}

            <div class="footer-brand-column">

                <a
                    href="{{ url('/') }}"
                    class="footer-brand"
                >
                    <img src="{{ asset('images/logo.png') }}" alt="Derap Serayu">
                </a>


                <p class="footer-description">

                    Media informasi dan cerita Banjarnegara
                    yang menghadirkan berita, budaya, wisata,
                    potensi, serta kisah dari masyarakat.

                </p>


                <div class="footer-social">

                    <a href="https://www.instagram.com/kabupatenbanjarnegara/" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pemerintah Kabupaten Banjarnegara">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/" target="_blank" rel="noopener noreferrer" aria-label="Facebook Pemerintah Kabupaten Banjarnegara">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="https://www.youtube.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="YouTube Pemerintah Kabupaten Banjarnegara">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="https://www.tiktok.com/@pemkabbanjarnegara" target="_blank" rel="noopener noreferrer" aria-label="TikTok Pemerintah Kabupaten Banjarnegara">
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


</div>

<script>
    async function updateOpinionTopbarWeather() {
        const weatherIcon = document.getElementById("opiniWeatherIcon");
        const temperature = document.getElementById("opiniTemperature");
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
            console.error("Unable to load Opinion topbar weather.", error);
            weatherIcon.textContent = "❔";
            temperature.textContent = "Cuaca tidak tersedia";
        }
    }

    updateOpinionTopbarWeather();
</script>

</body>
</html>