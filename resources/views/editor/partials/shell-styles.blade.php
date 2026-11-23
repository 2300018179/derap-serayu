@include('editor.partials.sidebar-styles')
<style>
    .main {
        min-height: 100vh;
        margin-left: 260px;
        padding: 0;
    }

    .content {
        width: 100%;
        max-width: 1600px;
        margin: auto;
        padding: 32px 35px 45px;
    }

    .hero {
        position: relative;
        display: flex;
        align-items: center;
        min-height: 205px;
        margin-bottom: 25px;
        padding: 32px 35px;
        overflow: hidden;
        color: #fff;
        background:
            linear-gradient(100deg, rgba(5, 48, 75, .96), rgba(8, 105, 129, .79)),
            url("{{ asset('images/bg-dieng-home.jpg') }}") center 45%/cover;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(18,69,110,.12);
    }

    .hero::after {
        position: absolute;
        top: -85px;
        right: 8%;
        width: 240px;
        height: 240px;
        content: "";
        border: 1px solid rgba(255,255,255,.14);
        border-radius: 50%;
        box-shadow: 0 0 0 25px rgba(255,255,255,.04), 0 0 0 50px rgba(255,255,255,.03);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 650px;
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 13px;
        color: #b9f0fa;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.4px;
    }

    .hero h1 {
        margin-bottom: 10px;
        font-family: 'Playfair Display', serif;
        font-size: 29px;
    }

    .hero p {
        max-width: 550px;
        color: #d3e9f1;
        font-size: 13px;
        line-height: 1.8;
    }

    @media(max-width: 768px) {
        .main {
            margin-left: 0;
        }

        .content {
            padding: 23px 17px 35px;
        }

        .hero {
            min-height: 190px;
            padding: 25px 22px;
        }

        .hero h1 {
            font-size: 24px;
        }

        .hero p {
            font-size: 11px;
        }
    }
</style>
@include('partials.site-theme-styles')
@include('editor.partials.topbar-styles')
