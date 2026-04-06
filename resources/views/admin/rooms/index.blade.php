@extends('layouts.admin')

@section('title', 'Manage Rooms')

@section('content')
    <div class="heading">
        <h1>Manage rooms</h1>
        <p style="color: rgba(31, 41, 55, 0.74);">Review and update room listings. This is a placeholder for CRUD views.</p>
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
                        <td>{{ $room['id'] }}</td>
                        <td>{{ $room['name'] }}</td>
                        <td><span class="badge">{{ $room['status'] }}</span></td>
                        <td><a href="#">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
