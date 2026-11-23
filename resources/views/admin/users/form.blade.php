<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $isEditing ? 'Ubah Pengguna' : 'Tambah Pengguna' }} | {{ $siteSettings['site_name'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root { --navy: #073b59; --cyan: #08a4c5; --page: #f4fbfe; --text: #123d5b; --muted: #7995aa; --border: #dceef6; }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--text); background: var(--page); font: 13px 'DM Sans', sans-serif; }
        a { color: inherit; text-decoration: none; }
        .layout { min-height: 100vh; }
        .main { min-height: 100vh; margin-left: 260px; }
        .content { max-width: 1050px; margin: auto; padding: 30px 32px 45px; }
        .heading { margin-bottom: 22px; }
        .heading h1 { margin: 0; color: var(--navy); font: 700 28px 'Playfair Display', serif; }
        .heading p { margin: 7px 0 0; color: var(--muted); }
        .panel { padding: 24px; background: white; border: 1px solid var(--border); border-radius: 16px; box-shadow: 0 8px 28px rgba(20,88,120,.05); }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 17px; }
        .field { display: grid; align-content: start; gap: 7px; }
        .field.full { grid-column: 1 / -1; }
        .field label { color: var(--navy); font-size: 11px; font-weight: 800; }
        .field input, .field select, .field textarea { width: 100%; min-height: 42px; padding: 10px 12px; color: var(--text); background: #fbfdfe; border: 1px solid var(--border); border-radius: 9px; font: inherit; }
        .field textarea { min-height: 100px; resize: vertical; }
        .field input:focus, .field select:focus, .field textarea:focus { outline: 2px solid rgba(8,164,197,.2); border-color: var(--cyan); }
        .help { color: var(--muted); font-size: 10px; line-height: 1.5; }
        .errors { margin-bottom: 18px; padding: 13px 16px; color: #a53333; background: #fff1f1; border-radius: 10px; font-size: 12px; }
        .actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 22px; }
        .button { display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 40px; padding: 10px 15px; color: white; background: linear-gradient(110deg, #0da8c9, #078bb2); border: 0; border-radius: 10px; cursor: pointer; font-size: 12px; font-weight: 800; }
        .button.secondary { color: var(--navy); background: #edf5f8; }
        @media(max-width: 768px) { .main { margin-left: 0; } .content { padding: 22px 15px 35px; } }
        @media(max-width: 520px) { .form-grid { grid-template-columns: 1fr; } .field.full { grid-column: auto; } .panel { padding: 17px; } .actions { flex-direction: column-reverse; } .button { width: 100%; } .heading h1 { font-size: 24px; } }
    </style>
    @include('editor.partials.sidebar-styles')
    @include('partials.site-theme-styles')
    @include('editor.partials.topbar-styles')
</head>
<body>
<div class="layout">
    @include('editor.partials.sidebar')
    <main class="main">
        @include('editor.partials.topbar', ['pageTitle' => $isEditing ? 'Ubah Pengguna' : 'Tambah Pengguna'])
        <div class="content">
            <section class="heading">
                <h1>{{ $isEditing ? 'Ubah Akun Pengguna' : 'Tambah Pengguna' }}</h1>
                <p>{{ $isEditing ? 'Perbarui profil, peran, atau kata sandi akun.' : 'Buat akun baru dan tentukan aksesnya.' }}</p>
            </section>
            <section class="panel">
                @if($errors->any())
                    <div class="errors" role="alert">
                        <strong>Periksa kembali data akun:</strong>
                        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
                <form method="POST"
                      action="{{ $isEditing ? route('admin.users.update', $user) : route('admin.users.store') }}">
                    @csrf
                    @if($isEditing) @method('PUT') @endif
                    <div class="form-grid">
                        <div class="field">
                            <label for="name">Nama lengkap *</label>
                            <input id="name" name="name" value="{{ old('name', $user->name) }}" maxlength="255" required>
                        </div>
                        <div class="field">
                            <label for="username">Username *</label>
                            <input id="username" name="username" value="{{ old('username', $user->username) }}"
                                   minlength="3" maxlength="30" autocomplete="username" required>
                        </div>
                        <div class="field">
                            <label for="email">Email *</label>
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                                   maxlength="255" autocomplete="email" required>
                        </div>
                        <div class="field">
                            <label for="role">Peran *</label>
                            <select id="role" name="role" required>
                                @foreach($roleLabels as $role => $label)
                                    <option value="{{ $role }}" @selected(old('role', $user->role ?: 'reader') === $role)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @if($isEditing && $user->is(auth()->user()))
                                <span class="help">Peran akun admin yang sedang digunakan tidak dapat diubah.</span>
                            @endif
                        </div>
                        <div class="field">
                            <label for="pen_name">Nama pena</label>
                            <input id="pen_name" name="pen_name" value="{{ old('pen_name', $user->pen_name) }}" maxlength="150">
                        </div>
                        <div class="field">
                            <label for="whatsapp">WhatsApp</label>
                            <input id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}" maxlength="30">
                        </div>
                        <div class="field full">
                            <label for="bio">Bio</label>
                            <textarea id="bio" name="bio" maxlength="1000">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                        <div class="field">
                            <label for="password">{{ $isEditing ? 'Kata sandi baru' : 'Kata sandi *' }}</label>
                            <input id="password" type="password" name="password"
                                   autocomplete="{{ $isEditing ? 'new-password' : 'new-password' }}"
                                   {{ $isEditing ? '' : 'required' }}>
                            <span class="help">{{ $isEditing ? 'Kosongkan jika tidak ingin mengganti kata sandi.' : 'Minimal 8 karakter.' }}</span>
                        </div>
                        <div class="field">
                            <label for="password_confirmation">Konfirmasi kata sandi {{ $isEditing ? '' : '*' }}</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   autocomplete="new-password" {{ $isEditing ? '' : 'required' }}>
                        </div>
                    </div>
                    <div class="actions">
                        <a class="button secondary" href="{{ route('admin.users.index') }}">Batal</a>
                        <button class="button" type="submit">
                            <i class="fa-solid fa-floppy-disk"></i>
                            {{ $isEditing ? 'Simpan Perubahan' : 'Buat Akun' }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </main>
</div>
</body>
</html>
