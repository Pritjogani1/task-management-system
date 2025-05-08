x-adminlayout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg">
            <!-- Chat Header -->
            <div class="p-4 border-b flex items-center">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <h2 class="ml-3 text-xl font-semibold">{{ $user->name }}</h2>
                </div>
            </div>

            <!-- Messages Container -->
            <div id="messages" class="h-96 overflow-y-auto p-4 space-y-4">
                @foreach($messages as $message)
                    <div class="flex {{ $message->sender_id === auth()->guard('admin')->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="{{ $message->sender_id === auth()->guard('admin')->id() ? 'bg-blue-500 text-white' : 'bg-gray-200' }} rounded-lg px-4 py-2 max-w-sm">
                            <p class="text-sm">{{ $message->message }}</p>
                            <span class="text-xs {{ $message->sender_id === auth()->guard('admin')->id() ? 'text-blue-100' : 'text-gray-500' }}">
                                {{ $message->created_at->format('h:i A') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Message Input -->
            <div class="p-4 border-t">
                <form id="messageForm" class="flex space-x-2">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                    <input type="text" name="message" class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Type your message...">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Send</button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        const channel = pusher.subscribe('chat.{{ auth()->guard('admin')->id() }}');
        channel.bind('MessageSent', function(data) {
            appendMessage(data.message);
        });

        function appendMessage(message) {
            const messagesContainer = document.getElementById('messages');
            const isCurrentUser = message.sender_id === {{ auth()->guard('admin')->id() }};
            
            const messageHtml = `
                <div class="flex ${isCurrentUser ? 'justify-end' : 'justify-start'}">
                    <div class="${isCurrentUser ? 'bg-blue-500 text-white' : 'bg-gray-200'} rounded-lg px-4 py-2 max-w-sm">
                        <p class="text-sm">${message.message}</p>
                        <span class="text-xs ${isCurrentUser ? 'text-blue-100' : 'text-gray-500'}">
                            ${new Date(message.created_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })}
                        </span>
                    </div>
                </div>
            `;
            
            messagesContainer.insertAdjacentHTML('beforeend', messageHtml);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }

        document.getElementById('messageForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            try {
                const response = await fetch('{{ route('admin.chat.send') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(Object.fromEntries(formData))
                });
                
                const data = await response.json();
                appendMessage(data);
                this.reset();
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
    @endpush
</x-adminlayout>