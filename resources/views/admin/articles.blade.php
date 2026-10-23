
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Review Artikel | Derap Serayu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --navy: #073b59;
            --navy-dark: #052f47;
            --cyan: #08a4c5;
            --cyan-dark: #0787a8;
            --cyan-soft: #e5f8fd;
            --page: #f4fbfe;
            --white: #fff;
            --text: #123d5b;
            --muted: #7995aa;
            --border: #dceef6;
            --green: #009d76;
            --orange: #d99015;
            --red: #c94e49;
            --purple: #7955d8;
            --shadow: 0 8px 28px rgba(20, 88, 120, .055);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--page);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button, input, select, textarea {
            font: inherit;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        .layout {
            min-height: 100vh;
        }

        /* SIDEBAR - SAMA DENGAN DASHBOARD ADMIN */

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            width: 255px;
            display: flex;
            flex-direction: column;
            color: #fff;
            background: linear-gradient(180deg, #073e59, #052f47);
            transition: transform .25s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 23px 22px;
            min-height: 103px;
            border-bottom: 1px solid rgba(255,255,255,.12);
        }

        .brand-mark {
            width: 47px;
            height: 47px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,.22);
            background: rgba(255,255,255,.12);
            color: #75e5f2;
            font: 800 30px 'Playfair Display', serif;
        }

        .brand-name {
            font: 800 20px 'Playfair Display', serif;
        }

        .brand-name span {
            color: #65e1ef;
        }

        .brand-caption {
            margin-top: 4px;
            color: #b6dce8;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .nav-caption {
            padding: 28px 23px 10px;
            color: #82c6d9;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-list {
            padding: 0 13px;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 48px;
            padding: 13px 15px;
            border-radius: 12px;
            color: #d7ebf3;
            font-weight: 700;
            font-size: 12px;
            transition: .2s;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: linear-gradient(110deg, #0da8c9, #078bb2);
            box-shadow: 0 7px 18px rgba(0,166,200,.18);
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 17px;
            border-top: 1px solid rgba(255,255,255,.12);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 5px 17px;
        }

        .avatar {
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border: 2px solid rgba(255,255,255,.3);
            border-radius: 50%;
            background: linear-gradient(145deg, #16abc8, #087c9f);
            font-size: 16px;
            font-weight: 800;
        }

        .profile-name {
            font-size: 11px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .profile-role {
            margin-top: 4px;
            color: #9ed7e5;
            font-size: 10px;
        }

        .logout-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px 9px;
            border-radius: 9px;
            color: #d9edf5;
            font-size: 11px;
            font-weight: 700;
        }

        .logout-link:hover {
            background: rgba(255,255,255,.09);
        }

        /* MAIN */

        .main {
            min-height: 100vh;
            margin-left: 255px;
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

        .search-box {
            display: flex;
            align-items: center;
            gap: 12px;
            width: min(560px, 55%);
            padding: 13px 16px;
            background: #fff;
            border: 1px solid #d6eaf5;
            border-radius: 13px;
            color: #6996b0;
        }

        .search-box i {
            color: #65a3c2;
        }

        .search-box input {
            width: 100%;
            border: 0;
            outline: none;
            background: transparent;
            color: var(--text);
            font-family: inherit;
            font-size: 12px;
        }

        .search-box input::placeholder {
            color: #8ca8ba;
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
            position: relative;
            isolation: isolate;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            min-height: 175px;
            margin-bottom: 23px;
            padding: 27px 31px;
            border-radius: 20px;
            color: #fff;
            background:
                linear-gradient(100deg, rgba(3,49,75,.96), rgba(5,111,141,.88), rgba(8,164,197,.76)),
                url('https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=1600&q=85')
                center 48% / cover no-repeat;
            box-shadow: 0 12px 30px rgba(7,81,113,.11);
        }

        .hero::after {
            content: '';
            position: absolute;
            z-index: -1;
            width: 240px;
            height: 240px;
            top: -140px;
            right: 120px;
            border: 1px solid rgba(255,255,255,.23);
            border-radius: 50%;
            box-shadow: 0 0 0 22px rgba(255,255,255,.05),
                        0 0 0 45px rgba(255,255,255,.035);
        }

        .hero-content {
            max-width: 730px;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 13px;
            padding: 7px 11px;
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 30px;
            background: rgba(255,255,255,.1);
            color: #d9faff;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.3px;
        }

        .hero h2 {
            margin-bottom: 8px;
            font-size: clamp(22px, 2.5vw, 30px);
            line-height: 1.35;
        }

        .hero p {
            color: #e0f6fc;
            font-size: 11px;
            line-height: 1.9;
        }

        .hero-symbol {
            display: grid;
            place-items: center;
            width: 98px;
            height: 98px;
            flex-shrink: 0;
            margin-right: 15px;
            border: 1px solid rgba(255,255,255,.35);
            border-radius: 50%;
            background: rgba(255,255,255,.1);
            box-shadow: 0 0 0 13px rgba(255,255,255,.05);
            color: #baf5fb;
            font-size: 37px;
        }

        /* FLASH MESSAGES */

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            margin-bottom: 17px;
            padding: 14px 16px;
            border: 1px solid #c6eee1;
            border-radius: 12px;
            background: #eaf9f4;
            color: #176b56;
            font-size: 12px;
            line-height: 1.7;
        }

        .notice i {
            margin-top: 2px;
        }

        .notice.error {
            border-color: #f5d0ce;
            background: #fff1f0;
            color: #a83e3a;
        }

        /* STAT CARDS */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 13px;
            margin-bottom: 25px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            padding: 18px;
            min-height: 132px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #6ed8ed;
        }

        .stat-card:nth-child(2)::after { background: #f4c36b; }
        .stat-card:nth-child(3)::after { background: #6bd6b0; }
        .stat-card:nth-child(4)::after { background: #b8a5f1; }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .stat-label {
            color: #68869b;
            font-size: 10px;
            font-weight: 700;
        }

        .stat-icon {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #e4f6fd;
            color: #119bd2;
            font-size: 15px;
        }

        .stat-card:nth-child(2) .stat-icon {
            background: #fff3dc;
            color: #df9519;
        }

        .stat-card:nth-child(3) .stat-icon {
            background: #ddf8ed;
            color: #009d76;
        }

        .stat-card:nth-child(4) .stat-icon {
            background: #eee8ff;
            color: #7955d8;
        }

        .stat-value {
            margin-top: 13px;
            color: var(--navy);
            font: 800 29px 'Playfair Display', serif;
        }

        .stat-description {
            margin-top: 4px;
            color: #8ca7b8;
            font-size: 9px;
        }

        /* FILTER */

        .filter-panel {
            margin-bottom: 18px;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .filter-header {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 17px;
        }

        .filter-header-icon {
            width: 37px;
            height: 37px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: #e5f7fc;
            color: var(--cyan-dark);
        }

        .filter-header h3 {
            color: var(--navy);
            font-size: 16px;
        }

        .filter-header p {
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        .filter-form {
            display: flex;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 12px;
        }

        .filter-field {
            display: flex;
            flex-direction: column;
            gap: 7px;
            flex: 1;
            min-width: 170px;
        }

        .filter-field label {
            color: #54758d;
            font-size: 10px;
            font-weight: 800;
        }

        .filter-field select,
        .filter-field input {
            width: 100%;
            min-height: 43px;
            padding: 10px 12px;
            border: 1px solid #d6eaf5;
            border-radius: 10px;
            outline: none;
            background: #fbfeff;
            color: var(--text);
            font-size: 11px;
        }

        .filter-field select:focus,
        .filter-field input:focus,
        textarea:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(8,164,197,.1);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 41px;
            padding: 10px 14px;
            border: 1px solid transparent;
            border-radius: 10px;
            background: var(--cyan);
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .btn:hover {
            background: var(--cyan-dark);
            transform: translateY(-1px);
        }

        .btn-light {
            border-color: #d8edf5;
            background: #e9f8fc;
            color: var(--navy);
        }

        .btn-light:hover {
            background: #d9f2f9;
        }

        .btn-danger {
            border-color: #f7d5d4;
            background: #fff0ef;
            color: #b74640;
        }

        .btn-danger:hover {
            background: #ffe2df;
        }

        .btn-success {
            background: #079b79;
        }

        .btn-success:hover {
            background: #067d62;
        }

        /* TABLE */

        .table-panel {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .table-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 21px 22px;
            border-bottom: 1px solid #eaf3f8;
        }

        .table-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .table-title-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border-radius: 13px;
            background: #e5f7fc;
            color: var(--cyan-dark);
            font-size: 17px;
        }

        .table-title h3 {
            color: var(--navy);
            font-size: 18px;
        }

        .table-title p {
            margin-top: 4px;
            color: var(--muted);
            font-size: 10px;
        }

        .result-count {
            padding: 8px 11px;
            border-radius: 30px;
            background: #e8f8fc;
            color: var(--cyan-dark);
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .table-wrap {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1020px;
        }

        thead {
            background: #f5fbfe;
        }

        th {
            padding: 14px 17px;
            border-bottom: 1px solid #e3f0f6;
            color: #6f8fa4;
            font-size: 9px;
            font-weight: 800;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: .7px;
            white-space: nowrap;
        }

        td {
            padding: 17px;
            border-bottom: 1px solid #edf4f8;
            color: #44667e;
            font-size: 11px;
            vertical-align: top;
        }

        tbody tr {
            transition: background .18s;
        }

        tbody tr:hover {
            background: #f7fcff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .article-cell {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            min-width: 250px;
            max-width: 400px;
        }

        .article-number {
            display: grid;
            place-items: center;
            width: 38px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 10px;
            background: linear-gradient(145deg, #e7f8fd, #d8f1fa);
            color: var(--cyan-dark);
            font-size: 15px;
        }

        .article-title {
            color: var(--navy);
            font-size: 12px;
            font-weight: 800;
            line-height: 1.65;
            overflow-wrap: anywhere;
        }

        .article-summary {
            margin-top: 5px;
            color: #849eaf;
            font-size: 10px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .document-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
            color: var(--cyan-dark);
            font-size: 10px;
            font-weight: 800;
        }

        .document-link:hover {
            text-decoration: underline;
        }

        .author-name {
            color: var(--navy);
            font-weight: 800;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .author-email {
            display: block;
            margin-top: 4px;
            color: #8aa5b6;
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        .date-text {
            white-space: nowrap;
            color: #597b92;
            font-size: 10px;
            line-height: 1.8;
        }

        .date-text i {
            margin-right: 5px;
            color: #70a9c1;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 30px;
            font-size: 9px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status.review {
            background: #fff2d8;
            color: #a56b09;
        }

        .status.published {
            background: #dcf8eb;
            color: #087c5d;
        }

        .status.rejected {
            background: #ffebe8;
            color: #bb4c42;
        }

        .status.draft {
            background: #eee9ff;
            color: #7150d4;
        }

        .action-cell {
            min-width: 275px;
            max-width: 330px;
        }

        .action-stack {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .action-buttons .btn {
            flex: 1;
        }

        .revision-form {
            padding: 11px;
            border: 1px solid #f3dfdc;
            border-radius: 12px;
            background: #fff9f8;
        }

        .revision-form label {
            display: block;
            margin-bottom: 7px;
            color: #a45049;
            font-size: 10px;
            font-weight: 800;
        }

        .revision-form textarea {
            display: block;
            width: 100%;
            min-height: 76px;
            resize: vertical;
            padding: 10px;
            border: 1px solid #efd9d7;
            border-radius: 9px;
            outline: none;
            background: #fff;
            color: var(--text);
            font-family: inherit;
            font-size: 10px;
            line-height: 1.7;
        }

        .revision-form .btn {
            width: 100%;
            margin-top: 8px;
        }

        .already-published {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #078462;
            font-size: 10px;
            font-weight: 800;
        }

        .muted {
            color: var(--muted);
        }

        .empty-state {
            padding: 65px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 68px;
            height: 68px;
            display: grid;
            place-items: center;
            margin: 0 auto 17px;
            border-radius: 22px;
            background: #e7f8fd;
            color: #47b8d4;
            font-size: 27px;
        }

        .empty-state h3 {
            color: var(--navy);
            font-size: 20px;
        }

        .empty-state p {
            margin: 9px auto 18px;
            max-width: 380px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            padding: 18px 22px;
            border-top: 1px solid #edf4f8;
        }

        .pagination nav p {
            color: var(--muted);
            font-size: 11px;
        }

        .pagination nav > div {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pagination nav a,
        .pagination nav span[aria-current="page"] span,
        .pagination nav span[aria-disabled="true"] span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            min-height: 34px;
            padding: 7px 10px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #fff;
            color: #557991;
            font-size: 10px;
        }

        .pagination nav span[aria-current="page"] span {
            border-color: var(--cyan);
            background: var(--cyan);
            color: #fff;
        }

        /* FOOTER */

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            padding: 20px 0 7px;
            color: #8aa4b5;
            font-size: 10px;
        }

        .footer strong {
            color: var(--cyan-dark);
        }

        /* RESPONSIVE */

        @media (max-width: 1200px) {
            .sidebar {
                width: 225px;
            }

            .main {
                margin-left: 225px;
            }

            .content {
                padding-inline: 22px;
            }

            .topbar {
                padding-inline: 22px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 12px 0 35px rgba(0,0,0,.15);
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

            .topbar {
                gap: 12px;
                padding: 12px 17px;
            }

            .search-box {
                flex: 1;
                width: auto;
            }

            .date-chip {
                display: none;
            }
        }

        @media (max-width: 600px) {
            .topbar {
                flex-wrap: wrap;
            }

            .topbar-right {
                margin-left: auto;
            }

            .role-chip {
                padding: 9px 10px;
            }

            .content {
                padding: 22px 13px 15px;
            }

            .page-heading {
                align-items: flex-start;
            }

            .page-heading h1 {
                font-size: 29px;
            }

            .heading-icon {
                width: 47px;
                height: 47px;
                border-radius: 13px;
                font-size: 20px;
            }

            .hero {
                padding: 23px 20px;
            }

            .hero-symbol {
                display: none;
            }

            .hero h2 {
                font-size: 24px;
            }

            .stats {
                gap: 9px;
            }

            .stat-card {
                padding: 14px;
                min-height: 124px;
            }

            .stat-value {
                font-size: 26px;
            }

            .filter-panel {
                padding: 15px;
            }

            .filter-form {
                align-items: stretch;
            }

            .filter-field {
                flex-basis: 100%;
            }

            .filter-form > .btn {
                flex: 1;
            }

            .table-heading {
                align-items: flex-start;
                padding: 17px 15px;
            }

            .table-title h3 {
                font-size: 16px;
            }

            .result-count {
                font-size: 9px;
            }

            .pagination {
                justify-content: center;
                padding: 15px 10px;
            }

            .footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }

            .admin-chip {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 14px;
        background: #fff;
        border: 1px solid #e4ebe3;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        color: #243a30;
    }

    .admin-avatar {
        width: 32px;
        height: 32px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: #e9f3ec;
        color: #285c46;
    }

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
        }

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

        .sidebar-brand {
            width: 100%;
            height: 100px;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            background: #073b50;
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
        }

        .stats .stat-card {
            display: block;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
            transition: transform .25s ease,
                        box-shadow .25s ease,
                        border-color .25s ease;
        }

        .stats .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(35, 75, 51, .10);
        }

        .stats .stat-card.active {
            border-color: #477b58;
            background: #f1f8f1;
        }

        .stats .stat-card:focus-visible {
            outline: 3px solid #7caf87;
            outline-offset: 3px;
        }

        .brand-logo {
            width: 100%;
            height: 80px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            background: #fff;
            border: 1px solid #e7eee7;
            border-radius: 14px;
            overflow: hidden;
            text-decoration: none;
        }

        .brand-logo-img {
            display: block;
            width: 100%;
            max-width: 190px;
            height: 62px;
            object-fit: contain;
            object-position: center;
        }
        
        /* SIDEBAR — DASHBOARD EDITORIAL */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 259px;
            height: 100vh;
            overflow-y: auto;
            background: linear-gradient(
                180deg,
                #073e59 0%,
                #06384f 50%,
                #052f47 100%
            );
            color: #fff;
            z-index: 1000;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 108px;
            padding: 16px 12px;
            border: none;
            text-decoration: none;
        }

        .brand-logo-wrapper {
            width: 218px;
            height: 76px;
            padding: 4px 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: none;
            outline: none;
            box-shadow: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .brand-logo {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            border: none;
            outline: none;
            box-shadow: none;
        }

        .nav-section {
            padding: 26px 17px 12px;
            color: #85c3d5;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .nav-list {
            display: flex;
            flex-direction: column;
            gap: 7px;
            padding: 0 13px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 47px;
            padding: 12px 15px;
            border-radius: 13px;
            color: #e2f2f8;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s ease, transform .2s ease;
        }

        .nav-link i {
            width: 19px;
            text-align: center;
            font-size: 16px;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.10);
            color: #fff;
            transform: translateX(2px);
        }

        .nav-link.active {
            background: linear-gradient(110deg, #0da8c9, #078bb2);
            color: #fff;
            box-shadow: 0 7px 18px rgba(0, 166, 201, 0.15);
        }

        /* AREA KONTEN */
        .main,
        .main-content {
            margin-left: 259px;
            min-width: 0;
        }

        @media (max-width: 950px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main,
            .main-content {
                margin-left: 0;
            }
        }

        
        /* Hormati atribut hidden */
        .admin-dropdown[hidden],
        .admin-modal-overlay[hidden] {
            display: none !important;
        }

        /* Dropdown harus berada di atas elemen topbar */
        .admin-account {
            position: relative;
        }

        .admin-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            z-index: 1100;
        }

        /* Modal informasi akun */
        .admin-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(3, 28, 43, 0.60);
            backdrop-filter: blur(5px);
        }

        .admin-modal {
            width: 100%;
            max-width: 440px;
            max-height: 90vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 24px 70px rgba(0, 35, 55, 0.25);
        }

        body.modal-open {
            overflow: hidden;
        }

        /* Baris/kartu yang tidak cocok dengan pencarian */
        #articlesTable tbody tr[hidden],
        #articleTable tbody tr[hidden],
        tr.article-row[hidden],
        .article-card[hidden] {
            display: none !important;
        }

        @media (max-width: 600px) {
            .topbar {
                flex-wrap: wrap;
            }

            .search-box {
                min-width: 0;
                flex: 1;
            }

            .topbar-right {
                width: 100%;
                justify-content: flex-end;
            }

            .admin-modal-overlay {
                padding: 14px;
            }
        }

    </style>
</head>

<body>
<div class="layout">

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <div class="brand-logo-wrapper">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo Derap Serayu"
                    class="brand-logo"
                >
            </div>
        </a>

        <div class="nav-section">RUANG REDAKSI</div>

        <nav class="nav-list">
            <a
                href="{{ route('admin.dashboard') }}"
                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
            >
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a
                href="{{ route('admin.articles.index') }}"
                class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}"
            >
                <i class="fa-regular fa-newspaper"></i>
                <span>Review Artikel</span>
            </a>

            <a
                href="{{ route('home') }}"
                class="nav-link"
                target="_blank"
                rel="noopener noreferrer"
            >
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>Lihat Website</span>
            </a>
        </nav>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="main">
        <header class="topbar">
            <button class="mobile-menu" id="mobileMenu" type="button"
                    aria-label="Buka navigasi">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="dashboardSearch"
                       placeholder="Cari artikel, penulis, atau status...">
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="fa-regular fa-calendar"></i>
                    <span id="currentDate">Memuat tanggal...</span>
                </div>

                
            <div class="admin-account">
                <button
                    type="button"
                    class="admin-chip"
                    id="adminAccountButton"
                    aria-expanded="false"
                    aria-controls="adminAccountDropdown"
                >
                    <span class="admin-chip-icon">
                        <i class="fas fa-shield-alt"></i>
                    </span>

                    <span class="admin-chip-text">
                        {{ Auth::user()->name ?? 'Administrator' }}
                    </span>

                    <i class="fas fa-chevron-down admin-chevron"></i>
                </button>

                <div class="admin-dropdown" id="adminAccountDropdown" hidden>
                    <div class="admin-dropdown-profile">
                        <div class="admin-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>

                        <div class="admin-profile-info">
                            <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong>
                            <span>{{ Auth::user()->email ?? '' }}</span>
                            <small>
                                <i class="fas fa-circle"></i>
                                Administrator
                            </small>
                        </div>
                    </div>

                    <div class="admin-dropdown-divider"></div>

                    <div class="admin-dropdown-label">AKUN SAYA</div>

                    <button
                        type="button"
                        class="admin-dropdown-item"
                        id="adminAccountInfoButton"
                    >
                        <i class="fas fa-user-circle"></i>
                        <span>Informasi Akun</span>
                    </button>

                    <div class="admin-dropdown-divider"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="admin-dropdown-item admin-logout-item">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar dari akun</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Modal informasi akun -->
            <div class="admin-modal-overlay" id="adminAccountModal" hidden>
                <div class="admin-modal">
                    <div class="admin-modal-header">
                        <div>
                            <span class="admin-modal-eyebrow">DERAP SERAYU</span>
                            <h3>Informasi Akun</h3>
                        </div>

                        <button type="button"
                                class="admin-modal-close"
                                id="adminAccountModalClose"
                                aria-label="Tutup">
                            &times;
                        </button>
                    </div>

                    <div class="admin-modal-body">
                        <div class="admin-modal-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>

                        <div class="admin-modal-field">
                            <label>Nama Administrator</label>
                            <div>{{ Auth::user()->name ?? 'Administrator' }}</div>
                        </div>

                        <div class="admin-modal-field">
                            <label>Email</label>
                            <div>{{ Auth::user()->email ?? '-' }}</div>
                        </div>

                        <div class="admin-modal-field">
                            <label>Peran Akun</label>
                            <div>
                                <span class="admin-role-badge">
                                    <i class="fas fa-shield-alt"></i>
                                    Administrator
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="admin-modal-footer">
                        <button type="button"
                                class="admin-modal-ok"
                                id="adminAccountModalOk">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>

            </div>
        </header>

        <div class="content">

            <section class="page-heading">
                <div>
                    <div class="eyebrow">Panel Editorial</div>
                    <h1>Review Artikel</h1>
                    <p>
                        Periksa naskah, berikan masukan kepada penulis, dan pilih
                        artikel terbaik untuk diterbitkan di Derap Serayu.
                    </p>
                </div>

                <div class="heading-icon">
                    <i class="fa-solid fa-list-check"></i>
                </div>
            </section>

            {{-- HERO --}}
            <section class="hero">
                <div class="hero-content">
                    <div class="hero-label">
                        <i class="fa-solid fa-feather-pointed"></i>
                        EDITORIAL WORKSPACE
                    </div>

                    <h2>Setiap cerita layak diperiksa dengan baik.</h2>
                    <p>
                        Kelola kiriman artikel dari para penulis Banjarnegara.
                        Pastikan setiap naskah memiliki informasi yang jelas,
                        menarik, dan layak dibaca.
                    </p>
                </div>

                <div class="hero-symbol">
                    <i class="fa-solid fa-book-open-reader"></i>
                </div>
            </section>

            {{-- NOTIFICATIONS --}}
            @if(session('success'))
                <div class="notice" role="status">
                    <i class="fa-solid fa-circle-check"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if($errors->any())
                <div class="notice error" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- SUMMARY CARDS --}}
            @php
                $jumlahReview = (clone $articles)->getCollection()
                    ->where('status', 'review')->count();

                $jumlahTerbit = (clone $articles)->getCollection()
                    ->where('status', 'published')->count();

                $jumlahRevisi = (clone $articles)->getCollection()
                    ->where('status', 'rejected')->count();

                $jumlahDraft = (clone $articles)->getCollection()
                    ->where('status', 'draft')->count();
            @endphp

            <section class="stats">

                {{-- Menunggu Tinjauan --}}
                <a href="{{ route('admin.articles.index', ['status' => 'review']) }}"
                class="stat-card {{ request('status', 'review') === 'review' ? 'active' : '' }}">
                    <div class="stat-top">
                        <div class="stat-label">Menunggu Tinjauan</div>
                        <div class="stat-icon">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $jumlahReview }}</div>
                    <div class="stat-description">
                        Artikel menunggu keputusan redaksi
                    </div>
                </a>

                {{-- Artikel Terbit --}}
                <a href="{{ route('admin.articles.index', ['status' => 'published']) }}"
                class="stat-card {{ request('status') === 'published' ? 'active' : '' }}">
                    <div class="stat-top">
                        <div class="stat-label">Artikel Terbit</div>
                        <div class="stat-icon">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $jumlahTerbit }}</div>
                    <div class="stat-description">
                        Artikel berstatus published
                    </div>
                </a>

                {{-- Perlu Revisi --}}
                <a href="{{ route('admin.articles.index', ['status' => 'rejected']) }}"
                class="stat-card {{ request('status') === 'rejected' ? 'active' : '' }}">
                    <div class="stat-top">
                        <div class="stat-label">Perlu Revisi</div>
                        <div class="stat-icon">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $jumlahRevisi }}</div>
                    <div class="stat-description">
                        Artikel yang perlu diperbaiki
                    </div>
                </a>

                {{-- Draft --}}
                <a href="{{ route('admin.articles.index', ['status' => 'draft']) }}"
                class="stat-card {{ request('status') === 'draft' ? 'active' : '' }}">
                    <div class="stat-top">
                        <div class="stat-label">Draf</div>
                        <div class="stat-icon">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                    </div>
                    <div class="stat-value">{{ $jumlahDraft }}</div>
                    <div class="stat-description">
                        Naskah yang belum dikirim untuk review
                    </div>
                </a>

            </section>

            {{-- ARTICLE TABLE --}}
            <section class="table-panel">

                <div class="table-heading">
                    <div class="table-title">
                        <div class="table-title-icon">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <div>
                            <h3>Daftar Artikel</h3>
                            <p>Daftar naskah yang tersedia pada hasil filter ini.</p>
                        </div>
                    </div>

                    <div class="result-count">
                        <i class="fa-solid fa-layer-group"></i>
                        {{ $articles->total() }} artikel
                    </div>
                </div>

                @if($articles->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fa-regular fa-folder-open"></i>
                        </div>

                        <h3>Belum ada artikel</h3>

                        <p>
                            Belum ada artikel untuk ditampilkan dengan filter ini.
                            Coba pilih status lain atau periksa kembali kiriman penulis.
                        </p>

                        @if(!empty($status))
                            <a href="{{ route('admin.articles.index') }}" class="btn">
                                <i class="fa-solid fa-rotate-left"></i>
                                Tampilkan Semua Artikel
                            </a>
                        @endif
                    </div>
                @else
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Artikel</th>
                                    <th>Penulis</th>
                                    <th>Status</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Tindakan Editorial</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($articles as $article)
                                @php
                                    $statusArtikel = strtolower((string) $article->status);

                                    $statusConfig = [
                                        'review' => [
                                            'label' => 'Menunggu tinjauan',
                                            'class' => 'review',
                                            'icon' => 'fa-clock'
                                        ],
                                        'published' => [
                                            'label' => 'Terbit',
                                            'class' => 'published',
                                            'icon' => 'fa-circle-check'
                                        ],
                                        'rejected' => [
                                            'label' => 'Perlu revisi',
                                            'class' => 'rejected',
                                            'icon' => 'fa-pen-to-square'
                                        ],
                                        'draft' => [
                                            'label' => 'Draft',
                                            'class' => 'draft',
                                            'icon' => 'fa-file-lines'
                                        ],
                                    ];

                                    $statusTampilan = $statusConfig[$statusArtikel] ?? [
                                        'label' => ucfirst($statusArtikel),
                                        'class' => 'draft',
                                        'icon' => 'fa-file-lines'
                                    ];
                                @endphp

                                <tr class="article-row">
                                    <td>
                                        <div class="article-cell">
                                            <div class="article-number">
                                                <i class="fa-regular fa-file-lines"></i>
                                            </div>

                                            <div>
                                                <div class="article-title">
                                                    {{ $article->title }}
                                                </div>

                                                <div class="article-summary">
                                                    {{ \Illuminate\Support\Str::limit($article->summary ?? 'Belum ada ringkasan artikel.', 115) }}
                                                </div>

                                                @if($article->document_path)
                                                    <a class="document-link"
                                                       href="{{ route('admin.articles.document', $article) }}">
                                                        <i class="fa-solid fa-file-arrow-down"></i>
                                                        Unduh naskah
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="author-name">
                                            {{ $article->author_name ?: ($article->user->name ?? 'Penulis') }}
                                        </div>

                                        <span class="author-email">
                                            {{ $article->user->email ?? 'Email tidak tersedia' }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status {{ $statusTampilan['class'] }}">
                                            <i class="fa-solid {{ $statusTampilan['icon'] }}"></i>
                                            {{ $statusTampilan['label'] }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="date-text">
                                            <div>
                                                <i class="fa-regular fa-calendar"></i>
                                                {{ $article->created_at?->format('d M Y') ?? '-' }}
                                            </div>
                                            <div>
                                                <i class="fa-regular fa-clock"></i>
                                                {{ $article->created_at?->format('H:i') ?? '-' }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="action-cell">
                                        @if($article->status === 'review')
                                            <div class="action-stack">
                                                <div class="action-buttons">
                                                    <form method="POST"
                                                          action="{{ route('admin.articles.publish', $article) }}"
                                                          onsubmit="return confirm('Terbitkan artikel ini? Artikel akan dipublikasikan sesuai alur aplikasi.');">
                                                        @csrf
                                                        <button class="btn btn-success" type="submit">
                                                            <i class="fa-solid fa-check"></i>
                                                            Terbitkan
                                                        </button>
                                                    </form>
                                                </div>

                                                <form class="revision-form"
                                                      method="POST"
                                                      action="{{ route('admin.articles.reject', $article) }}">
                                                    @csrf

                                                    <label for="review_note_{{ $article->id }}">
                                                        <i class="fa-solid fa-comment-dots"></i>
                                                        Catatan untuk penulis
                                                    </label>

                                                    <textarea
                                                        id="review_note_{{ $article->id }}"
                                                        name="review_note"
                                                        required
                                                        maxlength="5000"
                                                        placeholder="Jelaskan bagian yang perlu diperbaiki...">{{ old('review_note') }}</textarea>

                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa-solid fa-rotate"></i>
                                                        Minta Revisi
                                                    </button>
                                                </form>
                                            </div>

                                        @elseif($article->status === 'published')
                                            <span class="already-published">
                                                <i class="fa-solid fa-circle-check"></i>
                                                Sudah diterbitkan
                                            </span>

                                            @if(\Illuminate\Support\Facades\Route::has('articles.show') && $article->slug)
                                                <div style="margin-top:10px">
                                                    <a class="document-link"
                                                       href="{{ route('articles.show', $article->slug) }}"
                                                       target="_blank">
                                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                        Lihat artikel
                                                    </a>
                                                </div>
                                            @endif

                                        @elseif($article->status === 'rejected')
                                            <span class="status rejected">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Menunggu perbaikan penulis
                                            </span>

                                        @else
                                            <span class="muted">
                                                <i class="fa-regular fa-hourglass-half"></i>
                                                Belum dikirim untuk ditinjau
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination">
                        {{ $articles->withQueryString()->links() }}
                    </div>
                @endif
            </section>

            <footer class="footer">
                <div>
                    <strong>Derap Serayu</strong> · Digital Magazine Banjarnegara
                </div>
                <div>
                    &copy; <span id="currentYear"></span> Derap Serayu.
                    Ruang cerita Banjarnegara.
                </div>
            </footer>

        </div>
    </main>
</div>


<script>
(function () {
    function initAdminTopbar() {
        // Ambil elemen
        const dateElement = document.getElementById('currentDate');
        const yearElement = document.getElementById('currentYear');

        const accountButton = document.getElementById('adminAccountButton');
        const dropdown = document.getElementById('adminAccountDropdown');
        const infoButton = document.getElementById('adminAccountInfoButton');

        const modal = document.getElementById('adminAccountModal');
        const closeButton = document.getElementById('adminAccountModalClose');
        const okButton = document.getElementById('adminAccountModalOk');

        const menuToggle = document.getElementById('menuToggle')
            || document.getElementById('mobileMenu');
        const sidebar = document.getElementById('sidebar');

        // 1. TANGGAL OTOMATIS
        function updateDate() {
            if (dateElement) {
                dateElement.textContent =
                    new Intl.DateTimeFormat('id-ID', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric',
                        timeZone: 'Asia/Jakarta'
                    }).format(new Date());
            }

            if (yearElement) {
                yearElement.textContent = new Date().getFullYear();
            }
        }

        updateDate();

        // 2. DROPDOWN AKUN
        function openDropdown() {
            if (!dropdown || !accountButton) return;

            dropdown.hidden = false;
            accountButton.setAttribute('aria-expanded', 'true');
        }

        function closeDropdown() {
            if (!dropdown || !accountButton) return;

            dropdown.hidden = true;
            accountButton.setAttribute('aria-expanded', 'false');
        }

        if (accountButton && dropdown) {
            // Pastikan kondisi awal tertutup
            closeDropdown();

            accountButton.addEventListener('click', function (event) {
                event.preventDefault();
                event.stopPropagation();

                if (dropdown.hidden) {
                    openDropdown();
                } else {
                    closeDropdown();
                }
            });

            dropdown.addEventListener('click', function (event) {
                event.stopPropagation();
            });

            document.addEventListener('click', function (event) {
                if (
                    !dropdown.contains(event.target) &&
                    !accountButton.contains(event.target)
                ) {
                    closeDropdown();
                }
            });
        }

        // 3. MODAL INFORMASI AKUN
        function openModal() {
            if (!modal) return;

            closeDropdown();
            modal.hidden = false;
            document.body.classList.add('modal-open');
        }

        function closeModal() {
            if (!modal) return;

            modal.hidden = true;
            document.body.classList.remove('modal-open');
        }

        if (infoButton) {
            infoButton.addEventListener('click', openModal);
        }

        if (closeButton) {
            closeButton.addEventListener('click', closeModal);
        }

        if (okButton) {
            okButton.addEventListener('click', closeModal);
        }

        if (modal) {
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeModal();
                }
            });
        }

        // 4. SIDEBAR RESPONSIF
        if (menuToggle && sidebar) {
            menuToggle.addEventListener('click', function (event) {
                event.stopPropagation();

                const isOpen =
                    sidebar.classList.contains('open') ||
                    sidebar.classList.contains('show');

                sidebar.classList.remove('open', 'show');

                if (!isOpen) {
                    sidebar.classList.add('open');
                }

                menuToggle.setAttribute(
                    'aria-expanded',
                    String(!isOpen)
                );
            });

            document.addEventListener('click', function (event) {
                if (
                    window.innerWidth <= 950 &&
                    !sidebar.contains(event.target) &&
                    !menuToggle.contains(event.target)
                ) {
                    sidebar.classList.remove('open', 'show');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // 5. TOMBOL ESCAPE
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeDropdown();
                closeModal();

                if (sidebar && window.innerWidth <= 950) {
                    sidebar.classList.remove('open', 'show');

                    if (menuToggle) {
                        menuToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            }
        });

        // 6. PENCARIAN ARTIKEL YANG SEDANG TAMPIL
        const searchInput = document.getElementById('articleSearch');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLocaleLowerCase('id-ID').trim();

                document.querySelectorAll('.article-row').forEach(function (row) {
                    row.hidden = !row.textContent
                        .toLocaleLowerCase('id-ID')
                        .includes(keyword);
                });
            });
        }
    }

    // Bisa berjalan baik jika script berada di head maupun di akhir body.
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAdminTopbar, {
            once: true
        });
    } else {
        initAdminTopbar();
    }
})();
</script>
</body>
</html>
