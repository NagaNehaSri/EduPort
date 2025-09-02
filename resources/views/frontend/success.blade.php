@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const response = @json($response); // Payment details from Razorpay
        const dbPayment = @json($dbPayment); // Database payment record

        // Show success alert with payment details
        Swal.fire({
            title: 'Payment Successful!',
            html: `
                <p><strong>Merchant Transaction ID:</strong> ${dbPayment.merchant_transaction_id}</p>
                <p><strong>Transaction ID:</strong> ${response.id}</p>
                <p><strong>Name:</strong> ${dbPayment.name}</p>
                <p><strong>Email:</strong> ${dbPayment.email}</p>
                <p><strong>Amount:</strong> ₹${dbPayment.amount}</p>
                <p><strong>Subscription Start Date:</strong> ${dbPayment.start_date}</p>
                <p><strong>Subscription End Date:</strong> ${dbPayment.end_date}</p>
            `,
            icon: 'success',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the chapter view page
                window.location.href = "{{ route('chapter-view', $chapter->slug) }}";
            }
        });
    });
</script>
@endsection