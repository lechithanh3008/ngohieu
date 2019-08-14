@extends('master')

@section('page-title', env('APP_NAME'))
@section('tong-quan', 'active')

@section('content')

  <div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="widget">
        <div class="widget-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="state">
              <h6>Cơ sở</h6>
              <h2>{{$coso}}</h2>
            </div>
            <div class="icon">
              <i class="ik ik-copy"></i>
            </div>
          </div>
          <small class="text-small mt-10 d-block">6% higher than last month</small>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0"
            aria-valuemax="100" style="width: 100%;"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="widget">
        <div class="widget-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="state">
              <h6>Phòng</h6>
              <h2>{{$phong}}</h2>
            </div>
            <div class="icon">
              <i class="ik ik-layers"></i>
            </div>
          </div>
          <small class="text-small mt-10 d-block">61% higher than last month</small>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0"
            aria-valuemax="100" style="width: 100%;"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="widget">
        <div class="widget-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="state">
              <h6>Lịch</h6>
              <h2>{{$datphong}}</h2>
            </div>
            <div class="icon">
              <i class="ik ik-file-text"></i>
            </div>
          </div>
          <small class="text-small mt-10 d-block">Tất cả lịch</small>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0"
            aria-valuemax="100" style="width: 100%;"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
      <div class="widget">
        <div class="widget-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="state">
              <h6>Thành viên</h6>
              <h2>{{$nguoidung}}</h2>
            </div>
            <div class="icon">
              <i class="ik ik-users"></i>
            </div>
          </div>
          <small class="text-small mt-10 d-block">Tất cả thành viên</small>
        </div>
        <div class="progress progress-sm">
          <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
            style="width: 100%;"></div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script1')
<script>
  $(document).ready(function () {
            $('#btndelete, #foo').click(function () {
                var id = $(this).data('id');
                console.log(id);
                $('#id-delete').val(id);
            });
            $('#btnclose, #foo').click(function () {
                var id = $(this).data('id');
                console.log(id);
                $('#id-close').val(id);
            });
        });
</script>
@endsection