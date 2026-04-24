@extends('layouts.public')

@section('title', 'About')

@section('content')
    <section style="padding-top: 1.5rem; padding-bottom: 2rem;">
        <h1>About Escape Room Booking</h1>
        <p style="max-width: 720px; color: rgba(31, 41, 55, 0.85);">This scaffold provides a clean starting point for an escape room booking system where players can browse themed rooms, reserve sessions, and manage their bookings. The purpose of this application is to demonstrate a well-structured MVC layout with separate public, user, and admin sections.</p>

        <div class="cards" style="margin-top: 2rem;">
            <div class="card">
                <h3>Professional Layout</h3>
               
                <p>Each section of the application has a dedicated layout and navigation structure to keep the experience consistent.</p>
            </div>
            <div class="card">
                <h3>Extendable Architecture</h3>
                <p>The repository is organized for easy growth. Add real models, database migrations, and business logic when you're ready.</p>
            </div>
            <div class="card">
                <h3>Clean UI</h3>
                <p>This design uses simple, modern styling to help keep the focus on functionality rather than decorations.</p>
            </div>
        </div>
    </section>
@endsection
