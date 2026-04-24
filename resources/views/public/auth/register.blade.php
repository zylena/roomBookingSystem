@extends('layouts.public')

@section('title', 'Register')

@section('content')
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
                    <input id="password" name="password" type="password" required>
                </div>

                <div class="form-field">
                    <label for="password_confirmation">Confirm password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Register</button>
                    <a href="{{ route('public.login') }}" class="btn btn--secondary">Already have an account?</a>
                </div>
            </form>
        </div>
    </section>
@endsection
