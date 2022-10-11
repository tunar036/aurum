<?php

namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RandProduct extends Model
{
    use Sortable,
        SoftDeletes,
        Translatable,
        TranslatableColumnsTrait,
        SpatieLogsActivity;

    protected $fillable = ['product_id', 'status', 'order'];
    public $translatedAttributes = ['title'];
    public $with = ['translations'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
