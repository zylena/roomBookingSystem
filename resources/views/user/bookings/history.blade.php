@extends('layouts.user')

@section('title', 'Booking History')

@section('content')
    <h1>Booking history</h1>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Pax</th>
                    <th>Amount</th>
                    <th>Status</th>
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
                        <td>RM {{ number_format($booking->total_amount, 2) }}</td>
                        <td><span class="badge">{{ ucfirst($booking->payment_status) }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #6b7280; padding: 2rem;">
                            No booking history found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
