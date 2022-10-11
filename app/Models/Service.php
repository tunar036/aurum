<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\TranslatableColumnsTrait;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use Translatable,
        TranslatableColumnsTrait,
        HasSlug,
        InteractsWithMedia;

    protected $fillable = ['status'];
    protected $translatedAttributes = ['name', 'description'];

    public $with = ['translations', 'media',];

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

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
