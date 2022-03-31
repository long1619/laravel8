  @extends('adminLayout')
   @section('mainadmin')

    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
   Liệt Kê Bài Viết
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div> 
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div> 
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên Bài Viết</th>
            <th>Hình Ảnh</th>
            <th>Tóm Tắt Bài Viết</th>
    

             <th>Danh Mục Bài Viết</th>

     
            <th>Hiển Thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         @if(Session::has('mes'))
<div class="alert alert-success" role="alert" >
         
        <div class="text-center"> {{Session()->get('mes')}} </div>
</div>
    


 @endif

          
          <!---------------------------------------------------------------------------->
        @foreach($all_post as $key => $postt)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
     

     <td>{!!$postt->post_title!!}</td>

     <td><img src="public/upload/post/{{$postt->post_image}}"height="50" width="50">  </td>


     <td>{!!$postt->post_desc!!}</td>


<!---------------------------------->




     <td >{{$postt->cate_post_name}}</td>




<!---------------------------------->
    

            <td><span class="text-ellipsis">
              <!-------------lấy ẩn hiện---->
          <?php
                if($postt->post_status==0)
                {
                   echo 'Ẩn';
                }
              else{
                 echo ' Hiển Thị';
            }
           ?>
          
   

           <!-------------------------->
            </span></td>

        <!---------------------------------------------------------------------------------------->   
            <td>      
              <a href="{{ url('edit-post', $postt->post_id) }}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>

            
    <a onclick="return confirm('Bạn Chắc Chắn Muốn Xóa  ?')"
     href="{{url('delete-post', $postt->post_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>

            </td>
             <!---------------------------------------------------------------------------------------->
          </tr>
       @endforeach

        </tbody>
      </table> 
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
       <!--     phân trang------------------------------->
   {{--     <td>{{$all_post->links()}}</td> --}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
  @endsection