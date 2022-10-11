<?php

namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeCompare extends Model
{
    use Sortable,
        SoftDeletes,
        SpatieLogsActivity;

    protected $fillable = ['product_id', 'status', 'order'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
