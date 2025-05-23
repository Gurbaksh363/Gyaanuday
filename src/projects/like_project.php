<?php
session_start();
require_once __DIR__ . "/../../config/database.php";

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    // Return a specific status for unauthenticated users
    echo json_encode([
        'status' => 'unauthenticated',
        'message' => 'Please sign in to like projects'
    ]);
    exit;
}

$user_id = $_SESSION['user_id'];
$project_id = $_POST['project_id'] ?? null;

if (!$project_id) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Project ID missing'
    ]);
    exit;
}

// Check if user already liked the project
$stmt = $pdo->prepare("SELECT id FROM likes WHERE user_id = ? AND project_id = ?");
$stmt->execute([$user_id, $project_id]);
$liked = $stmt->fetch();

if ($liked) {
    // Unlike (remove like)
    $stmt = $pdo->prepare("DELETE FROM likes WHERE user_id = ? AND project_id = ?");
    $stmt->execute([$user_id, $project_id]);
    
    // Get updated count
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM likes WHERE project_id = ?");
    $stmt->execute([$project_id]);
    $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    echo json_encode([
        'status' => 'unliked', 
        'count' => $count,
        'message' => 'Successfully unliked'
    ]);
} else {
    // Like the project
    $stmt = $pdo->prepare("INSERT INTO likes (user_id, project_id) VALUES (?, ?)");
    $stmt->execute([$user_id, $project_id]);
    
    // Get updated count
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM likes WHERE project_id = ?");
    $stmt->execute([$project_id]);
    $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    
    echo json_encode([
        'status' => 'liked', 
        'count' => $count,
        'message' => 'Successfully liked'
    ]);
}
