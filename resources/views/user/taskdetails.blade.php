<x-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">📋 My Tasks</h2>
            <div class="flex space-x-2">
                <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">
                    Total Tasks: {{ $tasks->count() }}
                </span>
            </div>
        </div>
        
        <!-- Task Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($tasks as $task)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <!-- Task Header -->
                    <div class="p-5 border-b border-gray-100">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-lg font-semibold text-gray-800 line-clamp-1">{{ $task->title }}</h3>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($task->priority == 'high')
                                    bg-red-100 text-red-800
                                @elseif($task->priority == 'medium')
                                    bg-yellow-100 text-yellow-800
                                @else
                                    bg-green-100 text-green-800
                                @endif">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 line-clamp-2">{{ $task->description }}</p>
                    </div>

                    <!-- Task Details -->
                    <div class="p-5 space-y-4">
                        <div class="flex justify-between items-center text-sm bg-gray-50 p-3 rounded-lg">
                            <span class="text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Due Date
                            </span>
                            <span class="font-medium">{{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 text-sm">Status:</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($task->status == 'completed')
                                    bg-blue-100 text-blue-800
                                @elseif($task->status == 'in_progress')
                                    bg-purple-100 text-purple-800
                                @else
                                    bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                        </div>

                        <!-- Comments Section -->
                        <div class="border-t pt-4 mt-4">
                            <h4 class="font-medium text-gray-700 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                Comments ({{ $task->comments->count() }})
                            </h4>

                            <div class="space-y-2 max-h-32 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                                @forelse($task->comments as $comment)
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="flex justify-between items-center text-xs mb-1">
                                            <span class="font-medium {{ $comment->user_type == 'admin' ? 'text-purple-600' : 'text-blue-600' }}">
                                                {{ $comment->user_type == 'admin' ? 'Admin' : 'User' }}
                                            </span>
                                            <span class="text-gray-500">{{ $comment->created_at->format('M d, H:i') }}</span>
                                        </div>
                                        <p class="text-sm text-gray-700">{{ $comment->content }}</p>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500 italic text-center">No comments yet.</p>
                                @endforelse
                            </div>

                            <!-- Add Comment Form -->
                            <form action="{{ route('user.tasks.comments.store', $task->id) }}" method="POST" class="mt-3">
                                @csrf
                                <div class="flex space-x-2">
                                    <input type="text" 
                                        name="content" 
                                        class="flex-1 text-sm border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                        placeholder="Write a comment..." 
                                        required>
                                    <button type="submit" 
                                        class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-purple-700 transition-colors duration-200 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                        </svg>
                                        Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white rounded-xl shadow-md p-8 text-center">
                    <div class="text-gray-500 max-w-sm mx-auto">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <p class="text-xl font-medium mb-2">No tasks found</p>
                        <p class="text-sm text-gray-400">You don't have any tasks assigned yet. New tasks will appear here when they're assigned to you.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
