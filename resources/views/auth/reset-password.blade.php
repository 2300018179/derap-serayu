<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Kata Sandi | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            background:
                linear-gradient(90deg, rgba(3, 48, 68, .3), rgba(3, 48, 68, .12)),
                url('{{ $siteSettings['reset_password_bg_image_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($siteSettings['reset_password_bg_image_path']) : asset('images/bg-kawahsikidang-login.jpg') }}') center / cover no-repeat fixed;
            overflow-x: hidden;
        }

        .reset-layout {
            min-height: 100vh;
            padding: 56px 7%;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(360px, 460px);
            align-items: center;
            gap: clamp(40px, 8vw, 100px);
            position: relative;
            isolation: isolate;
        }

        .reset-layout::before,
        .reset-layout::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(104, 217, 245, .24);
            border-radius: 50%;
            z-index: -1;
            pointer-events: none;
        }

        .reset-layout::before {
            width: 360px;
            height: 360px;
            left: -180px;
            top: 10%;
        }

        .reset-layout::after {
            width: 220px;
            height: 220px;
            right: -100px;
            bottom: 4%;
        }

        .reset-intro {
            max-width: 590px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 20px;
            color: #68d9f5;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .eyebrow::before {
            content: "";
            width: 30px;
            height: 1px;
            background: currentColor;
        }

        .reset-intro h1 {
            margin: 0 0 22px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(42px, 5vw, 67px);
            line-height: 1.05;
        }

        .reset-intro h1 span {
            color: #68d9f5;
        }

        .reset-intro p {
            max-width: 520px;
            color: rgba(255, 255, 255, .82);
            font-size: 15px;
            line-height: 1.8;
        }

        .reset-card {
            position: relative;
            overflow: hidden;
            padding: 36px 38px 30px;
            border: 1px solid rgba(255, 255, 255, .8);
            border-radius: 28px;
            color: #193847;
            background: rgba(249, 253, 255, .94);
            box-shadow: 0 35px 70px rgba(0, 38, 57, .28);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .logo {
            display: inline-flex;
            align-items: center;
            margin-bottom: 22px;
        }

        .logo img {
            display: block;
            width: 165px;
            height: auto;
        }

        .reset-card h2 {
            margin: 0 0 10px;
            color: #08add5;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
        }

        .card-description {
            margin: 0 0 22px;
            color: #71838d;
            font-size: 13px;
            line-height: 1.7;
        }

        .errors {
            margin-bottom: 18px;
            color: #a33e50;
            font-size: 13px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 17px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #31505e;
            font-size: 12px;
            font-weight: 700;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            top: 50%;
            left: 15px;
            color: #91a5ae;
            font-size: 14px;
            transform: translateY(-50%);
        }

        input {
            width: 100%;
            height: 48px;
            padding: 0 14px 0 43px;
            border: 1px solid #d8e2e6;
            border-radius: 12px;
            outline: none;
            color: #294653;
            background: #fbfdfe;
            font: inherit;
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus {
            border-color: #08add5;
            box-shadow: 0 0 0 3px rgba(8, 173, 213, .12);
            background: #fff;
        }

        .submit-btn {
            display: flex;
            width: 100%;
            min-height: 48px;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 6px;
            border: 0;
            border-radius: 25px;
            color: #fff;
            background: linear-gradient(100deg, #08a8d0, #08b8df);
            box-shadow: 0 10px 25px rgba(8, 173, 213, .25);
            cursor: pointer;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            transition: transform .2s, box-shadow .2s;
        }

        .submit-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 26px rgba(8, 173, 213, .3);
        }

        .back-login {
            display: flex;
            justify-content: center;
            gap: 7px;
            margin-top: 19px;
            color: #71838d;
            font-size: 12px;
        }

        .back-login a {
            color: #08add5;
            font-weight: 700;
            text-decoration: none;
        }

        .back-login a:hover {
            color: #063f60;
        }

        @media (max-width: 900px) {
            .reset-layout {
                grid-template-columns: 1fr;
                gap: 34px;
                justify-items: center;
                padding: 48px 22px;
            }

            .reset-intro {
                width: min(100%, 560px);
            }

            .reset-card {
                width: min(100%, 460px);
            }
        }

        @media (max-width: 520px) {
            .reset-layout {
                padding: 32px 16px;
            }

            .reset-intro h1 {
                font-size: 42px;
            }

            .reset-intro p {
                font-size: 13px;
            }

            .reset-card {
                padding: 28px 22px 24px;
                border-radius: 22px;
            }

            .reset-card h2 {
                font-size: 26px;
            }
        }
    </style>
    @include('partials.site-theme-styles')
</head>
<body class="auth-page">
    <main class="reset-layout">
        <section class="reset-intro">
            <div class="eyebrow">PEMULIHAN AKUN</div>
            <h1>Atur ulang<br><span>kata sandi.</span></h1>
            <p>Buat kata sandi baru untuk melanjutkan membaca dan berbagi cerita di Derap Serayu.</p>
        </section>

        <section class="reset-card">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ $siteLogoUrl }}" alt="{{ $siteSettings['site_name'] }}">
            </a>
            <h2>Kata sandi baru</h2>
            <p class="card-description">Gunakan kata sandi yang kuat dan belum pernah dipakai sebelumnya.</p>

            @if($errors->any())
                <div class="errors" role="alert">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">Email akun</label>
                    <div class="input-wrap">
                        <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                        <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required autocomplete="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Kata sandi baru</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock" aria-hidden="true"></i>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Ulangi kata sandi baru</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock" aria-hidden="true"></i>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Simpan kata sandi baru
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </button>
            </form>

            <div class="back-login">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                <a href="{{ route('login') }}">Kembali ke Login</a>
            </div>
        </section>
    </main>
</body>
</html>
