<?php

namespace App\Http\Controllers;

use App\Models\CertificateTemplate;
use Illuminate\Http\Request;

class CertificateTemplateController extends Controller
{
    /**
     * Display all certificate templates
     */
    public function index()
    {
        $templates = CertificateTemplate::active()->ordered()->get();
        $groupedTemplates = $templates->groupBy('category');
        
        return response()->json([
            'templates' => $groupedTemplates,
            'total' => $templates->count()
        ]);
    }

    /**
     * Get a specific certificate template
     */
    public function show($slug)
    {
        $template = CertificateTemplate::where('slug', $slug)->active()->firstOrFail();
        
        return response()->json($template);
    }

    /**
     * Get templates by category
     */
    public function byCategory($category)
    {
        $templates = CertificateTemplate::byCategory($category)->active()->ordered()->get();
        
        return response()->json([
            'templates' => $templates,
            'category' => $category,
            'count' => $templates->count()
        ]);
    }

    /**
     * Store a new certificate template
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:certificate_templates',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'view_file' => 'required|string|max:255',
            'fields' => 'nullable|array',
            'icon' => 'nullable|string|max:255',
            'color' => 'string|max:50',
            'sort_order' => 'integer|default:0'
        ]);

        $template = CertificateTemplate::create($validated);

        return response()->json([
            'message' => 'Certificate template created successfully',
            'template' => $template
        ], 201);
    }

    /**
     * Update a certificate template
     */
    public function update(Request $request, CertificateTemplate $certificateTemplate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:certificate_templates,slug,' . $certificateTemplate->id,
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'view_file' => 'required|string|max:255',
            'fields' => 'nullable|array',
            'icon' => 'nullable|string|max:255',
            'color' => 'string|max:50',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $certificateTemplate->update($validated);

        return response()->json([
            'message' => 'Certificate template updated successfully',
            'template' => $certificateTemplate
        ]);
    }

    /**
     * Delete a certificate template
     */
    public function destroy(CertificateTemplate $certificateTemplate)
    {
        $certificateTemplate->delete();

        return response()->json([
            'message' => 'Certificate template deleted successfully'
        ]);
    }

    /**
     * Get all categories
     */
    public function categories()
    {
        $categories = CertificateTemplate::select('category')
            ->distinct()
            ->where('is_active', true)
            ->orderBy('category')
            ->pluck('category');

        return response()->json($categories);
    }
}
