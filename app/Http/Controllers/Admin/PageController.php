<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PageFormRequest;
use Illuminate\Support\Facades\Cache;
use App\Page;

class PageController extends Controller
{
    public function dashboard()
    {
    	return view('admin.pages.dashboard');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Page::where('status','publish')->orWhere('status','draft')->orderBy('created_at','DESC')->paginate(10);
        // foreach ($data as $value) {
        //     dd($value->categories);
        // }
        if (! Cache::has('multiLevelPage')) {
    		$data = Cache::get('multiLevelPage');
    	}
    	else {
    		$pages = DB::table('pages')->select('pages.id','title','parent_id','author_id','pages.created_at','users.username')
    					->where('status','publish')
    					->leftJoin('users','pages.author_id','=','users.id')
    					->get()->toArray();
    					$pages_array = [];
    					foreach ($pages as $item) {
    						$pages_array[] = array(
    							'id'	=> $item->id,
    							'title' => $item->title,
    							'parent_id' => $item->parent_id,
    							'author_id' => $item->author_id,
    							'username' => $item->username,
    							'created_at' => $item->created_at
    						);
    					}
    					// echo '<pre>';
    					// print_r($pages_array);
    					// echo '</pre>';
    					// exit();
    		// dd($pages);
    		$data = multiLevelArray($pages_array);
    		// dd($data);
    		Cache::put('multiLevelPage', $data, 1500);
    	}
        return view('admin.pages.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if (Cache::has('multiLevelPage')) {
    		$data = Cache::get('multiLevelPage');
    	}
    	else {
    		$pages = Page::select('id','title','parent_id','author_id','created_at')
    					->where('status','publish')
    					->get()->toArray();
    		$data = multiLevelArray($pages);
    		Cache::put('multiLevelPage', $data, 1500);
    	}
        return view('admin.pages.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $rq)
    {
    	dd($rq);
        // create new Page
        $data = new Page;
        $data->title = $rq->title;
        $data->slug = str_slug($rq->title);
        $data->content = $rq->content;
        $data->author_id = rand(1,5);
        $data->featured_image = $rq->featured_image;
        $data->parent_id = $rq->parent_id;
        $data->template_id = $rq->template_id;
        $data->order = $rq->order;
        $data->status = $rq->status;
        if ($data->save()) {
            return redirect()->route('admin.pages.index');
        }
        else {
        	return redirect()->back();
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
        foreach (test_foreach() as $value) {
            echo $value.'<br>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Page = Page::find($id);
        
        $categories_id = [];
        foreach ($Page->categories as $value) {
            $categories_id[] = $value->parent_id;
        }
        
        $tags_name = '';
        foreach ($Page->tags as $value) {
            $tags_name .= $value->tag->name . ',';
        }

        $categories = Category::select('id','name','parent_id')->where('status','publish')->get()->toArray();

        return view('admin.pages.edit', ['Page' => $Page, 'categories' => $categories, 'categories_id' => $categories_id,'tags_name' => $tags_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $rq, $id)
    {
        $Page = Page::find($id);
        $Page->title = $rq->title;
        $Page->slug = str_slug($rq->title);
        $Page->content = $rq->content;
        $Page->featured_image = $rq->featured_image;
        $Page->status = $rq->status;

        // categories
        $categories = $Page->categories;
        $current_categories = [];
        foreach ($categories as $value) {
            $current_categories[] = $value->parent_id;
        }

        $update_categories = [];
        if ($rq->category_check_list !== null) {
            foreach ($rq->category_check_list as $value) {
                $update_categories[] = $value;
            }
        }

        $remove_categories = [];
        foreach ($categories as $value) {
            if (! in_array($value->parent_id, $update_categories)) {
                $remove_categories[] = $value->id;
            }
        }

        $add_categories = [];
        foreach ($update_categories as $value) {
            if (! in_array($value, $current_categories)) {
                $add_categories[] = array(
                                        'object_id' => $Page->id, 
                                        'parent_id' => $value, 
                                        'parent_type' => 'Page_category'
                                    );
            }
        }

        // tags
        $update_tags = explode(',', $rq->tags);
        $tags = $Page->tags;

        // create remove tags array
        $current_tags = [];
        $remove_tags = [];
        foreach ($tags as $value) {
            $tag_name = $value->tag->name;
            $current_tags[] = $tag_name;
            if (! in_array($tag_name, $update_tags)) {
                $remove_tags[] = $value->id;
            }
        }

        // add new tags and create add rela tags array
        $add_rela_tags = [];
        foreach ($update_tags as $value) {
            if (! in_array($value, $current_tags)) {
                $tag = Tag::firstOrCreate(['name' => $value],['slug' => str_slug($value)]);
                $add_rela_tags[] = [
                    'object_id' => $Page->id,
                    'parent_id' => $tag->id,
                    'parent_type' => 'Page_tag'
                ];
            }
        }

        if ($Page->save()) {
            // remove rela categories
            if (count($remove_categories) > 0) {
                DB::table('relationships')->whereIn('id', $remove_categories)->delete();
            }

            // add rela categories
            if (count($add_categories) > 0) {
                Relationship::insert($add_categories);
            }

            // remove rela tags
            if (count($remove_tags) > 0) {
                DB::table('relationships')->whereIn('id', $remove_tags)->delete();
            }

            // add rela tags
            if (count($add_rela_tags) > 0) {
                Relationship::insert($add_rela_tags);
            }
        }
        return redirect()->back()->with('msg_success','Updated successfully.');
    }

    /**
     * Change status to trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Page = Page::find($id);
        $Page->status = 'trash';
        $Page->save();
        return redirect()->back()->with('msg_success','Delete successfully');
    }

    /* Permanently delete */
    public function destroy()
    {

    }
}
