   @extends('adminLayout')
   @section('mainadmin')

   <div class="row">
            <div class="col-lg-12">
        <section class="panel">
                <header class="panel-heading">
                   Thêm Bài Viết
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
    <form role="form"  method="post" action="{{url('/save-post')}}"  enctype="multipart/form-data">
         @csrf
          <div class="form-group">

              <label for="exampleInputEmail1">Tên Bài Viết</label>

      <input type="text" name="post_title"id="exampleInputEmail1"class="form-control">

                 <span class="text-danger"> @error('post_title') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>

</div>                              

<!------------------------------------------------------------->
         <div class="form-group">
              <label for="exampleInputEmail1">Slug</label>

      <input type="text" name="post_slug"{{-- id="convert_slug" --}}placeholder="slug"class="form-control">
</div> 
         
 <span class="text-danger"> @error('post_slug') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
<!------------------------------------------------------------->
         <div class="form-group">
              <label for="exampleInputEmail1">Tóm Tắt Bài Viết</label>

        <textarea style="resize: none"row="5" class="form-control"name="post_desc" id="ckeditor5" placeholder="Mô Tả Danh Mục">
                
     </textarea>
</div> 
 <span class="text-danger"> @error('post_desc') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
           <!----------------------------------------------------------------->
<!------------------------------------------------------------->
         <div class="form-group">
              <label for="exampleInputEmail1">Nội Dung Bài Viết</label>

    <textarea style="resize: none"row="5" class="form-control"name="post_content" id="ckeditor6" placeholder="Mô Tả Danh Mục">
                
     </textarea>
</div> 
 <span class="text-danger"> @error('post_content') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
           <!----------------------------------------------------------------->


   <div class="form-group">
              <label for="exampleInputEmail1">MeTa Từ Khóa</label>

    <textarea style="resize: none"row="5" class="form-control"name="post_meta_keyword"  placeholder="Mô Tả Danh Mục">
                
     </textarea>
</div> 
 <span class="text-danger"> @error('post_meta_keyword') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
           <!----------------------------------------------------------------->




   <div class="form-group">
       <label for="exampleInputEmail1">MeTa Nội Dung</label>
        <textarea style="resize: none"row="5" class="form-control"name="post_meta_desc"  placeholder="Mô Tả Danh Mục">            
         </textarea>
</div> 
 <span class="text-danger"> @error('post_meta_desc') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>
       <!----------------------------------------------------------------->

  <div class="form-group">
      
                  <label for="exampleInputEmail1">Hình Ảnh Bài Viết</label>
                  <input type="file" name="post_image"class="form-control" id="exampleInputEmail1" >
                    <span class="text-danger"> @error('post_image') Nhập Tối thiểu 1 kí tự trở lên
            @enderror</span>

</div>

          <!-------------------------------------------------------->
              <label for="exampleInputEmail1">Chọn Danh Mục Bài Viết </label>
      <select name="cate_post_id" class="form-control input-sm m-bot15">

      @foreach($cate_post as $Key=>$cate_poss_add)
      
            <option value ="{{$cate_poss_add->cate_post_id }}">{{$cate_poss_add->cate_post_name}}</option>
                            
       @endforeach  

        </select>
        <br>

     <select name="post_status" class="form-control input-sm m-bot15">

                <option value ="0">Ẩn</option>  

                <option value="1">Hiển Thị</option>
                         
      </select><br>
  <button type="submit" name="add_post"class="btn btn-info">Thêm Bài Viết</button>
                    </form>
                    </div>

            </div>

        </section>

            </div>
        </div>
        @endsection