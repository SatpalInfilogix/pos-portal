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
        Schema::create('return_stock_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('return_stock_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('quantity')->nullable();
            $table->unsignedBigInteger('transfer_quantity')->nullable();
            $table->unsignedBigInteger('received_quantity')->nullable();
            $table->integer('received_by')->nullable();
            $table->timestamps();

            $table->foreign('return_stock_id')->references('id')->on('return_stocks');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_stock_products');
    }
};
