<?php

namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements HasMedia
{
    use Sortable, Translatable, InteractsWithMedia, TranslatableColumnsTrait, SpatieLogsActivity;

    protected $fillable = ['status','link'];
    protected $translatedAttributes = ['image_alt','name', 'text'];
    public $with = ['translations','media'];

    public function registerMediaConversions(Media $media = null): void
    {

        $this
            ->addMediaConversion('thumb-small')
            ->width(64)
            ->height(64)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-medium')
            ->width(348)
            ->height(248)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-large')
            ->width(872)
            ->height(432)
            ->optimize()
            ->queued();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
