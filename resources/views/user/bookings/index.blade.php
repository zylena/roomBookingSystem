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
                    <th>Reference</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Pax</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_reference }}</td>
                        <td>{{ $booking->room->room_name ?? 'N/A' }}</td>
                        <td>{{ $booking->timeSlot ? \Carbon\Carbon::parse($booking->timeSlot->slot_date)->format('d M Y') : 'N/A' }}</td>
                        <td>{{ $booking->timeSlot ? \Carbon\Carbon::parse($booking->timeSlot->start_time)->format('H:i') : 'N/A' }}</td>
                        <td>{{ $booking->pax }}</td>
                        <td>
                            <span class="badge {{ $booking->payment_status === 'pending' ? 'status--pending' : 'status--confirmed' }}">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </td>
                        <td><a href="{{ route('user.bookings.show', $booking->booking_id) }}">Details</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #6b7280; padding: 2rem;">
                            You have no active bookings.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
