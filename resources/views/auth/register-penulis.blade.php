<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Penulis | Derap Serayu</title>


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
        input,
        textarea {
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
           MAIN
        ===================================================== */

        .register-page {

            min-height: calc(100vh - 124px);

            position: relative;

            overflow: hidden;

            background-image:

                linear-gradient(
                    90deg,
                    rgba(3, 48, 68, .20),
                    rgba(3, 48, 68, .06)
                ),

                url('{{ asset('images/bg-dieng-register.jpg') }}');

            background-size: cover;

            background-position: center center;

            background-repeat: no-repeat;

            padding: 45px 7% 50px;
        }


        /* =====================================================
           DECORATION
        ===================================================== */

        .circle-decoration {

            position: absolute;

            width: 330px;

            height: 330px;

            border-radius: 50%;

            border: 1px solid rgba(112,226,245,.35);

            left: -210px;

            top: -100px;

            z-index: 1;
        }

        .circle-decoration::after {

            content: "";

            position: absolute;

            inset: 32px;

            border-radius: 50%;

            border: 1px solid rgba(112,226,245,.15);
        }


        /* =====================================================
           MAIN CONTAINER
        ===================================================== */

        .register-container {

            max-width: 1260px;

            min-height: 625px;

            margin: auto;

            position: relative;

            z-index: 5;

            display: grid;

            grid-template-columns: .82fr 1.18fr;

            align-items: center;

            gap: 65px;
        }


        /* =====================================================
           LEFT CONTENT
        ===================================================== */

        .intro {

            color: white;

            padding: 10px 0 20px;
        }

        .intro-badge {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 8px 15px;

            background: rgba(8,173,213,.34);

            border: 1px solid rgba(113,228,247,.25);

            border-radius: 25px;

            backdrop-filter: blur(9px);

            color: #75e4f6;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: .5px;

            margin-bottom: 20px;
        }

        .intro h1 {

            font-family: 'Playfair Display', serif;

            font-size: clamp(44px, 4vw, 62px);

            line-height: 1.05;

            letter-spacing: -1.5px;

            color: white;

            text-shadow: 0 5px 25px rgba(0,0,0,.18);
        }

        .intro h1 span {

            display: block;

            color: #67e0f5;

            font-style: italic;
        }

        .intro-description {

            max-width: 440px;

            margin-top: 19px;

            color: rgba(255,255,255,.91);

            font-size: 13px;

            line-height: 1.75;

            text-shadow: 0 2px 10px rgba(0,0,0,.2);
        }


        /* =====================================================
           AUTHOR BENEFITS
        ===================================================== */

        .benefits {

            margin-top: 26px;

            display: flex;

            flex-direction: column;

            gap: 12px;
        }

        .benefit {

            display: flex;

            align-items: center;

            gap: 12px;

            color: white;

            font-size: 12px;

            font-weight: 500;
        }

        .benefit-icon {

            width: 38px;

            height: 38px;

            flex-shrink: 0;

            border-radius: 11px;

            background: rgba(8,173,213,.52);

            border: 1px solid rgba(255,255,255,.16);

            backdrop-filter: blur(10px);

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            box-shadow: 0 8px 20px rgba(0,0,0,.12);
        }


        /* =====================================================
           AUTHOR QUOTE
        ===================================================== */

        .quote {

            margin-top: 29px;

            font-family: 'Playfair Display', serif;

            font-style: italic;

            font-size: 19px;

            line-height: 1.4;

            color: white;

            text-shadow: 0 3px 15px rgba(0,0,0,.25);
        }

        .quote-line {

            width: 75px;

            height: 3px;

            background: #08c1e8;

            margin-top: 11px;

            border-radius: 10px;
        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .form-card {

            position: relative;

            background: rgba(248,253,255,.92);

            border: 1px solid rgba(255,255,255,.75);

            backdrop-filter: blur(18px);

            -webkit-backdrop-filter: blur(18px);

            border-radius: 27px;

            padding: 29px 38px 27px;

            box-shadow:

                0 25px 70px rgba(0,38,57,.25),

                inset 0 1px 0 rgba(255,255,255,.85);

            overflow: hidden;
        }


        /* =====================================================
           CARD DECORATION
        ===================================================== */

        .pen-decoration {

            position: absolute;

            right: 28px;

            top: 25px;

            width: 52px;

            height: 52px;

            border-radius: 16px;

            background: rgba(8,173,213,.10);

            color: #08add5;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;

            transform: rotate(-8deg);
        }

        .card-line {

            position: absolute;

            width: 160px;

            height: 2px;

            right: -20px;

            bottom: 45px;

            background: rgba(8,173,213,.08);

            transform: rotate(-35deg);
        }


        /* =====================================================
           STEPS
        ===================================================== */

        .steps {

            display: flex;

            align-items: center;

            width: 100%;

            margin-bottom: 22px;
        }

        .step {

            display: flex;

            align-items: center;

            gap: 8px;

            white-space: nowrap;
        }

        .step-number {

            width: 28px;

            height: 28px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 1px solid #d8e9ee;

            color: #a6c0ca;

            font-size: 10px;

            font-weight: 700;

            background: rgba(255,255,255,.65);
        }

        .step.active .step-number {

            background: #08add5;

            border-color: #08add5;

            color: white;

            box-shadow: 0 5px 15px rgba(8,173,213,.25);
        }

        .step span {

            color: #a0b7c1;

            font-size: 9px;

            font-weight: 500;
        }

        .step.active span {

            color: #073f5e;

            font-weight: 700;
        }

        .step-line {

            flex: 1;

            height: 1px;

            background: #dcebef;

            margin: 0 13px;
        }


        /* =====================================================
           FORM HEADER
        ===================================================== */

        .form-header {

            margin-bottom: 19px;
        }

        .form-header h2 {

            font-family: 'Playfair Display', serif;

            font-size: 34px;

            line-height: 1.08;

            color: #073f5e;

            letter-spacing: -1px;
        }

        .form-header h2 span {

            color: #08add5;

            font-style: italic;
        }

        .form-header p {

            margin-top: 7px;

            max-width: 520px;

            color: #7d98a4;

            font-size: 11px;

            line-height: 1.65;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .register-form {

            display: flex;

            flex-direction: column;

            gap: 12px;
        }

        .form-row {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 13px;
        }

        .form-group {

            display: flex;

            flex-direction: column;

            gap: 5px;
        }

        .form-group label {

            color: #0a4d6b;

            font-size: 9px;

            font-weight: 700;
        }

        .input-wrapper {

            position: relative;
        }

        .input-icon {

            position: absolute;

            left: 13px;

            top: 50%;

            transform: translateY(-50%);

            color: #73a0b2;

            font-size: 12px;

            pointer-events: none;

            transition: .2s;
        }

        .form-input {

            width: 100%;

            height: 45px;

            padding: 0 39px;

            border: 1px solid #cfe2e9;

            border-radius: 11px;

            background: rgba(255,255,255,.65);

            color: #31596d;

            outline: none;

            font-size: 10px;

            transition: .2s;
        }

        .form-input::placeholder {
            color: #9aafb8;
        }

        .form-input:focus {

            background: rgba(255,255,255,.92);

            border-color: #08add5;

            box-shadow:

                0 0 0 3px rgba(8,173,213,.09);
        }

        .input-wrapper:focus-within .input-icon {
            color: #08add5;
        }


        /* =====================================================
           TEXTAREA
        ===================================================== */

        .bio-input {

            width: 100%;

            min-height: 62px;

            resize: vertical;

            padding: 12px 13px 12px 39px;

            border: 1px solid #cfe2e9;

            border-radius: 11px;

            background: rgba(255,255,255,.65);

            color: #31596d;

            outline: none;

            font-size: 10px;

            line-height: 1.5;

            transition: .2s;
        }

        .bio-input::placeholder {
            color: #9aafb8;
        }

        .bio-input:focus {

            background: rgba(255,255,255,.92);

            border-color: #08add5;

            box-shadow:

                0 0 0 3px rgba(8,173,213,.09);
        }

        .bio-wrapper .input-icon {

            top: 15px;

            transform: none;
        }


        /* =====================================================
           PASSWORD
        ===================================================== */

        .password-toggle {

            position: absolute;

            right: 12px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #4b7990;

            cursor: pointer;

            font-size: 11px;
        }

        .password-toggle:hover {
            color: #08add5;
        }


        /* =====================================================
           TERMS
        ===================================================== */

        .terms {

            display: flex;

            align-items: flex-start;

            gap: 8px;

            margin-top: 1px;
        }

        .terms input {

            width: 15px;

            height: 15px;

            margin-top: 1px;

            accent-color: #08add5;

            cursor: pointer;

            flex-shrink: 0;
        }

        .terms label {

            color: #75919d;

            font-size: 9px;

            line-height: 1.5;
        }

        .terms a {

            color: #078fba;

            font-weight: 700;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .submit-btn {

            width: 100%;

            height: 45px;

            border: none;

            border-radius: 24px;

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

                0 9px 22px rgba(8,173,213,.25);

            transition: .25s;
        }

        .submit-btn:hover {

            transform: translateY(-2px);

            box-shadow:

                0 14px 28px rgba(8,173,213,.32);
        }

        .submit-btn i {
            transition: .25s;
        }

        .submit-btn:hover i {
            transform: translateX(5px);
        }


        /* =====================================================
           LOGIN
        ===================================================== */

        .login-area {

            border-top: 1px solid #e2edf1;

            margin-top: 16px;

            padding-top: 14px;

            font-size: 9px;

            color: #839ba5;
        }

        .login-area a {

            color: #0799c5;

            font-weight: 700;

            margin-left: 4px;
        }

        .login-area a i {

            margin-left: 4px;

            transition: .2s;
        }

        .login-area a:hover i {
            transform: translateX(4px);
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

            .register-container {
                gap: 40px;
            }
        }


        @media (max-width: 1050px) {

            .nav-menu {
                display: none;
            }

            .logo {
                width: auto;
            }

            .register-container {

                grid-template-columns: 1fr;

                max-width: 700px;
            }

            .intro {

                text-align: center;
            }

            .intro-description {

                margin-left: auto;

                margin-right: auto;
            }

            .benefits {

                align-items: center;
            }

            .quote {
                display: none;
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

            .register-page {

                padding: 30px 16px;
            }

            .intro h1 {
                font-size: 45px;
            }

            .form-card {

                padding: 25px 22px;

                border-radius: 22px;
            }

            .form-header h2 {
                font-size: 30px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }


        @media (max-width: 450px) {

            .menu-btn {
                display: none;
            }

            .intro h1 {
                font-size: 37px;
            }

            .steps {
                gap: 3px;
            }

            .step-line {
                margin: 0 6px;
            }

            .step span {
                font-size: 8px;
            }

            .step-number {

                width: 25px;

                height: 25px;
            }
        }

    </style>

</head>


<body>
    <!-- =====================================================
         REGISTER
    ====================================================== -->

    <main class="register-page">


        <div class="circle-decoration"></div>



        <div class="register-container">


            <!-- =================================================
                 LEFT
            ================================================== -->

            <section class="intro">


                <div class="intro-badge">

                    <i class="fa-solid fa-pen-nib"></i>

                    DAFTAR SEBAGAI PENULIS

                </div>



                <h1>

                    Bagikan Ceritamu

                    <span>
                        dari Banjarnegara.
                    </span>

                </h1>



                <p class="intro-description">

                    Punya cerita, opini, pengalaman, atau sudut pandang
                    tentang Banjarnegara? Jadikan tulisanmu bagian dari
                    Derap Serayu dan bagikan kepada lebih banyak orang.

                </p>



                <div class="benefits">


                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="fa-solid fa-pen-nib"></i>

                        </div>

                        <span>
                            Tulis dan terbitkan artikel
                        </span>

                    </div>



                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="fa-solid fa-user-pen"></i>

                        </div>

                        <span>
                            Bangun identitas sebagai penulis
                        </span>

                    </div>



                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="fa-solid fa-bullhorn"></i>

                        </div>

                        <span>
                            Bagikan cerita ke pembaca
                        </span>

                    </div>


                </div>



                <div class="quote">

                    Setiap daerah punya cerita.

                    <br>

                    Sekarang giliran kamu yang menuliskannya.

                    <div class="quote-line"></div>

                </div>


            </section>



            <!-- =================================================
                 RIGHT FORM
            ================================================== -->

            <section class="form-card">


                <div class="pen-decoration">

                    <i class="fa-solid fa-pen-nib"></i>

                </div>


                <div class="card-line"></div>

                <a href="/" class="logo">

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Derap Serayu"
                    >

                </a>


                <!-- STEPS -->

                <div class="steps">


                    <div class="step active">

                        <div class="step-number">
                            1
                        </div>

                        <span>
                            Data Diri
                        </span>

                    </div>


                    <div class="step-line"></div>


                    <div class="step">

                        <div class="step-number">
                            2
                        </div>

                        <span>
                            Verifikasi
                        </span>

                    </div>


                    <div class="step-line"></div>


                    <div class="step">

                        <div class="step-number">
                            3
                        </div>

                        <span>
                            Selesai
                        </span>

                    </div>


                </div>



                <!-- HEADER -->

                <div class="form-header">

                    <h2>

                        Daftar Akun

                        <span>
                            Penulis
                        </span>

                    </h2>


                    <p>

                        Lengkapi data berikut untuk membuat profil
                        penulis dan mulai membagikan tulisanmu di
                        Derap Serayu.

                    </p>

                </div>



                <!-- FORM -->

                <form
                    action="{{ route('register.penulis.store') }}"
                    method="POST"
                    class="register-form"
                >

                    @csrf

                    @if($errors->any())
                        <div role="alert" style="margin-bottom:16px;color:#a33e50">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif



                    <!-- NAMA + NAMA PENA -->

                    <div class="form-row">


                        <div class="form-group">

                            <label for="nama">

                                Nama Lengkap *

                            </label>


                            <div class="input-wrapper">

                                <i class="fa-regular fa-user input-icon"></i>


                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    class="form-input"
                                    placeholder="Nama lengkap"
                                    required
                                >

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="nama_pena">

                                Nama Pena *

                            </label>


                            <div class="input-wrapper">

                                <i class="fa-solid fa-feather-pointed input-icon"></i>


                                <input
                                    type="text"
                                    id="nama_pena"
                                    name="nama_pena"
                                    value="{{ old('nama_pena') }}"
                                    class="form-input"
                                    placeholder="Nama yang ditampilkan"
                                    required
                                >

                            </div>

                        </div>


                    </div>



                    <!-- USERNAME + EMAIL -->

                    <div class="form-row">


                        <div class="form-group">

                            <label for="username">

                                Username *

                            </label>


                            <div class="input-wrapper">

                                <i class="fa-solid fa-at input-icon"></i>


                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                    class="form-input"
                                    placeholder="Pilih username"
                                    required
                                >

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="email">

                                Email *

                            </label>


                            <div class="input-wrapper">

                                <i class="fa-regular fa-envelope input-icon"></i>


                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-input"
                                    placeholder="nama@email.com"
                                    required
                                >

                            </div>

                        </div>


                    </div>



                    <!-- WHATSAPP + BIO -->

                    <div class="form-row">


                        <div class="form-group">

                            <label for="whatsapp">

                                Nomor WhatsApp *

                            </label>


                            <div class="input-wrapper">

                                <i class="fa-brands fa-whatsapp input-icon"></i>


                                <input
                                    type="tel"
                                    id="whatsapp"
                                    name="whatsapp"
                                    value="{{ old('whatsapp') }}"
                                    class="form-input"
                                    placeholder="08xxxxxxxxxx"
                                    required
                                >

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="bio">

                                Bio Singkat

                            </label>


                            <div class="input-wrapper bio-wrapper">

                                <i class="fa-solid fa-pen input-icon"></i>


                                <textarea
                                    id="bio"
                                    name="bio"
                                    class="bio-input"
                                    placeholder="Ceritakan sedikit tentang dirimu..."
                                    >{{ old('bio') }}</textarea>

                            </div>

                        </div>


                    </div>



                    <!-- PASSWORD -->

                    <div class="form-row">


                        <div class="form-group">

                            <label for="password">

                                Password *

                            </label>


                            <div class="input-wrapper">

                                <i class="fa-solid fa-lock input-icon"></i>


                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-input"
                                    placeholder="Buat password"
                                    required
                                >


                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('password', this)"
                                >

                                    <i class="fa-regular fa-eye"></i>

                                </button>

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="password_confirmation">

                                Konfirmasi Password *

                            </label>


                            <div class="input-wrapper">

                                <i class="fa-solid fa-lock input-icon"></i>


                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-input"
                                    placeholder="Ulangi password"
                                    required
                                >


                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword('password_confirmation', this)"
                                >

                                    <i class="fa-regular fa-eye"></i>

                                </button>

                            </div>

                        </div>


                    </div>



                    <!-- TERMS -->

                    <div class="terms">

                        <input
                            type="checkbox"
                            id="terms"
                            name="terms"
                            required
                        >


                        <label for="terms">

                            Saya menyetujui

                            <a href="#">
                                syarat & ketentuan
                            </a>

                            serta

                            <a href="#">
                                kebijakan penulis
                            </a>

                            Derap Serayu.

                        </label>

                    </div>



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="submit-btn"
                    >

                        Mulai Menulis

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>


                </form>



                <!-- LOGIN -->

                <div class="login-area">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">

                        Masuk di sini

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>


            </section>


        </div>

    </main>



    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        function togglePassword(id, button) {

            const input = document.getElementById(id);

            const icon = button.querySelector('i');


            if (input.type === 'password') {

                input.type = 'text';

                icon.classList.remove('fa-eye');

                icon.classList.add('fa-eye-slash');

            }

            else {

                input.type = 'password';

                icon.classList.remove('fa-eye-slash');

                icon.classList.add('fa-eye');

            }

        }

    </script>


</body>

</html>