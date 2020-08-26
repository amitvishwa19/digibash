<?php

namespace App\Http\Controllers\lms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LmsController extends Controller
{
    public function index()
    {
        return view('lms.pages.dashboard.dashboard');
    }
}
