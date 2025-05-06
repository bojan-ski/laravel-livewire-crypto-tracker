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
            $table->decimal('quantity', 20, 8);
            $table->decimal('purchase_price', 20, 8)->nullable();
            $table->string('purchase_currency', 20)->default('USD')->nullable();
            $table->decimal('crypto_price_on_purchase_day_usd', 20, 8)->nullable();
            $table->decimal('crypto_price_on_purchase_day_ecosystem', 20, 8)->nullable();
            $table->decimal('sell_price', 20, 8)->nullable();
            $table->string('sell_currency', 20)->default('USD')->nullable();
            $table->decimal('crypto_price_on_sell_day_usd', 20, 8)->nullable();
            $table->decimal('crypto_price_on_sell_day_ecosystem', 20, 8)->nullable();
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
