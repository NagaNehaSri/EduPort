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

            <h2>{{ $chapter->chapters_name }}</h2>
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
                <button id="submit-quiz-btn" class="btn btn-success" style="display: none;">Submit Quiz <i
                        class="fas fa-check ms-1"></i></button>
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
                // console.log(responseData);


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

                    // Populate the question with optional image
                    // Populate the question text + image if available
                    const questionContainer = document.getElementById('question-text');
                    questionContainer.innerHTML = ''; // Clear previous

                    // Wrapper for number + image + text
                    const wrapper = document.createElement('div');
                    wrapper.style.display = 'flex';
                    wrapper.style.alignItems = 'center';
                    wrapper.style.gap = '10px';

                    // Add question number
                    const numberSpan = document.createElement('span');
                    numberSpan.textContent = `${responseData.total_questions}.`;
                    numberSpan.style.fontWeight = 'bold';
                    wrapper.appendChild(numberSpan);

                    // Add image if available
                    if (responseData.question_image && responseData.question_image.trim() !== '') {
                        const img = document.createElement('img');
                        img.src = responseData.question_image; // already full asset URL
                        img.alt = 'Question Image';
                        img.style.width = '80px';
                        img.style.height = '80px';
                        img.style.objectFit = 'cover';
                        img.style.borderRadius = '5px';
                        wrapper.appendChild(img);
                    }

                    // Add question text
                    const textSpan = document.createElement('span');
                    textSpan.textContent = responseData.question;
                    wrapper.appendChild(textSpan);

                    // Append wrapper to container
                    questionContainer.appendChild(wrapper);


                    // Clear previous options
                    const optionsContainer = document.getElementById('quiz-options');
                    optionsContainer.innerHTML = '';

                    // Dynamically create buttons for each option
                    // responseData.options.forEach(option => {
                    //     const button = document.createElement('button');
                    //     button.className = 'btn quiz-option';
                    //     button.innerHTML =
                    //         `<span class="option-letter">${option.letter}</span> ${option.text}`;
                    //     button.onclick = () => selectOption(button, option.text);
                    //     optionsContainer.appendChild(button);
                    // });
                    // Dynamically create buttons for each option (with text and image)


                    responseData.options.forEach(option => {
                        const button = document.createElement('button');
                        button.className = 'btn quiz-option d-flex align-items-center mb-2';
                        button.style.textAlign = 'left';

                        let optionContent = `<span class="option-letter me-2">${option.letter}</span>`;

                        let imageUrl = "{{ asset('uploads/quiz') }}/" + option.image;

                        if (option.image) {
                            optionContent += `<img src="${imageUrl}" alt="Option Image" 
                                style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">`;
                        }

                        // Add text only if it exists
                        if (option.text && option.text.trim() !== "") {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(option.text, 'text/html');
                            const plainText = doc.body.textContent || "";
                            optionContent += `<span>${plainText}</span>`;
                        }

                        // if (option.text && option.text.trim() !== "") {
                        //     optionContent += `<span>${option.text}</span>`;
                        // }

                        button.innerHTML = optionContent;
                        button.onclick = () => selectOption(button, option.letter);
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
        let selectoption = null;

        // Function to handle option selection
        function selectOption(selectedButton, answer) {
            // debugger
            // Remove "active" class from all options
            const allOptions = document.querySelectorAll('.quiz-option');
            allOptions.forEach(option => option.classList.remove('active'));

            // Add "active" class to the selected option
            selectedButton.classList.add('active');

            // Enable the "Submit Answer" button
            selectedAnswer = answer;
            // selectoption = letter;
            document.getElementById('submit-answer-btn').disabled = false;
        }

        // Handle "Submit Answer" button click
        document.getElementById('submit-answer-btn').onclick = function () {
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
        document.getElementById('submit-quiz-btn').onclick = function () {
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