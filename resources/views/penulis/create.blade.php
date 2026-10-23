
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
            position: relative;
            z-index: 30;
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
            position: relative;
            align-items: center;
            gap: 10px;
            padding-left: 18px;
            border-left: 1px solid #e1eef7;
            white-space: nowrap;
        }

        .notification-button {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            padding: 0;
            position: relative;
            border-radius: 12px;
            color: #12456e;
            cursor: pointer;
            transition: background 0.2s color 0.2s;
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
            flex-shrink: 0;
            border: 2px solid #d7f3f8;
            border-radius: 50%;
            color: #ffffff;
            background: linear-gradient(145deg, #0aa9bd, #087e9e);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 800;
        }

        .user-account-trigger {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 8px;
            border: 0;
            border-radius: 12px;
            color: #12456e;
            background: transparent;
            text-align: left;
            cursor: pointer;
        }

        .user-account-trigger:hover {
            background: #f0f9fd;
        }

        .user-account-trigger:focus-visible,
        .notification-button:focus-visible {
            outline: 2px solid #009fbe;
            outline-offset: 3px;
        }

        .user-account-trigger .user-text strong {
            display: block;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 11px;
        }

        .user-account-trigger .user-text small {
            display: block;
            margin-top: 3px;
            color: #7091ac;
            font-size: 10px;
        }

        .account-chevron {
            color: #7897ad;
            font-size: 10px;
            transition: transform .2s ease;
        }

        .user-account-trigger[aria-expanded="true"] .account-chevron {
            transform: rotate(180deg);
        }


        /* DROPDOWN NOTIFIKASI DAN AKUN */
        .top-dropdown {
            position: relative;
        }

        .dropdown-trigger {
            cursor: pointer;
        }

        .top-dropdown-menu {
            position: absolute;
            top: calc(100% + 14px);
            right: 0;
            z-index: 100;
            display: none;
            width: 340px;
            overflow: hidden;
            border: 1px solid #dcecf5;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 18px 45px rgba(4, 48, 73, .17);
            animation: dropdownAppear .18s ease;
        }

        .top-dropdown-menu.show {
            display: block;
        }

        @keyframes dropdownAppear {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 17px;
            border-bottom: 1px solid #e9f2f7;
            background: linear-gradient(120deg, #f0fbff, #f3fcf8);
        }

        .dropdown-heading strong,
        .dropdown-heading small {
            display: block;
        }

        .dropdown-heading strong {
            color: #12456e;
            font-size: 14px;
        }

        .dropdown-heading small {
            margin-top: 4px;
            color: #7897ad;
            font-size: 10px;
        }

        .dropdown-heading > i {
            color: #078eb0;
            font-size: 20px;
        }

        .dropdown-scroll {
            max-height: 330px;
            overflow-y: auto;
        }

        .dropdown-notice {
            display: flex;
            gap: 11px;
            padding: 14px;
            border-bottom: 1px solid #edf4f8;
            transition: background .2s;
        }

        .dropdown-notice:hover {
            background: #f5fbfe;
        }

        .dropdown-notice-icon {
            display: grid;
            place-items: center;
            width: 35px;
            height: 35px;
            flex-shrink: 0;
            border-radius: 11px;
        }

        .notice-orange {
            color: #b87b00;
            background: #fff1d0;
        }

        .notice-blue {
            color: #087fbd;
            background: #e3f5ff;
        }

        .dropdown-notice-text {
            min-width: 0;
            flex: 1;
        }

        .dropdown-notice-text strong,
        .dropdown-notice-text small {
            display: block;
            overflow-wrap: anywhere;
        }

        .dropdown-notice-text strong {
            color: #194866;
            font-size: 11px;
            line-height: 1.5;
        }

        .dropdown-notice-text small {
            margin-top: 4px;
            color: #7593a9;
            font-size: 10px;
            line-height: 1.6;
        }

        .dropdown-notice-text .notice-note {
            color: #ad7600;
        }

        .dropdown-notice-text .notice-date {
            color: #9ab0c0;
            font-size: 9px;
        }

        .dropdown-empty {
            padding: 27px 20px;
            color: #6f91a8;
            text-align: center;
        }

        .dropdown-empty > i {
            display: block;
            margin-bottom: 10px;
            color: #0db69a;
            font-size: 29px;
        }

        .dropdown-empty strong {
            color: #194866;
            font-size: 12px;
        }

        .dropdown-empty p {
            margin: 6px 0 0;
            font-size: 10px;
            line-height: 1.6;
        }

        .dropdown-footer-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 16px;
            border-top: 1px solid #e9f2f7;
            color: #008fb7;
            font-size: 11px;
            font-weight: 800;
        }

        .dropdown-footer-link:hover {
            background: #f1faff;
        }

        /* MENU AKUN */
        .user-account-trigger {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0;
            border: 0;
            color: inherit;
            background: transparent;
            text-align: left;
        }

        .account-chevron {
            margin-left: 2px;
            color: #7897ad;
            font-size: 10px;
            transition: transform .2s;
        }

        .user-account-trigger[aria-expanded="true"] .account-chevron {
            transform: rotate(180deg);
        }

        .account-dropdown {
            width: 300px;
        }

        .account-dropdown-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 18px;
            background: linear-gradient(120deg, #effaff, #f0fcf7);
        }

        .account-dropdown-header > div:last-child {
            min-width: 0;
        }

        .account-dropdown-header strong,
        .account-dropdown-header small {
            display: block;
            overflow-wrap: anywhere;
        }

        .account-dropdown-header strong {
            color: #12456e;
            font-size: 12px;
        }

        .account-dropdown-header small {
            margin-top: 5px;
            color: #7897ad;
            font-size: 10px;
        }

        .account-role {
            display: inline-block;
            margin-top: 8px;
            padding: 5px 8px;
            border-radius: 20px;
            color: #078c80;
            background: #dff8ef;
            font-size: 9px;
            font-weight: 800;
        }

        .account-menu-links {
            padding: 7px;
        }

        .account-menu-links a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px;
            border-radius: 9px;
            color: #426a83;
            font-size: 11px;
            font-weight: 700;
        }

        .account-menu-links a:hover {
            color: #008db5;
            background: #f0faff;
        }

        .account-menu-links a > i:first-child {
            width: 18px;
            text-align: center;
            font-size: 15px;
        }

        .account-menu-links .menu-arrow {
            margin-left: auto;
            color: #a2b8c7;
            font-size: 10px;
        }

        .account-logout-form {
            padding: 8px;
            border-top: 1px solid #e9f2f7;
        }

        .account-logout-form button {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 9px;
            color: #d64c5a;
            background: white;
            text-align: left;
            font-size: 11px;
            font-weight: 800;
        }

        .account-logout-form button:hover {
            background: #fff1f2;
        }

        @media (max-width: 700px) {
            .top-dropdown-menu {
                position: fixed;
                top: 68px;
                right: 10px;
                width: min(340px, calc(100vw - 20px));
            }

            .account-dropdown {
                width: min(300px, calc(100vw - 20px));
            }

            .user-account-trigger .user-text,
            .user-account-trigger .account-chevron {
                display: none;
            }
        }

        
        /* PERBAIKAN TOPBAR */
        .topbar {
            position: relative;
            z-index: 30;
        }

        .top-item {
            position: relative;
        }

        .notification-button {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            padding: 0;
            border-radius: 12px;
            color: #12456e;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .notification-button:hover,
        .notification-button:focus-visible {
            color: #008db5;
            background: #eaf8ff;
            outline: none;
        }

        .notification-button:focus-visible,
        .user-account-trigger:focus-visible {
            outline: 2px solid #009fbe;
            outline-offset: 3px;
        }

        .notification-dot {
            top: 2px;
            right: 2px;
            width: 17px;
            height: 17px;
            border: 2px solid white;
        }

        .user-account-trigger {
            border-radius: 12px;
            cursor: pointer;
        }

        .user-account-trigger:hover .user-avatar {
            box-shadow: 0 0 0 4px #e1f6fb;
        }

        .top-dropdown-menu {
            max-height: min(430px, calc(100vh - 100px));
        }

        .dropdown-scroll {
            max-height: 310px;
        }

        @media (max-width: 700px) {
            .topbar {
                gap: 8px;
                padding: 0 12px;
            }

            .topbar-context {
                gap: 7px;
            }

            .top-spacer {
                min-width: 0;
            }

            .top-item {
                gap: 6px;
                padding-left: 8px;
            }

            .weather {
                white-space: normal;
            }

            .weather strong {
                font-size: 10px;
            }

            .weather small {
                max-width: 85px;
                font-size: 9px;
            }
        }
        
        /* ==========================================
        LOGO DERAP SERAYU - SIDEBAR PENULIS
        ========================================== */

        .sidebar .brand {
            width: 100%;
            min-height: 125px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0;
            padding: 15px 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.16);
            text-align: center;
            text-decoration: none;
            overflow: hidden;
        }

        /* Area putih dibuat lebih lebar dan tinggi */
        .sidebar .brand .brand-logo-wrapper {
            width: 100%;
            max-width: 220px;
            height: 82px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 8px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.75);
            border-radius: 13px;
            background: #ffffff;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.15);
        }

        /* Logo diperbesar tanpa merusak proporsi */
        .sidebar .brand .brand-logo {
            display: block;
            width: 100%;
            height: 100%;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            object-position: center;
        }

        /* Pastikan logo tidak terkena aturan gambar sidebar lain */
        .sidebar .brand img {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        /* Sidebar ringkas pada layar tablet dan ponsel */
        @media (max-width: 820px) {
            .sidebar .brand {
                min-height: 76px;
                padding: 10px 5px;
            }

            .sidebar .brand .brand-logo-wrapper {
                width: 54px;
                height: 54px;
                padding: 4px;
                border-radius: 10px;
            }

            .sidebar.sidebar-open .brand {
                min-height: 115px;
                padding: 12px 10px;
            }

            .sidebar.sidebar-open .brand .brand-logo-wrapper {
                width: 100%;
                max-width: 200px;
                height: 76px;
                padding: 5px 8px;
            }
        }


        .brand-caption {
            margin-top: 0;
            font-size: 10px;
            line-height: 1.5;
            color: #c5e4ee;
            font-weight: 600;
            text-align: center;
        }

        /* Tampilan sidebar kecil */
        @media (max-width: 760px) {
            .brand {
                min-height: 76px;
                padding: 10px 5px;
                gap: 0;
            }

            .brand-logo-wrapper {
                width: 49px;
                height: 49px;
                padding: 5px;
                border-radius: 10px;
            }

            .brand-caption {
                display: none;
            }

            .sidebar.sidebar-open .brand {
                min-height: 110px;
                padding: 13px 15px;
                gap: 8px;
            }

            .sidebar.sidebar-open .brand-logo-wrapper {
                width: 100%;
                max-width: 190px;
                height: 60px;
                padding: 7px 12px;
            }

            .sidebar.sidebar-open .brand-caption {
                display: block;
            }
        }

        
        /* ===== TOPBAR PENULIS ===== */
        .topbar {
            position: relative;
            z-index: 100;
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 70px;
            background: #fff;
        }

        .top-spacer {
            flex: 1;
            min-width: 0;
        }

        .top-item {
            flex-shrink: 0;
        }

        .notification-button {
            position: relative;
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            padding: 0;
            border: 0;
            border-radius: 12px;
            color: #12456e;
            background: transparent;
            font-size: 19px;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .notification-button:hover,
        .notification-button[aria-expanded="true"] {
            color: #008db5;
            background: #eaf8ff;
        }

        .notification-dot {
            position: absolute;
            top: 2px;
            right: 2px;
            display: grid;
            place-items: center;
            min-width: 17px;
            height: 17px;
            padding: 0 3px;
            border: 2px solid #fff;
            border-radius: 20px;
            color: #fff;
            background: #ef5361;
            font-size: 9px;
            font-weight: 800;
        }

        .sun {
            flex-shrink: 0;
            color: #ffad1f;
            font-size: 22px;
        }

        .weather {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .weather strong,
        .weather small {
            display: block;
        }

        .weather strong {
            color: #12456e;
            font-size: 12px;
        }

        .weather small {
            margin-top: 3px;
            color: #7091ac;
            font-size: 10px;
        }

        .top-dropdown {
            position: relative;
        }

        .top-dropdown-menu {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            z-index: 200;
            display: none;
            width: 340px;
            max-height: min(430px, calc(100vh - 100px));
            overflow: auto;
            border: 1px solid #dcecf5;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 18px 45px rgba(4, 48, 73, .17);
        }

        .top-dropdown-menu.show {
            display: block;
            animation: dropdownAppear .18s ease;
        }

        .account-dropdown {
            width: 300px;
        }

        .dropdown-scroll {
            max-height: 310px;
            overflow-y: auto;
        }

        @keyframes dropdownAppear {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 700px) {
            .topbar {
                gap: 5px;
                padding: 0 10px;
            }

            .topbar-context {
                gap: 6px;
                font-size: 10px;
            }

            .top-item {
                gap: 5px;
                padding-left: 6px;
            }

            .weather {
                gap: 5px;
            }

            .weather .sun {
                font-size: 18px;
            }

            .weather strong {
                font-size: 10px;
            }

            .weather small {
                max-width: 80px;
                font-size: 9px;
                white-space: normal;
            }

            .user-account-trigger .user-text,
            .user-account-trigger .account-chevron {
                display: none;
            }

            .top-dropdown-menu,
            .account-dropdown {
                position: fixed;
                top: 68px;
                right: 10px;
                width: min(340px, calc(100vw - 20px));
            }
        }

        .notification-dropdown {
            width: 325px;
            max-width: calc(100vw - 30px);
            box-sizing: border-box;
            overflow: hidden;
        }

        /* Header notifikasi */
        .notification-dropdown .dropdown-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            width: 100%;
            min-width: 0;
            box-sizing: border-box;
        }

        /* Area daftar notifikasi */
        .notification-dropdown .dropdown-scroll {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;

            overflow-x: hidden;
            overflow-y: auto;

            scrollbar-width: thin;
            scrollbar-color: #b8cbd5 transparent;
        }

        /* Item notifikasi */
        .notification-dropdown .dropdown-notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;

            overflow-wrap: anywhere;
        }

        /* Ikon tidak ikut mengecil */
        .notification-dropdown .dropdown-notice-icon {
            flex: 0 0 36px;
        }

        /* Teks boleh turun ke baris berikutnya */
        .notification-dropdown .dropdown-notice-text {
            flex: 1 1 0;
            min-width: 0;
            max-width: 100%;

            overflow-wrap: anywhere;
            word-break: break-word;
        }

        /* Judul dan keterangan artikel */
        .notification-dropdown .dropdown-notice-text strong,
        .notification-dropdown .dropdown-notice-text small {
            display: block;
            max-width: 100%;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        /* Catatan revisi */
        .notification-dropdown .notice-note {
            white-space: normal;
            overflow-wrap: anywhere;
        }

        /* Pesan ketika tidak ada notifikasi */
        .notification-dropdown .dropdown-empty {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;
            padding: 24px 14px;
            text-align: center;
            overflow-wrap: anywhere;
        }

        /* Footer dropdown */
        .notification-dropdown .dropdown-footer-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;

            width: 100%;
            max-width: 100%;
            min-width: 0;
            box-sizing: border-box;

            overflow-wrap: anywhere;
        }

        /* Tampilan ponsel */
        @media (max-width: 480px) {
            .notification-dropdown {
                width: min(325px, calc(100vw - 24px));
                max-width: calc(100vw - 24px);
            }
        }

    </style>
</head>
<body>

<aside class="sidebar">
    <a href="{{ route('penulis.dashboard') }}" class="brand">
        <span class="brand-logo-wrapper">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Derap Serayu"
                 class="brand-logo">
        </span>
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
</aside>

<main class="main">
    <div class="topbar">
        <div class="topbar-context">
            <i class="fa-solid fa-pen-nib"></i>
            <span>Ruang Kerja Penulis</span>
        </div>

        <div class="top-spacer"></div>

            @php
                $artikelPerhatian = $artikelPerhatian ?? collect();
                $jumlahNotifikasi = $artikelPerhatian->count();
            @endphp

            <div class="top-item top-dropdown">
                <button type="button"
                        class="notification-button dropdown-trigger"
                        id="notificationToggle"
                        aria-label="Buka notifikasi"
                        aria-expanded="false"
                        onclick="toggleTopDropdown('notificationDropdown', this)">
                    <i class="fa-regular fa-bell"></i>

                    @if($jumlahNotifikasi > 0)
                        <span class="notification-dot">
                            {{ $jumlahNotifikasi > 9 ? '9+' : $jumlahNotifikasi }}
                        </span>
                    @endif
                </button>

                <div class="top-dropdown-menu notification-dropdown"
                    id="notificationDropdown">

                    <div class="dropdown-heading">
                        <div>
                            <strong>Notifikasi</strong>
                            <small>Informasi terbaru artikelmu</small>
                        </div>

                        <i class="fa-regular fa-bell"></i>
                    </div>

                    <div class="dropdown-scroll">
                        @forelse($artikelPerhatian as $artikel)
                            <a href="{{ route('penulis.articles.edit', $artikel) }}"
                            class="dropdown-notice">

                                <span class="dropdown-notice-icon
                                    {{ $artikel->status === 'rejected' ? 'notice-orange' : 'notice-blue' }}">
                                    <i class="fa-solid
                                        {{ $artikel->status === 'rejected' ? 'fa-pen-to-square' : 'fa-clock' }}">
                                    </i>
                                </span>

                                <span class="dropdown-notice-text">
                                    <strong>
                                        {{ $artikel->status === 'rejected'
                                            ? 'Artikel perlu direvisi'
                                            : 'Artikel menunggu tinjauan' }}
                                    </strong>

                                    <small>{{ $artikel->title }}</small>

                                    @if($artikel->review_note)
                                        <small class="notice-note">
                                            Catatan: {{ $artikel->review_note }}
                                        </small>
                                    @endif

                                    <small class="notice-date">
                                        {{ $artikel->updated_at->format('d M Y, H:i') }}
                                    </small>
                                </span>
                            </a>
                        @empty
                            <div class="dropdown-empty">
                                <i class="fa-regular fa-circle-check"></i>
                                <strong>Semua aman!</strong>
                                <p>Belum ada artikel yang perlu ditinjau atau direvisi.</p>
                            </div>
                        @endforelse
                    </div>

                    <a href="{{ route('penulis.articles.index') }}"
                    class="dropdown-footer-link">
                        Lihat semua artikel
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

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
                        <small>Penulis</small>
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
                                <i class="fa-solid fa-pen-nib"></i> Akun Penulis
                            </span>
                        </div>
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
        
    /* ==========================================
    CUACA BANJARNEGARA - OPEN-METEO
    ========================================== */
    async function loadBanjarnegaraWeather() {
        const temperature = document.getElementById('weatherTemperature');
        const description = document.getElementById('weatherDescription');
        const icon = document.getElementById('weatherIcon');
        const widget = document.getElementById('weatherWidget');

        if (!temperature || !description || !icon) return;

        const weatherMap = {
            0: ['Cerah', 'fa-sun'],
            1: ['Cerah berawan', 'fa-cloud-sun'],
            2: ['Berawan sebagian', 'fa-cloud-sun'],
            3: ['Berawan', 'fa-cloud'],
            45: ['Berkabut', 'fa-smog'],
            48: ['Kabut tebal', 'fa-smog'],
            51: ['Gerimis ringan', 'fa-cloud-rain'],
            53: ['Gerimis', 'fa-cloud-rain'],
            55: ['Gerimis lebat', 'fa-cloud-showers-heavy'],
            61: ['Hujan ringan', 'fa-cloud-rain'],
            63: ['Hujan sedang', 'fa-cloud-showers-heavy'],
            65: ['Hujan lebat', 'fa-cloud-showers-heavy'],
            71: ['Salju ringan', 'fa-snowflake'],
            73: ['Salju', 'fa-snowflake'],
            75: ['Salju lebat', 'fa-snowflake'],
            80: ['Hujan lokal', 'fa-cloud-rain'],
            81: ['Hujan lokal', 'fa-cloud-showers-heavy'],
            82: ['Hujan lokal lebat', 'fa-cloud-showers-heavy'],
            95: ['Badai petir', 'fa-cloud-bolt'],
            96: ['Badai petir dan hujan es', 'fa-cloud-bolt'],
            99: ['Badai petir kuat', 'fa-cloud-bolt']
        };

        temperature.textContent = 'Memuat...';
        description.textContent = 'Cuaca Banjarnegara';
        icon.className = 'fa-solid fa-cloud-sun sun';

        try {
            const url = new URL('https://api.open-meteo.com/v1/forecast');

            url.search = new URLSearchParams({
                latitude: '-7.396',
                longitude: '109.691',
                current: 'temperature_2m,weather_code,is_day',
                timezone: 'Asia/Jakarta'
            }).toString();

            const response = await fetch(url.toString(), {
                headers: { Accept: 'application/json' }
            });

            if (!response.ok) {
                throw new Error('Gagal mengambil data cuaca');
            }

            const data = await response.json();
            const current = data.current;

            if (!current || typeof current.temperature_2m !== 'number') {
                throw new Error('Data cuaca tidak valid');
            }

            const weather = weatherMap[current.weather_code]
                || ['Kondisi cuaca', 'fa-cloud'];

            temperature.textContent =
                `${Math.round(current.temperature_2m)}°C`;

            description.textContent = weather[0];
            icon.className = `fa-solid ${weather[1]} sun`;
            icon.style.color = current.is_day ? '#ffad1f' : '#7294ad';

            if (widget) {
                widget.title =
                    `Cuaca Banjarnegara: ${weather[0]}, ${temperature.textContent}`;
            }
        } catch (error) {
            console.error('Gagal memuat cuaca:', error);

            temperature.textContent = '--°C';
            description.textContent = 'Cuaca tidak tersedia';
            icon.className = 'fa-solid fa-cloud sun';
            icon.style.color = '#7294ad';

            if (widget) {
                widget.title = 'Data cuaca tidak dapat dimuat. Periksa koneksi internet.';
            }
        }
    }

    /* ==========================================
    DROPDOWN AKUN DAN NOTIFIKASI
    ========================================== */
    function toggleTopDropdown(dropdownId, trigger) {
        const dropdown = document.getElementById(dropdownId);

        if (!dropdown || !trigger) return;

        const shouldOpen = !dropdown.classList.contains('show');

        // Tutup semua dropdown terlebih dahulu.
        document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });

        document.querySelectorAll('.dropdown-trigger').forEach(button => {
            button.setAttribute('aria-expanded', 'false');
        });

        // Buka dropdown yang dipilih.
        if (shouldOpen) {
            dropdown.classList.add('show');
            trigger.setAttribute('aria-expanded', 'true');
        }
    }

    /* Tutup dropdown ketika klik di luar menu. */
    document.addEventListener('click', function (event) {
        if (event.target.closest('.top-dropdown')) return;

        document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });

        document.querySelectorAll('.dropdown-trigger').forEach(button => {
            button.setAttribute('aria-expanded', 'false');
        });
    });

    /* Tutup dropdown dengan tombol Escape. */
    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') return;

        document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
            menu.classList.remove('show');
        });

        document.querySelectorAll('.dropdown-trigger').forEach(button => {
            button.setAttribute('aria-expanded', 'false');
        });
    });

    /* Muat cuaca sekali saat halaman dibuka. */
    loadBanjarnegaraWeather();

    /* Perbarui cuaca setiap 10 menit. */
    setInterval(loadBanjarnegaraWeather, 10 * 60 * 1000);


    // Tutup dropdown saat klik di luar menu.
    document.addEventListener('click', function (event) {
        if (!event.target.closest('.top-dropdown')) {
            document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });

            document.querySelectorAll('.dropdown-trigger').forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });

    // Tutup dropdown saat tombol Escape ditekan.
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.top-dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });

            document.querySelectorAll('.dropdown-trigger').forEach(button => {
                button.setAttribute('aria-expanded', 'false');
            });
        }
    });

    document.addEventListener('click', function (event) {
        if (!event.target.closest('.top-dropdown')) {
            document.querySelectorAll('.top-dropdown-menu.show')
                .forEach(menu => menu.classList.remove('show'));

            document.querySelectorAll('.dropdown-trigger')
                .forEach(button => {
                    button.setAttribute('aria-expanded', 'false');
                });
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.top-dropdown-menu.show')
                .forEach(menu => menu.classList.remove('show'));

            document.querySelectorAll('.dropdown-trigger')
                .forEach(button => {
                    button.setAttribute('aria-expanded', 'false');
                });
        }
    });

    loadBanjarnegaraWeather();

    // Perbarui informasi cuaca setiap 10 menit.
    setInterval(loadBanjarnegaraWeather, 10 * 60 * 1000);

</script>
</body>
</html>