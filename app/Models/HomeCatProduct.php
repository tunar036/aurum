<?php

namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeCatProduct extends Model implements HasMedia
{
    use Sortable,InteractsWithMedia, SpatieLogsActivity;

    protected $fillable = ['category_id', 'status', 'order'];
    public $with = ['media','category'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb-small')
            ->width(22)
            ->height(22)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-medium')
            ->width(180)
            ->height(180)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-large')
            ->width(312)
            ->height(244)
            ->queued();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
