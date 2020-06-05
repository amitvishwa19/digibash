<?php

use App\Models\Menu;
use App\Models\Setting;
use App\Facades\Digizig;
use App\Classes\Digizigs;

if (! function_exists('setting')) {

    function setting($key=null, $value = null)
    {
        $setting_cache = null;

        if(is_null($key)){
            return null;
        }

        if(is_null($value)){
            $globalCache = config('digizigs.settings.cache', false);

            if ($globalCache && Cache::tags('settings')->has($key)) {
                return Cache::tags('settings')->get($key);
            }

            if ($setting_cache === null) {
                if ($globalCache) {
                    // A key is requested that is not in the cache
                    // this is a good opportunity to update all keys
                    // albeit not strictly necessary
                    Cache::tags('settings')->flush();
                }
                
                foreach (Setting::all() as $setting) {
                    $keys = explode('.', $setting->key);
                    @$setting_cache[$keys[0]][$keys[1]] = $setting->value;

                    if ($globalCache) {
                        Cache::tags('settings')->forever($setting->key, $setting->value);
                    }
                }
            }

            $parts = explode('.', $key);

            if (count($parts) == 2) {
                return @$setting_cache[$parts[0]][$parts[1]] ?: $default;
            } else {
                return @$setting_cache[$parts[0]] ?: $default;
            }
        }else{
            Setting::updateOrCreate(['key'=>$key],['value'=>$value]);
        }
        
    }

}




if (! function_exists('app_setting')) {

    function app_setting($name){

        if($name == 'app_name'){
            return  'Digizigs New Setting';
        }

        
    }
}

if (!function_exists('menu')) {
    function menu($menuName, $type = null, array $options = [])
    {
        if(is_null($menuName)){
            return null;
        }
        return Menu::display($menuName, $type, $options);
    }
}
