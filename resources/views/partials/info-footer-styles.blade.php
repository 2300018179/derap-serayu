<style>
    /* Hero naik ke bawah header agar gambar menempel di atas */
    .main-header {
        margin-bottom: -86px;
    }

    .hero {
        padding-top: 150px;
    }

    @media (max-width: 900px) {
        .main-header {
            margin-bottom: 0;
        }

        .hero {
            padding-top: 64px;
        }
    }

    .footer {
        position: relative;
        overflow: hidden;
        margin-top: 55px;
        background: #03384f;
        color: white;
    }

    .footer-background {
        position: absolute;
        inset: 0;
        background: url("{{ asset('images/bg-dieng-home.jpg') }}") center bottom / cover no-repeat;
        opacity: .45;
        transform: scale(1.05);
    }

    .footer-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(3, 48, 68, .95), rgba(2, 35, 49, .98));
    }

    .footer-container {
        position: relative;
        z-index: 2;
        width: min(1300px, calc(100% - 40px));
        margin: auto;
        padding: 60px 0 20px;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 1.6fr .8fr .8fr .8fr 1.4fr;
        gap: 45px;
        padding-bottom: 40px;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
    }

    .footer-logo img {
        width: 180px;
        height: auto;
        display: block;
        padding: 0;
        background: transparent;
    }

    .footer-description {
        max-width: 300px;
        margin-top: 15px;
        color: rgba(255, 255, 255, .57);
        font-size: 10px;
        line-height: 1.8;
    }

    .footer-social {
        display: flex;
        gap: 8px;
        margin-top: 18px;
    }

    .footer-social a,
    .footer-social span {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        border-radius: 50%;
        font-size: 16px;
        color: white;
        text-decoration: none;
        background: rgba(255, 255, 255, .09);
        transition: .2s;
    }

    .footer-social a:hover {
        background: #08add5;
        transform: translateY(-3px);
    }

    .footer-column h4 {
        margin-bottom: 17px;
        font-family: "Playfair Display", serif;
        font-size: 16px;
    }

    .footer-column a,
    .footer-column span {
        display: block;
        width: fit-content;
        margin-bottom: 10px;
        color: rgba(255, 255, 255, .53);
        text-decoration: none;
        font-size: 9px;
        transition: .2s;
    }

    .footer-column a:hover {
        color: #72e3fa;
        transform: translateX(3px);
    }

    .footer-newsletter-label {
        color: #72e3fa;
        font-size: 8px;
        font-weight: 800;
        letter-spacing: 1.5px;
    }

    .footer-newsletter h3 {
        max-width: 280px;
        margin-top: 8px;
        font-family: "Playfair Display", serif;
        font-size: 22px;
        line-height: 1.25;
    }

    .footer-newsletter h3 span {
        color: #08add5;
    }

    .footer-newsletter p {
        max-width: 270px;
        margin: 10px 0 15px;
        color: rgba(255, 255, 255, .52);
        font-size: 9px;
        line-height: 1.6;
    }

    .footer .newsletter-form {
        display: flex;
        max-width: 270px;
        padding: 4px;
        border-radius: 12px;
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .12);
    }

    .footer .newsletter-form input {
        width: 100%;
        border: 0;
        outline: 0;
        background: transparent;
        padding: 9px 10px;
        color: white;
        font-family: inherit;
        font-size: 9px;
    }

    .footer .newsletter-form input::placeholder {
        color: rgba(255, 255, 255, .38);
    }

    .footer .newsletter-form button {
        width: 35px;
        height: 35px;
        flex-shrink: 0;
        border: 0;
        border-radius: 9px;
        background: #08add5;
        color: white;
        cursor: pointer;
    }

    .footer-quote {
        text-align: center;
        padding: 35px 15px;
    }

    .footer-quote-mark {
        color: #08add5;
        font-family: "Playfair Display", serif;
        font-size: 43px;
        line-height: 25px;
    }

    .footer-quote p {
        max-width: 650px;
        margin: 5px auto 9px;
        font-family: "Playfair Display", serif;
        font-size: 21px;
        font-style: italic;
        line-height: 1.5;
    }

    .footer-quote small {
        color: rgba(255, 255, 255, .35);
        font-size: 7px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .footer-bottom {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        max-width: none;
        margin: 0;
        padding: 20px 0 0;
        border-top: 1px solid rgba(255, 255, 255, .08);
        color: rgba(255, 255, 255, .37);
        font-size: 8px;
    }

    .footer-bottom-links {
        display: flex;
        gap: 17px;
    }

    .footer-bottom-links a,
    .footer-bottom-links span {
        color: rgba(255, 255, 255, .42);
        text-decoration: none;
    }

    .footer-bottom-links a:hover {
        color: #72e3fa;
    }

    .footer-made strong {
        color: #72e3fa;
    }

    @media (max-width: 1200px) {
        .footer-grid {
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
        }

        .footer-newsletter {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 1050px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 650px) {
        .footer-container {
            width: calc(100% - 24px);
        }

        .footer-grid {
            gap: 30px;
        }

        .footer-brand,
        .footer-newsletter {
            grid-column: 1 / -1;
        }

        .footer-bottom {
            flex-direction: column;
            text-align: center;
        }

        .footer-bottom-links {
            justify-content: center;
            flex-wrap: wrap;
        }
    }
</style>
