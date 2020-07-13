<?php

namespace App\Http\Controllers\Client;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    protected $theme = '';

    public function __construct()
    {
        $this->theme  = setting('app.theme');
    }


    public function index()
    {   
        return view()->first([
            $this->theme .'.home',
            $this->theme .'.index'
        ]);
    }

    public function page($page)
    {

        if($page == setting('app.admin')){
            return view('admin.pages.dashboard.dashboard');
        }

        $page = Page::where('slug', $page)->where('status', 'published')->first();

        if($page){
            return view()->first([
                $this->theme .'.' . $page->slug,
                $this->theme .'.' . 'page'
            ],compact('page'));
        }else{
            abort(404, 'Page not found');
        }
        
    
    }



    public function home()
    {
        //$menu = menu('ecom','_json');
        //$theme = setting('app.theme');
        return view($this->theme .'.index',compact('menu'));
        return $theme;
    }

    public function cart()
    {
        return view($this->theme .'.cart');
    }

    public function posts()
    {
        return view($this->theme .'.posts');
    }

    public function post($id)
    {
        return view($this->theme .'.single');
    }

    public function product($id)
    {
        return view($this->theme .'.product');
    }

    public function account()
    {
        return view($this->theme .'.account');
    }

    public function checkout()
    {
        return view($this->theme .'.checkout');
    }
}
