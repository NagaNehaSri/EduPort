@extends('frontend.layouts.main')
@section('main-section')
    <!-- Navbar -->

    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
                 @php
                $tools_cms = App\Models\Cms::find(3);
                @endphp
            <h1>{{$tools_cms->heading}}</h1>
            {!! $tools_cms->description !!}
            <!--<p>Our mission is to make quality education accessible to everyone, everywhere.</p>-->
            <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
                <ol class="breadcrumb" style="background: transparent;">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Courses</li>
                </ol>
            </nav>
        </div>
    </header>


    <!-- Main Content: Course Grid -->
    <main class="container my-5">
        <!-- Optional: Search/Filter Bar -->
        <div class="row mb-4">
            <div class="col-md-8 offset-md-2">
                <form method="GET" action="{{ route('chapters.search') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-control-lg"
                            placeholder="Search for chapters..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <!-- Course Card 1 -->
            @foreach ($chapters as $chapter)
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="course-card position-relative">
                        <span class="course-tag">{{ $chapter->category->name }}</span>
                        <!-- Example different color -->
                        <img src="{{ asset('uploads/chapters/' . $chapter->thumbnail_image) }}"
                            alt="{{ $chapter->chapters_name }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('chapter-view', $chapter->slug) }}"
                                    class="text-decoration-none text-dark">
                                    {{ $chapter->chapters_name }}
                                </a>
                            </h5>
                            {{-- <p class="instructor-info"><i class="fas fa-user-tie me-1"></i>{{ $chapter->author_name }}</p> --}}
                            <div id="chapter-description-container">
                                {!! $chapter->chapter_page_short_description !!}
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                @if (!$chapter->activePayment && $chapter->chapter_amount > 0)
                                    <span class="price">Rs.{{ $chapter->chapter_amount }}</span>
                                @endif
                                {{-- <span class="rating text-warning"><i class="fas fa-star"></i> 4.7 (8k+)</span> --}}
                            </div>
                            <!-- Learn More Button -->
                            @if ($chapter->activePayment)
                                <div class="mt-3">
                                    <a href="{{ route('chapter-view', $chapter->slug) }}"
                                        class="btn btn-primary w-100">Learn</a>
                                </div>
                            @else
                                @if ($chapter->chapter_amount > 0)
                                    <div class="mt-3">
                                        <!-- Button to Trigger Payment Pop-Up -->
                                              @if (session()->has('uid'))
                                        <!-- If user is logged in, show payment modal -->
                                        <a href="#" class="btn btn-primary w-100" data-bs-toggle="modal"
                                            data-bs-target="#paymentModal_{{ $chapter->id }}">Buy Now</a>
                                    @else
                                        <!-- If user is NOT logged in, redirect to login -->
                                        <a href="{{ route('student.login') }}" class="btn btn-primary w-100">
                                            Buy Now
                                        </a>
                                    @endif
                                        <!-- Payment Modal -->
                                        <div class="modal fade" id="paymentModal_{{ $chapter->id }}" tabindex="-1"
                                            aria-labelledby="paymentModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <!-- Payment Form Section -->
                                                    <div id="paymentFormSection">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="paymentModalLabel">Payment Details
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Payment Form -->
                                                            <form id="paymentForm">
                                                                <input type="hidden" id="chapter_id" name="chapter_id"
                                                                    value="{{ $chapter->id }}">

                                                                <div class="mb-3">
                                                                    <label for="amount" class="form-label">Amount</label>
                                                                    <input type="text" class="form-control"
                                                                        id="amount"
                                                                        value="{{ $chapter->chapter_amount }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        id="email" placeholder="Enter your email"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="phone" class="form-label">Phone</label>
                                                                    <input type="text" class="form-control"
                                                                        id="phone" placeholder="Enter your phone number"
                                                                        required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary"
                                                                id="submitPayment">Pay Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="mt-3">
                                        <a href="{{ route('chapter-view', $chapter->slug) }}"
                                            class="btn btn-primary w-100">Learn</a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>







        <!-- Optional: Pagination -->
        <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5">
            {{ $chapters->links('pagination::bootstrap-4') }}
        </nav>

        {{-- <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5">
            <ul class="pagination">
              <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav> --}}
        <!-- Payment Pop-Up Modal -->
        <!-- Payment Pop-Up Modal -->
        <!-- Payment Modal -->


        <!-- JavaScript for Payment Processing -->


    </main>

    <!-- Footer -->
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select the element where the content is rendered
            const descriptionContainer = document.querySelector('#chapter-description-container');

            // Check if the container exists
            if (descriptionContainer) {
                // Select all <p> tags inside the container
                const paragraphs = descriptionContainer.querySelectorAll('p');

                // Add the class to each <p> tag
                paragraphs.forEach(paragraph => {
                    paragraph.classList.add('card-text', 'text-muted');
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('submitPayment').addEventListener('click', function () {
            const chapter_id = document.getElementById('chapter_id').value;
            const amount = document.getElementById('amount').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
    
            if (!email || !phone) {
                Swal.fire({
                    title: 'Validation Error',
                    text: 'Fill all fields.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
    
            axios.post('/process-payment', {
                    chapter_id,
                    amount,
                    email,
                    phone
                })
                .then(function (response) {
                    console.log( response.data);
    
                    const options = {
                        key: "{{ env('RAZORPAY_KEY_ID') }}",
                        amount: response.data.amount * 100,
                        currency: "INR",
                        name: "Your Company",
                        description: "Chapter Purchase",
                        order_id: response.data.order_id,
                        handler: function (responseHandler) {
                            console.log('Payment Handler Response:', responseHandler);
    
                            axios.post('/handle-payment-status', {
                                    razorpay_payment_id: responseHandler.razorpay_payment_id,
                                    razorpay_order_id: responseHandler.razorpay_order_id,
                                })
                                .then(function (successRes) {
                                    console.log('Payment success verified:', successRes.data);

                                    if (successRes.data.status === 'success') {
                                        const dbPayment = successRes.data.dbPayment;
                                    
                                        Swal.fire({
                                            title: 'Success!',
                                            html: `
                                                <p><strong>Merchant Transaction ID:</strong> ${dbPayment.merchant_transaction_id || 'N/A'}</p>
                                                <p><strong>Transaction ID:</strong> ${dbPayment.transaction_id || 'N/A'}</p>
                                                <p><strong>Name:</strong> ${dbPayment.name || 'N/A'}</p>
                                                <p><strong>Email:</strong> ${dbPayment.email || 'N/A'}</p>
                                                <p><strong>Amount:</strong> ₹${dbPayment.amount || '0.00'}</p>
                                                <p><strong>Subscription Start Date:</strong> ${dbPayment.start_date || 'N/A'}</p>
                                                <p><strong>Subscription End Date:</strong> ${dbPayment.end_date || 'N/A'}</p>
                                            `,
                                            icon: 'success',
                                            confirmButtonText: 'OK',
                                            allowOutsideClick: false,
                                            customClass: {
                                                popup: 'formatted-swal-details'
                                            }
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload(); 
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Failed',
                                            text: successRes.data.message || 'Unknown error occurred.',
                                            icon: 'error',
                                            confirmButtonText: 'Try Again'
                                        });
                                    }
                                })
                                .catch(function (err) {
                                    console.error('Payment verification failed:', err);
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Payment verification failed. Please try again.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                });
                        }
                    };
    
                    // Open Razorpay Checkout
                    new Razorpay(options).open();
    
                })
                .catch(function (error) {
                    console.error('Error during payment processing:', error);
                    Swal.fire({
                        title: 'Error',
                        text: error.message || 'Server error.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        });
    </script>

    {{-- <script>
        document.getElementById('submitPayment').addEventListener('click', async () => {
        
            const chapter_id = document.getElementById('chapter_id').value;
            const amount = document.getElementById('amount').value;
            const cardNumber = document.getElementById('cardNumber').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;

            if (!cardNumber || !expiryDate || !cvv) {
                alert('Please fill in all fields.');
                return;
            }

            try {
              
                const response = await axios.post('/process-payment', {
                    chapter_id: chapter_id,
                    amount: amount,
                    card_number: cardNumber,
                    expiry_date: expiryDate,
                    cvv: cvv,

                });

                const {
                    data
                } = response.data;

                document.getElementById('paymentFormSection').style.display = 'none';
                document.getElementById('receiptSection').style.display = 'block';

       
                document.getElementById('transactionId').textContent = data.transaction_id || 'N/A';
                document.getElementById('paidAmount').textContent = data.amount;
                document.getElementById('startDate').textContent = data.start_date;
                document.getElementById('endDate').textContent = data.end_date;
                document.getElementById('paymentStatus').textContent = data.status;

            } catch (error) {
                // Handle error response
                let errorMessage = 'An unknown error occurred.';
                if (error.response) {
                    // Backend returned an error response
                    errorMessage = error.response.data?.message || 'Server error.';
                } else if (error.request) {
                    // No response received from the server
                    errorMessage = 'No response from the server. Please check your internet connection.';
                } else {
                    // Something else went wrong
                    errorMessage = error.message;
                }
                alert('Error: ' + errorMessage);
            }
        });
    </script> --}}
    <style>
        .formatted-swal-details p {
            margin: 6px 0;
            text-align: left;
            font-size: 14px;
        }
    </style>
@endsection
