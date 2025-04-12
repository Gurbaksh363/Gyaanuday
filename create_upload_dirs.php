<?php
// Script to create upload directories with proper permissions

// Define the base directories
$base_dir = __DIR__;
$upload_dirs = [
    $base_dir . '/uploads/',
    $base_dir . '/uploads/profile_photos/',
    $base_dir . '/uploads/projects/'
];

echo "<h1>Creating Upload Directories</h1>";

foreach ($upload_dirs as $dir) {
    if (!file_exists($dir)) {
        if (mkdir($dir, 0755, true)) {
            echo "<p>Created directory: " . htmlspecialchars($dir) . " ✅</p>";
        } else {
            echo "<p>Failed to create directory: " . htmlspecialchars($dir) . " ❌</p>";
            echo "<p>Error: " . htmlspecialchars(error_get_last()['message']) . "</p>";
        }
    } else {
        echo "<p>Directory already exists: " . htmlspecialchars($dir) . " ✓</p>";
    }
}

// Try to set permissions
echo "<h2>Setting Permissions</h2>";

foreach ($upload_dirs as $dir) {
    if (file_exists($dir)) {
        if (chmod($dir, 0755)) {
            echo "<p>Set permissions for: " . htmlspecialchars($dir) . " ✅</p>";
        } else {
            echo "<p>Failed to set permissions for: " . htmlspecialchars($dir) . " ❌</p>";
        }
    }
}

echo "<h2>Server Information</h2>";
echo "<p>Server PHP user: " . htmlspecialchars(get_current_user()) . "</p>";
echo "<p>Document root: " . htmlspecialchars($_SERVER['DOCUMENT_ROOT']) . "</p>";

echo "<h2>Manual Commands</h2>";
echo "<p>If you're still having permission issues, try running these commands on your server:</p>";
echo "<pre>";
echo "sudo mkdir -p " . $base_dir . "/uploads/profile_photos\n";
echo "sudo chmod -R 777 " . $base_dir . "/uploads\n";
echo "</pre>";

echo "<p><a href='public/profile.php' style='display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #A7D820; color: #3a4b0b; text-decoration: none; border-radius: 4px;'>Return to Profile</a></p>";
?>
