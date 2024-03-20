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
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('broker_id');
            $table->string('broker_server');
            $table->string('broker_password');
            $table->string('pairs');
            $table->unsignedBigInteger('risk_calculator_id');
            $table->unsignedDouble('lot');
            $table->unsignedTinyInteger('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brokers');
    }
};
