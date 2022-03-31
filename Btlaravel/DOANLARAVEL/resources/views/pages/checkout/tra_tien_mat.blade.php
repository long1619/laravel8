@extends('layout')
@section('content')

<style>
	#ig{
		margin: 80px;
	/*	width: auto;*/
	}
	#h1{
		color: red;
	}
</style>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
			
	
			
		</div>

		</div>

	  <marquee behavior="alternate"><h1 id ="h1"> Cảm Ơn Bạn Đã Đặt Hàng Ở Cửa Hàng Chúng Tôi. Chúng Tôi Sẽ Sớm Liên Hệ Với Bạn</h1> <br>

	  	 </marquee>
<img src="{{asset('public/frontend/images/thanks.jpg')}}" id="ig">



{{-- <marquee scrollamount="200" scrolldelay="3000" style="height: 50px; width: 1000px;">
<span style="color: red; font-size: 20px;">Blink Text</span>
</marquee> --}}

 
	</section> 
@stop