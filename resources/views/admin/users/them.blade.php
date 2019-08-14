@extends('admin.master')

@section('page-title', 'Thêm nhân viên')
@section('user', 'active')

@section('content')

@include('include.noti')

<form action="#" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">Thêm nhân viên</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
						</button>
					</div>
					<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-6 mb-3">

							<label for="username" class="col-form-label">Tên đăng nhập</label>
							<input type="text" class="form-control" name="username" id="username" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="password" class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" name="password" 
								id="password" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">

							<label for="hoten" class="col-form-label">Họ tên</label>
							<input type="text" class="form-control" name="hoten" id="hoten" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="diachi" class="col-form-label">Địa chỉ</label>
							<input type="text" class="form-control" name="diachi" 
								id="diachi">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="sdt" class="col-form-label">SĐT</label>
							<input type="text" class="form-control" name="sdt" id="sdt">
						</div>

						<div class="col-md-6 mb-3">
							<label for="email" class="col-form-label">Email</label>
							<input type="email" class="form-control" name="email" 
								id="email">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="sdt" class="col-form-label">Cửa hàng</label>
							@if (Auth::user()->admin)
								<select class="form-control select2" name="idcuahang">
									@foreach ($chs as $ch)
								<option value="{{$ch->id}}">{{$ch->ten}}</option>
									@endforeach
								</select>
							@else
								<select class="form-control" readonly="true" disabled>
									@if (Auth::user()->cua_hang()->first())
										<option value="{{Auth::user()->idcuahang}}">{{Auth::user()->cua_hang()->first()->ten}}</option>
									@endif
								</select>	
								@endif
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-3"><button type="submit" class="btn btn-primary btn-block">Thêm</button></div>
	</div>
</form>

@endsection

@section('script1')
<script>
  $(document).ready(function() {    
		$('.select2').select2({
		    tags: false
		}); 
	});
</script>
@endsection