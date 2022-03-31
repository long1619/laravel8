<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use App\Models\Posts;

class PostHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //hiển thị chi tiết 1 bài viết cho id của bài viết bằng $id
        $show_post_home = Posts::with('category')->where('id', $id)->where('status', '1')->first();
        $showcategory = CategoryPosts::all()->where('status', '1');
        // bài viết liên quan cùng trong 1 danh mục --- đầu tiên lấy id danh mục
        foreach ($show_post_home as $key => $p) {
            $category_id = $show_post_home->category_post_id;
        }
        $post_related = Posts::with('category')->whereNotIn('category_post_id', [$category_id])->where('status', '1')->get();

        return view('home.posthome.posts_home')->with(compact('showcategory', 'show_post_home', 'post_related'));;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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