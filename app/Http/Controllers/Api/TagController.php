<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    public function list()
    {
    	$tags = Tag::select('name')->get();
    	$data = [];
    	foreach ($tags as $value) {
    		$data[] = $value->name;
    	}
    	// dd($data);
    	return $data;
    }
}
