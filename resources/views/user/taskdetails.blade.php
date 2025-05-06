<x-layout>
    
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">📋 My Tasks</h2>
        <div class="space-y-5">
            @forelse($tasks as $task)
                <div class="border-b pb-4 mb-4">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Task Title</label>
                        <p class="text-sm text-gray-500">{{ $task->title }}</p>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <p class="text-sm text-gray-500">{{ $task->description }}</p>
                    </div>

                    <div>
                        <label for="due_date" class="block text-sm font-semibold text-gray-700 mb-1">Due Date</label>
                        <p class="text-sm text-gray-500">{{ $task->due_date }}</p>
                    </div>

                    <div>
                        <label for="priority" class="block text-sm font-semibold text-gray-700 mb-1">Priority</label>
                        <p class="text-sm text-gray-500">{{ $task->priority }}</p>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                        <p class="text-sm text-gray-500">{{ $task->status }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500">No tasks found.</p>
            @endforelse
        </div>
    </div>
</x-layout>