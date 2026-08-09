<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->unique();
            $table->string('location')->nullable();
            $table->string('duration')->nullable();
            $table->foreignId('category_id')->nullable()->after('slug')->constrained()->nullOnDelete();

            // translatable
            $table->json('title');
            $table->json('overview')->nullable();
            $table->json('scope_summary')->nullable(); // short "delivered" line used on cards
            $table->json('deliverables')->nullable();  // array of 3 bullet points, per locale

            $table->string('video_url')->nullable(); // optional external/uploaded video URL

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
