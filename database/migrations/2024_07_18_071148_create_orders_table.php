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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('OrderID')->nullable();
            $table->date('OrderDate')->nullable();
            $table->string('CustomerID')->nullable();
            $table->string('CustomerName')->nullable();
            $table->string('CustomerEmail')->nullable();
            $table->string('CustomerPhone')->nullable();
            $table->text('ShippingAddress')->nullable();
            $table->text('BillingAddress')->nullable();
            $table->string('OrderStatus')->nullable();
            $table->string('PaymentMethod')->nullable();
            $table->string('PaymentStatus')->nullable();
            $table->float('TotalAmount')->nullable();
            $table->float('TaxAmount')->nullable();
            $table->float('DiscountAmount')->nullable();
            $table->text('OrderNotes')->nullable();
            $table->float('tender_amount')->nullable();
            $table->float('change_amount', 8, 1)->nullable();
            $table->integer('card_digits')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->integer('store_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
