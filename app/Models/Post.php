<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;

class Post extends Model
{
    use LogsActivity;
    use CausesActivity;
    protected static $logUnguarded = true;


    
    protected $guarded = ['id'];

    public function author()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsTo('App\User','user_id');
    }

    public function tags()
    {
        //return $this->belongsTo('App\Models\Tag');
        return $this->belongsToMany('App\Models\Tag','post_tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','post_category');
    }

    public function LogActivity()
    {
        return activity()
            ->performedOn('$article')
            ->causedBy('$user')
            ->withProperties(['laravel' => 'awesome'])
            ->log('The subject name is :subject.name, the causer name is :causer.name and Laravel is :properties.laravel');

    }
    
}