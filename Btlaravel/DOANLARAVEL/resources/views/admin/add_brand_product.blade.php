   @extends('adminLayout')
   @section('mainadmin')

   <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
         Thêm Thương Hiệu Sản Phẩm
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
          <form role="form"  method="post" action="save_brand_product">
           @csrf
           <div class="form-group">
            <label for="exampleInputEmail1">Tên Thương Hiệu</label>

            <input type="text" name="brand_product_name"id="exampleInputEmail1"class="form-control">
            <!--------check validation--------------------->
            <span class="text-danger"> @error('brand_product_name') Nhập Tối thiểu 3 kí tự trở lên
            @enderror</span>
            
            <!------------------------------>
            
          </div>
          

          
          <!------------------------------>
          <div class="form-group">

            
            <label for="exampleInputPassword1">Mô Tả Thương Hiệu </label>
            <!--------check validation--------------------->
            <span class="text-danger"> @error('brand_product_desc') Không Được Bỏ Trống  
            @enderror</span>
            <textarea style="resize: none"row="5" class="form-control"name="brand_product_desc" id="ckeditor2" placeholder="Mô Tả Danh Mục">
              
            </textarea>
            
            
          </div>

          <!-------------------------------------------------------->

          <select name="brand_product_status" class="form-control input-sm m-bot15"><!------------------------------>
            <option value ="0">Ẩn</option>  <!---value cho =0 và 1------------------>
            <option value="1">Hiển Thị</option>
            
          </select><br>
          <button type="submit" name="add_category_product"class="btn btn-info">Thêm Thương Hiệu</button>
        </form>
      </div>

    </div>

  </section>

</div>
</div>
@endsection