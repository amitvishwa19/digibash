<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->sentence(4);
    $slug = str_slug($name, '-');
    $filepath = storage_path('products');

    if(!File::exists($filepath)){
        File::makeDirectory($filepath);
    }


    $product = return [
        'shop_id'=> $faker->numberBetween(1,4),
        'name'=> $name,
        'slug'=>$slug,
        'description'=> $faker->sentence(10),
        'sku'=> $faker->numberBetween(1,9),
        'stock'=> $faker->numberBetween(5,10),
        'price'=> $faker->numberBetween(10,5000),
        'status'=> $faker->randomElement(['draft', 'active','unavailable'])
    ];

    $product->categories()->sync(1);
});
