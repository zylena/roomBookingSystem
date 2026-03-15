@extends('layouts.public')

@section('title', 'Rooms')

@section('content')
    <section style="padding-top: 1.5rem; padding-bottom: 2rem;">
        <h1>Escape Rooms</h1>
        <p style="max-width: 720px; color: rgba(31, 41, 55, 0.85);">Browse our available escape room experiences and pick the one that matches your group's style.</p>

        <div class="cards" style="margin-top: 1.5rem;">
            @foreach($rooms as $room)
                <div class="card">
                    <h3>{{ $room['name'] }}</h3>
                    <p style="color: var(--muted);">{{ $room['tagline'] }}</p>
                    <p><strong>Duration:</strong> {{ $room['duration'] }} · <strong>Difficulty:</strong> {{ $room['difficulty'] }}</p>
                    <a href="{{ route('public.rooms.show', $room['slug']) }}" class="btn">View details</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
