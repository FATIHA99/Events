<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eventify - Discover Events</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            .hero-bg {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
            
            .nav-transparent {
                background-color: rgba(0, 0, 0, 0.3);
                backdrop-filter: blur(10px);
            }
        </style>
    </head>

    <body class="font-[Poppins]">
        <!-- Navigation -->
        <nav class="fixed w-full z-50 nav-transparent">
            <div class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="text-white font-bold text-xl">
                        Eventora
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" 
                           class="px-6 py-2 text-white font-semibold rounded-full hover:bg-white hover:text-black transition duration-300">
                            Log in
                        </a>
                        <a href="{{ route('register') }}" 
                           class="px-6 py-2 bg-red-500 text-white font-semibold rounded-full hover:bg-red-600 transition duration-300">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="min-h-screen hero-bg flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                    Discover Amazing Events
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                    Join thousands of events happening around you. From music festivals to tech conferences - find your next experience.
                </p>
                <button class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-full text-lg font-semibold transition duration-300 transform hover:scale-105">
                    Explore Events
                </button>
            </div>
        </div>

        <!-- Grid Layout Section -->
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-3xl font-bold text-center mb-12">Trending Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Event Cards -->
                <div class="rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                         class="w-full h-64 object-cover" alt="Concert">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2">Summer Music Festival</h3>
                        <p class="text-gray-600">Join us for the biggest music event of the year!</p>
                    </div>
                </div>
                
              
            </div>
        </div>
    </body>
</html>