@extends('layouts.user')

@section('title', 'My Profile')

@section('content')
    <h1>My profile</h1>

    <div class="card" style="max-width: 660px;">
        <form method="POST" action="#">
            @csrf

            <div class="form-field">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="{{ session('app_user.name') ?? '' }}" required>
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ session('app_user.email') ?? '' }}" required>
            </div>

            <div class="button-row">
                <button type="submit" class="btn">Save changes</button>
                <a href="{{ route('user.dashboard') }}" class="btn btn--secondary">Back to dashboard</a>
            </div>
        </form>

        <p style="margin-top: 1.25rem; color: rgba(31, 41, 55, 0.75);">This form is a placeholder that does not persist changes to a database, but can be extended to support real profile updates.</p>
    </div>
@endsection
