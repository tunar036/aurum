<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\TranslatableColumnsTrait;
use Astrotomic\Translatable\Translatable;

class Review extends Model
{
    use Translatable,
        TranslatableColumnsTrait,
        HasSlug;

    protected $fillable = ['status'];
    protected $translatedAttributes = ['name', 'title','description'];

    public $with = ['translations'];

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
