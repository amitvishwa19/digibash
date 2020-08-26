<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title'  => $faker->sentences(1, true),
        'description' => $faker->sentences(3, true),
        'author' => $faker->name,
        'feature_image' => $faker->imageUrl($width = 150, $height = 150, 'cats'),
        'book_code' => 'bk'.$faker->unique()->randomNumber(7, false),
        'quantity' => $faker->randomElement([5,8,19,13,34]),
        'rack' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
        'row' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
        'type' => $faker->randomElement(['Academic','Magazine','Story','Other']),
        'price' => $faker->randomNumber
    ];
});
