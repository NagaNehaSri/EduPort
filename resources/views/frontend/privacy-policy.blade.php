@extends('frontend.layouts.main') {{-- Adjust path if needed --}}

@section('main-section')

<main>
    <section class="policy-section">
        <div class="container">
            <div class="row justify-content-center align-items-center gy-5">

                {{-- Content Column --}}
                <div class="col-lg-8">
                    <h1 class="page-title">Privacy Policy</h1>
                    <p class="last-updated">Last Updated: October 26, 2023</p> {{-- Update Date --}}

                    <div class="content-area">
                        <p>Your privacy is important to us. It is DevCore Solutions' policy to respect your privacy regarding any information we may collect from you across our website, <a href="{{ url('/') }}">{{ config('app.name', 'DevCore Solutions') }}</a>, and other sites we own and operate.</p>

                        <h2>Information We Collect</h2>
                        <p>We only collect information about you if we have a reason to do so – for example, to provide our Services, to communicate with you, or to make our Services better.</p>
                        <p>We collect information in three ways: if and when you provide information to us, automatically through operating our services, and from outside sources. Let’s go over the information that we collect.</p>
                        <h3>Information You Provide to Us</h3>
                        <ul>
                            <li><strong>Personal Information:</strong> We collect personal information, such as your name, email address, phone number, company name, and any other details you provide when you fill out a contact form, request a quote, or subscribe to our newsletter.</li>
                            <li><strong>Communication Data:</strong> If you communicate with us directly, we may receive additional information about you such as the contents of the message and/or attachments you may send us.</li>
                        </ul>
                        <h3>Information We Collect Automatically</h3>
                        <ul>
                            <li><strong>Usage Data:</strong> We collect information about your interactions with our Services. This includes your IP address, browser type, operating system, referral URLs, device information, pages visited, and timestamps.</li>
                            <li><strong>Cookies and Similar Technologies:</strong> We use cookies and similar tracking technologies to track activity on our Service and hold certain information. Cookies are files with a small amount of data which may include an anonymous unique identifier.</li>
                        </ul>

                        <h2>How We Use Information</h2>
                        <p>We use the information we collect in various ways, including to:</p>
                        <ul>
                            <li>Provide, operate, and maintain our website and services</li>
                            <li>Improve, personalize, and expand our website and services</li>
                            <li>Understand and analyze how you use our website</li>
                            <li>Develop new products, services, features, and functionality</li>
                            <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
                            <li>Process your transactions and manage your orders.</li>
                            <li>Find and prevent fraud</li>
                        </ul>

                        <h2>Data Security</h2>
                        <p>We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.</p>

                        <h2>Your Rights</h2>
                        <p>Depending on your location, you may have certain rights regarding your personal information, such as the right to access, correct, delete, or restrict the processing of your data. Please contact us if you wish to exercise these rights.</p>

                        <h2>Changes to This Privacy Policy</h2>
                        <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date. You are advised to review this Privacy Policy periodically for any changes.</p>

                        <h2>Contact Us</h2>
                        <p>If you have any questions about this Privacy Policy, please contact us:</p>
                        <ul>
                            <li>By email: privacy@devcore.com {{-- Update Email --}}</li>
                            <li>By visiting this page on our website: <a href="{{ route('contact') }}">Contact Us</a> {{-- Update route name if different --}}</li>
                            {{-- Add other contact methods if applicable --}}
                        </ul>
                    </div>
                </div>

                {{-- Illustration Column --}}
                <div class="col-lg-4 illustration-column d-none d-lg-block">
                    {{-- Replace with a relevant privacy/security illustration --}}
                    <img src="https://placehold.co/400x500/EAF0FD/133881?text=Privacy+Illustration" alt="Privacy Policy Illustration" class="img-fluid rounded">
                </div>

            </div>
        </div>
    </section>
</main>
<style>

.policy-section,
.legal-section {
    padding: 80px 0; /* More vertical padding */
    background-color: var(--white); /* Ensure clean white background */
}

.policy-section .page-title,
.legal-section .page-title {
    font-size: 2.5rem; /* Large, clear title */
    font-weight: 700;
    color: var(--primary-dark);
    margin-bottom: 15px;
}

.policy-section .last-updated,
.legal-section .last-updated {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin-bottom: 40px; /* Space below title/date */
}

.policy-section .content-area h2,
.legal-section .content-area h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--primary-dark);
    margin-top: 40px; /* Space above headings */
    margin-bottom: 20px;
}

.policy-section .content-area h3,
.legal-section .content-area h3 {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-top: 30px;
    margin-bottom: 15px;
}

.policy-section .content-area p,
.legal-section .content-area p {
    color: var(--text-muted);
    line-height: 1.8; /* Slightly more line height for readability */
    margin-bottom: 1rem;
}

.policy-section .content-area ul,
.legal-section .content-area ul {
    list-style: none;
    padding-left: 0;
}

.policy-section .content-area ul li,
.legal-section .content-area ul li {
    padding-left: 25px;
    position: relative;
    margin-bottom: 10px;
    color: var(--text-muted);
}

.policy-section .content-area ul li::before,
.legal-section .content-area ul li::before {
    content: "\f058"; /* Font Awesome check-circle solid */
    font-family: "Font Awesome 6 Free";
    font-weight: 900; /* Necessary for solid icons */
    position: absolute;
    left: 0;
    top: 1px;
    color: var(--primary-blue); /* Use primary color for bullets */
    font-size: 1rem;
}

.policy-section .illustration-column img,
.legal-section .illustration-column img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}

/* Specific for Terms Actions */
.terms-actions {
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid #eee;
    display: flex;
    gap: 15px; /* Space between buttons */
    flex-wrap: wrap; /* Allow wrapping on small screens */
}

.terms-actions .btn-outline-secondary {
    color: var(--text-muted);
    border-color: #ccc;
}

.terms-actions .btn-outline-secondary:hover {
    background-color: #eee;
    color: var(--text-dark);
    border-color: #ccc;
}

/* Responsive adjustments for policy pages */
@media (max-width: 991px) {
    .policy-section,
    .legal-section {
        padding: 60px 0;
    }
    .policy-section .page-title,
    .legal-section .page-title {
        font-size: 2rem;
    }
    .policy-section .illustration-column {
        margin-top: 40px; /* Add space when illustration stacks */
        text-align: center; /* Center image when stacked */
    }
     .policy-section .illustration-column img,
    .legal-section .illustration-column img {
        max-width: 80%; /* Don't let it take full width */
    }
}

@media (max-width: 767px) {
    .policy-section,
    .legal-section {
        padding: 40px 0;
    }
    .policy-section .page-title,
    .legal-section .page-title {
        font-size: 1.8rem;
    }
     .policy-section .illustration-column img,
    .legal-section .illustration-column img {
        max-width: 90%; /* Allow slightly wider on mobile */
    }
     .terms-actions {
        flex-direction: column; /* Stack buttons vertically */
        align-items: stretch; /* Make buttons full width */
    }
    .terms-actions .btn {
        width: 100%;
    }
}
</style>
@endsection