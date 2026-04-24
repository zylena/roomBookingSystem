@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <h1>Escape the ordinary.</h1>
        <p>Book an immersive escape room adventure with your friends, family, or teammates. Choose your challenge, reserve your spot, and prepare to solve the mystery.</p>
        <p>
            <a href="{{ route('public.rooms.index') }}" class="btn">Browse Rooms</a>
            <a href="{{ route('public.about') }}" class="btn btn--secondary">Learn More</a>
        </p>
    </section>

    <section>
        <h2 style="margin-bottom: 1rem;">Featured Rooms</h2>
        <div class="cards">
            @foreach($rooms as $room)
                <div class="card">
                    <h3>{{ $room->room_name }}</h3>
                    <p style="color: var(--muted);">{{ $room->description }}</p>
                    <p><strong>Duration:</strong> {{ $room->duration_minutes }} · <strong>Difficulty:</strong> {{ $room->difficulty_level }}</p>
                    <a href="{{ route('public.rooms.show', $room->room_id) }}" class="btn" style="margin-top: 0.75rem; display: inline-block;">View Details</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
