@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    <div class="heading">
        <div>
            <h1>Settings</h1>
            <p class="heading-desc">Configure application options and system defaults.</p>
        </div>
    </div>

    <div class="card" style="max-width: 760px;">
        <h2 style="margin-top: 0;">Placeholder settings</h2>
        <p style="color: rgba(31, 41, 55, 0.8);">This section is reserved for system-level settings such as payment provider configuration, email templates, and booking rules. Implement these when you add persistent configuration storage.</p>
    </div>
@endsection
