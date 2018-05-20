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
}
