
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
    </style>
</head>

<body>
<div class="app">

    <div class="mobile-overlay" id="mobileOverlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('images/logo-derap-serayu.png') }}" alt="Logo Derap Serayu"
                 onerror="this.style.display='none'">
            <div>
                <div class="brand-name">Derap<span>Serayu</span></div>
                <small>Media Informasi Banjarnegara</small>
            </div>
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

            <div class="nav-caption">AKUN</div>

        </nav>

        <div class="side-spacer"></div>

        <div class="profile">
            <div class="avatar">A</div>
            <div>
                <strong>{{ auth()->check() ? auth()->user()->name : 'Annisa Dwi Lestari' }}</strong>
                <small>Penulis</small>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span>Keluar</span>
            </button>
        </form>
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

            <div class="top-item">
                <a class="notification-button" href="{{ route('penulis.articles.index') }}"
                   aria-label="Lihat status artikel">
                    <i class="fa-regular fa-bell"></i>
                </a>
            </div>

            <div class="top-item weather">
                <i class="fa-solid fa-sun sun"></i>
                <div>
                    <strong>24°C</strong>
                    <small>Banjarnegara</small>
                </div>
            </div>

            <div class="top-item user-top">
                <div class="user-avatar">A</div>
                <div class="user-text">
                    <strong>{{ auth()->check() ? auth()->user()->name : 'Annisa Dwi Lestari' }}</strong>
                    <small>Penulis</small>
                </div>
                <i class="fa-solid fa-chevron-down" style="font-size:10px"></i>
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

                        <p>Mulai tulis, simpan sebagai draft, atau kirim artikel untuk ditinjau redaksi.</p>

                        <a href="{{ route('penulis.artikel.create') }}" class="btn-outline">
                            Mulai Menulis &nbsp; <i class="fa-solid fa-arrow-right"></i>
                        </a>

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

</script>
</body>
</html>