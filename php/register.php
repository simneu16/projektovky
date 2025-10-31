<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UnitMate - Registrácia</title>
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php require './header.php'; ?>

    <!-- Register Container -->
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <h1 class="register-title">Registrácia</h1>
                <p class="register-subtitle">Vytvorte si účet v UnitMate</p>
            </div>

            <div class="success-message" id="successMessage">
                ✓ Účet bol úspešne vytvorený!
            </div>

            <form id="registerForm">
                <!-- Required Fields -->
                <div class="form-section">
                    <div class="section-title">
                        Povinné údaje
                        <span class="required-badge">POVINNÉ</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="firstName">Meno *</label>
                        <input type="text" id="firstName" name="firstname" class="form-input" required
                            placeholder="Zadajte svoje meno">
                        <div class="error-message" id="firstNameError">Meno je povinné</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="lastName">Priezvisko *</label>
                        <input type="text" id="lastName" name="lastname" class="form-input" required
                            placeholder="Zadajte svoje priezvisko">
                        <div class="error-message" id="lastNameError">Priezvisko je povinné</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="username">Používateľské meno *</label>
                        <input type="text" id="username" name="login" class="form-input" required
                            placeholder="Zvoľte si používateľské meno">
                        <div class="input-hint">Minimálne 4 znaky</div>
                        <div class="error-message" id="usernameError">Používateľské meno musí mať aspoň 4 znaky</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Heslo *</label>
                        <input type="password" id="password" name="password" class="form-input" required
                            placeholder="Vytvorte silné heslo">
                        <div class="password-strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <div class="strength-text" id="strengthText"></div>
                        </div>
                        <div class="input-hint">Minimálne 8 znakov, vrátane čísla a veľkého písmena</div>
                        <div class="error-message" id="passwordError">Heslo musí mať aspoň 8 znakov</div>
                    </div>
                </div>

                <!-- Optional Fields -->
                <div class="form-section">
                    <div class="section-title">
                        Voliteľné údaje
                        <span class="optional-badge">VOLITEĽNÉ</span>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="telephone">Telefón</label>
                        <input type="tel" id="telephone" name="telephone" class="form-input"
                            placeholder="+421 XXX XXX XXX">
                        <div class="input-hint">Formát: +XXX XXX XXX XXX</div>
                        <div class="error-message" id="telephoneError">Neplatný formát telefónneho čísla</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="vas@email.sk">
                        <div class="error-message" id="emailError">Neplatný email</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="address">Adresa</label>
                        <input type="text" id="address" name="address" class="form-input"
                            placeholder="Ulica a číslo, Mesto PSČ">
                    </div>
                </div>

                <button type="submit" class="register-btn">Vytvoriť účet</button>
            </form>

            <div class="login-link">
                Už máte účet? <a href="login.html">Prihláste sa</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require './footer.php'; ?>

    <script>
        // Password strength checker
        const passwordInput = document.getElementById('password');
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');

        passwordInput.addEventListener('input', function () {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            const percentage = (strength / 5) * 100;
            strengthFill.style.width = percentage + '%';

            if (strength <= 2) {
                strengthFill.style.background = '#ef4444';
                strengthText.textContent = 'Slabé heslo';
                strengthText.style.color = '#ef4444';
            } else if (strength <= 3) {
                strengthFill.style.background = '#f59e0b';
                strengthText.textContent = 'Stredné heslo';
                strengthText.style.color = '#f59e0b';
            } else {
                strengthFill.style.background = '#22c55e';
                strengthText.textContent = 'Silné heslo';
                strengthText.style.color = '#22c55e';
            }
        });

        // Form validation
        function validateForm() {
            let isValid = true;

            // Clear previous errors
            document.querySelectorAll('.form-input').forEach(input => {
                input.classList.remove('error');
            });
            document.querySelectorAll('.error-message').forEach(msg => {
                msg.classList.remove('show');
            });

            // Validate first name
            const firstName = document.getElementById('firstName');
            if (firstName.value.trim() === '') {
                firstName.classList.add('error');
                document.getElementById('firstNameError').classList.add('show');
                isValid = false;
            }

            // Validate last name
            const lastName = document.getElementById('lastName');
            if (lastName.value.trim() === '') {
                lastName.classList.add('error');
                document.getElementById('lastNameError').classList.add('show');
                isValid = false;
            }

            // Validate username
            const username = document.getElementById('username');
            if (username.value.trim().length < 4) {
                username.classList.add('error');
                document.getElementById('usernameError').classList.add('show');
                isValid = false;
            }

            // Validate password
            const password = document.getElementById('password');
            if (password.value.length < 8) {
                password.classList.add('error');
                document.getElementById('passwordError').classList.add('show');
                isValid = false;
            }

            // Validate telephone (optional but if filled must be valid)
            const telephone = document.getElementById('telephone');
            if (telephone.value.trim() !== '') {
                const phoneRegex = /^\+\d{1,3}\s\d{3}\s\d{3}\s\d{3}$/;
                if (!phoneRegex.test(telephone.value.trim())) {
                    telephone.classList.add('error');
                    document.getElementById('telephoneError').classList.add('show');
                    isValid = false;
                }
            }

            // Validate email (optional but if filled must be valid)
            const email = document.getElementById('email');
            if (email.value.trim() !== '') {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.value.trim())) {
                    email.classList.add('error');
                    document.getElementById('emailError').classList.add('show');
                    isValid = false;
                }
            }

            return isValid;
        }

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            if (!validateForm()) {
                return;
            }

            // Prepare data for database
            const formData = {
                firstname: document.getElementById('firstName').value.trim(),
                lastname: document.getElementById('lastName').value.trim(),
                login: document.getElementById('username').value.trim(),
                password: document.getElementById('password').value,
                telephone: document.getElementById('telephone').value.trim() || null,
                email: document.getElementById('email').value.trim() || null,
                address: document.getElementById('address').value.trim() || null
            };

            try {
                const response = await fetch('../php/register_user.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    // Show success message
                    document.getElementById('successMessage').classList.add('show');

                    // Reset form
                    this.reset();
                    strengthFill.style.width = '0%';
                    strengthText.textContent = '';

                    // Scroll to success message
                    document.getElementById('successMessage').scrollIntoView({ behavior: 'smooth' });
                } else {
                    throw new Error(result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Chyba pri registrácii: ' + error.message);
            }
        });

        // Mobile menu toggle
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.getElementById('nav-links');

        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        const menuLinks = navLinks.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                navLinks.classList.remove('active');
            });
        });

        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !navLinks.contains(e.target)) {
                mobileMenu.classList.remove('active');
                navLinks.classList.remove('active');
            }
        });
    </script>
</body>

</html>