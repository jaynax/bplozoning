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

    public function generateBusiness(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
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
        
        // Show the appropriate template based on certificate type
        switch ($certificate->certificate_type) {
            case 'residential':
                return view('certificate.residential-template', $certificateData);
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

    public function download(Certificate $certificate)
    {
        // Check if user owns this certificate
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        // Convert certificate to array for template
        $certificateData = $certificate->toArray();
        
        // Get the appropriate template HTML
        switch ($certificate->certificate_type) {
            case 'residential':
                $html = view('certificate.residential-template', $certificateData)->render();
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
