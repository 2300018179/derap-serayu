```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Artikel Saya | Derap Serayu</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --navy: #073b56;
            --navy-dark: #062f46;
            --cyan: #079fbd;
            --cyan-dark: #078ba8;
            --background: #eef9fd;
            --text: #123f60;
            --muted: #7796ad;
            --border: #d9edf8;
            --white: #ffffff;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--background);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        /* SIDEBAR */

        .sidebar {
            width: 270px;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            background: linear-gradient(
                180deg,
                #073d57 0%,
                #052f48 55%,
                #062c43 100%
            );
            color: white;
        }

        .brand {
            min-height: 83px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 17px 26px;
            border-bottom: 1px solid #ffffff18;
        }

        .brand-name {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -1px;
            color: white;
        }

        .brand-name span {
            color: #16c1d2;
        }

        .brand-caption {
            margin-top: 1px;
            font-size: 10px;
            color: #c5e4ee;
            font-weight: 600;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 23px 14px;
        }

        .menu-link {
            min-height: 51px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 0 17px;
            border-radius: 13px;
            color: #e1f0f7;
            font-size: 14px;
            font-weight: 700;
            transition: .2s ease;
        }

        .menu-link i {
            width: 23px;
            font-size: 18px;
            text-align: center;
        }

        .menu-link:hover,
        .menu-link.active {
            background: linear-gradient(110deg, #079ec2, #058db4);
            color: white;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 16px 14px 20px;
        }

        /* MAIN */

        .main {
            min-height: 100vh;
            margin-left: 270px;
        }

        /* TOP NAVBAR */

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

        /* PAGE CONTENT */

        .content {
            max-width: 1600px;
            margin: 0 auto;
            padding: 29px 27px 40px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 24px;
        }

        .eyebrow {
            margin: 0 0 7px;
            color: #7297b2;
            font-size: 12px;
            font-weight: 600;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: clamp(25px, 2.2vw, 32px);
            font-weight: 700;
        }

        .heading-description {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .heading-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            min-height: 43px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0 17px;
            border: 0;
            border-radius: 12px;
            background: var(--cyan);
            color: white;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s ease;
        }

        .button:hover {
            background: var(--cyan-dark);
            transform: translateY(-1px);
        }

        .button.secondary {
            background: #e2f3fa;
            color: #246083;
        }

        .button.secondary:hover {
            background: #d3edf7;
        }

        /* SUMMARY CARDS */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 23px;
        }

        .summary-card {
            min-height: 108px;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 19px;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 4px 15px #1c739008;
        }

        .summary-icon {
            width: 53px;
            height: 53px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #e6f7ff;
            color: #079de3;
            font-size: 21px;
        }

        .summary-icon.draft {
            background: #fff3dc;
            color: #f5a000;
        }

        .summary-icon.review {
            background: #e1faf3;
            color: #00ae8a;
        }

        .summary-card p {
            margin: 0 0 5px;
            color: #52738d;
            font-size: 12px;
            font-weight: 600;
        }

        .summary-card strong {
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 27px;
        }

        /* NOTIFICATIONS */

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 17px;
            padding: 14px 17px;
            border: 1px solid #ccefe3;
            border-radius: 12px;
            background: #eaf9f3;
            color: #176b56;
            font-size: 13px;
            line-height: 1.7;
        }

        .notice.error {
            border-color: #f4d6db;
            background: #fff1f3;
            color: #a33e50;
        }

        /* ARTICLE SECTION */

        .article-panel {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 5px 18px #1c73900a;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 21px 23px;
            border-bottom: 1px solid #e7f1f7;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .panel-title-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #e6f7ff;
            color: #079bd0;
            font-size: 16px;
        }

        .panel-title h2 {
            margin: 0;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 19px;
        }

        .panel-title p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .article-count {
            padding: 7px 11px;
            border-radius: 9px;
            background: #edf8fc;
            color: #28718e;
            font-size: 11px;
            font-weight: 700;
        }

        /* FILTER */

        .filters {
            display: grid;
            grid-template-columns: minmax(180px, 1fr) minmax(145px, 210px) auto;
            gap: 12px;
            align-items: end;
            padding: 20px 23px;
            border-bottom: 1px solid #e7f1f7;
            background: #fbfeff;
        }

        .filter-field label {
            display: block;
            margin-bottom: 8px;
            color: #52738d;
            font-size: 12px;
            font-weight: 700;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            top: 50%;
            left: 13px;
            color: #82a4bc;
            transform: translateY(-50%);
        }

        .filter-field input,
        .filter-field select {
            width: 100%;
            height: 43px;
            padding: 0 12px;
            border: 1px solid #d5e8f5;
            border-radius: 11px;
            outline: none;
            background: white;
            color: var(--text);
            font-size: 12px;
        }

        .filter-field input {
            padding-left: 37px;
        }

        .filter-field input:focus,
        .filter-field select:focus {
            border-color: #36b6d0;
            box-shadow: 0 0 0 3px #08a4c21a;
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        .filter-actions .button {
            min-height: 43px;
            padding: 0 15px;
            white-space: nowrap;
        }

        /* TABLE */

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: #fbfdff;
        }

        th {
            padding: 15px 19px;
            border-bottom: 1px solid #e5f0f7;
            color: #7896ae;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .3px;
            white-space: nowrap;
        }

        td {
            padding: 17px 19px;
            border-bottom: 1px solid #eaf2f7;
            color: #214d6b;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .2s ease;
        }

        tbody tr:hover {
            background: #f6fcff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .article-title {
            min-width: 210px;
            max-width: 380px;
            color: #103e60;
            font-size: 12px;
            font-weight: 800;
            line-height: 1.7;
        }

        .review-note {
            margin-top: 6px;
            color: #b06c20;
            font-size: 11px;
            line-height: 1.6;
        }

        .category-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 8px;
            background: #edf7fc;
            color: #41738f;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 20px;
            background: #edf3f7;
            color: #526f85;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status.draft {
            background: #edf3f7;
            color: #45667e;
        }

        .status.review {
            background: #fff2d2;
            color: #966400;
        }

        .status.published {
            background: #dcf8ed;
            color: #08795d;
        }

        .status.rejected {
            background: #fff0f2;
            color: #b13c50;
        }

        .date-label {
            min-width: 125px;
            color: #67849a;
            font-size: 11px;
            line-height: 1.7;
            white-space: nowrap;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .actions form {
            margin: 0;
        }

        .action-button {
            min-height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 0 12px;
            border: 0;
            border-radius: 10px;
            background: #e4f4fb;
            color: #286286;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
            white-space: nowrap;
            transition: .2s ease;
        }

        .action-button:hover {
            background: #d3edf8;
        }

        .action-button.delete {
            background: transparent;
            color: #d34b5d;
        }

        .action-button.delete:hover {
            background: #fff0f2;
        }

        /* EMPTY STATE */

        .empty {
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            display: grid;
            place-items: center;
            margin: 0 auto 17px;
            border-radius: 50%;
            background: #e8f7fd;
            color: #079fc0;
            font-size: 27px;
        }

        .empty h3 {
            margin: 0 0 9px;
            color: var(--navy);
            font-family: 'Playfair Display', serif;
            font-size: 20px;
        }

        .empty p {
            margin: 0 auto 20px;
            max-width: 390px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        /* PAGINATION */

        .pagination-wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 19px;
        }

        .pagination-info {
            color: var(--muted);
            font-size: 11px;
        }

        .pagination-wrap nav p {
            margin: 0;
        }

        .pagination-wrap nav > div {
            gap: 5px;
        }

        .pagination-wrap a,
        .pagination-wrap span {
            border-radius: 8px !important;
            font-size: 12px !important;
        }

        /* FOOTER */

        .footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 35px;
            padding-top: 18px;
            border-top: 1px solid #dcecf5;
            color: #819caf;
            font-size: 10px;
        }

        .footer strong {
            color: #52778e;
        }

        /* RESPONSIVE */

        @media (max-width: 1150px) {
            .sidebar {
                width: 225px;
            }

            .main {
                margin-left: 225px;
            }

            .content {
                padding-right: 19px;
                padding-left: 19px;
            }

            .topbar {
                padding: 0 19px;
            }

            .summary-grid {
                gap: 10px;
            }

            .summary-card {
                padding: 14px;
                gap: 10px;
            }

            .summary-icon {
                width: 43px;
                height: 43px;
                font-size: 18px;
            }

            .filters {
                grid-template-columns: minmax(150px, 1fr) minmax(125px, 170px);
            }

            .filter-actions {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                width: 70px;
            }

            .brand {
                align-items: center;
                padding: 15px 5px;
            }

            .brand-name {
                font-size: 0;
            }

            .brand-name::before {
                content: 'D';
                font-size: 29px;
            }

            .brand-name span,
            .brand-caption,
            .menu-link span {
                display: none;
            }

            .sidebar-menu {
                padding: 18px 9px;
            }

            .menu-link {
                justify-content: center;
                padding: 0;
            }

            .menu-link i {
                font-size: 19px;
            }

            .main {
                margin-left: 70px;
            }

            .topbar {
                height: 68px;
                gap: 12px;
                padding: 0 13px;
            }

            .topbar-weather {
                gap: 6px;
                padding-left: 10px;
            }

            .weather-icon {
                font-size: 19px;
            }

            .weather-info span,
            .profile .profile-info,
            .profile > i {
                display: none;
            }

            .profile {
                padding-left: 10px;
            }

            .avatar {
                width: 36px;
                height: 36px;
            }

            .content {
                padding: 23px 13px 30px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                min-height: 88px;
            }

            .filters {
                grid-template-columns: 1fr;
                padding: 17px;
            }

            .filter-actions {
                grid-column: auto;
            }

            .filter-actions .button {
                flex: 1;
            }

            .panel-header {
                padding: 17px;
            }

            .table-wrap table {
                min-width: 820px;
            }

            .footer {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 420px) {
            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .heading-actions {
                width: 100%;
            }

            .heading-actions .button {
                flex: 1;
            }

            .search-box {
                padding: 0 10px;
            }

            .topbar-weather {
                padding-left: 7px;
            }

            .weather-info strong {
                font-size: 10px;
            }
        }

        
    /* TOPBAR: DROPDOWN AKUN DAN NOTIFIKASI */
    .top-dropdown {
        position: relative;
        padding-left: 18px;
        border-left: 1px solid #e1eef7;
    }

    .dropdown-trigger {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        border: 0;
        background: transparent;
        color: #073b56;
        cursor: pointer;
    }

    .notification-button {
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        padding: 0;
        border-radius: 12px;
        color: #073b56;
        font-size: 19px;
        transition: .2s ease;
    }

    .notification-button:hover,
    .notification-button[aria-expanded="true"] {
        background: #eaf7fc;
        color: #079fbd;
    }

    .top-dropdown-menu {
        position: absolute;
        top: calc(100% + 17px);
        right: 0;
        z-index: 500;
        width: 330px;
        max-width: calc(100vw - 30px);
        overflow: hidden;
        display: none;
        border: 1px solid #dcecf5;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 15px 40px rgba(7, 59, 86, .16);
    }

    .top-dropdown-menu.show {
        display: block;
        animation: dropdownAppear .18s ease;
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
        gap: 12px;
        padding: 17px;
        border-bottom: 1px solid #e8f2f7;
        color: #073b56;
    }

    .dropdown-heading strong {
        display: block;
        font-size: 14px;
    }

    .dropdown-heading small {
        display: block;
        margin-top: 5px;
        color: #7796ad;
        font-size: 11px;
    }

    .dropdown-heading > i {
        color: #079fbd;
        font-size: 19px;
    }

    .dropdown-scroll {
        max-height: 310px;
        overflow-y: auto;
    }

    .dropdown-notice {
        display: flex;
        gap: 11px;
        padding: 14px 16px;
        border-bottom: 1px solid #edf4f8;
        color: #123f60;
        transition: background .2s ease;
    }

    .dropdown-notice:hover {
        background: #f4fbfe;
    }

    .dropdown-notice-icon {
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        display: grid;
        place-items: center;
        border-radius: 11px;
        background: #fff2d8;
        color: #b77909;
    }

    .dropdown-notice-icon.notice-orange {
        background: #fff0f2;
        color: #c7465a;
    }

    .dropdown-notice-text {
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .dropdown-notice-text strong {
        font-size: 11px;
    }

    .dropdown-notice-text small {
        color: #7796ad;
        font-size: 11px;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .dropdown-notice-text .notice-note {
        color: #b06c20;
    }

    .dropdown-empty {
        padding: 25px 18px;
        text-align: center;
        color: #7796ad;
    }

    .dropdown-empty > i {
        margin-bottom: 10px;
        color: #12a47e;
        font-size: 25px;
    }

    .dropdown-empty strong {
        display: block;
        color: #123f60;
        font-size: 13px;
    }

    .dropdown-empty p {
        margin: 7px 0 0;
        font-size: 11px;
        line-height: 1.7;
    }

    .dropdown-footer-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
        padding: 14px 17px;
        background: #f6fbfe;
        color: #078ba8;
        font-size: 11px;
        font-weight: 800;
    }

    .dropdown-footer-link:hover {
        background: #eaf7fc;
    }

    .user-top {
        position: relative;
        padding-left: 18px;
    }

    .user-profile-button {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 5px 8px;
        border: 0;
        border-radius: 12px;
        background: transparent;
        color: #073b56;
        text-align: left;
        cursor: pointer;
        transition: .2s ease;
    }

    .user-profile-button:hover,
    .user-profile-button[aria-expanded="true"] {
        background: #f0f9fd;
    }

    .user-avatar {
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        border: 2px solid #d9f2f7;
        border-radius: 50%;
        background: linear-gradient(135deg, #079fbd, #073b56);
        color: white;
        font-size: 14px;
        font-weight: 800;
    }

    .user-text {
        max-width: 155px;
    }

    .user-text strong {
        display: block;
        overflow: hidden;
        color: #073b56;
        font-size: 11px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .user-text small {
        display: block;
        margin-top: 4px;
        color: #7796ad;
        font-size: 10px;
    }

    .user-chevron {
        color: #7796ad;
        font-size: 10px;
        transition: transform .2s ease;
    }

    .user-profile-button[aria-expanded="true"] .user-chevron {
        transform: rotate(180deg);
    }

    .account-dropdown {
        width: 265px;
    }

    .account-identity {
        padding: 17px;
        border-bottom: 1px solid #e8f2f7;
        background: linear-gradient(135deg, #f0faff, #fff);
    }

    .account-identity strong {
        display: block;
        color: #073b56;
        font-size: 13px;
        overflow-wrap: anywhere;
    }

    .account-identity small {
        display: block;
        margin-top: 5px;
        color: #7796ad;
        font-size: 11px;
        overflow-wrap: anywhere;
    }

    .account-link {
        display: flex;
        align-items: center;
        gap: 11px;
        padding: 13px 17px;
        color: #315c76;
        font-size: 12px;
        font-weight: 600;
        transition: .2s ease;
    }

    .account-link i {
        width: 18px;
        color: #078ba8;
        text-align: center;
    }

    .account-link:hover {
        background: #f0f9fd;
    }

    .account-link.logout-link {
        border-top: 1px solid #e8f2f7;
        color: #c7465a;
    }

    .account-link.logout-link i {
        color: #c7465a;
    }

    /* CUACA DINAMIS */
    .weather {
        gap: 10px;
    }

    .weather .sun {
        flex-shrink: 0;
    }

    .weather strong {
        color: #073b56;
    }

    .weather small {
        color: #7796ad;
    }

    @media (max-width: 900px) {
        .topbar {
            gap: 10px;
        }

        .user-text {
            display: none;
        }

        .user-profile-button {
            gap: 5px;
            padding: 4px;
        }

        .top-dropdown {
            padding-left: 10px;
        }

        .user-top {
            padding-left: 10px;
        }
    }

    @media (max-width: 560px) {
        .topbar {
            padding: 0 10px;
        }

        .search {
            width: auto;
            min-width: 0;
            flex: 1;
        }

        .weather {
            gap: 5px;
            padding-left: 8px;
        }

        .weather .sun {
            font-size: 18px;
        }

        .weather strong {
            font-size: 10px;
        }

        .weather small {
            max-width: 65px;
            overflow: hidden;
            font-size: 9px;
            text-overflow: ellipsis;
        }

        .top-dropdown {
            padding-left: 7px;
        }

        .notification-button {
            width: 32px;
            height: 34px;
        }

        .user-top {
            padding-left: 7px;
        }

        .user-chevron {
            display: none;
        }
    }

    
        @media (max-width: 760px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .sidebar.sidebar-open {
                transform: translateX(0);
                width: 225px;
                box-shadow: 10px 0 35px rgba(7, 59, 86, .18);
            }

            .sidebar.sidebar-open .brand {
                align-items: flex-start;
                padding: 17px 20px;
            }

            .sidebar.sidebar-open .brand-name {
                font-size: 23px;
            }

            .sidebar.sidebar-open .brand-name::before {
                content: none;
            }

            .sidebar.sidebar-open .brand-name span,
            .sidebar.sidebar-open .brand-caption,
            .sidebar.sidebar-open .menu-link span {
                display: initial;
            }

            .sidebar.sidebar-open .sidebar-menu {
                padding: 18px 12px;
            }

            .sidebar.sidebar-open .menu-link {
                justify-content: flex-start;
                padding: 0 15px;
            }
        }


        /* LOGO SIDEBAR DERAP SERAYU */
        .brand {
            min-height: 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 17px 20px;
            border-bottom: 1px solid #ffffff18;
            text-align: center;
        }

        .brand-logo-wrapper {
            width: 100%;
            max-width: 205px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 7px 13px;
            overflow: hidden;
            border-radius: 13px;
            background: #ffffff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, .10);
        }

        .brand-logo {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
        }

        .brand-caption {
            margin-top: 0;
            font-size: 10px;
            line-height: 1.5;
            color: #c5e4ee;
            font-weight: 600;
            text-align: center;
        }

        /* Tampilan sidebar kecil */
        @media (max-width: 760px) {
            .brand {
                min-height: 76px;
                padding: 10px 5px;
                gap: 0;
            }

            .brand-logo-wrapper {
                width: 49px;
                height: 49px;
                padding: 5px;
                border-radius: 10px;
            }

            .brand-caption {
                display: none;
            }

            .sidebar.sidebar-open .brand {
                min-height: 110px;
                padding: 13px 15px;
                gap: 8px;
            }

            .sidebar.sidebar-open .brand-logo-wrapper {
                width: 100%;
                max-width: 190px;
                height: 60px;
                padding: 7px 12px;
            }

            .sidebar.sidebar-open .brand-caption {
                display: block;
            }
        }

        .top-dropdown {
            position: relative;
            flex-shrink: 0;
        }

        .notification-button {
            position: relative;
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            padding: 0;
            border: 0;
            border-radius: 12px;
            background: transparent;
            color: #073b56;
            font-size: 19px;
            cursor: pointer;
            transition: background .2s ease, color .2s ease;
        }

        .notification-button:hover,
        .notification-button[aria-expanded="true"] {
            background: #eaf7fc;
            color: #079fbd;
        }

        .notification-dot {
            position: absolute;
            top: 1px;
            right: 1px;
            min-width: 17px;
            height: 17px;
            display: grid;
            place-items: center;
            padding: 0 4px;
            border: 2px solid #fff;
            border-radius: 20px;
            background: #ef5361;
            color: #fff;
            font-size: 9px;
            font-weight: 800;
            line-height: 1;
        }

        .top-dropdown-menu {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            z-index: 1000;
            width: 340px;
            max-width: calc(100vw - 24px);
            display: none;
            overflow: hidden;
            border: 1px solid #dcecf5;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 15px 40px rgba(7, 59, 86, .16);
        }

        .top-dropdown-menu.show {
            display: block;
            animation: notificationAppear .18s ease;
        }

        @keyframes notificationAppear {
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
            gap: 12px;
            padding: 17px;
            border-bottom: 1px solid #e8f2f7;
        }

        .dropdown-heading strong {
            display: block;
            color: #073b56;
            font-size: 14px;
        }

        .dropdown-heading small {
            display: block;
            margin-top: 5px;
            color: #7796ad;
            font-size: 11px;
        }

        .dropdown-heading > i {
            color: #079fbd;
            font-size: 19px;
        }

        .dropdown-scroll {
            max-height: 320px;
            overflow-y: auto;
        }

        .dropdown-notice {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 14px 16px;
            border-bottom: 1px solid #edf4f8;
            color: #123f60;
            text-decoration: none;
            transition: background .2s ease;
        }

        .dropdown-notice:hover {
            background: #f4fbfe;
        }

        .dropdown-notice:last-child {
            border-bottom: 0;
        }

        .dropdown-notice-icon {
            width: 37px;
            height: 37px;
            flex: 0 0 37px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: #fff2d8;
            color: #b77909;
        }

        .dropdown-notice-icon.notice-orange {
            background: #fff0f2;
            color: #c7465a;
        }

        .dropdown-notice-text {
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .dropdown-notice-text strong {
            color: #123f60;
            font-size: 11px;
            line-height: 1.5;
        }

        .dropdown-notice-text small {
            color: #7796ad;
            font-size: 11px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .dropdown-notice-text .notice-note {
            color: #b06c20;
        }

        .dropdown-empty {
            padding: 27px 18px;
            text-align: center;
            color: #7796ad;
        }

        .dropdown-empty > i {
            display: block;
            margin-bottom: 10px;
            color: #12a47e;
            font-size: 25px;
        }

        .dropdown-empty strong {
            display: block;
            color: #123f60;
            font-size: 13px;
        }

        .dropdown-empty p {
            margin: 7px 0 0;
            font-size: 11px;
            line-height: 1.7;
        }

        .dropdown-footer-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            padding: 14px 17px;
            border-top: 1px solid #e8f2f7;
            background: #f6fbfe;
            color: #078ba8;
            font-size: 11px;
            font-weight: 800;
            text-decoration: none;
        }

        .dropdown-footer-link:hover {
            background: #eaf7fc;
        }

        @media (max-width: 560px) {
            .top-dropdown-menu {
                position: fixed;
                top: 76px;
                right: 10px;
                width: 340px;
                max-width: calc(100vw - 20px);
            }

            .notification-button {
                width: 36px;
                height: 36px;
            }
        }

        .notification-dropdown {
            width: 325px;
            max-width: calc(100vw - 30px);
            box-sizing: border-box;
            overflow: hidden;
        }

        /* Header notifikasi */
        .notification-dropdown .dropdown-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            width: 100%;
            min-width: 0;
            box-sizing: border-box;
        }

        /* Area daftar notifikasi */
        .notification-dropdown .dropdown-scroll {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;

            overflow-x: hidden;
            overflow-y: auto;

            scrollbar-width: thin;
            scrollbar-color: #b8cbd5 transparent;
        }

        /* Item notifikasi */
        .notification-dropdown .dropdown-notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;

            overflow-wrap: anywhere;
        }

        /* Ikon tidak ikut mengecil */
        .notification-dropdown .dropdown-notice-icon {
            flex: 0 0 36px;
        }

        /* Teks boleh turun ke baris berikutnya */
        .notification-dropdown .dropdown-notice-text {
            flex: 1 1 0;
            min-width: 0;
            max-width: 100%;

            overflow-wrap: anywhere;
            word-break: break-word;
        }

        /* Judul dan keterangan artikel */
        .notification-dropdown .dropdown-notice-text strong,
        .notification-dropdown .dropdown-notice-text small {
            display: block;
            max-width: 100%;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        /* Catatan revisi */
        .notification-dropdown .notice-note {
            white-space: normal;
            overflow-wrap: anywhere;
        }

        /* Pesan ketika tidak ada notifikasi */
        .notification-dropdown .dropdown-empty {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;
            padding: 24px 14px;
            text-align: center;
            overflow-wrap: anywhere;
        }

        /* Footer dropdown */
        .notification-dropdown .dropdown-footer-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;

            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;

            overflow-wrap: anywhere;
        }

        /* Tampilan ponsel */
        @media (max-width: 480px) {
            .notification-dropdown {
                width: min(325px, calc(100vw - 24px));
                max-width: calc(100vw - 24px);
            }
        }

        .logout-form {
            display: block;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .account-link.logout-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            box-sizing: border-box;
            border: none;
            background: transparent;
            text-align: left;
            text-decoration: none;
            font: inherit;
            cursor: pointer;
        }

        .account-link.logout-link:hover {
            background: #fff1f0;
            color: #dc3545;
        }

        .account-divider {
            height: 1px;
            margin: 8px 0;
            background: #e5edf2;
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <a href="{{ route('penulis.dashboard') }}" class="brand">
            <span class="brand-logo-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Derap Serayu"
                     class="brand-logo">
            </span>
        </a>

        <nav class="sidebar-menu">
            <a href="{{ route('penulis.dashboard') }}" class="menu-link">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('penulis.artikel.create') }}" class="menu-link">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Tulis Artikel</span>
            </a>

            <a href="{{ route('penulis.articles.index') }}"
               class="menu-link active">
                <i class="fa-regular fa-file-lines"></i>
                <span>Artikel Saya</span>
            </a>

            <a href="{{ url('/') }}" target="_blank" class="menu-link">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>Lihat Website</span>
            </a>
        </nav>
    </aside>

    {{-- MAIN CONTENT --}}
    <div class="main">

        {{-- TOPBAR --}}
        
        <header class="topbar">
            <button
                type="button"
                class="menu-toggle"
                onclick="toggleSidebar()"
                aria-label="Buka menu"
            >
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="top-spacer"></div>

            {{-- NOTIFIKASI ARTIKEL --}}
            @php
                $artikelPerhatian = $artikelPerhatian ?? collect();
                $jumlahNotifikasi = $artikelPerhatian->count();
            @endphp

            <div class="top-item top-dropdown">
                <button
                    type="button"
                    class="notification-button dropdown-trigger"
                    id="notificationToggle"
                    aria-label="Buka notifikasi"
                    aria-expanded="false"
                    aria-controls="notificationDropdown"
                    onclick="toggleTopDropdown('notificationDropdown', this)"
                >
                    <i class="fa-regular fa-bell"></i>

                    @if($jumlahNotifikasi > 0)
                        <span class="notification-dot">
                            {{ $jumlahNotifikasi > 9 ? '9+' : $jumlahNotifikasi }}
                        </span>
                    @endif
                </button>

                <div
                    class="top-dropdown-menu notification-dropdown"
                    id="notificationDropdown"
                >
                    <div class="dropdown-heading">
                        <div>
                            <strong>Notifikasi</strong>
                            <small>Informasi terbaru artikelmu</small>
                        </div>
                        <i class="fa-regular fa-bell"></i>
                    </div>

                    <div class="dropdown-scroll">
                        @forelse($artikelPerhatian as $artikel)
                            <a
                                href="{{ route('penulis.articles.edit', $artikel) }}"
                                class="dropdown-notice"
                            >
                                <span class="dropdown-notice-icon {{ $artikel->status === 'rejected' ? 'notice-orange' : '' }}">
                                    <i class="fa-solid {{ $artikel->status === 'rejected' ? 'fa-pen-to-square' : 'fa-clock' }}"></i>
                                </span>

                                <span class="dropdown-notice-text">
                                    <strong>
                                        {{ $artikel->status === 'rejected' ? 'Artikel perlu direvisi' : 'Artikel menunggu tinjauan' }}
                                    </strong>

                                    <small>{{ $artikel->title }}</small>

                                    @if($artikel->review_note)
                                        <small class="notice-note">
                                            Catatan: {{ $artikel->review_note }}
                                        </small>
                                    @endif

                                    <small>
                                        {{ $artikel->updated_at?->format('d M Y, H:i') ?? '-' }}
                                    </small>
                                </span>
                            </a>
                        @empty
                            <div class="dropdown-empty">
                                <i class="fa-regular fa-circle-check"></i>
                                <strong>Belum ada notifikasi</strong>
                                <p>
                                    Notifikasi artikel yang menunggu tinjauan atau
                                    memerlukan revisi akan muncul di sini.
                                </p>
                            </div>
                        @endforelse
                    </div>

                    <a
                        href="{{ route('penulis.articles.index') }}"
                        class="dropdown-footer-link"
                    >
                        Lihat semua artikel
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            {{-- CUACA BANJARNEGARA --}}
            <div class="top-item weather" id="weatherWidget">
                <i class="fa-solid fa-cloud-sun sun" id="weatherIcon"></i>

                <div>
                    <strong id="weatherTemperature">Memuat...</strong>
                    <small id="weatherDescription">Cuaca Banjarnegara</small>
                </div>
            </div>

            {{-- AKUN PENULIS --}}
            <div class="top-item top-dropdown user-top">
                <button
                    type="button"
                    class="user-profile-button dropdown-trigger"
                    id="accountToggle"
                    aria-label="Buka menu akun"
                    aria-expanded="false"
                    aria-controls="accountDropdown"
                    onclick="toggleTopDropdown('accountDropdown', this)"
                >
                    <span class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                    </span>

                    <span class="user-text">
                        <strong>{{ auth()->user()->name ?? 'Penulis' }}</strong>
                        <small>Penulis</small>
                    </span>

                    <i class="fa-solid fa-chevron-down user-chevron"></i>
                </button>

                <div
                    class="top-dropdown-menu account-dropdown"
                    id="accountDropdown"
                >
                    <div class="account-identity">
                        <strong>{{ auth()->user()->name ?? 'Penulis' }}</strong>
                        <small>{{ auth()->user()->email ?? '' }}</small>
                    </div>

                    <div class="account-divider"></div>

                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="logout-form"
                    >
                        @csrf

                        <button type="submit" class="account-link logout-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Keluar dari Akun
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <main class="content">

            {{-- PAGE HEADING --}}
            <section class="page-heading">
                <div>
                    <p class="eyebrow">RUANG KERJA PENULIS</p>
                    <h1>Artikel Saya</h1>
                    <p class="heading-description">
                        Kelola tulisan, pantau status, dan perbarui artikelmu
                        di Derap Serayu.
                    </p>
                </div>
            </section>

            {{-- FLASH MESSAGES --}}
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

            {{-- SUMMARY --}}
            <section class="summary-grid">
                <div class="summary-card">
                    <div class="summary-icon">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>
                    <div>
                        <p>Total Artikel</p>
                        <strong>{{ $articles->total() }}</strong>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-icon review">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <p>Menunggu Tinjauan</p>
                        <strong>
                            {{ $articles->getCollection()->where('status', 'review')->count() }}
                        </strong>
                    </div>
                </div>

                <div class="summary-card">
                    <div class="summary-icon draft">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </div>
                    <div>
                        <p>Artikel Draft</p>
                        <strong>
                            {{ $articles->getCollection()->where('status', 'draft')->count() }}
                        </strong>
                    </div>
                </div>
            </section>

            {{-- ARTICLE LIST --}}
            <section class="article-panel">

                <div class="panel-header">
                    <div class="panel-title">
                        <div class="panel-title-icon">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                        <div>
                            <h2>Daftar Artikel</h2>
                            <p>Semua tulisan yang kamu buat</p>
                        </div>
                    </div>

                    <span class="article-count">
                        {{ $articles->total() }} artikel
                    </span>
                </div>

                {{-- FILTER FORM --}}
                <form class="filters"
                      method="GET"
                      action="{{ route('penulis.articles.index') }}">

                    <div class="filter-field">
                        <label for="search">Cari artikel</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input id="search"
                                   name="search"
                                   type="search"
                                   maxlength="100"
                                   value="{{ $search }}"
                                   placeholder="Judul, ringkasan, atau kategori">
                        </div>
                    </div>

                    <div class="filter-field">
                        <label for="status">Status artikel</label>
                        <select id="status" name="status">
                            <option value="">Semua status</option>

                            @foreach([
                                'draft' => 'Draft',
                                'review' => 'Ditinjau',
                                'rejected' => 'Perlu revisi',
                                'published' => 'Terbit'
                            ] as $value => $label)
                                <option value="{{ $value }}"
                                    @selected(($validated['status'] ?? '') === $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button class="button" type="submit">
                            <i class="fa-solid fa-filter"></i>
                            Terapkan
                        </button>

                        @if($search || !empty($validated['status']))
                            <a href="{{ route('penulis.articles.index') }}"
                               class="button secondary">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>

                {{-- TABLE --}}
                @if($articles->isEmpty())

                    <div class="empty">
                        <div class="empty-icon">
                            <i class="fa-regular fa-folder-open"></i>
                        </div>

                        <h3>Belum Ada Artikel</h3>

                        <p>
                            Kamu belum memiliki artikel yang sesuai dengan
                            pencarian ini. Mulai tulis cerita dan ide menarik
                            tentang Banjarnegara.
                        </p>

                        <a href="{{ route('penulis.artikel.create') }}"
                           class="button">
                            <i class="fa-solid fa-plus"></i>
                            Tulis Artikel Baru
                        </a>
                    </div>

                @else

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Judul Artikel</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Diperbarui</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <div class="article-title">
                                                {{ $article->title }}
                                            </div>

                                            @if($article->review_note)
                                                <div class="review-note">
                                                    <i class="fa-solid fa-comment-dots"></i>
                                                    Catatan: {{ $article->review_note }}
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="category-label">
                                                <i class="fa-regular fa-folder-open"></i>
                                                {{ $article->category }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="status {{ $article->status }}">
                                                @switch($article->status)
                                                    @case('review')
                                                        <i class="fa-solid fa-clock"></i>
                                                        Ditinjau
                                                        @break

                                                    @case('published')
                                                        <i class="fa-solid fa-circle-check"></i>
                                                        Terbit
                                                        @break

                                                    @case('rejected')
                                                        <i class="fa-solid fa-rotate-left"></i>
                                                        Perlu revisi
                                                        @break

                                                    @default
                                                        <i class="fa-regular fa-file-lines"></i>
                                                        Draft
                                                @endswitch
                                            </span>
                                        </td>

                                        <td>
                                            <div class="date-label">
                                                <i class="fa-regular fa-calendar"></i>
                                                {{ $article->updated_at->format('d M Y') }}
                                                <br>
                                                <i class="fa-regular fa-clock"></i>
                                                {{ $article->updated_at->format('H:i') }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="actions">
                                                @if($article->status === 'published')

                                                    <a class="action-button"
                                                       href="{{ route('articles.show', $article->slug) }}">
                                                        <i class="fa-regular fa-eye"></i>
                                                        Lihat
                                                    </a>

                                                @else

                                                    <a class="action-button"
                                                       href="{{ route('penulis.articles.edit', $article) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                        Edit
                                                    </a>

                                                    <form method="POST"
                                                          action="{{ route('penulis.articles.destroy', $article) }}"
                                                          onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="action-button delete"
                                                                type="submit">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                            Hapus
                                                        </button>
                                                    </form>

                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif
            </section>

            {{-- PAGINATION --}}
            <div class="pagination-wrap">
                <div class="pagination-info">
                    Menampilkan
                    {{ $articles->firstItem() ?? 0 }}–{{ $articles->lastItem() ?? 0 }}
                    dari {{ $articles->total() }} artikel
                </div>

                <div>
                    {{ $articles->withQueryString()->links() }}
                </div>
            </div>

            {{-- FOOTER --}}
            <footer class="footer">
                <div>
                    <strong>Derap Serayu</strong>
                    · Media Informasi Banjarnegara
                </div>

                <div>
                    Menulis cerita hari ini, menginspirasi esok hari.
                </div>
            </footer>

        </main>
    </div>

    <script>
        // Pencarian cepat pada daftar artikel yang sedang ditampilkan.
        // Untuk pencarian seluruh data, gunakan kolom pencarian di filter.
        document.getElementById('quickSearch')?.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();

                const searchInput = document.getElementById('search');
                searchInput.value = this.value;

                searchInput.closest('form').submit();
            }
        });

        
        /* DROPDOWN AKUN DAN NOTIFIKASI */
        function toggleTopDropdown(dropdownId, trigger) {
            const dropdown = document.getElementById(dropdownId);

            if (!dropdown) return;

            const isOpen = dropdown.classList.contains('show');

            document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });

            document.querySelectorAll('.dropdown-trigger').forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                dropdown.classList.add('show');
                trigger.setAttribute('aria-expanded', 'true');
            }
        }

        /* Tutup dropdown jika pengguna mengeklik di luar menu */
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

        /* Tutup dropdown dengan tombol Escape */
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

        /* PENCARIAN CEPAT */
        document.getElementById('quickSearch')?.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();

                const searchForm = document.getElementById('searchForm');
                if (searchForm) searchForm.submit();
            }
        });

        /* MENU SIDEBAR RESPONSIF */
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');

            if (sidebar) {
                sidebar.classList.toggle('sidebar-open');
            }
        }

        /* CUACA TERKINI BANJARNEGARA DARI OPEN-METEO */
        async function loadBanjarnegaraWeather() {
            const temperature = document.getElementById('weatherTemperature');
            const description = document.getElementById('weatherDescription');
            const icon = document.getElementById('weatherIcon');

            if (!temperature || !description || !icon) return;

            try {
                const url =
                    'https://api.open-meteo.com/v1/forecast' +
                    '?latitude=-7.396&longitude=109.691' +
                    '&current=temperature_2m,weather_code,is_day' +
                    '&timezone=Asia%2FJakarta';

                const response = await fetch(url);

                if (!response.ok) {
                    throw new Error('Gagal mengambil data cuaca');
                }

                const data = await response.json();
                const current = data.current;

                if (!current) {
                    throw new Error('Data cuaca tidak tersedia');
                }

                const code = Number(current.weather_code);
                const isDay = Number(current.is_day) === 1;

                const weatherDescriptions = {
                    0: 'Cerah',
                    1: 'Cerah berawan',
                    2: 'Berawan sebagian',
                    3: 'Mendung',
                    45: 'Berkabut',
                    48: 'Kabut tebal',
                    51: 'Gerimis ringan',
                    53: 'Gerimis',
                    55: 'Gerimis lebat',
                    61: 'Hujan ringan',
                    63: 'Hujan sedang',
                    65: 'Hujan lebat',
                    71: 'Salju ringan',
                    73: 'Salju sedang',
                    75: 'Salju lebat',
                    80: 'Hujan lokal',
                    81: 'Hujan lokal sedang',
                    82: 'Hujan lokal lebat',
                    95: 'Badai petir',
                    96: 'Badai petir dan hujan es',
                    99: 'Badai petir kuat'
                };

                let iconClass = 'fa-cloud-sun';

                if ([0, 1].includes(code)) {
                    iconClass = isDay ? 'fa-sun' : 'fa-moon';
                } else if ([2, 3, 45, 48].includes(code)) {
                    iconClass = code === 2 && isDay ? 'fa-cloud-sun' : 'fa-cloud';
                } else if (code >= 51 && code <= 67) {
                    iconClass = 'fa-cloud-rain';
                } else if (code >= 71 && code <= 77) {
                    iconClass = 'fa-snowflake';
                } else if (code >= 80 && code <= 82) {
                    iconClass = 'fa-cloud-showers-heavy';
                } else if (code >= 95) {
                    iconClass = 'fa-cloud-bolt';
                }

                temperature.textContent =
                    `${Math.round(current.temperature_2m)}°C`;

                description.textContent =
                    weatherDescriptions[code] ?? 'Kondisi cuaca terkini';

                icon.className = `fa-solid ${iconClass} sun`;
            } catch (error) {
                temperature.textContent = '--°C';
                description.textContent = 'Cuaca tidak tersedia';
                icon.className = 'fa-solid fa-cloud sun';

                console.error('Cuaca Banjarnegara:', error);
            }
        }

        loadBanjarnegaraWeather();

        /* Perbarui cuaca setiap 10 menit */
        setInterval(loadBanjarnegaraWeather, 10 * 60 * 1000);

    </script>

</body>
</html>