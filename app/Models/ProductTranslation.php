<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTranslation extends Model
{
    use SoftDeletes, SpatieLogsActivity;

    public $timestamps = false;
    protected $fillable = ['image_alt','title', 'description', 'keywords', 'text'];
}
