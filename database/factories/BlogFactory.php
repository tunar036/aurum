<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    public function definition()
    {
        \DB::table('blogs')->delete();
        \DB::table('blog_translations')->delete();

        $active_langs = Cache::rememberForever('active_langs', function () {
            return Language::active()->get();
        });

        $count=100;
        for ($i = 0; $i < $count; $i++) {
            $blog =  Blog::create([
                'status' => 1
            ]);

            foreach ($active_langs as $lang) {
                BlogTranslation::create([
                    'blog_id' => $blog->id,
                    'name' => $this->faker->name,
                    'slug' => Str::slug($this->faker->name),
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
