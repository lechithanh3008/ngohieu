@extends('master')

@section('page-title', 'Thông tin cá nhân')

@section('content')

<div class="row auth-wrapper">

	<div class="col-xl-5 col-lg-7 col-md-8 my-auto mx-auto">
		<div class="authentication-form mx-auto">
			<h3>Thông tin cá nhân</h3>
			<form action="{{$pre_url}}thong-tin" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@include('include._noti')

				<div class="form-group">
					<input type="text" class="form-control" name="username" readonly placeholder="Tên đăng nhập"
						value="{{Auth::user()->username}}">
					<i class="ik ik-user"></i>
                </div>
                
				<div class="form-group">
					<input type="text" class="form-control" name="hoten" placeholder="Họ tên" value="{{Auth::user()->hoten}}" required="">
					<i class="ik ik-credit-card"></i>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" name="diachi" placeholder="Địa chỉ" value="{{Auth::user()->diachi}}">
					<i class="ik ik-map-pin"></i>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="sdt" placeholder="Số điện thoại" value="{{Auth::user()->sdt}}">
					<i class="ik ik-phone"></i>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}">
					<i class="ik ik-at-sign"></i>
                </div>
                
				<div class="sign-btn text-center">
					<button class="btn btn-theme">Cập nhật</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection