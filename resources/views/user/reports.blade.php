<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports & Analytics | Zoning Administration System</title>
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
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center;
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
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
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            
            /* Responsive table improvements */
            .mobile-table {
                font-size: 0.75rem;
            }
            .mobile-table th,
            .mobile-table td {
                padding: 0.5rem 0.25rem !important;
            }
            .mobile-table .table-actions {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
            }
            .mobile-table .table-actions button {
                font-size: 0.7rem;
                padding: 0.25rem 0.5rem;
            }
            
            /* Responsive charts */
            .chart-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            /* Responsive cards */
            .stats-card {
                padding: 1rem;
            }
            .stats-card .text-3xl {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 640px) {
            /* Hide less important columns on very small screens */
            .hide-mobile {
                display: none;
            }
            
            /* Stack table data on very small screens */
            .stack-mobile {
                display: block;
            }
            .stack-mobile td {
                display: block;
                text-align: left !important;
                padding: 0.25rem 0 !important;
            }
            .stack-mobile td:before {
                content: attr(data-label);
                font-weight: bold;
                color: #6b7280;
                display: inline-block;
                width: 80px;
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
                <div class="w-12 h-12  rounded-xl flex items-center justify-center shadow-lg card-hover">
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
                <a href="{{ route('user.dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-home w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Dashboard</span>
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
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-map-marked-alt w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Zoning Map</span>
                </a>
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-file-download w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Documents</span>
                </a>
                <a href="{{ route('user.reports') }}" class="sidebar-item active flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-chart-bar w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Reports</span>
                    <span class="ml-auto w-2 h-2 bg-teal-400 rounded-full pulse-dot"></span>
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
                        <h1 class="ml-4 text-xl font-semibold text-gray-900">Reports & Analytics</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-2">
                            <i class="fas fa-search text-gray-400 mr-2"></i>
                            <input type="text" placeholder="Search reports..." class="bg-transparent outline-none text-sm w-32">
                        </div>
                        <!-- Notifications -->
                        <button class="relative p-2 rounded-full hover:bg-gray-100 transition-all group">
                            <i class="fas fa-bell text-gray-600 group-hover:scale-110 transition-transform"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full pulse-dot"></span>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
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
        
        <!-- Main Reports Content -->
        <main class="p-4 sm:p-6 lg:p-8">
            <!-- Page Header -->
            <div class="glass-effect rounded-2xl p-8 mb-6 fade-in">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-3 h-3 bg-teal-500 rounded-full pulse-dot"></div>
                            <h1 class="text-3xl font-bold text-gray-900">Reports & Analytics</h1>
                        </div>
                        <p class="text-gray-600 text-lg mb-4">Comprehensive insights into your zoning applications and certificates</p>
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-calendar mr-1"></i>{{ date('l, F j, Y') }}</span>
                            <span><i class="fas fa-clock mr-1"></i>{{ date('g:i A') }}</span>
                            <span class="px-2 py-1 bg-teal-100 text-teal-700 rounded-full text-xs font-medium">Live Data</span>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0 flex space-x-3">
                        <a href="{{ route('user.reports.export') }}" class="bg-gradient-to-r from-teal-600 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:shadow-lg transition-all">
                            <i class="fas fa-file-csv mr-2"></i>Export CSV
                        </a>
                        <a href="{{ route('user.reports.export.pdf') }}" class="bg-gradient-to-r from-red-600 to-pink-600 text-white px-6 py-3 rounded-lg font-medium hover:shadow-lg transition-all">
                            <i class="fas fa-file-pdf mr-2"></i>Export PDF
                        </a>
                        <a href="{{ route('user.reports.export.word') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:shadow-lg transition-all">
                            <i class="fas fa-file-word mr-2"></i>Export Word
                        </a>
                        <button class="bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition-all font-medium">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="glass-effect rounded-xl p-6 card-hover fade-in stats-card" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Total</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Total Applications</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stats['total_applications'] }}</p>
                        <div class="flex items-center text-xs text-gray-500">
                            @if($stats['monthly_increase'] > 0)
                                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                                <span class="text-green-600">{{ number_format($stats['monthly_increase'], 1) }}% increase</span>
                            @else
                                <i class="fas fa-minus text-gray-500 mr-1"></i>
                                <span class="text-gray-600">No change</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="glass-effect rounded-xl p-6 card-hover fade-in" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">Approved</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Approved Applications</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stats['approved_applications'] }}</p>
                        <div class="flex items-center text-xs text-gray-500">
                            <i class="fas fa-clock text-yellow-500 mr-1"></i>
                            <span class="text-yellow-600">Avg {{ $stats['avg_processing_days'] }} days processing</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-effect rounded-xl p-6 card-hover fade-in" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-certificate text-purple-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">Generated</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Certificates Generated</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stats['generated_certificates'] }}</p>
                        <div class="flex items-center text-xs text-gray-500">
                            @if($stats['growth_rate'] > 0)
                                <i class="fas fa-trending-up text-purple-500 mr-1"></i>
                                <span class="text-purple-600">{{ number_format($stats['growth_rate'], 1) }}% growth rate</span>
                            @else
                                <i class="fas fa-minus text-gray-500 mr-1"></i>
                                <span class="text-gray-600">No growth</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="glass-effect rounded-xl p-6 card-hover fade-in" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-orange-600 text-xl"></i>
                        </div>
                        <span class="text-xs font-medium text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Pending</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 mb-1">Pending Applications</p>
                        <p class="text-3xl font-bold text-gray-900 mb-2">{{ $stats['pending_applications'] }}</p>
                        <div class="flex items-center text-xs text-gray-500">
                            @if($stats['pending_applications'] > 0)
                                <i class="fas fa-exclamation-triangle text-orange-500 mr-1"></i>
                                <span class="text-orange-600">Requires attention</span>
                            @else
                                <i class="fas fa-check text-green-500 mr-1"></i>
                                <span class="text-green-600">All processed</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Certificate Counts Bar Chart - Outstanding Design -->
                <div class="glass-effect rounded-2xl p-4 sm:p-6 lg:p-8 fade-in relative overflow-hidden chart-container" style="animation-delay: 0.5s">
                    <!-- Background decoration -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-green-400/20 to-blue-400/20 rounded-full blur-2xl"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full pulse-dot shadow-lg"></div>
                                <h2 class="text-2xl font-black text-gray-900 tracking-tight">Certificate Distribution</h2>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs px-3 py-1 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-lg font-bold shadow-lg animate-pulse">Live Data</span>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl p-4 sm:p-6 lg:p-8 border-2 border-gray-200 shadow-2xl relative overflow-hidden">
                            <!-- Background pattern -->
                            <div class="absolute inset-0 opacity-5">
                                <div class="h-full w-full" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23000" fill-opacity="0.1"%3E%3Cpath d="M0 40L40 0H20L0 20M40 40V20L20 40"/%3E%3C/g%3E%3C/svg%3E');"></div>
                            </div>
                            
                            <div class="relative z-10 space-y-6">
                                <!-- Business Certificate -->
                                <div class="group relative">
                                    <div class="flex items-center space-x-6">
                                        <div class="w-28">
                                            <div class="text-sm font-bold text-gray-800 mb-1">Business</div>
                                            <div class="text-xs text-gray-500">Commercial</div>
                                        </div>
                                        <div class="flex-1 relative">
                                            <div class="h-12 bg-gradient-to-r from-gray-100 to-gray-200 rounded-2xl overflow-hidden shadow-inner">
                                                <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-end pr-4 transition-all duration-700 hover:from-blue-600 hover:to-blue-700 shadow-lg transform hover:scale-105" style="width: {{ ($certificateStats['business'] / max(1, max($certificateStats)) * 100) }}%; min-width: 60px;">
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-briefcase text-white opacity-80"></i>
                                                        <span class="text-white font-black text-lg">{{ $certificateStats['business'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Glow effect -->
                                            <div class="absolute inset-0 bg-blue-400/20 rounded-2xl blur-xl group-hover:opacity-100 opacity-0 transition-opacity duration-300"></div>
                                        </div>
                                        <div class="w-16 text-right">
                                            <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 text-blue-600 rounded-2xl font-black text-lg shadow-lg border border-blue-300">
                                                {{ $certificateStats['business'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Residential Certificate -->
                                <div class="group relative">
                                    <div class="flex items-center space-x-6">
                                        <div class="w-28">
                                            <div class="text-sm font-bold text-gray-800 mb-1">Residential</div>
                                            <div class="text-xs text-gray-500">Housing</div>
                                        </div>
                                        <div class="flex-1 relative">
                                            <div class="h-12 bg-gradient-to-r from-gray-100 to-gray-200 rounded-2xl overflow-hidden shadow-inner">
                                                <div class="h-full bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-end pr-4 transition-all duration-700 hover:from-green-600 hover:to-green-700 shadow-lg transform hover:scale-105" style="width: {{ ($certificateStats['residential'] / max(1, max($certificateStats)) * 100) }}%; min-width: 60px;">
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-home text-white opacity-80"></i>
                                                        <span class="text-white font-black text-lg">{{ $certificateStats['residential'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Glow effect -->
                                            <div class="absolute inset-0 bg-green-400/20 rounded-2xl blur-xl group-hover:opacity-100 opacity-0 transition-opacity duration-300"></div>
                                        </div>
                                        <div class="w-16 text-right">
                                            <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 text-green-600 rounded-2xl font-black text-lg shadow-lg border border-green-300">
                                                {{ $certificateStats['residential'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Locational Clearance -->
                                <div class="group relative">
                                    <div class="flex items-center space-x-6">
                                        <div class="w-28">
                                            <div class="text-sm font-bold text-gray-800 mb-1">Locational</div>
                                            <div class="text-xs text-gray-500">Clearance</div>
                                        </div>
                                        <div class="flex-1 relative">
                                            <div class="h-12 bg-gradient-to-r from-gray-100 to-gray-200 rounded-2xl overflow-hidden shadow-inner">
                                                <div class="h-full bg-gradient-to-r from-amber-500 to-amber-600 rounded-2xl flex items-center justify-end pr-4 transition-all duration-700 hover:from-amber-600 hover:to-amber-700 shadow-lg transform hover:scale-105" style="width: {{ ($certificateStats['locational-clearance'] / max(1, max($certificateStats)) * 100) }}%; min-width: 60px;">
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-map-pin text-white opacity-80"></i>
                                                        <span class="text-white font-black text-lg">{{ $certificateStats['locational-clearance'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Glow effect -->
                                            <div class="absolute inset-0 bg-amber-400/20 rounded-2xl blur-xl group-hover:opacity-100 opacity-0 transition-opacity duration-300"></div>
                                        </div>
                                        <div class="w-16 text-right">
                                            <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-100 to-amber-200 text-amber-600 rounded-2xl font-black text-lg shadow-lg border border-amber-300">
                                                {{ $certificateStats['locational-clearance'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Enhanced Percentage Labels -->
                            <div class="mt-8 flex justify-between text-xs text-gray-500 font-medium">
                                <span class="px-2 py-1 bg-gray-100 rounded">0%</span>
                                <span class="px-2 py-1 bg-gray-100 rounded">25%</span>
                                <span class="px-2 py-1 bg-gray-100 rounded">50%</span>
                                <span class="px-2 py-1 bg-gray-100 rounded">75%</span>
                                <span class="px-2 py-1 bg-gray-100 rounded">100%</span>
                            </div>
                        </div>
                        
                        <div class="mt-8 flex justify-center">
                            <div class="text-sm text-gray-700 text-center bg-gradient-to-r from-gray-100 to-gray-200 px-6 py-3 rounded-2xl shadow-lg border border-gray-300">
                                <i class="fas fa-chart-bar mr-2 text-blue-600"></i>
                                <span class="font-bold">Total Certificates: </span>
                                <span class="text-2xl font-black text-blue-700">{{ $certificateStats['business'] + $certificateStats['residential'] + $certificateStats['locational-clearance'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Certificate Types Distribution - Outstanding Pie Chart -->
                <div class="glass-effect rounded-2xl p-4 sm:p-6 lg:p-8 fade-in relative overflow-hidden chart-container" style="animation-delay: 0.6s">
                    <!-- Background decoration -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-400/20 to-blue-400/20 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-purple-400/20 to-green-400/20 rounded-full blur-2xl"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-gradient-to-r from-green-500 to-teal-600 rounded-full pulse-dot shadow-lg"></div>
                                <h2 class="text-2xl font-black text-gray-900 tracking-tight">Certificate Types</h2>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs px-3 py-1 bg-gradient-to-r from-green-400 to-green-500 text-white rounded-lg font-bold shadow-lg animate-pulse">Pie Chart</span>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl p-4 sm:p-6 lg:p-8 border-2 border-gray-200 shadow-2xl relative overflow-hidden">
                            <!-- Background pattern -->
                            <div class="absolute inset-0 opacity-5">
                                <div class="h-full w-full" style="background-image: url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23000" fill-opacity="0.1"%3E%3Cpath d="M0 40L40 0H20L0 20M40 40V20L20 40"/%3E%3C/g%3E%3C/svg%3E');"></div>
                            </div>
                            
                            <div class="relative z-10">
                                <!-- Define PHP variables for pie chart -->
                                @php
                                    $total = $certificateStats['business'] + $certificateStats['residential'] + $certificateStats['locational-clearance'];
                                    $businessPercent = $total > 0 ? ($certificateStats['business'] / $total) * 100 : 0;
                                    $residentialPercent = $total > 0 ? ($certificateStats['residential'] / $total) * 100 : 0;
                                    $locationalPercent = $total > 0 ? ($certificateStats['locational-clearance'] / $total) * 100 : 0;
                                    
                                    // For SVG stroke-dasharray, we need the actual percentage values
                                    // The circle circumference is 100 units, so each percentage point = 1 unit
                                    $businessDashArray = $businessPercent;
                                    $residentialDashArray = $residentialPercent;
                                    $locationalDashArray = $locationalPercent;
                                @endphp
                                
                                <div class="flex items-center justify-center">
                                    <!-- Enhanced Pie Chart -->
                                    <div class="relative w-48 h-48 sm:w-64 sm:h-64 group">
                                        <svg viewBox="0 0 42 42" class="w-48 h-48 sm:w-64 sm:h-64 transform -rotate-90 drop-shadow-2xl">
                                            <!-- Background Circle with gradient -->
                                            <defs>
                                                <linearGradient id="bgGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" style="stop-color:#f3f4f6;stop-opacity:1" />
                                                    <stop offset="100%" style="stop-color:#e5e7eb;stop-opacity:1" />
                                                </linearGradient>
                                            </defs>
                                            <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="url(#bgGradient)" stroke-width="4"></circle>
                                            
                                            <!-- Business Segment with gradient -->
                                            <defs>
                                                <linearGradient id="businessGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                                    <stop offset="100%" style="stop-color:#2563eb;stop-opacity:1" />
                                                </linearGradient>
                                            </defs>
                                            <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="url(#businessGradient)" stroke-width="4" 
                                                    stroke-dasharray="{{ $businessDashArray }} 100" 
                                                    stroke-dashoffset="0" 
                                                    class="transition-all duration-700 hover:opacity-80 cursor-pointer group-hover:stroke-width-5">
                                            </circle>
                                            
                                            <!-- Residential Segment with gradient -->
                                            <defs>
                                                <linearGradient id="residentialGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" style="stop-color:#10b981;stop-opacity:1" />
                                                    <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                                </linearGradient>
                                            </defs>
                                            <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="url(#residentialGradient)" stroke-width="4" 
                                                    stroke-dasharray="{{ $residentialDashArray }} 100" 
                                                    stroke-dashoffset="-{{ $businessDashArray }}" 
                                                    class="transition-all duration-700 hover:opacity-80 cursor-pointer group-hover:stroke-width-5">
                                            </circle>
                                            
                                            <!-- Locational Segment with gradient -->
                                            <defs>
                                                <linearGradient id="locationalGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                    <stop offset="0%" style="stop-color:#f59e0b;stop-opacity:1" />
                                                    <stop offset="100%" style="stop-color:#d97706;stop-opacity:1" />
                                                </linearGradient>
                                            </defs>
                                            <circle cx="21" cy="21" r="15.915" fill="transparent" stroke="url(#locationalGradient)" stroke-width="4" 
                                                    stroke-dasharray="{{ $locationalDashArray }} 100" 
                                                    stroke-dashoffset="-{{ ($businessDashArray + $residentialDashArray) }}" 
                                                    class="transition-all duration-700 hover:opacity-80 cursor-pointer group-hover:stroke-width-5">
                                            </circle>
                                        </svg>
                                        
                                        <!-- Enhanced Center Text -->
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="text-center bg-white/90 backdrop-blur-sm rounded-2xl px-6 py-4 shadow-2xl border border-gray-200">
                                                <div class="text-3xl font-black text-gray-900">{{ $total }}</div>
                                                <div class="text-xs text-gray-500 font-medium">TOTAL</div>
                                            </div>
                                        </div>
                                        
                                        <!-- Glow effect on hover -->
                                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 via-green-400/20 to-amber-400/20 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                    </div>
                                </div>
                                
                                <!-- Enhanced Legend -->
                                <div class="mt-8 space-y-3">
                                    <div class="group flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-4 h-4 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full shadow-md"></div>
                                            <div>
                                                <span class="text-sm font-bold text-gray-800">Business</span>
                                                <div class="text-xs text-gray-500">Commercial Properties</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="text-right">
                                                <span class="text-lg font-black text-gray-900">{{ $certificateStats['business'] }}</span>
                                                <div class="text-xs text-gray-500 font-medium">{{ number_format($businessPercent, 1) }}%</div>
                                            </div>
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center shadow-md">
                                                <i class="fas fa-briefcase text-blue-600"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="group flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-4 h-4 bg-gradient-to-r from-green-500 to-green-600 rounded-full shadow-md"></div>
                                            <div>
                                                <span class="text-sm font-bold text-gray-800">Residential</span>
                                                <div class="text-xs text-gray-500">Housing Units</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="text-right">
                                                <span class="text-lg font-black text-gray-900">{{ $certificateStats['residential'] }}</span>
                                                <div class="text-xs text-gray-500 font-medium">{{ number_format($residentialPercent, 1) }}%</div>
                                            </div>
                                            <div class="w-10 h-10 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center shadow-md">
                                                <i class="fas fa-home text-green-600"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="group flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition-all duration-300">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-4 h-4 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full shadow-md"></div>
                                            <div>
                                                <span class="text-sm font-bold text-gray-800">Locational</span>
                                                <div class="text-xs text-gray-500">Clearance Certificates</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div class="text-right">
                                                <span class="text-lg font-black text-gray-900">{{ $certificateStats['locational-clearance'] }}</span>
                                                <div class="text-xs text-gray-500 font-medium">{{ number_format($locationalPercent, 1) }}%</div>
                                            </div>
                                            <div class="w-10 h-10 bg-gradient-to-br from-amber-100 to-amber-200 rounded-xl flex items-center justify-center shadow-md">
                                                <i class="fas fa-map-pin text-amber-600"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 flex justify-center">
                            <div class="text-sm text-gray-700 text-center bg-gradient-to-r from-gray-100 to-gray-200 px-6 py-3 rounded-2xl shadow-lg border border-gray-300">
                                <i class="fas fa-chart-pie mr-2 text-green-600"></i>
                                <span class="font-bold">Distribution: </span>
                                <span class="text-2xl font-black text-green-700">100%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity Table -->
            <div class="glass-effect rounded-xl p-4 sm:p-6 fade-in" style="animation-delay: 0.7s">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Activity</h2>
                    <button class="text-teal-600 hover:text-teal-700 text-sm font-medium w-full sm:w-auto">
                        View All <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 mobile-table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                                <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Date">Jan 20, 2024</td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Type">
                                    <span class="hidden sm:inline">Business Certificate</span>
                                    <span class="sm:hidden">Business</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Applicant">
                                    <span class="hidden sm:inline">Roland P. Nacano Jr.</span>
                                    <span class="sm:hidden">R. Nacano Jr.</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap" data-label="Status">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm font-medium table-actions" data-label="Action">
                                    <button class="text-teal-600 hover:text-teal-900 text-xs sm:text-sm">View Details</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Date">Jan 19, 2024</td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Type">
                                    <span class="hidden sm:inline">Residential Certificate</span>
                                    <span class="sm:hidden">Residential</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Applicant">
                                    <span class="hidden sm:inline">Maria Santos</span>
                                    <span class="sm:hidden">M. Santos</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap" data-label="Status">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Processing</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm font-medium table-actions" data-label="Action">
                                    <button class="text-teal-600 hover:text-teal-900 text-xs sm:text-sm">View Details</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Date">Jan 18, 2024</td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Type">
                                    <span class="hidden sm:inline">Locational Clearance</span>
                                    <span class="sm:hidden">Locational</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900" data-label="Applicant">
                                    <span class="hidden sm:inline">Juan Dela Cruz</span>
                                    <span class="sm:hidden">J. Dela Cruz</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap" data-label="Status">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Review</span>
                                </td>
                                <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm font-medium table-actions" data-label="Action">
                                    <button class="text-teal-600 hover:text-teal-900 text-xs sm:text-sm">View Details</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
