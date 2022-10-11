<?php

namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use Sortable, Translatable, TranslatableColumnsTrait, SpatieLogsActivity;

    protected  $fillable = ['status'];
    protected $translatedAttributes = ['name'];
    public $with = ['translations'];

    public function vacansies()
    {
        return $this->belongsToMany(Vacancy::class,'vacancy_district');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
