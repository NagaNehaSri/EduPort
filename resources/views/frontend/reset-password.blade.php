@extends('frontend.layouts.main')
@section('main-section')

<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-container">
                    <h2 class="mb-3">Reset Your Password</h2>
                    <p class="text-muted">Please enter your new password below.</p>

                    <form id="reset-password-form" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required minlength="6">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Axios & SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('reset-password-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('password_confirmation').value.trim();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (!password || !confirmPassword) {
        Swal.fire('Error', 'Please fill out both password fields.', 'error');
        return;
    }

    if (password !== confirmPassword) {
        Swal.fire('Error', 'Passwords do not match.', 'error');
        return;
    }

    axios.post('{{ route("reset.password.update") }}', {
        password: password,
        password_confirmation: confirmPassword
    }, {
        headers: {
            'X-CSRF-TOKEN': token
        }
    })
    .then(response => {
        Swal.fire({
            icon: 'success',
            title: 'Password Reset',
            text: response.data.message,
        }).then(() => {
            window.location.href = response.data.redirect;
        });
    })
    .catch(error => {
        let message = 'Something went wrong. Please try again.';
        if (error.response?.data?.errors) {
            const errors = Object.values(error.response.data.errors).flat();
            message = errors.join('\n');
        } else if (error.response?.data?.message) {
            message = error.response.data.message;
        }

        Swal.fire({
            icon: 'error',
            title: 'Reset Failed',
            text: message
        });
    });
});
</script>

@endsection
