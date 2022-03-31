<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB; // thêm dòng dùng database

use App\Models\postTB;
// thêm 4 thư viện cho phần check và logout
//use App\Http\Request;
use Sesssion;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start;
use App\Models\statistical;
use App\Models\visitor;
use App\Models\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Models\Login; //sử dụng model Login

/*------------------------------------------------------------*/
class adminController extends Controller
{
      public function getadmin () //login admin
      {
      	return view ('adminLogin'); 
      }

   public function getShowadnin()
{ 
      // đếm - để hiển thị lên biểu đồ tròn
$count_product=DB::table('tbl_product')->count();
$count_customer=DB::table('tbl_customer')->count();
$count_order=DB::table('tbl_order')->count();

$count_post =postTB::all()->count();

      	return view ('admin.dashboad');
            // ->with(compact('count_product','count_customer','count_order','count_post'));
}

      /*-------------------------------hàm request from -----------------------------*/
      public function postShowadnin(Request $request)
      {
      	/*vế trước là tự đặt*/	
        $admin_email=$request->admin_email;
      	$admin_password=md5($request->admin_password);

// lấy email và password từ mysql đổ lên biến
      	$result =DB::table('tbl_admin')
      	->where('admin_email',$admin_email)
      	->where('admin_password',$admin_password)->first();	
      	if($result) 
      	{ 
				            //lấy admin name ở sql//// session put là đặt
      		$data = $request->session()->put('admin_name',$result->admin_name);
      		$data = $request->session()->put('admin_id',$result->admin_id);

				// trả về trang admin có router là /dashboad khi đăng nhập thành công
      		return redirect('/dashboad');
      	}
      	else{
					// nếu nhập sai đá về trang login và có 1 message thông báo lỗi
												// tên báo lỗi , lời cảnh báo( sessio flash)
      		return redirect('/admin')->with('error','Tài Khoản Hoặc Mật Khẩu Không Đúng! Vui Lòng Nhập Lại !');

      	}
      }
		    // đăng xuất
      public function getlogout(Request $request)
      {
      	$request->session()->forget('admin_id');

      	$request->session()->forget('admin_name');
      	return redirect('/admin');
      }
// Thống kê doanh số
      public function filter_by_date(Request $request)
      {
            $data =$request->all();
            $from_date =$data['from_date'];
            $to_date =$data['to_date']; //whereBetween phải bỏ vào ngoặc vuông vì nó là chuỗi
            $get=statistical::whereBetween('order_date',[ $from_date,$to_date ])
            ->orderBy('order_date','ASC')->get();

            foreach ($get as $key => $val) {
             $chart_data[]=array(
      // đằng sau là lấy ở sal
                  'period' =>$val->order_date,
                  'order'=>$val->total_order,
                  'sales'=>$val->sales,
                  'profit'=>$val->profit,
                  'quantity'=>$val->quantity



            );
             echo $data =json_encode($chart_data);
       }


 }
//
 public function dashboad_filter(Request $request)
 {
      $data= $request->all();
      $dauthangnay =Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
      $dau_thangtruoc =Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
      $cuoi_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

      $sub7days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
      $sub365days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();


      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            //dashboad_value lấy bên admin layout khai báo lấy value
      if($data ['dashboad_value']=='7ngay') {

          $get =statistical::whereBetween('order_date',[$sub7days,$now])
          ->orderBy('order_date','ASC')->get();

    }

    elseif($data ['dashboad_value']=='thangtruoc') {

          $get =statistical::whereBetween('order_date',[ $dau_thangtruoc,$cuoi_thangtruoc])
          ->orderBy('order_date','ASC')->get();

    }

    elseif($data ['dashboad_value']=='thangnay') {

          $get =statistical::whereBetween('order_date',[ $dauthangnay,$now])
          ->orderBy('order_date','ASC')->get();

    }
    else{

          $get =statistical::whereBetween('order_date',[$sub365days,$now])
          ->orderBy('order_date','ASC')->get();

    }

    foreach ($get as $key => $val) {
          $chart_data[]=array(
      // đằng sau là lấy ở sal
            'period' =>$val->order_date,
            'order'=>$val->total_order,
            'sales'=>$val->sales,
            'profit'=>$val->profit,
            'quantity'=>$val->quantity



      );
          echo $data =json_encode($chart_data);

    }

}

public function day_order()
{
      $sub30days =Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
      $get =statistical::whereBetween('order_date',[$su30days,$now])
      ->orderBy('order_date','ASC')->get();   

      foreach ($get as $key => $val) {
          $chart_data[]=array(
      // đằng sau là lấy ở sal
            'period' =>$val->order_date,
            'order'=>$val->total_order,
            'sales'=>$val->sales,
            'profit'=>$val->profit,
            'quantity'=>$val->quantity



      );
          echo $data =json_encode($chart_data);

    }


}


}
