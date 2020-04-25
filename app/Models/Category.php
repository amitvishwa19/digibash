<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function parent()
    {
        return $this->belongsTo($this,'parent_id');
    }

    public function child()
    {
        return $this->hasMany($this, 'parent_id','id');
    }

    //Delete
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','post_category');
    }
    public function post()
    {
        return $this->belongsToMany('App\Models\Post');
    }
}
