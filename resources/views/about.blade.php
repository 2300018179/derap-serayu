<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Derap Serayu | Media Informasi Banjarnegara</title>
    <meta name="description" content="Kenali Derap Serayu, ruang informasi dan cerita tentang Banjarnegara.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            color-scheme: light;
            --ink: #073f5e;
            --muted: #64849b;
            --teal: #063f60;
            --cyan: #08add5;
            --cyan-soft: #e8f8fc;
        }

        * { box-sizing: border-box; }
        html { min-height: 100%; scroll-behavior: smooth; }
        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font: 15px/1.65 "DM Sans", sans-serif;
            background:
                linear-gradient(180deg, rgba(220, 246, 251, .86), rgba(239, 249, 252, .94) 36%, #f5fbfd 100%),
                url("{{ asset('images/bg-sikunir-home.jpg') }}") center top / cover fixed no-repeat;
        }
        a { color: inherit; }
        .topbar { height: 38px; background: var(--teal); color: #fff; }
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
        .topbar-left, .topbar-right { display: flex; align-items: center; gap: 17px; }
        .topbar-item { display: flex; align-items: center; gap: 6px; white-space: nowrap; }
        .topbar-item i, .topbar-weather-icon { color: #72e3fa; }
        .topbar-weather-icon { font-size: 12px; }
        .topbar-divider { width: 1px; height: 13px; background: rgba(255, 255, 255, .25); }
        .topbar-right a { color: #fff; text-decoration: none; opacity: .88; transition: color .2s; }
        .topbar-right a:hover { color: #72e3fa; }

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
        .site-header { position: relative; z-index: 2; padding: 12px 0 0; }
        .header-card {
            width: min(1300px, calc(100% - 40px));
            min-height: 76px;
            margin: auto;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            border: 1px solid rgba(255, 255, 255, .78);
            border-radius: 22px;
            background: rgba(255, 255, 255, .9);
            box-shadow: 0 15px 40px rgba(7, 63, 94, .1);
            backdrop-filter: blur(16px);
        }
        .brand { flex: 0 0 auto; display: inline-flex; align-items: center; text-decoration: none; }
        .brand img { display: block; width: 168px; max-height: 54px; object-fit: contain; }
        .brand-name { display: none; color: var(--ink); font: 800 23px "Playfair Display", serif; }
        .brand-name span { color: var(--cyan); }
        .main-nav { display: flex; align-items: center; justify-content: center; gap: 3px; }
        .main-nav > a, .nav-dropdown summary {
            padding: 10px 11px;
            border-radius: 22px;
            color: var(--ink);
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: background .2s, color .2s;
        }
        .main-nav > a:hover, .nav-dropdown summary:hover, .nav-dropdown[open] summary {
            background: var(--cyan-soft);
            color: #08add5;
        }
        .main-nav > a.active { background: #08add5; color: #fff; box-shadow: 0 8px 20px rgba(8, 173, 213, .25); }
        .nav-dropdown { position: relative; }
        .nav-dropdown summary { cursor: pointer; list-style: none; }
        .nav-dropdown summary::-webkit-details-marker { display: none; }
        .nav-dropdown summary i { margin-left: 5px; color: var(--cyan); font-size: 10px; }
        .nav-dropdown-menu {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            z-index: 5;
            min-width: 190px;
            padding: 8px;
            border: 1px solid #dceef4;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 14px 32px rgba(7, 63, 94, .14);
        }
        .nav-dropdown-menu a { display: block; padding: 9px 11px; border-radius: 9px; color: var(--ink); font-size: 13px; text-decoration: none; }
        .nav-dropdown-menu a:hover { background: var(--cyan-soft); color: #0789a9; }
        .account-actions { display: flex; align-items: center; gap: 8px; }
        .account-actions a, .account-actions button {
            min-height: 38px;
            padding: 0 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: 1px solid #d8edf4;
            border-radius: 22px;
            background: #fff;
            color: var(--ink);
            font: 700 12px "DM Sans", sans-serif;
            text-decoration: none;
            cursor: pointer;
        }
        .account-actions a:hover, .account-actions button:hover { border-color: var(--cyan); color: #0789a9; }
        .account-actions .register-link { border-color: var(--cyan); background: var(--cyan); color: #fff; }
        .account-actions .register-link:hover { background: #078eae; color: #fff; }
        .account-actions form { margin: 0; }
        .menu-button { display: none; }

        main { width: min(1240px, calc(100% - 40px)); margin: 36px auto 76px; }
        .hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 300px;
            padding: clamp(32px, 6vw, 68px);
            display: flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 28px;
            color: #fff;
            background:
                linear-gradient(105deg, rgba(3, 48, 73, .92), rgba(4, 111, 143, .72) 58%, rgba(8, 173, 213, .48)),
                url("{{ asset('images/bg-banjarnegara.jpg') }}") center 48% / cover no-repeat;
            box-shadow: 0 24px 56px rgba(7, 63, 94, .16);
        }
        .hero::after {
            position: absolute;
            z-index: -1;
            right: -75px;
            bottom: -170px;
            width: 390px;
            height: 390px;
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 50%;
            box-shadow: 0 0 0 34px rgba(255, 255, 255, .06), 0 0 0 68px rgba(255, 255, 255, .04);
            content: "";
        }
        .hero-content { max-width: 760px; }
        .eyebrow { display: inline-flex; align-items: center; gap: 8px; margin: 0 0 14px; color: #a5efff; font-size: 11px; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; }
        h1 { margin: 0; font: 700 clamp(36px, 5.5vw, 58px)/1.12 "Playfair Display", serif; }
        .hero p:last-child { max-width: 640px; margin: 15px 0 0; color: rgba(255, 255, 255, .88); font-size: 16px; }
        .intro-card {
            position: relative;
            z-index: 1;
            width: min(920px, calc(100% - 36px));
            margin: 24px auto 0;
            padding: clamp(22px, 4vw, 36px);
            border: 1px solid rgba(255, 255, 255, .92);
            border-radius: 20px;
            background: rgba(255, 255, 255, .95);
            box-shadow: 0 16px 42px rgba(7, 63, 94, .1);
        }
        .intro-card p { margin: 0; color: #476d86; font-size: 15px; line-height: 1.85; text-align: justify; }
        .intro-card p + p { margin-top: 12px; }
        .content-section { margin-top: 54px; }
        .section-heading { max-width: 690px; margin: 0 auto 24px; text-align: center; }
        .section-kicker { margin: 0 0 5px; color: #0789a9; font-size: 10px; font-weight: 800; letter-spacing: .15em; text-transform: uppercase; }
        h2 { margin: 0; font: 700 clamp(26px, 4vw, 36px)/1.25 "Playfair Display", serif; }
        .section-heading > p:last-child { margin: 10px 0 0; color: var(--muted); font-size: 14px; }
        .values-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; }
        .value-card {
            padding: 25px;
            border: 1px solid rgba(201, 230, 240, .92);
            border-radius: 18px;
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 8px 24px rgba(7, 63, 94, .06);
        }
        .value-icon { width: 48px; height: 48px; display: grid; place-items: center; border: 1px solid #c8edf5; border-radius: 15px; background: linear-gradient(145deg, #e9faff, #f8fdff); color: #0798ba; font-size: 19px; }
        .value-card h3 { margin: 17px 0 7px; font: 700 20px "Playfair Display", serif; }
        .value-card p { margin: 0; color: var(--muted); font-size: 13px; line-height: 1.75; text-align: justify; }
        .reader-panel {
            margin-top: 48px;
            padding: clamp(25px, 4vw, 40px);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 22px;
            background: linear-gradient(135deg, rgba(255, 255, 255, .96), rgba(232, 248, 252, .9));
            box-shadow: 0 12px 32px rgba(7, 63, 94, .07);
        }
        .reader-panel h2 { font-size: clamp(24px, 3vw, 31px); }
        .reader-panel > div > p { margin: 10px 0 0; color: var(--muted); font-size: 13px; }
        .reader-steps { display: grid; gap: 14px; }
        .reader-step { display: flex; align-items: flex-start; gap: 12px; }
        .reader-step i { width: 34px; height: 34px; flex: 0 0 34px; display: grid; place-items: center; border-radius: 11px; background: var(--cyan-soft); color: #0789a9; }
        .reader-step strong { display: block; color: var(--ink); font-size: 13px; }
        .reader-step span { display: block; margin-top: 2px; color: var(--muted); font-size: 12px; }
        .contact-card {
            margin-top: 48px;
            padding: 32px 22px;
            border-radius: 22px;
            background: linear-gradient(110deg, #063f60, #087f9d);
            color: #fff;
            text-align: center;
            box-shadow: 0 18px 40px rgba(7, 63, 94, .15);
        }
        .contact-card h2 { font-size: clamp(25px, 4vw, 34px); }
        .contact-card p { max-width: 620px; margin: 10px auto 18px; color: rgba(255, 255, 255, .82); font-size: 13px; }
        .contact-actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
        .contact-actions a { min-height: 42px; padding: 0 17px; display: inline-flex; align-items: center; justify-content: center; gap: 8px; border: 1px solid rgba(255, 255, 255, .35); border-radius: 30px; color: #fff; font-size: 12px; font-weight: 800; text-decoration: none; transition: background .2s, color .2s; }
        .contact-actions a.primary { border-color: #fff; background: #fff; color: #067e9e; }
        .contact-actions a:hover { background: #a5efff; border-color: #a5efff; color: #063f60; }

        .footer { position: relative; overflow: hidden; margin-top: 55px; background: #03384f; color: #fff; }
        .footer-background, .footer-overlay { position: absolute; inset: 0; pointer-events: none; }
        .footer-background { background: url("{{ asset('images/bg-dieng-home.jpg') }}") center bottom / cover no-repeat; opacity: .45; transform: scale(1.05); }
        .footer-overlay { background: linear-gradient(180deg, rgba(3, 48, 68, .95), rgba(2, 35, 49, .98)); }
        .footer-container { position: relative; z-index: 1; width: min(1300px, calc(100% - 40px)); margin: auto; padding: 60px 0 20px; }
        .footer-grid { display: grid; grid-template-columns: 1.6fr .8fr .8fr .8fr 1.4fr; gap: 45px; padding-bottom: 40px; border-bottom: 1px solid rgba(255, 255, 255, .12); }
        .footer-logo img { display: block; width: 180px; height: auto; }
        .footer-description { max-width: 300px; margin: 15px 0 0; color: rgba(255, 255, 255, .65); font-size: 11px; line-height: 1.8; }
        .footer-social { display: flex; gap: 8px; margin-top: 18px; }
        .footer-social a { width: 34px; height: 34px; display: grid; place-items: center; border-radius: 50%; background: rgba(255, 255, 255, .09); color: #fff; text-decoration: none; transition: .2s; }
        .footer-social a:hover { transform: translateY(-3px); background: var(--cyan); }
        .footer-column h3 { margin: 0 0 17px; font: 16px "Playfair Display", serif; }
        .footer-column a { display: block; width: fit-content; margin-bottom: 10px; color: rgba(255, 255, 255, .68); font-size: 11px; text-decoration: none; }
        .footer-column a:hover, .footer-bottom-links a:hover { color: #72e3fa; }
        .footer-newsletter-label { color: #72e3fa; font-size: 9px; font-weight: 800; letter-spacing: 1.5px; }
        .footer-newsletter h3 { max-width: 280px; margin: 8px 0 0; font: 700 22px/1.25 "Playfair Display", serif; }
        .footer-newsletter h3 span { color: var(--cyan); }
        .footer-newsletter p { max-width: 270px; margin: 10px 0 15px; color: rgba(255, 255, 255, .65); font-size: 11px; }
        .newsletter-form { display: flex; max-width: 290px; padding: 4px; border: 1px solid rgba(255, 255, 255, .18); border-radius: 12px; background: rgba(255, 255, 255, .08); }
        .newsletter-form input { width: 100%; min-width: 0; padding: 9px 10px; border: 0; outline: 0; background: transparent; color: #fff; font: 12px "DM Sans", sans-serif; }
        .newsletter-form input::placeholder { color: rgba(255, 255, 255, .58); }
        .newsletter-form button { width: 35px; height: 35px; flex-shrink: 0; border: 0; border-radius: 9px; background: var(--cyan); color: #fff; cursor: pointer; }
        .newsletter-feedback { margin: 10px 0 0; color: #a5efff; font-size: 11px; }
        .newsletter-feedback.error { color: #ffb4ab; }
        .footer-quote { padding: 35px 15px; text-align: center; }
        .footer-quote-mark { color: #08add5; font: 43px/25px "Playfair Display", serif; }
        .footer-quote p { max-width: 650px; margin: 5px auto 9px; font: italic 21px/1.5 "Playfair Display", serif; }
        .footer-quote small { color: rgba(255, 255, 255, .35); font-size: 7px; font-weight: 800; letter-spacing: 2px; }
        .footer-bottom { display: flex; align-items: center; justify-content: space-between; gap: 20px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 255, .12); color: rgba(255, 255, 255, .62); font-size: 10px; }
        .footer-bottom-links { display: flex; flex-wrap: wrap; gap: 17px; }
        .footer-bottom-links a { color: rgba(255, 255, 255, .68); text-decoration: none; }
        .footer-made strong { color: #72e3fa; }
        .footer-made i { margin-left: 4px; color: var(--cyan); }

        @media (max-width: 1050px) {
            .topbar-right { display: none; }
            .header-card { flex-wrap: wrap; gap: 8px 16px; }
            .main-nav { order: 3; width: 100%; justify-content: flex-start; }
            .account-actions { margin-left: auto; }
            .footer-grid { grid-template-columns: 1.5fr 1fr 1fr 1fr; }
            .footer-newsletter { grid-column: 1 / -1; }
        }
        @media (max-width: 650px) {
            .topbar-inner, .header-card, main, .footer-container { width: calc(100% - 24px); }
            .topbar-left { gap: 8px; }
            .topbar-item { font-size: 8px; }
            .topbar-item:last-child, .topbar-divider { display: none; }
            .header-card { padding: 10px; border-radius: 17px; }
            .brand img { width: 132px; }
            .account-actions { gap: 5px; }
            .account-actions a, .account-actions button { min-height: 34px; padding: 0 10px; font-size: 11px; }
            .account-actions .register-link { display: none; }
            .main-nav { overflow-x: auto; }
            .main-nav > a, .nav-dropdown summary { padding: 9px 10px; font-size: 11px; }
            .nav-dropdown-menu { left: auto; right: 0; }
            main { margin: 20px auto 48px; }
            .hero { min-height: 250px; padding: 30px 22px; border-radius: 22px; }
            .hero p:last-child { font-size: 14px; }
            .intro-card { width: calc(100% - 22px); margin-top: 14px; padding: 20px; border-radius: 16px; }
            .intro-card p { font-size: 13px; }
            .content-section { margin-top: 40px; }
            .values-grid { grid-template-columns: 1fr; gap: 13px; }
            .value-card { padding: 20px; }
            .value-card h3 { margin-top: 12px; font-size: 18px; }
            .reader-panel { grid-template-columns: 1fr; gap: 22px; margin-top: 32px; padding: 23px; }
            .contact-card { margin-top: 32px; padding: 27px 18px; }
            .footer-container { padding: 46px 0 20px; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 30px; }
            .footer-brand, .footer-newsletter { grid-column: 1 / -1; }
            .footer-bottom { align-items: center; flex-direction: column; text-align: center; }
            .footer-bottom-links { justify-content: center; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
@include('partials.site-theme-styles')

</head>
<body>
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
                <a href="{{ $siteSettings['instagram_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pemerintah Kabupaten Banjarnegara" title="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="{{ $siteSettings['facebook_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook Pemerintah Kabupaten Banjarnegara" title="Facebook"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a>
                <a href="{{ $siteSettings['youtube_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube Pemerintah Kabupaten Banjarnegara" title="YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                <a href="{{ $siteSettings['x_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="X Pemerintah Kabupaten Banjarnegara" title="X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="{{ $siteSettings['tiktok_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok Pemerintah Kabupaten Banjarnegara" title="TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
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

            <a href="{{ route('home') }}">
                Beranda
            </a>

            <a href="{{ route('articles.index') }}">
                Berita
            </a>

            <a href="{{ route('about') }}" class="active" aria-current="page">
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

    <main>
        <section class="hero" aria-labelledby="about-title">
            <div class="hero-content">
                <p class="eyebrow"><i class="fa-solid fa-water" aria-hidden="true"></i> Mengenal Derap Serayu</p>
                <h1 id="about-title">Tentang Derap Serayu</h1>
                <p>Ruang untuk mengenal Banjarnegara melalui informasi, gagasan, budaya, potensi, dan cerita masyarakatnya.</p>
            </div>
        </section>

        <section class="intro-card" aria-label="Profil Derap Serayu">
            <p><strong>Majalah Derap Serayu</strong> merupakan media publikasi berkala resmi milik Pemerintah Kabupaten (Pemkab) Banjarnegara. Media ini hadir sebagai sarana komunikasi publik, keterbukaan informasi, dan diseminasi kebijakan pembangunan daerah kepada masyarakat Banjarnegara.</p>
            <p>Sebelum ada media majalah "Derap Serayu" Pemkab Banjarnegara melalui Bagian Humas telah memiliki tabloid bulanan "Cakrawala" yang terbit sejak Agustus Tahun 2000 bertepatan dengan Hari Jadi Banjarnegara. Pelindung: Bupati Drs. H. Nurachmad, pemimpin redaksi: Drs. Suyatno M.Si selaku Kabag Humas.</p>
            <p>Setelah 2 tahun terbit, tabloid "Cakrawala" berganti nama menjadi "Derap Serayu" dalam format majalah pada bulan Agustus Tahun 2002. Nama "Derap Serayu" diambil dari Sungai Serayu-urat nadi geografis, ekonomi, dan simbol kehidupan masyarakat banjarnegara serta kawasan Banyumas Raya. Kata "Derap" menggambarkan ritme, dinamisme, serta langkah maju pembangunan daerah.</p>
            <p>Majalah ini lahir dari kebutuhan Pemkab Banjarnegara untuk memiliki media cetak mandiri yang mampu:
                <ul>
                    <li>Menyebarluaskan program prioritas bupati dan kebijakan pemerintah daerah ke tingkat kecamatan hingga desa.</li>
                    <li>Menjadi jembatan komunikasi timbal balik antara birokrasi dan warga.</li>
                    <li>Mendokumentasikan capaian pembangunan, potensi agribisnis, serta kebudayaan lokal Banjarnegara.</li>
                </ul>
            </p>
        </section>

        <section class="content-section" aria-labelledby="values-title">
            <div class="section-heading">
                <h2 id="values-title">Pengelolaan dan Struktur Redaksi</h2>
                <p>Derap Serayu mengelola kontennya melalui struktur redaksi yang terdiri dari Bagian Humas Setda, Dinas Komunikasi dan Informatika (Dinkominfo), dan Tim Redaksi yang bertugas memastikan kualitas informasi dan keberagaman rubrik.</p>
            </div>
            <div class="values-grid">
                <article class="value-card">
                    <div><i aria-hidden="true"></i></div>
                    <h3>Bagian Humas Setda (Awal Berdiri)</h3>
                    <p>Pada masa awal penerbitannya Tahun 2002, Derap Serayu dikelola di bawah koordinasi Bagian Hubungan Masyarakat (Humas) dan Protokol Sekretariat Daerah (Setda) Kabupaten Banjarnegara. Pelindung: Bupati Drs. H. Djasri MM MT dan Wakil Bupati Drs. H. Hadi Supeno M.SI, pemimpin redaksi: Drs. Suyatno M.Si yang dilanjutkan oleh Drs. Suprijanto selaku Kabag Humas.</p>
                </article>
                <article class="value-card">
                    <div><i aria-hidden="true"></i></div>
                    <h3>Dinas Komunikasi dan Informatika (Dinkominfo)</h3>
                    <p>Seiring restrukturisasi organisasi perangkat daerah (OPD) dan penerapan UU Keterbukaan Informasi Publik, pengelolaan majalah dan saluran publikasi daerah dialihkan ke Dinkominfo Kabupaten Banjarnegara pada 2016.</p>
                </article>
                <article class="value-card">
                    <div><i aria-hidden="true"></i></div>
                    <h3>Tim Redaksi</h3>
                    <p>Tim Redaksi terdiri atas pejabat humas/pranata humas, reporter dinas, serta kontributor tulisan dari jajaran OPD dan masyarakat umum.</p>
                </article>
            </div>
        </section>

        <section class="intro-card" aria-label="Profil Derap Serayu">
            <div>
                <h2 id="reader-title">Rubrikasi dan Karakteristik Konten</h2>
                <p>Sepanjang perjalanannya sebagai media cetak berkala, Derap Serayu memuat rubrik-rubrik unggulan seperti:</p>
                <ul>
                    <li>Laporan Utama (Fokus Utama): Mengupas program strategi Pemda (Infstruktur jalan, penanggulangan kemiskinan, ketahanan pangan, dan mitigasi bencana).</li>
                    <li>Potensi Daerah & Wisata: Liputan promosi pariwisata (seperti Dataran Tinggi Dieng, arung jeram Sungai Serayu, dan curug) serta komoditas unggulan (Kopi, salak pondoh, durian).</li>
                    <li>Lintas Serayu Kecamatan: Ragam inovasi pelayanan publik di tingkat satuan kerja perangkat daerah.</li>
                    <li>Seni Budaya, Olahraga, Profil, Derapsiana, dan sebagainya: Pengenalan kearifan lokal, batik tulis gumelem, kuliner khas (Dawet Ayu), dan tradisi Banjarnegara.</li>
                </ul>
            </div>
        </section>

        <section class="intro-card" aria-label="Profil Derap Serayu">
            <h2 id="contact-title">Transformasi ke Era Digital</h2>
            <p>Perubahan pola konsumsi media dari media cetak fisik ke media daring mendorong Pemkab Banjarnegara melakukan penyesuaian terhadap Derap Serayu:</p>
            <ul>
                <li>Digitalisasi Terbitan: Diterbitkan dalam format digital/e-magazine (PDF interaktif) agar lebih mudah diakses oleh publik melalui portal resmi daerah.</li>
                <li>Integrasi Portal Berita dan Medsos: Jenama Derap Serayu kini dikembangkan menjadi sub-portal berita digital (derapserayu.banjarnegarakab.go.id) dan berkolaborasi dengan platform media sosial resmi Pemkab untuk menyampaikan informasi terkini secara cepat.</li>
            </ul>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-background" aria-hidden="true"></div>
        <div class="footer-overlay" aria-hidden="true"></div>
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="footer-logo" aria-label="Derap Serayu, beranda">
                        <img src="{{ $siteLogoUrl }}" alt="{{ $siteSettings['site_name'] }}">
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
                    <div class="footer-social" aria-label="Media sosial Derap Serayu">
                        <a href="{{ $siteSettings['instagram_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                        <a href="{{ $siteSettings['facebook_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="{{ $siteSettings['youtube_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                        <a href="{{ $siteSettings['tiktok_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                        <a href="{{ $siteSettings['x_url'] }}" target="_blank" rel="noopener noreferrer" aria-label="X Pemerintah Kabupaten Banjarnegara"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Jelajahi</h3>
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('about') }}">Tentang Kami</a>
                    <a href="{{ route('articles.index') }}">Berita</a>
                    <a href="{{ route('galeri') }}">Galeri</a>
                </div>
                <div class="footer-column">
                    <h3>Informasi</h3>
                    <a href="{{ route('cerita') }}">Cerita &amp; Budaya</a>
                    <a href="{{ route('opini') }}">Opini</a>
                    <a href="{{ route('sosok') }}">Sosok</a>
                    <a href="{{ route('sudut-kota') }}">Sudut Kota</a>
                    <a href="{{ route('potensi') }}">Potensi</a>
                    <a href="{{ route('teknologi') }}">Teknologi</a>
                    <a href="{{ route('humor') }}">Humor</a>
                </div>
                <div class="footer-column">
                    <h3>Layanan</h3>
                    <a href="https://ppid.banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">PPID</a>
                    <a href="https://www.instagram.com/mpp.banjarnegara/" target="_blank" rel="noopener noreferrer">Layanan Publik</a>
                    <a href="https://banjarnegarakab.go.id/" target="_blank" rel="noopener noreferrer">Kontak</a>
                    <a href="{{ route('login') }}">Masuk</a>
                    <a href="{{ route('register.pembaca') }}">Daftar</a>
                </div>
                <div class="footer-newsletter">
                    <span class="footer-newsletter-label">TETAP TERHUBUNG</span>
                    <h3>Cerita Banjarnegara, <span>langsung ke kamu.</span></h3>
                    <p>Dapatkan informasi dan cerita terbaru seputar Banjarnegara.</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                        @csrf
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email kamu" aria-label="Alamat email untuk newsletter" autocomplete="email" maxlength="255" required>
                        <button type="submit" aria-label="Daftar newsletter"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                    </form>
                    @if (session('newsletterStatus'))
                        <p class="newsletter-feedback" role="status">{{ session('newsletterStatus') }}</p>
                    @endif
                    @error('email')
                        <p class="newsletter-feedback error" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="footer-quote">
                <div class="footer-quote-mark" aria-hidden="true">“</div>
                <p>{{ $siteSettings['footer_quote'] }}</p>
                <small>{{ mb_strtoupper($siteSettings['site_name']) }} — BANJARNEGARA</small>
            </div>
            <div class="footer-bottom">
                <div>© {{ date('Y') }} {{ $siteSettings['site_name'] }}. {{ $siteSettings['footer_copyright'] }}</div>
                <div class="footer-bottom-links">
                    <a href="{{ route('information.privacy') }}">Kebijakan Privasi</a>
                    <a href="{{ route('information.terms') }}">Syarat &amp; Ketentuan</a>
                    <a href="{{ route('information.editorial') }}">Pedoman Media Siber</a>
                </div>
                <div class="footer-made">Dibuat untuk <strong>Banjarnegara</strong> <i class="fa-solid fa-heart" aria-hidden="true"></i></div>
            </div>
        </div>
    </footer>
    <script>
        async function updateTopbarWeather() {
            const weatherIcon = document.getElementById("topWeatherIcon");
            const temperature = document.getElementById("topTemperature");
            const url = "https://api.open-meteo.com/v1/forecast?latitude=-7.2096&longitude=109.9156&current=temperature_2m,weather_code&timezone=Asia%2FJakarta";
            const weatherIcons = new Map([
                [0, "☀️"], [1, "🌤️"], [2, "⛅"], [3, "☁️"], [45, "🌫️"],
                [48, "🌫️"], [51, "🌦️"], [53, "🌦️"], [55, "🌧️"], [56, "🌧️"],
                [57, "🌧️"], [61, "🌧️"], [63, "🌧️"], [65, "🌧️"], [66, "🌧️"],
                [67, "🌧️"], [71, "🌨️"], [73, "🌨️"], [75, "❄️"], [77, "🌨️"],
                [80, "🌦️"], [81, "🌧️"], [82, "⛈️"], [85, "🌨️"], [86, "🌨️"],
                [95, "⛈️"], [96, "⛈️"], [99, "⛈️"],
            ]);

            try {
                const response = await fetch(url);

                if (!response.ok) {
                    throw new Error("Weather request failed");
                }

                const data = await response.json();
                const current = data.current;

                if (!current || !Number.isFinite(current.temperature_2m) || !Number.isFinite(current.weather_code)) {
                    throw new Error("Weather response is incomplete");
                }

                weatherIcon.textContent = weatherIcons.get(current.weather_code) || "🌤️";
                temperature.textContent = `${Math.round(current.temperature_2m)}°C`;
            } catch (error) {
                console.error("Unable to load topbar weather", error);
                weatherIcon.textContent = "❔";
                temperature.textContent = "--°C";
            }
        }

        updateTopbarWeather();
    </script>
</body>
</html>
