@extends('layout')
@section('content')
 <!-- thông báo đăng kí tài khoản thành công-->

<div align="center" >
	 @if(session()->get('success'))
		<div class="alert alert-success" >
    {{session()->get('success')}}
		</div>

    @endif 
</div>

<!-----thông báo đăng nhập lỗi----------------------->
<div align="center" >
	 @if(session()->get('error'))
		<div class="alert alert-danger" >
    {{session()->get('error')}}
		</div>

    @endif 
</div>



<!-- phần layout đăng kí đăng nhập----->
	<section id="form"><!--form-->
		<div class="container">

			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2> Đăng Nhập Tài Khoản</h2>

	<form action="{{url('login-customer')}}" method="POST">
		@csrf
			
		<input type="text" name="email_account" placeholder="Tài Khoản" />
		<input type="password" name="password_account" placeholder="PassWord" />

		<span >
			<input type="checkbox" class="checkbox"> 
			Ghi Nhớ Đăng Nhập ||
		</span>

		<span style="margin:5px;">

		<a href="{{url('quenmatkhau')}}">Quên Mật Khẩu</a>
		</span>

		<button type="submit" class="btn btn-default">Đăng Nhập</button>
	</form>
		</div><!--/login form-->



				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>



				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->




						<h2>Đăng Kí Mới!</h2>
						<form action="{{url('add-customer')}}"method="POST">
							@csrf

	    <!---------validation--------------------->                     
    <span class="text-danger">  @error('customer_name')Nhập Tối Thiểu 3 kí Tự    @enderror
      </span>						

		<input type="text" name =" customer_name" placeholder="Họ Và Tên Đăng Kí" class="form-control"/>

	  <!---------validation--------------------->                     
    <span class="text-danger">  @error('customer_email')Thông Tin email Phải Có Dấu @   
     @enderror
      </span>

		<input type="email"   name =" customer_email"    placeholder="Địa Chỉ Enail"/>
	

	  <!---------validation--------------------->                     
    <span class="text-danger">  @error('customer_password')Nhập Tối Thiểu 5 kí Tự    @enderror
      </span>

		<input type="password"name =" customer_password" placeholder="Mật Khẩu"/>
	
	  <!---------validation--------------------->                     
    <span class="text-danger">  @error('customer_phone')Nhập Tối Thiểu 8 kí Tự    @enderror
      </span>


		<input type="text"    name =" customer_phone"    placeholder="Số Điện Thoại"/>
	

							<button type="submit" class="btn btn-default">Đăng Ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@stop
