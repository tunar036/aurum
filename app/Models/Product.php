<?php

namespace App\Models;

use App\Enums\ProductStatusType;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use App\Models\Concerns\Sortable;
use App\Models\Concerns\TranslatableColumnsTrait;
use App\Traits\SpatieLogsActivity;
use Astrotomic\Translatable\Translatable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia, Viewable
{
    use HasFactory,
        Translatable,
        TranslatableColumnsTrait,
        HasSlug,
        Sortable,
        Sluggable,
        InteractsWithViews,
        InteractsWithMedia,
        SpatieLogsActivity;

    protected $fillable = [
         'id', 'category_id','name', 'slug', 'price','status'
    ];
//    protected $fillable = [
//         'id','brand_id', 'category_id','name', 'slug', 'quantity_type', 'quantity', 'price',
//        'discount_number', 'discount_price','weight','length','height','width','points','minimum','status'
//    ];

    public $translatedAttributes = ['title', 'description', 'keywords','text'];
    public $with = ['translations','media'];

    public function registerMediaConversions(Media $media = null): void
    {

        $this
            ->addMediaConversion('thumb-small')
            ->width(60)
            ->height(72)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-medium')
            ->width(188)
            ->height(188)
            ->optimize()
            ->queued();

        $this
            ->addMediaConversion('thumb-large')
            ->width(520)
            ->height(648)
            ->optimize()
            ->queued();
    }

    public function getAppUrlAttribute()
    {

        if (isset($this->slug)) {
            return route('frontend.product.show', ['slug' => $this->slug]);
        }

        return 'javascript:void(0);';
    }


    public function getAdminUrlAttribute()
    {
        if (isset($this->id)) {
            return route('backend.products.show', $this->id);
        }

        return 'javascript:void(0);';
    }

    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(Campaign::class);
    }

    public function credits(): BelongsToMany
    {
        return $this->belongsToMany(Credit::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function productStatuses(): BelongsToMany
    {
        return $this->belongsToMany(ProductStatus::class,'product_status');
    }

    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(Badge::class);
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class)->with('group');
    }

    public function scopePopular($query)
    {
        return $query->orderByUniqueViews()->whereRelation('productStatuses','product_status_id',ProductStatusType::POPULAR_PRODUCTS);
    }

    public function scopeNewProducts($query)
    {
        return $query->whereRelation('productStatuses','product_status_id',ProductStatusType::NEW_PRODUCTS);
    }

    public function scopeBestSeller($query)
    {
        return $query->whereRelation('productStatuses','product_status_id',ProductStatusType::BEST_SELLER_PRODUCTS);
    }

    public function scopeDiscount($query)
    {
        return $query->whereNotNull('discount_price');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
