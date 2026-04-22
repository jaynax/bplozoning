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
                position: relative !important;
                top: auto !important;
                left: auto !important;
                transform: none !important;
                width: 100% !important;
                height: auto !important;
                padding: 80px 20px 20px 60px !important;
                background: transparent !important;
                margin: 0 auto !important;
            }
            /* Fix text for printing - Portrait */
            .certificate-header h1,
            .certificate-header p,
            .certificate-title h1,
            .certificate-title h2,
            .certificate-body p,
            .certificate-body div,
            .payment-box p,
            .payment-box div {
                font-size: 11pt !important;
                line-height: 1.4 !important;
                transform: none !important;
                letter-spacing: normal !important;
                word-spacing: normal !important;
                font-family: 'Times New Roman', Georgia, serif !important;
                position: static !important;
                margin: 0 !important;
                padding: 0 !important;
                display: block !important;
                clear: both !important;
            }
            .certificate-header h1 {
                font-size: 13pt !important;
                font-weight: bold !important;
            }
            .certificate-header p {
                font-size: 11pt !important;
                font-weight: 600 !important;
            }
            .certificate-title h1 {
                font-size: 15pt !important;
                font-weight: bold !important;
            }
            .certificate-title h2 {
                font-size: 13pt !important;
                font-weight: bold !important;
            }
            
            /* Add proper spacing between paragraphs */
            .certificate-content p {
                margin-bottom: 10pt !important;
                margin-top: 0 !important;
                text-align: justify !important;
            }
            
            .certificate-content {
                margin-top: -15px !important;
                margin-left: -25px !important;
            }
            
            .certificate-content p:first-child {
                margin-top: 0 !important;
            }
            
            .certificate-content p:last-child {
                margin-bottom: 0 !important;
            }
            
            /* Fix header text positioning */
            .certificate-header {
                margin-top: 30px !important;
            }
            
            .certificate-title {
                padding-left: 60px !important;
            }
        }
        
        /* Landscape print styles */
        @media print and (orientation: landscape) {
            .certificate-border {
                width: 100vw !important;
                height: 100vh !important;
            }
            .certificate-content {
                position: relative !important;
                top: auto !important;
                left: auto !important;
                transform: none !important;
                width: 100% !important;
                height: auto !important;
                padding: 90px 30px 30px 70px !important;
                background: transparent !important;
                margin: 0 auto !important;
            }
            /* Fix text for printing */
            .certificate-header h1,
            .certificate-header p,
            .certificate-title h1,
            .certificate-title h2,
            .certificate-body p,
            .certificate-body div,
            .payment-box p,
            .payment-box div {
                font-size: 12pt !important;
                line-height: 1.5 !important;
                transform: none !important;
                letter-spacing: normal !important;
                word-spacing: normal !important;
                position: static !important;
                margin: 0 !important;
                padding: 0 !important;
                display: block !important;
                clear: both !important;
            }
            .certificate-header h1 {
                font-size: 14pt !important;
                font-weight: bold !important;
            }
            .certificate-header p {
                font-size: 12pt !important;
                font-weight: 600 !important;
            }
            .certificate-title h1 {
                font-size: 16pt !important;
                font-weight: bold !important;
            }
            .certificate-title h2 {
                font-size: 14pt !important;
                font-weight: bold !important;
            }
            
            /* Add proper spacing between paragraphs */
            .certificate-content p {
                margin-bottom: 12pt !important;
                margin-top: 0 !important;
                text-align: justify !important;
            }
            
            .certificate-content {
                margin-top: -15px !important;
                margin-left: -25px !important;
            }
            
            .certificate-content p:first-child {
                margin-top: 0 !important;
            }
            
            .certificate-content p:last-child {
                margin-bottom: 0 !important;
            }
            
            /* Fix header text positioning */
            .certificate-header {
                margin-top: 30px !important;
            }
            
            .certificate-title {
                padding-left: 70px !important;
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
            padding: 100px 40px 40px 80px;
            margin: 0;
            border-radius: 0;
        }
        .certificate-header {
            color: #000000;
            font-family: 'Times New Roman', 'Georgia', serif;
            font-weight: 400;
            line-height: 1.6;
        }
        .certificate-title {
            color: #000000;
            font-family: 'Times New Roman', 'Georgia', serif;
            font-weight: 700;
            letter-spacing: 1px;
            padding-left: 80px;
        }
        .certificate-content {
            color: #000000;
            font-family: 'Times New Roman', 'Georgia', serif;
            font-size: 16px;
            line-height: 1.8;
            text-align: justify;
            margin-top: -20px;
            margin-left: -30px;
        }
        .payment-box {
            border: 2px solid #16a34a;
            background: #f0fdf4;
            padding: 15px;
        }
        .landscape-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 500px;
        }
        .bagong-pilipinas-logo {
            width: 80px;
            height: 80px; 
            object-fit: cover;
        }
        /* Background Designs */
        .bg-clean {
            border: 3px solid #000080;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 0, 128, 0.1);
        }
        .bg-clean::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 1px solid #000080;
            opacity: 0.3;
        }
        .bg-elegant {
            border: 3px solid #000080;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 0, 128, 0.1);
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(0, 0, 128, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(0, 0, 128, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 0, 128, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(0, 0, 128, 0.03) 0%, transparent 50%);
        }
        .bg-elegant::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 1px solid #000080;
            opacity: 0.3;
        }
        .bg-elegant::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M10,10 Q50,5 90,10 Q95,50 90,90 Q50,95 10,90 Q5,50 10,10' stroke='%23000080' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3C/svg%3E"),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M10,10 Q50,5 90,10 Q95,50 90,90 Q50,95 10,90 Q5,50 10,10' stroke='%23000080' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3C/svg%3E");
            background-size: 150px 150px, 150px 150px;
            background-position: top left, bottom right;
            background-repeat: no-repeat;
            opacity: 0.15;
            z-index: 1;
        }
        .bg-classic {
            border: 3px solid #8B4513;
            padding: 40px;
            background: linear-gradient(45deg, #FFF8DC 25%, #FFFAF0 25%, #FFFAF0 50%, #FFF8DC 50%, #FFF8DC 75%, #FFFAF0 75%, #FFFAF0);
            background-size: 20px 20px;
            position: relative;
            box-shadow: 0 0 20px rgba(139, 69, 19, 0.2);
        }
        .bg-classic::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 2px solid #8B4513;
            opacity: 0.4;
        }
        .bg-classic::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 250px;
            height: 250px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Ctext x='50%25' y='50%25' font-family='Times New Roman' font-size='18' fill='%238B4513' opacity='0.08' text-anchor='middle' dominant-baseline='middle' transform='rotate(-45 100 100)'%3EOFFICIAL CERTIFICATE%3C/text%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.2;
            z-index: 1;
        }
        .bg-modern {
            border: 3px solid #14B8A6;
            padding: 40px;
            background: linear-gradient(135deg, #F0FDFA 0%, #E0F2FE 50%, #F0FDFA 100%);
            position: relative;
            box-shadow: 0 0 20px rgba(20, 184, 166, 0.2);
        }
        .bg-modern::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 1px solid #14B8A6;
            opacity: 0.4;
        }
        .bg-modern::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(45deg, transparent 48%, rgba(20, 184, 166, 0.1) 50%, transparent 52%),
                linear-gradient(-45deg, transparent 48%, rgba(59, 130, 246, 0.1) 50%, transparent 52%);
            background-size: 100px 100px;
            z-index: 1;
        }
        .bg-royal {
            border: 3px solid #7C3AED;
            padding: 40px;
            background: linear-gradient(135deg, #FAF5FF 0%, #FDF2F8 50%, #FAF5FF 100%);
            position: relative;
            box-shadow: 0 0 20px rgba(124, 58, 237, 0.2);
        }
        .bg-royal::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 2px solid #7C3AED;
            opacity: 0.3;
        }
        .bg-royal::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(124, 58, 237, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(236, 72, 153, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(124, 58, 237, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(236, 72, 153, 0.05) 0%, transparent 50%);
            z-index: 1;
        }
        .bg-minimal {
            border: 1px solid #6B7280;
            padding: 40px;
            background: #FFFFFF;
            position: relative;
            box-shadow: 0 0 10px rgba(107, 114, 128, 0.1);
        }
        .bg-minimal::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid #E5E7EB;
            opacity: 0.8;
        }
        .bg-sideborder {
            border: 3px solid #059669;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(5, 150, 105, 0.2);
        }
        .bg-sideborder::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 15px;
            background: linear-gradient(to bottom, #10B981, #059669, #10B981);
            z-index: 1;
        }
        .bg-sideborder::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 15px;
            background: linear-gradient(to bottom, #10B981, #059669, #10B981);
            z-index: 1;
        }
        .bg-corner {
            border: 3px solid #DC2626;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.2);
        }
        .bg-corner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 30px;
            height: 30px;
            border-top: 4px solid #EF4444;
            border-left: 4px solid #EF4444;
            z-index: 1;
        }
        .bg-corner::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 30px;
            height: 30px;
            border-top: 4px solid #EF4444;
            border-right: 4px solid #EF4444;
            z-index: 1;
        }
        .bg-corner .corner-bottom-left {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 30px;
            border-bottom: 4px solid #EF4444;
            border-left: 4px solid #EF4444;
            z-index: 1;
        }
        .bg-corner .corner-bottom-right {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 30px;
            height: 30px;
            border-bottom: 4px solid #EF4444;
            border-right: 4px solid #EF4444;
            z-index: 1;
        }
        .bg-frame {
            border: 4px solid #4F46E5;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(79, 70, 229, 0.2);
        }
        .bg-frame::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 2px solid #818CF8;
            z-index: 1;
        }
        .bg-frame::after {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px solid #C7D2FE;
            z-index: 1;
        }
        .bg-ornamental {
            border: 3px solid #D97706;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(217, 119, 6, 0.2);
        }
        .bg-ornamental::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(to right, #FDE68A, #F59E0B, #FDE68A);
            z-index: 1;
        }
        .bg-ornamental::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(to right, #FDE68A, #F59E0B, #FDE68A);
            z-index: 1;
        }
        .bg-ornamental .side-left {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to bottom, #FDE68A, #F59E0B, #FDE68A);
            z-index: 1;
        }
        .bg-ornamental .side-right {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to bottom, #FDE68A, #F59E0B, #FDE68A);
            z-index: 1;
        }
        .bg-vintage {
            border: 4px solid #C2410C;
            padding: 40px;
            background: linear-gradient(45deg, #FFF7ED 25%, #FED7AA 25%, #FED7AA 50%, #FFF7ED 50%, #FFF7ED 75%, #FED7AA 75%, #FED7AA);
            background-size: 10px 10px;
            position: relative;
            box-shadow: 0 0 20px rgba(194, 65, 12, 0.2);
        }
        .bg-vintage::before {
            content: '';
            position: absolute;
            inset: 8px;
            border: 4px double #FB923C;
            z-index: 1;
        }
        .bg-vintage::after {
            content: '';
            position: absolute;
            inset: 16px;
            border: 2px dotted #FDBA74;
            z-index: 1;
        }
        .bg-elegantborder {
            border: 3px solid #BE185D;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(190, 24, 93, 0.2);
        }
        .bg-elegantborder::before {
            content: '';
            position: absolute;
            inset: 0;
            border: 2px solid #F9A8D4;
            border-radius: 4px;
            z-index: 1;
        }
        .bg-elegantborder::after {
            content: '';
            position: absolute;
            inset: 4px;
            border: 1px solid #FBCFE8;
            border-radius: 2px;
            z-index: 1;
        }
        .bg-elegantborder .inner-border {
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            border: 1px solid #FCE7F3;
            border-radius: 1px;
            z-index: 1;
        }
        .bg-stripes {
            border: 3px solid #2563EB;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(37, 99, 235, 0.2);
        }
        .bg-stripes::before {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                45deg,
                #DBEAFE,
                #DBEAFE 3px,
                white 3px,
                white 8px
            );
            z-index: 1;
        }
        .bg-stripes::after {
            content: '';
            position: absolute;
            inset: 10px;
            border: 2px solid #93C5FD;
            z-index: 2;
        }
        .bg-spots {
            border: 3px solid #059669;
            padding: 40px;
            background: #F0FDF4;
            position: relative;
            box-shadow: 0 0 20px rgba(5, 150, 105, 0.2);
        }
        .bg-spots::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, #86EFAC 3px, transparent 3px),
                radial-gradient(circle at 80% 20%, #86EFAC 3px, transparent 3px),
                radial-gradient(circle at 20% 80%, #86EFAC 3px, transparent 3px),
                radial-gradient(circle at 80% 80%, #86EFAC 3px, transparent 3px),
                radial-gradient(circle at 50% 30%, #BBF7D0 2px, transparent 2px),
                radial-gradient(circle at 50% 70%, #BBF7D0 2px, transparent 2px),
                radial-gradient(circle at 30% 50%, #BBF7D0 2px, transparent 2px),
                radial-gradient(circle at 70% 50%, #BBF7D0 2px, transparent 2px);
            z-index: 1;
        }
        .bg-spots::after {
            content: '';
            position: absolute;
            inset: 10px;
            border: 2px solid #6EE7B7;
            z-index: 2;
        }
        .bg-dots {
            border: 3px solid #9333EA;
            padding: 40px;
            background: #FAF5FF;
            position: relative;
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.2);
        }
        .bg-dots::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, #A78BFA 1.5px, transparent 1.5px);
            background-size: 10px 10px;
            z-index: 1;
        }
        .bg-dots::after {
            content: '';
            position: absolute;
            inset: 10px;
            border: 2px solid #C4B5FD;
            z-index: 2;
        }
        .bg-chevron {
            border: 3px solid #DC2626;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.2);
        }
        .bg-chevron::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(45deg, #FEE2E2 25%, transparent 25%, transparent 75%, #FEE2E2 75%, #FEE2E2),
                linear-gradient(45deg, #FEE2E2 25%, transparent 25%, transparent 75%, #FEE2E2 75%, #FEE2E2);
            background-size: 12px 12px;
            background-position: 0 0, 6px 6px;
            z-index: 1;
        }
        .bg-chevron::after {
            content: '';
            position: absolute;
            inset: 10px;
            border: 2px solid #FCA5A5;
            z-index: 2;
        }
        .bg-ribbon {
            border: 3px solid #2563EB;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(37, 99, 235, 0.2);
        }
        .bg-ribbon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 12px;
            background: linear-gradient(to right, #DBEAFE, #3B82F6, #DBEAFE);
            z-index: 1;
        }
        .bg-ribbon::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 12px;
            background: linear-gradient(to right, #DBEAFE, #3B82F6, #DBEAFE);
            z-index: 1;
        }
        .bg-medallion {
            border: 3px solid #CA8A04;
            padding: 40px;
            background: #FEF3C7;
            position: relative;
            box-shadow: 0 0 20px rgba(202, 138, 4, 0.2);
        }
        .bg-medallion::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
            border: 8px solid #FCD34D;
            border-radius: 50%;
            z-index: 1;
        }
        .bg-medallion::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 120px;
            border: 4px solid #F59E0B;
            border-radius: 50%;
            z-index: 1;
        }
        .bg-laurel {
            border: 3px solid #059669;
            padding: 40px;
            background: #ECFDF5;
            position: relative;
            box-shadow: 0 0 20px rgba(5, 150, 105, 0.2);
        }
        .bg-laurel::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            border: 3px solid #6EE7B7;
            border-radius: 50%;
            z-index: 1;
        }
        .bg-laurel::after {
            content: '';
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border: 3px solid #6EE7B7;
            border-radius: 50%;
            z-index: 1;
        }
        .bg-wave {
            border: 3px solid #0891B2;
            padding: 40px;
            background: white;
            position: relative;
            box-shadow: 0 0 20px rgba(8, 145, 178, 0.2);
        }
        .bg-wave::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 15px;
            background: linear-gradient(to right, #E0F2FE, #06B6D4, #E0F2FE);
            clip-path: ellipse(100% 100% at 50% 0%);
            z-index: 1;
        }
        .bg-wave::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 15px;
            background: linear-gradient(to right, #E0F2FE, #06B6D4, #E0F2FE);
            clip-path: ellipse(100% 100% at 50% 100%);
            z-index: 1;
        }
        .bg-star {
            border: 3px solid #7C3AED;
            padding: 40px;
            background: #F3E8FF;
            position: relative;
            box-shadow: 0 0 20px rgba(124, 58, 237, 0.2);
        }
        .bg-star::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            width: 30px;
            height: 30px;
            background: linear-gradient(45deg, #DDD6FE, #A78BFA, #DDD6FE);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            z-index: 1;
        }
        .bg-star::after {
            content: '';
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 30px;
            height: 30px;
            background: linear-gradient(45deg, #DDD6FE, #A78BFA, #DDD6FE);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            z-index: 1;
        }
        .bg-seal {
            border: 3px solid #DC2626;
            padding: 40px;
            background: #FEF2F2;
            position: relative;
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.2);
        }
        .bg-seal::before {
            content: '';
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border: 4px solid #FCA5A5;
            border-radius: 50%;
            z-index: 1;
        }
        .bg-seal::after {
            content: '';
            position: absolute;
            bottom: 30px;
            right: 30px;
            width: 40px;
            height: 40px;
            border: 2px solid #F87171;
            border-radius: 50%;
            z-index: 1;
        }
        .bg-emblem {
            border: 3px solid #4338CA;
            padding: 40px;
            background: #EEF2FF;
            position: relative;
            box-shadow: 0 0 20px rgba(67, 56, 202, 0.2);
        }
        .bg-emblem::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
            width: 100px;
            height: 100px;
            border: 4px solid #A5B4FC;
            z-index: 1;
        }
        .bg-emblem::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
            width: 60px;
            height: 60px;
            border: 2px solid #818CF8;
            z-index: 1;
        }
        .bg-oceanwave {
            border: 3px solid #0EA5E9;
            padding: 40px;
            background: #F0F9FF;
            position: relative;
            box-shadow: 0 0 20px rgba(14, 165, 233, 0.2);
        }
        .bg-oceanwave::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: linear-gradient(to bottom, #BAE6FD, #7DD3FC, transparent);
            clip-path: polygon(0 50%, 25% 0%, 50% 50%, 75% 0%, 100% 50%, 100% 100%, 0% 100%);
            z-index: 1;
        }
        .bg-oceanwave::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: linear-gradient(to top, #BAE6FD, #7DD3FC, transparent);
            clip-path: polygon(0 0%, 25% 50%, 50% 0%, 75% 50%, 100% 0%, 100% 100%, 0% 100%);
            z-index: 1;
        }
        .bg-ripplewave {
            border: 3px solid #14B8A6;
            padding: 40px;
            background: #F0FDFA;
            position: relative;
            box-shadow: 0 0 20px rgba(20, 184, 166, 0.2);
        }
        .bg-ripplewave::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            border: 4px solid #5EEAD4;
            border-radius: 50%;
            opacity: 0.3;
            z-index: 1;
        }
        .bg-ripplewave::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
            border: 3px solid #2DD4BF;
            border-radius: 50%;
            opacity: 0.4;
            z-index: 1;
        }
        .bg-zigzagwave {
            border: 3px solid #9333EA;
            padding: 40px;
            background: #FAF5FF;
            position: relative;
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.2);
        }
        .bg-zigzagwave::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 12px;
            background: #E9D5FF;
            clip-path: polygon(0 0%, 10% 100%, 20% 0%, 30% 100%, 40% 0%, 50% 100%, 60% 0%, 70% 100%, 80% 0%, 90% 100%, 100% 0%, 100% 100%, 0% 100%);
            z-index: 1;
        }
        .bg-zigzagwave::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 12px;
            background: #E9D5FF;
            clip-path: polygon(0 100%, 10% 0%, 20% 100%, 30% 0%, 40% 100%, 50% 0%, 60% 100%, 70% 0%, 80% 100%, 90% 0%, 100% 100%, 100% 0%, 0% 0%);
            z-index: 1;
        }
        .bg-flowwave {
            border: 3px solid #22C55E;
            padding: 40px;
            background: #F0FDF4;
            position: relative;
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.2);
        }
        .bg-flowwave::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 25px;
            background: linear-gradient(to bottom, #BBF7D0, transparent);
            clip-path: ellipse(100% 100% at 50% 0%);
            z-index: 1;
        }
        .bg-flowwave::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 25px;
            background: linear-gradient(to top, #BBF7D0, transparent);
            clip-path: ellipse(100% 100% at 50% 100%);
            z-index: 1;
        }
        .bg-spiralwave {
            border: 3px solid #F97316;
            padding: 40px;
            background: #FFF7ED;
            position: relative;
            box-shadow: 0 0 20px rgba(249, 115, 22, 0.2);
        }
        .bg-spiralwave::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 250px;
            height: 250px;
            border: 6px solid #FED7AA;
            border-radius: 50%;
            opacity: 0.3;
            z-index: 1;
        }
        .bg-spiralwave::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150px;
            height: 150px;
            border: 4px dashed #FDBA74;
            border-radius: 50%;
            opacity: 0.5;
            z-index: 1;
        }
        .bg-waveborder {
            border: 3px solid #06B6D4;
            padding: 40px;
            background: #ECFEFF;
            position: relative;
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.2);
        }
        .bg-waveborder::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 15px;
            background: linear-gradient(to bottom, #A5F3FC, transparent);
            clip-path: polygon(0 0%, 5% 50%, 10% 0%, 15% 50%, 20% 0%, 25% 50%, 30% 0%, 35% 50%, 40% 0%, 45% 50%, 50% 0%, 55% 50%, 60% 0%, 65% 50%, 70% 0%, 75% 50%, 80% 0%, 85% 50%, 90% 0%, 95% 50%, 100% 0%, 100% 100%, 0% 100%);
            z-index: 1;
        }
        .bg-waveborder::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 15px;
            background: linear-gradient(to top, #A5F3FC, transparent);
            clip-path: polygon(0 100%, 5% 50%, 10% 100%, 15% 50%, 20% 100%, 25% 50%, 30% 100%, 35% 50%, 40% 100%, 45% 50%, 50% 100%, 55% 50%, 60% 100%, 65% 50%, 70% 100%, 75% 50%, 80% 100%, 85% 50%, 90% 100%, 95% 50%, 100% 100%, 100% 0%, 0% 0%);
            z-index: 1;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-8">
    <div class="w-full max-w-5xl">
        <!-- Print Controls -->
        <div class="no-print mb-6 text-center">
            <div class="mb-4">
                <label class="text-sm font-medium text-gray-700 mr-4">Layout:</label>
                <button onclick="setPortrait()" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg mr-2">
                    <i class="fas fa-file-alt mr-2"></i>Portrait
                </button>
                <button onclick="setLandscape()" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg mr-4">
                    <i class="fas fa-file-image mr-2"></i>Landscape
                </button>
            </div>
           
               
            
            <div>
                <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg mr-4">
                    <i class="fas fa-print mr-2"></i>Print Certificate
                </button>
                <a href="{{ route('certificate.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i>Certificates
                </a>
            </div>
        </div>

        <!-- Certificate -->
        <div class="certificate-border">
            <div class="certificate-content">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-center relative">
                        <!-- Logo on Left -->
                        <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-20 w-20 mr-8">
                        
                        <!-- Centered Text -->
                        <div class="certificate-header text-center">
                            <h1 class="text-xl font-bold">Republic of the Philippines</h1>
                            <p class="text-lg font-semibold">Province of Southern Leyte</p>
                            <p class="text-base font-bold">MUNICIPALITY OF SOGOD</p>
                        </div>
                        
                        <!-- Bagong Pilipinas Logo on Right -->
                        <img src="{{ URL::asset('assets/h.jpg') }}" alt="Bagong Pilipinas Logo" class="bagong-pilipinas-logo ml-8">
                    </div>
                </div>

                <!-- Certificate Title -->
                <div class="text-center mb-8" style="margin-top: 20px;">
                    <h2 class="font-bold certificate-title underline" style="font-family: 'Broadway', sans-serif; font-size: 20px; color: #000080; padding-left: 20px;">OFFICE OF THE MUNICIPAL PLANNING & DEV. COORDINATOR</h2>
                    <h3 class="font-bold certificate-title mt-4" style="font-family: 'Lucida Handwriting', cursive; font-size: 48px; color: #000080;">CERTIFICATION</h3>
                </div>

                <!-- Certificate Content -->
                <div class="mb-8 certificate-content">
                    <p class="text-xl font-bold text-gray-900 mb-6 text-left">TO WHOM IT MAY CONCERN:</p>
                    
                    <p class="text-lg leading-relaxed text-gray-900 mb-6">
                        THIS IS TO CERTIFY that the Business Permit of 
                        <span class="font-bold underline">{{ $owner_name ?? '_________' }}</span> 
                        located at 
                        <span class="font-bold underline">{{ $address ?? '_________' }}</span>, Sogod, Southern Leyte has already a Land Use Certification issued by this office in support of his/her new application of Business Permit.
                    </p>

                    <p class="text-lg leading-relaxed text-gray-900 mb-6">
                        <span class="font-bold">THIS CERTIFICATION IS HEREBY ISSUED</span> for whatever legal purpose it may serve.
                    </p>

                    <p class="text-lg text-gray-900 mb-12">
                        <span class="font-bold">DONE</span> this 
                        <span class="font-bold underline">{{ $day }}</span> 
                        day of 
                        <span class="font-bold underline">{{ $month }}</span>, 
                        <span class="font-bold underline">{{ $year }}</span> 
                        at Sogod, Southern Leyte, Philippines.
                    </p>
                </div>

                <!-- Signature Section -->
                <div class="text-center mt-16">
                    <div class="mb-8">
                        <div class="inline-block">
                            <div class="border-t-2 border-gray-800 pt-2">
                                <p class="font-bold certificate-header">RUEL E. ALTEJAR</p>
                                <p class="text-sm certificate-header">MPDC</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                
                </div>
            </div>
        </div>
    </div>

    <script>
        // Certificate is ready for printing
    </script>
</body>
</html>