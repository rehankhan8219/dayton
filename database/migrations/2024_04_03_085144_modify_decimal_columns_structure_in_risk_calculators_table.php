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
        Schema::table('risk_calculators', function (Blueprint $table) {
            $table->decimal('lot', 15, 2)->change();
            $table->decimal('balance', 15, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('risk_calculators', function (Blueprint $table) {
            $table->decimal('lot', 8, 2)->change();
            $table->decimal('balance', 8, 2)->change();
        });
    }
};
