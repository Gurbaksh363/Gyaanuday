<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Create Account</title>
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Archivo', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #fff;
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
            background: url('https://cdn.vectorstock.com/i/preview-1x/67/45/background-design-with-rainbow-color-vector-6745793.jpg') no-repeat center/cover;
        }

        /* Middle Section (Form) */
        .middle-section {
            flex: 1.5;
            padding:200px;
            text-align: center;
            background: white;
        }

        header h2 {
            font-size: 26px;
            margin-bottom: 5px;
        }

        header p {
            font-size: 14px;
            color: gray;
            margin-bottom: 20px;
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
            border: 1px solid #ddd;
            padding: 12px;
            border-radius: 6px;
            background: #f9f9f9;
        }

        .input-group input {
            width: 100%;
            border: none;
            outline: none;
            background: transparent;
            padding-left: 10px;
            font-size: 14px;
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
            border-radius: 6px;
        }

        .btn-primary:hover {
            background: #A7D820;
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
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }


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
            color:#A7D820;
            text-decoration: none;
        }

    </style>
</head>
<body>
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
            <form method="post" action="../src/auth/process_login.php">
                <div class="input-group">
                    <span>✉</span>
                    <input name="email" type="email" placeholder="Your email address">
                </div>

                <div class="input-group">
                    <span>⚿</span>
                    <input name="password" type="password" placeholder="Enter your password">
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="terms">
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
            <!-- <footer>
                <p>Already registered? <a href="login.php">Log In</a></p>
            </footer> -->

        </section>

        

    </div>
    <aside class="right-section">
        <img src="https://s3-alpha-sig.figma.com/img/6eb3/1312/da8ab2c0d96e3ae0487e6b00617da5ce?Expires=1742774400&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=qyQnGBFaEAFOAvsXwTnAnz2LY9cM5MpNvFO24X0NV0oIW76w2dwoxjr4pN9pH6dvpm413uX4u2nFpk-f8W0oDN8Hi9WiZ3Lk0YpbCDA1MEYHScff4S-0CNMsV-8hVqNZ~x6c8bqvAhWDJr~e1~sKP4CUiClnQpR2~sco0jQcQq3LKn-Yx~epM7Q~ucOGa0to7W4-MIVfPXZcqnJpY3FTiLVcTz4W9PNYoMBIu4xhW3bbFlh05vkFMfylna5tHtSgbnRmHu0eajyv9HbrZMizlxdhaoCFF3R7kQpSQX3wIXvzRVQ1UBEsGKPjqeDv-MX-SrBn-WTtLpx5aao666VGWQ__" alt="Side Image">
    </aside>
    
</body>
</html>