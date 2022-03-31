<?php

namespace App\Http\Controllers\categoryposts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use Illuminate\Pagination\Paginator;

class CategoryPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        //gọi model
        $showcategory = CategoryPosts::paginate(5);

        return view('admin.CategoryPosts.list')->with(compact('showcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // tới trang thêm


        return view('admin.CategoryPosts.add');
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
            'title' => 'required',
            'desc_short' => 'required|min:1',
            'status' => 'required',

        ]);
        // trang lưu
        $category = new CategoryPosts();
        $category->title = $request->title;
        $category->desc_short = $request->desc_short;
        $category->status = $request->status;

        $category->save();
        session()->flash('success', 'Thêm Danh Mục Thành Công');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //tới trang edit
    public function show($id)
    {
        $categoryedit = CategoryPosts::find($id);
        return view('admin.CategoryPosts.edit')->with(compact('categoryedit'));
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
            'title' => 'required',
            'desc_short' => 'required|min:1',
            'status' => 'required',

        ]);
        // trang cập nhật
        $data = $request->all();
        $categoryupdate = CategoryPosts::find($id);
        $categoryupdate->title = $data['title'];
        $categoryupdate->desc_short = $data['desc_short'];
        $categoryupdate->status = $data['status'];
        $categoryupdate->save();
        session()->flash('success', 'Cập Nhật Danh Mục Thành Công');
        return redirect('/category-show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // trang xóa
        $category =  CategoryPosts::find($id);
        $category->delete();
        return redirect()->back();
    }
}