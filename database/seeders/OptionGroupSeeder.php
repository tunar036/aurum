<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use App\Models\OptionGroup;
use App\Models\OptionGroupTranslation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class OptionGroupSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {

            \DB::table('option_groups')->delete();
        \DB::table('option_group_translations')->delete();

        $this->faker = Faker::create();

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        $categories = Category::all();

        $count=20;
        for ($i = 0; $i < $count; $i++) {
            $option_group =  OptionGroup::create([
                'category_id' => $categories->random()->id,
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                OptionGroupTranslation::create([
                    'option_group_id' => $option_group->id,
                    'locale' => $lang->code,
                    'name' => $this->faker->name,
                    'slug' => Str::slug($this->faker->name),
                ]);
            }
        }
        });
    }
}
