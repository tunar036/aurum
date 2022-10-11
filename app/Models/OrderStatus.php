<?php

namespace App\Models;

use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use Translatable,
        TranslatableColumnsTrait,
        SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity;

    public $translatedAttributes = ['name'];

    protected $fillable = ['status'];
    protected $cascadeDeletes = ['translations'];
    public $with = ['translations'];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
