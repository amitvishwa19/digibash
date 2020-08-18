<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
        Course::create([
        	'name' => 'English',
        	'description' => $faker->text,
        	'status' => 1
        ]);

        Course::create([
        	'name' => 'Maths',
        	'description' => $faker->text,
        	'status' => 1
        ]);

        Course::create([
        	'name' => 'Physics',
        	'description' => $faker->text,
        	'status' => 1
        ]);

        Course::create([
        	'name' => 'Chemistry',
        	'description' => $faker->text,
        	'status' => 1
        ]);

        Course::create([
        	'name' => 'Biology',
        	'description' => $faker->text,
        	'status' => 1
        ]);

        Course::create([
        	'name' => 'Social Studies',
        	'description' => $faker->text,
        	'status' => 1
        ]);

        Course::create([
        	'name' => 'Hindi',
        	'description' => $faker->text,
        	'status' => 1
        ]);
    }
}
