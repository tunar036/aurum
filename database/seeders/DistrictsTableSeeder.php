<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        activity()->withoutLogs(function () {

            \DB::table('districts')->delete();

            \DB::table('districts')->insert(array(
                0 =>
                    array(
                        'id' => 1,
                        'status' => '1',
                        'order' => 1,
                        'created_at' => '2022-02-16 08:12:35',
                        'updated_at' => '2022-02-16 08:12:35',
                        'deleted_at' => NULL,
                    ),
                1 =>
                    array(
                        'id' => 2,
                        'status' => '1',
                        'order' => 2,
                        'created_at' => '2022-02-16 08:12:49',
                        'updated_at' => '2022-02-16 08:12:49',
                        'deleted_at' => NULL,
                    ),
                2 =>
                    array(
                        'id' => 3,
                        'status' => '1',
                        'order' => 3,
                        'created_at' => '2022-02-16 08:13:02',
                        'updated_at' => '2022-02-16 08:13:02',
                        'deleted_at' => NULL,
                    ),
                3 =>
                    array(
                        'id' => 4,
                        'status' => '1',
                        'order' => 4,
                        'created_at' => '2022-02-16 08:13:27',
                        'updated_at' => '2022-02-16 08:13:27',
                        'deleted_at' => NULL,
                    ),
            ));

        });
    }
}
