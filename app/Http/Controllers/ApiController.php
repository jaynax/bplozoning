<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    public function getBorders()
    {
        try {
            $borderPath = public_path('assets/borders');
            $files = File::files($borderPath);
            
            $borders = [];
            
            foreach ($files as $file) {
                // Only include image files
                if (in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $borders[] = [
                        'file' => $file->getFilename(),
                        'name' => $this->generateDisplayName($file->getFilename()),
                        'displayName' => $this->generateDisplayName($file->getFilename()),
                        'style' => $this->generateStyle($file->getFilename()),
                        'size' => $file->getSize(),
                        'type' => $file->getExtension(),
                        'url' => asset('assets/borders/' . $file->getFilename())
                    ];
                }
            }
            
            // Sort borders by display name
            usort($borders, function($a, $b) {
                return strcmp($a['displayName'], $b['displayName']);
            });
            
            return response()->json($borders);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    private function generateDisplayName($filename)
    {
        // Generate user-friendly names from filenames
        $displayName = pathinfo($filename, PATHINFO_FILENAME);
        
        // Handle special cases - updated to match actual files
        switch ($filename) {
            case '0.jpg':
                return 'Simple Border';
            case 'l.jpg':
                return 'Traditional Border';
            case 'p.jpg':
                return 'Formal Border';
            case 'n.png':
                return 'Decorative Border';
            case 'a2a02a17a2b86484bc9234bd7e337b8c.jpg':
                return 'Vintage Border';
            case 'Beige Brown Classic Certificate Participation Template.png':
                return 'Beige Brown Classic';
            case 'Blue and Gold Creative Certificate Template.png':
                return 'Blue Gold Creative';
            case 'Blue and Gold Modern Certification Certificate.png':
                return 'Blue Gold Modern';
            case 'Gold Elegant Certificate of Achievement Template.png':
                return 'Gold Elegant';
            case 'Gold Modern Achievement Certificate.png':
                return 'Gold Modern';
            default:
                // Convert filename to readable format
                return ucwords(str_replace(['-', '_'], ' ', $displayName));
        }
    }
    
    private function generateStyle($filename)
    {
        // Generate style descriptions - updated to match forms
        switch ($filename) {
            case '0.jpg':
                return 'Default';
            case 'l.jpg':
                return 'Classic';
            case 'p.jpg':
                return 'Official';
            case 'n.png':
                return 'Artistic';
            case 'a2a02a17a2b86484bc9234bd7e337b8c.jpg':
                return 'Classic';
            case 'Beige Brown Classic Certificate Participation Template.png':
                return 'Traditional';
            case 'Blue and Gold Creative Certificate Template.png':
                return 'Modern';
            case 'Blue and Gold Modern Certification Certificate.png':
                return 'Modern';
            case 'Gold Elegant Certificate of Achievement Template.png':
                return 'Elegant';
            case 'Gold Modern Achievement Certificate.png':
                return 'Modern';
            default:
                return 'Custom';
        }
    }
}
