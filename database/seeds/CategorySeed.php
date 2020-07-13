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
        Category::create(['name' => 'Uncategorized','slug' => 'uncategorized']);
        $post = Category::create(['name' => 'Post','slug' => 'post']);
        Category::create(['parent_id' => $post->id,'name' => 'Uncategorized','slug' => 'uncategorized']);
        Category::create(['name' => 'E-Commerce','slug' => 'e-commerce']);
    }
}
