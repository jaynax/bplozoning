@extends('layouts.app')

@section('title', 'Locational Clearance Form')

@section('header-title', 'Locational Clearance Form')

@section('certificate-nav-active')
    background: rgba(102, 126, 234, 0.2);
    border-left: 4px solid #667eea;
@stop

@section('content')
<div class="min-h-screen">
    <!-- Form Header -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 text-white">
            <h1 class="text-2xl font-bold">Locational Clearance Application Form</h1>
            <p class="text-blue-100 mt-2">Fill out the form below to apply for a locational clearance</p>
        </div>
    </div>

    <!-- Application Form -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('certificate.locational-clearance.generate') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Application Details -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Application Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Application Number</label>
                        <input type="text" name="application_no" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date of Receipt</label>
                        <input type="date" name="date_of_receipt" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Decision Number</label>
                        <input type="text" name="decision_no" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date of Issue</label>
                        <input type="date" name="date_of_issue" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
            </div>

            <!-- Applicant Information -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Applicant Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Applicant Name (Last, First, Middle)</label>
                        <input type="text" name="applicant_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Business/Corporation Name</label>
                        <input type="text" name="business_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <textarea name="address" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Project Address</label>
                        <textarea name="project_address" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type of Project</label>
                        <input type="text" name="project_type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Area and Location</label>
                        <textarea name="area_location" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Payment Details -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Payment Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">LC Number</label>
                        <input type="text" name="lc_no" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">OR Number</label>
                        <input type="text" name="or_no" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Amount (PHP)</label>
                        <input type="text" name="amount" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date of Payment</label>
                        <input type="date" name="date_payment" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Documentary Stamp Tax</label>
                        <input type="text" name="doc_stamp_tax" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">GOR Serial Number</label>
                        <input type="text" name="gor_serial" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between">
                <a href="{{ route('certificate.create') }}" class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="fas fa-file-alt mr-2"></i>Generate Certificate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
