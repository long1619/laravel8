@extends('layout')
@section('content')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('home')}}">Trang Chủ</a></li>
				  <li class="active">Thanh Toán Giỏ Hàng</li>
				</ol>
			</div><!--/breadcrums-->



		{{-- 	<div class="register-req">
				<p>Làm ơn đăng kí hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sủ mua hàng </p>
			</div> --}}
			<!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
			
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền Thông Tin Nhận Hàng</p>
							<div class="form-one">
<!------gửi thông tin form ------------------->

		<form action="{{url('save-checkout-customer')}}" method="POST">
							@csrf
				    <!---------validation--------------------->                     
    <span class="text-danger">  @error('shipping_email')Thông Tin email phải có dấu @  @enderror
      </span>			
			<input type="text" name="shipping_email" placeholder="Email*">
	    <!---------validation--------------------->                     
    <span class="text-danger">  @error('shipping_name')Nhập Thông Tin Tên Tối Thiểu 5 kí Tự  @enderror
      </span>	
			<input type="text" name="shipping_name" placeholder="Họ Và Tên *">

	    <!---------validation--------------------->                     
    <span class="text-danger">  @error('shipping_address')Nhập Thông Tin Địa Chỉ Tối Thiểu 5 kí Tự   @enderror
      </span>	
			<input type="text" name="shipping_address" placeholder="Địa Chỉ *">
			    <!---------validation--------------------->                     
    <span class="text-danger">  @error('shipping_phone')Nhập Số Điện Thoại Tối Thiểu 8 kí Tự    @enderror
      </span>		
			<input type="text" name="shipping_phone" placeholder="Số Điện Thoại *">
	   <span class="text-danger">  @error('shipping_phone') Không Được Bỏ Trống      
	   	@enderror
      </span>	
			<textarea name="shipping_note"   placeholder="Ghi Chú Đơn Hàng Của Bạn" rows="16"></textarea>


			<br>
			<br>
			<input type="submit" name="send_order" value="Xác Nhận Đơn Hàng"  style="color: gray" class ="btn btn-info btn-sm  ">

		</form>

<!--------------------------------------------------------------------->	
{{--   <form >
         @csrf             

 <div class="form-group">
     <label for="exampleInputPassword1">Chọn Thành Phố </label>
            <select name="city" id="city"class="form-control input-sm m-bot15 choose city">
                 <option value ="0">Chọn Tỉnh-Thành Phố</option>  
@foreach($city as $Key =>$ci)
          <option value ="{{$ci->matp}}">{{$ci->name_city}}</option>  
 @endforeach                           
                         
                 </select>  <br>
                          
             </div>  

              <div class="form-group">

     <label for="exampleInputPassword1">Chọn Quận Huyện </label>
<select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                <option value ="">Chọn Quận Huyện</option>  
                           
                         
                            </select>
                            <br>
             </div>    


              <div class="form-group">

     <label for="exampleInputPassword1">Chọn Xã Phường</label>
  <select name="wards" id="wards"class="form-control input-sm m-bot15 wards ">
                                <option value ="">Chọn Xã Phường</option>  
  </select>
                            <br>
             </div>      

              <div class="form-group">

     <label for="exampleInputPassword1">Phí Vận Chuyển</label> <br>
<input type="text" name="fee_ship" class="form-control fee_ship" >
                        
             </div>   
                        
<input type="submit" name="send_order" value="Tính Phí Vận Chuyển"  style="color: gray" class ="btn btn-info btn-sm  ">
                    
     </form>
 --}}



<!--------------------------------------------------------------------->

							</div>
					
						</div>
					</div>
									
				</div>
			</div>
			<br>	<br>	<br>
		
	<!------------------------------------------------------------------------------------------------Giỏ Hàng--------------------------------------------->

		
		<div class="container">
		
	<div class="table-responsive cart_info "> 

<!---- hiển thị nội dung------------------------>
	<?php

	$content=Cart::content();

	?> 

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình Ảnh</td>
							<td class="description">Tên Sản Phẩm </td>
							<td class="price">Giá</td>
							<td class="quantity">Số Lượng</td>
							<td class="total">Tổng Tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

 	@foreach($content as $key=>$v_content) 					
						<tr>
							<td class="cart_product">
				<a href=""><img src="{{url('public/upload/product/' .$v_content->options->image)}}"width="150" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4> <!-- lấy ra tên ---------->
								<p>Mã ID :{{$v_content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price ).' VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
<!---------------gửi 1 cái form--------------------------------------------------------->

		<form method="POST" action="{{url('update-cart-quantity')}}">
			@csrf
	<!-- ---------------------số lượng----------------------------------------->	
		<input class="cart_quantity_input" type="text" name="quantity_cart"
		 value="{{$v_content->qty}}" autocomplete="off" size="2"> 
							

								<!--lấy value rowId---->	
	<input type="hidden" value ="{{$v_content->rowId}}" name="rowId_cart"class="form-control ">	
			<input type="submit" value ="Cập Nhật" name="update_qty"class="btn btn-default btn-sm">				

		</form>
	
								</div>
							</td>
							<td class="cart_total">
<!----- ----------------------------------tính tổng tiền--------giá nhân số lượng ----------->					
								<p class="cart_total_price">
									
<?php

$subtotal= $v_content->price*$v_content->qty;

echo number_format($subtotal). ' VNĐ';

?>

								</p>
							</td>
							<!-- nút xóa--->
							<td class="cart_delete">
<a class="cart_quantity_delete" href="{{url('delete-to-cart/'.$v_content->rowId)}}   "><i class="fa fa-times"></i></a>
							</td>
						</tr>
			
					@endforeach 

					</tbody>
				</table>
		
		</div>
	</section> <!--/#cart_items-->

<!--form thanh toán---------------------------------------->
	<section id="do_action">
		<div class="container " >
		
			<div class="row" >
			
				<div class="col-sm-7">
					<div class="total_area">
						<ul>
		<!--------tính--->					
							<li>Tổng <span>{{Cart::total() .' VNĐ'}}</span></li>
							<li>Thuế <span>{{Cart::tax()}}</span></li>
							<li>Phí Vận Chuyển <span>Free</span></li>
							<li>Thành Tiền <span>{{Cart::total().' VNĐ'}}</span></li>
						</ul>
		

					{{--  --}}
<!-------------------------------------------------------------------------->
				<?php  
				// kiểm tra có tồn tại k. 
					$customer_id=session()->get('customer_id');
					if($customer_id!=NULL){
				?>
				<a class="btn btn-default check_out " href="{{url('/checkout')}}">Thanh Toán</a>
			<?php	
			}
				 else{
				 	?>		 	
	<a class="btn btn-default check_out " href="{{url('/login-check-out')}}">Đăng Nhập</a>
		<?php 
				 }
		?>

<!-------------------------------------------------------------------------->


					</div>
				</div>
			</div>
		</div>
	

			</div>


		</div>
	</section> <!--/#cart_items-->
@stop