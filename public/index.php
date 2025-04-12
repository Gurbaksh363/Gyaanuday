<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gyaanuday</title>
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
            <a href="index.php" class="px-3 py-2 text-[14px] leading-[22px] font-semibold nav-item nav-item-active">
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

  <header class="relative w-full h-[60vh] bg-cover bg-center" style="background-image: url('discover_project.jpg');">
    <div
      class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-start justify-center text-left text-white pl-16">
      <h1 class="text-[32px] leading-[48px] font-archivo font-bold">Discover Projects</h1>
      <p class="mt-2 text-[16px] leading-[26px]">Unleash creativity through hands-on learning</p>
      <button class="mt-4 px-6 py-2 rounded text-white shadow-md button-hover" style="background-color: #A7D820;">Explore Projects</button>
    </div>
  </header>

  <section class="max-w-6xl mx-auto my-12">
    <h2 class="text-[32px] leading-[48px] font-bold text-center mb-6 text-[#171a1f] font-archivo">Popular Projects</h2>
    <div class="grid grid-cols-3 gap-6">
      <?php
      require_once __DIR__ . "/../config/database.php";
      $stmt = $pdo->query("SELECT p.title, p.project_file, p.description, p.tags, u.username, p.thumbnail FROM projects p JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC LIMIT 3");
      $projects = $stmt->fetchAll();

      foreach ($projects as $project) {
        $fileName = htmlspecialchars($project['thumbnail']);
        $filePath = "/gyaanuday/uploads/" . $fileName;
        $description = htmlspecialchars($project['description']);
        $title = htmlspecialchars($project['title']);
        $tags = htmlspecialchars($project['tags']);

        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $thumb = '';

        // Check if the file is an image
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
          // For image files, use the image itself as the thumbnail
          $thumb = $filePath;
        } else {
          // For other file types (e.g., PDF, MP4, MP3), show a default thumbnail
          $thumb = "/gyaanuday/assets/default_icon.png"; // Use your own icon or placeholder for non-image files
        }

        echo "
        <div class='bg-white shadow-md rounded-lg p-4 border border-[#bdc1ca] card-hover'>
        <div class='relative'>
            <img src='$thumb' class='rounded-lg w-full h-48 object-cover' alt='$title'>
        </div>
        <h3 class='text-lg font-semibold mt-2 text-[#171a1f]'>$title</h3>
        <p class='text-[#565d6d] text-[16px] leading-[26px]'>$description</p>
        <p class='text-[#9095a1] text-[14px] mt-2'>Tags: $tags</p>
        </div>";
      }
      ?>
    </div>
  </section>

  <section class="max-w-6xl mx-auto my-12">
    <h2 class="text-[32px] leading-[48px] font-bold text-center mb-6 text-[#171a1f] font-archivo">Explore by Categories</h2>
    <div class="grid grid-cols-5 gap-4">
      <img src="web_dev.webp" class="rounded-lg shadow-md card-hover" alt="Web Dev">
      <img src="mobile.jpg" class="rounded-lg shadow-md card-hover" alt="Mobile Apps">
      <img src="data_anyl.jpg" class="rounded-lg shadow-md card-hover" alt="Data Analysis">
      <img src="ui_ux.jpg" class="rounded-lg shadow-md card-hover" alt="UI/UX Design">
      <img src="ai.jpg" class="rounded-lg shadow-md card-hover" alt="AI">
      <img src="block_chain.jpg" class="rounded-lg shadow-md card-hover" alt="Game Dev">
      <img src="game_dev.jpg" class="rounded-lg shadow-md card-hover" alt="Game Dev">
      <img src="cyber_security.jpg" class="rounded-lg shadow-md card-hover" alt="Cybersecurity">
    </div>
  </section>
</body>

</html>