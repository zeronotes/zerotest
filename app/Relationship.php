<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function product()
    {
    	return $this->belongsTo('App\Product','object_id','id');
    	//return $this->hasOne('App\Product','id','object_id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category','parent_id','id');
    }

    public function tag()
    {
    	return $this->belongsTo('App\Tag','parent_id','id');
    }
}
