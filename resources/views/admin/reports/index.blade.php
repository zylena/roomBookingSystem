@extends('layouts.admin')

@section('title', 'Reports')

@section('content')
    <div class="heading">
        <h1>Reports</h1>
        <p style="color: rgba(31, 41, 55, 0.74);">This area is a placeholder for analytics and reporting tools.</p>
    </div>

    <div class="cards">
        @foreach($reports as $report)
            <div class="card">
                <h3>{{ $report['title'] }}</h3>
                <p style="color: rgba(31, 41, 55, 0.76);">{{ $report['description'] }}</p>
                <a href="#" class="btn" style="font-size: 0.9rem;">View report</a>
            </div>
        @endforeach
    </div>
@endsection
