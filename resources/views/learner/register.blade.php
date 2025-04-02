<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learner Registration</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --error-color: #ef476f;
            --success-color: #06d6a0;
            --text-color: #2b2d42;
            --light-text: #8d99ae;
            --bg-color: #f8f9fa;
            --card-bg: #ffffff;
            --border-color: #e9ecef;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .form-container {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 550px;
            padding: 2rem;
            margin: 2rem auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            color: var(--primary-color);
            font-size: 1.8rem;
            font-weight: 600;
        }

        .form-header p {
            color: var(--light-text);
            margin-top: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .form-col {
            flex: 1 1 240px;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        .form-control::placeholder {
            color: var(--light-text);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%238d99ae' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
            padding-right: 2.5rem;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 0.85rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-primary:hover:not(:disabled) {
            background-color: var(--primary-hover);
        }

        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        .success-message {
            background-color: rgba(6, 214, 160, 0.1);
            color: var(--success-color);
            padding: 0.75rem;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--light-text);
            cursor: pointer;
        }

        .progress-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }

        .progress-indicator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--border-color);
            z-index: 1;
            transform: translateY(-50%);
        }

        .progress-step {
            width: 30px;
            height: 30px;
            background-color: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--light-text);
            position: relative;
            z-index: 2;
        }

        .progress-step.active {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .progress-step.completed {
            border-color: var(--primary-color);
            background-color: var(--primary-color);
            color: white;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-back {
            flex: 1;
            padding: 0.85rem;
            background-color: transparent;
            color: var(--text-color);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-back:hover {
            background-color: var(--bg-color);
        }

        .btn-next {
            flex: 2;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 1.5rem;
                margin: 1rem auto;
            }

            .form-header h1 {
                font-size: 1.5rem;
            }

            .nav-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Learner Registration</h1>
            <p>Complete the form to register as a learner</p>
        </div>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <div class="progress-indicator">
            <div class="progress-step active" data-step="1">1</div>
            <div class="progress-step" data-step="2">2</div>
            <div class="progress-step" data-step="3">3</div>
        </div>

        <form method="POST" action="{{ route('learner.register.submit') }}" id="registrationForm">
            @csrf

            <!-- Section 1: Account Information -->
            <div class="form-section active" data-section="1">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required autocomplete="off"
                        placeholder="your.email@example.com">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" class="form-control" required
                            autocomplete="off" placeholder="Minimum 8 characters">
                        <button type="button" class="toggle-password"
                            aria-label="Toggle password visibility">👁️</button>
                    </div>
                    <div id="password-strength" class="error-message"></div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" required autocomplete="off" placeholder="Confirm your password">
                        <button type="button" class="toggle-password"
                            aria-label="Toggle password visibility">👁️</button>
                    </div>
                    <div id="password-match" class="error-message"></div>
                </div>

                <div class="nav-buttons">
                    <button type="button" class="btn-primary btn-next" id="nextToSection2">Continue</button>
                </div>
            </div>

            <!-- Section 2: Personal Information -->
            <div class="form-section" data-section="2">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" required
                                autocomplete="off" placeholder="As per identification">
                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="given_name">Given Name</label>
                            <input type="text" id="given_name" name="given_name" class="form-control" required
                                autocomplete="off" placeholder="Preferred name">
                            @error('given_name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="cpr">Civil Personal Record (CPR)</label>
                            <input type="text" id="cpr" name="cpr" class="form-control" required
                                autocomplete="off" placeholder="e.g., CPR-12345678">
                            @error('cpr')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control" required
                        autocomplete="off" placeholder="e.g., +1234567890">
                    @error('phone_number')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="nav-buttons">
                    <button type="button" class="btn-back" id="backToSection1">Back</button>
                    <button type="button" class="btn-primary btn-next" id="nextToSection3">Continue</button>
                </div>
            </div>

            <!-- Section 3: Organization Information -->
            <div class="form-section" data-section="3">
                <div class="form-group">
                    <label for="org_name">Organization Name</label>
                    <input type="text" id="org_name" name="org_name" class="form-control" required
                        autocomplete="off" placeholder="Company or institution name">
                    @error('org_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="is_representative">Are you applying as a representative?</label>
                            <select id="is_representative" name="is_representative" class="form-control" required>
                                <option value="" disabled selected>Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('is_representative')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-col">
                        <div class="form-group">
                            <label for="citizen">Are you a citizen?</label>
                            <select id="citizen" name="citizen" class="form-control" required>
                                <option value="" disabled selected>Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('citizen')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="how_did_you_hear">How did you hear about this activity?</label>
                    <textarea id="how_did_you_hear" name="how_did_you_hear" class="form-control" rows="3" required
                        placeholder="Let us know where you heard about us"></textarea>
                    @error('how_did_you_hear')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="nav-buttons">
                    <button type="button" class="btn-back" id="backToSection2">Back</button>
                    <button type="submit" class="btn-primary" id="registerBtn" disabled>Complete
                        Registration</button>
                </div>
            </div>
        </form>

        <form method="get" action="{{ route('learner.login') }}">
            <div class="form-group" style="margin-top: 1rem">
                <button class="btn-primary" type="submit">Login</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form navigation
            const sections = document.querySelectorAll('.form-section');
            const progressSteps = document.querySelectorAll('.progress-step');

            // Navigation buttons
            document.getElementById('nextToSection2').addEventListener('click', function() {
                const isValid = validateSection(1);
                if (isValid) {
                    switchSection(1, 2);
                }
            });

            document.getElementById('backToSection1').addEventListener('click', function() {
                switchSection(2, 1);
            });

            document.getElementById('nextToSection3').addEventListener('click', function() {
                const isValid = validateSection(2);
                if (isValid) {
                    switchSection(2, 3);
                }
            });

            document.getElementById('backToSection2').addEventListener('click', function() {
                switchSection(3, 2);
            });

            function switchSection(fromSection, toSection) {
                // Hide current section
                document.querySelector(`.form-section[data-section="${fromSection}"]`).classList.remove('active');

                // Show target section
                document.querySelector(`.form-section[data-section="${toSection}"]`).classList.add('active');

                // Update progress steps
                updateProgressSteps(toSection);
            }

            function updateProgressSteps(currentStep) {
                progressSteps.forEach(step => {
                    const stepNumber = parseInt(step.getAttribute('data-step'));

                    if (stepNumber < currentStep) {
                        step.classList.add('completed');
                        step.classList.remove('active');
                    } else if (stepNumber === currentStep) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                    } else {
                        step.classList.remove('active', 'completed');
                    }
                });
            }

            // Password visibility toggles
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
                });
            });

            // Password strength and match validation
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const passwordStrengthDisplay = document.getElementById('password-strength');
            const passwordMatchDisplay = document.getElementById('password-match');

            passwordInput.addEventListener('input', function() {
                checkPasswordStrength(this.value);
            });

            confirmPasswordInput.addEventListener('input', function() {
                checkPasswordMatch();
            });

            function checkPasswordStrength(password) {
                if (password.length === 0) {
                    passwordStrengthDisplay.textContent = '';
                    return;
                }

                if (password.length < 8) {
                    passwordStrengthDisplay.textContent = 'Password is too short (minimum 8 characters)';
                    passwordStrengthDisplay.style.color = 'var(--error-color)';
                    return;
                }

                // Check for complexity (you can enhance this logic)
                const hasUpperCase = /[A-Z]/.test(password);
                const hasLowerCase = /[a-z]/.test(password);
                const hasNumbers = /\d/.test(password);
                const hasSpecialChars = /[!@#$%^&*(),.?":{}|<>]/.test(password);

                const strength = [hasUpperCase, hasLowerCase, hasNumbers, hasSpecialChars].filter(Boolean).length;

                if (strength <= 2) {
                    passwordStrengthDisplay.textContent = 'Weak password';
                    passwordStrengthDisplay.style.color = 'var(--error-color)';
                } else if (strength === 3) {
                    passwordStrengthDisplay.textContent = 'Medium strength password';
                    passwordStrengthDisplay.style.color = 'orange';
                } else {
                    passwordStrengthDisplay.textContent = 'Strong password';
                    passwordStrengthDisplay.style.color = 'var(--success-color)';
                }
            }

            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (confirmPassword.length === 0) {
                    passwordMatchDisplay.textContent = '';
                    return;
                }

                if (password === confirmPassword) {
                    passwordMatchDisplay.textContent = 'Passwords match';
                    passwordMatchDisplay.style.color = 'var(--success-color)';
                } else {
                    passwordMatchDisplay.textContent = 'Passwords do not match';
                    passwordMatchDisplay.style.color = 'var(--error-color)';
                }
            }

            // Form validation
            function validateSection(sectionNumber) {
                const section = document.querySelector(`.form-section[data-section="${sectionNumber}"]`);
                const inputs = section.querySelectorAll('input, select, textarea');
                let isValid = true;

                inputs.forEach(input => {
                    if (input.hasAttribute('required') && !input.value.trim()) {
                        isValid = false;
                        highlightInvalidInput(input);
                    } else {
                        removeInvalidHighlight(input);
                    }
                });

                // Special validation for section 1
                if (sectionNumber === 1) {
                    const password = passwordInput.value;
                    const confirmPassword = confirmPasswordInput.value;
                    const email = document.getElementById('email').value;

                    if (password.length < 8) {
                        isValid = false;
                        highlightInvalidInput(passwordInput);
                    }

                    if (password !== confirmPassword) {
                        isValid = false;
                        highlightInvalidInput(confirmPasswordInput);
                    }

                    if (!email.includes('@') || !email.includes('.')) {
                        isValid = false;
                        highlightInvalidInput(document.getElementById('email'));
                    }
                }

                return isValid;
            }

            function highlightInvalidInput(input) {
                input.style.borderColor = 'var(--error-color)';
                input.style.backgroundColor = 'rgba(239, 71, 111, 0.05)';
            }

            function removeInvalidHighlight(input) {
                input.style.borderColor = 'var(--border-color)';
                input.style.backgroundColor = '';
            }

            // Check form completion for enabling submit button
            const form = document.getElementById('registrationForm');
            const registerBtn = document.getElementById('registerBtn');

            form.addEventListener('input', function() {
                validateFormCompletion();
            });

            function validateFormCompletion() {
                const allRequired = document.querySelectorAll(
                    'input[required], select[required], textarea[required]');
                let isComplete = true;

                allRequired.forEach(field => {
                    if (!field.value.trim()) {
                        isComplete = false;
                    }
                });

                // Additional validation
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (password !== confirmPassword || password.length < 8) {
                    isComplete = false;
                }

                registerBtn.disabled = !isComplete;
            }
        });
    </script>
</body>

</html>
