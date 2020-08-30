<?php

namespace App\Http\Controllers\Digishop\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('digishop.admin.pages.dashboard.dashboard');
    }
}
