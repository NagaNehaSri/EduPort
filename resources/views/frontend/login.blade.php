@extends('frontend.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <!-- Login Form Container -->
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <div class="auth-container">
                    <h2>Welcome Back!</h2>
                    <p class="text-center text-muted mb-4">Sign in to continue your learning journey.</p>

                    <form id="login-form" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="loginEmail" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" required>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                              <a href="{{ route('forgot.password') }}" class="text-primary">Forgot Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const loginForm = document.getElementById('login-form');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value.trim();
    

        // Validate input fields
        if (!email || !password) {
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Please fill in all the required fields.',
            });
            return;
        }

        // Axios POST request
        axios.post('{{ route('auth.login') }}', { email, password, }, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => {
            if (response.data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful!',
                    text: response.data.message,
                    confirmButtonText: 'OK',
                }).then(() => {
                
                    window.location.href = '/';
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: error.response?.data?.message || 'An error occurred. Please try again.',
            });
        });
    });
</script>
@endsection
