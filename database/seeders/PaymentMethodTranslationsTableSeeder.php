<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentMethodTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_method_translations')->delete();
        
        \DB::table('payment_method_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'payment_method_id' => 1,
                'name' => 'Kreditlə al',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'payment_method_id' => 2,
                'name' => 'Taksitlə al',
                'locale' => 'az',
            ),
            2 => 
            array (
                'id' => 3,
                'payment_method_id' => 3,
                'name' => 'Çatdırılma zamanı nağd ödə',
                'locale' => 'az',
            ),
            3 => 
            array (
                'id' => 4,
                'payment_method_id' => 4,
                'name' => 'Saytda nağd ödə',
                'locale' => 'az',
            ),
        ));
        
        
    }
}