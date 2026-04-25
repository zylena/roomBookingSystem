@extends('layouts.public')

@section('title', 'Reset Password')

@section('content')
<section style="padding-top: 1.5rem; padding-bottom: 2rem; max-width: 520px; margin: 0 auto;">
    <div class="card" style="margin-top: 1.5rem;">
        <h1>Create New Password</h1>
        <p style="color: rgba(31,41,55,0.8); margin-bottom: 1.5rem;">
            Enter your new password below.
        </p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $email) }}" required readonly>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="password">New Password</label>
                <input id="password" name="password" type="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required>
            </div>

            <div class="form-actions" style="margin-top: 1.5rem;">
                <button type="submit" class="btn-primary">Reset Password</button>
            </div>
        </form>
    </div>
</section>
@endsection