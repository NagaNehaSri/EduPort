@extends('frontend.layouts.main')

@section('main-section')

    <!-- Navbar -->

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
                 @php
                $contact_cms = App\Models\Cms::find(4);
                @endphp
            <h1>{{$contact_cms->heading}}</h1>
            {!!$contact_cms->description!!}
            <!--<p>We'd love to hear from you! Reach out with any questions or feedback.</p>-->
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5">
        <div class="row">
            <!-- Left Column: Contact Info & Social -->
            @php
                $contact_cms = App\Models\Cms::find(5);
            @endphp
            <div class="col-lg-5 mb-5 mb-lg-0 contact-info">
                <h3 class="mb-4">{{ $contact_cms->heading }}</h3>
                <div class="text-muted mb-4">  {!! $contact_cms->description !!}</div>

                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <strong>Phone:</strong><br>
                        <span>{{ $setting->mobile }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email:</strong><br>
                        <span>{{ $setting->email }}</span>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>Address:</strong><br>
                        <span>{{ $setting->address }}</span>
                    </div>
                </div>

                <h4 class="mt-5 mb-3">Follow Us</h4>
                <div class="social-icons fs-4">
                    <a href="{{ $setting->facebook }}" aria-label="Facebook" class="text-dark me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $setting->twitter }}" aria-label="Twitter" class="text-dark me-3"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $setting->instagram }}" aria-label="Instagram" class="text-dark me-3"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $setting->linkedin}}" aria-label="LinkedIn" class="text-dark"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Right Column: Contact Form -->
            <div class="col-lg-7">
                <h3 class="mb-4">Send Us a Message</h3>
            
                    <form class="contact-form needs-validation" id="contactForm" method="POST" action="{{ route('contact-save') }}">
                        @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contactName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contactEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contactSubject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="mb-3">
                        <label for="contactMessage" class="form-label">Message</label>
                        <textarea class="form-control"  rows="6" id="message" name="message"></textarea>
                        <div class="invalid-feedback">Please enter your message.</div>
                    </div>
                    <button type="submit" id="contactForm"  class="btn btn-primary btn-lg">Submit Message</button>
                </form>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container mt-5">
            <h3 class="text-center mb-4">Our Location</h3>
            <!-- Replace with your actual Google Maps embed code -->
            {!! $setting->iframe2 !!}
            {{-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81956131476885!3d-6.194741395514939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sNational%20Monument%20(Monas)!5e0!3m2!1sen!2sid!4v1678886880000!5m2!1sen!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
        </div>
    </main>


    <!-- Footer -->
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#contactForm').on('submit', function(event) {
                event.preventDefault();

                var name = $('#name').val();
                // var phone = $('#phone').val();


                var email = $('#email').val();
                var subject = $('#subject').val();
                var message = $('#message').val();

                $('.error-message').remove();

                var isValid = true;
                if (name === '') {
                    $('#name').after(
                        '<span class="error-message text-danger">Please enter your name</span>');
                    isValid = false;
                }

                if (email === '') {
                    $('#email').after(
                        '<span class="error-message text-danger">Please enter your email address</span>'
                        );
                    isValid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    $('#email').after(
                        '<span class="error-message text-danger">Please enter a valid email address</span>'
                        );
                    isValid = false;
                }
                // if (phone === '') {
                //     $('#phone').after(
                //         '<span class="error-message text-danger">Please enter your phone number</span>');
                //     isValid = false;
                // } else if (!/^\d{10}$/.test(phone)) {
                //     $('#phone').after(
                //         '<span class="error-message text-danger">Please enter a valid 10-digit phone number</span>'
                //         );
                //     isValid = false;
                // }
                if (subject === '') {
                    $('#subject').after(
                        '<span class="error-message text-danger">Please enter your subject</span>');
                    isValid = false;
                }
                if (message === '') {
                    $('#message').after(
                        '<span class="error-message text-danger">Please enter your message</span>');
                    isValid = false;
                }

                if (!isValid) {
                    return false;
                }

                $.ajax({
                    url: "{{ route('contact-save') }}",
                    type: "POST",
                    data: {
                        name: name,
                        // phone: phone,

                        email: email,
                        subject: subject,
                        message: message,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your message has been sent successfully!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });

                        $('#name').val('');
                        // $('#lname').val('');
                        // $('#phone').val('');
                        $('#email').val('');
                        $('#subject').val('');
                        $('#message').val('');
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while sending your message. Please try again later.',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
