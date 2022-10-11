<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(
        [
            RoleSeeder::class,
            PermissionsTableSeeder::class,
            RoleHasPermissionsTableSeeder::class,
            AdminSeeder::class,
            SettingSeeder::class,
        ]);
//
        $this->call(LanguageTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);



        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryTranslationsTableSeeder::class);
        // $this->call(MediaTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuTranslationsTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(ProductTranslationsTableSeeder::class);
    }
}
