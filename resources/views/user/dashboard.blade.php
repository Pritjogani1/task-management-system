<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    < class="flex items-center">
                        <div class="flex-shrink-0">             
                            <img class="h-12 w-12 rounded-full" src="                            <img class="h-12 w-12 rounded-full" src="URL_ADDRESS.pravatar.cc/150?u={{ auth()->user()->email }}" alt="{{ auth()->user()->name }}">  
                        </div>
                        <div class="ml-4">          

                                    <div class="text-sm font-medium text-gray-900">
                                        {{ auth()->user()->name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>  

                            


                    </div>
                </div>
            </div>      
        </div>
    </div>
</x-layout>