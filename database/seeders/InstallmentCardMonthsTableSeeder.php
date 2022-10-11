<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstallmentCardMonthsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('installment_card_months')->delete();

        \DB::table('installment_card_months')->insert(array (
            0 =>
            array (
                'id' => 1,
                'month' => 2,
                'installment_card_id' => 1,
                'status' => '1',
                'created_at' => '2022-05-06 18:28:13',
                'updated_at' => '2022-05-11 10:29:28',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'month' => 3,
                'installment_card_id' => 1,
                'status' => '1',
                'created_at' => '2022-05-06 18:28:20',
                'updated_at' => '2022-05-11 10:29:38',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'month' => 6,
                'installment_card_id' => 1,
                'status' => '1',
                'created_at' => '2022-05-06 18:28:29',
                'updated_at' => '2022-05-11 10:29:45',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'month' => 9,
                'installment_card_id' => 1,
                'status' => '1',
                'created_at' => '2022-05-06 18:28:41',
                'updated_at' => '2022-05-11 10:31:27',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'month' => 12,
                'installment_card_id' => 1,
                'status' => '1',
                'created_at' => '2022-05-06 18:28:49',
                'updated_at' => '2022-05-11 10:31:43',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'month' => 18,
                'installment_card_id' => 1,
                'status' => '1',
                'created_at' => '2022-05-06 18:29:13',
                'updated_at' => '2022-05-11 10:31:51',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'month' => 2,
                'installment_card_id' => 2,
                'status' => '1',
                'created_at' => '2022-05-11 10:32:07',
                'updated_at' => '2022-05-11 10:32:07',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'month' => 3,
                'installment_card_id' => 2,
                'status' => '1',
                'created_at' => '2022-05-11 10:32:14',
                'updated_at' => '2022-05-11 10:32:14',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'month' => 6,
                'installment_card_id' => 2,
                'status' => '1',
                'created_at' => '2022-05-11 10:32:24',
                'updated_at' => '2022-05-11 10:32:24',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'month' => 9,
                'installment_card_id' => 2,
                'status' => '1',
                'created_at' => '2022-05-11 10:32:31',
                'updated_at' => '2022-05-11 10:32:31',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'month' => 12,
                'installment_card_id' => 2,
                'status' => '1',
                'created_at' => '2022-05-11 10:32:42',
                'updated_at' => '2022-05-11 10:32:42',
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'month' => 18,
                'installment_card_id' => 2,
                'status' => '1',
                'created_at' => '2022-05-11 10:32:49',
                'updated_at' => '2022-05-11 10:32:49',
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'month' => 3,
                'installment_card_id' => 3,
                'status' => '1',
                'created_at' => '2022-05-11 10:33:00',
                'updated_at' => '2022-05-11 10:33:00',
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'month' => 6,
                'installment_card_id' => 3,
                'status' => '1',
                'created_at' => '2022-05-11 10:33:09',
                'updated_at' => '2022-05-11 10:33:09',
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'month' => 9,
                'installment_card_id' => 3,
                'status' => '1',
                'created_at' => '2022-05-11 10:33:16',
                'updated_at' => '2022-05-11 10:33:16',
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'month' => 12,
                'installment_card_id' => 3,
                'status' => '1',
                'created_at' => '2022-05-11 10:33:25',
                'updated_at' => '2022-05-11 10:33:25',
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'month' => 18,
                'installment_card_id' => 3,
                'status' => '1',
                'created_at' => '2022-05-11 10:33:32',
                'updated_at' => '2022-05-11 10:33:32',
                'deleted_at' => NULL,
            ),
        ));


    }
}
