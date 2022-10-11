<?php

namespace App\Models;

use App\Http\Livewire\Components\Tabs\Products;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nestable\NestableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model  implements HasMedia
{
    use HasFactory,
        NestableTrait,
        Translatable,
        TranslatableColumnsTrait,
        HasSlug,
        Sortable,
        SoftDeletes,
        CascadeSoftDeletes,
        InteractsWithMedia,
        SpatieLogsActivity;

    protected $fillable = ['parent_id','mega','home', 'status','order'];
    protected $translatedAttributes = ['image_alt','name','slug', 'title','keywords','description'];
    protected $parent = 'parent_id';
    protected $cascadeDeletes = ['translations'];

    public $with = ['translations','media','products'];

    protected $dates = ['deleted_at'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb-small')
            ->width(22)
            ->height(22)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-medium')
            ->width(180)
            ->height(180)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-large')
            ->width(312)
            ->height(244)
            ->queued();
    }

    public function getAppUrlAttribute()
    {
        if (isset($this->transslug)) {
            return route('frontend.category.show', ['slug' => $this->transslug]);
        }
        return 'javascript:void(0);';
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function parent():HasOne
    {
        return $this->hasOne(Category::class, 'id', 'parent_id')->where('status', '=', '1');
    }

    public function options(): HasMany
    {
        return $this->hasMany(OptionGroup::class)->active()->with('options');
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class,'parent_id')->where('status', '=', '1');
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', 0);
    }

    public function scopeMega($query)
    {
        return $query->where('mega', '1');
    }

    public function scopeHome($query)
    {
        return $query->where('home', '1');
    }

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
