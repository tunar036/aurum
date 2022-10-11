<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sortable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nestable\NestableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Menu extends Authenticatable implements HasMedia, Viewable
{
    use
        NestableTrait,
        HasSlug,
        Sortable,
        Translatable,
        TranslatableColumnsTrait,
        SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity,
        InteractsWithViews,
        InteractsWithMedia;

    protected $fillable = ['positions','parent_id', 'status'];
    protected $translatedAttributes = ['slug', 'name', 'text','keywords','description','title'];
    protected $parent = 'parent_id';
    protected $cascadeDeletes = ['translations'];

    public $with = ['translations','media'];

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

//    public static function boot()
//    {
//        parent::boot();
//
//    }

public function registerMediaConversions(Media $media = null): void
{
    $this
        ->addMediaConversion('thumb-small')
        ->width(64)
        ->height(64)
        ->queued();

    $this
        ->addMediaConversion('thumb-medium')
        ->width(348)
        ->height(248)
        ->queued();

    $this
        ->addMediaConversion('thumb-large')
        ->width(768)
        ->height(548)
        ->queued();
}

    public function getUrlAttribute()
    {
        if (isset($this->transslug)) {
            return route('frontend.menus.show', ['slug' => $this->transslug]);
        }
        return 'javascript:void(0);';
    }


    public function getPositionsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->where('status', '=', '1');
    }

    public function parent()
    {
        return $this->hasOne(Menu::class, 'id', 'parent_id')->where('status', '=', '1');
    }

    public static function parentList()
    {
        return static::where(['status'=>'1','parent_id'=>0])->orderBy('order','asc');
    }

    public function scopeNotId($query, $value)
    {
        return $query->where('id', '!=', $value);
    }
}
