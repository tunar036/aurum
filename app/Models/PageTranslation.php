<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    use SpatieLogsActivity;

    public $timestamps = false;
    protected $fillable = ['name', 'page_title', 'title', 'description', 'keywords', 'text'];
}
