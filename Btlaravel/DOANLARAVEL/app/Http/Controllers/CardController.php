<?php

namespace App\Http\Controllers;
use Cart; // thư viện cart
use DB; // thêm dòng dùng database

// thêm 4 thư viện cho phần check và logout
//use Illuminate\Support\Facades\DB;
use Sesssion;
use Illuminate\Support\Facades\Redirect;
use Sesssion_start;
use Livewire\withFileUploads;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function save_cart(Request $request)

    {
      $productId= $request->productid_hidden;
      $quantity  =$request->qty;


    $product_info =DB::table('tbl_product')->where('product_id',$productId)->first();
    //thông tin dựa vào thông tin truyền vào

    //tạo giỏ hàng----- bước đầu tạo các trường 

// $data['id']=$product_info->product_id; // đằng trước là các trường mặc định sẵn của nó
    $data['id']=    $productId;
    $data['qty']=$quantity;

            // dd($data);
    $data['name']=$product_info->product_name;
    $data['price']=$product_info->product_price;
    $data['weight']=$product_info->product_price;
    $data['options']['image']=$product_info->product_image;

    // Cart::destroy();     //hủy hết các thao tác lưu sản phẩm
    Cart::add($data);
    return Redirect::to('/show-cart');

}

// trang giỏ hàng---------------------------------------//
public function show_cart()
{
// danh mục sp
    $cate_product= DB::table('tbl_category_product')->where('category_status','1')
    ->orderBy('category_id','desc')->get();
// thương hiệu		    	//
    $brand_product= DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
// danh mụ tin tức
    $show_cate_post=DB::table('tbl_category_post')->orderBy('cate_post_id','desc')->get();

    return view('pages.card.show_card')->with('category',$cate_product)
    ->with('brand',$brand_product)->with('show_cate_post',$show_cate_post);

}

    // xóa sp
public function delete_to_cart($rowId)
{
			//xóa sp dựa vào row id
    	Cart::update($rowId,0); // đưa sản phẩm về giá trị =0, coi như k tồn tại, nó sẽ biến ra khỏi giỏ hàng
    	return Redirect::to('/show-cart');

    }
    		// cập nhật số lượng của 1 sản phẩm
    public function update_cart_quantity(Request $request)
    {
			$rowId =$request->rowId_cart; // lây name ở show_cart.blade
			$qty = $request->quantity_cart;

			Cart::update($rowId,$qty);
           return Redirect::to('/show-cart');
       }

   }
