<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(2),
        'user_id'=>numberBetween(1,2),
        'description'=> $faker->sentence(10),
    ];
});

