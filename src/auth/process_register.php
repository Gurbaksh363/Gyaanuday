<?php
  session_start();
  require_once __DIR__ . "/../../config/database.php";

  if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if (empty($username) || empty($email) || empty($password)){
      $_SESSION['error'] = "All fields are required.";
      header("Location: /gyaanuday/public/register.php");
      exit;
    }
    
    // Check password length
    if (strlen($password) < 8) {
      $_SESSION['error'] = "Password must be at least 8 characters long.";
      header("Location: /gyaanuday/public/register.php");
      exit;
    }

    // Check email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if($stmt->fetch()){
      $_SESSION['error'] = "Email already registered. Please use a different email or login.";
      header("Location: /gyaanuday/public/register.php");
      exit;
    }

    // Check username already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if($stmt->fetch()){
      $_SESSION['error'] = "Username already taken. Please choose a different username.";
      header("Location: /gyaanuday/public/register.php");
      exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Register user in db
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    
    try{
      $stmt->execute([$username, $email, $hashedPassword]);
      $_SESSION['success'] = "Registration successful! You can now log in.";
      header("Location: /gyaanuday/public/login.php");
      exit;
    }
    catch(\PDOException $e){
      $_SESSION['error'] = "Registration failed. Please try again.";
      header("Location: /gyaanuday/public/register.php");
      exit;
    }
  } else{
    $_SESSION['error'] = "Invalid request method.";
    header("Location: /gyaanuday/public/register.php");
    exit;
  }
?>