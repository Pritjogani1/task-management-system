import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Initialize Pusher
window.Pusher = Pusher;

// Initialize Laravel Echo
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Listen for new messages
window.Echo.private(`chat.${userId}`)
    .listen('NewMessage', (e) => {
        // Add the new message to the chat
        const messageContainer = document.querySelector('.messages-container');
        const messageHtml = `
            <div class="message ${e.sender_id === userId ? 'sent' : 'received'}">
                <div class="message-content">
                    <p>${e.message}</p>
                    <small>${new Date(e.created_at).toLocaleTimeString()}</small>
                </div>
            </div>
        `;
        messageContainer.insertAdjacentHTML('beforeend', messageHtml);
        messageContainer.scrollTop = messageContainer.scrollHeight;
    });

// Handle sending messages
const messageForm = document.querySelector('#message-form');
const messageInput = document.querySelector('#message-input');

messageForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const message = messageInput.value.trim();
    if (!message) return;

    try {
        const response = await fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                receiver_id: receiverId,
                message: message
            })
        });

        const data = await response.json();
        
        if (data.status === 'success') {
            messageInput.value = '';
        }
    } catch (error) {
        console.error('Error sending message:', error);
    }
}); 