<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstallmentCardTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('installment_card_translations')->delete();
        
        \DB::table('installment_card_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'installment_card_id' => 1,
                'name' => 'Birkart',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'installment_card_id' => 2,
                'name' => 'Albalıkart',
                'locale' => 'az',
            ),
            2 => 
            array (
                'id' => 3,
                'installment_card_id' => 3,
                'name' => 'Tam kart',
                'locale' => 'az',
            ),
        ));
        
        
    }
}