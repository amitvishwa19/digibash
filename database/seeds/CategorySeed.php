<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        
        Category::create(['name' => 'Default','slug' => 'default']);
        Category::create(['parent_id'=>1,'name' => 'Uncategorized','slug' => 'uncategorized.']);
        Category::create(['name' => 'Posts','slug' => 'posts']);
        Category::create(['name' => 'Blog','slug' => 'blog']);

    }
}
