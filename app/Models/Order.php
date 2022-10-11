<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SpatieLogsActivity,
        SoftDeletes,
        CascadeSoftDeletes;

    protected $cascadeDeletes = ['products'];

    protected $fillable = [
        'order_id',
        'session_id',
        'ip_address',
        'more_info',
        'firstname',
        'lastname',
        'phone',
        'email',
        'address',
        'payment_method_id',
        'delivery_method_id',
        'order_status_id',
        'total_amount',
    ];
    


    public $dates = [
        'created_at',
    ];

    public function getTimeAttribute()
    {
        return $this->created_at->format('M d, Y');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function deliveryMethod(): BelongsTo
    {
        return $this->belongsTo(DeliveryMethod::class);
    }

    public function creditMonth(): BelongsTo
    {
        return $this->belongsTo(Credit::class,'credit_month_id','id');
    }

    public function installmentCardMonth(): BelongsTo
    {
        return $this->belongsTo(InstallmentCardMonth::class,'installment_card_month_id','id');
    }


    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class);
    }

}
