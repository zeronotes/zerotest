<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Cache;
// use App\Page;
use App\Post;

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
        if (Cache::has('multiLevelPage')) {
    		$data = Cache::get('multiLevelPage');
    	}
    	else {
            // do cần lấy luôn username vào kết quả nên sẽ sử dụng query builder
    		$pages = DB::table('posts')->select('posts.id','title','parent_id','author_id','posts.created_at','users.username')
                ->where('post_type','page')
				->where('status','publish')
				->leftJoin('users','posts.author_id','=','users.id')
				->get()->toArray();
                // dd($pages);
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
            if (Cache::has('multiLevelPageSelectBox')) {
                $data = Cache::get('multiLevelPageSelectBox');
            }
            else {
                $pages = Post::select('id','title','parent_id','author_id','created_at')
                    ->where('post_type','page')
                    ->where('status','publish')
                    ->get()->toArray();
                $data = multiLevelArray($pages);

                Cache::put('multiLevelPageSelectBox', $data, 1500);
            }
    	}
        return view('admin.posts.create')->with(['pages' => $data, 'post_type' => 'page']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $rq)
    {
        // create new Page
        $data = new Post;
        $data->title = $rq->title;
        $data->slug = str_slug($rq->slug);
        $data->content = $rq->content;
        $data->author_id = rand(1,5);
        $data->featured_image = $rq->featured_image;
        $data->parent_id = $rq->parent_id;
        $data->template_id = $rq->template;
        $data->post_type = 'page';
        $data->order = $rq->order;
        $data->status = $rq->status;
        if ($data->save()) {
            Cache::forget('multiLevelPage');
            Cache::forget('multiLevelPageSelectBox');
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
        $data = Post::find($id);

        if (Cache::has('multiLevelPage')) {
            $pages = Cache::get('multiLevelPage');
        }
        else {
            if (Cache::has('multiLevelPageSelectBox')) {
                $pages = Cache::get('multiLevelPageSelectBox');
            }
            else {
                $pages = Post::select('id','title','parent_id','author_id','created_at')
                    ->where('post_type','page')
                    ->where('status','publish')
                    ->get()->toArray();
                $pages = multiLevelArray($pages);

                Cache::put('multiLevelPageSelectBox', $pages, 1500);
            }
        }
        
        // dd($pages);

        return view('admin.posts.edit', ['post' => $data, 'pages' => $pages, 'post_type' => 'page']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $rq, $id)
    {
        $page = Post::find($id);
        $page->title = $rq->title;
        $page->slug = str_slug($rq->slug);
        $page->content = $rq->content;
        $page->featured_image = $rq->featured_image;
        $page->parent_id = $rq->parent_id;
        $page->order = $rq->order;
        $page->status = $rq->status;
        if ($page->save()) {
            Cache::forget('multiLevelPage');
            Cache::forget('multiLevelPageSelectBox');
            return redirect()->back()
            ->with('msg_success','Updated successfully.');
        }
    }

    /**
     * Change status to trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $page = Post::find($id);
        $page->status = 'trash';
        $page->save();
        return redirect()->back()->with('msg_success','Delete successfully');
    }

    /* Permanently delete */
    public function destroy()
    {

    }
}
