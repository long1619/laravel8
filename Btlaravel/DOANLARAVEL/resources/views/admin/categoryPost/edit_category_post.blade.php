  
   @extends('adminLayout')
   @section('mainadmin')

   <div class="row">
            <div class="col-lg-12">
        <section class="panel">
                <header class="panel-heading">
                  Cập Nhật Danh Mục Bài Viết
                </header>
            <div class="panel-body">
                <!--------------------------------------->

                 <div class="position-center">
 <form role="form"  method="POST" action="{{url('/update-category-post/'. $edit_post->cate_post_id)}}">
 @csrf 
                          
            {{--        <input type="hidden" name="id"value="{{$edit_post->cate_post_id}}"/>
                               --}}

           <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                          <!-----------lấy edit_post--và trỏ tới name ở csdl--->
                            <input type="text" value="{{$edit_post->cate_post_name}}"name="cate_post_name"class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
   

                 </div>
                    <span class="text-danger"> @error('cate_post_name') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
  <!---------------------------------------------------->

   <div class="form-group">
               <label for="exampleInputEmail1">Slug</label>
                          <!-----------lấy edit_post--và trỏ tới name ở csdl--->
            <input type="text" value="{{$edit_post->cate_post_slug}}"name="cate_post_slug"class="form-control" {{-- onkeyup="ChangeToSlug()" --}} id="slug" placeholder="Tên Danh Mục">               
      </div>
       <span class="text-danger"> @error('cate_post_slug') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>


    <!----------------------------------------------->
         
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
 <textarea style="resize: none"row="5"
  class="form-control"name="cate_post_desc" id="ckeditor8"placeholder="Mô Tả Danh Mục">
                             {!!$edit_post->cate_post_desc!!}
     </textarea>
               
                  </div>
                    <span class="text-danger"> @error('cate_post_desc') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>

                  <!-------------------------------------------------------->
          <select name="cate_post_status" class="form-control input-sm m-bot15">
            @if($edit_post->cate_post_status==0)
                                <option  selected value ="0">Ẩn</option>  
                            <option value="1">Hiển Thị</option>
              @else   
                             <option value ="0">Ẩn</option>  
                                <option selected value="1">Hiển Thị</option>
             @endif 

         </select>
                            <br>
            
            <!------------------------------------------------->
   <button type="submit" name="update_cate_post"class="btn btn-info">Cập Nhật Danh Mục Bài Viết</button>

                    </form>
                    </div>

            </div>
        </section>

            </div>
        </div>
        @endsection
