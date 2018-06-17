<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
    	return $this->hasOne('App\User','id','author_id');

    	// hasOne va belongsTo cac tham so khoa ngoai nguoc nhau
    	// return $this->belongsTo('App\User','author_id','id');
    }
}
