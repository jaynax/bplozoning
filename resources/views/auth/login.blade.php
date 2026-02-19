<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Zoning Administration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl mx-auto">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <!-- Left Side - Professional Image/Branding -->
            <div class="hidden lg:block lg:w-1/2 bg-gradient-to-br from-blue-600 to-indigo-700 p-12 relative">
                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                <div class="relative z-10 h-full flex flex-col justify-between">
                    <div>
                        <div class="flex items-center mb-8">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shadow-lg">
                                <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h1 class="text-white text-2xl font-bold">Municipality of Sogod</h1>
                                <p class="text-blue-100 text-sm">Zoning Administration System</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center text-white">
                                <i class="fas fa-check-circle text-green-300 mr-3"></i>
                                <span class="text-sm">Secure Login System</span>
                            </div>
                            <div class="flex items-center text-white">
                                <i class="fas fa-check-circle text-green-300 mr-3"></i>
                                <span class="text-sm">Professional Certificate Management</span>
                            </div>
                            <div class="flex items-center text-white">
                                <i class="fas fa-check-circle text-green-300 mr-3"></i>
                                <span class="text-sm">Real-time Processing</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <p class="text-blue-100 text-xs">© 2024 Municipality of Sogod</p>
                        <p class="text-blue-200 text-xs">Southern Leyte, Philippines</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-12">
                <div class="max-w-md mx-auto">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-xl shadow-lg mb-4 lg:hidden">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                        <p class="text-gray-600">Sign in to access the zoning administration system</p>
                    </div>
                    
                    <!-- Login Form -->
                    <form class="space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <input type="hidden" name="remember" value="true">
                        
                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-6">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <p class="text-sm">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-envelope mr-2 text-gray-400"></i>
                                Email Address
                            </label>
                            <div class="relative">
                                <input id="email" name="email" type="email" autocomplete="email" required 
                                       class="appearance-none rounded-lg relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all" 
                                       placeholder="Enter your email address" value="{{ old('email') }}">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-lock mr-2 text-gray-400"></i>
                                Password
                            </label>
                            <div class="relative">
                                <input id="password" name="password" type="password" autocomplete="current-password" required 
                                       class="appearance-none rounded-lg relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm transition-all" 
                                       placeholder="Enter your password">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <button type="button" onclick="togglePassword()" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                        <i id="password-toggle" class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-checkbox" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="remember-checkbox" class="ml-2 block text-sm text-gray-700">
                                    Remember me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                        Forgot your password?
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-[1.02]">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <i class="fas fa-sign-in-alt"></i>
                                </span>
                                Sign In
                            </button>
                        </div>
                        
                        <!-- Additional Links -->
                        <div class="text-center mt-6 space-y-2">
                            <p class="text-sm text-gray-600">
                                Don't have an account? 
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                        Contact Administrator
                                    </a>
                                @endif
                            </p>
                            <p class="text-xs text-gray-500">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Secured with SSL encryption
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        // Add loading state
        document.querySelector('form').addEventListener('submit', function() {
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Signing In...';
        });
    </script>
</body>
</html>
