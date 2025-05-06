<x-adminlayout>
    <a href="{{ route('admin.tasks') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-200">Create Task</a>

    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">📝 Task Details</h2>

        <div class="space-y-5">
            @foreach($task as $singleTask)
                <div class="border-b pb-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Task Title</label>
                        <p class="text-sm text-gray-500">{{ $singleTask->title }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <p class="text-sm text-gray-500">{{ $singleTask->description }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Assign to Users</label>
                        <p class="text-sm text-gray-500">
                            {{-- Assigned users --}}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Due Date</label>
                        <p class="text-sm text-gray-500">{{ $singleTask->due_date }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Priority</label>
                        <p class="text-sm text-gray-500">{{ $singleTask->priority }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                        <p class="text-sm text-gray-500">{{ $singleTask->status }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4 mt-6">
                        <button onclick="toggleEditForm({{ $singleTask->id }})" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200">Edit</button>

                        <button onclick="toggleCommentForm({{ $singleTask->id }})" class="bg-purple-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-comment"></i> Comments
                        </button>

                        <form action="{{ route('admin.tasks.destroy', $singleTask->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors duration-200">Delete</button>
                        </form>
                    </div>

                    <!-- Edit Form -->
                    <div id="edit-form-{{ $singleTask->id }}" class="hidden mt-6">
                        <form action="{{ route('admin.tasks.update', $singleTask->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Task Title</label>
                                <input type="text" name="title" value="{{ $singleTask->title }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                                <textarea name="description" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ $singleTask->description }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Assign to Users</label>
                                <select name="user_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $singleTask->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Due Date</label>
                                <input type="date" name="due_date" value="{{ $singleTask->due_date }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Priority</label>
                                <select name="priority" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                    <option value="low" {{ $singleTask->priority == 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ $singleTask->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ $singleTask->priority == 'high' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                                <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                    <option value="pending" {{ $singleTask->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ $singleTask->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ $singleTask->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-200">Save</button>
                        </form>
                    </div>

                    <!-- Comment Section for This Task -->
                    <div id="comment-section-{{ $singleTask->id }}" class="hidden mt-6 bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-lg font-medium mb-3">Comments for "{{ $singleTask->title }}"</h4>

                        <!-- Show comments with user information -->
                        <div class="space-y-3 mb-4">
                            @forelse($singleTask->comments->sortByDesc('created_at') as $comment)
                                <div class="bg-white p-3 rounded-lg shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center space-x-2">
                                            @if($comment->user_type == 'admin')
                                                <span class="font-medium text-purple-600">Admin</span>
                                            @else
                                                <span class="font-medium text-blue-600">
                                                    {{ App\Models\User::find($comment->user_id)->name ?? 'User' }}
                                                </span>
                                            @endif
                                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">{{ ucfirst($comment->user_type) }}</span>
                                        </div>
                                        <span class="text-sm text-gray-500">{{ $comment->created_at->format('M d, Y H:i') }}</span>
                                    </div>
                                    <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                                </div>
                            @empty
                                <p class="text-gray-500 italic">No comments yet</p>
                            @endforelse
                        </div>

                        <!-- Add comment form -->
                        <form action="{{ route('admin.tasks.comments.store', $singleTask->id) }}" method="POST" class="mt-4">
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
            @endforeach
        </div>
    </div>

    <script>
        function toggleEditForm(taskId) {
            document.getElementById(`edit-form-${taskId}`).classList.toggle('hidden');
        }

        function toggleCommentForm(taskId) {
            document.getElementById(`comment-section-${taskId}`).classList.toggle('hidden');
        }
    </script>
</x-adminlayout>
