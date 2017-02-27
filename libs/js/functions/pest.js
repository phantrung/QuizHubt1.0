// bắt sự kiện click nút ok
$('#open_file').on('click',function(){
	// gán các giá trị trong form vào các biến
	$title_pest = $('#title_file').val();
    $flag = 0;
        $check = $('#dao_qs').prop('checked');
        if ($check) {
            $flag = 1;
        }
	// nếu ko nhập giá trị vào 
	if ($title_pest == '') {
		// Hiển thị thông báo lỗi
        $(' .alert').removeClass('hidden');
        $(' .alert').html('Chưa nhập tên pest.');
	}
	else // ngược lại
	{      
		load_ajax();
	}
})

function load_ajax() {
        $.ajax({
            url : "pest.php", // đường dẫn gửi đến
            type : "post", // phương thức trả về
            dataType : "text", // kiểu dữ liệu 
            data : {
                title_pest : $title_pest,
                flag : $flag
            },
            success : function (data) {
                // nếu chưa có class hidden thì thêm class hidden vào
                if (!$('.alert').hasClass('hidden')) {
                    $(' .alert').addClass('hidden');
                }
                $('.question').html(data);
                load_question();
            }
        });
    }
$('input#title_file').autocomplete({lookup: filename});

