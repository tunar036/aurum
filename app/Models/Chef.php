<?php

namespace App\Models;


use App\Traits\SpatieLogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Chef extends Authenticatable implements HasMedia, Viewable
{
    use 
    HasApiTokens,
    HasFactory,
    Notifiable,
    TwoFactorAuthenticatable,
    SpatieLogsActivity,
    InteractsWithViews,
    InteractsWithMedia;

    public $with =['media'];
    protected $fillable = [
        'name',
        'status',
        'position',
    ];

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

    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
}