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
        <h1>Manage rooms</h1>
    </div>

    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">Add Room</a>
</div>

@if(session('success'))
    <div class="success-alert">
        {{ session('success') }}
    </div>
@endif

<div class="card rooms-card">
    <table class="rooms-table">
        <thead>
            <tr>
                <th class="col-id">ID</th>
                <th class="col-image">Image</th>
                <th class="col-name">Name</th>
                <th class="col-status">Status</th>
                <th class="col-action">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td class="col-id">{{ $room->room_id }}</td>

                    <td class="col-image">
                        @if($room->image_url)
                            <img src="{{ asset($room->image_url) }}" alt="{{ $room->room_name }}" class="room-thumb">
                        @else
                            -
                        @endif
                    </td>

                    <td class="col-name">{{ $room->room_name }}</td>

                    <td class="col-status">
                        <span class="badge">{{ $room->status }}</span>
                    </td>

                    <td class="col-action">
                        <div class="action-group">
                            <a href="{{ route('admin.rooms.edit', $room->room_id) }}" class="btn btn-link">Edit</a>

                            <form method="POST" action="{{ route('admin.rooms.destroy', $room->room_id) }}" onsubmit="return confirm('Are you sure you want to delete this room?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
