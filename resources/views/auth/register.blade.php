<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar | Derap Serayu</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap"
          rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: #ffffff;
            background: #063f60;
        }

        a {
            text-decoration: none;
        }


        /* =====================================================
           TOP BAR
        ===================================================== */

        .topbar {
            height: 36px;

            padding: 0 6.5%;

            background: #063f60;

            display: flex;
            align-items: center;
            justify-content: space-between;

            font-size: 11px;

            position: relative;
            z-index: 20;
        }

        .top-left,
        .top-right {
            display: flex;
            align-items: center;
            gap: 17px;
        }

        .top-left span,
        .top-right a {
            color: rgba(255,255,255,.92);

            display: flex;
            align-items: center;
            gap: 6px;
        }

        .top-right a {
            transition: .2s;
        }

        .top-right a:hover {
            color: #6de0f4;
        }

        .divider {
            width: 1px;
            height: 13px;
            background: rgba(255,255,255,.25);
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {
            height: 82px;

            padding: 0 6.5%;

            background: rgba(255,255,255,.96);

            display: flex;
            align-items: center;
            justify-content: space-between;

            position: relative;
            z-index: 20;

            border-bottom: 1px solid rgba(0,0,0,.05);
        }

        .logo {
            width: 190px;

            display: flex;
            align-items: center;
        }

        .logo img {
            width: 165px;
            height: auto;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-menu a {
            color: #123f57;

            font-size: 12px;
            font-weight: 600;

            transition: .2s;
        }

        .nav-menu a:hover {
            color: #08add5;
        }


        /* =====================================================
           RIGHT NAV
        ===================================================== */

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box {
            width: 230px;
            height: 38px;

            border: 1px solid #dce8ed;

            border-radius: 30px;

            display: flex;
            align-items: center;

            padding: 0 14px;

            color: #7f99a5;

            background: #ffffff;
        }

        .search-box i {
            font-size: 12px;
            margin-right: 8px;
        }

        .search-box input {
            width: 100%;

            border: none;
            outline: none;

            font-family: 'DM Sans';

            font-size: 11px;
        }

        .menu-btn {
            height: 38px;

            padding: 0 17px;

            border: none;

            border-radius: 25px;

            background: #073f5e;
            color: #ffffff;

            font-family: 'DM Sans';

            font-size: 11px;
            font-weight: 700;

            display: flex;
            align-items: center;
            gap: 8px;

            cursor: pointer;

            transition: .25s;
        }

        .menu-btn:hover {
            background: #08add5;
        }


        /* =====================================================
           MAIN HERO
        ===================================================== */

        .register-hero {
            min-height: calc(100vh - 118px);

            position: relative;

            overflow: hidden;

            background-image:
                linear-gradient(
                    90deg,
                    rgba(4, 39, 55, .78) 0%,
                    rgba(4, 39, 55, .56) 45%,
                    rgba(4, 39, 55, .38) 100%
                ),
                url('{{ asset('images/bg-telagawarna-registerr.jpg') }}');

            background-size: cover;

            background-position: center;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 70px 25px;
        }


        /* =====================================================
           OVERLAY TEXTURE
        ===================================================== */

        .register-hero::before {
            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    120deg,
                    transparent 0%,
                    rgba(255,255,255,.04) 50%,
                    transparent 100%
                );

            pointer-events: none;
        }


        /* =====================================================
           DECORATIVE ORBS
        ===================================================== */

        .orb {
            position: absolute;

            border-radius: 50%;

            pointer-events: none;

            backdrop-filter: blur(3px);
        }

        .orb-one {
            width: 260px;
            height: 260px;

            right: -100px;
            top: 80px;

            border: 1px solid rgba(255,255,255,.13);

            background: rgba(255,255,255,.03);
        }

        .orb-two {
            width: 130px;
            height: 130px;

            left: 8%;
            bottom: 8%;

            border: 1px solid rgba(255,255,255,.15);

            background: rgba(8,173,213,.10);
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .register-content {
            width: 100%;
            max-width: 1050px;

            position: relative;

            z-index: 5;

            text-align: center;
        }


        /* =====================================================
           LOCATION LABEL
        ===================================================== */

        .location-label {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 8px 15px;

            margin-bottom: 18px;

            border-radius: 30px;

            background: rgba(255,255,255,.13);

            border: 1px solid rgba(255,255,255,.18);

            backdrop-filter: blur(12px);

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1.3px;

            color: #ffffff;
        }

        .location-label i {
            color: #67e0f5;
        }


        /* =====================================================
           MAIN TITLE
        ===================================================== */

        .register-title {
            font-family: 'Playfair Display', serif;

            font-size: clamp(42px, 5vw, 66px);

            line-height: 1.02;

            letter-spacing: -1.4px;

            margin-bottom: 14px;

            text-shadow:
                0 5px 25px rgba(0,0,0,.15);
        }

        .register-title span {
            color: #6de0f4;

            font-style: italic;
        }

        .register-subtitle {
            max-width: 570px;

            margin: 0 auto 40px;

            font-size: 14px;

            line-height: 1.8;

            color: rgba(255,255,255,.82);
        }


        /* =====================================================
           ACCOUNT CARDS
        ===================================================== */

        .account-grid {
            max-width: 760px;

            margin: 0 auto;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .account-card {
            position: relative;

            min-height: 280px;

            padding: 30px;

            border-radius: 24px;

            background: rgba(255,255,255,.90);

            border: 1px solid rgba(255,255,255,.6);

            backdrop-filter: blur(15px);

            box-shadow:
                0 20px 60px rgba(0,0,0,.18);

            text-align: left;

            overflow: hidden;

            transition:
                transform .35s ease,
                box-shadow .35s ease;
        }

        .account-card:hover {
            transform: translateY(-9px);

            box-shadow:
                0 30px 70px rgba(0,0,0,.25);
        }


        /* =====================================================
           CARD DECORATION
        ===================================================== */

        .card-decoration {
            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            right: -75px;
            bottom: -75px;

            transition: .4s;
        }

        .reader .card-decoration {
            background: #d9f7fc;
        }

        .writer .card-decoration {
            background: #e7e9ff;
        }

        .account-card:hover .card-decoration {
            transform: scale(1.35);
        }


        /* =====================================================
           CARD TOP
        ===================================================== */

        .card-top {
            position: relative;

            z-index: 2;

            display: flex;

            align-items: flex-start;

            justify-content: space-between;
        }


        /* =====================================================
           ICON
        ===================================================== */

        .card-icon {
            width: 58px;
            height: 58px;

            border-radius: 17px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;

            transition: .35s;
        }

        .reader .card-icon {
            background: #08a7d0;

            color: #e0f8fc;
        }

        .writer .card-icon {
            background: #536ed2;

            color: #e0f8fc;
        }

        .account-card:hover .card-icon {
            transform:
                rotate(-7deg)
                scale(1.1);
        }


        /* =====================================================
           CARD NUMBER
        ===================================================== */

        .card-number {
            font-family: 'Playfair Display', serif;

            font-size: 13px;

            color: #9db0b8;

            opacity: .8;
        }


        /* =====================================================
           CARD TEXT
        ===================================================== */

        .account-card h2 {
            position: relative;

            z-index: 2;

            margin-top: 24px;

            color: #073f5e;

            font-size: 22px;

            margin-bottom: 10px;
        }

        .account-card p {
            position: relative;

            z-index: 2;

            max-width: 300px;

            color: #718b97;

            font-size: 12px;

            line-height: 1.8;

            margin-bottom: 20px;
        }


        /* =====================================================
           CARD LINK
        ===================================================== */

        .card-link {
            position: relative;

            z-index: 3;

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 9px 14px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: 700;

            background: #073f5e;

            color: white;

            transition: .3s;
        }

        .reader .card-link {
            background: #08add5;
        }

        .writer .card-link {
            background: #536ed2;
        }

        .card-link i {
            transition: .3s;
        }

        .account-card:hover .card-link i {
            transform: translateX(4px);
        }

        .card-link:hover {
            transform: translateY(-2px);

            filter: brightness(1.08);
        }


        /* =====================================================
           LOGIN
        ===================================================== */

        .already-account {
            margin-top: 27px;

            color: rgba(255,255,255,.76);

            font-size: 12px;
        }

        .already-account a {
            color: #73e1f4;

            font-weight: 700;

            margin-left: 5px;
        }

        .already-account a:hover {
            text-decoration: underline;
        }


        /* =====================================================
           MINI TAGS
        ===================================================== */

        .mini-tags {
            margin-top: 25px;

            display: flex;

            justify-content: center;

            flex-wrap: wrap;

            gap: 8px;
        }

        .mini-tag {
            padding: 6px 11px;

            border-radius: 20px;

            background: rgba(255,255,255,.09);

            border: 1px solid rgba(255,255,255,.14);

            color: rgba(255,255,255,.68);

            font-size: 9px;

            backdrop-filter: blur(8px);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1200px) {

            .nav-menu {
                gap: 16px;
            }

            .nav-menu a {
                font-size: 11px;
            }

            .search-box {
                width: 180px;
            }
        }


        @media (max-width: 1050px) {

            .nav-menu {
                display: none;
            }

            .logo {
                width: auto;
            }

        }


        @media (max-width: 700px) {

            .topbar {
                display: none;
            }

            .navbar {
                height: 70px;

                padding: 0 20px;
            }

            .logo img {
                width: 145px;
            }

            .search-box {
                display: none;
            }

            .register-hero {
                min-height: calc(100vh - 70px);

                padding: 50px 18px;
            }

            .register-title {
                font-size: 40px;
            }

            .register-subtitle {
                font-size: 12px;

                margin-bottom: 30px;
            }

            .account-grid {
                grid-template-columns: 1fr;

                max-width: 430px;
            }

            .account-card {
                min-height: 245px;
            }

        }


        @media (max-width: 450px) {

            .menu-btn {
                display: none;
            }

            .register-title {
                font-size: 34px;
            }

            .account-card {
                padding: 25px;
            }

        }

    </style>
</head>


<body>


    <!-- =====================================================
         TOP BAR
    ====================================================== -->

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

            <a href="#">
                <i class="fa-solid fa-circle-info"></i>
                PPID
            </a>

            <a href="#">
                <i class="fa-solid fa-globe"></i>
                Layanan Publik
            </a>

            <a href="#">
                <i class="fa-solid fa-envelope"></i>
                Kontak
            </a>

            <a href="#">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <a href="#">
                <i class="fa-brands fa-facebook-f"></i>
            </a>

            <a href="#">
                <i class="fa-brands fa-youtube"></i>
            </a>

        </div>

    </div>



    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <nav class="navbar">


        <a href="/" class="logo">

            <img
                src="{{ asset('images/logo-derap-serayu.png') }}"
                alt="Derap Serayu"
            >

        </a>


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


        <div class="nav-right">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Cari berita, topik, atau kata kunci..."
                >

            </div>


            <button class="menu-btn">

                Menu

                <i class="fa-solid fa-bars"></i>

            </button>

        </div>

    </nav>



    <!-- =====================================================
         REGISTER HERO
    ====================================================== -->

    <main class="register-hero">


        <!-- Decorative -->

        <div class="orb orb-one"></div>

        <div class="orb orb-two"></div>



        <div class="register-content">


            <!-- Location -->

            <div class="location-label">

                <i class="fa-solid fa-mountain-sun"></i>

                BANJARNEGARA • JAWA TENGAH

            </div>



            <!-- Title -->

            <h1 class="register-title">

                Temukan Cerita.
                <br>

                <span>Bagikan Cerita.</span>

            </h1>



            <p class="register-subtitle">

                Jadilah bagian dari Derap Serayu.
                Jelajahi cerita tentang Banjarnegara,
                atau bagikan perspektifmu kepada orang lain.

            </p>



            <!-- Account Cards -->

            <div class="account-grid">


                <!-- =========================
                     PEMBACA
                ========================== -->

                <div class="account-card reader">


                    <div class="card-decoration"></div>


                    <div class="card-top">

                        <div class="card-icon">

                            <i class="fa-solid fa-book-open"></i>

                        </div>


                        <div class="card-number">
                            01
                        </div>

                    </div>


                    <h2>
                        Pembaca
                    </h2>


                    <p>

                        Jelajahi cerita, budaya,
                        sosok, dan berbagai hal menarik
                        dari Banjarnegara.

                    </p>


                    <a
                        href="{{ route('register.pembaca') }}"
                        class="card-link"
                    >

                        Mulai membaca

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>



                <!-- =========================
                     PENULIS
                ========================== -->

                <div class="account-card writer">


                    <div class="card-decoration"></div>


                    <div class="card-top">

                        <div class="card-icon">

                            <i class="fa-solid fa-feather-pointed"></i>

                        </div>


                        <div class="card-number">
                            02
                        </div>

                    </div>


                    <h2>
                        Penulis
                    </h2>


                    <p>

                        Punya cerita, pengalaman,
                        atau sudut pandang menarik?
                        Bagikan melalui Derap Serayu.

                    </p>


                    <a
                        href="{{ route('register.penulis') }}"
                        class="card-link"
                    >

                        Mulai menulis

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>


            </div>



            <!-- Login -->

            <div class="already-account">

                Sudah punya akun?

                <a href="{{ route('login') }}">

                    Masuk di sini
                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>



            <!-- Tags -->

            <div class="mini-tags">

                <div class="mini-tag">
                    #DerapSerayu
                </div>

                <div class="mini-tag">
                    #Banjarnegara
                </div>

                <div class="mini-tag">
                    #CeritaLokal
                </div>

                <div class="mini-tag">
                    #SuaraMuda
                </div>

            </div>


        </div>

    </main>


</body>
</html>