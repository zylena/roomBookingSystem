@extends('layouts.admin')

@section('title', 'Manage Rooms')

@section('content')
    <div class="heading">
        <div>
            <h1>Manage rooms</h1>
            <p class="heading-desc">Review and update room listings. This is a placeholder for CRUD views.</p>
        </div>
        <button class="btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Room
        </button>
    </div>

    <div class="toolbar">
        <div class="search-box">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" placeholder="Search rooms...">
        </div>
        <div class="toolbar-actions">
            <select class="filter-select">
                <option value="">All Status</option>
                <option value="available">Available</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->room_id }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>
                            <span class="badge {{ $room->status === 'Available' ? 'badge--confirmed' : 'badge--pending' }}">
                                {{ $room->status }}
                            </span>
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="#" class="action-btn" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>
                                <a href="#" class="action-btn action-btn--danger" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
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
            const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const status = row.querySelector('.badge').textContent.toLowerCase();

            const matchesSearch = name.includes(searchTerm);
            const matchesStatus = !statusFilter || status.includes(statusFilter);

            row.style.display = matchesSearch && matchesStatus ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    filterSelect.addEventListener('change', filterTable);

    document.querySelector('.heading .btn').addEventListener('click', function() {
        alert('Add Room functionality - to be implemented');
    });

    document.querySelectorAll('.action-btn[title="Edit"]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            alert('Edit room - to be implemented');
        });
    });

    document.querySelectorAll('.action-btn[title="Delete"]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this room?')) {
                alert('Delete room - to be implemented');
            }
        });
    });
</script>
@endsection
