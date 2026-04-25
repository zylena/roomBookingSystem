@extends('layouts.public')

@section('title', 'Register')

@section('content')
<style>
    .error-message {
        color: #dc2626;
        margin-top: 0.35rem;
        font-size: 0.9rem;
    }
</style>

    <section style="padding-top: 1.5rem; padding-bottom: 2rem; max-width: 520px; margin: 0 auto;">
        <h1>Create an account</h1>
       
        <div class="card" style="margin-top: 1.5rem;">
            <form method="POST" action="{{ route('public.register.post') }}">
                @csrf

                <div class="form-field">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required>
                </div>

                <div class="form-field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" value="{{ old('password') }}" required>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-field">
                    <label for="password_confirmation">Confirm password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" required>
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Register</button>
                    <a href="{{ route('public.login') }}" class="btn btn--secondary">Already have an account?</a>
                </div>
            </form>
        </div>
    </section>
@endsection
