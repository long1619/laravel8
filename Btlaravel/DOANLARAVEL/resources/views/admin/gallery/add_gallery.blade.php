   @extends('adminLayout')
   @section('mainadmin')
 
   <div class="row">
   	<div class="col-lg-12">
   		
   		<section class="panel">
   			<header class="panel-heading">
   				Thêm Thư Viện Ảnh
   			</header>
   			<div class="panel-body">
   				@if(Session::has('mes'))
   				<div class="alert alert-success" role="alert" >

   					<div class="text-center"> {{Session()->get('mes')}} </div>
   				</div>
   				@endif


   			</div>
                  <div class="panel-body">
               @if(Session::has('mess'))
               <div class="alert alert-danger" role="alert" >

                  <div class="text-center"> {{Session()->get('mess')}} </div>
               </div>
               @endif

            </div>
            
   			<!--lấy pro_id ở input phía dưới-->		
<form action="{{url('/insert-gallery/'.$pro_id)}}" method="post" accept-charset="utf-8" 
   			enctype="multipart/form-data">
   			@csrf
   			
   	<div class="row">
         				<div class="col-md-3"align="right">
         						
         				</div>
   				<div class="col-md-6">
   					<!--name là chuỗi- multiple là chọn nhiều ảnh---->
   					<input type="file" name="file[]" id="file" class="form-control"accept="image/*" multiple>
   					<span id="error_gallery"></span>

   				</div>

   				<div class="col-md-3">
   					 <input type="submit" name="upload"name="taianh" value="Tải Ảnh" class="btn btn-success">
   					
   				</div>

   	</div>
</form>
   		<!---------------------------------------------------->
   <div class="panel-body">
      			
   		<form  accept-charset="utf-8">
   		    	<input type="hidden" name="pro_id" data-product_id="{{$pro_id}}"  class="product_gal_id">
   			@csrf

   			<div id="gallery_load">
   				
   			</div>
   		</form>
   </div>

   	</section>

   </div>
</div>
@endsection
