<?php
// Clear Laravel caches
echo "Clearing Laravel caches...\n";

// Clear route cache
if (file_exists(__DIR__ . '/bootstrap/cache/routes.php')) {
    unlink(__DIR__ . '/bootstrap/cache/routes.php');
    echo "Route cache cleared.\n";
}

// Clear config cache
if (file_exists(__DIR__ . '/bootstrap/cache/config.php')) {
    unlink(__DIR__ . '/bootstrap/cache/config.php');
    echo "Config cache cleared.\n";
}

// Clear compiled views
$viewsPath = __DIR__ . '/storage/framework/views';
if (is_dir($viewsPath)) {
    $files = glob($viewsPath . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    echo "Compiled views cleared.\n";
}

echo "Cache clearing completed.\n";
echo "Please try accessing the bulk delete functionality again.\n";
echo "Test routes:\n";
echo "- http://bplozoning.test/basic-test\n";
echo "- http://bplozoning.test/debug-routes\n";
echo "- http://bplozoning.test/certificate/test-bulk (requires login)\n";
