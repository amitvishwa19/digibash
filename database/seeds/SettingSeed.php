<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['key' => 'app.name','value'=> 'Name for your application']);
        Setting::create(['key' => 'app.description','value'=> 'Sort description of application']);
        Setting::create(['key' => 'app.icon','value'=> 'Application Icon path']);
        Setting::create(['key' => 'app.fevicon','value'=> 'Application Fevicon path']);
        Setting::create(['key' => 'app.page','value'=>'blog']);
        Setting::create(['key' => 'app.theme','value'=>'default']);
        Setting::create(['key' => 'app.admin','value'=>'appadmin']);
        Setting::create(['key' => 'app.registration','value'=>'no']);
    }
}
