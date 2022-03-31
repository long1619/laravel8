   @extends('adminLayout')
   @section('mainadmin')

   <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading"> 
         Cập Nhật Sản Phẩm
       </header>
       <div class="panel-body">
         
        <!--------------------------------------->
        
        <!--------------------------------------->
        <div class="position-center"> 
         @foreach($edit_product as $key =>$pro)          
         <!---------------lấy ảnh . phải có thì mới hiển thị tên file ảnh trong csdl------------> 
         <form role="form"  method="POST" action="{{route('product.update', $pro->product_id)}}
          "enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
            <input type="text" name="product_name"class="form-control" id="exampleInputEmail1"
            value="{{$pro->product_name}}">
            <span class="text-danger"> @error('product_name')Không Được Bỏ Trống @enderror
            </span>

          </div>

          <!------------------------------>
          <div class="form-group">
            <label for="exampleInputEmail1">Giá Sản Phẩm</label>
            <input type="text"value="{{$pro->product_price}}" name="product_price"class="form-control" id="exampleInputEmail1" ><!------------------------------>
            <span class="text-danger"> @error('product_price')Không Được Bỏ Trống @enderror
            </span>
          </div>

          <!------------------------------>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Số Lượng Sản Phẩm</label>
            <input type="text"value="{{$pro->product_quantity}}" name="product_quantity"class="form-control" id="exampleInputEmail1" ><!------------------------------>
            <span class="text-danger"> @error('product_quantity')Không Được Bỏ Trống @enderror
            </span>
          </div>

          <!------------------------------>
          <div class="form-group">
            <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
            <input type="file" name="product_image"class="form-control" id="exampleInputEmail1" >
            <img src="{{url('public/upload/product/'.$pro->product_image)}}"height="100"width="100">
            <!----------chỉnh sửa ảnh------------------->

            <span class="text-danger"> @error('product_image')Không Được Bỏ Trống @enderror
            </span>              

          </div>

          <!------------------------------>
          <div class="form-group">
            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
            <textarea style="resize: none"row="5" class="form-control"name="product_desc" id="exampleInputPassword1">
              {{$pro->product_desc}}
              
            </textarea>
            
            <span class="text-danger"> @error('product_desc')Không Được Bỏ Trống @enderror
            </span>                    
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
            <textarea style="resize: none"row="5" class="form-control"name="product_content" id="exampleInputPassword1" value="">
              {{$pro->product_content}}
            </textarea>
            <span class="text-danger"> @error('product_content')Không Được Bỏ Trống @enderror
            </span>

          </div>
          
          
          <!-------------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label for="exampleInputPassword1">Danh Mục Sản Phẩm</label>
            <select name="product_cate" class="form-control input-sm m-bot15">
              @foreach($cate_product as $Key => $cate)
              @if($cate->category_id== $pro->category_id)

              <option selected value ="{{$cate->category_id}}"> {{$cate->category_name}}</option>
              @else
              <option value ="{{$cate->category_id}}"> {{$cate->category_name}}</option>
              @endif
              @endforeach 


              <!---------------lấy ra tên sản phẩm--------------->


            </select>
            
            
          </div>
          <!---------------------lấy ra tên thương hiệu------------------------------------------------------------>
          <div class="form-group">
            <label for="exampleInputPassword1">Thương Hiệu</label>
            <select name="product_brand" class="form-control input-sm m-bot15">

              @foreach($brand_product as $Key =>$brand)
              <option value ="{{$brand->brand_id}}">       {{$brand->brand_name}}</option>
              
              @endforeach
            </select>
            
            
          </div>


          <!-------------------------------------------------------->
          <div class="form-group">
            <label for="exampleInputPassword1">Hiển Thị</label>
            <select name="product_status" class="form-control input-sm m-bot15"><!------------------------------>
              <option value ="0">Ẩn</option>  <!---value cho =0 và 1------------------>
              <option value="1">Hiển Thị</option>
            </select>
            
            
          </div>
          <br>
          <button type="submit" name="add_product"class="btn btn-info">Cập Nhật Sản Phẩm</button>
        </form>
        @endforeach
      </div>

    </div>
  </section>

</div>
</div>
@endsection