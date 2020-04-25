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
        Setting::create(['key' => 'app_name','value'=>'DigiZigs']);
        Setting::create(['key' => 'app_admin_url','value'=>'appadmin']);
        Setting::create(['key' => 'app_email','value'=>'admin@admin.com']);
        Setting::create(['key' => 'app_description','value'=>'admin']);
        Setting::create(['key' => 'home_page','value'=>1]);
        Setting::create(['key' => 'post_per_page','value'=>10]);
    }
}
