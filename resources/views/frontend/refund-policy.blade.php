@extends('frontend.layouts.main') {{-- Adjust path if needed --}}

@section('main-section')

<main>
    <section class="policy-section">
        <div class="container">
             <div class="row justify-content-center align-items-center gy-5">

                {{-- Content Column --}}
                <div class="col-lg-8">
                    <h1 class="page-title">Refund Policy</h1>
                    <p class="last-updated">Last Updated: October 26, 2023</p> {{-- Update Date --}}

                    <div class="content-area">
                        <p>Thank you for choosing DevCore Solutions. We strive to provide high-quality software development services and ensure client satisfaction. This policy outlines the circumstances under which DevCore Solutions may provide refunds for services rendered.</p>

                        <h2>1. Overview</h2>
                        <p>Our Refund Policy applies to services purchased directly from DevCore Solutions. Due to the nature of custom software development and consulting services, refunds are generally processed on a case-by-case basis, taking into account the specifics of the project agreement and the work completed.</p>

                        <h2>2. Eligibility for Refunds</h2>
                        <p>Refunds may be considered under the following circumstances:</p>
                        <ul>
                            <li><strong>Service Not Delivered:</strong> If DevCore Solutions fails to deliver the agreed-upon services as outlined in the project scope or contract, and the failure is not due to client-caused delays or changes in requirements.</li>
                            <li><strong>Major Defects:</strong> If the delivered software or service contains critical defects that prevent its core functionality as defined in the project scope, and these defects cannot be rectified by DevCore Solutions within a reasonable timeframe agreed upon by both parties.</li>
                            <li><strong>Cancellation Prior to Commencement:</strong> If a project is canceled by the client before any substantial work has commenced (typically within 48 hours of payment and before the project kickoff), a partial or full refund of the initial deposit may be considered, potentially less administrative or processing fees.</li>
                        </ul>
                        <p>Refund eligibility is often tied to specific milestones and deliverables outlined in the project contract or Statement of Work (SOW).</p>

                        <h2>3. Non-Refundable Items/Services</h2>
                        <p>The following are generally non-refundable:</p>
                        <ul>
                            <li>Time spent on discovery, consultation, analysis, and project management.</li>
                            <li>Completed project milestones that have been reviewed and approved by the client.</li>
                            <li>Third-party costs incurred on behalf of the client (e.g., software licenses, hosting fees, stock photos).</li>
                            <li>Services where the client has significantly changed the scope or requirements after work has commenced.</li>
                            <li>Refunds requested after an unreasonable amount of time has passed since project completion or issue reporting.</li>
                        </ul>

                        <h2>4. Process for Requesting a Refund</h2>
                        <p>To request a refund, please follow these steps:</p>
                        <ol style="padding-left: 1.5rem; color: var(--text-muted);"> {{-- Use <ol> for numbered steps --}}
                            <li class="mb-2">Contact your Project Manager or our support team in writing (email is preferred) at <a href="mailto:support@devcore.com">support@devcore.com</a>. {{-- Update Email --}}</li>
                            <li class="mb-2">Clearly state the reason for your refund request, referencing the specific project and the terms in your contract or SOW.</li>
                            <li class="mb-2">Provide any relevant documentation or evidence supporting your claim (e.g., lists of defects, communication records).</li>
                            <li class="mb-2">We will review your request within 5-7 business days and communicate our decision or request further information.</li>
                        </ol>

                        <h2>5. Refund Processing</h2>
                        <p>If a refund is approved, it will typically be processed within 10-15 business days using the original method of payment, unless otherwise agreed upon. The amount refunded will be determined based on the work completed, project milestones achieved, and the specific circumstances of the refund request.</p>

                        <h2>6. Dispute Resolution</h2>
                        <p>We aim to resolve any disagreements amicably. If a refund request cannot be resolved through direct communication, the dispute resolution process outlined in your project contract or SOW will apply.</p>

                        <h2>7. Contact Us</h2>
                         <p>If you have any questions about our Refund Policy, please contact us:</p>
                        <ul>
                            <li>By email: support@devcore.com {{-- Update Email --}}</li>
                            <li>By visiting this page on our website: <a href="{{ route('contact') }}">Contact Us</a> {{-- Update route name if different --}}</li>
                        </ul>
                    </div>
                </div>

                {{-- Illustration Column --}}
                 <div class="col-lg-4 illustration-column d-none d-lg-block">
                    {{-- Replace with a relevant finance/support/policy illustration --}}
                    <img src="https://placehold.co/400x500/EAF0FD/133881?text=Refund+Policy" alt="Refund Policy Illustration" class="img-fluid rounded">
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