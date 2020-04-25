<?php

use App\Models\Contact;
use Illuminate\Database\Seeder;

class SubscriptionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	for($i=0; $i < 10; $i++){

    		Contact::create([   			
    			'email' => $faker->email,		
    			'status' => 1,
                'type' => 'newsletter',
    		]);

    		
    	}  
    }
}
