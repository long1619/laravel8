
@extends('adminLayout')
@section('mainadmin')

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Cập Nhật Thương Hiệu Sản Phẩm 
      </header>
      <div class="panel-body">
        <!--------------------------------------->


        <!--.get $data ở bên category--- lấy dữ liệu đổ lên ô--------->

        {{-- @foreach($data as $Key => $edit_value) --}}

        <!-----------------------------------/$edit_value->category_id}}---->

        <div class="position-center">
         <form role="form"  method="POST" action="{{route('brand.update', $edit_value->brand_id)}}">
           @csrf

           <input type="hidden" name="id"value="{{$edit_value->brand_id}}"/>

           <div class="form-group">
            <label for="exampleInputEmail1">Tên Thương Hiệu</label>
            <!-----------lấy edit_value--và trỏ tới name ở csdl--->
            <input type="text" value="{{$edit_value->brand_name}}"name="brand_product_name"class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
            <span class="text-danger"> @error('brand_product_name') Không Được Bỏ Trống  
            @enderror</span>


          </div><!------------------------------>
          <div class="form-group">
            <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
            <textarea style="resize: none"row="5"
            class="form-control"name="brand_product_desc" placeholder="Mô Tả Danh Mục" 
            id="ckeditor2">
            {!!$edit_value->brand_desc!!}
          </textarea>

          <span class="text-danger"> @error('brand_product_desc') Không Được Bỏ Trống  
          @enderror</span>


        </div>
        <!-------------------------------------------------------->
        <div class="form-group">
          <label for="exampleInputPassword1">Hiển Thị</label>
          <select name="brand_product_status" class="form-control input-sm m-bot15">

           @if($edit_value->brand_status==0)

           <option selected value ="0"> Ẩn</option>  
           <option value ="1 "> Hiển Thị</option>
           @else
           <option value ="0"> Ẩn</option>  
           <option selected value ="1 "> Hiển Thị</option>
           .
           @endif

         </select>


       </div>

       <button type="submit" name="update_category_product"class="btn btn-info">Cập Nhật Danh Mục</button>

     </form>
   </div>
   {{-- @endforeach --}}
 </div>
</section>

</div>
</div>
@endsection
