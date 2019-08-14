@extends('master')

@section('page-title', 'Cơ sở')
@section('co-so', 'active')

@section('content')

@include('include._noti')

<form action="#" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Cơ sở</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tencs" class="col-form-label label-required">Tên cơ sở</label>
                                <input type="text" class="form-control" name="tencs" value="{{$item->tencs}}"  id="tencs" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mota" class="col-form-label">Mô tả</label>
                                <input type="text" class="form-control" name="mota" value="{{$item->mota}}" id="mota">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="diachi" class="col-form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi" value="{{$item->diachi}}" id="diachi">
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
