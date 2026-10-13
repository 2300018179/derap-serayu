<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Penulis Berhasil | Derap Serayu</title>

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
            color: #fff;

            background:
                linear-gradient(
                    90deg,
                    rgba(3, 48, 68, .20),
                    rgba(3, 48, 68, .06)
                ),
                url('{{ asset('images/bg-diengplateau-registerrr.jpg') }}')
                center center / cover no-repeat fixed;
        }


        /* =========================
           TOP BAR
        ========================== */

        .topbar {
            height: 36px;
            background: #063f60;

            display: flex;
            align-items: center;
            justify-content: space-between;

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
            color: #68d9f5;
        }

        .top-right i {
            color: #b8d5e1;
        }


        /* =========================
           NAVBAR
        ========================== */

        .navbar {
            height: 88px;

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
            width: 45px;
            height: 45px;
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
            margin-top: 5px;

            font-size: 8px;
            letter-spacing: 2px;

            color: #7b9aaa;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 27px;

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
            width: 165px;
            height: 35px;

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

            border: none;
            border-radius: 50%;

            background: #073f5e;
            color: white;

            cursor: pointer;
        }


        /* =========================
           MAIN
        ========================== */

        .main {
            min-height: calc(100vh - 124px);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px 30px;
        }

        .content-wrapper {
            width: 100%;
            max-width: 1080px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 65px;

            align-items: center;
        }


        /* =========================
           LEFT CONTENT
        ========================== */

        .left-content {
            padding-left: 15px;
        }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;

            margin-bottom: 18px;

            color: #72e3fa;

            font-size: 10px;
            font-weight: 700;

            letter-spacing: 2px;
        }

        .eyebrow-line {
            width: 28px;
            height: 1px;

            background: #72e3fa;
        }

        .left-content h1 {
            font-family: 'Playfair Display', serif;

            font-size: clamp(42px, 5vw, 60px);

            line-height: 1.08;

            margin-bottom: 20px;
        }

        .left-content h1 span {
            color: #68d9f5;
        }

        .left-content > p {
            max-width: 430px;

            color: #d7e8ef;

            font-size: 14px;
            line-height: 1.8;
        }

        .quote {
            margin-top: 34px;

            max-width: 390px;

            padding-left: 17px;

            border-left: 2px solid #56d5f2;
        }

        .quote p {
            font-family: 'Playfair Display', serif;

            font-size: 16px;
            line-height: 1.6;

            color: #fff;

            font-style: italic;
        }


        /* =========================
           CARD
        ========================== */

        .card {
            position: relative;

            padding: 34px 38px 30px;

            border-radius: 22px;

            background: rgba(255, 255, 255, 0.94);

            color: #173f54;

            box-shadow:
                0 25px 65px rgba(0, 25, 40, 0.35);

            backdrop-filter: blur(18px);

            overflow: hidden;
        }

        .card::before {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            border: 1px solid rgba(8, 173, 213, 0.13);

            border-radius: 50%;

            top: -75px;
            right: -60px;
        }

        .card::after {
            content: "";

            position: absolute;

            width: 90px;
            height: 90px;

            border: 1px solid rgba(8, 173, 213, 0.10);

            border-radius: 50%;

            bottom: -45px;
            left: -40px;
        }


        /* =========================
           STEPS
        ========================== */

        .steps {
            display: flex;
            align-items: center;

            margin-bottom: 30px;

            position: relative;
            z-index: 2;
        }

        .step {
            display: flex;
            align-items: center;

            flex: 1;

            position: relative;
        }

        .step:last-child {
            flex: 0;
        }

        .step-circle {
            width: 30px;
            height: 30px;

            flex-shrink: 0;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 11px;
            font-weight: 700;

            background: #edf2f4;
            color: #9aabb4;
        }

        .step.done .step-circle {
            background: #08add5;
            color: #fff;
        }

        .step.active .step-circle {
            background: #073f5e;
            color: #fff;

            box-shadow:
                0 0 0 5px rgba(7, 63, 94, 0.08);
        }

        .step-label {
            margin-left: 8px;

            font-size: 9px;

            color: #98a7ae;

            white-space: nowrap;
        }

        .step.done .step-label,
        .step.active .step-label {
            color: #31586b;
            font-weight: 700;
        }

        .step-line {
            height: 1px;

            flex: 1;

            margin: 0 10px;

            background: #dce6ea;
        }

        .step-line.done {
            background: #08add5;
        }


        /* =========================
           SUCCESS CONTENT
        ========================== */

        .success-content {
            position: relative;
            z-index: 2;

            text-align: center;
        }

        .success-icon {
            width: 78px;
            height: 78px;

            margin: 4px auto 20px;

            border-radius: 50%;

            background: rgba(8, 173, 213, 0.10);

            border: 1px solid rgba(8, 173, 213, 0.22);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-icon-inner {
            width: 54px;
            height: 54px;

            border-radius: 50%;

            background: #08add5;

            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 23px;

            box-shadow:
                0 8px 20px rgba(8, 173, 213, 0.25);
        }

        .success-label {
            color: #08add5;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 2px;

            margin-bottom: 8px;
        }

        .success-content h2 {
            font-family: 'Playfair Display', serif;

            font-size: 30px;

            color: #073f5e;

            margin-bottom: 10px;
        }

        .success-description {
            max-width: 390px;

            margin: 0 auto;

            color: #778b95;

            font-size: 12px;

            line-height: 1.7;
        }


        /* =========================
           AUTHOR INFO
        ========================== */

        .author-box {
            margin: 22px 0;

            padding: 13px 15px;

            border-radius: 10px;

            background: #f4fafc;

            border: 1px solid #e3edf1;

            display: flex;
            align-items: center;

            text-align: left;

            gap: 11px;
        }

        .author-icon {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #dff6fb;

            color: #08add5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
        }

        .author-text small {
            display: block;

            color: #99a8b0;

            font-size: 8px;
            font-weight: 700;

            letter-spacing: 1px;

            margin-bottom: 3px;
        }

        .author-text strong {
            color: #31576a;

            font-size: 12px;
        }


        /* =========================
           BUTTON
        ========================== */

        .btn-login {
            width: 100%;
            height: 46px;

            border: none;
            border-radius: 9px;

            background: #073f5e;

            color: #fff;

            font-family: inherit;

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.25s;

            box-shadow:
                0 8px 18px rgba(7, 63, 94, 0.18);
        }

        .btn-login:hover {
            background: #08add5;

            transform: translateY(-2px);
        }

        .btn-login i {
            margin-left: 7px;
        }


        /* =========================
           HOME LINK
        ========================== */

        .home-link {
            display: inline-flex;

            align-items: center;
            gap: 6px;

            margin-top: 15px;

            color: #81939d;

            text-decoration: none;

            font-size: 10px;

            font-weight: 600;

            transition: 0.2s;
        }

        .home-link:hover {
            color: #08add5;
        }


        /* =========================
           SECURITY
        ========================== */

        .security {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            margin-top: 20px;
            padding-top: 15px;

            border-top: 1px solid #e5edf0;

            color: #98a6ad;

            font-size: 9px;
        }

        .security i {
            color: #08add5;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 950px) {

            .nav-menu {
                display: none;
            }

            .search {
                margin-left: auto;
            }

            .content-wrapper {
                grid-template-columns: 1fr;

                max-width: 600px;

                gap: 40px;
            }

            .left-content {
                text-align: center;

                padding-left: 0;
            }

            .left-content > p {
                margin-left: auto;
                margin-right: auto;
            }

            .quote {
                margin-left: auto;
                margin-right: auto;

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

            .card {
                padding: 28px 22px 25px;
            }

            .step-label {
                font-size: 8px;
            }

            .success-content h2 {
                font-size: 27px;
            }
        }

    </style>
</head>

<body>

    <!-- =========================
         TOP BAR
    ========================== -->

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

            <span>PPID</span>
            <span>Layanan Publik</span>
            <span>Kontak</span>

            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-youtube"></i>
            <i class="fa-brands fa-tiktok"></i>

        </div>

    </div>


    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar">

        <div class="brand">

            <img
                src="{{ asset('images/logo-derap-serayu.png') }}"
                alt="Derap Serayu"
            >

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

            <input
                type="text"
                placeholder="Cari..."
            >

        </div>


        <button class="menu-btn">

            <i class="fa-solid fa-bars"></i>

        </button>

    </nav>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">

        <div class="content-wrapper">


            <!-- =========================
                 LEFT
            ========================== -->

            <section class="left-content">

                <div class="eyebrow">

                    <span class="eyebrow-line"></span>

                    PENDAFTARAN PENULIS BERHASIL

                </div>


                <h1>

                    Selamat datang<br>

                    di <span>ruang cerita.</span>

                </h1>


                <p>

                    Akun penulis kamu telah berhasil dibuat dan
                    diverifikasi. Sekarang saatnya berbagi cerita,
                    informasi, dan sudut pandang tentang Banjarnegara
                    bersama pembaca Derap Serayu.

                </p>


                <div class="quote">

                    <p>

                        “Setiap penulis punya cerita,
                        setiap cerita punya pembaca.”

                    </p>

                </div>

            </section>



            <!-- =========================
                 CARD
            ========================== -->

            <section class="card">


                <!-- SUCCESS -->

                <div class="success-content">


                    <div class="success-icon">

                        <div class="success-icon-inner">

                            <i class="fa-solid fa-check"></i>

                        </div>

                    </div>


                    <div class="success-label">

                        AKUN PENULIS BERHASIL DIVERIFIKASI

                    </div>


                    <h2>

                        Selamat, kamu siap menulis!

                    </h2>


                    <p class="success-description">

                        Verifikasi berhasil. Akun penulis kamu
                        telah aktif dan siap digunakan untuk
                        berbagi cerita di Derap Serayu.

                    </p>



                    <!-- AUTHOR INFO -->

                    <div class="author-box">

                        <div class="author-icon">

                            <i class="fa-solid fa-pen-nib"></i>

                        </div>


                        <div class="author-text">

                            <small>
                                AKUN PENULIS
                            </small>

                            <strong>
                                Annisa Dwi Lestari
                            </strong>

                        </div>

                    </div>



                    <!-- BUTTON -->

                    <a
                        href="{{ route('login') }}"
                        style="text-decoration: none;"
                    >

                        <button
                            type="button"
                            class="btn-login"
                        >

                            Masuk ke Derap Serayu

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                    </a>



                    <!-- HOME -->

                    <a
                        href="#"
                        class="home-link"
                    >

                        <i class="fa-solid fa-house"></i>

                        Kembali ke Beranda

                    </a>

                </div>



                <!-- SECURITY -->

                <div class="security">

                    <i class="fa-solid fa-shield-halved"></i>

                    Akun penulis kamu telah berhasil diamankan dan diverifikasi

                </div>


            </section>

        </div>

    </main>

</body>
</html>