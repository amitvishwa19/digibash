<?php

namespace App\Providers;

use App\Classes\Digizigs;
use Illuminate\Support\ServiceProvider;

class DigizigsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->singleton('digizigs', function () {
            //app('log')->debug('Fired form DigizigsserviceProvider');
            return new Digizigs();
        });

        //$this->loadHelpers();
       
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //app('log')->debug('Fired form DigizigsserviceProvider boot method');
    }

    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
