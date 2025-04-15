<?php
require_once __DIR__ . "/../../config/database.php";
session_start();

// Default to returning all projects
$query = "SELECT p.id, p.title, p.description, p.tags, p.thumbnail, p.created_at, 
          u.username, u.profile_photo, 
          (SELECT COUNT(*) FROM likes WHERE project_id = p.id) AS likes_count
          FROM projects p 
          JOIN users u ON p.user_id = u.id";

$params = [];
$searchTerm = '';

// Get search term if provided
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $searchTerm = $_GET['q'];
    $query .= " WHERE p.title LIKE ? OR p.description LIKE ? OR p.tags LIKE ?";
    $searchParam = "%$searchTerm%";
    $params = [$searchParam, $searchParam, $searchParam];
}

// Add order by
$query .= " ORDER BY p.created_at DESC";

// Add limit and offset for pagination
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$query .= " LIMIT $limit OFFSET $offset";

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Count total projects for pagination
    $countQuery = "SELECT COUNT(*) as total FROM projects p JOIN users u ON p.user_id = u.id";
    if (!empty($searchTerm)) {
        $countQuery .= " WHERE p.title LIKE ? OR p.description LIKE ? OR p.tags LIKE ?";
    }
    
    $countStmt = $pdo->prepare($countQuery);
    $countStmt->execute($params);
    $totalProjects = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    $totalPages = ceil($totalProjects / $limit);
    
    // Check if user is logged in to determine bookmarked status
    $user_id = $_SESSION['user_id'] ?? null;
    if ($user_id && count($projects) > 0) {
        $projectIds = array_column($projects, 'id');
        $placeholders = implode(',', array_fill(0, count($projectIds), '?'));
        
        $bookmarkQuery = "SELECT project_id FROM bookmarks WHERE user_id = ? AND project_id IN ($placeholders)";
        $bookmarkParams = array_merge([$user_id], $projectIds);
        
        $bookmarkStmt = $pdo->prepare($bookmarkQuery);
        $bookmarkStmt->execute($bookmarkParams);
        $bookmarkedProjects = $bookmarkStmt->fetchAll(PDO::FETCH_COLUMN);
        
        $likeQuery = "SELECT project_id FROM likes WHERE user_id = ? AND project_id IN ($placeholders)";
        $likeStmt = $pdo->prepare($likeQuery);
        $likeStmt->execute($bookmarkParams); // Same params as bookmarks
        $likedProjects = $likeStmt->fetchAll(PDO::FETCH_COLUMN);
        
        // Add bookmarked and liked flags to each project
        foreach ($projects as &$project) {
            $project['is_bookmarked'] = in_array($project['id'], $bookmarkedProjects);
            $project['is_liked'] = in_array($project['id'], $likedProjects);
        }
    }
    
    echo json_encode([
        'success' => true,
        'projects' => $projects,
        'pagination' => [
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalProjects' => $totalProjects
        ]
    ]);
    
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>