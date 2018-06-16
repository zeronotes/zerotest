<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\TagFormRequest;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cache::has('allTags')) {
            $tags = Cache::get('allTags');
        }
        else {
            $tags = Tag::select('id','name','slug','description')->orderBy('created_at','DESC')->get()->toArray();
            Cache::put('allTags', $tags, 1500);
        }
        // dd($tags);
        return view('admin.tags.index', ['data' => $tags]);
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
    public function store(TagFormRequest $rq)
    {
        $data = new Tag;
        $data->name = $rq->name;
        $data->slug = $rq->slug;
        $data->description = $rq->description;
        if ($data->save()) {
            Cache::forget('allTags');
            return redirect()->back()->with('msg_success','Tag created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $rq) 
    {
        $data = Tag::where('name','like','%'.$rq->name.'%')->get()->toArray();
        return view('admin.tags.search')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tag::find($id);
        if ($data == null) {
            abort(404);
        }
        else {
            return view('admin.tags.edit')->with('data', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagFormRequest $rq, $id)
    {
        $data = Tag::find($id);
        $data->name = $rq->name;
        $data->slug = $rq->slug;
        $data->description = $rq->description;
        if ($data->save()) {
            Cache::forget('allTags');
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
        //
    }
}
