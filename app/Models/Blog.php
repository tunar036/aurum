<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\HasTimeago;
use App\Models\Concerns\Sluggable;
use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia, Viewable
{
    use HasFactory,
        Translatable,
        HasTimeago,
        TranslatableColumnsTrait,
        HasSlug,
        Sortable,
        SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity,
        InteractsWithViews,
        InteractsWithMedia;

    protected  $fillable = ['status'];
    public $translatedAttributes = ['image_alt','name','slug','title', 'description', 'keywords','text'];
    protected $cascadeDeletes = ['translations'];
    public $with = ['translations','media'];

    protected $date= ['created_at'];
    protected $dateFormat = 'Y-m-d';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

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
            ->width(768)
            ->height(548)
            ->optimize()
            ->queued();
    }


    public function getAdminUrlAttribute(): string
    {
        if (isset($this->id)) {
            return route('backend.blogs.show', ['id' => $this->id]);
        }
        return 'javascript:void(0);';
    }

    public function getAppUrlAttribute()
    {
        if (isset($this->transslug)) {
            return route('frontend.blogs.show', ['slug' => $this->transslug]);
        }
        return 'javascript:void(0);';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
