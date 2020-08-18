<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{

    protected $guarded = ['id'];
    
    public function courses()
    {
        return $this->belongsToMany('App\Models\Course','sections_courses');
    }

    public function students()
    {
    	return $this->hasMany('App\Models\Student');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teachers_sections');
    }
}