
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $article->title }} | Derap Serayu</title>
    <meta name="description" content="{{ $article->summary }}">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --navy: #07394d;
            --navy-dark: #042d40;
            --cyan: #08afd0;
            --cyan-dark: #078aa9;
            --text: #173f59;
            --muted: #718da2;
            --surface: rgba(255, 255, 255, .91);
            --line: rgba(8, 92, 120, .11);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            line-height: 1.8;
            background:
                radial-gradient(ellipse at 8% 8%, rgba(104, 222, 245, .34), transparent 32%),
                radial-gradient(ellipse at 94% 36%, rgba(111, 205, 226, .22), transparent 30%),
                linear-gradient(145deg, #e6f8fd 0%, #f5fbfd 48%, #e9f5f9 100%);
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        /* TOP BAR */

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

        /* NAVIGATION */

        .navbar-wrap {
            max-width: 1450px;
            margin: 0 auto;
            padding: 12px 28px 0;
        }

        .navbar {
            min-height: 82px;
            padding: 12px 22px;
            border: 1px solid rgba(255,255,255,.95);
            border-radius: 27px;
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(18px);
            box-shadow: 0 12px 35px rgba(12, 79, 103, .07);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.9px;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            color: white;
            background: linear-gradient(145deg, #08738b, #08b8d3);
            border-radius: 15px 6px 15px 6px;
            box-shadow: 0 6px 16px rgba(8, 175, 208, .2);
            font-family: 'DM Sans', sans-serif;
            font-size: 23px;
            font-weight: 800;
        }

        .brand-text small {
            display: block;
            margin-top: -5px;
            color: #72909e;
            font-family: 'DM Sans', sans-serif;
            font-size: 8px;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .nav-links a {
            padding: 11px 16px;
            border-radius: 25px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s ease;
        }

        .nav-links a:hover {
            color: var(--cyan-dark);
            background: #e7f9fd;
        }

        .nav-links .nav-active {
            color: white;
            background: linear-gradient(135deg, #08b8d8, #079cc0);
            box-shadow: 0 7px 17px rgba(8, 175, 208, .23);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 230px;
            padding: 12px 15px;
            border-radius: 30px;
            background: #eff7fa;
            color: #7a9aaa;
        }

        .search-box i {
            color: #618ca1;
        }

        .search-box input {
            min-width: 0;
            width: 100%;
            border: none;
            outline: none;
            color: var(--text);
            background: transparent;
            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #91a9b6;
        }

        .account-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 15px;
            border: 1px solid #deedf3;
            border-radius: 30px;
            background: white;
            color: var(--navy);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .account-link:hover {
            border-color: var(--cyan);
        }


        /* ARTICLE HEADER */

        .article-container {
            max-width: 1320px;
            margin: 24px auto 0;
            padding: 0 28px;
        }

        .article-heading {
            max-width: 970px;
            margin: 0 auto;
        }

        .category-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 13px;
            border: 1px solid rgba(8, 175, 208, .18);
            border-radius: 30px;
            background: rgba(255, 255, 255, .72);
            color: var(--cyan-dark);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .category-label i {
            font-size: 10px;
        }

        h1 {
            max-width: 1000px;
            margin: 22px 0 18px;
            color: #0a405e;
            font-family: 'Playfair Display', serif;
            font-size: clamp(34px, 4.4vw, 60px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1.5px;
            overflow-wrap: anywhere;
        }

        .article-summary {
            max-width: 850px;
            margin: 0 0 22px;
            color: #64859c;
            font-size: clamp(15px, 1.6vw, 19px);
            line-height: 1.85;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px 20px;
            color: #7895a8;
            font-size: 12px;
        }

        .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .meta-item i {
            color: var(--cyan-dark);
        }

        .author-avatar {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 50%;
            color: white;
            background: linear-gradient(135deg, #08718b, #16c2d8);
            font-size: 13px;
        }

        .author-info {
            display: flex;
            flex-direction: column;
            line-height: 1.5;
        }

        .author-info strong {
            color: var(--navy);
            font-size: 12px;
        }

        .author-info span {
            color: #91a6b3;
            font-size: 10px;
        }

        /* ACTIONS */

        .article-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 11px;
            margin: 24px 0;
        }

        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 43px;
            padding: 11px 17px;
            border: 1px solid rgba(8, 175, 208, .5);
            border-radius: 13px;
            background: rgba(255, 255, 255, .85);
            color: #0787a5;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .action-button:hover {
            transform: translateY(-2px);
            background: #e8f9fd;
            box-shadow: 0 6px 16px rgba(8, 175, 208, .12);
        }

        .action-primary {
            border-color: transparent;
            color: white;
            background: linear-gradient(135deg, #08b8d8, #0798ba);
        }

        .action-primary:hover {
            background: linear-gradient(135deg, #079cbd, #067e9d);
        }

        .save-status {
            width: 100%;
            margin: 0;
            color: #07805d;
            font-size: 13px;
            font-weight: 700;
        }

        .save-hint {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .save-hint a {
            color: var(--cyan-dark);
            font-weight: 800;
            text-decoration: underline;
        }

        /* COVER IMAGE */

        .cover-card {
            position: relative;
            overflow: hidden;
            margin: 28px 0 0;
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 26px;
            background: #d9edf3;
            box-shadow: 0 20px 55px rgba(13, 64, 85, .12);
        }

        .cover-image {
            display: block;
            width: 100%;
            max-height: 650px;
            min-height: 250px;
            aspect-ratio: 16 / 8;
            object-fit: cover;
        }

        .cover-placeholder {
            min-height: 320px;
            display: grid;
            place-items: center;
            padding: 30px;
            color: #7196a8;
            background:
                radial-gradient(circle at 20% 20%, rgba(8, 175, 208, .15), transparent 30%),
                linear-gradient(135deg, #e7f8fc, #c8e9f2);
            font-size: 14px;
            text-align: center;
        }

        .cover-caption {
            padding: 12px 18px;
            color: #6d8c9f;
            background: rgba(255, 255, 255, .88);
            font-size: 11px;
        }

        /* MAIN CONTENT LAYOUT */

        .reading-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            align-items: start;
            gap: 28px;
            margin-top: 35px;
        }

        .article-body-card {
            min-width: 0;
            padding: clamp(22px, 4vw, 48px);
            border: 1px solid rgba(255, 255, 255, .95);
            border-radius: 25px;
            background: var(--surface);
            box-shadow: 0 14px 40px rgba(16, 74, 97, .055);
        }

        .content {
            color: #35566b;
            font-size: 16px;
            line-height: 2;
            overflow-wrap: anywhere;
        }

        .content p {
            margin: 0 0 22px;
        }

        .content h2,
        .content h3,
        .content h4 {
            margin: 34px 0 14px;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            line-height: 1.4;
        }

        .content h2 {
            font-size: 30px;
        }

        .content h3 {
            font-size: 24px;
        }

        .content h4 {
            font-size: 20px;
        }

        .content ul,
        .content ol {
            margin: 0 0 24px;
            padding-left: 25px;
        }

        .content li {
            margin-bottom: 8px;
        }

        .content blockquote {
            margin: 28px 0;
            padding: 18px 22px;
            border-left: 4px solid var(--cyan);
            border-radius: 0 15px 15px 0;
            background: #edf9fc;
            color: #24617a;
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-style: italic;
        }

        .content img {
            max-width: 100%;
            height: auto;
            border-radius: 14px;
        }

        .content a {
            color: var(--cyan-dark);
            text-decoration: underline;
        }

        .article-bottom {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: 35px;
            padding-top: 22px;
            border-top: 1px solid var(--line);
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .tag {
            display: inline-block;
            padding: 6px 11px;
            border: 1px solid #dceef3;
            border-radius: 30px;
            color: #438098;
            background: #f3fbfd;
            font-size: 11px;
        }

        .attachment {
            margin-top: 22px;
        }

        /* SIDEBAR */

        .sidebar {
            display: grid;
            gap: 20px;
        }

        .side-card {
            overflow: hidden;
            padding: 23px;
            border: 1px solid rgba(255, 255, 255, .95);
            border-radius: 23px;
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 12px 32px rgba(16, 74, 97, .06);
        }

        .side-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 18px;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            line-height: 1.4;
        }

        .side-heading i {
            color: #ff8656;
        }

        .side-description {
            margin: 0 0 18px;
            color: #7893a3;
            font-size: 12px;
            line-height: 1.8;
        }

        .side-stat {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 0;
            border-bottom: 1px solid var(--line);
        }

        .side-stat:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .side-stat-icon {
            width: 39px;
            height: 39px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 13px;
            color: #0789a8;
            background: #e8f9fd;
        }

        .side-stat strong {
            display: block;
            color: var(--navy);
            font-size: 12px;
        }

        .side-stat span {
            display: block;
            color: #88a0ae;
            font-size: 10px;
        }

        .explore-card {
            position: relative;
            overflow: hidden;
            min-height: 245px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 24px;
            border-radius: 23px;
            color: white;
            background:
                linear-gradient(180deg, rgba(3, 45, 64, .05), rgba(3, 45, 64, .9)),
                linear-gradient(135deg, #1b7183, #07394d);
        }

        .explore-card::before,
        .explore-card::after {
            position: absolute;
            content: "";
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 50%;
            pointer-events: none;
        }

        .explore-card::before {
            width: 220px;
            height: 220px;
            top: -70px;
            right: -60px;
        }

        .explore-card::after {
            width: 155px;
            height: 155px;
            top: -35px;
            right: -25px;
        }

        .explore-card > * {
            position: relative;
            z-index: 1;
        }

        .explore-card .eyebrow {
            color: #7ce9fa;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.7px;
            text-transform: uppercase;
        }

        .explore-card h3 {
            margin: 8px 0;
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            line-height: 1.25;
        }

        .explore-card p {
            margin: 0 0 17px;
            color: rgba(255, 255, 255, .8);
            font-size: 12px;
        }

        .explore-link {
            width: fit-content;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 10px 15px;
            border-radius: 30px;
            color: var(--navy);
            background: white;
            font-size: 11px;
            font-weight: 800;
        }

        .explore-link:hover {
            color: white;
            background: var(--cyan);
        }

        /* RELATED FOOTER AREA */

        .related-section {
            margin: 65px 0 75px;
            padding: 35px;
            border: 1px solid rgba(255, 255, 255, .9);
            border-radius: 26px;
            background: rgba(255, 255, 255, .63);
            text-align: center;
        }

        .section-eyebrow {
            color: var(--cyan-dark);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .related-section h2 {
            margin: 8px 0 12px;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: clamp(25px, 3vw, 35px);
        }

        .related-section p {
            max-width: 570px;
            margin: 0 auto 22px;
            color: #7893a3;
            font-size: 13px;
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

        @media (max-width: 1100px) {
            .navbar {
                flex-wrap: wrap;
            }

            .nav-links {
                order: 3;
                width: 100%;
                justify-content: flex-start;
                overflow-x: auto;
            }

            .nav-links a {
                white-space: nowrap;
            }

            .nav-actions {
                margin-left: auto;
            }

            .footer-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .footer-brand-column,
            .footer-newsletter {
                grid-column: span 3;
            }

            .footer-brand-column {
                max-width: 450px;
            }

            .reading-layout {
                grid-template-columns: minmax(0, 1fr) 240px;
                gap: 18px;
            }
        }

        @media (max-width: 760px) {
            .topbar-inner {
                padding: 8px 18px;
            }

            .topbar-links {
                display: none;
            }

            .navbar-wrap {
                padding: 10px 15px 0;
            }

            .navbar {
                min-height: 68px;
                padding: 12px 14px;
                gap: 12px;
                border-radius: 21px;
            }

            .brand {
                font-size: 20px;
            }

            .brand-mark {
                width: 35px;
                height: 35px;
                font-size: 19px;
            }

            .nav-actions {
                gap: 7px;
            }

            .search-box {
                width: 40px;
                height: 40px;
                justify-content: center;
                padding: 0;
                background: #eff7fa;
            }

            .search-box input {
                display: none;
            }

            .search-box i {
                margin: 0;
            }

            .account-link {
                padding: 10px;
                font-size: 0;
            }

            .account-link i {
                font-size: 15px;
            }

            .nav-links {
                gap: 1px;
            }

            .nav-links a {
                padding: 9px 12px;
                font-size: 11px;
            }

            .article-container {
                margin-top: 22px;
                padding: 0 17px;
            }

            h1 {
                margin-top: 17px;
                font-size: clamp(32px, 8vw, 44px);
                letter-spacing: -.8px;
            }

            .article-summary {
                font-size: 15px;
            }

            .article-meta {
                gap: 12px;
            }

            .article-actions {
                margin: 20px 0;
            }

            .cover-card {
                margin-top: 22px;
                border-radius: 19px;
            }

            .cover-image {
                min-height: 210px;
                aspect-ratio: 4 / 3;
            }

            .reading-layout {
                grid-template-columns: 1fr;
                margin-top: 22px;
            }

            .article-body-card {
                padding: 23px 20px;
                border-radius: 20px;
            }

            .content {
                font-size: 15px;
                line-height: 1.95;
            }

            .content h2 {
                font-size: 26px;
            }

            .content h3 {
                font-size: 22px;
            }

            .sidebar {
                grid-template-columns: 1fr;
            }

            .related-section {
                margin: 42px 0 48px;
                padding: 26px 18px;
                border-radius: 21px;
            }

            .footer {
                padding: 42px 20px 18px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 28px 20px;
            }

            .footer-brand-column,
            .footer-newsletter {
                grid-column: span 2;
            }

            .footer-column h3 {
                font-size: 16px;
            }

            .footer-quote {
                margin-top: 35px;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 380px) {
            .brand-text small {
                letter-spacing: 1px;
            }

            .brand {
                gap: 6px;
                font-size: 18px;
            }

            .article-actions .action-button {
                padding: 10px 12px;
                font-size: 11px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 24px 13px;
            }
        }

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
    </style>
</head>

<body>

    {{-- TOP BAR --}}
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

    {{-- NAVIGATION --}}
    <header class="main-header">

    <div class="header-card">


        {{-- Logo --}}

        <a
            href="#"
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

    <main class="article-container">

        {{-- ARTICLE HEADING --}}
        <header class="article-heading">

            <span class="category-label">
                <i class="fa-solid fa-book-open"></i>
                {{ $article->category }}
            </span>

            <h1>{{ $article->title }}</h1>

            @if($article->summary)
                <p class="article-summary">{{ $article->summary }}</p>
            @endif

            <div class="article-meta">

                <div class="meta-item">
                    <span class="author-avatar">
                        <i class="fa-solid fa-pen-nib"></i>
                    </span>
                    <span class="author-info">
                        <strong>{{ $article->author_name }}</strong>
                        <span>Penulis Derap Serayu</span>
                    </span>
                </div>

                @if($article->published_at)
                    <span class="meta-item">
                        <i class="fa-regular fa-calendar"></i>
                        {{ $article->published_at->translatedFormat('d F Y') }}
                    </span>
                @endif

                <span class="meta-item">
                    <i class="fa-regular fa-eye"></i>
                    {{ number_format($article->views, 0, ',', '.') }} tayangan
                </span>

                <span class="meta-item">
                    <i class="fa-regular fa-clock"></i>
                    <span id="reading-time">Waktu baca sekitar 1 menit</span>
                </span>

            </div>

            {{-- SAVE ARTICLE --}}
            <div class="article-actions">

                @if (session('savedArticleStatus'))
                    <p class="save-status" role="status">
                        <i class="fa-solid fa-circle-check"></i>
                        {{ session('savedArticleStatus') }}
                    </p>
                @endif

                @auth
                    @if (auth()->user()->role === 'reader')
                        <form
                            action="{{ $isSaved
                                ? route('pembaca.saved.destroy', $article->slug)
                                : route('pembaca.saved.store', $article->slug) }}"
                            method="POST">

                            @csrf

                            @if ($isSaved)
                                @method('DELETE')
                            @endif

                            <button class="action-button" type="submit">
                                <i class="fa-{{ $isSaved ? 'solid' : 'regular' }} fa-bookmark"></i>
                                {{ $isSaved ? 'Hapus dari artikel tersimpan' : 'Simpan artikel' }}
                            </button>
                        </form>
                    @endif
                @else
                    <p class="save-hint">
                        <i class="fa-regular fa-bookmark"></i>
                        Ingin menyimpan artikel?
                        <a href="{{ route('login', ['article' => $article->slug]) }}">
                            Masuk sebagai pembaca
                        </a>
                    </p>
                @endauth

                <button class="action-button" type="button" id="share-button">
                    <i class="fa-solid fa-share-nodes"></i>
                    Bagikan
                </button>

            </div>
        </header>

        {{-- COVER IMAGE --}}
        <figure class="cover-card">
            @if($article->cover_image_path)
                <img
                    class="cover-image"
                    src="{{ asset('storage/'.$article->cover_image_path) }}"
                    alt="{{ $article->caption ?: $article->title }}">

                @if($article->caption || $article->photo_credit)
                    <figcaption class="cover-caption">
                        @if($article->caption)
                            {{ $article->caption }}
                        @endif

                        @if($article->caption && $article->photo_credit)
                            ·
                        @endif

                        @if($article->photo_credit)
                            Foto: {{ $article->photo_credit }}
                        @endif
                    </figcaption>
                @endif
            @else
                <div class="cover-placeholder">
                    <div>
                        <i class="fa-regular fa-image" style="font-size:38px"></i>
                        <p>Gambar utama artikel belum tersedia.</p>
                    </div>
                </div>
            @endif
        </figure>

        {{-- ARTICLE CONTENT + SIDEBAR --}}
        <div class="reading-layout">

            <section class="article-body-card">

                @php
                    $articleText = preg_replace(
                        '/<\/(p|h[1-6]|li|blockquote|ul|ol|div)>/i',
                        "\n\n",
                        $article->content ?? ''
                    );
                @endphp

                @if(trim(strip_tags($articleText)))
                    <article class="content" id="article-content">{{ trim(strip_tags($articleText)) }}</article>
                @elseif($article->document_path)
                    <div class="content">
                        <p>
                            Naskah lengkap artikel ini tersedia dalam dokumen
                            yang dapat kamu unduh melalui tombol di bawah.
                        </p>
                    </div>
                @else
                    <div class="content">
                        <p>Konten artikel belum tersedia.</p>
                    </div>
                @endif

                @if($article->document_path)
                    <a class="action-button action-primary attachment"
                       href="{{ route('articles.document', $article->slug) }}">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        Unduh naskah
                        ({{ $article->document_name ?: 'dokumen artikel' }})
                    </a>
                @endif

                <div class="article-bottom">

                    @if($article->tags)
                        <div class="tags">
                            <span style="font-size:11px;font-weight:800;color:#67889b">
                                <i class="fa-solid fa-hashtag"></i> Topik:
                            </span>

                            @foreach($article->tags as $tag)
                                <span class="tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ route('home') }}" class="action-button">
                        <i class="fa-solid fa-arrow-left"></i>
                        Kembali ke beranda
                    </a>

                </div>

            </section>

            {{-- SIDEBAR --}}
            <aside class="sidebar">

                <section class="side-card">
                    <h2 class="side-heading">
                        <i class="fa-solid fa-compass"></i>
                        Jelajahi Cerita
                    </h2>

                    <p class="side-description">
                        Temukan cerita menarik tentang budaya, wisata,
                        potensi, dan kehidupan masyarakat Banjarnegara.
                    </p>

                    <div class="side-stat">
                        <div class="side-stat-icon">
                            <i class="fa-solid fa-mountain-sun"></i>
                        </div>
                        <div>
                            <strong>Wisata & Alam</strong>
                            <span>Keindahan Banjarnegara</span>
                        </div>
                    </div>

                    <div class="side-stat">
                        <div class="side-stat-icon">
                            <i class="fa-solid fa-landmark"></i>
                        </div>
                        <div>
                            <strong>Budaya Lokal</strong>
                            <span>Tradisi dan kearifan lokal</span>
                        </div>
                    </div>

                    <div class="side-stat">
                        <div class="side-stat-icon">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <div>
                            <strong>Ide & Inspirasi</strong>
                            <span>Sudut pandang yang berbeda</span>
                        </div>
                    </div>
                </section>

                <section class="explore-card">
                    <span class="eyebrow">Derap Serayu</span>
                    <h3>Setiap sudut punya cerita.</h3>
                    <p>
                        Dari gunung hingga lembah, kenali lebih dekat
                        Banjarnegara melalui cerita masyarakatnya.
                    </p>
                    <a href="{{ route('home') }}" class="explore-link">
                        Jelajahi Sekarang
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </section>

            </aside>

        </div>

        {{-- RELATED / DISCOVERY SECTION --}}
        <section class="related-section">
            <span class="section-eyebrow">Cerita Banjarnegara</span>
            <h2>Masih banyak cerita untuk dijelajahi.</h2>
            <p>
                Temukan kisah lain seputar wisata, budaya, potensi daerah,
                teknologi, dan kehidupan masyarakat Banjarnegara.
            </p>
            <a href="{{ route('home') }}" class="action-button action-primary">
                Jelajahi Beranda
                <i class="fa-solid fa-arrow-right"></i>
            </a>
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

    <script>
        // Estimasi waktu baca
        document.addEventListener('DOMContentLoaded', function () {
            const content = document.getElementById('article-content');
            const readingTime = document.getElementById('reading-time');

            if (content && readingTime) {
                const words = content.innerText.trim()
                    .split(/\s+/)
                    .filter(Boolean).length;

                const minutes = Math.max(1, Math.ceil(words / 200));

                readingTime.textContent = 'Waktu baca sekitar ' + minutes + ' menit';
            }
        });

        // Bagikan artikel
        document.getElementById('share-button')?.addEventListener('click', async function () {
            const shareData = {
                title: @json($article->title),
                text: @json($article->summary ?? $article->title),
                url: window.location.href
            };

            try {
                if (navigator.share) {
                    await navigator.share(shareData);
                } else if (navigator.clipboard && window.isSecureContext) {
                    await navigator.clipboard.writeText(shareData.url);
                    alert('Tautan artikel berhasil disalin.');
                } else {
                    const temporaryInput = document.createElement('textarea');
                    temporaryInput.value = shareData.url;
                    temporaryInput.style.position = 'fixed';
                    temporaryInput.style.opacity = '0';
                    document.body.appendChild(temporaryInput);
                    temporaryInput.select();

                    const copied = document.execCommand('copy');
                    temporaryInput.remove();

                    alert(copied
                        ? 'Tautan artikel berhasil disalin.'
                        : 'Silakan salin tautan dari bilah alamat browser.');
                }
            } catch (error) {
                if (error.name !== 'AbortError') {
                    alert('Artikel belum dapat dibagikan. Silakan salin tautannya.');
                }
            }
        });

        // Form newsletter belum dihubungkan ke backend
        document.getElementById('newsletter-form')?.addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Fitur berlangganan belum terhubung ke server.');
        });
    </script>

</body>
</html>
