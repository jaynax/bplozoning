<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Zoning Certificate | Zoning Administration System</title>
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
                    <span class="ml-3 text-xl font-semibold text-gray-900">Business Zoning Certificate</span>
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
                <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-blue-100 mb-4">
                    <i class="fas fa-briefcase text-blue-600 text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Business Zoning Certificate</h1>
                <p class="text-gray-600 mt-2">Fill in the business owner details for zoning certification</p>
            </div>

            <form action="{{ route('certificate.business.generate') }}" method="POST" class="space-y-6">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <!-- Owner Information -->
                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Owner Information</h3>
                    
                    <div>
                        <label for="owner_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   id="owner_name" 
                                   name="owner_name" 
                                   required
                                   class="w-full px-4 py-2 border-0 border-b-2 border-gray-400 rounded-none focus:ring-0 focus:border-blue-500 focus:border-b-2 bg-transparent"
                                   placeholder="Enter full name of business owner">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">This will appear as: _________________________ in the certificate</p>
                    </div>
                    
                    <div class="mt-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                            Complete Address <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   id="address" 
                                   name="address" 
                                   required
                                   class="w-full px-4 py-2 border-0 border-b-2 border-gray-400 rounded-none focus:ring-0 focus:border-blue-500 focus:border-b-2 bg-transparent"
                                   placeholder="Enter complete address (e.g., Poblacion, Sogod, Southern Leyte)">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">This will appear as: _______________________________________ in the certificate</p>
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Certificate Details</h3>
                    
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-sm text-blue-800">
                            <i class="fas fa-info-circle mr-2"></i>
                            The certificate will be automatically dated with today's date.
                        </p>
                    </div>
                </div>

                <!-- Border Style Selection -->
                <div class="border-l-4 border-blue-500 pl-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Certificate Design</h3>
                    
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
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                        <p class="text-sm text-blue-800">
                            <i class="fas fa-check-circle mr-2"></i>
                            Selected: <span id="selected-border-name" class="font-semibold">Simple Border</span>
                        </p>
                    </div>
                    
                    <p class="text-xs text-gray-500 mt-2">Click on any border style to select it for your certificate</p>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-lg transition duration-200 flex items-center">
                        <i class="fas fa-file-certificate mr-2"></i>
                        Generate Business Certificate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Load borders when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadBorders();
        });

        async function loadBorders() {
            const borderGrid = document.getElementById('border-selection-grid');
            const selectedBorderInput = document.getElementById('border_style');
            const selectedBorderName = document.getElementById('selected-border-name');
            
            try {
                // Try to load borders from API
                const response = await fetch('{{ route("api.borders") }}');
                if (response.ok) {
                    const borders = await response.json();
                    displayBorders(borders);
                } else {
                    throw new Error('API request failed');
                }
            } catch (error) {
                console.log('Loading fallback borders...');
                loadFallbackBorders();
            }
        }

        function displayBorders(borders) {
            const borderGrid = document.getElementById('border-selection-grid');
            borderGrid.innerHTML = '';
            
            borders.forEach(border => {
                const borderElement = createBorderElement(border);
                borderGrid.appendChild(borderElement);
            });
            
            // Set initial selection
            updateBorderSelection('0.jpg');
        }

        function createBorderElement(border) {
            const div = document.createElement('div');
            div.className = 'border-2 border-gray-200 rounded-lg p-3 cursor-pointer hover:border-blue-500 transition-colors duration-200';
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
                el.classList.remove('border-blue-500', 'bg-blue-50');
                el.classList.add('border-gray-200');
            });
            
            // Add selection to current border
            const currentBorder = document.querySelector(`#border-selection-grid > div[onclick*="${borderFile}"]`);
            if (currentBorder) {
                currentBorder.classList.remove('border-gray-200');
                currentBorder.classList.add('border-blue-500', 'bg-blue-50');
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
    </script>
</body>
</html>