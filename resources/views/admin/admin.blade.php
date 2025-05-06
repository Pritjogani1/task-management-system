<x-adminlayout>
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Summary Cards -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-tasks text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Tasks</p>
                    <p class="text-xl font-bold">{{ $totalTasks }}</p>
                </div>
            </div>
        </div>
    

    
    
    
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-purple-100 rounded-full">
                    <i class="fas fa-user text-purple-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Users</p>
                    <p class="text-xl font-bold">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Tasks -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Recent Tasks</h3>
        @if($recentTasks->count())
            <ul class="divide-y divide-gray-200">
                @foreach($recentTasks as $task)
                    <li class="py-4 flex justify-between items-center">
                        <div>
                            <p class="font-medium">{{ $task->title }}</p>
                          
                        </div>
                        <span class="text-sm px-3 py-1 rounded-full {{ $task->status == 'completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 text-center py-4">No recent tasks found</p>
        @endif
    </div>
</x-adminlayout>