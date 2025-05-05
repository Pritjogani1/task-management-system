<x-adminlayout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">👤 User Details</h2>
        
        <!-- Create User Button -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.users.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-200">Create User</a>
        </div>

        <div class="space-y-5">
            @foreach($users as $user)
                <div class="border-b pb-4 mb-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Name</label>
                        <p class="text-sm text-gray-500">{{ $user->name }}</p>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-semibold text-gray-700 mb-1">Role</label>
                        <p class="text-sm text-gray-500">{{ $user->role }}</p>
                    </div>

                    <div>
                        <label for="created_at" class="block text-sm font-semibold text-gray-700 mb-1">Created At</label>
                        <p class="text-sm text-gray-500">{{ $user->created_at->format('d M Y') }}</p>
                    </div>

                    <div>
                        <label for="updated_at" class="block text-sm font-semibold text-gray-700 mb-1">Updated At</label>
                        <p class="text-sm text-gray-500">{{ $user->updated_at->format('d M Y') }}</p>
                    </div>

                    <!-- Edit and Delete Buttons -->
                    <div class="flex space-x-4 mt-6">
                        <button onclick="toggleEditForm({{ $user->id }})" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200">Edit</button>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-colors duration-200">Delete</button>
                        </form>
                    </div>

                    <!-- Edit Form -->
                    <div id="edit-form-{{ $user->id }}" class="hidden mt-6">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>   
                                <input type="password" name="password" value="{{ $user->password }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>

                                </div>
                           

                            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-200">Save</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>  

    <script>
        function toggleEditForm(userId) {
            const form = document.getElementById(`edit-form-${userId}`);
            form.classList.toggle('hidden');
        }
    </script>
</x-adminlayout>