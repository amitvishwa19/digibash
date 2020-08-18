<?php

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
        Section::create([
        	'name' => '12-A Science',
        	'description' => $faker->text,
        	'status' => 1
        ]);
        Section::create([
        	'name' => '12-B Commerce',
        	'description' => $faker->text,
        	'status' => 1
        ]);
        Section::create([
        	'name' => '12-C Arts',
        	'description' => $faker->text,
        	'status' => 1
        ]);
        Section::create([
        	'name' => '12-A Science',
        	'description' => $faker->text,
        	'status' => 1
        ]);
        Section::create([
        	'name' => 'B.Sc Physics',
        	'description' => $faker->text,
        	'status' => 1
        ]);
        Section::create([
        	'name' => 'B.Com',
        	'description' => $faker->text,
        	'status' => 1
        ]);
        Section::create([
        	'name' => 'B.Sc Chemistry	',
        	'description' => $faker->text,
        	'status' => 1
        ]);
    }
}
