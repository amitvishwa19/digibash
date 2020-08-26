<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{

    protected $guarded = ['id'];
    
     public function courses()
    {
        return $this->belongsToMany('App\Models\Course','courses_lessons');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam','lesson_exams');
    }

}