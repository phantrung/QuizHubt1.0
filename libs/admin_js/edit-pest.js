/**
 *  @param $old_title_pest : tên pest trc khi sửa  
 *  @param $title_edit_pest : tên pest sau khi sửa
 */
$old_title_pest = $('#title_edit_pest').val();
$old_body_pest = $('#body_edit_pest').val();
$title_edit_pest = null;
// Bắt sự kiện khi click vào nút Sửa
$('#submit_edit_pest').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $title_edit_pest = $('#title_edit_pest').val();
    $body_edit_pest = $('#body_edit_pest').val();
    $ac = 'edit'; // Hành động
 
    // Nếu một trong các biến này rỗng
    if ($title_edit_pest == '')
    {
        // Hiển thị thông báo lỗi
        $('#formEditPest .alert').removeClass('hidden');
        $('#formEditPest .alert').html('Vui lòng điền đầy đủ thông tin.');
    }
    // Nếu dư liệu chưa được chỉnh sửa
    else if ($old_title_pest == $title_edit_pest && $old_body_pest == $body_edit_pest) 
    {
        // Hiển thị thông báo lỗi
        $('#formEditPest .alert').removeClass('hidden');
        $('#formEditPest .alert').html('Vui lòng chỉnh sửa thông tin.');
    }
    // Ngược lại
    else
    {
        // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : 'admin-pest.php', // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                old_title_pest : $old_title_pest,
                title_edit_pest : $title_edit_pest,
                body_edit_pest : $body_edit_pest,
                ac : $ac
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formEditPest .alert').html(data);
            }
        });
    }
});