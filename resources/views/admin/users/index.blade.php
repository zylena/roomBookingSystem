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
</style>

    <div class="heading">
        <h1>Manage users</h1>
        <p style="color: rgba(31, 41, 55, 0.74);">View and manage users in the system. Extend this area with role management and permissions.</p>
    </div>

    @if(session('success'))
        <div class="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="badge">{{ ucfirst($user->role) }}</span></td>
                        <td><a href="{{ route('admin.users.edit', $user->id) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
