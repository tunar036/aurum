<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    use SpatieLogsActivity;

    public $timestamps = false;
    protected $fillable = ['question', 'answer'];
}
