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
        'selected_currency',
        'crypto_market_price',
        'crypto_purchase_price',
        'total_spend',
        'crypto_sell_price',
        'total_received',
    ];

    // relation to the portfolios table
    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
}
