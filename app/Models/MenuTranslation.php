<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuTranslation extends Model
{
    use  Sluggable, SoftDeletes, SpatieLogsActivity;

    public $fillable = ['slug', 'name', 'title','keywords','description','text'];
    public $timestamps = false;

}
