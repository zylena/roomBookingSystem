<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard') - Escape Room Booking</title>
    <style>
        :root {
            --bg: #f4f6fb;
            --panel: #ffffff;
            --primary: #2d6cdf;
            --text: #1f2937;
            --muted: #64748b;
            --shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            --radius: 16px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        a { color: var(--primary); text-decoration: none; }
        a:hover { text-decoration: underline; }

        .app {
            display: grid;
            grid-template-rows: 60px 1fr;
            height: 100vh;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.25rem;
            background: #ffffff;
            border-bottom: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .topbar__brand {
            font-weight: 700;
            letter-spacing: -0.02em;
            font-size: 1.1rem;
        }

        .topbar__actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .topbar__actions button {
            padding: 0.45rem 0.9rem;
            border-radius: 999px;
            border: 1px solid rgba(15, 23, 42, 0.1);
            background: rgba(45, 108, 223, 0.08);
            cursor: pointer;
        }

        .main {
            display: grid;
            grid-template-columns: 260px 1fr;
            height: 100%;
        }

        .sidebar {
            background: #ffffff;
            border-right: 1px solid rgba(15, 23, 42, 0.08);
            padding: 1.5rem 1.25rem;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.55rem;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            color: var(--text);
            font-weight: 600;
        }

        .sidebar nav a.active,
        .sidebar nav a:hover {
            background: rgba(45, 108, 223, 0.12);
            color: var(--primary);
        }

        .content {
            padding: 1.75rem;
            overflow-y: auto;
        }

        .heading {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .heading h1 {
            margin: 0;
            font-size: 1.75rem;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.2rem;
            margin-top: 1.25rem;
        }

        .card {
            background: var(--panel);
            border-radius: var(--radius);
            padding: 1.2rem;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table th,
        table td {
            padding: 0.75rem 0.85rem;
            border-bottom: 1px solid rgba(15, 23, 42, 0.08);
        }

        .badge {
            display: inline-flex;
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            background: rgba(45, 108, 223, 0.12);
            color: var(--primary);
            font-weight: 600;
            font-size: 0.75rem;
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            border: 1px solid rgba(34, 197, 94, 0.3);
            background: rgba(34, 197, 94, 0.1);
            color: #065f46;
            margin-bottom: 1.25rem;
        }

        @media (max-width: 900px) {
            .main {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: sticky;
                top: 60px;
                z-index: 10;
            }

            .content {
                padding-top: 1rem;
            }
        }
    </style>
</head>
<body>
<div class="app">
    <header class="topbar">
        <div class="topbar__brand"><a href="{{ route('admin.dashboard') }}">Escape Room Admin</a></div>
        <div class="topbar__actions">
            <span style="color: var(--muted);">Signed in as <strong>{{ session('app_user.name') ?? 'Admin' }}</strong></span>
            <form method="POST" action="{{ route('public.logout') }}" style="display:inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>

    <div class="main">
        <aside class="sidebar">
            <nav aria-label="Admin navigation">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.rooms.index') }}" class="{{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}">Manage Rooms</a>
                <a href="{{ route('admin.bookings.index') }}" class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">Manage Bookings</a>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Manage Users</a>
                <a href="{{ route('admin.reports.index') }}" class="{{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">Reports</a>
                <a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">Settings</a>
            </nav>
        </aside>

        <main class="content">
            @if(session('status'))
                <div class="alert">{{ session('status') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
