<style>
    .main {
        margin-left: 260px;
    }

    .topbar {
        position: sticky;
        top: 0;
        z-index: 500;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 78px;
        margin: 0;
        padding: 0 35px;
        background: rgba(255, 255, 255, .96);
        border-bottom: 1px solid #e1edf3;
    }

    .topbar-left,
    .topbar-right {
        display: flex;
        align-items: center;
    }

    .topbar-left {
        gap: 16px;
    }

    .topbar-right {
        gap: 20px;
    }

    .menu-toggle {
        display: none;
        color: #12456e;
        background: transparent;
        border: 0;
        cursor: pointer;
        font-size: 20px;
    }

    .breadcrumb {
        color: #7b91a3;
        font-size: 12px;
    }

    .breadcrumb strong {
        color: #12456e;
    }

    .breadcrumb a {
        color: inherit;
        text-decoration: none;
    }

    .date-info {
        color: #7b91a3;
        font-size: 12px;
        white-space: nowrap;
    }

    @media (max-width: 950px) {
        .main {
            margin-left: 0;
        }

        .menu-toggle {
            display: block;
        }

        .topbar {
            height: 68px;
            padding: 0 17px;
        }

        .date-info {
            display: none;
        }
    }
</style>
