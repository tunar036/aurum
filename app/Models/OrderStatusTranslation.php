<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatusTranslation extends Model
{
    use SoftDeletes, SpatieLogsActivity;

    public $timestamps = false;
    protected $fillable = ['name'];
}
