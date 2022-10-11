<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Campaign extends Model implements HasMedia
{
    use Sortable, Translatable, TranslatableColumnsTrait, HasSlug, SpatieLogsActivity, InteractsWithMedia;

    protected $fillable = ['status','order'];
    protected $translatedAttributes = ['slug', 'name','note', 'text','keywords','description','title'];
    public $with = ['translations','media'];


    public function getTransNoteAttribute()
    {
        return $this->translate(config('app.locale'))['note']
            ?? $this->translate(config('app.fallback_locale'))['note'];
    }

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
            ->width(1074)
            ->height(490)
            ->optimize()
            ->queued();

    }

    public function detail(): HasOne
    {
        return $this->hasOne(CampaignDetail::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
