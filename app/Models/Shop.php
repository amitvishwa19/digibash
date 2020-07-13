<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{

    protected $guarded = ['id'];


    public function owner()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product')->latest();
    }


}
