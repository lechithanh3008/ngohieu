$(function () {
    $('#data_table').DataTable({
        responsive: true,
        "language": {
            "emptyTable": "Không có dữ liệu",
            "info": "Hiển thị từ _START_ tới _END_ trên tổng số _TOTAL_ mục",
            "infoEmpty": "Không có dữ liệu",
            "infoFiltered": "(lọc từ _MAX_ mục)",
            "lengthMenu": "Hiển thị _MENU_ mục",
            "loadingRecords": "Đang tải...",
            "processing": "Đang xử lý...",
            "search": "Tìm kiếm:",
            "zeroRecords": "Không tìm thấy",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Trang sau",
                "previous": "Trang trước"
            }
        }
    });
});

function getFormattedDate(date) {
  var year = date.getFullYear();

  var month = (1 + date.getMonth()).toString();
  month = month.length > 1 ? month : '0' + month;

  var day = date.getDate().toString();
  day = day.length > 1 ? day : '0' + day;

  var hour = date.getHours().toString();
  hour = hour.length > 1 ? hour : '0' + hour;

  var minutes = date.getMinutes().toString();
  minutes = minutes.length > 1 ? minutes : '0' + minutes;
  
  return year + '-' + month + '-' + day + 'T' + hour + ':' + minutes;
}