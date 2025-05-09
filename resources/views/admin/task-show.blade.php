<x-adminlayout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Task Management</h2>
            <a href="{{ route('admin.tasks') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Create Task
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($task as $singleTask)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <!-- Task Header -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $singleTask->title }}</h3>
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($singleTask->priority == 'high') bg-red-100 text-red-800
                                @elseif($singleTask->priority == 'medium') bg-yellow-100 text-yellow-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ ucfirst($singleTask->priority) }}
                            </span>
                        </div>
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $singleTask->description }}</p>
                    </div>

                    <!-- Task Details -->
                    <div class="p-6 space-y-4">
                        <!-- Status and Due Date -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500 mb-1">Status</p>
                                <p class="text-sm font-medium 
                                    @if($singleTask->status == 'completed') text-green-600
                                    @elseif($singleTask->status == 'in_progress') text-blue-600
                                    @else text-gray-600 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $singleTask->status)) }}
                                </p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-xs text-gray-500 mb-1">Due Date</p>
                                <p class="text-sm font-medium text-gray-700">
                                    {{ \Carbon\Carbon::parse($singleTask->due_date)->format('M d, Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Assigned Users -->
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-500 mb-1">Assigned to</p>
                            <div class="flex flex-wrap gap-2">
                                @forelse($singleTask->users as $user)
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-medium text-purple-700">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">{{ $user->name }}</span>
                                    </div>
                                @empty
                                    <span class="text-sm text-gray-500">Unassigned</span>
                                @endforelse
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2 pt-4 border-t">
                            <button onclick="toggleEditForm({{ $singleTask->id }})" 
                                class="flex-1 bg-blue-600 text-white py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </button>
                            <button onclick="toggleCommentForm({{ $singleTask->id }})" 
                                class="flex-1 bg-purple-600 text-white py-2 px-3 rounded-lg hover:bg-purple-700 transition-colors duration-200 text-sm flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                Comments
                            </button>
                            <form action="{{ route('admin.tasks.destroy', $singleTask->id) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 text-white py-2 px-3 rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Edit Form -->
                    <div id="edit-form-{{ $singleTask->id }}" class="hidden border-t">
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
                                    @foreach($task->users as $user)
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

                    <!-- Comment Section -->
                    <div id="comment-section-{{ $singleTask->id }}" class="hidden border-t">
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

    <!-- Modal Container -->
    <div id="taskModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="absolute top-0 right-0 pt-4 pr-4">
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="mt-3"></div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="text-center">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Delete Task</h3>
                <p class="text-gray-500 mb-4">Are you sure you want to delete this task? This action cannot be undone.</p>
                <div class="flex justify-center space-x-4">
                    <button id="confirmDelete" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                    <button onclick="closeDeleteModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script>
        // Modal Functions
        function openModal(content) {
            $('#modalContent').html(content);
            $('#taskModal').removeClass('hidden');
            $('body').addClass('overflow-hidden');
        }

        function closeModal() {
            $('#taskModal').addClass('hidden');
            $('body').removeClass('overflow-hidden');
        }

        function openDeleteModal(taskId) {
            $('#deleteModal').removeClass('hidden');
            $('#confirmDelete').data('taskId', taskId);
            $('body').addClass('overflow-hidden');
        }

        function closeDeleteModal() {
            $('#deleteModal').addClass('hidden');
            $('body').removeClass('overflow-hidden');
        }

        // Edit Form Functions
        function toggleEditForm(taskId) {
            const formContent = $(`#edit-form-${taskId}`).html();
            openModal(formContent);
            initializeEditValidation();
        }

        // Comment Section Functions
        function toggleCommentForm(taskId) {
            const commentContent = $(`#comment-section-${taskId}`).html();
            openModal(commentContent);
            initializeCommentValidation();
        }

        // Initialize Edit Form Validation
        function initializeEditValidation() {
            $("#editTaskForm").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                    description: {
                        required: true,
                        minlength: 10
                    },
                    user_id: {
                        required: true
                    },
                    due_date: {
                        required: true,
                        date: true
                    },
                    priority: {
                        required: true
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: "Please enter a task title",
                        minlength: "Title must be at least 3 characters",
                        maxlength: "Title cannot exceed 100 characters"
                    },
                    description: {
                        required: "Please enter a description",
                        minlength: "Description must be at least 10 characters"
                    },
                    user_id: "Please select a user",
                    due_date: {
                        required: "Please select a due date",
                        date: "Please enter a valid date"
                    },
                    priority: "Please select a priority level",
                    status: "Please select a status"
                },
                errorElement: 'span',
                errorClass: 'text-red-500 text-sm',
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass('border-red-500').removeClass('border-green-500');
                },
                unhighlight: function(element) {
                    $(element).removeClass('border-red-500').addClass('border-green-500');
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }

        // Initialize Comment Form Validation
        function initializeCommentValidation() {
            $("#commentForm").validate({
                rules: {
                    content: {
                        required: true,
                        minlength: 2,
                        maxlength: 500
                    }
                },
                messages: {
                    content: {
                        required: "Please enter a comment",
                        minlength: "Comment must be at least 2 characters",
                        maxlength: "Comment cannot exceed 500 characters"
                    }
                },
                errorElement: 'span',
                errorClass: 'text-red-500 text-sm',
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                highlight: function(element) {
                    $(element).addClass('border-red-500').removeClass('border-green-500');
                },
                unhighlight: function(element) {
                    $(element).removeClass('border-red-500').addClass('border-green-500');
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }

        // Delete Confirmation
        $('#confirmDelete').click(function() {
            const taskId = $(this).data('taskId');
            $(`#deleteForm-${taskId}`).submit();
        });

        // Close modal when clicking outside
        $(window).click(function(event) {
            if ($(event.target).is('#taskModal, #deleteModal')) {
                closeModal();
                closeDeleteModal();
            }
        });

        // Prevent modal close when clicking inside modal content
        $('.modal-content').click(function(event) {
            event.stopPropagation();
        });
    </script>

    <style>
        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        }
        input.error, textarea.error, select.error {
            border-color: #dc3545 !important;
        }
        input.valid, textarea.valid, select.valid {
            border-color: #28a745 !important;
        }
        .modal-open {
            overflow: hidden;
        }
    </style>
</x-adminlayout>
