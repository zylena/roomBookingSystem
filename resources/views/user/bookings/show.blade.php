@extends('layouts.user')

@section('title', 'Room Details')

@section('content')
    <h1>Room Details</h1>

    <div class="card" style="margin-top: 1rem;">
        <h2 style="margin-top: 0;">{{ $room->name }}</h2>

        @if($room->description)
            <p style="color: rgba(31, 41, 55, 0.8); margin-top: 0.25rem;">
                {{ $room->description }}
            </p>
        @endif

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-top: 1.5rem;">
            <div>
                <strong>Price</strong>
                <p>RM {{ number_format($room->price, 2) }}</p>
            </div>

            <div>
                <strong>Capacity</strong>
                <p>{{ $room->capacity ?? '-' }} pax</p>
            </div>

            <div>
                <strong>Status</strong>
                <p>
                    <span class="badge {{ $room->status === 'Available' ? 'status--confirmed' : 'status--pending' }}">
                        {{ $room->status ?? 'Available' }}
                    </span>
                </p>
            </div>
        </div>

        <div class="button-row" style="margin-top: 1.75rem;">
            @auth
    <a href="{{ route('user.bookings.payment', $room->room_id) }}" class="btn">
        Book This Room
    </a>
@endauth

           @guest
    <a href="{{ route('login') }}" class="btn">
        Book This Room
    </a>
@endguest

            <a href="{{ route('user.bookings.create') }}" class="btn btn--secondary">
                Back to rooms
            </a>
        </div>
    </div>
@endsection