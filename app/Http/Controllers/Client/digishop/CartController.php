<?php

namespace App\Http\Controllers\Client\digishop;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    protected $theme = '';

    public function __construct()
    {
        $this->theme  = setting('app.theme');
    }

    public function cart()
    {
        if(auth()->user()){
            $items = \Cart::session(auth()->id())->getContent();
            $subtotal = \Cart::session(auth()->id())->getSubTotal();
        }else{
            $items = \Cart::getContent();
            $subtotal = \Cart::getSubTotal();
        }

        //dd($items);
        return view($this->theme .'.cart',compact('items','subtotal'));
    }

    public function checkout()
    {
        return view($this->theme .'.checkout');
    }

    public function add_to_cart(Product $product)
    {
        if(auth()->user()){
            \Cart::session(auth()->id())->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        }else{
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        }



        return redirect()->back();
    }

    public function delete_item_from_cart($productid)
    {
        // delete an item on cart
        if(auth()->user()){
            \Cart::session(auth()->id())->remove($productid);
        }else{
            \Cart::remove($productid);
        }
        return redirect()->back();
    }

    public function delete_cart()
    {
        \Cart::session(auth()->id())->clear();
        return redirect()->back();
    }
}
