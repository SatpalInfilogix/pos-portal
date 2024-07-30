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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_code');
            $table->json('units')->nullable();
            $table->date('manufacture_date')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
