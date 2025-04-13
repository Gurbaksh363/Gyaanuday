<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Details | Gyaanuday</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Archivo&display=swap');
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
    }
    h1, h2, h3 {
      font-family: 'Archivo', sans-serif;
    }
    .nav-item {
      transition: all 0.3s ease;
    }
    .nav-item:hover {
      color: #A7D820;
    }
    .nav-item-active {
      color: #A7D820;
      position: relative;
    }
    .nav-item-active::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 100%;
      height: 3px;
      background-color: #A7D820;
      border-radius: 2px;
    }
    .button-hover {
      transition: all 0.3s ease;
    }
    .button-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .tag {
      background-color: #f3f4f6;
      padding: 8px 16px;
      border-radius: 30px;
      font-size: 0.875rem;
      color: #565d6d;
      margin-right: 8px;
      display: inline-block;
      margin-bottom: 10px;
      transition: all 0.2s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      border: 1px solid #e5e7eb;
    }
    .tag:hover {
      background-color: #A7D820;
      color: white;
      border-color: #A7D820;
    }
    /* Like button styles - Updated for better visibility */
    .like-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 8px 16px;
      background-color: white;
      border: 2px solid #e5e7eb;
      border-radius: 50px;
      font-size: 1.1rem;
      color: #565d6d;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      position: relative;
      top: auto;
      right: auto;
      width: auto;
      height: auto;
    }
    .like-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }
    .like-btn.liked {
      color: white;
      background-color: #ef4444;
      border-color: #ef4444;
    }
    .like-count {
      position: relative;
      top: auto;
      right: auto;
      background: none;
      color: inherit;
      border-radius: 0;
      min-width: auto;
      height: auto;
      font-size: 1rem;
      font-weight: bold;
      padding: 0;
    }
    .like-btn.liked .like-count {
      color: white;
    }
    .card {
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    .card:hover {
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      transform: translateY(-3px);
    }
    .project-header {
      position: relative;
    }
    .project-header::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100px;
      height: 5px;
      background-color: #A7D820;
      border-radius: 3px;
    }
    .project-meta-item {
      display: flex;
      align-items: center;
      margin-right: 20px;
      color: #6b7280;
    }
    .project-meta-item i {
      margin-right: 6px;
      color: #A7D820;
    }
    /* Search overlay styles */
    .search-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 0;
      background-color: rgba(255, 255, 255, 0.95);
      z-index: 100;
      overflow: hidden;
      transition: height 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .search-overlay.active {
      height: 100%;
    }
    .search-container {
      width: 80%;
      max-width: 600px;
      transform: translateY(-50px);
      opacity: 0;
      transition: all 0.4s ease;
    }
    .search-overlay.active .search-container {
      transform: translateY(0);
      opacity: 1;
    }
  </style>
</head>

<body>
  <!-- Search Overlay -->
  <div class="search-overlay" id="searchOverlay">
    <div class="search-container">
      <button class="absolute top-8 right-8 text-2xl text-gray-600 hover:text-gray-900" id="closeSearch">
        <i class="fas fa-times"></i>
      </button>
      <h2 class="text-2xl font-archivo font-bold text-center mb-6">Search Projects</h2>
      <form action="search_results.php" method="GET" class="flex flex-col gap-4">
        <div class="relative">
          <input 
            type="text" 
            name="q" 
            placeholder="Search by title, tags..." 
            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#A7D820] focus:border-transparent outline-none text-lg"
            autocomplete="off"
            required
          >
          <button type="submit" class="absolute right-3 top-3 text-gray-400 hover:text-[#A7D820]">
            <i class="fas fa-search fa-lg"></i>
          </button>
        </div>
        <p class="text-sm text-gray-500 text-center">Press Enter to search or ESC to close</p>
      </form>
    </div>
  </div>

  <!-- Fixed Navigation Bar -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0 flex items-center">
            <span class="text-2xl font-bold mr-1" style="color: #A7D820;"><i class="fas fa-project-diagram"></i></span>
            <span class="text-[28px] leading-[42px] font-archivo ml-2">Gyaanuday</span>
          </div>
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="index.php" class="px-3 py-2 text-[14px] leading-[22px] text-[#565d6d] nav-item">
              <i class="fas fa-home mr-1"></i> Home
            </a>
            <a href="projects.php" class="px-3 py-2 text-[14px] leading-[22px] font-semibold nav-item nav-item-active">
              <i class="fas fa-folder-open mr-1"></i> Projects
            </a>
            <a href="profile.php" class="px-3 py-2 text-[14px] leading-[22px] text-[#565d6d] nav-item">
              <i class="fas fa-user mr-1"></i> Profile
            </a>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <button id="searchButton" class="rounded-full p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
            <i class="fas fa-search"></i>
          </button>
          <button class="rounded-full p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
            <i class="fas fa-bell"></i>
          </button>
          <div class="flex space-x-3">
            <a href="register.php" class="border border-gray-300 px-4 py-2 rounded text-[#565d6d] button-hover inline-block">Sign Up</a>
            <a href="login.php" class="px-4 py-2 rounded text-white button-hover shadow-md inline-block" style="background-color: #A7D820;">Sign In</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <?php
  // Get project ID from URL parameter
  if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: projects.php");
    exit;
  }

  $projectId = intval($_GET['id']);
  
  // Connect to database and fetch project details
  require_once __DIR__ . "/../config/database.php";
  
  $stmt = $pdo->prepare("SELECT p.*, u.username FROM projects p JOIN users u ON p.user_id = u.id WHERE p.id = ?");
  $stmt->execute([$projectId]);
  $project = $stmt->fetch();
  
  if (!$project) {
    echo '<div class="max-w-6xl mx-auto my-12 px-4">
            <div class="bg-red-100 p-6 rounded-lg">
              <h1 class="text-2xl font-bold text-red-700">Project not found</h1>
              <p class="mt-2">The project you are looking for does not exist.</p>
              <a href="projects.php" class="mt-4 inline-block px-6 py-2 text-white rounded" style="background-color: #A7D820;">
                Browse Projects
              </a>
            </div>
          </div>';
    exit;
  }

  // Prepare data for display
  $title = htmlspecialchars($project['title']);
  $description = htmlspecialchars($project['description']);
  $username = htmlspecialchars($project['username']);
  $created = date('F j, Y', strtotime($project['created_at']));
  $tags = explode(',', $project['tags']);

  // Get file path
  $fileName = htmlspecialchars($project['thumbnail']);
  $filePath = "/gyaanuday/uploads/" . $fileName;
  $projectFile = "/gyaanuday/uploads/" . htmlspecialchars($project['project_file']);
  
  $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $projectExt = strtolower(pathinfo($project['project_file'], PATHINFO_EXTENSION));

  if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
    $thumb = $filePath;
  } else {
    $thumb = "/gyaanuday/assets/default_icon.png";
  }

  // Get like count and check if user has liked this project
  $likeCount = 0;
  $hasLiked = false;

  $stmt = $pdo->prepare("SELECT COUNT(*) FROM likes WHERE project_id = ?");
  $stmt->execute([$projectId]);
  $likeCount = $stmt->fetchColumn();

  if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT id FROM likes WHERE user_id = ? AND project_id = ?");
    $stmt->execute([$_SESSION['user_id'], $projectId]);
    $hasLiked = $stmt->fetch() ? true : false;
  }
  ?>

  <div class="max-w-6xl mx-auto my-12 px-4">
    <!-- Project Header -->
    <div class="flex flex-wrap justify-between items-start mb-12 project-header pb-5">
      <div class="w-full md:w-3/4 mb-4 md:mb-0">
        <div class="flex items-center flex-wrap">
          <h1 class="text-[36px] leading-[48px] font-archivo font-bold text-[#171a1f] mb-3 mr-4"><?php echo $title; ?></h1>
          <!-- Like Button moved beside title -->
          <button id="likeButton" class="like-btn my-3 <?php echo $hasLiked ? 'liked' : ''; ?>" data-project-id="<?php echo $projectId; ?>">
            <i class="<?php echo $hasLiked ? 'fas' : 'far'; ?> fa-heart"></i>
            <span class="like-count ml-1"><?php echo $likeCount; ?> <?php echo $likeCount == 1 ? 'like' : 'likes'; ?></span>
          </button>
        </div>
        <div class="flex flex-wrap items-center text-[#565d6d] mb-4">
          <div class="project-meta-item">
            <i class="fas fa-user"></i>
            <span><?php echo $username; ?></span>
          </div>
          <div class="project-meta-item">
            <i class="fas fa-calendar"></i>
            <span><?php echo $created; ?></span>
          </div>
          <div class="project-meta-item">
            <i class="fas fa-file"></i>
            <span class="uppercase"><?php echo $projectExt; ?></span>
          </div>
        </div>
      </div>
      <div class="w-full md:w-1/4 flex justify-center md:justify-end">
        <a href="<?php echo $projectFile; ?>" download class="px-6 py-3 rounded-full text-white button-hover shadow-md inline-block bg-[#A7D820]">
          <i class="fas fa-download mr-2"></i> Download
        </a>
      </div>
    </div>

    <!-- Project Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Left Column - Thumbnail and Details -->
      <div class="lg:col-span-2">
        <div class="rounded-lg overflow-hidden shadow-md mb-6 card">
          <img src="<?php echo $thumb; ?>" alt="<?php echo $title; ?>" class="w-full h-auto max-h-96 object-cover">
        </div>
        
        <div class="bg-white rounded-lg p-6 border border-[#e5e7eb] card relative">
          <!-- Remove the like button from here -->
          
          <h2 class="text-2xl font-bold mb-4 text-[#171a1f] font-archivo">Description</h2>
          <p class="text-[#565d6d] text-[16px] leading-[26px] mb-6"><?php echo nl2br($description); ?></p>
          
          <!-- Project Content Preview Based on File Type -->
          <?php if (in_array($projectExt, ['jpg', 'jpeg', 'png', 'gif'])): ?>
            <h2 class="text-xl font-semibold mt-8 mb-4 text-[#171a1f] font-archivo">Project Preview</h2>
            <img src="<?php echo $projectFile; ?>" alt="Project Preview" class="w-full h-auto rounded-lg">
          <?php elseif ($projectExt === 'pdf'): ?>
            <h2 class="text-xl font-semibold mt-8 mb-4 text-[#171a1f] font-archivo">PDF Preview</h2>
            <div class="rounded-lg overflow-hidden border border-gray-300">
              <object data="<?php echo $projectFile; ?>" type="application/pdf" width="100%" height="500px">
                <p>Unable to display PDF. <a href="<?php echo $projectFile; ?>" download>Download</a> instead.</p>
              </object>
            </div>
          <?php elseif (in_array($projectExt, ['mp4', 'webm', 'ogg'])): ?>
            <h2 class="text-xl font-semibold mt-8 mb-4 text-[#171a1f] font-archivo">Video Preview</h2>
            <video controls class="w-full rounded-lg">
              <source src="<?php echo $projectFile; ?>" type="video/<?php echo $projectExt; ?>">
              Your browser does not support the video tag.
            </video>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Right Column - Additional Info -->
      <div>
        <!-- Project Info Card -->
        <div class="bg-white rounded-lg p-6 border border-[#e5e7eb] mb-6 card">
          <h2 class="text-xl font-semibold mb-4 text-[#171a1f] font-archivo border-b pb-3">Project Details</h2>
          <div class="space-y-5 mt-4">
            <div class="flex items-center">
              <div class="bg-gray-100 rounded-full p-3 mr-3">
                <i class="fas fa-user text-[#A7D820]"></i>
              </div>
              <div>
                <h3 class="text-sm font-medium text-[#9095a1]">CREATED BY</h3>
                <p class="text-[#171a1f] font-medium"><?php echo $username; ?></p>
              </div>
            </div>
            <div class="flex items-center">
              <div class="bg-gray-100 rounded-full p-3 mr-3">
                <i class="fas fa-calendar text-[#A7D820]"></i>
              </div>
              <div>
                <h3 class="text-sm font-medium text-[#9095a1]">DATE UPLOADED</h3>
                <p class="text-[#171a1f] font-medium"><?php echo $created; ?></p>
              </div>
            </div>
            <div class="flex items-center">
              <div class="bg-gray-100 rounded-full p-3 mr-3">
                <i class="fas fa-file text-[#A7D820]"></i>
              </div>
              <div>
                <h3 class="text-sm font-medium text-[#9095a1]">FILE TYPE</h3>
                <p class="text-[#171a1f] font-medium uppercase"><?php echo $projectExt; ?></p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Tags Card -->
        <div class="bg-white rounded-lg p-6 border border-[#e5e7eb] card">
          <h2 class="text-xl font-semibold mb-4 text-[#171a1f] font-archivo border-b pb-3">Tags</h2>
          <div class="mt-4">
            <?php foreach ($tags as $tag): ?>
              <?php if(trim($tag) !== ''): ?>
                <span class="tag"><?php echo htmlspecialchars(trim($tag)); ?></span>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Related Projects - Could be implemented in the future -->
      </div>
    </div>

    <!-- Comment Section - Could be implemented in the future -->
  </div>

  <!-- Add this script before closing body tag -->
  <script>
    // Search functionality
    const searchButton = document.getElementById('searchButton');
    const searchOverlay = document.getElementById('searchOverlay');
    const closeSearch = document.getElementById('closeSearch');
    
    // Open search overlay
    searchButton.addEventListener('click', () => {
      searchOverlay.classList.add('active');
      setTimeout(() => {
        document.querySelector('.search-container input').focus();
      }, 400);
    });
    
    // Close search overlay
    closeSearch.addEventListener('click', () => {
      searchOverlay.classList.remove('active');
    });
    
    // Close search with ESC key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
        searchOverlay.classList.remove('active');
      }
    });

    // Like functionality
    document.addEventListener('DOMContentLoaded', function() {
      const likeButton = document.getElementById('likeButton');
      
      if (likeButton) {
        likeButton.addEventListener('click', function() {
          const projectId = this.getAttribute('data-project-id');
          
          // Check if user is logged in
          <?php if (!isset($_SESSION['user_id'])): ?>
            alert('Please login to like this project');
            return;
          <?php endif; ?>
          
          // Send AJAX request to like/unlike
          const formData = new FormData();
          formData.append('project_id', projectId);
          
          fetch('/gyaanuday/src/projects/like_project.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            // Update like button appearance and count
            const likeButton = document.getElementById('likeButton');
            const likeCount = document.querySelector('.like-count');
            
            if (data.status === 'liked') {
              likeButton.classList.add('liked');
              likeButton.querySelector('i').classList.replace('far', 'fas');
            } else {
              likeButton.classList.remove('liked');
              likeButton.querySelector('i').classList.replace('fas', 'far');
            }
            
            // Update count with proper singular/plural form
            const count = data.count;
            likeCount.textContent = `${count} ${count == 1 ? 'like' : 'likes'}`;
          })
          .catch(error => {
            console.error('Error:', error);
          });
        });
      }
    });
  </script>
</body>
</html>
