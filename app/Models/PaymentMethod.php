<?php

namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PaymentMethod extends Model implements HasMedia
{
    use Translatable,
        Sortable,
        InteractsWithMedia,
        SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity;

    public $translatedAttributes = ['name'];
    protected $fillable = ['status'];
    protected $cascadeDeletes = ['translations'];
    public $with = ['translations','media'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb-small')
            ->width(26)
            ->height(26)
            ->queued();
    }

    public function getTransNameAttribute()
    {
        return $this->translate(config('app.locale'))['name']
            ?? $this->translate(config('app.fallback_locale'))['name'];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
