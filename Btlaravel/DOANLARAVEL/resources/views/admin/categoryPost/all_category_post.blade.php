  @extends('adminLayout')
   @section('mainadmin')

   	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
   Liệt Kê Danh Mục Bài Viết
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
            <th>Tên Danh Mục Bài Viết</th>

            <th>Trạng Thái</th>
            <th>Mô Tả Danh Mục</th>
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
        @foreach($category_post as $key => $post_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$post_pro->cate_post_name}}</td>
            <!-----------sửa lại cái ngày và trạng thái ẩn hiện-------------------------------->
            <td><span class="text-ellipsis">
              <!---------------lấy ẩn hiện---->
            
               @if($post_pro->cate_post_status==0)
             
                 Ẩn
            
              @else
              Hiển Thị
        
         @endif
                <td>{!!$post_pro->cate_post_desc!!}</td>
           <!-------------------------->
            </span></td>
        <!---------------------------------------------------------------------------------------->   
            <td>      
              <a href="{{ url('edit-category-post', $post_pro->cate_post_id) }}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>

            
    <a onclick="return confirm('Bạn Chắc Chắn Muốn Xóa  ?')" href="{{url('delete-category-post', $post_pro->cate_post_id)}}" class="active" ui-toggle-class="">
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
  <td>{{$category_post->links()}}</td>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
  @endsection