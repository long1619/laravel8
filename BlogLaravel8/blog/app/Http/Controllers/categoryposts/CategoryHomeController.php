<?php

namespace App\Http\Controllers\categoryposts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use App\Models\Posts;

class CategoryHomeController extends Controller
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
        // hiển thị bài viết theo danh mục khi click
        $post_home = Posts::with('category')->where('category_post_id', $id)->where('status', '1')->get();
        // hiển thị bài viết theo danh mục khi click
        $post_home = Posts::with('category')->where('category_post_id', $id)->where('status', '1')->get();
        $showcategory = CategoryPosts::all()->where('status', '1');
        $title_cate_post = CategoryPosts::find($id)->where('status', '1'); // tiêu đề danh mục
        //-----------------------
        $show_post_home = Posts::with('category')->where('status', '1')->orderBy('date', 'DESC')->get();
        // hiển thị bài viết mới nhất
        $show_post_slidebar = Posts::with('category')->where('status', '1')->inRandomOrder(5)->get();
        // bài viết mới nhất
        //------------------------------
        $post_new = Posts::with('category')->where('category_post_id', $id)->orderBy('id', 'DESC')->where('status', '1')->limit(5)->get();
        //Danh mục gợi ý-- wherenotin -- là k lấy cái hiện tại
        $cate_post_recoment = CategoryPosts::whereNotIn('id', [$id])->where('status', '1');
        return view('home.categoryhome.catehome')->with(compact('show_post_slidebar', 'show_post_home', 'showcategory', 'post_home', 'title_cate_post', 'post_new', 'cate_post_recoment'));
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
