@extends('frontend.layouts.main')
@section('main-section')

<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-container">
                    <h2>Forgot Password?</h2>
                    <p class="text-center text-muted mb-4">Enter your registered email to receive an OTP.</p>

                    <form id="forgot-password-form" novalidate>
                        <div class="mb-3">
                            <label for="forgotEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="forgotEmail" name="email" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-submit">Send OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Axios & SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('forgot-password-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('forgotEmail').value.trim();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (!email) {
        Swal.fire('Error', 'Please enter your email address.', 'error');
        return;
    }

    axios.post("{{ route('forgot.password.sendOtp') }}", {
        email: email
    }, {
        headers: {
            'X-CSRF-TOKEN': token
        }
    })
    .then(response => {
        Swal.fire('Success', response.data.message || 'OTP sent successfully!', 'success')
            .then(() => window.location.href = "{{ route('verify.otp') }}");
    })
    .catch(error => {
        const errorMsg = error.response?.data?.message || 'Something went wrong.';

        Swal.fire({
            icon: 'error',
            title: 'Email Not Found',
            text: errorMsg,
        });
    });
});
</script>


@endsection
