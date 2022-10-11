<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admins index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admins create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'admins edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admins delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'users index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'users create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'users show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'users edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'users delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'roles index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'roles create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'roles show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'roles edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'roles delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'products index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'products create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'products show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'products edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'products delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'categories index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'categories create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'categories show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'categories edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'categories delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'orders index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'orders create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'orders show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'orders edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'orders delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'blogs index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'blogs create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'blogs show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'blogs edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'blogs delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'attribute-groups index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'attribute-groups create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'attribute-groups show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'attribute-groups edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'attribute-groups delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'attributes index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'attributes create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'attributes show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'attributes edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'attributes delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'option-groups index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'option-groups create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'option-groups show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'option-groups edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'option-groups delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'options index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'options create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'options show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'options edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'options delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'brands index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'brands create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'brands show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'brands edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'brands delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'sliders index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'sliders create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'sliders edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'sliders delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'menus index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'menus create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'menus show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:45',
                'updated_at' => '2022-02-07 05:37:45',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'menus edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'menus delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'languages index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'languages create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'languages edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'languages delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'faqs index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'faqs create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'faqs show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'faqs edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'faqs delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'product-statuses index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'product-statuses create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'product-statuses show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'product-statuses edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'product-statuses delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'order-statuses index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'order-statuses create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'order-statuses show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'order-statuses edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'order-statuses delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'settings index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'settings create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'settings show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'settings edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'settings delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'payment-methods index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'payment-methods create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'payment-methods edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'payment-methods delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:37:46',
                'updated_at' => '2022-02-07 05:37:46',
            ),
            96 => 
            array (
                'id' => 107,
                'name' => 'campaigns index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:57:46',
                'updated_at' => '2022-02-07 05:57:46',
            ),
            97 => 
            array (
                'id' => 108,
                'name' => 'campaigns create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:57:46',
                'updated_at' => '2022-02-07 05:57:46',
            ),
            98 => 
            array (
                'id' => 109,
                'name' => 'campaigns edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:57:46',
                'updated_at' => '2022-02-07 05:57:46',
            ),
            99 => 
            array (
                'id' => 110,
                'name' => 'campaigns show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:57:46',
                'updated_at' => '2022-02-07 05:57:46',
            ),
            100 => 
            array (
                'id' => 111,
                'name' => 'campaigns delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-07 05:57:46',
                'updated_at' => '2022-02-07 05:57:46',
            ),
            101 => 
            array (
                'id' => 112,
                'name' => 'permissions index',
                'guard_name' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 113,
                'name' => 'permissions create',
                'guard_name' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 114,
                'name' => 'permissions edit',
                'guard_name' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 115,
                'name' => 'permissions show',
                'guard_name' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 116,
                'name' => 'permissions delete',
                'guard_name' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 118,
                'name' => 'stores create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 08:48:45',
                'updated_at' => '2022-02-14 08:48:45',
            ),
            107 => 
            array (
                'id' => 119,
                'name' => 'store edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 08:50:10',
                'updated_at' => '2022-02-14 08:50:10',
            ),
            108 => 
            array (
                'id' => 120,
                'name' => 'districts index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 10:47:58',
                'updated_at' => '2022-02-14 10:47:58',
            ),
            109 => 
            array (
                'id' => 121,
                'name' => 'districts create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 10:48:10',
                'updated_at' => '2022-02-14 10:48:10',
            ),
            110 => 
            array (
                'id' => 122,
                'name' => 'districts edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 10:48:20',
                'updated_at' => '2022-02-14 10:48:20',
            ),
            111 => 
            array (
                'id' => 123,
                'name' => 'districts show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 10:48:41',
                'updated_at' => '2022-02-14 10:48:41',
            ),
            112 => 
            array (
                'id' => 124,
                'name' => 'districts delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 10:48:54',
                'updated_at' => '2022-02-14 10:48:54',
            ),
            113 => 
            array (
                'id' => 125,
                'name' => 'stores index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 10:50:20',
                'updated_at' => '2022-02-14 10:50:20',
            ),
            114 => 
            array (
                'id' => 126,
                'name' => 'stores show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-14 10:50:40',
                'updated_at' => '2022-02-14 10:50:40',
            ),
            115 => 
            array (
                'id' => 127,
                'name' => 'pages index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-15 16:28:29',
                'updated_at' => '2022-02-15 16:28:29',
            ),
            116 => 
            array (
                'id' => 128,
                'name' => 'pages create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-15 16:28:39',
                'updated_at' => '2022-02-15 16:28:39',
            ),
            117 => 
            array (
                'id' => 129,
                'name' => 'pages edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-15 16:28:47',
                'updated_at' => '2022-02-15 16:28:47',
            ),
            118 => 
            array (
                'id' => 130,
                'name' => 'pages show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-15 16:28:55',
                'updated_at' => '2022-02-15 16:28:55',
            ),
            119 => 
            array (
                'id' => 131,
                'name' => 'pages delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-15 16:29:05',
                'updated_at' => '2022-02-15 16:29:05',
            ),
            120 => 
            array (
                'id' => 132,
                'name' => 'vacancies index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-16 06:31:47',
                'updated_at' => '2022-02-16 06:31:47',
            ),
            121 => 
            array (
                'id' => 133,
                'name' => 'vacancies create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-16 06:31:59',
                'updated_at' => '2022-02-16 06:31:59',
            ),
            122 => 
            array (
                'id' => 134,
                'name' => 'vacancies edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-16 06:32:10',
                'updated_at' => '2022-02-16 06:32:10',
            ),
            123 => 
            array (
                'id' => 135,
                'name' => 'vacancies show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-16 06:32:20',
                'updated_at' => '2022-02-16 06:32:20',
            ),
            124 => 
            array (
                'id' => 136,
                'name' => 'vacancies delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-16 06:32:35',
                'updated_at' => '2022-02-16 06:32:35',
            ),
            125 => 
            array (
                'id' => 137,
                'name' => 'credits index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-22 06:09:30',
                'updated_at' => '2022-02-22 06:09:30',
            ),
            126 => 
            array (
                'id' => 138,
                'name' => 'credits create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-22 06:10:05',
                'updated_at' => '2022-02-22 06:10:05',
            ),
            127 => 
            array (
                'id' => 139,
                'name' => 'credits edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-22 06:10:37',
                'updated_at' => '2022-02-22 06:10:37',
            ),
            128 => 
            array (
                'id' => 140,
                'name' => 'credits show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-22 06:10:49',
                'updated_at' => '2022-02-22 06:10:49',
            ),
            129 => 
            array (
                'id' => 141,
                'name' => 'credits delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-22 06:10:58',
                'updated_at' => '2022-02-22 06:10:58',
            ),
            130 => 
            array (
                'id' => 142,
                'name' => 'campaign_details index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:15:24',
                'updated_at' => '2022-02-23 23:15:24',
            ),
            131 => 
            array (
                'id' => 143,
                'name' => 'campaign_details create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:15:33',
                'updated_at' => '2022-02-23 23:15:33',
            ),
            132 => 
            array (
                'id' => 144,
                'name' => 'campaign_details edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:15:43',
                'updated_at' => '2022-02-23 23:15:43',
            ),
            133 => 
            array (
                'id' => 145,
                'name' => 'campaign_details show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:15:51',
                'updated_at' => '2022-02-23 23:15:51',
            ),
            134 => 
            array (
                'id' => 146,
                'name' => 'campaign_details delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:15:59',
                'updated_at' => '2022-02-23 23:15:59',
            ),
            135 => 
            array (
                'id' => 147,
                'name' => 'campaign_types index',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:17:18',
                'updated_at' => '2022-02-23 23:17:18',
            ),
            136 => 
            array (
                'id' => 148,
                'name' => 'campaign_types create',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:17:29',
                'updated_at' => '2022-02-23 23:17:29',
            ),
            137 => 
            array (
                'id' => 149,
                'name' => 'campaign_types edit',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:17:38',
                'updated_at' => '2022-02-23 23:17:38',
            ),
            138 => 
            array (
                'id' => 150,
                'name' => 'campaign_types show',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:17:48',
                'updated_at' => '2022-02-23 23:17:48',
            ),
            139 => 
            array (
                'id' => 151,
                'name' => 'campaign_types delete',
                'guard_name' => 'admin',
                'created_at' => '2022-02-23 23:17:56',
                'updated_at' => '2022-02-23 23:17:56',
            ),
            140 => 
            array (
                'id' => 152,
                'name' => 'product-badges index',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:38:55',
                'updated_at' => '2022-03-30 19:38:55',
            ),
            141 => 
            array (
                'id' => 153,
                'name' => 'product-badges create',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:39:04',
                'updated_at' => '2022-03-30 19:39:04',
            ),
            142 => 
            array (
                'id' => 154,
                'name' => 'product-badges edit',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:39:12',
                'updated_at' => '2022-03-30 19:39:12',
            ),
            143 => 
            array (
                'id' => 155,
                'name' => 'product-badges show',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:39:22',
                'updated_at' => '2022-03-30 19:39:22',
            ),
            144 => 
            array (
                'id' => 156,
                'name' => 'product-badges delete',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:39:30',
                'updated_at' => '2022-03-30 19:39:30',
            ),
            145 => 
            array (
                'id' => 157,
                'name' => 'product-days index',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:40:11',
                'updated_at' => '2022-03-30 19:40:11',
            ),
            146 => 
            array (
                'id' => 158,
                'name' => 'product-days create',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:40:19',
                'updated_at' => '2022-03-30 19:40:19',
            ),
            147 => 
            array (
                'id' => 159,
                'name' => 'product-days edit',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:40:32',
                'updated_at' => '2022-03-30 19:40:32',
            ),
            148 => 
            array (
                'id' => 160,
                'name' => 'product-days show',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:40:39',
                'updated_at' => '2022-03-30 19:40:39',
            ),
            149 => 
            array (
                'id' => 161,
                'name' => 'product-days delete',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:40:48',
                'updated_at' => '2022-03-30 19:40:48',
            ),
            150 => 
            array (
                'id' => 162,
                'name' => 'home-compare index',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:41:19',
                'updated_at' => '2022-03-30 19:41:19',
            ),
            151 => 
            array (
                'id' => 163,
                'name' => 'home-compare create',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:41:27',
                'updated_at' => '2022-03-30 19:41:27',
            ),
            152 => 
            array (
                'id' => 164,
                'name' => 'home-compare edit',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:41:36',
                'updated_at' => '2022-03-30 19:41:36',
            ),
            153 => 
            array (
                'id' => 165,
                'name' => 'home-compare show',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:41:46',
                'updated_at' => '2022-03-30 19:41:46',
            ),
            154 => 
            array (
                'id' => 166,
                'name' => 'home-compare delete',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:41:54',
                'updated_at' => '2022-03-30 19:41:54',
            ),
            155 => 
            array (
                'id' => 167,
                'name' => 'vlogs index',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:43:43',
                'updated_at' => '2022-03-30 19:43:43',
            ),
            156 => 
            array (
                'id' => 168,
                'name' => 'vlogs create',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:43:51',
                'updated_at' => '2022-03-30 19:43:51',
            ),
            157 => 
            array (
                'id' => 169,
                'name' => 'vlogs edit',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:43:58',
                'updated_at' => '2022-03-30 19:43:58',
            ),
            158 => 
            array (
                'id' => 170,
                'name' => 'vlogs show',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:44:04',
                'updated_at' => '2022-03-30 19:44:04',
            ),
            159 => 
            array (
                'id' => 171,
                'name' => 'vlogs delete',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:44:11',
                'updated_at' => '2022-03-30 19:44:11',
            ),
            160 => 
            array (
                'id' => 172,
                'name' => 'delivery-methods index',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:45:22',
                'updated_at' => '2022-03-30 19:45:22',
            ),
            161 => 
            array (
                'id' => 173,
                'name' => 'delivery-methods create',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:45:31',
                'updated_at' => '2022-03-30 19:45:31',
            ),
            162 => 
            array (
                'id' => 174,
                'name' => 'delivery-methods edit',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:45:39',
                'updated_at' => '2022-03-30 19:45:39',
            ),
            163 => 
            array (
                'id' => 175,
                'name' => 'delivery-methods show',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:45:47',
                'updated_at' => '2022-03-30 19:45:47',
            ),
            164 => 
            array (
                'id' => 176,
                'name' => 'delivery-methods delete',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:45:53',
                'updated_at' => '2022-03-30 19:45:53',
            ),
            165 => 
            array (
                'id' => 177,
                'name' => 'subscribers index',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:51:30',
                'updated_at' => '2022-03-30 19:51:30',
            ),
            166 => 
            array (
                'id' => 178,
                'name' => 'subscribers create',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:51:42',
                'updated_at' => '2022-03-30 19:51:42',
            ),
            167 => 
            array (
                'id' => 179,
                'name' => 'subscribers edit',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:51:49',
                'updated_at' => '2022-03-30 19:51:49',
            ),
            168 => 
            array (
                'id' => 180,
                'name' => 'subscribers show',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:51:59',
                'updated_at' => '2022-03-30 19:51:59',
            ),
            169 => 
            array (
                'id' => 181,
                'name' => 'subscribers delete',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:52:06',
                'updated_at' => '2022-03-30 19:52:06',
            ),
            170 => 
            array (
                'id' => 182,
                'name' => 'logs index',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:53:43',
                'updated_at' => '2022-03-30 19:53:43',
            ),
            171 => 
            array (
                'id' => 183,
                'name' => 'logs create',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:53:56',
                'updated_at' => '2022-03-30 19:53:56',
            ),
            172 => 
            array (
                'id' => 184,
                'name' => 'logs edit',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:54:03',
                'updated_at' => '2022-03-30 19:54:03',
            ),
            173 => 
            array (
                'id' => 185,
                'name' => 'logs show',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:54:12',
                'updated_at' => '2022-03-30 19:54:12',
            ),
            174 => 
            array (
                'id' => 186,
                'name' => 'logs delete',
                'guard_name' => 'admin',
                'created_at' => '2022-03-30 19:54:19',
                'updated_at' => '2022-03-30 19:54:19',
            ),
        ));
        
        
    }
}