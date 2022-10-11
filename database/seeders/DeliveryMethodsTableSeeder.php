<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliveryMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delivery_methods')->delete();
        
        \DB::table('delivery_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'price' => NULL,
                'status' => '1',
                'order' => 1,
                'created_at' => '2022-04-29 10:13:43',
                'updated_at' => '2022-04-29 10:13:43',
            ),
            1 => 
            array (
                'id' => 2,
                'price' => NULL,
                'status' => '1',
                'order' => 2,
                'created_at' => '2022-04-29 10:13:55',
                'updated_at' => '2022-04-29 10:13:55',
            ),
        ));
        
        
    }
}