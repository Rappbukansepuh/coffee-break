<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'customer_name',
        'customer_notes',
        'total_price',
        'status', // pending, processing, completed, cancelled
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    /**
     * Rincian item yang dibeli dalam pesanan ini.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
