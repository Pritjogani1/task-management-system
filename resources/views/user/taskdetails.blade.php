<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details - TaskFlow</title>
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
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            <a href="#" class="text-gray-900 bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">My Tasks</a>
                            <a href="#" class="text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">Team</a>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=You" alt="You">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Task Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Task Header -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <input type="checkbox" class="h-5 w-5 text-blue-600 rounded border-gray-300">
                            <h1 class="text-2xl font-bold text-gray-800">Update Project Documentation</h1>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="p-2 text-gray-600 hover:text-gray-800">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-gray-600 hover:text-gray-800">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span class="flex items-center">
                            <i class="fas fa-user mr-2"></i>
                            Assigned to You
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-calendar mr-2"></i>
                            Due in 2 days
                        </span>
                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-800">In Progress</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Description</h2>
                    <p class="text-gray-600">
                        Update the project documentation to include the latest API changes and new features. 
                        Make sure to include code examples and usage instructions.
                    </p>
                </div>

                <!-- Comments -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Comments</h2>
                    <div class="space-y-4">
                        <!-- Comment -->
                        <div class="flex space-x-4">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Admin" alt="Admin">
                            <div class="flex-1">
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-sm font-medium text-gray-900">Admin</h3>
                                        <span class="text-xs text-gray-500">2 hours ago</span>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Please make sure to include the latest API endpoints in the documentation.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Comment Form -->
                        <div class="flex space-x-4">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=You" alt="You">
                            <div class="flex-1">
                                <textarea rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Write a comment..."></textarea>
                                <div class="mt-2 flex justify-end">
                                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        Comment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Task Info -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Task Info</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Status</label>
                            <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="todo">To Do</option>
                                <option value="in_progress" selected>In Progress</option>
                                <option value="review">Review</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Priority</label>
                            <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="high">High</option>
                                <option value="medium" selected>Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Due Date</label>
                            <input type="date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Attachments -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Attachments</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-file-pdf text-red-500 text-xl"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">API_Documentation.pdf</p>
                                    <p class="text-xs text-gray-500">2.4 MB</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                        <button class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-plus mr-2"></i>Add Attachment
                        </button>
                    </div>
                </div>

                <!-- Activity Log -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Activity Log</h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-2 h-2 mt-2 bg-blue-600 rounded-full"></div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600">Task assigned to you</p>
                                <p class="text-xs text-gray-400">2 days ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-2 h-2 mt-2 bg-green-600 rounded-full"></div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-600">You started working on the task</p>
                                <p class="text-xs text-gray-400">1 day ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
