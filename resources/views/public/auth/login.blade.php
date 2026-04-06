@extends('layouts.public')

@section('title', 'Login')

@section('content')
    <section style="padding-top: 1.5rem; padding-bottom: 2rem; max-width: 520px; margin: 0 auto;">
        <h1>Login</h1>
        <p style="color: rgba(31, 41, 55, 0.8);">Log in as a customer or admin. If your email contains "admin", this scaffold will route you to the admin dashboard.</p>

        <div class="card" style="margin-top: 1.5rem;">
            <form method="POST" action="{{ route('public.login.post') }}">
                @csrf

                <div class="form-field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Login</button>
                    <a href="{{ route('public.register') }}" class="btn btn--secondary">Create account</a>
                </div>
            </form>
        </div>
    </section>
@endsection
