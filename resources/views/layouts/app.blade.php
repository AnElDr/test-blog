<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blog')</title>

    <style>
        :root {
            --bg:#0b1220;
            --card:#121b2f;
            --text:#e8eefc;
            --muted:#a7b3d1;
            --line:#22304f;
            --accent:#7aa2ff;
            --danger:#ff6b6b;
            --success:#4ade80;
        }

        * { box-sizing: border-box; }
        body {
            margin:0;
            font-family: ui-sans-serif, system-ui, -apple-system;
            background:linear-gradient(180deg,#081024,#0b1220);
            color:var(--text);
        }

        a { color: inherit; text-decoration: none; }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .nav {
            position: sticky;
            top:0;
            backdrop-filter: blur(8px);
            background: rgba(8,16,36,.85);
            border-bottom: 1px solid var(--line);
        }

        .nav-inner {
            max-width:1000px;
            margin:0 auto;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:14px 20px;
        }

        .brand { font-weight:700; }

        .links { display:flex; gap:10px; }

        .link {
            padding:8px 12px;
            border-radius:10px;
            color:var(--muted);
            border:1px solid transparent;
        }

        .link:hover {
            color:var(--text);
            border-color:rgba(122,162,255,.4);
        }

        .link.active {
            color:var(--text);
            background:rgba(122,162,255,.15);
            border-color:rgba(122,162,255,.5);
        }

        .card {
            background:var(--card);
            border:1px solid var(--line);
            border-radius:16px;
            padding:16px;
            margin-bottom:16px;
            box-shadow:0 10px 30px rgba(0,0,0,.25);
        }

        .btn {
            display:inline-block;
            padding:8px 12px;
            border-radius:10px;
            border:1px solid var(--line);
            background:rgba(122,162,255,.12);
            cursor:pointer;
        }

        .btn-danger {
            background:rgba(255,107,107,.12);
            border-color:rgba(255,107,107,.4);
        }

        .btn-success {
            background:rgba(74,222,128,.12);
            border-color:rgba(74,222,128,.4);
        }

        input, textarea {
            width:100%;
            padding:8px;
            border-radius:8px;
            border:1px solid var(--line);
            background:#0f1730;
            color:var(--text);
            margin-bottom:12px;
        }

        table {
            width:100%;
            border-collapse: collapse;
        }

        th, td {
            padding:10px;
            border-bottom:1px solid var(--line);
            text-align:left;
        }

        img.thumb {
            max-width:200px;
            border-radius:10px;
            border:1px solid var(--line);
        }

        .meta {
            color:var(--muted);
            font-size:14px;
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<header class="nav">
    <div class="nav-inner">
        <div class="brand">
            <a href="{{ route('front.home') }}">Blog System</a>
        </div>

        <nav class="links">
            <a class="link {{ request()->routeIs('front.*') ? 'active' : '' }}"
            href="{{ route('front.home') }}">
                {{ app()->getLocale() === 'lv' ? 'Sākums' : 'Home' }}
            </a>

            <a class="link {{ request()->routeIs('admin.*') ? 'active' : '' }}"
            href="{{ route('admin.news.index') }}">
                Admin
            </a>

            @php($current = app()->getLocale())

            <a class="link {{ $current === 'en' ? 'active' : '' }}"
            href="{{ route('lang.switch', 'en') }}">
                EN
            </a>

            <a class="link {{ $current === 'lv' ? 'active' : '' }}"
            href="{{ route('lang.switch', 'lv') }}">
                LV
            </a>
        </nav>
    </div>
</header>

<main class="container">
    @if(session('success'))
        <div class="card" style="border-color: var(--success);">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>