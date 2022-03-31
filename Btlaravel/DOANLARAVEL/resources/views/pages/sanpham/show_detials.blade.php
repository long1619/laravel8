<!-- trang chi tiết---->
@extends('layout')
@section('content') 

@foreach($product_details as $Key=>$value)
<div class="product-details"> 
	<!--product-details-->
	<div class="col-sm-6">
		<div class="{{-- preview col --}}">
			<img src="" alt="" />
			<div class="app-figure" id="zoom-fig">
				<a id="Zoom-1" class="MagicZoom" 
				href="{{url('public/upload/product/'.$value->product_image)}}?h=1400"
				data-zoom-image-2x="{{url('public/upload/product/'.$value->product_image)}}?h=2800"
				data-image-2x="{{url('public/upload/product/'.$value->product_image)}}?h=800"
				>
				<img src="{{url('public/upload/product/'.$value->product_image)}}?h=400"
				srcset="{{url('public/upload/product/'.$value->product_image)}}?h=800 2x"
				alt=""/>
			</a>
			<div class="selectors">
				<!--lấy hình ảnh 1 product để ở phần bên dưới--->
				<a
				data-zoom-id="Zoom-1"
				href="{{url('public/upload/product/'.$value->product_image)}}?h=1400"
				data-image="{{url('public/upload/product/'.$value->product_image)}}?h=400"
				data-zoom-image-2x="{{url('public/upload/product/'.$value->product_image)}}?h=2800"
				data-image-2x="{{url('public/upload/gallery/'.$value->product_image)}}?h=800"
				>
				<img srcset="{{url('public/upload/product/'.$value->product_image)}}?h=120 2x" 
				src="{{url('public/upload/product/'.$value->product_image)}}?h=60"/>
			</a>
			@foreach($gallery as $Key=>$gall)

			<a
			data-zoom-id="Zoom-1"
			href="{{url('public/upload/gallery/'.$gall->gallery_image)}}?h=1400"
			data-image="{{url('public/upload/gallery/'.$gall->gallery_image)}}?h=400"
			data-zoom-image-2x="{{url('public/upload/gallery/'.$gall->gallery_image)}}?h=2800"
			data-image-2x="{{url('public/upload/gallery/'.$gall->gallery_image)}}?h=800"
			>
			<img srcset="{{url('public/upload/gallery/'.$gall->gallery_image)}}?h=120 2x" 
			src="{{url('public/upload/gallery/'.$gall->gallery_image)}}?h=60"/>
		</a>
		@endforeach


	</div>
</div>


</div>
<div class="api-controls">

	<button class="cfg-btn" onclick="MagicZoom.prev('Zoom-1')">Trước</button>
	<button class="cfg-btn" onclick="MagicZoom.next('Zoom-1')">Sau</button>
	
</div>




</div>



<div class="col-sm-6">
	<div class="product-information"><!--/product-information-->
		<img src="images/product-details/new.jpg" class="newarrival" alt="" />
		<h2>{{$value->product_name}}</h2>
		<p>Mã ID: {{$value->product_id}}</p>
		<img src="images/product-details/rating.png" alt="" />


		<!--tạo form để gửi thông tin giỏ hàng------------------------->	
		<form  method="POST" action="{{url('/save-cart')}}">
			@csrf


			<span>
				<span>{{number_format($value->product_price).' VNĐ'}}</span>
				<label>Số Lượng :</label>

				<!-----------------------số lượng max min khi ckick vào ô-------------------------------->
				<input  name="qty"type="number" min ="1" value="1" />
				<input  name="productid_hidden"type="hidden" min ="1" max="" value="
				{{$value->product_id}}" />
				<!--value là lấy product----->
				<br>
				<button type="submit" class="btn btn-fefault cart">
					<i class="fa fa-shopping-cart"></i>
					Thêm Giỏ Hàng
				</button>
			</span>

		</form>	
		<p><b>Tình Trạng :</b> Còn Hàng</p>
		<p><b>Điều Kiện :</b> Hàng Mới 100%</p>
		<p><b>Thương Hiệu :</b> {{$value->brand_name}}</p>
		<p><b>Danh Mục :</b> {{$value->category_name}}</p>
		<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
	</div><!--/product-information-->
</div>
</div>


<!--/product-details-->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Mô Tả Sản Phẩm</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Chi Tiết Sản Phẩm </a></li>

			<li ><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in " id="details" >

			<p>{{$value->product_content}}</p>



		</div>

		<div class="tab-pane fade" id="companyprofile" >
			{{$value->product_desc}}


		</div>


{{-- 
		<div class="tab-pane fade " id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p> </p>
				<p><b>Write Your Review</b></p>

				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div> --}}

	</div>
</div>
@endforeach
<!--/category-tab-->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản Phẩm Liên Quan</h2>

	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<!--------------------------------------------------------------------------->
				@foreach($realte as $Key=> $lienquan)				
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
<a href=" {{url('chi-tiet-san-pham/'.$lienquan->product_id)}}">
								<img src="{{url('public/upload/product/'.$lienquan->product_image)}}" alt="" />

								<h2>{{number_format($lienquan ->product_price).' VNĐ'}}</h2>
								<p>{{$lienquan->product_name}}</p>

				</a>				{{-- 	<p>Easy Polo Black Edition</p> --}}
								<a href="{{url('show-cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</a>
			
							</div>

						</div>
					</div>
				</div>

				@endforeach					
				<!----------------------------------->						
			</div>

		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
</div><!--/recommended_items-->				
@stop
