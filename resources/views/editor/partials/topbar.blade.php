<header class="topbar">
    <div class="topbar-left">
        <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Buka menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="breadcrumb">
            @if(auth()->user()->role === 'admin' && request()->routeIs('admin.dashboard'))
                <strong>Dashboard Admin</strong>
            @else
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('editor.dashboard') }}">
                    {{ auth()->user()->role === 'admin' ? 'Dashboard Admin' : 'Dashboard' }}
                </a>
                / <strong>{{ $pageTitle ?? 'Editor' }}</strong>
            @endif
        </div>
    </div>

    <div class="topbar-right">
        <div class="date-info">
            <i class="fa-regular fa-calendar"></i>
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </div>
</header>
