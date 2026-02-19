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
        Schema::create('certificate_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Template name (e.g., 'Business Zoning', 'Residential Zoning')
            $table->string('slug'); // URL-friendly slug
            $table->string('category'); // Category (business, residential, special)
            $table->text('description')->nullable(); // Template description
            $table->string('view_file'); // Blade view file name
            $table->json('fields')->nullable(); // Required fields as JSON
            $table->string('icon')->nullable(); // Icon class
            $table->string('color')->default('blue'); // Theme color
            $table->boolean('is_active')->default(true); // Whether template is active
            $table->integer('sort_order')->default(0); // Sort order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_templates');
    }
};
