<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_translations')->delete();
        
        \DB::table('product_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'locale' => 'az',
                'title' => 'ddssaa',
                'description' => 'jksjlknl',
                'keywords' => 'Culpa recusandae. Qu.',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: "Source Sans Pro", sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique. </span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'locale' => 'ru',
                'title' => 'test',
                'description' => 'test',
                'keywords' => 'Odio ut veniam, ut e.',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: "Source Sans Pro", sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitassde tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique. </span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 2,
                'locale' => 'az',
                'title' => 'snklskl',
                'description' => 'mkdmd,',
                'keywords' => 'Accusamus eaque corr.',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique. mdkwlmdk</span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 2,
                'locale' => 'ru',
                'title' => 'dmkmd;',
                'description' => 'mkdm',
                'keywords' => 'Sunt et aut numquam ., mkm',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quisndnd dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique.&nbsp;</span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'product_id' => 3,
                'locale' => 'az',
                'title' => 'bhd',
                'description' => 'hbhb',
                'keywords' => 'Aspernatur proident.',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique.&nbsp;</span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'product_id' => 3,
                'locale' => 'ru',
                'title' => 'dhdhh',
                'description' => 'hdhhd',
                'keywords' => 'Quis non maiores exc.',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique.&nbsp;</span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'product_id' => 4,
                'locale' => 'az',
                'title' => 'hdhdhhd',
                'description' => 'dhhihl',
                'keywords' => 'Iusto in explicabo. ., d',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique.&nbsp;</span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'product_id' => 4,
                'locale' => 'ru',
                'title' => 'dhhh',
                'description' => 'dhhdhd',
                'keywords' => 'Velit voluptatibus p., hhdh',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique.&nbsp;</span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'product_id' => 5,
                'locale' => 'az',
                'title' => 'dhhh',
                'description' => 'hjhkjk',
                'keywords' => 'Elit, animi, et faci.',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: "Source Sans Pro", sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique. </span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'product_id' => 5,
                'locale' => 'ru',
                'title' => 'cmcmcm',
                'description' => 'mlclmlc',
                'keywords' => 'Non aspernatur paria.',
            'text' => '<span style="color: rgba(0, 0, 0, 0.8); font-family: "Source Sans Pro", sans-serif; font-size: 16.2px; letter-spacing: -0.0486px; text-align: justify;">Lorem ipsum dolor sit amet consectetur adipiscing elit orci, habitasse elementum viverra quis dictum vehicula neque id sociis, phasellus hendrerit erat molestie condimentum ullamcorper dis. Aliquam ultrices malesuada eu himenaeos blandit porttitor donec sollicitudin justo pharetra habitant, phasellus habitasse tempus libero sed duis mus volutpat fames pellentesque, cras ultricies a nunc scelerisque ante ornare natoque tincidunt porta. Class feugiat dapibus hendrerit iaculis suscipit magnis etiam aliquet, egestas rhoncus faucibus quis ullamcorper laoreet ligula nec, eros varius tempor vehicula parturient platea tristique. </span>',
                'image_alt' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}