<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residential Zoning Certificate | Zoning Administration System</title>
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
                    <span class="ml-3 text-xl font-semibold text-gray-900">Residential Zoning Certificate</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('certificate.create') }}" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Certificate Types
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8 text-center">
                <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-green-100 mb-4">
                    <i class="fas fa-home text-green-600 text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Residential Zoning Certificate</h1>
                <p class="text-gray-600 mt-2">Fill in the residential property details for zoning certification</p>
            </div>

            <form action="{{ route('certificate.residential.generate') }}" method="POST" class="space-y-6">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <!-- Property Information -->
                <div class="border-l-4 border-green-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Property Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="property_type" class="block text-sm font-medium text-gray-700 mb-2">
                                Property Type <span class="text-red-500">*</span>
                            </label>
                            <select id="property_type" name="property_type" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Select Property Type</option>
                                <option value="Single Family House">Single Family House</option>
                                <option value="Duplex">Duplex</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Condominium">Condominium</option>
                                <option value="Townhouse">Townhouse</option>
                                <option value="Residential Lot">Residential Lot</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="occupancy_type" class="block text-sm font-medium text-gray-700 mb-2">
                                Occupancy Type <span class="text-red-500">*</span>
                            </label>
                            <select id="occupancy_type" name="occupancy_type" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Select Occupancy Type</option>
                                <option value="Owner-Occupied">Owner-Occupied</option>
                                <option value="Rental">Rental</option>
                                <option value="Mixed-Use">Mixed-Use</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Owner Information -->
                <div class="border-l-4 border-green-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Owner Information</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="owner_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Owner Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="owner_name" 
                                   name="owner_name" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter full name of property owner">
                        </div>
                        
                        <div>
                            <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-2">
                                Contact Number
                            </label>
                            <input type="text" 
                                   id="contact_number" 
                                   name="contact_number" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter contact number">
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="border-l-4 border-green-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Address Information</h3>
                    
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                            Property Address <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="address" 
                               name="address" 
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Enter complete property address">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="tax_dec_no" class="block text-sm font-medium text-gray-700 mb-2">
                                Tax Dec No. <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="tax_dec_no" 
                                   name="tax_dec_no" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter Tax Declaration No.">
                        </div>
                        
                        <div>
                            <label for="lot_no" class="block text-sm font-medium text-gray-700 mb-2">
                                Lot No. <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="lot_no" 
                                   name="lot_no" 
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter Lot No.">
                        </div>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="border-l-4 border-green-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Additional Details</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="floor_area" class="block text-sm font-medium text-gray-700 mb-2">
                                Floor Area (sq.m)
                            </label>
                            <input type="text" 
                                   id="floor_area" 
                                   name="floor_area" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter floor area in square meters">
                        </div>
                        
                        <div>
                            <label for="num_families" class="block text-sm font-medium text-gray-700 mb-2">
                                Number of Families
                            </label>
                            <input type="number" 
                                   id="num_families" 
                                   name="num_families" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter number of families">
                        </div>
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="border-l-4 border-green-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Certificate Details</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Certificate Date <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="day" class="block text-xs text-gray-600 mb-1">Day</label>
                                <select id="day" name="day" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <label for="month" class="block text-xs text-gray-600 mb-1">Month</label>
                                <select id="month" name="month" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div>
                                <label for="year" class="block text-xs text-gray-600 mb-1">Year</label>
                                <select id="year" name="year" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    @for ($i = date('Y'); $i <= date('Y') + 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Details (Optional) -->
                <div class="border-l-4 border-green-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Payment Details (Optional)</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="or_no" class="block text-sm font-medium text-gray-700 mb-2">O.R. No.</label>
                            <input type="text" 
                                   id="or_no" 
                                   name="or_no" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter O.R. No.">
                        </div>
                        
                        <div>
                            <label for="amount_paid" class="block text-sm font-medium text-gray-700 mb-2">Amount Paid</label>
                            <input type="text" 
                                   id="amount_paid" 
                                   name="amount_paid" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Enter amount paid">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-8 rounded-lg transition duration-200 flex items-center">
                        <i class="fas fa-file-certificate mr-2"></i>
                        Generate Residential Certificate
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
