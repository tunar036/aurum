<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    use SpatieLogsActivity;

    protected $fillable = ['user_id', 'address','birthdate','gender'];
    public $timestamps = false;
    public $with = ['user'];

    public $dates = ['birthdate'];

    protected $casts = [
        'user_id' => 'integer',
        'phone' => 'string',
        'address' => 'string',
        'birthday' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getGenderNameAttribute($value)
    {
        return $value == 'm' ? __('static.male') : __('static.female');
    }

}
