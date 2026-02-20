<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Zoning Administration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            background-attachment: fixed;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .carousel-item img {
            height: 600px;
            object-fit: cover;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            padding: 15px;
        }
        .input-group-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .floating-label {
            transition: all 0.3s ease;
        }
        .brand-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-7xl mx-auto">
        <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">
            <div class="flex flex-col lg:flex-row min-h-[700px]">
                
                <!-- Left Side - Login Form -->
                <div class="w-full lg:w-1/2 p-8 lg:p-12 flex items-center">
                    <div class="w-full max-w-md mx-auto">
                        <!-- Logo and Title -->
                        <div class="text-center mb-8">
                            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl shadow-lg mb-4">
                                <i class="fas fa-shield-alt brand-icon text-4xl"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                            <p class="text-gray-600">Sign in to access the zoning administration system</p>
                        </div>
                        
                        <!-- Login Form -->
                        <form class="space-y-5" action="{{ route('login') }}" method="POST">
                            @csrf
                            <input type="hidden" name="remember" value="true">
                            
                            <!-- Error Messages -->
                            @if ($errors->any())
                                <div class="alert alert-danger border-0 shadow-sm" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <div>
                                            @foreach ($errors->all() as $error)
                                                <p class="mb-0 small">{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email" class="form-label fw-semibold text-gray-700">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    Email Address
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input id="email" name="email" type="email" autocomplete="email" required 
                                           class="form-control form-control-lg" 
                                           placeholder="Enter your email address" value="{{ old('email') }}">
                                </div>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group">
                                <label for="password" class="form-label fw-semibold text-gray-700">
                                    <i class="fas fa-lock me-2 text-primary"></i>
                                    Password
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                                           class="form-control form-control-lg" 
                                           placeholder="Enter your password">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                        <i id="password-toggle" class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-checkbox" name="remember">
                                    <label class="form-check-label" for="remember-checkbox">
                                        Remember me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-primary text-decoration-none">
                                        Forgot your password?
                                    </a>
                                @endif
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="pt-3">
                                <button type="submit" class="btn btn-gradient btn-lg w-100 fw-semibold">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Sign In
                                </button>
                            </div>
                            
                            <!-- Additional Links -->
                            <div class="text-center mt-4">
                                <p class="text-muted small mb-2">
                                    Don't have an account? 
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-semibold">
                                            Contact Administrator
                                        </a>
                                    @endif
                                </p>
                                <p class="text-muted small">
                                    <i class="fas fa-shield-alt me-1"></i>
                                    Secured with SSL encryption
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Right Side - Image Carousel -->
                <div class="w-full lg:w-1/2 bg-gradient-to-br from-purple-600 to-indigo-700 p-0 relative">
                    <div id="loginCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#loginCarousel" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#loginCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#loginCarousel" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#loginCarousel" data-bs-slide-to="3"></button>
                            <button type="button" data-bs-target="#loginCarousel" data-bs-slide-to="4"></button>
                        </div>
                        
                        <div class="carousel-inner h-100">
                            <div class="carousel-item active h-100">
                                <img src="{{ URL::asset('assets/bplo.jpg') }}" class="d-block w-100 h-100" alt="BPLO">
                                <div class="carousel-caption">
                                    <h4 class="fw-bold">Business Permit & Licensing</h4>
                                    <p>Streamlined permit processing system</p>
                                </div>
                            </div>
                            
                            <div class="carousel-item h-100">
                                <img src="{{ URL::asset('assets/bplo1.jpg') }}" class="d-block w-100 h-100" alt="BPLO 1">
                                <div class="carousel-caption">
                                    <h4 class="fw-bold">Efficient Service Delivery</h4>
                                    <p>Professional and timely processing</p>
                                </div>
                            </div>
                            
                            <div class="carousel-item h-100">
                                <img src="{{ URL::asset('assets/bplo2.jpg') }}" class="d-block w-100 h-100" alt="BPLO 2">
                                <div class="carousel-caption">
                                    <h4 class="fw-bold">One-Stop Shop</h4>
                                    <p>All your business needs in one place</p>
                                </div>
                            </div>
                            
                            <div class="carousel-item h-100">
                                <img src="{{ URL::asset('assets/bplo3.jpg') }}" class="d-block w-100 h-100" alt="BPLO 3">
                                <div class="carousel-caption">
                                    <h4 class="fw-bold">Professional Staff</h4>
                                    <p>Dedicated to serve the community</p>
                                </div>
                            </div>
                            
                            <div class="carousel-item h-100">
                                <img src="{{ URL::asset('assets/LGU.jpg') }}" class="d-block w-100 h-100" alt="LGU">
                                <div class="carousel-caption">
                                    <h4 class="fw-bold">Municipality of Sogod</h4>
                                    <p>Serving Southern Leyte with excellence</p>
                                </div>
                            </div>
                        </div>
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#loginCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#loginCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                    <!-- Overlay Branding -->
                    <div class="absolute top-0 left-0 right-0 p-6 bg-gradient-to-b from-black/50 to-transparent">
                        <div class="text-white">
                            <h3 class="h2 fw-bold mb-1">eLGU Zoning</h3>
                            <p class="mb-0 opacity-75">Municipality of Sogod, Southern Leyte</p>
                        </div>
                    </div>
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
