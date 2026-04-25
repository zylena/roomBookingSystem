@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')
<style>
    .bookings-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .bookings-card {
        max-width: 1200px;
        margin: 0 auto;
        overflow-x: auto;
    }

    .bookings-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .bookings-table th,
    .bookings-table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
        text-align: left;
    }

    .bookings-table .col-id {
        width: 70px;
    }

    .bookings-table .col-ref {
        width: 150px;
    }

    .bookings-table .col-customer {
        width: 160px;
    }

    .bookings-table .col-room {
        width: 170px;
    }

    .bookings-table .col-pax {
        width: 70px;
        text-align: center;
    }

    .bookings-table .col-amount {
        width: 120px;
        text-align: center;
    }

    .bookings-table .col-payment {
        width: 130px;
        text-align: center;
    }

    .bookings-table .col-method {
        width: 130px;
        text-align: center;
    }

    .bookings-table .col-action {
        width: 160px;
        text-align: center;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 70px;
        padding: 0.35rem 0.75rem;
        border-radius: 999px;
        background: #e8f0ff;
        color: #2563eb;
        font-weight: 600;
    }

    .action-group {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .action-group form {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 38px;
        padding: 0 0.9rem;
        border-radius: 10px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        font-size: 0.95rem;
        line-height: 1;
    }

    .btn-link {
        color: #2563eb;
        background: transparent;
    }

    .btn-danger {
        color: #dc2626;
        background: transparent;
    }

    .success-alert {
        max-width: 1200px;
        margin: 0 auto 1rem auto;
        padding: 0.85rem 1rem;
        border-radius: 12px;
        background: #dcfce7;
        color: #166534;
    }

    .empty-row {
        text-align: center;
        color: #6b7280;
    }
</style>

<div class="bookings-header">
    <div class="heading">
        <div>
            <h1>Manage bookings</h1>
            <p class="heading-desc">This list represents current bookings. Use this view to review and manage bookings.</p>
        </div>
    </div>

    <div class="toolbar">
        <div class="search-box">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" placeholder="Search bookings...">
        </div>
        <div class="toolbar-actions">
            <select class="filter-select">
                <option value="">All Status</option>
                <option value="confirmed">Confirmed</option>
                <option value="pending">Pending</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="success-alert">
        {{ session('success') }}
    </div>
@endif

<div class="card bookings-card">
    <table class="bookings-table">
        <thead>
            <tr>
                <th class="col-id">ID</th>
                <th class="col-ref">Reference</th>
                <th class="col-customer">Customer</th>
                <th class="col-room">Room</th>
                <th class="col-pax">Pax</th>
                <th class="col-amount">Amount</th>
                <th class="col-payment">Payment</th>
                <th class="col-method">Method</th>
                <th class="col-action">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td class="col-id">{{ $booking->booking_id }}</td>
                    <td class="col-ref">{{ $booking->booking_reference }}</td>
                    <td class="col-customer">{{ $booking->customer_name }}</td>
                    <td class="col-room">{{ $booking->room->room_name ?? 'N/A' }}</td>

                    <td class="col-pax">
                        {{ $booking->pax }}
                    </td>

                    <td class="col-amount">
                        RM {{ number_format($booking->total_amount, 2) }}
                    </td>

                    <td class="col-payment">
                        <span class="badge">{{ $booking->payment_status }}</span>
                    </td>

                    <td class="col-method">
                        {{ $booking->payment_method ?? 'N/A' }}
                    </td>

                    <td class="col-action">
                        <div class="action-group">
                            <a href="{{ route('admin.bookings.edit', $booking->booking_id) }}" class="btn btn-link">Edit</a>

                            <form method="POST" action="{{ route('admin.bookings.destroy', $booking->booking_id) }}" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="empty-row">
                        No bookings found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
