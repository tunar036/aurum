<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        activity()->withoutLogs(function () {


            \DB::table('district_translations')->delete();

            \DB::table('district_translations')->insert(array(
                0 =>
                    array(
                        'id' => 1,
                        'district_id' => 1,
                        'locale' => 'az',
                        'name' => 'Bakı',
                    ),
                1 =>
                    array(
                        'id' => 2,
                        'district_id' => 1,
                        'locale' => 'en',
                        'name' => 'Baku',
                    ),
                2 =>
                    array(
                        'id' => 3,
                        'district_id' => 2,
                        'locale' => 'az',
                        'name' => 'Sumqayıt',
                    ),
                3 =>
                    array(
                        'id' => 4,
                        'district_id' => 2,
                        'locale' => 'en',
                        'name' => 'Sumgait',
                    ),
                4 =>
                    array(
                        'id' => 5,
                        'district_id' => 3,
                        'locale' => 'az',
                        'name' => 'Gəncə',
                    ),
                5 =>
                    array(
                        'id' => 6,
                        'district_id' => 3,
                        'locale' => 'en',
                        'name' => 'Lənkəran',
                    ),
                6 =>
                    array(
                        'id' => 7,
                        'district_id' => 4,
                        'locale' => 'az',
                        'name' => 'Lənkəran',
                    ),
                7 =>
                    array(
                        'id' => 8,
                        'district_id' => 4,
                        'locale' => 'en',
                        'name' => 'Lankaran',
                    ),
            ));

        });
    }
}
