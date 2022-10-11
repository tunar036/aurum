<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Models\Category;
use App\Models\Language;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition()
    {
        \DB::table('products')->delete();
        \DB::table('product_translations')->delete();
        \DB::table('attribute_product')->delete();
        \DB::table('option_product')->delete();


        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        $categories = Category::active()->get();
        $product_statuses   = ProductStatus::active()->get();
        $options    = Option::active()->get();

        $count=20;
        for ($i = 0; $i < $count; $i++) {
            $product =  Product::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'category_id' => $categories->random()->id,
                'status_id' => $product_statuses->random()->id,
                'quantity_type' => $this->faker->randomElement(['1', '2', '3']),
                'quantity' => $this->faker->randomNumber(2),
                'weight' => $this->faker->randomFloat(2, 0, 100),
                'length' => $this->faker->randomFloat(2, 0, 100),
                'height' => $this->faker->randomFloat(2, 0, 100),
                'width' => $this->faker->randomFloat(2, 0, 100),
                'points' => $this->faker->randomNumber(2),
                'minimum' => $this->faker->randomNumber(2),
                'price' => $this->faker->randomFloat(2, 1, 100),
                'status' => 1
            ]);

            $product->options()->sync($options->random(3)->pluck('id')->toArray());

            foreach ($active_langs as $lang) {
                BrandTranslation::create([
                    'product_id' => $product->id,
                    'locale' => $lang->code,
                    'title' => $this->faker->sentence(),
                    'keywords' => $this->faker->sentence(),
                    'description' => $this->faker->sentence(),
                    'text' => $this->faker->text(100),
                ]);
            }
        }

    }
}
