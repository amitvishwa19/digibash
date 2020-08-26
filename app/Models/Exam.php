<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{

    protected $guarded = ['id'];

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question','exam_questions');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course','course_exams');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Models\Course','lesson_exams');
    }
    
}