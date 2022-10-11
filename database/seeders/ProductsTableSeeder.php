<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'quantity_type' => NULL,
                'quantity' => NULL,
                'name' => 'Jocelyn Gutierrez',
                'slug' => 'quae-ducimus-conseq',
                'price' => 15.0,
                'discount_number' => NULL,
                'discount_price' => NULL,
                'order' => 1,
                'status' => '1',
                'created_at' => '2022-05-26 15:49:16',
                'updated_at' => '2022-05-26 15:49:16',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 2,
                'quantity_type' => NULL,
                'quantity' => NULL,
                'name' => 'Thomas Stanton',
                'slug' => 'reprehenderit-rerum',
                'price' => 20.0,
                'discount_number' => NULL,
                'discount_price' => NULL,
                'order' => 2,
                'status' => '1',
                'created_at' => '2022-05-26 15:51:06',
                'updated_at' => '2022-05-26 15:51:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 4,
                'quantity_type' => NULL,
                'quantity' => NULL,
                'name' => 'Alfonso Ashley',
                'slug' => 'voluptatum-vitae-qui',
                'price' => 26.0,
                'discount_number' => NULL,
                'discount_price' => NULL,
                'order' => 3,
                'status' => '1',
                'created_at' => '2022-05-26 15:52:22',
                'updated_at' => '2022-05-26 15:52:22',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 5,
                'quantity_type' => NULL,
                'quantity' => NULL,
                'name' => 'Skyler Barton',
                'slug' => 'sed-laboriosam-vita',
                'price' => 30.0,
                'discount_number' => NULL,
                'discount_price' => NULL,
                'order' => 4,
                'status' => '1',
                'created_at' => '2022-05-26 15:53:46',
                'updated_at' => '2022-05-26 15:53:46',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 1,
                'quantity_type' => NULL,
                'quantity' => NULL,
                'name' => 'Zelda Morrison',
                'slug' => 'hic-et-ea-vitae-plac',
                'price' => 45.0,
                'discount_number' => NULL,
                'discount_price' => NULL,
                'order' => 5,
                'status' => '1',
                'created_at' => '2022-05-26 15:55:16',
                'updated_at' => '2022-05-26 15:55:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}