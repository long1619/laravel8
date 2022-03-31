
<!DOCTYPE html> 
<head>
  <title>Quản Lí của Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

  {{--         <meta name="csrf-token" content="{{csrf_field() }}"> --}}
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- bootstrap-css -->
  <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
  <!-- //bootstrap-css -->
 
  <!--khai báo token ajax-->
  <meta name="csrf-token" content="{{csrf_token() }}">
  <!-- Custom CSS -->
  <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
  <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
  <!-- font CSS -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <!-- font-awesome icons -->
  <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
  <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
  <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
  <!-- calendar -->
  <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
  <!-- //calendar -->
  <!-- //font-awesome icons -->
  <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
  <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
  <script src="{{asset('public/backend/js/morris.js')}}"></script>
  <!-- lịch--------->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!---------biểu đồ -------------->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

</head>
<body>

  <section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
      <!--logo start-->
      <div class="brand">
        <a href="index.html" class="logo">
          VISITORS
        </a>
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars"></div>
        </div>
      </div>

      <!--logo end-->

      <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
          <li>
            <input type="text" class="form-control search" placeholder=" Search">
          </li>
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <img alt="" src="{{{'public/backend/images/2.png'}}}">
              <!-------------------------------------------------------------------------->
              <span class="username"> 
               <!-----------------------Lấy Cái Tên Name --------------->    
               @if  (session()->get('admin_name'))

               <h8>

                 Chào:{{session()->get('admin_name')}}

               </h8>


               @endif              


             </span>
             <!------------------------------------------>
             <b class="caret"></b>
           </a>
           <ul class="dropdown-menu extended logout">
            <li><a href="#"><i class=" fa fa-suitcase"></i>Thông Tin</a></li>
            <li><a href="#"><i class="fa fa-cog"></i>Cài Đặt</a></li>
            <li><a href="admin"><i class="fa fa-key"></i> Đăng Xuất</a></li>
          </ul>
        </li>
        <!-- user login dropdown end -->

      </ul>
      <!--search & user info end-->
    </div>
  </header>
  <!--header end-->
  <!--sidebar start-->
  <aside>
    <div id="sidebar" class="nav-collapse">
      <!-- sidebar menu start-->
      <div class="leftside-navigation">
        <ul class="sidebar-menu" id="nav-accordion">
          <li>
            <a class="active" href="{{url('/dashboad')}}">
              <i class="fa fa-dashboard"></i>
              <span>Tổng Quan</span>
            </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Danh Mục Sản Phẩm</span>
            </a>
            <ul class="sub">
              <li><a href="add-category-product">Thêm Danh Mục Sản Phẩm</a></li>
              <li><a href="all-category-product">Liệt Kê Danh Mục Sản Phẩm</a></li>
              <!--   <li><a href="grids.html">Grids</a></li>--->
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Thương Hiệu Sản Phẩm</span>
            </a>
            <ul class="sub"><!--link route--->
              <li><a href="add-brand-product">Thêm Hiệu Sản Phẩm</a></li>
              <li><a href="all-brand-product">Liệt Kê Thương Hiệu Sản Phẩm</a></li>
              <!--   <li><a href="grids.html">Grids</a></li>--->
            </ul>
          </li>
          <!------------------------------>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Sản Phẩm</span>
            </a>
            <ul class="sub"><!--link route--->
              <li><a href="add-product">Thêm Sản Phẩm</a></li>
              <li><a href="all-product">Liệt Kê Sản Phẩm</a></li>
              <!--   <li><a href="grids.html">Grids</a></li>--->
            </ul>
          </li>


          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Đơn Hàng</span>
            </a>
            <ul class="sub">
              <li><a href="{{url('manager-order')}}">Liệt Kê Đơn Hàng </a></li>

            </ul>
          </li>

{{-- 
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Vận Chuyển</span>
                </a>
                <ul class="sub"><!--link route--->
                    <li><a href="{{url('/delivery')}}">Quản Lý Vận Chuyển</a></li>

                    <!--   <li><a href="grids.html">Grids</a></li>--->
                </ul>
              </li> --}}

              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-book"></i>
                  <span>Quản Lí Danh Mục Bài Viết</span>
                </a>
                <ul class="sub"><!--link route--->
                 <li><a href="{{url('/add-category-post')}}">Thêm Danh Mục Bài Viết</a></li>
                 <li><a href="{{url('/all-category-post')}}">Liệt Kê Danh Mục Bài Viết</a></li>

               </ul>
             </li>


             <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-book"></i>
                <span>Quản Lí Bài Viết</span>
              </a>
              <ul class="sub"><!--link route--->
               <li><a href="{{url('/add-post')}}">Thêm Bài Viết</a></li>
               <li><a href="{{url('/all-post')}}">Liệt Kê Bài Viết</a></li>

             </ul>
           </li>


         </ul>            
       </div>
       <!-- sidebar menu end-->
     </div>
   </aside>
   <!--sidebar end-->
   <!--main content start-->
   <section id="main-content">
     <section class="wrapper">
      <!-------------Kế thừa cho file con -------------->
      @yield('mainadmin') 
    </section>
    <!--------------------------------------------------------------------------------------------->
    <!-- footer --------->

    <div class="footer">

    </div>
    <!-- / footer -->
  </section>
  <!--main content end-->
</section>
<script src="{{{'public/backend/js/bootstrap.js'}}}"></script>
<script src="{{{'public/backend/js/jquery.dcjqaccordion.2.7.js'}}}"></script>
<script src="{{{'public/backend/js/scripts.js'}}}"></script>
<script src="{{{'public/backend/js/jquery.slimscroll.js'}}}"></script>
<script src="{{{'public/backend/js/jquery.nicescroll.js'}}}"></script>
<script src="{{{'public/backend/js/jquery.scrollTo.js'}}}"></script>
<!-------------------------->
{{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> --}}
<!-- biểu đồ ---->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<!------------------------------Biểu Đồ------------------------------------------->

<script >
  //----nó có sẵn trên mạng- cóp về sửa
  $(document).ready(function(){
    chart30daysorder();
   var chart =new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        lineColors:[' #FF8C00','#9932CC','#8B0000','#E9967A','#8FBC8F'];
        hideHover:'auto',
        xkey: 'period',
        ykeys: ['order','sales','profit','quantity'],
        labels: ['Đơn Hàng','Doanh Số','Lợi Nhuận','Số Lượng']

      });

      function chart30daysorder(){
            var _token =$('input[name="_token"]').val();
         $.ajax({
          url:"{{url('/day-order')}}",
          method:"POST",
          dataType:"JSON",
          data:{ _token:_token},

            success:function(data){
              chart.setData(data);
            }

        });

    };

});

</script>
<!------------lọc kết quả ở select------------------->
<script >
  $('.dashboad-filter').change(function(){

        //gửi token
        var _token =$('input[name="_token"]').val();
        var dashboad_value =$(this).val();

        $.ajax({
          url:"{{url('/dashboad-filter')}}",
          method:"POST",
          dataType:"JSOn",
          data:{ _token:_token,dashboad_value:dashboad_value},

            success:function(data){
              chart.setData(data);
            }

        });


      });



    </script>
    <!-- biểu đồ tròn----->
<script >
    $(document).ready(function(){

var colorDanger = "#FF1744";
var dount = Morris.Donut({
  element: 'dount',
  resize: true,
  colors: [
    '#FF1493',
    '#6A5ACD',
    '#FFFF66',
    '#006400'
  ],

  data: [
    {label:"San Pham", value:<?php echo $count_product ?>, color:colorDanger},
    {label:"Bai Viet", value:<?php echo $count_post ?>},
    {label:"Don Hang", value:<?php echo $count_order ?>},
    {label:"Khach Hang", value:<?php echo $count_customer ?>},
    // {label:"", value:357}
  ]

});

    });
</script>

    <!-------------------------------------Lịch------------------------------>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker({
          prevText:"Tháng Trước",
          nextText:"Tháng Sau",
          dateFormat: "yy-mm-dd",
          dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
          duration: "slow"
        });

        $( "#datepicker2" ).datepicker({
          prevText:"Tháng Trước",
          nextText:"Tháng Sau",
          dateFormat: "yy-mm-dd",
          dayNamesMin: ["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","Chủ Nhật"],
          duration: "slow"
        });
      } );
    </script>
    <script >
 //----------  nút lọc
 $('#btn-dashboard-filter').click(function() {
    //gửi token
    var _token =$('input[name="_token"]').val();
    //từ ngày mấy
    var from_date =$('#datepicker').val();

    //đến ngày mấy
    var to_date =$('#datepicker2').val();
    $.ajax({
     url:"{{url('/filter-by-date')}}",
     method:"POST",
     dataType:"JSON",
     data:
     {
      _token:_token,from_date:from_date,to_date:to_date
    },
    success:function(data)
    {
     chart.setData(data);
   }

 });

 });


</script>

<!----CK editor chỉ hỗ trợ cho text area--------------------------->

<script src="{{{'public/backend/ckeditor_4.16.0_full_easyimage/ckeditor/ckeditor.js'}}}">
  
</script>
<script >
CKEDITOR.replace('ckeditor1');
CKEDITOR.replace('ckeditor2');
CKEDITOR.replace('ckeditor3');
CKEDITOR.replace('ckeditor4');
CKEDITOR.replace('ckeditor5');
CKEDITOR.replace('ckeditor6');







</script>

<!--------------------------------------------->

<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
    jQuery('.small-graph-box').hover(function() {
      jQuery(this).find('.box-button').fadeIn('fast');
    }, function() {
      jQuery(this).find('.box-button').fadeOut('fast');
    });
    jQuery('.small-graph-box .box-close').click(function() {
      jQuery(this).closest('.small-graph-box').fadeOut(200);
      return false;
    });

	    //CHARTS
	    function gd(year, day, month) {
       return new Date(year, month - 1, day).getTime();
     }

     graphArea2 = Morris.Area({
       element: 'hero-area',
       padding: 10,
       behaveLikeLine: true,
       gridEnabled: false,
       gridLineColor: '#dddddd',
       axes: true,
       resize: true,
       smooth:true,
       pointSize: 0,
       lineWidth: 0,
       fillOpacity:0.85,
       data: [
       {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
       {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
       {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
       {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
       {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
       {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
       {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
       {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
       {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

       ],
       lineColors:['#eb6f6f','#926383','#eb6f6f'],
       xkey: 'period',
       redraw: true,
       ykeys: ['iphone', 'ipad', 'itouch'],
       labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
       pointSize: 2,
       hideHover: 'auto',
       resize: true
     });


   });
 </script>
 <!-- calendar -->
 <script type="text/javascript" src="{{{'public/backend/js/monthly.js'}}}"></script>
 <script type="text/javascript">
  $(window).load( function() {

   $('#mycalendar').monthly({
    mode: 'event',

  });

   $('#mycalendar2').monthly({
    mode: 'picker',
    target: '#mytarget',
    setWidth: '250px',
    startHidden: true,
    showTrigger: '#mytarget',
    stylePast: true,
    disablePast: true
  });

   switch(window.location.protocol) {
    case 'http:':
    case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
  }

});
</script>
<!-- //calendar -->
</body>

<!-------xử lí hàng tồn----------------------------------------------------------->
{{-- <script type="text/javascript">

  $(document).on('change','.order_details',function() {
 var order_status=$(this).val() //val là lấy value bên option
 var order_id =$(this).children(":selected").attr("id");
 var _token=$('input[name="_token"]').val();

 alert(order_status);

 alert(order_id);

 alert(_token);

});

</script> --}}
<!-----------------------------GALLERY--------------------------------------->
{{-- //lấy bên layout --}}
<script type="text/javascript">

        //lấy class pro_id-- và 1 function load gallery
//-load lai cái fnction
load_gallery();
function load_gallery(){
  var pro_id = $('.product_gal_id').data('product_id');
  var _token =$('input[name="_token"]').val();
            //gửi ajax
            $.ajax({
              url:"{{url('select-gallery')}}", 

              type:"POST",
              data:{
                pro_id:pro_id,
                _token:_token


              },
              success:function(data){

                    //láy cái id chỗ div bọc table
                    $('#gallery_load').html(data);
                  }

                });

          }


        //kiểm tra id input thêm ảnh và thẻ span error
             // $(document).on('change','#file',function() {
            //   $('#file').change(function() {
            // var error=''; // hiện tại = rỗng
            // //khi tải ảnh lên... sẽ được đánh số thứ tự bắt đầu từ 0
            // var file= $('#file')[0].files;
            // if(files.length>5)
            // {
            //   error='<p>Bạn chỉ được nhập tối đa là 5 ảnh</p>';
            // }
            // else if(files.length='')
            // {
            //   error='<p>Bạn không được bỏ trống ảnh</p>';
            // }
            // else if(files.size=2000000)
            // {
            //   error='<p>file ảnh không được lớn hơn 2 MB</p>';
            // }
            // if(error='')
            // {

            // }
            // else{
            //   $('#file').val('');
            //     //lấy id error bên thẻ span
            //     $('#error_gallery').html('<span class="text-danger">'+error+'  </span>');
            //     return false;
            //   }

            // });


    // $('.edit_gal_name').blur(function(){

    //     
    // });
    
//sửa tên của ảnh

$(document).on('blur','.edit_gal_name',function() {
  var gal_id =$(this).data('gal_id');
  var gal_text=$(this).text();
  var _token =$('input[name="_token"]').val();
 //  update tên ảnh
 $.ajax({
  url:"{{url('/update-gallery-name')}}", 

  type:"POST",
  data:{
   gal_id:gal_id,
   gal_tex: gal_text,
   _token:_token

 },
 success:function(data){
  load_gallery();
  $('#error_gallery').html('<span class="text-danger"> cập nhật tên hình ảnh thành công</span>');

}

});
});
// xóa hình ảnh

$(document).on('click','.delete-gallery',function() {
  var gal_id =$(this).data('gal_id');

  var _token =$('input[name="_token"]').val();
  if(confirm('Bạn có muốn xóa ảnh này không !')){


    $.ajax({
      url:"{{url('/delete-gallery')}}", 

      type:"POST",
      data:{
       gal_id:gal_id,
       _token:_token

     },
     success:function(data){
      load_gallery();
      $('#error_gallery').html('<span class="text-danger"> Xóa hình ảnh thành công</span>');

    }

  });
  }
});
     // cập nhật hình ảnh
     $(document).on('change','.file_image',function() {
      var gal_id =$(this).data('gal_id');
      var image =document.getElementById('file-'+gal_id ).files[0];
// khai báo tạo from 
var form_data= new FormData();  // láy name ô input=file
form_data.append("file",document.getElementById('file-'+gal_id ).files[0]);

form_data.append("gal_id",gal_id);



$.ajax({
  url:"{{url('/update-gallery')}}", 

  type:"POST",
  headers:{

    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')

  },

  data:form_data,
  contentsType:false,
  cache:false,
  processData:false,

  success:function(data){
   load_gallery();
   $('#error_gallery').html('<span class="text-danger"> Cập nhật hình ảnh thành công</span>');

 }

});

});
</script>  

</html>
