@extends('frontend.layouts.main')

@section('main-section')
<div class="container mt-4 mb-5">
    <h2 class="mb-4 text-center title-green">Quiz Performance Report</h2>

    <div class="card shadow-sm overflow-hidden border-green-light">
        <div class="table-responsive">
            <table class="table quiz-results-table mb-0">
                <thead class="table-header-green">
                    <tr>
                        <th scope="col" class="ps-lg-4">Chapter Name</th>
                        <th scope="col">Attempts</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Score</th>
                        <th scope="col">Completed Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($summary->isEmpty())
                        <!-- No Data Found Message -->
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-exclamation-circle me-2"></i>No data found.
                            </td>
                        </tr>
                    @else
                        <!-- Display Quiz Results -->
                        @foreach ($summary as $data)
                            <tr class="align-middle">
                                <td data-label="Name:" class="ps-lg-4">{{ $data->chapter->chapters_name }}</td>
                                <td data-label="Attempts:">{{ $data->attempt_number }}</td>
                                <td data-label="Percentage:">
                                    <div class="d-flex align-items-center justify-content-end justify-content-lg-start">
                                        <div class="progress custom-progress me-2">
                                            <div class="progress-bar bg-progress-green" role="progressbar"
                                                style="width: {{ $data->percentage }}%;"
                                                aria-valuenow="{{ $data->percentage }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <span class="percentage-text">{{ $data->percentage }}%</span>
                                    </div>
                                </td>
                                <td data-label="Score:">{{ $data->score }} / {{ $quiz }}</td>
                                <td data-label="Completed:">{{ \Carbon\Carbon::parse($data->created_at)->format('D M j, Y \a\t g:ia') }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div> <!-- /.table-responsive -->
    </div> <!-- /.card -->

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $summary->links('vendor.pagination.bootstrap-5') }}
    </div>
</div> <!-- /.container -->
<style>
    /* Style for No Data Found Message */
.quiz-results-table tbody td {
    /* text-align: center; */
    font-size: 1 rem;
    color: #6c757d; 
    font-weight: bold;
}

.quiz-results-table tbody td i {
    font-size: 1.5rem;
    color: #ffc107; /* Yellow warning icon */
}
    /* Custom Pagination Styling */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination .page-item .page-link {
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination .page-item.active .page-link {
    background-color: #28a745;
    border-color: #28a745;
    color: #fff;
}

.pagination .page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}
</style>
@endsection