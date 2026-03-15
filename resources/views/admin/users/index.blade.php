@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
    <div class="heading">
        <h1>Manage users</h1>
        <p style="color: rgba(31, 41, 55, 0.74);">View and manage users in the system. Extend this area with role management and permissions.</p>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td><span class="badge">{{ ucfirst($user['role']) }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
