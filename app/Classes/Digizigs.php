<?php

namespace App\Classes;

use Illuminate\Support\Facades\Cache;
use Spatie\Valuestore\Valuestore;


Class Digizigs{

	
    public function __construct(){
        app('log')->debug('Fired form Digizigs class of serviceprovider');
    }

    public function test()
    {
        return 'testfunction';
    }
    
}