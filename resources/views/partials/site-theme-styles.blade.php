<style>
    :root {
        --site-primary: {{ $siteSettings['primary_color'] }};
        --site-accent: {{ $siteSettings['accent_color'] }};
        --site-background: {{ $siteSettings['background_color'] }};
        --site-primary-soft: color-mix(in srgb, var(--site-primary) 10%, white);
        --site-accent-soft: color-mix(in srgb, var(--site-accent) 11%, white);
        --site-primary-dark: color-mix(in srgb, var(--site-primary) 78%, black);
        --site-accent-dark: color-mix(in srgb, var(--site-accent) 78%, black);

        --blue-soft: var(--site-primary-soft);
        --primary-dark: var(--site-primary-dark);
        --cyan: var(--site-accent);
        --cyan-dark: var(--site-accent-dark);
        --cyan-light: color-mix(in srgb, var(--site-accent) 58%, white);
        --cyan-soft: var(--site-accent-soft);
        --cyan-bg: color-mix(in srgb, var(--site-accent) 6%, white);
    }

    body {
        accent-color: var(--site-accent);
    }

    body:not(.auth-page) {
        background-color: var(--site-background) !important;
        background-image: none !important;
    }

    @if($siteSettings['background_mode'] === 'image' && $siteSettings['background_image_path'])
        body:not(.auth-page) {
            background-image:
                linear-gradient(
                    color-mix(in srgb, var(--site-background) 70%, transparent),
                    color-mix(in srgb, var(--site-background) 70%, transparent)
                ),
                url('{{ \Illuminate\Support\Facades\Storage::disk('public')->url($siteSettings['background_image_path']) }}') !important;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    @endif

    .sidebar {
        background-color: var(--site-primary-dark) !important;
        background-image: linear-gradient(180deg, var(--site-primary), var(--site-primary-dark)) !important;
    }

    ::selection {
        color: #fff;
        background: var(--site-primary);
    }

    .footer,
    .home-footer {
        background: var(--site-primary) !important;
    }

    .admin-workspace-footer {
        background: transparent !important;
    }

    .main-nav > a:hover,
    .main-nav > a.active,
    .nav-dropdown summary:hover,
    .nav-dropdown[open] summary,
    .nav-link.active {
        color: #fff !important;
        background: var(--site-accent) !important;
    }

    .nav-dropdown-icon,
    .nav-dropdown summary i,
    .logo-fallback span,
    .section-title-icon,
    .section-title-small h3 i,
    .hero-script,
    .hero-title span {
        color: var(--site-accent) !important;
    }

    .article-heading .category-label {
        color: var(--site-accent) !important;
        background: var(--site-accent-soft) !important;
        border-color: color-mix(in srgb, var(--site-accent) 28%, white) !important;
    }

    .main-nav > a.active,
    .hero-button,
    .search button,
    .search-box button,
    .search-area form button,
    .newsletter button,
    .footer .newsletter-form button,
    .home-footer .newsletter-form button,
    .footer-social a:hover,
    .home-footer .footer-social a:hover,
    .pagination-wrap span[aria-current],
    .pagination-wrap span[aria-current] span,
    .pagination nav span[aria-current] span,
    button[type="submit"],
    input[type="submit"] {
        background: var(--site-accent) !important;
        border-color: var(--site-accent) !important;
    }

    .main-nav > a:hover,
    .nav-dropdown summary:hover,
    .nav-dropdown[open] summary {
        background: var(--site-accent-soft) !important;
        color: var(--site-accent) !important;
    }

    .card:hover,
    .article-card:hover,
    .story-card:hover {
        border-color: color-mix(in srgb, var(--site-accent) 48%, white) !important;
    }

    input:focus,
    select:focus,
    textarea:focus,
    input:focus-visible,
    select:focus-visible,
    textarea:focus-visible {
        border-color: var(--site-accent) !important;
        outline-color: var(--site-accent);
        box-shadow: 0 0 0 3px var(--site-accent-soft) !important;
    }

    .footer-social a[href=""],
    .home-footer .footer-social a[href=""] {
        display: none !important;
    }

    .hero-script,
    .footer-quote-mark,
    .footer-quote-author,
    .footer-newsletter-label,
    .footer-made strong,
    .footer-bottom-links a:hover,
    .home-footer .footer-quote-mark,
    .home-footer .footer-newsletter-label,
    .home-footer .footer-made strong {
        color: var(--site-accent) !important;
    }

    .hero-main {
        background-image:
            linear-gradient(90deg, rgba(3,43,64,.94), rgba(3,57,80,.62), rgba(3,57,80,.12)),
            url('{{ $siteSettings['banner_path'] ? \Illuminate\Support\Facades\Storage::disk('public')->url($siteSettings['banner_path']) : asset('images/bg-sikunir-home.jpg') }}') !important;
        background-position: center;
        background-size: cover;
    }
</style>
