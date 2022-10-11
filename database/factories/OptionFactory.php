<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\AttributeTranslation;
use App\Models\Language;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\OptionTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class OptionFactory extends Factory
{
    public function definition()
    {
        \DB::table('options')->delete();
        \DB::table('option_translations')->delete();

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        $options_groups = OptionGroup::all();

        $count=20;
        for ($i = 0; $i < $count; $i++) {
            $option =  Option::create([
                'option_group_id' => $options_groups->random()->id,
                'status' => 1
            ]);
            foreach ($active_langs as $lang) {
                OptionTranslation::create([
                    'option_id' => $option->id,
                    'locale' => $lang->code,
                    'name' => $this->faker->name,
                    'slug' => Str::slug($this->faker->name),
                ]);
            }
        }
    }
}
