@extends('layouts.app')

@section('title', 'Certificate Details')

@section('header-title', 'Certificate Details')

@section('certificate-nav-active')
    background: rgba(102, 126, 234, 0.2);
    border-left: 4px solid #667eea;
@stop

@section('content')
<div class="min-h-screen">
    <!-- Certificate Details -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Certificate Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 text-white">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold mb-2">Certificate Details</h1>
                    <p class="text-blue-100">Certificate Number: {{ $certificate->certificate_number }}</p>
                </div>
                <div class="text-right">
                    @switch($certificate->certificate_type)
                        @case('business')
                            <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm font-medium">
                                Business Certificate
                            </span>
                            @break
                        @case('residential')
                            <span class="px-3 py-1 bg-purple-500 text-white rounded-full text-sm font-medium">
                                Residential Certificate
                            </span>
                            @break
                        @case('landuse')
                            <span class="px-3 py-1 bg-blue-500 text-white rounded-full text-sm font-medium">
                                Land Use Certificate
                            </span>
                            @break
                        @case('building')
                            <span class="px-3 py-1 bg-yellow-500 text-white rounded-full text-sm font-medium">
                                Building Certificate
                            </span>
                            @break
                        @case('compliance')
                            <span class="px-3 py-1 bg-red-500 text-white rounded-full text-sm font-medium">
                                Compliance Certificate
                            </span>
                            @break
                        @case('environmental')
                            <span class="px-3 py-1 bg-teal-500 text-white rounded-full text-sm font-medium">
                                Environmental Certificate
                            </span>
                            @break
                        @default
                            <span class="px-3 py-1 bg-gray-500 text-white rounded-full text-sm font-medium">
                                {{ ucfirst($certificate->certificate_type) }} Certificate
                            </span>
                    @endswitch
                </div>
            </div>
        </div>

        <!-- Certificate Information -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Owner Information -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Owner Information</h3>
                    
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Owner Name</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $certificate->owner_name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Address</p>
                                <p class="text-gray-900">{{ $certificate->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Certificate Details</h3>
                    
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-certificate text-purple-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Certificate Number</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $certificate->certificate_number }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar text-orange-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Date Generated</p>
                                <p class="text-gray-900">{{ $certificate->day }} {{ $certificate->month }}, {{ $certificate->year }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-indigo-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Created At</p>
                                <p class="text-gray-900">{{ $certificate->created_at->format('M d, Y h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('certificate.show', $certificate->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center" onclick="window.print(); return false;">
                        <i class="fas fa-eye mr-2"></i>
                        View Certificate
                    </a>
                    <a href="{{ route('certificate.download', $certificate->id) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                        <i class="fas fa-download mr-2"></i>
                        Download PDF
                    </a>
                    <button onclick="window.print()" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                        <i class="fas fa-print mr-2"></i>
                        Print Certificate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="{{ route('certificate.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to My Certificates
        </a>
    </div>
</div>
@endsection
