<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Certificate | Zoning Administration System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Navigation -->
    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-10 w-10 rounded-full">
                    <span class="ml-3 text-xl font-semibold text-gray-900">Certificate Generation</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" 
                       class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900">Select Certificate Type</h1>
                <p class="text-gray-600 mt-2">Choose the type of zoning certificate you want to generate</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Business Certificate -->
                <a href="{{ route('certificate.business.form') }}" class="block group">
                    <div class="p-8 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-lg transition-all cursor-pointer">
                        <div class="text-center">
                            <div class="mx-auto h-20 w-20 flex items-center justify-center rounded-full bg-blue-100 group-hover:bg-blue-200 transition-colors mb-4">
                                <i class="fas fa-briefcase text-blue-600 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Business Zoning Certificate</h3>
                            <p class="text-gray-600 text-sm">For commercial establishments, offices, retail spaces, and other business properties</p>
                            <div class="mt-4 text-blue-600 font-medium group-hover:text-blue-700">
                                Continue <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Residential Certificate -->
                <a href="{{ route('certificate.residential.form') }}" class="block group">
                    <div class="p-8 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:shadow-lg transition-all cursor-pointer">
                        <div class="text-center">
                            <div class="mx-auto h-20 w-20 flex items-center justify-center rounded-full bg-green-100 group-hover:bg-green-200 transition-colors mb-4">
                                <i class="fas fa-home text-green-600 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Residential Zoning Certificate</h3>
                            <p class="text-gray-600 text-sm">For houses, apartments, condominiums, and other residential properties</p>
                            <div class="mt-4 text-green-600 font-medium group-hover:text-green-700">
                                Continue <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Locational Clearance Certificate -->
                <a href="{{ route('certificate.locational-clearance.design') }}" class="block group">
                    <div class="p-8 border-2 border-gray-200 rounded-lg hover:border-indigo-500 hover:shadow-lg transition-all cursor-pointer">
                        <div class="text-center">
                            <div class="mx-auto h-20 w-20 flex items-center justify-center rounded-full bg-indigo-100 group-hover:bg-indigo-200 transition-colors mb-4">
                                <i class="fas fa-map-pin text-indigo-600 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Locational Clearance</h3>
                            <p class="text-gray-600 text-sm">For project location compliance and zoning clearance certification</p>
                            <div class="mt-4 text-indigo-600 font-medium group-hover:text-indigo-700">
                                Continue <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-2"></i>
                    Each certificate type has specific requirements and fields tailored to its purpose
                </p>
            </div>
        </div>
    </div>
</body>
</html>
