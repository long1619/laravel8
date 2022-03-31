   @extends('adminLayout')
   @section('mainadmin')

   <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
         Thêm Sản Phẩm
       </header>
       <div class="panel-body">

        <!--------------------------------------->
        @if(Session::has('mes'))
        <div class="alert alert-success" role="alert" >

          <div class="text-center"> {{Session()->get('mes')}} </div>
        </div>



        @endif
        <!--------------------------------------->
        <div class="position-center">           
          <!---------------lấy ảnh . phải có thì mới hiển thị tên file ảnh trong csdl------------> 
          <form role="form"  method="post" action="save_product"enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên Sản Phẩm</label>
              <input type="text" name="product_name"class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
              <span class="text-danger"> @error('product_name')Nhập Tối thiểu 3 kí tự trở lên  @enderror
              </span>


            </div>

            <!------------------------------>
            <div class="form-group">
              <label for="exampleInputEmail1">Giá Sản Phẩm</label>
              <input type="text" name="product_price"class="form-control" id="exampleInputEmail1" >
              <span class="text-danger"> @error('product_price')Tối thiểu 1000 VNĐ @enderror
              </span>
            </div>
            <!------------------------------>
  
            <div class="form-group">
              <label for="exampleInputEmail1">Số Lượng Sản Phẩm</label>
              <input type="text" name="product_quantity"class="form-control" id="exampleInputEmail1" >
              <span class="text-danger"> @error('product_quantity')Không Được Bỏ Trống @enderror
              </span>
            </div>
            <!------------------------------>
            <div class="form-group">
              <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
              <input type="file" name="product_image"class="form-control" id="exampleInputEmail1" ><!------------------------------>


              <span class="text-danger"> @error('product_image')Không Được Bỏ Trống @enderror
              </span>
            </div><!------------------------------>
            <div class="form-group">
              <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
              <span class="text-danger"> @error('product_desc')Không Được Bỏ Trống   @enderror
              </span>               
              <textarea style="resize: none"row="5" class="form-control"name="product_desc" id="ckeditor0" placeholder="Mô Tả Sản Phẩm">

              </textarea>

            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>

              <span class="text-danger"> @error('product_content')Không Được Bỏ Trống   @enderror
              </span>
              <textarea style="resize: none"row="5" class="form-control"name="product_content" id="ckeditor00" placeholder="Mô Tả Nội Dung Sản Phẩm">

              </textarea>


            </div>


            <div class="form-group">
              <label for="exampleInputPassword1">Danh Mục Sản Phẩm</label>
              <select name="product_cate" class="form-control input-sm m-bot15">

                <!---------------lấy ra tên sản phẩm--------------->
                @foreach($cate_product as $key =>$cate)

                <option value ="{{{$cate->category_id}}}">{{{$cate->category_name}}}</option>  <!---value cho =0 và 1------------------>



                @endforeach 

              </select>


            </div>
            <!---------------------lấy ra tên thương hiệu------------------------------------------------------------>
            <div class="form-group">
              <label for="exampleInputPassword1">Thương Hiệu</label>
              <select name="product_brand" class="form-control input-sm m-bot15">


                @foreach($brand_product as $key =>$brand)
                <!--lấy id và tên ---->
                <option value ="{{{$brand->brand_id}}}">{{{$brand->brand_name}}}</option>  



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
            <button type="submit" name="add_product"class="btn btn-info">Thêm Sản Phẩm</button>
          </form>
        </div>

      </div>
    </section>

  </div>
</div>
@endsection