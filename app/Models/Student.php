<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section','section_id');
    }
    
}