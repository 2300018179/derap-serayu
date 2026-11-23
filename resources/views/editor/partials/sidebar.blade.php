<aside class="sidebar" id="sidebar">
    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('editor.dashboard') }}"
       class="brand">
        <span class="brand-logo-wrapper">
            <img src="{{ $siteLogoUrl }}" alt="{{ $siteSettings['site_name'] }}" class="brand-logo">
        </span>
    </a>

    <div class="sidebar-label">
        {{ auth()->user()->role === 'admin' ? 'Administrasi' : 'Menu Editorial' }}
    </div>

    <nav class="nav-menu">
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge-high"></i>
                <span>Dashboard Admin</span>
            </a>
            <a href="{{ route('admin.users.index') }}"
               class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users-gear"></i>
                <span>Kelola Pengguna</span>
            </a>
            <a href="{{ route('admin.settings.edit') }}"
               class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-palette"></i>
                <span>Pengaturan Website</span>
            </a>
            <div class="sidebar-label">Menu Editorial</div>
        @endif
        @unless(auth()->user()->role === 'admin')
            <a href="{{ route('editor.dashboard') }}"
               class="nav-link {{ request()->routeIs('editor.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        @endunless
        <a href="{{ route('editor.articles.create') }}"
           class="nav-link {{ request()->routeIs('editor.articles.create') ? 'active' : '' }}">
            <i class="fa-solid fa-file-pen"></i>
            <span>Tulis Artikel</span>
        </a>
        <a href="{{ route('editor.articles.index') }}"
           class="nav-link {{ request()->routeIs('editor.articles.index', 'editor.articles.edit') ? 'active' : '' }}">
            <i class="fa-solid fa-newspaper"></i>
            <span>Semua Artikel</span>
        </a>
        <a href="{{ route('editor.articles.review') }}"
           class="nav-link {{ request()->routeIs('editor.articles.review', 'admin.articles.*') ? 'active' : '' }}">
            <i class="fa-solid fa-clipboard-check"></i>
            <span>Tinjauan Artikel</span>
        </a>
        <div class="sidebar-label">Akun</div>
        <a href="{{ route('editor.profile') }}"
           class="nav-link {{ request()->routeIs('editor.profile', 'admin.profile') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>Profil Saya</span>
        </a>
        <a href="{{ route('home') }}" class="nav-link">
            <i class="fa-solid fa-globe"></i>
            <span>Lihat Website</span>
        </a>
    </nav>

    <div class="sidebar-bottom">
        <div class="editor-info">
            <strong>{{ auth()->user()->name }}</strong>
            <span>
                <i class="fa-solid fa-circle-check"></i>
                {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Editor Derap Serayu' }}
            </span>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">
                <i class="fa-solid fa-right-from-bracket"></i>
                &nbsp; Keluar dari akun
            </button>
        </form>
    </div>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('show');
        document.getElementById('sidebarOverlay').classList.toggle('show');
    }

    document.querySelectorAll('.sidebar .nav-link').forEach((link) => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 950) {
                document.getElementById('sidebar').classList.remove('show');
                document.getElementById('sidebarOverlay').classList.remove('show');
            }
        });
    });
</script>
