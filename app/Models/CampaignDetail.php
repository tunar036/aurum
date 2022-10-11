<?php

namespace App\Models;

use App\Traits\SpatieLogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CampaignDetail extends Model
{
    use SpatieLogsActivity;

    protected $fillable = ['campaign_id','campaign_type_id','status','started_at','ended_at','campaign_discount_price','campaign_discount_percent'];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime'
    ];

    public function campaign():BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function campaignType(): HasOne
    {
        return $this->hasOne(CampaignType::class, 'id', 'campaign_type_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'campaign_category','campaign_detail_id','category_id');
    }



    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class,'campaign_product','campaign_detail_id','product_id')->withPivot('product_price','product_price_after_discount')->withTimestamps();
    }

}
