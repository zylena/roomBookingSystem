@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="heading">
        <div>
            <h1>Edit User</h1>
            <p class="heading-desc">Update user information and role.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn--secondary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Back
        </a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="button-row">
                <button type="submit" class="btn">Update User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn--secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection