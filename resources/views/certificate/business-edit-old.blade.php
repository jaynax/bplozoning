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
            body { 
                margin: 0 !important; 
                padding: 0 !important;
                background: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .certificate-container { 
                margin: 0 !important; 
                padding: 0 !important;
                box-shadow: none !important;
                width: 100vw !important;
                height: 100vh !important;
            }
            .certificate-border {
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
                background-size: 100% 100% !important;
                background-image: url('{{ URL::asset("assets/borders/" . ($border_style ?? "0.jpg")) }}') !important;
                background-position: center !important;
                background-repeat: no-repeat !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                width: 100vw !important;
                height: 100vh !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
            }
            .certificate-content {
                position: absolute !important;
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                width: 80% !important;
                height: 80% !important;
                padding: 40px !important;
                background: transparent !important;
            }
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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .certificate-content {
            position: relative;
            z-index: 10;
            background: transparent;
            padding: 40px;
            margin: 0;
            border-radius: 0;
        }
        .official-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }
        .official-table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }
        .label-cell {
            background-color: #f3f4f6;
            font-weight: bold;
            width: 25%;
        }
        .payment-box {
            background-color: #dcfce7;
            border: 2px solid #16a34a;
            padding: 16px;
            border-radius: 8px;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-border">
            <div class="certificate-content">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-center relative">
                        <!-- Logo on Left -->
                        <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-20 w-20 mr-8">
                        
                        <!-- Centered Text -->
                        <div class="text-center">
                            <p class="text-lg text-gray-900">Republic of the Philippines</p>
                            <p class="text-base text-gray-800">Province of Southern Leyte</p>
                            <p class="text-xl font-bold text-gray-900">MUNICIPALITY OF SOGOD</p>
                        </div>
                        
                        <!-- Bagong Pilipinas Logo on Right -->
                        <img src="{{ URL::asset('assets/h.jpg') }}" alt="Bagong Pilipinas Logo" class="h-20 w-20 ml-8">
                    </div>
                    <div class="text-center mt-4">
                        <h1 class="text-lg font-bold text-gray-900 border-b-2 border-gray-900 inline-block">OFFICE OF THE MUNICIPAL PLANNING & DEV. COORDINATOR</h1>
                    </div>
                </div>

                <!-- Certificate Title -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 tracking-widest">BUSINESS ZONING CERTIFICATE</h2>
                </div>

                <!-- Certificate Content -->
                <div class="mb-8">
                    <p class="text-xl font-bold text-gray-900 mb-6 text-left">TO WHOM IT MAY CONCERN:</p>
                    
                    <p class="text-lg leading-relaxed text-gray-900 mb-6">
                        THIS IS TO CERTIFY that the proposed 
                        <span class="font-bold underline">{{ $property_type ?? 'BUSINESS ESTABLISHMENT' }}</span> (
                        <span class="font-bold underline">{{ $occupancy_type ?? 'COMMERCIAL' }}</span>) of 
                        <span class="font-bold underline">{{ $owner_name ?? 'BUSINESS OWNER' }}</span>
                        located at 
                        <span class="font-bold underline">{{ $address ?? 'BUSINESS ADDRESS' }}</span>, Sogod, Southern Leyte and identified as Tax Dec No. 
                        <span class="font-bold underline">{{ $tax_dec_no ?? '_________' }}</span> with a Lot No. 
                        <span class="font-bold underline">{{ $lot_no ?? '_________' }}</span> is within the as per Zoning Ordinance of this municipality.
                    </p>

                    <p class="text-lg leading-relaxed text-gray-900 mb-6">
                        <span class="font-bold">THIS IS TO CERTIFY FURTHER</span> that the above mentioned site is conforms to the existing Zoning Plan of the Municipality.
                    </p>

                    <p class="text-lg leading-relaxed text-gray-900 mb-12">
                        <span class="font-bold">THIS CERTIFICATION IS HEREBY ISSUED</span> for whatever legal purpose it may serve.
                    </p>

                    <p class="text-lg text-gray-900 mb-12">
                        <span class="font-bold">DONE</span> this <span class="font-bold underline">{{ $day ?? '___' }}</span> day of 
                        <span class="font-bold underline">{{ $month ?? '_________' }}</span>, 
                        <span class="font-bold underline">{{ $year ?? '____' }}</span> at Sogod, Southern Leyte, Philippines.
                    </p>

                    <div class="flex justify-end mb-8">
                        <div class="text-center">
                            <p class="font-bold border-b-2 border-gray-900 pb-1">RUEL E. ALTEJAR</p>
                            <p class="text-sm">MPDC</p>
                        </div>
                    </div>

                    <div class="mb-8 text-left">
                        <p class="text-lg text-gray-900">APPROVED BY:</p>
                        <div class="mt-6 pr-20">
                            <p class="font-bold border-b-2 border-gray-900 pb-1 inline-block">HON. SHEFFERED LINO S. TAN</p>
                            <p class="text-sm">Municipal Mayor</p>
                        </div>
                    </div>

                    <div class="payment-box">
                        <p class="text-center font-bold text-green-800 mb-4">NOT VALID WITHOUT SEAL</p>
                        <p class="mb-2"><strong>BZC NO. :</strong> <span class="font-semibold">{{ $bzc_no ?? '_________' }}</span></p>
                        <p class="mb-2"><strong>OR NO. :</strong> <span class="font-semibold">{{ $or_no ?? '_________' }}</span></p>
                        <p class="mb-2"><strong>Date Issued :</strong> <span class="font-semibold">{{ $date_of_issue ?? '_________' }}</span></p>
                        <p class="mb-2"><strong>Amount :</strong> <span class="font-semibold">Php {{ $amount ?? '_________' }}</span></p>
                        <p class="mt-4 font-bold text-center text-green-800">DOCUMENTARY STAMP TAX PAID</p>
                        <div class="mt-3 flex justify-between text-sm">
                            <p><strong>GOR SERIAL NUMBER</strong> <span class="font-semibold">{{ $gor_serial ?? '_________' }}</span></p>
                            <p><strong>DATE OF PAYMENT</strong> <span class="font-semibold">{{ $date_payment ?? '_________' }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
