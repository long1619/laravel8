<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB; // thêm dòng dùng database

// thêm 4 thư viện cho phần check và logout
//use Illuminate\Support\Facades\DB;
use Sesssion;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start; 
use Illuminate\Support\CollectionstdClass;
use Illuminate\Pagination\Paginator;
// use App\Models\product;
// use App\Models\categoryProduct;
// khai báo biến
 // class ContainString{
 //    constant string tb='tnl_category_nsme';
 // }
 
class categoryProduct extends Controller 
{
    public function add_category_product()
    {
       return view ("admin.add_category_product");
   }
// hien thi danh sách
   public function all_category_product()

   {
       Paginator::useBootstrap();
      // use WithPagination;
						// lấy hết tất cả dữ liệu --- gán vào biến $all_category_product
       $all_category_product= DB::table('tbl_category_product')->orderBy('category_name','desc')->orderBy('category_desc','desc')->orderBy('category_status','desc')->paginate(5); 


       return view ('admin.all_category_product')->with('all_category_product',$all_category_product);

   }
       // thêm danh mục
     public function save_category_product(Request $request) // yêu cầu
     {
     	$data =array();     	
     	 // đằng trước lấy name ở csdl /// đằng sau lấy name input emai

        // [ContainString().tb]
     	$data['category_name']=$request->category_product_name;
     	$data['category_desc']= $request->category_product_desc;
     	$data['category_status']= $request->category_product_status;

//check validation-------
        $validated = $request->validate([
            'category_product_name' => 'required|min:0',
            'category_product_desc' => 'required|min:0',
        ]);

     	DB::table('tbl_category_product')->insert($data); // thêm csdl
     	return back()->with('mes','Thêm Thành công');

     }

// tới trang sửa
     public function edit_category_product1($id)
     {
        $edit_value= DB::table('tbl_category_product')->where('category_id',$id)->get()->first();
        return view('admin.edit_category_product',compact('edit_value'));
    }

// cập nhật dữ liệu khi sửa xong
    public function update_category_product(Request $request, $id)
    {
//check validation-------
        $validated = $request->validate([
            'category_product_name' => 'required|min:3',
            'category_product_desc' => 'required|min:5',
        ]);
        $data = $request->except('_token', 'id');
        DB::table('tbl_category_product')->where('category_id',$id)
        ->update([
           'category_name' => $request->category_product_name,
           'category_desc' => $request->category_product_desc,
           'category_status' => $request->category_product_status
       ]);

        return redirect("/all-category-product")->with('mes','Cập Nhật Sản Phẩm Thành công');

    }

// xóa
    public function delete_category_product1($id)
    {
     DB::table('tbl_category_product')->where('category_id',$id)->delete();

     return redirect("/all-category-product");
 }
///-------Kết thúc phần admin---------------------------------------------

// show 1 danh mục của SP  --- k phải trang home --- ghi các biến khác để tránh bị lỗi
 public function show_category_home($category_id)
 {
     $cate_product= DB::table('tbl_category_product')->where('category_status','1')
     ->orderBy('category_id','desc')->get();
                    //
     $brand_product= DB::table('tbl_brand')->where('brand_status','1')
     ->orderBy('brand_id','desc')->get();

     $category_name=DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->get();

     $show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();

// lấy ra 1 danh mục của sản phẩm
     // $category_by_id=DB::table('tbl_product')
     // ->join('tbl_category_product','tbl_product.category_id', '=' ,'tbl_category_product.category_id')
     // ->where('tbl_product.category_id',$category_id)->get();
     //---------------------------------------------------------
     //sort_by lấy ở home blade
// if(isset($_GET['sort_by']))
// {
//     $sort_by =$_GET['sort_by']
//     if($sort_by=='giamdan'){
//       // $category_by_id=product::with('category')->where('category_id',$category_id)->orderBy('product_price','DESC');
//         $category_by_id=DB::table('tbl_product')
//   ->join('tbl_category_product','tbl_product.category_id', '=' ,'tbl_category_product.category_id')
//   ->where('tbl_product.category_id',$category_id)->orderBy('product_price','DESC');

//     }
// else{
  
// }

// }
  $category_by_id=DB::table('tbl_product')
  ->join('tbl_category_product','tbl_product.category_id', '=' ,'tbl_category_product.category_id')
  ->where('tbl_product.category_id',$category_id)->get();

     //--------------------------------------------------
     return view('pages.category.show_category')->with('category',$cate_product)
     ->with('brand',$brand_product)
     ->with('category_by_id',$category_by_id)
     ->with('category_name',$category_name)->with('show_cate_post',$show_cate_post);
 }  
}
