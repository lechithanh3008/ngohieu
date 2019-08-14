@extends('master')

@section('page-title', 'Đặt lịch')
@section('dat-lich', 'active')

@section('script1')
<script>
$(document).ready(function () {
    $('.select2').select2();

    $('#form').submit(function(e) {
        if (new Date() >= new Date($('#batdau').val())) {
            e.preventDefault();
            alert('Ngày bắt đầu phải sau thời điểm hiện tại');
        } else if (new Date($('#batdau').val()) >= new Date($('#ketthuc').val())) {
            e.preventDefault();
            alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc');
        }
    });
});

</script>
@endsection

@section('content')

@include('include._noti')

<form action="#" method="post" id="form">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Đặt lịch</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idphong" class="col-form-label label-required">Phòng họp</label>
                                <select class="form-control select2" name="idphong" id="idphong" required>
                                    @foreach($cosos as $cs)
                                        @foreach($cs->phong()->get() as $p)
                                            <option value="{{$p->id}}">{{$cs->tencs}} - {{$p->tenphong}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noidung" class="col-form-label label-required">Nội dung</label>
                                <input type="text" class="form-control" name="noidung" value="{{$item->noidung}}" id="noidung" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batdau" class="col-form-label label-required">Bắt đầu</label>
                                <input type="datetime-local" class="form-control" name="batdau" step=900 value="@if($item->id){{\Carbon\Carbon::parse($item->batdau)->format('Y-m-d\TH:i')}}@endif" id="batdau" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ketthuc" class="col-form-label label-required">Kết thúc</label>
                                <input type="datetime-local" class="form-control" name="ketthuc" step=900 value="@if($item->id){{\Carbon\Carbon::parse($item->ketthuc)->format('Y-m-d\TH:i')}}@endif" id="ketthuc" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="songuoi" class="col-form-label">Số người</label>
                                <input type="number" step="1" min="1" class="form-control" name="songuoi" value="{{$item->songuoi}}" id="songuoi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ghichu" class="col-form-label">Ghi chú</label>
                                <input type="text" class="form-control" name="ghichu" value="{{$item->ghichu}}" id="ghichu">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           
                                <label for="idthietbi" class="col-form-label label-required">Thiết Bị</label>
                                <br>
                                <br>
                                
                                @foreach($tb as $p)
                                    <input type="checkbox" name="{{$p->tentb}}" value="0">{{$p->tentb}}<br>
                                @endforeach
                        </div>  
                    </div>

                    <div class="col-md-12"><br></div>
                    <div class="col-md-12"><br></div>

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