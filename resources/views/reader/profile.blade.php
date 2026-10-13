<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Pembaca | Derap Serayu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{box-sizing:border-box}body{margin:0;background:#f0f9fd;color:#12456e;font:15px 'DM Sans',sans-serif}
        header{padding:18px max(24px,calc((100% - 1000px)/2));background:#063b56;color:white}header a{color:white;text-decoration:none;font-weight:800}
        main{max-width:1000px;margin:40px auto;padding:0 22px}h1{font:700 36px 'Playfair Display',serif}
        .intro{color:#64849b}.profile-card{display:flex;align-items:center;gap:18px;margin:24px 0;padding:26px;border:1px solid #d9effb;border-radius:16px;background:white}
        .avatar{display:grid;width:64px;height:64px;flex-shrink:0;place-items:center;border-radius:50%;background:#e8f8fc;color:#078fb0;font-size:24px}
        .details{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px;width:100%}.detail{padding:15px;border-radius:10px;background:#f5fbfd}.label{display:block;color:#7091ac;font-size:12px}.value{display:block;margin-top:5px;font-weight:700;overflow-wrap:anywhere}
        .saved-link{display:inline-flex;align-items:center;gap:10px;margin-top:6px;padding:13px 17px;border-radius:10px;background:#08add5;color:white;text-decoration:none;font-weight:700}.saved-link:hover{background:#078fb0}
        .back-link{display:inline-block;margin-top:24px;color:#078fb0;text-decoration:none;font-weight:700}
        .logout{display:inline-flex;margin:24px 0 0 12px}button{padding:13px 17px;border:1px solid #d9effb;border-radius:10px;background:white;color:#12456e;font:700 14px 'DM Sans',sans-serif;cursor:pointer}
        @media(max-width:600px){.profile-card{align-items:flex-start;flex-direction:column}.details{grid-template-columns:1fr}h1{font-size:30px}}
    </style>
</head>
<body>
<header><a href="{{ route('home') }}">Derap Serayu</a></header>
<main>
    <p class="intro">Akun pembaca</p>
    <h1>Profil Saya</h1>
    <section class="profile-card" aria-label="Informasi profil">
        <div class="avatar" aria-hidden="true">{{ mb_strtoupper(mb_substr($reader->name, 0, 1)) }}</div>
        <div class="details">
            <div class="detail"><span class="label">Nama</span><span class="value">{{ $reader->name }}</span></div>
            <div class="detail"><span class="label">Username</span><span class="value">{{ $reader->username ?: 'Belum diatur' }}</span></div>
            <div class="detail"><span class="label">Email</span><span class="value">{{ $reader->email }}</span></div>
            <div class="detail"><span class="label">Artikel tersimpan</span><span class="value">{{ $savedArticleCount }}</span></div>
        </div>
    </section>
    <a class="saved-link" href="{{ route('pembaca.saved.index') }}">
        <i class="fa-regular fa-bookmark" aria-hidden="true"></i>
        Lihat artikel tersimpan
    </a>
    <a class="back-link" href="{{ route('home') }}">← Kembali ke beranda</a>
    <form class="logout" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Keluar</button>
    </form>
</main>
</body>
</html>
