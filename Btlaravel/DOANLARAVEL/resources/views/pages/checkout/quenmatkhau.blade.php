@extends('layout')
@section('content')
	<section id="form"><!--form-->
		<div class="container">

			<div class="row">
				<div class="col-sm-5 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2 align="center"> Quên Mật Khẩu</h2>

		<form action="{{url('/recover-pass')}}" method="POST">
			@csrf
				
			<input type="text" name="email_account" placeholder="Nhập Email" />
			<button type="submit" class="btn btn-default">Đăng Nhập</button>
		</form>


				</div>
			</div>
		</div>
	</div>
	</section><!--/form-->

					@endsection