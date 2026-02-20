<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Certificate - {{ $certificate_number }}</title>
    <style>
        @page {
            margin: 0;
            size: A4 landscape;
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: white;
        }
        
        .certificate-container {
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .certificate-border {
            width: 90%;
            max-width: 1000px;
            height: 80%;
            background: white;
            border: 8px solid #gold;
            border-radius: 15px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }
        
        .certificate-header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .certificate-header h1 {
            font-size: 32px;
            color: #2c3e50;
            margin: 0;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .certificate-header h2 {
            font-size: 18px;
            color: #7f8c8d;
            margin: 5px 0;
            font-weight: normal;
        }
        
        .certificate-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            width: 100%;
        }
        
        .certificate-title {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .certificate-content {
            font-size: 16px;
            color: #34495e;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .certificate-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            width: 100%;
            border-left: 4px solid #3498db;
        }
        
        .certificate-details h3 {
            color: #2c3e50;
            margin: 0 0 15px 0;
            font-size: 18px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 5px 0;
            border-bottom: 1px solid #ecf0f1;
        }
        
        .detail-label {
            font-weight: bold;
            color: #2c3e50;
            flex: 1;
        }
        
        .detail-value {
            color: #34495e;
            flex: 2;
            text-align: right;
        }
        
        .certificate-footer {
            text-align: center;
            margin-top: 20px;
            width: 100%;
        }
        
        .certificate-signatures {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
            width: 100%;
        }
        
        .signature-box {
            text-align: center;
            width: 200px;
        }
        
        .signature-line {
            border-bottom: 2px solid #2c3e50;
            margin: 40px 0 10px 0;
            height: 1px;
        }
        
        .signature-title {
            font-size: 14px;
            color: #7f8c8d;
            font-weight: bold;
        }
        
        .certificate-number {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #e74c3c;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .certificate-date {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: #27ae60;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .lgu-logo {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #3498db;
        }
        
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
            
            .certificate-container {
                width: 100%;
                height: 100vh;
            }
            
            .certificate-border {
                width: 95%;
                height: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-border">
            <div class="certificate-number">
                {{ $certificate_number }}
            </div>
            
            <div class="certificate-header">
                <img src="{{ asset('assets/logo.png') }}" alt="LGU Logo" class="lgu-logo" onerror="this.style.display='none'">
                <h1>Republic of the Philippines</h1>
                <h2>Province of Southern Leyte</h2>
                <h2>Municipality of Sogod</h2>
                <h2>Office of the Municipal Zoning Administrator</h2>
            </div>
            
            <div class="certificate-body">
                <div class="certificate-title">
                    Certificate of {{ ucfirst($certificate_type) }}
                </div>
                
                <div class="certificate-content">
                    <p>This is to certify that:</p>
                </div>
                
                <div class="certificate-details">
                    <h3>Owner Information</h3>
                    <div class="detail-row">
                        <span class="detail-label">Owner Name:</span>
                        <span class="detail-value">{{ $owner_name }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Address:</span>
                        <span class="detail-value">{{ $address }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Certificate Type:</span>
                        <span class="detail-value">{{ ucfirst($certificate_type) }}</span>
                    </div>
                    @if($issued_date)
                    <div class="detail-row">
                        <span class="detail-label">Issued Date:</span>
                        <span class="detail-value">{{ date('F d, Y', strtotime($issued_date)) }}</span>
                    </div>
                    @endif
                    @if($expiry_date)
                    <div class="detail-row">
                        <span class="detail-label">Expiry Date:</span>
                        <span class="detail-value">{{ date('F d, Y', strtotime($expiry_date)) }}</span>
                    </div>
                    @endif
                </div>
                
                @if($additional_data)
                <div class="certificate-details">
                    <h3>Additional Information</h3>
                    <p>{{ $additional_data }}</p>
                </div>
                @endif
            </div>
            
            <div class="certificate-footer">
                <div class="certificate-signatures">
                    <div class="signature-box">
                        <div class="signature-line"></div>
                        <div class="signature-title">Municipal Zoning Administrator</div>
                    </div>
                    <div class="signature-box">
                        <div class="signature-line"></div>
                        <div class="signature-title">Municipal Mayor</div>
                    </div>
                </div>
            </div>
            
            <div class="certificate-date">
                {{ date('F d, Y', strtotime($created_at)) }}
            </div>
        </div>
    </div>
</body>
</html>
