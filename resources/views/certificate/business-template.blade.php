<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Zoning Certificate | Municipality of Sogod</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            .certificate-container { 
                margin: 0 !important; 
                padding: 0 !important;
                box-shadow: none !important;
            }
            body { 
                margin: 0.5in; 
                background: white !important;
            }
        }
        .certificate-border {
            border: 2px solid #1e40af;
            padding: 40px;
            background: white;
            position: relative;
        }
        .certificate-border::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 1px solid #3b82f6;
        }
        .payment-box {
            border: 2px solid #16a34a;
            background: #f0fdf4;
            padding: 15px;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-8">
    <div class="certificate-container w-full max-w-5xl">
        <!-- Print Controls -->
        <div class="no-print mb-6 text-center">
            <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg mr-4">
                <i class="fas fa-print mr-2"></i>Print Certificate
            </button>
            <a href="{{ route('certificate.business.form') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Back to Form
            </a>
        </div>

        <!-- Certificate -->
        <div class="certificate-border">
            <div class="relative z-10">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-center">
                        <!-- Logo on Left -->
                        <div class="flex items-center">
                            <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-16 w-16 mr-4">
                            <div>
                                <h1 class="text-lg font-bold text-gray-900">Republic of the Philippines</h1>
                                <p class="text-base font-semibold text-gray-800">Province of Southern Leyte</p>
                                <p class="text-sm text-gray-700">MUNICIPALITY OF SOGOD</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate Title -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 underline">BUSINESS ZONING CERTIFICATION</h2>
                </div>

                <!-- Certificate Content -->
                <div class="mb-8">
                    <p class="text-lg text-gray-900 mb-6">TO WHOM IT MAY CONCERN:</p>
                    
                    <p class="text-lg leading-relaxed text-gray-900 mb-6">
                        THIS IS TO CERTIFY that the Business Permit of 
                        <span class="font-bold uppercase border-b-2 border-gray-400 pb-1 inline-block min-w-[300px] text-center">{{ $owner_name ?? '_________' }}</span> 
                        located at 
                        <span class="font-bold uppercase border-b-2 border-gray-400 pb-1 inline-block min-w-[300px] text-center">{{ $address ?? '_________' }}</span>, Sogod, Southern Leyte has already a Land Use Certification issued by this office in support of his/her new application of Business Permit.
                    </p>

                    <p class="text-lg text-gray-900 mb-8">
                        THIS CERTIFICATION IS HEREBY ISSUED for whatever legal purpose it may serve.
                    </p>

                    <p class="text-lg text-gray-900">
                        DONE this 
                        <span class="font-bold border-b-2 border-gray-400 pb-1 inline-block min-w-[60px] text-center">{{ $day }}</span> 
                        day of 
                        <span class="font-bold border-b-2 border-gray-400 pb-1 inline-block min-w-[120px] text-center">{{ $month }}</span>, 
                        <span class="font-bold border-b-2 border-gray-400 pb-1 inline-block min-w-[80px] text-center">{{ $year }}</span> 
                        at Sogod, Southern Leyte, Philippines.
                    </p>
                </div>

                <!-- Signature Section -->
                <div class="text-center mt-16">
                    <div class="mb-8">
                        <div class="inline-block">
                            <div class="border-t-2 border-gray-800 pt-2">
                                <p class="font-bold text-gray-900">RUEL E. ALTEJAR</p>
                                <p class="text-sm text-gray-700">MPDC</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                
            </div>
        </div>
    </div>
</body>
</html>
