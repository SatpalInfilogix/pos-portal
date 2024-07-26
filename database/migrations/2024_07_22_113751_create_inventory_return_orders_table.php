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
        Schema::create('inventory_return_orders', function (Blueprint $table) {
            $table->id();
            $table->string('return_invoice_id');
            $table->string('order_id');
            $table->string('customer_id')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('from_location')->nullable();
            $table->text('to_location')->nullable();
            $table->string('name');
            $table->string('product_id');
            $table->json('quantity_type')->nullable();
            $table->json('quantity')->nullable();
            $table->date('manufacture_date')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('category_id');
            $table->string('price');
            $table->string('product_total_amount');
            $table->integer('created_by');
            $table->timestamps();
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
