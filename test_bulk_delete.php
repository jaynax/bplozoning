<?php
// Simple test to verify bulk delete functionality
// This file can be accessed directly to test the bulk delete

// Include Laravel bootstrap
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test the bulk delete method directly
try {
    $controller = new App\Http\Controllers\CertificateController();
    
    // Create a mock request
    $request = new Illuminate\Http\Request();
    $request->merge(['certificate_ids' => '1,2,3']);
    
    echo "Bulk delete method exists: " . method_exists($controller, 'bulkDelete') ? "Yes" : "No";
    echo "\n";
    
    // Check if route exists
    $routes = app('router')->getRoutes();
    $bulkDeleteRoute = null;
    foreach ($routes as $route) {
        if ($route->getName() === 'certificate.bulkDelete') {
            $bulkDeleteRoute = $route;
            break;
        }
    }
    
    echo "Bulk delete route exists: " . ($bulkDeleteRoute ? "Yes" : "No");
    echo "\n";
    
    if ($bulkDeleteRoute) {
        echo "Route URI: " . $bulkDeleteRoute->uri();
        echo "\n";
        echo "Route Methods: " . implode(', ', $bulkDeleteRoute->methods());
        echo "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "\n";
}

echo "\nAll certificate routes:\n";
foreach ($routes as $route) {
    if (strpos($route->getName(), 'certificate.') === 0) {
        echo "- " . $route->getName() . " (" . implode(', ', $route->methods()) . ") " . $route->uri() . "\n";
    }
}
