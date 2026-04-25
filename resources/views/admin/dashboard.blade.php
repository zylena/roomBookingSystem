@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="heading">
        <div>
            <h1>Admin dashboard</h1>
            <p class="heading-desc">Here you can keep track of system activity, manage rooms, bookings, and users.</p>
        </div>
    </div>

    <div class="cards">
        <div class="card">
            <div class="card-icon" style="background: rgba(45, 108, 223, 0.1);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2d6cdf" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
            </div>
            <h3>Total rooms</h3>
            <p class="metric">{{ $metrics['totalRooms'] }}</p>
            <p class="card-desc">Active rooms in the system.</p>
        </div>

        <div class="card">
            <div class="card-icon" style="background: rgba(34, 197, 94, 0.1);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </div>
            <h3>Active bookings</h3>
            <p class="metric">{{ $metrics['activeBookings'] }}</p>
            <p class="card-desc">Bookings that are confirmed or pending.</p>
        </div>

        <div class="card">
            <div class="card-icon" style="background: rgba(124, 58, 237, 0.1);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <h3>Registered users</h3>
            <p class="metric">{{ $metrics['registeredUsers'] }}</p>
            <p class="card-desc">Total number of users in the system.</p>
        </div>
    </div>

    <div class="card" style="margin-top: 1.5rem;">
        <h2 style="margin-top: 0;">Quick links</h2>

        <div class="quick-links">
            <a href="{{ route('admin.rooms.index') }}" class="quick-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                </svg>
                Manage rooms
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="quick-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                </svg>
                View bookings
            </a>
            <a href="{{ route('admin.users.index') }}" class="quick-link">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                </svg>
                Manage users
            </a>
        </div>
    </div>

@endsection
