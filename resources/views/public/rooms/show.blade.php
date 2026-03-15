@extends('layouts.public')

@section('title', $room['name'])

@section('content')
    <section style="padding-top: 1.5rem; padding-bottom: 2rem;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; align-items: start;">
            <div>
                <h1>{{ $room['name'] }}</h1>
                <p style="max-width: 680px; color: rgba(31, 41, 55, 0.85);">{{ $room['description'] }}</p>

                <div style="margin: 1.5rem 0; display: flex; flex-wrap: wrap; gap: 0.75rem;">
                    <span class="badge">Duration: {{ $room['duration'] }}</span>
                    <span class="badge">Difficulty: {{ $room['difficulty'] }}</span>
                    <span class="badge">Players: {{ $room['players'] }}</span>
                </div>

                <div style="margin-top: 1.5rem;">
                    <h3>What to expect</h3>
                    <ul style="padding-left: 1.25rem; color: rgba(31, 41, 55, 0.8);">
                        @foreach($room['features'] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
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
