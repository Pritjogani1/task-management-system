<x-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- User Profile Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-purple-500 to-blue-500 p-4">
                    <div class="flex items-center space-x-4">
                        <img class="h-16 w-16 rounded-full border-4 border-white shadow-md" 
                            src="https://api.dicebear.com/6.x/initials/svg?seed={{ auth()->user()->name }}" 
                            alt="{{ auth()->user()->name }}">
                        <div class="text-black">
                            <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
                            <p class="text-black">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
          

                <!-- Recent Tasks Card -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Recent Tasks</h3>
\
                    </div>
                    <div class="space-y-3">
                        @forelse($tasks as $task)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-800">{{ $task->title }}</h4>
                                    <p class="text-sm text-gray-500">Due: {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</p>
                                </div>
                                <div class="flex flex-col items-end space-y-2">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full
                                        @if($task->priority == 'high') bg-red-100 text-red-800
                                        @elseif($task->priority == 'medium') bg-yellow-100 text-yellow-800
                                        @else bg-green-100 text-green-800 @endif">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                    <span class="px-3 py-1 text-xs font-medium rounded-full
                                        @if($task->status == 'completed') bg-green-100 text-green-800
                                        @elseif($task->status == 'in_progress') bg-blue-100 text-blue-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">No tasks assigned yet</p>
                        @endforelse
                    </div>
                </div>

                <!-- Task Statistics Card -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Task Overview</h3>
                        <span class="text-purple-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-purple-50 rounded-lg p-4">
                            <p class="text-sm text-purple-600">Pending</p>
                            <p class="text-2xl font-bold text-purple-700">{{ $tasks->where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4">
                            <p class="text-sm text-blue-600">In Progress</p>
                            <p class="text-2xl font-bold text-blue-700">{{ $tasks->where('status', 'in_progress')->count() }}</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4">
                            <p class="text-sm text-green-600">Completed</p>
                            <p class="text-2xl font-bold text-green-700">{{ $tasks->where('status', 'completed')->count() }}</p>
                        </div>
                        <div class="bg-yellow-50 rounded-lg p-4">
                            <p class="text-sm text-yellow-600">Total Tasks</p>
                            <p class="text-2xl font-bold text-yellow-700">{{ $tasks->count() }}</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="/tasks" class="flex flex-col items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-200">
                            <svg class="w-8 h-8 text-purple-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span class="text-sm font-medium text-purple-700">View Tasks</span>
                        </a>
                        <a href="/profile" class="flex flex-col items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                            <svg class="w-8 h-8 text-blue-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm font-medium text-blue-700">Profile</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>