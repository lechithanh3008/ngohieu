@extends('master')

@section('page-title', 'Người dùng')
@section('nguoi-dung', 'active')

@section('content')

<p>
    <a href="{{$pre_url}}nguoi-dung/chi-tiet" class="btn btn-primary">Thêm mới</a>
</p>

@include('include._noti')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Người dùng</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Quyền đặt</th>
                            <th>Admin</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cnt = 1; ?>
                        @foreach ($items as $item)
                        <tr>
                            <th scope="row">{{$cnt++}}</th>
                            <td>{{$item->username}}</td>
                            <td>{{$item->hoten}}</td>
                            <td>{{$item->diachi}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->sdt}}</td>
                            <td class="text-center">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" @if($item->datphong) checked
                                    @endif disabled>
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </td>
                            <td class="text-center">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" @if($item->admin) checked @endif
                                    disabled>
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </td>
                            <td>
                                <a href="{{$pre_url}}nguoi-dung/chi-tiet/{{$item->id}}" data-toggle="tooltip"
                                    title="Sửa"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection