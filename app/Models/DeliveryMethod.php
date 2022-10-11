<?php


namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryMethod extends Model
{
    use Translatable,
        Sortable,
        SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity;

    public $translatedAttributes = ['name','address'];
    protected $fillable = ['price','status'];
    protected $cascadeDeletes = ['translations'];
    public $with = ['translations'];

    public function getTransNameAttribute()
    {
        return $this->translate(config('app.locale'))['name']
            ?? $this->translate(config('app.fallback_locale'))['name'];
    }

    public function getTransAddressAttribute()
    {
        return $this->translate(config('app.locale'))['address']
            ?? $this->translate(config('app.fallback_locale'))['address'];
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
