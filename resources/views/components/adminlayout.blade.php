<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <script src="https://kit.fontawesome.com/20f5d418fc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toasty.js@1.0.1/dist/toasty.min.js"></script>
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <nav class="bg-gray-800 text-white w-64 min-h-screen flex flex-col">
        <div class="flex items-center justify-center h-16">
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-white">TaskManager</a>
        </div>
        <div class="flex-1 px-4 py-6">
            <ul class="space-y-4">
                <li><a href="{{ route('admin.dashboard') }}" class="block hover:bg-gray-700 px-3 py-2 rounded">Dashboard</a></li>
                <li><a href="{{route('admin.users.index')}}"  class="block hover:bg-gray-700 px-3 py-2 rounded">Users</a></li>
                <li><a href="{{route('admin.tasks.all')}}" class="block hover:bg-gray-700 px-3 py-2 rounded">Tasks</a></li>
                <li><a href="#" class="block hover:bg-gray-700 px-3 py-2 rounded">Projects</a></li>
                <li><a href="#" class="block hover:bg-gray-700 px-3 py-2 rounded">Settings</a></li>
            </ul>
        </div>
        <!-- Logout Button -->
        <div class="p-4">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 px-3 py-2 rounded">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Header -->
        <header class="bg-white shadow-md">
            <div class="flex justify-between items-center p-4">
                <h1 class="text-2xl font-semibold text-gray-800">{{ $title ?? 'Admin Dashboard' }}</h1>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>

    <script>
        @if(Session::has('success'))
            Toastify({
                text: "{{ Session::get('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#10B981",
                className: "rounded-lg",
            }).showToast();
        @endif

        @if(Session::has('error'))
            Toastify({
                text: "{{ Session::get('error') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#EF4444",
                className: "rounded-lg",
            }).showToast();
        @endif
    </script>
</body>
</html>