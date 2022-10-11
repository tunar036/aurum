<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;

class CampaignTypeTranslation extends Model
{
    use SpatieLogsActivity;

    public $fillable = ['name'];
    public $timestamps = false;
}
