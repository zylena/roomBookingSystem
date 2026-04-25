@extends('layouts.admin')

@section('title', 'Manage Rooms')

@section('content')
<style>
    .rooms-table .col-image {
    width: 110px;
    text-align: center;
        }   

    .room-thumb {
        width: 80px;
        height: 55px;
        object-fit: cover;
        border-radius: 8px;
    }
    .rooms-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .rooms-card {
        max-width: 950px;
        margin: 0 auto;
    }

    .rooms-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .rooms-table th,
    .rooms-table td {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    .rooms-table .col-id {
        width: 80px;
        text-align: left;
    }

    .rooms-table .col-name {
        width: auto;
        text-align: left;
    }

    .rooms-table .col-status {
        width: 160px;
        text-align: center;
    }

    .rooms-table .col-action {
        width: 200px;
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

    .btn-primary {
        background: #2563eb;
        color: white;
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
        max-width: 950px;
        margin: 0 auto 1rem auto;
        padding: 0.85rem 1rem;
        border-radius: 12px;
        background: #dcfce7;
        color: #166534;
    }
</style>

<div class="rooms-header">
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
