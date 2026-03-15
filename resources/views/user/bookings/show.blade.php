@extends('layouts.user')

@section('title', 'Booking Details')

@section('content')
    <h1>Booking #{{ $booking['id'] }}</h1>

    <div class="card" style="margin-top: 1rem;">
        <h2 style="margin-top: 0;">{{ $booking['room'] }}</h2>
        <p style="color: rgba(31, 41, 55, 0.8); margin-top: 0.25rem;">{{ $booking['notes'] }}</p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-top: 1.5rem;">
            <div>
                <strong>Date</strong>
                <p>{{ $booking['date'] }}</p>
            </div>
            <div>
                <strong>Time</strong>
                <p>{{ $booking['time'] }}</p>
            </div>
            <div>
                <strong>Participants</strong>
                <p>{{ $booking['participants'] }}</p>
            </div>
            <div>
                <strong>Status</strong>
                <p><span class="badge {{ $booking['status'] === 'Confirmed' ? 'status--confirmed' : 'status--pending' }}">{{ $booking['status'] }}</span></p>
            </div>
        </div>

        <div class="button-row" style="margin-top: 1.75rem;">
            <a href="{{ route('user.bookings.payment', $booking['id']) }}" class="btn">Proceed to payment</a>
            <a href="{{ route('user.bookings.index') }}" class="btn btn--secondary">Back to bookings</a>
        </div>
    </div>
@endsection
