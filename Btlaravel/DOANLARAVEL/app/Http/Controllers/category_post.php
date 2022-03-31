<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Sesssion;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start;
use Illuminate\Support\CollectionstdClass;
//model;
use App\Models\categorypost;
use App\Models\postTB;
use DB; 
use Illuminate\Pagination\Paginator;

class category_post extends Controller
{
	//trang tin tức
 public function add_category_post()
 {
   return view('admin.categoryPost.add_category_post');

 }
    // thêm
 public function save_category_post(Request $request)
 {
  //check validation-------
      $validated = $request->validate([
        'cate_post_name' => 'required|min:1',
        'cate_post_slug' => 'required|min:1',
        'cate_post_desc' => 'required|min:1',
        'cate_post_status' => 'required|min:1'
       

      ]);
    	//dùng model 				//tên model
   $data_categorypost=new categorypost();
   $data =$request->all();     
 // đằng trước lấy name ở csdl /// đằng sau lấy name ô input
   $data_categorypost->cate_post_name=  $data['cate_post_name'];
   $data_categorypost->cate_post_slug=  $data['cate_post_slug'];
   $data_categorypost->cate_post_desc=  $data['cate_post_desc'];
   $data_categorypost->cate_post_status=$data['cate_post_status'];

			$data_categorypost->save();//đưa dữ liệu vào csdl
     return redirect('add-category-post')->with('mes','Thêm Danh Mục Bài Viết Thành công');
   } 

 // hiển thị tất cả tên bài viết
   public function  all_category_post()
   {
         Paginator::useBootstrap();
    	//dùng model
     $category_post =categorypost::orderBy('cate_post_id','DESC')->orderBy('cate_post_name','desc')
     ->paginate(5);

     return view('admin.categoryPost.all_category_post')->with(compact('category_post'));
   
   }

    //tới trang sửa
   public function edit_category_post($id)
   {	

	//cách 1:	// $edit_post=categorypost::where('cate_post_id',$id)->get();
	//cách 2:	
    $edit_post=categorypost::find($id);
    return view('admin.categoryPost.edit_category_post')
    ->with(compact('edit_post'));
  }

	// update
  public function update_category_post(Request $request , $id)
  {
      //check validation-------
      $validated = $request->validate([
        'cate_post_name' => 'required|min:1',
        'cate_post_slug' => 'required|min:1',
        'cate_post_desc' => 'required|min:1',
        'cate_post_status' => 'required|min:1'
       

      ]);
   $data =$request->all();
   $update_cate_post=categorypost::find($id); 

 // đằng trước lấy name ở csdl /// đằng sau lấy name ô input
   $update_cate_post->cate_post_name=$data['cate_post_name'];
   $update_cate_post->cate_post_slug=$data['cate_post_slug'];
   $update_cate_post->cate_post_desc=$data['cate_post_desc'];
   $update_cate_post->cate_post_status=$data['cate_post_status'];
   $update_cate_post->save();
   return redirect('all-category-post')->with('mes','Cập Nhật Danh Mục Bài Viết Thành công');
 } 

	//xóa
 public function delete_category_post($id)
 {

  $delete_cate_post=categorypost::find($id)->delete();
  return redirect('all-category-post');
}
//----------------------------------------------------------------------------------------------//
public function  danh_muc_bai_viet(Request $request,$post_slug)
{

 $cate_product= DB::table('tbl_category_product')->where('category_status','1')
 ->orderBy('category_id','desc')->get()->toArray();           
 $brand_product= DB::table('tbl_brand')->where('brand_status','1')
 ->orderBy('brand_id','desc')->get()->toArray(); 
 $all_product= DB::table('tbl_product') ->where('product_status','1')->orderBy('product_id','desc')
 ->limit(10)->get(); 

          //tên danh mục bài viết
 $show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();
//----------------------------------------------------------------------------------//    
 $catepost= categorypost::where('cate_post_slug',$post_slug)->take(1)->get();

 foreach ($catepost as $key => $ct) {
      // vế sau dấu = là lấy ở sql
   $meta_desc    =$ct->cate_post_desc;
   $meta_keywords=$ct->cate_post_slug;
   $meta_title   =$ct->cate_post_name;
   $cate_id      =$ct->cate_post_id;
   $url_canonical=$request->url();

 }
// postTB ---with(catepost lấy ở hàm viết trong model post)  -- đỡ phải join

 $show_post=postTB::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_id)->paginate(10);
//      $post= DB::table('tbl_posts')
// ->join('tbl_category_post','tbl_category_post.cate_post_id','=',
// 'tbl_posts.cate_post_id')->where('post_status',1)->where('cate_post_id',$cate_id)->paginate(10)->get();
 return view('pages.baiviet.danhmucbaiviet')->with('category',$cate_product)->with('brand',$brand_product)
 ->with('all_product',$all_product)->with('show_cate_post',$show_cate_post)
 ->with('meta_desc ',$meta_desc )
 ->with('meta_keywords',$meta_keywords)->with('meta_title ', $meta_title )
 ->with('url_canonical',$url_canonical)->with('catepost',$catepost )->with('show_post',$show_post );

}


}
