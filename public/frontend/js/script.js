// js/script.js
document.addEventListener('DOMContentLoaded', function() {

    // --- Navbar Active Link ---
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const currentPath = window.location.pathname.split("/").pop() || 'index.html'; // Get current page filename

    navLinks.forEach(link => {
        // Make link active if its href matches the current page
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
        // Special case for index.html (Home)
        if (currentPath === 'index.html' && link.getAttribute('href') === 'index.html') {
             link.classList.add('active');
        }
    });


    // --- Login/Signup Toggle ---
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const showSignupLink = document.getElementById('show-signup');
    const showLoginLink = document.getElementById('show-login');
    const loginContainer = document.getElementById('login-container'); // Container for login form
    const signupContainer = document.getElementById('signup-container'); // Container for signup form (might be the same element in some layouts)


    if (showSignupLink && showLoginLink && loginContainer && signupContainer) {
        showSignupLink.addEventListener('click', (e) => {
            e.preventDefault();
            loginContainer.style.display = 'none';
            signupContainer.style.display = 'block';
        });

        showLoginLink.addEventListener('click', (e) => {
            e.preventDefault();
            signupContainer.style.display = 'none';
            loginContainer.style.display = 'block';
        });
    }


    // --- Simple Quiz Interaction Example ---
    const quizOptions = document.querySelectorAll('.quiz-options .btn');
    quizOptions.forEach(button => {
        button.addEventListener('click', function() {
            // Remove 'selected' class from all buttons in this quiz
            quizOptions.forEach(btn => btn.classList.remove('selected'));
            // Add 'selected' class to the clicked button
            this.classList.add('selected');
            // In a real quiz, you'd store the answer and load the next question here
            console.log('Selected option:', this.textContent.trim());
        });
    });


    // --- Basic Form Validation Feedback (Bootstrap handles most) ---
    // Example: Add 'was-validated' class on submit to show feedback
    const forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

}); // End DOMContentLoaded

// side panel 
// Select elements
const profileButton = document.getElementById('userDropdown');
const sidePanel = document.getElementById('sidePanel');
const closePanel = document.getElementById('closePanel');

// Open the panel when the profile button is clicked
profileButton.addEventListener('click', () => {
    sidePanel.classList.add('open');
});

// Close the panel when the close button is clicked
closePanel.addEventListener('click', () => {
    sidePanel.classList.remove('open');
});

// Close the panel when clicking outside of it
document.addEventListener('click', (event) => {
    if (!sidePanel.contains(event.target) && !profileButton.contains(event.target)) {
        sidePanel.classList.remove('open');
    }
});

