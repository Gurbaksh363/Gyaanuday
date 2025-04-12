<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Showcase</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900">
  <!-- Navbar -->
  <nav class="flex justify-between items-center p-4 border-b shadow-sm">
    <div class="flex space-x-8">
      <h1 class="text-xl font-semibold">Project Showcase</h1>
      <a href="#" class="text-gray-600 hover:text-black">Home</a>
      <a href="#" class="text-gray-600 hover:text-black border-b-2" style="border-color: #A7D820;">Projects</a>
      <a href="#" class="text-gray-600 hover:text-black">Profile</a>
    </div>
    <div class="flex space-x-4">
      <span class="w-5 h-5">🔍</span>
      <span class="w-5 h-5">🔔</span>
      <span class="w-5 h-5">👤</span>
    </div>
  </nav>

  <!-- Upload Section -->
  <div class="p-8 max-w-4xl mx-auto flex justify-between items-start">
    <form class="w-1/2" action="/gyaanuday/src/projects/add_project.php" method="POST" enctype="multipart/form-data">
      <h2 class="text-2xl font-semibold">Showcase Your Projects</h2>

      <input type="text" name="title" class="mt-4 w-full border p-2 rounded" placeholder="Project Title" required>

      <div class="mt-4 relative">
        <input type="file" id="project-upload" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10"
          name="project_file" required>
        <label for="project-upload" class="text-white py-2 px-4 rounded flex items-center cursor-pointer"
          style="background-color: #A7D820;">
          ⬆ Upload your project
        </label>
      </div>

      <!-- Thumbnail Upload -->
      <div class="mt-4 relative">
        <input type="file" id="thumbnail-upload" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer z-10"
          name="thumbnail" accept="image/*" required>
        <label for="thumbnail-upload" class="text-white py-2 px-4 rounded flex items-center cursor-pointer"
          style="background-color: #A7D820;">
          🖼 Upload thumbnail cover
        </label>
      </div>

      <textarea name="description" class="mt-4 w-full border p-2 rounded" placeholder="Project description"
        required></textarea>

      <input type="text" name="tags" class="mt-2 w-full border p-2 rounded"
        placeholder="Enter tags (Press enter to add new tag)" required>

      <button type="submit" class="mt-4 text-white py-2 px-4 rounded flex items-center"
        style="background-color: #A7D820;">
        Submit Project
      </button>
    </form>
  </div>



  <div class="flex space-x-2 w-1/2 justify-end">
    <img src="h1.jpg" class="w-16 h-16 object-cover rounded-md">
    <img src="h5.jpg" class="w-16 h-16 object-cover rounded-md">
    <img src="h3.jpg" class="w-16 h-16 object-cover rounded-md">
    <img src="h4.jpg" class="w-16 h-16 object-cover rounded-md">
  </div>
  <div>
    <img src="h2.jpg" class="w-16 h-16 object-cover rounded-md">
  </div>
  </div>

  <!-- Featured Projects -->
  <div class="px-8">
    <h2 class="text-2xl font-semibold text-center">Featured Projects</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
      <div class="overflow-hidden rounded-lg shadow-lg">
        <img src="SkylineView.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Skyline View</h3>
          <p class="text-gray-500 text-sm">Urban Oasis</p>
          <p class="text-gray-400 text-xs">Architecture</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg">
        <img src="CityofTomorrow.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">City of Tomorrow</h3>
          <p class="text-gray-500 text-sm">Futuristic Dreams</p>
          <p class="text-gray-400 text-xs">Digital Art</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg">
        <img src="ArtisanVase.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Artisan Vase</h3>
          <p class="text-gray-500 text-sm">Pottery Passion</p>
          <p class="text-gray-400 text-xs">Ceramics</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg">
        <img src="Landscape.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Landscape Shot</h3>
          <p class="text-gray-500 text-sm">Nature's Beauty</p>
          <p class="text-gray-400 text-xs">Photography</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg">
        <img src="Portrait.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">Portrait Art</h3>
          <p class="text-gray-500 text-sm">Masterful Strokes</p>
          <p class="text-gray-400 text-xs">Fine Art</p>
        </div>
      </div>
      <div class="overflow-hidden rounded-lg shadow-lg">
        <img src="AppInterface.jpg" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold">App Interface</h3>
          <p class="text-gray-500 text-sm">Tech Savvy</p>
          <p class="text-gray-400 text-xs">UI/UX Design</p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>