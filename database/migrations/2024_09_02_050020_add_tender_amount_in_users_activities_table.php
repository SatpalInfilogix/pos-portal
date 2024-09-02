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
        Schema::table('users_activities', function (Blueprint $table) {
            $table->decimal('amount_during_login', 10, 2)->nullable();
            $table->decimal('amount_during_logout', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_activities', function (Blueprint $table) {
            $table->dropColumn(['amount_during_login', 'amount_during_logout']);
        });
    }
};
