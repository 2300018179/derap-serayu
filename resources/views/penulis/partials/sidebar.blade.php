
    @php($workspaceRoutePrefix = $routePrefix ?? (request()->routeIs('editor.*') ? 'editor' : 'penulis'))

    <div class="mobile-overlay" id="mobileOverlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <a href="{{ route($workspaceRoutePrefix === 'editor' ? 'editor.dashboard' : 'penulis.dashboard') }}" class="logo">
            <img src="{{ $siteLogoUrl }}" alt="{{ $siteSettings['site_name'] }}"
                 class="logo-img">
        </a>

        <nav class="side-nav">
            @if ($workspaceRoutePrefix === 'editor')
                <a href="{{ route('editor.dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('editor.articles.create') }}" class="nav-link {{ request()->routeIs('editor.articles.create') ? 'active' : '' }}">
                    <i class="fa-solid fa-file-pen"></i>
                    <span>Tulis Artikel</span>
                </a>
                <a href="{{ route('editor.articles.index') }}" class="nav-link {{ request()->routeIs('editor.articles.index', 'editor.articles.edit') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Semua Artikel</span>
                </a>
                <a href="{{ route('editor.articles.review') }}" class="nav-link">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span>Tinjauan Artikel</span>
                </a>
                <a href="{{ route('editor.profile') }}" class="nav-link">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil Saya</span>
                </a>
                <a href="{{ route('home') }}" target="_blank" class="nav-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>Lihat Website</span>
                </a>
            @else
                <a href="{{ route('penulis.dashboard') }}" class="nav-link {{ request()->routeIs('penulis.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('penulis.artikel.create') }}" class="nav-link {{ request()->routeIs('penulis.artikel.create') ? 'active' : '' }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Tulis Artikel</span>
                </a>
                <a href="{{ route('penulis.articles.index') }}" class="nav-link {{ request()->routeIs('penulis.articles.index') && request()->query('status') !== 'review' ? 'active' : '' }}">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>Artikel Saya</span>
                </a>
                <a href="{{ route('penulis.articles.index', ['status' => 'review']) }}" class="nav-link {{ request()->routeIs('penulis.articles.index') && request()->query('status') === 'review' ? 'active' : '' }}">
                    <i class="fa-regular fa-clock"></i>
                    <span>Menunggu Tinjauan</span>
                </a>
                <a href="{{ url('/') }}" target="_blank" class="nav-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>Lihat Website</span>
                </a>
            @endif
        </nav>

        <div class="side-spacer"></div>

        @if ($workspaceRoutePrefix === 'editor')
            <div class="sidebar-bottom">
                <div class="user-card">
                    <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role">{{ auth()->user()->role === 'admin' ? 'Administrator' : 'Editor' }}</div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Keluar dari akun</span>
                    </button>
                </form>
            </div>
        @endif
    </aside>
