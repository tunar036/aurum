<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsFilterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'slug' => $this->appurl,
          'category_id' => optional($this->category)->id,
          'category_name' => optional($this->category)->transname,
          'brand_name' => optional($this->brand)->name,
          'quantity' => $this->quantity,
          'price' => $this->price,
          'discount_price' => $this->discount_price,
          'image' => $this->getFirstMediaUrl('product_images')  ?: asset('backend/img/noimage.jpg'),
        ];
    }
}
