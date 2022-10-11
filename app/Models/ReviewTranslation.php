<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewTranslation extends Model
{
    public $fillable = ['name','title','description'];
    public $timestamps = false;
}