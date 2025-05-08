<x-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg">
            <div class="p-4 border-b">
                <h2 class="text-2xl font-semibold">Messages</h2>
            </div>
            
            <div class="divide-y">
                @foreach($users as $user)
                    <a href="{{ route('chat.show', $user->id) }}" class="flex items-center p-4 hover:bg-gray-50 transition duration-150">
                        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium">{{ $user->name }}</h3>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

 

           

         
        </div>
    </div>
</x-layout>
