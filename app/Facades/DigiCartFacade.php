<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class DigicartFacade extends Facade
{
	protected static function  getFacadeAccessor(){ return 'digicart';}
}
