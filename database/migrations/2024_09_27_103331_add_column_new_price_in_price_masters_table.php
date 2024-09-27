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
        Schema::table('price_masters', function (Blueprint $table) {
            $table->string('new_price')->nullable();
            $table->date('start_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('price_masters', function (Blueprint $table) {
            $table->dropColumn(['new_price', 'start_date']);
        });
    }
};
