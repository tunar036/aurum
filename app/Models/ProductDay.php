<?php

namespace App\Models;

use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDay extends Model
{
    use SpatieLogsActivity, Translatable, TranslatableColumnsTrait;

    protected $fillable = ['product_id', 'expired_at', 'status'];
    public $translatedAttributes = ['title'];
    protected $dates = ['expired_at'];
    public $dateFormat = 'Y-m-d H:i:s';
    protected $casts = [
        'expired_at' => 'datetime',
    ];
    public $with = ['translations'];

    public function getExpiredDateAttribute()
    {
        return $this->expired_at->diffForHumans(now());
    }

    public function getExpiredDaysAttribute()
    {
        return $this->expired_at->diff(now())->format('%a');
    }

    public function getExpiredHoursAttribute()
    {
        return $this->expired_at->diff(now())->format('%h');
    }

    public function getExpiredMinutesAttribute()
    {
        return $this->expired_at->diff(now())->format('%i');
    }

    public function getExpiredSecondsAttribute()
    {
        return $this->expired_at->diff(now())->format('%s');
    }


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
