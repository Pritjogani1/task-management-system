<x-layout>
    <body class="bg-gradient-to-br from-blue-50 to-purple-50">
        <div class="flex min-h-screen">
            <!-- Left Side - Registration Form -->
            <div class="w-full md:w-1/2 flex items-center justify-center p-6">
                <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
                        <p class="text-gray-600 mt-2">Join us to manage your tasks efficiently</p>
                    </div>
                    
                    <form method="post" action="{{ route('register') }}" id="registerForm" class="space-y-6">
                        @csrf
                        <!-- Full Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" 
                                       class="pl-10 w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                       placeholder="Enter your name" 
                                       name="name" 
                                       id="name" />
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email" 
                                       class="pl-10 w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                       placeholder="Enter your email" 
                                       name="email" />
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" 
                                       class="pl-10 w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                       placeholder="Enter your password" 
                                       name="password" 
                                       id="password" />
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" 
                                       class="pl-10 w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                       placeholder="Confirm your password" 
                                       name="password_confirmation" 
                                       id="password_confirmation" />
                            </div>
                            @error('password_confirmation')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="text" 
                                       class="pl-10 w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                       placeholder="Enter your phone number" 
                                       name="phone" 
                                       id="phone" />
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Register Button -->
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-200 hover:scale-[1.02]">
                            Create Account
                        </button>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <!-- Social Login Buttons -->
                        <div class="grid grid-cols-2 gap-4">
                            <button type="button" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm bg-white hover:bg-gray-50 transition-all duration-200">
                                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                                </svg>
                                <span class="ml-2">Google</span>
                            </button>
                            <button type="button" class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm bg-white hover:bg-gray-50 transition-all duration-200">
                                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
                                </svg>
                                <span class="ml-2">Facebook</span>
                            </button>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <p class="text-sm text-gray-600 text-center mt-8">
                        Already have an account? 
                        <a href="/login" class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>

            <!-- Right Side - Image -->
            <div class="hidden md:block md:w-1/2 bg-cover bg-center relative">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-600 opacity-90"></div>
                <div class="absolute inset-0 flex items-center justify-center text-white p-12">
                    <div class="max-w-md text-center">
                        <h1 class="text-4xl font-bold mb-6 text-black">Welcome to Task Management</h1>
                        <p class="text-xl opacity-90 text-black">Join us and start managing your tasks efficiently with our powerful platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-layout>