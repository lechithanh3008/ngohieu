@extends('master')

@section('page-title', 'Thiết Bị')
@section('thiet-bi', 'active')

@section('content')

@include('include._noti')
<form action="#" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Thiết Bị</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tentb" class="col-form-label label-required">Tên Thiết Bị</label>
                                <input type="text" class="form-control" name="tentb" value="{{$item->tentb}}"  id="tentb" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="motatb" class="col-form-label">Mô tả</label>
                                <input type="text" class="form-control" name="motatb" value="{{$item->motatb}}" id="motatb">
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