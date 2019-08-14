@extends('master')

@section('page-title', 'Người dùng')
@section('nguoi-dung', 'active')

@section('content')

@include('include._noti')

<form action="#" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Người dùng</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="col-form-label label-required">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="username" value="{{$item->username}}"  id="username" required @if($item->id) readonly=true @endif>
                            </div>
                        </div>
                        @if(!$item->id)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="col-form-label label-required">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hoten" class="col-form-label label-required">Họ tên</label>
                                <input type="text" class="form-control" name="hoten" value="{{$item->hoten}}"  id="hoten" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diachi" class="col-form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi" id="diachi">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$item->email}}"  id="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sdt" class="col-form-label">SĐT</label>
                                <input type="text" class="form-control" name="sdt" id="sdt">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="datphong" @if($item->datphong) checked @endif>
                                    <span class="custom-control-label">&nbsp;Quyền đặt phòng</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="admin" @if($item->admin) checked @endif>
                                    <span class="custom-control-label">&nbsp;Quản trị viên</span>
                                </label>
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

