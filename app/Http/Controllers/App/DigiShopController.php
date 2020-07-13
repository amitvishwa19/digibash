<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DigiShopController extends Controller
{
    //

    protected $theme = '';

    public function __construct()
    {
        $this->theme  = setting('app.theme');
    }

    public function home()
    {
        return view($this->theme .'.home');
    }

    public function product()
    {
        return view($this->theme .'.single.product');
    }
}
