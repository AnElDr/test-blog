<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blog')</title>

    <style>
        :root { --bg:#0b1220; --card:#121b2f; --text:#e8eefc; --muted:#a7b3d1; --line:#22304f; --accent:#7aa2ff; }
        * { box-sizing: border-box; }
        body { margin:0; font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial; background:linear-gradient(180deg,#081024,#0b1220); color:var(--text); }
        a { color: inherit; text-decoration: none; }
        .container { max-width: 1000px; margin: 0 auto; padding: 18px; }

        /* Nav */
        .nav { position: sticky; top:0; z-index: 10; backdrop-filter: blur(10px); background: rgba(8,16,36,.75); border-bottom: 1px solid var(--line); }
        .nav-inner { display:flex; align-items:center; justify-content:space-between; gap: 12px; padding: 14px 18px; max-width: 1000px; margin: 0 auto; }
        .brand { font-weight: 700; letter-spacing: .4px; }
        .links { display:flex; gap: 10px; flex-wrap: wrap; }
        .link { padding: 8px 10px; border-radius: 10px; color: var(--muted); border: 1px solid transparent; }
        .link:hover { color: var(--text); border-color: rgba(122,162,255,.35); }
        .link.active { color: var(--text); background: rgba(122,162,255,.12); border-color: rgba(122,162,255,.45); }

        /* Page */
        .page-title { margin: 18px 0 10px; font-size: 28px; }
        .subtle { color: var(--muted); }

        /* Cards */
        .grid { display:grid; grid-template-columns: repeat(12, 1fr); gap: 14px; }
        .card { grid-column: span 12; background: rgba(18,27,47,.9); border: 1px solid var(--line); border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,.25); }
        @media (min-width: 720px) { .card { grid-column: span 6; } }

        .card-body { padding: 14px; }
        .card h2 { margin: 0 0 6px; font-size: 18px; }
        .meta { font-size: 13px; color: var(--muted); margin-bottom: 10px; }
        .excerpt { color: #d7e0ff; line-height: 1.5; }

        .thumb { width:100%; height: 190px; object-fit: cover; display:block; background: #0f1730; }

        /* Article */
        .article { background: rgba(18,27,47,.9); border: 1px solid var(--line); border-radius: 16px; padding: 18px; box-shadow: 0 10px 30px rgba(0,0,0,.25); }
        .article h1 { margin: 0 0 10px; font-size: 30px; }
        .article img { width: 100%; max-height: 420px; object-fit: cover; border-radius: 14px; border: 1px solid var(--line); margin: 12px 0; }
        .article p { line-height: 1.7; color: #d7e0ff; }

        /* Buttons */
        .btn { display:inline-block; padding: 9px 12px; border-radius: 12px; border: 1px solid var(--line); color: var(--text); background: rgba(122,162,255,.12); }
        .btn:hover { border-color: rgba(122,162,255,.55); }

        /* Pagination (simple) */
        .pagination { display:flex; gap:8px; flex-wrap:wrap; margin: 16px 0 0; }
        .pagination a, .pagination span { padding: 8px 10px; border-radius: 10px; border:1px solid var(--line); color: var(--muted); }
        .pagination .active span { color: var(--text); background: rgba(122,162,255,.12); border-color: rgba(122,162,255,.45); }
    </style>
</head>
<body>

<header class="nav">
    <div class="nav-inner">
        <div class="brand">
            <a href="{{ route('front.home') }}">TEST BLOG</a>
        </div>

        <nav class="links">
            <a class="link {{ request()->routeIs('front.home') ? 'active' : '' }}"
               href="{{ route('front.home') }}">Home</a>

            <a class="link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}"
               href="{{ route('admin.news.index') }}">Admin</a>
        </nav>
    </div>
</header>

<main class="container">
    @yield('content')
</main>

</body>
</html>