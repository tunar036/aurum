<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\TranslatableColumnsTrait;
use Astrotomic\Translatable\Translatable;

class Vacancy extends Model
{
    use Translatable,
        TranslatableColumnsTrait,
        HasSlug;

    protected $fillable = ['status'];
    protected $translatedAttributes = ['name', 'text'];

    public $with = ['translations'];


    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}