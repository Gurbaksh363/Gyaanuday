<?php
require_once __DIR__ . "/../../config/database.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        die("You need to log in first.");
    }

    $userId = $_SESSION['user_id'];
    $title = trim($_POST['title']); // Get the title
    $description = trim($_POST['description']);
    $tags = trim($_POST['tags']);

    if (empty($title) || empty($description) || empty($tags) || empty($_FILES['project_file']['name'])) {
        die("All fields are required.");
    }

    // Handle file upload
    $targetDir = __DIR__ . "/../../uploads/";
    $fileName = basename($_FILES['project_file']['name']);
    $targetFile = $targetDir . $fileName;

    // Validate file type (allow images, pdfs, etc.)
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'png', 'jpeg', 'pdf', 'mp4', 'mp3'];
    if (!in_array($fileType, $allowedTypes)) {
        die("Only JPG, PNG, JPEG, PDF, MP4, MP3 files are allowed.");
    }
//     if (!is_uploaded_file($_FILES['project_file']['tmp_name'])) {
//       die("File is not uploaded.");
//   }
//   if (!file_exists($targetDir)) {
//     die("Upload directory does not exist.");
// }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($_FILES['project_file']['tmp_name'], $targetFile)) {
        die("Sorry, there was an error uploading your file.");
    }

    // Insert project into the database
    $stmt = $pdo->prepare("INSERT INTO projects (user_id, title, project_file, description, tags) VALUES (?, ?, ?, ?, ?)");
    try {
        $stmt->execute([$userId, $title, $fileName, $description, $tags]);
        header("Location: /gyaanuday/public/index.php");
        exit;
    } catch (\PDOException $e) {
        die("Project upload failed: " . $e->getMessage());
    }
} else {
    die("Invalid request");
}
?>
