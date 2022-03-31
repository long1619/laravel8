<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 //dùng model
use App\Models\postTB;
use App\Models\categorypost;
use Sesssion;
use Illuminate\Support\Facades\Redirect; 
use Sesssion_start; 
use  File;
use Livewire\withFileUploads;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
   //tới trang thêm
  public function add_post()
  {
    $cate_post =categorypost::orderBy('cate_post_id','DESC')->get();

    return view('admin.Post.add_post')->with(compact('cate_post'));

  }
    // thêm bài viết
  public function save_post(Request $request)
  {
         //check validation-------
      $validated = $request->validate([
        'post_title' => 'required|min:1',
        'post_slug' => 'required|min:1',
        'post_desc' => 'required|min:1',
        'post_content' => 'required|min:1',
         'post_meta_keyword' => 'required|min:1',
          'post_meta_desc' => 'required|min:1',
           'post_image' => 'required|min:1'
       

      ]);
    $data = $request->all();
    $post_add =new postTB();
// đằng trước là name sql ----------- đằng sau là name các ô input
    $post_add->post_title =$data['post_title'];  
    $post_add->post_slug = $data['post_slug']; 
    $post_add->post_desc = $data['post_desc'];

    $post_add->post_content =  $data['post_content'];
    $post_add->post_meta_desc = $data['post_meta_desc'];
    $post_add->post_meta_keyword = $data['post_meta_keyword'];
    $post_add->post_status = $data['post_status'];
    $post_add->cate_post_id =$data['cate_post_id']; 

    $get_image= $request->file('post_image');     	

		  $get_name_image=$get_image->getClientOriginalName();//lấy tên hình ảnh
		  $name_image= current(explode('.',$get_name_image));
		  $new_image = $name_image.'.'.$get_image->getClientOriginalExtension(); // lấy đuôi mở rộng
		  $get_image->move('public/upload/post',$new_image);// thư mục

		     				// lưu tên mới trong sql
      $post_add->post_image= $new_image;
      $post_add->save();

      return back()->with('mes','Thêm Bài Viết Thành công');

    }
    public function all_post()
    {       //kết nối 2 table dùng with -- lấy ở bên model

        //with('cate_post')-> catepost lấy ở trong model posst--->orderBy('tbl_posts.cate_post_id','desc')
  Paginator::useBootstrap();
      $all_post= DB::table('tbl_posts')
      ->join('tbl_category_post','tbl_category_post.cate_post_id','=',
        'tbl_posts.cate_post_id')->orderBy('post_id','desc')->paginate(5);;
    	// $all_post=postTB::with('cate_post')->orderBy('tbl_posts.cate_post_id','desc')->orderBy('post_id','desc')->get();  

      return view('admin.Post.all_post')->with(compact('all_post'));
    }

 // tới trang sửa  	
    public function edit_post($id)
    {
      $cate_post=categorypost::orderBy('cate_post_id','DESC')->get();

      $edit_p=postTB::where('post_id',$id)->get();

      return view('admin.Post.edit_post')->with('edit_post1',$edit_p)
      ->with('cate_post',$cate_post);
    }

//update
    public function update_post(Request $request , $id)
    {
      $data = $request->all();
            $post= DB::table('tbl_posts')->where('post_id',$id);
      // $post = postTB::where('post_id',$id);
// $post = postTB::find($id);
      $post->post_title =$data['post_title'];
      $post->post_slug = $data['post_slug']; 
      $post->post_desc = $data ['post_desc'];
//
      $post->post_content =  $data['post_content'];
      $post->post_meta_desc = $data['post_meta_desc'];
      $post->post_meta_keyword = $data['post_meta_keyword'];
      $post->cate_post_id = $data['cate_post_id'];    
      $post->post_status = $data['post_status'];

      $get_image= $request->file('post_image');   
// dd($post);
      if($get_image){
	 // xóa hình cũ ở trong folder
  // $post_image_old=$post->post_image;
  // $parth='public/upload/post'. $post_image_old;
  // unlink($parth);
  //------
 $get_name_image=$get_image->getClientOriginalName();//lấy tên hình ảnh
 $name_image= current(explode('.',$get_name_image));
 $new_image = $name_image.'.'.$get_image->getClientOriginalExtension(); // lấy đuôi mở rộng
 $get_image->move('public/upload/post',$new_image);// thư mục
 $post->post_image= $new_image; 
  /// looic cập nhật bài viết

} 
$post->save();
return view('admin.Post.all_post')->with('mes','Cập Nhật Bài Viết Thành công');  

}

//xóa bài viết
public function delete_post($post_id)
{        

      // $post=postTB::find( 'post_id',$post_id);
        // $post_image=$post->post_image;

  $post=DB::table('tbl_posts')->where('post_id',$post_id);
  // ->first();
  // unlink('public/upload/post/');
  $post->delete();  

  return redirect('/all-post')->with('mes','Xóa Thành Công');
}

//--------------------hiển thị bên layout người dùng---------------------  ----------------//
public function xem_bai_viet( Request $request,$post_slug)
{

 $cate_product= DB::table('tbl_category_product')->where('category_status','1')
 ->orderBy('category_id','desc')->get()->toArray();
      
 $brand_product= DB::table('tbl_brand')->where('brand_status','1')
 ->orderBy('brand_id','desc')->get()->toArray(); 

 $all_product= DB::table('tbl_product') ->where('product_status','1')->orderBy('product_id','desc')
 ->limit(10)->get(); //limit 10 nghĩa là cho tối da 6 sản phẩm

  //tên danh mục bài viết
 $show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();
//----------------------------------------------------------------------------------- 

// $catepost= categorypost::where('cate_post_slug',$post_slug)->take(1)->get();
        $show_post=postTB::with('cate_post')->where('post_status',1)->where('post_slug',$post_slug)->take(1)->get(); 
        foreach ( $show_post as $key => $p) {
      // vế sau dấu = là lấy ở sql
         $meta_desc    =$p->post_meta_desc;
         $meta_keywords=$p->post_meta_keyword;
         $meta_title   =$p->cate_post_name;
         $cate_id      =$p->cate_post_id;
         $url_canonical=$request->url();
       //1 bài viết ở mục bài viết liên quan
         $cate_post_id=$p->cate_post_id;

       }


//bài viết liên quan --wherenotin(không nằm trong cái gì đó)
       $related=postTB::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->get();

 return view('pages.baiviet.xembaiviet')->with('category',$cate_product)->with('brand',$brand_product)
       ->with('all_product',$all_product)->with('show_cate_post',$show_cate_post)
       ->with('meta_desc ',$meta_desc )
       ->with('meta_keywords',$meta_keywords)->with('meta_title ', $meta_title )
       ->with('url_canonical',$url_canonical)->with('show_post',$show_post )
       ->with('related', $related);

     }

   }
