<?php

namespace App\Classes;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;


Class AppConfig{

    protected $settings = [];

    public function __construct()
    {
        //$this->Settings();
    }

    public function get_setting($key=null)
    {
        static $settings;

        if(!empty($key))
        {
            $settings = Cache::remember('settings', 24*60, function() {
                return array_pluck(Setting::all()->toArray(), 'value', 'key');
                //return 'empty';
            });
            //return $settingss;
        }else{
            return null;
        }

        return (is_array($key)) ? array_only($settings, $key) : $settings[$key];
    }

    public function set_setting($key, $Value)
    {
        Setting::create([
            'key' => $key,
            'value' => $Value,
        ]);
    }

    public function get_value($key)
    {   
        if($key){
            $setting = Setting::where('key', $key)->firstOrFail();
            return $setting->value;
        }
        
    }

    public function set_value($key, $Value)
    {
        Setting::create([
            'key' => $key,
            'value' => $Value,
        ]);
    }
    
}