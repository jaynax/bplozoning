<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificate;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
    
    public function reports()
    {
        // Get real certificate statistics
        $certificates = Certificate::all();
        $certificateStats = [
            'business' => $certificates->where('certificate_type', 'business')->count(),
            'residential' => $certificates->where('certificate_type', 'residential')->count(),
            'locational-clearance' => $certificates->where('certificate_type', 'locational-clearance')->count(),
        ];
        
        // Calculate real statistics
        $totalCertificates = $certificates->count();
        $approvedCertificates = $certificates->whereNotNull('certificate_number')->count(); // Assuming approved means has certificate number
        $pendingCertificates = $certificates->whereNull('certificate_number')->count(); // Pending means no certificate number yet
        
        // Calculate processing days (average time between created and when certificate number was assigned)
        $approvedCertsWithDates = $certificates->whereNotNull('certificate_number')
            ->whereNotNull('created_at')
            ->filter(function($cert) {
                return $cert->created_at && $cert->updated_at;
            });
            
        $avgProcessingDays = $approvedCertsWithDates->count() > 0 
            ? $approvedCertsWithDates->avg(function($cert) {
                return $cert->created_at->diffInDays($cert->updated_at);
            }) 
            : 0;
        
        // Calculate growth rate (certificates created in last 30 days vs previous 30 days)
        $last30Days = $certificates->where('created_at', '>=', now()->subDays(30))->count();
        $previous30Days = $certificates->where('created_at', '>=', now()->subDays(60))
            ->where('created_at', '<', now()->subDays(30))->count();
        
        $growthRate = $previous30Days > 0 
            ? (($last30Days - $previous30Days) / $previous30Days) * 100 
            : 0;
        
        // Calculate monthly increase (certificates this month vs last month)
        $thisMonth = $certificates->where('created_at', '>=', now()->startOfMonth())->count();
        $lastMonth = $certificates->where('created_at', '>=', now()->subMonth()->startOfMonth())
            ->where('created_at', '<', now()->startOfMonth())->count();
        
        $monthlyIncrease = $lastMonth > 0 
            ? (($thisMonth - $lastMonth) / $lastMonth) * 100 
            : 0;
        
        $stats = [
            'total_applications' => $totalCertificates,
            'approved_applications' => $approvedCertificates,
            'generated_certificates' => $totalCertificates, // All certificates are generated
            'pending_applications' => $pendingCertificates,
            'avg_processing_days' => round($avgProcessingDays, 1),
            'growth_rate' => round($growthRate, 1),
            'monthly_increase' => round($monthlyIncrease, 1),
        ];
        
        return view('user.reports', compact('certificateStats', 'stats'));
    }
    
    public function exportReports()
    {
        try {
            // Get certificates with simple query
            $certificates = Certificate::all();
            
            // Set filename
            $filename = 'certificate_reports_' . date('Y-m-d_H-i-s') . '.csv';
            
            // Create CSV content
            $csvContent = '';
            
            // Header section
            $csvContent .= "ZONING ADMINISTRATION SYSTEM\n";
            $csvContent .= "CERTIFICATE REPORTS\n";
            $csvContent .= "Generated: " . date('F d, Y g:i A') . "\n";
            $csvContent .= "\n";
            
            // Summary Statistics
            $total = $certificates->count();
            $approved = $certificates->whereNotNull('certificate_number')->count();
            $pending = $certificates->whereNull('certificate_number')->count();
            
            $csvContent .= "SUMMARY STATISTICS\n";
            $csvContent .= "Total Certificates," . $total . "\n";
            $csvContent .= "Approved Certificates," . $approved . "\n";
            $csvContent .= "Pending Certificates," . $pending . "\n";
            $csvContent .= "\n";
            
            // Certificate Type Distribution
            $business = $certificates->where('certificate_type', 'business')->count();
            $residential = $certificates->where('certificate_type', 'residential')->count();
            $locational = $certificates->where('certificate_type', 'locational-clearance')->count();
            
            $csvContent .= "CERTIFICATE TYPE DISTRIBUTION\n";
            $csvContent .= "Business Certificates," . $business . "," . number_format(($business / max(1, $total)) * 100, 1) . "%\n";
            $csvContent .= "Residential Certificates," . $residential . "," . number_format(($residential / max(1, $total)) * 100, 1) . "%\n";
            $csvContent .= "Locational Clearances," . $locational . "," . number_format(($locational / max(1, $total)) * 100, 1) . "%\n";
            $csvContent .= "\n";
            
            // Detailed Records Headers
            $csvContent .= "DETAILED CERTIFICATE RECORDS\n";
            $csvContent .= "ID,Certificate Type,Certificate Number,Applicant Name,Business Name,Address,Contact Number,Email,Status,Created Date,Processing Officer\n";
            
            // Data rows
            foreach ($certificates as $certificate) {
                $status = $certificate->certificate_number ? 'APPROVED' : 'PENDING';
                $createdDate = $certificate->created_at ? $certificate->created_at->format('M d, Y') : 'N/A';
                
                // Get additional data
                $applicantName = 'N/A';
                $businessName = 'N/A';
                $address = 'N/A';
                $contactNumber = 'N/A';
                $email = 'N/A';
                
                if ($certificate->additional_data) {
                    // Check if it's already an array or needs to be decoded
                    if (is_array($certificate->additional_data)) {
                        $data = $certificate->additional_data;
                    } else {
                        $data = json_decode($certificate->additional_data, true);
                    }
                    
                    if (is_array($data)) {
                        $applicantName = $data['applicant_name'] ?? 'N/A';
                        $businessName = $data['business_name'] ?? 'N/A';
                        $address = $data['address'] ?? 'N/A';
                        $contactNumber = $data['contact_number'] ?? 'N/A';
                        $email = $data['email'] ?? 'N/A';
                    }
                }
                
                $csvContent .= $certificate->id . ',';
                $csvContent .= strtoupper($certificate->certificate_type ?? 'N/A') . ',';
                $csvContent .= ($certificate->certificate_number ?? 'PENDING') . ',';
                $csvContent .= $applicantName . ',';
                $csvContent .= $businessName . ',';
                $csvContent .= $address . ',';
                $csvContent .= $contactNumber . ',';
                $csvContent .= $email . ',';
                $csvContent .= $status . ',';
                $csvContent .= $createdDate . ',';
                $csvContent .= ($certificate->user ? $certificate->user->name : 'N/A') . "\n";
            }
            
            // Footer
            $csvContent .= "\n";
            $csvContent .= "REPORT SUMMARY\n";
            $csvContent .= "Total Records Exported," . $certificates->count() . "\n";
            $csvContent .= "Export Date," . date('F d, Y g:i A') . "\n";
            $csvContent .= "System,Zoning Administration System\n";
            
            // Return as download
            return response($csvContent)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
                
        } catch (\Exception $e) {
            // Return error as plain text
            return response('Export Error: ' . $e->getMessage())
                ->header('Content-Type', 'text/plain');
        }
    }
    
    public function exportWord()
    {
        try {
            // Get certificates data
            $certificates = Certificate::all();
            
            // Calculate statistics
            $total = $certificates->count();
            $approved = $certificates->whereNotNull('certificate_number')->count();
            $pending = $certificates->whereNull('certificate_number')->count();
            $business = $certificates->where('certificate_type', 'business')->count();
            $residential = $certificates->where('certificate_type', 'residential')->count();
            $locational = $certificates->where('certificate_type', 'locational-clearance')->count();
            
            // Create new PhpWord document
            $phpWord = new PhpWord();
            
            // Add title section
            $section = $phpWord->addSection();
            
            // Add title
            $section->addText('Zoning Administration System', ['bold' => true, 'size' => 18], ['alignment' => 'center']);
            $section->addText('Comprehensive Reports & Analytics', ['size' => 14], ['alignment' => 'center']);
            $section->addText('Generated on: ' . date('F d, Y g:i A'), ['size' => 12], ['alignment' => 'center']);
            $section->addTextBreak(2);
            
            // Executive Summary
            $section->addText('Executive Summary', ['bold' => true, 'size' => 16], ['alignment' => 'left']);
            $section->addTextBreak(1);
            
            // Create summary table
            $tableSummary = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80]);
            $tableSummary->addRow();
            $tableSummary->addCell(3000)->addText('Metric', ['bold' => true]);
            $tableSummary->addCell(2000)->addText('Count', ['bold' => true]);
            $tableSummary->addCell(2000)->addText('Percentage', ['bold' => true]);
            
            $tableSummary->addRow();
            $tableSummary->addCell(3000)->addText('Total Applications');
            $tableSummary->addCell(2000)->addText($total);
            $tableSummary->addCell(2000)->addText('100%');
            
            $tableSummary->addRow();
            $tableSummary->addCell(3000)->addText('Approved Applications');
            $tableSummary->addCell(2000)->addText($approved);
            $tableSummary->addCell(2000)->addText(round(($approved / max(1, $total)) * 100, 1) . '%');
            
            $tableSummary->addRow();
            $tableSummary->addCell(3000)->addText('Pending Applications');
            $tableSummary->addCell(2000)->addText($pending);
            $tableSummary->addCell(2000)->addText(round(($pending / max(1, $total)) * 100, 1) . '%');
            
            $section->addTextBreak(2);
            
            // Certificate Distribution
            $section->addText('Certificate Distribution', ['bold' => true, 'size' => 16], ['alignment' => 'left']);
            $section->addTextBreak(1);
            
            $tableDist = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80]);
            $tableDist->addRow();
            $tableDist->addCell(3000)->addText('Certificate Type', ['bold' => true]);
            $tableDist->addCell(2000)->addText('Count', ['bold' => true]);
            $tableDist->addCell(2000)->addText('Percentage', ['bold' => true]);
            
            $tableDist->addRow();
            $tableDist->addCell(3000)->addText('Business');
            $tableDist->addCell(2000)->addText($business);
            $tableDist->addCell(2000)->addText(number_format(($business / max(1, $total)) * 100, 1) . '%');
            
            $tableDist->addRow();
            $tableDist->addCell(3000)->addText('Residential');
            $tableDist->addCell(2000)->addText($residential);
            $tableDist->addCell(2000)->addText(number_format(($residential / max(1, $total)) * 100, 1) . '%');
            
            $tableDist->addRow();
            $tableDist->addCell(3000)->addText('Locational Clearance');
            $tableDist->addCell(2000)->addText($locational);
            $tableDist->addCell(2000)->addText(number_format(($locational / max(1, $total)) * 100, 1) . '%');
            
            $section->addTextBreak(2);
            
            // Detailed Certificate Records
            $section->addText('Detailed Certificate Records', ['bold' => true, 'size' => 16], ['alignment' => 'left']);
            $section->addTextBreak(1);
            
            $tableRecords = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80]);
            
            // Add header row
            $tableRecords->addRow();
            $tableRecords->addCell(800)->addText('ID', ['bold' => true]);
            $tableRecords->addCell(2000)->addText('Type', ['bold' => true]);
            $tableRecords->addCell(2000)->addText('Certificate No.', ['bold' => true]);
            $tableRecords->addCell(2500)->addText('Applicant Name', ['bold' => true]);
            $tableRecords->addCell(2000)->addText('Business Name', ['bold' => true]);
            $tableRecords->addCell(1500)->addText('Status', ['bold' => true]);
            $tableRecords->addCell(2000)->addText('Created Date', ['bold' => true]);
            
            // Add certificate data
            foreach ($certificates as $certificate) {
                $status = $certificate->certificate_number ? 'APPROVED' : 'PENDING';
                $createdDate = $certificate->created_at ? $certificate->created_at->format('M d, Y') : 'N/A';
                
                // Get data from multiple sources
                $applicantName = $certificate->owner_name ?? 'N/A'; // Use direct field first
                $businessName = 'N/A';
                $address = $certificate->address ?? 'N/A'; // Use direct field first
                
                // Then try to get from additional_data
                if ($certificate->additional_data && is_array($certificate->additional_data)) {
                    $data = $certificate->additional_data;
                    
                    // Use additional_data if direct fields are empty
                    if (empty($applicantName) || $applicantName === 'N/A') {
                        $applicantName = $data['applicant_name'] ?? $data['owner_name'] ?? $applicantName;
                    }
                    if (empty($businessName) || $businessName === 'N/A') {
                        $businessName = $data['business_name'] ?? $data['company_name'] ?? 'N/A';
                    }
                    if (empty($address) || $address === 'N/A') {
                        $address = $data['address'] ?? $address;
                    }
                }
                
                $tableRecords->addRow();
                $tableRecords->addCell(800)->addText($certificate->id);
                $tableRecords->addCell(2000)->addText(strtoupper($certificate->certificate_type ?? 'N/A'));
                $tableRecords->addCell(2000)->addText($certificate->certificate_number ?? 'PENDING');
                $tableRecords->addCell(2500)->addText($applicantName);
                $tableRecords->addCell(2000)->addText($businessName);
                $tableRecords->addCell(1500)->addText($status);
                $tableRecords->addCell(2000)->addText($createdDate);
            }
            
            $section->addTextBreak(2);
            
            // Report Summary
            $section->addText('Report Summary', ['bold' => true, 'size' => 16], ['alignment' => 'left']);
            $section->addTextBreak(1);
            
            $tableSummaryInfo = $section->addTable(['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80]);
            $tableSummaryInfo->addRow();
            $tableSummaryInfo->addCell(3000)->addText('Total Records Exported:', ['bold' => true]);
            $tableSummaryInfo->addCell(3000)->addText($certificates->count());
            
            $tableSummaryInfo->addRow();
            $tableSummaryInfo->addCell(3000)->addText('Export Date:', ['bold' => true]);
            $tableSummaryInfo->addCell(3000)->addText(date('F d, Y g:i A'));
            
            $tableSummaryInfo->addRow();
            $tableSummaryInfo->addCell(3000)->addText('System:', ['bold' => true]);
            $tableSummaryInfo->addCell(3000)->addText('Zoning Administration System');
            
            $tableSummaryInfo->addRow();
            $tableSummaryInfo->addCell(3000)->addText('Generated By:', ['bold' => true]);
            $tableSummaryInfo->addCell(3000)->addText(Auth::user()->name);
            
            $section->addTextBreak(2);
            
            // Footer
            $section->addText('This report was automatically generated by the Zoning Administration System.', ['size' => 10, 'italic' => true], ['alignment' => 'center']);
            $section->addText('For inquiries, please contact the system administrator.', ['size' => 10, 'italic' => true], ['alignment' => 'center']);
            
            // Save file to temporary location
            $filename = 'zoning_reports_' . date('Y-m-d_H-i-s') . '.docx';
            $tempFilePath = storage_path('app/temp/' . $filename);
            
            // Ensure temp directory exists
            if (!is_dir(storage_path('app/temp'))) {
                mkdir(storage_path('app/temp'), 0777, true);
            }
            
            // Save the document
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($tempFilePath);
            
            // Return the file for download
            return response()->download($tempFilePath, $filename)->deleteFileAfterSend(true);
            
        } catch (\Exception $e) {
            \Log::error('Word Export Error: ' . $e->getMessage());
            return response('Word Export Error: ' . $e->getMessage())
                ->header('Content-Type', 'text/plain');
        }
    }
    
    public function exportPdf()
    {
        try {
            // Get certificates data
            $certificates = Certificate::all();
            
            // Calculate statistics
            $total = $certificates->count();
            $approved = $certificates->whereNotNull('certificate_number')->count();
            $pending = $certificates->whereNull('certificate_number')->count();
            $business = $certificates->where('certificate_type', 'business')->count();
            $residential = $certificates->where('certificate_type', 'residential')->count();
            $locational = $certificates->where('certificate_type', 'locational-clearance')->count();
            
            // Create professional HTML for PDF (like Word document)
            $html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Zoning Administration System - Reports</title>
    <style>
        @page {
            margin: 20px;
            size: A4;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            background: #667eea;
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .header p {
            margin: 10px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .section {
            margin-bottom: 25px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .section-title {
            background: #f8f9fa;
            padding: 15px 20px;
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #495057;
            border-bottom: 1px solid #ddd;
        }
        .section-content {
            padding: 20px;
        }
        .stats-grid {
            display: table;
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px;
        }
        .stats-row {
            display: table-row;
        }
        .stat-card {
            display: table-cell;
            background: #f8f9fa;
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 25%;
        }
        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 11px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background: #f2f2f2;
            font-weight: bold;
            font-size: 11px;
        }
        td {
            font-size: 11px;
        }
        .status-approved {
            background: #d4edda;
            color: #155724;
            font-weight: bold;
            text-align: center;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
            font-weight: bold;
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 10px;
        }
        .chart-bar {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 5px 0;
            height: 20px;
            position: relative;
        }
        .chart-fill {
            height: 100%;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding-right: 5px;
            color: white;
            font-weight: bold;
            font-size: 10px;
        }
        .chart-blue { background: #007bff; }
        .chart-green { background: #28a745; }
        .chart-orange { background: #ffc107; color: #333; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Zoning Administration System</h1>
        <p>Comprehensive Reports & Analytics</p>
        <p>Generated on: ' . date('F d, Y g:i A') . '</p>
    </div>
    
    <div class="section">
        <h2 class="section-title">📊 Executive Summary</h2>
        <div class="section-content">
            <div class="stats-grid">
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-number">' . $total . '</div>
                        <div class="stat-label">Total Applications</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">' . $approved . '</div>
                        <div class="stat-label">Approved Applications</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">' . $pending . '</div>
                        <div class="stat-label">Pending Applications</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">' . round(($approved / max(1, $total)) * 100, 1) . '%</div>
                        <div class="stat-label">Approval Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section">
        <h2 class="section-title">📈 Certificate Distribution</h2>
        <div class="section-content">
            <table>
                <tr><th>Certificate Type</th><th>Count</th><th>Percentage</th><th>Visual</th></tr>
                <tr>
                    <td>Business</td>
                    <td>' . $business . '</td>
                    <td>' . number_format(($business / max(1, $total)) * 100, 1) . '%</td>
                    <td>
                        <div class="chart-bar">
                            <div class="chart-fill chart-blue" style="width: ' . min(100, ($business / max(1, $total)) * 100) . '%">
                                ' . $business . '
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Residential</td>
                    <td>' . $residential . '</td>
                    <td>' . number_format(($residential / max(1, $total)) * 100, 1) . '%</td>
                    <td>
                        <div class="chart-bar">
                            <div class="chart-fill chart-green" style="width: ' . min(100, ($residential / max(1, $total)) * 100) . '%">
                                ' . $residential . '
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Locational Clearance</td>
                    <td>' . $locational . '</td>
                    <td>' . number_format(($locational / max(1, $total)) * 100, 1) . '%</td>
                    <td>
                        <div class="chart-bar">
                            <div class="chart-fill chart-orange" style="width: ' . min(100, ($locational / max(1, $total)) * 100) . '%">
                                ' . $locational . '
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="section">
        <h2 class="section-title">📋 Detailed Certificate Records</h2>
        <div class="section-content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Certificate No.</th>
                        <th>Applicant Name</th>
                        <th>Business Name</th>
                        <th>Status</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>';

            // Add certificate data
            foreach ($certificates as $certificate) {
                $status = $certificate->certificate_number ? 'APPROVED' : 'PENDING';
                $statusClass = $certificate->certificate_number ? 'status-approved' : 'status-pending';
                $createdDate = $certificate->created_at ? $certificate->created_at->format('M d, Y') : 'N/A';
                
                // Get data from multiple sources
                $applicantName = $certificate->owner_name ?? 'N/A';
                $businessName = 'N/A';
                
                if ($certificate->additional_data && is_array($certificate->additional_data)) {
                    $data = $certificate->additional_data;
                    
                    if (empty($applicantName) || $applicantName === 'N/A') {
                        $applicantName = $data['applicant_name'] ?? $data['owner_name'] ?? $applicantName;
                    }
                    if (empty($businessName) || $businessName === 'N/A') {
                        $businessName = $data['business_name'] ?? $data['company_name'] ?? 'N/A';
                    }
                }
                
                $html .= '<tr>
                    <td>' . $certificate->id . '</td>
                    <td>' . strtoupper($certificate->certificate_type ?? 'N/A') . '</td>
                    <td>' . ($certificate->certificate_number ?? 'PENDING') . '</td>
                    <td>' . htmlspecialchars($applicantName, ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($businessName, ENT_QUOTES, 'UTF-8') . '</td>
                    <td class="' . $statusClass . '">' . $status . '</td>
                    <td>' . $createdDate . '</td>
                </tr>';
            }
            
            $html .= '</tbody>
            </table>
        </div>
    </div>
    
    <div class="section">
        <h2 class="section-title">📊 Report Summary</h2>
        <div class="section-content">
            <table>
                <tr>
                    <td><strong>Total Records Exported:</strong></td>
                    <td>' . $certificates->count() . '</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Export Date:</strong></td>
                    <td>' . date('F d, Y g:i A') . '</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>System:</strong></td>
                    <td>Zoning Administration System</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Generated By:</strong></td>
                    <td>' . htmlspecialchars(Auth::user()->name, ENT_QUOTES, 'UTF-8') . '</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Report Period:</strong></td>
                    <td>All records to date</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="footer">
        <p>This report was automatically generated by the Zoning Administration System.</p>
        <p>For inquiries, please contact the system administrator.</p>
        <p>Page 1 of 1</p>
    </div>
</body>
</html>';
            
            // Configure DomPDF with minimal settings
            $options = new Options();
            $options->set('defaultFont', 'Arial');
            $options->set('isRemoteEnabled', false);
            $options->set('isHtml5ParserEnabled', false);
            $options->set('isPhpEnabled', false);
            
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            
            // Save to temporary file first (like Word export)
            $filename = 'zoning_reports_' . date('Y-m-d_H-i-s') . '.pdf';
            $tempFilePath = storage_path('app/temp/' . $filename);
            
            // Ensure temp directory exists
            if (!is_dir(storage_path('app/temp'))) {
                mkdir(storage_path('app/temp'), 0777, true);
            }
            
            // Save PDF to file
            file_put_contents($tempFilePath, $dompdf->output());
            
            // Return the file for download (same as Word export)
            return response()->download($tempFilePath, $filename)->deleteFileAfterSend(true);
            
        } catch (\Exception $e) {
            \Log::error('PDF Export Error: ' . $e->getMessage());
            return response('PDF Export Error: ' . $e->getMessage())
                ->header('Content-Type', 'text/plain');
        }
    }
    
    private function simpleCsvExport()
    {
        $filename = 'certificate_reports_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() {
            $handle = fopen('php://output', 'w');
            
            fputcsv($handle, ['Certificate Reports']);
            fputcsv($handle, ['Generated: ' . date('Y-m-d H:i:s')]);
            fputcsv($handle, ['']);
            fputcsv($handle, ['ID', 'Type', 'Certificate Number', 'Status', 'Created Date']);
            
            $certificates = Certificate::all();
            
            foreach ($certificates as $cert) {
                $status = $cert->certificate_number ? 'Approved' : 'Pending';
                $createdDate = $cert->created_at ? $cert->created_at->format('Y-m-d') : 'N/A';
                
                fputcsv($handle, [
                    $cert->id,
                    $cert->certificate_type ?? 'N/A',
                    $cert->certificate_number ?? 'Pending',
                    $status,
                    $createdDate
                ]);
            }
            
            fclose($handle);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    public function zoningMap()
    {
        return view('user.zoning-map');
    }
}
