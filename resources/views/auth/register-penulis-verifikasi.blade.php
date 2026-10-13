<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Penulis | Derap Serayu</title>

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

            padding: 45px 30px;
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
           CARD HEADER
        ========================== */

        .card-content {
            position: relative;
            z-index: 2;
        }

        .card-label {
            color: #08add5;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 2px;

            margin-bottom: 8px;
        }

        .card h2 {
            font-family: 'Playfair Display', serif;

            font-size: 29px;

            color: #073f5e;

            margin-bottom: 9px;
        }

        .card-description {
            color: #7b8e97;

            font-size: 12px;

            line-height: 1.7;

            margin-bottom: 20px;
        }


        /* =========================
           EMAIL BOX
        ========================== */

        .email-box {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 11px 13px;

            margin-bottom: 22px;

            border-radius: 10px;

            background: #f3f9fb;

            border: 1px solid #e1edf1;
        }

        .email-icon {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            background: #dff7fc;

            color: #08add5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 12px;
        }

        .email-text small {
            display: block;

            color: #9aaab2;

            font-size: 8px;

            letter-spacing: 1px;

            margin-bottom: 3px;
        }

        .email-text strong {
            color: #31576a;

            font-size: 11px;
        }


        /* =========================
           OTP
        ========================== */

        .otp-title {
            display: block;

            color: #31576a;

            font-size: 10px;

            font-weight: 700;

            margin-bottom: 10px;
        }

        .otp-wrapper {
            display: flex;

            justify-content: center;

            gap: 9px;

            margin-bottom: 16px;
        }

        .otp-input {
            width: 42px;
            height: 46px;

            border: 1px solid #d8e5ea;

            border-radius: 9px;

            background: #fbfdfe;

            text-align: center;

            font-family: 'DM Sans', sans-serif;

            font-size: 18px;

            font-weight: 700;

            color: #073f5e;

            outline: none;

            transition: 0.2s;
        }

        .otp-input:focus {
            border-color: #08add5;

            box-shadow:
                0 0 0 3px rgba(8, 173, 213, 0.10);
        }


        /* =========================
           TIMER
        ========================== */

        .timer-row {
            display: flex;

            justify-content: center;
            align-items: center;

            gap: 5px;

            margin-bottom: 14px;

            color: #93a2aa;

            font-size: 10px;
        }

        .timer {
            color: #08add5;

            font-weight: 700;
        }


        /* =========================
           RESEND
        ========================== */

        .resend {
            text-align: center;

            font-size: 10px;

            color: #93a2aa;

            margin-bottom: 18px;
        }

        .resend button {
            border: none;

            background: transparent;

            color: #08add5;

            font-family: inherit;

            font-size: 10px;

            font-weight: 700;

            cursor: pointer;
        }


        /* =========================
           VERIFY BUTTON
        ========================== */

        .btn-verify {
            width: 100%;
            height: 46px;

            border: none;
            border-radius: 9px;

            background: #073f5e;

            color: white;

            font-family: inherit;

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            transition: 0.25s;

            box-shadow:
                0 8px 18px rgba(7, 63, 94, 0.18);
        }

        .btn-verify:hover {
            background: #08add5;

            transform: translateY(-2px);
        }

        .btn-verify i {
            margin-left: 7px;
        }


        /* =========================
           BACK
        ========================== */

        .back-link {
            display: flex;

            justify-content: center;
            align-items: center;

            gap: 6px;

            margin-top: 14px;

            color: #81939d;

            text-decoration: none;

            font-size: 10px;

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
            position: relative;
            z-index: 2;

            display: flex;

            align-items: center;
            justify-content: center;

            gap: 6px;

            margin-top: 19px;

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
                padding: 28px 20px 25px;
            }

            .otp-wrapper {
                gap: 6px;
            }

            .otp-input {
                width: 39px;
                height: 43px;
            }

            .step-label {
                font-size: 8px;
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
                 LEFT CONTENT
            ========================== -->

            <section class="left-content">

                <div class="eyebrow">

                    <span class="eyebrow-line"></span>

                    VERIFIKASI PENULIS

                </div>


                <h1>

                    Satu langkah<br>

                    <span>menuju ruang cerita.</span>

                </h1>


                <p>

                    Verifikasi akunmu untuk mulai berbagi cerita,
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


                <!-- STEP INDICATOR -->

                <div class="steps">


                    <!-- DATA DIRI -->

                    <div class="step done">

                        <div class="step-circle">

                            <i class="fa-solid fa-check"></i>

                        </div>

                        <span class="step-label">
                            Data Diri
                        </span>

                    </div>


                    <div class="step-line done"></div>


                    <!-- VERIFIKASI -->

                    <div class="step active">

                        <div class="step-circle">
                            02
                        </div>

                        <span class="step-label">
                            Verifikasi
                        </span>

                    </div>


                    <div class="step-line"></div>


                    <!-- SELESAI -->

                    <div class="step">

                        <div class="step-circle">
                            03
                        </div>

                        <span class="step-label">
                            Selesai
                        </span>

                    </div>

                </div>



                <!-- CARD CONTENT -->

                <div class="card-content">


                    <div class="card-label">
                        VERIFIKASI AKUN PENULIS
                    </div>


                    <h2>
                        Satu langkah lagi.
                    </h2>


                    <p class="card-description">

                        Masukkan kode verifikasi yang telah
                        dikirimkan ke email kamu untuk mengaktifkan
                        akun penulis Derap Serayu.

                    </p>



                    <!-- EMAIL -->

                    <div class="email-box">

                        <div class="email-icon">

                            <i class="fa-regular fa-envelope"></i>

                        </div>


                        <div class="email-text">

                            <small>
                                KODE DIKIRIM KE
                            </small>

                            <strong>
                                annisa******@gmail.com
                            </strong>

                        </div>

                    </div>



                    <!-- OTP -->

                    <label class="otp-title">
                        Masukkan kode 6 digit
                    </label>


                    <div class="otp-wrapper">

                        <input
                            type="text"
                            class="otp-input"
                            maxlength="1"
                            inputmode="numeric"
                            autocomplete="one-time-code"
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



                    <!-- TIMER -->

                    <div class="timer-row">

                        <i class="fa-regular fa-clock"></i>

                        Kode berlaku selama

                        <span class="timer" id="timer">
                            02:00
                        </span>

                    </div>



                    <!-- RESEND -->

                    <div class="resend">

                        Belum menerima kode?

                        <button
                            type="button"
                            id="resendBtn"
                        >
                            Kirim ulang
                        </button>

                    </div>



                    <!-- BUTTON -->

                    <a
                        href="{{ route('register.penulis.selesai') }}"
                        style="text-decoration: none;"
                    >

                        <button
                            type="button"
                            class="btn-verify"
                        >

                            Verifikasi Akun

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                    </a>



                    <!-- BACK -->

                    <a
                        href="{{ route('register.penulis') }}"
                        class="back-link"
                    >

                        <i class="fa-solid fa-arrow-left"></i>

                        Kembali ke data diri

                    </a>

                </div>



                <!-- SECURITY -->

                <div class="security">

                    <i class="fa-solid fa-lock"></i>

                    Data kamu aman dan hanya digunakan untuk verifikasi akun

                </div>

            </section>

        </div>

    </main>



    <!-- =========================
         JAVASCRIPT
    ========================== -->

    <script>

        /* =========================
           OTP AUTO NEXT
        ========================== */

        const otpInputs = document.querySelectorAll('.otp-input');

        otpInputs.forEach((input, index) => {

            input.addEventListener('input', function () {

                this.value = this.value.replace(/\D/g, '');

                if (this.value && index < otpInputs.length - 1) {

                    otpInputs[index + 1].focus();

                }

            });


            input.addEventListener('keydown', function (e) {

                if (
                    e.key === 'Backspace' &&
                    !this.value &&
                    index > 0
                ) {

                    otpInputs[index - 1].focus();

                }

            });

        });


        /* =========================
           PASTE OTP
        ========================== */

        otpInputs[0].addEventListener('paste', function (e) {

            e.preventDefault();

            const pastedData =
                e.clipboardData
                    .getData('text')
                    .replace(/\D/g, '')
                    .slice(0, 6);

            pastedData.split('').forEach((number, index) => {

                if (otpInputs[index]) {

                    otpInputs[index].value = number;

                }

            });

            const nextIndex =
                Math.min(pastedData.length, 5);

            otpInputs[nextIndex].focus();

        });


        /* =========================
           COUNTDOWN
        ========================== */

        let timeLeft = 120;

        const timerElement =
            document.getElementById('timer');

        const countdown =
            setInterval(() => {

                const minutes =
                    Math.floor(timeLeft / 60);

                const seconds =
                    timeLeft % 60;

                timerElement.textContent =
                    String(minutes).padStart(2, '0')
                    + ':'
                    + String(seconds).padStart(2, '0');

                if (timeLeft <= 0) {

                    clearInterval(countdown);

                    timerElement.textContent = '00:00';

                }

                timeLeft--;

            }, 1000);


        /* =========================
           RESEND
        ========================== */

        document
            .getElementById('resendBtn')
            .addEventListener('click', function () {

                alert(
                    'Kode verifikasi baru telah dikirim kembali.'
                );

                timeLeft = 120;

            });

    </script>

</body>
</html>