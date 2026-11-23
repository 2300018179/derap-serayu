@php
        $workspaceRoutePrefix = $routePrefix ?? (request()->routeIs('editor.*') ? 'editor' : 'penulis');
        $workspaceRole = auth()->user()->role;
        $workspaceRoleLabel = match ($workspaceRole) {
            'admin' => 'Administrator',
            'editor' => 'Editor',
            default => 'Penulis',
        };
        $workspaceRoleIcon = match ($workspaceRole) {
            'admin' => 'fa-shield-halved',
            'editor' => 'fa-pen-to-square',
            default => 'fa-pen-nib',
        };
        $profileRoute = match ($workspaceRole) {
            'admin' => route('admin.profile'),
            'editor' => route('editor.profile'),
            default => route('penulis.profile'),
        };
        $notifications = collect();

        foreach ($notifikasiPenulis as $artikel) {
            $notice = match ($artikel->status) {
                'rejected' => [
                    'tone' => 'notice-orange',
                    'icon' => 'fa-pen-to-square',
                    'title' => 'Artikel perlu direvisi',
                    'note' => $artikel->review_note,
                ],
                'review' => [
                    'tone' => 'notice-blue',
                    'icon' => 'fa-clock',
                    'title' => 'Artikel menunggu tinjauan',
                    'note' => null,
                ],
                'published' => [
                    'tone' => 'notice-green',
                    'icon' => 'fa-circle-check',
                    'title' => 'Artikel sudah terbit',
                    'note' => null,
                ],
                default => [
                    'tone' => 'notice-gray',
                    'icon' => 'fa-circle-info',
                    'title' => 'Status artikel diperbarui',
                    'note' => null,
                ],
            };

            $notifications->push($notice + [
                'text' => $artikel->title,
                'date' => $artikel->updated_at,
                'url' => $artikel->status === 'published'
                    ? route('articles.show', $artikel->slug)
                    : route($workspaceRoutePrefix.'.articles.edit', $artikel),
            ]);
        }

        $notificationSubtitle = 'Status terbaru artikelmu';
        $emptyTitle = 'Belum ada pembaruan';
        $emptyText = 'Status artikel dan masukan redaksi akan muncul di sini.';
        $footerLabel = 'Lihat semua artikel';
        $jumlahNotifikasi = $notifications->count();
@endphp

@if ($workspaceRole === 'admin')
    @include('editor.partials.topbar', ['pageTitle' => $pageTitle ?? 'Tulis Artikel'])
@else
<header class="topbar">
    @if ($workspaceRoutePrefix === 'editor')
        <div class="topbar-left">
            <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Buka menu">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="breadcrumb">
                <a href="{{ route('editor.dashboard') }}">Dashboard</a>
                / <strong>{{ $pageTitle ?? 'Tulis Artikel' }}</strong>
            </div>
        </div>
        <div class="topbar-right">
    @else
        <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Buka menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <form class="top-search" id="searchForm" method="GET" action="{{ route($workspaceRoutePrefix.'.articles.index') }}">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" id="searchInput" name="search" maxlength="100"
                   value="{{ $search ?? '' }}"
                   aria-label="Cari artikel"
                   placeholder="Cari judul, ringkasan, atau kategori artikel...">
            @if(! empty($validated['status']))
                <input type="hidden" name="status" value="{{ $validated['status'] }}">
            @endif
        </form>

        <div class="top-spacer"></div>
    @endif

    @if ($workspaceRoutePrefix !== 'editor')
        <div class="top-item top-dropdown">
            <button type="button"
                    class="notification-button dropdown-trigger"
                    id="notificationToggle"
                    aria-label="Buka notifikasi, {{ $jumlahNotifikasi }} pembaruan terbaru"
                    aria-expanded="false"
                    onclick="toggleTopDropdown('notificationDropdown', this)">
                <i class="fa-regular fa-bell"></i>

                @if($jumlahNotifikasi > 0)
                    <span class="notification-dot">
                        {{ $jumlahNotifikasi > 9 ? '9+' : $jumlahNotifikasi }}
                    </span>
                @endif
            </button>

            <div class="top-dropdown-menu notification-dropdown" id="notificationDropdown">
                <div class="dropdown-heading">
                    <div>
                        <strong>Notifikasi</strong>
                        <small>{{ $notificationSubtitle }}</small>
                    </div>

                    <i class="fa-regular fa-bell"></i>
                </div>

                <div class="dropdown-scroll">
                    @forelse($notifications as $notice)
                        @if($notice['url'])
                            <a href="{{ $notice['url'] }}" class="dropdown-notice">
                        @else
                            <div class="dropdown-notice">
                        @endif
                            <span class="dropdown-notice-icon {{ $notice['tone'] }}">
                                <i class="fa-solid {{ $notice['icon'] }}"></i>
                            </span>

                            <span class="dropdown-notice-text">
                                <strong>{{ $notice['title'] }}</strong>
                                <small>{{ $notice['text'] }}</small>

                                @if($notice['note'])
                                    <small class="notice-note">Catatan: {{ $notice['note'] }}</small>
                                @endif

                                @if($notice['date'])
                                    <small class="notice-date">{{ $notice['date']->format('d M Y, H:i') }}</small>
                                @endif
                            </span>
                        @if($notice['url'])
                            </a>
                        @else
                            </div>
                        @endif
                    @empty
                        <div class="dropdown-empty">
                            <i class="fa-regular fa-circle-check"></i>
                            <strong>{{ $emptyTitle }}</strong>
                            <p>{{ $emptyText }}</p>
                        </div>
                    @endforelse
                </div>

                @if($footerLabel)
                    <a href="{{ route($workspaceRoutePrefix.'.articles.index') }}" class="dropdown-footer-link">
                        {{ $footerLabel }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                @endif
            </div>
        </div>
    @endif
    @if ($workspaceRoutePrefix === 'editor')
        <div class="date-info">
            <i class="fa-regular fa-calendar"></i>
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    @else
        <div class="top-item weather" id="weatherWidget">
            <i class="fa-solid fa-cloud-sun sun" id="weatherIcon"></i>

            <div>
                <strong id="weatherTemperature">Memuat...</strong>
                <small id="weatherDescription">Cuaca Banjarnegara</small>
            </div>
        </div>

        <div class="top-item user-top top-dropdown">
        <button type="button"
                class="user-account-trigger dropdown-trigger"
                onclick="toggleTopDropdown('accountDropdown', this)"
                aria-expanded="false"
                aria-label="Buka menu akun">

            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
            </div>

            <div class="user-text">
                <strong>{{ auth()->user()->name ?? 'Penulis' }}</strong>
                <small>{{ $workspaceRoleLabel }}</small>
            </div>

            <i class="fa-solid fa-chevron-down account-chevron"></i>
        </button>

        <div class="top-dropdown-menu account-dropdown"
            id="accountDropdown">

            <div class="account-dropdown-header">
                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                </div>

                <div>
                    <strong>{{ auth()->user()->name ?? 'Penulis' }}</strong>
                    <small>{{ auth()->user()->email ?? '' }}</small>
                    <span class="account-role">
                        <i class="fa-solid {{ $workspaceRoleIcon }}"></i>
                        Akun {{ $workspaceRoleLabel }}
                    </span>
                </div>
            </div>

            <div class="account-profile-link-wrap">
                <a href="{{ $profileRoute }}" class="account-profile-link">
                    <i class="fa-regular fa-user"></i>
                    Profil Saya
                </a>
            </div>

            <form method="POST" action="{{ route('logout') }}"
                class="account-logout-form">
                @csrf

                <button type="submit">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Keluar dari Akun
                </button>
            </form>
        </div>
        </div>
    @endif

    @if ($workspaceRoutePrefix === 'editor')
        </div>
    @endif
</header>
@endif
