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
        Schema::create('innovations', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('request_no')->unique();
            $table->string('title');
            $table->unsignedInteger('user_id');
            $table->longText('problem_identification')->nullable();
            $table->longText('problem_background')->nullable();
            $table->longText('target_specify')->nullable();
            $table->string('diagram_image')->nullable();
            $table->dateTime('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('innovations');
    }
};
