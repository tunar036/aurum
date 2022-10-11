<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable, SpatieLogsActivity;

    public $translatedAttributes = ['content'];

    protected $guarded = [];
}
