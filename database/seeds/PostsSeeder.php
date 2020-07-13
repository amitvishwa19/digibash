<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i < 5; $i++){

        	$post = Post::create([
        		'user_id' => '1',
        		'title' => $title = $faker->sentence($nbWords = 6, $variableNbWords = true),
        		'slug' => Str::slug($title, '-'),
        		'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        		'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        		'image_url' => $faker->url,
        		'views' => $faker->randomDigitNotNull, 
        		'status' => 'published',
        		'views' => 0,
        	]);

            
        }

    }
}
