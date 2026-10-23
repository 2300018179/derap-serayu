
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penulis | Derap Serayu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --navy: #063b56;
            --navy-dark: #042e45;
            --teal: #009fbe;
            --cyan: #21c6e5;
            --blue: #168fe5;
            --green: #10b995;
            --purple: #8658ed;
            --orange: #ffb42e;
            --text: #12456e;
            --muted: #7091ac;
            --border: #d9effb;
            --surface: #ffffff;
            --page: #f0f9fd;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            background: var(--page);
            color: var(--text);
        }

        button, input {
            font: inherit;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            cursor: pointer;
        }

        .app {
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 30;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            color: white;
            background:
                linear-gradient(180deg, rgba(3, 54, 78, .97), rgba(2, 43, 65, .98)),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center/cover;
            box-shadow: 5px 0 25px rgba(13, 70, 104, .08);
        }

        .brand {
            height: 76px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 24px;
            border-bottom: 1px solid rgba(255,255,255,.15);
            flex-shrink: 0;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 22px;
            letter-spacing: -.7px;
            white-space: nowrap;
        }

        .brand-name span {
            color: #36d3ed;
        }

        .brand small {
            display: block;
            font-family: 'DM Sans', sans-serif;
            font-size: 9px;
            font-weight: 500;
            letter-spacing: .2px;
            margin-top: 1px;
            color: #c7e8f5;
        }

        .side-nav {
            padding: 22px 13px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            min-height: 47px;
            margin-bottom: 7px;
            padding: 0 17px;
            border-radius: 12px;
            color: #e3f3fb;
            font-size: 13px;
            font-weight: 700;
            transition: .2s ease;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: linear-gradient(110deg, #0798c5, #0084b5);
            color: #fff;
            box-shadow: 0 6px 18px rgba(0, 164, 204, .2);
        }

        .nav-caption {
            padding: 16px 16px 9px;
            margin-top: 10px;
            border-top: 1px solid rgba(255,255,255,.17);
            color: #b3d8e9;
            font-size: 10px;
            letter-spacing: 1.2px;
            font-weight: 800;
        }

        .side-spacer {
            flex: 1;
            min-height: 50px;
        }

        .profile {
            margin: 0 13px 13px;
            padding: 13px;
            display: flex;
            align-items: center;
            gap: 11px;
            border: 1px solid rgba(30, 202, 231, .32);
            background: rgba(0, 28, 45, .3);
            border-radius: 14px;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border-radius: 13px;
            flex-shrink: 0;
            background: linear-gradient(145deg, #23d9bb, #00a5a5);
            color: #fff;
            font-size: 20px;
            font-weight: 800;
        }

        .profile strong {
            display: block;
            font-size: 11px;
            line-height: 1.6;
        }

        .profile small {
            color: #b5d9e9;
            font-size: 11px;
        }

        .logout {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px 28px 22px;
            font-size: 13px;
            font-weight: 700;
            color: #ffe1e6;
        }
        .sidebar form { margin: 0; }
        .logout {
            width: 100%;
            border: 0;
            background: transparent;
            text-align: left;
            cursor: pointer;
        }

        .logout i {
            font-size: 17px;
        }

        /* MAIN & TOPBAR */
        .main {
            margin-left: 250px;
            min-width: 0;
        }

        .topbar {
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            gap: 22px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid #e2f0f8;
        }

        .menu-toggle {
            display: none;
            border: 0;
            background: none;
            color: var(--navy);
            font-size: 20px;
        }

        .search {
            width: min(520px, 48%);
            height: 39px;
            border: 1px solid #cde5f7;
            border-radius: 13px;
            display: flex;
            align-items: center;
            padding: 0 14px;
            gap: 10px;
            background: white;
            box-shadow: 0 2px 7px rgba(31, 104, 152, .03);
        }

        .search i {
            color: #6e9abb;
            font-size: 14px;
        }

        .search input {
            min-width: 0;
            width: 100%;
            border: 0;
            outline: none;
            color: var(--text);
            background: transparent;
            font-size: 12px;
        }

        .search input::placeholder {
            color: #84a4bd;
        }

        .top-spacer {
            flex: 1;
        }

        .top-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 18px;
            border-left: 1px solid #e1eef7;
            white-space: nowrap;
        }

        .notification-button {
            position: relative;
            border: 0;
            color: var(--navy);
            background: transparent;
            font-size: 20px;
        }

        .notification-dot {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 15px;
            height: 15px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #ef5361;
            color: white;
            font-size: 9px;
            font-weight: 800;
        }

        .sun {
            color: #ffad1f;
            font-size: 23px;
        }

        .weather strong,
        .user-top strong {
            display: block;
            font-size: 11px;
        }

        .weather small,
        .user-top small {
            display: block;
            margin-top: 3px;
            color: #7294ad;
            font-size: 10px;
        }

        .user-top {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            color: white;
            background: var(--navy);
            font-weight: 800;
        }

        /* CONTENT */
        .content {
            padding: 5px 13px 20px;
        }

        /* HERO */
        .hero {
            position: relative;
            min-height: 213px;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 27px 30px;
            border-radius: 14px;
            color: white;
            background:
                linear-gradient(90deg, rgba(3, 50, 75, .93) 0%, rgba(4, 63, 88, .72) 44%, rgba(5, 69, 94, .12) 100%),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center 48%/cover;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0;
            height: 40px;
            background: linear-gradient(transparent, rgba(4, 48, 66, .28));
            pointer-events: none;
        }

        .hero-copy {
            position: relative;
            z-index: 1;
            max-width: 56%;
        }

        .hero h1 {
            margin: 0 0 10px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(26px, 2.6vw, 36px);
            line-height: 1.2;
            letter-spacing: -.6px;
        }

        .hero h1 span {
            color: #54e4f3;
        }

        .hero-copy > p {
            max-width: 470px;
            margin: 0;
            color: #eef9ff;
            font-size: 12px;
            line-height: 1.7;
        }

        .quote {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            max-width: 400px;
            margin-top: 15px;
            padding: 9px 15px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 30px;
            background: rgba(0, 125, 165, .35);
            color: #effaff;
            font-size: 10px;
            line-height: 1.5;
        }

        .quote b {
            font-family: Georgia, serif;
            font-size: 32px;
            line-height: .7;
            color: #72eff9;
        }

        .hero-cta {
            position: absolute;
            z-index: 2;
            top: 50%;
            right: 17px;
            transform: translateY(-50%);
            width: 285px;
            padding: 22px;
            border: 1px solid rgba(255,255,255,.8);
            border-radius: 20px;
            color: var(--text);
            background: rgba(255,255,255,.94);
            box-shadow: 0 14px 35px rgba(1, 49, 76, .16);
        }

        .hero-cta h2 {
            margin: 0 0 7px;
            font-family: 'Playfair Display', serif;
            font-size: 21px;
        }

        .hero-cta p {
            margin: 0 0 14px;
            color: #6087a8;
            font-size: 11px;
            line-height: 1.6;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 43px;
            padding: 0 18px;
            border: 0;
            border-radius: 30px;
            color: white;
            background: linear-gradient(110deg, #08a6c3, #008ab4);
            font-size: 12px;
            font-weight: 800;
            transition: .2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(0, 148, 187, .25);
        }

        /* STAT CARDS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 12px;
            margin-top: 13px;
        }

        .stat-card {
            min-width: 0;
            min-height: 108px;
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 15px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: rgba(255,255,255,.96);
            box-shadow: 0 5px 15px rgba(36, 115, 163, .045);
        }

        .stat-icon {
            width: 58px;
            height: 58px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 50%;
            font-size: 23px;
        }

        .stat-icon.blue {
            color: #098fe0;
            background: #dff5ff;
            box-shadow: inset 0 0 0 7px rgba(255,255,255,.4);
        }

        .stat-icon.green {
            color: #05ad8b;
            background: #d6f8f0;
            box-shadow: inset 0 0 0 7px rgba(255,255,255,.4);
        }

        .stat-icon.orange {
            color: #f2a000;
            background: #fff0cf;
            box-shadow: inset 0 0 0 7px rgba(255,255,255,.4);
        }

        .stat-icon.purple {
            color: #8255e8;
            background: #eee5ff;
            box-shadow: inset 0 0 0 7px rgba(255,255,255,.4);
        }

        .stat-info {
            min-width: 0;
        }

        .stat-info .label {
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .stat-info .value {
            margin-top: 5px;
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            font-weight: 800;
            line-height: 1.1;
        }

        .stat-info small {
            display: block;
            margin-top: 6px;
            color: #779ab5;
            font-size: 9px;
            line-height: 1.4;
        }

        .up {
            color: #00ad83;
            font-weight: 800;
            margin-right: 5px;
        }

        /* LOWER GRID */
        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(260px, 1fr) minmax(235px, .9fr);
            align-items: stretch;
            gap: 13px;
            margin-top: 14px;
        }

        .panel {
            min-width: 0;
            padding: 16px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: rgba(255,255,255,.97);
            box-shadow: 0 5px 18px rgba(34, 112, 158, .045);
        }

        .panel-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 14px;
        }

        .panel-title {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            min-width: 0;
        }

        .panel-title > i {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 50%;
            color: #078fcb;
            background: #e6f7ff;
            font-size: 16px;
        }

        .panel-title h3 {
            margin: 2px 0 4px;
            font-family: 'Playfair Display', serif;
            font-size: 16px;
        }

        .panel-title p {
            margin: 0;
            color: var(--muted);
            font-size: 10px;
        }

        .date-select {
            max-width: 155px;
            padding: 8px 9px;
            border: 1px solid #cfe5f5;
            border-radius: 10px;
            color: #6288a7;
            background: white;
            font-size: 10px;
            outline: none;
        }

        .chart-legend {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin: 3px 0 8px;
            color: #6d91ae;
            font-size: 10px;
        }

        .legend-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            margin-right: 5px;
            border-radius: 50%;
            background: #0da8ec;
        }

        .legend-dot.purple-dot {
            background: #8859ef;
        }

        .chart-wrap {
            position: relative;
            width: 100%;
            height: 225px;
        }

        .chart-summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 7px;
            margin-top: 12px;
        }

        .mini-stat {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0;
            padding: 10px 8px;
            border-radius: 9px;
            background: #eff9fd;
        }

        .mini-icon {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 50%;
            color: #049bd7;
            background: #d8f3ff;
        }

        .mini-stat small {
            display: block;
            color: #7193ad;
            font-size: 9px;
            line-height: 1.4;
        }

        .mini-stat strong {
            display: block;
            margin-top: 3px;
            font-size: 14px;
        }

        /* RECENT ARTICLES */
        .text-link {
            flex-shrink: 0;
            color: #008fce;
            font-size: 10px;
            font-weight: 800;
        }

        .article-list {
            display: flex;
            flex-direction: column;
        }

        .article-item {
            display: grid;
            grid-template-columns: 69px minmax(0, 1fr);
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid #eaf3f9;
        }

        .article-item:first-child {
            padding-top: 2px;
        }

        .article-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .article-thumb {
            width: 69px;
            height: 58px;
            border-radius: 9px;
            object-fit: cover;
            background: #dceff8;
        }

        .article-body {
            min-width: 0;
        }

        .article-name-row {
            display: flex;
            align-items: flex-start;
            gap: 5px;
        }

        .article-name {
            flex: 1;
            min-width: 0;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            color: #164c74;
            font-size: 10px;
            font-weight: 800;
            line-height: 1.5;
        }

        .status {
            padding: 4px 7px;
            border-radius: 20px;
            font-size: 8px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status.published {
            color: #009c80;
            background: #d7f8ef;
        }

        .status.draft {
            color: #b87900;
            background: #fff0cb;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 7px;
            color: #7d9db5;
            font-size: 9px;
        }

        .article-meta i {
            margin-right: 3px;
        }

        /* RIGHT COLUMN */
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 12px;
            min-width: 0;
        }

        .guide {
            position: relative;
            overflow: hidden;
            min-height: 139px;
            background:
                radial-gradient(circle at 100% 0%, #e5f8ff, transparent 43%),
                #fff;
        }

        .guide .panel-title {
            position: relative;
            z-index: 1;
        }

        .guide p {
            position: relative;
            z-index: 1;
            max-width: 200px;
            margin: 0 0 13px 41px;
            color: #6e92ad;
            font-size: 10px;
            line-height: 1.6;
        }

        .guide-illustration {
            position: absolute;
            right: 8px;
            bottom: 13px;
            color: #b9e9fa;
            font-size: 56px;
            transform: rotate(-10deg);
            opacity: .75;
        }

        .btn-outline {
            position: relative;
            z-index: 1;
            min-height: 33px;
            margin-left: 41px;
            padding: 0 13px;
            border: 1px solid #16a7e2;
            border-radius: 10px;
            color: #008fd1;
            background: white;
            font-size: 10px;
            font-weight: 800;
        }

        .notification-list {
            display: flex;
            flex-direction: column;
        }

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            padding: 10px 0;
            border-bottom: 1px solid #eaf3f9;
        }

        .notice:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .notice-icon {
            display: grid;
            place-items: center;
            width: 30px;
            height: 30px;
            flex-shrink: 0;
            border-radius: 50%;
            color: white;
            font-size: 12px;
        }

        .notice-icon.green-bg { background: #19bba0; }
        .notice-icon.purple-bg { background: #8386a5; }
        .notice-icon.orange-bg { background: #ffb31f; }
        .notice-icon.blue-bg { background: #3294ed; }

        .notice-content {
            flex: 1;
            min-width: 0;
        }

        .notice-content strong {
            display: block;
            font-size: 9px;
            line-height: 1.5;
        }

        .notice-content p {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            overflow: hidden;
            margin: 3px 0 0;
            color: #789ab5;
            font-size: 9px;
        }

        .notice time {
            flex-shrink: 0;
            color: #86a4b9;
            font-size: 8px;
            padding-top: 2px;
        }

        /* BOTTOM BANNER */
        .bottom-banner {
            position: relative;
            overflow: hidden;
            min-height: 82px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 14px;
            padding: 14px 22px;
            border: 1px solid #d2eefa;
            border-radius: 14px;
            background:
                linear-gradient(90deg, rgba(222, 245, 255, .97), rgba(223, 245, 255, .74)),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center 55%/cover;
        }

        .banner-mark {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 50%;
            color: white;
            background: var(--navy);
            font-size: 20px;
        }

        .bottom-banner p {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.6;
        }

        .bottom-banner small {
            display: block;
            margin-top: 4px;
            color: #7296b0;
            font-size: 10px;
        }

        .banner-signature {
            margin-left: auto;
            color: #0d6390;
            text-align: right;
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-weight: 700;
            font-size: 13px;
            line-height: 1.5;
            transform: rotate(-4deg);
        }

        .mobile-overlay {
            display: none;
        }

        /* RESPONSIVE */
        @media (max-width: 1350px) {
            .sidebar {
                width: 225px;
            }

            .main {
                margin-left: 225px;
            }

            .topbar {
                padding: 0 20px;
                gap: 14px;
            }

            .dashboard-grid {
                grid-template-columns: minmax(0, 1.35fr) minmax(240px, 1fr);
            }

            .right-column {
                grid-column: 1 / -1;
                display: grid;
                grid-template-columns: 1fr 1.4fr;
            }

            .hero-copy {
                max-width: 58%;
            }

            .hero-cta {
                width: 255px;
            }
        }

        @media (max-width: 1000px) {
            .sidebar {
                width: 250px;
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .mobile-overlay.show {
                display: block;
                position: fixed;
                inset: 0;
                z-index: 20;
                background: rgba(2, 30, 46, .45);
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .hero {
                min-height: 245px;
            }

            .hero-copy {
                max-width: 58%;
            }

            .hero-cta {
                width: 235px;
                padding: 17px;
            }

            .topbar {
                padding: 0 16px;
            }

            .weather {
                display: none;
            }
        }

        @media (max-width: 700px) {
            .topbar {
                height: 62px;
                gap: 10px;
            }

            .search {
                width: auto;
                flex: 1;
                padding: 0 10px;
            }

            .search input {
                font-size: 11px;
            }

            .user-top .user-text,
            .user-top > i {
                display: none;
            }

            .top-item {
                padding-left: 10px;
            }

            .content {
                padding: 10px;
            }

            .hero {
                display: block;
                min-height: auto;
                padding: 25px 20px;
                background-position: center;
            }

            .hero-copy {
                max-width: 100%;
            }

            .hero h1 {
                font-size: 29px;
            }

            .hero-copy > p {
                font-size: 12px;
            }

            .hero-cta {
                position: relative;
                inset: auto;
                width: 100%;
                margin-top: 18px;
                transform: none;
            }

            .stats {
                gap: 9px;
            }

            .stat-card {
                min-height: 95px;
                padding: 10px;
                gap: 9px;
            }

            .stat-icon {
                width: 42px;
                height: 42px;
                font-size: 18px;
            }

            .stat-info .label {
                font-size: 10px;
                white-space: normal;
            }

            .stat-info .value {
                font-size: 23px;
            }

            .dashboard-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .right-column {
                grid-column: auto;
                display: flex;
            }

            .chart-wrap {
                height: 205px;
            }

            .chart-summary {
                grid-template-columns: 1fr;
            }

            .mini-stat {
                padding: 9px;
            }

            .bottom-banner {
                align-items: flex-start;
                padding: 14px;
            }

            .banner-signature {
                display: none;
            }

            .bottom-banner p {
                font-size: 12px;
            }
        }

        .guide-modal {
        position: fixed;
        inset: 0;
        z-index: 1000;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .guide-modal.is-open {
        display: flex;
    }

    .guide-modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(3, 30, 46, .72);
        backdrop-filter: blur(5px);
    }

    .guide-modal-content {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        width: min(850px, 100%);
        max-height: 90vh;
        overflow: hidden;
        border-radius: 22px;
        background: #fff;
        box-shadow: 0 25px 80px rgba(0, 24, 42, .3);
        animation: guideAppear .25s ease;
    }

    .guide-modal-header {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 23px 26px;
        color: white;
        background:
            linear-gradient(115deg, rgba(3, 56, 78, .97), rgba(0, 139, 153, .91)),
            url("{{ asset('images/bg-dieng-home.jpg') }}") center/cover;
    }

    .guide-modal-icon {
        display: grid;
        place-items: center;
        width: 54px;
        height: 54px;
        flex-shrink: 0;
        border: 1px solid rgba(255,255,255,.35);
        border-radius: 16px;
        background: rgba(255,255,255,.13);
        font-size: 23px;
    }

    .guide-eyebrow {
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 2px;
        color: #7de8ef;
    }

    .guide-modal-header h2 {
        margin: 4px 0;
        font-family: 'Playfair Display', serif;
        font-size: 23px;
    }

    .guide-modal-header p {
        margin: 0;
        color: #d7f2f7;
        font-size: 11px;
        line-height: 1.6;
    }

    .guide-close {
        display: grid;
        place-items: center;
        width: 38px;
        height: 38px;
        margin-left: auto;
        flex-shrink: 0;
        border: 1px solid rgba(255,255,255,.25);
        border-radius: 50%;
        color: white;
        background: rgba(255,255,255,.12);
        font-size: 17px;
    }

    .guide-close:hover {
        background: rgba(255,255,255,.25);
    }

    .guide-modal-body {
        overflow-y: auto;
        padding: 23px 27px;
        color: #244e68;
    }

    .guide-intro {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 16px;
        border: 1px solid #d6f1e9;
        border-radius: 14px;
        background: linear-gradient(110deg, #effcf8, #f0faff);
    }

    .guide-intro > i {
        margin-top: 3px;
        color: #079f8a;
        font-size: 21px;
    }

    .guide-intro p {
        margin: 0;
        font-size: 12px;
        line-height: 1.8;
    }

    .guide-section {
        padding: 22px 0;
        border-bottom: 1px solid #eaf1f6;
    }

    .guide-section h3,
    .guide-workflow h3 {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0 0 12px;
        color: #123f5a;
        font-family: 'Playfair Display', serif;
        font-size: 17px;
    }

    .guide-section h3 > span {
        display: grid;
        place-items: center;
        width: 32px;
        height: 32px;
        flex-shrink: 0;
        border-radius: 10px;
        color: #008e9c;
        background: #e1f8f5;
        font-family: 'DM Sans', sans-serif;
        font-size: 11px;
    }

    .guide-section > p,
    .guide-workflow > p {
        margin: 0;
        color: #617f95;
        font-size: 12px;
        line-height: 1.9;
    }

    .guide-category-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
        margin-top: 15px;
    }

    .guide-category-list > div {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        padding: 13px;
        border: 1px solid #e0edf4;
        border-radius: 12px;
        background: #fbfdff;
    }

    .guide-category-list > div > i {
        display: grid;
        place-items: center;
        width: 35px;
        height: 35px;
        flex-shrink: 0;
        border-radius: 10px;
        color: #078caa;
        background: #e5f7fc;
    }

    .guide-category-list b,
    .guide-category-list small {
        display: block;
    }

    .guide-category-list b {
        margin-bottom: 4px;
        font-size: 12px;
    }

    .guide-category-list small {
        color: #7591a5;
        font-size: 10px;
        line-height: 1.6;
    }

    .guide-list {
        display: grid;
        gap: 10px;
        margin: 0;
        padding-left: 20px;
        color: #617f95;
        font-size: 12px;
        line-height: 1.8;
    }

    .guide-list li::marker {
        color: #079caa;
    }

    .guide-list b {
        color: #244e68;
    }

    .guide-checklist {
        display: grid;
        gap: 10px;
    }

    .guide-checklist label {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 11px 13px;
        border: 1px solid #e2edf3;
        border-radius: 10px;
        color: #58778d;
        background: #fbfdff;
        font-size: 12px;
        line-height: 1.6;
        cursor: pointer;
    }

    .guide-checklist input {
        width: 16px;
        height: 16px;
        margin-top: 1px;
        accent-color: #079f91;
        flex-shrink: 0;
    }

    .guide-workflow {
        margin-top: 22px;
        padding: 18px;
        border-radius: 15px;
        background: #f1f9fc;
    }

    .guide-workflow h3 {
        font-size: 16px;
    }

    .workflow-steps {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin: 17px 0;
    }

    .workflow-steps > div {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        text-align: center;
    }

    .workflow-steps > div > span {
        display: grid;
        place-items: center;
        width: 34px;
        height: 34px;
        margin-bottom: 8px;
        border-radius: 50%;
        color: white;
        background: linear-gradient(135deg, #0ba99e, #078bb5);
        font-size: 12px;
        font-weight: 800;
    }

    .workflow-steps b {
        color: #214c65;
        font-size: 11px;
    }

    .workflow-steps small {
        margin-top: 4px;
        color: #7591a5;
        font-size: 9px;
        line-height: 1.5;
    }

    .workflow-steps > i {
        padding-bottom: 35px;
        color: #8bb8c8;
        font-size: 12px;
    }

    .guide-note {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 17px;
        padding: 14px;
        border: 1px solid #f7e8bf;
        border-radius: 12px;
        color: #8b702e;
        background: #fffaf0;
    }

    .guide-note > i {
        margin-top: 3px;
    }

    .guide-note p {
        margin: 0;
        font-size: 11px;
        line-height: 1.8;
    }

    .guide-modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 25px;
        border-top: 1px solid #e8f1f6;
        background: #fff;
    }

    .guide-secondary-btn,
    .guide-start-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 42px;
        padding: 0 16px;
        border-radius: 11px;
        font-size: 11px;
        font-weight: 800;
        cursor: pointer;
    }

    .guide-secondary-btn {
        border: 1px solid #d8e7ef;
        color: #58788d;
        background: white;
    }

    .guide-start-btn {
        border: 0;
        color: white;
        background: linear-gradient(110deg, #079f9a, #078db7);
    }

    .guide-secondary-btn:hover {
        background: #f3f8fb;
    }

    .guide-start-btn:hover {
        box-shadow: 0 5px 15px rgba(0, 150, 166, .2);
        transform: translateY(-1px);
    }

    body.guide-modal-open {
        overflow: hidden;
    }

    @keyframes guideAppear {
        from { opacity: 0; transform: translateY(12px) scale(.99); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    @media (max-width: 600px) {
        .guide-modal {
            padding: 8px;
        }

        .guide-modal-content {
            max-height: 95vh;
            border-radius: 16px;
        }

        .guide-modal-header {
            gap: 10px;
            padding: 17px;
        }

        .guide-modal-icon {
            width: 42px;
            height: 42px;
            font-size: 18px;
        }

        .guide-modal-header h2 {
            font-size: 17px;
        }

        .guide-modal-header p {
            font-size: 9px;
        }

        .guide-modal-body {
            padding: 16px;
        }

        .guide-category-list {
            grid-template-columns: 1fr;
        }

        .workflow-steps {
            gap: 5px;
        }

        .workflow-steps > i {
            font-size: 9px;
        }

        .workflow-steps small {
            font-size: 8px;
        }

        .guide-modal-footer {
            padding: 12px;
        }

        .guide-secondary-btn,
        .guide-start-btn {
            padding: 0 10px;
            font-size: 10px;
        }
    }

    /* DROPDOWN NOTIFIKASI DAN AKUN */
    .top-dropdown {
        position: relative;
    }

    .dropdown-trigger {
        cursor: pointer;
    }

    .top-dropdown-menu {
        position: absolute;
        top: calc(100% + 14px);
        right: 0;
        z-index: 100;
        display: none;
        width: 340px;
        overflow: hidden;
        border: 1px solid #dcecf5;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 18px 45px rgba(4, 48, 73, .17);
        animation: dropdownAppear .18s ease;
    }

    .top-dropdown-menu.show {
        display: block;
    }

    @keyframes dropdownAppear {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 17px;
        border-bottom: 1px solid #e9f2f7;
        background: linear-gradient(120deg, #f0fbff, #f3fcf8);
    }

    .dropdown-heading strong,
    .dropdown-heading small {
        display: block;
    }

    .dropdown-heading strong {
        color: #12456e;
        font-size: 14px;
    }

    .dropdown-heading small {
        margin-top: 4px;
        color: #7897ad;
        font-size: 10px;
    }

    .dropdown-heading > i {
        color: #078eb0;
        font-size: 20px;
    }

    .dropdown-scroll {
        max-height: 330px;
        overflow-y: auto;
    }

    .dropdown-notice {
        display: flex;
        gap: 11px;
        padding: 14px;
        border-bottom: 1px solid #edf4f8;
        transition: background .2s;
    }

    .dropdown-notice:hover {
        background: #f5fbfe;
    }

    .dropdown-notice-icon {
        display: grid;
        place-items: center;
        width: 35px;
        height: 35px;
        flex-shrink: 0;
        border-radius: 11px;
    }

    .notice-orange {
        color: #b87b00;
        background: #fff1d0;
    }

    .notice-blue {
        color: #087fbd;
        background: #e3f5ff;
    }

    .dropdown-notice-text {
        min-width: 0;
        flex: 1;
    }

    .dropdown-notice-text strong,
    .dropdown-notice-text small {
        display: block;
        overflow-wrap: anywhere;
    }

    .dropdown-notice-text strong {
        color: #194866;
        font-size: 11px;
        line-height: 1.5;
    }

    .dropdown-notice-text small {
        margin-top: 4px;
        color: #7593a9;
        font-size: 10px;
        line-height: 1.6;
    }

    .dropdown-notice-text .notice-note {
        color: #ad7600;
    }

    .dropdown-notice-text .notice-date {
        color: #9ab0c0;
        font-size: 9px;
    }

    .dropdown-empty {
        padding: 27px 20px;
        color: #6f91a8;
        text-align: center;
    }

    .dropdown-empty > i {
        display: block;
        margin-bottom: 10px;
        color: #0db69a;
        font-size: 29px;
    }

    .dropdown-empty strong {
        color: #194866;
        font-size: 12px;
    }

    .dropdown-empty p {
        margin: 6px 0 0;
        font-size: 10px;
        line-height: 1.6;
    }

    .dropdown-footer-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 13px 16px;
        border-top: 1px solid #e9f2f7;
        color: #008fb7;
        font-size: 11px;
        font-weight: 800;
    }

    .dropdown-footer-link:hover {
        background: #f1faff;
    }

    /* MENU AKUN */
    .user-account-trigger {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0;
        border: 0;
        color: inherit;
        background: transparent;
        text-align: left;
    }

    .account-chevron {
        margin-left: 2px;
        color: #7897ad;
        font-size: 10px;
        transition: transform .2s;
    }

    .user-account-trigger[aria-expanded="true"] .account-chevron {
        transform: rotate(180deg);
    }

    .account-dropdown {
        width: 300px;
    }

    .account-dropdown-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 18px;
        background: linear-gradient(120deg, #effaff, #f0fcf7);
    }

    .account-dropdown-header > div:last-child {
        min-width: 0;
    }

    .account-dropdown-header strong,
    .account-dropdown-header small {
        display: block;
        overflow-wrap: anywhere;
    }

    .account-dropdown-header strong {
        color: #12456e;
        font-size: 12px;
    }

    .account-dropdown-header small {
        margin-top: 5px;
        color: #7897ad;
        font-size: 10px;
    }

    .account-role {
        display: inline-block;
        margin-top: 8px;
        padding: 5px 8px;
        border-radius: 20px;
        color: #078c80;
        background: #dff8ef;
        font-size: 9px;
        font-weight: 800;
    }

    .account-menu-links {
        padding: 7px;
    }

    .account-menu-links a {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 12px;
        border-radius: 9px;
        color: #426a83;
        font-size: 11px;
        font-weight: 700;
    }

    .account-menu-links a:hover {
        color: #008db5;
        background: #f0faff;
    }

    .account-menu-links a > i:first-child {
        width: 18px;
        text-align: center;
        font-size: 15px;
    }

    .account-menu-links .menu-arrow {
        margin-left: auto;
        color: #a2b8c7;
        font-size: 10px;
    }

    .account-logout-form {
        padding: 8px;
        border-top: 1px solid #e9f2f7;
    }

    .account-logout-form button {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 12px;
        border: 0;
        border-radius: 9px;
        color: #d64c5a;
        background: white;
        text-align: left;
        font-size: 11px;
        font-weight: 800;
    }

    .account-logout-form button:hover {
        background: #fff1f2;
    }

    @media (max-width: 700px) {
        .top-dropdown-menu {
            position: fixed;
            top: 68px;
            right: 10px;
            width: min(340px, calc(100vw - 20px));
        }

        .account-dropdown {
            width: min(300px, calc(100vw - 20px));
        }

        .user-account-trigger .user-text,
        .user-account-trigger .account-chevron {
            display: none;
        }
    }

    /* Wadah logo Derap Serayu */
    .logo {
        display: flex;
        align-items: center;
        justify-content: center;

        width: calc(100% - 36px);
        height: 76px;

        margin: 18px auto 30px;
        padding: 10px 14px;

        background: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.85);
        border-radius: 16px;

        box-sizing: border-box;
        overflow: hidden;
        text-decoration: none;

        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.12);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    /* Gambar logo */
    .logo-img {
        display: block;

        width: 100%;
        max-width: 180px;
        height: 54px;

        margin: 0 auto;
        object-fit: contain;
        object-position: center;

        flex-shrink: 0;
    }

    /* Efek saat logo disentuh kursor */
    .logo:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(0, 0, 0, 0.17);
    }
    </style>
</head>

<body>
<div class="app">

    <div class="mobile-overlay" id="mobileOverlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <a href="{{ route('penulis.dashboard') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Derap Serayu"
                 class="logo-img">
        </a>

        <nav class="side-nav">
            <a href="{{ route('penulis.dashboard') }}" class="nav-link active">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('penulis.artikel.create') }}" class="nav-link">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Tulis Artikel</span>
            </a>

            <a href="{{ route('penulis.articles.index') }}" class="nav-link">
                <i class="fa-regular fa-file-lines"></i>
                <span>Artikel Saya</span>
            </a>

            <a href="{{ url('/') }}" target="_blank" class="nav-link">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>Lihat Website</span>
            </a>

        </nav>

        <div class="side-spacer"></div>
    </aside>

    <main class="main">

        <header class="topbar">
            <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Buka menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <form class="search" id="searchForm" method="GET" action="{{ route('penulis.articles.index') }}">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="searchInput" name="search" aria-label="Cari artikel penulis"
                       placeholder="Cari artikel, topik, atau kata kunci...">
            </form>

            <div class="top-spacer"></div>

            @php
                $jumlahNotifikasi = $artikelPerhatian->count();
            @endphp

            <div class="top-item top-dropdown">
                <button type="button"
                        class="notification-button dropdown-trigger"
                        id="notificationToggle"
                        aria-label="Buka notifikasi"
                        aria-expanded="false"
                        onclick="toggleTopDropdown('notificationDropdown', this)">
                    <i class="fa-regular fa-bell"></i>

                    @if($jumlahNotifikasi > 0)
                        <span class="notification-dot">
                            {{ $jumlahNotifikasi > 9 ? '9+' : $jumlahNotifikasi }}
                        </span>
                    @endif
                </button>

                <div class="top-dropdown-menu notification-dropdown"
                    id="notificationDropdown">

                    <div class="dropdown-heading">
                        <div>
                            <strong>Notifikasi</strong>
                            <small>Informasi terbaru artikelmu</small>
                        </div>

                        <i class="fa-regular fa-bell"></i>
                    </div>

                    <div class="dropdown-scroll">
                        @forelse($artikelPerhatian as $artikel)
                            <a href="{{ route('penulis.articles.edit', $artikel) }}"
                            class="dropdown-notice">

                                <span class="dropdown-notice-icon
                                    {{ $artikel->status === 'rejected' ? 'notice-orange' : 'notice-blue' }}">
                                    <i class="fa-solid
                                        {{ $artikel->status === 'rejected' ? 'fa-pen-to-square' : 'fa-clock' }}">
                                    </i>
                                </span>

                                <span class="dropdown-notice-text">
                                    <strong>
                                        {{ $artikel->status === 'rejected'
                                            ? 'Artikel perlu direvisi'
                                            : 'Artikel menunggu tinjauan' }}
                                    </strong>

                                    <small>{{ $artikel->title }}</small>

                                    @if($artikel->review_note)
                                        <small class="notice-note">
                                            Catatan: {{ $artikel->review_note }}
                                        </small>
                                    @endif

                                    <small class="notice-date">
                                        {{ $artikel->updated_at->format('d M Y, H:i') }}
                                    </small>
                                </span>
                            </a>
                        @empty
                            <div class="dropdown-empty">
                                <i class="fa-regular fa-circle-check"></i>
                                <strong>Semua aman!</strong>
                                <p>Belum ada artikel yang perlu ditinjau atau direvisi.</p>
                            </div>
                        @endforelse
                    </div>

                    <a href="{{ route('penulis.articles.index') }}"
                    class="dropdown-footer-link">
                        Lihat semua artikel
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="top-item weather" id="weatherWidget">
                <i class="fa-solid fa-cloud-sun sun" id="weatherIcon"></i>

                <div>
                    <strong id="weatherTemperature">Memuat...</strong>
                    <small id="weatherDescription">Cuaca Banjarnegara</small>
                </div>
            </div>

            <div class="top-item user-top top-dropdown">
                <button type="button"
                        class="user-account-trigger dropdown-trigger"
                        onclick="toggleTopDropdown('accountDropdown', this)"
                        aria-expanded="false"
                        aria-label="Buka menu akun">

                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                    </div>

                    <div class="user-text">
                        <strong>{{ auth()->user()->name ?? 'Penulis' }}</strong>
                        <small>Penulis</small>
                    </div>

                    <i class="fa-solid fa-chevron-down account-chevron"></i>
                </button>

                <div class="top-dropdown-menu account-dropdown"
                    id="accountDropdown">

                    <div class="account-dropdown-header">
                        <div class="user-avatar">
                            {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                        </div>

                        <div>
                            <strong>{{ auth()->user()->name ?? 'Penulis' }}</strong>
                            <small>{{ auth()->user()->email ?? '' }}</small>
                            <span class="account-role">
                                <i class="fa-solid fa-pen-nib"></i> Akun Penulis
                            </span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}"
                        class="account-logout-form">
                        @csrf

                        <button type="submit">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Keluar dari Akun
                        </button>
                    </form>
                </div>
            </div>

        </header>

        <div class="content">

            <!-- HERO -->
            <section class="hero">
                <div class="hero-copy">
                    <h1><span>Halo,</span> {{ auth()->check() ? auth()->user()->name : 'Annisa Dwi Lestari' }}!</h1>

                    <p>
                        Terima kasih sudah menjadi bagian dari Derap Serayu.
                        Terus berkarya, bagikan cerita terbaik tentang Banjarnegara
                        untuk pembaca di seluruh Indonesia.
                    </p>

                    <div class="quote">
                        <b>“</b>
                        <span>Tulisan yang baik bukan hanya memberi informasi,
                        tapi juga menghadirkan harapan.</span>
                    </div>
                </div>

                <div class="hero-cta">
                    <h2>Mulai Menulis</h2>
                    <p>Bagikan ide, cerita, dan pengalamanmu kepada dunia.</p>
                    <a href="{{ route('penulis.artikel.create') }}" class="btn-primary">
                        <i class="fa-solid fa-pen"></i>
                        Tulis Artikel Baru
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </section>

            <!-- STATISTIK -->
            <section class="stats">
                <article class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>
                    <div class="stat-info">
                        <div class="label">Total Artikel</div>
                        <div class="value">{{ $totalArtikel }}</div>
                        <small>Total tulisan milikmu</small>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon green">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                    <div class="stat-info">
                        <div class="label">Pembaca Website</div>
                        <div class="value">{{ number_format($totalPembaca, 0, ',', '.') }}</div>
                        <small>Total akun pembaca terdaftar</small>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <div class="label">Draft</div>
                        <div class="value">{{ $totalDraft }}</div>
                        <small>Belum dikirim untuk ditinjau</small>
                    </div>
                </article>

                <a href="{{ url('/') }}" target="_blank" class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </div>
                    <div class="stat-info">
                        <div class="label">Lihat Website</div>
                        <div class="value">→</div>
                        <small>Buka halaman website</small>
                    </div>
                </a>
            </section>

            <!-- KONTEN DASHBOARD -->
            <section class="dashboard-grid">

                <!-- RINGKASAN TAYANGAN -->
                <article class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa-solid fa-chart-column"></i>
                            <div>
                                <h3>Artikel Terpopuler</h3>
                                <p>Diurutkan berdasarkan tayangan</p>
                            </div>
                        </div>

                    </div>

                    <div class="article-list">
                        @forelse($artikelTeratas as $artikel)
                            <a href="{{ route('articles.show', $artikel->slug) }}"
                               class="article-item">
                                <div class="mini-icon"><i class="fa-regular fa-file-lines"></i></div>
                                <div class="article-body">
                                    <div class="article-name">{{ $artikel->title }}</div>
                                    <div class="article-meta">
                                        <span><i class="fa-regular fa-eye"></i>{{ number_format($artikel->views, 0, ',', '.') }} tayangan</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="empty-state">Artikel yang sudah terbit akan muncul di sini setelah dibaca.</p>
                        @endforelse
                    </div>

                    <div class="chart-summary">
                        <div class="mini-stat">
                            <div class="mini-icon"><i class="fa-regular fa-eye"></i></div>
                            <div>
                                <small>Total Tayangan</small>
                                <strong>{{ number_format($totalTayangan, 0, ',', '.') }}</strong>
                            </div>
                        </div>

                        <div class="mini-stat">
                            <div class="mini-icon"><i class="fa-solid fa-user"></i></div>
                            <div>
                                <small>Pembaca Website</small>
                                <strong>{{ number_format($totalPembaca, 0, ',', '.') }}</strong>
                            </div>
                        </div>

                        <div class="mini-stat">
                            <div class="mini-icon"><i class="fa-regular fa-clock"></i></div>
                            <div>
                                <small>Artikel Terbit</small>
                                <strong>{{ $totalTerbit }}</strong>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- ARTIKEL TERBARU -->
                <article class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa-regular fa-file-lines"></i>
                            <div>
                                <h3>Artikel Terbaru</h3>
                            </div>
                        </div>
                        <a href="{{ route('penulis.articles.index') }}" class="text-link">
                            Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="article-list" id="articleList">
                        @forelse($artikelTerbaru as $artikel)
                            @php
                                $statusLabel = match ($artikel->status) {
                                    'review' => 'DITINJAU',
                                    'published' => 'TERBIT',
                                    'rejected' => 'REVISI',
                                    default => 'DRAFT',
                                };
                            @endphp

                            <a href="{{ $artikel->status === 'published' ? route('articles.show', $artikel->slug) : route('penulis.articles.edit', $artikel) }}"
                               class="article-item">
                                <img
                                    class="article-thumb"
                                    src="{{ $artikel->cover_image_path ? Storage::disk('public')->url($artikel->cover_image_path) : asset('images/bg-dieng-home.jpg') }}"
                                    alt="{{ $artikel->title }}">

                                <div class="article-body">
                                    <div class="article-name-row">
                                        <div class="article-name">{{ $artikel->title }}</div>
                                        <span class="status {{ $artikel->status === 'published' ? 'published' : 'draft' }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </div>

                                    <div class="article-meta">
                                        <span><i class="fa-regular fa-calendar"></i>{{ $artikel->created_at->format('d M Y') }}</span>
                                        <span><i class="fa-regular fa-eye"></i>{{ $artikel->views }}</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="empty-state">Artikel yang kamu tulis akan tampil di sini.</p>
                        @endforelse
                    </div>
                </article>

                <!-- PANDUAN DAN NOTIFIKASI -->
                <div class="right-column">

                    <article class="panel guide">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="fa-regular fa-file-lines"></i>
                                <div>
                                    <h3>Panduan Menulis</h3>
                                </div>
                            </div>
                        </div>

                        <p>
                            Kenali panduan penulisan agar artikelmu informatif,
                            menarik, dan sesuai dengan karakter majalah Derap Serayu.
                        </p>

                        <button type="button" class="btn-outline"
                                onclick="openWritingGuide()">
                            Baca Panduan
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                        <i class="fa-regular fa-lightbulb guide-illustration"></i>
                    </article>

                    <article class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="fa-regular fa-bell"></i>
                                <div>
                                    <h3>Status &amp; Masukan Redaksi</h3>
                                </div>
                            </div>
                            <a href="{{ route('penulis.articles.index') }}" class="text-link">
                                Semua Artikel <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>

                        <div class="notification-list">
                            @forelse($artikelPerhatian as $artikel)
                                <a href="{{ route('penulis.articles.edit', $artikel) }}" class="notice">
                                    <div class="notice-icon {{ $artikel->status === 'rejected' ? 'orange-bg' : 'blue-bg' }}">
                                        <i class="fa-solid {{ $artikel->status === 'rejected' ? 'fa-pen-to-square' : 'fa-clock' }}"></i>
                                    </div>
                                    <div class="notice-content">
                                        <strong>{{ $artikel->status === 'rejected' ? 'Artikel perlu direvisi' : 'Artikel menunggu tinjauan' }}</strong>
                                        <p>{{ $artikel->title }}</p>
                                        @if($artikel->review_note)
                                            <p>{{ $artikel->review_note }}</p>
                                        @endif
                                    </div>
                                </a>
                            @empty
                                <p class="empty-state">Belum ada artikel yang menunggu tinjauan atau memerlukan revisi.</p>
                            @endforelse
                        </div>
                    </article>

                    <div class="guide-modal" id="writingGuideModal"
                        aria-hidden="true">

                        <div class="guide-modal-backdrop"
                            onclick="closeWritingGuide()"></div>

                        <div class="guide-modal-content"
                            role="dialog"
                            aria-modal="true"
                            aria-labelledby="guideModalTitle">

                            <div class="guide-modal-header">
                                <div class="guide-modal-icon">
                                    <i class="fa-solid fa-book-open"></i>
                                </div>

                                <div>
                                    <span class="guide-eyebrow">DERAP SERAYU</span>
                                    <h2 id="guideModalTitle">Panduan Penulisan Artikel</h2>
                                    <p>Pedoman bagi penulis majalah online Banjarnegara</p>
                                </div>

                                <button type="button" class="guide-close"
                                        onclick="closeWritingGuide()"
                                        aria-label="Tutup panduan">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <div class="guide-modal-body">

                                <div class="guide-intro">
                                    <i class="fa-solid fa-feather-pointed"></i>
                                    <p>
                                        Setiap cerita memiliki makna. Melalui Derap Serayu,
                                        mari hadirkan tulisan yang menginformasikan,
                                        menginspirasi, dan memperkenalkan kekayaan
                                        Banjarnegara kepada lebih banyak pembaca.
                                    </p>
                                </div>

                                <section class="guide-section">
                                    <h3><span>01</span> Pilih topik yang relevan</h3>
                                    <p>
                                        Tulislah hal-hal yang menarik, bermanfaat, dan memiliki
                                        keterkaitan dengan masyarakat atau kehidupan di Banjarnegara.
                                        Kamu dapat memilih kategori berikut:
                                    </p>

                                    <div class="guide-category-list">
                                        <div><i class="fa-solid fa-book-open"></i>
                                            <span><b>Cerita</b><small>Kisah, pengalaman, dan cerita inspiratif.</small></span>
                                        </div>
                                        <div><i class="fa-solid fa-masks-theater"></i>
                                            <span><b>Budaya</b><small>Tradisi, kesenian, adat, dan kearifan lokal.</small></span>
                                        </div>
                                        <div><i class="fa-solid fa-comment-dots"></i>
                                            <span><b>Opini</b><small>Pendapat dan gagasan yang disertai alasan.</small></span>
                                        </div>
                                        <div><i class="fa-solid fa-user"></i>
                                            <span><b>Sosok</b><small>Profil dan kisah orang yang menginspirasi.</small></span>
                                        </div>
                                        <div><i class="fa-solid fa-mountain-sun"></i>
                                            <span><b>Potensi</b><small>Wisata, UMKM, ekonomi, dan keunggulan daerah.</small></span>
                                        </div>
                                        <div><i class="fa-solid fa-microchip"></i>
                                            <span><b>Teknologi</b><small>Inovasi dan perkembangan teknologi.</small></span>
                                        </div>
                                        <div><i class="fa-solid fa-city"></i>
                                            <span><b>Sudut Kota</b><small>Tempat, ruang publik, dan kehidupan perkotaan.</small></span>
                                        </div>
                                    </div>
                                </section>

                                <section class="guide-section">
                                    <h3><span>02</span> Susun artikel dengan jelas</h3>
                                    <ul class="guide-list">
                                        <li><b>Judul:</b> singkat, spesifik, menarik, dan mewakili isi artikel.</li>
                                        <li><b>Pembuka:</b> perkenalkan topik dan alasan pembaca perlu mengetahuinya.</li>
                                        <li><b>Isi:</b> kembangkan informasi secara runtut dengan paragraf yang nyaman dibaca.</li>
                                        <li><b>Penutup:</b> simpulkan pembahasan atau berikan pesan yang relevan.</li>
                                        <li><b>Ringkasan:</b> jika tersedia, tulis deskripsi singkat yang menggambarkan inti artikel.</li>
                                    </ul>
                                </section>

                                <section class="guide-section">
                                    <h3><span>03</span> Perhatikan kualitas informasi</h3>
                                    <ul class="guide-list">
                                        <li>Gunakan bahasa Indonesia yang baik, jelas, dan mudah dipahami.</li>
                                        <li>Pastikan nama orang, tempat, tanggal, angka, dan fakta ditulis secara akurat.</li>
                                        <li>Untuk berita atau informasi faktual, gunakan sumber yang dapat dipercaya.</li>
                                        <li>Bedakan fakta dan opini. Hindari informasi yang belum terverifikasi.</li>
                                        <li>Jangan menyalin tulisan orang lain tanpa izin atau mencantumkan sumber yang semestinya.</li>
                                        <li>Hormati privasi dan hindari konten yang mengandung fitnah, diskriminasi, atau ujaran kebencian.</li>
                                    </ul>
                                </section>

                                <section class="guide-section">
                                    <h3><span>04</span> Gunakan gambar yang sesuai</h3>
                                    <p>
                                        Pilih gambar yang relevan dengan isi artikel, memiliki kualitas
                                        yang baik, dan tidak buram. Pastikan kamu memiliki hak atau izin
                                        untuk menggunakannya. Cantumkan sumber atau kredit gambar jika diperlukan.
                                    </p>
                                </section>

                                <section class="guide-section">
                                    <h3><span>05</span> Periksa sebelum dikirim</h3>

                                    <div class="guide-checklist">
                                        <label><input type="checkbox"> Judul sesuai dengan isi artikel.</label>
                                        <label><input type="checkbox"> Ejaan dan tanda baca sudah diperiksa.</label>
                                        <label><input type="checkbox"> Fakta dan sumber informasi sudah dicek.</label>
                                        <label><input type="checkbox"> Gambar sesuai dan layak digunakan.</label>
                                        <label><input type="checkbox"> Artikel tidak menyalin karya orang lain.</label>
                                    </div>
                                </section>

                                <div class="guide-workflow">
                                    <h3><i class="fa-solid fa-route"></i> Alur pengiriman artikel</h3>
                                    <div class="workflow-steps">
                                        <div><span>1</span><b>Tulis</b><small>Buat artikel baru</small></div>
                                        <i class="fa-solid fa-chevron-right"></i>
                                        <div><span>2</span><b>Simpan</b><small>Simpan sebagai draft jika belum selesai</small></div>
                                        <i class="fa-solid fa-chevron-right"></i>
                                        <div><span>3</span><b>Kirim</b><small>Ajukan untuk ditinjau redaksi</small></div>
                                    </div>
                                    <p>
                                        Setelah dikirim, pantau status artikel pada menu
                                        <b>Artikel Saya</b>. Jika redaksi meminta revisi, perbaiki
                                        artikel sesuai masukan sebelum mengirimkannya kembali.
                                    </p>
                                </div>

                                <div class="guide-note">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <p>
                                        <b>Catatan:</b> Panduan ini merupakan pedoman umum penulisan
                                        Derap Serayu. Ikuti ketentuan tambahan yang diberikan redaksi
                                        apabila ada.
                                    </p>
                                </div>
                            </div>

                            <div class="guide-modal-footer">
                                <button type="button" class="guide-secondary-btn"
                                        onclick="closeWritingGuide()">
                                    Tutup Panduan
                                </button>

                                <a href="{{ route('penulis.artikel.create') }}"
                                class="guide-start-btn">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Mulai Menulis Artikel
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- BANNER PENUTUP -->
            <section class="bottom-banner">
                <div class="banner-mark">
                    <i class="fa-solid fa-seedling"></i>
                </div>

                <div>
                    <p>Menulis bukan hanya tentang kata,<br>
                    tapi tentang bagaimana kita bisa memberi arti.</p>
                    <small>— Derap Serayu</small>
                </div>

                <div class="banner-signature">
                    Bersama<br>
                    Membangun Cerita<br>
                    Banjarnegara
                </div>
            </section>

        </div>
    </main>
</div>

<script>
    // Sidebar untuk tampilan mobile
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('mobileOverlay').classList.toggle('show');
    }

    function openWritingGuide() {
        const modal = document.getElementById('writingGuideModal');

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('guide-modal-open');

        const closeButton = modal.querySelector('.guide-close');
        closeButton.focus();
    }

    function closeWritingGuide() {
        const modal = document.getElementById('writingGuideModal');

        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('guide-modal-open');
    }

    // Tutup panduan menggunakan tombol Escape.
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeWritingGuide();
        }
    });

    // Cuaca terkini Banjarnegara menggunakan Open-Meteo.
    async function loadBanjarnegaraWeather() {
        const temperature = document.getElementById('weatherTemperature');
        const description = document.getElementById('weatherDescription');
        const icon = document.getElementById('weatherIcon');

        if (!temperature || !description || !icon) return;

        const weatherDescriptions = {
            0: ['Cerah', 'fa-sun'],
            1: ['Cerah berawan', 'fa-cloud-sun'],
            2: ['Berawan sebagian', 'fa-cloud-sun'],
            3: ['Berawan', 'fa-cloud'],
            45: ['Berkabut', 'fa-smog'],
            48: ['Kabut tebal', 'fa-smog'],
            51: ['Gerimis ringan', 'fa-cloud-rain'],
            53: ['Gerimis', 'fa-cloud-rain'],
            55: ['Gerimis lebat', 'fa-cloud-showers-heavy'],
            61: ['Hujan ringan', 'fa-cloud-rain'],
            63: ['Hujan sedang', 'fa-cloud-showers-heavy'],
            65: ['Hujan lebat', 'fa-cloud-showers-heavy'],
            71: ['Salju ringan', 'fa-snowflake'],
            73: ['Salju', 'fa-snowflake'],
            75: ['Salju lebat', 'fa-snowflake'],
            80: ['Hujan lokal', 'fa-cloud-rain'],
            81: ['Hujan lokal', 'fa-cloud-showers-heavy'],
            82: ['Hujan lokal lebat', 'fa-cloud-showers-heavy'],
            95: ['Badai petir', 'fa-cloud-bolt'],
            96: ['Badai petir dan hujan es', 'fa-cloud-bolt'],
            99: ['Badai petir kuat', 'fa-cloud-bolt']
        };

        try {
            const url =
                'https://api.open-meteo.com/v1/forecast' +
                '?latitude=-7.396' +
                '&longitude=109.691' +
                '&current=temperature_2m,weather_code,is_day' +
                '&timezone=Asia%2FJakarta';

            const response = await fetch(url);

            if (!response.ok) {
                throw new Error('Data cuaca tidak tersedia');
            }

            const data = await response.json();
            const current = data.current;

            const weather = weatherDescriptions[current.weather_code]
                || ['Kondisi cuaca', 'fa-cloud'];

            temperature.textContent =
                `${Math.round(current.temperature_2m)}°C`;

            description.textContent = weather[0];

            icon.className = `fa-solid ${weather[1]} sun`;

            // Sesuaikan warna ikon dengan kondisi cuaca.
            icon.style.color = current.is_day ? '#ffad1f' : '#7294ad';

            document.getElementById('weatherWidget')
                .setAttribute('title', 'Cuaca terkini Banjarnegara');
        } catch (error) {
            temperature.textContent = '--°C';
            description.textContent = 'Cuaca tidak tersedia';
            icon.className = 'fa-solid fa-cloud sun';
        }
    }

    loadBanjarnegaraWeather();

    // Membuka atau menutup dropdown akun dan notifikasi.
    function toggleTopDropdown(dropdownId, trigger) {
        const dropdown = document.getElementById(dropdownId);
        const isAlreadyOpen = dropdown.classList.contains('show');

        // Tutup dropdown lain yang sedang terbuka.
        document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });

        document.querySelectorAll('.dropdown-trigger').forEach(button => {
            button.setAttribute('aria-expanded', 'false');
        });

        // Buka dropdown yang dipilih.
        if (!isAlreadyOpen) {
            dropdown.classList.add('show');
            trigger.setAttribute('aria-expanded', 'true');
        }
    }

    // Tutup dropdown saat klik di luar menu.
    document.addEventListener('click', function (event) {
        if (!event.target.closest('.top-dropdown')) {
            document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });

            document.querySelectorAll('.dropdown-trigger').forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });

    // Tutup dropdown saat tombol Escape ditekan.
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });

            document.querySelectorAll('.dropdown-trigger').forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });
</script>
</body>
</html>