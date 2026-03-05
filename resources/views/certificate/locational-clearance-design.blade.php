<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Select Design | Locational Clearance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-20 w-20 rounded-full">
                    <span class="ml-3 text-xl font-semibold text-gray-900">Select Certificate Design</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('certificate.create') }}" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Certificate Types
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8 text-center">
                <div class="mx-auto h-16 w-16 flex items-center justify-center rounded-full bg-indigo-100 mb-4">
                    <i class="fas fa-palette text-indigo-600 text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Choose Your Certificate Design</h1>
                <p class="text-gray-600 mt-2">Select a border style for your Locational Clearance certificate</p>
            </div>

            <form action="{{ route('certificate.locational-clearance.design-selected') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Border Selection Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="border-selection-grid">
                    <!-- Borders will be dynamically loaded here -->
                </div>
                
                <!-- Hidden input to store selected border -->
                <input type="hidden" id="border_style" name="border_style" value="0.jpg" required>
                
                <!-- Selected border display -->
                <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                    <p class="text-sm text-indigo-800">
                        <i class="fas fa-check-circle mr-2"></i>
                        Selected: <span id="selected-border-name" class="font-semibold">Simple Border</span>
                    </p>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between items-center pt-6">
                    <a href="{{ route('certificate.create') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-3 px-6 rounded-lg transition duration-200 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back
                    </a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-8 rounded-lg transition duration-200 flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        Continue to Edit Certificate
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
                selectedBorderName.textContent = borders[0]?.displayName || 'Simple Border';
                
            } catch (error) {
                console.error('Error loading borders:', error);
                // Fallback to hardcoded borders if API fails
                loadFallbackBorders();
            }
        }

        function createBorderItem(border, isFirst = false) {
            const div = document.createElement('div');
            div.className = 'border-2 border-gray-200 rounded-lg p-3 cursor-pointer hover:border-indigo-500 transition-colors duration-200';
            if (isFirst) {
                div.classList.add('border-indigo-500', 'bg-indigo-50');
            }
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
            
            // Auto-save certificate to database
            autoSaveCertificate(borderFile);
        }

        async function autoSaveCertificate(borderFile) {
            try {
                // Show loading indicator
                showSavingIndicator();
                
                // Prepare certificate data with default values
                const certificateData = {
                    border_style: borderFile,
                    application_no: '_________',
                    date_of_receipt: '_________',
                    decision_no: '_________',
                    date_of_issue: '_________',
                    applicant_name: '_________________________',
                    business_name: 'NONE',
                    address: '_________________________',
                    project_address: '_________________________',
                    project_type: '_________________________',
                    area_location: '_________________________',
                    lc_no: '_________',
                    or_no: '_________',
                    amount: '_________',
                    doc_stamp_tax: '_________',
                    gor_serial: '_________',
                    date_payment: '_________',
                    certificate_type: 'locational-clearance'
                };
                
                // Save to database
                const response = await fetch('/certificate/locational-clearance/auto-save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                       document.querySelector('input[name="_token"]')?.value
                    },
                    body: JSON.stringify(certificateData)
                });
                
                if (response.ok) {
                    const result = await response.json();
                    showSuccessMessage('Certificate saved successfully!');
                    console.log('Certificate saved with ID:', result.certificate_id);
                } else {
                    throw new Error('Failed to save certificate');
                }
            } catch (error) {
                console.error('Error auto-saving certificate:', error);
                showErrorMessage('Failed to save certificate. Please try again.');
            } finally {
                hideSavingIndicator();
            }
        }

        function showSavingIndicator() {
            // Create or update saving indicator
            let indicator = document.getElementById('saving-indicator');
            if (!indicator) {
                indicator = document.createElement('div');
                indicator.id = 'saving-indicator';
                indicator.className = 'fixed top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
                document.body.appendChild(indicator);
            }
            indicator.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving certificate...';
            indicator.style.display = 'block';
        }

        function hideSavingIndicator() {
            const indicator = document.getElementById('saving-indicator');
            if (indicator) {
                indicator.style.display = 'none';
            }
        }

        function showSuccessMessage(message) {
            showMessage(message, 'success');
        }

        function showErrorMessage(message) {
            showMessage(message, 'error');
        }

        function showMessage(message, type) {
            // Create message element
            const messageEl = document.createElement('div');
            messageEl.className = `fixed top-4 right-4 px-4 py-2 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
            }`;
            messageEl.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-2"></i>${message}`;
            
            document.body.appendChild(messageEl);
            
            // Auto-remove after 3 seconds
            setTimeout(() => {
                messageEl.remove();
            }, 3000);
        }

        function updateBorderSelection(borderFile) {
            // Remove previous selection
            document.querySelectorAll('#border-selection-grid > div').forEach(el => {
                el.classList.remove('border-indigo-500', 'bg-indigo-50');
                el.classList.add('border-gray-200');
            });
            
            // Add selection to current border
            const currentBorder = document.querySelector(`#border-selection-grid > div[onclick*="${borderFile}"]`);
            if (currentBorder) {
                currentBorder.classList.remove('border-gray-200');
                currentBorder.classList.add('border-indigo-500', 'bg-indigo-50');
            }
        }

        function initializeBorderSelection(borders) {
            // Set initial selection
            updateBorderSelection('0.jpg');
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
            const selectedBorderName = document.getElementById('selected-border-name');
            
            // Clear loading text
            borderGrid.innerHTML = '';
            
            // Generate border selection items
            borders.forEach((border, index) => {
                const borderItem = createBorderItem(border, index === 0);
                borderGrid.appendChild(borderItem);
            });
            
            // Update selected border name
            selectedBorderName.textContent = borders[0]?.displayName || 'Simple Border';
            
            // Set initial selection
            updateBorderSelection(borders[0]?.file || '0.jpg');
        }
    </script>
</body>
</html>
