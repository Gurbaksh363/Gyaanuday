<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database if not already included
if (!function_exists('getPDO')) {
    require_once __DIR__ . "/../config/database.php";
}

// Get user profile photo
$profile_photo_url = "https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/avatar.png"; // Default
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT profile_photo FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $profile_photo = $stmt->fetchColumn();
    
    if ($profile_photo) {
        $photo_path = __DIR__ . "/../uploads/profile_photos/" . $profile_photo;
        
        if (file_exists($photo_path)) {
            $profile_photo_url = "../uploads/profile_photos/" . $profile_photo;
        }
    }
}

// Determine active page
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Navigation Bar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold mr-1" style="color: #A7D820;"><i class="fas fa-project-diagram"></i></span>
                    <span class="text-[28px] leading-[42px] font-archivo ml-2">Gyaanuday</span>
                </div>
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="index.php" class="px-3 py-2 text-[14px] leading-[22px] text-[#565d6d] nav-item <?= $current_page === 'index.php' ? 'nav-item-active' : '' ?>">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                    <a href="projects.php" class="px-3 py-2 text-[14px] leading-[22px] text-[#565d6d] nav-item <?= $current_page === 'projects.php' ? 'nav-item-active' : '' ?>">
                        <i class="fas fa-folder-open mr-1"></i> Projects
                    </a>
                    <a href="profile.php" class="px-3 py-2 text-[14px] leading-[22px] text-[#565d6d] nav-item <?= $current_page === 'profile.php' ? 'nav-item-active' : '' ?>">
                        <i class="fas fa-user mr-1"></i> Profile
                    </a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button class="rounded-full p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="fas fa-search"></i>
                </button>
                <button class="rounded-full p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="fas fa-bell"></i>
                </button>
                <!-- User Profile Photo -->
                <a href="profile.php">
                    <img src="<?= htmlspecialchars($profile_photo_url) ?>" alt="Avatar" class="w-9 h-9 rounded-full cursor-pointer object-cover border border-gray-200">
                </a>
            </div>
        </div>
    </div>
</nav>
