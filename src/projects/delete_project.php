<?php
session_start();
require_once __DIR__ . "/../../config/database.php";

// Check if user is logged in
if (!isset($_SESSION['user_id']) || !isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error'] = !isset($_SESSION['user_id']) ? "Login required" : "Invalid project ID";
    header("Location: /gyaanuday/public/" . (!isset($_SESSION['user_id']) ? "login.php" : "profile.php"));
    exit;
}

$project_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Verify project ownership
$stmt = $pdo->prepare("SELECT id, thumbnail, project_file FROM projects WHERE id = ? AND user_id = ?");
$stmt->execute([$project_id, $user_id]);
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    $_SESSION['error'] = "Permission denied or project not found";
    header("Location: /gyaanuday/public/profile.php");
    exit;
}

try {
    $pdo->beginTransaction();
    
    // Delete project files if they exist
    if (!empty($project['thumbnail'])) {
        $thumbnail_path = __DIR__ . "/../../uploads/" . $project['thumbnail'];
        if (file_exists($thumbnail_path)) unlink($thumbnail_path);
    }
    
    if (!empty($project['project_file'])) {
        $file_path = __DIR__ . "/../../uploads/" . $project['project_file'];
        if (file_exists($file_path)) unlink($file_path);
    }
    
    // Delete related records and then the project
    $stmt = $pdo->prepare("DELETE FROM comments WHERE project_id = ?");
    $stmt->execute([$project_id]);
    
    $stmt = $pdo->prepare("DELETE FROM likes WHERE project_id = ?");
    $stmt->execute([$project_id]);
    
    $stmt = $pdo->prepare("DELETE FROM bookmarks WHERE project_id = ?");
    $stmt->execute([$project_id]);
    
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->execute([$project_id]);
    
    $pdo->commit();
    $_SESSION['success'] = "Project deleted successfully";
} catch (PDOException $e) {
    $pdo->rollBack();
    $_SESSION['error'] = "Error occurred"; // Simplified error message
}

header("Location: /gyaanuday/public/profile.php");
exit;
?>
