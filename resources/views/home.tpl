<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Framework</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
<div class="min-h-screen flex flex-col items-center justify-center px-6">
    <!-- Header -->
    <header class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-extrabold text-gradient bg-gradient-to-r from-blue-400 to-purple-600 inline-block">
            Welcome to Your Framework
        </h1>
        <p class="text-gray-400 mt-4 text-lg md:text-xl">
            A simple, powerful PHP framework built with love.
        </p>
    </header>

    <!-- Features Section -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl">
        <!-- Feature Card 1 -->
        <div class="p-6 bg-gray-800 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
            <h3 class="text-xl font-bold text-blue-400 mb-3">Routing</h3>
            <p class="text-gray-400">
                Easily map your URLs to controllers with our intuitive routing system.
            </p>
        </div>
        <!-- Feature Card 2 -->
        <div class="p-6 bg-gray-800 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
            <h3 class="text-xl font-bold text-purple-400 mb-3">Middleware</h3>
            <p class="text-gray-400">
                Secure and extend your application with flexible middleware support.
            </p>
        </div>
        <!-- Feature Card 3 -->
        <div class="p-6 bg-gray-800 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
            <h3 class="text-xl font-bold text-green-400 mb-3">Database</h3>
            <p class="text-gray-400">
                Seamless integration with PDO for easy database management.
            </p>
        </div>
    </section>

    <!-- Call-to-Action -->
    <section class="mt-16 text-center">
        <a href="/register"
           class="px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-lg shadow-lg hover:scale-105 transition transform">
            Get Started
        </a>
    </section>
</div>

<!-- Footer -->
<footer class="mt-16 text-center text-gray-500 text-sm">
    <p>Designed and Developed with ❤ by Your Name</p>
</footer>
</body>
</html>
