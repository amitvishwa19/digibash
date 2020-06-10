<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    protected $guarded = ['id'];

    public function author()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\User','user_id');
    }

    public function tags()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsToMany('App\Models\Tag','post_tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','post_category');
    }
    
}