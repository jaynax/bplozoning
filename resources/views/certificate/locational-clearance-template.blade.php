<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locational Clearance | Municipality of Sogod</title>
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
                padding: 60px 50px !important;
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
                padding: 8px !important;
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
            padding: 80px 60px;
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
            padding: 40px;
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
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-8">
    <div class="certificate-container w-full max-w-5xl">
        <!-- Print Controls -->
        <div class="no-print mb-6 text-center">
            <button onclick="window.print()" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg mr-4">
                <i class="fas fa-print mr-2"></i>Print Certificate
            </button>
            <a href="{{ route('certificate.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Certificates
            </a>
        </div>

        <!-- Certificate -->
        <div class="certificate-border">
            <div class="certificate-content">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-center relative">
                        <!-- Logo on Left -->
                        <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-24 w-24 mr-8">
                        
                        <!-- Centered Text -->
                        <div class="text-center">
                            <p class="text-lg text-gray-900">Republic of the Philippines</p>
                            <p class="text-base text-gray-800">Province of Southern Leyte</p>
                            <p class="text-xl font-bold text-gray-900">MUNICIPALITY OF SOGOD</p>
                        </div>
                        
                        <!-- Bagong Pilipinas Logo on Right -->
                        <img src="{{ URL::asset('assets/h.jpg') }}" alt="Bagong Pilipinas Logo" class="h-24 w-24 ml-8">
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
                                <td>{{ $application_no ?? '_________' }}</td>
                                <td class="label-cell">Date of Receipt:</td>
                                <td>{{ $date_of_receipt ?? '_________' }}</td>
                            </tr>
                            <tr>
                                <td class="label-cell">Decision No.:</td>
                                <td>{{ $decision_no ?? '_________' }}</td>
                                <td class="label-cell">Date of Issue:</td>
                                <td>{{ $date_of_issue ?? '_________' }}</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Applicant Information Table -->
                    <div class="mb-6">
                        <table class="official-table">
                            <tr>
                                <td class="label-cell">APPLICANT (Last, First, Middle Name):<br>{{ $applicant_name ?? '_________________________' }}</td>
                                <td class="label-cell">NAME OF CORPORATION/BUSINESS NAME:<br>{{ $business_name ?? 'NONE' }}</td>
                            </tr>
                            <tr>
                                <td class="label-cell">ADDRESS:<br>{{ $address ?? '_________________________' }}</td>
                                <td class="label-cell">PROJECT ADDRESS:<br>{{ $project_address ?? '_________________________' }}</td>
                            </tr>
                            <tr>
                                <td class="label-cell">TYPE OF PROJECT:<br>{{ $project_type ?? '_________________________' }}</td>
                                <td class="label-cell">AREA AND LOCATION:<br>{{ $area_location ?? '_________________________' }}</td>
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
                                <span class="font-semibold">{{ $lc_no ?? '_________' }}</span>
                            </div>
                            <div class="flex justify-between mb-0.25 leading-none">
                                <span class="font-semibold">OR NO. :</span>
                                <span class="font-semibold">{{ $or_no ?? '_________' }}</span>
                            </div>
                            <div class="flex justify-between mb-0.25 leading-none">
                                <span class="font-semibold">Date Issued :</span>
                                <span class="font-semibold">{{ $date_of_issue ?? '_________' }}</span>
                            </div>
                            <div class="flex justify-between mb-0.25 leading-none">
                                <span class="font-semibold">Amount : Php</span>
                                <span class="font-semibold">{{ $amount ?? '_________' }}</span>
                            </div>
                            <p class="mt-0.5 font-bold text-center">DOCUMENTARY STAMP TAX PAID</p>
                            <div class="mt-0.5 grid grid-cols-2 gap-x-2 text-sm leading-none">
                                <div class="flex justify-between">
                                    <span class="font-semibold">GOR SERIAL NUMBER</span>
                                    <span class="font-semibold">{{ $gor_serial ?? '_________' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="font-semibold">DATE OF PAYMENT</span>
                                    <span class="font-semibold">{{ $date_payment ?? '_________' }}</span>
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
</body>
</html>
