<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('setting_translations')->delete();
        
        \DB::table('setting_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'setting_id' => 1,
                'content' => 'http://shop.globalsoft.az/frontend/img/logo.png',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'setting_id' => 1,
                'content' => 'http://shop.globalsoft.az/frontend/img/logo.png',
                'locale' => 'en',
            ),
            2 => 
            array (
                'id' => 3,
                'setting_id' => 2,
                'content' => 'Ü.Hacıbəyli 80,Hökumət Evi, IV Qapı',
                'locale' => 'az',
            ),
            3 => 
            array (
                'id' => 4,
                'setting_id' => 2,
                'content' => 'Ü.Hacıbəyli 80,Hökumət Evi, IV Qapı',
                'locale' => 'en',
            ),
            4 => 
            array (
                'id' => 5,
                'setting_id' => 3,
            'content' => '(+994 77) 333 98 00',
                'locale' => 'az',
            ),
            5 => 
            array (
                'id' => 6,
                'setting_id' => 3,
            'content' => '(+994 77) 333 98 00',
                'locale' => 'en',
            ),
            6 => 
            array (
                'id' => 7,
                'setting_id' => 4,
                'content' => 'orkhandev@gmail.com',
                'locale' => 'az',
            ),
            7 => 
            array (
                'id' => 8,
                'setting_id' => 4,
                'content' => 'orkhandev@gmail.com',
                'locale' => 'en',
            ),
            8 => 
            array (
                'id' => 9,
                'setting_id' => 5,
                'content' => '7 Days a week from 10-00 am to 6-00 pm',
                'locale' => 'az',
            ),
            9 => 
            array (
                'id' => 10,
                'setting_id' => 5,
                'content' => '7 Days a week from 10-00 am to 6-00 pm',
                'locale' => 'en',
            ),
            10 => 
            array (
                'id' => 11,
                'setting_id' => 6,
                'content' => '+994559998877',
                'locale' => 'az',
            ),
            11 => 
            array (
                'id' => 12,
                'setting_id' => 6,
                'content' => '+994559998877',
                'locale' => 'en',
            ),
            12 => 
            array (
                'id' => 13,
                'setting_id' => 7,
                'content' => 'https://www.facebook.com/AileQadinUsaqProblemleriUzreDovletKomitesi',
                'locale' => 'az',
            ),
            13 => 
            array (
                'id' => 14,
                'setting_id' => 7,
                'content' => 'https://www.facebook.com/AileQadinUsaqProblemleriUzreDovletKomitesi',
                'locale' => 'en',
            ),
            14 => 
            array (
                'id' => 15,
                'setting_id' => 8,
                'content' => 'https://twitter.com/aileqadinusaq',
                'locale' => 'az',
            ),
            15 => 
            array (
                'id' => 16,
                'setting_id' => 8,
                'content' => 'https://twitter.com/aileqadinusaq',
                'locale' => 'en',
            ),
            16 => 
            array (
                'id' => 17,
                'setting_id' => 9,
                'content' => '<p>10</p>',
                'locale' => 'az',
            ),
            17 => 
            array (
                'id' => 18,
                'setting_id' => 10,
                'content' => '<p>10</p>',
                'locale' => 'az',
            ),
        ));
        
        
    }
}