<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $theme = setting('app.theme');
        return view($theme.'.index');
        return $theme;
    }
}
