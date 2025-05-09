<x-adminlayout>

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg">
        <!-- Header Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Create New Task</h2>
            <p class="text-gray-600 mt-2">Fill in the details below to create a new task</p>
        </div>

        <!-- Add Select2 CSS and JS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <style>
            .select2-container--default .select2-selection--multiple {
                border-color: #e5e7eb;
                border-radius: 0.5rem;
                min-height: 42px;
                padding: 4px 8px;
            }
            .select2-container--default.select2-container--focus .select2-selection--multiple {
                border-color: #3b82f6;
                box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            }
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                background-color: #f3f4f6;
                border: 1px solid #e5e7eb;
                border-radius: 0.375rem;
                padding: 4px 10px;
                margin: 2px;
            }
            .form-input {
                @apply w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors;
            }
            .form-label {
                @apply block text-sm font-medium text-gray-700 mb-1;
            }
            .form-group {
                @apply mb-6;
            }
        </style>

        <form action="{{ route('admin.tasks.store') }}" method="POST" id="taskForm" class="space-y-6">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" name="title" id="title" class="form-input" 
                    placeholder="Enter task title">
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" class="form-input"
                    placeholder="Enter task description"></textarea>
            </div>

            <div class="form-group">
                <label for="user_ids" class="form-label">Assign to Users</label>
                <select name="user_ids[]" id="user_ids" multiple class="select2-multiple form-input">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" name="due_date" id="due_date" class="form-input">
                </div>

                <div class="form-group">
                    <label for="priority" class="form-label">Priority Level</label>
                    <select name="priority" id="priority" class="form-input">
                        <option value="low" class="text-green-600">Low</option>
                        <option value="medium" class="text-yellow-600" selected>Medium</option>
                        <option value="high" class="text-red-600">High</option>
                    </select>
                </div>

                <div class="form-group md:col-span-2">
                    <label for="status" class="form-label">Task Status</label>
                    <select name="status" id="status" class="form-input">
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    <span>Create Task</span>
                </button>
            </div>
        </form>

        <script>
            $(document).ready(function() {
                $('.select2-multiple').select2({
                    placeholder: "Select users to assign",
                    allowClear: true,
                    theme: "classic",
                    width: '100%'
                });

                $('#taskForm').submit(function(e) {
                    var selectedUsers = $('#user_ids').val();
                    if (!selectedUsers || selectedUsers.length === 0) {
                        e.preventDefault();
                        alert('Please select at least one user for the task');
                        return false;
                    }
                });
            });
        </script>
    </div>
</div>
</x-adminlayout>