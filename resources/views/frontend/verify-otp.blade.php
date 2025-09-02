@extends('frontend.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-container">
                    <h2>Verify OTP</h2>
                    <p class="text-center text-muted mb-4">Enter the OTP sent to your email to reset your password.</p>

                    <form id="otp-form" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="otp" class="form-label">OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" required>
                            <div class="invalid-feedback">Please enter the OTP.</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('otp-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const otp = document.getElementById('otp').value.trim();
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (!otp) {
            Swal.fire('Validation Error', 'Please enter the OTP.', 'warning');
            return;
        }

        axios.post("{{ route('verify.otp.submit') }}", {
            otp: otp
        }, {
            headers: {
                'X-CSRF-TOKEN': token
            }
        })
        .then(response => {
            window.location.href = "{{ route('reset.password.form') }}";
        })
        .catch(error => {
            Swal.fire('Verification Failed', error.response?.data?.message || 'Invalid OTP.', 'error');
        });
    });
</script>
@endsection
