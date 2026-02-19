<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('certificate.residential-template', $validated);
    }
}
