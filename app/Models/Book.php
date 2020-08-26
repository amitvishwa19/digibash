<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{

    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo('App\User','users_books');
    }

    public function issuedbook() {
        return $this->hasMany('App\Models\IssuedBook', 'book_id');
    }

}