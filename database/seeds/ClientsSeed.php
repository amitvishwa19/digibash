<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	for($i=0; $i < 20; $i++){

    		Client::create([
    			'client_name' => $name = $faker->name,
    			'client_website' =>  $faker->safeEmailDomain,
    			'client_phone' => $faker->phoneNumber,
    			'client_email' => $faker->email,    			
    		]);

    		
    	} 
    }
}
