<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductStatusTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_status_translations')->delete();
        
        \DB::table('product_status_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_status_id' => 1,
                'name' => 'Çox satılanlar',
                'slug' => 'cox-satilanlar',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'product_status_id' => 1,
                'name' => 'Discounted products',
                'slug' => 'discounted-products',
                'locale' => 'en',
            ),
            2 => 
            array (
                'id' => 3,
                'product_status_id' => 2,
                'name' => 'Papuliyar məhsullar',
                'slug' => 'papuliyar-mehsullar',
                'locale' => 'az',
            ),
            3 => 
            array (
                'id' => 4,
                'product_status_id' => 2,
                'name' => 'Papuliar products',
                'slug' => 'papuliar-products',
                'locale' => 'en',
            ),
            4 => 
            array (
                'id' => 5,
                'product_status_id' => 3,
                'name' => 'Yeni məhsullar',
                'slug' => 'yeni-mehsullar',
                'locale' => 'az',
            ),
        ));
        
        
    }
}