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

    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson','courses_lessons');
    }

    public function exams()
    {
        return $this->hasMany('App\Models\Exam','course_exams');
    }
}