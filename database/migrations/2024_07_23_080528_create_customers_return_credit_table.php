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
        Schema::create('customers_return_credit', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('credit_amount')->nullable();
            $table->string('debit_amount')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('return_invoice_id')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_return_credit');
    }
};
