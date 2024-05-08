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
        Schema::create('login_error', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("email")->nullable()->unique();
            $table->string("error")->nullable()->default('fales');
            $table->timestamp("error_date")->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_error');
    }
};
