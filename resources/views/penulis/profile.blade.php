<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Penulis | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --navy: #063b56;
            --teal: #009fbe;
            --text: #12456e;
            --muted: #7091ac;
            --border: #d9effb;
            --page: #f0f9fd;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            background: var(--page);
            color: var(--text);
        }

        button, input { font: inherit; }
        a { color: inherit; text-decoration: none; }
        button { cursor: pointer; }
        .app { min-height: 100vh; }

        .content { padding: 5px 13px 28px; }

        .pf-hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            min-height: 190px;
            padding: 27px 30px;
            border-radius: 14px;
            color: white;
            background:
                linear-gradient(90deg, rgba(3, 54, 78, .95), rgba(0, 120, 150, .75)),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center / cover;
        }

        .pf-hero h1 {
            margin: 0 0 10px;
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            line-height: 1.2;
        }

        .pf-hero h1 span { color: #7be3f5; }

        .pf-hero p {
            max-width: 560px;
            margin: 0;
            font-size: 14px;
            line-height: 1.7;
            color: #d6eef7;
        }

        .pf-eyebrow {
            display: inline-block;
            margin-bottom: 12px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.4px;
            color: #7be3f5;
        }

        .pf-hero-icon {
            display: grid;
            place-items: center;
            width: 92px;
            height: 92px;
            flex-shrink: 0;
            border-radius: 50%;
            font-size: 38px;
            background: rgba(255, 255, 255, .14);
        }

        .pf-layout {
            display: grid;
            grid-template-columns: 320px minmax(0, 1fr);
            gap: 18px;
            margin-top: 18px;
            align-items: start;
        }

        .pf-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(31, 104, 152, .05);
        }

        .pf-summary {
            padding: 28px 22px;
            text-align: center;
        }

        .pf-avatar {
            display: grid;
            place-items: center;
            width: 92px;
            height: 92px;
            margin: 0 auto 14px;
            border-radius: 50%;
            color: white;
            font-size: 38px;
            font-weight: 800;
            background: linear-gradient(145deg, #23d9bb, #00a5a5);
        }

        .pf-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            color: #0a8f7c;
            background: #e4f8f3;
        }

        .pf-summary h2 {
            margin: 12px 0 4px;
            font-size: 20px;
        }

        .pf-username {
            margin: 0;
            font-size: 13px;
            color: var(--muted);
        }

        .pf-caption {
            margin: 16px 0 20px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
            font-size: 13px;
            line-height: 1.6;
            color: var(--muted);
        }

        .pf-actions { display: grid; gap: 10px; }
        .pf-actions form { margin: 0; }

        .pf-button {
            width: 100%;
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: 1px solid transparent;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
        }

        .pf-button-primary { color: white; background: var(--navy); }
        .pf-button-secondary { color: #c0364a; background: #fff1f2; border-color: #ffd5da; }

        .pf-info { padding: 24px 26px; }

        .pf-info-title {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px;
        }

        .pf-info-title h3 { margin: 0; font-size: 18px; }
        .pf-info-title span { font-size: 12px; color: var(--muted); }

        .pf-detail {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #eaf4fa;
        }

        .pf-detail:last-child { border-bottom: 0; }

        .pf-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            font-weight: 700;
            color: var(--muted);
        }

        .pf-label i { width: 18px; text-align: center; color: var(--teal); }
        .pf-value { font-size: 14px; font-weight: 700; text-align: right; overflow-wrap: anywhere; }

        .pf-note {
            display: flex;
            gap: 14px;
            margin-top: 18px;
            padding: 18px 22px;
            border-radius: 14px;
            background: #e8f6fc;
            border: 1px solid var(--border);
        }

        .pf-note > i { margin-top: 3px; font-size: 20px; color: var(--teal); }
        .pf-note strong { display: block; margin-bottom: 4px; font-size: 14px; }
        .pf-note p { margin: 0; font-size: 13px; line-height: 1.6; color: var(--muted); }

        @media (max-width: 900px) {
            .pf-layout { grid-template-columns: 1fr; }
        }

        @media (max-width: 700px) {
            .content { padding: 10px; }
            .pf-hero { padding: 22px 20px; }
            .pf-hero h1 { font-size: 26px; }
            .pf-hero-icon { display: none; }
            .pf-detail { flex-direction: column; align-items: flex-start; gap: 6px; }
            .pf-value { text-align: left; }
        }
    </style>
    @include('penulis.partials.shell-style')
</head>

<body>
<div class="app">

    @include('penulis.partials.sidebar')

    <main class="main">

        @include('penulis.partials.topbar')

        <div class="content">
            <section class="pf-hero">
                <div>
                    <span class="pf-eyebrow">{{ $profile['eyebrow'] }}</span>
                    <h1>Selamat datang,<br><span>{{ $writer->name }}.</span></h1>
                    <p>{{ $profile['welcomeText'] }}</p>
                </div>

                <div class="pf-hero-icon" aria-hidden="true">
                    <i class="fa-solid {{ $profile['heroIcon'] }}"></i>
                </div>
            </section>

            <section class="pf-layout">
                <aside class="pf-card pf-summary">
                    <div class="pf-avatar">{{ mb_strtoupper(mb_substr($writer->name ?? 'P', 0, 1)) }}</div>

                    <span class="pf-badge">
                        <i class="fa-solid {{ $profile['badgeIcon'] }}"></i>
                        Akun {{ $profile['roleLabel'] }}
                    </span>

                    <h2>{{ $writer->name }}</h2>
                    <p class="pf-username">
                        {{ $writer->username ? '@'.$writer->username : 'Username belum diatur' }}
                    </p>

                    <p class="pf-caption">{{ $profile['summaryCaption'] }}</p>

                    <div class="pf-actions">
                        <a href="{{ $profile['primaryUrl'] }}" class="pf-button pf-button-primary">
                            <i class="{{ $profile['primaryIcon'] }}"></i>
                            {{ $profile['primaryLabel'] }}
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="pf-button pf-button-secondary">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Keluar dari Akun
                            </button>
                        </form>
                    </div>
                </aside>

                <div>
                    <section class="pf-card pf-info" id="informasi-profil">
                        <div class="pf-info-title">
                            <h3>Informasi Akun</h3>
                            <span>Detail profil penulis</span>
                        </div>

                        <div class="pf-detail">
                            <span class="pf-label"><i class="fa-regular fa-user"></i> Nama Lengkap</span>
                            <span class="pf-value">{{ $writer->name }}</span>
                        </div>

                        <div class="pf-detail">
                            <span class="pf-label"><i class="fa-solid fa-at"></i> Username</span>
                            <span class="pf-value">{{ $writer->username ?: 'Belum diatur' }}</span>
                        </div>

                        <div class="pf-detail">
                            <span class="pf-label"><i class="fa-regular fa-envelope"></i> Alamat Email</span>
                            <span class="pf-value">{{ $writer->email }}</span>
                        </div>

                        @if ($writer->pen_name)
                            <div class="pf-detail">
                                <span class="pf-label"><i class="fa-solid fa-signature"></i> Nama Pena</span>
                                <span class="pf-value">{{ $writer->pen_name }}</span>
                            </div>
                        @endif

                        <div class="pf-detail">
                            <span class="pf-label"><i class="{{ $profile['statIcon'] }}"></i> {{ $profile['statLabel'] }}</span>
                            <span class="pf-value">{{ $profile['statValue'] }}</span>
                        </div>
                    </section>

                    <div class="pf-note">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <strong>Informasi akun kamu</strong>
                            <p>Informasi ini ditampilkan untuk membantu kamu mengenali akun yang sedang digunakan. Jaga kerahasiaan akses akunmu.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

@include('penulis.partials.shell-script')
</body>
</html>
