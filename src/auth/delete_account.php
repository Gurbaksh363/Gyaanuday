<?php
session_start();
require_once __DIR__ . "/../../config/database.php";

// Check if user is logged in with password provided
if (!isset($_SESSION['user_id']) || !isset($_POST['password']) || empty($_POST['password'])) {
    $_SESSION['error'] = !isset($_SESSION['user_id']) ? 'Login required' : 'Password required';
    header('Location: ../../public/' . (!isset($_SESSION['user_id']) ? 'login.php' : 'profile.php'));
    exit;
}

$user_id = $_SESSION['user_id'];
$password = $_POST['password'];

try {
    // Verify password
    $stmt = $pdo->prepare("SELECT password, profile_photo FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
    
    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['error'] = 'Incorrect password';
        header('Location: ../../public/profile.php');
        exit;
    }
    
    // Begin transaction
    $pdo->beginTransaction();
    
    // Get list of user's projects to delete files
    $stmt = $pdo->prepare("SELECT thumbnail, project_file FROM projects WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $projects = $stmt->fetchAll();
    
    // Clean up related records (comments, likes, bookmarks, projects)
    $tables = ['comments', 'likes', 'bookmarks', 'projects'];
    foreach($tables as $table) {
        $stmt = $pdo->prepare("DELETE FROM $table WHERE user_id = ?");
        $stmt->execute([$user_id]);
    }
    
    // Delete the user account
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    
    // Commit changes
    $pdo->commit();
    
    // Delete files
    foreach ($projects as $project) {
        if (!empty($project['thumbnail'])) {
            @unlink(__DIR__ . "/../../uploads/" . $project['thumbnail']);
        }
        if (!empty($project['project_file'])) {
            @unlink(__DIR__ . "/../../uploads/" . $project['project_file']);
        }
    }
    
    // Delete profile photo
    if (!empty($user['profile_photo'])) {
        @unlink(__DIR__ . "/../../uploads/profile_photos/" . $user['profile_photo']);
    }
    
    // Clear session
    session_destroy();
    session_start();
    $_SESSION['success'] = 'Your account has been deleted';
    header('Location: ../../public/login.php');
    exit;
    
} catch (PDOException $e) {
    // Roll back on error
    if ($pdo->inTransaction()) $pdo->rollBack();
    
    $_SESSION['error'] = 'Error deleting account';
    header('Location: ../../public/profile.php');
    exit;
}
?>
