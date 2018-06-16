<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\CategoryFormRequest;
use App\Relationship;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cache use redis
        // if (Redis::exists('redisMultiLevelCategory')) {
        //     $categories = Redis::get('redisMultiLevelCategory');
        //     $categories = json_decode($categories, true);
        // }
        // else {
        //     $data = Category::select('id','name','slug','description','parent_id')
        //             ->where('status','publish')->get()->toArray();
        //     $categories = multiLevelArray($data,0);
        //     Redis::set('redisMultiLevelCategory', json_encode($categories));
        // }
        $redis = Redis::connection();
        if ($redis->exists('multiLevelCategory')) {
            $categories = $redis->get('multiLevelCategory');
            $categories = json_decode($categories, true);
            // $categories = unserialize($categories);
        }
        else {
            $data = Category::select('id','name','slug','description','parent_id')
                    ->where('status','publish')->get()->toArray();
            $categories = multiLevelArray($data, 0);
            $redis->set('multiLevelCategory', json_encode($categories));
            // $redis->set('multiLevelCategory3', serialize($categories));
        }
        
        return view('admin.categories.index', ['data' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $rq)
    {
        $data = new Category;
        $data->name = $rq->name;
        $data->slug = $rq->slug;
        $data->parent_id = $rq->parent_id;
        $data->description = $rq->description;
        if ($data->save()) {
            Cache::forget('multiLevelCategory');
            return redirect()->back()->with('msg_success','Created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(Request $rq) 
    {
        $data = Category::where('name','like','%'.$rq->name.'%')->get()->toArray();
        return view('admin.categories.search')->with('data', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        if (Cache::has('multiLevelCategory')) {
            $multiLevelCategory = Cache::get('multiLevelCategory');
        }
        else {
            $categories = Category::select('id','name','slug','description','parent_id')
                    ->where('status','publish')->get()->toArray();
            $multiLevelCategory = multiLevelArray($categories,0);
            Cache::put('multiLevelCategory', $multiLevelCategory, 1500);
        }
        // dd($multiLevelCategory);
        return view('admin.categories.edit')->with(['data' => $data, 'multiLevelCategory' => $multiLevelCategory]);
    }

    public function test() {
        return view('admin.categories.test');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $rq, $id)
    {
        $data = Category::find($id);
        $data->name = $rq->name;
        $data->slug = str_slug($rq->slug);
        $data->parent_id = $rq->parent_id;
        $data->description = $rq->description;
        if ($data->save()) {
            Cache::forget('multiLevelCategory');
            return redirect()->back()->with('msg_success','Updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        if ($data->delete()) {
            // set parent_id of children to grandparent 
            $children = Category::where('parent_id', $id)->get();
            if (count($children) > 0) {
                foreach ($children as $value) {
                    $value->parent_id = $data->parent_id;
                    $value->save();
                }
            }
            // remove categories of posts
            Relationship::where('parent_id', $id)->where('parent_type','post_category')->delete();
            Cache::forget('multiLevelCategory');
            return redirect()->back()->with('msg_success','Deleted successfully.');
        }
    }
}
