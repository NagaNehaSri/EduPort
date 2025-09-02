@extends('frontend.layouts.main')
@section('main-section')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const error = "{{ session('error') }}";

        // Show failure alert
        Swal.fire({
            title: 'Payment Failed!',
            text: error || 'Your payment could not be processed. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the home page
                window.location.href = "{{ route('home') }}";
            }
        });
    });
</script>
@endsection