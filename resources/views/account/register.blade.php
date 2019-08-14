@extends('master')

@section('page-title', 'Đăng ký')

@section('content')
<div class="main-content">
@if (count($errors) > 0)
<div class="row pt-md-2">
	<div class="col">
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Lỗi:</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <br/>
		  @foreach($errors->all() as $err)
		  	{{$err}} <br/>
		  @endforeach
		  
		</div>
	</div>
</div>
@elseif (Session::has('success'))
<div class="row pt-md-2">
	<div class="col">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Thành công:</strong> {{Session::get('success')}} <a href="{{$pre_url}}login" class="badge badge-success">Đăng nhập ngay</a>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	</div>
</div>
@endif
<form action="{{$pre_url}}register" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="space20">&nbsp;</div>
			<h1 class="h3 mb-3 font-weight-normal text-center">Tạo tài khoản</h1>
			<div class="space20">&nbsp;</div>

			<div class="form-group row">
				<label for="username" class="col-sm-4 col-form-label label-required">Tên đăng nhập</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="username" id="username" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-sm-4 col-form-label label-required">Mật khẩu</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="password" id="password" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="repassword" class="col-sm-4 col-form-label label-required">Nhập lại mật khẩu</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" name="repassword" id="repassword" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="hoten" class="col-sm-4 col-form-label">Họ tên</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="hoten" id="hoten" >
				</div>
			</div>

			<div class="form-group row">
				<label for="tench" class="col-sm-4 col-form-label label-required">Tên cửa hàng</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="tench" id="tench" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="diachi" class="col-sm-4 col-form-label">Địa chỉ</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="diachi" id="diachi">
				</div>
			</div>

			<div class="form-group row">
				<label for="sdt" class="col-sm-4 col-form-label">SĐT</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="sdt" id="sdt" >
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-sm-4 col-form-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" name="email" id="email">
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><button type="submit" class="btn btn-primary btn-block">Đăng ký</button></div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</form>

</div>
@endsection