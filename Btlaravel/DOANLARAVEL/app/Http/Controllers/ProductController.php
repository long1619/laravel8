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
use Illuminate\Pagination\Paginator;
use App\Models\Gallery;

class ProductController extends Controller
{
  public function add_product() 

  { 
    	// khai báo 2 biến để lấy
   $cate_product= DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
		    	//
   $brand_product= DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
		    									// lấy tên biến khai báo
   return view ("admin.add_product")->with('cate_product',$cate_product)->with('brand_product',$brand_product);
 }
// hien thi danh sach full
 public function all_product()
 {
  Paginator::useBootstrap();
	// lấy hết tất cả dữ liệu --- gán vào biến $all_category_product ----------------orderBy('product_id','desc')->get();----join là tham gia
  $all_product= DB::table('tbl_product')
  ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
  ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
  ->orderBy('tbl_product.product_id','desc')->paginate(5);
  return view ('admin.all_product')->with('all_product',$all_product);
}

  // thêm danh mục
     public function save_product(Request $request) // yêu cầu
     {
     	$data =array();     	 
     	 // đằng trước lấy name ở csdl /// đằng sau lấy name input email
     	$data['product_name']=$request->product_name;
     	$data['product_price']= $request->product_price;
      $data['product_quantity']= $request->product_quantity;
      $data['product_desc']= $request->product_desc;
      $data['product_content']=$request->product_content;
     	$data['category_id']= $request->product_cate; // lấy từ bên add_product
     	$data['brand_id']= $request->product_brand;
     	$data['product_status']= $request->product_status;

     	$get_image= $request->file('product_image');   
//check validation-------
      $validated = $request->validate([
        'product_name' => 'required|min:3',
        'product_desc' => 'required|min:3',
        'product_price' => 'required|min:4',
        'product_image' => 'required',
        'product_content' => 'required|min:3',

      ]);
//tạo trường image-----------------------------------------------
     	//kiểm tra tồn tại cái get image thì....
      if($get_image)
      {
       $get_name_image=$get_image->getClientOriginalName();
       $name_image= current(explode('.',$get_name_image));
     		$new_image = $name_image.'.'.$get_image->getClientOriginalExtension(); // lấy đuôi mở rộng
     		$get_image->move('public/upload/product',$new_image);// thư mục

     				// tên trong sql

     	$data['product_image']=$new_image; // nếu chọn ảnh
     	DB::table('tbl_product')->insert($data); // thêm csdl
     	return back()->with('mes','Thêm  Sản Phẩm Thành công');
     }
     $data['product_image']='';
     	DB::table('tbl_product')->insert($data); // thêm csdl
     	return back()->with('mes','error');

//check validation-------
      $validated = $request->validate([
        'product_name' => 'required|min:3',

      ]);
    }	
//trang sửa sản phẩm
  public function edit_product1($id)
    {	
     $cate_product= DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

     $brand_product= DB::table('tbl_brand')->orderBy('brand_id','desc')->get();

     $edit_product= DB::table('tbl_product')->where('product_id',$id)->get();

     return view('admin.edit_product')->with('cate_product',$cate_product)
     ->with('brand_product',$brand_product)
     ->with('categoryProduct',$cate_product)
     ->with('edit_product',$edit_product);
   }

// cập nhật khi sửa lại các thông tin sản phẩm
   public function update_product(Request $request, $id)
   {
        //check validation-------
    $validated = $request->validate([
      'product_name' => 'required|min:3',
      'product_desc' => 'required|min:3',
      'product_quantity ' => 'required|min:1',
      'product_price' => 'required|min:4',
      // 'product_image' => 'required',
      'product_content' => 'required|min:3' 
    ]);
        //----------------------------------
    $data =array();
    $data['product_name']    =$request->product_name;
    $data['product_price']   =$request->product_price;
    $data['product_quantity']= $request->product_quantity;
    $data['product_desc']    =$request->product_desc;
    $data['product_content'] =$request->product_content;
    $data['category_id']     =$request->product_cate;
    $data['brand_id']        =$request->product_brand;
    $data['product_status']  =$request->product_status;
 // thay đổi ảnh
    $get_image= $request->file('product_image');
    $get_name_image=$get_image->getClientOriginalName();
    $name_image= current(explode('.',$get_name_image));
 $new_image = $name_image.'.'.$get_image->getClientOriginalExtension(); // lấy đuôi mở rộng
 $get_image->move('public/upload/product',$new_image);// thư mục
                     // tên trong sql 
            $data['product_image']=$new_image; // nếu chọn ảnh
        DB::table('tbl_product')->where('product_id',$id)->update($data); // thêm csdl
        return Redirect("/all-product")->with('mes','Cập Nhật Sản Phẩm Thành công');
      }

 // xóa
      public function delete_product1($id)
      {
       DB::table('tbl_product')->where('product_id',$id)->delete();
        	//return back()->with('mess', xóa );
     
       return redirect("/all-product");

     }
 //----------------trang chi tiết của sản phẩm--------------------------------------//
public function show_product($product_id)
     {

$cate_product= DB::table('tbl_category_product')->where('category_status','1')
  ->orderBy('category_id','desc')->get();
                       //
$brand_product= DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')
  ->get();

$show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();  

// hiển thị chi tiết sản phẩm---------------------------------
$details_product= DB::table('tbl_product')
      ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
      ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
      ->where('tbl_product.product_id',$product_id)->get();
//--- sản phẩm liên quan------------------------------------------
      foreach ( $details_product as $key => $value) 
     { // laaysd danh mục sản phẩm
     // lấy ra category_id
       $category_id= $value->category_id;
       $product_id =$value->product_id;
     }
//--------------
     $gallery=Gallery::where('product_id',$product_id)->get();                
//---------------------
     $related_product= DB::table('tbl_product')
     ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
     ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_category_product.category_id',$category_id)
     ->whereNotIn('tbl_product.product_id',[$product_id])->get();
                        //lấy ra danh mục có các sản phẩm trong đó
     return view('pages.sanpham.show_detials')->with('category',$cate_product)
     ->with('brand',$brand_product)->with('product_details',$details_product)
     ->with('realte',$related_product)->with('show_cate_post',$show_cate_post)
     ->with('gallery',$gallery);;
   }

 }