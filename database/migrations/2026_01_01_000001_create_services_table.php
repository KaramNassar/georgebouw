<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('icon')->default('hammer'); // lucide icon name
            $table->unsignedInteger('base_price')->default(0);   // € starting price
            $table->unsignedInteger('price_per_m2')->default(0); // € per m² used by the estimator

            // translatable (spatie/laravel-translatable) — stored as {"nl": "...", "en": "..."}
            $table->json('name');
            $table->json('short_description');
            $table->json('long_description')->nullable();
            $table->json('included')->nullable(); // array of 4 bullet points, per locale

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
