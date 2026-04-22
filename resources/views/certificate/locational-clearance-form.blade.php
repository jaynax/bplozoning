@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Locational Clearance</h1>
                    <p class="text-gray-600 mt-2">Apply for a Locational Clearance certificate</p>
                </div>
                <img src="{{ asset('assets/lgu.png') }}" alt="LGU Logo" class="h-16 w-16">
            </div>
        </div>

        <!-- Information Card -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
            <h2 class="text-lg font-semibold text-blue-900 mb-3">
                <i class="fas fa-info-circle mr-2"></i>About Locational Clearance
            </h2>
            <p class="text-blue-800 mb-4">
                A Locational Clearance is required for any development project to ensure that the proposed use 
                is compatible with the existing land use plan and zoning regulations of the municipality.
            </p>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <h3 class="font-semibold text-blue-900 mb-2">Requirements:</h3>
                    <ul class="list-disc list-inside text-blue-800 space-y-1">
                        <li>Valid ID of applicant</li>
                        <li>Proof of ownership/lease</li>
                        <li>Site development plan</li>
                        <li>Building plans (if applicable)</li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-blue-900 mb-2">Processing Time:</h3>
                    <p class="text-blue-800">3-5 working days</p>
                    <h3 class="font-semibold text-blue-900 mb-2 mt-2">Validity:</h3>
                    <p class="text-blue-800">1 year from date of issue</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Choose Your Action</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Start New Application -->
                <div class="border-2 border-gray-200 rounded-lg p-6 hover:border-indigo-500 transition-colors">
                    <div class="text-center">
                        <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-indigo-100 mb-4">
                            <i class="fas fa-plus-circle text-indigo-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Start New Application</h3>
                        <p class="text-gray-600 mb-4">Create a new locational clearance application</p>
                        <a href="{{ route('certificate.locational-clearance.design') }}" 
                           class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                            <i class="fas fa-arrow-right mr-2"></i>
                            Continue
                        </a>
                    </div>
                </div>

                <!-- View Existing Certificates -->
                <div class="border-2 border-gray-200 rounded-lg p-6 hover:border-green-500 transition-colors">
                    <div class="text-center">
                        <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-green-100 mb-4">
                            <i class="fas fa-file-alt text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">View Existing Certificates</h3>
                        <p class="text-gray-600 mb-4">Browse and manage your existing certificates</p>
                        <a href="{{ route('certificate.index') }}" 
                           class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg transition duration-200">
                            <i class="fas fa-list mr-2"></i>
                            View Certificates
                        </a>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('certificate.create') }}" 
                   class="inline-flex items-center text-gray-600 hover:text-gray-900 font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Certificate Types
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
