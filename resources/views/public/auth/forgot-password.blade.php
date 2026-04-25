@extends('layouts.public')

@section('title', 'Forgot Password')

@section('content')
<section style="padding-top: 1.5rem; padding-bottom: 2rem; max-width: 520px; margin: 0 auto;">
    <div class="card" style="margin-top: 1.5rem;">
        <h1>Reset your password</h1>
        <p style="color: rgba(31,41,55,0.8); margin-bottom: 1.5rem;">
            Enter your email address and we will send you a link to reset your password.
        </p>

        @if (session('status'))
            <div style="background-color: #2d6cdf; color: white; padding: 0.5rem; border-radius: 8px; margin-bottom: 1rem;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions" style="margin-top: 1.5rem;">
                <button type="submit" class="btn-primary">Send Reset Link</button>
            </div>

            <p style="text-align: center; margin-top: 1.5rem;">
                <a href="/login">Remember your password? Back to login</a>
            </p>
        </form>
    </div>
</section>
@endsection