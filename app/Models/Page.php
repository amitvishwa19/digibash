<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{

	

	protected $dates = ['deleted_at'];

	protected $guarded = ['id'];
	
	public function author()
	{
		//return $this->belongsTo('App\Models\Tag');
		return $this->belongsTo('App\User','user_id');
	}
    
}