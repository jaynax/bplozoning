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

                <!-- Certificate Design -->
                <div class="border-l-4 border-green-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Certificate Design</h3>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            Certificate Border Style
                        </label>
                        
                        <!-- Dynamic Border Selection Grid -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4" id="border-selection-grid">
                            <!-- Borders will be dynamically loaded here -->
                        </div>
                        
                        <!-- Hidden input to store selected border -->
                        <input type="hidden" id="border_style" name="border_style" value="0.jpg">
                        
                        <!-- Selected border display -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                            <p class="text-sm text-green-800">
                                <i class="fas fa-check-circle mr-2"></i>
                                Selected: <span id="selected-border-name" class="font-semibold">Ornate Golden Frame</span>
                            </p>
                        </div>
                        
                        <p class="text-xs text-gray-500 mt-2">Click on any border style to select it for your certificate</p>
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
                                        <option value="{{ $i }}" {{ $i == date('j') ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <label for="month" class="block text-xs text-gray-600 mb-1">Month</label>
                                <select id="month" name="month" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <option value="January" {{ date('F') == 'January' ? 'selected' : '' }}>January</option>
                                    <option value="February" {{ date('F') == 'February' ? 'selected' : '' }}>February</option>
                                    <option value="March" {{ date('F') == 'March' ? 'selected' : '' }}>March</option>
                                    <option value="April" {{ date('F') == 'April' ? 'selected' : '' }}>April</option>
                                    <option value="May" {{ date('F') == 'May' ? 'selected' : '' }}>May</option>
                                    <option value="June" {{ date('F') == 'June' ? 'selected' : '' }}>June</option>
                                    <option value="July" {{ date('F') == 'July' ? 'selected' : '' }}>July</option>
                                    <option value="August" {{ date('F') == 'August' ? 'selected' : '' }}>August</option>
                                    <option value="September" {{ date('F') == 'September' ? 'selected' : '' }}>September</option>
                                    <option value="October" {{ date('F') == 'October' ? 'selected' : '' }}>October</option>
                                    <option value="November" {{ date('F') == 'November' ? 'selected' : '' }}>November</option>
                                    <option value="December" {{ date('F') == 'December' ? 'selected' : '' }}>December</option>
                                </select>
                            </div>
                            <div>
                                <label for="year" class="block text-xs text-gray-600 mb-1">Year</label>
                                <select id="year" name="year" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    @for ($i = date('Y'); $i <= date('Y') + 5; $i++)
                                        <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Date automatically set to today: {{ date('F j, Y') }}</p>
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

    <script>
        // Dynamic border loading from assets/borders/ directory
        document.addEventListener('DOMContentLoaded', function() {
            loadBorders();
        });

        async function loadBorders() {
            try {
                // Fetch available borders from the server
                const response = await fetch('/api/borders');
                const borders = await response.json();
                
                const borderGrid = document.getElementById('border-selection-grid');
                const selectedBorderName = document.getElementById('selected-border-name');
                
                // Clear loading text
                borderGrid.innerHTML = '';
                
                // Generate border selection items
                borders.forEach((border, index) => {
                    const borderItem = createBorderItem(border, index === 0);
                    borderGrid.appendChild(borderItem);
                });
                
                // Initialize selection functionality
                initializeBorderSelection(borders);
                
                // Update selected border name
                selectedBorderName.textContent = borders[0]?.displayName || 'No borders available';
                
            } catch (error) {
                console.error('Error loading borders:', error);
                // Fallback to hardcoded borders if API fails
                loadFallbackBorders();
            }
        }

        function createBorderItem(border, isFirst = false) {
            const div = document.createElement('div');
            div.className = 'border-2 border-gray-200 rounded-lg p-3 cursor-pointer hover:border-green-500 transition-colors duration-200';
            div.onclick = () => selectBorder(border.file, border.displayName || border.file);
            
            // Get the base URL for assets
            const assetBaseUrl = '{{ URL::asset("assets/borders/") }}';
            const imageUrl = border.url || assetBaseUrl + border.file;
            const fallbackUrl = '{{ URL::asset("assets/borders/0.jpg") }}';
            
            div.innerHTML = `
                <div class="aspect-square bg-gray-100 rounded mb-2 overflow-hidden">
                    <img src="${imageUrl}" 
                         alt="${border.displayName || border.file}" 
                         class="w-full h-full object-cover"
                         onerror="this.src='${fallbackUrl}'">
                </div>
                <p class="text-xs text-center text-gray-700 font-medium">${border.displayName || border.file}</p>
                <p class="text-xs text-center text-gray-500">${border.style || 'Default'}</p>
            `;
            
            return div;
        }

        function selectBorder(borderFile, borderName) {
            // Update hidden input
            document.getElementById('border_style').value = borderFile;
            
            // Update selected border name display
            document.getElementById('selected-border-name').textContent = borderName;
            
            // Update visual selection
            updateBorderSelection(borderFile);
        }

        function updateBorderSelection(borderFile) {
            // Remove previous selection
            document.querySelectorAll('#border-selection-grid > div').forEach(el => {
                el.classList.remove('border-green-500', 'bg-green-50');
                el.classList.add('border-gray-200');
            });
            
            // Add selection to current border
            const currentBorder = document.querySelector(`#border-selection-grid > div[onclick*="${borderFile}"]`);
            if (currentBorder) {
                currentBorder.classList.remove('border-gray-200');
                currentBorder.classList.add('border-green-500', 'bg-green-50');
            }
        }

        function initializeBorderSelection(borders) {
            const borderItems = document.querySelectorAll('.border-selection-item');
            const borderInput = document.getElementById('border_style');
            const selectedBorderName = document.getElementById('selected-border-name');
            
            // Set initial selection to first border
            if (borders.length > 0) {
                updateSelection(borders[0].file);
            }
            
            // Add click handlers
            borderItems.forEach(item => {
                item.addEventListener('click', function() {
                    const borderFile = this.getAttribute('data-border');
                    updateSelection(borderFile);
                });
            });
            
            function updateSelection(borderFile) {
                // Remove active class from all items
                borderItems.forEach(item => {
                    item.classList.remove('border-green-500', 'bg-green-50');
                    item.classList.add('border-gray-200');
                });
                
                // Add active class to selected item
                const selectedItem = document.querySelector(`[data-border="${borderFile}"]`);
                if (selectedItem) {
                    selectedItem.classList.remove('border-gray-200');
                    selectedItem.classList.add('border-green-500', 'bg-green-50');
                }
                
                // Update hidden input
                borderInput.value = borderFile;
                
                // Update selected border name display
                const selectedBorder = borders.find(b => b.file === borderFile);
                selectedBorderName.textContent = selectedBorder?.displayName || borderFile;
            }
        }

        function loadFallbackBorders() {
            // Fallback borders if API fails - using exact files from assets/borders directory
            const fallbackBorders = [
                { file: '0.jpg', displayName: 'Simple Border', style: 'Default' },
                { file: 'l.jpg', displayName: 'Traditional Border', style: 'Classic' },
                { file: 'p.jpg', displayName: 'Formal Border', style: 'Official' },
                { file: 'n.png', displayName: 'Decorative Border', style: 'Artistic' },
                { file: 'a2a02a17a2b86484bc9234bd7e337b8c.jpg', displayName: 'Vintage Border', style: 'Classic' },
                { file: 'Beige Brown Classic Certificate Participation Template.png', displayName: 'Beige Brown Classic', style: 'Traditional' },
                { file: 'Blue and Gold Creative Certificate Template.png', displayName: 'Blue Gold Creative', style: 'Modern' },
                { file: 'Blue and Gold Modern Certification Certificate.png', displayName: 'Blue Gold Modern', style: 'Modern' },
                { file: 'Gold Elegant Certificate of Achievement Template.png', displayName: 'Gold Elegant', style: 'Elegant' },
                { file: 'Gold Modern Achievement Certificate.png', displayName: 'Gold Modern', style: 'Modern' }
            ];
            
            displayBorders(fallbackBorders);
        }

        function displayBorders(borders) {
            const borderGrid = document.getElementById('border-selection-grid');
            borderGrid.innerHTML = '';
            
            borders.forEach(border => {
                const borderElement = createBorderItem(border);
                borderGrid.appendChild(borderElement);
            });
            
            // Set initial selection
            updateBorderSelection('0.jpg');
        }
    </script>
</body>
</html>
