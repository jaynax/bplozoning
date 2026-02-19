<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Certificate | Zoning Administration System</title>
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900">Select Certificate Type</h1>
                <p class="text-gray-600 mt-2">Choose the type of zoning certificate you want to generate</p>
            </div>

            <!-- Template Categories -->
            <div class="space-y-8">
                <!-- Business Certificates -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-briefcase text-blue-600 mr-3"></i>
                        Business Certificates
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Business Zoning Certificate -->
                        <a href="{{ route('certificate.business.form') }}" class="block group">
                            <div class="p-6 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:shadow-lg transition-all cursor-pointer">
                                <div class="text-center">
                                    <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-blue-100 group-hover:bg-blue-200 transition-colors mb-4">
                                        <i class="fas fa-briefcase text-blue-600 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Business Zoning</h3>
                                    <p class="text-gray-600 text-sm mb-3">For commercial establishments, offices, retail spaces</p>
                                    <div class="text-blue-600 font-medium group-hover:text-blue-700 text-sm">
                                        Generate <i class="fas fa-arrow-right ml-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Residential Certificates -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-home text-green-600 mr-3"></i>
                        Residential Certificates
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Residential Zoning Certificate -->
                        <a href="{{ route('certificate.residential.form') }}" class="block group">
                            <div class="p-6 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:shadow-lg transition-all cursor-pointer">
                                <div class="text-center">
                                    <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-green-100 group-hover:bg-green-200 transition-colors mb-4">
                                        <i class="fas fa-home text-green-600 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Residential Zoning</h3>
                                    <p class="text-gray-600 text-sm mb-3">For houses, apartments, condominiums</p>
                                    <div class="text-green-600 font-medium group-hover:text-green-700 text-sm">
                                        Generate <i class="fas fa-arrow-right ml-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Special Certificates -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-star text-purple-600 mr-3"></i>
                        Special Certificates
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Land Use Certification -->
                        <a href="{{ route('certificate.landuse.form') }}" class="block group">
                            <div class="p-6 border-2 border-gray-200 rounded-lg hover:border-orange-500 hover:shadow-lg transition-all cursor-pointer">
                                <div class="text-center">
                                    <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-orange-100 group-hover:bg-orange-200 transition-colors mb-4">
                                        <i class="fas fa-map-marked-alt text-orange-600 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Land Use Certification</h3>
                                    <p class="text-gray-600 text-sm mb-3">For land use verification and zoning compliance</p>
                                    <div class="text-orange-600 font-medium group-hover:text-orange-700 text-sm">
                                        Generate <i class="fas fa-arrow-right ml-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Building Permit Certificate -->
                        <a href="{{ route('certificate.building.form') }}" class="block group">
                            <div class="p-6 border-2 border-gray-200 rounded-lg hover:border-purple-500 hover:shadow-lg transition-all cursor-pointer">
                                <div class="text-center">
                                    <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-purple-100 group-hover:bg-purple-200 transition-colors mb-4">
                                        <i class="fas fa-building text-purple-600 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Building Permit</h3>
                                    <p class="text-gray-600 text-sm mb-3">For building construction permits</p>
                                    <div class="text-purple-600 font-medium group-hover:text-purple-700 text-sm">
                                        Generate <i class="fas fa-arrow-right ml-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Certificate of Compliance -->
                        <a href="{{ route('certificate.compliance.form') }}" class="block group">
                            <div class="p-6 border-2 border-gray-200 rounded-lg hover:border-red-500 hover:shadow-lg transition-all cursor-pointer">
                                <div class="text-center">
                                    <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-red-100 group-hover:bg-red-200 transition-colors mb-4">
                                        <i class="fas fa-clipboard-check text-red-600 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Compliance Certificate</h3>
                                    <p class="text-gray-600 text-sm mb-3">For zoning compliance certificates</p>
                                    <div class="text-red-600 font-medium group-hover:text-red-700 text-sm">
                                        Generate <i class="fas fa-arrow-right ml-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Environmental Clearance -->
                        <a href="{{ route('certificate.environmental.form') }}" class="block group">
                            <div class="p-6 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:shadow-lg transition-all cursor-pointer">
                                <div class="text-center">
                                    <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-green-100 group-hover:bg-green-200 transition-colors mb-4">
                                        <i class="fas fa-leaf text-green-600 text-2xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Environmental Clearance</h3>
                                    <p class="text-gray-600 text-sm mb-3">For environmental compliance certificates</p>
                                    <div class="text-green-600 font-medium group-hover:text-green-700 text-sm">
                                        Generate <i class="fas fa-arrow-right ml-2"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">
                        <i class="fas fa-info-circle mr-2"></i>
                        Certificate Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-blue-800">
                        <div class="flex items-center">
                            <i class="fas fa-briefcase mr-2"></i>
                            <span>Business: Commercial properties</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-home mr-2"></i>
                            <span>Residential: Housing units</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-star mr-2"></i>
                            <span>Special: Custom certificates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
