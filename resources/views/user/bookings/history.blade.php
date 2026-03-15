@extends('layouts.user')

@section('title', 'Booking History')

@section('content')
    <h1>Booking history</h1>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['room'] }}</td>
                        <td>{{ $item['date'] }}</td>
                        <td><span class="badge status--confirmed">{{ $item['status'] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
