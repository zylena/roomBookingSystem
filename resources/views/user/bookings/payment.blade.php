@extends('layouts.user')

@section('title', 'Payment')

@section('content')
    @php
        $roomTitle = $room->room_name ?? $room->name ?? 'Selected Room';
        $pricePerPax = $room->price_per_pax ?? $room->price ?? $room->room_price ?? 0;
        $maxPax = $room->max_pax ?? $room->capacity ?? $room->pax ?? 1;
    @endphp

    <h1>Payment</h1>

    <div class="card" style="max-width: 720px;">
        <h2 style="margin-top: 0;">
            {{ $roomTitle }}
        </h2>

        <p style="color: rgba(31, 41, 55, 0.75);">
            Please confirm your booking details before making payment.
        </p>

        <form method="POST" action="{{ route('user.bookings.store') }}">
            @csrf

            <input type="hidden" name="room_id" value="{{ $room->room_id }}">
            <input type="hidden" name="total_amount" id="total_amount_input" value="{{ $pricePerPax }}">

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-top: 1rem;">
                <div>
                    <strong>Room</strong>
                    <p>{{ $roomTitle }}</p>
                </div>

                <div>
                    <strong>Price Per Pax</strong>
                    <p>RM {{ number_format($pricePerPax, 2) }}</p>
                </div>

                <div class="form-field">
                    <label for="date">Date</label>
                    <input
                        id="date"
                        name="date"
                        type="date"
                        value="{{ old('date') }}"
                        required
                    >

                    @error('date')
                        <p style="color: #dc2626; margin-top: 0.35rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="time">Time</label>
                    <input
                        id="time"
                        name="time"
                        type="time"
                        value="{{ old('time') }}"
                        required
                    >

                    @error('time')
                        <p style="color: #dc2626; margin-top: 0.35rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="participants">Participants</label>
                    <input
                        id="participants"
                        name="participants"
                        type="number"
                        value="{{ old('participants', 1) }}"
                        min="1"
                        max="{{ $maxPax }}"
                        required
                    >

                    <small style="color: #64748b;">
                        Maximum {{ $maxPax }} pax allowed.
                    </small>

                    @error('participants')
                        <p style="color: #dc2626; margin-top: 0.35rem;">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <strong>Amount</strong>
                    <p id="amount_display" style="font-size: 1.15rem; font-weight: 700;">
                        RM {{ number_format($pricePerPax, 2) }}
                    </p>
                </div>

                <div>
                    <strong>Status</strong>
                    <p>
                        <span class="badge status--pending">
                            Awaiting payment
                        </span>
                    </p>
                </div>
            </div>

            <div class="button-row" style="margin-top: 1.5rem;">
                <button type="submit" class="btn">
                    Confirm Booking
                </button>

                <a href="{{ route('user.bookings.create') }}" class="btn btn--secondary">
                    Back to rooms
                </a>
            </div>
        </form>
    </div>

    <script>
        const pricePerPax = Number(@json($pricePerPax));
        const maxPax = Number(@json($maxPax));
        const participantsInput = document.getElementById('participants');
        const amountDisplay = document.getElementById('amount_display');
        const totalAmountInput = document.getElementById('total_amount_input');

        function updateAmount() {
            let participants = Number(participantsInput.value);

            if (!participants || participants < 1) {
                participants = 1;
            }

            if (participants > maxPax) {
                participants = maxPax;
                participantsInput.value = maxPax;
            }

            const totalAmount = pricePerPax * participants;

            amountDisplay.textContent = 'RM ' + totalAmount.toFixed(2);
            totalAmountInput.value = totalAmount.toFixed(2);
        }

        participantsInput.addEventListener('input', updateAmount);
        updateAmount();
    </script>
@endsection