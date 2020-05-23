<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            
            [
            	'name' => 'Header Menu',
            	'slug' => 'header-menu',
           		'description' => 'This is header menu'
            ],
            [
            	'name' => 'Footer Menu',
            	'slug' => 'footer-menu',
           		'description' => 'This is footer menu'
            ],
            [
            	'name' => 'Category Menu',
            	'slug' => 'category-menu',
           		'description' => 'This is category menu'
            ]
        ]);
    }
}
