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
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')->constrained('portfolios')->onDelete('cascade');
            $table->string('coin_id');
            $table->decimal('quantity', 20, 2);
            $table->string('selected_currency', 20)->default('USD')->nullable();
            $table->decimal('crypto_market_price', 20, 2)->nullable();
            $table->decimal('crypto_purchase_price', 20, 2)->nullable();
            $table->decimal('total_spend', 20, 2)->nullable();
            $table->decimal('crypto_sell_price', 20, 2)->nullable();
            $table->decimal('total_received', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_items');
    }
};
