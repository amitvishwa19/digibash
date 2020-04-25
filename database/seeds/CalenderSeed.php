<?php

use Illuminate\Database\Seeder;
use App\Models\Calender;

class CalenderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title'=>'Demo Event-1', 'start'=>'2019-09-11 08:30:00', 'end'=>'2019-09-12 13:00:00'],
        	['title'=>'Demo Event-2', 'start'=>'2019-09-11 08:30:00', 'end'=>'2019-09-13 13:00:00'],
        	['title'=>'Demo Event-3', 'start'=>'2019-09-14 08:30:00', 'end'=>'2019-09-14 13:00:00'],
        	['title'=>'Demo Event-3', 'start'=>'2019-09-17 08:30:00', 'end'=>'2019-09-17 13:00:00'],
        ];

        foreach ($data as $key => $value) {
        	Calender::create($value);
        }


    }
}
