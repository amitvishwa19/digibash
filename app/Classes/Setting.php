<?php

namespace App\Classes;

use Illuminate\Support\Facades\Cache;
use Spatie\Valuestore\Valuestore;


Class Setting{

	private $valuestore;

    public function __construct(){
        $this->valuestore = Valuestore::make(storage_path('app\setting.json'));
    }

    public function get($value = null)
    {
    	return $this->valuestore->get($value);
    }

    public function set($key, $value = null)
    {
    	$this->valuestore->put($key, $value);
    }

    public function all()
    {
        $this->valuestore->all();
    }
    
}