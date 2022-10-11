<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_statuses')->delete();
        
        \DB::table('order_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => 1,
                'created_at' => '2022-04-29 11:34:12',
                'updated_at' => '2022-04-29 11:34:12',
            ),
            1 => 
            array (
                'id' => 2,
                'status' => 1,
                'created_at' => '2022-04-29 11:34:22',
                'updated_at' => '2022-04-29 11:34:22',
            ),
            2 => 
            array (
                'id' => 3,
                'status' => 1,
                'created_at' => '2022-04-29 11:34:58',
                'updated_at' => '2022-04-29 11:34:58',
            ),
            3 => 
            array (
                'id' => 4,
                'status' => 1,
                'created_at' => '2022-04-29 11:35:12',
                'updated_at' => '2022-04-29 11:35:12',
            ),
        ));
        
        
    }
}