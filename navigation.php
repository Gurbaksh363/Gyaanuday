<?php
// Determine current page for active tab highlighting
$current_page = basename($_SERVER['PHP_SELF']);

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

// Set photo URL if user is logged in
$photo_url = "./images/default_profile.jpeg";
if ($isLoggedIn && isset($pdo)) {
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT profile_photo FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && !empty($user['profile_photo'])) {
        $photo_path = __DIR__ . "/uploads/profile_photos/" . $user['profile_photo'];
        
        if (file_exists($photo_path)) {
            $photo_url = "./uploads/profile_photos/" . $user['profile_photo'];
        }
    }
}
?>

<!-- Search Overlay -->
<div id="searchOverlay" class="search-overlay">
  <div class="search-container">
    <div class="search-header flex justify-between items-center">
      <h2 class="text-2xl font-bold font-archivo">Search Projects</h2>
      <i id="closeSearch" class="fas fa-times cursor-pointer text-xl p-2 hover:text-gray-600"></i>
    </div>
    <form action="search_results.php" method="GET" class="w-full">
      <div class="flex">
        <input type="text" name="q" placeholder="Search for projects..." class="w-full p-3 border border-[#bdc1ca] rounded-l-lg focus:outline-none focus:border-[#A7D820]">
        <button type="submit" class="bg-[#A7D820] text-white px-5 rounded-r-lg">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <p class="text-sm text-gray-500 text-center mt-2">Press Enter to search or ESC to close</p>
    </form>
  </div>
</div>

<!-- Navigation Bar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center">
        <div class="flex-shrink-0 flex items-center">
          <a href="index.php" class="flex items-center">
            <span class="text-2xl font-bold mr-1" style="color: #A7D820;"><i class="fas fa-project-diagram"></i></span>
            <span class="text-[28px] leading-[42px] font-archivo ml-2">Gyaanuday</span>
          </a>
        </div>
        <div class="ml-10 flex items-baseline space-x-4">
          <!-- Home Tab -->
          <a href="index.php" class="px-3 py-2 text-[14px] leading-[22px] <?php echo ($current_page == 'index.php') ? 'font-semibold nav-item nav-item-active' : 'text-[#565d6d] nav-item'; ?>">
            <i class="fas fa-home mr-1"></i> Home
          </a>
          
          <!-- Explore Tab -->
          <a href="explore_projects.php" class="px-3 py-2 text-[14px] leading-[22px] <?php echo ($current_page == 'explore_projects.php' || $current_page == 'project_details.php') ? 'font-semibold nav-item nav-item-active' : 'text-[#565d6d] nav-item'; ?>">
            <i class="fas fa-search mr-1"></i> Explore
          </a>
          
          <!-- Upload Project Tab (Only visible when logged in) -->
          <?php if ($isLoggedIn): ?>
          <a href="projects.php" class="px-3 py-2 text-[14px] leading-[22px] <?php echo ($current_page == 'projects.php') ? 'font-semibold nav-item nav-item-active' : 'text-[#565d6d] nav-item'; ?>">
            <i class="fas fa-upload mr-1"></i> Upload Project
          </a>
          <?php endif; ?>
          
          <!-- About Us Tab -->
          <a href="about.php" class="px-3 py-2 text-[14px] leading-[22px] <?php echo ($current_page == 'about.php') ? 'font-semibold nav-item nav-item-active' : 'text-[#565d6d] nav-item'; ?>">
            <i class="fas fa-info-circle mr-1"></i> About
          </a>
          
          <?php if ($isLoggedIn): ?>
          <!-- Profile Tab - Only show when logged in -->
          <a href="profile.php" class="px-3 py-2 text-[14px] leading-[22px] <?php echo ($current_page == 'profile.php') ? 'font-semibold nav-item nav-item-active' : 'text-[#565d6d] nav-item'; ?>">
            <i class="fas fa-user mr-1"></i> Profile
          </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="flex items-center space-x-4">
        <button id="searchButton" class="rounded-full p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
          <i class="fas fa-search"></i>
        </button>

        <?php if ($isLoggedIn): ?>
          <!-- If logged in, show profile photo with dropdown -->
          <div class="relative" id="profileDropdown">
            <div class="cursor-pointer flex items-center">
              <img src="<?= htmlspecialchars($photo_url) ?>" alt="Avatar" class="w-9 h-9 rounded-full object-cover border border-gray-200">
              <i class="fas fa-chevron-down text-xs ml-1 text-gray-500"></i>
            </div>
            <!-- Dropdown Menu -->
            <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-10">
              <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                <i class="fas fa-user-circle mr-2"></i> My Profile
              </a>
              <a href="src/auth/logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </a>
            </div>
          </div>
        <?php else: ?>
          <!-- If not logged in, show login/signup buttons -->
          <div class="flex space-x-3">
            <a href="register.php" class="border border-gray-300 px-4 py-2 rounded text-[#565d6d] button-hover inline-block">Sign Up</a>
            <a href="login.php" class="px-4 py-2 rounded text-white button-hover shadow-md inline-block" style="background-color: #A7D820;">Log In</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Add this script for profile dropdown functionality -->
  <?php if ($isLoggedIn): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const profileDropdown = document.getElementById('profileDropdown');
      const dropdownMenu = document.getElementById('profileDropdownMenu');
      
      // Toggle dropdown on click
      profileDropdown.addEventListener('click', function(e) {
        dropdownMenu.classList.toggle('hidden');
        e.stopPropagation();
      });
      
      // Close dropdown when clicking elsewhere
      window.addEventListener('click', function(e) {
        if (!profileDropdown.contains(e.target)) {
          dropdownMenu.classList.add('hidden');
        }
      });
    });
  </script>
  <?php endif; ?>

  <!-- Add this script for search overlay functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchButton = document.getElementById('searchButton');
      const searchOverlay = document.getElementById('searchOverlay');
      const closeSearch = document.getElementById('closeSearch');
      
      // Open search overlay
      if (searchButton) {
        searchButton.addEventListener('click', function() {
          searchOverlay.classList.add('active');
          setTimeout(() => {
            document.querySelector('.search-container input').focus();
          }, 400);
        });
      }
      
      // Close search overlay
      if (closeSearch) {
        closeSearch.addEventListener('click', function() {
          searchOverlay.classList.remove('active');
        });
      }
      
      // Close search with ESC key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
          searchOverlay.classList.remove('active');
        }
      });
    });
  </script>
</nav>
