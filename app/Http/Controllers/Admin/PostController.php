<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $data = Post::where('status','publish')->orWhere('status','draft')->orderBy('created_at','DESC')->paginate(10);
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
        if ($data->save()) {
            // create post_category relationships
            $category_check_list = $rq->category_check_list;
            if (! empty($category_check_list)) {
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
            if (! empty($rq->tags)) {
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
        $post = Post::find($id);
        
        $categories_id = [];
        foreach ($post->categories as $value) {
            $categories_id[] = $value->parent_id;
        }
        
        $tags_name = '';
        foreach ($post->tags as $value) {
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
        $post = Post::find($id);
        $post->title = $rq->title;
        $post->slug = str_slug($rq->title);
        $post->content = $rq->content;
        $post->featured_image = $rq->featured_image;
        $post->status = $rq->status;

        // categories
        $categories = $post->categories;
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
                                        'object_id' => $post->id, 
                                        'parent_id' => $value, 
                                        'parent_type' => 'post_category'
                                    );
            }
        }

        // tags
        $update_tags = explode(',', $rq->tags);
        $tags = $post->tags;

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
                    'object_id' => $post->id,
                    'parent_id' => $tag->id,
                    'parent_type' => 'post_tag'
                ];
            }
        }

        if ($post->save()) {
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
        $post = Post::find($id);
        $post->status = 'trash';
        $post->save();
        return redirect()->back()->with('msg_success','Delete successfully');
    }

    /* Permanently delete */
    public function destroy()
    {

    }
}
