<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentCardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_cards')->delete();
        
        \DB::table('payment_cards')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => '1',
                'order' => 1,
                'created_at' => '2022-04-26 16:09:59',
                'updated_at' => '2022-04-26 16:09:59',
            ),
            1 => 
            array (
                'id' => 2,
                'status' => '1',
                'order' => 2,
                'created_at' => '2022-04-26 16:17:56',
                'updated_at' => '2022-04-26 16:17:56',
            ),
        ));
        
        
    }
}