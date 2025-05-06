<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary-color: #1e293b;
            --secondary-color: #334155;
            --accent-color: #3b82f6;
            --text-color: #ffffff;
        }
        .task-card {
            transition: all 0.3s ease;
        }
        .task-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-[var(--primary-color)] shadow-lg fixed w-full top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <div class="p-2 bg-blue-600 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white">TaskFlow</span>
                </div>

                <!-- Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <x-nav-link href="/" :active="request()->is('/')" 
                        class="text-white hover:text-blue-400 transition-colors duration-200">Dashboard</x-nav-link>
                    <x-nav-link href="/tasks" :active="request()->is('tasks')" 
                        class="text-white hover:text-blue-400 transition-colors duration-200">My Tasks</x-nav-link>
                </div>

                <!-- User Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    @guest('user')
                        <a href="/register" class="text-white hover:text-blue-400 transition-colors duration-200">Register</a>
                        <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Login</a>
                    @endguest
                    @auth('user')
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 text-white focus:outline-none">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" 
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2">
                                <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                                <a href="/settings" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
                                <hr class="my-2">
                                <form action="/logout" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="mobileMenu = !mobileMenu" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-show="mobileMenu" class="md:hidden bg-[var(--primary-color)] border-t border-gray-700">
        <div class="px-4 py-2">
            <a href="{{route("user.dashboard")}}" class="block py-2 text-white hover:text-blue-400">Dashboard</a>
            <a href="{{route("user.task-details")}}" class="block py-2 text-white hover:text-blue-400">My Tasks</a>
            @guest('user')
                <a href="/register" class="block py-2 text-white hover:text-blue-400">Register</a>
                <a href="/login" class="block py-2 text-white hover:text-blue-400">Login</a>
            @endguest
            @auth('user')
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 text-white hover:text-blue-400">Logout</button>
                </form>
            @endauth
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 pt-20 pb-12">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-[var(--primary-color)] text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-lg font-bold">TaskFlow</h3>
                    <p class="text-sm text-gray-400">Streamline your workflow</p>
                </div>
                <div class="flex space-x-6">
                    <a href="/about" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">About</a>
                    <a href="/privacy" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Privacy</a>
                    <a href="/terms" class="text-sm text-gray-400 hover:text-white transition-colors duration-200">Terms</a>
                </div>
            </div>
            <div class="mt-8 text-center text-sm text-gray-400">
                &copy; {{ date('Y') }} TaskFlow. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        let mobileMenu = false;
    </script>
</body>
</html>
