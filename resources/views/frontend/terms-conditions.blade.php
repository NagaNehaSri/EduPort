@extends('frontend.layouts.main') {{-- Adjust path if needed --}}

@section('main-section')

<main>
    <section class="legal-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8"> {{-- Slightly wider content area for T&C --}}
                    <span class="text-uppercase small fw-bold text-primary">Agreement</span>
                    <h1 class="page-title mt-1">Terms of Service</h1>
                    <p class="last-updated">Last Updated: October 26, 2023</p> {{-- Update Date --}}

                    <div class="content-area">
                        <p>Welcome to DevCore Solutions! These Terms of Service ("Terms") govern your access to and use of the DevCore Solutions website (the "Site") and any services, content, features, or applications offered by DevCore Solutions (collectively, the "Services"). Please read these Terms carefully before using our Services.</p>
                        <p>By accessing or using the Services, you agree to be bound by these Terms and our Privacy Policy. If you do not agree to all the terms and conditions, then you may not access the Site or use any Services.</p>

                        <h2>1. Use of Services</h2>
                        <ul>
                            <li><strong>Eligibility:</strong> You must be at least 18 years old to use our Services.</li>
                            <li><strong>License:</strong> Subject to these Terms, we grant you a limited, non-exclusive, non-transferable, and revocable license to use our Services for your internal business or personal use.</li>
                            <li><strong>Prohibited Conduct:</strong> You agree not to use the Services for any unlawful purpose or in any way that interrupts, damages, or impairs the service. You agree not to misuse our services, including attempting to gain unauthorized access to our systems or engaging in any activity that disrupts or interferes with our services.</li>
                        </ul>

                        <h2>2. Intellectual Property</h2>
                        <p>The Site and its original content (excluding content provided by users), features, and functionality are and will remain the exclusive property of DevCore Solutions and its licensors. Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of DevCore Solutions.</p>

                        <h2>3. User Content (If Applicable)</h2>
                        <p>If our Services allow you to post, link, store, share, or otherwise make available certain information, text, graphics, videos, or other material ("User Content"), you are responsible for the User Content that you post, including its legality, reliability, and appropriateness.</p>
                        {{-- Add clauses about rights you grant to DevCore for User Content if needed --}}

                        <h2>4. Disclaimers</h2>
                        <p>The Services are provided on an "AS IS" and "AS AVAILABLE" basis. DevCore Solutions makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
                        <p>Further, DevCore Solutions does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</p>

                        <h2>5. Limitation of Liability</h2>
                        <p>In no event shall DevCore Solutions, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the Service; (ii) any conduct or content of any third party on the Service; (iii) any content obtained from the Service; and (iv) unauthorized access, use or alteration of your transmissions or content, whether based on warranty, contract, tort (including negligence) or any other legal theory, whether or not we have been informed of the possibility of such damage.</p>

                        <h2>6. Governing Law</h2>
                        <p>These Terms shall be governed and construed in accordance with the laws of [Your State/Country], without regard to its conflict of law provisions.</p>

                        <h2>7. Changes to Terms</h2>
                        <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion. By continuing to access or use our Service after any revisions become effective, you agree to be bound by the revised terms.</p>

                        <h2>8. Contact Us</h2>
                        <p>If you have any questions about these Terms, please contact us:</p>
                         <ul>
                            <li>By email: legal@devcore.com {{-- Update Email --}}</li>
                            <li>By visiting this page on our website: <a href="{{ route('contact') }}">Contact Us</a> {{-- Update route name if different --}}</li>
                        </ul>

                        {{-- Action Buttons --}}
                        <div class="terms-actions">
                            <button type="button" class="btn btn-outline-secondary">Not right now...</button>
                            <button type="button" class="btn btn-primary">I agree with terms</button>
                        </div>
                    </div>
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