<?php

namespace App\Http\Controllers\Digishop\Client;

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
        return view('digishop.client.home');
    }

    public function product($slug)
    {

        $product = Product::where('slug', $slug)->with('images')->first();
        //dd($product->images);
        return view('digishop.client.single-product',compact('product'));
    }

    public function category_products($slug)
    {
        $category = Category::where('slug',$slug)->first();
        if(!$category){
            return abort(404, 'Page Not Found');

        }else{
            $products = $category->allProducts();
        }
        return view('digishop.client.category_products',compact('products','category'));
    }
}
