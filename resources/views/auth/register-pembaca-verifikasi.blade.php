<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Akun | Derap Serayu</title>


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
           MAIN
        ===================================================== */

        .verification-page {

            min-height: calc(100vh - 124px);

            position: relative;

            overflow: hidden;

            display: flex;

            align-items: center;

            justify-content: center;

            background-image:

                linear-gradient(
                    90deg,
                    rgba(3,48,68,.18),
                    rgba(3,48,68,.05)
                ),

                url('{{ asset('images/bg-dieng-register.jpg') }}');

            background-size: cover;

            background-position: center center;

            background-repeat: no-repeat;

            padding: 45px 20px;
        }


        /* =====================================================
           DECORATION
        ===================================================== */

        .circle-one {

            position: absolute;

            width: 420px;

            height: 420px;

            border-radius: 50%;

            border: 1px solid rgba(112,226,245,.27);

            left: -250px;

            bottom: -220px;
        }

        .circle-one::after {

            content: "";

            position: absolute;

            inset: 35px;

            border-radius: 50%;

            border: 1px solid rgba(112,226,245,.13);
        }

        .circle-two {

            position: absolute;

            width: 230px;

            height: 230px;

            border-radius: 50%;

            background: rgba(8,173,213,.10);

            right: -110px;

            top: -70px;

            filter: blur(2px);
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .verification-container {

            width: 100%;

            max-width: 1040px;

            position: relative;

            z-index: 5;

            display: grid;

            grid-template-columns: .78fr 1.05fr;

            align-items: center;

            gap: 75px;
        }


        /* =====================================================
           LEFT CONTENT
        ===================================================== */

        .intro {

            color: white;

            padding-left: 10px;
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

            font-size: clamp(43px, 4.4vw, 60px);

            line-height: 1.06;

            letter-spacing: -1.5px;

            color: white;

            text-shadow: 0 5px 25px rgba(0,0,0,.18);
        }

        .intro h1 span {

            display: block;

            color: #69e1f5;

            font-style: italic;
        }

        .intro-text {

            max-width: 430px;

            margin-top: 18px;

            color: rgba(255,255,255,.91);

            font-size: 13px;

            line-height: 1.75;

            text-shadow: 0 2px 10px rgba(0,0,0,.2);
        }


        /* =====================================================
           MAIL INFO
        ===================================================== */

        .mail-info {

            margin-top: 24px;

            display: flex;

            align-items: center;

            gap: 12px;
        }

        .mail-icon {

            width: 42px;

            height: 42px;

            border-radius: 13px;

            background: rgba(255,255,255,.14);

            border: 1px solid rgba(255,255,255,.18);

            backdrop-filter: blur(9px);

            display: flex;

            align-items: center;

            justify-content: center;

            color: #72e3f5;

            flex-shrink: 0;
        }

        .mail-info small {

            display: block;

            color: rgba(255,255,255,.68);

            font-size: 9px;

            margin-bottom: 3px;
        }

        .mail-info strong {

            color: white;

            font-size: 12px;

            font-weight: 600;
        }


        /* =====================================================
           QUOTE
        ===================================================== */

        .quote {

            margin-top: 30px;

            font-family: 'Playfair Display', serif;

            font-style: italic;

            font-size: 18px;

            line-height: 1.4;

            color: white;

            text-shadow: 0 3px 15px rgba(0,0,0,.25);
        }

        .quote-line {

            width: 65px;

            height: 3px;

            background: #08c1e8;

            border-radius: 10px;

            margin-top: 11px;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .verification-card {

            position: relative;

            background: rgba(249,253,255,.93);

            border: 1px solid rgba(255,255,255,.78);

            backdrop-filter: blur(20px);

            -webkit-backdrop-filter: blur(20px);

            border-radius: 28px;

            padding: 31px 40px 28px;

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


        /* =====================================================
           STEPS
        ===================================================== */

        .steps {

            display: flex;

            align-items: center;

            width: 100%;

            margin-bottom: 24px;
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

        .step.done .step-number {

            background: #073f5e;

            border-color: #073f5e;

            color: white;
        }

        .step.done span {

            color: #073f5e;

            font-weight: 600;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .card-header {

            text-align: center;

            margin-bottom: 20px;
        }

        .card-header h2 {

            font-family: 'Playfair Display', serif;

            font-size: 33px;

            line-height: 1.08;

            color: #073f5e;

            letter-spacing: -1px;
        }

        .card-header h2 span {

            color: #08add5;

            font-style: italic;
        }

        .card-header p {

            max-width: 390px;

            margin: 8px auto 0;

            color: #7d98a4;

            font-size: 11px;

            line-height: 1.65;
        }


        /* =====================================================
           OTP
        ===================================================== */

        .otp-label {

            display: block;

            text-align: center;

            color: #0a4d6b;

            font-size: 10px;

            font-weight: 700;

            margin-bottom: 10px;
        }

        .otp-wrapper {

            display: flex;

            justify-content: center;

            gap: 9px;
        }

        .otp-input {

            width: 48px;

            height: 53px;

            border: 1px solid #cfe2e9;

            border-radius: 12px;

            background: rgba(255,255,255,.72);

            color: #073f5e;

            text-align: center;

            font-size: 20px;

            font-weight: 700;

            outline: none;

            transition: .2s;
        }

        .otp-input:focus {

            border-color: #08add5;

            background: white;

            box-shadow:
                0 0 0 3px rgba(8,173,213,.09);
        }


        /* =====================================================
           COUNTDOWN
        ===================================================== */

        .countdown {

            text-align: center;

            margin-top: 14px;

            color: #8aa1ab;

            font-size: 9px;

        }

        .countdown strong {

            color: #078fba;

            font-weight: 700;
        }


        /* =====================================================
           VERIFY BUTTON
        ===================================================== */

        .verify-btn {

            width: 100%;

            height: 46px;

            margin-top: 19px;

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

        .verify-btn:hover {

            transform: translateY(-2px);

            box-shadow:
                0 14px 28px rgba(8,173,213,.32);
        }

        .verify-btn i {
            transition: .25s;
        }

        .verify-btn:hover i {
            transform: translateX(5px);
        }


        /* =====================================================
           RESEND
        ===================================================== */

        .resend {

            text-align: center;

            margin-top: 14px;

            font-size: 9px;

            color: #839ba5;
        }

        .resend button {

            border: none;

            background: transparent;

            color: #078fba;

            font-size: 9px;

            font-weight: 700;

            cursor: pointer;

            margin-left: 3px;
        }

        .resend button:hover {
            color: #065f7c;
        }


        /* =====================================================
           BACK
        ===================================================== */

        .back-register {

            display: flex;

            justify-content: center;

            margin-top: 17px;

            padding-top: 15px;

            border-top: 1px solid #e2edf1;
        }

        .back-register a {

            display: flex;

            align-items: center;

            gap: 6px;

            color: #829aa5;

            font-size: 9px;

            transition: .2s;
        }

        .back-register a:hover {
            color: #078fba;
        }


        /* =====================================================
           SECURITY
        ===================================================== */

        .security {

            display: flex;

            justify-content: center;

            align-items: center;

            gap: 6px;

            margin-top: 15px;

            color: #a0b0b7;

            font-size: 8px;
        }

        .security i {
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

            .verification-container {
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

            .verification-container {

                max-width: 650px;

                grid-template-columns: 1fr;

                gap: 35px;
            }

            .intro {

                text-align: center;

                padding: 0;
            }

            .intro-text {

                margin-left: auto;

                margin-right: auto;
            }

            .mail-info {

                justify-content: center;
            }

            .quote {
                display: none;
            }

            .verification-card {

                max-width: 530px;

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

            .verification-page {

                min-height: calc(100vh - 72px);

                padding: 30px 16px;
            }

            .intro h1 {
                font-size: 43px;
            }

            .verification-card {

                padding: 27px 22px 24px;

                border-radius: 23px;
            }

            .card-header h2 {
                font-size: 30px;
            }

            .otp-wrapper {
                gap: 6px;
            }

            .otp-input {

                width: 42px;

                height: 48px;
            }
        }


        @media (max-width: 450px) {

            .menu-btn {
                display: none;
            }

            .intro h1 {
                font-size: 36px;
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

            .otp-wrapper {
                gap: 5px;
            }

            .otp-input {

                width: 38px;

                height: 45px;

                font-size: 18px;
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
         VERIFICATION PAGE
    ====================================================== -->

    <main class="verification-page">


        <div class="circle-one"></div>

        <div class="circle-two"></div>



        <div class="verification-container">


            <!-- =================================================
                 LEFT
            ================================================== -->

            <section class="intro">


                <div class="intro-badge">

                    <i class="fa-solid fa-shield-halved"></i>

                    VERIFIKASI AKUN

                </div>



                <h1>

                    Satu langkah

                    <span>
                        lagi.
                    </span>

                </h1>



                <p class="intro-text">

                    Kami ingin memastikan bahwa akun yang kamu
                    daftarkan benar-benar milikmu. Masukkan kode
                    verifikasi yang telah dikirimkan ke email kamu.

                </p>



                <div class="mail-info">

                    <div class="mail-icon">

                        <i class="fa-regular fa-envelope"></i>

                    </div>


                    <div>

                        <small>
                            Kode dikirim ke
                        </small>

                        <strong>
                            annisa******@gmail.com
                        </strong>

                    </div>

                </div>



                <div class="quote">

                    "Satu akun untuk menikmati
                    cerita Banjarnegara."

                    <div class="quote-line"></div>

                </div>


            </section>



            <!-- =================================================
                 VERIFICATION CARD
            ================================================== -->

            <section class="verification-card">


                <div class="card-icon">

                    <i class="fa-solid fa-key"></i>

                </div>



                <!-- STEPS -->

                <div class="steps">


                    <div class="step done">

                        <div class="step-number">

                            <i class="fa-solid fa-check"></i>

                        </div>

                        <span>
                            Data Diri
                        </span>

                    </div>


                    <div class="step-line"></div>


                    <div class="step active">

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

                <div class="card-header">

                    <h2>

                        Verifikasi

                        <span>
                            Email
                        </span>

                    </h2>


                    <p>

                        Masukkan 6 digit kode verifikasi yang
                        telah kami kirimkan ke alamat emailmu.

                    </p>

                </div>



                <!-- FORM -->

                <form
                    action="#"
                    method="POST"
                    id="verificationForm"
                >

                    @csrf


                    <label class="otp-label">

                        Kode Verifikasi

                    </label>


                    <div class="otp-wrapper">


                        <input
                            type="text"
                            class="otp-input"
                            maxlength="1"
                            inputmode="numeric"
                            autocomplete="one-time-code"
                            autofocus
                        >


                        <input
                            type="text"
                            class="otp-input"
                            maxlength="1"
                            inputmode="numeric"
                        >


                        <input
                            type="text"
                            class="otp-input"
                            maxlength="1"
                            inputmode="numeric"
                        >


                        <input
                            type="text"
                            class="otp-input"
                            maxlength="1"
                            inputmode="numeric"
                        >


                        <input
                            type="text"
                            class="otp-input"
                            maxlength="1"
                            inputmode="numeric"
                        >


                        <input
                            type="text"
                            class="otp-input"
                            maxlength="1"
                            inputmode="numeric"
                        >


                    </div>



                    <div class="countdown">

                        Kode berlaku selama

                        <strong id="timer">
                            02:00
                        </strong>

                    </div>



                    <button
                        type="submit"
                        class="verify-btn"
                    >

                        Verifikasi Akun

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>


                </form>



                <!-- RESEND -->

                <div class="resend">

                    Tidak menerima kode?

                    <button
                        type="button"
                        onclick="resendCode()"
                    >

                        Kirim ulang

                    </button>

                </div>



                <!-- BACK -->

                <div class="back-register">

                    <a href="{{ route('register.pembaca') }}">

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali ke pendaftaran

                    </a>

                </div>



                <!-- SECURITY -->

                <div class="security">

                    <i class="fa-solid fa-lock"></i>

                    Verifikasi akunmu dengan aman

                </div>


            </section>


        </div>

    </main>



    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>


        /* =====================================================
           OTP AUTO NEXT
        ===================================================== */

        const otpInputs =
            document.querySelectorAll('.otp-input');


        otpInputs.forEach((input, index) => {


            input.addEventListener('input', function () {

                this.value =
                    this.value.replace(/[^0-9]/g, '');


                if (
                    this.value &&
                    index < otpInputs.length - 1
                ) {

                    otpInputs[index + 1].focus();

                }

            });


            input.addEventListener('keydown', function (event) {

                if (
                    event.key === 'Backspace' &&
                    !this.value &&
                    index > 0
                ) {

                    otpInputs[index - 1].focus();

                }

            });


            input.addEventListener('paste', function (event) {

                event.preventDefault();


                const pasted =
                    event.clipboardData
                        .getData('text')
                        .replace(/\D/g, '')
                        .slice(0, 6);


                pasted.split('').forEach((number, i) => {

                    if (otpInputs[i]) {

                        otpInputs[i].value = number;

                    }

                });


                const nextIndex =
                    Math.min(
                        pasted.length,
                        otpInputs.length - 1
                    );


                otpInputs[nextIndex].focus();

            });

        });



        /* =====================================================
           COUNTDOWN
        ===================================================== */

        let timeLeft = 120;


        const timer =
            document.getElementById('timer');


        const countdown =
            setInterval(function () {


                const minutes =
                    Math.floor(timeLeft / 60);


                const seconds =
                    timeLeft % 60;


                timer.textContent =
                    String(minutes).padStart(2, '0')
                    + ':'
                    + String(seconds).padStart(2, '0');


                if (timeLeft <= 0) {

                    clearInterval(countdown);

                    timer.textContent = '00:00';

                }


                timeLeft--;

            }, 1000);



        /* =====================================================
           RESEND
        ===================================================== */

        function resendCode() {

            alert(
                'Kode verifikasi baru telah dikirim kembali.'
            );

        }

    </script>


</body>

</html>