<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop','shop_id');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','product_categories');
    }

    public function tags()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsToMany('App\Models\Tag','product_tags');
    }
}