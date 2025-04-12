<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Showcase</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold" style="color: #A7D820;">logo</span>
            <span class="text-lg font-semibold">Project Showcase</span>
        </div>
        <div class="space-x-6">
            <a href="#" class="font-semibold" style="color: #A7D820;">Home</a>
            <a href="#" class="text-gray-600">Projects</a>
            <a href="#" class="text-gray-600">Profile</a>
        </div>
        <div class="space-x-4">
            <button class="border px-4 py-2 rounded text-gray-600">Sign Up</button>
            <button class="px-4 py-2 rounded text-white" style="background-color: #A7D820;">Sign In</button>
        </div>
    </nav>

    <header class="relative w-full h-[60vh] bg-cover bg-center" style="background-image: url('discover_project.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-start justify-center text-left text-white pl-16">
            <h1 class="text-4xl font-bold">Discover Projects</h1>
            <p class="mt-2">Unleash creativity through hands-on learning</p>
            <button class="mt-4 px-6 py-2 rounded text-white" style="background-color: #A7D820;">Explore Projects</button>
        </div>
    </header>

    <section class="max-w-6xl mx-auto my-12">
        <h2 class="text-2xl font-bold text-center mb-6">Popular Projects</h2>
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white shadow-md p-4 rounded">
                <img src="modular_home.jpg" class="rounded" alt="Eco Home">
                <h3 class="text-lg font-semibold mt-2">Eco Home</h3>
                <p class="text-gray-600">Sustainable design project focusing on renewable energy.</p>
            </div>
            <div class="bg-white shadow-md p-4 rounded">
                <img src="smart_park.jpg" class="rounded" alt="Smart Park">
                <h3 class="text-lg font-semibold mt-2">Smart Park</h3>
                <p class="text-gray-600">Innovative park design integrating technology and nature.</p>
            </div>
            <div class="bg-white shadow-md p-4 rounded">
                <img src="Tech-Hub.avif" class="rounded" alt="Tech Hub">
                <h3 class="text-lg font-semibold mt-2">Tech Hub</h3>
                <p class="text-gray-600">Collaborative workspace for cutting-edge tech development.</p>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto my-12">
        <h2 class="text-2xl font-bold text-center mb-6">Explore by Categories</h2>
        <div class="grid grid-cols-5 gap-4">
            <img src="web_dev.webp" class="rounded shadow-md" alt="Web Dev">
            <img src="mobile.jpg" class="rounded shadow-md" alt="Mobile Apps">
            <img src="data_anyl.jpg" class="rounded shadow-md" alt="Data Analysis">
            <img src="ui_ux.jpg" class="rounded shadow-md" alt="UI/UX Design">
            <img src="ai.jpg" class="rounded shadow-md" alt="AI">
            <img src="block_chain.jpg" class="rounded shadow-md" alt="Blockchain">
            <img src="game_dev.jpg" class="rounded shadow-md" alt="Game Dev">
            <img src="cyber_security.jpg" class="rounded shadow-md" alt="Cybersecurity">
        </div>
    </section>
</body>
</html>