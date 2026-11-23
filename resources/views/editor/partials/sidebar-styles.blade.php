<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        width: 260px;
        height: 100vh;
        padding: 24px 17px;
        overflow-y: auto;
        color: #fff;
        background:
            linear-gradient(180deg, rgba(6, 48, 75, .97), rgba(9, 69, 93, .97)),
            url("{{ asset('images/bg-dieng-home.jpg') }}") center/cover;
        transition: .3s ease;
    }

    .brand {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
        padding: 10px;
        background: transparent;
    }

    .brand-logo-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 190px;
        height: 76px;
        padding: 8px 15px;
        background: #fff;
        border-radius: 13px;
    }

    .brand-logo {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .sidebar-label {
        margin: 12px 12px 13px;
        color: #91bdcf;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.6px;
        text-transform: uppercase;
    }

    .nav-menu {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 15px;
        color: #d5e9f1;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 500;
        transition: .25s;
    }

    .nav-link i {
        width: 19px;
        font-size: 15px;
        text-align: center;
    }

    .nav-link:hover,
    .nav-link.active {
        color: #fff;
        background: rgba(8, 173, 213, .23);
    }

    .nav-link.active {
        border-left: 3px solid #08add5;
        font-weight: 700;
    }

    .sidebar-bottom {
        position: static;
        right: auto;
        bottom: auto;
        left: auto;
        margin-top: auto;
        padding-top: 25px;
    }

    .editor-info {
        margin-bottom: 14px;
        padding: 15px;
        background: rgba(255,255,255,.09);
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 13px;
    }

    .editor-info strong {
        display: block;
        margin-bottom: 4px;
        font-size: 13px;
    }

    .editor-info span {
        color: #a9cedb;
        font-size: 11px;
    }

    .logout-button {
        width: 100%;
        padding: 12px;
        color: #fff;
        text-align: left;
        background: rgba(255,255,255,.09);
        border: 0;
        border-radius: 10px;
        cursor: pointer;
        font-size: 13px;
    }

    .logout-button:hover {
        background: rgba(220,85,85,.25);
    }

    .sidebar-overlay {
        display: none;
        position: fixed;
        z-index: 900;
        inset: 0;
        background: rgba(3,28,44,.45);
    }

    @media(max-width: 950px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar-overlay.show {
            display: block;
        }
    }
</style>
