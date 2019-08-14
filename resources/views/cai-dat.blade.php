@extends('master')

@section('page-title', 'Cài đặt')
@section('cai-dat', 'active')

@section('content')

@include('include._noti')

<form action="#" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>Cài đặt</h3>
				</div>
				<div class="card-body">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="hoten" class="col-form-label">Tiêu đề</label>
							<input type="text" class="form-control" name="name" value="{{env('APP_NAME')}}" id="name"
								required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							<label for="hoten" class="col-form-label">Mô tả</label>
							<input type="text" class="form-control" name="description" value="{{env('APP_DESCRIPTION')}}" id="description" required>
						</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="hoten" class="col-form-label">Địa chỉ trang</label>
							<input type="text" class="form-control" name="url" value="{{env('APP_URL')}}" id="url" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
							<label for="hoten" class="col-form-label">Email</label>
							<input type="email" class="form-control" name="email" value="{{env('SITE_EMAIL')}}" id="email" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label for="phone" class="col-form-label">SĐT</label>
							<input type="text" class="form-control" name="phone" value="{{env('SITE_PHONE')}}" id="phone" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="hoten" class="col-form-label">Múi giờ</label>
							<select name="timezone" id="timezone" class="form-control">
								@foreach(timezone_identifiers_list() as $t)
								<option value="{{$t}}" @if(env('TIME_ZONE')==$t) selected @endif>{{$t}}</option>
								@endforeach
							</select>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="hoten" class="col-form-label">Số mục trên trang</label>
								<input type="number" min=4 step=4 class="form-control" name="numitem" value="{{env('NUM_ITEM')}}"
									id="numitem" required>
							</div>
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<label for="hoten" class="col-form-label">Số mục trên trang admin</label>
								<input type="number" min=5 step=5 class="form-control" name="numitemadmin" value="{{env('NUM_ITEM_ADMIN')}}"
									id="numitemadmin" required>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
					<a href="{{$pre_url}}" class="btn btn-light">Hủy</a>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>

</form>

@endsection

@section('script1')
<script>
	$(document).ready(function() {    
    $('#timezone').select2({
      tags: false,
      
    }); 
    
  });
</script>
@endsection