@extends('layouts.public')

@section('title', $room->room_name)

@section('content')
    <section style="padding-top: 1.5rem; padding-bottom: 2rem;">
        <div style="display: grid; grid-template-columns: 360px 1fr; gap: 1.5rem; align-items: start;">
            <div>
                <h1>{{ $room->room_name }}</h1>

                @if($room->image_url)
                    <img src="{{ asset($room->image_url) }}"
                        alt="{{ $room->room_name }}"
                        style="width: 100%; max-width: 320px; height: 420px; object-fit: cover; border-radius: 8px; margin: 1rem 0;">
                @else
                    <div style="width: 100%; max-width: 320px; height: 420px; border-radius: 8px; margin: 1rem 0; background: #e5e7eb; display: flex; align-items: center; justify-content: center; color: #6b7280;">
                        No image
                    </div>
                @endif
            </div>

            <div style="background: rgba(15, 23, 42, 0.04); border-radius: 14px; padding: 1.5rem;">
                <h2 style="margin-top: 0;">Room details</h2>

                <div style="margin: 1.5rem 0; display: flex; flex-wrap: wrap; gap: 0.75rem;">
                    <span class="badge">Duration: {{ $room->duration_minutes }}</span>
                    <span class="badge">Difficulty: {{ $room->difficulty_level }}</span>
                    <span class="badge">Players: {{ $room->max_pax }}</span>
                </div>

                <dl style="color: rgba(31, 41, 55, 0.85);">
                    <dt style="font-weight: 600; margin-top: 1rem;">Recommended age</dt>
                    <dd>12+</dd>

                    <dt style="font-weight: 600; margin-top: 1rem;">Description</dt>
                    <dd>{{ $room->description }}</dd>
                </dl>

                <div style="background: rgba(15, 23, 42, 0.04); border-radius: 14px; padding: 1.5rem;">
                    <p>
                        <strong>Price</strong><br>
                        RM {{ $room->price_per_pax }}
                        <span style="font-size: 16px; color: #6b7280;">per pax</span>
                    </p>

                    <div style="margin-top: 2rem;">
                        <a href="{{ route('public.login') }}" class="btn">Book this room</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection