<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lupa Kata Sandi - Derap Serayu</title>

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
                    rgba(3, 48, 68, .20),
                    rgba(3, 48, 68, .06)
                ),
                url("{{ asset('images/bg-kawahsikidang-login.jpg') }}");
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
            letter-spacing: .2px;
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
            padding: 0 6%;
            justify-content: space-between;
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
            padding: 70px 7%;
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

        /* ================= LEFT ================= */

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

        .left-content p {
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
            background: rgba(249,253,255,.93);
            border: 1px solid rgba(255,255,255,.80);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 28px;
            padding: 38px 40px 31px;
            color: #193847;
            box-shadow: 
                0 75px 70px rgba(0,38,57,.28),
                inset 0 1px 0px rgba(255,255,255,.90);
            overflow: hidden;
        }

        .card h2 {
            font-family: 'Playfair Display', serif;
            color: #08add5;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .card-description {
            color: #71838d;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        /* ================= FORM ================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #31505e;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #91a5ae;
            font-size: 14px;
        }

        .input-wrap input {
            width: 100%;
            height: 48px;
            border: 1px solid #d8e2e6;
            border-radius: 12px;
            padding: 0 15px 0 43px;
            outline: none;
            font-family: inherit;
            font-size: 13px;
            color: #294653;
            background: #fbfdfe;
            transition: .2s;
        }

        .input-wrap input:focus {
            border-color: #08add5;
            box-shadow: 0 0 0 3px rgba(8,173,213,.10);
            background: #fff;
        }

        .input-wrap input::placeholder {
            color: #a5b3b9;
        }

        /* ================= BUTTON ================= */

        .submit-btn {
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
            transition: .25s;
            margin-top: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            box-shadow: 0 10px 25px rgba(8,173,213,.25);
        }

        .submit-btn:hover {
            background: #08add5;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(8,173,213,.20);
        }

        /* ================= BACK ================= */

        .back-login {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            margin-top: 20px;
            font-size: 12px;
            color: #71838d;
        }

        .back-login a {
            color: #08add5;
            text-decoration: none;
            font-weight: 700;
        }

        .back-login a:hover {
            color: #063f60;
        }

        /* ================= INFO ================= */

        .security-note {
            margin-top: 25px;
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
                padding: 28px 22px;
                border-radius: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- MAIN -->
    <main class="main">

        <!-- LEFT CONTENT -->
        <section class="left-content">

            <div class="eyebrow">
                PEMULIHAN AKUN
            </div>

            <h1>
                Lupa kata<br>
                <span>sandi?</span>
            </h1>

            <p>
                Tidak perlu khawatir. Masukkan email yang terhubung
                dengan akun Derap Serayu dan kami akan membantu
                mengembalikan akses ke akunmu.
            </p>

            <div class="quote">

                <p>
                    “Satu langkah kecil untuk kembali
                    menikmati cerita Banjarnegara.”
                </p>

            </div>

        </section>


        <!-- FORM CARD -->
        <section class="card">

            <a href="/" class="logo">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Derap Serayu"
                >

            </a>

            <h2>
                Pulihkan akunmu
            </h2>

            <p class="card-description">
                Masukkan email yang kamu gunakan saat mendaftar.
                Jika email terdaftar, kami akan mengirimkan tautan untuk
                mengatur ulang kata sandi.
            </p>

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

            <form action="{{ route('password.email') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="input-wrap">

                        <i class="fa-regular fa-envelope"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email kamu"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>

                </div>


                <button type="submit" class="submit-btn">
                    Kirim Tautan Reset
                    <i class="fa-solid fa-arrow-right"
                       style="margin-left:7px;"></i>
                </button>

            </form>


            <div class="back-login">

                <i class="fa-solid fa-arrow-left"></i>

                <a href="{{ route('login') }}">
                    Kembali ke Login
                </a>

            </div>


            <div class="security-note">

                <i class="fa-solid fa-shield-halved"></i>

                <p>
                    Tautan reset hanya berlaku dalam waktu terbatas. Jangan bagikan tautan
                    yang kamu terima melalui email kepada orang lain.
                </p>

            </div>

        </section>

    </main>

</body>
</html>