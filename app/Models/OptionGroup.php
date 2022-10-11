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
use Illuminate\Database\Eloquent\SoftDeletes;

class OptionGroup extends Model
{
    use HasFactory,
        Translatable,
        TranslatableColumnsTrait,
        Sortable,
        HasSlug,
        SoftDeletes,
        CascadeSoftDeletes,
        SpatieLogsActivity;

    protected $fillable = ['category_id','status','is_filtered'];
    public $translatedAttributes = ['name','slug'];
    protected $cascadeDeletes = ['translations','options'];
    public $with = ['translations'];

    public function options()
    {
        return $this->hasMany(Option::class)->active();
    }

    public function category():belongsTo
    {
        return $this->belongsTo(Category::class)->active();
    }

    public function scopeFiltered($query)
    {
        return $query->where('status', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
