<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TaskFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
        <div class="flex items-center justify-center h-16 border-b">
            <span class="text-2xl font-bold text-blue-600">TaskFlow</span>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 bg-gray-100 rounded-lg">
                    <i class="fas fa-home w-6"></i>
                    <span class="mx-4">Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-tasks w-6"></i>
                    <span class="mx-4">Tasks</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-users w-6"></i>
                    <span class="mx-4">Users</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-chart-bar w-6"></i>
                    <span class="mx-4">Analytics</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-cog w-6"></i>
                    <span class="mx-4">Settings</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Top Navigation -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h1>
            <div class="flex items-center space-x-4">
                <button class="p-2 text-gray-600 hover:text-gray-800">
                    <i class="fas fa-bell"></i>
                </button>
                <div class="flex items-center space-x-2">
                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin" alt="Admin">
                    <span class="text-gray-700">Admin</span>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-tasks text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Tasks</p>
                        <p class="text-2xl font-semibold text-gray-800">1,234</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Active Users</p>
                        <p class="text-2xl font-semibold text-gray-800">567</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Pending Tasks</p>
                        <p class="text-2xl font-semibold text-gray-800">89</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Completed</p>
                        <p class="text-2xl font-semibold text-gray-800">1,145</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow mb-8">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Recent Activity</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">New task created by John Doe</p>
                            <p class="text-xs text-gray-400">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">Task "Update Documentation" completed</p>
                            <p class="text-xs text-gray-400">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-yellow-600 rounded-full"></div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600">New user registered</p>
                            <p class="text-xs text-gray-400">3 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i>Create New Task
                    </button>
                    <button class="w-full flex items-center justify-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                        <i class="fas fa-user-plus mr-2"></i>Add New User
                    </button>
                    <button class="w-full flex items-center justify-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                        <i class="fas fa-file-export mr-2"></i>Export Reports
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">System Status</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Server Load</span>
                        <span class="text-green-600">Normal</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Database Status</span>
                        <span class="text-green-600">Connected</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Last Backup</span>
                        <span class="text-gray-600">2 hours ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>