<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore Projects - Gyaanuday</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Archivo&display=swap');
    body {
      font-family: 'Inter', sans-serif;
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
    .card-hover {
      transition: all 0.3s ease;
    }
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    .button-hover {
      transition: all 0.3s ease;
    }
    .button-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
    .tag-pill {
      display: inline-block;
      background-color: #f3f4f6;
      color: #4b5563;
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      margin: 0.25rem;
      transition: all 0.3s ease;
    }
    .tag-pill:hover {
      background-color: #A7D820;
      color: white;
    }
  </style>
</head>

<body class="bg-gray-50">
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

  <!-- Fixed Navigation Bar with notification icon removed -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0 flex items-center">
            <span class="text-2xl font-bold mr-1" style="color: #A7D820;"><i class="fas fa-project-diagram"></i></span>
            <span class="text-[28px] leading-[42px] font-archivo ml-2">Gyaanuday</span>
          </div>
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="index.php" class="px-3 py-2 text-[14px] leading-[22px] font-semibold text-[#565d6d] nav-item">
              <i class="fas fa-home mr-1"></i> Home
            </a>
            <a href="projects.php" class="px-3 py-2 text-[14px] leading-[22px] text-[#565d6d] nav-item">
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
          <div class="flex space-x-3">
            <a href="register.php" class="border border-gray-300 px-4 py-2 rounded text-[#565d6d] button-hover inline-block">Sign Up</a>
            <a href="login.php" class="px-4 py-2 rounded text-white button-hover shadow-md inline-block" style="background-color: #A7D820;">Log In</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <div class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900 font-archivo">Explore All Projects</h1>
      <p class="mt-2 text-gray-600">Discover a world of creativity and innovation</p>
    </div>
  </div>

  <!-- Filter Section -->
  <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
      <form class="flex flex-wrap items-center gap-4">
        <div class="flex-grow min-w-[200px]">
          <select name="category" class="w-full p-2 border border-gray-300 rounded-md">
            <option value="">All Categories</option>
            <option value="Web Development">Web Development</option>
            <option value="Mobile Apps">Mobile Apps</option>
            <option value="Data Analysis">Data Analysis</option>
            <option value="UI/UX Design">UI/UX Design</option>
            <option value="AI & ML">AI & ML</option>
            <option value="Blockchain">Blockchain</option>
            <option value="Game Development">Game Development</option>
            <option value="Cybersecurity">Cybersecurity</option>
          </select>
        </div>
        <div class="flex-grow min-w-[200px]">
          <select name="sort" class="w-full p-2 border border-gray-300 rounded-md">
            <option value="newest">Newest First</option>
            <option value="oldest">Oldest First</option>
            <option value="popularity">Most Popular</option>
          </select>
        </div>
        <button type="submit" class="px-4 py-2 bg-[#A7D820] text-white rounded-md hover:bg-opacity-90">
          Apply Filters
        </button>
      </form>
    </div>
  </div>

  <!-- Projects Grid -->
  <div class="max-w-7xl mx-auto px-4 pb-12 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      require_once __DIR__ . "/../config/database.php";
      
      // Determine sorting and filtering
      $category = isset($_GET['category']) ? $_GET['category'] : '';
      $sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
      
      // Build the query
      $query = "SELECT p.id, p.title, p.description, p.tags, u.username, p.thumbnail, p.created_at 
                FROM projects p 
                JOIN users u ON p.user_id = u.id";
      
      // Add category filter if selected
      if (!empty($category)) {
          $query .= " WHERE p.tags LIKE :category";
      }
      
      // Add sorting
      switch ($sort) {
          case 'oldest':
              $query .= " ORDER BY p.created_at ASC";
              break;
          case 'popularity':
              $query .= " ORDER BY p.views DESC";
              break;
          default: // newest
              $query .= " ORDER BY p.created_at DESC";
      }
      
      $stmt = $pdo->prepare($query);
      
      // Bind parameters if needed
      if (!empty($category)) {
          $stmt->bindValue(':category', '%' . $category . '%');
      }
      
      $stmt->execute();
      $projects = $stmt->fetchAll();
      
      if (count($projects) > 0) {
          foreach ($projects as $project) {
              $projectId = htmlspecialchars($project['id']);
              $fileName = htmlspecialchars($project['thumbnail']);
              $filePath = "/gyaanuday/uploads/" . $fileName;
              $title = htmlspecialchars($project['title']);
              $description = htmlspecialchars($project['description']);
              $username = htmlspecialchars($project['username']);
              $tags = explode(',', $project['tags']);
              
              $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
              
              // Determine thumbnail
              if (in_array($ext, ['jpg', 'jpeg', 'png']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $filePath)) {
                  $thumb = $filePath;
              } else {
                  $thumb = "/gyaanuday/assets/default_icon.png";
              }
              
              echo "
              <a href='project_details.php?id=$projectId' class='bg-white shadow-sm rounded-lg overflow-hidden border border-gray-200 card-hover'>
                  <img src='$thumb' class='w-full h-48 object-cover object-center' alt='$title'>
                  <div class='p-4'>
                      <h3 class='text-xl font-semibold mb-2 text-[#171a1f]'>$title</h3>
                      <p class='text-sm text-gray-700 mb-3 line-clamp-2'>" . substr($description, 0, 100) . (strlen($description) > 100 ? '...' : '') . "</p>
                      <div class='flex flex-wrap mb-3'>";
                      
              // Display tags as pills
              foreach ($tags as $tag) {
                  $tag = trim($tag);
                  if (!empty($tag)) {
                      echo "<span class='tag-pill'>$tag</span>";
                  }
              }
              
              echo "</div>
                      <div class='flex items-center justify-between pt-2 border-t border-gray-100'>
                          <span class='text-xs text-gray-500'>By: $username</span>
                      </div>
                  </div>
              </a>";
          }
      } else {
          echo "<div class='col-span-full text-center py-12'>
                  <i class='fas fa-search text-4xl text-gray-300 mb-3'></i>
                  <h3 class='text-xl font-semibold text-gray-700'>No projects found</h3>
                  <p class='text-gray-500 mt-1'>Try adjusting your filters or search criteria</p>
              </div>";
      }
      ?>
    </div>
    
    <!-- Pagination -->
    <div class="flex justify-center mt-12">
      <nav class="inline-flex rounded-md shadow-sm -space-x-px">
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Previous</span>
          <i class="fas fa-chevron-left"></i>
        </a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-[#A7D820] text-sm font-medium text-white">3</a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">4</a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">5</a>
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Next</span>
          <i class="fas fa-chevron-right"></i>
        </a>
      </nav>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row justify-between">
        <div class="mb-6 md:mb-0">
          <h2 class="text-2xl font-bold font-archivo">Gyaanuday</h2>
          <p class="text-gray-300 mt-2">Unleash creativity through hands-on learning</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
          <div>
            <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
            <ul class="space-y-2">
              <li><a href="index.php" class="text-gray-300 hover:text-white">Home</a></li>
              <li><a href="projects.php" class="text-gray-300 hover:text-white">Projects</a></li>
              <li><a href="#" class="text-gray-300 hover:text-white">About Us</a></li>
            </ul>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-3">Connect</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-300 hover:text-white">Contact Us</a></li>
              <li><a href="#" class="text-gray-300 hover:text-white">FAQ</a></li>
              <li><a href="#" class="text-gray-300 hover:text-white">Support</a></li>
            </ul>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-3">Follow Us</h3>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
              <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-6 text-sm text-gray-400 text-center">
        <p>&copy; 2023 Gyaanuday. All rights reserved.</p>
      </div>
    </div>
  </footer>

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
  </script>
</body>

</html>
