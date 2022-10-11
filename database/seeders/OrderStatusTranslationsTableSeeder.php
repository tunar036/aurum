<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderStatusTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('order_status_translations')->delete();
        
        \DB::table('order_status_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_status_id' => 1,
                'name' => 'Gözləmədə',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'order_status_id' => 2,
                'name' => 'Təsdiq edildi',
                'locale' => 'az',
            ),
            2 => 
            array (
                'id' => 3,
                'order_status_id' => 3,
                'name' => 'Ləğv edildi',
                'locale' => 'az',
            ),
            3 => 
            array (
                'id' => 4,
                'order_status_id' => 4,
                'name' => 'İmtina edildi',
                'locale' => 'az',
            ),
        ));
        
        
    }
}