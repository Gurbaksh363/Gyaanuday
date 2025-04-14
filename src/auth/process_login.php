<?php
  require_once __DIR__ . "/../../config/database.php";
  session_start();
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Simple validation
    if (empty($email) || empty($password)) {
      $_SESSION["error"] = "Both email and password are required.";
      header("Location: /gyaanuday/public/login.php");
      exit;
    }

    try {
      // Fetch userdata from db
      $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE email = ?");
      $stmt->execute([$email]);
      $user = $stmt->fetch();
      
      // Verify password and start session
      if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_username"] = $user["username"];
        
        // Redirect to previously requested page or index
        $redirect = isset($_SESSION['redirect_after_login']) ? $_SESSION['redirect_after_login'] : '/gyaanuday/public/index.php';
        unset($_SESSION['redirect_after_login']); // Clear the stored URL
        
        header("Location: " . $redirect);
        exit;
      } else {
        $_SESSION["error"] = "Invalid email or password. Please try again.";
        header("Location: /gyaanuday/public/login.php");
        exit;
      }
    } catch (PDOException $e) {
      $_SESSION["error"] = "Database error. Please try again later.";
      header("Location: /gyaanuday/public/login.php");
      exit;
    }
  } else {
    $_SESSION["error"] = "Invalid request method.";
    header("Location: /gyaanuday/public/login.php");
    exit;
  }
?>