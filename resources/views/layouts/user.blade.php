<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'User Dashboard') - Escape Room Booking</title>
    <style>
        :root {
            --primary: #2d6cdf;
            --dark: #0f172a;
            --muted: #64748b;
            --bg: #f8fafc;
            --panel: #ffffff;
            --shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            --radius: 16px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: var(--bg);
            color: var(--dark);
            min-height: 100vh;
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

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0.9rem 1.25rem;
        }

        .brand {
            font-weight: 700;
            letter-spacing: -0.02em;
            font-size: 1.15rem;
        }

        .topbar__actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar__actions .btn {
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, 0.1);
            background: rgba(45, 108, 223, 0.08);
            color: var(--dark);
            font-weight: 600;
            cursor: pointer;
        }

        .layout {
            display: grid;
            grid-template-columns: 260px 1fr;
            max-width: 1100px;
            margin: 1.5rem auto;
            gap: 1.5rem;
            padding: 0 1.25rem;
        }

        .sidebar {
            background: var(--panel);
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            position: sticky;
            top: 88px;
            align-self: start;
        }

        .sidebar nav a {
            display: block;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            margin-bottom: 0.4rem;
            color: var(--dark);
            font-weight: 600;
        }

        .sidebar nav a.active,
        .sidebar nav a:hover {
            background: rgba(45, 108, 223, 0.1);
            color: var(--primary);
        }

        .content {
            background: var(--panel);
            border-radius: var(--radius);
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: var(--shadow);
            padding: 1.75rem;
        }

        .content h1 {
            margin-top: 0;
        }

        .card-grid {
            display: grid;
            gap: 1.2rem;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            margin-top: 1rem;
        }

        .card {
            background: #ffffff;
            border-radius: 14px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            padding: 1.2rem;
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table th,
        table td {
            text-align: left;
            padding: 0.75rem 0.85rem;
            border-bottom: 1px solid rgba(15, 23, 42, 0.08);
        }

        .badge {
            display: inline-flex;
            padding: 0.25rem 0.55rem;
            border-radius: 999px;
            background: rgba(45, 108, 223, 0.12);
            color: var(--primary);
            font-weight: 600;
            font-size: 0.75rem;
        }

        .status--pending {
            background: rgba(251, 191, 36, 0.22);
            color: #b45309;
        }

        .status--confirmed {
            background: rgba(34, 197, 94, 0.17);
            color: #166534;
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

        .button-row {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1.2rem;
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            border: 1px solid rgba(34, 197, 94, 0.3);
            background: rgba(34, 197, 94, 0.1);
            color: #065f46;
            margin-bottom: 1.25rem;
        }

        @media (max-width: 860px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: relative;
                top: 0;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="topbar">
        <div class="brand">Escape Room Booking</div>

        <div class="topbar__actions">
            <span style="color: var(--muted);">
                Logged in as <strong>{{ auth()->user()->name }}</strong>

                 @if(auth()->user()->role)
                        ({{ auth()->user()->role }})
                    @endif
            </span>

            <form method="POST" action="{{ route('public.logout') }}" style="display:inline">
                @csrf
                <button type="submit" class="btn" style="background: #ef4444; color: #fff;">
                    Logout
                </button>
            </form>

            
        </div>
    </div>
</header>

<div class="layout">
    <aside class="sidebar">
        <nav aria-label="User navigation">
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('user.bookings.index') }}" class="{{ request()->routeIs('user.bookings.*') ? 'active' : '' }}">My Bookings</a>
            <a href="{{ route('user.bookings.create') }}" class="{{ request()->routeIs('user.bookings.create') ? 'active' : '' }}">New Booking</a>
            <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">My Profile</a>
            <a href="{{ route('user.history') }}" class="{{ request()->routeIs('user.history') ? 'active' : '' }}">Booking History</a>
        </nav>
    </aside>

    <section class="content">
        @if(session('status'))
            <div class="alert">{{ session('status') }}</div>
        @endif

        @yield('content')
    </section>
</div>
</body>
</html>
