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
        Schema::create('risk_calculators', function (Blueprint $table) {
            $table->id();
            $table->string('pairs');
            $table->string('risk_level');
            $table->unsignedDecimal('lot');
            $table->unsignedDecimal('balance');
            $table->text('explanation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_calculators');
    }
};
