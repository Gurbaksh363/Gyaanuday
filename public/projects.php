<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects | Project Showcase</title>
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

<body class="bg-white text-gray-900">
  <!-- Improved Navigation Bar -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0 flex items-center">
            <span class="text-2xl font-bold mr-1" style="color: #A7D820;"><i class="fas fa-project-diagram"></i></span>
            <span class="text-[28px] leading-[42px] font-archivo ml-2">Project Showcase</span>
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
          <a href="profile.php" class="rounded-full p-1 text-gray-500 hover:text-gray-700 focus:outline-none">
            <i class="fas fa-user-circle text-xl"></i>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Upload Section -->
  <div class="p-8 max-w-4xl mx-auto flex justify-between items-start">
    <form class="w-1/2" action="/gyaanuday/src/projects/add_project.php" method="POST" enctype="multipart/form-data">
      <h2 class="text-[32px] leading-[48px] font-semibold text-[#171a1f] font-archivo">Showcase Your Projects</h2>

      <input type="text" name="title" class="mt-4 w-full border p-2 rounded-lg shadow-sm focus:ring-2 focus:ring-[#A7D820] focus:border-transparent outline-none" placeholder="Project Title" required>

      <div class="mt-4 relative">
        <input type="file" id="project-upload" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10"
          name="project_file" required>
        <label for="project-upload" class="text-white py-2 px-4 rounded-lg flex items-center cursor-pointer shadow-md button-hover"
          style="background-color: #A7D820;">
          ⬆ Upload your project
        </label>
      </div>

      <!-- Thumbnail Upload -->
      <div class="mt-4 relative">
        <input type="file" id="thumbnail-upload" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10"
          name="thumbnail" accept="image/*" required>
        <label for="thumbnail-upload" class="text-white py-2 px-4 rounded-lg flex items-center cursor-pointer shadow-md button-hover"
          style="background-color: #A7D820;">
          🖼 Upload thumbnail cover
        </label>
      </div>

      <textarea name="description" class="mt-4 w-full border p-2 rounded-lg shadow-sm focus:ring-2 focus:ring-[#A7D820] focus:border-transparent outline-none text-[16px] leading-[26px]" placeholder="Project description"
        required></textarea>

      <input type="text" name="tags" class="mt-2 w-full border p-2 rounded-lg shadow-sm focus:ring-2 focus:ring-[#A7D820] focus:border-transparent outline-none"
        placeholder="Enter tags (Press enter to add new tag)" required>

      <button type="submit" class="mt-4 text-white py-2 px-4 rounded-lg flex items-center shadow-md button-hover"
        style="background-color: #A7D820;">
        Submit Project
      </button>
    </form>

    <div class="flex space-x-2 w-1/2 justify-end">
      <img src="h1.jpg" class="w-16 h-16 object-cover rounded-lg shadow-sm card-hover">
      <img src="h5.jpg" class="w-16 h-16 object-cover rounded-lg shadow-sm card-hover">
      <img src="h3.jpg" class="w-16 h-16 object-cover rounded-lg shadow-sm card-hover">
      <img src="h4.jpg" class="w-16 h-16 object-cover rounded-lg shadow-sm card-hover">
    </div>
    <div>
      <img src="h2.jpg" class="w-16 h-16 object-cover rounded-lg shadow-sm card-hover">
    </div>
  </div>

  <!-- Featured Projects -->
  <div class="px-8">
    <h2 class="text-[32px] leading-[48px] font-semibold text-center text-[#171a1f] font-archivo">Featured Projects</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
      <div class="overflow-hidden rounded-lg shadow-lg border border-[#bdc1ca] card-hover">
        <img src="SkylineView.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#171a1f]">Skyline View</h3>
          <p class="text-[#565d6d] text-[16px] leading-[26px]">Urban Oasis</p>
          <p class="text-[#9095a1] text-[14px]">Architecture</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg border border-[#bdc1ca] card-hover">
        <img src="CityofTomorrow.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#171a1f]">City of Tomorrow</h3>
          <p class="text-[#565d6d] text-sm">Futuristic Dreams</p>
          <p class="text-[#9095a1] text-xs">Digital Art</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg border border-[#bdc1ca] card-hover">
        <img src="ArtisanVase.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#171a1f]">Artisan Vase</h3>
          <p class="text-[#565d6d] text-sm">Pottery Passion</p>
          <p class="text-[#9095a1] text-xs">Ceramics</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg border border-[#bdc1ca] card-hover">
        <img src="Landscape.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#171a1f]">Landscape Shot</h3>
          <p class="text-[#565d6d] text-sm">Nature's Beauty</p>
          <p class="text-[#9095a1] text-xs">Photography</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg border border-[#bdc1ca] card-hover">
        <img src="Portrait.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#171a1f]">Portrait Art</h3>
          <p class="text-[#565d6d] text-sm">Masterful Strokes</p>
          <p class="text-[#9095a1] text-xs">Fine Art</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg border border-[#bdc1ca] card-hover">
        <img src="AppInterface.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-[#171a1f]">App Interface</h3>
          <p class="text-[#565d6d] text-sm">Tech Savvy</p>
          <p class="text-[#9095a1] text-xs">UI/UX Design</p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>