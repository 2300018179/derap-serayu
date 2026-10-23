<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profil Pembaca | Derap Serayu</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --navy: #0b405b;
            --navy-deep: #07364d;
            --cyan: #08afd0;
            --cyan-dark: #0789a8;
            --text: #174966;
            --muted: #7692a4;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
            width: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #dff6fb;
        }

        body,
        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        a {
            text-decoration: none;
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

        /* =========================
           TOP INFORMATION BAR
        ========================= */

        .profile-topbar {
            min-height: 38px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 8px 4%;
            background: #073c56;
            color: rgba(255, 255, 255, .9);
            font-size: 11px;
        }

        .topbar-left,
        .topbar-right {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .profile-topbar i {
            margin-right: 6px;
            color: #78e2f6;
        }

        .profile-topbar a {
            color: white;
        }

        /* =========================
           NAVIGATION
        ========================= */

        .profile-header {
            position: relative;
            z-index: 10;
            padding: 12px 0 0;
            background: linear-gradient(
                180deg,
                #bdeefa 0%,
                rgba(211, 246, 253, .94) 100%
            );
        }

        .profile-nav {
            width: calc(100% - 112px);
            max-width: 1800px;
            min-height: 82px;
            margin: 0 auto;
            padding: 15px 25px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;

            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 26px;
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 12px 35px rgba(31, 112, 142, .08);
            backdrop-filter: blur(15px);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 11px;
            flex-shrink: 0;
            color: var(--navy);
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: linear-gradient(145deg, #0dc1df, #087e9e);
            color: white;
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            font-weight: 800;
            box-shadow: 0 7px 20px rgba(8, 175, 208, .23);
        }

        .brand-name {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -.7px;
            line-height: 1.1;
        }

        .brand-caption {
            display: block;
            margin-top: 5px;
            color: var(--muted);
            font-size: 9px;
            letter-spacing: 1.1px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .nav-links a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 16px;
            border-radius: 30px;
            color: var(--navy);
            font-size: 12px;
            font-weight: 700;
            transition: .2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: var(--cyan);
            color: white;
            box-shadow: 0 7px 18px rgba(8, 175, 208, .2);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-button {
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0 17px;
            border: 1px solid #d8edf5;
            border-radius: 28px;
            background: white;
            color: var(--navy);
            font-size: 12px;
            font-weight: 800;
            transition: .2s;
        }

        .nav-button:hover {
            transform: translateY(-2px);
        }

        .nav-button.primary {
            border-color: var(--cyan);
            background: var(--cyan);
            color: white;
        }

        /* =========================
           PAGE BACKGROUND
        ========================= */

        .profile-page {
            position: relative;
            isolation: isolate;
            width: 100%;
            flex: 1 0 auto;
            min-height: 650px;
            margin: 0;
            overflow: hidden;
            padding: 44px 0 65px;
            box-sizing: border-box;
            overflow: hidden;

            background:
                radial-gradient(
                    ellipse at 0% 15%,
                    rgba(52, 211, 239, .28),
                    transparent 30%
                ),
                radial-gradient(
                    ellipse at 100% 45%,
                    rgba(77, 211, 237, .24),
                    transparent 36%
                ),
                linear-gradient(
                    180deg,
                    #bceef8 0%,
                    #d9f5fb 38%,
                    #e9f9fd 72%,
                    #d9f5fb 100%
                );
        }

        .nature-glow {
            position: absolute;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
        }

        .glow-one {
            top: 100px;
            left: -210px;
            background: rgba(19, 193, 226, .3);
        }

        .glow-two {
            top: 410px;
            right: -200px;
            background: rgba(63, 188, 219, .2);
        }

        .profile-container {
            position: relative;
            z-index: 1;
            width: calc(100% - 80px);
            max-width: 1600px;
            margin: 0 auto;
        }

        /* =========================
           WELCOME BANNER
        ========================= */

        .profile-welcome {
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

        .welcome-content {
            position: relative;
            z-index: 2;
            max-width: 780px;
        }

        .welcome-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 15px;
            color: #8ceafa;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .welcome-eyebrow i {
            font-size: 12px;
        }

        .profile-welcome h1 {
            margin: 0;
            color: white;
            font-family: 'Playfair Display', serif;
            font-size: clamp(35px, 3.5vw, 52px);
            line-height: 1.12;
            letter-spacing: -.8px;
        }

        .profile-welcome h1 span {
            color: #85e6f8;
            font-style: italic;
        }

        .profile-welcome p {
            max-width: 600px;
            margin: 15px 0 0;
            color: rgba(255, 255, 255, .83);
            font-size: 13px;
            line-height: 1.9;
        }

        .welcome-icon {
            width: 120px;
            height: 120px;
            display: grid;
            place-items: center;
            flex-shrink: 0;

            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            color: #b3f3ff;
            font-size: 48px;
            backdrop-filter: blur(8px);
            box-shadow: 0 0 50px rgba(93, 226, 250, .12);
        }

        /* =========================
           SECTION HEADING
        ========================= */

        .profile-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin: 40px 0 22px;
        }

        .section-eyebrow {
            display: block;
            margin-bottom: 10px;
            color: var(--cyan-dark);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2.2px;
        }

        .profile-heading h2 {
            margin: 0;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: clamp(30px, 3vw, 39px);
            letter-spacing: -.7px;
        }

        .profile-heading p {
            max-width: 480px;
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        /* =========================
           PROFILE LAYOUT
        ========================= */

        .profile-layout {
            display: grid;
            grid-template-columns: minmax(270px, .78fr) minmax(0, 2fr);
            align-items: stretch;
            gap: 24px;
        }

        .profile-summary,
        .profile-information,
        .profile-stat-card {
            border: 1px solid rgba(255, 255, 255, .95);
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 12px 35px rgba(24, 99, 128, .07);
            backdrop-filter: blur(12px);
        }

        /* PROFILE SUMMARY */

        .profile-summary {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            overflow: hidden;
            padding: 35px 25px;
            border-radius: 23px;
        }

        .summary-glow {
            position: absolute;
            top: -100px;
            width: 220px;
            height: 180px;
            border-radius: 50%;
            background: rgba(24, 194, 224, .15);
            filter: blur(50px);
        }

        .avatar-ring {
            position: relative;
            width: 112px;
            height: 112px;
            display: grid;
            place-items: center;
            margin-bottom: 20px;
            padding: 5px;
            border-radius: 50%;
            background: linear-gradient(145deg, #10c2e1, #0c6687);
            box-shadow: 0 12px 28px rgba(8, 175, 208, .19);
        }

        .avatar {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            overflow: hidden;
            border: 4px solid white;
            border-radius: 50%;
            background: #e3f8fc;
            color: var(--cyan-dark);
            font-family: 'Playfair Display', serif;
            font-size: 43px;
            font-weight: 700;
        }

        .summary-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            border-radius: 30px;
            background: #e8f9fc;
            color: #0789a8;
            font-size: 10px;
            font-weight: 800;
        }

        .summary-badge i {
            font-size: 10px;
        }

        .profile-summary h3 {
            margin: 17px 0 5px;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            overflow-wrap: anywhere;
        }

        .profile-summary .username {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .summary-divider {
            width: 100%;
            height: 1px;
            margin: 24px 0;
            background: #e5f0f5;
        }

        .summary-caption {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .summary-actions {
            display: grid;
            gap: 10px;
            width: 100%;
            margin-top: auto;
        }

        .action-button {
            min-height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 15px;
            border: 1px solid transparent;
            border-radius: 12px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .2s, box-shadow .2s, background .2s;
        }

        .action-button:hover {
            transform: translateY(-2px);
        }

        .action-primary {
            background: linear-gradient(120deg, #0abbd9, #079dbf);
            color: white;
            box-shadow: 0 7px 20px rgba(8, 175, 208, .16);
        }

        .action-primary:hover {
            box-shadow: 0 10px 25px rgba(8, 175, 208, .27);
        }

        .action-secondary {
            border-color: #dceef5;
            background: white;
            color: var(--navy);
        }

        .action-secondary:hover {
            background: #f3fbfd;
        }

        /* INFORMATION CARD */

        .profile-information {
            min-width: 0;
            padding: 32px;
            border-radius: 23px;
        }

        .information-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .information-title h3 {
            margin: 0;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 25px;
        }

        .information-title span {
            color: var(--muted);
            font-size: 11px;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .detail {
            position: relative;
            min-width: 0;
            min-height: 112px;
            padding: 20px;
            overflow: hidden;

            border: 1px solid #e9f4f8;
            border-radius: 15px;
            background: linear-gradient(145deg, #f8fcfe, #eff9fc);
            transition: transform .2s, border-color .2s;
        }

        .detail:hover {
            transform: translateY(-2px);
            border-color: #b9e9f4;
        }

        .detail-label {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 12px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
        }

        .detail-label i {
            color: var(--cyan-dark);
            font-size: 13px;
        }

        .detail-value {
            display: block;
            color: var(--navy);
            font-size: 14px;
            font-weight: 800;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .saved-count {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .saved-number {
            color: var(--cyan-dark);
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            line-height: 1;
        }

        .saved-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #dff7fc;
            color: var(--cyan-dark);
            font-size: 15px;
        }

        /* SECURITY NOTE */

        .profile-note {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            margin-top: 22px;
            padding: 17px 20px;
            border: 1px solid #d9eef5;
            border-radius: 14px;
            background: rgba(255, 255, 255, .65);
        }

        .profile-note > i {
            margin-top: 3px;
            color: var(--cyan-dark);
            font-size: 16px;
        }

        .profile-note strong {
            display: block;
            margin-bottom: 4px;
            color: var(--navy);
            font-size: 12px;
        }

        .profile-note p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

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


        /* =========================
           RESPONSIVE
        ========================= */

        @media (min-width: 1600px) {
            .profile-container,
            .footer-main,
            .footer-bottom {
                max-width: 1700px;
            }

            .profile-welcome {
                min-height: 260px;
            }

            .profile-information {
                padding: 40px;
            }

            .detail {
                min-height: 125px;
                padding: 24px;
            }
        }

        @media (max-width: 1200px) {
            .profile-nav,
            .profile-container,
            .footer-main,
            .footer-bottom {
                width: calc(100% - 48px);
            }

            .profile-layout {
                grid-template-columns: minmax(240px, .8fr) minmax(0, 1.6fr);
                gap: 18px;
            }

            .profile-information {
                padding: 24px;
            }

            .nav-links {
                gap: 0;
            }

            .nav-links a {
                padding: 12px 10px;
                font-size: 11px;
            }

            .brand-name {
                font-size: 20px;
            }
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

        @media (max-width: 900px) {
            .profile-topbar {
                padding-inline: 24px;
            }

            .topbar-right {
                display: none;
            }

            .profile-nav {
                min-height: 72px;
                padding: 13px 18px;
                border-radius: 20px;
            }

            .nav-links {
                display: none;
            }

            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-summary {
                display: grid;
                grid-template-columns: auto minmax(0, 1fr);
                column-gap: 22px;
                text-align: left;
                align-items: center;
                padding: 26px;
            }

            .avatar-ring {
                grid-row: span 3;
                width: 95px;
                height: 95px;
                margin: 0;
            }

            .profile-summary h3 {
                margin: 0 0 6px;
            }

            .profile-summary .username {
                margin-bottom: 10px;
            }

            .summary-divider,
            .summary-caption {
                display: none;
            }

            .summary-badge {
                width: fit-content;
            }

            .summary-actions {
                grid-column: 1 / -1;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                margin-top: 22px;
            }

            .footer-main {
                grid-template-columns: 1fr 1fr;
                gap: 35px;
            }

            .footer-brand-column {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 600px) {
            .profile-topbar {
                min-height: 34px;
                padding-inline: 17px;
                font-size: 10px;
            }

            .profile-header {
                padding-top: 9px;
            }

            .profile-nav {
                width: calc(100% - 24px);
                min-height: 66px;
                padding: 10px 13px;
                border-radius: 17px;
            }

            .brand-icon {
                width: 38px;
                height: 38px;
                border-radius: 12px;
                font-size: 23px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-caption {
                font-size: 8px;
            }

            .nav-button {
                min-height: 39px;
                padding: 0 12px;
                font-size: 10px;
            }

            .nav-button i {
                margin-right: 0;
            }

            .profile-page {
                padding: 23px 0 48px;
            }

            .profile-container {
                width: calc(100% - 28px);
            }

            .profile-welcome {
                min-height: 300px;
                align-items: flex-start;
                padding: 32px 24px;
                border-radius: 21px;
                background-position: 60% center;
            }

            .profile-welcome h1 {
                font-size: 37px;
            }

            .profile-welcome p {
                font-size: 12px;
            }

            .welcome-icon {
                position: absolute;
                right: 17px;
                bottom: 17px;
                width: 56px;
                height: 56px;
                border-radius: 18px;
                font-size: 23px;
            }

            .profile-heading {
                display: block;
                margin: 33px 0 18px;
            }

            .profile-heading h2 {
                font-size: 31px;
            }

            .profile-heading p {
                margin-top: 12px;
            }

            .profile-summary {
                padding: 22px 18px;
                column-gap: 15px;
                border-radius: 19px;
            }

            .avatar-ring {
                width: 76px;
                height: 76px;
            }

            .avatar {
                font-size: 31px;
            }

            .profile-summary h3 {
                font-size: 19px;
            }

            .profile-summary .username {
                font-size: 11px;
            }

            .summary-badge {
                padding: 6px 9px;
                font-size: 9px;
            }

            .summary-actions {
                gap: 8px;
            }

            .action-button {
                min-height: 43px;
                padding: 10px;
                font-size: 10px;
            }

            .profile-information {
                padding: 20px 16px;
                border-radius: 19px;
            }

            .information-title {
                align-items: flex-start;
                flex-direction: column;
                gap: 6px;
                margin-bottom: 18px;
            }

            .information-title h3 {
                font-size: 23px;
            }

            .details {
                grid-template-columns: 1fr;
                gap: 11px;
            }

            .detail {
                min-height: 94px;
                padding: 16px;
            }

            .detail-value {
                font-size: 13px;
            }

            .profile-note {
                padding: 15px;
            }

            .footer-main,
            .footer-bottom {
                width: calc(100% - 36px);
            }

            .footer-main {
                grid-template-columns: 1fr 1fr;
                gap: 25px 15px;
                padding: 35px 0 28px;
            }

            .footer-brand-column {
                grid-column: 1 / -1;
            }

            .footer-column h4 {
                font-size: 16px;
            }

            .footer-links a {
                font-size: 11px;
            }

            .footer-bottom {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
            }
        }

        
/* =========================================
   PERBAIKAN NAVBAR PROFIL PEMBACA
========================================= */

.header-card {
    width: min(1400px, calc(100% - 64px));
    min-height: 82px;
    margin: 14px auto 0;
    padding: 12px 22px;
    gap: 18px;
    border-radius: 22px;
    position: relative;
    z-index: 100;
}

.logo-area {
    min-width: 0;
}

.logo-area img {
    display: block;
    width: clamp(135px, 13vw, 180px);
    max-height: 58px;
    object-fit: contain;
    object-position: left center;
}

.main-nav {
    min-width: 0;
    flex-wrap: wrap;
}

.main-nav a,
.nav-dropdown summary {
    font-size: 11px;
}

.search-area {
    width: clamp(160px, 18vw, 230px);
}

.search-box {
    width: 100%;
    min-width: 0;
}

.search-error {
    margin: 6px 0 0 8px;
    color: #c0392b;
    font-size: 11px;
}

.account-actions {
    max-width: 220px;
}

.account-menu summary span {
    max-width: 100px;
}

/* Tablet */
@media (max-width: 1100px) {
    .header-card {
        width: calc(100% - 36px);
        flex-wrap: wrap;
        gap: 12px;
    }

    .main-nav {
        order: 4;
        flex-basis: 100%;
        justify-content: flex-start;
    }

    .search-area {
        margin-left: auto;
        width: min(250px, 28vw);
    }
}

/* Mobile */
@media (max-width: 700px) {
    .topbar {
        height: auto;
        min-height: 38px;
    }

    .topbar-inner {
        width: calc(100% - 28px);
        min-height: 38px;
        font-size: 10px;
    }

    .topbar-right {
        display: none;
    }

    .topbar-left {
        gap: 10px;
        flex-wrap: wrap;
    }

    .header-card {
        width: calc(100% - 24px);
        min-height: 68px;
        margin-top: 10px;
        padding: 10px 13px;
        gap: 10px;
        border-radius: 17px;
    }

    .logo-area img {
        width: 135px;
        max-height: 46px;
    }

    .search-area {
        order: 5;
        flex-basis: 100%;
        width: 100%;
        margin: 0;
    }

    .search-box {
        height: 40px;
    }

    .account-actions {
        margin-left: auto;
        max-width: calc(100% - 190px);
    }

    .account-actions a,
    .account-menu summary {
        min-height: 38px;
        padding: 0 10px;
        font-size: 10px;
    }

    .account-menu summary span {
        max-width: 65px;
    }

    .menu-button {
        display: inline-grid;
        place-items: center;
        width: 39px;
        height: 39px;
        font-size: 15px;
    }

    .main-nav {
        display: none;
        order: 6;
        flex-basis: 100%;
        align-items: stretch;
        flex-direction: column;
        gap: 4px;
        padding: 10px;
        border: 1px solid #e3f0f5;
        border-radius: 15px;
        background: white;
        box-shadow: 0 12px 30px rgba(7, 63, 94, .10);
    }

    .main-nav.is-open {
        display: flex;
    }

    .main-nav > a,
    .nav-dropdown summary {
        display: flex;
        width: 100%;
        padding: 12px;
        justify-content: flex-start;
        border-radius: 10px;
    }

    .nav-dropdown-menu {
        position: static;
        min-width: 0;
        margin-top: 5px;
        box-shadow: none;
        border-radius: 10px;
        background: #f4fbfd;
    }

    .nav-dropdown-menu a {
        white-space: normal;
    }

    .account-menu .account-dropdown {
        right: 0;
        max-width: calc(100vw - 32px);
    }
}

/* Perbaikan footer responsif */
@media (max-width: 900px) {
    .footer-container {
        width: calc(100% - 48px);
    }

    .footer-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 30px 24px;
    }

    .footer-brand,
    .footer-newsletter {
        grid-column: 1 / -1;
    }
}

@media (max-width: 600px) {
    .footer-container {
        width: calc(100% - 32px);
        padding-top: 38px;
    }

    .footer-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 25px 16px;
    }

    .footer-logo img {
        width: 155px;
        max-width: 100%;
    }

    .footer-description {
        font-size: 11px;
    }

    .footer-column a,
    .footer-column span {
        font-size: 11px;
        line-height: 1.6;
    }

    .footer-newsletter {
        min-width: 0;
    }

    .newsletter-form {
        max-width: 100%;
    }

    .footer-quote p {
        font-size: 18px;
    }

    .footer-bottom {
        align-items: flex-start;
        flex-direction: column;
        font-size: 10px;
        line-height: 1.8;
    }

    .footer-bottom-links {
        flex-wrap: wrap;
        gap: 10px 16px;
    }
}


/* =====================================================
   FIX BACKGROUND FULL PAGE - PROFIL PEMBACA
   DERAP SERAYU | DIENG NATURE GLOW
===================================================== */

/* Dasar halaman memenuhi tinggi layar */
html {
    min-height: 100%;
    width: 100%;
    scroll-behavior: smooth;
}

body {
    width: 100%;
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;

    color: var(--text);
    font-family: 'DM Sans', sans-serif;

    background: #eaf8fc;
}

/* Topbar dan navbar tidak menyusut */
.topbar,
.profile-header,
.header-card {
    flex-shrink: 0;
}

/* Navbar yang benar-benar digunakan pada HTML */
.header-card {
    width: min(1400px, calc(100% - 64px));
    min-height: 82px;
    box-sizing: border-box;
}

/* Background utama memenuhi lebar dan tinggi konten */
.profile-page {
    position: relative;

    flex: 1 0 auto;
    width: 100%;
    min-width: 0;
    min-height: 650px;

    box-sizing: border-box;
    overflow: hidden;

    padding: 42px 0 65px;

    background:
        radial-gradient(
            ellipse at 5% 12%,
            rgba(52, 211, 239, 0.30) 0%,
            transparent 34%
        ),
        radial-gradient(
            ellipse at 95% 32%,
            rgba(95, 221, 241, 0.25) 0%,
            transparent 32%
        ),
        radial-gradient(
            ellipse at 48% 100%,
            rgba(255, 255, 255, 0.78) 0%,
            transparent 48%
        ),
        linear-gradient(
            180deg,
            #bdeef8 0%,
            #d9f5fb 32%,
            #eaf9fd 68%,
            #f5fbfd 100%
        );
}

/* Pastikan elemen dekoratif tidak menutupi isi */
.nature-glow {
    position: absolute;
    z-index: 0;
    pointer-events: none;
    border-radius: 50%;
    filter: blur(90px);
}

.glow-one {
    top: 100px;
    left: -180px;
    width: 340px;
    height: 340px;
    background: rgba(8, 175, 208, 0.22);
}

.glow-two {
    top: 430px;
    right: -180px;
    width: 340px;
    height: 340px;
    background: rgba(67, 194, 221, 0.20);
}

/* Konten profil tetap berada di atas background */
.profile-container {
    position: relative;
    z-index: 1;

    width: calc(100% - 80px);
    max-width: 1600px;

    margin: 0 auto;
}

/* Hero banner tetap tajam dan memenuhi area */
.profile-welcome {
    width: 100%;
    box-sizing: border-box;

    background:
        linear-gradient(
            100deg,
            rgba(4, 49, 70, 0.93) 0%,
            rgba(5, 75, 101, 0.78) 58%,
            rgba(5, 75, 101, 0.40) 100%
        ),
        url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=2000&q=90')
        center 48% / cover no-repeat;
}

/* Kartu profil tetap putih dan kontras */
.profile-summary,
.profile-information {
    background: rgba(255, 255, 255, 0.91);
    border: 1px solid rgba(255, 255, 255, 0.98);
    box-shadow: 0 14px 38px rgba(16, 79, 105, 0.08);
}

/* Hilangkan jarak footer yang membuat halaman terkesan terputus */
.footer {
    position: relative;
    flex-shrink: 0;
    width: 100%;
    margin-top: 0;
    box-sizing: border-box;
    background: #03384f;
}

/* Pastikan isi footer tidak melebar keluar layar */
.footer-container {
    width: min(1300px, calc(100% - 64px));
    margin-inline: auto;
    box-sizing: border-box;
}

.footer-grid {
    grid-template-columns:
        minmax(0, 1.6fr)
        minmax(0, 0.8fr)
        minmax(0, 0.8fr)
        minmax(0, 0.8fr)
        minmax(0, 1.4fr);
}

/* Layar lebar */
@media (min-width: 1600px) {
    .profile-container {
        width: calc(100% - 100px);
    }

    .profile-page {
        padding-top: 48px;
        padding-bottom: 75px;
    }
}

/* Tablet */
@media (max-width: 1100px) {
    .profile-container {
        width: calc(100% - 48px);
    }

    .footer-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .footer-brand,
    .footer-newsletter {
        grid-column: 1 / -1;
    }
}

/* Ponsel */
@media (max-width: 600px) {
    .profile-page {
        min-height: 0;
        padding: 25px 0 45px;
    }

    .profile-container {
        width: calc(100% - 28px);
    }

    .header-card {
        width: calc(100% - 24px);
    }

    .profile-welcome {
        width: 100%;
    }

    .footer-container {
        width: calc(100% - 32px);
    }

    .footer-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 25px 16px;
    }

    .footer-bottom {
        flex-wrap: wrap;
    }
}


    </style>
</head>

<body>

    {{-- TOPBAR --}}
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

    {{-- NAVBAR --}}
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

    {{-- MAIN PAGE --}}
    <main class="profile-page">
        <div class="nature-glow glow-one"></div>
        <div class="nature-glow glow-two"></div>

        <div class="profile-container">

            {{-- WELCOME HERO --}}
            <section class="profile-welcome">
                <div class="welcome-content">
                    <span class="welcome-eyebrow">
                        <i class="fa-solid fa-sparkles"></i>
                        RUANG PERSONAL PEMBACA
                    </span>

                    <h1>
                        Selamat datang,<br>
                        <span>{{ $reader->name }}.</span>
                    </h1>

                    <p>
                        Semua cerita yang kamu simpan, informasi akun,
                        dan perjalanan membaca kamu ada di satu tempat.
                        Selamat menjelajahi cerita dari Banjarnegara.
                    </p>
                </div>

                <div class="welcome-icon" aria-hidden="true">
                    <i class="fa-solid fa-book-open-reader"></i>
                </div>
            </section>

            {{-- HEADING --}}
            <section class="profile-heading">
                <div>
                    <span class="section-eyebrow">AKUN PEMBACA</span>
                    <h2>Profil Saya</h2>
                </div>

                <p>
                    Kelola informasi akun dan temukan kembali artikel
                    yang menarik perhatianmu.
                </p>
            </section>

            {{-- PROFILE CONTENT --}}
            <section class="profile-layout" id="informasi-profil">

                {{-- LEFT PROFILE SUMMARY --}}
                <aside class="profile-summary">
                    <div class="summary-glow"></div>

                    <div class="avatar-ring">
                        <div class="avatar">
                            {{ mb_strtoupper(mb_substr($reader->name ?? 'P', 0, 1)) }}
                        </div>
                    </div>

                    <span class="summary-badge">
                        <i class="fa-solid fa-circle-check"></i>
                        Akun Pembaca
                    </span>

                    <h3>{{ $reader->name }}</h3>

                    <p class="username">
                        @if ($reader->username)
                            {{ '@' . $reader->username }}
                        @else
                            Username belum diatur
                        @endif
                    </p>

                    <div class="summary-divider"></div>

                    <p class="summary-caption">
                        Terus temukan perspektif baru melalui cerita,
                        budaya, dan informasi dari tanah Serayu.
                    </p>

                    <div class="summary-actions">
                        <a href="{{ route('pembaca.saved.index') }}"
                           class="action-button action-primary">
                            <i class="fa-regular fa-bookmark"></i>
                            Artikel Tersimpan
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                    class="action-button action-secondary"
                                    style="width:100%">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Keluar dari Akun
                            </button>
                        </form>
                    </div>
                </aside>

                {{-- RIGHT PROFILE INFORMATION --}}
                <div>
                    <section class="profile-information">
                        <div class="information-title">
                            <h3>Informasi Akun</h3>
                            <span>Detail profil pembaca</span>
                        </div>

                        <div class="details">

                            <div class="detail">
                                <span class="detail-label">
                                    <i class="fa-regular fa-user"></i>
                                    Nama Lengkap
                                </span>

                                <span class="detail-value">
                                    {{ $reader->name }}
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    <i class="fa-solid fa-at"></i>
                                    Username
                                </span>

                                <span class="detail-value">
                                    {{ $reader->username ?: 'Belum diatur' }}
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    <i class="fa-regular fa-envelope"></i>
                                    Alamat Email
                                </span>

                                <span class="detail-value">
                                    {{ $reader->email }}
                                </span>
                            </div>

                            <div class="detail">
                                <span class="detail-label">
                                    <i class="fa-regular fa-bookmark"></i>
                                    Artikel Tersimpan
                                </span>

                                <div class="saved-count">
                                    <span class="saved-number">
                                        {{ $savedArticleCount }}
                                    </span>

                                    <span class="saved-icon">
                                        <i class="fa-solid fa-book-open"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </section>

                    <div class="profile-note">
                        <i class="fa-solid fa-shield-halved"></i>

                        <div>
                            <strong>Informasi akun kamu</strong>
                            <p>
                                Informasi ini ditampilkan untuk membantu
                                kamu mengenali akun yang sedang digunakan.
                                Jaga kerahasiaan akses akunmu.
                            </p>
                        </div>
                    </div>
                </div>

            </section>
        </div>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    /* =====================================
       MENU NAVIGASI MOBILE
    ===================================== */
    const menuButton = document.querySelector('.menu-button');
    const mainNavigation = document.getElementById('mainNavigation');

    if (menuButton && mainNavigation) {
        menuButton.addEventListener('click', function () {
            const isOpen = mainNavigation.classList.toggle('is-open');

            menuButton.setAttribute('aria-expanded', String(isOpen));
            menuButton.setAttribute(
                'aria-label',
                isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi'
            );

            const icon = menuButton.querySelector('i');

            if (icon) {
                icon.classList.toggle('fa-bars', !isOpen);
                icon.classList.toggle('fa-xmark', isOpen);
            }
        });

        document.addEventListener('click', function (event) {
            if (
                !mainNavigation.contains(event.target) &&
                !menuButton.contains(event.target)
            ) {
                mainNavigation.classList.remove('is-open');
                menuButton.setAttribute('aria-expanded', 'false');
                menuButton.setAttribute('aria-label', 'Buka menu navigasi');

                const icon = menuButton.querySelector('i');

                if (icon) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                }
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                mainNavigation.classList.remove('is-open');
                menuButton.setAttribute('aria-expanded', 'false');
                menuButton.setAttribute('aria-label', 'Buka menu navigasi');

                const icon = menuButton.querySelector('i');

                if (icon) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                }
            }
        });
    }

    /* =====================================
       CUACA BANJARNEGARA
    ===================================== */
    async function loadProfileWeather() {
        const temperature = document.getElementById('topTemperature');
        const weatherIcon = document.getElementById('topWeatherIcon');

        if (!temperature || !weatherIcon) return;

        const weatherMap = {
            0: ['Cerah', '☀️'],
            1: ['Cerah berawan', '🌤️'],
            2: ['Berawan sebagian', '⛅'],
            3: ['Berawan', '☁️'],
            45: ['Berkabut', '🌫️'],
            48: ['Kabut tebal', '🌫️'],
            51: ['Gerimis ringan', '🌦️'],
            53: ['Gerimis', '🌦️'],
            55: ['Gerimis lebat', '🌧️'],
            61: ['Hujan ringan', '🌧️'],
            63: ['Hujan sedang', '🌧️'],
            65: ['Hujan lebat', '🌧️'],
            71: ['Salju ringan', '❄️'],
            73: ['Salju', '❄️'],
            75: ['Salju lebat', '❄️'],
            80: ['Hujan lokal', '🌦️'],
            81: ['Hujan lokal', '🌧️'],
            82: ['Hujan lokal lebat', '🌧️'],
            95: ['Badai petir', '⛈️'],
            96: ['Badai petir', '⛈️'],
            99: ['Badai petir kuat', '⛈️']
        };

        temperature.textContent = 'Memuat...';

        try {
            const url = new URL('https://api.open-meteo.com/v1/forecast');

            url.search = new URLSearchParams({
                latitude: '-7.396',
                longitude: '109.691',
                current: 'temperature_2m,weather_code',
                timezone: 'Asia/Jakarta'
            }).toString();

            const response = await fetch(url.toString());

            if (!response.ok) {
                throw new Error('Data cuaca gagal dimuat');
            }

            const data = await response.json();
            const current = data.current;

            if (
                !current ||
                typeof current.temperature_2m !== 'number'
            ) {
                throw new Error('Data cuaca tidak valid');
            }

            const weather = weatherMap[current.weather_code] || [
                'Kondisi cuaca',
                '🌤️'
            ];

            temperature.textContent =
                Math.round(current.temperature_2m) + '°C';

            weatherIcon.textContent = weather[1];
            weatherIcon.title = weather[0];
            weatherIcon.setAttribute(
                'aria-label',
                'Cuaca Banjarnegara: ' + weather[0]
            );
        } catch (error) {
            console.error('Gagal mengambil cuaca:', error);

            temperature.textContent = '--°C';
            weatherIcon.textContent = '☁️';
            weatherIcon.title = 'Cuaca tidak tersedia';
        }
    }

    loadProfileWeather();

    // Perbarui cuaca setiap 10 menit.
    window.setInterval(loadProfileWeather, 10 * 60 * 1000);
});
</script>
</body>
</html>
