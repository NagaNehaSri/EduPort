@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const message = "{{ $message }}";

        // Show pending alert
        Swal.fire({
            title: 'Payment Pending!',
            text: message,
            icon: 'info',
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