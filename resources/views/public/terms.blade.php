@extends('layouts.public')

@section('title', 'Terms & Conditions')

@section('content')
<section style="max-width: 800px; margin: 0 auto; padding: 2rem 1rem;">

    <div class="cards" style="margin-top: 5rem;">
    <div class="card">
    <h1>Terms & Conditions</h1>
    <p><strong>Last updated:</strong> {{ date('F j, Y') }}</p>

    <p>Welcome to Escape Room Booking. By using our website and services, you agree to these Terms & Conditions. Please read them carefully.</p>

    <h2>1. Acceptance of Terms</h2>
    <p>By accessing or using our website, making a booking, or participating in any escape room experience, you agree to be bound by these Terms & Conditions. If you do not agree, please do not use our services.</p>

    <h2>2. Booking & Payment</h2>
    <ul>
        <li>All bookings must be made through our website or authorized partners.</li>
        <li>Full payment is required at the time of booking to confirm your reservation.</li>
        <li>You must provide accurate and complete information when making a booking.</li>
        <li>A booking confirmation will be sent to the email address you provide.</li>
        <li>It is your responsibility to check the booking details and notify us of any errors.</li>
    </ul>

    <h2>3. Pricing</h2>
    <ul>
        <li>Prices are listed in your local currency and include applicable taxes unless stated otherwise.</li>
        <li>We reserve the right to change prices at any time without prior notice.</li>
        <li>The price at the time of booking is the price you will pay.</li>
    </ul>

    <h2>4. Cancellation & Refund Policy</h2>
    <ul>
        <li><strong>More than 48 hours before booking:</strong> Full refund.</li>
        <li><strong>24 - 48 hours before booking:</strong> 50% refund.</li>
        <li><strong>Less than 24 hours before booking:</strong> No refund.</li>
        <li><strong>No-show (failure to arrive):</strong> No refund.</li>
        <li>To cancel a booking, please contact us via email.</li>
    </ul>

    <h2>5. Rescheduling</h2>
    <ul>
        <li>Rescheduling requests must be made at least 24 hours before your scheduled time.</li>
        <li>Rescheduling is subject to availability.</li>
        <li>Only one reschedule per booking is allowed.</li>
    </ul>

    <h2>6. Participant Requirements</h2>
    <ul>
        <li><strong>Minimum age:</strong> 13 years old.</li>
        <li>Participants under 18 years old must be accompanied by a parent or legal guardian.</li>
        <li>Maximum participants per room is specified on each room page (typically 4-6 people).</li>
        <li>Please arrive at least 15 minutes before your scheduled time for briefing and safety instructions.</li>
        <li>Late arrival may result in reduced game time or cancellation without refund.</li>
    </ul>

    <h2>7. Health & Safety</h2>
    <ul>
        <li>If you have any medical conditions (e.g., epilepsy, heart conditions, pregnancy, claustrophobia, mobility issues), please contact us before booking.</li>
        <li>We reserve the right to refuse participation if we believe your health or safety may be at risk.</li>
        <li>Emergency exits are clearly marked throughout the rooms.</li>
    </ul>

    <h2>8. Code of Conduct</h2>
    <ul>
        <li>Do not force open locks, climb on furniture, or damage any props or equipment.</li>
        <li>No running or pushing inside the rooms.</li>
        <li>Listen to and follow the game master's instructions at all times.</li>
        <li>No food or drinks inside the escape rooms.</li>
        <li>No recording or photography inside the rooms without prior permission.</li>
        <li>We reserve the right to terminate any session immediately if participants violate these rules, without refund.</li>
    </ul>

    <h2>9. Liability</h2>
    <ul>
        <li>We are not responsible for lost, stolen, or damaged personal belongings.</li>
        <li>Please store valuables in the lockers provided.</li>
        <li>We are not liable for any injuries that occur as a result of not following safety instructions.</li>
        <li>Our liability is limited to the amount paid for the booking.</li>
    </ul>

    <h2>10. Intellectual Property</h2>
    <p>All content on this website, including text, graphics, logos, images, and game designs, is our property or licensed to us and is protected by copyright laws. You may not reproduce, distribute, or use any content without our written permission.</p>

    <h2>11. Privacy</h2>
    <p>Your use of our website is also governed by our <a href="{{ route('public.privacy') }}">Privacy Policy</a>. Please review it to understand how we collect and use your information.</p>

    <h2>12. Changes to Terms</h2>
    <p>We reserve the right to modify these Terms & Conditions at any time. Changes will be posted on this page, and the "Last updated" date will be revised. Continued use of our services after changes constitutes acceptance of the new terms.</p>
    </div>
    </div>

</section>
@endsection