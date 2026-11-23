
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --navy: #073b59;
            --navy-dark: #062f47;
            --cyan: #08a4c5;
            --cyan-dark: #0787a8;
            --cyan-soft: #e5f8fd;
            --blue-soft: #f0faff;
            --page: #f4fbfe;
            --white: #ffffff;
            --text: #123d5b;
            --muted: #7995aa;
            --border: #dceef6;
            --green: #00ae91;
            --orange: #f6a623;
            --purple: #8965ec;
            --red: #ed796a;
            --shadow: 0 8px 28px rgba(20, 88, 120, .06);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--page);
            color: var(--text);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font: inherit;
        }

        .app {
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 270px;
            background: linear-gradient(180deg, #073e59, #052f47 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform .3s ease;
        }

        .brand {
            min-height: 104px;
            padding: 22px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        .brand-mark {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.2);
            display: grid;
            place-items: center;
            color: #67e5f5;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            font-weight: 800;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            line-height: 1.2;
            font-weight: 800;
        }

        .brand-name span {
            color: #5ce0f0;
        }

        .brand-caption {
            margin-top: 4px;
            color: #c2e7f1;
            font-size: 9px;
            letter-spacing: 1.6px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .nav-section {
            padding: 27px 18px 8px;
            color: #86c8db;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-list {
            padding: 0 14px;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            min-height: 48px;
            border-radius: 13px;
            color: #d8edf5;
            font-size: 13px;
            font-weight: 700;
            transition: .2s ease;
        }

        .nav-link i {
            width: 19px;
            text-align: center;
            font-size: 16px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: linear-gradient(110deg, #0da8c9, #078bb2);
            color: #fff;
            box-shadow: 0 7px 18px rgba(0, 166, 200, .2);
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 18px;
            border-top: 1px solid rgba(255,255,255,.12);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 7px 7px 17px;
        }

        .avatar {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #16abc8, #087c9f);
            color: white;
            font-size: 17px;
            font-weight: 800;
            border: 2px solid rgba(255,255,255,.3);
        }

        .profile-name {
            font-size: 12px;
            font-weight: 800;
        }

        .profile-role {
            font-size: 10px;
            color: #9ed7e5;
            margin-top: 4px;
        }

        .logout-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 9px;
            color: #d9edf5;
            font-size: 12px;
            font-weight: 700;
            border-radius: 10px;
        }

        .logout-link:hover {
            background: rgba(255,255,255,.09);
            color: #fff;
        }

        /* MAIN CONTENT */

        .main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            min-height: 78px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 13px 32px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 17px;
        }

        .topbar-date {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--text);
            font-size: 11px;
            font-weight: 700;
            padding: 11px 14px;
            border: 1px solid var(--border);
            background: #fff;
            border-radius: 12px;
            white-space: nowrap;
        }

        .topbar-date i {
            color: var(--cyan);
        }

        .admin-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 11px 14px;
            background: #e9f9fd;
            border: 1px solid #d6f0f7;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
        }

        .admin-chip i {
            color: var(--cyan-dark);
        }

        .mobile-menu {
            display: none;
            width: 42px;
            height: 42px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            color: var(--navy);
            cursor: pointer;
        }

        .content {
            width: 100%;
            max-width: 1700px;
            margin: 0 auto;
            padding: 30px 32px 20px;
        }

        /* PAGE HEADING */

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--cyan-dark);
            font-size: 10px;
            letter-spacing: 2.5px;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .eyebrow::before {
            content: '';
            width: 23px;
            height: 2px;
            background: var(--cyan);
        }

        .page-heading h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(27px, 3vw, 38px);
            line-height: 1.2;
            letter-spacing: -.8px;
            color: var(--navy);
        }

        .page-heading p {
            margin-top: 8px;
            font-size: 12px;
            color: var(--muted);
            line-height: 1.7;
        }

        /* HERO */

        .hero {
            min-height: 225px;
            overflow: hidden;
            position: relative;
            isolation: isolate;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            padding: 34px 38px;
            margin-bottom: 30px;
            border-radius: 22px;
            color: #fff;
            background:
                linear-gradient(100deg, rgba(3,49,75,.96) 0%, rgba(4,101,130,.88) 58%, rgba(9,171,196,.73) 100%),
                url('https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=1800&q=85')
                center 48% / cover no-repeat;
            box-shadow: 0 12px 32px rgba(7, 81, 113, .13);
        }

        .hero::before,
        .hero::after {
            content: '';
            position: absolute;
            z-index: -1;
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero::before {
            width: 330px;
            height: 330px;
            right: 80px;
            top: -180px;
        }

        .hero::after {
            width: 260px;
            height: 260px;
            right: 115px;
            top: -145px;
        }

        .hero-copy {
            max-width: 650px;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,.25);
            background: rgba(255,255,255,.1);
            color: #d8faff;
            font-size: 10px;
            letter-spacing: 1.4px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .hero h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(25px, 3vw, 35px);
            line-height: 1.3;
            margin-bottom: 10px;
        }

        .hero h2 span {
            color: #86f0fa;
        }

        .hero p {
            color: #e0f5fb;
            font-size: 12px;
            line-height: 1.9;
            max-width: 600px;
        }

        .hero-quote {
            display: flex;
            gap: 11px;
            align-items: center;
            max-width: 470px;
            margin-top: 20px;
            padding: 12px 15px;
            background: rgba(0, 39, 64, .2);
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 14px;
            color: #f0fcff;
            font-size: 10px;
            line-height: 1.7;
        }

        .hero-quote i {
            font-size: 19px;
            color: #7be8f5;
        }

        .hero-side {
            width: 205px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-icon {
            width: 130px;
            height: 130px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: rgba(255,255,255,.11);
            border: 1px solid rgba(255,255,255,.35);
            box-shadow: 0 0 0 17px rgba(255,255,255,.06),
                        0 0 0 34px rgba(255,255,255,.035);
            color: #b7f4fb;
            font-size: 48px;
        }

        /* SECTION HEADING */

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 16px;
        }

        .section-heading h3 {
            font-family: 'Playfair Display', serif;
            color: var(--navy);
            font-size: 21px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 5px;
        }

        .section-note {
            font-size: 10px;
            color: #7595a9;
            white-space: nowrap;
        }

        .section-note i {
            color: var(--cyan);
            margin-right: 5px;
        }

        /* STATISTICS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 30px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 20px 18px 18px;
            min-height: 158px;
            box-shadow: var(--shadow);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(20,88,120,.1);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            font-size: 17px;
        }

        .stat-icon.blue {
            background: #e4f5ff;
            color: #139bde;
        }

        .stat-icon.orange {
            background: #fff3dc;
            color: #e99a18;
        }

        .stat-icon.green {
            background: #def8ef;
            color: #00a980;
        }

        .stat-icon.red {
            background: #ffebe6;
            color: #e47763;
        }

        .stat-icon.purple {
            background: #f0eaff;
            color: #8964e9;
        }

        .stat-number {
            margin-top: 14px;
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            line-height: 1.1;
            color: var(--navy);
            font-weight: 800;
        }

        .stat-label {
            margin-top: 6px;
            color: #54758d;
            font-size: 11px;
            font-weight: 700;
        }

        .stat-description {
            margin-top: 5px;
            color: #92aabb;
            font-size: 9px;
            line-height: 1.5;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #77d9ed;
        }

        .stat-card:nth-child(2)::after { background: #f5c46c; }
        .stat-card:nth-child(3)::after { background: #6ad7b0; }
        .stat-card:nth-child(4)::after { background: #f5a28f; }
        .stat-card:nth-child(5)::after { background: #b4a1f2; }
        .stat-card:nth-child(6)::after { background: #6ad7b0; }
        .stat-card:nth-child(7)::after { background: #f5c46c; }
        .stat-card:nth-child(8)::after { background: #b4a1f2; }
        .stat-card:nth-child(9)::after { background: #f5a28f; }
        .stat-card:nth-child(10)::after { background: #77d9ed; }
        .stat-card:nth-child(11)::after { background: #f5c46c; }
        .stat-card:nth-child(12)::after { background: #6ad7b0; }
        .stat-card:nth-child(13)::after { background: #b4a1f2; }

        /* CONTENT PANELS */

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr);
            gap: 20px;
            margin-bottom: 22px;
        }

        .panel {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 19px;
            padding: 23px;
            box-shadow: var(--shadow);
            min-width: 0;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 21px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .panel-icon {
            width: 41px;
            height: 41px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: #e6f8fd;
            border-radius: 13px;
            color: var(--cyan-dark);
            font-size: 16px;
        }

        .panel-title h3 {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            color: var(--navy);
        }

        .panel-title p {
            margin-top: 4px;
            font-size: 10px;
            line-height: 1.5;
            color: var(--muted);
        }

        .text-link {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 11px;
            border-radius: 10px;
            color: var(--cyan-dark);
            border: 1px solid #d8eef6;
            font-size: 10px;
            font-weight: 800;
            transition: .2s;
        }

        .text-link:hover {
            background: var(--cyan-soft);
        }

        /* REVIEW QUEUE */

        .review-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .review-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px;
            background: #f7fcff;
            border: 1px solid #e5f2f8;
            border-radius: 13px;
            transition: .2s;
        }

        .review-item:hover {
            border-color: #a8e1f0;
            background: #f1fbff;
        }

        .review-thumb {
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            border-radius: 11px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #dff7fc, #bcecf5);
            color: #159bb9;
            font-size: 20px;
            overflow: hidden;
        }

        .review-thumb img,
        .article-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .review-info {
            min-width: 0;
            flex: 1;
        }

        .review-info h4 {
            color: var(--navy);
            font-size: 12px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .review-info p {
            margin-top: 5px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
        }

        .review-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 7px;
            color: #8ba5b6;
            font-size: 9px;
        }

        .review-meta i {
            margin-right: 4px;
            color: #64a8c4;
        }

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            padding: 6px 9px;
            border-radius: 30px;
            font-size: 9px;
            font-weight: 800;
            white-space: nowrap;
            text-transform: uppercase;
        }

        .status.pending {
            background: #fff1d2;
            color: #a86a00;
        }

        .status.published {
            background: #def8eb;
            color: #00855f;
        }

        .status.revision {
            background: #ffebe7;
            color: #c64d3d;
        }

        .status.draft {
            background: #eee9ff;
            color: #7150d4;
        }

        .empty-state {
            text-align: center;
            padding: 32px 15px;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 29px;
            color: #9bd9e9;
            margin-bottom: 12px;
        }

        .empty-state p {
            font-size: 12px;
            line-height: 1.7;
        }

        /* LATEST ARTICLES */

        .article-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .article-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding-bottom: 14px;
            border-bottom: 1px solid #edf4f8;
        }

        .article-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .article-thumb {
            width: 67px;
            height: 64px;
            border-radius: 11px;
            flex-shrink: 0;
            background: #e3f5fa;
            display: grid;
            place-items: center;
            color: var(--cyan-dark);
            overflow: hidden;
            font-size: 20px;
        }

        .article-info {
            min-width: 0;
            flex: 1;
        }

        .article-info h4 {
            color: var(--navy);
            font-size: 12px;
            line-height: 1.65;
            margin-bottom: 6px;
            overflow-wrap: anywhere;
        }

        .article-info p {
            color: #8ba4b5;
            font-size: 9px;
            line-height: 1.8;
        }

        .article-info p i {
            color: #69a9c3;
            margin-right: 4px;
        }

        .article-status {
            margin-top: 7px;
        }

        /* LOWER SUMMARY */

        .bottom-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .district-coverage-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .district-section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
            color: var(--navy);
            font-size: 12px;
            font-weight: 800;
        }

        .district-section-heading span {
            color: var(--muted);
            font-size: 10px;
            font-weight: 600;
        }

        .district-article-list {
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .district-article-row {
            display: grid;
            gap: 7px;
        }

        .district-article-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            color: #42657b;
            font-size: 11px;
        }

        .district-article-meta strong {
            color: var(--navy);
            font-size: 11px;
        }

        .district-progress {
            height: 7px;
            overflow: hidden;
            background: #e8f3f8;
            border-radius: 999px;
        }

        .district-progress span {
            display: block;
            height: 100%;
            background: linear-gradient(90deg, #0da8c9, #54c7d7);
            border-radius: inherit;
        }

        .district-empty-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .district-empty-chip {
            padding: 8px 11px;
            color: #55788d;
            background: #f3f9fc;
            border: 1px solid #e2eff5;
            border-radius: 10px;
            font-size: 10px;
            font-weight: 700;
        }

        .district-coverage-note {
            margin-top: 18px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
        }

        /* FOOTER */

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            padding: 19px 0 8px;
            border-top: 1px solid #dfedf4;
            color: #8aa4b5;
            font-size: 10px;
        }

        .footer strong {
            color: var(--cyan-dark);
        }

        /* RESPONSIVE */

        @media (max-width: 1250px) {
            .main {
                margin-left: 260px;
            }

            .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .topbar {
                padding-inline: 23px;
            }

            .content {
                padding-inline: 23px;
            }
        }

        @media (max-width: 950px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 10px 0 30px rgba(0,0,0,.12);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main {
                margin-left: 0;
            }

            .mobile-menu {
                display: block;
            }

            .topbar {
                gap: 12px;
                padding: 12px 18px;
            }

            .dashboard-grid,
            .bottom-grid {
                grid-template-columns: 1fr;
            }

            .hero-side {
                width: 145px;
            }

            .hero-icon {
                width: 100px;
                height: 100px;
                font-size: 37px;
            }
        }

        @media (max-width: 620px) {
            .topbar {
                flex-wrap: wrap;
            }

            .topbar-right {
                margin-left: auto;
                gap: 8px;
            }

            .topbar-date {
                display: none;
            }

            .admin-chip {
                padding: 10px;
                font-size: 10px;
            }

            .content {
                padding: 22px 14px 15px;
            }

            .page-heading {
                align-items: flex-start;
            }

            .page-heading h1 {
                font-size: 29px;
            }

            .hero {
                padding: 25px 22px;
                min-height: 0;
            }

            .hero-side {
                display: none;
            }

            .hero h2 {
                font-size: 26px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
                min-height: 145px;
            }

            .stat-number {
                font-size: 28px;
            }

            .panel {
                padding: 16px;
            }

            .panel-header {
                align-items: flex-start;
            }

            .panel-title h3 {
                font-size: 15px;
            }

            .text-link {
                font-size: 9px;
                padding: 8px;
            }

            .review-item {
                flex-wrap: wrap;
            }

            .review-item .status {
                margin-left: 68px;
            }

            .quick-stats {
                grid-template-columns: 1fr;
            }

            .quick-stat {
                display: grid;
                grid-template-columns: 28px 1fr;
                column-gap: 10px;
                align-items: center;
            }

            .quick-stat strong {
                margin-top: 0;
            }

            .quick-stat span {
                grid-column: 2;
                margin-top: 0;
            }

            .footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }


        /* BRAND / LOGO DERAP SERAYU */
        .brand {
            width: 100%;
            min-height: 112px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            text-decoration: none;
            box-sizing: border-box;
        }

        /* Kotak putih untuk membuat logo lebih jelas */
        .brand-logo-wrapper {
            width: 100%;
            max-width: 210px;
            height: 72px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-sizing: border-box;

            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.75);
            border-radius: 15px;
            box-shadow: 0 5px 16px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        /* Ukuran gambar logo */
        .brand-logo {
            display: block;
            width: 100%;
            height: 100%;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            object-position: center;
        }

        @media (max-width: 768px) {
            .brand {
                min-height: 96px;
                padding: 14px;
            }

            .brand-logo-wrapper {
                max-width: 180px;
                height: 62px;
            }
        }

        
        /* HEADER ADMINISTRATOR */
        .admin-account {
            position: relative;
            display: inline-flex;
            align-items: center;
            z-index: 100;
        }

        .admin-chip {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 44px;
            padding: 10px 15px;
            border: 1px solid #d5edf5;
            border-radius: 14px;
            background: linear-gradient(135deg, #effbff, #e5f7fc);
            color: #104461;
            font: inherit;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: all .2s ease;
        }

        .admin-chip:hover,
        .admin-chip[aria-expanded="true"] {
            background: #dff6fc;
            border-color: #83d9eb;
            box-shadow: 0 5px 16px rgba(0, 133, 166, .12);
        }

        .admin-chip-icon {
            width: 26px;
            height: 26px;
            display: grid;
            place-items: center;
            border-radius: 9px;
            background: #d5f3fb;
            color: #0797b8;
        }

        .admin-chip-text {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .admin-chevron {
            font-size: 10px;
            transition: transform .2s ease;
        }

        .admin-chip[aria-expanded="true"] .admin-chevron {
            transform: rotate(180deg);
        }

        /* DROPDOWN AKUN */
        .admin-dropdown {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            width: 290px;
            padding: 12px;
            background: #ffffff;
            border: 1px solid #dceef5;
            border-radius: 18px;
            box-shadow: 0 18px 45px rgba(7, 48, 69, .18);
            animation: adminDropdownIn .18s ease;
        }

        .admin-dropdown[hidden],
        .admin-modal-overlay[hidden] {
            display: none !important;
        }

        @keyframes adminDropdownIn {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .admin-dropdown-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 8px 14px;
        }

        .admin-avatar,
        .admin-modal-avatar {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 14px;
            background: linear-gradient(135deg, #087f9e, #19bfd0);
            color: #ffffff;
            font-weight: 800;
        }

        .admin-avatar {
            width: 46px;
            height: 46px;
            font-size: 20px;
        }

        .admin-profile-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
        }

        .admin-profile-info strong {
            color: #123e56;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        .admin-profile-info span {
            color: #7894a5;
            font-size: 11px;
            overflow-wrap: anywhere;
        }

        .admin-profile-info small {
            color: #079a83;
            font-size: 10px;
            font-weight: 700;
        }

        .admin-profile-info small i {
            font-size: 7px;
        }

        .admin-dropdown-divider {
            height: 1px;
            margin: 4px 0;
            background: #eaf2f6;
        }

        .admin-dropdown-label {
            padding: 10px 9px 6px;
            color: #8ba5b4;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.2px;
        }

        .admin-dropdown-item {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px 10px;
            border: 0;
            border-radius: 10px;
            background: transparent;
            color: #31566c;
            text-align: left;
            text-decoration: none;
            font: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s ease, color .2s ease;
        }

        .admin-dropdown-item i {
            width: 18px;
            text-align: center;
            font-size: 15px;
        }

        .admin-dropdown-item:hover {
            background: #effaff;
            color: #008eae;
        }

        .admin-logout-item {
            color: #d94d55;
        }

        .admin-logout-item:hover {
            background: #fff0f0;
            color: #c72e3b;
        }

        /* MODAL INFORMASI AKUN */
        .admin-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(7, 35, 52, .56);
            backdrop-filter: blur(5px);
        }

        .admin-modal {
            width: 100%;
            max-width: 430px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #e0eff5;
            border-radius: 22px;
            box-shadow: 0 25px 70px rgba(0, 30, 50, .24);
            animation: adminDropdownIn .2s ease;
        }

        .admin-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 23px 24px 18px;
            background: linear-gradient(135deg, #effbff, #ffffff);
            border-bottom: 1px solid #e8f3f7;
        }

        .admin-modal-eyebrow {
            color: #0098b8;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.6px;
        }

        .admin-modal-header h3 {
            margin: 6px 0 0;
            color: #10415b;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
        }

        .admin-modal-close {
            width: 32px;
            height: 32px;
            border: 0;
            border-radius: 10px;
            background: #e5f5fa;
            color: #28546b;
            font-size: 23px;
            cursor: pointer;
        }

        .admin-modal-body {
            padding: 24px;
        }

        .admin-modal-avatar {
            width: 64px;
            height: 64px;
            margin: 0 auto 24px;
            border-radius: 20px;
            font-size: 26px;
        }

        .admin-modal-field {
            margin-bottom: 17px;
        }

        .admin-modal-field label {
            display: block;
            margin-bottom: 7px;
            color: #8198a7;
            font-size: 11px;
            font-weight: 700;
        }

        .admin-modal-field > div {
            color: #17445d;
            font-size: 13px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .admin-role-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 11px;
            border-radius: 9px;
            background: #e8f9f4;
            color: #07866e;
            font-size: 11px;
        }

        .admin-modal-footer {
            display: flex;
            justify-content: flex-end;
            padding: 0 24px 22px;
        }

        .admin-modal-ok {
            padding: 10px 23px;
            border: 0;
            border-radius: 11px;
            background: #078eae;
            color: white;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .admin-modal-ok:hover {
            background: #06728d;
        }

        @media (max-width: 480px) {
            .admin-dropdown {
                position: fixed;
                top: 95px;
                right: 12px;
                width: min(290px, calc(100vw - 24px));
            }

            .admin-chip-text {
                max-width: 95px;
            }
        }

        
        /* KARTU RINGKASAN EDITORIAL INTERAKTIF */
        .stat-card-link {
            display: block;
            min-width: 0;
            color: inherit;
            text-decoration: none;
            cursor: pointer;
            transition:
                transform .22s ease,
                box-shadow .22s ease,
                border-color .22s ease;
        }

        .stat-card-link:hover {
            transform: translateY(-5px);
            border-color: #8bdcec;
            box-shadow: 0 14px 30px rgba(8, 104, 139, .13);
        }

        .stat-card-link:focus-visible {
            outline: 3px solid #19b8d3;
            outline-offset: 4px;
        }

        .stat-arrow {
            color: #a2bdcb;
            font-size: 11px;
            transition: color .2s ease, transform .2s ease;
        }

        .stat-card-link:hover .stat-arrow {
            color: #0798b8;
            transform: translate(2px, -2px);
        }

        .stat-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid #edf5f8;
            color: #078eae;
            font-size: 10px;
            font-weight: 800;
        }

        .stat-action i {
            transition: transform .2s ease;
        }

        .stat-card-link:hover .stat-action i {
            transform: translateX(4px);
        }

        /* Tambahan ruang untuk teks aksi */
        .stat-card-link {
            padding-bottom: 15px;
        }

        @media (max-width: 600px) {
            .stat-action {
                font-size: 9px;
            }

            .district-coverage-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }
    </style>
    @include('editor.partials.sidebar-styles')
    @include('partials.site-theme-styles')
    @include('editor.partials.topbar-styles')
</head>

<body>
<div class="app">

    @include('editor.partials.sidebar')

    {{-- MAIN --}}
    <main class="main">

        @include('editor.partials.topbar', ['pageTitle' => 'Dashboard'])

        <div class="content">

            {{-- PAGE HEADING --}}
            <section class="page-heading">
                <div>
                    <h1>Dashboard Admin</h1>
                    <p>Kelola cerita, pantau kiriman, dan hadirkan kisah terbaik dari Banjarnegara.</p>
                </div>
            </section>

            {{-- HERO --}}
            <section class="hero">
                <div class="hero-copy">
                    <div class="hero-label">
                        <i class="fa-solid fa-leaf"></i>
                        DIENG NATURE GLOW
                    </div>

                    <h2>Selamat datang kembali,<br><span>Administrator.</span></h2>

                    <p>
                        Setiap cerita punya makna. Pantau proses editorial dan bantu karya
                        para penulis menjadi bacaan yang menginspirasi.
                    </p>

                    <div class="hero-quote">
                        <i class="fa-solid fa-quote-left"></i>
                        <span>
                            Cerita yang baik bukan hanya menyampaikan informasi,
                            tetapi juga menghubungkan manusia dengan daerahnya.
                        </span>
                    </div>
                </div>

                <div class="hero-side">
                    <div class="hero-icon">
                        <i class="fa-solid fa-feather-pointed"></i>
                    </div>
                </div>
            </section>

            {{-- STATISTICS --}}
            
            <section class="editorial-statistics">
                <div class="section-heading">
                    <div>
                        <h3>Ringkasan Website</h3>
                        <p>Gambaran pengguna, konten, dan aktivitas Derap Serayu.</p>
                    </div>

                    <div class="section-note">
                        <i class="fa-solid fa-chart-column"></i>
                        Statistik website
                    </div>
                </div>

                <div class="stats-grid">

                    {{-- TOTAL ARTIKEL --}}
                    <a href="{{ route('admin.articles.index') }}"
                    class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon blue">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">
                            {{ $totalArtikel ?? 0 }}
                        </div>

                        <div class="stat-label">Total Artikel</div>
                        <div class="stat-description">
                            Semua artikel yang tercatat
                        </div>

                        <div class="stat-action">
                            Lihat artikel <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    {{-- MENUNGGU REVIEW --}}
                    <a href="{{ route('admin.articles.index', ['status' => 'review']) }}"
                    class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon orange">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">
                            {{ $menungguTinjauan ?? 0 }}
                        </div>

                        <div class="stat-label">Menunggu Review</div>
                        <div class="stat-description">
                            Artikel yang perlu ditinjau
                        </div>

                        <div class="stat-action">
                            Tinjau artikel <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    {{-- ARTIKEL DITERBITKAN --}}
                    <a href="{{ route('admin.articles.index', ['status' => 'published']) }}"
                    class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon green">
                                <i class="fa-regular fa-circle-check"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">
                            {{ $totalTerbit ?? 0 }}
                        </div>

                        <div class="stat-label">Artikel Diterbitkan</div>
                        <div class="stat-description">
                            Artikel yang sudah dipublikasikan
                        </div>

                        <div class="stat-action">
                            Lihat publikasi <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    {{-- ARTIKEL PERLU REVISI --}}
                    <a href="{{ route('admin.articles.index', ['status' => 'rejected']) }}"
                    class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon red">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">
                            {{ $perluRevisi ?? 0 }}
                        </div>

                        <div class="stat-label">Perlu Revisi</div>
                        <div class="stat-description">
                            Artikel yang perlu diperbaiki
                        </div>

                        <div class="stat-action">
                            Lihat revisi <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    {{-- PENGELOLAAN PENGGUNA --}}
                    <a href="{{ route('admin.users.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon purple">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">
                            {{ $totalPengguna ?? 0 }}
                        </div>

                        <div class="stat-label">Akun Pengguna</div>
                        <div class="stat-description">
                            {{ $penggunaAktif ?? 0 }} aktif, {{ $totalAdmin ?? 0 }} admin,
                            {{ $totalEditor ?? 0 }} editor, {{ $totalPenulis ?? 0 }} penulis,
                            {{ $totalPembaca ?? 0 }} pembaca
                        </div>

                        <div class="stat-action">
                            Kelola akun dan peran <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('kecamatan.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon green">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">{{ $jumlahKecamatan ?? 0 }}</div>
                        <div class="stat-label">Total Kecamatan</div>
                        <div class="stat-description">Kecamatan yang tersedia di website</div>

                        <div class="stat-action">
                            Jelajahi kecamatan <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('kecamatan.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon orange">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">{{ $kecamatanDenganArtikel ?? 0 }}</div>
                        <div class="stat-label">Kecamatan dengan Artikel</div>
                        <div class="stat-description">Memiliki artikel yang sudah terbit</div>

                        <div class="stat-action">
                            Lihat kecamatan <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('articles.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon purple">
                                <i class="fa-regular fa-eye"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">{{ number_format($totalTayangan ?? 0, 0, ',', '.') }}</div>
                        <div class="stat-label">Total Tayangan</div>
                        <div class="stat-description">Tayangan pada seluruh artikel</div>

                        <div class="stat-action">
                            Lihat artikel <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('articles.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon blue">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">{{ $totalKategori ?? 0 }}</div>
                        <div class="stat-label">Kategori Artikel</div>
                        <div class="stat-description">Kategori yang digunakan pada artikel</div>

                        <div class="stat-action">
                            Jelajahi artikel <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('articles.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon red">
                                <i class="fa-regular fa-comments"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">{{ number_format($totalKomentar ?? 0, 0, ',', '.') }}</div>
                        <div class="stat-label">Total Komentar</div>
                        <div class="stat-description">Komentar pada seluruh artikel</div>

                        <div class="stat-action">
                            Lihat artikel <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('articles.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon green">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">{{ number_format($totalSuka ?? 0, 0, ',', '.') }}</div>
                        <div class="stat-label">Total Suka</div>
                        <div class="stat-description">Apresiasi pembaca pada artikel</div>

                        <div class="stat-action">
                            Lihat artikel <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <a href="{{ route('articles.index') }}" class="stat-card stat-card-link">
                        <div class="stat-top">
                            <div class="stat-icon orange">
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                            <span class="stat-arrow">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </span>
                        </div>

                        <div class="stat-number">{{ number_format($totalArtikelTersimpan ?? 0, 0, ',', '.') }}</div>
                        <div class="stat-label">Artikel Tersimpan</div>
                        <div class="stat-description">Artikel yang disimpan pembaca</div>

                        <div class="stat-action">
                            Lihat artikel <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>

                    <div class="stat-card">
                        <div class="stat-top">
                            <div class="stat-icon purple">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                        </div>

                        <div class="stat-number">{{ $totalPelangganNewsletter ?? 0 }}</div>
                        <div class="stat-label">Pelanggan Newsletter</div>
                        <div class="stat-description">Pembaca yang berlangganan kabar terbaru</div>
                    </div>

                </div>
            </section>


            {{-- REVIEW QUEUE + LATEST ARTICLES --}}
            <section class="dashboard-grid">

                {{-- REVIEW QUEUE --}}
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <div class="panel-icon">
                                <i class="fa-solid fa-list-check"></i>
                            </div>
                            <div>
                                <h3>Antrean Tinjauan</h3>
                                <p>Artikel yang membutuhkan keputusan redaksi.</p>
                            </div>
                        </div>

                        <a href="{{ route('admin.articles.index') }}" class="text-link">
                            Buka semua <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="review-list">
                        @forelse(($antreanTinjauan ?? collect()) as $artikel)
                            <div class="review-item searchable-item">
                                <div class="review-thumb">
                                    @if(!empty($artikel->image))
                                        <img src="{{ asset('storage/' . $artikel->image) }}"
                                             alt="Gambar artikel">
                                    @elseif(!empty($artikel->thumbnail))
                                        <img src="{{ asset('storage/' . $artikel->thumbnail) }}"
                                             alt="Gambar artikel">
                                    @else
                                        <i class="fa-regular fa-file-lines"></i>
                                    @endif
                                </div>

                                <div class="review-info">
                                    <h4>{{ $artikel->title ?? $artikel->judul ?? 'Artikel tanpa judul' }}</h4>
                                    <p>
                                        {{ $artikel->user->name ?? $artikel->author->name ?? $artikel->author_name ?? 'Penulis Derap Serayu' }}
                                    </p>
                                    <div class="review-meta">
                                        <span>
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ optional($artikel->created_at)->format('d M Y') ?? '-' }}
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-clock"></i>
                                            Menunggu pemeriksaan
                                        </span>
                                    </div>
                                </div>

                                <span class="status pending">Ditinjau</span>
                            </div>
                        @empty
                            <div class="empty-state">
                                <i class="fa-regular fa-circle-check"></i>
                                <p>Belum ada artikel dalam antrean tinjauan.<br>
                                   Semua kiriman sudah diperiksa.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- LATEST ARTICLES --}}
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <div class="panel-icon">
                                <i class="fa-regular fa-newspaper"></i>
                            </div>
                            <div>
                                <h3>Artikel Terbaru</h3>
                                <p>Kiriman terakhir dari para penulis.</p>
                            </div>
                        </div>

                        <a href="{{ route('admin.articles.index') }}" class="text-link">
                            Lihat daftar <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="article-list">
                        @forelse(($artikelTerbaru ?? collect()) as $artikel)
                            @php
                                $statusArtikel = strtolower((string) ($artikel->status ?? 'draft'));

                                if (in_array($statusArtikel, ['published', 'publish', 'terbit', 'diterbitkan'])) {
                                    $labelStatus = 'Terbit';
                                    $classStatus = 'published';
                                } elseif (in_array($statusArtikel, ['revision', 'revisi', 'perlu_revisi', 'rejected', 'ditolak'])) {
                                    $labelStatus = 'Revisi';
                                    $classStatus = 'revision';
                                } elseif (in_array($statusArtikel, ['pending', 'review', 'menunggu', 'ditinjau', 'submitted'])) {
                                    $labelStatus = 'Ditinjau';
                                    $classStatus = 'pending';
                                } else {
                                    $labelStatus = 'Draft';
                                    $classStatus = 'draft';
                                }
                            @endphp

                            <div class="article-item searchable-item">
                                <div class="article-thumb">
                                    @if(!empty($artikel->image))
                                        <img src="{{ asset('storage/' . $artikel->image) }}"
                                             alt="Gambar artikel">
                                    @elseif(!empty($artikel->thumbnail))
                                        <img src="{{ asset('storage/' . $artikel->thumbnail) }}"
                                             alt="Gambar artikel">
                                    @else
                                        <i class="fa-regular fa-image"></i>
                                    @endif
                                </div>

                                <div class="article-info">
                                    <h4>{{ $artikel->title ?? $artikel->judul ?? 'Artikel tanpa judul' }}</h4>
                                    <p>
                                        <i class="fa-regular fa-user"></i>
                                        {{ $artikel->user->name ?? $artikel->author->name ?? $artikel->author_name ?? 'Penulis' }}
                                    </p>
                                    <p>
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ optional($artikel->created_at)->format('d M Y') ?? '-' }}
                                    </p>
                                    <div class="article-status">
                                        <span class="status {{ $classStatus }}">{{ $labelStatus }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <i class="fa-regular fa-newspaper"></i>
                                <p>Belum ada artikel untuk ditampilkan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            {{-- DISTRICT COVERAGE --}}
            <section class="bottom-grid">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <div class="panel-icon">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div>
                                <h3>Sebaran Artikel per Kecamatan</h3>
                                <p>Wilayah dengan artikel terbit dan wilayah yang belum terjangkau.</p>
                            </div>
                        </div>

                        <a href="{{ route('kecamatan.index') }}" class="text-link">
                            Lihat semua kecamatan <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="district-coverage-grid">
                        <div>
                            <div class="district-section-heading">
                                Artikel terbit terbanyak
                                <span>Top {{ $kecamatanTeratas->count() }}</span>
                            </div>

                            <div class="district-article-list">
                                @forelse ($kecamatanTeratas as $kecamatan)
                                    <div class="district-article-row">
                                        <div class="district-article-meta">
                                            <strong>{{ $kecamatan['nama'] }}</strong>
                                            <span>{{ $kecamatan['jumlahArtikel'] }} artikel</span>
                                        </div>
                                        <div class="district-progress" role="img" aria-label="{{ $kecamatan['nama'] }}: {{ $kecamatan['jumlahArtikel'] }} artikel terbit">
                                            <span style="width: {{ round(($kecamatan['jumlahArtikel'] / $maxArtikelPerKecamatan) * 100) }}%"></span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="empty-state">
                                        <i class="fa-regular fa-newspaper"></i>
                                        <p>Belum ada artikel terbit yang dipetakan ke kecamatan.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <div>
                            <div class="district-section-heading">
                                Belum memiliki artikel terbit
                                <span>{{ $jumlahKecamatan - $kecamatanDenganArtikel }} dari {{ $jumlahKecamatan }}</span>
                            </div>

                            @if ($kecamatanBelumTerjangkau->isNotEmpty())
                                <div class="district-empty-list">
                                    @foreach ($kecamatanBelumTerjangkau as $kecamatan)
                                        <span class="district-empty-chip">{{ $kecamatan['nama'] }}</span>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state">
                                    <i class="fa-regular fa-circle-check"></i>
                                    <p>Semua kecamatan sudah memiliki artikel terbit.</p>
                                </div>
                            @endif

                            <p class="district-coverage-note">
                                Daftar menampilkan hingga lima kecamatan tanpa artikel terbit. Jumlah hanya menghitung artikel berstatus terbit.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- FOOTER --}}
            <footer class="footer admin-workspace-footer">
                <div>
                    <strong>Derap Serayu</strong> · Digital Magazine Banjarnegara
                </div>
                <div>
                    &copy; <span id="currentYear"></span> Derap Serayu. Ruang cerita Banjarnegara.
                </div>
            </footer>

        </div>
    </main>
</div>

<script>
    const yearElement = document.getElementById('currentYear');

    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    }

</script>

</body>
</html>
