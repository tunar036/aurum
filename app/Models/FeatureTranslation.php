<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    public $fillable = ['name','description'];
    public $timestamps = false;
}
