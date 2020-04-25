<?php

namespace App\Providers;

use App\Classes\AppConfig;
use Illuminate\Support\ServiceProvider;

class AppConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('appconfig',function(){
            return new AppConfig();
        });
    }
}
