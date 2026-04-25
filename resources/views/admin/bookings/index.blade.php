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

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
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
                        <td>{{ $booking['customer'] }}</td>
                        <td>{{ $booking['room'] }}</td>
                        <td>{{ $booking['date'] }}</td>
                        <td>
                            <span class="badge {{ $booking['status'] === 'Confirmed' ? 'badge--confirmed' : ($booking['status'] === 'Pending' ? 'badge--pending' : 'badge--cancelled') }}">
                                {{ $booking['status'] }}
                            </span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" class="action-btn" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </a>
                                <a href="#" class="action-btn" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
<script>
    const searchInput = document.querySelector('.search-box input');
    const filterSelect = document.querySelector('.filter-select');
    const tableRows = document.querySelectorAll('tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = filterSelect.value.toLowerCase();

        tableRows.forEach(row => {
            const customer = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const room = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const status = row.querySelector('.badge').textContent.toLowerCase();

            const matchesSearch = customer.includes(searchTerm) || room.includes(searchTerm);
            const matchesStatus = !statusFilter || status.includes(statusFilter);

            row.style.display = matchesSearch && matchesStatus ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    filterSelect.addEventListener('change', filterTable);

    document.querySelectorAll('.action-btn[title="View"]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            alert('View booking details - to be implemented');
        });
    });

    document.querySelectorAll('.action-btn[title="Edit"]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            alert('Edit booking - to be implemented');
        });
    });
</script>
@endsection
