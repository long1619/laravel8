   @extends('adminLayout')
   @section('mainadmin')

   <div class="row">
            <div class="col-lg-12">
        <section class="panel">
                <header class="panel-heading">
                   Thêm Danh Mục Bài Viết
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
    <form role="form"  method="post" action="{{url('save-category-post')}}">
         @csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Tên Danh Mục</label>

      <input type="text" name="cate_post_name"id="exampleInputEmail1"class="form-control">
            <!--------check validation--------------------->
            <span class="text-danger"> @error('cate_post_name') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
      <!--------check validation--------------------->
  {{--     <span class="text-danger"> @error('brand_product_name') Nhập Tối thiểu 3 kí tự trở lên
      @enderror</span> --}}
              
</div>                              


<!------------------------------------------------------------->
         <div class="form-group">
              <label for="exampleInputEmail1">Slug</label>

      <input type="text" name="cate_post_slug"id="convert_slug"placeholder="slug"class="form-control">
        <span class="text-danger"> @error('cate_post_slug') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
      <!--------check validation--------------------->
   {{--    <span class="text-danger"> @error('brand_product_name') Nhập Tối thiểu 3 kí tự trở lên
      @enderror</span>
               --}}
</div> 
           <!----------------------------------------------------------------->
           <div class="form-group">      
        <label for="exampleInputPassword1">Mô Tả Danh Mục </label>
  <!--------check validation--------------------->
      <span class="text-danger"> @error('cate_post_desc') Không Được Bỏ Trống  
      @enderror</span>

   <textarea style="resize: none"row="5" class="form-control"name="cate_post_desc" id="ckeditor4" 
   placeholder="Mô Tả Danh Mục">
                
                          </textarea>
  
 
                        </div>

                        <!-------------------------------------------------------->

                 <select name="cate_post_status" class="form-control input-sm m-bot15"><!------------------------------>
                                <option value ="0">Ẩn</option>  <!---value cho =0 và 1------------------>
                                <option value="1">Hiển Thị</option>
                         
                            </select><br>
  <button type="submit" name="add_post"class="btn btn-info">Thêm Danh Mục Bài Viết</button>
                    </form>
                    </div>

            </div>

        </section>

            </div>
        </div>
        @endsection