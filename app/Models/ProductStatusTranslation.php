<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductStatusTranslation extends Model
{
    use Sluggable, SoftDeletes, SpatieLogsActivity;

    public $timestamps = false;
    protected $fillable = ['name','slug'];
}
