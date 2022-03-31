
@extends('layout')
@section('content')

					<div class="features_items">
	

				
 	<h2 class="title text-center">Danh Mục Bài Viết </h2>
	@foreach($show_post as $Key =>$vlaueP)

<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			
			<div class="productinfo text-center">
			<a href=" {{url('baiviet/'.$vlaueP->post_slug)}}">
				<img src="{{url('public/upload/post/'.$vlaueP->post_image)}}" {{-- alt="{{$vlaueP->post_slug}}" --}} height="280px" /> <br> <br>


					<p>{!!$vlaueP->post_title!!}</p>
				
	<a href="{{url('/xembaiviet/'.$vlaueP->post_slug)}}" class="btn btn-default "><i class="fa fa-eye "> </i> Xem Bài Viết		</a>

					 
		
			</a>
			</div>
							
		</div>

	</div>


</div>





@endforeach
			
						
					</div>
					@stop
						