<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Kata Sandi | Derap Serayu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 24px;
            color: #153b52;
            background: #eff7fb;
            font-family: 'DM Sans', sans-serif;
        }
        main {
            width: min(100%, 440px);
            padding: 36px;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 18px 50px rgba(6, 63, 96, .12);
        }
        h1 { margin: 0 0 8px; font-size: 25px; }
        p { margin: 0 0 24px; color: #688091; line-height: 1.6; }
        label { display: block; margin: 16px 0 7px; font-size: 13px; font-weight: 700; }
        input {
            width: 100%;
            height: 46px;
            padding: 0 12px;
            border: 1px solid #cddde6;
            border-radius: 9px;
            font: inherit;
        }
        button {
            width: 100%;
            min-height: 46px;
            margin-top: 22px;
            border: 0;
            border-radius: 9px;
            color: #fff;
            background: #067da4;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
        }
        .errors { color: #a33e50; font-size: 13px; }
        a { display: inline-block; margin-top: 18px; color: #067da4; }
    </style>
</head>
<body>
    <main>
        <h1>Atur ulang kata sandi</h1>
        <p>Buat kata sandi baru untuk akun Derap Serayu kamu.</p>

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

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required autocomplete="email">

            <label for="password">Kata sandi baru</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">

            <label for="password_confirmation">Ulangi kata sandi baru</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">

            <button type="submit">Simpan Kata Sandi Baru</button>
        </form>

        <a href="{{ route('login') }}">Kembali ke halaman masuk</a>
    </main>
</body>
</html>
