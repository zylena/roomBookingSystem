@extends('layouts.user')

@section('title', 'New Booking')

@section('content')
    <div class="heading">
        <h1>Select a Room</h1>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
        @forelse($rooms as $room)
            @php
                $roomTitle = $room->room_name ?? $room->name ?? $room->title ?? 'Room #' . $room->room_id;
                $roomImage = $room->image_url ?? $room->image ?? $room->room_image ?? $room->photo ?? null;
                $roomDescription = $room->description ?? $room->room_description ?? '';
                $roomPrice = $room->price ?? $room->room_price ?? 0;
                $roomCapacity = $room->capacity ?? $room->max_pax ?? $room->pax ?? null;
            @endphp

            <div class="card" style="overflow: hidden; padding: 0;">
                @if($roomImage)
                    <img src="{{ asset($roomImage) }}"
                         alt="{{ $roomTitle }}"
                         style="width: 100%; height: 190px; object-fit: cover;">
                @else
                    <div style="height: 190px; display: flex; align-items: center; justify-content: center; background: #f1f5f9; color: #64748b;">
                        No Image
                    </div>
                @endif

                <div style="padding: 1.5rem;">
                    <h2 style="margin-top: 0; margin-bottom: 0.75rem;">
                        {{ $roomTitle }}
                    </h2>

                    @if($roomDescription)
                        <p style="color: rgba(31, 41, 55, 0.75);">
                            {{ $roomDescription }}
                        </p>
                    @endif

                    <div style="display: flex; justify-content: space-between; gap: 1rem; margin-top: 1rem;">
                        <p style="margin: 0;">
                            <strong>Price:</strong>
                            RM {{ number_format($roomPrice, 2) }}
                        </p>

                        @if($roomCapacity)
                            <p style="margin: 0;">
                                <strong>Pax:</strong>
                                {{ $roomCapacity }}
                            </p>
                        @endif
                    </div>

                    <div class="button-row" style="margin-top: 1.25rem;">
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
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <p>No rooms available.</p>
            </div>
        @endforelse
    </div>
@endsection