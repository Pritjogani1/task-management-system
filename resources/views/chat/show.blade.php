<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-blue-600">TaskFlow</span>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#" class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            <a href="#" class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">My Tasks</a>
                            <a href="#" class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Team</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($receiver->name) }}" alt="{{ $receiver->name }}">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Task Board -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- To Do Column -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">To Do</h3>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <div class="space-y-3">
                    <!-- Task Card -->
                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium text-gray-800">Task Title</h4>
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">High</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Task description goes here...</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=User" alt="User">
                                <span class="text-xs text-gray-500">Due: Tomorrow</span>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full text-left text-gray-500 hover:text-gray-700">
                    <i class="fas fa-plus mr-2"></i>Add a card
                </button>
            </div>

            <!-- In Progress Column -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">In Progress</h3>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <div class="space-y-3">
                    <!-- Task Card -->
                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium text-gray-800">In Progress Task</h4>
                            <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Medium</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Task description goes here...</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=User" alt="User">
                                <span class="text-xs text-gray-500">Due: Next Week</span>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full text-left text-gray-500 hover:text-gray-700">
                    <i class="fas fa-plus mr-2"></i>Add a card
                </button>
            </div>

            <!-- Review Column -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Review</h3>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <div class="space-y-3">
                    <!-- Task Card -->
                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium text-gray-800">Review Task</h4>
                            <span class="text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded">Low</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Task description goes here...</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=User" alt="User">
                                <span class="text-xs text-gray-500">Due: Today</span>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full text-left text-gray-500 hover:text-gray-700">
                    <i class="fas fa-plus mr-2"></i>Add a card
                </button>
            </div>

            <!-- Done Column -->
            <div class="bg-gray-100 rounded-lg p-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Done</h3>
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <div class="space-y-3">
                    <!-- Task Card -->
                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium text-gray-800">Completed Task</h4>
                            <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">Completed</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Task description goes here...</p>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api/?name=User" alt="User">
                                <span class="text-xs text-gray-500">Completed: Yesterday</span>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full text-left text-gray-500 hover:text-gray-700">
                    <i class="fas fa-plus mr-2"></i>Add a card
                </button>
            </div>
        </div>
    </div>

    <!-- Add New Column Button -->
    <div class="fixed bottom-6 right-6">
        <button class="bg-blue-600 text-white rounded-full p-4 shadow-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-plus"></i>
        </button>
    </div>

    @push('scripts')
    <script>
        const userId = {{ Auth::id() }};
        const receiverId = {{ $receiver->id }};
    </script>
    <script src="{{ mix('js/chat.js') }}"></script>
    @endpush
</body>
</html>
