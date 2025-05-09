<x-layout> 
    <div class="container mx-auto px-4 py-8"> 
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg"> 
            <!-- Chat Header --> 
            <div class="p-4 border-b flex items-center"> 
                <div class="flex items-center"> 
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center"> 
                        {{ substr($receiver->name, 0, 1) }} 
                    </div> 
                    <h2 class="ml-3 text-xl font-semibold">{{ $receiver->name }}</h2> 
                </div> 
            </div> 

            <!-- Messages Container --> 
            <div id="messages" class="h-96 overflow-y-auto p-4 space-y-4"> 
            </div> 

            <!-- Message Input --> 
            <div class="p-4 border-t"> 
                <form id="messageForm" class="flex space-x-2"> 
                    @csrf 
                    <input type="hidden" name="receiver_id" value="{{ $receiver->id }}"> 
                    <input type="hidden" name="receiver_type" value="admin"> 
                    <input type="text" name="message" class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Type your message..."> 
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Send</button> 
                </form> 
            </div> 
        </div> 
    </div> 


    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Pusher setup
        console.log('pusher');
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        const channel = pusher.subscribe('chat.{{ Auth::id() }}');
        channel.bind('MessageSent', function(data) {
            appendMessage(data.message);
        });

        // Function to load messages
        function loadMessages() {
            $.ajax({
                url: '{{ route('chat.getmessages', $receiver->id) }}',
                method: 'GET',
                success: function(messages) {
                    console.log('messages', messages);
                    const $messagesContainer = $('#messages');
                    $messagesContainer.empty();
                    messages.forEach(message => appendMessage(message));
                    $messagesContainer.scrollTop($messagesContainer[0].scrollHeight);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Failed to load messages. Please try again.');
                }
            });
        }

        // Function to append a message
        function appendMessage(message) {
            const isCurrentUser = message.sender_id === {{ Auth::id() }};
            
            const messageHtml = `
                <div class="flex ${isCurrentUser ? 'justify-end' : 'justify-start'}">
                    <div class="${isCurrentUser ? 'bg-blue-500 text-white' : 'bg-gray-200'} rounded-lg px-4 py-2 max-w-sm">
                        <p class="text-sm">${message.message}</p>
                        <div class="flex justify-between items-center mt-1">
                            <span class="text-xs ${isCurrentUser ? 'text-blue-100' : 'text-gray-500'}">
                                ${new Date(message.created_at).toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true })}
                            </span>
                            <span class="text-xs ${isCurrentUser ? 'text-blue-100' : 'text-gray-500'}">
                                ${message.sender_type === 'user' ? 'You' : 'Admin'}
                            </span>
                        </div>
                    </div>
                </div>
            `;
            
            $('#messages').append(messageHtml).scrollTop($('#messages')[0].scrollHeight);
        }

        // Handle form submission
        $('#messageForm').on('submit', function(e) {
            e.preventDefault();
            const $form = $(this);
            const $messageInput = $form.find('input[name="message"]');
            
            const data = {
                receiver_id: $form.find('input[name="receiver_id"]').val(),
                receiver_type: $form.find('input[name="receiver_type"]').val(),
                message: $messageInput.val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                url: '{{ route('chat.store') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify(data),
                success: function(message) {
                    // Clear the input field
                    $messageInput.val('');
                    
                    // Append the new message to the chat
                    appendMessage(message);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Failed to send message. Please try again.');
                }
            });
        });

        // Load messages on page load
        loadMessages();
        // Refresh messages every 10 seconds
        setInterval(loadMessages, 10000);
    </script>

</x-layout>