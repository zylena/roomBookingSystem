@extends('layouts.admin')

@section('title', 'Reports')

@section('content')
    <div class="heading">
        <div>
            <h1>Reports</h1>
            <p class="heading-desc">This area is a placeholder for analytics and reporting tools.</p>
        </div>
    </div>

    <div class="cards">
        @foreach($reports as $report)
            <div class="card">
                <div class="card-icon" style="background: rgba(45, 108, 223, 0.1);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2d6cdf" stroke-width="2">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                </div>
                <h3>{{ $report['title'] }}</h3>
                <p class="card-desc">{{ $report['description'] }}</p>
                <a href="#" class="btn" style="font-size: 0.85rem; margin-top: 0.5rem;">View report</a>
            </div>
        @endforeach
    </div>
@endsection
