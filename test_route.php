<?php

// Simple test to check if bulk delete route exists
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Get the route collection
$routes = app('router')->getRoutes();

// Check if bulk delete route exists
$bulkDeleteRoute = null;
foreach ($routes as $route) {
    if ($route->getName() === 'certificate.bulkDelete') {
        $bulkDeleteRoute = $route;
        break;
    }
}

if ($bulkDeleteRoute) {
    echo "Bulk delete route found:\n";
    echo "Name: " . $bulkDeleteRoute->getName() . "\n";
    echo "URI: " . $bulkDeleteRoute->uri() . "\n";
    echo "Methods: " . implode(', ', $bulkDeleteRoute->methods()) . "\n";
    echo "Action: " . $bulkDeleteRoute->getActionName() . "\n";
} else {
    echo "Bulk delete route NOT found!\n";
}

// List all certificate routes
echo "\nAll certificate routes:\n";
foreach ($routes as $route) {
    if (strpos($route->getName(), 'certificate.') === 0) {
        echo "- " . $route->getName() . " (" . implode(', ', $route->methods()) . ") " . $route->uri() . "\n";
    }
}
