@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<style>
    .success-alert {
        max-width: 1200px;
        margin: 0 auto 1rem auto;
        padding: 0.85rem 1rem;
        border-radius: 12px;
        background: #dcfce7;
        color: #166534;
    }

    .action-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .action-group form {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
    }

    .btn-link {
        color: #2563eb;
        background: transparent;
        border: none;
        text-decoration: none;
        cursor: pointer;
        font-size: 0.95rem;
    }

    .btn-danger {
        color: #dc2626;
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 0.95rem;
    }
</style>

    <div class="heading">
        <div>
            <h1>Manage users</h1>
            <p class="heading-desc">View and manage users in the system. Extend this area with role management and permissions.</p>
        </div>
    </div>

    <div class="toolbar">
        <div class="search-box">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" placeholder="Search users...">
        </div>
        <div class="toolbar-actions">
            <select class="filter-select">
                <option value="">All Roles</option>
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
            </select>
        </div>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar">{{ substr($user->name, 0, 1) }}</div>
                                {{ $user->name }}
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->role === 'admin' ? 'badge--admin' : 'badge--user' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : '--' }}</td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-link">Edit</a>

                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Delete</button>
                                </form>
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
        const roleFilter = filterSelect.value;

        tableRows.forEach(row => {
            const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            const role = row.querySelector('.badge').textContent.toLowerCase();

            const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
            const matchesRole = !roleFilter || role.includes(roleFilter);

            row.style.display = matchesSearch && matchesRole ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    filterSelect.addEventListener('change', filterTable);
</script>
@endsection
