<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'positions' => '["header", "footer"]',
                'parent_id' => 0,
                'status' => '1',
                'order' => 1,
                'created_at' => '2022-05-26 15:19:28',
                'updated_at' => '2022-05-26 15:32:03',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'positions' => '["header"]',
                'parent_id' => 0,
                'status' => '1',
                'order' => 2,
                'created_at' => '2022-05-26 15:22:42',
                'updated_at' => '2022-05-26 15:22:42',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'positions' => '["header", "footer"]',
                'parent_id' => 0,
                'status' => '1',
                'order' => 3,
                'created_at' => '2022-05-26 15:28:36',
                'updated_at' => '2022-05-26 15:28:36',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'positions' => '["header", "footer"]',
                'parent_id' => 0,
                'status' => '1',
                'order' => 4,
                'created_at' => '2022-05-26 15:31:15',
                'updated_at' => '2022-05-26 15:31:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}