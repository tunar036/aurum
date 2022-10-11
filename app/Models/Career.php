<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\TranslatableColumnsTrait;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
class Career extends Model
{
    use Translatable,
        TranslatableColumnsTrait,
        HasSlug,
        InteractsWithMedia;

    protected $fillable = ['status'];
    protected $translatedAttributes = ['name', 'description'];

    public $with = ['translations'];


    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}