<x-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">📋 My Tasks</h2>
        <div class="space-y-5">
            @forelse($tasks as $task)
                <div class="border-b pb-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Task Title</label>
                        <p class="text-sm text-gray-500">{{ $task->title }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <p class="text-sm text-gray-500">{{ $task->description }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Due Date</label>
                        <p class="text-sm text-gray-500">{{ $task->due_date }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Priority</label>
                        <p class="text-sm text-gray-500">{{ $task->priority }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                        <p class="text-sm text-gray-500">{{ $task->status }}</p>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="mt-4 pt-4 border-t">
                        <h4 class="font-semibold text-gray-700 mb-2">Comments</h4>
                        <div class="space-y-3">
                            @forelse($task->comments as $comment)
                                <div class="p-3 bg-gray-50 rounded-lg">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium">{{ $comment->user_type == 'admin' ? 'Admin' : 'User' }}</p>
                                            <p class="text-xs text-gray-500">{{ $comment->created_at->format('M d, Y H:i') }}</p>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-700">{{ $comment->content }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500 italic">No comments yet.</p>
                            @endforelse
                        </div>

                        <!-- Add Comment Form -->
                        <form action="{{ route('user.tasks.comments.store', $task->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex flex-col space-y-2">
                                <textarea 
                                    name="content" 
                                    rows="2" 
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="Write your comment here..." required></textarea>
                                <button type="submit" 
                                    class="self-end bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                                    Add Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500">No tasks found.</p>
            @endforelse
        </div>
    </div>
</x-layout>
