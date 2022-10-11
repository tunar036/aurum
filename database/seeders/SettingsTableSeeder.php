<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'logo',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'location',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'phone',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'email',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'work_hour',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'whatsapp',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'facebook',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'twitter',
                'slug' => NULL,
                'created_at' => '2022-04-15 12:08:18',
                'updated_at' => '2022-04-15 12:08:18',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'credit_p',
                'slug' => NULL,
                'created_at' => '2022-05-05 14:18:01',
                'updated_at' => '2022-05-05 14:18:50',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'com_p',
                'slug' => NULL,
                'created_at' => '2022-05-05 14:19:19',
                'updated_at' => '2022-05-05 14:19:19',
            ),
        ));
        
        
    }
}