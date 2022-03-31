<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use App\Models\Posts;
use Illuminate\Pagination\Paginator;

use Carbon\Carbon;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // trang lists
        Paginator::useBootstrap();
        //gọi model
        // $showcategory = CategoryPosts::paginate(5); // phân trang
        //  $posts = Posts::orderBy('id', 'DESC')->paginate(5);
        $posts = Posts::with('category')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.Posts.list')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tới trang thêm


        $showcategory = CategoryPosts::all();
        return view('admin.Posts.add')->with(compact('showcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titles' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',


        ]);
        // thêm dữ liệu
        $post = new Posts();
        $post->titles           = $request->titles;
        $post->short_desc      = $request->short_desc;
        $post->desc            = $request->desc;
        $post->image = $request->image;
        $post->status = $request->status;
        $post->date            = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y');
        $post->category_post_id = $request->category_post_id;
        // ảnh -- nếu chọn hình ảnh

        //----ảnh
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $post['image'] = "$profileImage";
        }
        $post->save();
        session()->flash('success', 'Thêm Bài Viết Thành Công');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // trang edit
        $showcategory = CategoryPosts::all();
        $showposts = Posts::find($id);
        //  return view('layout.post.posts_edit')->with(compact('showposts'))->with(compact('showcategory'));
        return view('admin.Posts.edit')->with(compact('showposts'))->with(compact('showcategory'));
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
        $validatedData = $request->validate([
            'titles' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',



        ]);
        //
        $data = $request->all();
        $editpost = Posts::find($id);
        $editpost->titles           = $data['titles'];
        $editpost->short_desc       = $data['short_desc'];
        $editpost->desc             = $data['desc'];
        $editpost->category_post_id = $data['category_post_id'];
        $editpost->status = $data['status'];
        $editpost->date             = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y');
        //----------------------------------------------------------------
        if ($request->hasFile('image')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // ]);
            $image = $request->file('image');

            unlink('images/' . $editpost->image);
            $destinationPath = 'images/';
            $profileImage = time()  . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($data['image']);
        }
        //-----------------------

        $editpost->update($data);
        session()->flash('success', 'Cập Nhật Bài Viết Thành Công');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // xóa
        $parth = 'images/';
        $posts = Posts::find($id);
        unlink($parth . $posts->image);
        $posts->delete();
        return back();
    }
}