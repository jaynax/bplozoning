@extends('layouts.app')

@section('title', 'My Certificates')

@section('header-title', 'My Certificates')

@section('certificate-nav-active')
    background: rgba(102, 126, 234, 0.2);
    border-left: 4px solid #667eea;
@stop

@section('content')
<div class="min-h-screen">
    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Certificates</h1>
                <p class="mt-2 text-sm text-gray-600">View and manage all your generated certificates</p>
            </div>
            <div class="flex space-x-3">
                <form id="bulkDeleteForm" action="{{ route('certificate.bulkDelete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the selected certificates?')" class="hidden">
                    @csrf
                    <input type="hidden" name="certificate_ids" id="certificateIds">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200 flex items-center">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Selected (<span id="selectedCount">0</span>)
                    </button>
                </form>
                <a href="{{ route('certificate.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200 flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Generate New Certificate
                </a>
            </div>
        </div>
    </div>
        @if($certificates->count() > 0)
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-certificate text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Certificates</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $certificates->total() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-briefcase text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Business</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $certificates->where('certificate_type', 'business')->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <i class="fas fa-home text-purple-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Residential</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $certificates->where('certificate_type', 'residential')->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-orange-100 rounded-lg">
                            <i class="fas fa-map text-orange-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Others</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $certificates->whereNotIn('certificate_type', ['business', 'residential'])->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificates Table -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-900">Certificate List</h2>
                    <div class="flex items-center space-x-4">
                        <button id="selectAllBtn" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                            <i class="fas fa-check-square mr-1"></i> Select All
                        </button>
                        <button id="deselectAllBtn" class="text-sm text-gray-600 hover:text-gray-800 font-medium hidden">
                            <i class="fas fa-square mr-1"></i> Deselect All
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" id="masterCheckbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Certificate Number
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Owner Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Address
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date Generated
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($certificates as $certificate)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" name="certificate_ids[]" value="{{ $certificate->id }}" class="certificate-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-medium text-gray-900">{{ $certificate->certificate_number }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($certificate->certificate_type)
                                            @case('business')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Business
                                                </span>
                                                @break
                                            @case('residential')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                    Residential
                                                </span>
                                                @break
                                            @case('landuse')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Land Use
                                                </span>
                                                @break
                                            @case('building')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Building
                                                </span>
                                                @break
                                            @case('compliance')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Compliance
                                                </span>
                                                @break
                                            @case('environmental')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-teal-100 text-teal-800">
                                                    Environmental
                                                </span>
                                                @break
                                            @default
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    {{ $certificate->certificate_type }}
                                                </span>
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-900">{{ $certificate->owner_name }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-500 truncate block max-w-xs">{{ $certificate->address }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-500">{{ $certificate->created_at->format('M d, Y') }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('certificate.show', $certificate->id) }}" class="text-blue-600 hover:text-blue-900 transition-colors duration-150" title="View Certificate">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('certificate.download', $certificate->id) }}" class="text-green-600 hover:text-green-900 transition-colors duration-150" title="Download Certificate">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            <form action="{{ route('certificate.delete', $certificate->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this certificate?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-150" title="Delete Certificate">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex-1 flex justify-between sm:hidden">
                        @if($certificates->hasPages())
                            <a href="{{ $certificates->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="{{ $certificates->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        @endif
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium">{{ $certificates->firstItem() }}</span>
                                to
                                <span class="font-medium">{{ $certificates->lastItem() }}</span>
                                of
                                <span class="font-medium">{{ $certificates->total() }}</span>
                                results
                            </p>
                        </div>
                        <div>
                            @if($certificates->hasPages())
                                {{ $certificates->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($certificates->count() == 0)
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="mx-auto h-24 w-24 text-gray-400">
                    <i class="fas fa-certificate text-6xl"></i>
                </div>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No certificates yet</h3>
                <p class="mt-2 text-sm text-gray-500">Get started by generating your first certificate.</p>
                <div class="mt-6">
                    <a href="{{ route('certificate.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200 inline-flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Generate Certificate
                    </a>
                </div>
            </div>
        @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const masterCheckbox = document.getElementById('masterCheckbox');
    const certificateCheckboxes = document.querySelectorAll('.certificate-checkbox');
    const bulkDeleteForm = document.getElementById('bulkDeleteForm');
    const certificateIdsInput = document.getElementById('certificateIds');
    const selectedCountSpan = document.getElementById('selectedCount');
    const selectAllBtn = document.getElementById('selectAllBtn');
    const deselectAllBtn = document.getElementById('deselectAllBtn');

    function updateBulkDeleteButton() {
        const selectedCheckboxes = document.querySelectorAll('.certificate-checkbox:checked');
        const selectedCount = selectedCheckboxes.length;
        
        selectedCountSpan.textContent = selectedCount;
        
        if (selectedCount > 0) {
            bulkDeleteForm.classList.remove('hidden');
            const selectedIds = Array.from(selectedCheckboxes).map(cb => cb.value);
            certificateIdsInput.value = selectedIds.join(',');
        } else {
            bulkDeleteForm.classList.add('hidden');
            certificateIdsInput.value = '';
        }

        // Update select/deselect buttons
        if (selectedCount === certificateCheckboxes.length && selectedCount > 0) {
            selectAllBtn.classList.add('hidden');
            deselectAllBtn.classList.remove('hidden');
        } else {
            selectAllBtn.classList.remove('hidden');
            deselectAllBtn.classList.add('hidden');
        }
    }

    function updateMasterCheckbox() {
        const totalCheckboxes = certificateCheckboxes.length;
        const checkedCheckboxes = document.querySelectorAll('.certificate-checkbox:checked');
        
        if (checkedCheckboxes.length === 0) {
            masterCheckbox.checked = false;
            masterCheckbox.indeterminate = false;
        } else if (checkedCheckboxes.length === totalCheckboxes) {
            masterCheckbox.checked = true;
            masterCheckbox.indeterminate = false;
        } else {
            masterCheckbox.checked = false;
            masterCheckbox.indeterminate = true;
        }
    }

    // Master checkbox functionality
    masterCheckbox.addEventListener('change', function() {
        certificateCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateBulkDeleteButton();
    });

    // Individual checkbox functionality
    certificateCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateBulkDeleteButton();
            updateMasterCheckbox();
        });
    });

    // Select all button
    selectAllBtn.addEventListener('click', function() {
        certificateCheckboxes.forEach(checkbox => {
            checkbox.checked = true;
        });
        masterCheckbox.checked = true;
        masterCheckbox.indeterminate = false;
        updateBulkDeleteButton();
    });

    // Deselect all button
    deselectAllBtn.addEventListener('click', function() {
        certificateCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        masterCheckbox.checked = false;
        masterCheckbox.indeterminate = false;
        updateBulkDeleteButton();
    });
});
</script>
@endsection
