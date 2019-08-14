@if (count($errors) > 0)
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-warning alert-dismissible show" role="alert">
			<strong>Lỗi:</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<i class="ik ik-x"></i>
			</button>
			<br />
			@foreach($errors->all() as $err)
			{{$err}} <br />
			@endforeach

		</div>
	</div>
</div>
@elseif (Session::has('success'))
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissible show" role="alert">
			<strong>Thành công:</strong> {{Session::get('success')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<i class="ik ik-x"></i>
			</button>
		</div>
	</div>
</div>
@endif