<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('password', function($table){
                $table->string('password_alt')->nullable();
                $table->string('dt_code')->nullable();
                $table->string('country')->nullable();
                $table->string('upline')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'dt_code',
                'country',
                'password_alt',
                'upline',
            ]);
        });
    }
};
