  @extends('adminLayout')
  @section('mainadmin')

  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông Tin Người Dùng 
      </div> 

      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
 

              <th>Tên Người Dùng</th>
              <th>Số Điện Thoại</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>

            {{--           @foreach($view_order_by as $Key=>$view_order_by1) --}}
            <tr>

              <td> {{$view_order_by->customer_name}}</td>
              <td> {{$view_order_by->customer_phone}}</td>

            </tr>
            {{-- @endforeach --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br> <br>
  <!-------------------------------------------------------------------------->
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Thông Tin Khách Mua Hàng
      </div>

      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>


              <th>Khách Mua Hàng</th>
              <th>Địa Chỉ</th>
              <th>Số Điện Thoại</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
           {{--           @foreach($view_order_by  as $Key=>$view_order_by_1) --}}

           <tr>

            <td> {{$view_order_by->shipping_name}}</td>
            <td> {{$view_order_by->shipping_address}}</td>
            <td> {{$view_order_by->shipping_phone}}</td>

          </tr>

          {{-- @endforeach --}}
        </tbody>
      </table>
    </div>
  </div>
</div>
<br> <br>
<!------------------------------------------------------------------------------->
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Đơn Hàng
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>


            <th>Tên Sản Phẩm</th>
 {{-- 
  --}}
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Tổng Tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         {{--       @foreach($view_order_by as $Key=>$view_order_by_1) --}}
         <tr>


          <td> {{$view_order_by->product_name}}</td>
    {{--       $                      <td> {{ $tblproduct->product_quantity}}</td> --}}
          <!-----xác nhận số lượng --->
          <td><input type="number" value="{{$view_order_by->product_sales_quantity}}"
            name="product_sales_quantity"min="1"> 
        {{--     <button class="btn btn-default">Cập Nhật</butto --}}
          </td>




          <td> {{$view_order_by->product_price}}</td>

          <!-- tính tổng tiền----------->
          <td> {{$view_order_by->product_price*$view_order_by->product_sales_quantity}}</td>

        </tr>
        <!-------------------------------------------> 

        <tr>

  {{--         <td colspan="6"> --}}
{{-- 
           <label for="exampleInputPassword1">Tình Trạng:</label>
           <br> <br>
@foreach($orders as $Key=>$or)   
@if($or->order_status==1)
           <form> 
@csrf
            <select class="form-control order_details">

              <option value="" >---Chọn Hình Thức Đơn Hàng--- </option>
              <option value="1" id="{{$or->order_id}}"> Chưa Xử Lí</option>
              <option value="2" id="{{$or->order_id}}"> Đã Xử Lí Đơn Hàng</option>
              <option value="2"id="{{$or->order_id}}" > Đã Xử Lí Đơn Hàng</option>
              <option value="3" id="{{$or->order_id}}"> Hủy Đơn</option>
            </select>
          </form>   

 @elseif($or->order_status==2)
             <form> 
@csrf
            <select class="form-control order_details">
          <option value="" >---Chọn Hình Thức Đơn Hàng--- </option>
              <option value="1"id="{{$or->order_id}}" > Chưa Xử Lí</option>
              <option selected value="2" id="{{$or->order_id}}"> Đã Xử Lí Đơn Hàng</option>
              <option value="3" id="{{$or->order_id}}"> Hủy Đơn</option>

            </select>
          </form>  

@else
        <form> 
@csrf
            <select class="form-control order_details">
          <option value="" >---Chọn Hình Thức Đơn Hàng--- </option>
              <option value="1"id="{{$or->order_id}}" > Chưa Xử Lí</option>
              <option value="2" id="{{$or->order_id}}"> Đã Xử Lí Đơn Hàng</option>
              <option selected value="3" id="{{$or->order_id}}"> Hủy Đơn</option>

            </select>
          </form>  
@endif

@endforeach
        </td> --}}

      </tr>
      <!------------------------------------------->
    </tbody>

  </table>
</div>
</div>
</div>
<br> <br>

@endsection