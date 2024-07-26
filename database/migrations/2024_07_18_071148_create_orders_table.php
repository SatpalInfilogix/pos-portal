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
            $table->integer('TotalAmount')->nullable();
            $table->integer('TaxAmount')->nullable();
            $table->integer('DiscountAmount')->nullable();
            $table->text('OrderNotes')->nullable();
            $table->integer('CreatedBy')->nullable();
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
