<!-- trang chi tiết---->
@extends('layout')
@section('content') 


<div class="product-information"><!--/product-information-->
	@foreach($show_post as $Key =>$Post_show)
	<h2 class="title text-center">  {{$Post_show->post_title}}  </h2>



	<div class="col-sm-12">
		<div class="product-image-wrapper">
			<div class="single-products">

				{!!$Post_show->post_content!!}<br>
			{{-- 	<img src="{{url('public/upload/post/'.$Post_show->post_image)}}" 
			alt="{!!$Post_show->post_slug!!}" height="200px" /> <br> <br> --}}					

			@endforeach				
		</div>

	</div>


</div>

</div>


<!--/category-tab-->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản Phẩm Liên Quan</h2>
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<!--------------------------------------------------------------------------->
				@foreach($related as $Key =>$post_related)		
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="{{url('/xembaiviet/'.$post_related->post_slug)}}">
								<img src="{{url('public/upload/post/'.$post_related->post_image)}}" 
								height="220px" /> <br> <br>
									{!!$post_related->post_title!!} <br>
							
									<i class="fa fa-eye "> </i> Xem Bài Viết
								</a>

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
