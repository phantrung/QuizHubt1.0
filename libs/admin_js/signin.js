// Bắt sự kiện click vào nút Đăng nhập
$('#submit_signin').on('click', function() {
    // Gán các giá trị trong form đăng nhập vào các biến
    $user_signin = $('#user_signin').val();
    $pass_signin = $('#pass_signin').val();
 
    // Nếu một trong các biến này rỗng
    if ($user_signin == '' || $pass_signin == '')
    {
        // Hiển thị thông báo lỗi
        $('#formSignin .alert').removeClass('hidden');
        $('#formSignin .alert').html('Vui lòng điền đầy đủ thông tin bên trên.');
    }
    // Ngược lại
    else
    {
        // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : 'signin.php', // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                user_signin : $user_signin,
                pass_signin : $pass_signin
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formSignin .alert').html(data);
            }
        });
    }
});
// Thêm class admin vào thẻ body nếu là trang admin
$(document).ready(function(){
    $path = $(location).attr('pathname'); // lấy url của trang
    $check = $path.search("admin.php"); // kiểm tra có là trang admin.php ko
    if ($check > -1) {
        $('body').addClass('admin');
    }
});
