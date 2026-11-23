<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Pendaftaran</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4fbfe;
            color: #073f5e;
            margin: 0;
            padding: 30px 15px;
        }
        .container {
            max-width: 540px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(7, 63, 94, 0.08);
            border: 1px solid #dceef5;
        }
        .header {
            background: linear-gradient(135deg, #063f60, #08add5);
            padding: 30px 24px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .header p {
            margin: 6px 0 0;
            font-size: 13px;
            opacity: 0.9;
        }
        .content {
            padding: 32px 28px;
            line-height: 1.6;
        }
        .greeting {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #063f60;
        }
        .message {
            font-size: 14px;
            color: #486576;
            margin-bottom: 24px;
        }
        .otp-box {
            background: #f0faff;
            border: 2px dashed #08add5;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin: 24px 0;
        }
        .otp-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #08add5;
            margin-bottom: 8px;
        }
        .otp-code {
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 8px;
            color: #063f60;
            font-family: monospace, sans-serif;
        }
        .notice {
            font-size: 12px;
            color: #7995aa;
            margin-top: 24px;
            border-top: 1px solid #edf4f7;
            padding-top: 16px;
        }
        .footer {
            background: #fbfdfe;
            border-top: 1px solid #eef5f8;
            padding: 18px 24px;
            text-align: center;
            font-size: 11px;
            color: #8babbd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $siteSettings['site_name'] ?? 'Derap Serayu' }}</h1>
            <p>Verifikasi Akun {{ $role }}</p>
        </div>
        <div class="content">
            <div class="greeting">Halo, {{ $name }}!</div>
            <div class="message">
                Terima kasih telah mendaftar sebagai <strong>{{ $role }}</strong> di {{ $siteSettings['site_name'] ?? 'Derap Serayu' }}.
                Gunakan kode verifikasi berikut untuk menyelesaikan pendaftaran Anda:
            </div>

            <div class="otp-box">
                <div class="otp-label">Kode Verifikasi (OTP)</div>
                <div class="otp-code">{{ $otp }}</div>
            </div>

            <div class="notice">
                Kode ini hanya berlaku selama <strong>10 menit</strong>. Jangan berikan kode ini kepada siapa pun untuk keamanan akun Anda.
                Jika Anda tidak merasa mendaftar di {{ $siteSettings['site_name'] ?? 'Derap Serayu' }}, Anda dapat mengabaikan email ini.
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ $siteSettings['site_name'] ?? 'Derap Serayu' }}. Semua hak dilindungi.
        </div>
    </div>
</body>
</html>
