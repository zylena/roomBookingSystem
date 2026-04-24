@extends('layouts.public')

@section('title', 'Contact')

@section('content')
    <section style="padding-top: 1.5rem; padding-bottom: 2rem;">
        <h1>Contact Us</h1>
      


        <p style="max-width: 720px; color: rgba(31, 41, 55, 0.85);">Have a question or need help planning your next escape room session? Send us a message and we will get back to you shortly.</p>
        @if (session('success'))
                    <div class="card" style="margin-top: 1rem; background: #dcfce7; color: #166534;">
                        {{ session('success') }}
                    </div>
                @endif
        <div class="card" style="max-width: 620px; margin-top: 1.5rem;">
            <form action="{{ route('public.contact.submit') }}" method="POST">
             @csrf
                    <div class="form-field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                </div>

                <div class="form-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required>
                </div>

                <div class="form-field">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Tell us about your request..." required></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Send message</button>
                    <button type="reset" class="btn btn--secondary">Clear</button>
                </div>
            </form>
        </div>
    </section>
@endsection

