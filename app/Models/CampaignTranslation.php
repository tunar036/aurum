<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;

class CampaignTranslation extends Model
{
    use Sluggable, SpatieLogsActivity;
    public $fillable = ['slug', 'name', 'title','keywords','description','note','text'];
    public $timestamps = false;
}
