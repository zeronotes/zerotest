<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public function user()
	{
		return $this->belongsTo('App\User','author_id','id');
	}

    public function categories()
    {
    	return $this->hasMany('App\Relationship','object_id','id')->where('parent_type','=', 'post_category');
    }

    public function tags()
    {
    	return $this->hasMany('App\Relationship','object_id','id')->where('parent_type','=','post_tag');
    }
}
