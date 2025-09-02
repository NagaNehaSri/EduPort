@extends('frontend.layouts.main')

@section('main-section')
    <!-- Navbar -->

    <!-- Page Header -->
    <header class="page-header" style="background-color: var(--primary-green);">
        <div class="container">
            <h1>Quiz Time!</h1>
            <p>Test your knowledge on fascinating topics.</p>
        </div>
    </header>

    <main class="container my-5">
        <div class="quiz-container">
            <div class="text-center mb-4">
                <i class="fas fa-bullhorn fa-3x text-muted me-2"></i>
                <i class="fas fa-question-circle fa-3x text-muted"></i>
            </div>

            <h2>{{ $chapter->chapters_name  }}</h2>
            <p class="question" id="question-text">
                Loading<span class="loading-dots">
                    <span>.</span>
                    <span>.</span>
                    <span>.</span>
                </span>
            </p>
            <div class="quiz-options" id="quiz-options"></div>

            <div class="quiz-navigation d-flex justify-content-between mt-3">
                <button id="submit-answer-btn" class="btn btn-primary" disabled>Submit Next</button>
                <button id="next-question-btn" class="btn btn-success" style="display: none;">Next Question</button>
                <button id="submit-quiz-btn" class="btn btn-success" style="display: none;">Submit Quiz <i class="fas fa-check ms-1"></i></button>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // debugger
        // Initialize variables
        let currentQuestionId = null;
        let chapterSlug = "{{ $chapter->slug }}"; // Use slug instead of chapter_id
        let totalQuestions = 0; // Total number of questions in the quiz
        let currentQuestionIndex = 0; // Current question index (zero-based)
        let correctAnswers = 0;

        // Function to load the next question
        function loadQuestion() {
            axios.get('/get-question', {
                params: {
                    slug: chapterSlug, // Pass the slug instead of chapter_id
                    current_question_id: currentQuestionId
                }
            }).then(response => {
                const responseData = response.data;

                if (responseData.redirect) {
                    // Redirect to the quiz results page
                    window.location.href = responseData.redirect;
                    return;
                }

                if (responseData) {
                    // Update the total number of questions
                    totalQuestions = responseData.total_questions;

                    // Update the question number
                    currentQuestionIndex++;

                    // Populate the question text
                    document.getElementById('question-text').innerText =
                        `${responseData.total_questions}. ${responseData.question}`;

                    // Clear previous options
                    const optionsContainer = document.getElementById('quiz-options');
                    optionsContainer.innerHTML = '';

                    // Dynamically create buttons for each option
                    responseData.options.forEach(option => {
                        const button = document.createElement('button');
                        button.className = 'btn quiz-option';
                        button.innerHTML =
                            `<span class="option-letter">${option.letter}</span> ${option.text}`;
                        button.onclick = () => selectOption(button, option.text);
                        optionsContainer.appendChild(button);
                    });

                    // Disable the "Submit Answer" button initially
                    document.getElementById('submit-answer-btn').disabled = true;
                    document.getElementById('submit-answer-btn').style.display = 'block';
                    document.getElementById('next-question-btn').style.display = 'none';
                    document.getElementById('submit-quiz-btn').style.display = 'none';

                    // Update the current question ID
                    currentQuestionId = responseData.id;
                }
            });
        }

        let selectedAnswer = null;

        // Function to handle option selection
        function selectOption(selectedButton, answer) {
            // Remove "active" class from all options
            const allOptions = document.querySelectorAll('.quiz-option');
            allOptions.forEach(option => option.classList.remove('active'));

            // Add "active" class to the selected option
            selectedButton.classList.add('active');

            // Enable the "Submit Answer" button
            selectedAnswer = answer;
            document.getElementById('submit-answer-btn').disabled = false;
        }

        // Handle "Submit Answer" button click
        document.getElementById('submit-answer-btn').onclick = function() {
            if (!selectedAnswer) {
                alert('Please select an answer before submitting.');
                return;
            }

            // Submit the selected answer
            axios.post('/submit-answer', {
                question_id: currentQuestionId,
                answer: selectedAnswer,
            }).then(response => {
                if (response.data.is_correct) {
                    correctAnswers++;
                }

                // Load the next question
                loadQuestion();
            });
        };

        // Handle "Next Question" button click
        document.getElementById('next-question-btn').onclick = loadQuestion;

        // Handle "Submit Quiz" button click
        document.getElementById('submit-quiz-btn').onclick = function() {
            axios.post('/calculate-score', {
                slug: chapterSlug // Pass the slug instead of chapter_id
            }).then(response => {
                const percentage = response.data.percentage;
                alert(`You scored ${percentage.toFixed(2)}%!`);
            });
        };

        // Initialize the quiz
        loadQuestion();
    </script>

@endsection