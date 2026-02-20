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
        .certificate-border::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border: 1px solid #000080;
            opacity: 0.3;
        }
        .certificate-border::after {
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
        }
        .certificate-content {
            color: #000000;
            font-family: 'Times New Roman', 'Georgia', serif;
            font-size: 16px;
            line-height: 1.8;
            text-align: justify;
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
    <div class="certificate-container w-full max-w-5xl">
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
            <div class="mb-4">
                <label class="text-sm font-medium text-gray-700 mr-4 block mb-3">Certificate Design:</label>
                <div class="flex justify-center">
                    <button onclick="toggleDesignPanel()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg flex items-center">
                        <i class="fas fa-palette mr-2"></i>
                        <span id="current-design-text">Elegant Design</span>
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                </div>
                
                <!-- Design Panel (Hidden by default) -->
                <div id="design-panel" class="hidden mt-4 bg-white border-2 border-gray-300 rounded-lg shadow-xl p-4 max-w-4xl mx-auto">
                    <div class="grid grid-cols-4 gap-4 mb-4">
                        <!-- Clean Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-blue-400 transition-all" onclick="selectDesign('clean')">
                            <div class="w-full h-20 bg-white border-2 border-blue-800 rounded mb-2 flex items-center justify-center">
                                <div class="text-xs text-center">
                                    <div class="w-6 h-6 bg-blue-800 rounded-full mx-auto mb-1"></div>
                                    <div class="text-blue-800 font-bold text-xs">Clean</div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Clean Design</p>
                        </div>
                        
                        <!-- Elegant Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-indigo-400 transition-all" onclick="selectDesign('elegant')">
                            <div class="w-full h-20 bg-white border-2 border-blue-800 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-3 h-3 bg-blue-200 rounded-full opacity-30"></div>
                                <div class="absolute top-0 right-0 w-3 h-3 bg-blue-200 rounded-full opacity-30"></div>
                                <div class="absolute bottom-0 left-0 w-3 h-3 bg-blue-200 rounded-full opacity-30"></div>
                                <div class="absolute bottom-0 right-0 w-3 h-3 bg-blue-200 rounded-full opacity-30"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-blue-800 rounded-full mx-auto mb-1"></div>
                                        <div class="text-blue-800 font-bold text-xs">Elegant</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Elegant Design</p>
                        </div>
                        
                        <!-- Classic Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-amber-400 transition-all" onclick="selectDesign('classic')">
                            <div class="w-full h-20 bg-amber-50 border-2 border-amber-700 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0" style="background: repeating-linear-gradient(45deg, transparent, transparent 2px, rgba(139, 69, 19, 0.1) 2px, rgba(139, 69, 19, 0.1) 4px);"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-amber-700 rounded-full mx-auto mb-1"></div>
                                        <div class="text-amber-800 font-bold text-xs">Classic</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Classic Design</p>
                        </div>
                        
                        <!-- Modern Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-teal-400 transition-all" onclick="selectDesign('modern')">
                            <div class="w-full h-20 bg-gradient-to-br from-teal-50 to-blue-50 border-2 border-teal-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-teal-400 to-blue-400"></div>
                                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-teal-400"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-gradient-to-br from-teal-500 to-blue-500 rounded-full mx-auto mb-1"></div>
                                        <div class="text-teal-700 font-bold text-xs">Modern</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Modern Design</p>
                        </div>
                        
                        <!-- Royal Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-purple-400 transition-all" onclick="selectDesign('royal')">
                            <div class="w-full h-20 bg-gradient-to-br from-purple-50 to-pink-50 border-2 border-purple-700 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-1 left-1 w-4 h-4 border-2 border-purple-600 rounded-full"></div>
                                    <div class="absolute top-1 right-1 w-4 h-4 border-2 border-purple-600 rounded-full"></div>
                                    <div class="absolute bottom-1 left-1 w-4 h-4 border-2 border-purple-600 rounded-full"></div>
                                    <div class="absolute bottom-1 right-1 w-4 h-4 border-2 border-purple-600 rounded-full"></div>
                                </div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-gradient-to-br from-purple-600 to-pink-500 rounded-full mx-auto mb-1"></div>
                                        <div class="text-purple-700 font-bold text-xs">Royal</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Royal Design</p>
                        </div>
                        
                        <!-- Minimal Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-gray-400 transition-all" onclick="selectDesign('minimal')">
                            <div class="w-full h-20 bg-gray-50 border border-gray-400 rounded mb-2 flex items-center justify-center">
                                <div class="text-xs text-center">
                                    <div class="w-6 h-6 bg-gray-300 rounded mx-auto mb-1"></div>
                                    <div class="text-gray-600 font-bold text-xs">Minimal</div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Minimal Design</p>
                        </div>
                        
                        <!-- Side Border Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-green-400 transition-all" onclick="selectDesign('sideborder')">
                            <div class="w-full h-20 bg-white border-2 border-green-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 bottom-0 w-2 bg-green-200"></div>
                                <div class="absolute top-0 right-0 bottom-0 w-2 bg-green-200"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-green-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-green-700 font-bold text-xs">Side</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Side Border</p>
                        </div>
                        
                        <!-- Corner Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-red-400 transition-all" onclick="selectDesign('corner')">
                            <div class="w-full h-20 bg-white border-2 border-red-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-4 h-4 border-t-2 border-l-2 border-red-400"></div>
                                <div class="absolute top-0 right-0 w-4 h-4 border-t-2 border-r-2 border-red-400"></div>
                                <div class="absolute bottom-0 left-0 w-4 h-4 border-b-2 border-l-2 border-red-400"></div>
                                <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-red-400"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-red-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-red-700 font-bold text-xs">Corner</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Corner Design</p>
                        </div>
                        
                        <!-- Frame Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-indigo-400 transition-all" onclick="selectDesign('frame')">
                            <div class="w-full h-20 bg-white border-2 border-indigo-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-1 border border-indigo-300 rounded"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-indigo-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-indigo-700 font-bold text-xs">Frame</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Frame Design</p>
                        </div>
                        
                        <!-- Ornamental Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-yellow-400 transition-all" onclick="selectDesign('ornamental')">
                            <div class="w-full h-20 bg-white border-2 border-yellow-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-200 via-yellow-400 to-yellow-200"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-200 via-yellow-400 to-yellow-200"></div>
                                <div class="absolute top-0 left-0 bottom-0 w-1 bg-gradient-to-b from-yellow-200 via-yellow-400 to-yellow-200"></div>
                                <div class="absolute top-0 right-0 bottom-0 w-1 bg-gradient-to-b from-yellow-200 via-yellow-400 to-yellow-200"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-yellow-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-yellow-700 font-bold text-xs">Ornament</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Ornamental</p>
                        </div>
                        
                        <!-- Vintage Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-orange-400 transition-all" onclick="selectDesign('vintage')">
                            <div class="w-full h-20 bg-orange-50 border-2 border-orange-700 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0 border-2 border-double border-orange-300"></div>
                                <div class="absolute inset-1 border border-dotted border-orange-400"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-orange-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-orange-700 font-bold text-xs">Vintage</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Vintage Design</p>
                        </div>
                        
                        <!-- Elegant Border Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-pink-400 transition-all" onclick="selectDesign('elegantborder')">
                            <div class="w-full h-20 bg-white border-2 border-pink-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0 border border-pink-200 rounded"></div>
                                <div class="absolute inset-0.5 border border-pink-300 rounded"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-pink-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-pink-700 font-bold text-xs">Elegant</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Elegant Border</p>
                        </div>
                        
                        <!-- Stripes Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-blue-400 transition-all" onclick="selectDesign('stripes')">
                            <div class="w-full h-20 bg-white border-2 border-blue-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0" style="background: repeating-linear-gradient(45deg, #DBEAFE, #DBEAFE 2px, white 2px, white 6px);"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-blue-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-blue-700 font-bold text-xs">Stripes</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Stripes Design</p>
                        </div>
                        
                        <!-- Spots Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-green-400 transition-all" onclick="selectDesign('spots')">
                            <div class="w-full h-20 bg-green-50 border-2 border-green-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0">
                                    <div class="absolute top-1 left-1 w-2 h-2 bg-green-300 rounded-full opacity-50"></div>
                                    <div class="absolute top-1 right-1 w-2 h-2 bg-green-300 rounded-full opacity-50"></div>
                                    <div class="absolute bottom-1 left-1 w-2 h-2 bg-green-300 rounded-full opacity-50"></div>
                                    <div class="absolute bottom-1 right-1 w-2 h-2 bg-green-300 rounded-full opacity-50"></div>
                                </div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-green-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-green-700 font-bold text-xs">Spots</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Spots Design</p>
                        </div>
                        
                        <!-- Dots Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-purple-400 transition-all" onclick="selectDesign('dots')">
                            <div class="w-full h-20 bg-purple-50 border-2 border-purple-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0" style="background-image: radial-gradient(circle, #9333EA 1px, transparent 1px); background-size: 6px 6px; opacity: 0.2;"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-purple-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-purple-700 font-bold text-xs">Dots</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Dots Design</p>
                        </div>
                        
                        <!-- Chevron Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-red-400 transition-all" onclick="selectDesign('chevron')">
                            <div class="w-full h-20 bg-white border-2 border-red-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0" style="background-image: linear-gradient(45deg, #FEE2E2 25%, transparent 25%, transparent 75%, #FEE2E2 75%, #FEE2E2), linear-gradient(45deg, #FEE2E2 25%, transparent 25%, transparent 75%, #FEE2E2 75%, #FEE2E2); background-size: 8px 8px; background-position: 0 0, 4px 4px;"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-red-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-red-700 font-bold text-xs">Chevron</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Chevron Design</p>
                        </div>
                        
                        <!-- Ribbon Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-blue-400 transition-all" onclick="selectDesign('ribbon')">
                            <div class="w-full h-20 bg-white border-2 border-blue-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 right-0 h-3 bg-gradient-to-r from-blue-200 via-blue-400 to-blue-200"></div>
                                <div class="absolute top-3 left-0 right-0 h-1 bg-blue-300"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-3 bg-gradient-to-r from-blue-200 via-blue-400 to-blue-200"></div>
                                <div class="absolute bottom-3 left-0 right-0 h-1 bg-blue-300"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-blue-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-blue-700 font-bold text-xs">Ribbon</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Ribbon Design</p>
                        </div>
                        
                        <!-- Medallion Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-yellow-400 transition-all" onclick="selectDesign('medallion')">
                            <div class="w-full h-20 bg-yellow-50 border-2 border-yellow-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-12 h-12 border-4 border-yellow-400 rounded-full"></div>
                                    <div class="w-8 h-8 border-2 border-yellow-500 rounded-full absolute"></div>
                                    <div class="w-4 h-4 bg-yellow-600 rounded-full absolute"></div>
                                </div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center relative z-10">
                                        <div class="w-6 h-6 bg-yellow-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-yellow-700 font-bold text-xs">Medallion</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Medallion Design</p>
                        </div>
                        
                        <!-- Laurel Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-green-400 transition-all" onclick="selectDesign('laurel')">
                            <div class="w-full h-20 bg-green-50 border-2 border-green-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-2 left-2 w-6 h-6 border-2 border-green-400 rounded-full"></div>
                                <div class="absolute top-2 right-2 w-6 h-6 border-2 border-green-400 rounded-full"></div>
                                <div class="absolute bottom-2 left-2 w-6 h-6 border-2 border-green-400 rounded-full"></div>
                                <div class="absolute bottom-2 right-2 w-6 h-6 border-2 border-green-400 rounded-full"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-green-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-green-700 font-bold text-xs">Laurel</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Laurel Design</p>
                        </div>
                        
                        <!-- Wave Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-cyan-400 transition-all" onclick="selectDesign('wave')">
                            <div class="w-full h-20 bg-white border-2 border-cyan-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 right-0 h-4 bg-gradient-to-r from-cyan-200 via-cyan-400 to-cyan-200" style="clip-path: ellipse(100% 100% at 50% 0%);"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-4 bg-gradient-to-r from-cyan-200 via-cyan-400 to-cyan-200" style="clip-path: ellipse(100% 100% at 50% 100%); transform: rotate(180deg);"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-cyan-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-cyan-700 font-bold text-xs">Wave</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Wave Design</p>
                        </div>
                        
                        <!-- Star Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-purple-400 transition-all" onclick="selectDesign('star')">
                            <div class="w-full h-20 bg-purple-50 border-2 border-purple-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-2 left-2 text-purple-300">★</div>
                                <div class="absolute top-2 right-2 text-purple-300">★</div>
                                <div class="absolute bottom-2 left-2 text-purple-300">★</div>
                                <div class="absolute bottom-2 right-2 text-purple-300">★</div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-purple-200 text-2xl">★</div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-purple-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-purple-700 font-bold text-xs">Star</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Star Design</p>
                        </div>
                        
                        <!-- Seal Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-red-400 transition-all" onclick="selectDesign('seal')">
                            <div class="w-full h-20 bg-red-50 border-2 border-red-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-10 h-10 border-2 border-red-400 rounded-full flex items-center justify-center">
                                    <div class="w-6 h-6 border border-red-500 rounded-full flex items-center justify-center">
                                        <div class="w-3 h-3 bg-red-600 rounded-full"></div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-red-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-red-700 font-bold text-xs">Seal</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Seal Design</p>
                        </div>
                        
                        <!-- Emblem Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-indigo-400 transition-all" onclick="selectDesign('emblem')">
                            <div class="w-full h-20 bg-indigo-50 border-2 border-indigo-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-8 h-8 border-2 border-indigo-400 rotate-45"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-6 h-6 border border-indigo-500 rotate-45"></div>
                                <div class="flex items-center justify-center h-full relative">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-indigo-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-indigo-700 font-bold text-xs">Emblem</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Emblem Design</p>
                        </div>
                        
                        <!-- Ocean Wave Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-blue-400 transition-all" onclick="selectDesign('oceanwave')">
                            <div class="w-full h-20 bg-blue-50 border-2 border-blue-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 right-0 h-6 bg-gradient-to-b from-blue-200 via-blue-300 to-transparent"></div>
                                <div class="absolute top-2 left-0 right-0 h-4 bg-gradient-to-b from-blue-100 via-blue-200 to-transparent" style="clip-path: polygon(0 50%, 25% 0%, 50% 50%, 75% 0%, 100% 50%, 100% 100%, 0% 100%);"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-6 bg-gradient-to-t from-blue-200 via-blue-300 to-transparent"></div>
                                <div class="absolute bottom-2 left-0 right-0 h-4 bg-gradient-to-t from-blue-100 via-blue-200 to-transparent" style="clip-path: polygon(0 0%, 25% 50%, 50% 0%, 75% 50%, 100% 0%, 100% 100%, 0% 100%);"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-blue-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-blue-700 font-bold text-xs">Ocean</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Ocean Wave</p>
                        </div>
                        
                        <!-- Ripple Wave Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-teal-400 transition-all" onclick="selectDesign('ripplewave')">
                            <div class="w-full h-20 bg-teal-50 border-2 border-teal-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 border-2 border-teal-300 rounded-full opacity-50"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-12 h-12 border-2 border-teal-400 rounded-full opacity-60"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-8 h-8 border-2 border-teal-500 rounded-full opacity-70"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-teal-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-teal-700 font-bold text-xs">Ripple</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Ripple Wave</p>
                        </div>
                        
                        <!-- Zigzag Wave Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-purple-400 transition-all" onclick="selectDesign('zigzagwave')">
                            <div class="w-full h-20 bg-purple-50 border-2 border-purple-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 right-0 h-4 bg-purple-200" style="clip-path: polygon(0 0%, 10% 100%, 20% 0%, 30% 100%, 40% 0%, 50% 100%, 60% 0%, 70% 100%, 80% 0%, 90% 100%, 100% 0%, 100% 100%, 0% 100%);"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-4 bg-purple-200" style="clip-path: polygon(0 100%, 10% 0%, 20% 100%, 30% 0%, 40% 100%, 50% 0%, 60% 100%, 70% 0%, 80% 100%, 90% 0%, 100% 100%, 100% 0%, 0% 0%);"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-purple-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-purple-700 font-bold text-xs">Zigzag</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Zigzag Wave</p>
                        </div>
                        
                        <!-- Flow Wave Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-green-400 transition-all" onclick="selectDesign('flowwave')">
                            <div class="w-full h-20 bg-green-50 border-2 border-green-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 right-0 h-8 bg-gradient-to-b from-green-200 to-transparent" style="clip-path: ellipse(100% 100% at 50% 0%);"></div>
                                <div class="absolute top-3 left-0 right-0 h-6 bg-gradient-to-b from-green-100 to-transparent" style="clip-path: ellipse(80% 100% at 50% 0%);"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-green-200 to-transparent" style="clip-path: ellipse(100% 100% at 50% 100%);"></div>
                                <div class="absolute bottom-3 left-0 right-0 h-6 bg-gradient-to-t from-green-100 to-transparent" style="clip-path: ellipse(80% 100% at 50% 100%);"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-green-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-green-700 font-bold text-xs">Flow</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Flow Wave</p>
                        </div>
                        
                        <!-- Spiral Wave Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-orange-400 transition-all" onclick="selectDesign('spiralwave')">
                            <div class="w-full h-20 bg-orange-50 border-2 border-orange-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-14 h-14 border-3 border-orange-300 rounded-full opacity-40"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-10 h-10 border-2 border-orange-400 rounded-full opacity-60" style="border-style: dashed;"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-6 h-6 border border-orange-500 rounded-full opacity-80" style="border-style: dotted;"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-orange-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-orange-700 font-bold text-xs">Spiral</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Spiral Wave</p>
                        </div>
                        
                        <!-- Wave Border Design -->
                        <div class="text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-cyan-400 transition-all" onclick="selectDesign('waveborder')">
                            <div class="w-full h-20 bg-cyan-50 border-2 border-cyan-600 rounded mb-2 relative overflow-hidden">
                                <div class="absolute top-0 left-0 right-0 h-6 bg-gradient-to-b from-cyan-200 to-transparent" style="clip-path: polygon(0 0%, 5% 50%, 10% 0%, 15% 50%, 20% 0%, 25% 50%, 30% 0%, 35% 50%, 40% 0%, 45% 50%, 50% 0%, 55% 50%, 60% 0%, 65% 50%, 70% 0%, 75% 50%, 80% 0%, 85% 50%, 90% 0%, 95% 50%, 100% 0%, 100% 100%, 0% 100%);"></div>
                                <div class="absolute bottom-0 left-0 right-0 h-6 bg-gradient-to-t from-cyan-200 to-transparent" style="clip-path: polygon(0 100%, 5% 50%, 10% 100%, 15% 50%, 20% 100%, 25% 50%, 30% 100%, 35% 50%, 40% 100%, 45% 50%, 50% 100%, 55% 50%, 60% 100%, 65% 50%, 70% 100%, 75% 50%, 80% 100%, 85% 50%, 90% 100%, 95% 50%, 100% 100%, 100% 0%, 0% 0%);"></div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-xs text-center">
                                        <div class="w-6 h-6 bg-cyan-600 rounded-full mx-auto mb-1"></div>
                                        <div class="text-cyan-700 font-bold text-xs">Wave Border</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs font-medium">Wave Border</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg mr-4">
                    <i class="fas fa-print mr-2"></i>Print Certificate
                </button>
                <a href="{{ route('certificate.business.form') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Form
                </a>
            </div>
        </div>

        <!-- Certificate -->
        <div id="certificate-border" class="bg-clean">
            <div class="relative z-10">
                <div class="relative z-20">
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center justify-center">
                        <!-- Logo on Left -->
                        <div class="flex items-center">
                            <img src="{{ URL::asset('assets/lgu.png') }}" alt="LGU Logo" class="h-20 w-20 mr-6">
                            <div class="certificate-header">
                                <h1 class="text-xl font-bold">Republic of the Philippines</h1>
                                <p class="text-lg font-semibold">Province of Southern Leyte</p>
                                <p class="text-base font-bold">MUNICIPALITY OF SOGOD</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate Title -->
                <div class="text-center mb-8">
                    <h2 class="font-bold certificate-title underline" style="font-family: 'Broadway', sans-serif; font-size: 22px; color: #000080;">OFFICE OF THE MUNICIPAL PLANNING & DEV. COORDINATOR</h2>
                    <h3 class="font-bold certificate-title mt-4" style="font-family: 'Lucida Handwriting', cursive; font-size: 40px; color: #000080;">CERTIFICATION</h3>
                </div>

                <!-- Certificate Content -->
                <div class="mb-8 certificate-content">
                    <p class="mb-4">TO WHOM IT MAY CONCERN:</p>
                    
                    <p class="leading-relaxed mb-4">
                        THIS IS TO CERTIFY that the Business Permit of 
                        <span class="font-bold uppercase border-b-2 border-gray-800 pb-1 inline-block min-w-[200px] text-center">{{ $owner_name ?? '_________' }}</span> 
                        located at 
                        <span class="font-bold uppercase border-b-2 border-gray-800 pb-1 inline-block min-w-[300px] text-center">{{ $address ?? '_________' }}</span>, Sogod, Southern Leyte has already a Land Use Certification issued by this office in support of his/her new application of Business Permit.
                    </p>

                    <p class="mb-4">
                        THIS CERTIFICATION IS HEREBY ISSUED for whatever legal purpose it may serve.
                    </p>

                    <p>
                        DONE this 
                        <span class="font-bold border-b-2 border-gray-800 pb-1 inline-block min-w-[60px] text-center">{{ $day }}</span> 
                        day of 
                        <span class="font-bold border-b-2 border-gray-800 pb-1 inline-block min-w-[120px] text-center">{{ $month }}</span>, 
                        <span class="font-bold border-b-2 border-gray-800 pb-1 inline-block min-w-[80px] text-center">{{ $year }}</span> 
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
        function setPortrait() {
            // Remove any existing page style
            const existingStyle = document.getElementById('page-style');
            if (existingStyle) {
                existingStyle.remove();
            }
            
            // Add portrait style
            const portraitStyle = document.createElement('style');
            portraitStyle.id = 'page-style';
            portraitStyle.innerHTML = '@media print { @page { size: portrait; margin: 0.5in; } }';
            document.head.appendChild(portraitStyle);
            
            // Update button states
            document.querySelector('button[onclick="setPortrait()"]').classList.add('bg-gray-600');
            document.querySelector('button[onclick="setPortrait()"]').classList.remove('bg-gray-500');
            document.querySelector('button[onclick="setLandscape()"]').classList.add('bg-green-600');
            document.querySelector('button[onclick="setLandscape()"]').classList.remove('bg-green-700');
        }

        function setLandscape() {
            // Remove any existing page style
            const existingStyle = document.getElementById('page-style');
            if (existingStyle) {
                existingStyle.remove();
            }
            
            // Add landscape style
            const landscapeStyle = document.createElement('style');
            landscapeStyle.id = 'page-style';
            landscapeStyle.innerHTML = '@media print { @page { size: landscape; margin: 0.5in; } }';
            document.head.appendChild(landscapeStyle);
            
            // Update button states
            document.querySelector('button[onclick="setLandscape()"]').classList.add('bg-green-700');
            document.querySelector('button[onclick="setLandscape()"]').classList.remove('bg-green-600');
            document.querySelector('button[onclick="setPortrait()"]').classList.add('bg-gray-500');
            document.querySelector('button[onclick="setPortrait()"]').classList.remove('bg-gray-600');
        }

        function setBackground(type) {
            const certificate = document.getElementById('certificate-border');
            
            // Remove all background classes
            certificate.classList.remove('bg-clean', 'bg-elegant', 'bg-classic', 'bg-modern', 'bg-royal', 'bg-minimal', 'bg-sideborder', 'bg-corner', 'bg-frame', 'bg-ornamental', 'bg-vintage', 'bg-elegantborder', 'bg-stripes', 'bg-spots', 'bg-dots', 'bg-chevron', 'bg-ribbon', 'bg-medallion', 'bg-laurel', 'bg-wave', 'bg-star', 'bg-seal', 'bg-emblem', 'bg-oceanwave', 'bg-ripplewave', 'bg-zigzagwave', 'bg-flowwave', 'bg-spiralwave', 'bg-waveborder');
            
            // Add new background class
            certificate.classList.add('bg-' + type);
        }

        function toggleDesignPanel() {
            const panel = document.getElementById('design-panel');
            panel.classList.toggle('hidden');
        }

        function selectDesign(type) {
            // Apply the design
            setBackground(type);
            
            // Update the button text
            const designNames = {
                clean: 'Clean Design',
                elegant: 'Elegant Design',
                classic: 'Classic Design',
                modern: 'Modern Design',
                royal: 'Royal Design',
                minimal: 'Minimal Design',
                sideborder: 'Side Border',
                corner: 'Corner Design',
                frame: 'Frame Design',
                ornamental: 'Ornamental Design',
                vintage: 'Vintage Design',
                elegantborder: 'Elegant Border',
                stripes: 'Stripes Design',
                spots: 'Spots Design',
                dots: 'Dots Design',
                chevron: 'Chevron Design',
                ribbon: 'Ribbon Design',
                medallion: 'Medallion Design',
                laurel: 'Laurel Design',
                wave: 'Wave Design',
                star: 'Star Design',
                seal: 'Seal Design',
                emblem: 'Emblem Design',
                oceanwave: 'Ocean Wave',
                ripplewave: 'Ripple Wave',
                zigzagwave: 'Zigzag Wave',
                flowwave: 'Flow Wave',
                spiralwave: 'Spiral Wave',
                waveborder: 'Wave Border'
            };
            
            document.getElementById('current-design-text').textContent = designNames[type];
            
            // Hide the panel
            document.getElementById('design-panel').classList.add('hidden');
        }

        // Set landscape and elegant as default
        setLandscape();
        setBackground('elegant');
    </script>
</body>
</html>