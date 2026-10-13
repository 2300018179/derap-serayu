<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Berhasil | Derap Serayu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            color: #ffffff;
            background:
                linear-gradient(
                    90deg,
                    rgba(3,48,68,.18),
                    rgba(3,48,68,.05)
                ),
                url('{{ asset('images/bg-dieng-register.jpg') }}')
                center center / cover no-repeat fixed;
        }

        /* =========================
           TOP BAR
        ========================== */

        .topbar {
            height: 36px;
            background: #063f60;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 6%;
            font-size: 11px;
            color: #dcecf4;
        }

        .top-left,
        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .top-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .top-item i {
            color: #62d9f5;
        }

        /* =========================
           NAVBAR
        ========================== */

        .navbar {
            height: 82px;
            background: rgba(255, 255, 255, 0.97);
            display: flex;
            align-items: center;
            padding: 0 6%;
            color: #073f5e;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-right: auto;
        }

        .brand img {
            width: 43px;
            height: 43px;
            object-fit: contain;
        }

        .brand-text {
            line-height: 1;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
        }

        .brand-subtitle {
            font-size: 8px;
            letter-spacing: 2px;
            color: #7b9aaa;
            margin-top: 5px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 26px;
            font-size: 13px;
            font-weight: 600;
        }

        .nav-menu a {
            color: #34596c;
            text-decoration: none;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #08add5;
        }

        .search {
            width: 160px;
            height: 34px;
            margin-left: 25px;
            border: 1px solid #dce7ed;
            border-radius: 20px;
            display: flex;
            align-items: center;
            padding: 0 13px;
            gap: 8px;
            color: #8ca1ad;
        }

        .search input {
            width: 100%;
            border: none;
            outline: none;
            font-family: inherit;
            font-size: 11px;
        }

        .menu-btn {
            margin-left: 12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: #073f5e;
            color: white;
            cursor: pointer;
        }

        /* =========================
           MAIN
        ========================== */

        .main {
            min-height: calc(100vh - 118px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px 20px;
        }

        .success-wrapper {
            width: 100%;
            max-width: 920px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 50px;
            align-items: center;
        }

        /* =========================
           LEFT CONTENT
        ========================== */

        .left-content {
            padding-left: 15px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            letter-spacing: 2px;
            font-weight: 700;
            color: #72e3fa;
            margin-bottom: 18px;
        }

        .eyebrow span {
            width: 28px;
            height: 1px;
            background: #72e3fa;
        }

        .left-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(40px, 5vw, 60px);
            line-height: 1.05;
            margin-bottom: 20px;
        }

        .left-content h1 span {
            color: #68d9f5;
        }

        .left-content p {
            max-width: 400px;
            color: #d9e9ef;
            line-height: 1.8;
            font-size: 14px;
        }

        .quote {
            margin-top: 35px;
            padding-left: 18px;
            border-left: 2px solid #56d5f2;
            max-width: 390px;
        }

        .quote p {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-style: italic;
            line-height: 1.6;
            color: white;
        }

        /* =========================
           SUCCESS CARD
        ========================== */

        .success-card {
            position: relative;
            padding: 42px 42px 38px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.93);
            color: #173f54;
            box-shadow: 0 25px 70px rgba(0, 25, 40, 0.35);
            backdrop-filter: blur(18px);
            text-align: center;
            overflow: hidden;
        }

        .success-card::before {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border: 1px solid rgba(8, 173, 213, 0.18);
            border-radius: 50%;
            top: -75px;
            right: -55px;
        }

        .success-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border: 1px solid rgba(8, 173, 213, 0.14);
            border-radius: 50%;
            bottom: -55px;
            left: -45px;
        }

        /* =========================
           CHECK ICON
        ========================== */

        .success-icon {
            width: 92px;
            height: 92px;
            margin: 0 auto 24px;
            border-radius: 50%;
            background: rgba(8, 173, 213, 0.10);
            border: 1px solid rgba(8, 173, 213, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .success-icon::before {
            content: "";
            position: absolute;
            width: 72px;
            height: 72px;
            border: 1px dashed #08add5;
            border-radius: 50%;
        }

        .success-icon i {
            width: 48px;
            height: 48px;
            background: #08add5;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            box-shadow: 0 8px 22px rgba(8, 173, 213, 0.28);
        }

        .success-card .label {
            font-size: 10px;
            letter-spacing: 2px;
            color: #08add5;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .success-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #073f5e;
            margin-bottom: 12px;
        }

        .success-card > p {
            color: #718591;
            font-size: 13px;
            line-height: 1.7;
            max-width: 400px;
            margin: 0 auto;
        }

        /* =========================
           ACCOUNT INFO
        ========================== */

        .account-info {
            margin: 25px 0;
            padding: 16px;
            border-radius: 12px;
            background: #f3f9fb;
            border: 1px solid #e2eef2;
            display: flex;
            align-items: center;
            gap: 12px;
            text-align: left;
        }

        .account-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #dff7fc;
            color: #08add5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .account-info small {
            display: block;
            color: #91a2ab;
            font-size: 10px;
            margin-bottom: 3px;
        }

        .account-info strong {
            color: #234f63;
            font-size: 13px;
        }

        /* =========================
           BUTTON
        ========================== */

        .btn-login {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 10px;
            background: #073f5e;
            color: white;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.25s;
            box-shadow: 0 8px 20px rgba(7, 63, 94, 0.20);
        }

        .btn-login:hover {
            background: #08add5;
            transform: translateY(-2px);
        }

        .btn-login i {
            margin-left: 7px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 18px;
            text-decoration: none;
            color: #80939e;
            font-size: 11px;
            font-weight: 600;
            transition: 0.2s;
        }

        .back-link:hover {
            color: #08add5;
        }

        /* =========================
           SECURITY
        ========================== */

        .security {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid #e5edf0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            color: #92a2aa;
            font-size: 10px;
        }

        .security i {
            color: #08add5;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {
            .nav-menu {
                display: none;
            }

            .search {
                margin-left: auto;
            }

            .success-wrapper {
                grid-template-columns: 1fr;
                max-width: 600px;
            }

            .left-content {
                text-align: center;
                padding: 0;
            }

            .left-content p,
            .quote {
                margin-left: auto;
                margin-right: auto;
            }

            .quote {
                text-align: left;
            }
        }

        @media (max-width: 600px) {
            .topbar {
                padding: 0 20px;
            }

            .top-right {
                display: none;
            }

            .navbar {
                padding: 0 20px;
            }

            .brand-name {
                font-size: 19px;
            }

            .brand-subtitle {
                display: none;
            }

            .search {
                display: none;
            }

            .main {
                padding: 35px 18px;
            }

            .left-content h1 {
                font-size: 39px;
            }

            .success-card {
                padding: 35px 24px 30px;
            }

            .success-card h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <!-- TOP BAR -->
    <div class="topbar">
        <div class="top-left">

            <span>
                <i class="fa-solid fa-cloud-sun"></i>
                24°C
            </span>

            <div class="divider"></div>

            <span>
                <i class="fa-solid fa-location-dot"></i>
                Banjarnegara
            </span>

            <div class="divider"></div>

            <span>
                <i class="fa-regular fa-calendar"></i>
                {{ now()->translatedFormat('l, j F Y') }}
            </span>

        </div>


        <div class="top-right">
            <div>PPID</div>
            <div>Layanan Publik</div>
            <div>Kontak</div>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-youtube"></i>
            <i class="fa-brands fa-tiktok"></i>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="brand">
            <img src="{{ asset('images/logo-derap-serayu.png') }}" alt="Derap Serayu">
        </div>

        <div class="nav-menu">
            <a href="/" class="active">
                Beranda
            </a>

            <a href="/cerita">
                Cerita & Budaya
            </a>

            <a href="/opini">
                Opini
            </a>

            <a href="/sosok">
                Sosok
            </a>

            <a href="/sudut-kota">
                Sudut Kota
            </a>

            <a href="/potensi">
                Potensi
            </a>

            <a href="/teknologi">
                Teknologi
            </a>
        </div>

        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari...">
        </div>

        <button class="menu-btn">
            <i class="fa-solid fa-bars"></i>
        </button>

    </nav>

    <!-- MAIN -->
    <main class="main">

        <div class="success-wrapper">

            <!-- LEFT -->
            <div class="left-content">

                <div class="eyebrow">
                    <span></span>
                    PENDAFTARAN BERHASIL
                </div>

                <h1>
                    Selamat datang<br>
                    di <span>Derap Serayu.</span>
                </h1>

                <p>
                    Akun pembaca kamu sudah berhasil dibuat.
                    Sekarang kamu bisa menikmati berbagai cerita,
                    informasi, dan kabar menarik dari Banjarnegara.
                </p>

                <div class="quote">
                    <p>
                        “Setiap cerita punya tempat untuk dibaca,
                        dan setiap pembaca punya cerita untuk ditemukan.”
                    </p>
                </div>

            </div>

            <!-- SUCCESS CARD -->
            <div class="success-card">

                <div class="success-icon">
                    <i class="fa-solid fa-check"></i>
                </div>

                <div class="label">
                    AKUN BERHASIL DIVERIFIKASI
                </div>

                <h2>
                    Selamat, akunmu siap!
                </h2>

                <p>
                    Verifikasi berhasil. Akun pembaca kamu telah
                    aktif dan siap digunakan untuk menjelajahi
                    Derap Serayu.
                </p>

                <div class="account-info">

                    <div class="account-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div>
                        <small>AKUN PEMBACA</small>
                        <strong>annisa******@gmail.com</strong>
                    </div>

                </div>

                <a href="{{ route('login') }}" style="text-decoration: none;">
                    <button class="btn-login">
                        Masuk ke Akun
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </a>

                <a href="#" class="back-link">
                    <i class="fa-solid fa-house"></i>
                    Kembali ke Beranda
                </a>

                <div class="security">
                    <i class="fa-solid fa-shield-halved"></i>
                    Akun kamu telah berhasil diamankan dan diverifikasi
                </div>

            </div>

        </div>

    </main>

</body>
</html>