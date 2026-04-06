@extends('layouts.user')

@section('title', 'New Booking')

@section('content')
    <h1>Create a new booking</h1>

    <div class="card" style="max-width: 620px;">
        <form method="POST" action="{{ route('user.bookings.store') }}">
            @csrf

            <div class="form-field">
                <label for="room_id">Room</label>
                <select id="room_id" name="room_id" required>
                    @foreach($rooms as $room)
                        <option value="{{ $room['id'] }}">{{ $room['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field">
                <label for="date">Date</label>
                <input id="date" name="date" type="date" required>
            </div>

            <div class="form-field">
                <label for="time">Time</label>
                <input id="time" name="time" type="time" required>
            </div>

            <div class="form-field">
                <label for="participants">Participants</label>
                <input id="participants" name="participants" type="number" value="2" min="1" required>
            </div>

            <div class="button-row">
                <button type="submit" class="btn">Reserve</button>
                <a href="{{ route('user.bookings.index') }}" class="btn btn--secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
