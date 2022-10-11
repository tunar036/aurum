<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_methods')->delete();
        
        \DB::table('payment_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => '1',
                'order' => 1,
                'created_at' => '2022-04-29 10:10:45',
                'updated_at' => '2022-04-29 10:10:45',
            ),
            1 => 
            array (
                'id' => 2,
                'status' => '1',
                'order' => 2,
                'created_at' => '2022-04-29 10:10:54',
                'updated_at' => '2022-04-29 10:10:54',
            ),
            2 => 
            array (
                'id' => 3,
                'status' => '1',
                'order' => 3,
                'created_at' => '2022-04-29 10:11:16',
                'updated_at' => '2022-04-29 10:11:16',
            ),
            3 => 
            array (
                'id' => 4,
                'status' => '1',
                'order' => 4,
                'created_at' => '2022-04-29 10:11:22',
                'updated_at' => '2022-04-29 10:11:22',
            ),
        ));
        
        
    }
}