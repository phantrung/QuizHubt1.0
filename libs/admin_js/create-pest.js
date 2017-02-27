// Bắt sự kiện khi click vào nút tạo
$('#submit_create_pest').on('click', function() {
    // Gán các giá trị trong form tạo note vào các biến
    $title_create_pest = $('#title_create_pest').val();
    $body_create_pest = $('#body_create_pest').val();
    $ac = 'create'; // Hành động
 
    // Nếu một trong các biến này rỗng
    if ($title_create_pest == '' || $body_create_pest == '')
    {
        // Hiển thị thông báo lỗi
        $('#formCreatePest .alert').removeClass('hidden');
        $('#formCreatePest .alert').html('Vui lòng điền đầy đủ thông tin.');
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
                title_create_pest : $title_create_pest,
                body_create_pest : $body_create_pest,
                ac : $ac
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formCreatePest .alert').removeClass('hidden');
                $('#formCreatePest .alert').html(data);
            }
        });
    }
});
