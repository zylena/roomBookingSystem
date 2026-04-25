@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
    <div class="heading">
      <h1>Welcome back, {{ auth()->user()->name ?? 'Player' }}!</h1>
        <p style="color: rgba(31, 41, 55, 0.75); max-width: 720px;">This is your customer dashboard. From here you can manage bookings, update your profile, and view your history.</p>
    </div>

    <div class="card-grid">
        <div class="card">
            <h3>Upcoming bookings</h3>
            <p style="margin: 0.6rem 0 1rem; color: rgba(31, 41, 55, 0.75);">You have <strong>{{ $stats['upcomingBookings'] }}</strong> active bookings.</p>
            <a href="{{ route('user.bookings.index') }}" class="btn" style="font-size: 0.9rem;">View bookings</a>
        </div>

        <div class="card">
            <h3>Booking history</h3>
            <p style="margin: 0.6rem 0 1rem; color: rgba(31, 41, 55, 0.75);">You have completed <strong>{{ $stats['pastBookings'] }}</strong> bookings.</p>
            <a href="{{ route('user.history') }}" class="btn" style="font-size: 0.9rem;">View history</a>
        </div>
    </div>
@endsection
