@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="heading">
        <h1>Admin dashboard</h1>
        <p style="color: rgba(31, 41, 55, 0.74);">Here you can keep track of system activity, manage rooms, bookings, and users.</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Total rooms</h3>
            <p style="font-size: 2.2rem; margin: 0.5rem 0;">{{ $metrics['totalRooms'] }}</p>
            <p style="color: rgba(31, 41, 55, 0.75);">Active rooms in the system.</p>
        </div>

        <div class="card">
            <h3>Active bookings</h3>
            <p style="font-size: 2.2rem; margin: 0.5rem 0;">{{ $metrics['activeBookings'] }}</p>
            <p style="color: rgba(31, 41, 55, 0.75);">Bookings that are confirmed or pending.</p>
        </div>

        <div class="card">
            <h3>Registered users</h3>
            <p style="font-size: 2.2rem; margin: 0.5rem 0;">{{ $metrics['registeredUsers'] }}</p>
            <p style="color: rgba(31, 41, 55, 0.75);">Total number of users in the system.</p>
        </div>
    </div>

    <div class="card" style="margin-top: 1.5rem;">
        <h2 style="margin-top: 0;">Quick links</h2>
        <ul style="list-style: none; padding: 0; margin: 0.7rem 0 0 0;">
            <li style="margin-bottom: 0.6rem;"><a href="{{ route('admin.rooms.index') }}">Manage rooms</a></li>
            <li style="margin-bottom: 0.6rem;"><a href="{{ route('admin.bookings.index') }}">View bookings</a></li>
            <li style="margin-bottom: 0.6rem;"><a href="{{ route('admin.users.index') }}">Manage users</a></li>
            
        </ul>
    </div>
@endsection
