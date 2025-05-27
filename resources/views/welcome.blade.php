<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eventora - Discover Events</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="font-[Poppins]">
      
        <nav class="fixed w-full z-50 nav-transparent">
            <div class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="shrink-0 flex items-center">
                 
                      
                        <a href="/">
                            <img src="{{ asset('assets/images/Logobg.png') }}" alt="Vezzra" class="logo" />
                        </a>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" 
                           class="px-6 py-2 text-black font-semibold rounded-full hover:bg-white hover:text-black transition duration-300">
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

    </body>
</html>