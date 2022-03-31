<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 // thêm dòng dùng database

// thêm 4 thư viện cho phần check và logout
// use Illuminate\Support\Facades\DB;
use Sesssion;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start;
use App\Models\postTB;
use App\Models\categorypost; 

use DB;
class homeController extends Controller
{
	public function index()
	{ 
 // thêm hiển thị thương hiệu và danh mục sản phẩm-----------------------------------

		$cate_product= DB::table('tbl_category_product')->where('category_status','1')
		->orderBy('category_id','desc')->get()->toArray();
		    	//
		$brand_product= DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')
		->get()->toArray(); 
//---- hiển thị sản phẩm -------------------------------------------
		$all_product= DB::table('tbl_product')->where('product_status','1')->orderBy('product_id','desc')
		->limit(10)->get(); 
//tên danh mục bài viết
		$show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();
  // $show_cate_post=categorypost::orderBy('cate_post_id','DESC')->get();
		$all_post= DB::table('tbl_posts')
		->join('tbl_category_post','tbl_category_post.cate_post_id','=','tbl_posts.cate_post_id')
		->orderBy('tbl_posts.cate_post_id','desc')->orderBy('post_id','desc')->get();

		return view ('pages.home')->with('category',$cate_product)->with('brand',$brand_product)
		->with('all_product',$all_product)->with('show_cate_post',$show_cate_post)
		->with('all_post',$all_post);
	}

	   // tìm kiếm sản phẩm//----------------------------------------------
public function search(Request $request)
	{
 $keyWords= $request->keywords_submit;  //keywords_submit phải trùng với name ở layout home

 $cate_product= DB::table('tbl_category_product')
	 ->where('category_status','1')
	 ->orderBy('category_id','desc')->get()->toArray();
			    	//
 $brand_product= DB::table('tbl_brand')
	 ->where('brand_status','1')
	 ->orderBy('brand_id','desc')->get()->toArray(); 
		// tin tức	
 $show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();
 $search_product= DB::table('tbl_product')->where('product_name','like','%' . $keyWords. '%')->get();
 return view ('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)
	 ->with('search',$search_product)->with('show_cate_post',$show_cate_post);

	}

}

