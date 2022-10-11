<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use SpatieLogsActivity;

    protected $fillable = ['user_id','address','default'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
