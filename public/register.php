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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #fff;
            padding-top: 70px;
        }
        
        .button-hover {
            transition: all 0.3s ease;
        }
        
        .button-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            display: flex;
            width: 80%;
            align-items: center;
            justify-content: center;
            max-width: 1000px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-container {
            flex: 1;
            max-width: 400px;  
            padding: 20px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        /* Left & Right Side Image Background */
        .left-section, .right-section {
            flex: 1;
            background: url('https://s3-alpha-sig.figma.com/img/6eb3/1312/da8ab2c0d96e3ae0487e6b00617da5ce?Expires=1742774400&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=qyQnGBFaEAFOAvsXwTnAnz2LY9cM5MpNvFO24X0NV0oIW76w2dwoxjr4pN9pH6dvpm413uX4u2nFpk-f8W0oDN8Hi9WiZ3Lk0YpbCDA1MEYHScff4S-0CNMsV-8hVqNZ~x6c8bqvAhWDJr~e1~sKP4CUiClnQpR2~sco0jQcQq3LKn-Yx~epM7Q~ucOGa0to7W4-MIVfPXZcqnJpY3FTiLVcTz4W9PNYoMBIu4xhW3bbFlh05vkFMfylna5tHtSgbnRmHu0eajyv9HbrZMizlxdhaoCFF3R7kQpSQX3wIXvzRVQ1UBEsGKPjqeDv-MX-SrBn-WTtLpx5aao666VGWQ__') no-repeat center/cover;
            height: 100vh;
        }
        
        .left-section img, .right-section img {
            width: 300px;
            height: 100vh; 
            object-fit: cover; 
        }

        /* Middle Section (Form) */
        .middle-section {
            flex: 1.5;
            padding: 200px;
            text-align: center;
            background: white;
        }

        header h2 {
            font-size: 32px;
            margin-bottom: 10px;
            font-family: 'Archivo', sans-serif;
            color: #171a1f;
            line-height: 48px;
        }

        header p {
            font-size: 16px;
            color: #565d6d;
            margin-bottom: 20px;
            line-height: 26px;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
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
        }

        .checkbox-group input {
            margin-right: 8px;
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
        }

        .btn-primary:hover {
            background: #95c118;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .divider {
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: gray;
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #ddd;
            margin: 0 10px;
        }

        /* Social Login Buttons */
        .social-login {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-btn {
            width: 100%;
            padding: 12px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .apple { background: #f8f8f8; color: black; }
        .google { background: #ffdddd; color: red; }
        .facebook { background: #ddeeff; color: blue; }

        /* Footer */
        footer {
            margin-top: 15px;
            font-size: 14px;
            padding-top: 30px;
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
        
        .logo-link {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .logo-text {
            font-family: 'Archivo', sans-serif;
            font-size: 28px;
            font-weight: bold;
            margin-left: 8px;
            color: #171a1f;
        }
    </style>
</head>
<body>
    <!-- Simple logo link to go back to home -->
    <a href="index.php" class="logo-link">
        <i class="fas fa-project-diagram text-2xl" style="color: #A7D820;"></i>
        <span class="logo-text">Gyaanuday</span>
    </a>

    <aside class="left-section">
        <img src="https://s3-alpha-sig.figma.com/img/6eb3/1312/da8ab2c0d96e3ae0487e6b00617da5ce?Expires=1742774400&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=qyQnGBFaEAFOAvsXwTnAnz2LY9cM5MpNvFO24X0NV0oIW76w2dwoxjr4pN9pH6dvpm413uX4u2nFpk-f8W0oDN8Hi9WiZ3Lk0YpbCDA1MEYHScff4S-0CNMsV-8hVqNZ~x6c8bqvAhWDJr~e1~sKP4CUiClnQpR2~sco0jQcQq3LKn-Yx~epM7Q~ucOGa0to7W4-MIVfPXZcqnJpY3FTiLVcTz4W9PNYoMBIu4xhW3bbFlh05vkFMfylna5tHtSgbnRmHu0eajyv9HbrZMizlxdhaoCFF3R7kQpSQX3wIXvzRVQ1UBEsGKPjqeDv-MX-SrBn-WTtLpx5aao666VGWQ__" alt="Side Image">
    </aside>
    
    <div class="container">
        <!-- Middle Section (Form) -->
        <section class="middle-section">
            <!-- Header -->
            <header>
                <h2>Create Account</h2>
                <p>Join us to showcase your projects and collaborate with peers!</p>
            </header>

            <!-- Form -->
            <form method="post" action="../src/auth/register.php">
                <div class="input-group">
                    <span>👤</span>
                    <input name="username" type="text" placeholder="Your username" required>
                </div>
                <div class="input-group">
                    <span>✉</span>
                    <input name="email" type="email" placeholder="Your email address" required>
                </div>
                <div class="input-group">
                    <span>⚿</span>
                    <input name="password" type="password" placeholder="Enter your password" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree with Terms & Conditions</label>
                </div>

                <button type="submit" class="btn-primary">Sign Up</button>
            </form>

            <!-- Divider -->
            <div class="divider">Or</div>

            <!-- Social Login Buttons -->
            <section class="social-login">
                <button class="social-btn apple">🍏 Continue with Apple</button>
                <button class="social-btn google"><b>G</b> Continue with Google</button>
                <button class="social-btn facebook"><b>ⓕ</b> Continue with Facebook</button>
            </section>

            <!-- Footer -->
            <footer>
                <p>Already registered? <a href="login.php">Log In</a></p>
            </footer>
        </section>
    </div>
    
    <aside class="right-section">
        <img src="https://s3-alpha-sig.figma.com/img/6eb3/1312/da8ab2c0d96e3ae0487e6b00617da5ce?Expires=1742774400&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=qyQnGBFaEAFOAvsXwTnAnz2LY9cM5MpNvFO24X0NV0oIW76w2dwoxjr4pN9pH6dvpm413uX4u2nFpk-f8W0oDN8Hi9WiZ3Lk0YpbCDA1MEYHScff4S-0CNMsV-8hVqNZ~x6c8bqvAhWDJr~e1~sKP4CUiClnQpR2~sco0jQcQq3LKn-Yx~epM7Q~ucOGa0to7W4-MIVfPXZcqnJpY3FTiLVcTz4W9PNYoMBIu4xhW3bbFlh05vkFMfylna5tHtSgbnRmHu0eajyv9HbrZMizlxdhaoCFF3R7kQpSQX3wIXvzRVQ1UBEsGKPjqeDv-MX-SrBn-WTtLpx5aao666VGWQ__" alt="Side Image">
    </aside>
</body>
</html>