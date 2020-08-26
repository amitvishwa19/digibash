<?php

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i <= 19; $i++){
            $day = $faker->randomDigit;
            Book::create([
                'title'  => $title = $faker->sentences(1, true),
                'description' => $faker->sentences(3, true),
                'author' => $author = $faker->name,
                'feature_image' => $faker->imageUrl($width = 150, $height = 150, 'cats'),
                'quantity' => $faker->randomElement([1,2,3,4,5,6,7,8,9]),
                'rack' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
                'row' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
                'type' => $type = $faker->randomElement(['Academic','Magazine','Story','Other']),
                'price' => $faker->randomNumber,
                'status' => $faker->randomElement([0,1]),
                'book_code' => strtoupper(mb_substr($type, 0, 2)) .strtoupper(mb_substr($author, 0, 2)) .strtoupper(mb_substr($title , 0, 2)) . mt_rand(10000,99999)
            ]);


        }
    }
}
