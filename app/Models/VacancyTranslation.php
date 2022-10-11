<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacancyTranslation extends Model
{
    public $fillable = ['name','text'];
    public $timestamps = false;
}