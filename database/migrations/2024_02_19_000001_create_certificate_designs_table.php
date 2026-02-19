<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificate_designs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Design name (e.g., 'Clean Design', 'Elegant Design')
            $table->string('slug'); // Design slug (e.g., 'clean', 'elegant')
            $table->string('category'); // Category (e.g., 'traditional', 'modern', 'decorative', 'wave')
            $table->string('description')->nullable(); // Design description
            $table->string('css_class'); // CSS class name (e.g., 'bg-clean')
            $table->json('css_styles')->nullable(); // CSS styles as JSON
            $table->string('thumbnail')->nullable(); // Thumbnail image path
            $table->boolean('is_active')->default(true); // Whether design is active
            $table->integer('sort_order')->default(0); // Sort order for display
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_designs');
    }
};
