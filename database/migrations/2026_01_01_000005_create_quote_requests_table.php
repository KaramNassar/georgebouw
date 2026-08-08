<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->json('scope'); // array of service slugs picked in step 1
            $table->string('property_type')->nullable();   // apartment | house | villa | commercial
            $table->unsignedInteger('size_m2')->nullable();
            $table->string('urgency')->nullable();          // flexible | soon | urgent
            $table->string('material')->nullable();         // standard | premium | luxury
            $table->string('budget_bracket')->nullable();   // a | b | c

            $table->unsignedInteger('estimate_low')->nullable();
            $table->unsignedInteger('estimate_high')->nullable();

            $table->string('locale', 5)->default('nl');
            $table->string('status')->default('new'); // new | contacted | quoted | won | lost
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
