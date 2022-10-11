<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliveryMethodTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delivery_method_translations')->delete();
        
        \DB::table('delivery_method_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'delivery_method_id' => 1,
                'name' => 'Mağazadan təhvil alacam',
                'address' => NULL,
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'delivery_method_id' => 2,
                'name' => 'Ünvana çatdırılsın',
                'address' => NULL,
                'locale' => 'az',
            ),
        ));
        
        
    }
}