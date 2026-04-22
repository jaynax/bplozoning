<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Zoning Administration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sidebar-gradient: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --card-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: var(--primary-gradient);
            min-height: 100vh;
            background-attachment: fixed;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        .glass-effect {
            background: var(--glass-bg);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: var(--card-shadow);
        }
        
        .sidebar-gradient {
            background: var(--sidebar-gradient);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-item {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }
        
        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.2), transparent);
            transition: width 0.3s ease;
        }
        
        .sidebar-item:hover::before {
            width: 100%;
        }
        
        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #667eea;
            transform: translateX(4px);
        }
        
        .sidebar-item.active {
            background: rgba(102, 126, 234, 0.2);
            border-left: 4px solid #667eea;
        }
        
        .sidebar-item.active::before {
            width: 100%;
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .stat-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.85) 100%);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }
        
        .stat-card:hover::before {
            animation: shimmer 0.6s ease;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
        }
        
        .brand-icon {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .pulse-dot {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-menu.active {
            transform: translateX(0);
        }
        
        .notification-badge {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-5px); }
            60% { transform: translateY(-3px); }
        }
        
        .action-button {
            background: var(--primary-gradient);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .action-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .action-button:hover::before {
            left: 100%;
        }
        
        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
        
        .scroll-hidden::-webkit-scrollbar {
            display: none;
        }
        
        .scroll-hidden {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="font-sans">
    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed left-0 top-0 h-full w-64 z-50 sidebar-gradient text-white lg:translate-x-0 slide-in">
        <div class="p-6 h-full flex flex-col scroll-hidden overflow-y-auto">
            <!-- Logo Section -->
            <div class="flex items-center space-x-3 mb-8 fade-in">
                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg card-hover">
                    <i class="fas fa-shield-alt brand-icon text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold">eLGU</h2>
                    <p class="text-xs text-gray-300">Zoning System</p>
                </div>
            </div>
            
            <!-- User Profile -->
            <div class="glass-effect rounded-xl p-4 mb-6 card-hover fade-in" style="animation-delay: 0.1s">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center pulse-dot">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-black text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-black">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="space-y-2 flex-1 fade-in" style="animation-delay: 0.2s">
                <a href="#" class="sidebar-item active flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-home w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Dashboard</span>
                    <span class="ml-auto w-2 h-2 bg-blue-400 rounded-full pulse-dot"></span>
                </a>
                <a href="{{ route('certificate.create') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-plus-circle w-5 group-hover:scale-110 transition-transform"></i>
                    <span>New Application</span>
                </a>
                <a href="{{ route('certificate.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-list w-5 group-hover:scale-110 transition-transform"></i>
                    <span>My Applications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full notification-badge">3</span>
                </a>
                <a href="{{ route('user.zoning-map') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-map-marked-alt w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Zoning Map</span>
                </a>
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-file-download w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Documents</span>
                </a>
                <a href="{{ route('certificate.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-folder-open w-5 group-hover:scale-110 transition-transform"></i>
                    <span>My Certificates</span>
                </a>
            </nav>
            
            <!-- Bottom Actions -->
            <div class="space-y-2 fade-in" style="animation-delay: 0.3s">
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all group">
                    <i class="fas fa-cog w-5 group-hover:rotate-90 transition-transform duration-300"></i>
                    <span>Settings</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-red-500 hover:bg-opacity-20 transition-all text-left group">
                        <i class="fas fa-sign-out-alt w-5 group-hover:translate-x-1 transition-transform"></i>
                        <span>Logout</span>
                    </button>
                </form>
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
                        <img src="{{ URL::asset('assets/elgu.png') }}" 
                             alt="eLGU Logo" 
                             class="ml-4 h-10 w-auto">
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-2">
                            <i class="fas fa-search text-gray-400 mr-2"></i>
                            <input type="text" placeholder="Search..." class="bg-transparent outline-none text-sm w-32">
                        </div>
                        <!-- Notifications -->
                        <button class="relative p-2 rounded-full hover:bg-gray-100 transition-all group">
                            <i class="fas fa-bell text-gray-600 group-hover:scale-110 transition-transform"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full pulse-dot"></span>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                        <!-- Messages -->
                        <button class="relative p-2 rounded-full hover:bg-gray-100 transition-all group">
                            <i class="fas fa-envelope text-gray-600 group-hover:scale-110 transition-transform"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-blue-500 rounded-full"></span>
                        </button>
                        <!-- User Menu -->
                        <div class="flex items-center space-x-2 pl-2 border-l border-gray-200">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center ring-2 ring-white">
                                <i class="fas fa-user text-white text-xs"></i>
                            </div>
                            <div class="hidden sm:block">
                                <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main Dashboard Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Welcome Section -->
            <div class="glass-effect rounded-2xl p-8 mb-6 fade-in">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-3 h-3 bg-green-500 rounded-full pulse-dot"></div>
                            <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}!</h1>
                        </div>
                        <p class="text-gray-600 text-lg mb-4">Manage your zoning and land use permit applications</p>
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-calendar mr-1"></i>{{ date('l, F j, Y') }}</span>
                            <span><i class="fas fa-clock mr-1"></i>{{ date('g:i A') }}</span>
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 flex space-x-3">
                        <a href="{{ route('certificate.create') }}" class="action-button text-white px-6 py-3 rounded-lg font-medium">
                            <i class="fas fa-plus mr-2"></i>New Application
                        </a>
                        <button class="bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition-all font-medium">
                            <i class="fas fa-download mr-2"></i>Reports
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card rounded-xl p-6 card-hover fade-in" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center card-hover">
                            <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">+8%</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Applications</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">12</p>
                        <div class="flex items-center text-xs text-gray-500">
                            <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                            <span class="text-green-600">8% from last month</span>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card rounded-xl p-6 card-hover fade-in" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center card-hover">
                            <i class="fas fa-spinner text-yellow-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">Processing</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">In Progress</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">5</p>
                        <div class="flex items-center text-xs text-gray-500">
                            <i class="fas fa-clock text-yellow-500 mr-1"></i>
                            <span class="text-yellow-600">Avg 3 days</span>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card rounded-xl p-6 card-hover fade-in" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center card-hover">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">Approved</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Completed</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">7</p>
                        <div class="flex items-center text-xs text-gray-500">
                            <i class="fas fa-check text-green-500 mr-1"></i>
                            <span class="text-green-600">100% success rate</span>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card rounded-xl p-6 card-hover fade-in" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center card-hover">
                            <i class="fas fa-certificate text-purple-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">Active</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Certificates</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">3</p>
                        <div class="flex items-center text-xs text-gray-500">
                            <i class="fas fa-award text-purple-500 mr-1"></i>
                            <span class="text-purple-600">2 new this month</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions & Recent Applications -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Quick Actions -->
                <div class="lg:col-span-1">
                    <div class="glass-effect rounded-xl p-6 fade-in" style="animation-delay: 0.5s">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-semibold text-gray-900">Quick Actions</h2>
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg flex items-center justify-center">
                                <i class="fas fa-bolt text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <a href="{{ route('certificate.create') }}" class="group flex items-center space-x-3 p-4 rounded-xl hover:bg-gray-50 transition-all border border-transparent hover:border-blue-200 hover:shadow-md">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">New Application</p>
                                    <p class="text-xs text-gray-500">Submit zoning permit</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                            </a>
                            
                            <a href="{{ route('certificate.index') }}" class="group flex items-center space-x-3 p-4 rounded-xl hover:bg-gray-50 transition-all border border-transparent hover:border-green-200 hover:shadow-md">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-list text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">View Applications</p>
                                    <p class="text-xs text-gray-500">Track status</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600 transition-colors"></i>
                            </a>
                            
                            <a href="{{ route('certificate.create') }}" class="group flex items-center space-x-3 p-4 rounded-xl hover:bg-gray-50 transition-all border border-transparent hover:border-purple-200 hover:shadow-md">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-certificate text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Generate Certificate</p>
                                    <p class="text-xs text-gray-500">Land use cert</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-600 transition-colors"></i>
                            </a>
                            
                            <a href="{{ route('user.zoning-map') }}" class="group flex items-center space-x-3 p-4 rounded-xl hover:bg-gray-50 transition-all border border-transparent hover:border-orange-200 hover:shadow-md">
                                <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-map text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Zoning Map</p>
                                    <p class="text-xs text-gray-500">Explore zones</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-600 transition-colors"></i>
                            </a>
                            
                            <a href="#" class="group flex items-center space-x-3 p-4 rounded-xl hover:bg-gray-50 transition-all border border-transparent hover:border-red-200 hover:shadow-md">
                                <div class="w-12 h-12 bg-gradient-to-r from-red-400 to-red-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-download text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Documents</p>
                                    <p class="text-xs text-gray-500">Forms & guides</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-red-600 transition-colors"></i>
                            </a>
                            
                            <a href="{{ route('user.reports') }}" class="group flex items-center space-x-3 p-4 rounded-xl hover:bg-gray-50 transition-all border border-transparent hover:border-teal-200 hover:shadow-md">
                                <div class="w-12 h-12 bg-gradient-to-r from-teal-400 to-teal-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-chart-bar text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Reports</p>
                                    <p class="text-xs text-gray-500">Analytics & insights</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-teal-600 transition-colors"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Applications -->
                <div class="lg:col-span-2">
                    <div class="glass-effect rounded-xl p-6 fade-in" style="animation-delay: 0.6s">
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-sm"></i>
                                </div>
                                <h2 class="text-lg font-semibold text-gray-900">Recent Applications</h2>
                            </div>
                            <button class="text-blue-600 hover:text-blue-700 text-sm font-medium hover:bg-blue-50 px-3 py-1 rounded-lg transition-all">
                                View All <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Application Item 1 -->
                            <div class="group border border-gray-200 rounded-xl p-5 hover:shadow-lg transition-all hover:border-blue-300 card-hover">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-map-location-dot text-yellow-600"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">Locational Clearance</h3>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <span class="w-2 h-2 bg-yellow-400 rounded-full mr-1.5 pulse-dot"></span>
                                                    In Progress
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-3">Commercial Building Permit - Application #LC-2024-001</p>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                <span><i class="fas fa-calendar mr-1"></i>Jan 15, 2024</span>
                                                <span><i class="fas fa-clock mr-1"></i>3 days ago</span>
                                                <span><i class="fas fa-user mr-1"></i>Processing: Zoning Office</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-20 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 65%"></div>
                                                </div>
                                                <span class="text-xs text-gray-500">65%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="ml-4 text-blue-600 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-lg transition-all">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Application Item 2 -->
                            <div class="group border border-gray-200 rounded-xl p-5 hover:shadow-lg transition-all hover:border-green-300 card-hover">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-file-contract text-green-600"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">Zoning Certificate</h3>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <span class="w-2 h-2 bg-green-400 rounded-full mr-1.5"></span>
                                                    Completed
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-3">Residential Property Verification - Application #ZC-2024-003</p>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                <span><i class="fas fa-calendar mr-1"></i>Jan 10, 2024</span>
                                                <span><i class="fas fa-check mr-1 text-green-500"></i>Jan 12, 2024</span>
                                                <span><i class="fas fa-download mr-1"></i>Certificate Ready</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-20 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                                                </div>
                                                <span class="text-xs text-green-600">100%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="ml-4 text-blue-600 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-lg transition-all">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Application Item 3 -->
                            <div class="group border border-gray-200 rounded-xl p-5 hover:shadow-lg transition-all hover:border-blue-300 card-hover">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-clipboard-check text-blue-600"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-900">Site Inspection</h3>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <span class="w-2 h-2 bg-blue-400 rounded-full mr-1.5"></span>
                                                    Scheduled
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-3">Property Compliance Check - Application #SI-2024-002</p>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center text-xs text-gray-500 space-x-4">
                                                <span><i class="fas fa-calendar mr-1"></i>Jan 8, 2024</span>
                                                <span><i class="fas fa-calendar-check mr-1"></i>Jan 20, 2024</span>
                                                <span><i class="fas fa-user-tie mr-1"></i>Inspector: Engr. Santos</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div class="w-20 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-blue-500 h-2 rounded-full" style="width: 30%"></div>
                                                </div>
                                                <span class="text-xs text-blue-600">30%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="ml-4 text-blue-600 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-lg transition-all">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- View All Button -->
                        <div class="mt-6 flex items-center justify-between border-t pt-4">
                            <p class="text-sm text-gray-500">Showing 3 of 12 applications</p>
                            <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-lg hover:shadow-lg transition-all font-medium">
                                View All Applications <i class="fas fa-arrow-right ml-2"></i>
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
