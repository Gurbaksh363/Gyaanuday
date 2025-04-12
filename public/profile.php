<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Gyaanuday</title>
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
    </style>
</head>
<body class="bg-white">
    <!-- Improved Navigation Bar -->
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
                <a href="projects.php" class="px-3 py-2 text-[14px] leading-[22px] text-[#565d6d] nav-item">
                  <i class="fas fa-folder-open mr-1"></i> Projects
                </a>
                <a href="profile.php" class="px-3 py-2 text-[14px] leading-[22px] font-semibold nav-item nav-item-active">
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
              <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/avatar.png" alt="Avatar" class="w-9 h-9 rounded-full cursor-pointer">
            </div>
          </div>
        </div>
    </nav>

    <!-- User Profile Section -->
    <div class="flex justify-center items-center min-h-screen bg-white">
        <!-- Main container -->
        <div class="w-full max-w-4xl bg-white border border-[#bdc1ca] flex items-center p-8 gap-6">
            <!-- Avatar -->
            <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image.png" alt="User avatar" class="w-20 h-20 rounded-lg object-cover">
            
            <!-- User info container -->
            <div class="flex flex-col gap-4">
                <h1 class="text-[32px] leading-[48px] font-archivo text-[#171a1f]">User Name</h1>
                <p class="text-base leading-[26px] text-[#565d6d] font-inter">This is the user bio that describes the user in a few sentences. It can include interests, profession, or any relevant information.</p>
            </div>
        </div>

        <!-- Edit Profile Button -->
        <button class="absolute bottom-10 w-[150px] h-[44px] bg-[#a7d820] rounded-lg text-[#3a4b0b] font-inter text-base hover:bg-[#96c01c] transition-colors">
            Edit Profile
        </button>
    </div>

    <!-- Uploaded Projects Section -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-center text-4xl font-normal text-[#171a1f] mb-12 font-['Archivo']">Uploaded Projects</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Modern Web Design -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20.png" alt="Modern Web Design" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-lg font-bold text-[#171a1f] mb-2">Modern Web Design</h2>
                <p class="text-[#9095a1] text-sm mb-2">A sleek and user-friendly website layout.</p>
                <p class="text-[#9095a1] text-sm mb-4">This project focuses on minimalism and interactivity.</p>
                <button class="w-full border border-[#5f7b12] text-[#5f7b12] py-2 rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">Like</button>
            </div>

            <!-- App Interface -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-2.png" alt="App Interface" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-lg font-bold text-[#171a1f] mb-2">App Interface</h2>
                <p class="text-[#9095a1] text-sm mb-2">A responsive and interactive app design.</p>
                <p class="text-[#9095a1] text-sm mb-4">The project emphasizes intuitive navigation.</p>
                <button class="w-full border border-[#5f7b12] text-[#5f7b12] py-2 rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">Like</button>
            </div>

            <!-- Branding Kit -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-3.png" alt="Branding Kit" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-lg font-bold text-[#171a1f] mb-2">Branding Kit</h2>
                <p class="text-[#9095a1] text-sm mb-2">A comprehensive branding package.</p>
                <p class="text-[#9095a1] text-sm mb-4">Includes logos, color schemes, and typography.</p>
                <button class="w-full border border-[#5f7b12] text-[#5f7b12] py-2 rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">Like</button>
            </div>

            <!-- E-commerce Design -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-4.png" alt="E-commerce Design" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-lg font-bold text-[#171a1f] mb-2">E-commerce Design</h2>
                <p class="text-[#9095a1] text-sm mb-2">A user-centric e-commerce design.</p>
                <p class="text-[#9095a1] text-sm mb-4">Focuses on seamless checkout experience.</p>
                <button class="w-full border border-[#5f7b12] text-[#5f7b12] py-2 rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">Like</button>
            </div>

            <!-- Photo Portfolio -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-5.png" alt="Photo Portfolio" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-lg font-bold text-[#171a1f] mb-2">Photo Portfolio</h2>
                <p class="text-[#9095a1] text-sm mb-2">A portfolio showcasing stunning photography.</p>
                <p class="text-[#9095a1] text-sm mb-4">Arranged in an elegant and clean layout.</p>
                <button class="w-full border border-[#5f7b12] text-[#5f7b12] py-2 rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">Like</button>
            </div>

            <!-- Social Media Campaign -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-6.png" alt="Social Media Campaign" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-lg font-bold text-[#171a1f] mb-2">Social Media Campaign</h2>
                <p class="text-[#9095a1] text-sm mb-2">Visuals for a dynamic social media campaign.</p>
                <p class="text-[#9095a1] text-sm mb-4">Includes graphics and promotional content.</p>
                <button class="w-full border border-[#5f7b12] text-[#5f7b12] py-2 rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">Like</button>
            </div>
        </div>
    </div>

    <!-- Bookmarked Projects Section -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-center text-[32px] text-[#171a1f] font-archivo mb-12 leading-[48px]">Bookmarked Projects</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- TaskMaster Pro -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4 hover:shadow-lg transition-shadow">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-7.png" alt="TaskMaster Pro" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-[#171a1f] text-lg font-bold mb-2">TaskMaster Pro</h2>
                <p class="text-[#9095a1] text-sm leading-[22px]">A sleek web application for managing tasks efficiently.</p>
            </div>

            <!-- ShopEase -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4 hover:shadow-lg transition-shadow">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-8.png" alt="ShopEase" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-[#171a1f] text-lg font-bold mb-2">ShopEase</h2>
                <p class="text-[#9095a1] text-sm leading-[22px]">An intuitive online store with a variety of products.</p>
            </div>

            <!-- EduPath -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4 hover:shadow-lg transition-shadow">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-9.png" alt="EduPath" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-[#171a1f] text-lg font-bold mb-2">EduPath</h2>
                <p class="text-[#9095a1] text-sm leading-[22px]">Learn new skills with our comprehensive courses.</p>
            </div>

            <!-- PetConnect -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4 hover:shadow-lg transition-shadow">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-10.png" alt="PetConnect" class="w-full h-40 object-cover rounded-lg mb-4">
                <h2 class="text-[#171a1f] text-lg font-bold mb-2">PetConnect</h2>
                <p class="text-[#9095a1] text-sm leading-[22px]">Connect with fellow pet enthusiasts around the world.</p>
            </div>
        </div>
    </div>

    <!-- Community Engagement Section -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-archivo text-center text-[#171a1f] mb-12">Community Engagement</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Garden Project -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-11.png" alt="Garden Project" class="w-full h-40 object-cover rounded-lg mb-6">
                <h2 class="text-xl font-bold text-[#171a1f] mb-2">Garden Project</h2>
                <p class="text-[#9095a1] mb-6">Join our community garden project and help beautify our neighborhood.</p>
                <button class="w-full py-2 px-4 border border-[#5f7b12] text-[#5f7b12] rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">
                    Engage
                </button>
            </div>

            <!-- Art Mural -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-12.png" alt="Art Mural" class="w-full h-40 object-cover rounded-lg mb-6">
                <h2 class="text-xl font-bold text-[#171a1f] mb-2">Art Mural</h2>
                <p class="text-[#9095a1] mb-6">Contribute to our community mural and express your creativity.</p>
                <button class="w-full py-2 px-4 border border-[#5f7b12] text-[#5f7b12] rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">
                    Engage
                </button>
            </div>

            <!-- Beach Cleanup -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-13.png" alt="Beach Cleanup" class="w-full h-40 object-cover rounded-lg mb-6">
                <h2 class="text-xl font-bold text-[#171a1f] mb-2">Beach Cleanup</h2>
                <p class="text-[#9095a1] mb-6">Join our beach cleanup and help keep our beaches clean.</p>
                <button class="w-full py-2 px-4 border border-[#5f7b12] text-[#5f7b12] rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">
                    Engage
                </button>
            </div>

            <!-- Tree Planting -->
            <div class="bg-white rounded-md border border-[#bdc1ca] p-4">
                <img src="https://dashboard.codeparrot.ai/api/image/Z90sbsNZNkcbc4lS/image-20-14.png" alt="Tree Planting" class="w-full h-40 object-cover rounded-lg mb-6">
                <h2 class="text-xl font-bold text-[#171a1f] mb-2">Tree Planting</h2>
                <p class="text-[#9095a1] mb-6">Participate in our tree planting event to make our area greener.</p>
                <button class="w-full py-2 px-4 border border-[#5f7b12] text-[#5f7b12] rounded-md hover:bg-[#5f7b12] hover:text-white transition-colors">
                    Engage
                </button>
            </div>
        </div>
    </div>
</body>
</html>