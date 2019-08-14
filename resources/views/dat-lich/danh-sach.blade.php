@extends('master')

@section('page-title', 'Đặt lịch')
@section('dat-lich', 'active')

@section('script1')
<script>
    $(document).ready(function () {
        $('#btndelete, #foo').click(function () {
            var id = $(this).data('id');
            console.log(id);
            $('#id-delete').val(id);
        });
        $('#btnxacnhan, #foo').click(function () {
            var id = $(this).data('id');
            console.log(id);
            $('#id-duyet').val(id);
            $('#trang-thai').val(1);
            $('#btn-submit-duyet').html('<i class="ik ik-check-circle"></i> Chấp nhận').addClass('btn-success').removeClass('btn-danger');
        });
        $('#btntuchoi, #foo').click(function () {
            var id = $(this).data('id');
            console.log(id);
            $('#id-duyet').val(id);
            $('#trang-thai').val(-1);
            $('#btn-submit-duyet').html('<i class="ik ik-slash"></i> Từ chối').addClass('btn-danger').removeClass('btn-success');
        });
    });
</script>
@endsection

@section('content')

@if(Auth::user()->admin || Auth::user()->datphong)
<p>
    <a href="{{$pre_url}}dat-lich/chi-tiet" class="btn btn-primary">Thêm mới</a>
    <a href="{{$pre_url}}dat-lich/danh-sach" class="btn btn-primary">Phòng đã đặt</a>
</p>
@endif

@include('include._noti')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Phòng đã đặt</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thành viên</th>
                            <th>Phòng đặt</th>
                            <th>Nội dung</th>
                            <th>Bắt đầu</th>
                            <th>Kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cnt = 1; ?>
                        @foreach ($items as $item)
                        <tr>
                            <th scope="row">{{$cnt++}}</th>
                            <td>
                                {{$item->nguoi_dung()->first()->hoten}}
                            </td>
                            <td>{{$item->phong()->first()->co_so()->first()->tencs}} - {{$item->phong()->first()->tenphong}}</td>
                            <td>
                                <b>{{$item->noidung}}</b><br />
                                Số người: {{$item->songuoi}} <br />
                                {{$item->ghichu}}
                            </td>
                            <td>{{\Carbon\Carbon::parse($item->batdau)->format('Y/m/d H:i')}}</td>
                            <td>{{\Carbon\Carbon::parse($item->ketthuc)->format('Y/m/d H:i')}}</td>
                            <td class="text-center">
                                @if($item->trangthai == 0)
                                @if(!Auth::user()->admin)
                                <i class="text-muted">Chờ phê duyệt</i>
                                @else
                                <span data-toggle="tooltip" title="Xác nhận">
                                    <a href="#modalDuyet" id="btnxacnhan" data-id="{{$item->id}}" data-toggle="modal"><i class="ik ik-check-circle mr-15 f-16 text-green"></i></a>
                                </span>
                                <span data-toggle="tooltip" title="Từ chối">
                                    <a href="#modalDuyet" id="btntuchoi" data-id="{{$item->id}}" data-toggle="modal"><i class="ik ik-slash f-16 text-red"></i></a>
                                </span>
                                @endif
                                @else
                                @if($item->trangthai == 1)
                                <span class="badge badge-pill badge-success mb-1">Đã duyệt</span>
                                @else
                                <span class="badge badge-pill badge-danger mb-1">Bị từ chối</span>
                                @endif
                                <br />
                                <i class="text-muted">{{$item->ykien}}</i>
                                @endif
                            </td>
                            <td>
                                @if($item->trangthai == 0)
                                <a href="{{$pre_url}}dat-lich/chi-tiet/{{$item->id}}" data-toggle="tooltip" title="Sửa"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                <span data-toggle="tooltip" title="Xóa">
                                    <a href="#modalDelete" id="btndelete" data-id="{{$item->id}}" data-toggle="modal"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Xác nhận xóa mục đặt lịch?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{$pre_url}}dat-lich/xoa">
                    @csrf
                    <input type="hidden" name="id" id="id-delete" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger"><i class="ik ik-trash-2 f-16"></i> Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDuyet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Duyệt đặt lịch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form method="POST" action="{{$pre_url}}dat-lich/duyet">
                    @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Ý kiến bổ sung</label>
                    <input class="form-control" name="ykien" id="ykien" />
                </div>
            </div>
            <div class="modal-footer">
                    <input type="hidden" name="id" id="id-duyet" />
                    <input type="hidden" name="trangthai" id="trang-thai" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn" id="btn-submit-duyet"></button>
            </div>
                </form>
        </div>
    </div>
</div>
@endsection