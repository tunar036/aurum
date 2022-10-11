<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes, SpatieLogsActivity;
    protected $fillable = ['email'];
    public $date = ['created_at'];
}
