<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_statuses')->delete();
        
        \DB::table('product_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => '1',
                'created_at' => '2022-02-10 07:03:07',
                'updated_at' => '2022-02-10 07:03:07',
            ),
            1 => 
            array (
                'id' => 2,
                'status' => '1',
                'created_at' => '2022-02-20 08:33:56',
                'updated_at' => '2022-02-20 08:33:56',
            ),
            2 => 
            array (
                'id' => 3,
                'status' => '1',
                'created_at' => '2022-04-01 17:07:44',
                'updated_at' => '2022-04-01 17:07:44',
            ),
        ));
        
        
    }
}