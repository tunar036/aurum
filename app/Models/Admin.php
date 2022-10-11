<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasRoles, HasFactory, SpatieLogsActivity;

    protected $guard_name = 'admin';
    protected $fillable = ['name', 'email', 'role_id','status', 'password'];
    protected $hidden = ['password', 'remember_token'];
    public $with = ['role'];

    protected $casts = [

        'email_verified_at' => 'datetime'
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function setPasswordAttribute($value)
    {
       $this->attributes['password'] = bcrypt($value);
    }
}
