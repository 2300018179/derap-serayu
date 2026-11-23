<style>
        /* Shell penulis bersama: sidebar, topbar, notifikasi, dan menu akun */
        .sidebar, .topbar, .mobile-overlay {
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

        .top-search {
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

        .top-search i {
            color: #6e9abb;
            font-size: 14px;
        }

        .top-search input {
            min-width: 0;
            width: 100%;
            border: 0;
            outline: none;
            color: var(--text);
            background: transparent;
            font-size: 12px;
        }

        .top-search input::placeholder {
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


        .mobile-overlay {
            display: none;
        }

        @media (max-width: 1350px) {
            .sidebar { width: 225px; }
            .main { margin-left: 225px; }
            .topbar { padding: 0 20px; gap: 14px; }
        }

        @media (max-width: 1000px) {
            .sidebar { width: 250px; transform: translateX(-100%); transition: transform .25s ease; }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; }
            .menu-toggle { display: block; }
            .mobile-overlay.show { display: block; position: fixed; inset: 0; z-index: 20; background: rgba(2, 30, 46, .45); }
            .topbar { padding: 0 16px; }
            .weather { display: none; }
        }

        @media (max-width: 700px) {
            .topbar { height: 62px; gap: 10px; }
            .top-search { width: auto; flex: 1; padding: 0 10px; }
            .top-search input { font-size: 11px; }
            .user-top .user-text, .user-top > i { display: none; }
            .top-item { padding-left: 10px; }
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

    .notice-green {
        color: #0a8f6a;
        background: #dff7ee;
    }

    .notice-red {
        color: #c0364a;
        background: #ffe4e8;
    }

    .notice-gray {
        color: #5b7a92;
        background: #eaf1f6;
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

    .account-profile-link-wrap {
        padding: 8px 8px 0;
        border-top: 1px solid #e9f2f7;
    }

    .account-profile-link {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 12px;
        border-radius: 9px;
        color: #073f5e;
        text-decoration: none;
        font-size: 11px;
        font-weight: 800;
    }

    .account-profile-link:hover {
        background: #e8f8fc;
        color: #08add5;
    }

    .account-logout-form {
        padding: 8px;
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
@include('partials.site-theme-styles')
