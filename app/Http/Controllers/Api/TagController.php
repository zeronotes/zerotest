<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Tag;

class TagController extends Controller
{
    public function list()
    {
    	if (Cache::has('jsonTags')) {
            $data = Cache::get('jsonTags');
        }
        else {
            $tags = Tag::select('name')->get();
            $data = [];
            foreach ($tags as $value) {
                $data[] = $value->name;
            }
            Cache::put('jsonTags', $data, 1500);
        }
    	// dd($data);
    	return $data;
    }
}
