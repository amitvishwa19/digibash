<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{

    public function index()
    {
        return view('admin.pages.calendar.calendar');   
    } 





}
