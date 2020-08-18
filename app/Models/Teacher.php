<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{

    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sections()
    {
        return $this->belongsToMany('App\Models\Section','teachers_sections');
    }

}