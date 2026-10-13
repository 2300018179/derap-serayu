<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Masuk | Derap Serayu</title>


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap"
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

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: #073f5e;
            background: #063f60;
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font-family: 'DM Sans', sans-serif;
        }


        /* =====================================================
           TOP BAR
        ===================================================== */

        .topbar {

            height: 36px;

            padding: 0 4.5%;

            background: #063f60;

            display: flex;

            align-items: center;

            justify-content: space-between;

            color: white;

            font-size: 11px;
        }

        .top-left,
        .top-right {

            display: flex;

            align-items: center;

            gap: 16px;
        }

        .top-left span,
        .top-right a {

            display: flex;

            align-items: center;

            gap: 6px;

            color: rgba(255,255,255,.94);
        }

        .top-right a {
            transition: .2s;
        }

        .top-right a:hover {
            color: #70e3f7;
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

            height: 88px;

            padding: 0 4.5%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: space-between;

            position: relative;

            z-index: 20;
        }

        .logo {

            display: flex;

            align-items: center;

            width: 245px;
        }

        .logo img {

            width: 190px;

            height: auto;

            display: block;
        }


        /* =====================================================
           NAV MENU
        ===================================================== */

        .nav-menu {

            display: flex;

            align-items: center;

            gap: 27px;

            margin-left: auto;

            margin-right: 38px;
        }

        .nav-menu a {

            color: #083f5e;

            font-size: 12px;

            font-weight: 600;

            white-space: nowrap;

            transition: .2s;
        }

        .nav-menu a:hover {
            color: #08add5;
        }


        /* =====================================================
           NAV RIGHT
        ===================================================== */

        .nav-right {

            display: flex;

            align-items: center;

            gap: 12px;
        }

        .search-box {

            width: 275px;

            height: 42px;

            border: 1px solid #dce9ee;

            border-radius: 25px;

            display: flex;

            align-items: center;

            padding: 0 16px;

            background: #fbfdfe;
        }

        .search-box i {

            color: #0a5274;

            font-size: 13px;

            margin-right: 10px;
        }

        .search-box input {

            width: 100%;

            border: none;

            outline: none;

            background: transparent;

            color: #426678;

            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #98aeb8;
        }

        .menu-btn {

            height: 42px;

            padding: 0 19px;

            border: none;

            border-radius: 24px;

            background: #073f5e;

            color: white;

            font-size: 12px;

            font-weight: 700;

            display: flex;

            align-items: center;

            gap: 9px;

            cursor: pointer;

            transition: .25s;
        }

        .menu-btn:hover {
            background: #08add5;
        }


        /* =====================================================
           LOGIN PAGE
        ===================================================== */

        .login-page {

            min-height: calc(100vh - 124px);

            position: relative;

            overflow: hidden;

            display: flex;

            align-items: center;

            background-image:

                linear-gradient(
                    90deg,
                    rgba(3, 48, 68, .18),
                    rgba(3, 48, 68, .04)
                ),

                url('{{ asset('images/bg-kawahsikidang-login.jpg') }}');

            background-size: cover;

            background-position: center center;

            background-repeat: no-repeat;

            padding: 45px 7%;
        }


        /* =====================================================
           DECORATION
        ===================================================== */

        .circle-one {

            position: absolute;

            width: 430px;

            height: 430px;

            border-radius: 50%;

            border: 1px solid rgba(125,229,246,.28);

            left: -270px;

            bottom: -220px;
        }

        .circle-one::after {

            content: "";

            position: absolute;

            inset: 35px;

            border-radius: 50%;

            border: 1px solid rgba(125,229,246,.14);
        }

        .circle-two {

            position: absolute;

            width: 170px;

            height: 170px;

            border-radius: 50%;

            background: rgba(8,173,213,.12);

            right: -70px;

            top: 60px;

            filter: blur(2px);
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .login-container {

            width: 100%;

            max-width: 1120px;

            min-height: 560px;

            margin: auto;

            position: relative;

            z-index: 5;

            display: grid;

            grid-template-columns: 1fr .82fr;

            align-items: center;

            gap: 85px;
        }


        /* =====================================================
           LEFT CONTENT
        ===================================================== */

        .login-intro {

            color: white;

            padding-left: 25px;

            max-width: 550px;
        }

        .intro-badge {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 8px 15px;

            background: rgba(8,173,213,.35);

            border: 1px solid rgba(113,228,247,.28);

            border-radius: 25px;

            backdrop-filter: blur(10px);

            color: #79e6f8;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: .5px;

            margin-bottom: 22px;
        }

        .login-intro h1 {

            font-family: 'Playfair Display', serif;

            font-size: clamp(48px, 5vw, 68px);

            line-height: 1.02;

            letter-spacing: -2px;

            color: white;

            text-shadow: 0 5px 25px rgba(0,0,0,.18);
        }

        .login-intro h1 span {

            display: block;

            color: #69e1f5;

            font-style: italic;
        }

        .intro-text {

            max-width: 455px;

            margin-top: 21px;

            color: rgba(255,255,255,.91);

            font-size: 13px;

            line-height: 1.8;

            text-shadow: 0 2px 10px rgba(0,0,0,.2);
        }


        /* =====================================================
           MINI CONTENT
        ===================================================== */

        .login-features {

            display: flex;

            align-items: center;

            gap: 14px;

            margin-top: 30px;
        }

        .feature-item {

            display: flex;

            align-items: center;

            gap: 9px;

            color: white;

            font-size: 11px;
        }

        .feature-icon {

            width: 34px;

            height: 34px;

            border-radius: 10px;

            background: rgba(255,255,255,.14);

            border: 1px solid rgba(255,255,255,.15);

            backdrop-filter: blur(8px);

            display: flex;

            align-items: center;

            justify-content: center;

            color: #72e3f5;
        }


        /* =====================================================
           QUOTE
        ===================================================== */

        .login-quote {

            margin-top: 35px;

            font-family: 'Playfair Display', serif;

            font-size: 18px;

            font-style: italic;

            line-height: 1.45;

            color: white;

            text-shadow: 0 3px 15px rgba(0,0,0,.25);
        }

        .quote-line {

            width: 65px;

            height: 3px;

            background: #08c1e8;

            border-radius: 10px;

            margin-top: 12px;
        }


        /* =====================================================
           LOGIN CARD
        ===================================================== */

        .login-card {

            position: relative;

            background: rgba(249,253,255,.93);

            border: 1px solid rgba(255,255,255,.80);

            backdrop-filter: blur(20px);

            -webkit-backdrop-filter: blur(20px);

            border-radius: 28px;

            padding: 38px 40px 31px;

            box-shadow:

                0 28px 75px rgba(0,38,57,.28),

                inset 0 1px 0 rgba(255,255,255,.90);

            overflow: hidden;
        }


        /* =====================================================
           CARD DECORATION
        ===================================================== */

        .card-icon {

            position: absolute;

            top: 26px;

            right: 28px;

            width: 52px;

            height: 52px;

            border-radius: 16px;

            background: rgba(8,173,213,.10);

            color: #08add5;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

            transform: rotate(-5deg);
        }

        .card-decoration {

            position: absolute;

            width: 190px;

            height: 190px;

            border-radius: 50%;

            background: rgba(8,173,213,.055);

            right: -100px;

            bottom: -100px;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .login-header {

            margin-bottom: 25px;

            position: relative;

            z-index: 2;
        }

        .login-header .small-label {

            color: #08add5;

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 1px;

            text-transform: uppercase;

            margin-bottom: 8px;
        }

        .login-header h2 {

            font-family: 'Playfair Display', serif;

            color: #073f5e;

            font-size: 38px;

            line-height: 1.05;

            letter-spacing: -1px;
        }

        .login-header h2 span {

            color: #08add5;

            font-style: italic;
        }

        .login-header p {

            color: #7e98a4;

            font-size: 11px;

            line-height: 1.65;

            margin-top: 8px;

            max-width: 350px;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .login-form {

            display: flex;

            flex-direction: column;

            gap: 16px;

            position: relative;

            z-index: 2;
        }

        .form-group {

            display: flex;

            flex-direction: column;

            gap: 6px;
        }

        .form-group label {

            color: #0a4d6b;

            font-size: 10px;

            font-weight: 700;
        }

        .input-wrapper {

            position: relative;
        }

        .input-icon {

            position: absolute;

            left: 15px;

            top: 50%;

            transform: translateY(-50%);

            color: #79a1b1;

            font-size: 12px;

            pointer-events: none;

            transition: .2s;
        }

        .form-input {

            width: 100%;

            height: 48px;

            padding: 0 43px;

            border: 1px solid #cfe2e9;

            border-radius: 12px;

            background: rgba(255,255,255,.68);

            color: #31596d;

            outline: none;

            font-size: 11px;

            transition: .2s;
        }

        .form-input::placeholder {
            color: #9aafb8;
        }

        .form-input:focus {

            background: rgba(255,255,255,.96);

            border-color: #08add5;

            box-shadow:
                0 0 0 3px rgba(8,173,213,.09);
        }

        .input-wrapper:focus-within .input-icon {
            color: #08add5;
        }


        /* =====================================================
           PASSWORD TOGGLE
        ===================================================== */

        .password-toggle {

            position: absolute;

            right: 14px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #608395;

            cursor: pointer;

            font-size: 11px;
        }

        .password-toggle:hover {
            color: #08add5;
        }


        /* =====================================================
           OPTIONS
        ===================================================== */

        .form-options {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-top: -2px;
        }

        .remember {

            display: flex;

            align-items: center;

            gap: 7px;

            color: #8098a3;

            font-size: 9px;
        }

        .remember input {

            width: 15px;

            height: 15px;

            accent-color: #08add5;

            cursor: pointer;
        }

        .forgot {

            color: #078fba;

            font-size: 9px;

            font-weight: 700;
        }

        .forgot:hover {
            color: #066d8d;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .login-btn {

            width: 100%;

            height: 48px;

            border: none;

            border-radius: 25px;

            background: linear-gradient(
                100deg,
                #08a8d0,
                #08b8df
            );

            color: white;

            font-size: 11px;

            font-weight: 700;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            box-shadow:
                0 10px 25px rgba(8,173,213,.25);

            transition: .25s;
        }

        .login-btn:hover {

            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(8,173,213,.32);
        }

        .login-btn i {
            transition: .25s;
        }

        .login-btn:hover i {
            transform: translateX(5px);
        }


        /* =====================================================
           DIVIDER
        ===================================================== */

        .divider-login {

            display: flex;

            align-items: center;

            gap: 12px;

            margin: 4px 0 1px;

            color: #a2b5bd;

            font-size: 8px;
        }

        .divider-login::before,
        .divider-login::after {

            content: "";

            flex: 1;

            height: 1px;

            background: #e1ecef;
        }


        /* =====================================================
           REGISTER LINK
        ===================================================== */

        .register-area {

            text-align: center;

            color: #8199a4;

            font-size: 9px;

            position: relative;

            z-index: 2;
        }

        .register-area a {

            color: #078fba;

            font-weight: 700;

            margin-left: 4px;
        }

        .register-area a:hover {
            color: #065f7c;
        }


        /* =====================================================
           SECURITY NOTE
        ===================================================== */

        .security-note {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            margin-top: 18px;

            color: #9aadb5;

            font-size: 8px;

            position: relative;

            z-index: 2;
        }

        .security-note i {
            color: #08add5;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1250px) {

            .nav-menu {

                gap: 18px;

                margin-right: 20px;
            }

            .search-box {
                width: 220px;
            }

            .login-container {
                gap: 45px;
            }
        }


        @media (max-width: 1050px) {

            .nav-menu {
                display: none;
            }

            .logo {
                width: auto;
            }

            .login-container {

                max-width: 700px;

                grid-template-columns: 1fr;

                gap: 35px;
            }

            .login-intro {

                text-align: center;

                padding-left: 0;

                max-width: 650px;

                margin: auto;
            }

            .intro-text {
                margin-left: auto;
                margin-right: auto;
            }

            .login-features {

                justify-content: center;
            }

            .login-quote {
                display: none;
            }

            .login-card {
                max-width: 520px;
                width: 100%;
                margin: auto;
            }
        }


        @media (max-width: 700px) {

            .topbar {
                display: none;
            }

            .navbar {

                height: 72px;

                padding: 0 20px;
            }

            .logo img {
                width: 155px;
            }

            .search-box {
                display: none;
            }

            .menu-btn {
                height: 38px;
            }

            .login-page {

                min-height: calc(100vh - 72px);

                padding: 35px 16px;
            }

            .login-intro h1 {
                font-size: 45px;
            }

            .login-intro {
                padding: 0 5px;
            }

            .login-features {

                flex-direction: column;

                align-items: flex-start;

                width: fit-content;

                margin-left: auto;

                margin-right: auto;
            }

            .login-card {

                padding: 30px 22px 25px;

                border-radius: 23px;
            }

            .login-header h2 {
                font-size: 32px;
            }
        }


        @media (max-width: 450px) {

            .menu-btn {
                display: none;
            }

            .login-intro h1 {
                font-size: 37px;
            }

            .login-header h2 {
                font-size: 29px;
            }

            .card-icon {
                width: 45px;
                height: 45px;
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
         LOGIN
    ====================================================== -->

    <main class="login-page">


        <div class="circle-one"></div>

        <div class="circle-two"></div>



        <div class="login-container">


            <!-- =================================================
                 LEFT CONTENT
            ================================================== -->

            <section class="login-intro">


                <div class="intro-badge">

                    <i class="fa-solid fa-arrow-right-to-bracket"></i>

                    SELAMAT DATANG KEMBALI

                </div>



                <h1>

                    Kembali ke

                    <span>
                        Derap Serayu.
                    </span>

                </h1>



                <p class="intro-text">

                    Masuk untuk melanjutkan perjalananmu bersama
                    Derap Serayu. Baca cerita terbaru, simpan artikel
                    favorit, atau bagikan tulisanmu kepada masyarakat
                    Banjarnegara.

                </p>



                <div class="login-features">


                    <div class="feature-item">

                        <div class="feature-icon">

                            <i class="fa-solid fa-book-open"></i>

                        </div>

                        <span>
                            Baca
                        </span>

                    </div>



                    <div class="feature-item">

                        <div class="feature-icon">

                            <i class="fa-regular fa-bookmark"></i>

                        </div>

                        <span>
                            Simpan
                        </span>

                    </div>



                    <div class="feature-item">

                        <div class="feature-icon">

                            <i class="fa-solid fa-pen-nib"></i>

                        </div>

                        <span>
                            Menulis
                        </span>

                    </div>


                </div>



                <div class="login-quote">

                    "Cerita yang baik selalu menemukan
                    pembacanya."

                    <div class="quote-line"></div>

                </div>


            </section>



            <!-- =================================================
                 LOGIN CARD
            ================================================== -->

            <section class="login-card">


                <div class="card-icon">

                    <i class="fa-solid fa-feather-pointed"></i>

                </div>


                <div class="card-decoration"></div>



                <!-- HEADER -->

                <div class="login-header">

                    <div class="small-label">

                        AKSES AKUN

                    </div>


                    <h2>

                        Selamat

                        <span>
                            Datang
                        </span>

                    </h2>


                    <p>

                        Masukkan akunmu untuk melanjutkan
                        ke Derap Serayu.

                    </p>

                </div>



                <!-- FORM -->

                <form
                    action="{{ route('login.store') }}"
                    method="POST"
                    class="login-form"
                >

                    @csrf

                    @if($errors->any())
                        <div role="alert" style="margin-bottom:16px;color:#a33e50">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    @if(session('status'))
                        <div role="status" style="margin-bottom:16px;color:#176b56">{{ session('status') }}</div>
                    @endif



                    <!-- EMAIL / USERNAME -->

                    <div class="form-group">

                        <label for="login">

                            Email atau Username

                        </label>


                        <div class="input-wrapper">

                            <i class="fa-regular fa-user input-icon"></i>


                            <input
                                type="text"
                                id="login"
                                name="login"
                                class="form-input"
                                placeholder="Masukkan email atau username"
                                value="{{ old('login') }}"
                                required
                                autofocus
                            >

                        </div>

                    </div>



                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label for="password">

                            Password

                        </label>


                        <div class="input-wrapper">

                            <i class="fa-solid fa-lock input-icon"></i>


                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input"
                                placeholder="Masukkan password"
                                required
                            >


                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword()"
                            >

                                <i
                                    id="passwordIcon"
                                    class="fa-regular fa-eye"
                                ></i>

                            </button>

                        </div>

                    </div>



                    <!-- OPTIONS -->

                    <div class="form-options">


                        <label class="remember">

                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                            >

                            Ingat saya

                        </label>


                        <a
                            href="{{ route('password.request') }}"
                            class="forgot"
                        >

                            Lupa password?

                        </a>


                    </div>



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="login-btn"
                    >

                        Masuk ke Derap Serayu

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>


                    <!-- DIVIDER -->

                    <div class="divider-login">

                        atau

                    </div>



                    <!-- REGISTER -->

                    <div class="register-area">

                        Belum punya akun?

                        <a href="{{ route('register') }}">

                            Daftar sekarang

                        </a>

                    </div>


                </form>



                <!-- SECURITY -->

                <div class="security-note">

                    <i class="fa-solid fa-shield-halved"></i>

                    Data akunmu terlindungi bersama Derap Serayu

                </div>


            </section>


        </div>

    </main>



    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const icon =
                document.getElementById('passwordIcon');


            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('fa-eye');

                icon.classList.add('fa-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('fa-eye-slash');

                icon.classList.add('fa-eye');

            }

        }

    </script>


</body>

</html>