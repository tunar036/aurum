<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentCardTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_card_translations')->delete();
        
        \DB::table('payment_card_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payment_card_id' => 1,
                'name' => 'Birkart',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'payment_card_id' => 2,
                'name' => 'AlbalıKart',
                'locale' => 'az',
            ),
        ));
        
        
    }
}