@extends('layouts.user')

@section('title', 'My Bookings')

@section('content')
    <div class="heading">
        <h1>My bookings</h1>

        <a href="{{ route('user.bookings.create') }}" class="btn">
            New Booking
        </a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Room</th>
                    <th>Customer</th>
                    <th>Pax</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->room->room_name ?? '-' }}</td>
                        <td>{{ $booking->customer_name ?? '-' }}</td>
                        <td>{{ $booking->pax ?? '-' }}</td>
                        <td>RM {{ number_format($booking->total_amount ?? 0, 2) }}</td>
                        <td>
                           <span class="badge {{ $booking->payment_status === 'pending' ? 'status--pending' : 'status--confirmed' }}">
    {{ ucfirst($booking->payment_status) }}
</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection