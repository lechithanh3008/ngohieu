@extends('admin.master')

@section('page-title', 'Người dùng')
@section('user', 'active')

@section('header')
<h1>Người dùng</h1>
@if(Auth::user()->admin || Auth::user()->chucuahang)
<a href="{{$pre_url}}admin/users/them" class="btn btn-primary mt-3 ">Thêm nhân viên </a>
@endif
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 mb-3">
			<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Tên đăng nhập</th>
			      <th scope="col">Họ tên</th>
			      <th scope="col">Địa chỉ</th>
			      <th scope="col">SĐT</th>
			      <th scope="col">Email</th>
				  <th scope="col">Cửa hàng</th>
				  <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($users as $user)
			    <tr>
			      <td>{{$user->username}}</td>
			      <td>{{$user->hoten}}</td>
			      <td>{{$user->diachi}}</td>
			      <td>{{$user->sdt}}</td>
				  <td>{{$user->email}}</td>
				  <td>@if($user->cua_hang()->first()) {{$user->cua_hang()->first()->ten}} @endif</td>
				  {{-- <td><input type="checkbox" disabled @if($user->admin) checked @endif /></td> --}}
				  <td>
					  @if(Auth::user()->admin)
				  		<a href="{{$pre_url}}/admin/users/detail/{{$user->id}}">Sửa</a>
					  @endif
				  </td>
			    @endforeach
			  </tbody>
			</table>
	</div>
</div>
	
@endsection