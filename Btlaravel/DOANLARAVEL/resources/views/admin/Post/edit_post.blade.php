   @extends('adminLayout')
   @section('mainadmin')

   <div class="row">
            <div class="col-lg-12">
        <section class="panel">
                <header class="panel-heading">
               Cập Nhật Bài Viết
                </header>
            <div class="panel-body">
      <!--------------------------------------->
  @if(Session::has('mes'))
      <div class="alert alert-success" role="alert" >
               
              <div class="text-center"> {{Session()->get('mes')}} </div>
      </div>
 @endif

  
@foreach($edit_post1 as $Key=>$edit_p)
        <!---------------------------------------> 
 <div class="position-center">                   <!--cập nhật 1 bài viết phải có id------->
    <form role="form"method="post"action="{{url('/update-post/'.$edit_p->post_id)}}" enctype="multipart/form-data"> 
   
         @csrf
          <div class="form-group">
   <label for="exampleInputEmail1">Tên Bài Viết</label>

      <input type="text"  value="{{$edit_p->post_title}}" name="post_title"id="exampleInputEmail1"class="form-control">

              
</div>                              


<!------------------------------------------------------------->
         <div class="form-group">
              <label for="exampleInputEmail1">Slug</label>

      <input type="text" name="post_slug"{{-- id="convert_slug" --}}placeholder="slug"class="form-control"value="{{$edit_p->post_slug}}">
</div> 
         

<!------------------------------------------------------------->
         <div class="form-group">
              <label for="exampleInputEmail1">Tóm Tắt Bài Viết</label>

        <textarea style="resize: none"row="5" class="form-control"name="post_desc" id="ckeditor5" placeholder="Mô Tả Danh Mục">
              {!!$edit_p->post_desc!!} 
     </textarea>
</div> 
           <!----------------------------------------------------------------->
<!------------------------------------------------------------->
         <div class="form-group">
              <label for="exampleInputEmail1">Nội Dung Bài Viết</label>

    <textarea style="resize: none"row="5" class="form-control"name="post_content" id="ckeditor6" placeholder="Mô Tả Danh Mục">
               {!!$edit_p->post_content!!}
     </textarea>
</div> 
           <!----------------------------------------------------------------->


   <div class="form-group">
              <label for="exampleInputEmail1">MeTa Từ Khóa</label>

    <textarea style="resize: none"row="5" class="form-control"name="post_meta_keyword" id="ckeditor2" placeholder="Mô Tả Danh Mục">
             {{$edit_p->post_meta_keyword}} 
     </textarea>
</div> 
           <!----------------------------------------------------------------->




   <div class="form-group">
       <label for="exampleInputEmail1">MeTa Nội Dung</label>
        <textarea style="resize: none"row="5" class="form-control"name="post_meta_desc" id="ckeditor2" placeholder="Mô Tả Danh Mục">   
       {{$edit_p->post_meta_desc}}        
         </textarea>
</div>  
       <!----------------------------------------------------------------->

  <div class="form-group">
                  <label for="exampleInputEmail1">Hình Ảnh Bài Viết</label>
                  <input type="file" name="post_image"class="form-control" id="exampleInputEmail1" >

       <img src="{{asset('public/upload/post/'.$edit_p->post_image)}}"height="100"width="100" >   

   <br>   <br>
          <!-------------------------------------------------------->
              <label for="exampleInputEmail1">Chọn Danh Mục Bài Viết </label>
      <select name="cate_post_id" class="form-control input-sm m-bot15">

           @foreach($cate_post as $Key=>$cate_post1)
           <!------------------------------------------>
                <!--nếu giống thì select--còn k giống là rỗng--->
{{-- cách 1: --}}
{{--     <option {{$edit_p->cate_post_id==$cate_post1->cate_post_id ? 'selected': ''}}     
     value ="{{$cate_post1->post_id}}">
                        {{$cate_post1->cate_post_name}}

                </option> --}}

{{-- $edit_p->cate_post_id==$cate_post1->cate_post_id --}}
<!------------------------------------------>
{{-- cách 2: --}}
{{-- cate_post_id là của sql --}}
   @if($edit_p->cate_post_id==$cate_post1->cate_post_id )

             <option selected > {{$cate_post1->cate_post_name}}</option> 
                         
    @else
               <option  > {{$cate_post1->cate_post_name}}</option> 
           
   @endif  
             @endforeach             
        </select>
        <br>


     <select name="post_status" class="form-control input-sm m-bot15">

          @if($edit_p->post_status==0)

                        <option selected value ="0">Ẩn</option> 
                          <option  value="1">Hiển Thị</option> 
              @else
                      <option value ="0">Ẩn</option> 
                        <option selected value="1">Hiển Thị</option>
               @endif  
                            
      </select><br>
  <button type="submit" name="update_post"class="btn btn-info">Cập Nhật Bài Viết</button>
                    </form>
                    </div>

@endforeach
            </div>

        </section>

            </div>
        </div>
        @endsection