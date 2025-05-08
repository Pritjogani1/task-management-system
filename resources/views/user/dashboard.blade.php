<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - TaskFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
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
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">My Tasks</a>
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Team</a>
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <button class="p-2 text-gray-600 hover:text-gray-800">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="ml-4 flex items-center">
                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=User" alt="User">
                        <span class="ml-2 text-gray-700">John Doe</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Welcome back, John!</h1>
                    <p class="text-gray-600 mt-1">Here's what's happening with your tasks today.</p>
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
                    <i class="fas fa-plus mr-2"></i>New Task
                </button>
            </div>
        </div>

        <!-- Task Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-tasks text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">My Tasks</p>
                        <p class="text-2xl font-semibold text-gray-800">12</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">In Progress</p>
                        <p class="text-2xl font-semibold text-gray-800">4</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Completed</p>
                        <p class="text-2xl font-semibold text-gray-800">8</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Task List -->
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Today's Tasks</h2>
            </div>
            <div class="divide-y divide-gray-200">
                <!-- Task Item -->
                <div class="p-6 hover:bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-5 w-5 text-blue-600 rounded border-gray-300">
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Update Project Documentation</h3>
                                <p class="text-sm text-gray-500">Due today at 5:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Task Item -->
                <div class="p-6 hover:bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-5 w-5 text-blue-600 rounded border-gray-300">
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Team Meeting</h3>
                                <p class="text-sm text-gray-500">Due today at 2:00 PM</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 text-sm rounded-full bg-blue-100 text-blue-800">Upcoming</span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Task Item -->
                <div class="p-6 hover:bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" class="h-5 w-5 text-blue-600 rounded border-gray-300">
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Review Pull Requests</h3>
                                <p class="text-sm text-gray-500">Due tomorrow at 10:00 AM</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 text-sm rounded-full bg-purple-100 text-purple-800">Pending</span>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Deadlines -->
        <div class="mt-8 bg-white rounded-lg shadow-lg">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Upcoming Deadlines</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-gray-900">Project Presentation</h4>
                            <p class="text-sm text-gray-500">Due in 2 days</p>
                        </div>
                        <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-800">High Priority</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-gray-900">Client Meeting</h4>
                            <p class="text-sm text-gray-500">Due in 3 days</p>
                        </div>
                        <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-800">Medium Priority</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>