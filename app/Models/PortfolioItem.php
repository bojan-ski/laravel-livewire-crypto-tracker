<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $table = 'portfolio_items';
    protected $fillable = [
        'portfolio_id',
        'coin_id',
        'quantity',
        'crypto_purchase_price',
        'crypto_market_price_on_purchase',
        'total_spend',
        'purchase_currency',
        'crypto_sell_price',
        'crypto_market_price_on_sell',
        'total_received',
    ];

    // relation to the portfolios table
    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
}
