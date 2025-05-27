<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eventify - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Tailwind CSS -->
     
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            .auth-bg {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
            
            .form-container {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
            }
        </style>
    </head>

    <body class="font-[Poppins]">
        <!-- Navigation -->
        <nav class="fixed w-full z-50 bg-white shadow-sm">
            <div class="container mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <a href="/">
                        <img src="https://i.postimg.cc/J7SH8bTm/Blue-Modern-Vezzra-Modern-Technology-Logo.png" 
                             class="h-12" alt="Eventify Logo">
                    </a>
                    <div class="flex space-x-4">
                      
                        <a href="{{ route('register') }}" 
                           class="px-6 py-2 bg-red-500 text-white font-semibold rounded-full hover:bg-red-600 transition duration-300">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Login Section -->
        <div class="min-h-screen auth-bg flex items-center justify-center p-4">
            <div class="form-container w-full max-w-md rounded-2xl shadow-xl p-8">
                <h2 class="text-3xl font-bold text-center mb-8">Welcome Back</h2>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2 font-medium" for="email">
                            Email Address
                        </label>
                        <input id="email" type="email" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               name="email" required autocomplete="email" autofocus>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2 font-medium" for="password">
                            Password
                        </label>
                        <input id="password" type="password" 
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               name="password" required autocomplete="current-password">
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" 
                                   class="h-4 w-4 text-red-500 focus:ring-red-500 border-gray-300 rounded">
                            <label class="ml-2 text-gray-600" for="remember">
                                Remember me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-red-500 hover:text-red-600 font-medium">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-red-500 text-white py-3 px-4 rounded-lg font-semibold 
                                   hover:bg-red-600 transition duration-300 transform hover:scale-[1.02]">
                        Sign In
                    </button>
                </form>

             

                <!-- Registration Link -->
                <p class="mt-8 text-center text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-red-500 hover:text-red-600 font-medium">
                        Create account
                    </a>
                </p>
            </div>
        </div>
    </body>
</html>