<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Badge;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Language;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\ProductTranslation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {

            $this->faker = Faker::create();

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        $categories = Category::active()->get();
        $statuses   = ProductStatus::active()->get();
        $options    = Option::active()->get();

        $count=10;
        for ($i = 0; $i < $count; $i++) {
            $product =  Product::create([
                'name' => $this->faker->name,
                'slug' => Str::slug($this->faker->name),
                'category_id' => $categories->random()->id,
                'quantity_type' => $this->faker->randomElement(['1', '2', '3']),
                'quantity' => $this->faker->randomNumber(2),
                'weight' => $this->faker->randomFloat(2, 0, 100),
                'length' => $this->faker->randomFloat(2, 0, 100),
                'height' => $this->faker->randomFloat(2, 0, 100),
                'width' => $this->faker->randomFloat(2, 0, 100),
                'points' => $this->faker->randomNumber(2),
                'minimum' => $this->faker->randomNumber(2),
                'price' => $this->faker->randomFloat(2, 1, 100),
                'discount_price' => $this->faker->randomFloat(2, 1, 100),
                'status' => 1
            ]);

            $product->attributes()->sync($attributes->random(3)->pluck('id')->toArray());
            $product->options()->sync($options->random(3)->pluck('id')->toArray());
            // $product->badges()->sync($badges->random(1)->pluck('id')->toArray());
            $product->productStatuses()->sync($statuses->random(1)->pluck('id')->toArray());

            foreach ($active_langs as $lang) {
                ProductTranslation::create([
                    'product_id' => $product->id,
                    'locale' => $lang->code,
                    'title' => $this->faker->sentence(),
                    'keywords' => $this->faker->sentence(),
                    'description' => $this->faker->sentence(),
                    'text' => $this->faker->text(100),
                ]);
            }
        }
        });
    }
}
