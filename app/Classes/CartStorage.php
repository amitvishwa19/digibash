<?php

namespace App\Classes;

use App\Models\Cart as DCart;


class CartStorage{

    public function has($key)
    {
        return DCart::find($key);
    }

    public function get($key)
    {
        if($this->has($key))
        {
            return DCart::find($key)->cart_data;
        }
        else
        {
            return [];
        }
    }

    public function put($key, $value)
    {
        if($row = DCart::find($key))
        {
            // update
            $row->cart_data = $value;
            $row->save();
        }
        else
        {
            DCart::create([
                'id' => $key,
                'cart_data' => $value
            ]);
        }
    }

}
