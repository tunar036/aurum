<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_translations')->delete();
        
        \DB::table('menu_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'locale' => 'az',
                'name' => 'HOME',
                'slug' => 'homeeed',
                'title' => 'HOME',
                'keywords' => 'HOME',
                'description' => 'HOME',
                'text' => '<p>HOME<br></p>',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'menu_id' => 1,
                'locale' => 'ru',
                'name' => 'HOME',
                'slug' => 'jdjddd',
                'title' => 'HOME',
                'keywords' => 'HOME',
                'description' => 'HOME',
                'text' => '<p>HOME<br></p>',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'menu_id' => 2,
                'locale' => 'az',
                'name' => 'MENU',
                'slug' => 'menu',
                'title' => 'MENU',
                'keywords' => 'MENU',
                'description' => 'MENU',
                'text' => '<p>MENU<br></p>',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'menu_id' => 2,
                'locale' => 'ru',
                'name' => 'MENU',
                'slug' => 'menubu',
                'title' => 'MENU',
                'keywords' => 'MENU',
                'description' => 'MENU',
                'text' => '<p>MENU<br></p>',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 8,
                'menu_id' => 3,
                'locale' => 'az',
                'name' => 'ABOUT',
                'slug' => 'about',
                'title' => 'ABOUT',
                'keywords' => 'ABOUT',
                'description' => 'ABOUT',
            'text' => '<p><span style="color: rgba(0, 0, 0, 0.8); font-family: "Source Sans Pro", sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit torquent suscipit, pretium et curae eleifend tellus sociosqu dictum mattis himenaeos, habitasse dis scelerisque vulputate sagittis integer convallis parturient. Inceptos curae mi mollis vel sem posuere neque arcu enim, netus egestas interdum scelerisque ligula nunc ad massa fusce nisl, malesuada sed quam odio aptent lectus pulvinar ac. Euismod curae est quam mattis cum rhoncus dis, tempus vivamus felis scelerisque feugiat vulputate proin auctor, et non varius nostra id conva</span><br></p>',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 10,
                'menu_id' => 4,
                'locale' => 'az',
                'name' => 'CONTACT',
                'slug' => 'contact',
                'title' => 'CONTACT',
                'keywords' => 'CONTACT',
                'description' => 'CONTACT',
                'text' => '<p>CONTACT<br></p>',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 11,
                'menu_id' => 4,
                'locale' => 'ru',
                'name' => 'CONTACT',
                'slug' => 'njnnj',
                'title' => 'CONTACT',
                'keywords' => 'CONTACT',
                'description' => 'CONTACT',
                'text' => '<p>CONTACT<br></p>',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}