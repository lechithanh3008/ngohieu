@extends('admin.master')

@section('page-title', 'Thông tin cá nhân')
@section('user', 'active')

@section('content')

@include('include.noti')

<form action="#" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" name="id" value="{{$user->id}}">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">Thông tin cá nhân</h3>

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

							<label for="hoten" class="col-form-label">Họ tên</label>
							<input type="text" class="form-control" name="hoten" value="{{$user->hoten}}"
								id="hoten">
						</div>

						<div class="col-md-6 mb-3">
							<label for="diachi" class="col-form-label">Địa chỉ</label>
							<input type="text" class="form-control" name="diachi" value="{{$user->diachi}}"
								id="diachi">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="sdt" class="col-form-label">SĐT</label>
							<input type="text" class="form-control" name="sdt" value="{{$user->sdt}}" id="sdt">
						</div>

						<div class="col-md-6 mb-3">
							<label for="email" class="col-form-label">Email</label>
							<input type="email" class="form-control" name="email" value="{{$user->email}}"
								id="email">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="sdt" class="col-form-label">Cửa hàng</label>
							@if (Auth::user()->admin)
								<select class="form-control select2" name="idcuahang">
									@foreach ($chs as $ch)
								<option value="{{$ch->id}}" @if($ch->id == $user->idcuahang) selected @endif>{{$ch->ten}}</option>
									@endforeach
								</select>
							@else
								<select class="form-control" readonly="true" disabled>
									@if ($user->cua_hang()->first())
										<option value="{{$user->idcuahang}}">{{$user->cua_hang()->first()->ten}}</option>
									@endif
								</select>	
								@endif
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	@if ($user->cua_hang()->first())
	<div class="row">
		<div class="col-md-12">
			<div class="box box-warning collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">Thông tin cửa hàng</h3>
	
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
							<label for="tench" class="col-form-label">Tên cửa hàng</label>
							<input type="text" class="form-control" name="tench" value="{{$user->cua_hang()->first()->ten}}" id="tench" @if(!$user->chucuahang) disabled @endif>
						</div>
						<div class="col-md-6 mb-3">
							<label for="sdtch" class="col-form-label">SĐT</label>
							<input type="text" class="form-control" name="sdtch" value="{{$user->cua_hang()->first()->sdt}}" id="sdtch" @if(!$user->chucuahang) disabled @endif>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="diachich" class="col-form-label">Địa chỉ cửa hàng</label>
							<input type="text" class="form-control" name="diachich" value="{{$user->cua_hang()->first()->diachi}}" id="diachich" @if(!$user->chucuahang) disabled @endif>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="motach" class="col-form-label">Mô tả</label>
							<input type="text" class="form-control" name="motach" value="{{$user->cua_hang()->first()->mota}}" id="motach" @if(!$user->chucuahang) disabled @endif>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="form-group row">
		<div class="col-md-3"><button type="submit" class="btn btn-primary btn-block">Cập nhật</button></div>
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