<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{

    protected $guarded = ['id'];
    
    public function options()
    {
        return $this->hasMany('App\Models\QuestionOption');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam','exam_questions');
    }
}