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
        Schema::create('commune', function (Blueprint $table) {
            $table->id();
            $table->string('commune_khmer')->nullable();
            $table->string('commune_english')->nullable();
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('district');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commune');
    }
};
