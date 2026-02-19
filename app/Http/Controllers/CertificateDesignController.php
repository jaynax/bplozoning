<?php

namespace App\Http\Controllers;

use App\Models\CertificateDesign;
use Illuminate\Http\Request;

class CertificateDesignController extends Controller
{
    /**
     * Display all certificate designs
     */
    public function index()
    {
        $designs = CertificateDesign::active()->ordered()->get();
        $groupedDesigns = $designs->groupBy('category');
        
        return response()->json([
            'designs' => $groupedDesigns,
            'total' => $designs->count()
        ]);
    }

    /**
     * Get a specific certificate design
     */
    public function show($slug)
    {
        $design = CertificateDesign::where('slug', $slug)->active()->firstOrFail();
        
        return response()->json($design);
    }

    /**
     * Get designs by category
     */
    public function byCategory($category)
    {
        $designs = CertificateDesign::byCategory($category)->active()->ordered()->get();
        
        return response()->json([
            'designs' => $designs,
            'category' => $category,
            'count' => $designs->count()
        ]);
    }

    /**
     * Store a new certificate design
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:certificate_designs',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'css_class' => 'required|string|max:255',
            'css_styles' => 'nullable|array',
            'thumbnail' => 'nullable|string|max:255',
            'sort_order' => 'integer|default:0'
        ]);

        $design = CertificateDesign::create($validated);

        return response()->json([
            'message' => 'Certificate design created successfully',
            'design' => $design
        ], 201);
    }

    /**
     * Update a certificate design
     */
    public function update(Request $request, CertificateDesign $certificateDesign)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:certificate_designs,slug,' . $certificateDesign->id,
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'css_class' => 'required|string|max:255',
            'css_styles' => 'nullable|array',
            'thumbnail' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $certificateDesign->update($validated);

        return response()->json([
            'message' => 'Certificate design updated successfully',
            'design' => $certificateDesign
        ]);
    }

    /**
     * Delete a certificate design
     */
    public function destroy(CertificateDesign $certificateDesign)
    {
        $certificateDesign->delete();

        return response()->json([
            'message' => 'Certificate design deleted successfully'
        ]);
    }

    /**
     * Get all categories
     */
    public function categories()
    {
        $categories = CertificateDesign::select('category')
            ->distinct()
            ->where('is_active', true)
            ->orderBy('category')
            ->pluck('category');

        return response()->json($categories);
    }
}
