@extends('layouts.public')

@section('title', $room->room_name)

@section('content')
    <section style="padding-top: 1.5rem; padding-bottom: 2rem;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; align-items: start;">
            <div>
                <h1>{{$room->room_name}}</h1>
             @php
                $roomImages = [
                    1 => 'img/escapeRoom_Poster_1.jpg',
                    2 => 'img/escapeRoom_Poster_2.jpg',
                    3 => 'img/escapeRoom_Poster_3.jpg',
                    4 => 'img/escapeRoom_Poster_4.jpg',
                    5 => 'img/escapeRoom_Poster_5.jpg',
                    6 => 'img/escapeRoom_Poster_6.jpg',
                    7 => 'img/escapeRoom_Poster_7.jpg',
                    8 => 'img/escapeRoom_Poster_8.jpg',
                    9 => 'img/escapeRoom_Poster_9.jpg',
                    10 => 'img/escapeRoom_Poster_10.jpg',
                ];

                $imagePath = $roomImages[$room->room_id] ?? 'img/rooms/default-room.jpg';
            @endphp

            <img src="{{ asset($imagePath) }}"
        alt="{{ $room->room_name }}"
        style="width: 100%; max-width: 320px; height: 420px; object-fit: cover; border-radius: 8px; margin: 1rem 0;">

                <div style="margin: 1.5rem 0; display: flex; flex-wrap: wrap; gap: 0.75rem;">
                    <span class="badge">Duration: {{ $room->duration_minutes }}</span>
                    <span class="badge">Difficulty: {{ $room->difficulty_level }}</span>
                    <span class="badge">Players: {{ $room->max_pax }}</span>
                </div>


                <div style="margin-top: 2rem;">
                    <a href="{{ route('public.login') }}" class="btn">Book this room</a>
                </div>
            </div>

            <div style="background: rgba(15, 23, 42, 0.04); border-radius: 14px; padding: 1.5rem;">
                <h2 style="margin-top: 0;">Quick facts</h2>
                <dl style="color: rgba(31, 41, 55, 0.85);">
                    <dt style="font-weight: 600; margin-top: 1rem;">Location</dt>
                    <dd>Downtown escape space, 123 Puzzle St.</dd>

                    <dt style="font-weight: 600; margin-top: 1rem;">Recommended age</dt>
                    <dd>12+</dd>

                    <dt style="font-weight: 600; margin-top: 1rem;">Accessibility</dt>
                    <dd>Some sections may require bending / crouching.</dd>
                </dl>
            </div>
        </div>
    </section>
@endsection
