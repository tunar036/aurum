<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstallmentCardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('installment_cards')->delete();

        \DB::table('installment_cards')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'status' => '1',
                    'order' => 1,
                    'created_at' => '2022-04-29 10:15:29',
                    'updated_at' => '2022-04-29 10:15:29',
                ),
            1 =>
                array (
                    'id' => 2,
                    'status' => '1',
                    'order' => 2,
                    'created_at' => '2022-04-29 10:15:41',
                    'updated_at' => '2022-04-29 10:15:41',
                ),
            2 =>
                array (
                    'id' => 3,
                    'status' => '1',
                    'order' => 3,
                    'created_at' => '2022-04-29 10:21:27',
                    'updated_at' => '2022-04-29 10:21:27',
                ),
        ));


    }
}
