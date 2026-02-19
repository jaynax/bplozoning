<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | Zoning Administration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-10 w-10 rounded-full">
                    <span class="ml-3 text-xl font-semibold text-gray-900">User Dashboard</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-700">Welcome, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Welcome to Your Dashboard</h1>
            <p class="text-gray-600 mt-2">Manage your zoning and land use permit applications</p>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer">
                <div class="text-blue-600 text-4xl mb-4">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">New Application</h3>
                <p class="text-gray-600 text-sm mt-2">Submit a new zoning permit application</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer">
                <div class="text-green-600 text-4xl mb-4">
                    <i class="fas fa-list"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">My Applications</h3>
                <p class="text-gray-600 text-sm mt-2">View and track your applications</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer">
                <div class="text-purple-600 text-4xl mb-4">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Zoning Map</h3>
                <p class="text-gray-600 text-sm mt-2">Explore the zoning map</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer">
                <div class="text-orange-600 text-4xl mb-4">
                    <i class="fas fa-file-download"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Documents</h3>
                <p class="text-gray-600 text-sm mt-2">Download forms and guidelines</p>
            </div>
            
            <a href="{{ route('certificate.create') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer block">
                <div class="text-red-600 text-4xl mb-4">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Certificate</h3>
                <p class="text-gray-600 text-sm mt-2">Generate Land Use Certificate</p>
            </a>
        </div>

        <!-- Recent Applications -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">Your Recent Applications</h2>
                <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</button>
            </div>
            <div class="p-6">
                <p class="text-gray-500 text-center">No applications yet</p>
                <div class="text-center mt-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-plus mr-2"></i>Create Your First Application
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Applications</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i class="fas fa-file-alt text-blue-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">In Progress</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <i class="fas fa-spinner text-yellow-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Completed</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
