<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land Use Certification | Municipality of Sogod</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .payment-box {
            border: 2px solid #16a34a;
            background: #f0fdf4;
            padding: 15px;
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
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-8">
    <div class="certificate-container w-full max-w-4xl">
        <!-- Print Controls -->
        <div class="no-print mb-6 text-center">
            <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg mr-4">
                <i class="fas fa-print mr-2"></i>Print Certificate
            </button>
            <a href="{{ route('certificate.create') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Back to Form
            </a>
        </div>

        <!-- Certificate -->
        <div class="certificate-border">
            <div class="relative z-10">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-start justify-between">
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
                    <h2 class="text-2xl font-bold text-gray-900 underline">CERTIFICATION</h2>
                </div>

                <!-- Certificate Content -->
                <div class="mb-8">
                    <p class="text-lg text-gray-900 mb-6">TO WHOM IT MAY CONCERN:</p>
                    
                    <p class="text-lg leading-relaxed text-gray-900 mb-6">
                        THIS IS TO CERTIFY that the proposed 
                        <span class="font-bold uppercase border-b-2 border-gray-400 pb-1 inline-block min-w-[200px] text-center">{{ $proposed_activity ?? '_________' }}</span> 
                        of 
                        <span class="font-bold uppercase border-b-2 border-gray-400 pb-1 inline-block min-w-[200px] text-center">{{ $owner_name ?? '_________' }}</span> 
                        located at 
                        <span class="font-bold uppercase border-b-2 border-gray-400 pb-1 inline-block min-w-[200px] text-center">{{ $address ?? '_________' }}</span>, Sogod, Southern Leyte and identified as Tax Dec No. 
                        <span class="font-bold border-b-2 border-gray-400 pb-1 inline-block min-w-[120px] text-center">{{ $tax_dec_no ?? '_________' }}</span> 
                        with a Lot No. 
                        <span class="font-bold border-b-2 border-gray-400 pb-1 inline-block min-w-[120px] text-center">{{ $lot_no ?? '_________' }}</span> 
                        is within the as per Zoning Ordinance of this municipality and conforms to the existing Zoning Plan of the Municipality of Sogod, Southern Leyte for 
                        <span class="font-bold uppercase">{{ $certificate_type === 'business' ? 'BUSINESS PURPOSES' : 'RESIDENTIAL PURPOSES' }}</span>.
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
                <div class="flex justify-between items-start mt-16">
                    <div class="w-1/2">
                        <!-- Payment Box -->
                        @if($or_no || $amount_paid || $date_issued || $valid_until || $gor_serial_no || $date_of_payment)
                        <div class="payment-box">
                            <p class="text-sm font-bold text-green-800 mb-3">PAYMENT DETAILS</p>
                            <div class="grid grid-cols-2 gap-2 text-xs">
                                @if($or_no)
                                <div>
                                    <span class="font-semibold">Paid under O.R. No.:</span> {{ $or_no }}
                                </div>
                                @endif
                                @if($amount_paid)
                                <div>
                                    <span class="font-semibold">Amount Paid:</span> {{ $amount_paid }}
                                </div>
                                @endif
                                @if($date_issued)
                                <div>
                                    <span class="font-semibold">Date Issued:</span> {{ $date_issued }}
                                </div>
                                @endif
                                @if($valid_until)
                                <div>
                                    <span class="font-semibold">Valid Until:</span> {{ $valid_until }}
                                </div>
                                @endif
                                @if($gor_serial_no)
                                <div>
                                    <span class="font-semibold">GOR SERIAL NUMBER:</span> {{ $gor_serial_no }}
                                </div>
                                @endif
                                @if($date_of_payment)
                                <div>
                                    <span class="font-semibold">DATE OF PAYMENT:</span> {{ $date_of_payment }}
                                </div>
                                @endif
                            </div>
                            <p class="text-xs text-center mt-2 font-semibold text-green-800">DOCUMENTARY STAMP TAX PAID</p>
                        </div>
                        @endif
                    </div>
                    
                    <div class="w-1/2 text-right">
                        <div class="mb-8">
                            <div class="inline-block text-left">
                                <div class="border-t-2 border-gray-800 pt-2">
                                    <p class="font-bold text-gray-900">RUEL E. ALTEJAR</p>
                                    <p class="text-sm text-gray-700">MPDC</p>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600 mb-2">APPROVED BY:</p>
                            <div class="inline-block text-left">
                                <div class="border-t-2 border-gray-800 pt-2">
                                    <p class="font-bold text-gray-900">HON. SHEFFERED LINO S. TAN</p>
                                    <p class="text-sm text-gray-700">Municipal Mayor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 text-sm text-gray-600">
                    <p>Certificate No.: {{ date('Y') }}-{{ str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT) }}-{{ str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT) }}</p>
                    <p>Issued on: {{ date('F d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
