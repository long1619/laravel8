<!DOCTYPE html>
<html lang="en">
<head>


	<!------------------------------------------------------------->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content=""> 
	<title>Home | BB KISD </title>
	<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<!-------------------------zoom------------------>
	<link href="{{asset('public/frontend/css/magiczoomplus.css')}}" rel="stylesheet">
	<script src="{{asset('public/frontend/js/magiczoomplus.js')}}"></script>

	<div id="code-to-copy"></div> 
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/prettify.min.css')}} ">
	<script type="text/javascript" src="{{asset('public/frontend/js/prettify.min.js')}} "></script>
	<script>try { prettyPrint(); } catch(e) {}</script>

	<!------------------------------------------->



	{{--     <link rel="canonical" type="text/css" href="{{$url_canonical}}"> --}}
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->       
<link rel="shortcut icon" href="{{{'public/frontend/images/ico/favicon.ico'}}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{'public/frontend/images/ico/apple-touch-icon-144-precomposed.png'}}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{'public/frontend/images/ico/apple-touch-icon-114-precomposed.png'}}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{'public/frontend/images/ico/apple-touch-icon-72-precomposed.png'}}}">
<link rel="apple-touch-icon-precomposed" href="{{{'public/frontend/images/ico/apple-touch-icon-57-precomposed.png'}}}">
</head>
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0362494015</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> duclong1619@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('/public/frontend/download/logo.jpg')}}" style="width: 150px" />
							</div>
							<div class="btn-group pull-right">
								<div class="btn-group">
									<div class="fb-like" data-href="https://http://eshopper.com/Btlaravel/DOANLARAVEL/home" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>

									<ul class="dropdown-menu">
										<li><a href="#">Canada</a></li>
										<li><a href="#">UK</a></li>
									</ul>
								</div>

								<div class="btn-group">

									<!--------------------------------------------->	
									<div class="fb-share-button" data-href="http://eshopper.com/Btlaravel/DOANLARAVEL/home" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Feshopper.com%2FBtlaravel%2FDOANLARAVEL%2Fhome&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

									<!--------------------------------------------->



									<ul class="dropdown-menu">
										<li><a href="#">Canadian Dollar</a></li>
										<li><a href="#">Pound</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="shop-menu pull-right">
								<ul class="nav navbar-nav">


									<li><a href="#"><i class="fa fa-star"></i> Danh Sách Yêu Thích</a></li>
									<!--thanh toán---------------->

									<?php  
// kiểm tra có tồn tại k. đã đăng nhập hoặc chưa đăng nhập
									$customer_id=session()->get('customer_id');
									$shipping_id=session()->get('shipping_id');

									if($customer_id!=NULL&& $shipping_id =NULL){

										?>
										<li><a href="{{url('checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>

										<?php	
									}

									elseif ($customer_id=NULL & $shipping_id =NULL) {


										?>
										<li><a href="{{url('payment')}}"><i class="fa fa-lock"></i> Thanh Toán </a></li> 
										<?php 
									}else{
										?>
										<li><a href="{{url('login-check-out')}}"><i class="fa fa-lock"></i> Thanh Toán </a></li> 

										<?php 


									}


									?>




									<!--------------------------------------------->


									<li><a href="{{url('show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a>
									</li>



									<?php  
// kiểm tra có tồn tại k. nếu chưa có thì sẽ hiện chữ đăng nhập. còn đăng nhập rồi sẽ là đăng xuất
									$customer_id=session()->get('customer_id');
									if($customer_id!=NULL){

										?>
										<li><a href="{{url('logout-check-out')}}"><i class="fa fa-lock"></i> Đăng Xuất</a></li>

										<?php	
									}

									else{
										?>

										<li><a href="{{url('login-check-out')}}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
										<?php 
									}


									?>

									{{-- <li><a href="{{url('login-check')}}"><i class="fa fa-lock"></i> Đăng Nhập</a></li> --}}
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!--/header-middle-->

			<div class="header-bottom"><!--header-bottom-->
				<div class="container">
					<div class="row">
						<div class="col-sm-8">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="mainmenu pull-left">

								<ul class="nav navbar-nav collapse navbar-collapse">
									<li><a href=" {{url('home')}}" class="active">Trang Chủ</a></li> 
									<li class="dropdown"><a href="#">Tin Tức <i class="fa fa-angle-down"></i></a>
										<!--------------danh mục bài viết--------------------------------------------------------------->
										<ul role="menu" class="sub-menu " style="background:#04B2D9;">


											@foreach($show_cate_post as $Key=>$show_p)
											<li><a href="{{url('danh-muc-bai-viet/'.$show_p->cate_post_slug)}}">
												{{$show_p->cate_post_name}}

											</a></li>
											@endforeach	
										</ul> 
										<!----------------------------------------------------------------------------->
									</li>
								</ul>
							</div>
						</div>

						<!------------tìm kiếm------------------------------------------>
						<form method="POST"action="{{url('tim-kiem')}}"> 
							@csrf
							<div class="col-sm-10">
								<div class="{{-- search_box --}} pull-right">
									<input type="text" name ="keywords_submit"
									placeholder="Nhập Sản Phẩm Bạn Cần Tìm    " class="text-center" size="80" style="height: 30px" />


									<input type="submit" style="color:green" name ="search_item" class="btn btn-danger btn-sm text-center" value="Tìm Kiếm"   />
								</div>
							</div>

						</form>					
						<!---------------------------------------------------->

					</div>
				</div>
			</div><!--/header-bottom-->
		</header><!--/header-->

		<section id="slider"><!--slider-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#slider-carousel" data-slide-to="1"></li>
								<li data-target="#slider-carousel" data-slide-to="2"></li>
							</ol>

							<div class="carousel-inner">
								<div class="item active">
<div class="col-sm-12">

	<img src="{{asset('/public/frontend/download/hom1.jpg')}}" class="girl img-responsive" style="height: 350px" alt="" />

</div>
</div>
<div class="item">

	<div class="col-sm-12">
		<img src="{{asset('/public/frontend/download/hom2.jpg')}}" class="girl img-responsive" style="height: 350px;width: auto;"alt="" />
	
	</div>
</div>

<div class="item">
<div class="col-sm-12">
	<img src="{{asset('/public/frontend/download/hom3.jpg')}}" class="girl img-responsive" alt="" style="height: 350px;"/>
</div>
</div>

</div>
<!----------------------------------------------------->			
<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
	<i class="fa fa-angle-left"></i>
</a>
<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
	<i class="fa fa-angle-right"></i>
</a>
</div>
</div>
</div>
</div>
</section><!--/slider-->

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<!--------------------------------------------------------------------------------------------------------->						
					<h2>Danh Mục Sản Phẩm</h2>

					<div class="panel-group category-products" id="accordian"><!--category-productsr-->


						<div class="panel panel-default">

							<!-- 	<h4 class="panel-title"><a href="#">Shoes</a></h4>  -->

							@foreach($category as $key =>$cate_home)

							<div class="panel-heading">
								<h4 class="panel-title">
									<a href="  {{url('danh-muc-san-pham/'.$cate_home->category_id)}} ">
										{{$cate_home->category_name}}</a></h4>
									</div>        

									@endforeach

								</div>
							</div>

							<!--/category-products-->
							<!--------------------------------------------------------------------->	
							<div class="brands_products" >
								<!--brands_products-->
								<h2>Thương Hiệu Sản Phẩm</h2>

								<div class="brands-name">

									@foreach($brand as $Key =>$brand_home)	
									<ul class="nav nav-pills nav-stacked">
										<li><a href="{{url('thuong-hieu-san-pham/'.$brand_home->brand_id)}}}"> 

											{{$brand_home->brand_name}}</a></li>
										</ul>
										@endforeach

									</div>
								</div> <br>
								<!--/brands_products-->
								<!---------------------------------------------------------------------------------->					
								

</div>
</div>

<!--------------------------------------------------------------------->
<div class="col-sm-9 padding-right"> 

	@yield('content')


</div>
<!--------------------------------------------------------------------->					
</div>
</div>
</div>
</section>

<footer id="footer"><!--Footer-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="companyinfo">
					<img src="{{asset('/public/frontend/download/logo.jpg')}}" style="width: 150px" /> <br> <br>
						<p> BB KISD là thương hiêu thời trang trẻ em, quần áo trẻ em hàng hiệu cao cấp đẹp, chất lượng tốt nhất.</p>
					</div>
				</div>
				<div class="col-sm-10">
					<div class="col-sm-3">
						<div class="video-gallery text-center">

							<div class="iframe-img ">
								<img src="{{asset('/public/frontend/download/a1.jpg')}}" style="margin:10px; height:40px " />
							</div>

							<h2>GIAO HÀNG MIỄN PHÍ</h2>
						</div>
					</div>

					<div class="col-sm-3"> 
						<div class="video-gallery text-center">

							<div class="iframe-img">
								<img src="{{asset('/public/frontend/download/a2.jpg')}}"style="margin:10px; height:40px " />
							</div>

							<h2>ĐẢM BẢO CHẤT LƯỢNG</h2>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="video-gallery text-center">

							<div class="iframe-img ">
								<img src="{{asset('/public/frontend/download/a3.jpg')}}" style="margin:10px; height:40px " />
							</div>

							<h2>AN TÂM MUA SẮM</h2>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="video-gallery text-center">

							<div class="iframe-img">
								<img src="{{asset('/public/frontend/download/a4.jpg')}}" style="margin:10px; height:40px "  />
							</div>


							<p>CẦN TƯ VẤN</p>
							<h2>Hotline : 0362494015</h2>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>

	<div class="footer-widget">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="single-widget">
						<h2>Cửa Hàng BB KISD</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#"> Số 67 Đường Nguyễn Thái Sơn, Quỳnh Côi, Quỳnh Phụ, Thái Bình</a></li>
							<li><a href="#">Hotline: 0362494015</a></li>
							<li><a href="#">Email: duclong1619@gmail.com</a></li>
					
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-widget">
						<h2>Truy Cập Nhanh</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#">Trang Chủ</a></li>
							<li><a href="#">Giới Thiệu</a></li>
							<li><a href="#">Lĩnh Vực Hoạt Động</a></li>
							<li><a href="#">Liên Hệ</a></li>
						
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-widget">
						<h2>Danh Mục Sản Phẩm</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#">ÁO BÉ TRAI</a></li>
							<li><a href="#">ÁO BÉ GÁI</a></li>
							<li><a href="#">ĐẦM BÉ GÁI</a></li>
							<li><a href="#">QUẦN BÉ TRAI</a></li>
							<li><a href="#">QUẦN BÉ GÁI</a></li>
							<li><a href="#">BỘ CHO BÉ GÁI</a></li>
							<li><a href="#">BỘ CHO BÉ TRAI</a></li>

	
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-widget">
						<h2>Hỗ Trợ Khách Hàng</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="#">Chính Sách Bảo Hành</a></li>
							<li><a href="#">Địa Điểm Bán Hàng</a></li>
							<li><a href="#">Liên Hệ Với Tư Vấn Viên</a></li>
					
						</ul>
					<br>
				
					<img src="{{asset('/public/frontend/download/DTB.png')}}" style="width: 200px" />
					</div>
				</div>
	{{-- 			<div class="col-sm-3 col-sm-offset-1">
					<div class="single-widget">
						<h2>About Shopper</h2>
						<form action="#" class="searchform">
							<input type="text" placeholder="Your email address" />
							<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
					
						</form>
					</div>
				</div> --}}

			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="text-center">Copyright © 2021 BB KISD - Thời Trang Trẻ Em uy tín được nhiều cha mẹ tin dùng.</p>

				<!-- <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p> -->
			</div>
		</div>
	</div>

</footer><!--/Footer-->



<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('asset(public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>

<script src="{{asset('public/frontend/js/alo.css')}}"></script>



<!------------------------------>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="106593721504964">
      </div>

<!--------------------------------------------------------------------------------------------->
<!-------------AJAX sắp xếp theo tên và giá---------------------------->
<script >
	
$(document).ready(function() {
		$('#sort').on('change',function(){
				var url =  $('#sort').val();
				alert(url);
// 				if(url){
// 					window.location =url;
// 				}
// //nếu k return false
// return false;
		});

});

</script>



<!--------------------------------------------------------------------------------------------->
<div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon">
	<a href="tel:0362494015" title="Liên hệ nhanh">
		<div class="quick-alo-ph-circle"></div>
		<div class="quick-alo-ph-circle-fill"></div>
		<div class="quick-alo-ph-img-circle"></div>
	</a>
</div>
<style>
	.quick-alo-phone{
		display: block;
	}
	.quick-alo-phone.quick-alo-static {
		opacity:.6;
	}
	.quick-alo-phone.quick-alo-hover,
	.quick-alo-phone:hover {
		opacity:1;
	}
	.quick-alo-ph-circle {
		width:160px;
		height:160px;
		top:20px;
		left:20px;
		position:absolute;
		background-color:transparent;
		-webkit-border-radius:100%;
		-moz-border-radius:100%;
		border-radius:100%;
		border:2px solid rgba(30,30,30,0.4);
		border:2px solid #bfebfc 9;
		opacity:.1;
		-webkit-animation:quick-alo-circle-anim 1.2s infinite ease-in-out;
		-moz-animation:quick-alo-circle-anim 1.2s infinite ease-in-out;
		-ms-animation:quick-alo-circle-anim 1.2s infinite ease-in-out;
		-o-animation:quick-alo-circle-anim 1.2s infinite ease-in-out;
		animation:quick-alo-circle-anim 1.2s infinite ease-in-out;
		-webkit-transition:all .5s;
		-moz-transition:all .5s;
		-o-transition:all .5s;
		transition:all .5s;
		-webkit-transform-origin:50% 50%;
		-moz-transform-origin:50% 50%;
		-ms-transform-origin:50% 50%;
		-o-transform-origin:50% 50%;
		transform-origin:50% 50%;
	}
	.quick-alo-phone.quick-alo-active .quick-alo-ph-circle {
		-webkit-animation:quick-alo-circle-anim 1.1s infinite ease-in-out !important;
		-moz-animation:quick-alo-circle-anim 1.1s infinite ease-in-out !important;
		-ms-animation:quick-alo-circle-anim 1.1s infinite ease-in-out !important;
		-o-animation:quick-alo-circle-anim 1.1s infinite ease-in-out !important;
		animation:quick-alo-circle-anim 1.1s infinite ease-in-out !important;
	}
	.quick-alo-phone.quick-alo-static .quick-alo-ph-circle {
		-webkit-animation:quick-alo-circle-anim 2.2s infinite ease-in-out !important;
		-moz-animation:quick-alo-circle-anim 2.2s infinite ease-in-out !important;
		-ms-animation:quick-alo-circle-anim 2.2s infinite ease-in-out !important;
		-o-animation:quick-alo-circle-anim 2.2s infinite ease-in-out !important;
		animation:quick-alo-circle-anim 2.2s infinite ease-in-out !important;
	}
	.quick-alo-phone.quick-alo-hover .quick-alo-ph-circle,
	.quick-alo-phone:hover .quick-alo-ph-circle {
		border-color:#00aff2;
		opacity:.5;
	}
	.quick-alo-phone.quick-alo-green.quick-alo-hover .quick-alo-ph-circle,
	.quick-alo-phone.quick-alo-green:hover .quick-alo-ph-circle {
		border-color:#75eb50;
		border-color:#baf5a7 9;
		opacity:.5;
	}
	.quick-alo-phone.quick-alo-green .quick-alo-ph-circle {
		border-color:#00aff2;
		border-color:#bfebfc 9;
		opacity:.5;
	}
	.quick-alo-phone.quick-alo-gray.quick-alo-hover .quick-alo-ph-circle,
	.quick-alo-phone.quick-alo-gray:hover .quick-alo-ph-circle {
		border-color:#ccc;
		opacity:.5;
	}
	.quick-alo-phone.quick-alo-gray .quick-alo-ph-circle {
		border-color:#75eb50;
		opacity:.5;
	}
	.quick-alo-ph-circle-fill {
		width:100px;
		height:100px;
		top:50px;
		left:50px;
		position:absolute;
		background-color:#000;
		-webkit-border-radius:100%;
		-moz-border-radius:100%;
		border-radius:100%;
		border:2px solid transparent;
		opacity:.1;
		-webkit-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
		-moz-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
		-ms-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
		-o-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
		animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out;
		-webkit-transition:all .5s;
		-moz-transition:all .5s;
		-o-transition:all .5s;
		transition:all .5s;
		-webkit-transform-origin:50% 50%;
		-moz-transform-origin:50% 50%;
		-ms-transform-origin:50% 50%;
		-o-transform-origin:50% 50%;
		transform-origin:50% 50%;
	}
	.quick-alo-phone.quick-alo-active .quick-alo-ph-circle-fill {
		-webkit-animation:quick-alo-circle-fill-anim 1.7s infinite ease-in-out !important;
		-moz-animation:quick-alo-circle-fill-anim 1.7s infinite ease-in-out !important;
		-ms-animation:quick-alo-circle-fill-anim 1.7s infinite ease-in-out !important;
		-o-animation:quick-alo-circle-fill-anim 1.7s infinite ease-in-out !important;
		animation:quick-alo-circle-fill-anim 1.7s infinite ease-in-out !important;
	}
	.quick-alo-phone.quick-alo-static .quick-alo-ph-circle-fill {
		-webkit-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out !important;
		-moz-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out !important;
		-ms-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out !important;
		-o-animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out !important;
		animation:quick-alo-circle-fill-anim 2.3s infinite ease-in-out !important;
		opacity:0 !important;
	}
	.quick-alo-phone.quick-alo-hover .quick-alo-ph-circle-fill,
	.quick-alo-phone:hover .quick-alo-ph-circle-fill {
		background-color:rgba(0,175,242,0.5);
		background-color:#00aff2 9;
		opacity:.75 !important;
	}
	.quick-alo-phone.quick-alo-green.quick-alo-hover .quick-alo-ph-circle-fill,
	.quick-alo-phone.quick-alo-green:hover .quick-alo-ph-circle-fill {
		background-color:rgba(117,235,80,0.5);
		background-color:#baf5a7 9;
		opacity:.75 !important;
	}
	.quick-alo-phone.quick-alo-green .quick-alo-ph-circle-fill {
		background-color:rgba(0,175,242,0.5);
		background-color:#a6e3fa 9;
		opacity:.75 !important;
	}
	.quick-alo-phone.quick-alo-gray.quick-alo-hover .quick-alo-ph-circle-fill,
	.quick-alo-phone.quick-alo-gray:hover .quick-alo-ph-circle-fill {
		background-color:rgba(204,204,204,0.5);
		background-color:#ccc 9;
		opacity:.75 !important;
	}
	.quick-alo-phone.quick-alo-gray .quick-alo-ph-circle-fill {
		background-color:rgba(117,235,80,0.5);
		opacity:.75 !important;
	}
	.quick-alo-ph-img-circle {
		width:60px;
		height:60px;
		top:70px;
		left:70px;
		position:absolute;
		background:rgba(30,30,30,0.1) url("https://i.imgur.com/YWJeVO2.png") no-repeat center center;
		-webkit-border-radius:100%;
		-moz-border-radius:100%;
		border-radius:100%;
		border:2px solid transparent;
		opacity:.7;
		-webkit-animation:quick-alo-circle-img-anim 1s infinite ease-in-out;
		-moz-animation:quick-alo-circle-img-anim 1s infinite ease-in-out;
		-ms-animation:quick-alo-circle-img-anim 1s infinite ease-in-out;
		-o-animation:quick-alo-circle-img-anim 1s infinite ease-in-out;
		animation:quick-alo-circle-img-anim 1s infinite ease-in-out;
		-webkit-transform-origin:50% 50%;
		-moz-transform-origin:50% 50%;
		-ms-transform-origin:50% 50%;
		-o-transform-origin:50% 50%;
		transform-origin:50% 50%;
	}
	.quick-alo-phone.quick-alo-active .quick-alo-ph-img-circle {
		-webkit-animation:quick-alo-circle-img-anim 1s infinite ease-in-out !important;
		-moz-animation:quick-alo-circle-img-anim 1s infinite ease-in-out !important;
		-ms-animation:quick-alo-circle-img-anim 1s infinite ease-in-out !important;
		-o-animation:quick-alo-circle-img-anim 1s infinite ease-in-out !important;
		animation:quick-alo-circle-img-anim 1s infinite ease-in-out !important;
	}
	.quick-alo-phone.quick-alo-static .quick-alo-ph-img-circle {
		-webkit-animation:quick-alo-circle-img-anim 0s infinite ease-in-out !important;
		-moz-animation:quick-alo-circle-img-anim 0s infinite ease-in-out !important;
		-ms-animation:quick-alo-circle-img-anim 0s infinite ease-in-out !important;
		-o-animation:quick-alo-circle-img-anim 0s infinite ease-in-out !important;
		animation:quick-alo-circle-img-anim 0s infinite ease-in-out !important;
	}
	.quick-alo-phone.quick-alo-hover .quick-alo-ph-img-circle,
	.quick-alo-phone:hover .quick-alo-ph-img-circle {
		background-color:#00aff2;
	}
	.quick-alo-phone.quick-alo-green.quick-alo-hover .quick-alo-ph-img-circle,
	.quick-alo-phone.quick-alo-green:hover .quick-alo-ph-img-circle {
		background-color:#75eb50;
	}
	.quick-alo-phone.quick-alo-green .quick-alo-ph-img-circle {
		background-color:#00aff2;
	}
	.quick-alo-phone.quick-alo-gray.quick-alo-hover .quick-alo-ph-img-circle,
	.quick-alo-phone.quick-alo-gray:hover .quick-alo-ph-img-circle {
		background-color:#ccc;
	}
	.quick-alo-phone.quick-alo-gray .quick-alo-ph-img-circle {
		background-color:#75eb50;
	}
	@-moz-keyframes quick-alo-circle-anim {
		0% {
			-moz-transform:rotate(0) scale(.5) skew(1deg);
			opacity:.1;
			-moz-opacity:.1;
			-webkit-opacity:.1;
			-o-opacity:.1;
		}
		30% {
			-moz-transform:rotate(0) scale(.7) skew(1deg);
			opacity:.5;
			-moz-opacity:.5;
			-webkit-opacity:.5;
			-o-opacity:.5;
		}
		100% {
			-moz-transform:rotate(0) scale(1) skew(1deg);
			opacity:.6;
			-moz-opacity:.6;
			-webkit-opacity:.6;
			-o-opacity:.1;
		}
	}
	@-webkit-keyframes quick-alo-circle-anim {
		0% {
			-webkit-transform:rotate(0) scale(.5) skew(1deg);
			-webkit-opacity:.1;
		}
		30% {
			-webkit-transform:rotate(0) scale(.7) skew(1deg);
			-webkit-opacity:.5;
		}
		100% {
			-webkit-transform:rotate(0) scale(1) skew(1deg);
			-webkit-opacity:.1;
		}
	}
	@-o-keyframes quick-alo-circle-anim {
		0% {
			-o-transform:rotate(0) kscale(.5) skew(1deg);
			-o-opacity:.1;
		}
		30% {
			-o-transform:rotate(0) scale(.7) skew(1deg);
			-o-opacity:.5;
		}
		100% {
			-o-transform:rotate(0) scale(1) skew(1deg);
			-o-opacity:.1;
		}
	}
	@-moz-keyframes quick-alo-circle-fill-anim {
		0% {
			-moz-transform:rotate(0) scale(.7) skew(1deg);
			opacity:.2;
		}
		50% {
			-moz-transform:rotate(0) -moz-scale(1) skew(1deg);
			opacity:.2;
		}
		100% {
			-moz-transform:rotate(0) scale(.7) skew(1deg);
			opacity:.2;
		}
	}
	@-webkit-keyframes quick-alo-circle-fill-anim {
		0% {
			-webkit-transform:rotate(0) scale(.7) skew(1deg);
			opacity:.2;
		}
		50% {
			-webkit-transform:rotate(0) scale(1) skew(1deg);
			opacity:.2;
		}
		100% {
			-webkit-transform:rotate(0) scale(.7) skew(1deg);
			opacity:.2;
		}
	}
	@-o-keyframes quick-alo-circle-fill-anim {
		0% {
			-o-transform:rotate(0) scale(.7) skew(1deg);
			opacity:.2;
		}
		50% {
			-o-transform:rotate(0) scale(1) skew(1deg);
			opacity:.2;
		}
		100% {
			-o-transform:rotate(0) scale(.7) skew(1deg);
			opacity:.2;
		}
	}
	@-moz-keyframes quick-alo-circle-img-anim {
		0% {
			transform:rotate(0) scale(1) skew(1deg);
		}
		10% {
			-moz-transform:rotate(-25deg) scale(1) skew(1deg);
		}
		20% {
			-moz-transform:rotate(25deg) scale(1) skew(1deg);
		}
		30% {
			-moz-transform:rotate(-25deg) scale(1) skew(1deg);
		}
		40% {
			-moz-transform:rotate(25deg) scale(1) skew(1deg);
		}
		50% {
			-moz-transform:rotate(0) scale(1) skew(1deg);
		}
		100% {
			-moz-transform:rotate(0) scale(1) skew(1deg);
		}
	}
	@-webkit-keyframes quick-alo-circle-img-anim {
		0% {
			-webkit-transform:rotate(0) scale(1) skew(1deg);
		}
		10% {
			-webkit-transform:rotate(-25deg) scale(1) skew(1deg);
		}
		20% {
			-webkit-transform:rotate(25deg) scale(1) skew(1deg);
		}
		30% {
			-webkit-transform:rotate(-25deg) scale(1) skew(1deg);
		}
		40% {
			-webkit-transform:rotate(25deg) scale(1) skew(1deg);
		}
		50% {
			-webkit-transform:rotate(0) scale(1) skew(1deg);
		}
		100% {
			-webkit-transform:rotate(0) scale(1) skew(1deg);
		}
	}
	@-o-keyframes quick-alo-circle-img-anim {
		0% {
			-o-transform:rotate(0) scale(1) skew(1deg);
		}
		10% {
			-o-transform:rotate(-25deg) scale(1) skew(1deg);
		}
		20% {
			-o-transform:rotate(25deg) scale(1) skew(1deg);
		}
		30% {
			-o-transform:rotate(-25deg) scale(1) skew(1deg);
		}
		40% {
			-o-transform:rotate(25deg) scale(1) skew(1deg);
		}
		50% {
			-o-transform:rotate(0) scale(1) skew(1deg);
		}
		100% {
			-o-transform:rotate(0) scale(1) skew(1deg);
		}
	}
	.quick-alo-phone {
		position: fixed;
		background-color: transparent;
		width: 50px;
		height: 150px;
		cursor: pointer;
		z-index: 200000 !important;
		-webkit-backface-visibility: hidden;
		-webkit-transform: translateZ(0);
		-webkit-transition: visibility .5s;
		-moz-transition: visibility .5s;
		-o-transition: visibility .5s;
		transition: visibility .5s;
		right: 105px;
		bottom: 90px;

	}	

</style>
<!---------------------zoom--------------------------->

<style type="text/css">

	h1 { font-size:1.5em; font-weight:normal; color:#555; }
	h2 { font-size:1.3em; font-weight:normal; color:#555; }
	h2.caption { margin: 2.5em 0 0;}
	h3 { font-size:1.1em; font-weight: normal; color:#555; }
	h3.pad { margin: 2em 0 1em; }
	h4 { font-size: 1em; font-weight:normal; color:#555; }
	p.pad { margin-top: 1.5em; }
	a { outline: none; }


	.cfg-btn {
		background-color: rgb(55, 181, 114);
		color: #fff;
		border: 0;
		box-shadow: 0 0 1px 0px rgba(0,0,0,0.3);
		outline:0;
		cursor: pointer;
		width: 200px;
		padding: 10px;
		font-size: 1em;
		position: relative;
		display: inline-block;
		margin: 10px auto;
	}
	.cfg-btn:hover:not([disabled]) {
		background-color: rgb(37, 215, 120);
	}
	.mobile-magic .cfg-btn:hover:not([disabled]) { background: rgb(55, 181, 114); }
	.cfg-btn[disabled] { opacity: .5; color: #808080; background: #ddd; }

	.cfg-btn.btn-preview,
	.cfg-btn.btn-preview:active,
	.cfg-btn.btn-preview:focus {
		font-size: 1em;
		position: relative;
		display: block;
		margin: 10px auto;
	}

	.cfg-btn,
	.preview,
	.app-figure,
	.api-controls,
	.wizard-settings,
	.wizard-settings .inner,
	.wizard-settings .footer,
	.wizard-settings input,
	.wizard-settings select {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.preview,
	.wizard-settings {
		padding: 10px;
		border: 0;
		min-height: 1px;
	}
	.preview {
		position: relative;
	}

	.api-controls {
		text-align: center;
	}
	.api-controls button,
	.api-controls button:active,
	.api-controls button:focus {
		width: 80px; font-size: .7em;
		white-space: nowrap;
	}

	.app-figure {
		width: 90% !important;
		margin: 0px auto;
		border: 0px solid red;
		padding: 0px;
		position: relative;
		text-align: center;
	}
	.selectors { margin-top: 10px; }
	.selectors .mz-thumb img { max-width: 56px; }

	.app-code-sample {
		max-width: 80%;
		margin: 30px auto 0;
		text-align: center;
		position: relative;
	}
	.app-code-sample input[type="radio"] {
		display: none;
	}
	.app-code-sample label {
		display: inline-block;
		padding: 2px 12px;
		margin: 0;
		font-size: .8em;
		text-decoration: none;
		cursor: pointer;
		color: #666;
		border: 1px solid rgba(136, 136, 136, 0.5);
		background-color: transparent;
	}
	.app-code-sample label:hover {
		color: #fff;
		background-color: rgb(253, 154, 30);
		border-color: rgb(253, 154, 30);
	}
	.app-code-sample input[type="radio"]:checked+label {
		color: #fff;
		background-color: rgb(110, 110, 110) !important;
		border-color: rgba(110, 110, 110, 0.7) !important;
	}
	.app-code-sample label:first-of-type {
		border-radius: 4px 0 0 4px;
		border-right-color: transparent;
	}
	.app-code-sample label:last-of-type {
		border-radius: 0 4px 4px 0;
		border-left-color: transparent;
	}

	.app-code-sample .app-code-holder {
		padding: 0;
		position: relative;
		border: 1px solid #eee;
		border-radius: 0px;
		background-color: #fafafa;
		margin: 15px 0;
	}
	.app-code-sample .app-code-holder > div {
		display: none;
	}
	.app-code-sample .app-code-holder pre {
		text-align: left;
		white-space: pre-line;
		border: 0px solid #eee;
		border-radius: 0px;
		background-color: transparent;
		padding: 25px 50px 25px 25px;
		margin: 0;
		min-height: 25px;
	}
	.app-code-sample input[type="radio"]:nth-of-type(1):checked ~ .app-code-holder > div:nth-of-type(1) {
		display: block;
	}
	.app-code-sample input[type="radio"]:nth-of-type(2):checked ~ .app-code-holder > div:nth-of-type(2) {
		display: block;
	}

	.app-code-sample .app-code-holder .cfg-btn-copy {
		display: none;
		z-index: -1;
		position: absolute;
		top:10px; right: 10px;
		width: 44px;
		font-size: .65em;
		white-space: nowrap;
		margin: 0;
		padding: 4px;
	}
	.copy-msg {
		font: normal 11px/1.2em 'Helvetica Neue', Helvetica, 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Arial, sans-serif;
		color: #2a4d14;
		border: 1px solid #2a4d14;
		border-radius: 4px;
		position: absolute;
		top: 8px;
		left: 0;
		right: 0;
		width: 200px;
		max-width: 70%;
		padding: 4px;
		margin: 0px auto;
		text-align: center;
	}
	.copy-msg-failed {
		color: #b80c09;
		border-color: #b80c09;
		width: 430px;
	}
	.mobile-magic .app-code-sample .cfg-btn-copy { display: none; }
	#code-to-copy { position: absolute; width: 0; height: 0; top: -10000px; }
	.lt-ie9-magic .app-code-sample { display: none; }

	.wizard-settings {
		background-color: #4f4f4f;
		color: #a5a5a5;
		position: absolute;
		right: 0;
		width: 340px;
	}
	.wizard-settings .inner {
		width: 100%;
		margin-bottom: 30px;
	}
	.wizard-settings .footer {
		color: #c7d59f;
		font-size: .75em;
		width: 100%;
		position: relative;
		vertical-align: bottom;
		text-align: center;
		padding: 6px;
		margin-top: 10px;
	}
	.wizard-settings .footer a { color: inherit; text-decoration: none; }
	.wizard-settings .footer a:hover { text-decoration: underline; }

	.wizard-settings a { color: #cc9933; }
	.wizard-settings a:hover { color: #dfb363; }
	.wizard-settings table > tbody > tr > td { vertical-align: top; }
	.wizard-settings table { min-width: 300px; max-width: 100%; font-size: .8em; margin: 0 auto; }
	.wizard-settings table caption { font-size: 1.5em; padding: 16px 8px; }
	.wizard-settings table td { padding: 4px 8px; }
	.wizard-settings table td:first-child { white-space: nowrap; }
	.wizard-settings table td:nth-child(2) { text-align: left; }
	.wizard-settings table td .values {
		color: #a08794;
		font-size: 0.8em;
		line-height: 1.3em;
		display: block;
		max-width: 126px;
	}
	.wizard-settings table td .values:before { content: ''; display: block; }

	.wizard-settings input,
	.wizard-settings select {
		width: 126px;
	}
	.wizard-settings input {
		padding: 0px 4px;
	}
	.wizard-settings input[disabled] {
		color: #808080;
		background: #a7a7a7;
		border: 1px solid #a7a7a7;
	}

	.preview { width: 70%; float: left; }
	@media (min-width: 0px) {
		.preview { width: 100%; float: none; }
	}

	@media (min-width: 1024px) {
		.preview { width: calc(100% - 340px); }
		.wizard-settings { top: 0; min-height: 100%; }
		.wizard-settings .inner { margin-top: 60px; }
		.wizard-settings .footer { position: absolute; bottom: 0; left: 0; }
		.wizard-settings .settings-controls {
			position: fixed;
			top: 0; right: 0;
			width: 340px;
			padding: 10px 0 0;
			text-align: center;
			background-color: inherit;
		}
	}
	@media screen and (max-width: 1024px) {
		.api-controls button, .api-controls button:active, .api-controls button:focus {
			width: 70px;
		}
	}
	@media screen and (max-width: 1023px) {
		.app-figure { width: 98% !important; margin: 50px auto; padding: 0; }
		.app-code-sample { display: none; }
		.wizard-settings { width: 100%; }
	}
	@media screen and (max-width: 600px) {
		.mz-thumb img { max-width: 39px; }
	}
	@media screen and (max-width: 560px) {
		.api-controls .sep { content: ''; display: table; }
	}
	@media screen and (min-width: 1600px) {
		.preview { padding: 10px 160px; }
	}
</style>

<script type="text/javascript">
	var mzOptions = {};
	mzOptions = {
		onZoomReady: function() {
			console.log('onReady', arguments[0]);
		},
		onUpdate: function() {
			console.log('onUpdated', arguments[0], arguments[1], arguments[2]);
		},
		onZoomIn: function() {
			console.log('onZoomIn', arguments[0]);
		},
		onZoomOut: function() {
			console.log('onZoomOut', arguments[0]);
		},
		onExpandOpen: function() {
			console.log('onExpandOpen', arguments[0]);
		},
		onExpandClose: function() {
			console.log('onExpandClosed', arguments[0]);
		}
	};
	var mzMobileOptions = {};

	function isDefaultOption(o) {
		return magicJS.$A(magicJS.$(o).byTag('option')).filter(function(opt){
			return opt.selected && opt.defaultSelected;
		}).length > 0;
	}

	function toOptionValue(v) {
		if ( /^(true|false)$/.test(v) ) {
			return 'true' === v;
		}
		if ( /^[0-9]{1,}$/i.test(v) ) {
			return parseInt(v,10);
		}
		return v;
	}

	function makeOptions(optType) {
		var  value = null, isDefault = true, newParams = Array(), newParamsS = '', options = {};
		magicJS.$(magicJS.$A(magicJS.$(optType).getElementsByTagName("INPUT"))
			.concat(magicJS.$A(magicJS.$(optType).getElementsByTagName('SELECT'))))
		.forEach(function(param){
			value = ('checkbox'==param.type) ? param.checked.toString() : param.value;

			isDefault = ('checkbox'==param.type) ? value == param.defaultChecked.toString() :
			('SELECT'==param.tagName) ? isDefaultOption(param) : value == param.defaultValue;

			if ( null !== value && !isDefault) {
				options[param.name] = toOptionValue(value);
			}
		});
		return options;
	}

	function updateScriptCode() {
		var code = '&lt;script&gt;\nvar mzOptions = ';
		code += JSON.stringify(mzOptions, null, 2).replace(/\"(\w+)\":/g,"$1:")+';';
		code += '\n&lt;/script&gt;';

		magicJS.$('app-code-sample-script').changeContent(code);
	}

	function updateInlineCode() {
		var code = '&lt;a class="MagicZoom" data-options="';
		code += JSON.stringify(mzOptions).replace(/\"(\w+)\":(?:\"([^"]+)\"|([^,}]+))(,)?/g, "$1: $2$3; ").replace(/\{([^{}]*)\}/,"$1").replace(/\s*$/,'');
		code += '"&gt;';

		magicJS.$('app-code-sample-inline').changeContent(code);
	}

	function applySettings() {
		MagicZoom.stop('Zoom-1');
		mzOptions = makeOptions('params');
		mzMobileOptions = makeOptions('mobile-params');
		MagicZoom.start('Zoom-1');
		updateScriptCode();
		updateInlineCode();
		try {
			prettyPrint();
		} catch(e) {}
	}

	function copyToClipboard(src) {
		var
		copyNode,
		range, success;

		if (!isCopySupported()) {
			disableCopy();
			return;
		}
		copyNode = document.getElementById('code-to-copy');
		copyNode.innerHTML = document.getElementById(src).innerHTML;

		range = document.createRange();
		range.selectNode(copyNode);
		window.getSelection().addRange(range);

		try {
			success = document.execCommand('copy');
		} catch(err) {
			success = false;
		}
		window.getSelection().removeAllRanges();
		if (!success) {
			disableCopy();
		} else {
			new magicJS.Message('Settings code copied to clipboard.', 3000,
				document.querySelector('.app-code-holder'), 'copy-msg');
		}
	}

	function disableCopy() {
		magicJS.$A(document.querySelectorAll('.cfg-btn-copy')).forEach(function(node) {
			node.disabled = true;
		});
		new magicJS.Message('Sorry, cannot copy settings code to clipboard. Please select and copy code manually.', 3000,
			document.querySelector('.app-code-holder'), 'copy-msg copy-msg-failed');
	}

	function isCopySupported() {
		if ( !window.getSelection || !document.createRange || !document.queryCommandSupported ) { return false; }
		return document.queryCommandSupported('copy');
	}
</script>
</html>