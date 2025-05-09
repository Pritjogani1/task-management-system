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
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Add Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                @can('user')
                <li><a href="{{route('admin.users.index')}}"  class="block hover:bg-gray-700 px-3 py-2 rounded">Users</a></li>
                @endcan
                <li><a href="{{route('admin.tasks.all')}}" class="block hover:bg-gray-700 px-3 py-2 rounded">Tasks</a></li>
                <li><a href="{{route('admin.chat.index')}}" class="block hover:bg-gray-700 px-3 py-2 rounded">Chat</a></li>

            </ul>
            <a href="{{ route('admin.admins.index') }}" :active="request()->is('admins*')"
                class="flex items-center px-4 py-3 text-gray-100 hover:bg-violet-700/50 rounded-lg">
                <i class="fas fa-users mr-3"></i>
                <span>Admins</span>
            </a>
            <a href="{{ route('admin.role') }}" :active="request()->is('admin/role*')"
                class="flex items-center px-4 py-3 text-gray-100 hover:bg-violet-700/50 rounded-lg">
                <i class="fas fa-users mr-3"></i>
                <span>Roles</span>
            </a>
            <a href="{{ route('admin.permission') }}" :active="request()->is('admin/permission*')"
                class="flex items-center px-4 py-3 text-gray-100 hover:bg-violet-700/50 rounded-lg">
                <i class="fas fa-users mr-3"></i>
                <span>Permissions</span>
            </a>
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

    <!-- Add Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    
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
