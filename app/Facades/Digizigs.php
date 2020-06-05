<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class DigizigsFacade extends Facade
{
    protected static function  getFacadeAccessor()
    {
        return 'digizigs';
    }
}