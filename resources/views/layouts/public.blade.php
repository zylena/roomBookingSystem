<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Escape Room Booking System') - Escape Rooms</title>
    <style>
        :root {
            --primary: #2d6cdf;
            --dark: #1a1f2e;
            --muted: #6b7280;
            --bg: #f7f9fc;
            --card: #ffffff;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            --radius: 12px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: var(--bg);
            color: #1f2937;
            line-height: 1.5;
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        header {
            background: #ffffff;
            border-bottom: 1px solid rgba(15, 23, 42, 0.08);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.25rem;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 68px;
        }

        .nav__brand {
            font-weight: 800;
            letter-spacing: -0.02em;
            font-size: 1.2rem;
            color: var(--dark);
        }

        .nav__menu {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav__menu a,
        .nav__menu form button {
            padding: 0.55rem 0.9rem;
            border-radius: 8px;
            border: 1px solid transparent;
            font-size: 0.9rem;
            background: transparent;
            cursor: pointer;
        }

        .nav__menu a:hover,
        .nav__menu form button:hover {
            background: rgba(45, 108, 223, 0.08);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.65rem 1.1rem;
            border-radius: 999px;
            border: 1px solid transparent;
            background: var(--primary);
            color: #fff;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
        }

         .btnRegister {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.65rem 1.1rem;
            border-radius: 999px;
            border: 1px solid transparent;
            background: var(--primary);
            color: #0e42ee;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
        }

        .btn--secondary {
            background: rgba(45, 108, 223, 0.08);
            color: var(--dark);
            border-color: rgba(45, 108, 223, 0.2);
        }

        .hero {
            padding: 5rem 0 3rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.75rem;
            margin: 0;
            line-height: 1.1;
        }

        .hero p {
            margin: 1.2rem auto 2rem;
            max-width: 560px;
            color: var(--muted);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.2rem;
            margin-top: 2rem;
        }

        .card {
            background: var(--card);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1.4rem;
            border: 1px solid rgba(15, 23, 42, 0.05);
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 0.6rem;
            font-size: 1.15rem;
        }

        .badge {
            display: inline-flex;
            padding: 0.2rem 0.6rem;
            border-radius: 999px;
            background: rgba(45, 108, 223, 0.15);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        footer {
            margin-top: 3rem;
            padding: 2.5rem 0;
            background: #0f172a;
            color: rgba(255, 255, 255, 0.7);
        }

        footer a {
            color: rgba(255, 255, 255, 0.8);
        }

        footer .footer__grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            max-width: 1100px;
            margin: 0 auto;
        }

        @media (max-width: 700px) {
            .nav__menu {
                display: none;
            }

            .hero h1 {
                font-size: 2.2rem;
            }
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            border: 1px solid rgba(34, 197, 94, 0.3);
            background: rgba(34, 197, 94, 0.1);
            color: #065f46;
            margin-bottom: 1.25rem;
        }

        .form-field {
            margin-bottom: 1rem;
        }

        .form-field label {
            display: block;
            margin-bottom: 0.35rem;
            font-weight: 600;
            color: #334155;
        }

        .form-field input,
        .form-field textarea,
        .form-field select {
            width: 100%;
            padding: 0.75rem 0.85rem;
            border-radius: 10px;
            border: 1px solid rgba(15, 23, 42, 0.16);
            font-size: 0.95rem;
            background: #ffffff;
        }

        .form-field textarea {
            min-height: 140px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }

    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="nav">
            <a href="{{ route('public.home') }}" class="nav__brand">Escape Room Booking</a>

            <nav class="nav__menu" aria-label="Primary navigation">
                <a href="{{ route('public.home') }}">Home</a>
                <a href="{{ route('public.rooms.index') }}">Rooms</a>
                <a href="{{ route('public.about') }}">About</a>
                <a href="{{ route('public.contact') }}">Contact</a>

                @if(session('app_user'))
                    @if(session('app_user.role') === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn--secondary">Admin</a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="btn btn--secondary">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('public.logout') }}" style="display:inline">
                        @csrf
                        <button type="submit" class="btn" style="background:#ef4444;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('public.login') }}" class="btn btn--secondary">Login</a>
                    <a href="{{ route('public.register') }}" class="btnRegister">Register</a>
                @endif
            </nav>
        </div>
    </div>
</header>

<main class="container" style="padding-top: 2.2rem;">
    @yield('content')
</main>

<footer>
    <div class="footer__grid">
        <div>
            <h4 style="color: #fff; margin-bottom: 0.75rem;">Escape Room Booking</h4>
            <p style="margin:0; max-width: 320px;">A clean starter scaffold for an escape room booking system built with Laravel.</p>
        </div>

        <div>
            <h4 style="color: #fff; margin-bottom: 0.75rem;">Quick links</h4>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li><a href="{{ route('public.rooms.index') }}">Rooms</a></li>
                <li><a href="{{ route('public.about') }}">About</a></li>
                <li><a href="{{ route('public.contact') }}">Contact</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color: #fff; margin-bottom: 0.75rem;">Support</h4>
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li><a href="#">Help center</a></li>
                <li><a href="{{ route('public.privacy') }}">Privacy</a></li>
<li><a href="{{ route('public.terms') }}">Terms</a></li>
            </ul>
        </div>

        <div>
            <h4 style="color:#fff;margin-bottom:0.75rem;">Quick links</h4>
            <ul style="list-style:none;padding:0;margin:0;">
                <li><a href="{{ route('public.rooms.index') }}">Rooms</a></li>
                <li><a href="{{ route('public.about') }}">About</a></li>
                <li><a href="{{ route('public.contact') }}">Contact</a></li>
                <li><a href="{{ route('public.faq') }}">FAQ / Rules</a></li>  <!-- Added this line -->
            </ul>
        </div>

        <div>
            <h4 style="color: #fff; margin-bottom: 0.75rem;">Stay connected</h4>
            <p style="margin: 0;">Follow us on social media for news and updates.</p>
        </div>
    </div>

    <div style="margin-top: 2rem; text-align: center; color: rgba(255,255,255,0.6); font-size: 0.85rem;">
        &copy; {{ date('Y') }} Escape Room Booking. All rights reserved.
    </div>
</footer>
</body>
</html>
