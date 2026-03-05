<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Zoning Administration System</title>
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
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="font-sans">
    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed left-0 top-0 h-full w-64 z-50 sidebar-gradient text-white lg:translate-x-0">
        <div class="p-6">
            <!-- Logo Section -->
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
                        <p class="font-semibold text-black text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-black">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="space-y-2">
                <a href="#" class="sidebar-item active flex items-center space-x-3 p-3 rounded-lg transition-all">
                    <i class="fas fa-home w-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                    <i class="fas fa-plus-circle w-5"></i>
                    <span>New Application</span>
                </a>
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                    <i class="fas fa-list w-5"></i>
                    <span>My Applications</span>
                </a>
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                    <i class="fas fa-map-marked-alt w-5"></i>
                    <span>Zoning Map</span>
                </a>
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                    <i class="fas fa-file-download w-5"></i>
                    <span>Documents</span>
                </a>
                <a href="{{ route('certificate.create') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                    <i class="fas fa-certificate w-5"></i>
                    <span>Certificate</span>
                </a>
                <a href="{{ route('certificate.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all">
                    <i class="fas fa-folder-open w-5"></i>
                    <span>My Certificates</span>
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
                        <button type="submit" class="w-full flex items-center space-x-3 p-3 rounded-lg hover:bg-red-500 hover:bg-opacity-20 transition-all text-left">
                            <i class="fas fa-sign-out-alt w-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    
    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Navigation -->
        <header class="glass-effect shadow-sm sticky top-0 z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <h1 class="ml-4 text-xl font-semibold text-gray-900">User Dashboard</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                        </button>
                        <!-- User Menu -->
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-xs"></i>
                            </div>
                            <span class="hidden sm:block text-sm text-gray-700">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main Dashboard Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Welcome Section -->
            <div class="glass-effect rounded-2xl p-6 mb-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
                        <p class="text-gray-600">Manage your zoning and land use permit applications</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-lg hover:shadow-lg transition-all">
                            <i class="fas fa-plus mr-2"></i>New Application
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Total Applications</p>
                            <p class="text-3xl font-bold text-gray-900">12</p>
                            <p class="text-xs text-green-600 mt-2">
                                <i class="fas fa-arrow-up mr-1"></i>8% from last month
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">In Progress</p>
                            <p class="text-3xl font-bold text-gray-900">5</p>
                            <p class="text-xs text-yellow-600 mt-2">
                                <i class="fas fa-clock mr-1"></i>Processing
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-spinner text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Completed</p>
                            <p class="text-3xl font-bold text-gray-900">7</p>
                            <p class="text-xs text-green-600 mt-2">
                                <i class="fas fa-check mr-1"></i>Approved
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card rounded-xl p-6 card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Certificates</p>
                            <p class="text-3xl font-bold text-gray-900">3</p>
                            <p class="text-xs text-purple-600 mt-2">
                                <i class="fas fa-award mr-1"></i>Generated
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-certificate text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions & Recent Applications -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Quick Actions -->
                <div class="lg:col-span-1">
                    <div class="glass-effect rounded-xl p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                        <div class="space-y-3">
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-all">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-plus text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">New Application</p>
                                    <p class="text-xs text-gray-500">Submit zoning permit</p>
                                </div>
                            </a>
                            
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-all">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-list text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">View Applications</p>
                                    <p class="text-xs text-gray-500">Track status</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('certificate.create') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-all">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-certificate text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Generate Certificate</p>
                                    <p class="text-xs text-gray-500">Land use cert</p>
                                </div>
                            </a>
                            
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-all">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-map text-orange-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Zoning Map</p>
                                    <p class="text-xs text-gray-500">Explore zones</p>
                                </div>
                            </a>
                            
                            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-all">
                                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-download text-red-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Documents</p>
                                    <p class="text-xs text-gray-500">Forms & guides</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Applications -->
                <div class="lg:col-span-2">
                    <div class="glass-effect rounded-xl p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold text-gray-900">Recent Applications</h2>
                            <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</button>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Application Item 1 -->
                            <div class="border rounded-lg p-4 hover:shadow-md transition-all">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <h3 class="font-medium text-gray-900">Locational Clearance</h3>
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">In Progress</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">Commercial Building Permit</p>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-calendar mr-1"></i>
                                            Applied: Jan 15, 2024
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-clock mr-1"></i>
                                            3 days ago
                                        </div>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Application Item 2 -->
                            <div class="border rounded-lg p-4 hover:shadow-md transition-all">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <h3 class="font-medium text-gray-900">Zoning Certificate</h3>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Completed</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">Residential Property Verification</p>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-calendar mr-1"></i>
                                            Applied: Jan 10, 2024
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-check mr-1"></i>
                                            Approved: Jan 12, 2024
                                        </div>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Application Item 3 -->
                            <div class="border rounded-lg p-4 hover:shadow-md transition-all">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <h3 class="font-medium text-gray-900">Site Inspection</h3>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Scheduled</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">Property Compliance Check</p>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <i class="fas fa-calendar mr-1"></i>
                                            Applied: Jan 8, 2024
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-calendar-check mr-1"></i>
                                            Scheduled: Jan 20, 2024
                                        </div>
                                    </div>
                                    <button class="text-blue-600 hover:text-blue-700">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- View All Button -->
                        <div class="mt-6 text-center">
                            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-lg transition-all">
                                View All Applications
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');
        
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            mobileOverlay.classList.toggle('hidden');
        });
        
        mobileOverlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            mobileOverlay.classList.add('hidden');
        });
        
        // Close sidebar when clicking outside on desktop
        document.addEventListener('click', function(event) {
            if (window.innerWidth >= 1024) {
                if (!sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('active');
                mobileOverlay.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
