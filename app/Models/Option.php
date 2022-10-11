<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory,
        Translatable,
        TranslatableColumnsTrait,
        Sortable,
        HasSlug,
        SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity;

    protected $fillable = ['option_group_id','status'];
    public $translatedAttributes = ['name','slug'];
    protected $cascadeDeletes = ['translations'];
    public $with = ['translations'];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function group():BelongsTo
    {
        return $this->belongsTo(OptionGroup::class,'option_group_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
