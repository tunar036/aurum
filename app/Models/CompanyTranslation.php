<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends Model
{
    use Sluggable;

    public $fillable = ['name', 'slug', 'title','keywords','description'];
    public $timestamps = false;
}
