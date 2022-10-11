<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;

class DistrictTranslation extends Model
{
    use SpatieLogsActivity;

    public $timestamps = false;
    protected $fillable = ['name'];
}
