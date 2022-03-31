
@extends('adminLayout')
@section('mainadmin')

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Cập Nhật Danh Mục Sản Phẩm
      </header>
      <div class="panel-body">

        <div class="position-center">
         <form role="form"  method="POST" action="{{route('category.update', $edit_value->category_id)}}">
           @csrf

           <input type="hidden" name="id"value="{{$edit_value->category_id}}"/>

           <div class="form-group">
            <label for="exampleInputEmail1">Tên Danh Mục</label>
            <!-----------lấy edit_value--và trỏ tới name ở csdl--->
            <input type="text" value="{{$edit_value->category_name}}"name="category_product_name"class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
            <span class="text-danger"> @error('category_product_name') Không Được Bỏ Trống  
            @enderror</span>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
            <textarea style="resize: none"row="5" class="form-control"
            name="category_product_desc"  id="ckeditor1" placeholder="Mô Tả Danh Mục">
            {!!$edit_value->category_desc!!}
          </textarea>


          <span class="text-danger"> @error('category_product_desc') Không Được Bỏ Trống  
          @enderror</span>
        </div>
        <!-------------------------------------------------------->
        <div class="form-group">
          <label for="exampleInputPassword1">Hiển Thị</label>
          <select name="category_product_status" class="form-control input-sm m-bot15"><!------------------------------>
            @if($edit_value->category_status==0)

            <option selected value ="0"> Ẩn</option>  
            <option value ="1 "> Hiển Thị</option>
            @else
            <option value ="0"> Ẩn</option>  
            <option selected value ="1 "> Hiển Thị</option>

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
