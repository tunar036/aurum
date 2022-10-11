<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use SpatieLogsActivity;

    protected $fillable = ['name','code','default','status'];
    protected  $table= 'language';

    public function scopeDefault($query)
    {
        return $query->where('default', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
