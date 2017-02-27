// Bắt sự kiện khi click vào nút xóa
$('#submit_delete_pest').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $title_edit_pest = $('#title_edit_pest').val();
    $ac = 'delete'; // Hành động
 
    // Nếu một trong các biến này rỗng
    if ($title_edit_pest == '')
    {
        // Hiển thị thông báo lỗi
        $('#modalDeletePest .alert').removeClass('hidden');
        $('#modalDeletePest .alert').html('Vui lòng lưu lại thông tin trước khi xóa.');
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
                title_edit_pest : $title_edit_pest,
                ac : $ac
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formEditPest .alert').removeClass('hidden');
                $('#formEditPest .alert').html(data);
            }
        });
    }
});

// Bắt xự kiện xóa ảnh

function delete_img($id){
    var $confirm = confirm('Bạn có muốn xóa ảnh không ?');
        if ($confirm) {
            // Gán các giá trị trong form tạo note vào các biến
            $title_img = $('#img-'+$id+'').text();
            $path_img = $('#title_edit_pest').val();
            $url_img = 'img/'+$path_img+'/'+$title_img;
            $ac = 'delete_img'; // Hành động
         
            // Nếu một trong các biến này rỗng
            if ($title_edit_pest == '')
            {
                // Hiển thị thông báo lỗi
                $('#modalDeletePest .alert').removeClass('hidden');
                $('#modalDeletePest .alert').html('Vui lòng lưu lại thông tin trước khi xóa.');
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
                        url_img : $url_img,
                        ac : $ac
                    // Thực thi khi gửi dữ liệu thành công
                    }, success : function(data) {
                        $('#formUploadImg .alert').removeClass('hidden');
                        $('#formUploadImg .alert').html(data);
                    }
                });
            }
        }
}