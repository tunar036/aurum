<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use SpatieLogsActivity, SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'price',
        'discount_price',
        'subtotal_amount',
        'quantity',
    ];
    public $with = ['product'];

    public $timestamps = false;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->with('media');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
