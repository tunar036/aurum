<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethodTranslation extends Model
{
    use SoftDeletes, SpatieLogsActivity;

    public $timestamps = false;
    public $fillable = ['name'];
}
