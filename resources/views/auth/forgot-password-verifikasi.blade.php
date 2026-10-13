<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verifikasi Reset Password - Derap Serayu</title>

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
            color: #ffffff;
            min-height: 100vh;

            background:
                linear-gradient(
                    90deg,
                    rgba(3, 35, 53, 0.88),
                    rgba(3, 48, 70, 0.62)
                ),
                url("{{ asset('images/bg-dieng-register.jpg') }}");

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            overflow-x: hidden;
        }

        /* ================= TOP BAR ================= */

        .topbar {
            height: 36px;
            background: #063f60;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 6%;

            font-size: 11px;
        }

        .top-left,
        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .top-left span,
        .top-right a {
            color: rgba(255,255,255,.88);
            text-decoration: none;
        }

        .top-right a:hover {
            color: #68d9f5;
        }

        .top-right i {
            margin-right: 5px;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            height: 88px;
            background: rgba(255,255,255,.97);

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 6%;

            box-shadow: 0 4px 20px rgba(0,0,0,.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            text-decoration: none;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .brand-text {
            line-height: 1;
        }

        .brand-text strong {
            display: block;

            font-family: 'Playfair Display', serif;

            font-size: 25px;

            color: #063f60;
        }

        .brand-text span {
            font-size: 9px;

            color: #6f8490;

            letter-spacing: 2px;

            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            color: #38515f;

            text-decoration: none;

            font-size: 13px;
            font-weight: 600;
        }

        .nav-menu a:hover {
            color: #08add5;
        }

        .search-box {
            width: 180px;
            height: 38px;

            border: 1px solid #d9e4e9;
            border-radius: 30px;

            display: flex;
            align-items: center;

            padding: 0 14px;

            gap: 8px;
        }

        .search-box i {
            color: #78909c;
            font-size: 13px;
        }

        .search-box input {
            width: 100%;

            border: none;
            outline: none;

            font-family: inherit;
            font-size: 12px;

            color: #38515f;
        }

        .menu-btn {
            border: none;

            background: #063f60;
            color: #fff;

            height: 38px;

            padding: 0 18px;

            border-radius: 22px;

            font-family: inherit;
            font-weight: 600;

            cursor: pointer;
        }

        /* ================= MAIN ================= */

        .main {
            min-height: calc(100vh - 124px);

            padding: 65px 7%;

            display: grid;

            grid-template-columns: 1fr 460px;

            gap: 80px;

            align-items: center;

            position: relative;
        }

        .main::before {
            content: "";

            position: absolute;

            width: 420px;
            height: 420px;

            border: 1px solid rgba(104,217,245,.25);

            border-radius: 50%;

            left: -170px;
            top: 60px;
        }

        .main::after {
            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            border: 1px solid rgba(104,217,245,.20);

            border-radius: 50%;

            right: -100px;
            bottom: 20px;
        }

        /* ================= LEFT CONTENT ================= */

        .left-content {
            max-width: 590px;

            position: relative;
            z-index: 2;
        }

        .eyebrow {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            color: #68d9f5;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 2px;

            margin-bottom: 20px;
        }

        .eyebrow::before {
            content: "";

            width: 30px;
            height: 1px;

            background: #68d9f5;
        }

        .left-content h1 {
            font-family: 'Playfair Display', serif;

            font-size: clamp(42px, 5vw, 67px);

            line-height: 1.05;

            margin-bottom: 22px;
        }

        .left-content h1 span {
            color: #68d9f5;
        }

        .left-content > p {
            max-width: 520px;

            font-size: 15px;

            line-height: 1.8;

            color: rgba(255,255,255,.78);
        }

        .quote {
            margin-top: 45px;

            padding-left: 20px;

            border-left: 2px solid #68d9f5;

            max-width: 430px;
        }

        .quote p {
            font-family: 'Playfair Display', serif;

            font-size: 18px;

            line-height: 1.5;

            color: rgba(255,255,255,.9);
        }

        /* ================= CARD ================= */

        .card {
            position: relative;
            z-index: 3;

            background: rgba(255,255,255,.96);

            border: 1px solid rgba(255,255,255,.8);

            border-radius: 24px;

            padding: 35px 38px;

            color: #193847;

            box-shadow:
                0 25px 70px rgba(0,0,0,.24);
        }

        .card-label {
            color: #08add5;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 2px;

            margin-bottom: 8px;
        }

        .card h2 {
            font-family: 'Playfair Display', serif;

            color: #063f60;

            font-size: 29px;

            margin-bottom: 8px;
        }

        .card-description {
            color: #71838d;

            font-size: 13px;

            line-height: 1.7;

            margin-bottom: 22px;
        }

        /* ================= STEP ================= */

        .steps {
            display: flex;

            align-items: center;

            margin-bottom: 27px;
        }

        .step {
            display: flex;

            align-items: center;

            gap: 7px;
        }

        .step-number {
            width: 27px;
            height: 27px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 10px;

            font-weight: 700;
        }

        .step.done .step-number {
            background: #08add5;
            color: #fff;
        }

        .step.active .step-number {
            background: #063f60;
            color: #fff;

            box-shadow:
                0 0 0 4px rgba(8,173,213,.12);
        }

        .step.inactive .step-number {
            background: #e8eef1;
            color: #9baab0;
        }

        .step-text {
            font-size: 10px;
            font-weight: 600;
        }

        .step.done .step-text,
        .step.active .step-text {
            color: #31505e;
        }

        .step.inactive .step-text {
            color: #a6b2b7;
        }

        .step-line {
            flex: 1;

            height: 1px;

            background: #dce5e9;

            margin: 0 9px;
        }

        /* ================= EMAIL INFO ================= */

        .email-box {
            background: #f4fafc;

            border: 1px solid #e0eef2;

            border-radius: 12px;

            padding: 13px 15px;

            display: flex;

            align-items: center;

            gap: 11px;

            margin-bottom: 22px;
        }

        .email-icon {
            width: 34px;
            height: 34px;

            border-radius: 9px;

            background: rgba(8,173,213,.12);

            display: flex;

            align-items: center;
            justify-content: center;
        }

        .email-icon i {
            color: #08add5;
            font-size: 13px;
        }

        .email-content small {
            display: block;

            color: #82939b;

            font-size: 9px;

            margin-bottom: 2px;
        }

        .email-content strong {
            display: block;

            color: #31505e;

            font-size: 12px;
        }

        /* ================= OTP ================= */

        .otp-label {
            color: #31505e;

            font-size: 11px;

            font-weight: 700;

            margin-bottom: 10px;

            text-align: center;
        }

        .otp-container {
            display: flex;

            justify-content: center;

            gap: 8px;

            margin-bottom: 15px;
        }

        .otp-input {
            width: 48px;
            height: 53px;

            border: 1px solid #d5e1e6;

            border-radius: 11px;

            background: #fbfdfe;

            text-align: center;

            font-family: inherit;

            font-size: 20px;

            font-weight: 700;

            color: #063f60;

            outline: none;

            transition: .2s;
        }

        .otp-input:focus {
            border-color: #08add5;

            box-shadow:
                0 0 0 3px rgba(8,173,213,.10);

            background: #fff;
        }

        /* ================= TIMER ================= */

        .timer {
            text-align: center;

            font-size: 11px;

            color: #8a9aa1;

            margin-bottom: 13px;
        }

        .timer span {
            color: #08add5;

            font-weight: 700;
        }

        /* ================= RESEND ================= */

        .resend {
            text-align: center;

            font-size: 11px;

            color: #7d8e95;

            margin-bottom: 22px;
        }

        .resend button {
            border: none;

            background: transparent;

            color: #08add5;

            font-family: inherit;

            font-size: 11px;

            font-weight: 700;

            cursor: pointer;
        }

        .resend button:hover {
            color: #063f60;
        }

        /* ================= BUTTON ================= */

        .submit-btn {
            width: 100%;

            height: 49px;

            border: none;

            border-radius: 12px;

            background: #063f60;

            color: white;

            font-family: inherit;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s;
        }

        .submit-btn:hover {
            background: #08add5;

            transform: translateY(-1px);

            box-shadow:
                0 8px 20px rgba(8,173,213,.20);
        }

        /* ================= BACK ================= */

        .back-link {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            margin-top: 18px;

            font-size: 11px;

            color: #7b8c94;

            text-decoration: none;
        }

        .back-link:hover {
            color: #08add5;
        }

        /* ================= SECURITY ================= */

        .security-note {
            margin-top: 22px;

            padding: 12px 14px;

            background: #f4fafc;

            border-radius: 10px;

            display: flex;

            align-items: flex-start;

            gap: 10px;
        }

        .security-note i {
            color: #08add5;

            font-size: 13px;

            margin-top: 2px;
        }

        .security-note p {
            color: #7b8d95;

            font-size: 10px;

            line-height: 1.6;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1000px) {

            .main {
                grid-template-columns: 1fr;

                gap: 45px;

                padding-top: 50px;
                padding-bottom: 60px;
            }

            .left-content {
                max-width: 700px;
            }

            .nav-menu {
                display: none;
            }

            .search-box {
                display: none;
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

            .brand-text strong {
                font-size: 21px;
            }

            .main {
                padding: 40px 20px 50px;
            }

            .left-content h1 {
                font-size: 42px;
            }

            .card {
                padding: 28px 20px;

                border-radius: 20px;
            }

            .otp-container {
                gap: 5px;
            }

            .otp-input {
                width: 42px;
                height: 49px;
            }
        }
    </style>
</head>

<body>

    <!-- ================= TOP BAR ================= -->

    <div class="topbar">

        <div class="top-left">

            <span>
                <i class="fa-solid fa-location-dot"></i>
                Banjarnegara
            </span>

            <span>
                <i class="fa-solid fa-cloud-sun"></i>
                24°C
            </span>

            <span>
                Selasa, 6 Oktober 2026
            </span>

        </div>

        <div class="top-right">

            <a href="#">PPID</a>
            <a href="#">Layanan Publik</a>
            <a href="#">Kontak</a>

            <a href="#">
                <i class="fa-brands fa-facebook-f"></i>
            </a>

            <a href="#">
                <i class="fa-brands fa-instagram"></i>
            </a>

        </div>

    </div>


    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <a href="/" class="brand">

            <img
                src="{{ asset('images/logo-derap-serayu.png') }}"
                alt="Derap Serayu"
            >

            <div class="brand-text">

                <strong>Derap Serayu</strong>

                <span>
                    Media Informasi Banjarnegara
                </span>

            </div>

        </a>


        <div class="nav-menu">

            <a href="/">Beranda</a>
            <a href="#">Berita</a>
            <a href="#">Cerita</a>
            <a href="#">Jelajah</a>

        </div>


        <div style="display:flex; align-items:center; gap:12px;">

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Cari..."
                >

            </div>

            <button class="menu-btn">
                Menu
            </button>

        </div>

    </nav>


    <!-- ================= MAIN ================= -->

    <main class="main">

        <!-- LEFT -->

        <section class="left-content">

            <div class="eyebrow">
                VERIFIKASI AKUN
            </div>

            <h1>
                Cek kode<br>
                <span>verifikasi.</span>
            </h1>

            <p>
                Kami telah mengirimkan kode verifikasi ke email
                yang terhubung dengan akun Derap Serayu.
                Masukkan kode tersebut untuk melanjutkan
                proses pengaturan ulang kata sandi.
            </p>

            <div class="quote">

                <p>
                    “Keamanan akunmu adalah bagian dari
                    perjalananmu bersama Derap Serayu.”
                </p>

            </div>

        </section>


        <!-- CARD -->

        <section class="card">

            <div class="card-label">
                RESET PASSWORD
            </div>

            <h2>
                Verifikasi kode
            </h2>

            <p class="card-description">
                Masukkan 6 digit kode yang telah dikirimkan
                ke alamat email berikut.
            </p>


            <!-- STEP -->

            <div class="steps">

                <div class="step done">

                    <div class="step-number">
                        <i class="fa-solid fa-check"></i>
                    </div>

                    <span class="step-text">
                        Email
                    </span>

                </div>


                <div class="step-line"></div>


                <div class="step active">

                    <div class="step-number">
                        02
                    </div>

                    <span class="step-text">
                        Verifikasi
                    </span>

                </div>


                <div class="step-line"></div>


                <div class="step inactive">

                    <div class="step-number">
                        03
                    </div>

                    <span class="step-text">
                        Password
                    </span>

                </div>

            </div>


            <!-- EMAIL -->

            <div class="email-box">

                <div class="email-icon">

                    <i class="fa-regular fa-envelope"></i>

                </div>

                <div class="email-content">

                    <small>
                        Kode dikirim ke
                    </small>

                    <strong>
                        annisa******@gmail.com
                    </strong>

                </div>

            </div>


            <!-- OTP -->

            <div class="otp-label">
                Masukkan kode 6 digit
            </div>

            <div class="otp-container">

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

            <div class="timer">

                Kode berlaku selama
                <span id="countdown">
                    02:00
                </span>

            </div>


            <!-- RESEND -->

            <div class="resend">

                Belum menerima kode?

                <button type="button" onclick="resendCode()">
                    Kirim ulang
                </button>

            </div>


            <!-- BUTTON -->

            <button
                type="button"
                class="submit-btn"
                onclick="verifyCode()"
            >
                Verifikasi Kode
                <i
                    class="fa-solid fa-arrow-right"
                    style="margin-left:7px;"
                ></i>
            </button>


            <!-- BACK -->

            <a
                href="{{ route('password.request') }}"
                class="back-link"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Kembali ke halaman lupa password

            </a>


            <!-- SECURITY -->

            <div class="security-note">

                <i class="fa-solid fa-shield-halved"></i>

                <p>
                    Jangan bagikan kode verifikasi kepada siapa pun.
                    Tim Derap Serayu tidak akan pernah meminta kode
                    OTP melalui telepon atau pesan pribadi.
                </p>

            </div>

        </section>

    </main>


    <!-- ================= SCRIPT ================= -->

    <script>

        const otpInputs =
            document.querySelectorAll('.otp-input');


        /* AUTO NEXT */

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


            /* BACKSPACE */

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


        /* PASTE OTP */

        otpInputs[0].addEventListener('paste', function (e) {

            e.preventDefault();

            const pastedData =
                e.clipboardData
                    .getData('text')
                    .replace(/[^0-9]/g, '')
                    .slice(0, 6);

            pastedData.split('').forEach((number, index) => {

                if (otpInputs[index]) {
                    otpInputs[index].value = number;
                }

            });

            if (pastedData.length > 0) {
                otpInputs[
                    Math.min(
                        pastedData.length,
                        otpInputs.length
                    ) - 1
                ].focus();
            }

        });


        /* COUNTDOWN */

        let timeLeft = 120;

        const countdown =
            document.getElementById('countdown');


        const timer = setInterval(() => {

            const minutes =
                Math.floor(timeLeft / 60);

            const seconds =
                timeLeft % 60;

            countdown.textContent =
                String(minutes).padStart(2, '0')
                + ':' +
                String(seconds).padStart(2, '0');


            if (timeLeft <= 0) {

                clearInterval(timer);

                countdown.textContent =
                    '00:00';

            }

            timeLeft--;

        }, 1000);


        /* RESEND */

        function resendCode() {

            alert(
                'Kode verifikasi baru telah dikirim. (Demo)'
            );

        }


        /* VERIFY */

        function verifyCode() {

            let code = '';

            otpInputs.forEach(input => {
                code += input.value;
            });


            if (code.length !== 6) {

                alert(
                    'Silakan masukkan kode verifikasi 6 digit.'
                );

                return;
            }


            /*
             * Sementara diarahkan ke halaman
             * reset password.
             */

            window.location.href =
                "{{ route('password.reset.form') }}";

        }

    </script>

</body>
</html>