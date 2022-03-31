@extends('layout')
@section('content') 

<div class="features_items"><!--features_items-->

	<h2 class="title text-center ">Sản Phẩm Mới Nhất</h2>


	<!--show các sản phẩm ở trang home chính ----->

	@foreach($all_product as $Key => $product)
	<a href=" {{url('chi-tiet-san-pham/'.$product->product_id)}}">

		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">

					<div class="productinfo text-center">
						<img src="{{url('public/upload/product/'.$product->product_image)}}" alt="" />

						<h2>{{number_format($product->product_price).' VNĐ'}}</h2>

						<p>{{$product->product_name}}</p>
						<a href="{{url('show-cart')}}" class="btn btn-default add-to-cart">

							<i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng
						</a>
					</div>
	<img src="{{'public/frontend/images/home/new.png'}}" class="new" alt="" />	
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
						<li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
					</ul>
				</div>
			

			</div>

		</div>


		@endforeach		
	</div>


					
<!------------------------------------------------------------------------->
		<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Tin Tức</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">

	@foreach($all_post as $Key =>$all_posts)

									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
											
											<img src="{{url('public/upload/post/'.$all_posts->post_image)}}" alt="" style="with:10px;height:250px" /><br><br>

											<p>{!!$all_posts->post_title!!}</p>

		<a href="{{url('/xembaiviet/'.$all_posts->post_slug)}}" class="btn btn-default ">	
			<i class="fa fa-eye "> </i> Xem Bài Viết	</a>
												</div>
												
											</div>
										</div>
									</div>
							
						@endforeach		
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