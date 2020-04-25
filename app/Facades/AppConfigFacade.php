<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class AppConfigFacade extends Facade
{
	protected static function  getFacadeAccessor(){ return 'appconfig';}
}