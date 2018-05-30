<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\Relationship;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::orderBy('created_at','DESC')->paginate(10);
        // foreach ($data as $value) {
        //     dd($value->categories);
        // }
        return view('admin.posts.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name','parent_id')->where('status','publish')->get()->toArray();
        return view('admin.posts.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $rq)
    {
        // create new post
        $data = new Post;
        $data->title = $rq->title;
        $data->slug = str_slug($rq->title);
        $data->content = $rq->content;
        $data->author_id = rand(1,5);
        $data->featured_image = $rq->featured_image;
        $data->status = $rq->status;
        if($data->save()){
            // create post_category relationships
            $category_check_list = $rq->category_check_list;
            if(!empty($category_check_list)){
                foreach ($category_check_list as $item) {
                    $rela_categories[] = [
                        'object_id' => $data->id, 
                        'parent_id' => $item,
                        'parent_type' => 'post_category'
                    ];
                }
                Relationship::insert($rela_categories);
            }

            // create post_tag relationship
            if(!empty($rq->tags)){
                $tags = explode(',', $rq->tags);
                foreach ($tags as $item) {
                    $tag = Tag::firstOrCreate(['name' => $item],['slug' => str_slug($item)]);
                    $rela_tags[] = [
                        'object_id' => $data->id,
                        'parent_id' => $tag->id,
                        'parent_type' => 'post_tag'
                    ];
                }
                Relationship::insert($rela_tags);
            }
        }
        return redirect()->route('admin.posts.index');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        $rela_categories = $post->categories;
        $categories_id = [];
        foreach ($rela_categories as $value) {
            $categories_id[] = $value->parent_id;
        }
        
        $rela_tags = $post->tags;
        $tags_name = '';
        foreach ($rela_tags as $value) {
            $tags_name .= $value->tag->name . ',';
        }

        $categories = Category::select('id','name','parent_id')->where('status','publish')->get()->toArray();

        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'categories_id' => $categories_id,'tags_name' => $tags_name]);
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
        //
    }

    /**
     * Change status to trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }

    /* Permanently delete */
    public function destroy()
    {

    }
}
