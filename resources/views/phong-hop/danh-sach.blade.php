@extends('master')

@section('page-title', 'Phòng họp')
@section('phong-hop', 'active')

@section('script1')
    <script>
        $(document).ready(function () {
                $('#btndelete, #foo').click(function () {
                    var id = $(this).data('id');
                    console.log(id);
                    $('#id-delete').val(id);
                });
            });
    </script>
@endsection

@section('content')

<p>
    <a href="{{$pre_url}}phong-hop/chi-tiet" class="btn btn-primary">Thêm mới</a>
</p>

@include('include._noti')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Phòng họp</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên phòng</th>
                                <th>Mô tả</th>
                                <th>Cơ sở</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cnt = 1; ?>
                            @foreach ($items as $item)
                                <tr>
                                <th scope="row">{{$cnt++}}</th>
                                <td>{{$item->tenphong}}</td>
                                <td>{{$item->mota}}</td>
                                <td>{{$item->co_so()->first()->tencs}}</td>
                                    <td>
                                    <a href="{{$pre_url}}phong-hop/chi-tiet/{{$item->id}}" data-toggle="tooltip" title="Sửa"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                        <span data-toggle="tooltip" title="Xóa">
                                        <a href="#modalDelete" id="btndelete" data-id="{{$item->id}}" data-toggle="modal"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                        </span>
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
                Xác nhận xóa danh mục Phòng họp?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{$pre_url}}phong-hop/xoa">
                    @csrf
                <input type="hidden" name="id" id="id-delete" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-danger"><i class="ik ik-trash-2 f-16"></i> Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection