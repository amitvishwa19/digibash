<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // for($i=0; $i < 5; $i++){

        // 	$name = $faker->sentence(4);
        //     $slug = str_slug($name, '-');

        // 	$product = Product::create([
        // 		'shop_id'=> $faker->numberBetween(1,4),
        // 		'name'=> $name,
		//         'slug'=>$slug,
		//         'description'=> $faker->sentence(10),
		//         'sku'=> $faker->numberBetween(1,9),
		//         'stock'=> $faker->numberBetween(5,10),
		//         'price'=> $faker->numberBetween(10,5000),
		//         'status'=> $faker->randomElement(['draft', 'active','unavailable'])
        // 	]);

        // 	$product->categories()->sync(1);
        // }

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'MacBook Pro',
            'slug' => str_slug('MacBook Pro', '-'),
            'description' => '15 inch, 1TB HDD, 32GB RAM',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Dell Vostro 3557',
            'slug' => str_slug('Dell Vostro 3557', '-'),
            'description' => '15 inch, 1TB HDD, 8GB RAM',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'iPhone 11 Pro',
            'slug' => str_slug('iPhone 11 Pro', '-'),
            'description' => '6.1 inch, 64GB 4GB RAM',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Remax 610D Headset',
            'slug' => str_slug('Remax 610D Headset', '-'),
            'description' => '6.1 inch, 64GB 4GB RAM',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Samsung LED TV',
            'slug' => str_slug('Samsung LED TV', '-'),
            'description' => '24 inch, LED Display, Resolution 1366 x 768',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Samsung Digital Camera',
            'slug' => str_slug('Samsung Digital Camera', '-'),
            'description' => '16.1MP, 5x Optical Zoom',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Huawei GR 5 2017',
            'slug' => str_slug('Huawei GR 5 2017', '-'),
            'description' => '5.5 inch, 32GB 4GB RAMs',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Samsung Galaxy S9',
            'slug' => str_slug('Samsung Galaxy S9', '-'),
            'description' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Apple iPhone X',
            'slug' => str_slug('Apple iPhone X', '-'),
            'description' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Google Pixel 2 XL',
            'slug' => str_slug('Google Pixel 2 XL', '-'),
            'description' => 'New condition• No returns, but backed by eBay Money back guarantee',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);

        $product = Product::create([
            'shop_id'=> $faker->numberBetween(1,4),
            'name' => 'Huawei Elate',
            'slug' => str_slug('Huawei Elate', '-'),
            'description' => 'Cricket Wireless - Huawei Elate. New Sealed Huawei Elate Smartphone.',
            'sku'=> $faker->numberBetween(1,9),
		    'stock'=> $faker->numberBetween(5,10),
            'price' => $faker->numberBetween(10,5000),
            'status'=> 'active',
        ])->categories()->sync(1);



    }
}
