
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($article) ? 'Edit Artikel' : 'Tulis Artikel' }} | Derap Serayu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --bg: #0b1111;
            --panel: #101717;
            --panel2: #121b1b;
            --cyan: #08b8d5;
            --cyan-light: #39dff1;
            --green: #00d69a;
            --text: #f6f9fa;
            --muted: #98a4a6;
            --border: rgba(255,255,255,.72);
            --soft-border: rgba(8,184,213,.23);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            color: var(--text);
            background:
                radial-gradient(ellipse at 78% 12%, rgba(0,174,194,.08), transparent 36%),
                radial-gradient(ellipse at 65% 85%, rgba(0,214,154,.035), transparent 30%),
                var(--bg);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
        }

        button, input, textarea, select { font: inherit; }
        button, a { -webkit-tap-highlight-color: transparent; }
        a { color: inherit; text-decoration: none; }

        .sidebar {
            width: 230px;
            position: fixed;
            inset: 0 auto 0 0;
            background: #101616;
            border-right: 1px solid rgba(255,255,255,.72);
            display: flex;
            flex-direction: column;
            z-index: 20;
        }

        .brand {
            min-height: 87px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 30px;
            border-bottom: 1px solid rgba(255,255,255,.65);
            font-family: Georgia, serif;
            font-weight: 800;
            font-size: 18px;
        }

        .brand img { width: 30px; height: 30px; object-fit: contain; }
        .brand span span { color: var(--cyan); }

        .nav { padding: 27px 20px; }

        .nav a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 13px 15px;
            margin-bottom: 8px;
            border: 1px solid transparent;
            border-radius: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .nav a i { width: 17px; font-size: 16px; }
        .nav a:hover, .nav a.active {
            color: var(--cyan-light);
            background: rgba(0,184,213,.10);
            border-color: rgba(0,184,213,.25);
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 22px;
            border-top: 1px solid rgba(255,255,255,.65);
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 11px;
            border: 1px solid rgba(255,255,255,.78);
            border-radius: 16px;
            padding: 12px;
            margin-bottom: 16px;
            line-height: 1.65;
        }

        .avatar {
            width: 39px;
            height: 39px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: #00ad83;
            color: white;
            border-radius: 12px;
            font-weight: 800;
            font-size: 18px;
        }

        .user-name { font-size: 12px; font-weight: 800; }
        .user-role { font-size: 12px; color: #d4dddd; }
        .user-role::before { content: "●"; color: var(--green); margin-right: 6px; }

        .logout {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 9px 16px;
            border: 0;
            border-radius: 10px;
            color: #ff5c69;
            background: transparent;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
            transition: background .2s ease, color .2s ease;
        }

        .logout:hover,
        .logout:focus-visible {
            color: #fff;
            background: rgba(255,92,105,.12);
        }

        .sidebar-bottom form { margin: 0; }

        .main {
            margin-left: 230px;
            min-height: 100vh;
            padding: 35px clamp(22px, 4.5vw, 70px) 60px;
        }

        .page-header {
            max-width: 1120px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--cyan-light);
            font-size: 11px;
            letter-spacing: 1.5px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        h1 {
            margin: 0;
            font-size: clamp(24px, 2.5vw, 34px);
            line-height: 1.15;
            letter-spacing: -.7px;
            font-weight: 800;
        }

        .subtitle { margin: 8px 0 0; color: #c6cecf; }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
            font-weight: 700;
            color: #e0e7e8;
        }

        .back-link:hover { color: var(--cyan-light); }

        .editor-layout {
            max-width: 1120px;
            margin: auto;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 326px;
            gap: 28px;
            align-items: start;
        }

        .left-column, .right-column {
            display: grid;
            gap: 21px;
            min-width: 0;
        }

        .panel {
            min-width: 0;
            background: rgba(16,23,23,.82);
            border: 1px solid var(--border);
            border-radius: 28px;
            padding: 22px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .45px;
            margin-bottom: 19px;
        }

        .panel-title i { color: var(--cyan-light); }

        .field { margin-bottom: 20px; }
        .field:last-child { margin-bottom: 0; }

        .field label, .field-label {
            display: block;
            margin-bottom: 10px;
            color: #eaf0f1;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .required { color: #ff6574; }

        .control {
            display: block;
            width: 100%;
            min-width: 0;
            color: white;
            background: #101616;
            border: 1px solid rgba(255,255,255,.76);
            border-radius: 12px;
            outline: none;
            padding: 14px 15px;
            transition: border .2s, box-shadow .2s;
        }

        .control:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(8,184,213,.12);
        }

        .control::placeholder { color: #899294; }
        input.control { height: 49px; }
        textarea.control { resize: vertical; min-height: 90px; line-height: 1.65; }
        select.control { cursor: pointer; }
        select.control option { background: #101616; color: white; }

        .title-input {
            font-size: 19px;
            font-weight: 800;
        }

        .title-input::placeholder { font-size: 17px; }

        .method-switch {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            padding: 6px;
            margin-bottom: 21px;
            background: #0b1111;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 15px;
        }

        .method-button {
            border: 1px solid transparent;
            background: transparent;
            color: #b5c0c1;
            padding: 13px 10px;
            border-radius: 11px;
            cursor: pointer;
            font-weight: 800;
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            transition: .2s;
        }

        .method-button.active {
            background: rgba(8,184,213,.14);
            border-color: rgba(8,184,213,.43);
            color: var(--cyan-light);
        }

        .method-button:hover { color: white; }

        .method-description {
            color: var(--muted);
            line-height: 1.6;
            margin: -7px 0 20px;
            font-size: 12px;
        }

        .upload-zone {
            display: block;
            text-align: center;
            padding: 29px 18px;
            border: 2px dashed rgba(8,184,213,.65);
            border-radius: 17px;
            background: linear-gradient(140deg, rgba(8,184,213,.065), rgba(0,214,154,.025));
            cursor: pointer;
            transition: .2s;
        }

        .upload-zone:hover, .upload-zone.dragover {
            border-color: var(--cyan-light);
            background: rgba(8,184,213,.12);
        }

        .upload-icon {
            width: 53px;
            height: 53px;
            display: grid;
            place-items: center;
            margin: 0 auto 13px;
            border-radius: 16px;
            background: rgba(8,184,213,.13);
            color: var(--cyan-light);
            font-size: 23px;
        }

        .upload-zone strong { display: block; font-size: 14px; margin-bottom: 7px; }
        .upload-zone small { color: var(--muted); line-height: 1.6; }
        .upload-zone input { display: none; }

        .file-selected {
            display: none;
            margin-top: 15px;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid rgba(0,214,154,.3);
            background: rgba(0,214,154,.07);
            color: #baf8e4;
            overflow-wrap: anywhere;
            font-size: 12px;
        }

        .file-selected i { color: var(--green); margin-right: 8px; }
        .file-selected.visible { display: block; }

        .file-help {
            margin-top: 12px;
            font-size: 11px;
            line-height: 1.65;
            color: var(--muted);
        }

        .editor-toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 5px;
            padding: 10px;
            border: 1px solid rgba(255,255,255,.32);
            border-radius: 12px 12px 0 0;
            background: #111919;
        }

        .editor-toolbar button {
            min-width: 31px;
            height: 31px;
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: #e7eeee;
            cursor: pointer;
        }

        .editor-toolbar button:hover {
            color: var(--cyan-light);
            background: rgba(8,184,213,.12);
        }

        .editor-area {
            min-height: 300px;
            padding: 21px;
            background: #f9fbfb;
            color: #202727;
            border: 1px solid rgba(255,255,255,.5);
            border-top: 0;
            border-radius: 0 0 12px 12px;
            outline: none;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .editor-area:empty::before {
            content: attr(data-placeholder);
            color: #879091;
        }

        .editor-area:focus { box-shadow: inset 0 0 0 2px var(--cyan); }
        .editor-area h2, .editor-area h3 { color: #172a2d; }
        .editor-note { margin-top: 10px; color: var(--muted); font-size: 11px; }

        .media-drop {
            display: block;
            text-align: center;
            border: 2px dashed rgba(255,255,255,.68);
            border-radius: 14px;
            padding: 23px 12px;
            cursor: pointer;
            transition: .2s;
        }

        .media-drop:hover { border-color: var(--cyan-light); }
        .media-drop i { display: block; font-size: 25px; color: var(--cyan-light); margin-bottom: 12px; }
        .media-drop strong { display: block; font-size: 12px; margin-bottom: 7px; }
        .media-drop small { color: var(--muted); font-size: 11px; }
        .media-drop input { display: none; }

        .image-preview {
            display: none;
            width: 100%;
            max-height: 260px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 13px;
        }

        .image-preview.visible { display: block; }

        .two-fields { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .two-fields .field { margin-bottom: 0; }

        .side-panel {
            border-color: rgba(8,184,213,.3);
            padding: 21px;
        }

        .side-heading {
            display: flex;
            align-items: center;
            gap: 11px;
            margin-bottom: 21px;
        }

        .side-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            color: var(--cyan-light);
            background: rgba(8,184,213,.15);
            font-size: 16px;
        }

        .side-heading strong { display: block; font-size: 13px; margin-bottom: 4px; }
        .side-heading small { color: var(--muted); font-size: 11px; }

        .side-panel .field { margin-bottom: 19px; }
        .side-panel .control { height: 43px; padding: 11px 12px; font-size: 12px; }
        .side-panel textarea.control { height: auto; }
        .side-panel .field label { font-size: 10px; }

        .tag-hint { color: var(--muted); font-size: 11px; margin-top: 8px; }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            width: 100%;
            border: 0;
            border-radius: 12px;
            padding: 14px 16px;
            font-weight: 800;
            font-size: 12px;
            cursor: pointer;
            transition: transform .2s, filter .2s;
        }

        .button:hover { transform: translateY(-1px); filter: brightness(1.08); }

        .button-cyan {
            color: white;
            background: linear-gradient(100deg, #079cbd, #06bdd8);
            box-shadow: 0 7px 18px rgba(8,184,213,.15);
        }

        .button-purple {
            color: #f2d8ff;
            background: rgba(114,28,173,.7);
            border: 1px solid rgba(190,112,255,.2);
        }

        .button-outline {
            color: #dce7e8;
            background: transparent;
            border: 1px solid rgba(255,255,255,.3);
        }

        .button-plain {
            color: #dce7e8;
            background: transparent;
        }

        .side-actions { display: grid; gap: 10px; margin-top: 18px; }

        .tip {
            display: flex;
            gap: 10px;
            padding: 13px;
            background: rgba(0,214,154,.055);
            border: 1px solid rgba(0,214,154,.16);
            border-radius: 12px;
            color: #b8d9d0;
            font-size: 11px;
            line-height: 1.7;
        }

        .tip i { color: var(--green); margin-top: 3px; }
        .hidden { display: none !important; }

        .notice {
            margin-bottom: 20px;
            padding: 14px 16px;
            border-radius: 12px;
            line-height: 1.6;
            font-size: 13px;
        }

        .notice-success {
            background: rgba(0,214,154,.09);
            border: 1px solid rgba(0,214,154,.35);
            color: #baf8e4;
        }

        .notice-error {
            background: rgba(255,80,100,.08);
            border: 1px solid rgba(255,80,100,.3);
            color: #ffc5cb;
        }

        .notice ul { margin: 7px 0 0; padding-left: 20px; }

        .footer-note {
            max-width: 1120px;
            margin: 28px auto 0;
            color: #718080;
            font-size: 11px;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .sidebar { width: 205px; }
            .main { margin-left: 205px; padding-left: 25px; padding-right: 25px; }
            .editor-layout { grid-template-columns: minmax(0, 1fr) 290px; gap: 17px; }
            .panel { padding: 18px; }
        }

        @media (max-width: 820px) {
            .sidebar { width: 68px; }
            .brand { padding: 0; justify-content: center; }
            .brand img { width: 32px; }
            .brand span, .nav a span, .user-card .user-info, .logout span { display: none; }
            .nav { padding: 22px 9px; }
            .nav a { justify-content: center; padding: 14px 7px; }
            .nav a i { width: auto; }
            .sidebar-bottom { padding: 10px 7px; }
            .user-card { justify-content: center; padding: 8px 4px; }
            .logout { justify-content: center; padding: 12px 0; }
            .main { margin-left: 68px; padding: 25px 18px 45px; }
            .editor-layout { grid-template-columns: 1fr; }
            .right-column { grid-row: 1; }
            .right-column .side-panel { display: block; }
            .page-header { align-items: flex-start; }
        }

        @media (max-width: 520px) {
            .main { padding: 22px 12px 35px; }
            .page-header { flex-direction: column; }
            h1 { font-size: 25px; }
            .panel { border-radius: 20px; padding: 16px; }
            .method-button { font-size: 11px; padding: 11px 6px; }
            .two-fields { grid-template-columns: 1fr; }
            .title-input { font-size: 16px; }
            .editor-area { min-height: 250px; padding: 15px; }
        }

        :root {
            --bg: #f0f9fd;
            --panel: #ffffff;
            --panel2: #f5fbfe;
            --cyan: #009fbe;
            --cyan-light: #087e9e;
            --green: #10b995;
            --text: #12456e;
            --muted: #7091ac;
            --border: #d9effb;
            --soft-border: #d9effb;
        }

        body {
            min-height: 100vh;
            color: var(--text);
            background: var(--bg);
        }

        .sidebar {
            width: 250px;
            overflow-y: auto;
            color: white;
            background:
                linear-gradient(180deg, rgba(3,54,78,.97), rgba(2,43,65,.98)),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center/cover;
            border: 0;
            box-shadow: 5px 0 25px rgba(13,70,104,.08);
        }

        .brand {
            min-height: 76px;
            padding: 0 24px;
            border-bottom-color: rgba(255,255,255,.15);
            font-family: 'Playfair Display', serif;
        }

        .brand img { width: 48px; height: 48px; }
        .brand span span { color: #36d3ed; }

        .nav { padding: 22px 13px; }

        .nav a {
            min-height: 47px;
            margin-bottom: 7px;
            padding: 0 17px;
            color: #e3f3fb;
            font-size: 13px;
        }

        .nav a:hover, .nav a.active {
            color: #fff;
            background: linear-gradient(110deg, #0798c5, #0084b5);
            border-color: transparent;
            box-shadow: 0 6px 18px rgba(0,164,204,.2);
        }

        .sidebar-bottom {
            padding: 13px;
            border-top-color: rgba(255,255,255,.17);
        }

        .user-card {
            margin-bottom: 4px;
            padding: 13px;
            border-color: rgba(30,202,231,.32);
            background: rgba(0,28,45,.3);
            border-radius: 14px;
        }

        .avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(145deg, #23d9bb, #00a5a5);
        }

        .user-role { color: #b5d9e9; }
        .user-role::before { content: none; }

        .logout {
            padding: 15px 15px 9px;
            color: #ffe1e6;
        }

        .main {
            min-height: 100vh;
            margin-left: 250px;
            padding: 0;
            color: var(--text);
        }

        .topbar {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 0 30px;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid #e2f0f8;
        }

        .topbar-context {
            display: flex;
            align-items: center;
            gap: 11px;
            color: #7091ac;
            font-size: 12px;
            font-weight: 700;
        }

        .topbar-context i { color: var(--cyan); }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 18px;
            border-left: 1px solid #e1eef7;
        }

        .topbar-user .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 15px;
        }

        .topbar-user strong, .topbar-user small { display: block; }
        .topbar-user strong { font-size: 11px; }
        .topbar-user small { margin-top: 3px; color: var(--muted); font-size: 10px; }

        .page-content {
            padding: 27px clamp(18px, 2.5vw, 36px) 46px;
        }

        .page-header {
            position: relative;
            max-width: 1280px;
            min-height: 170px;
            overflow: hidden;
            margin: 0 auto 22px;
            padding: 28px 32px;
            border: 1px solid rgba(255,255,255,.75);
            border-radius: 16px;
            color: #fff;
            background:
                linear-gradient(90deg, rgba(3,50,75,.94), rgba(4,63,88,.70) 58%, rgba(5,69,94,.18)),
                url("{{ asset('images/bg-dieng-home.jpg') }}") center 48%/cover;
            box-shadow: 0 7px 20px rgba(36,115,163,.09);
        }

        .page-header > div { position: relative; z-index: 1; }

        .eyebrow {
            color: #8be8f5;
            font-size: 10px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(25px, 2.5vw, 34px);
            letter-spacing: -.4px;
        }

        .subtitle { color: #eef9ff; font-size: 12px; }

        .back-link {
            position: relative;
            z-index: 1;
            padding: 11px 15px;
            border: 1px solid rgba(255,255,255,.55);
            border-radius: 24px;
            color: white;
            background: rgba(0,87,119,.38);
        }

        .back-link:hover {
            color: white;
            background: rgba(0,159,190,.7);
        }

        .editor-layout {
            max-width: 1280px;
            grid-template-columns: minmax(0, 1fr) 326px;
            gap: 18px;
        }

        .left-column, .right-column { gap: 14px; }

        .panel {
            background: rgba(255,255,255,.97);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 21px;
            box-shadow: 0 5px 15px rgba(36,115,163,.045);
        }

        .panel-title {
            color: var(--text);
            font-size: 13px;
            letter-spacing: 0;
        }

        .panel-title i, .side-icon { color: var(--cyan); }

        .field label, .field-label { color: #315d7e; }

        .control {
            color: var(--text);
            background: #fff;
            border-color: #cde5f7;
        }

        .control:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(0,159,190,.12);
        }

        .control::placeholder { color: #84a4bd; }
        select.control option { color: var(--text); background: #fff; }

        .method-switch {
            background: #f2f9fd;
            border-color: #d9effb;
        }

        .method-button { color: #7091ac; }
        .method-button:hover { color: var(--text); }
        .method-button.active {
            color: #087e9e;
            background: #e1f6fb;
            border-color: #a9e5f0;
        }

        .method-description, .editor-note, .upload-zone small,
        .file-help, .tag-hint, .side-heading small { color: var(--muted); }

        .upload-zone {
            color: var(--text);
            background: linear-gradient(140deg, #effbfe, #f2fbf7);
        }

        .upload-zone:hover, .upload-zone.dragover {
            border-color: var(--cyan);
            background: #e7f8fc;
        }

        .upload-icon, .side-icon {
            color: var(--cyan);
            background: #e1f6fb;
        }

        .file-selected {
            color: #176b56;
            background: #eaf9f4;
        }

        .editor-toolbar {
            background: #f1f8fc;
            border-color: #d5e9f5;
        }

        .editor-toolbar button { color: #315d7e; }
        .editor-toolbar button:hover { color: #087e9e; background: #e1f6fb; }

        .editor-area {
            color: #243b4a;
            background: #fff;
            border-color: #d5e9f5;
        }

        .media-drop { border-color: #b8d9e9; }
        .media-drop i { color: var(--cyan); }
        .media-drop:hover { border-color: var(--cyan); }

        .side-panel { border-color: var(--border); }
        .side-heading strong { color: var(--text); }

        .button-cyan {
            background: linear-gradient(110deg, #08a6c3, #008ab4);
            box-shadow: 0 7px 18px rgba(0,148,187,.18);
        }

        .button-purple {
            color: #7143c4;
            background: #f2edff;
            border-color: #ded1ff;
        }

        .button-outline {
            color: #276183;
            background: #fff;
            border-color: #cde5f7;
        }

        .button-plain { color: #62829b; }

        .tip {
            color: #23616b;
            background: #eaf8f5;
            border-color: #c8eee2;
        }

        .notice-success {
            color: #176b56;
            background: #eaf9f4;
            border-color: #bdebd9;
        }

        .notice-error {
            color: #a33e50;
            background: #fff1f2;
            border-color: #f4c7ce;
        }

        .footer-note { color: #7091ac; }

        @media (max-width: 1100px) {
            .sidebar { width: 205px; }
            .main { margin-left: 205px; padding: 0; }
            .topbar { padding: 0 22px; }
            .page-content { padding-left: 22px; padding-right: 22px; }
            .editor-layout { grid-template-columns: minmax(0, 1fr) 290px; gap: 17px; }
            .panel { padding: 18px; }
        }

        @media (max-width: 820px) {
            .sidebar { width: 68px; }
            .brand { justify-content: center; padding: 0; }
            .brand img { width: 38px; }
            .brand > span, .nav a span, .user-card .user-info, .logout span { display: none; }
            .nav { padding: 22px 9px; }
            .nav a { justify-content: center; padding: 14px 7px; }
            .nav a i { width: auto; }
            .sidebar-bottom { padding: 10px 7px; }
            .user-card { justify-content: center; padding: 8px 4px; }
            .logout { justify-content: center; padding: 12px 0; }
            .main { margin-left: 68px; padding: 0; }
            .topbar { min-height: 62px; padding: 0 18px; }
            .page-content { padding: 20px 18px 40px; }
            .editor-layout { grid-template-columns: 1fr; }
            .right-column { grid-row: 1; }
            .right-column .side-panel { display: block; }
            .page-header { align-items: flex-start; }
        }

        @media (max-width: 520px) {
            .topbar { min-height: 58px; padding: 0 12px; }
            .topbar-context { font-size: 11px; }
            .topbar-user { padding-left: 10px; }
            .topbar-user strong { max-width: 130px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
            .page-content { padding: 15px 12px 32px; }
            .page-header { flex-direction: column; min-height: 190px; padding: 22px; }
            .page-header > div { width: 100%; }
            .back-link { align-self: flex-start; }
            h1 { font-size: 25px; }
            .panel { border-radius: 14px; padding: 16px; }
            .method-button { font-size: 11px; padding: 11px 6px; }
            .two-fields { grid-template-columns: 1fr; }
            .title-input { font-size: 16px; }
            .editor-area { min-height: 250px; padding: 15px; }
        }

        .top-spacer {
            flex: 1;
        }

        .top-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 18px;
            border-left: 1px solid #e1eef7;
            white-space: nowrap;
        }

        .notification-button {
            position: relative;
            border: 0;
            color: var(--navy);
            background: transparent;
            font-size: 20px;
        }

        .notification-dot {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 15px;
            height: 15px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #ef5361;
            color: white;
            font-size: 9px;
            font-weight: 800;
        }

        .sun {
            color: #ffad1f;
            font-size: 23px;
        }

        .weather strong,
        .user-top strong {
            display: block;
            font-size: 11px;
        }

        .weather small,
        .user-top small {
            display: block;
            margin-top: 3px;
            color: #7294ad;
            font-size: 10px;
        }

        .user-top {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            color: white;
            background: var(--navy);
            font-weight: 800;
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <a href="{{ url('/') }}" class="brand">
        <img src="{{ asset('images/logo-derap-serayu.png') }}" alt="Logo Derap Serayu"
             onerror="this.style.display='none'">
        <span>Derap<span>Serayu</span></span>
    </a>

    <nav class="nav">
        <a href="{{ route('penulis.dashboard') }}">
            <i class="fa-solid fa-border-all"></i><span>Dashboard</span>
        </a>
        <a href="{{ url('/penulis/create') }}" class="active">
            <i class="fa-solid fa-pen-nib"></i><span>Tulis Artikel</span>
        </a>
        <a href="{{ route('penulis.articles.index') }}">
            <i class="fa-regular fa-file-lines"></i><span>Artikel Saya</span>
        </a>
        <a href="{{ url('/') }}" target="_blank">
            <i class="fa-solid fa-arrow-up-right-from-square"></i><span>Lihat Website</span>
        </a>
    </nav>

    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout">
                <i class="fa-solid fa-arrow-right-from-bracket"></i><span>Keluar</span>
            </button>
        </form>
    </div>
</aside>

<main class="main">
    <div class="topbar">
        <div class="topbar-context">
            <i class="fa-solid fa-pen-nib"></i>
            <span>Ruang Kerja Penulis</span>
        </div>

        <div class="top-spacer"></div>

            <div class="top-item">
                <a class="notification-button" href="{{ route('penulis.articles.index') }}"
                   aria-label="Lihat status artikel">
                    <i class="fa-regular fa-bell"></i>
                </a>
            </div>

            <div class="top-item weather">
                <i class="fa-solid fa-sun sun"></i>
                <div>
                    <strong>24°C</strong>
                    <small>Banjarnegara</small>
                </div>
            </div>

            <div class="top-item user-top">
                <div class="user-avatar">A</div>
                <div class="user-text">
                    <strong>{{ auth()->check() ? auth()->user()->name : 'Annisa Dwi Lestari' }}</strong>
                    <small>Penulis</small>
                </div>
                <i class="fa-solid fa-chevron-down" style="font-size:10px"></i>
            </div>
    </div>

    <div class="page-content">
    <header class="page-header">
        <div>
            <div class="eyebrow"><i class="fa-solid fa-feather-pointed"></i> RUANG KREATIF PENULIS</div>
            <h1>TULIS BERITA BARU</h1>
            <p class="subtitle">Bagikan cerita menarik untuk pembaca Serayu.</p>
        </div>
    </header>

    @if(session('success'))
        <div class="notice notice-success">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="notice notice-error">
            <strong><i class="fa-solid fa-circle-exclamation"></i> Periksa kembali data artikel:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php($initialMethod = old('document_method', isset($article) && $article->document_path ? 'upload' : 'write'))
    <form id="articleForm"
          action="{{ isset($article) ? route('penulis.articles.update', $article) : route('penulis.artikel.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif
        <input type="hidden" name="document_method" id="documentMethodInput"
               value="{{ $initialMethod }}">

        <div class="editor-layout">
            <div class="left-column">

                <!-- INFORMASI DASAR -->
                <section class="panel">
                    <div class="panel-title">
                        <i class="fa-solid fa-pen"></i> Informasi Artikel
                    </div>

                    <div class="field">
                        <label for="title">Judul Artikel <span class="required">*</span></label>
                        <input id="title" name="title" class="control title-input"
                               value="{{ old('title', $article->title ?? '') }}"
                               placeholder="Ketik judul yang menarik..."
                               maxlength="200" required>
                    </div>

                    <div class="field">
                        <label for="summary">Ringkasan Artikel <span class="required">*</span></label>
                        <textarea id="summary" name="summary" class="control"
                                  placeholder="Tulis ringkasan singkat untuk pembaca..."
                                  maxlength="500" required>{{ old('summary', $article->summary ?? '') }}</textarea>
                    </div>
                </section>

                <!-- METODE PENULISAN -->
                <section class="panel">
                    <div class="panel-title">
                        <i class="fa-solid fa-file-lines"></i> Konten Utama
                        <span class="required">*</span>
                    </div>

                    <div class="method-switch">
                        <button type="button" class="method-button {{ $initialMethod === 'write' ? 'active' : '' }}" data-method="write">
                            <i class="fa-solid fa-keyboard"></i> Tulis Langsung
                        </button>
                        <button type="button" class="method-button {{ $initialMethod === 'upload' ? 'active' : '' }}" data-method="upload">
                            <i class="fa-solid fa-cloud-arrow-up"></i> Upload Dokumen
                        </button>
                    </div>

                    <div id="writePanel" class="{{ $initialMethod === 'upload' ? 'hidden' : '' }}">
                        <p class="method-description">
                            Tulis artikel langsung melalui editor. Kamu dapat menggunakan format
                            judul, paragraf, daftar, dan teks tebal.
                        </p>

                        <input type="hidden" name="content" id="contentInput" value="{{ old('content', $article->content ?? '') }}">

                        <div class="editor-toolbar" aria-label="Toolbar editor">
                            <button type="button" title="Tebal" data-command="bold"><b>B</b></button>
                            <button type="button" title="Miring" data-command="italic"><i>I</i></button>
                            <button type="button" title="Garis bawah" data-command="underline"><u>U</u></button>
                            <button type="button" title="Judul 2" data-command="formatBlock" data-value="h2">H2</button>
                            <button type="button" title="Judul 3" data-command="formatBlock" data-value="h3">H3</button>
                            <button type="button" title="Paragraf" data-command="formatBlock" data-value="p">¶</button>
                            <button type="button" title="Daftar" data-command="insertUnorderedList"><i class="fa-solid fa-list-ul"></i></button>
                            <button type="button" title="Daftar bernomor" data-command="insertOrderedList"><i class="fa-solid fa-list-ol"></i></button>
                            <button type="button" title="Kutipan" data-command="formatBlock" data-value="blockquote"><i class="fa-solid fa-quote-left"></i></button>
                            <button type="button" title="Hapus format" data-command="removeFormat"><i class="fa-solid fa-eraser"></i></button>
                        </div>

                        <div id="articleEditor" class="editor-area" contenteditable="true"
                             role="textbox" aria-multiline="true"
                             data-placeholder="Mulai tulis cerita atau berita di sini..."></div>

                        <p class="editor-note">
                            <i class="fa-solid fa-circle-info"></i>
                            Pastikan artikel menggunakan bahasa yang jelas dan sumber informasi yang dapat dipertanggungjawabkan.
                        </p>
                    </div>

                    <div id="uploadPanel" class="{{ $initialMethod === 'upload' ? '' : 'hidden' }}">
                        <p class="method-description">
                            Sudah menyiapkan naskah di komputer? Unggah dokumennya di sini.
                            Kamu tidak perlu mengetik ulang seluruh artikel.
                        </p>

                        <label class="upload-zone" id="documentDropZone" for="documentFile">
                            <span class="upload-icon"><i class="fa-solid fa-cloud-arrow-up"></i></span>
                            <strong>Klik untuk memilih dokumen</strong>
                            <small>atau tarik dan lepaskan file ke area ini</small>
                            <small style="display:block;margin-top:8px">
                                Format PDF, DOC, DOCX · Maksimal 10 MB
                            </small>
                            <input type="file" id="documentFile" name="document"
                                   accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        </label>

                        @if(isset($article) && $article->document_path)
                            <div class="file-help" id="existingDocument">
                                Naskah tersimpan:
                                <a href="{{ route('penulis.articles.document', $article) }}" target="_blank" rel="noopener">
                                    {{ $article->document_name ?: basename($article->document_path) }}
                                </a>
                                <span style="display:block">Jika metode diubah ke tulis langsung, naskah ini akan dihapus saat disimpan.</span>
                                <label style="display:block;margin-top:8px">
                                    <input type="checkbox" id="removeExistingDocument" name="remove_document" value="1"
                                           @checked(old('remove_document'))>
                                    Hapus naskah tersimpan saat menyimpan
                                </label>
                            </div>
                            <input type="hidden" id="hasExistingDocument" value="1">
                        @endif

                        <div id="selectedDocument" class="file-selected">
                            <i class="fa-solid fa-file-circle-check"></i>
                            <span id="documentName"></span>
                            <span id="documentSize"></span>
                            <button type="button" id="removeDocument"
                                    style="float:right;background:none;border:0;color:#ffc5cb;cursor:pointer"
                                    aria-label="Hapus dokumen">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>

                        <div class="file-help">
                            <i class="fa-solid fa-shield-halved"></i>
                            Naskah bersifat privat saat ditinjau. Setelah artikel diterbitkan,
                            pembaca dapat mengunduh file ini. Pastikan dokumen tidak diproteksi kata sandi.
                        </div>
                    </div>
                </section>

                <!-- MEDIA -->
                <section class="panel">
                    <div class="panel-title">
                        <i class="fa-regular fa-images"></i> Media &amp; Gambar
                    </div>

                    <label class="media-drop" for="coverImage">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <strong>Klik atau tarik gambar ke sini</strong>
                        <small>JPG, PNG, WEBP · Maksimal 5 MB</small>
                        <input type="file" id="coverImage" name="cover_image"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                    </label>

                    <img id="imagePreview" class="image-preview" alt="Pratinjau gambar artikel">
                    @if(isset($article) && $article->cover_image_path)
                        <p class="file-help" id="existingCoverLabel">Sampul tersimpan:</p>
                        <img id="existingCoverPreview" class="image-preview {{ old('remove_cover_image') ? '' : 'visible' }}"
                             src="{{ Storage::disk('public')->url($article->cover_image_path) }}"
                             alt="{{ $article->caption ?: $article->title }}">
                        <label class="file-help" id="removeCoverLabel">
                            <input type="checkbox" id="removeCoverImage" name="remove_cover_image" value="1"
                                   @checked(old('remove_cover_image'))>
                            Hapus sampul tersimpan saat menyimpan
                        </label>
                    @endif

                    <div class="two-fields" style="margin-top:13px">
                        <div class="field">
                            <label for="caption">Caption Gambar</label>
                            <input id="caption" name="caption" class="control"
                                   value="{{ old('caption', $article->caption ?? '') }}" placeholder="Caption gambar...">
                        </div>
                    </div>
                </section>

            </div>

            <!-- SIDEBAR PUBLIKASI -->
            <div class="right-column">
                <section class="panel side-panel">
                    <div class="side-heading">
                        <div class="side-icon"><i class="fa-solid fa-rocket"></i></div>
                        <div>
                            <strong>Publikasi</strong>
                            <small>Atur status artikel</small>
                        </div>
                    </div>

                    <div class="field">
                        <label for="status"><i class="fa-solid fa-wand-magic-sparkles"></i> Status</label>
                        <select id="status" name="status" class="control">
                            <option value="draft" @selected(old('status', $article->status ?? 'draft') === 'draft')>Simpan sebagai Draft</option>
                            <option value="review" @selected(old('status', $article->status ?? '') === 'review')>Kirim untuk Ditinjau</option>
                        </select>
                    </div>

                    <div class="side-actions">
                        <button type="button" class="button button-purple" id="previewButton">
                            <i class="fa-regular fa-eye"></i> Preview Artikel
                        </button>
                        <button type="submit" class="button button-cyan" id="submitButton">
                            <i class="fa-regular fa-paper-plane"></i> {{ isset($article) ? 'Simpan Perubahan' : 'Simpan Artikel' }}
                        </button>
                        <a href="{{ route('penulis.dashboard') }}" class="button button-plain">
                            <i class="fa-solid fa-xmark"></i> Batal
                        </a>
                    </div>
                </section>

                <section class="panel side-panel">
                    <div class="side-heading">
                        <div class="side-icon" style="color:var(--green);background:rgba(0,214,154,.12)">
                            <i class="fa-solid fa-sliders"></i>
                        </div>
                        <div>
                            <strong>Pengaturan Artikel</strong>
                            <small>Kategori dan metadata</small>
                        </div>
                    </div>

                    <div class="field">
                        <label for="category"><i class="fa-regular fa-folder-open"></i> Kategori <span class="required">*</span></label>
                        <select id="category" name="category" class="control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach(['Berita','Cerita & Budaya','Opini','Sosok','Sudut Kota','Potensi','Teknologi','Humor'] as $category)
                                <option value="{{ $category }}" @selected(old('category', $article->category ?? '') === $category)>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field">
                        <label for="tags"><i class="fa-solid fa-hashtag"></i> Tags</label>
                        <input id="tags" name="tags" class="control"
                               value="{{ old('tags', isset($article) ? implode(', ', $article->tags ?? []) : '') }}" placeholder="Dieng, Wisata, UMKM...">
                        <div class="tag-hint">Pisahkan setiap tag dengan koma.</div>
                    </div>

                    <div class="field">
                        <label for="author"><i class="fa-solid fa-pen-nib"></i> Penulis</label>
                        <input id="author" name="author" class="control"
                               value="{{ auth()->user()->pen_name ?: auth()->user()->name }}"
                               placeholder="Nama penulis" readonly>
                    </div>
                </section>

                <div class="tip">
                    <i class="fa-solid fa-lightbulb"></i>
                    <div>
                        <strong>Tips untuk penulis</strong><br>
                        Gunakan judul yang jelas, periksa ejaan, cantumkan sumber informasi,
                        dan gunakan gambar yang memiliki izin untuk dipublikasikan.
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="footer-note">
        © {{ date('Y') }} Derap Serayu · Media Informasi Banjarnegara
    </div>
    </div>
</main>

<script>
    const methodButtons = document.querySelectorAll('.method-button');
    const writePanel = document.getElementById('writePanel');
    const uploadPanel = document.getElementById('uploadPanel');
    const documentFile = document.getElementById('documentFile');
    const selectedDocument = document.getElementById('selectedDocument');
    const documentName = document.getElementById('documentName');
    const documentSize = document.getElementById('documentSize');
    const removeDocument = document.getElementById('removeDocument');
    const dropZone = document.getElementById('documentDropZone');
    const editor = document.getElementById('articleEditor');
    const contentInput = document.getElementById('contentInput');
    const documentMethodInput = document.getElementById('documentMethodInput');
    const form = document.getElementById('articleForm');
    const submitButton = document.getElementById('submitButton');
    const removeExistingDocument = document.getElementById('removeExistingDocument');
    const existingCoverPreview = document.getElementById('existingCoverPreview');
    const removeCoverImage = document.getElementById('removeCoverImage');

    let currentMethod = documentMethodInput.value;
    const hasExistingDocument = document.getElementById('hasExistingDocument') !== null;
    const hasAvailableStoredDocument = () =>
        hasExistingDocument && !removeExistingDocument.checked;
    const allowedEditorTags = new Set([
        'P', 'BR', 'H2', 'H3', 'UL', 'OL', 'LI', 'BLOCKQUOTE',
        'B', 'STRONG', 'I', 'EM', 'U'
    ]);

    // Pilihan metode penulisan
    methodButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentMethod = button.dataset.method;
            documentMethodInput.value = currentMethod;

            methodButtons.forEach(item => item.classList.toggle('active', item === button));
            writePanel.classList.toggle('hidden', currentMethod !== 'write');
            uploadPanel.classList.toggle('hidden', currentMethod !== 'upload');

            // Validasi konten mengikuti metode yang dipilih.
            editor.setAttribute('aria-required', currentMethod === 'write' ? 'true' : 'false');
            documentFile.required = currentMethod === 'upload' && !hasAvailableStoredDocument();
        });
    });

    removeExistingDocument?.addEventListener('change', () => {
        documentFile.required = currentMethod === 'upload' && !hasAvailableStoredDocument();
    });

    // Editor sederhana
    document.querySelectorAll('[data-command]').forEach(button => {
        button.addEventListener('click', () => {
            editor.focus();
            const command = button.dataset.command;
            const value = button.dataset.value || null;
            document.execCommand(command, false, value);
        });
    });

    // Mengisi kembali isi editor ketika validasi server gagal.
    const oldContent = @json(old('content', $article->content ?? ''));
    if (oldContent) {
        const template = document.createElement('template');
        template.innerHTML = oldContent;

        const sanitizeNode = node => {
            if (node.nodeType === Node.TEXT_NODE) {
                return document.createTextNode(node.textContent);
            }

            const children = Array.from(node.childNodes, sanitizeNode);
            if (!allowedEditorTags.has(node.tagName)) {
                return children.reduce((fragment, child) => {
                    fragment.append(child);
                    return fragment;
                }, document.createDocumentFragment());
            }

            const cleanElement = document.createElement(node.tagName.toLowerCase());
            children.forEach(child => cleanElement.append(child));
            return cleanElement;
        };

        Array.from(template.content.childNodes, sanitizeNode)
            .forEach(node => editor.append(node));
    }

    function formatSize(bytes) {
        return bytes >= 1024 * 1024
            ? (bytes / (1024 * 1024)).toFixed(2) + ' MB'
            : Math.max(1, Math.round(bytes / 1024)) + ' KB';
    }

    function showDocument(file) {
        if (!file) return;

        const allowed = /\.(pdf|doc|docx)$/i.test(file.name);
        const maxBytes = 10 * 1024 * 1024;

        if (!allowed) {
            alert('Format dokumen harus PDF, DOC, atau DOCX.');
            documentFile.value = '';
            return;
        }

        if (file.size > maxBytes) {
            alert('Ukuran dokumen maksimal 10 MB.');
            documentFile.value = '';
            return;
        }

        documentName.textContent = file.name + ' ';
        documentSize.textContent = '(' + formatSize(file.size) + ')';
        selectedDocument.classList.add('visible');
        if (removeExistingDocument) {
            removeExistingDocument.checked = false;
            documentFile.required = false;
        }
    }

    documentFile.addEventListener('change', () => {
        showDocument(documentFile.files[0]);
    });

    removeDocument.addEventListener('click', () => {
        documentFile.value = '';
        selectedDocument.classList.remove('visible');
        documentFile.required = currentMethod === 'upload' && !hasAvailableStoredDocument();
    });

    // Drag and drop dokumen
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, event => {
            event.preventDefault();
            dropZone.classList.add('dragover');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, event => {
            event.preventDefault();
            dropZone.classList.remove('dragover');
        });
    });

    dropZone.addEventListener('drop', event => {
        const file = event.dataTransfer.files[0];
        if (!file) return;

        const transfer = new DataTransfer();
        transfer.items.add(file);
        documentFile.files = transfer.files;
        showDocument(file);
    });

    // Preview gambar sampul
    const coverInput = document.getElementById('coverImage');
    const imagePreview = document.getElementById('imagePreview');

    coverInput.addEventListener('change', () => {
        const file = coverInput.files[0];
        if (!file) {
            imagePreview.classList.remove('visible');
            imagePreview.removeAttribute('src');
            existingCoverPreview?.classList.toggle('visible', !removeCoverImage?.checked);
            return;
        }

        if (!/^image\/(jpeg|png|webp)$/.test(file.type) || file.size > 5 * 1024 * 1024) {
            alert('Pilih gambar JPG, PNG, atau WEBP dengan ukuran maksimal 5 MB.');
            coverInput.value = '';
            imagePreview.classList.remove('visible');
            existingCoverPreview?.classList.toggle('visible', !removeCoverImage?.checked);
            return;
        }

        imagePreview.src = URL.createObjectURL(file);
        imagePreview.classList.add('visible');
        existingCoverPreview?.classList.remove('visible');
        if (removeCoverImage) {
            removeCoverImage.checked = false;
        }
    });

    removeCoverImage?.addEventListener('change', () => {
        existingCoverPreview?.classList.toggle('visible', !removeCoverImage.checked && !coverInput.files.length);
    });

    // Preview artikel sederhana
    document.getElementById('previewButton').addEventListener('click', () => {
        const title = document.getElementById('title').value.trim();
        const summary = document.getElementById('summary').value.trim();
        const category = document.getElementById('category').value;

        if (!title || !summary || !category) {
            alert('Isi judul, ringkasan, dan kategori terlebih dahulu.');
            return;
        }

        let previewContent;
        let attachmentName = '';
        if (currentMethod === 'write') {
            previewContent = editor.innerText.trim() || '(Isi artikel belum ditulis.)';
        } else {
            const file = documentFile.files[0];
            attachmentName = file?.name
                || (!removeExistingDocument?.checked
                    ? document.getElementById('existingDocument')?.querySelector('a')?.textContent.trim()
                    : '')
                || '';
            previewContent = attachmentName
                ? 'Naskah artikel tersedia sebagai lampiran unduhan.'
                : 'Belum ada dokumen yang dipilih.';
        }

        const previewWindow = window.open('', '_blank');
        if (!previewWindow) {
            alert('Izinkan pop-up browser untuk membuka preview.');
            return;
        }

        const coverPreview = coverInput.files[0]
            ? URL.createObjectURL(coverInput.files[0])
            : (existingCoverPreview?.classList.contains('visible') ? existingCoverPreview.src : '');

        const previewDocument = previewWindow.document;
        previewDocument.title = title + ' | Preview Derap Serayu';
        previewDocument.documentElement.lang = 'id';

        const style = previewDocument.createElement('style');
        style.textContent = `
            body{font-family:Arial,sans-serif;max-width:780px;margin:45px auto;padding:0 22px;color:#243233;line-height:1.8}
            .brand{color:#079fba;font-weight:bold;letter-spacing:1px}
            .category{color:#078da8;font-size:12px;font-weight:bold;text-transform:uppercase}
            h1{font-size:36px;line-height:1.2}
            .summary{font-size:18px;color:#657273}
            .content{white-space:pre-line;margin-top:30px}
            img{width:100%;max-height:420px;object-fit:cover;border-radius:14px}
            .note{padding:15px;background:#eaf8fa;border-radius:10px;color:#23616b}
        `;
        previewDocument.head.append(style);

        const addTextElement = (tagName, className, text) => {
            const element = previewDocument.createElement(tagName);
            if (className) element.className = className;
            element.textContent = text;
            previewDocument.body.append(element);
            return element;
        };

        addTextElement('div', 'brand', 'DERAP SERAYU');
        addTextElement('p', 'category', category);
        addTextElement('h1', '', title);
        addTextElement('p', 'summary', summary);

        if (coverPreview) {
            const image = previewDocument.createElement('img');
            image.src = coverPreview;
            image.alt = document.getElementById('caption').value.trim() || title;
            previewDocument.body.append(image);
        }

        previewDocument.body.append(previewDocument.createElement('hr'));
        addTextElement('div', 'content', previewContent);

        if (currentMethod === 'upload') {
            addTextElement(
                'p',
                'note',
                'Lampiran yang akan dapat diunduh setelah artikel diterbitkan: '
                    + (attachmentName || 'belum dipilih')
            );
        }
    });

    // Sebelum form dikirim, salin isi editor ke input tersembunyi.
    form.addEventListener('submit', event => {
        documentMethodInput.value = currentMethod;

        if (currentMethod === 'write') {
            contentInput.value = editor.innerHTML.trim();

            if (!editor.innerText.trim()) {
                event.preventDefault();
                alert('Isi artikel terlebih dahulu.');
                editor.focus();
                return;
            }

            documentFile.required = false;
        } else {
            contentInput.value = '';
            documentFile.required = !hasAvailableStoredDocument();

            if (!documentFile.files.length && !hasAvailableStoredDocument()) {
                event.preventDefault();
                alert('Pilih dokumen PDF, DOC, atau DOCX terlebih dahulu.');
                return;
            }
        }

        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim...';
    });

</script>
</body>
</html>