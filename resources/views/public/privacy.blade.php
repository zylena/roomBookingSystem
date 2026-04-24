@extends('layouts.public')

@section('title', 'Privacy Policy')

@section('content')
<section style="max-width: 800px; margin: 0 auto; padding: 2rem 1rem;">
    
    <div class="cards" style="margin-top: 5rem;">
    <div class="card">
    <h1>Privacy Policy</h1>
    <p><strong>Last updated:</strong> {{ date('F j, Y') }}</p>

    <p>Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your personal information when you use our website and services.</p>

    <h2>1. Information We Collect</h2>
    <ul>
        <li><strong>Personal Information:</strong> Name, email address, phone number, and date of birth when you make a booking or contact us.</li>
        <li><strong>Booking Information:</strong> Room selection, time slot, number of participants, and payment details.</li>
        <li><strong>Technical Information:</strong> IP address, browser type, device information, and cookies when you visit our website.</li>
    </ul>

    <h2>2. How We Use Your Information</h2>
    <ul>
        <li>Process and confirm your bookings.</li>
        <li>Communicate with you about your reservation (confirmation, reminders, updates).</li>
        <li>Improve our services and website experience.</li>
        <li>Send promotional offers and newsletters (only if you opt in).</li>
        <li>Comply with legal obligations.</li>
    </ul>

    <h2>3. Sharing of Information</h2>
    <p>We do not sell, trade, or rent your personal information to third parties. We may share your information with:</p>
    <ul>
        <li>Payment processors to complete your transaction.</li>
        <li>Service providers who assist us in operating our website.</li>
        <li>Law enforcement if required by law or to protect our rights.</li>
    </ul>

    <h2>4. Data Security</h2>
    <p>We implement reasonable security measures, including encryption and secure servers, to protect your personal information from unauthorized access, disclosure, or alteration. However, no method of transmission over the internet is 100% secure.</p>

    <h2>5. Data Retention</h2>
    <p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, or as required by law.</p>

    <h2>6. Your Rights</h2>
    <p>Depending on your location, you may have the right to:</p>
    <ul>
        <li>Access and receive a copy of your personal information.</li>
        <li>Correct inaccurate or incomplete information.</li>
        <li>Request deletion of your personal information.</li>
        <li>Opt out of marketing communications.</li>
    </ul>

    <h2>7. Cookies</h2>
    <p>We use cookies to improve your browsing experience, analyze website traffic, and personalize content.</p>

    <h2>8. Third-Party Links</h2>
    <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of those sites. Please review their privacy policies separately.</p>

    <h2>9. Children's Privacy</h2>
    <p>Our services are not intended for children under 13 years old. We do not knowingly collect personal information from children under 13.</p>

    <h2>10. Changes to This Policy</h2>
    <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated "Last updated" date. We encourage you to review this page periodically.</p>
    </div>
    </div>
    
</section>
@endsection
