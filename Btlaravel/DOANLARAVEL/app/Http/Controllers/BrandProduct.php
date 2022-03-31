<?php

namespace App\Http\Controllers;
use DB; // thêm dòng dùng database

// thêm 4 thư viện cho phần check và logout
//use Illuminate\Support\Facades\DB;
use Sesssion;
use Illuminate\Support\Facades\Redirect; 
use Sesssion_start;
use Illuminate\Http\Request;
use Livewire\withFileUploads;
//-----------
use App\Models\Brand;   // của model brand 

use Illuminate\Pagination\Paginator;

class BrandProduct extends Controller 
{ 
 public function add_brand_product()
 {
 		return view ("admin.add_brand_product"); // hiển thị trang thêm thương hiệu
  }
// hien thi danh sach 
  public function all_brand_product()
  {
    Paginator::useBootstrap();
    $all_brand_product =Brand::orderBy('brand_id','DESC')->paginate(3);  

    return view ('admin.all_brand_product')->with('all_brand_product',$all_brand_product);

  }
// thêm danh mục
     public function save_brand_product(Request $request) // yêu cầu
     { 
        //check validation
      $validated = $request->validate
      ([
        'brand_product_name' => 'required|min:0',
        'brand_product_desc' => 'required|min:0',
      ]);

// dùng model-----------------
      $data = $request->all();
     $brand =new Brand(); // chữ Brand lấy tên name tạo model
     // đằng trước là name csdl -- đằng sau là name của các ô input
     $brand->brand_name =$data ['brand_product_name'];
     $brand->brand_desc = $data ['brand_product_desc'];
     $brand->brand_status = $data ['brand_product_status'];
     $brand->save();

//--- đây là cách k dùng model mà gọi table trực tiếp
     	// $data =array();     	
     	//  // đằng trước lấy name ở csdl /// đằng sau lấy name input email
     	// $data['brand_name']=$request->brand_product_name;
     	// $data['brand_desc']= $request->brand_product_desc;
     	// $data['brand_status']= $request->brand_product_status;
          // DB::table('tbl_brand')->insert($data); // thêm csdl
     return redirect('add-brand-product')->with('mes','Thêm Thương Hiệu Sản Phẩm Thành công');
   }


//tới trang sửa		
   public function edit_brand_product1($id)
    {	      //dùng model-----
        // $edit_brand= Brand::where('brand_id',$id)->get();

        //  return view('admin.edit_brand_product')->with('edit_brand_1',$edit_brand);
        // và bên view dùng foreach

		         // dùng gọi trực tiếp---------
     $edit_value= DB::table('tbl_brand')->where('brand_id',$id)->first();
     return view('admin.edit_brand_product',compact('edit_value'));
   }

// khi sửa xong ấn cập nhật 
   public function update_brand_product(Request $request, $id)
   {
    // check validation    
    $validated = $request->validate
    ([
      'brand_product_name' => 'required|min:3',
      'brand_product_desc' => 'required|min:3',
    ]);
// dùng model-----
    $data = $request->all();
    $brand =Brand::find($id) ;
     // đằng trước là name csdl -- đằng sau là name của các ô input
    $brand->brand_name =$data ['brand_product_name'];
    $brand->brand_desc = $data ['brand_product_desc'];
    $brand->brand_status = $data ['brand_product_status'];
    $brand->save();

        // gọi trực tiếp table csdl-------------

      //   	$data = $request->except('_token', 'id');
      //      DB::table('tbl_brand')->where('brand_id',$id)->
      // update([
      // 	'brand_name' => $request->brand_product_name,
      // 	'brand_desc' => $request->brand_product_desc,
      // ]);
    return redirect("/all-brand-product")->with('mes','Cập Nhật Sản Phẩm Thành công');

  }

  public function delete_brand_product1($id)
  {
   DB::table('tbl_brand')->where('brand_id',$id)->delete();

   return redirect("/all-brand-product");

 }

 //-------ket thuc admin----------------------------------------------------------

     // hiển thị thương hiệu khi click vào các danh mục
 public function show_brand_home($brand_id)
 {
  $cate_product= DB::table('tbl_category_product')->where('category_status','1')
  ->orderBy('category_id','desc')->get();
  
  $brand_product= DB::table('tbl_brand')->where('brand_status','1')
  ->orderBy('brand_id','desc')->get();

  $brand_by_id=DB::table('tbl_product')
  ->join('tbl_brand','tbl_product.brand_id', '=' ,'tbl_brand.brand_id')
  ->where('tbl_product.brand_id',$brand_id)->get();
                                //brand_id truyền vào
// lấy id name hiển thị        brand_product_desc
  $brand_name=DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->get();

  $show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();     

  return view('pages.brand.show_brand')->with('category',$cate_product)
  ->with('brand',$brand_product)
  ->with('brand_by_id',$brand_by_id)->with('brand_name_1',$brand_name)->with('show_cate_post',$show_cate_post);
}

}
