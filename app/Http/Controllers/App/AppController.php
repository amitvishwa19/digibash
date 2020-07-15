<?php

namespace App\Http\Controllers\App;

use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    protected $theme = '';

    public function __construct()
    {
        $this->theme  = setting('app.theme');
    }


    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view($this->theme .'.home',compact('cartItems'));
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

    public function posts()
    {
        return view($this->theme .'.posts');
    }

    public function post($id)
    {
        return view($this->theme .'.single');
    }

    public function product($slug)
    {

        $product = Product::where('slug', $slug)->with('images')->first();
        //dd($product->images);
        return view($this->theme .'.single-product',compact('product'));
    }

    public function category_products($slug)
    {
        $category = Category::where('slug',$slug)->first();
        if(!$category){
            return abort(404, 'Page Not Found');

        }else{
            $products = $category->allProducts();
        }
        return view($this->theme .'.category_products',compact('products','category'));
    }

    public function cart()
    {
        $items = \Cart::session(auth()->id())->getContent();
        //dd($items);
        return view($this->theme .'.cart',compact('items'));
    }

    public function add_to_cart(Product $product)
    {

        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->back();
    }

    public function delete_item_from_cart($productid)
    {
        // delete an item on cart
        \Cart::session(auth()->id())->remove($productid);
        return redirect()->back();
    }

    public function delete_cart()
    {
        \Cart::session(auth()->id())->clear();
        return redirect()->back();
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
