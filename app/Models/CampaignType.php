<?php

namespace App\Models;

use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CampaignType extends Model
{
    use Sortable, Translatable, TranslatableColumnsTrait, SpatieLogsActivity;

    protected $fillable = ['status','order'];
    protected $translatedAttributes = ['name'];
    public $with = ['translations'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
