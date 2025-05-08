<x-adminlayout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg">
            <!-- Chat Header -->
            <div class="p-4 border-b flex items-center">
                <a href="{{ route('admin.chat.index') }}" class="mr-4 text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div class="ml-3">
                        <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                        <span class="text-xs text-gray-500">Intern</span>
                    </div>
                </div>
            </div>

            <!-- Messages Container -->
            <div id="messages" class="h-96 overflow-y-auto p-4 space-y-4">
                @foreach($messages as $message)
                    <div class="flex {{ $message->sender_id === auth()->guard('admin')->id() && $message->sender_type === 'App\\Models\\Admin' ? 'justify-end' : 'justify-start' }}">
                        <div class="{{ $message->sender_id === auth()->guard('admin')->id() && $message->sender_type === 'App\\Models\\Admin' ? 'bg-blue-500 text-white' : 'bg-gray-200' }} rounded-lg px-4 py-2 max-w-sm">
                            <p class="text-sm">{{ $message->message }}</p>
                            <div class="flex justify-between items-center mt-1">
                                <span class="text-xs {{ $message->sender_id === auth()->guard('admin')->id() && $message->sender_type === 'App\\Models\\Admin' ? 'text-blue-100' : 'text-gray-500' }}">
                                    {{ $message->created_at->format('h:i A') }}
                                </span>
                                <span class="text-xs {{ $message->sender_id === auth()->guard('admin')->id() && $message->sender_type === 'App\\Models\\Admin' ? 'text-blue-100' : 'text-gray-500' }}">
                                    {{ $message->sender_type === 'App\\Models\\User' ? 'Intern' : 'Admin' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Message Input -->
            <div class="p-4 border-t">
                <form id="messageForm" method="POST" action="{{ route('admin.chat.store') }}" class="flex space-x-2">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="text" 
                           name="message" 
                           class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                           placeholder="Type your message...">
                    <button type="submit" 
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-adminlayout>