<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use App\Models\Posts;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // hiển thị danh mục trên menu
        $showcategory = CategoryPosts::all()->where('status', '1');
        // hiển thị bài viết ở trang home
        $show_post_home = Posts::with('category')->where('status', '1')->orderBy('date', 'DESC')->get();
        // hiển thị bài viết mới nhất
        $show_post_slidebar = Posts::with('category')->where('status', '1')->inRandomOrder(5)->get();
        // hiển thị danh mục gợi ý
        $cate_post_recoment = CategoryPosts::all()->where('status', '1');
        //
        return view('home.pages.main')->with(compact('showcategory', 'show_post_home', 'show_post_slidebar', 'cate_post_recoment'));
        // ->with(compact('showcategory','show_post_home','show_post_slidebar','cate_post_recoment'));
    }
    public function search_keywword()
    {
        $showcategory = CategoryPosts::all()->where('status', '1');
        // danh mục gợi ý-- sẽ k hiển thị cái đang mở
        $cate_post_recoment = CategoryPosts::all()->where('status', '1');
        $key = $_GET['keywords'];
        // $search_key =Posts::with('category')->where('titles','LIKE','%'.$key.'%')->get();
        $search_key = Posts::with('category')->where('titles', 'like', "%{$key}%")
            ->orWhere('short_desc', 'like', "%{$key}%")->get();




        return view('home.search.search_keyword')->with(compact('search_key', 'showcategory', 'cate_post_recoment'));
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