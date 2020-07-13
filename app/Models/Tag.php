<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name','slug',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','post_tag');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','product_tags');
    }

}
