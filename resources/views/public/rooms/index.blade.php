@extends('layouts.public')

@section('title', 'Rooms')

@section('content')
    <style>
        .room-card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .room-placeholder {
            width: 100%;
            height: 180px;
            border-radius: 12px;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            margin-bottom: 1rem;
        }
    </style>

    <section style="padding-top: 1.5rem; padding-bottom: 2rem;">
        <h1>Escape Rooms</h1>

        <p style="max-width: 720px; color: rgba(31, 41, 55, 0.85);">
            Browse our available escape room experiences and pick the one that matches your group's style.
        </p>

        <div class="cards" style="margin-top: 1.5rem;">
            @foreach($rooms as $room)
                <div class="card">
                    @if($room->image_url)
                        <img src="{{ asset($room->image_url) }}" alt="{{ $room->room_name }}" class="room-card-image">
                    @else
                        <div class="room-placeholder">No image</div>
                    @endif

                    <h3>{{ $room->room_name }}</h3>

                    <p style="color: var(--muted);">
                        {{ $room->description }}
                    </p>

                    <p>
                        <strong>Duration:</strong> {{ $room->duration_minutes }} ·
                        <strong>Difficulty:</strong> {{ $room->difficulty_level }}
                    </p>

                    <a href="{{ route('public.rooms.show', $room->room_id) }}" class="btn">View details</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection