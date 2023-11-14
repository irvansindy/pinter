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
        Schema::create('planning_root_cause_details', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('planning_master_id')->constrained();
            $table->foreignId('participant_id')->constrained();
            $table->enum('planning_type', ['action', 'planning']);
            $table->string('planing_step');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planning_root_cause_details');
    }
};
