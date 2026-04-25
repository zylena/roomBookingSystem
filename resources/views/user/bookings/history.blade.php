@extends('layouts.user')

@section('title', 'Booking History')

@section('content')
    <div class="heading">
        <h1>Booking History</h1>
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
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Expired At</th>
                </tr>
            </thead>

            <tbody>
                @forelse($history as $booking)
                    @php
                        $isExpired = $booking->payment_status === 'pending'
                            && $booking->expires_at
                            && \Carbon\Carbon::parse($booking->expires_at)->lt(now());

                        $displayStatus = $isExpired ? 'expired' : $booking->payment_status;

                        $badgeClass = match ($displayStatus) {
                            'paid' => 'status--confirmed',
                            'cancelled', 'expired' => 'status--pending',
                            default => 'status--pending',
                        };
                    @endphp

                    <tr>
                        <td style="white-space: nowrap;">
                            {{ $booking->booking_reference }}
                        </td>

                        <td>
                            {{ $booking->room->room_name ?? '-' }}
                        </td>

                        <td>
                            {{ $booking->customer_name ?? '-' }}
                        </td>

                        <td>
                            {{ $booking->pax ?? '-' }}
                        </td>

                        <td>
                            RM {{ number_format($booking->total_amount ?? 0, 2) }}
                        </td>

                        <td>
                            <span class="badge {{ $badgeClass }}">
                                {{ ucfirst($displayStatus) }}
                            </span>
                        </td>

                        <td>
                            {{ $booking->created_at ? \Carbon\Carbon::parse($booking->created_at)->format('d M Y, h:i A') : '-' }}
                        </td>

                        <td>
                            {{ $booking->expires_at ? \Carbon\Carbon::parse($booking->expires_at)->format('d M Y, h:i A') : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No booking history found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection