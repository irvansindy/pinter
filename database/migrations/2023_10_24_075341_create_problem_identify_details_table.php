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
        Schema::create('problem_identify_details', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('innovation_id')->constrained();
            $table->foreignId('problem_identify_category_id')->constrained();
            $table->longText('possible_direct_cause');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problem_identify_details');
    }
};
