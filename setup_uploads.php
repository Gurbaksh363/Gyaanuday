<?php
// This script sets up the upload directories with proper permissions

// Define the directories we need
$dirs = [
    __DIR__ . '/uploads',
    __DIR__ . '/uploads/profile_photos',
];

// Function to create directory with proper permissions
function createDir($path) {
    if (!file_exists($path)) {
        if (mkdir($path, 0777, true)) {
            chmod($path, 0777); // Ensure directory is fully writable
            echo "Created directory: $path with full permissions<br>";
        } else {
            echo "Failed to create directory: $path<br>";
            echo "Error: " . error_get_last()['message'] . "<br>";
            return false;
        }
    } else {
        // Directory exists, make sure it's writable
        if (!is_writable($path)) {
            if (chmod($path, 0777)) {
                echo "Updated permissions for existing directory: $path<br>";
            } else {
                echo "Failed to update permissions for: $path<br>";
                return false;
            }
        } else {
            echo "Directory already exists with proper permissions: $path<br>";
        }
    }
    return true;
}

// Create directories
$success = true;
echo "<h1>Setting up upload directories</h1>";

foreach ($dirs as $dir) {
    if (!createDir($dir)) {
        $success = false;
    }
}

if ($success) {
    echo "<p style='color: green;'>All directories created successfully!</p>";
    echo "<p>Please run the following command on your server:</p>";
    echo "<pre>chmod -R 777 " . __DIR__ . "/uploads</pre>";
} else {
    echo "<p style='color: red;'>There were issues creating directories.</p>";
    echo "<p>Please manually create these directories and set permissions:</p>";
    echo "<pre>mkdir -p " . __DIR__ . "/uploads/profile_photos\nchmod -R 777 " . __DIR__ . "/uploads</pre>";
}

// Display server info
echo "<h2>Server Information</h2>";
echo "<p>PHP running as user: " . exec('whoami') . "</p>";
echo "<p>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p>Current directory: " . __DIR__ . "</p>";
?>

<p>
<a href="public/profile.php" style="display: inline-block; padding: 10px 20px; background-color: #A7D820; color: #3a4b0b; text-decoration: none; border-radius: 5px; margin-top: 20px;">Return to Profile</a>
</p>
