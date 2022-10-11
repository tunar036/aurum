<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {

            $settings = [

            [
                'name'    => 'logo',
                'content' => 'http://shop.globalsoft.az/frontend/img/logo.png'
            ],
            [
                'name'    => 'location',
                'content' => 'Ü.Hacıbəyli 80,Hökumət Evi, IV Qapı'
            ],
            [
                'name'    => 'phone',
                'content' => '(+994 77) 333 98 00'
            ],
            [
                'name'    => 'email',
                'content' => 'orkhandev@gmail.com'
            ],
            [
                'name'    => 'work_hour',
                'content' => '7 Days a week from 10-00 am to 6-00 pm'
            ],
            [
                'name'    => 'whatsapp',
                'content' => '+994559998877'
            ],
            [
                'name'    => 'facebook',
                'content' => 'https://www.facebook.com/AileQadinUsaqProblemleriUzreDovletKomitesi'
            ],
            [
                'name'    => 'twitter',
                'content' => 'https://twitter.com/aileqadinusaq'
            ]
        ];

        foreach ($settings as $item)
        {
            $setting = Setting::create(['name' => $item['name']]);

            SettingTranslation::create(
            [
                'setting_id' => $setting->id,
                'content'    => $item['content'],
                'locale'     => 'az'
            ]);

            SettingTranslation::create(
            [
                'setting_id' => $setting->id,
                'content'    => $item['content'],
                'locale'     => 'en'
            ]);
        }
        });

    }
}
