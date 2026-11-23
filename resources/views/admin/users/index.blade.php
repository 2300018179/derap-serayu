<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Pengguna | {{ $siteSettings['site_name'] }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --navy: #073b59;
            --cyan: #08a4c5;
            --page: #f4fbfe;
            --text: #123d5b;
            --muted: #7995aa;
            --border: #dceef6;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            color: var(--text);
            background: var(--page);
            font: 13px 'DM Sans', sans-serif;
        }
        a { color: inherit; text-decoration: none; }
        button, input, select { font: inherit; }
        .layout { min-height: 100vh; }
        .main { min-height: 100vh; margin-left: 260px; }
        .content { max-width: 1500px; margin: auto; padding: 30px 32px 45px; }
        .heading { display: flex; justify-content: space-between; align-items: flex-end; gap: 18px; margin-bottom: 22px; }
        .heading h1 { margin: 0; color: var(--navy); font: 700 28px 'Playfair Display', serif; }
        .heading p { margin: 7px 0 0; color: var(--muted); }
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 40px;
            padding: 10px 15px;
            color: white;
            background: linear-gradient(110deg, #0da8c9, #078bb2);
            border: 0;
            border-radius: 10px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 800;
        }
        .stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-bottom: 18px; }
        .stat, .panel { background: white; border: 1px solid var(--border); border-radius: 15px; box-shadow: 0 8px 28px rgba(20,88,120,.05); }
        .stat { padding: 17px 19px; }
        .stat span { color: var(--muted); font-size: 11px; }
        .stat strong { display: block; margin-top: 6px; color: var(--navy); font-size: 24px; }
        .panel { padding: 20px; }
        .notice { margin-bottom: 16px; padding: 12px 15px; border-radius: 10px; font-size: 12px; }
        .notice-success { color: #17653d; background: #e8f7ef; }
        .notice-error { color: #a53333; background: #fff1f1; }
        .filters { display: grid; grid-template-columns: minmax(200px, 1fr) 190px 170px auto; gap: 10px; margin-bottom: 18px; }
        .filters input, .filters select { width: 100%; min-height: 40px; padding: 9px 11px; color: var(--text); background: white; border: 1px solid var(--border); border-radius: 9px; }
        .button-secondary { color: var(--navy); background: #edf5f8; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 760px; }
        th { padding: 12px 10px; color: #7893a5; background: #f5fafc; font-size: 10px; letter-spacing: .5px; text-align: left; }
        td { padding: 13px 10px; border-bottom: 1px solid #edf3f6; vertical-align: middle; }
        .person strong, .person span { display: block; }
        .person strong { color: var(--navy); font-size: 12px; }
        .person span { margin-top: 4px; color: var(--muted); font-size: 10px; }
        .badge { display: inline-flex; padding: 5px 9px; color: #086d8c; background: #e5f8fd; border-radius: 20px; font-size: 10px; font-weight: 800; }
        .badge-inactive { color: #9d4640; background: #fff0ef; }
        .actions { display: flex; align-items: center; gap: 8px; }
        .action-link, .status-button { padding: 7px 9px; color: #087f9d; background: #eef9fc; border: 0; border-radius: 8px; cursor: pointer; font-size: 10px; font-weight: 800; }
        .status-button.deactivate { color: #a34741; background: #fff2f1; }
        .status-button.delete { color: #7b2d2d; background: #fde8e8; }
        .status-button:disabled { color: #8599a5; background: #f1f4f6; cursor: not-allowed; }
        .self-note { color: var(--muted); font-size: 10px; }
        .empty { padding: 35px 10px; color: var(--muted); text-align: center; }
        .pagination { margin-top: 17px; }
        @media(max-width: 1050px) {
            .filters { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media(max-width: 768px) {
            .main { margin-left: 0; }
            .content { padding: 22px 15px 35px; }
            .heading { align-items: flex-start; flex-direction: column; }
            .stats { gap: 9px; }
            .stat { padding: 13px; }
            .stat strong { font-size: 20px; }
        }
        @media(max-width: 480px) {
            .filters { grid-template-columns: 1fr; }
            .heading h1 { font-size: 24px; }
            .panel { padding: 13px; }
        }
    </style>
    @include('editor.partials.sidebar-styles')
    @include('partials.site-theme-styles')
    @include('editor.partials.topbar-styles')
</head>
<body>
<div class="layout">
    @include('editor.partials.sidebar')

    <main class="main">
        @include('editor.partials.topbar', ['pageTitle' => 'Kelola Pengguna'])

        <div class="content">
            <section class="heading">
                <div>
                    <h1>Kelola Pengguna</h1>
                    <p>Buat akun, ubah peran, dan nonaktifkan akses tanpa menghapus artikel.</p>
                </div>
                <a class="button" href="{{ route('admin.users.create') }}">
                    <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
                </a>
            </section>

            @if(session('success'))
                <div class="notice notice-success" role="status">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="notice notice-error" role="alert">{{ session('error') }}</div>
            @endif

            <section class="stats">
                <div class="stat"><span>Total Akun</span><strong>{{ number_format($totalUsers) }}</strong></div>
                <div class="stat"><span>Akun Aktif</span><strong>{{ number_format($activeUsers) }}</strong></div>
                <div class="stat"><span>Akun Nonaktif</span><strong>{{ number_format($inactiveUsers) }}</strong></div>
            </section>

            <section class="panel">
                <form class="filters" method="GET" action="{{ route('admin.users.index') }}">
                    <input type="search" name="search" value="{{ $search }}" maxlength="100"
                           placeholder="Cari nama, username, atau email" aria-label="Cari pengguna">
                    <select name="role" aria-label="Filter peran">
                        <option value="">Semua Peran</option>
                        @foreach($roleLabels as $role => $label)
                            <option value="{{ $role }}" @selected($selectedRole === $role)>{{ $label }}</option>
                        @endforeach
                    </select>
                    <select name="status" aria-label="Filter status akun">
                        <option value="">Semua Status</option>
                        <option value="active" @selected($selectedStatus === 'active')>Aktif</option>
                        <option value="inactive" @selected($selectedStatus === 'inactive')>Nonaktif</option>
                    </select>
                    <button class="button" type="submit"><i class="fa-solid fa-filter"></i> Terapkan</button>
                </form>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>PENGGUNA</th>
                                <th>USERNAME</th>
                                <th>PERAN</th>
                                <th>STATUS</th>
                                <th>TERDAFTAR</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="person">
                                        <strong>{{ $user->name }}</strong>
                                        <span>{{ $user->email }}</span>
                                    </td>
                                    <td>{{ $user->username ?: '-' }}</td>
                                    <td><span class="badge">{{ $roleLabels[$user->role] ?? $user->role }}</span></td>
                                    <td>
                                        <span class="badge {{ $user->is_active ? '' : 'badge-inactive' }}">
                                            {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at?->format('d M Y') ?? '-' }}</td>
                                    <td>
                                        <div class="actions">
                                            <a class="action-link" href="{{ route('admin.users.edit', $user) }}">
                                                <i class="fa-solid fa-pen"></i> Ubah
                                            </a>
                                            @if($user->is(auth()->user()))
                                                <span class="self-note">Akun Anda</span>
                                            @else
                                                <form method="POST" action="{{ route('admin.users.status', $user) }}"
                                                      onsubmit="return confirm('{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan kembali' }} akun ini?')">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="status-button {{ $user->is_active ? 'deactivate' : '' }}"
                                                            type="submit">
                                                        {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                                      onsubmit="return confirm('Hapus akun {{ addslashes($user->name) }}? Tindakan ini tidak dapat dibatalkan.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="status-button delete" type="submit">
                                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td class="empty" colspan="6">Tidak ada pengguna yang cocok dengan filter.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="pagination">{{ $users->links() }}</div>
            </section>
        </div>
    </main>
</div>
</body>
</html>
