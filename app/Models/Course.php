<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    protected $guarded = ['id'];
    
    public function sections()
    {
        return $this->belongsToMany('App\Models\Section','sections_courses');
    }
}