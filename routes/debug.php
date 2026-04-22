<?php

use App\Models\Certificate;

Route::get('/debug-certificates', function() {
    $certificates = Certificate::all();
    
    echo "<h2>All Certificates in Database:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Type</th><th>Owner</th><th>Address</th><th>User ID</th><th>Created</th></tr>";
    
    foreach ($certificates as $cert) {
        echo "<tr>";
        echo "<td>" . $cert->id . "</td>";
        echo "<td>" . $cert->certificate_type . "</td>";
        echo "<td>" . $cert->owner_name . "</td>";
        echo "<td>" . $cert->address . "</td>";
        echo "<td>" . $cert->user_id . "</td>";
        echo "<td>" . $cert->created_at . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    echo "<h2>Current User ID: " . (auth()->check() ? auth()->id() : 'Not logged in') . "</h2>";
    
    if (auth()->check()) {
        $userCerts = Certificate::where('user_id', auth()->id())->get();
        echo "<h2>User's Certificates (" . $userCerts->count() . "):</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Type</th><th>Owner</th><th>Address</th><th>Created</th></tr>";
        
        foreach ($userCerts as $cert) {
            echo "<tr>";
            echo "<td>" . $cert->id . "</td>";
            echo "<td>" . $cert->certificate_type . "</td>";
            echo "<td>" . $cert->owner_name . "</td>";
            echo "<td>" . $cert->address . "</td>";
            echo "<td>" . $cert->created_at . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
});
