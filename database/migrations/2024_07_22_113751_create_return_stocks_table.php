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
        Schema::create('return_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number')->nullable();
            $table->unsignedBigInteger('returned_by');
            $table->unsignedBigInteger('store_id');
            $table->timestamps();

            $table->foreign('returned_by')->references('id')->on('users');
            $table->foreign('store_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_return_orders');
    }
};
