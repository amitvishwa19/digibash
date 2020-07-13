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
        
	    $filepath = storage_path('products');

	    if(!File::exists($filepath)){
	        File::makeDirectory($filepath);
	    }

        for($i=0; $i < 5; $i++){
        	$name = $faker->sentence(4);
	    	$slug = str_slug($name, '-');
        	$product = Product::create([
        		'shop_id'=> $faker->numberBetween(1,4),
        		'name'=> $name,
		        'slug'=>$slug,
		        'description'=> $faker->sentence(10),
		        'sku'=> $faker->numberBetween(1,9),
		        'stock'=> $faker->numberBetween(5,10),
		        'price'=> $faker->numberBetween(10,5000),
		        'status'=> $faker->randomElement(['draft', 'active','unavailable'])
        	]);

        	$product->categories()->sync(1);
        }
    }
}
