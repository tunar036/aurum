<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreditsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('credits')->delete();
        
        \DB::table('credits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'month' => '6',
                'created_at' => '2022-04-13 15:15:54',
                'updated_at' => '2022-04-13 15:15:54',
            ),
            1 => 
            array (
                'id' => 2,
                'month' => '12',
                'created_at' => '2022-04-13 15:16:31',
                'updated_at' => '2022-04-13 15:16:31',
            ),
            2 => 
            array (
                'id' => 3,
                'month' => '18',
                'created_at' => '2022-04-13 15:16:35',
                'updated_at' => '2022-04-13 15:16:35',
            ),
        ));
        
        
    }
}