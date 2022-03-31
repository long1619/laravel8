<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sesssion;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start;
use Illuminate\Support\CollectionstdClass;
//model;
use DB;
use App\Models\Gallery;

class GalleryController extends Controller
{
     // tới trang thêm
  public function add_gallery($product_id)
  {		
   $pro_id =$product_id;

    return view('admin.gallery.add_gallery')->with(compact('pro_id'));                                                                                                                                 
  }  

                                                                                             
 public function select_gallery(Request $request)
 {
       	$product_id=$request->pro_id;  //pro_id lấy bên ajax
       	$gallery =Gallery::where('product_id',$product_id)->get();
       	//hàm đếm bao nhiêu ảnh
       	$gallery_count=$gallery->count();

       	$output='
        <form>
        '.csrf_field().'

        <table class="table table-hover">
        <thead>
        <tr>
        <th>Thứ Tự</th>
        <th>Tên Hình Ảnh</th>
        <th>Hình Ảnh</th>
        <th>Quản Lí</th>
        </tr>
        </thead>
        <tbody>

        ';

//nếu có ảnh
        if($gallery_count>0)
        {
          $i=0;

          foreach ($gallery as $key => $gall) {
           $i++;
       	 		//lặp lại
           $output.='
           <tr>	
           <td>'.$i.'</td>

           <td contenteditable class="edit_gal_name"data-gal_id= "'.$gall->gallery_id.'">'.$gall->gallery_name.'</td>


           <td><img src="'.url('public/upload/gallery/'.$gall->gallery_image).'" class="img-thumbnail" width="120" height="150"></td>

           <td><input type="file" class="file_image" style="with:40%"data-gal_id="'.$gall->gallery_id.'" 
           id="file-'.$gall->gallery_id.'" "name="file" accept="image/*"></td>

           <td><button type="button"data-gal_id="'.$gall->gallery_id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button></td>
           </tr>

           ';
         }
       }

       else{
        $output.='
        <tr>
        <td colspan="4">Sản Phẩm Chưa Thêm Thư Viện Ảnh</td>

        </tr>


        ';
      }
      $output.='
      </tbody>
      </table>
      </<form >



      ';

      echo $output;
    }

    public function update_gallery_name(Request $request)
    {
      //lấy bên ajax gửi qua
      $gal_id  =$request->gal_id;
      $gal_text=$request->gal_text;
      $gallery=Gallery::where($gal_id);
      $gallery->gallery_name=$gal_text;
      $gallery->save();


    }
    public function insert_gallery(Request $request, $pro_id)
    {
    	//name là file
    	$get_image=$request->file('file');
    	//nếu có ảnh
    	if(	$get_image)
    	{
    		foreach ($get_image as $key => $image) {


         $get_name_image= $image->getClientOriginalName();
         $name_image= current(explode('.',$get_name_image));
 $new_image = $name_image.'.'.$image->getClientOriginalExtension(); // lấy đuôi mở rộng
 $image->move('public/upload/gallery',$new_image);// thư mục

//model
 $gallery=new Gallery();
 $gallery->gallery_name =$new_image;
 $gallery->gallery_image=$new_image;
 $gallery->product_id   =$pro_id;
 $gallery->save();

}
return back()->with('mes','Thêm Thư Viện Ảnh Thành công');
}

else{
 return back()->with('mess','Yêu cầu phải chọn ảnh');
}
}


public function update_gallery(Request $request)
{
          //name là file
  $get_image=$request->file('file');
  $gal_id=$request->gal_id;
      //nếu có ảnh
  if( $get_image)
  {

   $get_name_image=$get_image->getClientOriginalName();
   $name_image= current(explode('.',$get_name_image));
   $new_image = $name_image.'.'.$get_image->getClientOriginalExtension(); // lấy đuôi mở rộng
        $get_image->move('public/upload/gallery',$new_image);// thư mục

  //model
        $gallery=Gallery::find( $gal_id);
        unlink('public/upload/gallery/'.$gallery->gallery_name);
        $gallery->gallery_name =$new_image;

        $gallery->save();

      }
    }
    public function delete_gallery(Request $request)
    {
      $gal_id= $request->gal_id;
      $gallery=Gallery::find($gal_id); 
      unlink('public/upload/gallery/'.$gallery->gallery_name);

      $gallery->delete();                                               
    }
  }
