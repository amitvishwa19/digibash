<?php

namespace App\Http\Controllers\Client\digishop;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->theme  = setting('app.theme');
    }


    public function index()
    {

        $cartItems = \Cart::getContent();
        return view($this->theme .'.home',compact('cartItems'));
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
}
