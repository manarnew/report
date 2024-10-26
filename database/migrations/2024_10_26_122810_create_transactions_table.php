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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to products table
            $table->enum('type', ['open_stock', 'purchase', 'sell', 'sell_return', 'purchase_return', 'adjustment']);
            $table->integer('quantity'); // Quantity involved in the transaction
            $table->decimal('amount', 10, 2); // Amount for the transaction
            $table->date('transaction_date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
