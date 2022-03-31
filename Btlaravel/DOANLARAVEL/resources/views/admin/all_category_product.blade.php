  @extends('adminLayout')
   @section('mainadmin')

   	<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
   Liệt Kê Danh Mục Sản Phẩm
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
            <th>Tên Danh Mục</th>

            <th>Hiển Thị</th>
            <th>Mô Tả</th>
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
      
           @foreach($all_category_product as $key => $cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate_pro->category_name}}</td>
            <!-----------sửa lại cái ngày và trạng thái ẩn hiện-------------------------------->
            <td><span class="text-ellipsis">
              <!---------------lấy ẩn hiện---->
              <?php
                if($cate_pro->category_status==0)
                {
                   echo 'Ẩn';
                }
              else{
                 echo ' Hiển Thị';
            }
           ?>
                <td>{!!$cate_pro->category_desc!!}</td>
           <!-------------------------->
            </span></td>
        <!---------------------------------------------------------------------------------------->   
            <td>      <!-- sửa---tới hàm -->
              <a href="{{ route('category.edit', $cate_pro->category_id) }}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>

                 <!-- xóa----->
             <a onclick="return confirm('Bạn Chắc Chắn Muốn Xóa ?')" href="{{route('category.delete', $cate_pro->category_id)}}" class="active" ui-toggle-class="">
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
         <td>{{$all_category_product->links()}}</td>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
  @endsection