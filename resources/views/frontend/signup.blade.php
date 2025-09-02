<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/signup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="signup-container">

        <form id="signup-form" novalidate>
            <h1>Create Your Account</h1>
            <div id="error-message" class="error-message"></div>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                <small class="validation-message" id="name-error"></small>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <small class="validation-message" id="email-error"></small>
            </div>

            <div class="form-group">
                <label for="class">Class/Grade</label>
                <input type="text" id="class" name="class" placeholder="Enter your class or grade" required>
                <small class="validation-message" id="class-error"></small>
            </div>

            <div class="form-group">
                <label for="school">School Name</label>
                <input type="text" id="school" name="school" placeholder="Enter your school name" required>
                <small class="validation-message" id="school-error"></small>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" placeholder="Enter your city" required>
                <small class="validation-message" id="city-error"></small>
            </div>

            <div class="form-group password-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Choose a strong password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                    <i class="fas fa-eye"></i>
                </span>
                <small class="validation-message" id="password-error"></small>
            </div>

            <div class="form-group password-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password"
                    required>
                <span class="toggle-password" onclick="togglePasswordVisibility('confirm-password')">
                    <i class="fas fa-eye"></i>
                </span>
                <small class="validation-message" id="confirm-password-error"></small>
            </div>

            <button type="submit" id="submit-button">Sign Up</button>

            <div class="login-link">
                Already have an account? <a href="#">Log In</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const signupForm = document.getElementById('signup-form');
        const errorMessageDiv = document.getElementById('error-message');
        const inputs = {
            name: document.getElementById('name'),
            email: document.getElementById('email'),
            class: document.getElementById('class'),
            school: document.getElementById('school'),
            city: document.getElementById('city'),
            password: document.getElementById('password'),
            confirmPassword: document.getElementById('confirm-password'),
        };
        const validationMessages = {
            name: document.getElementById('name-error'),
            email: document.getElementById('email-error'),
            class: document.getElementById('class-error'),
            school: document.getElementById('school-error'),
            city: document.getElementById('city-error'),
            password: document.getElementById('password-error'),
            confirmPassword: document.getElementById('confirm-password-error'),
        };
        
        signupForm.addEventListener('submit', function(event) {
            event.preventDefault();
            hideAllErrors();
            const formData = {};
            let isValid = true;
        
            for (const key in inputs) {
                const input = inputs[key];
                const validationMessage = validationMessages[key];
                if (!input.value.trim()) {
                    isValid = false;
                    validationMessage.textContent = `${input.placeholder} is required.`;
                } else if (key === 'email' && !isValidEmail(input.value)) {
                    isValid = false;
                    validationMessage.textContent = 'Please enter a valid email address.';
                } else if (key === 'password' && input.value.length < 8) {
                    isValid = false;
                    validationMessage.textContent = 'Password must be at least 8 characters long.';
                } else if (key === 'confirmPassword' && input.value !== inputs.password.value) {
                    isValid = false;
                    validationMessage.textContent = 'Passwords do not match.';
                } else {
                    formData[key] = input.value.trim();
                }
            }
        
            if (!isValid) return;
        
            const submitButton = document.getElementById('submit-button');
            submitButton.disabled = true;
        
            axios.post("{{ route('signup.store') }}", formData, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
            .then(response => {
                if (response.data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Signup Successful!',
                        text: 'Click OK to proceed to the login page.',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('student.login') }}";
                        }
                    });
                    signupForm.reset();
                }
            })
            .catch(error => {
                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;
                    for (const key in errors) {
                        if (validationMessages[key]) {
                            validationMessages[key].textContent = errors[key][0];
                        }
                    }
                } else {
                    errorMessageDiv.textContent = 'Signup failed. Please try again.';
                    errorMessageDiv.classList.add('show');
                }
            })
            .finally(() => {
                submitButton.disabled = false;
            });
        });
        
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        function hideAllErrors() {
            errorMessageDiv.classList.remove('show');
            for (const key in validationMessages) {
                validationMessages[key].textContent = '';
            }
        }
        </script>

</body>

</html>
