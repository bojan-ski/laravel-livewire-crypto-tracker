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
        'purchase_price',
        'purchase_currency',
        'crypto_price_on_purchase_day_usd',
        'crypto_price_on_purchase_day_ecosystem',
        'sell_price',
        'sell_currency',
        'crypto_price_on_sell_day_usd',
        'crypto_price_on_sell_day_ecosystem',
    ];

    // relation to the portfolios table
    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
}
