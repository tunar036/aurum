<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTranslation extends Model
{
    use Sluggable, SoftDeletes, SpatieLogsActivity;

    public $fillable = ['image_alt','name', 'slug', 'title','keywords','description','text'];
    public $timestamps = false;
}
