<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Daftar Pembaca | Derap Serayu</title>


    <!-- =====================================================
         GOOGLE FONT
    ====================================================== -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap"
          rel="stylesheet">


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>

        /* =====================================================
           RESET
        ====================================================== */

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
        ====================================================== */

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
        ====================================================== */

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
        ====================================================== */

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
        ====================================================== */

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

            margin-left: 4px;

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
           MAIN HERO
        ====================================================== */

        .register-page {

            min-height: calc(100vh - 124px);

            position: relative;

            overflow: hidden;

            background-image:

                linear-gradient(
                    rgba(3, 48, 68, 0.15),
                    rgba(3, 48, 68, 0.15)
                ),

                url('{{ asset('images/bg-dieng-register.jpg') }}');

            background-size: cover;

            background-position: center;

            background-repeat: no-repeat;

            padding: 52px 7.5% 58px;

        }



        /* =====================================================
           IMAGE OVERLAY
        ====================================================== */

        .register-page::after {

            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    180deg,
                    rgba(3,43,61,.04),
                    rgba(3,43,61,.18)
                );

            pointer-events: none;

        }



        /* =====================================================
           DECORATIVE CIRCLE
        ====================================================== */

        .circle-decoration {

            position: absolute;

            width: 320px;

            height: 320px;

            border-radius: 50%;

            border: 1px solid rgba(104,225,245,.40);

            left: -205px;

            top: -110px;

            z-index: 1;

        }


        .circle-decoration::after {

            content: "";

            position: absolute;

            inset: 32px;

            border-radius: 50%;

            border: 1px solid rgba(104,225,245,.15);

        }



        /* =====================================================
           MAIN CONTENT
        ====================================================== */

        .register-container {

            max-width: 1260px;

            min-height: 620px;

            margin: auto;

            position: relative;

            z-index: 5;

            display: grid;

            grid-template-columns: .88fr 1.12fr;

            align-items: center;

            gap: 60px;

        }



        /* =====================================================
           LEFT CONTENT
        ====================================================== */

        .intro {

            color: white;

            padding: 10px 0 20px;

        }


        .intro-badge {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 8px 15px;

            background: rgba(8,173,213,.35);

            border: 1px solid rgba(113,228,247,.20);

            border-radius: 25px;

            backdrop-filter: blur(8px);

            color: #71e2f5;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: .5px;

            margin-bottom: 22px;

        }


        .intro-badge i {

            font-size: 13px;

        }


        .intro h1 {

            font-family: 'Playfair Display', serif;

            font-size: clamp(45px, 4vw, 64px);

            line-height: 1.04;

            letter-spacing: -1.5px;

            color: white;

            text-shadow: 0 5px 25px rgba(0,0,0,.15);

        }


        .intro h1 span {

            display: block;

            color: #68e0f4;

            font-style: italic;

        }


        .intro-description {

            max-width: 440px;

            margin-top: 20px;

            color: rgba(255,255,255,.90);

            font-size: 14px;

            line-height: 1.75;

            text-shadow: 0 2px 10px rgba(0,0,0,.20);

        }



        /* =====================================================
           BENEFIT LIST
        ====================================================== */

        .benefits {

            margin-top: 28px;

            display: flex;

            flex-direction: column;

            gap: 13px;

        }


        .benefit {

            display: flex;

            align-items: center;

            gap: 13px;

            color: white;

            font-size: 13px;

            font-weight: 500;

        }


        .benefit-icon {

            width: 38px;

            height: 38px;

            flex-shrink: 0;

            border-radius: 11px;

            background: rgba(8,173,213,.55);

            border: 1px solid rgba(255,255,255,.13);

            backdrop-filter: blur(10px);

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            box-shadow: 0 8px 20px rgba(0,0,0,.10);

        }



        /* =====================================================
           QUOTE
        ====================================================== */

        .quote {

            margin-top: 32px;

            font-family: 'Playfair Display', serif;

            font-style: italic;

            font-size: 20px;

            line-height: 1.4;

            color: white;

            text-shadow: 0 3px 15px rgba(0,0,0,.25);

        }


        .quote-line {

            width: 75px;

            height: 3px;

            background: #08c1e8;

            margin-top: 12px;

            border-radius: 10px;

        }



        /* =====================================================
           FORM CARD
        ====================================================== */

        .form-card {

            position: relative;

            background: rgba(248,253,255,.91);

            border: 1px solid rgba(255,255,255,.70);

            backdrop-filter: blur(18px);

            -webkit-backdrop-filter: blur(18px);

            border-radius: 27px;

            padding: 34px 40px 30px;

            box-shadow:

                0 25px 70px rgba(0,38,57,.24),

                inset 0 1px 0 rgba(255,255,255,.8);

            overflow: hidden;

        }


        /* =====================================================
           CARD DECORATION
        ====================================================== */

        .card-cloud {

            position: absolute;

            right: 17px;

            top: 18px;

            color: #8edff0;

            opacity: .65;

            font-size: 42px;

        }


        .card-mountain {

            position: absolute;

            right: -10px;

            bottom: -10px;

            width: 145px;

            height: 100px;

            opacity: .13;

            background:

                linear-gradient(
                    135deg,
                    transparent 45%,
                    #08add5 46%,
                    #08add5 49%,
                    transparent 50%
                );

            transform: rotate(-8deg);

            pointer-events: none;

        }



        /* =====================================================
           STEPS
        ====================================================== */

        .steps {

            display: flex;

            align-items: center;

            width: 100%;

            margin-bottom: 28px;

        }


        .step {

            display: flex;

            align-items: center;

            gap: 9px;

            white-space: nowrap;

        }


        .step-number {

            width: 29px;

            height: 29px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 1px solid #d8e9ee;

            color: #a6c0ca;

            font-size: 11px;

            font-weight: 700;

            background: rgba(255,255,255,.6);

        }


        .step.active .step-number {

            background: #08add5;

            border-color: #08add5;

            color: white;

            box-shadow: 0 5px 15px rgba(8,173,213,.25);

        }


        .step span {

            color: #a0b7c1;

            font-size: 10px;

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

            margin: 0 14px;

        }


        /* =====================================================
           FORM HEADER
        ====================================================== */

        .form-header {

            margin-bottom: 23px;

        }


        .form-header h2 {

            font-family: 'Playfair Display', serif;

            font-size: 39px;

            line-height: 1.08;

            color: #073f5e;

            letter-spacing: -1px;

        }


        .form-header h2 span {

            color: #08add5;

            font-style: italic;

        }


        .form-header p {

            margin-top: 9px;

            max-width: 520px;

            color: #7d98a4;

            font-size: 12px;

            line-height: 1.7;

        }



        /* =====================================================
           FORM
        ====================================================== */

        .register-form {

            display: flex;

            flex-direction: column;

            gap: 15px;

        }


        .form-row {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;

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

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            color: #73a0b2;

            font-size: 13px;

            pointer-events: none;

            transition: .2s;

        }


        .form-input {

            width: 100%;

            height: 50px;

            padding: 0 43px;

            border: 1px solid #cfe2e9;

            border-radius: 12px;

            background: rgba(255,255,255,.62);

            color: #31596d;

            outline: none;

            font-size: 11px;

            transition: .2s;

        }


        .form-input::placeholder {

            color: #9aafb8;

        }


        .form-input:focus {

            background: rgba(255,255,255,.90);

            border-color: #08add5;

            box-shadow:

                0 0 0 3px rgba(8,173,213,.09);

        }


        .input-wrapper:focus-within .input-icon {

            color: #08add5;

        }



        /* =====================================================
           PASSWORD TOGGLE
        ====================================================== */

        .password-toggle {

            position: absolute;

            right: 13px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #4b7990;

            cursor: pointer;

            font-size: 12px;

        }


        .password-toggle:hover {

            color: #08add5;

        }



        /* =====================================================
           TERMS
        ====================================================== */

        .terms {

            display: flex;

            align-items: flex-start;

            gap: 9px;

            margin-top: 1px;

        }


        .terms input {

            width: 16px;

            height: 16px;

            margin-top: 1px;

            accent-color: #08add5;

            cursor: pointer;

            flex-shrink: 0;

        }


        .terms label {

            color: #75919d;

            font-size: 9.5px;

            line-height: 1.6;

        }


        .terms a {

            color: #078fba;

            font-weight: 700;

        }



        /* =====================================================
           SUBMIT
        ====================================================== */

        .submit-btn {

            width: 100%;

            height: 47px;

            border: none;

            border-radius: 25px;

            background: linear-gradient(
                100deg,
                #08a8d0,
                #08b8df
            );

            color: white;

            font-size: 12px;

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
        ====================================================== */

        .login-area {

            border-top: 1px solid #e2edf1;

            margin-top: 20px;

            padding-top: 17px;

            font-size: 10px;

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
        ====================================================== */

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

            .register-page {

                padding-top: 40px;

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

                padding: 35px 16px;

            }

            .intro h1 {

                font-size: 45px;

            }

            .intro-description {

                font-size: 12px;

            }

            .form-card {

                padding: 28px 23px;

                border-radius: 22px;

            }

            .form-header h2 {

                font-size: 31px;

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

            .intro-badge {

                font-size: 9px;

            }

            .steps {

                gap: 3px;

            }

            .step-line {

                margin: 0 7px;

            }

            .step span {

                font-size: 8px;

            }

            .step-number {

                width: 26px;

                height: 26px;

            }

        }

    </style>

</head>


<body>

    <!-- =====================================================
         REGISTER PAGE
    ====================================================== -->

    <main class="register-page">


        <div class="circle-decoration"></div>



        <div class="register-container">


            <!-- =================================================
                 LEFT
            ================================================== -->

            <section class="intro">


                <div class="intro-badge">

                    <i class="fa-solid fa-book-open"></i>

                    DAFTAR PEMBACA

                </div>



                <h1>

                    Mulai Ceritamu

                    <span>
                        di Sini.
                    </span>

                </h1>



                <p class="intro-description">

                    Jadilah bagian dari Derap Serayu dan nikmati
                    berbagai cerita menarik tentang Banjarnegara,
                    budaya, wisata, dan kehidupan masyarakatnya.

                </p>



                <div class="benefits">


                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="fa-solid fa-book-open"></i>

                        </div>

                        <span>
                            Akses artikel terbaru
                        </span>

                    </div>



                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="fa-solid fa-bookmark"></i>

                        </div>

                        <span>
                            Simpan artikel favorit
                        </span>

                    </div>



                    <div class="benefit">

                        <div class="benefit-icon">

                            <i class="fa-solid fa-comments"></i>

                        </div>

                        <span>
                            Bergabung dalam diskusi
                        </span>

                    </div>


                </div>



                <div class="quote">

                    Dari Banjarnegara,

                    <br>

                    untuk cerita yang lebih luas.

                    <div class="quote-line"></div>

                </div>


            </section>



            <!-- =================================================
                 RIGHT FORM
            ================================================== -->

            <section class="form-card">


                <div class="card-cloud">

                    <i class="fa-solid fa-cloud"></i>

                </div>


                <div class="card-mountain"></div>

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
                            Pembaca
                        </span>

                    </h2>


                    <p>

                        Lengkapi data di bawah ini untuk membuat
                        akun pembaca Derap Serayu.

                    </p>


                </div>



                <!-- FORM -->

                <form
                    action="{{ route('register.pembaca.store') }}"
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



                    <!-- NAMA + USERNAME -->

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
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >

                            </div>

                        </div>



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


                    </div>



                    <!-- EMAIL -->

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
                                kebijakan privasi
                            </a>

                            Derap Serayu.

                        </label>


                    </div>



                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="submit-btn"
                    >

                        Buat Akun Pembaca

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