<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstallmentCardMonth extends Model
{
    use SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity;

    protected $fillable = ['installment_card_id','month','status'];

    public function installmentCard(): BelongsTo
    {
        return $this->belongsTo(InstallmentCard::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
