@extends('master')

@section('page-title', 'Đổi mật khẩu')

@section('content')

<div class="row auth-wrapper">

	<div class="col-xl-4 col-lg-6 col-md-7 my-auto mx-auto">
		<div class="authentication-form mx-auto">
			<h3>Đổi mật khẩu</h3>
			<form action="{{$pre_url}}doi-mat-khau" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@include('include._noti')

				<div class="form-group">
					<input type="text" class="form-control" name="username" readonly placeholder="Tên đăng nhập"
						value="{{Auth::user()->username}}">
					<i class="ik ik-user"></i>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="oldpassword" placeholder="Mật khẩu cũ"
						required="">
					<i class="ik ik-lock"></i>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="newpassword" placeholder="Mật khẩu mới"
						required="">
					<i class="ik ik-lock"></i>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu mới"
						required="">
					<i class="ik ik-eye-off"></i>
				</div>
				<div class="sign-btn text-center">
					<button class="btn btn-theme">Đổi</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection