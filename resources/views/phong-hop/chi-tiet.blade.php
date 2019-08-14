@extends('master')

@section('page-title', 'Phòng họp')
@section('phong-hop', 'active')

@section('content')

@include('include._noti')

<form action="#" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Phòng họp</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tenphong" class="col-form-label label-required">Tên phòng</label>
                                <input type="text" class="form-control" name="tenphong" value="{{$item->tenphong}}"  id="tenphong" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idcoso" class="col-form-label label-required">Cơ sở</label>
                                <select name="idcoso" id="idcoso" class="form-control select2">
                                    @foreach ($cosos as $cs)
                                        <option value="{{$cs->id}}" @if($item->idcoso == $cs->id) selected @endif>{{$cs->tencs}}</option>
                                    @endforeach
                                </select>
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
    $('.select2').select2(); 
    
  });
</script>
@endsection