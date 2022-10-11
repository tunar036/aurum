<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Credit extends Model
{
    protected $fillable = ['month'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
