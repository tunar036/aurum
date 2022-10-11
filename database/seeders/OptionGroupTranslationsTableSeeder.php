<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionGroupTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('option_group_translations')->delete();
        
        \DB::table('option_group_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'option_group_id' => 9,
                'name' => 'OS',
                'slug' => 'os',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'option_group_id' => 9,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            2 => 
            array (
                'id' => 3,
                'option_group_id' => 9,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            3 => 
            array (
                'id' => 4,
                'option_group_id' => 11,
                'name' => 'Ekran ölçüsü',
                'slug' => 'ekran-olcusu',
                'locale' => 'az',
            ),
            4 => 
            array (
                'id' => 5,
                'option_group_id' => 11,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            5 => 
            array (
                'id' => 6,
                'option_group_id' => 11,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            6 => 
            array (
                'id' => 7,
                'option_group_id' => 12,
                'name' => 'Operativ yaddaş',
                'slug' => 'operativ-yaddas',
                'locale' => 'az',
            ),
            7 => 
            array (
                'id' => 8,
                'option_group_id' => 12,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            8 => 
            array (
                'id' => 9,
                'option_group_id' => 12,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            9 => 
            array (
                'id' => 10,
                'option_group_id' => 13,
                'name' => 'Daxili yaddaş',
                'slug' => 'daxili-yaddas',
                'locale' => 'az',
            ),
            10 => 
            array (
                'id' => 11,
                'option_group_id' => 13,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            11 => 
            array (
                'id' => 12,
                'option_group_id' => 13,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            12 => 
            array (
                'id' => 13,
                'option_group_id' => 14,
                'name' => 'Batareya',
                'slug' => 'batareya',
                'locale' => 'az',
            ),
            13 => 
            array (
                'id' => 14,
                'option_group_id' => 14,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            14 => 
            array (
                'id' => 15,
                'option_group_id' => 14,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            15 => 
            array (
                'id' => 16,
                'option_group_id' => 15,
                'name' => 'Sim Kart sayı',
                'slug' => 'sim-kart-sayi',
                'locale' => 'az',
            ),
            16 => 
            array (
                'id' => 17,
                'option_group_id' => 15,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            17 => 
            array (
                'id' => 18,
                'option_group_id' => 15,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            18 => 
            array (
                'id' => 19,
                'option_group_id' => 17,
                'name' => 'Ekran diaqonalı',
                'slug' => 'ekran-diaqonali',
                'locale' => 'az',
            ),
            19 => 
            array (
                'id' => 20,
                'option_group_id' => 17,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            20 => 
            array (
                'id' => 21,
                'option_group_id' => 17,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            21 => 
            array (
                'id' => 22,
                'option_group_id' => 18,
                'name' => 'Ekran növü',
                'slug' => 'ekran-novu',
                'locale' => 'az',
            ),
            22 => 
            array (
                'id' => 23,
                'option_group_id' => 18,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            23 => 
            array (
                'id' => 24,
                'option_group_id' => 18,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            24 => 
            array (
                'id' => 25,
                'option_group_id' => 19,
                'name' => 'Görüntü keyfiyyəti',
                'slug' => 'goruntu-keyfiyyeti',
                'locale' => 'az',
            ),
            25 => 
            array (
                'id' => 26,
                'option_group_id' => 19,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            26 => 
            array (
                'id' => 27,
                'option_group_id' => 19,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            27 => 
            array (
                'id' => 28,
                'option_group_id' => 20,
                'name' => 'Smart TV',
                'slug' => 'smart-tv',
                'locale' => 'az',
            ),
            28 => 
            array (
                'id' => 29,
                'option_group_id' => 20,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            29 => 
            array (
                'id' => 30,
                'option_group_id' => 20,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            30 => 
            array (
                'id' => 31,
                'option_group_id' => 21,
                'name' => 'Əməliyyat sistemi',
                'slug' => 'emeliyyat-sistemi',
                'locale' => 'az',
            ),
            31 => 
            array (
                'id' => 32,
                'option_group_id' => 21,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            32 => 
            array (
                'id' => 33,
                'option_group_id' => 21,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            33 => 
            array (
                'id' => 34,
                'option_group_id' => 22,
                'name' => 'İstifadə məqsədi',
                'slug' => 'istifade-meqsedi',
                'locale' => 'az',
            ),
            34 => 
            array (
                'id' => 35,
                'option_group_id' => 22,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            35 => 
            array (
                'id' => 36,
                'option_group_id' => 22,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            36 => 
            array (
                'id' => 37,
                'option_group_id' => 23,
                'name' => 'Ekran diaqonalı',
                'slug' => 'ekran-diaqonali-1',
                'locale' => 'az',
            ),
            37 => 
            array (
                'id' => 38,
                'option_group_id' => 23,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            38 => 
            array (
                'id' => 39,
                'option_group_id' => 23,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            39 => 
            array (
                'id' => 40,
                'option_group_id' => 24,
                'name' => 'Prosessor',
                'slug' => 'prosessor',
                'locale' => 'az',
            ),
            40 => 
            array (
                'id' => 41,
                'option_group_id' => 24,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            41 => 
            array (
                'id' => 42,
                'option_group_id' => 24,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            42 => 
            array (
                'id' => 43,
                'option_group_id' => 25,
                'name' => 'Video kart',
                'slug' => 'video-kart',
                'locale' => 'az',
            ),
            43 => 
            array (
                'id' => 44,
                'option_group_id' => 25,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            44 => 
            array (
                'id' => 45,
                'option_group_id' => 25,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            45 => 
            array (
                'id' => 46,
                'option_group_id' => 26,
                'name' => 'Kondisioner növü',
                'slug' => 'kondisioner-novu',
                'locale' => 'az',
            ),
            46 => 
            array (
                'id' => 47,
                'option_group_id' => 26,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            47 => 
            array (
                'id' => 48,
                'option_group_id' => 26,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            48 => 
            array (
                'id' => 49,
                'option_group_id' => 27,
                'name' => 'Inverter',
                'slug' => 'inverter',
                'locale' => 'az',
            ),
            49 => 
            array (
                'id' => 50,
                'option_group_id' => 27,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            50 => 
            array (
                'id' => 51,
                'option_group_id' => 27,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            51 => 
            array (
                'id' => 52,
                'option_group_id' => 29,
                'name' => 'Wi-Fi ilə idarə',
                'slug' => 'wi-fi-ile-idare',
                'locale' => 'az',
            ),
            52 => 
            array (
                'id' => 53,
                'option_group_id' => 29,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            53 => 
            array (
                'id' => 54,
                'option_group_id' => 29,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            54 => 
            array (
                'id' => 55,
                'option_group_id' => 30,
                'name' => 'Təsir sahəsi',
                'slug' => 'tesir-sahesi',
                'locale' => 'az',
            ),
            55 => 
            array (
                'id' => 56,
                'option_group_id' => 30,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            56 => 
            array (
                'id' => 57,
                'option_group_id' => 30,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            57 => 
            array (
                'id' => 58,
                'option_group_id' => 31,
                'name' => 'Soyutma sistemi',
                'slug' => 'soyutma-sistemi',
                'locale' => 'az',
            ),
            58 => 
            array (
                'id' => 59,
                'option_group_id' => 31,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            59 => 
            array (
                'id' => 60,
                'option_group_id' => 31,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            60 => 
            array (
                'id' => 61,
                'option_group_id' => 32,
                'name' => 'Dondurucu',
                'slug' => 'dondurucu',
                'locale' => 'az',
            ),
            61 => 
            array (
                'id' => 62,
                'option_group_id' => 32,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            62 => 
            array (
                'id' => 63,
                'option_group_id' => 32,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            63 => 
            array (
                'id' => 64,
                'option_group_id' => 33,
                'name' => 'Toplam Həcm',
                'slug' => 'toplam-hecm',
                'locale' => 'az',
            ),
            64 => 
            array (
                'id' => 65,
                'option_group_id' => 33,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            65 => 
            array (
                'id' => 66,
                'option_group_id' => 33,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            66 => 
            array (
                'id' => 67,
                'option_group_id' => 34,
                'name' => 'Soyuducu həcmi',
                'slug' => 'soyuducu-hecmi',
                'locale' => 'az',
            ),
            67 => 
            array (
                'id' => 68,
                'option_group_id' => 34,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            68 => 
            array (
                'id' => 69,
                'option_group_id' => 34,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            69 => 
            array (
                'id' => 70,
                'option_group_id' => 35,
                'name' => 'Dondurucu həcmi',
                'slug' => 'dondurucu-hecmi',
                'locale' => 'az',
            ),
            70 => 
            array (
                'id' => 71,
                'option_group_id' => 35,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            71 => 
            array (
                'id' => 72,
                'option_group_id' => 35,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            72 => 
            array (
                'id' => 73,
                'option_group_id' => 36,
                'name' => 'Soyuducu növü',
                'slug' => 'soyuducu-novu',
                'locale' => 'az',
            ),
            73 => 
            array (
                'id' => 74,
                'option_group_id' => 36,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            74 => 
            array (
                'id' => 75,
                'option_group_id' => 36,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            75 => 
            array (
                'id' => 76,
                'option_group_id' => 37,
                'name' => 'Quraşdırıla bilən',
                'slug' => 'qurasdirila-bilen',
                'locale' => 'az',
            ),
            76 => 
            array (
                'id' => 77,
                'option_group_id' => 37,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            77 => 
            array (
                'id' => 78,
                'option_group_id' => 37,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            78 => 
            array (
                'id' => 79,
                'option_group_id' => 38,
                'name' => 'Maksimum yükləmə',
                'slug' => 'maksimum-yukleme',
                'locale' => 'az',
            ),
            79 => 
            array (
                'id' => 80,
                'option_group_id' => 38,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            80 => 
            array (
                'id' => 81,
                'option_group_id' => 38,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            81 => 
            array (
                'id' => 82,
                'option_group_id' => 39,
            'name' => 'Sıxma sürəti(dövr/dəq)',
                'slug' => 'sixma-suretidovrdeq',
                'locale' => 'az',
            ),
            82 => 
            array (
                'id' => 83,
                'option_group_id' => 39,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            83 => 
            array (
                'id' => 84,
                'option_group_id' => 39,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            84 => 
            array (
                'id' => 85,
                'option_group_id' => 40,
                'name' => 'Qurutma',
                'slug' => 'qurutma',
                'locale' => 'az',
            ),
            85 => 
            array (
                'id' => 86,
                'option_group_id' => 40,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            86 => 
            array (
                'id' => 87,
                'option_group_id' => 40,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            87 => 
            array (
                'id' => 88,
                'option_group_id' => 41,
                'name' => 'Quraşdırıla bilən',
                'slug' => 'qurasdirila-bilen-1',
                'locale' => 'az',
            ),
            88 => 
            array (
                'id' => 89,
                'option_group_id' => 41,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            89 => 
            array (
                'id' => 90,
                'option_group_id' => 41,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            90 => 
            array (
                'id' => 91,
                'option_group_id' => 42,
                'name' => 'İdarə etmə növü',
                'slug' => 'idare-etme-novu',
                'locale' => 'az',
            ),
            91 => 
            array (
                'id' => 92,
                'option_group_id' => 42,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            92 => 
            array (
                'id' => 93,
                'option_group_id' => 42,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            93 => 
            array (
                'id' => 94,
                'option_group_id' => 43,
                'name' => 'Su sərfiyyatı',
                'slug' => 'su-serfiyyati',
                'locale' => 'az',
            ),
            94 => 
            array (
                'id' => 95,
                'option_group_id' => 43,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            95 => 
            array (
                'id' => 96,
                'option_group_id' => 43,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            96 => 
            array (
                'id' => 97,
                'option_group_id' => 44,
            'name' => 'Tutum (komplekt)',
                'slug' => 'tutum-komplekt',
                'locale' => 'az',
            ),
            97 => 
            array (
                'id' => 98,
                'option_group_id' => 44,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            98 => 
            array (
                'id' => 99,
                'option_group_id' => 44,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            99 => 
            array (
                'id' => 100,
                'option_group_id' => 45,
                'name' => 'İdarə etmə növü',
                'slug' => 'idare-etme-novu-1',
                'locale' => 'az',
            ),
            100 => 
            array (
                'id' => 101,
                'option_group_id' => 45,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            101 => 
            array (
                'id' => 102,
                'option_group_id' => 45,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            102 => 
            array (
                'id' => 103,
                'option_group_id' => 46,
                'name' => 'Quraşdırıla bilən',
                'slug' => 'qurasdirila-bilen-2',
                'locale' => 'az',
            ),
            103 => 
            array (
                'id' => 104,
                'option_group_id' => 46,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            104 => 
            array (
                'id' => 105,
                'option_group_id' => 46,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            105 => 
            array (
                'id' => 106,
                'option_group_id' => 47,
                'name' => 'Operativ yaddaş',
                'slug' => 'operativ-yaddas-1',
                'locale' => 'az',
            ),
            106 => 
            array (
                'id' => 107,
                'option_group_id' => 47,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            107 => 
            array (
                'id' => 108,
                'option_group_id' => 47,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            108 => 
            array (
                'id' => 109,
                'option_group_id' => 48,
                'name' => 'Daxili yaddaş',
                'slug' => 'daxili-yaddas-1',
                'locale' => 'az',
            ),
            109 => 
            array (
                'id' => 110,
                'option_group_id' => 48,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            110 => 
            array (
                'id' => 111,
                'option_group_id' => 48,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            111 => 
            array (
                'id' => 112,
                'option_group_id' => 49,
                'name' => 'Gücü',
                'slug' => 'gucu',
                'locale' => 'az',
            ),
            112 => 
            array (
                'id' => 113,
                'option_group_id' => 49,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            113 => 
            array (
                'id' => 114,
                'option_group_id' => 49,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            114 => 
            array (
                'id' => 115,
                'option_group_id' => 50,
                'name' => 'Sorma gücü',
                'slug' => 'sorma-gucu',
                'locale' => 'az',
            ),
            115 => 
            array (
                'id' => 116,
                'option_group_id' => 50,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            116 => 
            array (
                'id' => 117,
                'option_group_id' => 50,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
            117 => 
            array (
                'id' => 118,
                'option_group_id' => 51,
                'name' => 'Toz qabın həcmi',
                'slug' => 'toz-qabin-hecmi',
                'locale' => 'az',
            ),
            118 => 
            array (
                'id' => 119,
                'option_group_id' => 51,
                'name' => '',
                'slug' => NULL,
                'locale' => 'en',
            ),
            119 => 
            array (
                'id' => 120,
                'option_group_id' => 51,
                'name' => '',
                'slug' => NULL,
                'locale' => 'ru',
            ),
        ));
        
        
    }
}