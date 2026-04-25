@extends('layouts.admin')

@section('title', 'Edit Booking')

@section('content')
<style>
    .booking-form-card {
        max-width: 760px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.4rem;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        height: 42px;
        padding: 0 0.85rem;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 0.95rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        padding: 0 1rem;
        border-radius: 10px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        font-size: 0.95rem;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #111827;
    }

    .error-text {
        color: #dc2626;
        font-size: 0.85rem;
        margin-top: 0.25rem;
    }

    .actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }
</style>

<div class="heading">
    <h1>Edit booking</h1>
</div>

<div class="card booking-form-card">
    <form method="POST" action="{{ route('admin.bookings.update', $booking->booking_id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Booking Reference</label>
            <input type="text" class="form-control" value="{{ $booking->booking_reference }}" disabled>
        </div>

        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $booking->customer_name) }}">
            @error('customer_name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Room</label>
                <select name="room_id" class="form-control">
                    @foreach($rooms as $room)
                        <option value="{{ $room->room_id }}" {{ old('room_id', $booking->room_id) == $room->room_id ? 'selected' : '' }}>
                            {{ $room->room_name }}
                        </option>
                    @endforeach
                </select>
                @error('room_id')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Time Slot</label>
                <select name="slot_id" class="form-control">
                    @foreach($timeSlots as $timeSlot)
                        <option value="{{ $timeSlot->slot_id }}" {{ old('slot_id', $booking->slot_id) == $timeSlot->slot_id ? 'selected' : '' }}>
                            {{ $timeSlot->start_time ?? '' }} - {{ $timeSlot->end_time ?? '' }}
                        </option>
                    @endforeach
                </select>
                @error('slot_id')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Pax</label>
                <input type="number" name="pax" class="form-control" value="{{ old('pax', $booking->pax) }}" min="1">
                @error('pax')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Total Amount</label>
                <input type="number" name="total_amount" class="form-control" value="{{ old('total_amount', $booking->total_amount) }}" step="0.01" min="0">
                @error('total_amount')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Payment Status</label>
                <select name="payment_status" class="form-control">
                    <option value="pending" {{ old('payment_status', $booking->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ old('payment_status', $booking->payment_status) == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="failed" {{ old('payment_status', $booking->payment_status) == 'failed' ? 'selected' : '' }}>Failed</option>
                    <option value="refunded" {{ old('payment_status', $booking->payment_status) == 'refunded' ? 'selected' : '' }}>Refunded</option>
                </select>
                @error('payment_status')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Payment Method</label>
                <select name="payment_method" class="form-control">
                    <option value="">Select payment method</option>
                    <option value="cash" {{ old('payment_method', $booking->payment_method) == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="card" {{ old('payment_method', $booking->payment_method) == 'card' ? 'selected' : '' }}>Card</option>
                    <option value="online_banking" {{ old('payment_method', $booking->payment_method) == 'online_banking' ? 'selected' : '' }}>Online Banking</option>
                    <option value="e_wallet" {{ old('payment_method', $booking->payment_method) == 'e_wallet' ? 'selected' : '' }}>E-Wallet</option>
                </select>
                @error('payment_method')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Expires At</label>
            <input type="datetime-local" name="expires_at" class="form-control" value="{{ old('expires_at', $booking->expires_at ? date('Y-m-d\TH:i', strtotime($booking->expires_at)) : '') }}">
            @error('expires_at')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Update Booking</button>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection