<?php

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=1; $i <= 20; $i++){
            Lesson::create([
                'title' => $title = $faker->sentences(1, true),
                'slug' => Str::slug($title, '-'),
                'description' => $faker->sentences(3, true),
                'content' => $faker->sentences(20, true),
                'feature_image' => $faker->imageUrl($width = 150, $height = 150, 'cats'),
                'author' => $author = $faker->name,
                'status' => $faker->randomElement([0,1]),
            ]);
        }
    }
}
