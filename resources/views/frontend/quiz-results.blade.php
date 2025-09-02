@extends('frontend.layouts.main')

@section('main-section')
    <!-- Main Content: Quiz Results -->
    <main class="container my-5">
        <div class="quiz-results-container">
            <!-- Success/Failure Icon -->
            @if ($passed)
                <i class="fas fa-check result-icon"></i>
                <p class="result-message">Nice job, you passed!</p>
            @else
                <i class="fas fa-times result-icon failed"></i>
                <p class="result-message text-danger">Sorry, you didn't pass this time.</p>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="score-box">
                        <p class="score-title">Your Score</p>
                        <p class="score-value">{{ $percentage }}%</p>
                        <p class="passing-info">Passing Score: {{ $passingPercentage }}%</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="score-box">
                        <p class="score-title">Your Points</p>
                        <p class="score-value">{{ $marks }}</p>
                        <p class="passing-info">Passing Points: {{ $passingMarks }}</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('quiz.review', ['slug' => $chapterSlug]) }}" class="btn btn-primary review-button">Review Quiz</a>
            <a href="{{ route('chapter-view',['slug' => $chapterSlug]) }}" class="btn btn-secondary review-button ms-2">Back to Course</a>        </div>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="js/script.js"></script>

    <script>
        // Add simple JS to update results dynamically if needed (example)
        const userScore = "{{ $percentage }}%"; // Example - Passed from PHP
        const userPoints = "{{ $marks }}";     // Example - Passed from PHP
        const passingScore = "{{ $passingPercentage }}%"; // Example - Passed from PHP
        const passingPoints = "{{ $passingMarks }}";      // Example - Passed from PHP
        const passed = {{ $passed ? 'true' : 'false' }};  // Example - Passed from PHP

        document.querySelector('.score-box .score-value').textContent = userScore;
        document.querySelectorAll('.score-box .score-value')[1].textContent = userPoints;
        document.querySelector('.score-box .passing-info').textContent = `Passing Score: ${passingScore}`;
        document.querySelectorAll('.score-box .passing-info')[1].textContent = `Passing Points: ${passingPoints}`;

        const resultIcon = document.querySelector('.result-icon');
        const resultMessage = document.querySelector('.result-message');

        if (!passed) {
            resultIcon.classList.remove('fa-check');
            resultIcon.classList.add('fa-times', 'failed'); // Add 'failed' class for red background
            resultMessage.textContent = "Sorry, you didn't pass this time.";
            resultMessage.classList.add('text-danger'); // Make text red for failure
        }
    </script>
@endsection