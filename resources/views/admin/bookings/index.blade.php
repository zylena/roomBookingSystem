@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')
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
