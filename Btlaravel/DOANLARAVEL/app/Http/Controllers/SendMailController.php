<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\TestMail;
use DB;
use Sesssion;
//-thư viện string
use Illuminate\Support\Str;
use Carbon\Carbon;
// use Customer\Customer;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start;

// use Illuminate\Support\Facades\Mail;
class SendMailController extends Controller
{
 public function send_mail()
 {

         	// use testMail
  $details=[
   'title'=>'Xin Chào : ',
   'body'=>'Cảm Ơn Bạn Đã Xem :'
 ];
 Mail::to('duclong1619@gmail.com')->send( new TestMail($details));
 return 'Gửi Thành Công';
}
  //-------------------------------------------------------------//

// nhảy vào from quên mật khẩu
public function quen_mat_khau()
{//-------------------------vì kế thừa nên nó cũng kế thừa luôn dữ liệu ------------------------
 $cate_product= DB::table('tbl_category_product')
 ->where('category_status','0')
 ->orderBy('category_id','desc')->get()->toArray();
            //
 $brand_product= DB::table('tbl_brand')
 ->where('brand_status','0')
 ->orderBy('brand_id','desc')->get()->toArray(); 

//---- hiển thị sản phẩm -------------------------------------------

 $all_product= DB::table('tbl_product') 
 ->where('product_status','1')
       ->orderBy('product_id','desc')->limit(10)->get(); //limit 10 nghĩa là cho tối da 6 sản phẩm
       return view('pages.checkout.quenmatkhau')->with('category',$cate_product)
       ->with('brand',$brand_product)->with('all_product',$all_product);

   //--------------------------------------------------------------
     }
     public function recover_pass(Request $request)

     {
     // Cartbon::now('Asia/Ho_Chi_Minh')
       $data=$request->all();
       $now=Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y');
       $title_mail="lấy lại mật khẩu :".''.$now;
         // $customer =Customer::where('customer_email','=',$data['email_account'])->get();
       $customer=DB::table('tbl_customer')->where('customer_email','=',$data['email_account'])->get();


  // foreach ($customer as $key => $value) {
  //  $customer_id =$value->customer_id;
  // }

       if($customer)
       {
         $count_customer =$customer->count();
         if($count_customer==0)
         {
          return redirect()->back()->with('error','Email này chưa được đăng kí');
        }
        else{
        $token_random =Str::random(); // random ngẫu nhiên chuỗi  ->find($customer_id);

        $customer=DB::table('tbl_customer')->where('customer_id')->first();
        // $customer->customer_token=$token_random;
        // $customer->save();



        //send mail
        $to_email=$data['email_account'];
        $link_reset_pass=url('/update-new-pass?email='.$to_email.'&token='.$token_random);

        $data=array('name' =>$title_mail ,"body"=>$link_reset_pass,'email'=>$data['email_account'] );

        Mail::send('pages.checkout.forget_pass_notify',['data'=>$data], function($message)use($title_mail,$data){

          $message->to($data['email'])->subject($title_mail);
          $message->from('email',$title_mail);



        });
        return redirect()->back()->with('message','Gửi Mail Thành Công ! Vui Lòng Vào Mail Để Resert Password ');
      }

      
    }







//      }
  }
}
