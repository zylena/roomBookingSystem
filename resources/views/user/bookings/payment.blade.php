@extends('layouts.user')

@section('title', 'Payment')

@section('content')
    <h1>Payment</h1>

    <div class="card" style="max-width: 620px;">
        <h2 style="margin-top: 0;">Booking #{{ $booking['id'] }}</h2>
        <p style="color: rgba(31, 41, 55, 0.75);">This is a placeholder payment screen. Integrate your preferred payment provider when ready.</p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 1rem;">
            <div>
                <strong>Room</strong>
                <p>{{ $booking['room'] }}</p>
            </div>
            <div>
                <strong>Date</strong>
                <p>{{ $booking['date'] }}</p>
            </div>
            <div>
                <strong>Amount</strong>
                <p>${{ number_format($booking['amount'], 2) }}</p>
            </div>
            <div>
                <strong>Status</strong>
                <p><span class="badge status--pending">Awaiting payment</span></p>
            </div>
        </div>

        <div class="button-row" style="margin-top: 1.5rem;">
            <button class="btn" disabled>Proceed to payment (placeholder)</button>
            <a href="{{ route('user.bookings.show', $booking['id']) }}" class="btn btn--secondary">Back to booking</a>
        </div>
    </div>
@endsection
