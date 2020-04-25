<?php

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            
            [
            	'name' => 'Web Design',
            	'description' => 'FUll web design',
           		'charge' => '15000',
            	'duration' => 30
            ],
            [
            	'name' => 'Logo Design',
            	'description' => 'Logo design',
           		'charge' => '1500',
            	'duration' => 5
            ],
            [
            	'name' => 'Brochure Design',
            	'description' => 'FUll web design',
           		'charge' => '4500',
            	'duration' => 10
            ],
            [
            	'name' => 'G-Suite Integration',
            	'description' => 'G-suite mail setup',
           		'charge' => '1500',
            	'duration' => 1
            ]	
            
        ]);
    }
}
