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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('order_id'); // Foreign key for orders
            $table->integer('product_id'); // Foreign key for products
            $table->integer('quantity'); // Quantity of the product
            $table->text('notes'); // Price of the product
            $table->timestamps();

            // Foreign key constraints

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
