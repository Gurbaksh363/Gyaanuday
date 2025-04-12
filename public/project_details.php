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
      padding: 4px 10px;
      border-radius: 16px;
      font-size: 0.875rem;
      color: #565d6d;
      margin-right: 8px;
      display: inline-block;
      margin-bottom: 8px;
    }
  </style>
</head>

<body class="bg-white">
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
          <button class="rounded-full p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
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
  ?>

  <div class="max-w-6xl mx-auto my-12 px-4">
    <!-- Project Header -->
    <div class="flex justify-between items-start mb-8">
      <div>
        <h1 class="text-[32px] leading-[48px] font-archivo font-bold text-[#171a1f]"><?php echo $title; ?></h1>
        <p class="text-[#565d6d]">Uploaded by <span class="font-semibold"><?php echo $username; ?></span> on <?php echo $created; ?></p>
      </div>
      <div>
        <a href="<?php echo $projectFile; ?>" download class="px-6 py-3 rounded text-white button-hover shadow-md inline-block" style="background-color: #A7D820;">
          <i class="fas fa-download mr-2"></i> Download Project
        </a>
      </div>
    </div>

    <!-- Project Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Left Column - Thumbnail and Details -->
      <div class="lg:col-span-2">
        <div class="rounded-lg overflow-hidden shadow-md mb-6">
          <img src="<?php echo $thumb; ?>" alt="<?php echo $title; ?>" class="w-full h-auto max-h-96 object-cover">
        </div>
        
        <div class="bg-white shadow-md rounded-lg p-6 border border-[#bdc1ca]">
          <h2 class="text-xl font-semibold mb-4 text-[#171a1f] font-archivo">Description</h2>
          <p class="text-[#565d6d] text-[16px] leading-[26px]"><?php echo $description; ?></p>
          
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
        <div class="bg-white shadow-md rounded-lg p-6 border border-[#bdc1ca] mb-6">
          <h2 class="text-xl font-semibold mb-4 text-[#171a1f] font-archivo">Project Info</h2>
          <div class="space-y-4">
            <div>
              <h3 class="text-sm font-medium text-[#9095a1]">CREATED BY</h3>
              <p class="text-[#171a1f]"><?php echo $username; ?></p>
            </div>
            <div>
              <h3 class="text-sm font-medium text-[#9095a1]">DATE UPLOADED</h3>
              <p class="text-[#171a1f]"><?php echo $created; ?></p>
            </div>
            <div>
              <h3 class="text-sm font-medium text-[#9095a1]">FILE TYPE</h3>
              <p class="text-[#171a1f] uppercase"><?php echo $projectExt; ?></p>
            </div>
          </div>
        </div>
        
        <!-- Tags Card -->
        <div class="bg-white shadow-md rounded-lg p-6 border border-[#bdc1ca]">
          <h2 class="text-xl font-semibold mb-4 text-[#171a1f] font-archivo">Tags</h2>
          <div>
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

  <!-- Footer - Could be added for consistency -->
</body>
</html>
