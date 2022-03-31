<?php
// check 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart; // thư viện cart
use DB; // thêm dòng dùng database 
use Sesssion; 
use Illuminate\Support\Facades\Redirect;
 // use Sesssion_start;
use Livewire\withFileUploads;

class checkOutController extends Controller
{
	public function login_check_out() //tới form đăng kí đăng nhập
	{
		$cate_product= DB::table('tbl_category_product')->where('category_status','1')
		->orderBy('category_id','desc')->get();    	//
		$brand_product= DB::table('tbl_brand')->where('brand_status','1')
		->orderBy('brand_id','desc')->get();
		$show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();

		return view('pages.checkout.login_check_out')->with('category',$cate_product)
		->with('brand',$brand_product)->with('show_cate_post',$show_cate_post);

	}
//tới form thông tin đặt gửi hàng-- giống form đăng kí
	public function checkout()
	{
		$cate_product= DB::table('tbl_category_product')->where('category_status','1')
		->orderBy('category_id','desc')->get();	    	
		$brand_product= DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get(); 
    //tên danh mục bài viết
		$show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();

		return view('pages.checkout.show_check_out')->with('category',$cate_product)
		->with('brand',$brand_product)->with('show_cate_post',$show_cate_post);
	}

// lưu các thông tin ở form xác nhận đơn hàng gửi (shipping)
	public function save_checkout_customer(Request $request)
	{
    // check validation	
		$validated = $request->validate([
			'shipping_email' => 'email',
			'shipping_name' => 'required|min:5',
			'shipping_address' => 'required|min:5',
			'shipping_phone' => 'required|min:8',
			'shipping_note' => 'required|min:3',


		]);
		$data =array();
 	// vế trước lấy các trường ở csdl -- vế sau lấy các ô  ở phần check_out layout
		$data['shipping_email']=$request->shipping_email;
		$data['shipping_name']=$request->shipping_name;
		$data['shipping_address']=$request->shipping_address;
		$data['shipping_phone']=$request->shipping_phone;
		$data['shipping_note']=$request->shipping_note;
		
		$shipping_id= DB::table('tbl_shipping')->insertGetId($data);
			//phiên giao dịch..
		session()->put('shipping_id' ,$shipping_id);
				// Sesssion::put('customer_id' ,$insert_customer->customer_id);

			return Redirect('pay-ment'); //tới cái trang thanh toán
		}


// Trang thanh toán
		public function pay_ment()
		{
			$cate_product= DB::table('tbl_category_product')->where('category_status','1')
			->orderBy('category_id','desc')->get();
		    	//
			$brand_product= DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();  

		   //tên danh mục bài viết
			$show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();

			return view('pages.checkout.pay_ment')->with('category',$cate_product)
			->with('brand',$brand_product)->with('show_cate_post',$show_cate_post);

		}
//Trang Đặt Hàng-------
		public function order_place(Request $request)
		{    

// lấy hình thức thanh toán-----(insert payment)
			$data =array();
 			// vế trước lấy các trường ở csdl -- vế sau lấy các ô input 
			$data['payment_method']=$request->paymen_option;
 			$data['payment_status']='Đang Chờ Xử Lý '; // tình trạng xử lí
 			$payment_id= DB::table('tbl_payment')->insertGetId($data);

// insert order-------------
 			$orderdata =array();
 			// vế trước lấy các trường ở csdl tbl_order -- vế sau lấy các ô input
 			$orderdata['customer_id']=session()->get('customer_id'); //điền rồi
 			$orderdata['shipping_id']=session()->get('shipping_id');
 			$orderdata['payment_id']=$payment_id;
 			$orderdata['order_total']=Cart::total(); // tổng đơn hàng
 			$orderdata['order_status']='Đang Chờ Xử Lý';
 			$order_id= DB::table('tbl_order')->insertGetId($orderdata);


 			$content= Cart::content();
foreach ($content as $key => $v_content)//vòng lặp chạy sp
{
	$orderDdata =array();
 	// vế trước lấy các trường ở csdl order_detail -- vế sau lấy giá trị thuộc tính của Cart
 			$orderDdata['order_id']=$order_id; //điền rồi
 			$orderDdata['product_id']=$v_content->id;
 			$orderDdata['product_name']=$v_content->name;
 			$orderDdata['product_price']=$v_content->price; // tổng đơn hàng
 			$orderDdata['product_sales_quantity']=$v_content->qty;

 			DB::table('tbl_order_details')->insert($orderDdata);
 		}	
		 // điều kiện chọn
 		if(	$data['payment_method']==1)
 		{

 			echo 'Thẻ ATM';
 		}
 		elseif ($data['payment_method']==2)
 		{
			  	// hủy tất cả các sp    // Cart::destroy();
 			$cate_product= DB::table('tbl_category_product')->where('category_status','1')
 			->orderBy('category_id','desc')->get();
				    	//
 			$brand_product= DB::table('tbl_brand')->where('brand_status','1')
 			->orderBy('brand_id','desc')->get(); 

		   //tên danh mục bài viết
 			$show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();
 			return view ('pages.checkout.tra_tien_mat')->with('category',$cate_product)
 			->with('brand',$brand_product)->with('show_cate_post',$show_cate_post);
 		}

 		else{

 			echo 'thẻ ghi nợ';
 		}

 	}

//Đăng kí tài khoản------------
 	public function add_customer(Request $request)
 	{
	       // check validation	
 		$validated = $request->validate([
 			'customer_name' => 'required|min:3',
 			'customer_email' => 'email',
 			'customer_password' => 'required|min:5',
 			'customer_phone' => 'required|min:8',
 		]);

 		$data =array();
 	// vế trước lấy các trường ở csdl -- vế sau lấy các ô  ở phần check_out layout
 		$data['customer_name']=$request->customer_name;
 		$data['customer_email']=$request->customer_email;
 		$data['customer_password']=md5($request->customer_password);
 		$data['customer_phone']=$request->customer_phone;

 		$customer_id= DB::table('tbl_customer')->insertGetId($data);
			//phiên giao dịch..
 		session()->put('customer_id' ,$customer_id);
 		session()->put('customer_name' ,$request->customer_name);
 		return redirect('/login-check-out')->with('success','Đăng Kí Tài Khoản Thành Công !');

 	}
//đăng nhập tài khoản---------
 	public function login_customer(Request $request)
 	{
 		$email =$request->email_account;
 		$password= md5($request->password_account);
  			//kt so sánh với csdl
 		$result =DB::table('tbl_customer')->where('customer_email',$email)
 		->where('customer_password',$password)->first();
 		if($result) 
		// khi có kết quả
 		{
 			$request->session()->put('customer_id',$result->customer_id);
 			$request->session()->put('customer_email',$result->customer_email);
 			$request->session()->put('customer_password',$result->customer_password);
 			return Redirect('/checkout');
 		}

 		else
 		{
 			return Redirect('/login-check-out')->with('error','Tài Khoản Hoặc Mật Khẩu Không Đúng! Vui Lòng Nhập Lại !');				
 		}
 	}
// đăng xuất tài khoản------
 	public function logout_check_out(Request $request)
 	{
 		$request->session()->forget('customer_id');
 		$request->session()->forget('customer_email');
		//	session()->flush();
 		return Redirect('/login-check-out');
 	}




// quản lí đơn hàng (hiển thị tất cả đơn hàng)------------phần của admin
 	public function manager_order()
 	{
 		$all_order =DB::table('tbl_order')
 		->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
 		->select('tbl_order.*','tbl_customer.customer_name')
 		->orderBy('tbl_order.order_id','desc')->get();

 		return view('admin.manager_order')->with('all_order',$all_order);
 	}

 // Xem Đơn Hàng 
 	public function view_orderid($id)
 	{ 
// join các bảng lại
 		$view_order_by_id =DB::table('tbl_order')
 		->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
 		->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
 		->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
 		->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')->first();
 		$order=DB::table('tbl_order')->where('order_id',$id)->get();

// $tblproduct= DB::table('tbl_product')->get();
 		return view('admin.view_order')->with('view_order_by',$view_order_by_id )
 		->with('orders',$order);
 			// ->with('tblproduct',$tblproduct);

// $manage_order_id= view('admin.view_order')->with('view_order1 ',$view_order_by_id );
// return view('adminLayout')->with('admin.view_order',$manage_order_id);
 	}

 }


