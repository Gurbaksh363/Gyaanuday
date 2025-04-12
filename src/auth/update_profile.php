<?php
  // Start session
  session_start();

  // Redirect if not logged in
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../../public/login.php");
    exit;
  }

  // Include DB connection
  require_once __DIR__ . "/../../config/database.php";

  $user_id = $_SESSION['user_id'];
  $bio = htmlspecialchars(trim($_POST['bio'] ?? ''), ENT_QUOTES, 'UTF-8');

  // Default to existing photo unless a new one is uploaded
  $stmt = $pdo->prepare("SELECT profile_photo FROM users WHERE id = ?");
  $stmt->execute([$user_id]);
  $current_photo = $stmt->fetchColumn();

  // Handle profile photo upload
  $new_photo = $current_photo;
  if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK && $_FILES['profile_photo']['size'] > 0) {
    $allowed_ext = ['jpg', 'jpeg', 'png'];
    
    // Create uploads directory structure (similar to add_project.php)
    $targetDir = __DIR__ . "/../../uploads/profile_photos/";
    
    // Ensure directory exists
    if (!file_exists($targetDir)) {
      mkdir($targetDir, 0755, true);
    }

    $tmp = $_FILES['profile_photo']['tmp_name'];
    $name = $_FILES['profile_photo']['name'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    
    if (!in_array($ext, $allowed_ext)) {
      $_SESSION['error'] = "Only JPG, JPEG, PNG files allowed.";
      header("Location: ../../public/profile.php");
      exit;
    }

    if ($_FILES['profile_photo']['size'] > 5 * 1024 * 1024) {
      $_SESSION['error'] = "File must be under 5MB.";
      header("Location: ../../public/profile.php");
      exit;
    }

    // Generate a unique name for the file
    $unique_name = uniqid('profile_') . '.' . $ext;
    $targetFile = $targetDir . $unique_name;
    
    // Move uploaded file
    if (move_uploaded_file($tmp, $targetFile)) {
      // Delete old profile photo if it exists and is not the default
      if ($current_photo && $current_photo !== 'default-avatar.png') {
        $old_file = $targetDir . $current_photo;
        if (file_exists($old_file)) {
          unlink($old_file);
        }
      }
      $new_photo = $unique_name;
    } else {
      $_SESSION['error'] = "Failed to upload profile photo.";
      header("Location: ../../public/profile.php");
      exit;
    }
  }

  // Update DB
  $stmt = $pdo->prepare("UPDATE users SET bio = ?, profile_photo = ? WHERE id = ?");
  if ($stmt->execute([$bio, $new_photo, $user_id])) {
    $_SESSION['success'] = "Profile updated successfully!";
  } else {
    $_SESSION['error'] = "Could not update profile.";
  }

  header("Location: ../../public/profile.php");
  exit;
?>