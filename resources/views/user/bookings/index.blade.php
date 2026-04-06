@extends('layouts.user')

@section('title', 'My Bookings')

@section('content')
    <div class="heading">
        <h1>My bookings</h1>
        <a href="{{ route('user.bookings.create') }}" class="btn">New booking</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking['id'] }}</td>
                        <td>{{ $booking['room'] }}</td>
                        <td>{{ $booking['date'] }}</td>
                        <td>
                            <span class="badge {{ $booking['status'] === 'Pending' ? 'status--pending' : 'status--confirmed' }}">{{ $booking['status'] }}</span>
                        </td>
                        <td><a href="{{ route('user.bookings.show', $booking['id']) }}">Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
