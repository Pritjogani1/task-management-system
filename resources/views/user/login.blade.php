<x-layout>
    <body class="bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="flex min-h-screen">
            <!-- Left Side - Image with Overlay -->
            <div class="hidden md:block md:w-1/2 bg-cover bg-center relative" 
                 style="background-image: url('{{Vite::asset('resources/images/loginpg.jpg')}}')">
                <div class="absolute inset-0 bg-black bg-opacity-40 backdrop-blur-sm"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-white text-center p-8">
                        <h1 class="text-4xl font-bold mb-4">Welcome Back!</h1>
                        <p class="text-xl opacity-90">Manage your tasks efficiently with our platform</p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full md:w-1/2 flex items-center justify-center p-6 bg-white">
                <div class="w-full max-w-md space-y-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-900">Sign in to your account</h2>
                        <p class="mt-2 text-sm text-gray-600">
                            Or don't have an account yet? 
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                                Sign up now
                            </a>
                        </p>
                    </div>

                    <form action="/login" method="post" id="loginform" class="mt-8 space-y-6">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                                <div class="mt-1 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                    </div>
                                    <input type="email" 
                                           name="email"
                                           id="email"
                                           class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                           placeholder="Enter your email">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Password</label>
                                <div class="mt-1 relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           name="password"
                                           id="password"
                                           class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                           placeholder="Enter your password"
                                           autocomplete="off">
                                </div>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" 
                                       id="remember_me" 
                                       name="remember_me"
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors duration-200">
                                Forgot password?
                            </a>
                        </div>

                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            Sign in
                        </button>
                    </form>

                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-all duration-200">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                                </svg>
                            </button>
                            <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-all duration-200">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-layout>