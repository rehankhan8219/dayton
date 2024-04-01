<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::table('brokers', function (Blueprint $table) {
            $table->dropColumn('risk_calculator_id');
            $table->string('risk_level')->after('pairs')->nullable();
            $table->string('lot')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('brokers', function (Blueprint $table) {
            $table->dropColumn('risk_level');
            $table->unsignedBigInteger('risk_calculator_id')->after('pairs')->change();
            $table->double('lot')->nullable(false)->change();
        });
    }
};
