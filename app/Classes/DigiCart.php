<?php

namespace App\Classes;

use Session;

Class DigiCart{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct(){
        $oldCart = Session::has('DigiCart') ? Session::get('DigiCart') : null;
        if( $oldCart ){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            //dd($oldCart);
        }
    }

    public function add($item, $id){

        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        if( $this->items ){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
        //dd($storedItem);
    }

    public function update(){


    }

    public function remove($item, $id){

    }

}
