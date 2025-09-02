@extends('frontend.layouts.main')

@section('main-section')
    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <h1>Quiz Review</h1>
            <p>Check your answers below. Correct answers are highlighted in green, and incorrect answers are highlighted in
                red.</p>
        </div>
    </header>

    <!-- Main Review Content -->
    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
                <!-- Container for the questions -->
                <div id="quiz-review-area" class="quiz-review-container p-4 p-md-5">
                    <h3 class="text-center mb-4">Review Your Answers</h3>

                    @if ($questions->isEmpty())
                        <p class="text-center text-muted">No questions found for this quiz.</p>
                    @else
                        <!-- Dynamically generate question blocks -->
                        @foreach ($questions as $index => $question)
                        {{-- @php
                            dd($question);
                        @endphp --}}
                            <div class="quiz-review-question mb-4 p-3 rounded shadow-sm"
                                data-question-id="{{ $question->id }}"
                                data-correct-answer="{{ $question->correct_answer }}">
                                <p class="question-text fw-bold mb-3">{{ $index + 1 }}. {{ $question->question }}</p>

                                <!-- Dynamically generate options -->
                                <!--@php-->
                                <!--    $options = [-->
                                <!--        ['letter' => 'A', 'text' => $question->option_1],-->
                                <!--        ['letter' => 'B', 'text' => $question->option_2],-->
                                <!--        ['letter' => 'C', 'text' => $question->option_3],-->
                                <!--        ['letter' => 'D', 'text' => $question->option_4],-->
                                <!--    ];-->
                                <!--@endphp-->
<!--                                @php-->
<!--    $clean_option_1 = strip_tags($question->option_1, '<br><b><i><u><strong><em>');-->
<!--    $clean_option_2 = strip_tags($question->option_2, '<br><b><i><u><strong><em>');-->
<!--    $clean_option_3 = strip_tags($question->option_3, '<br><b><i><u><strong><em>');-->
<!--    $clean_option_4 = strip_tags($question->option_4, '<br><b><i><u><strong><em>');-->

<!--    $options = [-->
<!--        ['letter' => 'A', 'text' => $clean_option_1],-->
<!--        ['letter' => 'B', 'text' => $clean_option_2],-->
<!--        ['letter' => 'C', 'text' => $clean_option_3],-->
<!--        ['letter' => 'D', 'text' => $clean_option_4],-->
<!--    ];-->
<!--@endphp-->
@php
    // Remove ALL HTML tags from the options
    $clean_option_1 = strip_tags($question->option_1);
    $clean_option_2 = strip_tags($question->option_2);
    $clean_option_3 = strip_tags($question->option_3);
    $clean_option_4 = strip_tags($question->option_4);

    $options = [
        ['letter' => 'A', 'text' => $clean_option_1],
        ['letter' => 'B', 'text' => $clean_option_2],
        ['letter' => 'C', 'text' => $clean_option_3],
        ['letter' => 'D', 'text' => $clean_option_4],
    ];
@endphp



@foreach ($options as $option)
<div class="review-option 
    @if ($option['letter'] === $question->user_answer && $option['letter'] !== $question->correct_answer) 
        bg-danger text-white
    @elseif ($option['letter'] === $question->correct_answer) 
        bg-success text-white
    @endif
">
    <span class="feedback-icon">
        @if ($option['letter'] === $question->user_answer && $option['letter'] === $question->correct_answer)
            <i class="fas fa-check-circle text-success"></i>
        @elseif ($option['letter'] === $question->user_answer && $option['letter'] !== $question->correct_answer)
            <i class="fas fa-times-circle text-danger"></i>
        @elseif ($option['letter'] === $question->correct_answer)
            <i class="fas fa-check-circle text-success"></i>
        @endif
    </span>
    {{ $option['letter'] }}. {{ $option['text'] }}
</div>
@endforeach


                            </div>
                        @endforeach
                    @endif

                    <!-- Back Button -->
                    <div class="text-center back-button-container">
                        <a href="{{ route('quiz.results', ['slug' => $chapterSlug]) }}"
                            class="btn btn-secondary btn-lg">Back to Results</a>
                    </div>
                </div><!-- End #quiz-review-area -->
            </div><!-- End Col -->
        </div><!-- End Row -->
    </main>
@endsection

<style>
    .review-option {
        margin-bottom: 8px;
        padding: 8px;
        border-radius: 4px;
        cursor: pointer;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .feedback-icon {
        margin-right: 8px;
    }
</style>
