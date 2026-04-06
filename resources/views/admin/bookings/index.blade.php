@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')
    <div class="heading">
        <h1>Manage bookings</h1>
        <p style="color: rgba(31, 41, 55, 0.74);">This list represents current bookings. Use this view to review and manage bookings.</p>
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
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking['id'] }}</td>
                        <td>{{ $booking['customer'] }}</td>
                        <td>{{ $booking['room'] }}</td>
                        <td>{{ $booking['date'] }}</td>
                        <td><span class="badge">{{ $booking['status'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
