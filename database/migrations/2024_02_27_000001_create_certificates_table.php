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
        if (!Schema::hasTable('certificates')) {
            Schema::create('certificates', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('certificate_type');
                $table->string('owner_name');
                $table->text('address');
                $table->string('border_style')->nullable();
                $table->string('day')->nullable();
                $table->string('month')->nullable();
                $table->string('year')->nullable();
                $table->string('certificate_number')->unique();
                $table->string('file_path')->nullable();
                $table->json('additional_data')->nullable();
                $table->timestamps();
                
                $table->index(['user_id', 'certificate_type']);
                $table->index('certificate_number');
            });
        } else {
            // If table exists, add missing columns
            if (!Schema::hasColumn('certificates', 'additional_data')) {
                Schema::table('certificates', function (Blueprint $table) {
                    $table->json('additional_data')->nullable()->after('file_path');
                });
            }
            if (!Schema::hasColumn('certificates', 'border_style')) {
                Schema::table('certificates', function (Blueprint $table) {
                    $table->string('border_style')->nullable()->after('address');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
