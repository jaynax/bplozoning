<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Zoning Administration System') | Municipality of Sogod</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        .sidebar-gradient {
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%);
        }
        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #667eea;
        }
        .sidebar-item.active {
            background: rgba(102, 126, 234, 0.2);
            border-left: 4px solid #667eea;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .stat-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
            backdrop-filter: blur(10px);
        }
        .brand-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
        .mobile-overlay {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .mobile-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>
<body>
    @auth
        <!-- Mobile Menu Overlay -->
        <div id="mobile-overlay" class="mobile-overlay fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden" onclick="toggleMobileMenu()"></div>
        
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar fixed left-0 top-0 h-full w-64 z-50 sidebar-gradient text-white lg:translate-x-0 mobile-menu">
            <div class="p-6">
                <!-- Brand -->
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-shield-alt brand-icon text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">eLGU</h2>
                        <p class="text-xs text-gray-300">Zoning System</p>
                    </div>
                </div>
                
                <!-- User Profile -->
                <div class="glass-effect rounded-lg p-4 mb-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-sm">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-300">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="space-y-2">
                    <a href="{{ route('user.dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                        <i class="fas fa-home w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('certificate.create') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                        <i class="fas fa-plus-circle w-5"></i>
                        <span>New Application</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                        <i class="fas fa-list w-5"></i>
                        <span>My Applications</span>
                    </a>
                    <a href="{{ route('certificate.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all @yield('certificate-nav-active')">
                        <i class="fas fa-folder-open w-5"></i>
                        <span>My Certificates</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                        <i class="fas fa-map-marked-alt w-5"></i>
                        <span>Zoning Map</span>
                    </a>
                    <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                        <i class="fas fa-file-download w-5"></i>
                        <span>Documents</span>
                    </a>
                </nav>
                
                <!-- Bottom Actions -->
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="space-y-2">
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all">
                            <i class="fas fa-cog w-5"></i>
                            <span>Settings</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full flex items-center space-x-3 p-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all text-left">
                                <i class="fas fa-sign-out-alt w-5"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="lg:ml-64 min-h-screen">
            <!-- Top Header -->
            <header class="glass-effect sticky top-0 z-30 border-b border-gray-200">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <!-- Mobile Menu Toggle -->
                            <button onclick="toggleMobileMenu()" class="lg:hidden text-gray-600 hover:text-gray-900">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            <!-- Page Title -->
                            <h1 class="text-xl font-semibold text-gray-900">@yield('header-title', 'Dashboard')</h1>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <button class="relative p-2 text-gray-600 hover:text-gray-900 transition-colors">
                                <i class="fas fa-bell text-lg"></i>
                                <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                            </button>
                            
                            <!-- User Menu -->
                            <div class="relative">
                                <button onclick="toggleUserMenu()" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                    <i class="fas fa-chevron-down text-gray-600 text-sm"></i>
                                </button>
                                
                                <!-- User Dropdown -->
                                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user-circle mr-2"></i> Profile
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-cog mr-2"></i> Settings
                                    </a>
                                    <hr class="my-2">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    @else
        <!-- Guest Layout -->
        <div class="min-h-screen">
            @yield('content')
        </div>
    @endauth

    <script>
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');
            
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }
        
        function toggleUserMenu() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        }
        
        // Close user menu when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const userMenuButton = event.target.closest('[onclick="toggleUserMenu()"]');
            
            if (!userMenuButton && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
