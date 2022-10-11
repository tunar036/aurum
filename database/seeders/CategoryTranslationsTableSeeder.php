<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_translations')->delete();
        
        \DB::table('category_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'locale' => 'az',
                'name' => 'Səhər yeməyi',
                'slug' => 'seher-yemeyi',
                'title' => 'Səhər yeməyi',
                'keywords' => 'Səhər yeməyi',
                'description' => 'Səhər yeməyi',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'locale' => 'en',
                'name' => 'Breakfast',
                'slug' => 'breakfast',
                'title' => 'Breakfast',
                'keywords' => 'Breakfast',
                'description' => 'Breakfast',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 1,
                'locale' => 'ru',
                'name' => 'Завтрак',
                'slug' => 'zavtrak',
                'title' => 'Завтрак',
                'keywords' => 'Завтрак',
                'description' => 'Завтрак',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 2,
                'locale' => 'az',
                'name' => 'Lanç',
                'slug' => 'lanc',
                'title' => 'Lanç',
                'keywords' => 'Lanç',
                'description' => 'Lanç',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 2,
                'locale' => 'en',
                'name' => 'Lounge',
                'slug' => 'lounge',
                'title' => 'Lounge',
                'keywords' => 'Lounge',
                'description' => 'Lounge',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 2,
                'locale' => 'ru',
                'name' => 'Обед',
                'slug' => 'obed',
                'title' => 'Обед',
                'keywords' => 'Обед',
                'description' => 'Обед',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 3,
                'locale' => 'az',
                'name' => 'Şam yeməyi',
                'slug' => 'sam-yemeyi',
                'title' => 'Şam yeməyi',
                'keywords' => 'Şam yeməyi',
                'description' => 'Şam yeməyi',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 3,
                'locale' => 'en',
                'name' => 'Dinner',
                'slug' => 'dinner',
                'title' => 'Dinner',
                'keywords' => 'Dinner',
                'description' => 'Dinner',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 3,
                'locale' => 'ru',
                'name' => 'Ужин',
                'slug' => 'uzin',
                'title' => 'Ужин',
                'keywords' => 'Ужин',
                'description' => 'Ужин',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'category_id' => 4,
                'locale' => 'az',
                'name' => 'Desertlər',
                'slug' => 'desertler',
                'title' => 'Desertlər',
                'keywords' => 'Desertlər',
                'description' => 'Desertlər',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'category_id' => 4,
                'locale' => 'en',
                'name' => 'Deserts',
                'slug' => 'deserts',
                'title' => 'Deserts',
                'keywords' => 'Deserts',
                'description' => 'Deserts',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'category_id' => 4,
                'locale' => 'ru',
                'name' => 'Десерты',
                'slug' => 'deserty',
                'title' => 'Десерты',
                'keywords' => 'Десерты',
                'description' => 'Десерты',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'category_id' => 5,
                'locale' => 'az',
                'name' => 'İçkilər',
                'slug' => 'ickiler',
                'title' => 'İçkilər',
                'keywords' => 'İçkilər',
                'description' => 'İçkilər',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'category_id' => 5,
                'locale' => 'en',
                'name' => 'Drinks',
                'slug' => 'drinks',
                'title' => 'Drinks',
                'keywords' => 'Drinks',
                'description' => 'Drinks',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'category_id' => 5,
                'locale' => 'ru',
                'name' => 'Напитки',
                'slug' => 'napitki',
                'title' => 'Напитки',
                'keywords' => 'Напитки',
                'description' => 'Напитки',
                'deleted_at' => NULL,
                'image_alt' => NULL,
            ),
        ));
        
        
    }
}