<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('option_translations')->delete();
        
        \DB::table('option_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'option_id' => 52,
                'name' => 'Android',
                'slug' => 'android',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'option_id' => 52,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            2 => 
            array (
                'id' => 3,
                'option_id' => 52,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            3 => 
            array (
                'id' => 4,
                'option_id' => 54,
                'name' => 'Digər',
                'slug' => 'diger',
                'locale' => 'az',
            ),
            4 => 
            array (
                'id' => 5,
                'option_id' => 54,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            5 => 
            array (
                'id' => 6,
                'option_id' => 54,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            6 => 
            array (
                'id' => 7,
                'option_id' => 55,
                'name' => '4.7\'\'',
                'slug' => '47',
                'locale' => 'az',
            ),
            7 => 
            array (
                'id' => 8,
                'option_id' => 55,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            8 => 
            array (
                'id' => 9,
                'option_id' => 55,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            9 => 
            array (
                'id' => 10,
                'option_id' => 56,
                'name' => '5.8\'\'',
                'slug' => '58',
                'locale' => 'az',
            ),
            10 => 
            array (
                'id' => 11,
                'option_id' => 56,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            11 => 
            array (
                'id' => 12,
                'option_id' => 56,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            12 => 
            array (
                'id' => 13,
                'option_id' => 57,
                'name' => '6.1\'\'',
                'slug' => '61',
                'locale' => 'az',
            ),
            13 => 
            array (
                'id' => 14,
                'option_id' => 57,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            14 => 
            array (
                'id' => 15,
                'option_id' => 57,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            15 => 
            array (
                'id' => 16,
                'option_id' => 58,
                'name' => '6.2\'\'',
                'slug' => '62',
                'locale' => 'az',
            ),
            16 => 
            array (
                'id' => 17,
                'option_id' => 58,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            17 => 
            array (
                'id' => 18,
                'option_id' => 58,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            18 => 
            array (
                'id' => 19,
                'option_id' => 59,
                'name' => '6.3\'\'',
                'slug' => '63',
                'locale' => 'az',
            ),
            19 => 
            array (
                'id' => 20,
                'option_id' => 59,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            20 => 
            array (
                'id' => 21,
                'option_id' => 59,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            21 => 
            array (
                'id' => 22,
                'option_id' => 60,
                'name' => '6.4\'\'',
                'slug' => '64',
                'locale' => 'az',
            ),
            22 => 
            array (
                'id' => 23,
                'option_id' => 60,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            23 => 
            array (
                'id' => 24,
                'option_id' => 60,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            24 => 
            array (
                'id' => 25,
                'option_id' => 61,
                'name' => '6.5\'\'',
                'slug' => '65',
                'locale' => 'az',
            ),
            25 => 
            array (
                'id' => 26,
                'option_id' => 61,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            26 => 
            array (
                'id' => 27,
                'option_id' => 61,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            27 => 
            array (
                'id' => 28,
                'option_id' => 62,
                'name' => '2 GB',
                'slug' => '2-gb',
                'locale' => 'az',
            ),
            28 => 
            array (
                'id' => 29,
                'option_id' => 62,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            29 => 
            array (
                'id' => 30,
                'option_id' => 62,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            30 => 
            array (
                'id' => 31,
                'option_id' => 63,
                'name' => '3 GB',
                'slug' => '3-gb',
                'locale' => 'az',
            ),
            31 => 
            array (
                'id' => 32,
                'option_id' => 63,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            32 => 
            array (
                'id' => 33,
                'option_id' => 63,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            33 => 
            array (
                'id' => 34,
                'option_id' => 64,
                'name' => '4 GB',
                'slug' => '4-gb',
                'locale' => 'az',
            ),
            34 => 
            array (
                'id' => 35,
                'option_id' => 64,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            35 => 
            array (
                'id' => 36,
                'option_id' => 64,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            36 => 
            array (
                'id' => 37,
                'option_id' => 65,
                'name' => '6 GB',
                'slug' => '6-gb',
                'locale' => 'az',
            ),
            37 => 
            array (
                'id' => 38,
                'option_id' => 65,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            38 => 
            array (
                'id' => 39,
                'option_id' => 65,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            39 => 
            array (
                'id' => 40,
                'option_id' => 66,
                'name' => '8 GB',
                'slug' => '8-gb',
                'locale' => 'az',
            ),
            40 => 
            array (
                'id' => 41,
                'option_id' => 66,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            41 => 
            array (
                'id' => 42,
                'option_id' => 66,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            42 => 
            array (
                'id' => 43,
                'option_id' => 67,
                'name' => '12 GB',
                'slug' => '12-gb',
                'locale' => 'az',
            ),
            43 => 
            array (
                'id' => 44,
                'option_id' => 67,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            44 => 
            array (
                'id' => 45,
                'option_id' => 67,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            45 => 
            array (
                'id' => 46,
                'option_id' => 70,
                'name' => '16 GB',
                'slug' => '16-gb',
                'locale' => 'az',
            ),
            46 => 
            array (
                'id' => 47,
                'option_id' => 70,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            47 => 
            array (
                'id' => 48,
                'option_id' => 70,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            48 => 
            array (
                'id' => 49,
                'option_id' => 71,
                'name' => '32 GB',
                'slug' => '32-gb',
                'locale' => 'az',
            ),
            49 => 
            array (
                'id' => 50,
                'option_id' => 71,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            50 => 
            array (
                'id' => 51,
                'option_id' => 71,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            51 => 
            array (
                'id' => 52,
                'option_id' => 72,
                'name' => '64 GB',
                'slug' => '64-gb',
                'locale' => 'az',
            ),
            52 => 
            array (
                'id' => 53,
                'option_id' => 72,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            53 => 
            array (
                'id' => 54,
                'option_id' => 72,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            54 => 
            array (
                'id' => 55,
                'option_id' => 73,
                'name' => '128 GB',
                'slug' => '128-gb',
                'locale' => 'az',
            ),
            55 => 
            array (
                'id' => 56,
                'option_id' => 73,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            56 => 
            array (
                'id' => 57,
                'option_id' => 73,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            57 => 
            array (
                'id' => 58,
                'option_id' => 74,
                'name' => '256 GB',
                'slug' => '256-gb',
                'locale' => 'az',
            ),
            58 => 
            array (
                'id' => 59,
                'option_id' => 74,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            59 => 
            array (
                'id' => 60,
                'option_id' => 74,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            60 => 
            array (
                'id' => 61,
                'option_id' => 76,
                'name' => '512 GB +',
                'slug' => '512-gb',
                'locale' => 'az',
            ),
            61 => 
            array (
                'id' => 62,
                'option_id' => 76,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            62 => 
            array (
                'id' => 63,
                'option_id' => 76,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            63 => 
            array (
                'id' => 64,
                'option_id' => 79,
                'name' => '1000-3000 mAh',
                'slug' => '1000-3000-mah',
                'locale' => 'az',
            ),
            64 => 
            array (
                'id' => 65,
                'option_id' => 79,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            65 => 
            array (
                'id' => 66,
                'option_id' => 79,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            66 => 
            array (
                'id' => 67,
                'option_id' => 80,
                'name' => '3000-5000 mAh',
                'slug' => '3000-5000-mah',
                'locale' => 'az',
            ),
            67 => 
            array (
                'id' => 68,
                'option_id' => 80,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            68 => 
            array (
                'id' => 69,
                'option_id' => 80,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            69 => 
            array (
                'id' => 70,
                'option_id' => 81,
                'name' => '5000 mAh+',
                'slug' => '5000-mah',
                'locale' => 'az',
            ),
            70 => 
            array (
                'id' => 71,
                'option_id' => 81,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            71 => 
            array (
                'id' => 72,
                'option_id' => 81,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            72 => 
            array (
                'id' => 73,
                'option_id' => 82,
                'name' => '1 SIM',
                'slug' => '1-sim',
                'locale' => 'az',
            ),
            73 => 
            array (
                'id' => 74,
                'option_id' => 82,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            74 => 
            array (
                'id' => 75,
                'option_id' => 82,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            75 => 
            array (
                'id' => 76,
                'option_id' => 83,
                'name' => '2 SIM',
                'slug' => '2-sim',
                'locale' => 'az',
            ),
            76 => 
            array (
                'id' => 77,
                'option_id' => 83,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            77 => 
            array (
                'id' => 78,
                'option_id' => 83,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            78 => 
            array (
                'id' => 79,
                'option_id' => 84,
            'name' => '24” (61 sm)',
                'slug' => '24-61-sm',
                'locale' => 'az',
            ),
            79 => 
            array (
                'id' => 80,
                'option_id' => 84,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            80 => 
            array (
                'id' => 81,
                'option_id' => 84,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            81 => 
            array (
                'id' => 82,
                'option_id' => 85,
            'name' => '27” (68 sm)',
                'slug' => '27-68-sm',
                'locale' => 'az',
            ),
            82 => 
            array (
                'id' => 83,
                'option_id' => 85,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            83 => 
            array (
                'id' => 84,
                'option_id' => 85,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            84 => 
            array (
                'id' => 85,
                'option_id' => 86,
            'name' => '28” (71 sm)',
                'slug' => '28-71-sm',
                'locale' => 'az',
            ),
            85 => 
            array (
                'id' => 86,
                'option_id' => 86,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            86 => 
            array (
                'id' => 87,
                'option_id' => 86,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            87 => 
            array (
                'id' => 88,
                'option_id' => 87,
            'name' => '32” (80 sm)',
                'slug' => '32-80-sm',
                'locale' => 'az',
            ),
            88 => 
            array (
                'id' => 89,
                'option_id' => 87,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            89 => 
            array (
                'id' => 90,
                'option_id' => 87,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            90 => 
            array (
                'id' => 91,
                'option_id' => 88,
            'name' => '40” (100 sm)',
                'slug' => '40-100-sm',
                'locale' => 'az',
            ),
            91 => 
            array (
                'id' => 92,
                'option_id' => 88,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            92 => 
            array (
                'id' => 93,
                'option_id' => 88,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            93 => 
            array (
                'id' => 94,
                'option_id' => 89,
            'name' => '43’’ (108 sm)',
                'slug' => '43-108-sm',
                'locale' => 'az',
            ),
            94 => 
            array (
                'id' => 95,
                'option_id' => 89,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            95 => 
            array (
                'id' => 96,
                'option_id' => 89,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            96 => 
            array (
                'id' => 97,
                'option_id' => 90,
            'name' => '45” (114 sm)',
                'slug' => '45-114-sm',
                'locale' => 'az',
            ),
            97 => 
            array (
                'id' => 98,
                'option_id' => 90,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            98 => 
            array (
                'id' => 99,
                'option_id' => 90,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            99 => 
            array (
                'id' => 100,
                'option_id' => 91,
            'name' => '49”(123 sm)',
                'slug' => '49123-sm',
                'locale' => 'az',
            ),
            100 => 
            array (
                'id' => 101,
                'option_id' => 91,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            101 => 
            array (
                'id' => 102,
                'option_id' => 91,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            102 => 
            array (
                'id' => 103,
                'option_id' => 92,
            'name' => '50” (125 sm)',
                'slug' => '50-125-sm',
                'locale' => 'az',
            ),
            103 => 
            array (
                'id' => 104,
                'option_id' => 92,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            104 => 
            array (
                'id' => 105,
                'option_id' => 92,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            105 => 
            array (
                'id' => 106,
                'option_id' => 93,
            'name' => '55” (139 sm)',
                'slug' => '55-139-sm',
                'locale' => 'az',
            ),
            106 => 
            array (
                'id' => 107,
                'option_id' => 93,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            107 => 
            array (
                'id' => 108,
                'option_id' => 93,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            108 => 
            array (
                'id' => 109,
                'option_id' => 94,
            'name' => '58” (147 sm)',
                'slug' => '58-147-sm',
                'locale' => 'az',
            ),
            109 => 
            array (
                'id' => 110,
                'option_id' => 94,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            110 => 
            array (
                'id' => 111,
                'option_id' => 94,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            111 => 
            array (
                'id' => 112,
                'option_id' => 95,
            'name' => '65” (164 sm)',
                'slug' => '65-164-sm',
                'locale' => 'az',
            ),
            112 => 
            array (
                'id' => 113,
                'option_id' => 95,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            113 => 
            array (
                'id' => 114,
                'option_id' => 95,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            114 => 
            array (
                'id' => 115,
                'option_id' => 96,
            'name' => '70” (177 sm)',
                'slug' => '70-177-sm',
                'locale' => 'az',
            ),
            115 => 
            array (
                'id' => 116,
                'option_id' => 96,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            116 => 
            array (
                'id' => 117,
                'option_id' => 96,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            117 => 
            array (
                'id' => 118,
                'option_id' => 97,
            'name' => '75” (190 sm)',
                'slug' => '75-190-sm',
                'locale' => 'az',
            ),
            118 => 
            array (
                'id' => 119,
                'option_id' => 97,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            119 => 
            array (
                'id' => 120,
                'option_id' => 97,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            120 => 
            array (
                'id' => 121,
                'option_id' => 98,
            'name' => '82” (208 sm)',
                'slug' => '82-208-sm',
                'locale' => 'az',
            ),
            121 => 
            array (
                'id' => 122,
                'option_id' => 98,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            122 => 
            array (
                'id' => 123,
                'option_id' => 98,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            123 => 
            array (
                'id' => 124,
                'option_id' => 99,
            'name' => '85” (215 sm)',
                'slug' => '85-215-sm',
                'locale' => 'az',
            ),
            124 => 
            array (
                'id' => 125,
                'option_id' => 99,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            125 => 
            array (
                'id' => 126,
                'option_id' => 99,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            126 => 
            array (
                'id' => 127,
                'option_id' => 100,
            'name' => '86” (218 sm)',
                'slug' => '86-218-sm',
                'locale' => 'az',
            ),
            127 => 
            array (
                'id' => 128,
                'option_id' => 100,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            128 => 
            array (
                'id' => 129,
                'option_id' => 100,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            129 => 
            array (
                'id' => 130,
                'option_id' => 101,
                'name' => 'LCD',
                'slug' => 'lcd',
                'locale' => 'az',
            ),
            130 => 
            array (
                'id' => 131,
                'option_id' => 101,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            131 => 
            array (
                'id' => 132,
                'option_id' => 101,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            132 => 
            array (
                'id' => 133,
                'option_id' => 102,
                'name' => 'LED',
                'slug' => 'led',
                'locale' => 'az',
            ),
            133 => 
            array (
                'id' => 134,
                'option_id' => 102,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            134 => 
            array (
                'id' => 135,
                'option_id' => 102,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            135 => 
            array (
                'id' => 136,
                'option_id' => 103,
                'name' => 'OLED',
                'slug' => 'oled',
                'locale' => 'az',
            ),
            136 => 
            array (
                'id' => 137,
                'option_id' => 103,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            137 => 
            array (
                'id' => 138,
                'option_id' => 103,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            138 => 
            array (
                'id' => 139,
                'option_id' => 104,
                'name' => 'QLED',
                'slug' => 'qled',
                'locale' => 'az',
            ),
            139 => 
            array (
                'id' => 140,
                'option_id' => 104,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            140 => 
            array (
                'id' => 141,
                'option_id' => 104,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            141 => 
            array (
                'id' => 142,
                'option_id' => 105,
                'name' => 'AMOLED',
                'slug' => 'amoled',
                'locale' => 'az',
            ),
            142 => 
            array (
                'id' => 143,
                'option_id' => 105,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            143 => 
            array (
                'id' => 144,
                'option_id' => 105,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            144 => 
            array (
                'id' => 145,
                'option_id' => 106,
                'name' => 'NanoCell',
                'slug' => 'nanocell',
                'locale' => 'az',
            ),
            145 => 
            array (
                'id' => 146,
                'option_id' => 106,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            146 => 
            array (
                'id' => 147,
                'option_id' => 106,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            147 => 
            array (
                'id' => 148,
                'option_id' => 107,
                'name' => 'HD',
                'slug' => 'hd',
                'locale' => 'az',
            ),
            148 => 
            array (
                'id' => 149,
                'option_id' => 107,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            149 => 
            array (
                'id' => 150,
                'option_id' => 107,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            150 => 
            array (
                'id' => 151,
                'option_id' => 108,
                'name' => 'Full HD',
                'slug' => 'full-hd',
                'locale' => 'az',
            ),
            151 => 
            array (
                'id' => 152,
                'option_id' => 108,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            152 => 
            array (
                'id' => 153,
                'option_id' => 108,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            153 => 
            array (
                'id' => 154,
                'option_id' => 109,
                'name' => '4K UHD',
                'slug' => '4k-uhd',
                'locale' => 'az',
            ),
            154 => 
            array (
                'id' => 155,
                'option_id' => 109,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            155 => 
            array (
                'id' => 156,
                'option_id' => 109,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            156 => 
            array (
                'id' => 157,
                'option_id' => 110,
                'name' => '8K UHD',
                'slug' => '8k-uhd',
                'locale' => 'az',
            ),
            157 => 
            array (
                'id' => 158,
                'option_id' => 110,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            158 => 
            array (
                'id' => 159,
                'option_id' => 110,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            159 => 
            array (
                'id' => 160,
                'option_id' => 111,
                'name' => 'Hə',
                'slug' => 'he',
                'locale' => 'az',
            ),
            160 => 
            array (
                'id' => 161,
                'option_id' => 111,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            161 => 
            array (
                'id' => 162,
                'option_id' => 111,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            162 => 
            array (
                'id' => 163,
                'option_id' => 112,
                'name' => 'Yox',
                'slug' => 'yox',
                'locale' => 'az',
            ),
            163 => 
            array (
                'id' => 164,
                'option_id' => 112,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            164 => 
            array (
                'id' => 165,
                'option_id' => 112,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            165 => 
            array (
                'id' => 166,
                'option_id' => 113,
                'name' => 'Android TV',
                'slug' => 'android-tv',
                'locale' => 'az',
            ),
            166 => 
            array (
                'id' => 167,
                'option_id' => 113,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            167 => 
            array (
                'id' => 168,
                'option_id' => 113,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            168 => 
            array (
                'id' => 169,
                'option_id' => 114,
                'name' => 'MIUI TV',
                'slug' => 'miui-tv',
                'locale' => 'az',
            ),
            169 => 
            array (
                'id' => 170,
                'option_id' => 114,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            170 => 
            array (
                'id' => 171,
                'option_id' => 114,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            171 => 
            array (
                'id' => 172,
                'option_id' => 115,
                'name' => 'Samsung Smart TV',
                'slug' => 'samsung-smart-tv',
                'locale' => 'az',
            ),
            172 => 
            array (
                'id' => 173,
                'option_id' => 115,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            173 => 
            array (
                'id' => 174,
                'option_id' => 115,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            174 => 
            array (
                'id' => 175,
                'option_id' => 116,
                'name' => 'webOS TV',
                'slug' => 'webos-tv',
                'locale' => 'az',
            ),
            175 => 
            array (
                'id' => 176,
                'option_id' => 116,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            176 => 
            array (
                'id' => 177,
                'option_id' => 116,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            177 => 
            array (
                'id' => 178,
                'option_id' => 117,
                'name' => 'Ev və iş',
                'slug' => 'ev-ve-is',
                'locale' => 'az',
            ),
            178 => 
            array (
                'id' => 179,
                'option_id' => 117,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            179 => 
            array (
                'id' => 180,
                'option_id' => 117,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            180 => 
            array (
                'id' => 181,
                'option_id' => 119,
                'name' => 'Oyun',
                'slug' => 'oyun',
                'locale' => 'az',
            ),
            181 => 
            array (
                'id' => 182,
                'option_id' => 119,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            182 => 
            array (
                'id' => 183,
                'option_id' => 119,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            183 => 
            array (
                'id' => 184,
                'option_id' => 120,
                'name' => 'Premium',
                'slug' => 'premium',
                'locale' => 'az',
            ),
            184 => 
            array (
                'id' => 185,
                'option_id' => 120,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            185 => 
            array (
                'id' => 186,
                'option_id' => 120,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            186 => 
            array (
                'id' => 187,
                'option_id' => 121,
                'name' => '11.6”',
                'slug' => '116',
                'locale' => 'az',
            ),
            187 => 
            array (
                'id' => 188,
                'option_id' => 121,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            188 => 
            array (
                'id' => 189,
                'option_id' => 121,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            189 => 
            array (
                'id' => 190,
                'option_id' => 122,
                'name' => '13.3”',
                'slug' => '133',
                'locale' => 'az',
            ),
            190 => 
            array (
                'id' => 191,
                'option_id' => 122,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            191 => 
            array (
                'id' => 192,
                'option_id' => 122,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            192 => 
            array (
                'id' => 193,
                'option_id' => 123,
                'name' => '14”',
                'slug' => '14',
                'locale' => 'az',
            ),
            193 => 
            array (
                'id' => 194,
                'option_id' => 123,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            194 => 
            array (
                'id' => 195,
                'option_id' => 123,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            195 => 
            array (
                'id' => 196,
                'option_id' => 124,
                'name' => '15.4”',
                'slug' => '154',
                'locale' => 'az',
            ),
            196 => 
            array (
                'id' => 197,
                'option_id' => 124,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            197 => 
            array (
                'id' => 198,
                'option_id' => 124,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            198 => 
            array (
                'id' => 199,
                'option_id' => 125,
                'name' => '15.6”',
                'slug' => '156',
                'locale' => 'az',
            ),
            199 => 
            array (
                'id' => 200,
                'option_id' => 125,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            200 => 
            array (
                'id' => 201,
                'option_id' => 125,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            201 => 
            array (
                'id' => 202,
                'option_id' => 126,
                'name' => '16”',
                'slug' => '16',
                'locale' => 'az',
            ),
            202 => 
            array (
                'id' => 203,
                'option_id' => 126,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            203 => 
            array (
                'id' => 204,
                'option_id' => 126,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            204 => 
            array (
                'id' => 205,
                'option_id' => 127,
                'name' => '17.3”',
                'slug' => '173',
                'locale' => 'az',
            ),
            205 => 
            array (
                'id' => 206,
                'option_id' => 127,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            206 => 
            array (
                'id' => 207,
                'option_id' => 127,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            207 => 
            array (
                'id' => 208,
                'option_id' => 128,
                'name' => '19.5”',
                'slug' => '195',
                'locale' => 'az',
            ),
            208 => 
            array (
                'id' => 209,
                'option_id' => 128,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            209 => 
            array (
                'id' => 210,
                'option_id' => 128,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            210 => 
            array (
                'id' => 211,
                'option_id' => 129,
                'name' => 'İntel Celeron',
                'slug' => 'intel-celeron',
                'locale' => 'az',
            ),
            211 => 
            array (
                'id' => 212,
                'option_id' => 129,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            212 => 
            array (
                'id' => 213,
                'option_id' => 129,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            213 => 
            array (
                'id' => 214,
                'option_id' => 130,
                'name' => 'İntel Pentium',
                'slug' => 'intel-pentium',
                'locale' => 'az',
            ),
            214 => 
            array (
                'id' => 215,
                'option_id' => 130,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            215 => 
            array (
                'id' => 216,
                'option_id' => 130,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            216 => 
            array (
                'id' => 217,
                'option_id' => 131,
                'name' => 'İntel Core i3',
                'slug' => 'intel-core-i3',
                'locale' => 'az',
            ),
            217 => 
            array (
                'id' => 218,
                'option_id' => 131,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            218 => 
            array (
                'id' => 219,
                'option_id' => 131,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            219 => 
            array (
                'id' => 220,
                'option_id' => 132,
                'name' => 'İntel Core i5',
                'slug' => 'intel-core-i5',
                'locale' => 'az',
            ),
            220 => 
            array (
                'id' => 221,
                'option_id' => 132,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            221 => 
            array (
                'id' => 222,
                'option_id' => 132,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            222 => 
            array (
                'id' => 223,
                'option_id' => 133,
                'name' => 'İntel Core i7',
                'slug' => 'intel-core-i7',
                'locale' => 'az',
            ),
            223 => 
            array (
                'id' => 224,
                'option_id' => 133,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            224 => 
            array (
                'id' => 225,
                'option_id' => 133,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            225 => 
            array (
                'id' => 226,
                'option_id' => 134,
                'name' => 'İntel Core i9',
                'slug' => 'intel-core-i9',
                'locale' => 'az',
            ),
            226 => 
            array (
                'id' => 227,
                'option_id' => 134,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            227 => 
            array (
                'id' => 228,
                'option_id' => 134,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            228 => 
            array (
                'id' => 229,
                'option_id' => 135,
                'name' => 'AMD Ryzen 3',
                'slug' => 'amd-ryzen-3',
                'locale' => 'az',
            ),
            229 => 
            array (
                'id' => 230,
                'option_id' => 135,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            230 => 
            array (
                'id' => 231,
                'option_id' => 135,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            231 => 
            array (
                'id' => 232,
                'option_id' => 136,
                'name' => 'AMD Ryzen 5',
                'slug' => 'amd-ryzen-5',
                'locale' => 'az',
            ),
            232 => 
            array (
                'id' => 233,
                'option_id' => 136,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            233 => 
            array (
                'id' => 234,
                'option_id' => 136,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            234 => 
            array (
                'id' => 235,
                'option_id' => 137,
                'name' => 'AMD Ryzen 7',
                'slug' => 'amd-ryzen-7',
                'locale' => 'az',
            ),
            235 => 
            array (
                'id' => 236,
                'option_id' => 137,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            236 => 
            array (
                'id' => 237,
                'option_id' => 137,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            237 => 
            array (
                'id' => 238,
                'option_id' => 138,
                'name' => 'AMD Ryzen R5',
                'slug' => 'amd-ryzen-r5',
                'locale' => 'az',
            ),
            238 => 
            array (
                'id' => 239,
                'option_id' => 138,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            239 => 
            array (
                'id' => 240,
                'option_id' => 138,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            240 => 
            array (
                'id' => 241,
                'option_id' => 139,
                'name' => '2 GB',
                'slug' => '2-gb-1',
                'locale' => 'az',
            ),
            241 => 
            array (
                'id' => 242,
                'option_id' => 139,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            242 => 
            array (
                'id' => 243,
                'option_id' => 139,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            243 => 
            array (
                'id' => 244,
                'option_id' => 140,
                'name' => '3 GB',
                'slug' => '3-gb-1',
                'locale' => 'az',
            ),
            244 => 
            array (
                'id' => 245,
                'option_id' => 140,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            245 => 
            array (
                'id' => 246,
                'option_id' => 140,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            246 => 
            array (
                'id' => 247,
                'option_id' => 141,
                'name' => '4 GB',
                'slug' => '4-gb-1',
                'locale' => 'az',
            ),
            247 => 
            array (
                'id' => 248,
                'option_id' => 141,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            248 => 
            array (
                'id' => 249,
                'option_id' => 141,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            249 => 
            array (
                'id' => 250,
                'option_id' => 142,
                'name' => '5 GB',
                'slug' => '5-gb',
                'locale' => 'az',
            ),
            250 => 
            array (
                'id' => 251,
                'option_id' => 142,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            251 => 
            array (
                'id' => 252,
                'option_id' => 142,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            252 => 
            array (
                'id' => 253,
                'option_id' => 143,
                'name' => '6 GB',
                'slug' => '6-gb-1',
                'locale' => 'az',
            ),
            253 => 
            array (
                'id' => 254,
                'option_id' => 143,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            254 => 
            array (
                'id' => 255,
                'option_id' => 143,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            255 => 
            array (
                'id' => 256,
                'option_id' => 144,
                'name' => '8 GB',
                'slug' => '8-gb-1',
                'locale' => 'az',
            ),
            256 => 
            array (
                'id' => 257,
                'option_id' => 144,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            257 => 
            array (
                'id' => 258,
                'option_id' => 144,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            258 => 
            array (
                'id' => 259,
                'option_id' => 145,
                'name' => '12 GB',
                'slug' => '12-gb-1',
                'locale' => 'az',
            ),
            259 => 
            array (
                'id' => 260,
                'option_id' => 145,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            260 => 
            array (
                'id' => 261,
                'option_id' => 145,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            261 => 
            array (
                'id' => 262,
                'option_id' => 146,
                'name' => 'Split',
                'slug' => 'split',
                'locale' => 'az',
            ),
            262 => 
            array (
                'id' => 263,
                'option_id' => 146,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            263 => 
            array (
                'id' => 264,
                'option_id' => 146,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            264 => 
            array (
                'id' => 265,
                'option_id' => 147,
                'name' => 'Multi-split',
                'slug' => 'multi-split',
                'locale' => 'az',
            ),
            265 => 
            array (
                'id' => 266,
                'option_id' => 147,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            266 => 
            array (
                'id' => 267,
                'option_id' => 147,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            267 => 
            array (
                'id' => 268,
                'option_id' => 148,
                'name' => 'Kolon',
                'slug' => 'kolon',
                'locale' => 'az',
            ),
            268 => 
            array (
                'id' => 269,
                'option_id' => 148,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            269 => 
            array (
                'id' => 270,
                'option_id' => 148,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            270 => 
            array (
                'id' => 271,
                'option_id' => 149,
                'name' => 'Portativ',
                'slug' => 'portativ',
                'locale' => 'az',
            ),
            271 => 
            array (
                'id' => 272,
                'option_id' => 149,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            272 => 
            array (
                'id' => 273,
                'option_id' => 149,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            273 => 
            array (
                'id' => 274,
                'option_id' => 150,
                'name' => 'Pəncərə tipli',
                'slug' => 'pencere-tipli',
                'locale' => 'az',
            ),
            274 => 
            array (
                'id' => 275,
                'option_id' => 150,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            275 => 
            array (
                'id' => 276,
                'option_id' => 150,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            276 => 
            array (
                'id' => 277,
                'option_id' => 151,
                'name' => 'Hə',
                'slug' => 'he-1',
                'locale' => 'az',
            ),
            277 => 
            array (
                'id' => 278,
                'option_id' => 151,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            278 => 
            array (
                'id' => 279,
                'option_id' => 151,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            279 => 
            array (
                'id' => 280,
                'option_id' => 152,
                'name' => 'Yox',
                'slug' => 'yox-1',
                'locale' => 'az',
            ),
            280 => 
            array (
                'id' => 281,
                'option_id' => 152,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            281 => 
            array (
                'id' => 282,
                'option_id' => 152,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            282 => 
            array (
                'id' => 283,
                'option_id' => 153,
                'name' => 'Hə',
                'slug' => 'he-2',
                'locale' => 'az',
            ),
            283 => 
            array (
                'id' => 284,
                'option_id' => 153,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            284 => 
            array (
                'id' => 285,
                'option_id' => 153,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            285 => 
            array (
                'id' => 286,
                'option_id' => 154,
                'name' => 'Yox',
                'slug' => 'yox-2',
                'locale' => 'az',
            ),
            286 => 
            array (
                'id' => 287,
                'option_id' => 154,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            287 => 
            array (
                'id' => 288,
                'option_id' => 154,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            288 => 
            array (
                'id' => 289,
                'option_id' => 155,
                'name' => '20-30 kv',
                'slug' => '20-30-kv',
                'locale' => 'az',
            ),
            289 => 
            array (
                'id' => 290,
                'option_id' => 155,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            290 => 
            array (
                'id' => 291,
                'option_id' => 155,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            291 => 
            array (
                'id' => 292,
                'option_id' => 156,
                'name' => '30-40 kv',
                'slug' => '30-40-kv',
                'locale' => 'az',
            ),
            292 => 
            array (
                'id' => 293,
                'option_id' => 156,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            293 => 
            array (
                'id' => 294,
                'option_id' => 156,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            294 => 
            array (
                'id' => 295,
                'option_id' => 157,
                'name' => '40-50kv',
                'slug' => '40-50kv',
                'locale' => 'az',
            ),
            295 => 
            array (
                'id' => 296,
                'option_id' => 157,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            296 => 
            array (
                'id' => 297,
                'option_id' => 157,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            297 => 
            array (
                'id' => 298,
                'option_id' => 158,
                'name' => '50-60 kv',
                'slug' => '50-60-kv',
                'locale' => 'az',
            ),
            298 => 
            array (
                'id' => 299,
                'option_id' => 158,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            299 => 
            array (
                'id' => 300,
                'option_id' => 158,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            300 => 
            array (
                'id' => 301,
                'option_id' => 159,
                'name' => '60-70 kv',
                'slug' => '60-70-kv',
                'locale' => 'az',
            ),
            301 => 
            array (
                'id' => 302,
                'option_id' => 159,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            302 => 
            array (
                'id' => 303,
                'option_id' => 159,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            303 => 
            array (
                'id' => 304,
                'option_id' => 160,
                'name' => '80-100 kv',
                'slug' => '80-100-kv',
                'locale' => 'az',
            ),
            304 => 
            array (
                'id' => 305,
                'option_id' => 160,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            305 => 
            array (
                'id' => 306,
                'option_id' => 160,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            306 => 
            array (
                'id' => 307,
                'option_id' => 161,
                'name' => '100-120 kv',
                'slug' => '100-120-kv',
                'locale' => 'az',
            ),
            307 => 
            array (
                'id' => 308,
                'option_id' => 161,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            308 => 
            array (
                'id' => 309,
                'option_id' => 161,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            309 => 
            array (
                'id' => 310,
                'option_id' => 162,
                'name' => 'Defrost',
                'slug' => 'defrost',
                'locale' => 'az',
            ),
            310 => 
            array (
                'id' => 311,
                'option_id' => 162,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            311 => 
            array (
                'id' => 312,
                'option_id' => 162,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            312 => 
            array (
                'id' => 313,
                'option_id' => 163,
                'name' => 'No frost',
                'slug' => 'no-frost',
                'locale' => 'az',
            ),
            313 => 
            array (
                'id' => 314,
                'option_id' => 163,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            314 => 
            array (
                'id' => 315,
                'option_id' => 163,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            315 => 
            array (
                'id' => 316,
                'option_id' => 164,
                'name' => 'No frost plus',
                'slug' => 'no-frost-plus',
                'locale' => 'az',
            ),
            316 => 
            array (
                'id' => 317,
                'option_id' => 164,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            317 => 
            array (
                'id' => 318,
                'option_id' => 164,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            318 => 
            array (
                'id' => 319,
                'option_id' => 165,
                'name' => 'Aşağıda',
                'slug' => 'asagida',
                'locale' => 'az',
            ),
            319 => 
            array (
                'id' => 320,
                'option_id' => 165,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            320 => 
            array (
                'id' => 321,
                'option_id' => 165,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            321 => 
            array (
                'id' => 322,
                'option_id' => 166,
                'name' => 'Yuxarıda',
                'slug' => 'yuxarida',
                'locale' => 'az',
            ),
            322 => 
            array (
                'id' => 323,
                'option_id' => 166,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            323 => 
            array (
                'id' => 324,
                'option_id' => 166,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            324 => 
            array (
                'id' => 325,
                'option_id' => 167,
                'name' => '0-250 Lt',
                'slug' => '0-250-lt',
                'locale' => 'az',
            ),
            325 => 
            array (
                'id' => 326,
                'option_id' => 167,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            326 => 
            array (
                'id' => 327,
                'option_id' => 167,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            327 => 
            array (
                'id' => 328,
                'option_id' => 168,
                'name' => '250-500 Lt',
                'slug' => '250-500-lt',
                'locale' => 'az',
            ),
            328 => 
            array (
                'id' => 329,
                'option_id' => 168,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            329 => 
            array (
                'id' => 330,
                'option_id' => 168,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            330 => 
            array (
                'id' => 331,
                'option_id' => 169,
                'name' => '500+ Lt',
                'slug' => '500-lt',
                'locale' => 'az',
            ),
            331 => 
            array (
                'id' => 332,
                'option_id' => 169,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            332 => 
            array (
                'id' => 333,
                'option_id' => 169,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            333 => 
            array (
                'id' => 334,
                'option_id' => 170,
                'name' => '0-250 Lt',
                'slug' => '0-250-lt-1',
                'locale' => 'az',
            ),
            334 => 
            array (
                'id' => 335,
                'option_id' => 170,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            335 => 
            array (
                'id' => 336,
                'option_id' => 170,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            336 => 
            array (
                'id' => 337,
                'option_id' => 171,
                'name' => '250-500 Lt',
                'slug' => '250-500-lt-1',
                'locale' => 'az',
            ),
            337 => 
            array (
                'id' => 338,
                'option_id' => 171,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            338 => 
            array (
                'id' => 339,
                'option_id' => 171,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            339 => 
            array (
                'id' => 340,
                'option_id' => 172,
                'name' => '500+ Lt',
                'slug' => '500-lt-1',
                'locale' => 'az',
            ),
            340 => 
            array (
                'id' => 341,
                'option_id' => 172,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            341 => 
            array (
                'id' => 342,
                'option_id' => 172,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            342 => 
            array (
                'id' => 343,
                'option_id' => 173,
                'name' => '100-150 Lt',
                'slug' => '100-150-lt',
                'locale' => 'az',
            ),
            343 => 
            array (
                'id' => 344,
                'option_id' => 173,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            344 => 
            array (
                'id' => 345,
                'option_id' => 173,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            345 => 
            array (
                'id' => 346,
                'option_id' => 174,
                'name' => '150-200 Lt',
                'slug' => '150-200-lt',
                'locale' => 'az',
            ),
            346 => 
            array (
                'id' => 347,
                'option_id' => 174,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            347 => 
            array (
                'id' => 348,
                'option_id' => 174,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            348 => 
            array (
                'id' => 349,
                'option_id' => 175,
                'name' => '200 litrdən çox',
                'slug' => '200-litrden-cox',
                'locale' => 'az',
            ),
            349 => 
            array (
                'id' => 350,
                'option_id' => 175,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            350 => 
            array (
                'id' => 351,
                'option_id' => 175,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            351 => 
            array (
                'id' => 352,
                'option_id' => 176,
                'name' => 'Bir qapı',
                'slug' => 'bir-qapi',
                'locale' => 'az',
            ),
            352 => 
            array (
                'id' => 353,
                'option_id' => 176,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            353 => 
            array (
                'id' => 354,
                'option_id' => 176,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            354 => 
            array (
                'id' => 355,
                'option_id' => 177,
                'name' => 'İki qapı',
                'slug' => 'iki-qapi',
                'locale' => 'az',
            ),
            355 => 
            array (
                'id' => 356,
                'option_id' => 177,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            356 => 
            array (
                'id' => 357,
                'option_id' => 177,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            357 => 
            array (
                'id' => 358,
                'option_id' => 178,
                'name' => 'Yan-yana',
                'slug' => 'yan-yana',
                'locale' => 'az',
            ),
            358 => 
            array (
                'id' => 359,
                'option_id' => 178,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            359 => 
            array (
                'id' => 360,
                'option_id' => 178,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            360 => 
            array (
                'id' => 361,
                'option_id' => 179,
                'name' => 'Hə',
                'slug' => 'he-3',
                'locale' => 'az',
            ),
            361 => 
            array (
                'id' => 362,
                'option_id' => 179,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            362 => 
            array (
                'id' => 363,
                'option_id' => 179,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            363 => 
            array (
                'id' => 364,
                'option_id' => 180,
                'name' => 'Yox',
                'slug' => 'yox-3',
                'locale' => 'az',
            ),
            364 => 
            array (
                'id' => 365,
                'option_id' => 180,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            365 => 
            array (
                'id' => 366,
                'option_id' => 180,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            366 => 
            array (
                'id' => 367,
                'option_id' => 181,
                'name' => '6 kq',
                'slug' => '6-kq',
                'locale' => 'az',
            ),
            367 => 
            array (
                'id' => 368,
                'option_id' => 181,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            368 => 
            array (
                'id' => 369,
                'option_id' => 181,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            369 => 
            array (
                'id' => 370,
                'option_id' => 182,
                'name' => '6.5 kq',
                'slug' => '65-kq',
                'locale' => 'az',
            ),
            370 => 
            array (
                'id' => 371,
                'option_id' => 182,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            371 => 
            array (
                'id' => 372,
                'option_id' => 182,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            372 => 
            array (
                'id' => 373,
                'option_id' => 183,
                'name' => '7 kq',
                'slug' => '7-kq',
                'locale' => 'az',
            ),
            373 => 
            array (
                'id' => 374,
                'option_id' => 183,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            374 => 
            array (
                'id' => 375,
                'option_id' => 183,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            375 => 
            array (
                'id' => 376,
                'option_id' => 184,
                'name' => '8 kq',
                'slug' => '8-kq',
                'locale' => 'az',
            ),
            376 => 
            array (
                'id' => 377,
                'option_id' => 184,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            377 => 
            array (
                'id' => 378,
                'option_id' => 184,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            378 => 
            array (
                'id' => 379,
                'option_id' => 185,
                'name' => '9 kq',
                'slug' => '9-kq',
                'locale' => 'az',
            ),
            379 => 
            array (
                'id' => 380,
                'option_id' => 185,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            380 => 
            array (
                'id' => 381,
                'option_id' => 185,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            381 => 
            array (
                'id' => 382,
                'option_id' => 186,
                'name' => '10 kq',
                'slug' => '10-kq',
                'locale' => 'az',
            ),
            382 => 
            array (
                'id' => 383,
                'option_id' => 186,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            383 => 
            array (
                'id' => 384,
                'option_id' => 186,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            384 => 
            array (
                'id' => 385,
                'option_id' => 187,
                'name' => '10.5 kq',
                'slug' => '105-kq',
                'locale' => 'az',
            ),
            385 => 
            array (
                'id' => 386,
                'option_id' => 187,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            386 => 
            array (
                'id' => 387,
                'option_id' => 187,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            387 => 
            array (
                'id' => 388,
                'option_id' => 188,
                'name' => '800',
                'slug' => '800',
                'locale' => 'az',
            ),
            388 => 
            array (
                'id' => 389,
                'option_id' => 188,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            389 => 
            array (
                'id' => 390,
                'option_id' => 188,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            390 => 
            array (
                'id' => 391,
                'option_id' => 189,
                'name' => '1000',
                'slug' => '1000',
                'locale' => 'az',
            ),
            391 => 
            array (
                'id' => 392,
                'option_id' => 189,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            392 => 
            array (
                'id' => 393,
                'option_id' => 189,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            393 => 
            array (
                'id' => 394,
                'option_id' => 190,
                'name' => '1100',
                'slug' => '1100',
                'locale' => 'az',
            ),
            394 => 
            array (
                'id' => 395,
                'option_id' => 190,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            395 => 
            array (
                'id' => 396,
                'option_id' => 190,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            396 => 
            array (
                'id' => 397,
                'option_id' => 191,
                'name' => '1200',
                'slug' => '1200',
                'locale' => 'az',
            ),
            397 => 
            array (
                'id' => 398,
                'option_id' => 191,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            398 => 
            array (
                'id' => 399,
                'option_id' => 191,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            399 => 
            array (
                'id' => 400,
                'option_id' => 192,
                'name' => '1300',
                'slug' => '1300',
                'locale' => 'az',
            ),
            400 => 
            array (
                'id' => 401,
                'option_id' => 192,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            401 => 
            array (
                'id' => 402,
                'option_id' => 192,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            402 => 
            array (
                'id' => 403,
                'option_id' => 193,
                'name' => '1400',
                'slug' => '1400',
                'locale' => 'az',
            ),
            403 => 
            array (
                'id' => 404,
                'option_id' => 193,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            404 => 
            array (
                'id' => 405,
                'option_id' => 193,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            405 => 
            array (
                'id' => 406,
                'option_id' => 194,
                'name' => '1500+',
                'slug' => '1500',
                'locale' => 'az',
            ),
            406 => 
            array (
                'id' => 407,
                'option_id' => 194,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            407 => 
            array (
                'id' => 408,
                'option_id' => 194,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            408 => 
            array (
                'id' => 409,
                'option_id' => 195,
                'name' => 'Hə',
                'slug' => 'he-4',
                'locale' => 'az',
            ),
            409 => 
            array (
                'id' => 410,
                'option_id' => 195,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            410 => 
            array (
                'id' => 411,
                'option_id' => 195,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            411 => 
            array (
                'id' => 412,
                'option_id' => 196,
                'name' => 'Yox',
                'slug' => 'yox-4',
                'locale' => 'az',
            ),
            412 => 
            array (
                'id' => 413,
                'option_id' => 196,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            413 => 
            array (
                'id' => 414,
                'option_id' => 196,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            414 => 
            array (
                'id' => 415,
                'option_id' => 197,
                'name' => 'Hə',
                'slug' => 'he-5',
                'locale' => 'az',
            ),
            415 => 
            array (
                'id' => 416,
                'option_id' => 197,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            416 => 
            array (
                'id' => 417,
                'option_id' => 197,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            417 => 
            array (
                'id' => 418,
                'option_id' => 198,
                'name' => 'Yox',
                'slug' => 'yox-5',
                'locale' => 'az',
            ),
            418 => 
            array (
                'id' => 419,
                'option_id' => 198,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            419 => 
            array (
                'id' => 420,
                'option_id' => 198,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            420 => 
            array (
                'id' => 421,
                'option_id' => 199,
                'name' => 'Mexaniki',
                'slug' => 'mexaniki',
                'locale' => 'az',
            ),
            421 => 
            array (
                'id' => 422,
                'option_id' => 199,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            422 => 
            array (
                'id' => 423,
                'option_id' => 199,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            423 => 
            array (
                'id' => 424,
                'option_id' => 200,
                'name' => 'Elektron',
                'slug' => 'elektron',
                'locale' => 'az',
            ),
            424 => 
            array (
                'id' => 425,
                'option_id' => 200,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            425 => 
            array (
                'id' => 426,
                'option_id' => 200,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            426 => 
            array (
                'id' => 427,
                'option_id' => 201,
                'name' => '5 lt',
                'slug' => '5-lt',
                'locale' => 'az',
            ),
            427 => 
            array (
                'id' => 428,
                'option_id' => 201,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            428 => 
            array (
                'id' => 429,
                'option_id' => 201,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            429 => 
            array (
                'id' => 430,
                'option_id' => 202,
                'name' => '6 lt',
                'slug' => '6-lt',
                'locale' => 'az',
            ),
            430 => 
            array (
                'id' => 431,
                'option_id' => 202,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            431 => 
            array (
                'id' => 432,
                'option_id' => 202,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            432 => 
            array (
                'id' => 433,
                'option_id' => 203,
                'name' => '7.5 lt',
                'slug' => '75-lt',
                'locale' => 'az',
            ),
            433 => 
            array (
                'id' => 434,
                'option_id' => 203,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            434 => 
            array (
                'id' => 435,
                'option_id' => 203,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            435 => 
            array (
                'id' => 436,
                'option_id' => 204,
                'name' => '8 lt',
                'slug' => '8-lt',
                'locale' => 'az',
            ),
            436 => 
            array (
                'id' => 437,
                'option_id' => 204,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            437 => 
            array (
                'id' => 438,
                'option_id' => 204,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            438 => 
            array (
                'id' => 439,
                'option_id' => 205,
                'name' => '8.5 lt',
                'slug' => '85-lt',
                'locale' => 'az',
            ),
            439 => 
            array (
                'id' => 440,
                'option_id' => 205,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            440 => 
            array (
                'id' => 441,
                'option_id' => 205,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            441 => 
            array (
                'id' => 442,
                'option_id' => 206,
                'name' => '6',
                'slug' => '6',
                'locale' => 'az',
            ),
            442 => 
            array (
                'id' => 443,
                'option_id' => 206,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            443 => 
            array (
                'id' => 444,
                'option_id' => 206,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            444 => 
            array (
                'id' => 445,
                'option_id' => 207,
                'name' => '9',
                'slug' => '9',
                'locale' => 'az',
            ),
            445 => 
            array (
                'id' => 446,
                'option_id' => 207,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            446 => 
            array (
                'id' => 447,
                'option_id' => 207,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            447 => 
            array (
                'id' => 448,
                'option_id' => 208,
                'name' => '10',
                'slug' => '10',
                'locale' => 'az',
            ),
            448 => 
            array (
                'id' => 449,
                'option_id' => 208,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            449 => 
            array (
                'id' => 450,
                'option_id' => 208,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            450 => 
            array (
                'id' => 451,
                'option_id' => 209,
                'name' => '11',
                'slug' => '11',
                'locale' => 'az',
            ),
            451 => 
            array (
                'id' => 452,
                'option_id' => 209,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            452 => 
            array (
                'id' => 453,
                'option_id' => 209,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            453 => 
            array (
                'id' => 454,
                'option_id' => 210,
                'name' => '12',
                'slug' => '12',
                'locale' => 'az',
            ),
            454 => 
            array (
                'id' => 455,
                'option_id' => 210,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            455 => 
            array (
                'id' => 456,
                'option_id' => 210,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            456 => 
            array (
                'id' => 457,
                'option_id' => 211,
                'name' => '13',
                'slug' => '13',
                'locale' => 'az',
            ),
            457 => 
            array (
                'id' => 458,
                'option_id' => 211,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            458 => 
            array (
                'id' => 459,
                'option_id' => 211,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            459 => 
            array (
                'id' => 460,
                'option_id' => 212,
                'name' => '14',
                'slug' => '14-1',
                'locale' => 'az',
            ),
            460 => 
            array (
                'id' => 461,
                'option_id' => 212,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            461 => 
            array (
                'id' => 462,
                'option_id' => 212,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            462 => 
            array (
                'id' => 463,
                'option_id' => 213,
                'name' => '15',
                'slug' => '15',
                'locale' => 'az',
            ),
            463 => 
            array (
                'id' => 464,
                'option_id' => 213,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            464 => 
            array (
                'id' => 465,
                'option_id' => 213,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            465 => 
            array (
                'id' => 466,
                'option_id' => 214,
                'name' => 'Mexaniki',
                'slug' => 'mexaniki-1',
                'locale' => 'az',
            ),
            466 => 
            array (
                'id' => 467,
                'option_id' => 214,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            467 => 
            array (
                'id' => 468,
                'option_id' => 214,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            468 => 
            array (
                'id' => 469,
                'option_id' => 215,
                'name' => 'Sensor',
                'slug' => 'sensor',
                'locale' => 'az',
            ),
            469 => 
            array (
                'id' => 470,
                'option_id' => 215,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            470 => 
            array (
                'id' => 471,
                'option_id' => 215,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            471 => 
            array (
                'id' => 472,
                'option_id' => 216,
                'name' => 'Hə',
                'slug' => 'he-6',
                'locale' => 'az',
            ),
            472 => 
            array (
                'id' => 473,
                'option_id' => 216,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            473 => 
            array (
                'id' => 474,
                'option_id' => 216,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            474 => 
            array (
                'id' => 475,
                'option_id' => 217,
                'name' => 'Yox',
                'slug' => 'yox-6',
                'locale' => 'az',
            ),
            475 => 
            array (
                'id' => 476,
                'option_id' => 217,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            476 => 
            array (
                'id' => 477,
                'option_id' => 217,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            477 => 
            array (
                'id' => 478,
                'option_id' => 218,
                'name' => '2 GB',
                'slug' => '2-gb-2',
                'locale' => 'az',
            ),
            478 => 
            array (
                'id' => 479,
                'option_id' => 218,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            479 => 
            array (
                'id' => 480,
                'option_id' => 218,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            480 => 
            array (
                'id' => 481,
                'option_id' => 219,
                'name' => '4 GB',
                'slug' => '4-gb-2',
                'locale' => 'az',
            ),
            481 => 
            array (
                'id' => 482,
                'option_id' => 219,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            482 => 
            array (
                'id' => 483,
                'option_id' => 219,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            483 => 
            array (
                'id' => 484,
                'option_id' => 220,
                'name' => '8 GB',
                'slug' => '8-gb-2',
                'locale' => 'az',
            ),
            484 => 
            array (
                'id' => 485,
                'option_id' => 220,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            485 => 
            array (
                'id' => 486,
                'option_id' => 220,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            486 => 
            array (
                'id' => 487,
                'option_id' => 221,
                'name' => '12 GB',
                'slug' => '12-gb-2',
                'locale' => 'az',
            ),
            487 => 
            array (
                'id' => 488,
                'option_id' => 221,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            488 => 
            array (
                'id' => 489,
                'option_id' => 221,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            489 => 
            array (
                'id' => 490,
                'option_id' => 222,
                'name' => '16 GB',
                'slug' => '16-gb-1',
                'locale' => 'az',
            ),
            490 => 
            array (
                'id' => 491,
                'option_id' => 222,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            491 => 
            array (
                'id' => 492,
                'option_id' => 222,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            492 => 
            array (
                'id' => 493,
                'option_id' => 223,
                'name' => '32 GB',
                'slug' => '32-gb-1',
                'locale' => 'az',
            ),
            493 => 
            array (
                'id' => 494,
                'option_id' => 223,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            494 => 
            array (
                'id' => 495,
                'option_id' => 223,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            495 => 
            array (
                'id' => 496,
                'option_id' => 224,
                'name' => '64 GB',
                'slug' => '64-gb-1',
                'locale' => 'az',
            ),
            496 => 
            array (
                'id' => 497,
                'option_id' => 224,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            497 => 
            array (
                'id' => 498,
                'option_id' => 224,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            498 => 
            array (
                'id' => 499,
                'option_id' => 225,
                'name' => '128 GB',
                'slug' => '128-gb-1',
                'locale' => 'az',
            ),
            499 => 
            array (
                'id' => 500,
                'option_id' => 225,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
        ));
        \DB::table('option_translations')->insert(array (
            0 => 
            array (
                'id' => 501,
                'option_id' => 225,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            1 => 
            array (
                'id' => 502,
                'option_id' => 226,
                'name' => '256 GB',
                'slug' => '256-gb-1',
                'locale' => 'az',
            ),
            2 => 
            array (
                'id' => 503,
                'option_id' => 226,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            3 => 
            array (
                'id' => 504,
                'option_id' => 226,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            4 => 
            array (
                'id' => 505,
                'option_id' => 227,
                'name' => '500 GB',
                'slug' => '500-gb',
                'locale' => 'az',
            ),
            5 => 
            array (
                'id' => 506,
                'option_id' => 227,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            6 => 
            array (
                'id' => 507,
                'option_id' => 227,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            7 => 
            array (
                'id' => 508,
                'option_id' => 228,
                'name' => '512 GB',
                'slug' => '512-gb-1',
                'locale' => 'az',
            ),
            8 => 
            array (
                'id' => 509,
                'option_id' => 228,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            9 => 
            array (
                'id' => 510,
                'option_id' => 228,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            10 => 
            array (
                'id' => 511,
                'option_id' => 229,
                'name' => '1 TB',
                'slug' => '1-tb',
                'locale' => 'az',
            ),
            11 => 
            array (
                'id' => 512,
                'option_id' => 229,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            12 => 
            array (
                'id' => 513,
                'option_id' => 229,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            13 => 
            array (
                'id' => 514,
                'option_id' => 230,
                'name' => '2 TB +',
                'slug' => '2-tb',
                'locale' => 'az',
            ),
            14 => 
            array (
                'id' => 515,
                'option_id' => 230,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            15 => 
            array (
                'id' => 516,
                'option_id' => 230,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            16 => 
            array (
                'id' => 517,
                'option_id' => 231,
                'name' => 'iOS',
                'slug' => 'ios',
                'locale' => 'az',
            ),
            17 => 
            array (
                'id' => 518,
                'option_id' => 231,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            18 => 
            array (
                'id' => 519,
                'option_id' => 231,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            19 => 
            array (
                'id' => 520,
                'option_id' => 232,
                'name' => '6.8\'\'',
                'slug' => '68',
                'locale' => 'az',
            ),
            20 => 
            array (
                'id' => 521,
                'option_id' => 232,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            21 => 
            array (
                'id' => 522,
                'option_id' => 232,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            22 => 
            array (
                'id' => 523,
                'option_id' => 233,
                'name' => '7.3\'\'',
                'slug' => '73',
                'locale' => 'az',
            ),
            23 => 
            array (
                'id' => 524,
                'option_id' => 233,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            24 => 
            array (
                'id' => 525,
                'option_id' => 233,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            25 => 
            array (
                'id' => 526,
                'option_id' => 234,
                'name' => '5.7\'\'',
                'slug' => '57',
                'locale' => 'az',
            ),
            26 => 
            array (
                'id' => 527,
                'option_id' => 234,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            27 => 
            array (
                'id' => 528,
                'option_id' => 234,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            28 => 
            array (
                'id' => 529,
                'option_id' => 235,
                'name' => '6.7\'\'',
                'slug' => '67',
                'locale' => 'az',
            ),
            29 => 
            array (
                'id' => 530,
                'option_id' => 235,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            30 => 
            array (
                'id' => 531,
                'option_id' => 235,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            31 => 
            array (
                'id' => 532,
                'option_id' => 236,
                'name' => '5.3\'\'',
                'slug' => '53',
                'locale' => 'az',
            ),
            32 => 
            array (
                'id' => 533,
                'option_id' => 236,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            33 => 
            array (
                'id' => 534,
                'option_id' => 236,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            34 => 
            array (
                'id' => 535,
                'option_id' => 237,
                'name' => '6.67\'\'',
                'slug' => '667',
                'locale' => 'az',
            ),
            35 => 
            array (
                'id' => 536,
                'option_id' => 237,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            36 => 
            array (
                'id' => 537,
                'option_id' => 237,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            37 => 
            array (
                'id' => 538,
                'option_id' => 238,
                'name' => '6.47\'\'',
                'slug' => '647',
                'locale' => 'az',
            ),
            38 => 
            array (
                'id' => 539,
                'option_id' => 238,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            39 => 
            array (
                'id' => 540,
                'option_id' => 238,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            40 => 
            array (
                'id' => 541,
                'option_id' => 239,
                'name' => '2.8\'\'',
                'slug' => '28',
                'locale' => 'az',
            ),
            41 => 
            array (
                'id' => 542,
                'option_id' => 239,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            42 => 
            array (
                'id' => 543,
                'option_id' => 239,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            43 => 
            array (
                'id' => 544,
                'option_id' => 240,
                'name' => '512 MB',
                'slug' => '512-mb',
                'locale' => 'az',
            ),
            44 => 
            array (
                'id' => 545,
                'option_id' => 240,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            45 => 
            array (
                'id' => 546,
                'option_id' => 240,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            46 => 
            array (
                'id' => 547,
                'option_id' => 241,
                'name' => '4 GB',
                'slug' => '4-gb-3',
                'locale' => 'az',
            ),
            47 => 
            array (
                'id' => 548,
                'option_id' => 241,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            48 => 
            array (
                'id' => 549,
                'option_id' => 241,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            49 => 
            array (
                'id' => 550,
                'option_id' => 242,
                'name' => '2.4\'\'',
                'slug' => '24',
                'locale' => 'az',
            ),
            50 => 
            array (
                'id' => 551,
                'option_id' => 242,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            51 => 
            array (
                'id' => 552,
                'option_id' => 242,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            52 => 
            array (
                'id' => 553,
                'option_id' => 243,
                'name' => 'AMD A4',
                'slug' => 'amd-a4',
                'locale' => 'az',
            ),
            53 => 
            array (
                'id' => 554,
                'option_id' => 243,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            54 => 
            array (
                'id' => 555,
                'option_id' => 243,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            55 => 
            array (
                'id' => 556,
                'option_id' => 244,
                'name' => '64 GB',
                'slug' => '64-gb-2',
                'locale' => 'az',
            ),
            56 => 
            array (
                'id' => 557,
                'option_id' => 244,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            57 => 
            array (
                'id' => 558,
                'option_id' => 244,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            58 => 
            array (
                'id' => 559,
                'option_id' => 245,
                'name' => '14 lt',
                'slug' => '14-lt',
                'locale' => 'az',
            ),
            59 => 
            array (
                'id' => 560,
                'option_id' => 245,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            60 => 
            array (
                'id' => 561,
                'option_id' => 245,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            61 => 
            array (
                'id' => 562,
                'option_id' => 246,
                'name' => '12 lt',
                'slug' => '12-lt',
                'locale' => 'az',
            ),
            62 => 
            array (
                'id' => 563,
                'option_id' => 246,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            63 => 
            array (
                'id' => 564,
                'option_id' => 246,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            64 => 
            array (
                'id' => 565,
                'option_id' => 247,
                'name' => '9.5 lt',
                'slug' => '95-lt',
                'locale' => 'az',
            ),
            65 => 
            array (
                'id' => 566,
                'option_id' => 247,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            66 => 
            array (
                'id' => 567,
                'option_id' => 247,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            67 => 
            array (
                'id' => 568,
                'option_id' => 248,
                'name' => '9 lt',
                'slug' => '9-lt',
                'locale' => 'az',
            ),
            68 => 
            array (
                'id' => 569,
                'option_id' => 248,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            69 => 
            array (
                'id' => 570,
                'option_id' => 248,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            70 => 
            array (
                'id' => 571,
                'option_id' => 249,
                'name' => 'Tizen',
                'slug' => 'tizen',
                'locale' => 'az',
            ),
            71 => 
            array (
                'id' => 572,
                'option_id' => 249,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            72 => 
            array (
                'id' => 573,
                'option_id' => 249,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            73 => 
            array (
                'id' => 574,
                'option_id' => 250,
                'name' => 'Linux',
                'slug' => 'linux',
                'locale' => 'az',
            ),
            74 => 
            array (
                'id' => 575,
                'option_id' => 250,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            75 => 
            array (
                'id' => 576,
                'option_id' => 250,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            76 => 
            array (
                'id' => 577,
                'option_id' => 251,
                'name' => '5 kq',
                'slug' => '5-kq',
                'locale' => 'az',
            ),
            77 => 
            array (
                'id' => 578,
                'option_id' => 251,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            78 => 
            array (
                'id' => 579,
                'option_id' => 251,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            79 => 
            array (
                'id' => 580,
                'option_id' => 253,
                'name' => '3.5 kq',
                'slug' => '35-kq',
                'locale' => 'az',
            ),
            80 => 
            array (
                'id' => 581,
                'option_id' => 253,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            81 => 
            array (
                'id' => 582,
                'option_id' => 253,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            82 => 
            array (
                'id' => 583,
                'option_id' => 254,
                'name' => '18 kq',
                'slug' => '18-kq',
                'locale' => 'az',
            ),
            83 => 
            array (
                'id' => 584,
                'option_id' => 254,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            84 => 
            array (
                'id' => 585,
                'option_id' => 254,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            85 => 
            array (
                'id' => 586,
                'option_id' => 255,
                'name' => '20 kq',
                'slug' => '20-kq',
                'locale' => 'az',
            ),
            86 => 
            array (
                'id' => 587,
                'option_id' => 255,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            87 => 
            array (
                'id' => 588,
                'option_id' => 255,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            88 => 
            array (
                'id' => 589,
                'option_id' => 256,
                'name' => '21 kq',
                'slug' => '21-kq',
                'locale' => 'az',
            ),
            89 => 
            array (
                'id' => 590,
                'option_id' => 256,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            90 => 
            array (
                'id' => 591,
                'option_id' => 256,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            91 => 
            array (
                'id' => 592,
                'option_id' => 257,
                'name' => '140-150 kv',
                'slug' => '140-150-kv',
                'locale' => 'az',
            ),
            92 => 
            array (
                'id' => 593,
                'option_id' => 257,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            93 => 
            array (
                'id' => 594,
                'option_id' => 257,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            94 => 
            array (
                'id' => 595,
                'option_id' => 258,
                'name' => '190-200 kv',
                'slug' => '190-200-kv',
                'locale' => 'az',
            ),
            95 => 
            array (
                'id' => 596,
                'option_id' => 258,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            96 => 
            array (
                'id' => 597,
                'option_id' => 258,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            97 => 
            array (
                'id' => 598,
                'option_id' => 259,
                'name' => '70-80 kv',
                'slug' => '70-80-kv',
                'locale' => 'az',
            ),
            98 => 
            array (
                'id' => 599,
                'option_id' => 259,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            99 => 
            array (
                'id' => 600,
                'option_id' => 259,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            100 => 
            array (
                'id' => 601,
                'option_id' => 260,
                'name' => '90-100 kv',
                'slug' => '90-100-kv',
                'locale' => 'az',
            ),
            101 => 
            array (
                'id' => 602,
                'option_id' => 260,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            102 => 
            array (
                'id' => 603,
                'option_id' => 260,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            103 => 
            array (
                'id' => 604,
                'option_id' => 261,
                'name' => '15-20 kv',
                'slug' => '15-20-kv',
                'locale' => 'az',
            ),
            104 => 
            array (
                'id' => 605,
                'option_id' => 261,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            105 => 
            array (
                'id' => 606,
                'option_id' => 261,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            106 => 
            array (
                'id' => 607,
                'option_id' => 262,
                'name' => '100 litrə qədər',
                'slug' => '100-litre-qeder',
                'locale' => 'az',
            ),
            107 => 
            array (
                'id' => 608,
                'option_id' => 262,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            108 => 
            array (
                'id' => 609,
                'option_id' => 262,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            109 => 
            array (
                'id' => 610,
                'option_id' => 263,
                'name' => 'Low frost',
                'slug' => 'low-frost',
                'locale' => 'az',
            ),
            110 => 
            array (
                'id' => 611,
                'option_id' => 263,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            111 => 
            array (
                'id' => 612,
                'option_id' => 263,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            112 => 
            array (
                'id' => 613,
                'option_id' => 264,
                'name' => '6.9"',
                'slug' => '69',
                'locale' => 'az',
            ),
            113 => 
            array (
                'id' => 614,
                'option_id' => 264,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            114 => 
            array (
                'id' => 615,
                'option_id' => 264,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            115 => 
            array (
                'id' => 616,
                'option_id' => 265,
                'name' => '12.5"',
                'slug' => '125',
                'locale' => 'az',
            ),
            116 => 
            array (
                'id' => 617,
                'option_id' => 265,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            117 => 
            array (
                'id' => 618,
                'option_id' => 265,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            118 => 
            array (
                'id' => 619,
                'option_id' => 266,
                'name' => '5.4\'\'',
                'slug' => '54',
                'locale' => 'az',
            ),
            119 => 
            array (
                'id' => 620,
                'option_id' => 266,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            120 => 
            array (
                'id' => 621,
                'option_id' => 266,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            121 => 
            array (
                'id' => 622,
                'option_id' => 268,
                'name' => '10 lt',
                'slug' => '10-lt',
                'locale' => 'az',
            ),
            122 => 
            array (
                'id' => 623,
                'option_id' => 268,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            123 => 
            array (
                'id' => 624,
                'option_id' => 268,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            124 => 
            array (
                'id' => 625,
                'option_id' => 269,
                'name' => '5160mAh',
                'slug' => '5160mah',
                'locale' => 'az',
            ),
            125 => 
            array (
                'id' => 626,
                'option_id' => 269,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            126 => 
            array (
                'id' => 627,
                'option_id' => 269,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            127 => 
            array (
                'id' => 628,
                'option_id' => 270,
                'name' => '1800Vt',
                'slug' => '1800vt',
                'locale' => 'az',
            ),
            128 => 
            array (
                'id' => 629,
                'option_id' => 270,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            129 => 
            array (
                'id' => 630,
                'option_id' => 270,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            130 => 
            array (
                'id' => 631,
                'option_id' => 271,
                'name' => '380Vt',
                'slug' => '380vt',
                'locale' => 'az',
            ),
            131 => 
            array (
                'id' => 632,
                'option_id' => 271,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            132 => 
            array (
                'id' => 633,
                'option_id' => 271,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            133 => 
            array (
                'id' => 634,
                'option_id' => 272,
                'name' => '2 litr',
                'slug' => '2-litr',
                'locale' => 'az',
            ),
            134 => 
            array (
                'id' => 635,
                'option_id' => 272,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            135 => 
            array (
                'id' => 636,
                'option_id' => 272,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            136 => 
            array (
                'id' => 637,
                'option_id' => 273,
                'name' => '410Vt',
                'slug' => '410vt',
                'locale' => 'az',
            ),
            137 => 
            array (
                'id' => 638,
                'option_id' => 273,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            138 => 
            array (
                'id' => 639,
                'option_id' => 273,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            139 => 
            array (
                'id' => 640,
                'option_id' => 274,
                'name' => '2000Vt',
                'slug' => '2000vt',
                'locale' => 'az',
            ),
            140 => 
            array (
                'id' => 641,
                'option_id' => 274,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            141 => 
            array (
                'id' => 642,
                'option_id' => 274,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            142 => 
            array (
                'id' => 643,
                'option_id' => 275,
                'name' => '350Vt',
                'slug' => '350vt',
                'locale' => 'az',
            ),
            143 => 
            array (
                'id' => 644,
                'option_id' => 275,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            144 => 
            array (
                'id' => 645,
                'option_id' => 275,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            145 => 
            array (
                'id' => 646,
                'option_id' => 276,
                'name' => '3 litr',
                'slug' => '3-litr',
                'locale' => 'az',
            ),
            146 => 
            array (
                'id' => 647,
                'option_id' => 276,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            147 => 
            array (
                'id' => 648,
                'option_id' => 276,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            148 => 
            array (
                'id' => 649,
                'option_id' => 277,
                'name' => '2500Vt',
                'slug' => '2500vt',
                'locale' => 'az',
            ),
            149 => 
            array (
                'id' => 650,
                'option_id' => 277,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            150 => 
            array (
                'id' => 651,
                'option_id' => 277,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            151 => 
            array (
                'id' => 652,
                'option_id' => 278,
                'name' => '0-2litr',
                'slug' => '0-2litr',
                'locale' => 'az',
            ),
            152 => 
            array (
                'id' => 653,
                'option_id' => 278,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            153 => 
            array (
                'id' => 654,
                'option_id' => 278,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            154 => 
            array (
                'id' => 655,
                'option_id' => 279,
                'name' => '2-3litr',
                'slug' => '2-3litr',
                'locale' => 'az',
            ),
            155 => 
            array (
                'id' => 656,
                'option_id' => 279,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            156 => 
            array (
                'id' => 657,
                'option_id' => 279,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            157 => 
            array (
                'id' => 658,
                'option_id' => 280,
                'name' => '2200Vt',
                'slug' => '2200vt',
                'locale' => 'az',
            ),
            158 => 
            array (
                'id' => 659,
                'option_id' => 280,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            159 => 
            array (
                'id' => 660,
                'option_id' => 280,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            160 => 
            array (
                'id' => 661,
                'option_id' => 281,
                'name' => '700Vt',
                'slug' => '700vt',
                'locale' => 'az',
            ),
            161 => 
            array (
                'id' => 662,
                'option_id' => 281,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            162 => 
            array (
                'id' => 663,
                'option_id' => 281,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            163 => 
            array (
                'id' => 664,
                'option_id' => 282,
                'name' => '1900Vt',
                'slug' => '1900vt',
                'locale' => 'az',
            ),
            164 => 
            array (
                'id' => 665,
                'option_id' => 282,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            165 => 
            array (
                'id' => 666,
                'option_id' => 282,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            166 => 
            array (
                'id' => 667,
                'option_id' => 283,
                'name' => '750Vt',
                'slug' => '750vt',
                'locale' => 'az',
            ),
            167 => 
            array (
                'id' => 668,
                'option_id' => 283,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            168 => 
            array (
                'id' => 669,
                'option_id' => 283,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
        ));
        
        
    }
}