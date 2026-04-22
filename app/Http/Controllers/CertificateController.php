<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Dompdf\Dompdf;
use Dompdf\Options;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createForm()
    {
        return view('certificate.create');
    }

    public function showBusinessForm()
    {
        return view('certificate.business-form');
    }

    public function showResidentialForm()
    {
        return view('certificate.residential-form');
    }

    public function showLandUseForm()
    {
        return view('certificate.landuse-form');
    }

    public function showBuildingForm()
    {
        return view('certificate.building-form');
    }

    public function showComplianceForm()
    {
        return view('certificate.compliance-form');
    }

    public function showEnvironmentalForm()
    {
        return view('certificate.environmental-form');
    }

    public function showLocationalClearanceForm()
    {
        return view('certificate.locational-clearance-form');
    }

    public function selectLocationalClearanceDesign()
    {
        return view('certificate.locational-clearance-design');
    }

    public function designSelected(Request $request)
    {
        // Debug: Log the incoming request
        \Log::info('designSelected called with data: ', $request->all());
        
        $selectedDesign = $request->input('border_style', '0.jpg');
        
        // Debug: Log the selected design
        \Log::info('Selected border design: ' . $selectedDesign);
        
        // Redirect to the edit page with the selected design as query parameter
        $url = route('certificate.locational-clearance.edit') . '?border_style=' . urlencode($selectedDesign);
        \Log::info('Redirecting to: ' . $url);
        return redirect($url);
    }

    public function editLocationalClearance(Request $request)
    {
        // Debug: Log the incoming request
        \Log::info('editLocationalClearance called with data: ', $request->all());
        
        // Get selected border style from request or use default
        $borderStyle = $request->input('border_style', '0.jpg');
        
        // Debug: Log the border style
        \Log::info('Border style for editing: ' . $borderStyle);
        
        // Return editable template with default values
        $defaultData = [
            'application_no' => '_________',
            'date_of_receipt' => '_________',
            'decision_no' => '_________',
            'date_of_issue' => '_________',
            'applicant_name' => '_________________________',
            'business_name' => 'NONE',
            'address' => '_________________________',
            'project_address' => '_________________________',
            'project_type' => '_________________________',
            'area_location' => '_________________________',
            'lc_no' => '_________',
            'or_no' => '_________',
            'amount' => '_________',
            'doc_stamp_tax' => '_________',
            'gor_serial' => '12345',
            'date_payment' => '_________',
            'border_style' => $borderStyle,
            'certificate_type' => 'locational-clearance',
            'day' => date('j'),
            'month' => date('F'),
            'year' => date('Y'),
            'certificate_number' => Certificate::generateCertificateNumber(),
            'user_id' => auth()->id(),
        ];

        return view('certificate.locational-clearance-edit', $defaultData);
    }

    public function autoSaveLocationalClearance(Request $request)
    {
        $validated = $request->validate([
            'border_style' => 'nullable|string|max:255',
            'application_no' => 'nullable|string|max:255',
            'date_of_receipt' => 'nullable|string|max:255',
            'decision_no' => 'nullable|string|max:255',
            'date_of_issue' => 'nullable|string|max:255',
            'applicant_name' => 'nullable|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'project_address' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'area_location' => 'nullable|string|max:255',
            'lc_no' => 'nullable|string|max:255',
            'or_no' => 'nullable|string|max:255',
            'amount' => 'nullable|string|max:255',
            'doc_stamp_tax' => 'nullable|string|max:255',
            'gor_serial' => 'nullable|string|max:255',
            'date_payment' => 'nullable|string|max:255',
            'certificate_type' => 'required|string|max:255',
        ]);

        $validated['certificate_type'] = 'locational-clearance';
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();
        
        // Map applicant_name to owner_name for database consistency
        $validated['owner_name'] = $validated['applicant_name'] ?? '_________________________';
        
        // Store the main address field (not project_address) for database consistency
        $validated['address'] = $validated['address'] ?? '_________________________';
        
        // Set default date values
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        
        // Store all locational clearance specific fields in additional_data
        $additionalData = [
            'application_no' => $validated['application_no'] ?? '_________',
            'date_of_receipt' => $validated['date_of_receipt'] ?? '_________',
            'decision_no' => $validated['decision_no'] ?? '_________',
            'date_of_issue' => $validated['date_of_issue'] ?? '_________',
            'applicant_name' => $validated['applicant_name'] ?? '_________________________',
            'business_name' => $validated['business_name'] ?? 'NONE',
            'project_address' => $validated['project_address'] ?? '_________________________',
            'project_type' => $validated['project_type'] ?? '_________________________',
            'area_location' => $validated['area_location'] ?? '_________________________',
            'lc_no' => $validated['lc_no'] ?? '_________',
            'or_no' => $validated['or_no'] ?? '_________',
            'amount' => $validated['amount'] ?? '_________',
            'doc_stamp_tax' => $validated['doc_stamp_tax'] ?? '_________',
            'gor_serial' => $validated['gor_serial'] ?? '_________',
            'date_payment' => $validated['date_payment'] ?? '_________',
            'border_style' => $validated['border_style'] ?? null,
        ];
        
        // Remove fields that don't exist in main certificates table
        unset($validated['application_no'], $validated['date_of_receipt'], $validated['decision_no'], 
                $validated['date_of_issue'], $validated['applicant_name'], $validated['business_name'], 
                $validated['project_address'], $validated['project_type'], $validated['area_location'], 
                $validated['lc_no'], $validated['or_no'], $validated['amount'], $validated['doc_stamp_tax'], 
                $validated['gor_serial'], $validated['date_payment'], $validated['border_style']);
        
        $validated['additional_data'] = $additionalData;

        // Save certificate to database
        $certificate = Certificate::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Certificate saved successfully',
            'certificate_id' => $certificate->id,
            'certificate_number' => $certificate->certificate_number
        ]);
    }

    public function saveLocationalClearance(Request $request)
    {
        // Debug: Log the incoming request data
        \Log::info('saveLocationalClearance called with data: ', $request->all());
        
        $validated = $request->validate([
            'application_no' => 'required|string|max:255',
            'date_of_receipt' => 'required|string|max:255',
            'decision_no' => 'required|string|max:255',
            'date_of_issue' => 'required|string|max:255',
            'applicant_name' => 'required|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'project_address' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'area_location' => 'required|string|max:255',
            'lc_no' => 'required|string|max:255',
            'or_no' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'doc_stamp_tax' => 'required|string|max:255',
            'gor_serial' => 'required|string|max:255',
            'date_payment' => 'required|string|max:255',
            'border_style' => 'nullable|string|max:255',
        ]);

        // Debug: Log validation success
        \Log::info('Validation passed. Validated data: ', $validated);

        $validated['certificate_type'] = 'locational-clearance';
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();
        
        // Map applicant_name to owner_name for database consistency
        $validated['owner_name'] = $validated['applicant_name'];
        
        // Store the main address field (not project_address) for database consistency
        $validated['address'] = $validated['address'];
        
        // Set default date values
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        
        // Debug: Log final data before save
        \Log::info('Final data before database save: ', $validated);
        
        // Store all locational clearance specific fields in additional_data
        $additionalData = [
            'application_no' => $validated['application_no'],
            'date_of_receipt' => $validated['date_of_receipt'],
            'decision_no' => $validated['decision_no'],
            'date_of_issue' => $validated['date_of_issue'],
            'applicant_name' => $validated['applicant_name'],
            'business_name' => $validated['business_name'] ?? null,
            'project_address' => $validated['project_address'],
            'project_type' => $validated['project_type'],
            'area_location' => $validated['area_location'],
            'lc_no' => $validated['lc_no'],
            'or_no' => $validated['or_no'],
            'amount' => $validated['amount'],
            'doc_stamp_tax' => $validated['doc_stamp_tax'],
            'gor_serial' => $validated['gor_serial'],
            'date_payment' => $validated['date_payment'],
            'border_style' => $validated['border_style'] ?? null,
        ];
        
        // Remove fields that don't exist in main certificates table
        unset($validated['application_no'], $validated['date_of_receipt'], $validated['decision_no'], 
                $validated['date_of_issue'], $validated['applicant_name'], $validated['business_name'], 
                $validated['project_address'], $validated['project_type'], $validated['area_location'], 
                $validated['lc_no'], $validated['or_no'], $validated['amount'], $validated['doc_stamp_tax'], 
                $validated['gor_serial'], $validated['date_payment'], $validated['border_style']);
        
        $validated['additional_data'] = $additionalData;

        // Save certificate to database
        $certificate = Certificate::create($validated);

        // Debug: Log successful save
        \Log::info('Certificate saved successfully. Certificate ID: ' . $certificate->id . ', Type: ' . $certificate->certificate_type);

        return redirect()->route('certificate.index')
            ->with('success', 'Locational Clearance certificate saved successfully!');
    }

    public function generateBusiness(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'border_style' => 'nullable|string|max:255',
        ]);

        $validated['certificate_type'] = 'business';
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();

        // Save certificate to database
        $certificate = Certificate::create($validated);

        return view('certificate.business-template', $validated);
    }

    public function generateResidential(Request $request)
    {
        $validated = $request->validate([
            'property_type' => 'required|string|max:255',
            'occupancy_type' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'tax_dec_no' => 'required|string|max:255',
            'lot_no' => 'required|string|max:255',
            'floor_area' => 'nullable|string|max:255',
            'num_families' => 'nullable|integer',
            'day' => 'required|integer|min:1|max:31',
            'month' => 'required|string|max:20',
            'year' => 'required|integer|min:2020|max:2030',
            'or_no' => 'nullable|string|max:255',
            'amount_paid' => 'nullable|string|max:255',
            'border_style' => 'nullable|string|max:255',
        ]);

        $validated['certificate_type'] = 'residential';
        $validated['proposed_activity'] = $validated['property_type'] . ' - ' . $validated['occupancy_type'];
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();

        // Save certificate to database
        $certificate = Certificate::create($validated);

        return view('certificate.residential-template', $validated);
    }

    public function generateLandUse(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $validated['certificate_type'] = 'landuse';
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();

        // Save certificate to database
        $certificate = Certificate::create($validated);

        return view('certificate.business-template', $validated);
    }

    public function generateBuilding(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $validated['certificate_type'] = 'building';
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();

        // Save certificate to database
        $certificate = Certificate::create($validated);

        return view('certificate.business-template', $validated);
    }

    public function generateCompliance(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $validated['certificate_type'] = 'compliance';
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();

        // Save certificate to database
        $certificate = Certificate::create($validated);

        return view('certificate.business-template', $validated);
    }

    public function generateEnvironmental(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $validated['certificate_type'] = 'environmental';
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();

        // Save certificate to database
        $certificate = Certificate::create($validated);

        return view('certificate.business-template', $validated);
    }

    public function generateLocationalClearance(Request $request)
    {
        $validated = $request->validate([
            'application_no' => 'required|string|max:255',
            'date_of_receipt' => 'required|string|max:255',
            'decision_no' => 'required|string|max:255',
            'date_of_issue' => 'required|string|max:255',
            'applicant_name' => 'required|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'project_address' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'area_location' => 'required|string|max:255',
            'conditions' => 'nullable|string',
            'additional_conditions' => 'nullable|string',
            'lc_no' => 'required|string|max:255',
            'or_no' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'doc_stamp_tax' => 'required|string|max:255',
            'gor_serial' => 'required|string|max:255',
            'date_payment' => 'required|string|max:255',
            'border_style' => 'nullable|string|max:255',
        ]);

        $validated['certificate_type'] = 'locational-clearance';
        $validated['certificate_number'] = Certificate::generateCertificateNumber();
        $validated['user_id'] = auth()->id();
        
        // Map applicant_name to owner_name for database consistency
        $validated['owner_name'] = $validated['applicant_name'];
        
        // Store the main address field (not project_address) for database consistency
        $validated['address'] = $validated['address'];
        
        // Set default date values since locational clearance doesn't have these fields in form
        $validated['day'] = date('j');
        $validated['month'] = date('F');
        $validated['year'] = date('Y');
        
        // Store all locational clearance specific fields in additional_data
        $additionalData = [
            'application_no' => $validated['application_no'],
            'date_of_receipt' => $validated['date_of_receipt'],
            'decision_no' => $validated['decision_no'],
            'date_of_issue' => $validated['date_of_issue'],
            'applicant_name' => $validated['applicant_name'],
            'business_name' => $validated['business_name'] ?? null,
            'project_address' => $validated['project_address'],
            'project_type' => $validated['project_type'],
            'area_location' => $validated['area_location'],
            'conditions' => $validated['conditions'] ?? null,
            'additional_conditions' => $validated['additional_conditions'] ?? null,
            'lc_no' => $validated['lc_no'],
            'or_no' => $validated['or_no'],
            'amount' => $validated['amount'],
            'doc_stamp_tax' => $validated['doc_stamp_tax'],
            'gor_serial' => $validated['gor_serial'],
            'date_payment' => $validated['date_payment'],
            'border_style' => $validated['border_style'] ?? null,
        ];
        
        // Remove fields that don't exist in main certificates table
        unset($validated['application_no'], $validated['date_of_receipt'], $validated['decision_no'], 
                $validated['date_of_issue'], $validated['applicant_name'], $validated['business_name'], 
                $validated['project_address'], $validated['project_type'], $validated['area_location'], 
                $validated['conditions'], $validated['additional_conditions'], $validated['lc_no'], 
                $validated['or_no'], $validated['amount'], $validated['doc_stamp_tax'], 
                $validated['gor_serial'], $validated['date_payment'], $validated['border_style']);
        
        $validated['additional_data'] = $additionalData;

        // Save certificate to database
        $certificate = Certificate::create($validated);

        // Merge additional data back for template rendering
        $certificateData = array_merge($validated, $additionalData);

        return view('certificate.locational-clearance-template', $certificateData);
    }

    public function edit(Certificate $certificate)
    {
        // Check if user owns this certificate
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        // Only allow editing business and residential certificates
        if (!in_array($certificate->certificate_type, ['business', 'residential'])) {
            abort(403, 'Editing is only allowed for business and residential certificates');
        }

        // Convert certificate to array for template
        $certificateData = $certificate->toArray();
        
        // Merge additional data if it exists
        if ($certificate->additional_data) {
            $certificateData = array_merge($certificateData, $certificate->additional_data);
        }

        // Show the appropriate edit template based on certificate type
        switch ($certificate->certificate_type) {
            case 'residential':
                return view('certificate.residential-edit', $certificateData);
            case 'business':
            default:
                return view('certificate.business-edit', $certificateData);
        }
    }

    public function update(Request $request, Certificate $certificate)
    {
        // Check if user owns this certificate
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        // Only allow updating business and residential certificates
        if (!in_array($certificate->certificate_type, ['business', 'residential'])) {
            abort(403, 'Updating is only allowed for business and residential certificates');
        }

        // Validate based on certificate type
        if ($certificate->certificate_type === 'business') {
            $validated = $request->validate([
                'owner_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'border_style' => 'nullable|string|max:255',
            ]);
        } else if ($certificate->certificate_type === 'residential') {
            $validated = $request->validate([
                'property_type' => 'required|string|max:255',
                'occupancy_type' => 'required|string|max:255',
                'owner_name' => 'required|string|max:255',
                'contact_number' => 'nullable|string|max:255',
                'address' => 'required|string|max:255',
                'tax_dec_no' => 'required|string|max:255',
                'lot_no' => 'required|string|max:255',
                'floor_area' => 'nullable|string|max:255',
                'num_families' => 'nullable|integer',
                'day' => 'required|integer|min:1|max:31',
                'month' => 'required|string|max:20',
                'year' => 'required|integer|min:2020|max:2030',
                'or_no' => 'nullable|string|max:255',
                'amount_paid' => 'nullable|string|max:255',
                'border_style' => 'nullable|string|max:255',
            ]);

            $validated['proposed_activity'] = $validated['property_type'] . ' - ' . $validated['occupancy_type'];
        }

        // Update certificate
        $certificate->update($validated);

        return redirect()->route('certificate.index')
            ->with('success', 'Certificate updated successfully!');
    }

    public function index()
    {
        $certificates = Certificate::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('certificate.index', compact('certificates'));
    }

    public function show(Certificate $certificate)
    {
        // Check if user owns this certificate
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        // Convert certificate to array for template
        $certificateData = $certificate->toArray();
        
        // Merge additional data if it exists
        if ($certificate->additional_data) {
            $certificateData = array_merge($certificateData, $certificate->additional_data);
        }
        
        // Show the appropriate template based on certificate type
        switch ($certificate->certificate_type) {
            case 'residential':
                return view('certificate.residential-template', $certificateData);
            case 'locational-clearance':
                return view('certificate.locational-clearance-template', $certificateData);
            case 'business':
            case 'landuse':
            case 'building':
            case 'compliance':
            case 'environmental':
            default:
                return view('certificate.business-template', $certificateData);
        }
    }

    public function preview(Certificate $certificate)
    {
        // Check if user owns this certificate
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        // Convert certificate to array for template
        $certificateData = $certificate->toArray();
        
        // Merge additional data if it exists
        if ($certificate->additional_data) {
            $certificateData = array_merge($certificateData, $certificate->additional_data);
        }
        
        // Show the appropriate template based on certificate type
        switch ($certificate->certificate_type) {
            case 'residential':
                return view('certificate.residential-template', $certificateData);
            case 'locational-clearance':
                return view('certificate.locational-clearance-template', $certificateData);
            case 'business':
            case 'landuse':
            case 'building':
            case 'compliance':
            case 'environmental':
            default:
                return view('certificate.business-template', $certificateData);
        }
    }

    public function destroy(Certificate $certificate)
    {
        // Check if user owns this certificate
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        $certificate->delete();

        return redirect()->route('certificate.index')
            ->with('success', 'Certificate deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        // Log the incoming request for debugging
        \Log::info('Bulk delete request received', [
            'certificate_ids' => $request->input('certificate_ids'),
            'method' => $request->method(),
            'all_request_data' => $request->all()
        ]);

        $certificateIds = $request->input('certificate_ids');
        
        if (empty($certificateIds)) {
            return redirect()->route('certificate.index')
                ->with('error', 'No certificates selected for deletion.');
        }

        // Convert comma-separated string to array
        $ids = explode(',', $certificateIds);
        
        // Get certificates that belong to the current user
        $certificates = Certificate::where('user_id', auth()->id())
            ->whereIn('id', $ids)
            ->get();

        if ($certificates->isEmpty()) {
            return redirect()->route('certificate.index')
                ->with('error', 'No valid certificates found for deletion.');
        }

        // Delete the certificates
        $deletedCount = Certificate::where('user_id', auth()->id())
            ->whereIn('id', $ids)
            ->delete();

        return redirect()->route('certificate.index')
            ->with('success', $deletedCount . ' certificate(s) deleted successfully.');
    }

    public function download(Certificate $certificate)
    {
        // Check if user owns this certificate
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        // Convert certificate to array for template
        $certificateData = $certificate->toArray();
        
        // Merge additional data if it exists
        if ($certificate->additional_data) {
            $certificateData = array_merge($certificateData, $certificate->additional_data);
        }
        
        // Get the appropriate template HTML
        switch ($certificate->certificate_type) {
            case 'residential':
                $html = view('certificate.residential-template', $certificateData)->render();
                break;
            case 'locational-clearance':
                $html = view('certificate.locational-clearance-template', $certificateData)->render();
                break;
            case 'business':
            case 'landuse':
            case 'building':
            case 'compliance':
            case 'environmental':
            default:
                $html = view('certificate.business-template', $certificateData)->render();
                break;
        }

        // Setup Dompdf options
        $options = new \Dompdf\Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isRemoteEnabled', true);
        
        // Setup Dompdf
        $dompdf = new \Dompdf\Dompdf($options);
        
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Load HTML
        $dompdf->loadHtml($html);
        
        // Render the HTML as PDF
        $dompdf->render();

        // Generate filename
        $filename = 'Certificate_' . $certificate->certificate_number . '.pdf';

        // Download the PDF
        return $dompdf->stream($filename);
    }
}
