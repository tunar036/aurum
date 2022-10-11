<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'home' => '0',
                'mega' => '0',
                'status' => '1',
                'order' => 1,
                'created_at' => '2022-05-18 11:48:59',
                'updated_at' => '2022-05-18 11:48:59',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'home' => '0',
                'mega' => '0',
                'status' => '1',
                'order' => 2,
                'created_at' => '2022-05-18 12:03:40',
                'updated_at' => '2022-05-18 12:03:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 0,
                'home' => '0',
                'mega' => '0',
                'status' => '1',
                'order' => 3,
                'created_at' => '2022-05-18 12:12:09',
                'updated_at' => '2022-05-18 12:12:09',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 0,
                'home' => '0',
                'mega' => '0',
                'status' => '1',
                'order' => 4,
                'created_at' => '2022-05-18 12:14:14',
                'updated_at' => '2022-05-18 12:14:14',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 0,
                'home' => '0',
                'mega' => '0',
                'status' => '1',
                'order' => 5,
                'created_at' => '2022-05-18 12:15:21',
                'updated_at' => '2022-05-18 12:15:21',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}