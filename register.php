<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Gyaanuday</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Archivo&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3, h4 {
            font-family: 'Archivo', sans-serif;
        }

        body {
            min-height: 100vh;
            height: 100vh;
            background: url('./images/Signup/bg.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #A7D820;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-top: 25px;
        }

        .btn-primary:hover {
            background: #95c118;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        
        .logo {
            font-family: 'Archivo', sans-serif;
            font-size: 36px;
            font-weight: bold;
            color: #171a1f;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo i {
            color: #A7D820;
            margin-right: 12px;
            font-size: 36px;
        }

        header h2 {
            font-size: 28px;
            margin-bottom: 10px;
            font-family: 'Archivo', sans-serif;
            color: #171a1f;
            line-height: 48px;
        }

        header p {
            font-size: 16px;
            color: #565d6d;
            margin-bottom: 30px;
            line-height: 26px;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            border: none;
            outline: none; 
        }

        .input-group {
            display: flex;
            align-items: center;
            border: 1px solid #bdc1ca;
            padding: 12px;
            border-radius: 8px;
            background: #f9f9f9;
            transition: all 0.3s ease;
        }
        
        .input-group:focus-within {
            border-color: #A7D820;
            box-shadow: 0 0 0 2px rgba(167, 216, 32, 0.2);
        }
        
        .input-group .icon {
            color: #565d6d;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .input-group input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            padding-left: 10px;
            font-size: 16px;
            line-height: 26px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            font-size: 14px;
            justify-content: flex-start;
            margin-top: 5px;
        }

        .checkbox-group input {
            margin-right: 8px;
        }

        /* Footer */
        footer {
            margin-top: 30px;
            font-size: 14px;
        }

        footer a {
            color: #A7D820;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        footer a:hover {
            color: #95c118;
            text-decoration: underline;
        }
        
        .home-link {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            background-color: rgba(0,0,0,0.6);
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .home-link:hover {
            background-color: #A7D820;
            color: white;
        }
        
        .home-link i {
            margin-right: 8px;
            font-size: 16px;
        }
        
        /* Error message styling */
        .error-message {
            color: #e74c3c;
            background-color: #fde8e8;
            border: 1px solid #f5b7b1;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        /* Success message styling */
        .success-message {
            color: #27ae60;
            background-color: #e8f8f0;
            border: 1px solid #abebc6;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        /* Password toggle icon styling */
        .password-toggle {
            cursor: pointer;
            color: #565d6d;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: #A7D820;
        }
        
        /* Password strength indicator */
        .password-strength {
            margin-top: 5px;
            font-size: 12px;
            text-align: left;
            padding-left: 34px;
        }
        
        .strength-weak {
            color: #e74c3c;
        }
        
        .strength-medium {
            color: #f39c12;
        }
        
        .strength-strong {
            color: #27ae60;
        }
    </style>
</head>
<body>
    <!-- Home link button -->
    <a href="index.php" class="home-link">
        <i class="fas fa-home"></i> Home
    </a>
    
    <div class="form-container">
        <!-- Logo/Branding -->
        <div class="logo">
            <i class="fas fa-project-diagram"></i>
            <span>Gyaanuday</span>
        </div>
        
        <!-- Header -->
        <header>
            <h2>Create Account</h2>
            <p>Join us to showcase your projects and collaborate with peers!</p>
        </header>

        <!-- Error Messages -->
        <?php if(isset($_SESSION['error'])): ?>
            <div class="error-message">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        
        <!-- Success Messages -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="success-message">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="post" action="src/auth/process_register.php" id="registerForm">
            <div class="input-group">
                <span class="icon"><i class="fas fa-user"></i></span>
                <input name="username" type="text" placeholder="Your username" required>
            </div>
            <div class="input-group">
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <input name="email" type="email" placeholder="Your email address" required>
            </div>
            <div class="input-group">
                <span class="icon"><i class="fas fa-lock"></i></span>
                <input name="password" id="password" type="password" placeholder="Enter your password" required>
                <span class="password-toggle" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <div class="password-strength" id="passwordStrength"></div>

            <div class="checkbox-group">
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree with Terms & Conditions</label>
            </div>

            <button type="submit" class="btn-primary">Sign Up</button>
        </form>

        <!-- Footer -->
        <footer>
            <p>Already registered? <a href="login.php">Log In</a></p>
        </footer>
    </div>
    
    <script>
        // Password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            // Toggle password visibility
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthIndicator = document.getElementById('passwordStrength');
            
            // Clear previous strength message
            strengthIndicator.textContent = '';
            strengthIndicator.className = 'password-strength';
            
            if (password.length === 0) return;
            
            if (password.length < 8) {
                strengthIndicator.textContent = '⚠️ Password too short (minimum 8 characters)';
                strengthIndicator.classList.add('strength-weak');
                return;
            }
            
            // Simple strength check
            let strength = 0;
            if (password.length >= 8) strength += 1;
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            
            switch (strength) {
                case 0:
                case 1:
                    strengthIndicator.textContent = '⚠️ Weak password';
                    strengthIndicator.classList.add('strength-weak');
                    break;
                case 2:
                    strengthIndicator.textContent = '🔒 Medium strength password';
                    strengthIndicator.classList.add('strength-medium');
                    break;
                default:
                    strengthIndicator.textContent = '✅ Strong password';
                    strengthIndicator.classList.add('strength-strong');
            }
        });
        
        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            
            if (password.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long.');
            }
        });
    </script>
</body>
</html>