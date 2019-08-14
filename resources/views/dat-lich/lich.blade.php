@extends('master')

@section('page-title', 'Đặt lịch')
@section('dat-lich', 'active')

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
            <div class="card-body">
                    <form method="GET" action="#" id="form-filter">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <select class="form-control select2" name="coso" id="coso" placeholder="Chọn cơ sở">
                                @foreach ($cosos as $cs)
                            <option value="{{$cs->id}}" @if($cs->id == $idcs) selected @endif>{{$cs->tencs}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group">
                                <button type="button" class="btn btn-block btn-default" id="daterange-btn">
                                    <span>
                                        <i class="fa fa-calendar"></i> Từ {{date('d/m/Y', strtotime($batdau))}} đến {{date('d/m/Y', strtotime($ketthuc))}}
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme btn-block"><i class="ik ik-filter"></i> Lọc</button>
                        </div>
                    </div>
                </div>
                    </form>
                <hr/>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="editEventLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventLabel">Chi tiết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phòng</label>
                                <input type="text" id="phongHop" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Người đặt</label>
                                <input type="text" id="nguoiDat" class="form-control" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                    <div class="form-group">
                        <label for="editEname">Nội dung</label>
                        <input type="text" class="form-control" id="noiDung" readonly>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batDau">Bắt đầu</label>
                                <input type="datetime-local" class="form-control" id="batDau" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ketThuc">Kết thúc</label>
                                <input type="datetime-local" class="form-control" id="ketThuc" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ghiChu">Ghi chú</label>
                                <input type="text" class="form-control" id="ghiChu" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Số người</label>
                            <input type="text" class="form-control" id="soNguoi" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
    </div>
</div>

<div class="modal" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventLabel">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="addEventForm">
                    <div class="form-group">
                        <label for="eventName">Event Title</label>
                        <input type="text" class="form-control" id="eventName" name="eventName"
                            placeholder="Please enter event title">
                    </div>
                    <div class="form-group">
                        <label for="eventStarts">Starts</label>
                        <input type="text" class="form-control datetimepicker-input" id="eventStarts" name="eventStarts"
                            data-toggle="datetimepicker" data-target="#eventStarts">
                    </div>
                    <div class="form-group mb-0" id="addColor">
                        <label for="colors">Choose Color</label>
                        <ul class="color-selector">
                            <li class="bg-aqua">
                                <input type="radio" data-color="bg-aqua" checked name="colorChosen" id="addColorAqua">
                                <label for="addColorAqua"></label>
                            </li>
                            <li class="bg-blue">
                                <input type="radio" data-color="bg-blue" name="colorChosen" id="addColorBlue">
                                <label for="addColorBlue"></label>
                            </li>
                            <li class="bg-light-blue">
                                <input type="radio" data-color="bg-light-blue" name="colorChosen"
                                    id="addColorLightblue">
                                <label for="addColorLightblue"></label>
                            </li>
                            <li class="bg-teal">
                                <input type="radio" data-color="bg-teal" name="colorChosen" id="addColorTeal">
                                <label for="addColorTeal"></label>
                            </li>
                            <li class="bg-yellow">
                                <input type="radio" data-color="bg-yellow" name="colorChosen" id="addColorYellow">
                                <label for="addColorYellow"></label>
                            </li>
                            <li class="bg-orange">
                                <input type="radio" data-color="bg-orange" name="colorChosen" id="addColorOrange">
                                <label for="addColorOrange"></label>
                            </li>
                            <li class="bg-green">
                                <input type="radio" data-color="bg-green" name="colorChosen" id="addColorGreen">
                                <label for="addColorGreen"></label>
                            </li>
                            <li class="bg-lime">
                                <input type="radio" data-color="bg-lime" name="colorChosen" id="addColorLime">
                                <label for="addColorLime"></label>
                            </li>
                            <li class="bg-red">
                                <input type="radio" data-color="bg-red" name="colorChosen" id="addColorRed">
                                <label for="addColorRed"></label>
                            </li>
                            <li class="bg-purple">
                                <input type="radio" data-color="bg-purple" name="colorChosen" id="addColorPurple">
                                <label for="addColorPurple"></label>
                            </li>
                            <li class="bg-fuchsia">
                                <input type="radio" data-color="bg-fuchsia" name="colorChosen" id="addColorFuchsia">
                                <label for="addColorFuchsia"></label>
                            </li>
                            <li class="bg-muted">
                                <input type="radio" data-color="bg-muted" name="colorChosen" id="addColorMuted">
                                <label for="addColorMuted"></label>
                            </li>
                            <li class="bg-navy">
                                <input type="radio" data-color="bg-navy" name="colorChosen" id="addColorNavy">
                                <label for="addColorNavy"></label>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success save-event">Save</button>
                <button type="button" class="btn btn-danger delete-event" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script1')
<script src="{{$pre_url}}{{$pre_folder}}master/plugins/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="{{$pre_url}}{{$pre_folder}}master/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
{{-- <script src="{{$pre_url}}{{$pre_folder}}master/js/calendar.js"></script> --}}
<script>
    var startDate = moment('{{$batdau}}', 'YYYY-MM-DD');
    var endDate = moment('{{$ketthuc}}', 'YYYY-MM-DD');
$(document).ready(function(t, e, i) {
    moment.locale('vi');
    $('#daterange-btn').daterangepicker({
        "locale": {
            "format": "D MMMM, YYYY",
            "separator": " - ",
            "applyLabel": "Xác nhận",
            "cancelLabel": "Hủy",
            "fromLabel": "Từ",
            "toLabel": "đến",
            "customRangeLabel": "Tùy chỉnh",
            "daysOfWeek": [
                "CN",
                "T2",
                "T3",
                "T4",
                "T5",
                "T6",
                "T7"
            ],
            "monthNames": [
                "Tháng 1",
                "Tháng 2",
                "Tháng 3",
                "Tháng 4",
                "Tháng 5",
                "Tháng 6",
                "Tháng 7",
                "Tháng 8",
                "Tháng 9",
                "Tháng 10",
                "Tháng 11",
                "Tháng 12"
            ],
            "firstDay": 1
        },
        startDate: startDate,
        endDate  : endDate
      },
      function (start, end) {
        console.log("Callback has been called!"); 
        $('#daterange-btn span').html('<i class="fa fa-calendar"></i> Từ ' + start.format('DD/MM/YYYY') + ' đến ' + end.format('DD/MM/YYYY'));
        startDate = start;
        endDate = end;  
      }
    );
    $('#form-filter').submit(function () {
      $('<input />').attr('type', 'hidden').attr('name', "batdau").attr('value', startDate.format('YYYY-MM-DD')).appendTo('#form-filter');
      $('<input />').attr('type', 'hidden').attr('name', "ketthuc").attr('value', endDate.format('YYYY-MM-DD')).appendTo('#form-filter');
    });

    $('.select2').select2();

    $("#calendar").fullCalendar({
        timeFormat: 'HH:mm',
        locale: 'vi',
        visibleRange: {
            start: '{{$batdau}}',
            end: '{{$ketthuc}}'
        },
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        buttonText: {
            today: "Hôm nay",
            month: "Tháng",
            week: "Tuần",
            day: "Ngày"
        },
        events: [
        @foreach($items as $item)
        {
            phong: "{{$item->tenphong}}",
            title: "{{$item->title}}",
            songuoi: "{{$item->songuoi}}",
            ghichu: "{{$item->ghichu}}",
            nguoi: "{{$item->nguoi}}",
            className: "{{$item->className}}",
            start: new Date('{{date("Y-m-d\TH:i", strtotime($item->batdau))}}'),
            end: new Date('{{date("Y-m-d\TH:i", strtotime($item->ketthuc))}}'),
        },
        @endforeach
        ],
        selectable: 0,
        eventClick: function(calEvent, jsEvent, view) {
            $("#noiDung").val(calEvent.title)
            $("#phongHop").val(calEvent.phong)
            $("#nguoiDat").val(calEvent.nguoi)
            $("#ghiChu").val(calEvent.ghichu)
            $("#soNguoi").val(calEvent.songuoi)

            $("#batDau").val(getFormattedDate(calEvent.start._d))
            $("#ketThuc").val(getFormattedDate(calEvent.end._d))

            $("#editEvent").modal({
                backdrop: 'static'
            });
        },

        select: function(start, end, allDay) {
            var $this = this;
            $("#addEvent").modal({
                backdrop: 'static'
            });
            $("#eventStarts").datetimepicker("date", start)
            var form = $("#addEventForm");
            $("#addEvent").find('.delete-event').hide().end().find('.save-event').show().end().find('.save-event').unbind('click').click(function() {
                form.submit();
            });

            $("#addEvent").find('form').on('submit', function() {
                var title = form.find("#eventName").val();
                var start = form.find("#eventStarts").val();
                var end = form.find("input[name='ending']").val();
                var categoryClass = form.find("#addColor [type=radio]:checked").data("color");
                if (title !== null && title.length != 0) {
                    $("#calendar").fullCalendar('renderEvent', {
                        title: title,
                        start: start,
                        end: end,
                        allDay: false,
                        className: categoryClass
                    }, true);
                    $("#addEvent").modal('hide');
                } else {
                    alert('You have to give a title to your event');
                }
                return false;
            });
            $("#calendar").fullCalendar('unselect');

        }
    });
    
})
</script>
@endsection