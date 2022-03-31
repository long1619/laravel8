@extends('layout')
@section('content')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('home')}}">Trang chủ</a></li>
				  <li class="active">Thanh Toán Giỏ Hàng</li>
				</ol>
			</div><!--/breadcrums-->



			
			<div class="review-payment">
				<h2>Xem Lại Giỏ Hàng</h2>

				<!------------------>
			<div class="table-responsive cart_info"> 

<!---- hiển thị nội dung---------------->
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

			<!------------------>
			</div>

	<!--------------------------------------------------------------------------->
 <h4>Chọn Hình Thức Thanh Toán </h4>
 <br> <br>
  
  <form action="{{url('order-place')}}" method="POST">
  	@csrf


 <!--giá trị =1 thẻ atm . bằng 2 là trả tiền mặt----->
			<div class="payment-options">
					<span>
						<label><input type="checkbox" value="1 " name ="paymen_option"> TRả Bằng Thẻ ATM</label>
					</span>
					<span>
						<label><input type="checkbox" value="2" name ="paymen_option"> Trả Tiền Mặt</label>
					</span>

					<span>
						<label><input type="checkbox" value="3" name ="paymen_option"> Thẻ Ghi Nợ </label>

		<input type="submit" name="sent_order" value="Đặt Hàng" class="btn btn-info btn-sm">
					</span


			</div>


  </form>
		</div>
	</section> <!--/#cart_items-->
@stop