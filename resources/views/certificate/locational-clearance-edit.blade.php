<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Locational Clearance | Municipality of Sogod</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            .certificate-container { 
                margin: 0 !important; 
                padding: 0 !important;
                box-shadow: none !important;
                max-width: 100% !important;
                width: 100% !important;
                overflow: visible !important;
            }
            body { 
                margin: 0 !important; 
                padding: 0 !important;
                background: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                size: A4 !important;
                overflow: visible !important;
            }
            .certificate-border {
                margin: 0 !important;
                padding: 20px 30px !important;
                box-shadow: none !important;
                background-size: cover !important;
                background-position: center !important;
                background-repeat: no-repeat !important;
                border: none !important;
                background-image: url('{{ URL::asset("assets/borders/" . ($border_style ?? "0.jpg")) }}') !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                min-height: auto !important;
                height: auto !important;
                overflow: visible !important;
                page-break-inside: avoid !important;
            }
            .certificate-content {
                padding: 5px !important;
                height: auto !important;
                overflow: visible !important;
            }
            /* Slightly reduced font sizes for print */
            .text-xl { font-size: 1rem !important; }
            .text-lg { font-size: 0.9rem !important; }
            .text-base { font-size: 0.8rem !important; }
            .text-sm { font-size: 0.75rem !important; }
            .official-table td {
                padding: 4px !important;
            }
            .payment-box {
                font-size: 0.75rem !important;
                padding: 4px !important;
            }
            .payment-box .mb-0.25 { margin-bottom: 0.125rem !important; }
            .payment-box .mb-0.5 { margin-bottom: 0.25rem !important; }
            .payment-box .mb-1 { margin-bottom: 0.3rem !important; }
            .payment-box .mt-0.5 { margin-top: 0.25rem !important; }
            .payment-box .mt-1 { margin-top: 0.3rem !important; }
            .payment-box .leading-none { line-height: 1 !important; }
            /* Reduce margins for print */
            .mb-8 { margin-bottom: 0.5rem !important; }
            .mb-6 { margin-bottom: 0.4rem !important; }
            .mb-4 { margin-bottom: 0.3rem !important; }
            .mb-3 { margin-bottom: 0.25rem !important; }
            .mb-2 { margin-bottom: 0.2rem !important; }
            .mt-6 { margin-top: 0.4rem !important; }
            .mt-4 { margin-top: 0.3rem !important; }
            .mt-3 { margin-top: 0.25rem !important; }
            .mt-2 { margin-top: 0.2rem !important; }
        }
        .certificate-border {
            padding: 100px 80px;
            background: white;
            position: relative;
            background-image: url('{{ URL::asset("assets/borders/" . ($border_style ?? "0.jpg")) }}');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 842px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border: 3px solid #d4af37;
        }
        .certificate-content {
            position: relative;
            z-index: 10;
            background: transparent;
            padding: 20px;
            margin: 0;
            border-radius: 0;
        }
        .payment-box {
            border: 2px solid #16a34a;
            background: rgba(240, 253, 244, 0.9);
            padding: 15px;
        }
        .official-table {
            border-collapse: collapse;
            width: 100%;
        }
        .official-table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }
        .official-table .label-cell {
            background-color: #f3f4f6;
            font-weight: bold;
            width: 30%;
        }
        .editable-field {
            background-color: transparent;
            border: 1px solid transparent;
            padding: 2px 4px;
            border-radius: 2px;
            cursor: text;
            min-height: 1.2em;
            display: inline-block;
            min-width: 50px;
            transition: all 0.2s;
        }
        .editable-field:hover {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #e5e7eb;
        }
        .editable-field:focus {
            outline: 1px solid #3b82f6;
            background-color: white;
            border: 1px solid #3b82f6;
        }
        .no-print .editable-field {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px dashed #d1d5db;
        }
        .no-print .editable-field:hover {
            background-color: white;
            border: 1px solid #9ca3af;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-8">
    <div class="certificate-container w-full max-w-5xl">
        <!-- Edit Controls -->
        <div class="no-print mb-6 text-center bg-white p-4 rounded-lg shadow-lg">
            <div class="flex justify-center items-center space-x-4">
                <form action="{{ route('certificate.locational-clearance.save') }}" method="POST" class="inline">
                    @csrf
                    <input type="hidden" name="border_style" id="border_style_input" value="{{ $border_style ?? '0.jpg' }}">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg">
                        <i class="fas fa-save mr-2"></i>Save Certificate
                    </button>
                </form>
                <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg">
                    <i class="fas fa-print mr-2"></i>Print Certificate
                </button>
                <a href="{{ route('certificate.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Certificate Types
                </a>
            </div>
            <p class="text-sm text-gray-600 mt-2">
                <i class="fas fa-info-circle mr-2"></i>
                Click on any highlighted field to edit directly. All fields are editable.
            </p>
        </div>

        <!-- Certificate -->
        <div class="certificate-border">
            <div class="certificate-content">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-center relative">
                        <!-- Logo on Left -->
                        <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-32 w-32 mr-8">
                        
                        <!-- Centered Text -->
                        <div class="text-center">
                            <p class="text-lg text-gray-900">Republic of the Philippines</p>
                            <p class="text-base text-gray-800">Province of Southern Leyte</p>
                            <p class="text-xl font-bold text-gray-900">MUNICIPALITY OF SOGOD</p>
                        </div>
                        
                        <!-- Bagong Pilipinas Logo on Right -->
                        <img src="{{ URL::asset('assets/h.jpg') }}" alt="Bagong Pilipinas Logo" class="h-32 w-32 ml-8 object-cover">
                    </div>
                    <div class="text-center mt-4">
                        <h1 class="text-lg font-bold text-gray-900 border-b-2 border-gray-900 inline-block">OFFICE OF THE MUNICIPAL PLANNING & DEV. COORDINATOR</h1>
                    </div>
                </div>

                <!-- Certificate Title -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 tracking-widest">LOCATIONAL CLEARANCE</h2>
                </div>

                <!-- Certificate Content -->
                <div class="mb-8">
                    
                    <!-- Application Details Table -->
                    <div class="mb-6">
                        <table class="official-table">
                            <tr>
                                <td class="label-cell">Application No.:</td>
                                <td><div contenteditable="true" class="editable-field" name="application_no">{{ $application_no }}</div></td>
                                <td class="label-cell">Decision No.:</td>
                                <td><div contenteditable="true" class="editable-field" name="decision_no">{{ $decision_no }}</div></td>
                            </tr>
                            <tr>
                                <td class="label-cell">Date of Receipt:</td>
                                <td><div contenteditable="true" class="editable-field" name="date_of_receipt">{{ $date_of_receipt }}</div></td>
                                <td class="label-cell">Date of Issue:</td>
                                <td><div contenteditable="true" class="editable-field" name="date_of_issue">{{ $date_of_issue }}</div></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Applicant Information Table -->
                    <div class="mb-6">
                        <table class="official-table">
                            <tr>
                                <td class="label-cell">APPLICANT (Last, First, Middle Name):<br><div contenteditable="true" class="editable-field" name="applicant_name">{{ $applicant_name }}</div></td>
                                <td class="label-cell">NAME OF CORPORATION/BUSINESS NAME:<br><div contenteditable="true" class="editable-field" name="business_name">{{ $business_name }}</div></td>
                            </tr>
                            <tr>
                                <td class="label-cell">ADDRESS:<br><div contenteditable="true" class="editable-field" name="address">{{ $address }}</div></td>
                                <td class="label-cell">PROJECT ADDRESS:<br><div contenteditable="true" class="editable-field" name="project_address">{{ $project_address }}</div></td>
                            </tr>
                            <tr>
                                <td class="label-cell">TYPE OF PROJECT:<br><div contenteditable="true" class="editable-field" name="project_type">{{ $project_type }}</div></td>
                                <td class="label-cell">AREA AND LOCATION:<br><div contenteditable="true" class="editable-field" name="area_location">{{ $area_location }}</div></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Decision Section -->
                    <div class="mb-6">
                        <table class="official-table">
                            <tr>
                                <td class="label-cell">DECISION:<br><p class="font-bold">Locational Clearance Granted</p></td>
                                <td class="label-cell">RIGHT OVER LAND:<br><p class="font-bold">Owner</p></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Conditions Section -->
                    <div class="mb-6">
                        <h4 class="font-bold text-gray-900 mb-3">CONDITIONS:</h4>
                        <div class="border border-gray-800 p-4 bg-gray-50">
                            <ol class="list-decimal list-inside space-y-2 text-sm">
                                <li>All conditions stipulated herein form part of this decision and are subject to monitoring</li>
                                <li>Non-compliance therewith shall be a cause for cancellation or legal action.</li>
                                <li>The applicable requirements of government agencies and applicable provisions of existing laws shall be complied with.</li>
                                <li>No activity other than that applied for shall be conducted within the project site.</li>
                                <li>No major expansion, alteration and/or improvements shall be introduced without prior clearance from this Office.</li>
                                <li>This decision shall not be construed as a certification of LGU-SOGOD as to the ownership by the applicant of the parcel of subject of this decision.</li>
                                <li>Any misrepresentation, false statements or allegations material to the issuance of this decision shall be sufficient cause of its revocation.</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Additional Conditions Section -->
                    <div class="mb-6">
                        <h4 class="font-bold text-gray-900 mb-3">ADDITIONAL CONDITIONS:</h4>
                        <div class="border border-gray-800 p-4 bg-gray-50">
                            <ol class="list-decimal list-inside space-y-2 text-sm">
                                <li>Provisions as to setbacks, yard requirements, bulk, easement, area, height and other restrictions shall strictly conform with the requirements of the National Building Code and other related laws.</li>
                                <li>This decision shall be considered automatically revoked if project is not commenced with one (1) year from date of issue of this decision.</li>
                                <li>For other conditions, please see reverse side.</li>
                            </ol>
                        </div>
                    </div>

                    
                    <div class="flex justify-between items-start mb-8">
                        <!-- Payment Box on Left -->
                        <div class="bg-green-100 p-2 rounded-lg shadow-inner text-green-800 text-base w-5/12 mt-4 leading-none">
                            <p class="font-bold text-center mb-1">NOT VALID WITHOUT SEAL</p>
                            <div class="flex justify-between mb-0.25 leading-none">
                                <span class="font-semibold">LC NO. :</span>
                                <div contenteditable="true" class="editable-field inline" name="lc_no">{{ $lc_no }}</div>
                            </div>
                            <div class="flex justify-between mb-0.25 leading-none">
                                <span class="font-semibold">OR NO. :</span>
                                <div contenteditable="true" class="editable-field inline" name="or_no">{{ $or_no }}</div>
                            </div>
                            <div class="flex justify-between mb-0.25 leading-none">
                                <span class="font-semibold">Date Issued :</span>
                                <div contenteditable="true" class="editable-field inline" name="date_of_issue_payment">{{ $date_of_issue }}</div>
                            </div>
                            <div class="flex justify-between mb-0.25 leading-none">
                                <span class="font-semibold">Amount : Php</span>
                                <div contenteditable="true" class="editable-field inline" name="amount">{{ $amount }}</div>
                            </div>
                            <p class="mt-0.5 font-bold text-center">DOCUMENTARY STAMP TAX PAID</p>
                            <div class="mt-0.5 grid grid-cols-3 gap-x-2 text-sm leading-none">
                                <div class="text-center">
                                    <span class="font-semibold">DOCUMENTARY STAMP TAX</span>
                                    <div contenteditable="true" class="editable-field inline" name="doc_stamp_tax">{{ $doc_stamp_tax }}</div>
                                </div>
                                <div class="text-center">
                                    <span class="font-semibold">GOR SERIAL NUMBER</span>
                                    <div contenteditable="true" class="editable-field inline" name="gor_serial">{{ $gor_serial }}</div>
                                </div>
                                <div class="text-center">
                                    <span class="font-semibold">DATE OF PAYMENT</span>
                                    <div contenteditable="true" class="editable-field inline" name="date_payment">{{ $date_payment }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Authority Section on Right -->
                        <div class="text-center w-6/12 mt-8">
                            <p class="text-lg text-gray-900 mb-2">BY AUTHORITY OF THE LOCAL CHIEF EXECUTIVE:</p>
                            <p class="font-bold text-2xl border-b-2 border-gray-900 pb-1">RUEL E. ALTEJAR</p>
                            <p class="text-sm">Municipal Planning & Development Coordinator/</p>
                            <p class="text-sm">Zoning Officer</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Handle form submission for editable fields
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action="{{ route("certificate.locational-clearance.save") }}"]');
            
            // Add hidden inputs for all editable fields
            const editableFields = document.querySelectorAll('.editable-field');
            editableFields.forEach(field => {
                const name = field.getAttribute('name');
                if (name && !form.querySelector(`input[name="${name}"]`)) {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = name;
                    form.appendChild(hiddenInput);
                }
            });
            
            // Update hidden inputs when editable fields change
            editableFields.forEach(field => {
                const name = field.getAttribute('name');
                if (name) {
                    field.addEventListener('input', function() {
                        const hiddenInput = form.querySelector(`input[name="${name}"]`);
                        if (hiddenInput) {
                            hiddenInput.value = this.textContent.trim();
                        }
                    });
                    
                    // Initialize hidden input values
                    const hiddenInput = form.querySelector(`input[name="${name}"]`);
                    if (hiddenInput) {
                        hiddenInput.value = field.textContent.trim();
                    }
                }
            });
            
            // Handle form submission
            form.addEventListener('submit', function(e) {
                // Update all hidden inputs before submission
                editableFields.forEach(field => {
                    const name = field.getAttribute('name');
                    if (name) {
                        const hiddenInput = form.querySelector(`input[name="${name}"]`);
                        if (hiddenInput) {
                            hiddenInput.value = field.textContent.trim();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
